<?php

class Download extends MY_Controller {
	
	function __construct(){
		parent::__construct();
		#include PATH_APP . 'libraries/html2pdf/html2pdf.class.php';
		$this->load->library("Pdf");
	}

	function index(){
		$this->load->view('download/airwaybill');
	}

	function preparation(){
		$this->load->view('download/download');
	}
	public function pdf() {
		$data_id = $_GET['data_id'];
		$data['details'] = $this->manifest_model->get_by_data_id($data_id);
		$data['qrcode'] = PATH_QRCODE . 'DATA_' . $data_id . '.png';
		$html = $this->load->view('download/pdf',$data);
    }
}

?>