<?php

Class Highchart extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}

	function get() {
		$type = (isset($_GET['type'])) ? $_GET['type'] : 'bar';
		$month = (isset($_GET['month'])) ? $_GET['month'] : date('Y-m');

		$data['chart'] = array('name' => null, 'kg' => null);
		$best_rank_kg = $this->chart->get_rank_kg($month,10);
		if($best_rank_kg != false) {
			$name = ''; $kg = '';
			foreach ($best_rank_kg as $key => $row) {
				if($type == 'bar') {
					$name 	.= "'" . $this->customers_model->get_by_id($row->shipper)->name . "',";
					$kg 	.= $row->total_kg . ",";
				}
				if($type == 'pie') {
					$name 	.= "['" . $this->customers_model->get_by_id($row->shipper)->name . "'," . $row->total_kg . "],";				
				}
			}
			$data['chart'] = array('name' => substr($name, 0,-1), 'kg' => substr($kg, 0,-1));
		}
		$this->load->view('chart/'.$type,$data);
	}
} 

?>