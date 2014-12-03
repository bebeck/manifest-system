<?php

class Request extends MY_Controller {
	
	function __cosntruct() {
		parent::__construct();
	}

	function index() {
		$this->set_layout();
	}

	function discount($method = null){
		switch ($method) {
			case 'add':
				$data = array();
				$this->set_layout('request/discount_add',$data);
				break;
			
			default:
				$data['list_dicount'] = $this->discount->get_list($this->session->userdata('user_id'));
				$this->set_layout('request/discount',$data);
				break;
		}
	}
	

}

?>