<?php

Class Customers extends MY_Controller {
	
	function __construct() {
		parent::__construct();
	}

	function index(){
		if($this->session->userdata('login') != TRUE) redirect(base_url());
		$this->set_layout('customers/data');
	}
	
	function customer_input()
	{
		if($this->session->userdata('login') != TRUE) redirect(base_url());	
		$this->set_layout('customers/customer_input');
			
		
	}
	
	function customer_view()
	{
		if($this->session->userdata('login') != TRUE) redirect(base_url());	
		$this->set_layout('customers/customer_view');
			
		
	}

	function ajax($method = null) {

		switch ($method) {
			case 'get':
				$page = $_GET['page'];
				$limit = 50;
				$start = ($page - 1) * $limit;

				$where = array();
				if(isset($_GET['type']) && !empty($_GET['type'])) $where['type']  = $_GET['type'];

				$data_ = array('customer' => $this->customers_model->get_filtering_data($start,$limit,$where));
				$data__ = array('total_row' => count($this->customers_model->get_filtering_data(null,null,$where)), 'page' => $page, 'limit' => $limit);

				$customer_html = $this->load->view('customers/get_html_data',$data_,true);
				$pagination_html = $this->load->view('customers/get_html_pagination',$data__,true);
				echo json_encode(array('data' => $customer_html, 'pagination', 'pagination' => $pagination_html));
				break;
			
			default:
				# code...
				break;
		}

	}

}

?>