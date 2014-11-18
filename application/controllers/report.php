<?php

class Report extends MY_Controller {
	
	function __construct() {
		parent::__construct();
	}

	function index() {
		$this->set_layout();
	}

	function customer_card() {
		if(isset($_GET['file_id'])) {
			if($this->manifest_model->get_by_file_id($_GET['file_id'])) {
				$file_id = $_GET['file_id'];
				$data = array(
					'valid_file' => TRUE,
					'data'	=> $this->manifest_model->get_by_file_id($file_id),
					'total_pp' => $this->manifest_model->get_total('prepaid',$file_id),
					'total_cc' => $this->manifest_model->get_total('collect',$file_id),
					'total_pkg' => $this->manifest_model->get_total('pkg',$file_id),
					'total_pcs' => $this->manifest_model->get_total('pcs',$file_id),
					'total_kg' => $this->manifest_model->get_total('kg',$file_id),
					'total_value' => $this->manifest_model->get_total('value',$file_id),
					'total_oth_chr_tata' => $this->manifest_model->get_total('other_charge_tata',$file_id),
					'total_oth_chr_pml' => $this->manifest_model->get_total('other_charge_pml',$file_id)
				);
			}
		}
		$data['list_file'] = $this->manifest_model->get_all_file();
		$this->set_layout('report/customer_card',$data);
	}
}

?>