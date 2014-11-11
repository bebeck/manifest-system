<?php

class Request extends MY_Controller {
	
	function __cosntruct() {
		parent::__construct();
	}

	function index() {
		$this->set_layout();
	}

	function add_new(){
		$data = array(
			'manifest_data' => $this->manifest_model->get_all()
			);
		$this->set_layout('request/new',$data);
	}

}

?>