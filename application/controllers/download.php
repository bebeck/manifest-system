<?php

class Download extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}

	function test_pdf(){
		$data_id = 'THS14111605432800001';
		$data['details'] = $this->manifest_model->get_by_data_id($data_id);
		$this->load->view('download/airwaybill',$data);
	}

	public function preparation() {
		$data_id = $_GET['data_id'];
		$name = md5(time());
		$file_path = PATH_PDF . $name . '.pdf';

		if(file_exists($file_path) == FALSE) {
			$this->load->library('pdf');
			$pdf = $this->pdf->load();

			$data['details'] = $this->manifest_model->get_by_data_id($data_id);
			$html = $this->load->view('download/airwaybill',$data,true);
			$pdf->SetMargins(0,0,0);
			$pdf->WriteHTML($html);
			$pdf->Output($file_path, 'I');
		}
    }

    function pembulatan(){
    	echo round(3.6, 2);
    }
}

?>