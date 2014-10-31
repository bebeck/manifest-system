<?php

Class Customers extends MY_Controller {
	
	function __construct() {
		parent::__construct();
			
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	function index(){
		if($this->session->userdata('login') != TRUE) redirect(base_url());
		
		$type = $this->input->post('type');
		$dataResult = $this->customers_model->get_data($type);
		
		
		if($this->input->post('find')){
			
		}
		
		
		$data['dataResult'] = $dataResult;
		$this->set_layout('customers/data',$data);
	}
	
	
	
	function register()
	{
		if($this->session->userdata('login') != TRUE) redirect(base_url());	
	
		
	
		
			
		if($this->input->post('register'))
		{
			
				$data['reference_id'] = $this->input->post('reference_id');
				$data['name'] = $this->input->post('name');
				$data['address'] = $this->input->post('address');
				$data['sort_name'] = $this->input->post('attn');
				$data['email'] = $this->input->post('email');
				$data['city'] = $this->input->post('city');
				$data['country'] = $this->input->post('country');
				$data['state'] = $this->input->post('state');
				$data['post_code'] = $this->input->post('post_code');
				
				
				$data['phone'] = $this->input->post('phone');
				$data['mobile'] = $this->input->post('mobile');
				$data['fax'] = $this->input->post('fax');
				
				$data['tax_class'] = $this->input->post('tax_class');
				$data['bank_branch'] = $this->input->post('bank_branch');
				$data['bank_code'] = $this->input->post('bank_code');
				$data['bank_account'] = $this->input->post('bank_account');
				
				$data['vat_doc'] = $this->input->post('vat_doc');
				$data['type'] = $this->input->post('type');
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
				$data['status'] = $this->input->post('status');
				
				
				$this->customers_model->save_customer($data);
			
					
			
		}
		
		$refcust = $this->customers_model->customer_new_id();
		$array['refcust'] = $refcust;
		$this->set_layout('customers/customer_input',$array);
	}
	
	function edit()
	{
		$UserId 			= $this->uri->segment(3);
		if($this->input->post('edit')){
					$data['name'] = $this->input->post('name');
					$data['address'] = $this->input->post('address');
					$data['sort_name'] = $this->input->post('attn');
					$data['email'] = $this->input->post('email');
					$data['city'] = $this->input->post('city');
					$data['country'] = $this->input->post('country');
					$data['state'] = $this->input->post('state');
					$data['post_code'] = $this->input->post('post_code');
					
					
					$data['phone'] = $this->input->post('phone');
					$data['mobile'] = $this->input->post('mobile');
					$data['fax'] = $this->input->post('fax');
					
					$data['tax_class'] = $this->input->post('tax_class');
					$data['bank_branch'] = $this->input->post('bank_branch');
					$data['bank_code'] = $this->input->post('bank_code');
					$data['bank_account'] = $this->input->post('bank_account');
					
					$data['vat_doc'] = $this->input->post('vat_doc');
					$data['type'] = $this->input->post('type');
					$data['register_doc'] = $this->input->post('register_doc');
					$data['register_date'] = $this->input->post('register_date');
					$data['due_date_payment'] = $this->input->post('due_date_payment');
					
					$data['price_index'] = $this->input->post('price_index');
					$data['payment_type'] = $this->input->post('payment_type');
					$data['payment_terms'] = $this->input->post('payment_terms');
					$data['discount'] = $this->input->post('discount');
	
					$data['credit_limit'] = $this->input->post('credit_limit');
					$data['remark'] = $this->input->post('remark');
					$data['status'] = $this->input->post('status');
					
					$this->customers_model->customer_edit($UserId,$data);
			
		}
		
		
		
			
			$getUser 			= $this->customers_model->getuser($UserId); 
			$array['getUser'] 	= $getUser;
			$this->set_layout('customers/customer_editform',$array);
	}
	
	function customer_delete($UserId=""){
			
			$this->customers_model->customer_delete($UserId);
			redirect ('customers');
	}
	
	function customer_view()
	{
		if($this->session->userdata('login') != TRUE) redirect(base_url());	
		$this->set_layout('customers/customer_view');
			
		
	}
	
	function detail(){
		
		$UserId 		= $this->uri->segment(3);
		$getUser 	= $this->customers_model->getuser($UserId); 
		
		
		$data['getUser']   = $getUser;
	
		$this->set_layout('customers/customer_view',$data);	
		
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
			
			case 'get_new_cust_id':
				echo $this->customers_model->customer_new_id();
				break;

			case 'add_customer':
				#Set Customer To Data
				$DATA_ID = $_POST['data_id'];
				$TYPE 	= $_POST['data_type'];

				$data['reference_id'] 	= $_POST['cust_id'];
				$data['name'] 			= $_POST['cust_name'];
				$data['address'] 		= $_POST['cust_address'];
				$data['state'] 			= $_POST['cust_state'];
				$data['city'] 			= $_POST['cust_city'];
				$data['country'] 		= $_POST['cust_country'];
				$data['email'] 			= $_POST['cust_email'];
				$data['phone'] 			= $_POST['cust_phone'];
				$data['type'] 			= $TYPE;
				$data['created_date']	= date('Y-m-d h:i:s');
				$data['user_id']		= $this->session->userdata('user_id');
				
				$this->customers_model->save_customer($data);

				$return_data = '
				<strong>'.$data['name'].'</strong><br/>
				'.$data['address'].'<br/>
				'.$data['country'].'<br/>
				';

				$this->manifest_model->set_data_customer($data['reference_id'],$DATA_ID,$TYPE);

				$check_valid_status = $this->manifest_model->check_valid_status($DATA_ID);
                switch ($check_valid_status) {
                    case '0': $status_class = ''; break;
                    case '1': $status_class = 'warning'; break;
                    case '2': $status_class = 'success'; break;
                    default: $status_class = ''; break;
                }

				echo json_encode(array('data' => $return_data, 'DATA_ID' => $DATA_ID, 'TYPE' => $TYPE, 'STATUS' => $status_class));

				break;
			default:
				# code...
				break;
		}

	}

}

?>