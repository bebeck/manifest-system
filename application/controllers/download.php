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
		$data_id = $_GET['data_id'];
		$this->session->set_flashdata(array('data_id' => $data_id));
		redirect('download/pdf');
	}
	public function pdf() {

		$data_id = $this->session->flashdata('data_id');
		if($data_id) {
			$data['details'] = $this->manifest_model->get_by_data_id($data_id);
			$data['qrcode'] = PATH_QRCODE . 'DATA_' . $data_id . '.png';
			$html = $this->load->view('download/pdf',$data,TRUE);

		    $pdf = new TCPDF('P', 'PX', 'A4', true, 'UTF-8', false); 
		    $pdf->setMargins(10,5,10);
		    $pdf->SetPrintHeader(false);
			$pdf->SetPrintFooter(false);
			$pdf->SetFont('times', '', 11);
		    $pdf->AddPage(); 
		    $pdf->writeHTML($html, true, false, true, false, '');
		    $pdf->Output($data_id . '.pdf', 'I');    
		} else {
			echo 'Download file expired';
		}
    }
}

?>