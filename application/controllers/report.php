<?php

class Report extends MY_Controller {
	
	function __construct() {
		parent::__construct();
	}

	function index() {
		$this->set_layout();
	}

	function customer_card() {
		$data = array();
		$this->set_layout('report/customer_card',$data);
	}
}

?>