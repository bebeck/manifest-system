<?php

Class Customers extends MY_Controller {
	
	function __construct() {
		parent::__construct();
			
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	function index(){
		if($this->session->userdata('login') != TRUE) redirect(base_url());
		$this->set_layout('customers/data');
	}
	
	function register()
	{
		if($this->session->userdata('login') != TRUE) redirect(base_url());	
	
		
		$this->form_validation->set_error_delimiters('');	
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('contact', 'contact', 'required');
		$this->form_validation->set_rules('sort_name', 'Sort Name', 'required');
		$this->form_validation->set_rules('tax_class', 'Tax Class', 'required');
		
			
		if($this->input->post('register'))
		{
			if($this->form_validation->run() == TRUE){
				$data['name'] = $this->input->post('name');
				$data['reference_id'] = $this->input->post('reference_id');
				$data['sort_name'] = $this->input->post('sort_name');
				$data['address'] = $this->input->post('address');
				$data['email'] = $this->input->post('email');
				$data['city'] = $this->input->post('city');
				$data['country'] = $this->input->post('country');
				$data['state'] = $this->input->post('state');
				$data['post_code'] = $this->input->post('post_code');
				$data['contact'] = $this->input->post('contact');
				$data['other_contact'] = $this->input->post('otcontact');
				
				$data['phone'] = $this->input->post('phone');
				$data['mobile'] = $this->input->post('mobile');
				$data['fax'] = $this->input->post('fax');
				
				$data['tax_class'] = $this->input->post('tax_class');
				$data['bank_branch'] = $this->input->post('bank_branch');
				$data['bank_code'] = $this->input->post('bank_code');
				$data['bank_account'] = $this->input->post('bank_account');
				
				$data['vat_doc'] = $this->input->post('vat_doc');
				$data['status'] = $this->input->post('status');
				$data['register_doc'] = $this->input->post('register_doc');
				$data['register_date'] = $this->input->post('register_date');
				$data['due_date_payment'] = $this->input->post('due_date_payment');
				
				$data['price_index'] = $this->input->post('price_index');
				$data['payment_type'] = $this->input->post('payment_type');
				$data['payment_terms'] = $this->input->post('payment_terms');
				$data['discount'] = $this->input->post('discount');

				$data['credit_limit'] = $this->input->post('credit_limit');
				$data['remark'] = $this->input->post('remark');
				$data['available'] = $this->input->post('active_status');
				$data['last_login'] = date('y-m-d');
				
				
				$this->customers_model->save_customer($data);
				
			}
					
			
		}
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