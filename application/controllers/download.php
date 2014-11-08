<?php

class Download extends MY_Controller {
	
	function __construct(){
		parent::__construct();
		include PATH_APP . 'libraries/html2pdf/html2pdf.class.php';
	}

	function index(){
		$this->load->view('download/airwaybill');
	}

	function pdf(){
		$data_id = $_GET['data_id'];

		$data_id_array = explode(',', $data_id);
		$print_out = '';

		if(is_array($data_id_array)) {
			foreach ($data_id_array as $data_id) {
				if($data_id) {
					$data['details'] = $this->manifest_model->get_by_data_id($data_id);
					$data['qrcode'] = base_url().'asset/qrcode/DATA_' . $data_id . '.png';
					$print_out .= $this->load->view('download/pdf',$data,TRUE);
				}
			}
		} else {
			$data['details'] = $this->manifest_model->get_by_data_id($data_id);
			$data['qrcode'] = base_url().'asset/qrcode/DATA_' . $data_id . '.png';
			$print_out = $this->load->view('download/pdf',$data,TRUE);
		}

		try {
	        $html2pdf = new HTML2PDF('P', 'A4', 'en');
	        $html2pdf->setDefaultFont('Arial');
	        $html2pdf->writeHTML($print_out);
	        $html2pdf->Output('print_out' .date('Y-m-d') . '.pdf');
	    } catch(HTML2PDF_exception $e) {
	        echo $e;
	        exit;
	    }
	}
}

?>