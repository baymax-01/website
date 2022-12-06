<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class refills extends MX_Controller {
	public $tb_users;
	public $tb_users_price;
	public $tb_order;
	public $tb_refills;
	public $tb_categories;
	public $tb_services;
	public $module;
	public $module_name;
	public $module_icon;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');

		//Config Module
		$this->tb_users               = USERS;
		$this->tb_users_price         = USERS_PRICE;
		$this->tb_order               = ORDER;
		$this->tb_refills             = REFILLS;
		$this->tb_categories          = CATEGORIES;
		$this->tb_services            = SERVICES;
		$this->module                 = get_class($this);
		$this->module_name            = 'Refills';
		$this->module_icon            = "fa ft-users";

		$this->columns = array(
			"refill_id"                 => lang("refill_id"),
			"order_id"                  => lang("order_id"),
			"order_basic_details"       => lang("order_basic_details"),
			"created"                   => lang("Created"),
			"status"                    => lang("Status"),
		);
		
		if (get_role("admin") || get_role("supporter")) {
			$this->columns = array(
				"refill_id"                 => lang("refill_id"),
				"order_id"                  => lang("order_id"),
				"api_refill_id"             => lang("api_refillid"),
				"uid"                       => lang("User"),
				"order_basic_details"       => lang("order_basic_details"),
				"created"                   => lang("Created"),
				"status"                    => lang("Status"),
				"response"                  => lang("API_Response"),
			);
		}

	}

	// ADD
	public function index($order_status = ""){
		if ($order_status == "") {
			$order_status = "all";
		}

		$number_error_orders = 0;
		if (get_role('user') && in_array($order_status, ['fail', 'error'])) {
          redirect(cn('refills/all'));
        }

        if (get_role('admin')) {
        	$number_error_orders = $this->model->get_count_refills('error');
        }

		$page        = (int)get("p");
		$page        = ($page > 0) ? ($page - 1) : 0;
		$limit_per_page = get_option("default_limit_per_page", 10);
		$query = array();
		$query_string = "";
		if(!empty($query)){
			$query_string = "?".http_build_query($query);
		}

		$config = array(
			'base_url'           => cn(get_class($this)."/".$order_status.$query_string),
			'total_rows'         => $this->model->get_refills_logs_list(true, $order_status),
			'per_page'           => $limit_per_page,
			'use_page_numbers'   => true,
			'prev_link'          => '<i class="fe fe-chevron-left"></i>',
			'first_link'         => '<i class="fe fe-chevrons-left"></i>',
			'next_link'          => '<i class="fe fe-chevron-right"></i>',
			'last_link'          => '<i class="fe fe-chevrons-right"></i>',
		);
		$this->pagination->initialize($config);
		$links = $this->pagination->create_links();

		$order_logs = $this->model->get_refills_logs_list(false, $order_status, $limit_per_page, $page * $limit_per_page);
		$data = array(
			"module"                        => get_class($this),
			"columns"                       => $this->columns,
			"order_logs"                    => $order_logs,
			"order_status"                  => $order_status,
			"links"                         => $links,
			"number_error_orders"           => $number_error_orders,
		);
		$this->template->build('index', $data);
	}

	// Get Services by cate ID
	public function get_services($id = ""){
		$check_category = $this->model->check_record("id", $this->tb_categories, $id, false, false);
		if ($check_category) {
			$services    = $this->model->get_services_by_cate($id);
			$this->load->model('users/users_model');
			$data = array(
				"module"   		=> get_class($this),
				"services" 		=> $services,
				"custom_rates"  => $this->users_model->get_custom_rates(),
			);
			$this->load->view('add/get_services', $data);
		}		
	}
	
	// Get Service Detail by ID
	public function get_service($id = ""){
		$check_service    = $this->model->get_service_item($id);
		$data = array(
			"module"   		=> get_class($this),
			"service" 		=> $check_service,
			
		);
		$this->load->view('add/get_service', $data);
	}


	/*----------  Logs  ----------*/
	public function log($order_status = ""){
		
	}
	

	/*----------  Order details for Dripfeed and Subscription  ----------*/
	public function log_details($id = ""){
		$orders = $this->model->get_log_details($id);
		if (!empty($orders)) {
			$data = array(
				"module"     => get_class($this),
				"columns"    => $this->columns,
				"order_logs" => $orders,
			);
			$this->template->build("logs/ajax_search", $data);
		}else{
			redirect(cn('dripfeed'));
		}
	}

	public function log_update($ids = ""){
		$order    = $this->model->get("*", $this->tb_refills, ['ids' => $ids]);
		if (!$order ) {
			redirect(cn($this->module.'/log'));
		}

		if (in_array($order->status, ['pending', 'processing', 'inprogress'])) {
			$order_status_array = ['pending', 'processing', 'inprogress', 'completed','partial','canceled'];
		}
		
		if (in_array($order->status, ['canceled'])) {
			$order_status_array = ['canceled'];
		}

		if (in_array($order->status, ['completed'])) {
			$order_status_array = ['completed', 'canceled', 'partial'];
		}

		if (in_array($order->status, ['partial'])) {
			$order_status_array = ['canceled', 'partial'];
		}

		if (in_array($order->status, ['error'])) {
			$order_status_array = ['canceled', 'error', 'partial', 'completed'];
		}

		$data = array(
			"module"   		            => get_class($this),
			"order" 	                => $order,
			"order_status_array" 	    => $order_status_array,
		);
		$this->load->view('logs/update', $data);
	}

	public function ajax_logs_update($ids = ""){
		if (!get_role('admin')) _validation('error', "Permission Denied!");
		
		$link 			= post("link");
		$start_counter  = post("start_counter");
		$remains 		= post("remains");
		$status 		= post("status");

		if($link == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("link_is_required")
			));
		}

		if(!is_numeric($start_counter) && $start_counter != ""){
			ms(array(
				"status"  => "error",
				"message" => lang("start_counter_is_a_number_format")
			));
		}

		if(!is_numeric($remains) && $remains != ""){
			ms(array(
				"status"  => "error",
				"message" => lang("start_counter_is_a_number_format")
			));
		}

		$data = array(
			"link" 	    	=> $link,
			"status"    	=> $status,
			"start_counter" => $start_counter,
			"remains"    	=> $remains,
			"changed" 		=> NOW,
		);

		$check_item = $this->model->get("ids, cate_id, service_id, service_type, api_provider_id, api_service_id, charge, uid, quantity, status, formal_charge, profit", $this->tb_refills, "ids = '{$ids}'");
		if(!empty($check_item)){
			/*----------  If status = refund  ----------*/
			if ($status == "refunded" || $status == "partial" || $status == "canceled") {
				$charge = $check_item->charge;
				$charge_back = 0;
				$real_charge = 0;
				$formal_charge = 0;
				$profit        = 0;

				if ($status == "partial") {
					$charge_back = ($charge * $remains) / $check_item->quantity;
					$real_charge = $charge - $charge_back;

					$formal_charge = $check_item->formal_charge * (1 - ($remains / $check_item->quantity ));
					$profit        = $check_item->profit * (1 - ($remains / $check_item->quantity ));
				}

				$user = $this->model->get("id, balance", $this->tb_users, ["id"=> $check_item->uid]);
				if (!empty($user) && !in_array($check_item->status, array('partial', 'cancelled', 'refunded'))) {
					$balance = $user->balance;
					$balance += $charge - $real_charge;
					$this->db->update($this->tb_users, ["balance" => $balance], ["id"=> $check_item->uid]);
				}
				$data['charge'] = $real_charge;
				$data['formal_charge'] = $formal_charge;
				$data['profit']        = $profit;
			}

			$this->db->update($this->tb_refills, $data, array("ids" => $check_item->ids));
			
			ms(array(
				"status"  => "success",
				"message" => lang("Update_successfully")
			));
		}else{
			ms(array(
				"status"  => "error",
				"message" => lang("There_was_an_error_processing_your_request_Please_try_again_later")
			));
		}
	}

	// function Search Data
	public function search(){
		$k           = get('query');
		$k           = htmlspecialchars($k);
		$search_type = (int)get('search_type');
		$data_search = ['k' => $k, 'type' => $search_type];
		$page        = (int)get("p");
		$page        = ($page > 0) ? ($page - 1) : 0;
		$limit_per_page = get_option("default_limit_per_page", 10);
		$query = ['query' => $k, 'search_type' => $search_type];
		$query_string = "";
		if(!empty($query)){
			$query_string = "?".http_build_query($query);
		}
		$config = array(
			'base_url'           => cn(get_class($this)."/search".$query_string),
			'total_rows'         => $this->model->get_count_orders_by_search($data_search),
			'per_page'           => $limit_per_page,
			'use_page_numbers'   => true,
			'prev_link'          => '<i class="fe fe-chevron-left"></i>',
			'first_link'         => '<i class="fe fe-chevrons-left"></i>',
			'next_link'          => '<i class="fe fe-chevron-right"></i>',
			'last_link'          => '<i class="fe fe-chevrons-right"></i>',
		);
		$this->pagination->initialize($config);
		$links = $this->pagination->create_links();

		$order_logs = $this->model->search_logs_by_get_method($data_search, $limit_per_page, $page * $limit_per_page);
		$data = array(
			"module"       => get_class($this),
			"columns"      => $this->columns,
			"order_logs"   => $order_logs,
			"order_status" => '',
			"links"        => $links,
		);
		$this->template->build('logs/logs', $data);
	}

	public function ajax_order_by($status = ""){
		if (!empty($status) && $status !="" ) {
			$order_logs = $this->model->get_order_logs_list(false, $status);
			$data = array(
				"module"     => get_class($this),
				"columns"    => $this->columns,
				"order_logs" => $order_logs,
			);
			$this->load->view("logs/ajax_search", $data);
		}
	}

	// Delete
	public function ajax_log_delete_item($ids = ""){
		$this->model->delete($this->tb_refills, $ids, false);
	}

}