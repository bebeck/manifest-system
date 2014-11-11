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

	function pdf(){
		$data_id = $_GET['data_id'];

		$data_id_array = explode(',', $data_id);
		$print_out = '';

		if(is_array($data_id_array)) {
			foreach ($data_id_array as $data_id) {
				if($data_id) {
					$data['details'] = $this->manifest_model->get_by_data_id($data_id);
					$data['qrcode'] = base_url().'asset/qrcode/DATA_' . $data_id . '.png';
					$print_out .= $this->load->view('download/pdf',$data);
				}
			}
		} else {
			$data['details'] = $this->manifest_model->get_by_data_id($data_id);
			$data['qrcode'] = base_url().'asset/qrcode/DATA_' . $data_id . '.png';
			$this->load->view('download/pdf',$data);
		}
	}

	function phpinfo(){
		echo phpinfo();
	}

	function pdfcrowd(){
		require PATH_APP . 'libraries/pdfcrowd.php';

		try
		{   
		    // create an API client instance
		    $client = new Pdfcrowd("bebeck", "141dab6a483de6fb059299424f649fe9");

		    // convert a web page and store the generated PDF into a $pdf variable
		    $pdf = $client->convertURI(base_url().'download/pdf?data_id='.$_GET['data_id']);

		    // set HTTP response headers
		    header("Content-Type: application/pdf");
		    header("Cache-Control: max-age=0");
		    header("Accept-Ranges: none");
		    header("Content-Disposition: attachment; filename=\"".$_GET['data_id'].".pdf\"");

		    // send the generated PDF 
		    echo $pdf;
		}
		catch(PdfcrowdException $why)
		{
		    echo "Pdfcrowd Error: " . $why;
		}
	}

	public function create_pdf() {
	$data_id = 'THS14110801021100002';
	$data['details'] = $this->manifest_model->get_by_data_id($data_id);
	$data['qrcode'] = PATH_QRCODE . 'DATA_' . $data_id . '.png';
	$html = $this->load->view('download/pdf',$data,TRUE);
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 

    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   

    $pdf->setMargins(5,5,5);
    $pdf->SetPrintHeader(false);
	$pdf->SetPrintFooter(false);
    $pdf->AddPage(); 
    $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
    $pdf->Output($data_id . '.pdf', 'I');    
    }
}

?>