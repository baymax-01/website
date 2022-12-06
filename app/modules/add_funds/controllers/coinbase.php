<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class coinbase extends MX_Controller {
	public $tb_users;
	public $tb_transaction_logs;
	public $tb_payments;
	public $tb_payments_bonuses;
	public $paypal;
	public $payment_type;
	public $payment_id;
	public $currency_code;
	public $mode;
	
	public $api_key;
	public $currency_rate_to_usd;

	public function __construct($payment = ""){
		parent::__construct();
		$this->load->model('add_funds_model', 'model');

		$this->tb_users            = USERS;
		$this->tb_transaction_logs = TRANSACTION_LOGS;
		$this->tb_payments         = PAYMENTS_METHOD;
		$this->tb_payments_bonuses = PAYMENTS_BONUSES;
		$this->payment_type		   = get_class($this);
		$this->currency_code       = get_option("currency_code", "USD");
		$this->load->library("coinbase_api");
		if ($this->currency_code == "") {
			$this->currency_code = 'USD';
		}
		if (!$payment) {
			$payment = $this->model->get('id, type, name, params', $this->tb_payments, ['type' => $this->payment_type]);
		}
		$this->payment_id 	      = $payment->id;
		$params  			      = $payment->params;
		$option                   = get_value($params, 'option');
		$this->mode               = get_value($option, 'environment');
		$this->payment_fee        = get_value($option, 'tnx_fee');

		// Payment Option
		$this->api_key       		= get_value($option, 'api_key');
		$this->currency_rate_to_usd     = get_value($option, 'rate_to_usd');

		$this->coinbase_api = new coinbase_api($this->api_key);
	}

	public function index(){
		redirect(cn('add_funds'));
	}

	/**
	 *
	 * Create payment
	 *
	 */
	public function create_payment($data_payment = ""){
		_is_ajax($data_payment['module']);
		$amount = $data_payment['amount'];
		if (!$amount) {
			_validation('error', lang('There_was_an_error_processing_your_request_Please_try_again_later'));
		}

		if (!$this->api_key) {
			_validation('error', lang('this_payment_is_not_active_please_choose_another_payment_or_contact_us_for_more_detail'));
		}
		
		if (!empty($amount) && $amount > 0) {
			$website_name = get_option('website_name');
			$users = session('user_current_info');
			$data = (object)array(
				"uid" 		    => session('uid'),
				"email" 		=> $users['email'],
				"amount" 		=> $amount,
				"name" 		    => $website_name,
				"currency" 		=> 'USD',
				"description" 	=> lang('Deposit_to_').$website_name. ' ('.$users['email'].')',
			);	
			$result = $this->coinbase_api->create_payment($data);
			if (isset($result) && $result->status == 'success') {
				$pricing = $result->response->pricing;

				$converted_amount = $amount * $this->currency_rate_to_usd;
				$data_tnx_log = array(
					"ids" 				=> ids(),
					"uid" 				=> session("uid"),
					"type" 				=> $this->payment_type,
					"transaction_id" 	=> $result->txn_id,
					"amount" 	        => round($converted_amount, 4) ,
					'txn_fee'           => round($converted_amount * ($this->payment_fee / 100), 4),
					"note" 	            => $amount,
					"status" 	        => 0,
					"created" 			=> NOW,
				);

				$transaction_log_id = $this->db->insert($this->tb_transaction_logs, $data_tnx_log);

				unset_session("amount");
				unset_session("real_amount");
				$this->load->view($this->payment_type.'/redirect', ['redirect_url' => $result->redirect_url]);
			}else{
				redirect(cn("add_funds/unsuccess"));
			}
		}else{
			redirect(cn());
		}

	}

	public function cron(){
		$this->load->model('model', 'help_model');
		$transaction_ids = $this->help_model->fetch('*', $this->tb_transaction_logs, ['status' => 0, 'type' => $this->payment_type]);
		if (!empty($transaction_ids)) {
			foreach ($transaction_ids as $key => $row) {
				$result = $this->coinbase_api->get_transaction_detail_info($row->transaction_id);
				if ($result->status == 'success') {
					$timelines = $result->data->timeline;
					
					$tx_status = 0;
					foreach ($timelines as $key => $timeline) {

						if ($timeline['status'] == "COMPLETED") {
							$tx_status = 1;
							break;
						}

						if ($timeline['status'] == "CANCELED" || $timeline['status'] == "EXPIRED") {
							$tx_status = -1;
							break;
						}

					}

					if ($tx_status == 1) {

						$this->db->update($this->tb_transaction_logs, ['status' => 1, 'transaction_id' => $row->transaction_id],  ['id' => $row->id]);

						// Update Balance 
						require_once 'add_funds.php';
						$add_funds = new add_funds();
						$add_funds->add_funds_bonus_email($row, $this->payment_id);
					}

					if ($tx_status == 1 || $tx_status == -1) {
						$this->db->update($this->tb_transaction_logs, ['status' => -1, 'transaction_id' => $row->transaction_id],  ['id' => $row->id]);
					}

				}
			}
		}else{
			echo "There is no Transaction at the present<br>";
		}
		echo "Successfully";
	}

}