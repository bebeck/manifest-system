<?php

class Request extends MY_Controller {
	
	function __cosntruct() {
		parent::__construct();
	}

	function index() {
		$this->set_layout();
	}

}

?>