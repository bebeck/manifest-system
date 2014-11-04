<?php

class Download extends MY_Controller {
	
	function __construct(){
		parent::__construct();
		include PATH_APP . 'libraries/PHPExcel/IOFactory.php';
	}

	function index(){
		$this->load->view('download/airwaybill');
	}
}

?>