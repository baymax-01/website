<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class razorpay extends MX_Controller {
	public $tb_users;
	public $tb_transaction_logs;
	public $tb_payments;
	public $tb_payments_bonuses;
	public $paypal;
	public $payment_type;
	public $payment_id;
	public $currency_code;
	public $payment_lib;
	public $mode;
	
	public $razorpay_mid;
	public $merchant_key;
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
		$this->razorpay_public_key      = get_value($option, 'public_key');
		$this->razorpay_secret_key      = get_value($option, 'secret_key');
		$this->currency_rate_to_usd     = get_value($option, 'rate_to_usd');
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

		if (!$this->razorpay_public_key || !$this->razorpay_secret_key) {
			_validation('error', lang('this_payment_is_not_active_please_choose_another_payment_or_contact_us_for_more_detail'));
		}

		$ORDER_ID         = "ORDS" . strtotime(NOW);
		$TXN_AMOUNT       = $amount; 
		// Create an array having all required parameters for creating checksum.

		$converted_amount = $amount / $this->currency_rate_to_usd;
		$data_tnx_log = array(
			"ids" 				=> ids(),
			"uid" 				=> session("uid"),
			"type" 				=> $this->payment_type,
			"transaction_id" 	=> $ORDER_ID,
			"amount" 	        => round($converted_amount, 4) ,
			'txn_fee'           => round($converted_amount * ($this->payment_fee / 100), 4),
			"note" 	            => $TXN_AMOUNT,
			"status" 	        => 0,
			"created" 			=> NOW,
		);
		$this->db->insert($this->tb_transaction_logs, $data_tnx_log);

		$data = array(
			"order_id" 	        => $ORDER_ID,
			"amount" 	        => round($converted_amount, 4) ,
			"name" 	            => get_field(USERS, ["id" => session('uid')], 'first_name')." ".get_field(USERS, ["id" => session('uid')], 'last_name'),
			"email"             => get_field(USERS, ["id" => session('uid')], 'email'),
			"public_key"        => $this->razorpay_public_key,
		);

		$this->load->view("razorpay/razorpay_form", $data);
		// redirect(cn("add_funds/razorpay/redirect", $data));
		
	}

	public function load_payment(){

		$data = $_POST;
		if (!$data) {
			_validation('error', lang('There_was_an_error_processing_your_request_Please_try_again_later'));
		}

		$this->template->build("razorpay/redirect", $data);
		
	}

	public function capture_payment_razorpay($transaction_id,$amount){

		$razorpayClientID = $this->razorpay_public_key;
		$razorpaySecret = $this->razorpay_secret_key;
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL,'https://api.razorpay.com/v1/payments/'.$transaction_id.'/capture');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "amount=".($amount*100)."&currency=".$this->currency_code);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_USERPWD, $razorpayClientID.":".$razorpaySecret);

		$headers = array();
		$headers[] = 'Content-Type: application/x-www-form-urlencoded';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if(curl_errno($ch)) {
			echo 'Error:' . curl_error($ch); die;
		}
		curl_close($ch);
		//echo $result; die;
		//return JSON_DECODE($result);
		return JSON_DECODE($result); 

    }

	public function complete(){
		if (!isset($_POST['ORDERID']) && !isset($_POST['razorpay_payment_id'])) {
			redirect(cn("add_funds"));
		}
				
		$tnx_id = $_POST["ORDERID"];
		$transaction = $this->model->get('*', $this->tb_transaction_logs, ['transaction_id' => $tnx_id, 'status' => 0, 'type' => $this->payment_type]);
		if (empty($transaction)) {
			redirect(cn("add_funds/unsuccess"));
		}
		// verifying the transaction status
		$capture_payment = $this->capture_payment_razorpay($_POST['razorpay_payment_id'],$transaction->amount);
		
		if ($capture_payment->status=='captured'  && $transaction) {

			$this->db->update($this->tb_transaction_logs, ['status' => 1, 'transaction_id' => $_POST["razorpay_payment_id"]],  ['id' => $transaction->id]);

			// Update Balance 
    		require_once 'add_funds.php';
    		$add_funds = new add_funds();
    		$add_funds->add_funds_bonus_email($transaction, $this->payment_id);
            
			set_session("transaction_id", $transaction->id);
			redirect(cn("add_funds/success"));

		} else {
			$this->db->update($this->tb_transaction_logs, ['status' => -1, 'transaction_id' => $_POST["razorpay_payment_id"]],  ['id' => $transaction->id]);
			redirect(cn("add_funds/unsuccess"));
		}
	}

}