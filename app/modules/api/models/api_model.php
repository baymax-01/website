<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class api_model extends MY_Model {
	public $tb_users;
	public $tb_users_price;
	public $tb_categories;
	public $tb_services;
	public $tb_orders;
	public $tb_refills;
	public $tb_api_providers;

	public function __construct(){
		$this->tb_categories 	= CATEGORIES;
		$this->tb_users         = USERS;
		$this->tb_services      = SERVICES;
		$this->tb_api_providers = API_PROVIDERS;
		$this->tb_orders     	= ORDER;
		$this->tb_refills    	= REFILLS;
		$this->tb_users_price   = USERS_PRICE;
		parent::__construct();
	}

	function get_services_list($uid = ""){
		$data  = array();
		$this->db->select("s.id as service, s.name, c.name as category, s.price as rate, s.min, s.max, s.type, s.desc, s.dripfeed, s.refill");
		$this->db->from($this->tb_services ." s");
		$this->db->join($this->tb_categories." c", "s.cate_id = c.id", 'left');
		$this->db->where("s.status", "1");
		$this->db->where("c.status", "1");
		$this->db->order_by("c.sort", "ASC");
		$this->db->order_by("s.price", "ASC");
		$query = $this->db->get();
		if($query->result()){
			$data = $query->result();
			$custom_rates = $this->get_custom_rates($uid);
			if ($custom_rates && $uid) {
				foreach ($data as $key => $row) {
					if (isset($custom_rates[$row->service])) {
						$data[$key]->rate = $custom_rates[$row->service]['service_price'];
					}
				}
			}
			return $data;
		}else{
			false;
		}
	}

	// Get all user price
	private function get_custom_rates($uid = ""){
		$custom_rates = $this->model->fetch('uid, service_id, service_price', $this->tb_users_price, ['uid' =>$uid ] );
		$exist_db_custom_rates = [];
		if (!empty($custom_rates)) {
			foreach ($custom_rates as $key => $row) {
				$exist_db_custom_rates[$row->service_id]['uid']           = $row->uid;
				$exist_db_custom_rates[$row->service_id]['service_price'] = $row->service_price;
			}
		}
		return $exist_db_custom_rates;
	}

	function get_order_id($id, $uid){
		$this->db->select("id as order, status, charge, start_counter as start_count, remains");
		$this->db->from($this->tb_orders);
		$this->db->where("id", $id);
		$this->db->where("uid", $uid);
		$query = $this->db->get();

		$result = $query->row();
		if(!empty($result)){
			switch ($result->status) {

				case 'completed':
					$result->status = 'Completed';
					break;
					
				case 'completed':
					$result->status = 'Completed';
					break;

				case 'processing':
					$result->status = 'Processing';
					break;

				case 'pending':
					$result->status = 'Pending';
					break;

				case 'inprogress':
					$result->status = 'In progress';
					break;

				case 'partial':
					$result->status = 'Partial';
					break;

				case 'cancelled':
					$result->status = 'Cancelled';
					break;

				case 'refunded':
					$result->status = 'Refunded';
					break;

			}
			return $result;
		}
		return false;
	}

	function get_is_already_refill($order_id,$uid){
		$where = "(`refill_status` = 'awaiting' or `refill_status` = 'processing' or `refill_status` = 'inprogress'  or `refill_status` = 'pending' or `refill_status` = '') AND refill_order_id = '".$order_id."' AND refill_client_id = '".$uid."' ";
		$data  = array();
		$this->db->select("refill_id");
		$this->db->from($this->tb_refills);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_refill_order_details($id,$uid){
		$data  = array();
		$this->db->where("o.uid", $uid);
		$this->db->select('o.*, u.email as user_email, s.name as service_name, s.refill as service_refill, api.url as url, api.key as key');
		$this->db->from($this->tb_orders." o");
		$this->db->join($this->tb_users." u", "u.id = o.uid", 'left');
		$this->db->join($this->tb_services." s", "s.id = o.service_id", 'left');
		$this->db->join($this->tb_api_providers." api", "api.id = o.api_provider_id", 'left');
		$this->db->where("o.id", $id);

		$query = $this->db->get();
		$result = $query->result();
		return $result[0];
	}

}
