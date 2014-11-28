<?php

class Download extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}

	public function pdf() {
		$data_id = $_GET['data_id'];
		$name = md5(time());
		$file_path = PATH_PDF . $name . '.pdf';

		if(file_exists($file_path) == FALSE) {
			$this->load->library('pdf');
			$pdf = $this->pdf->load();

			$data['details'] = $this->manifest_model->get_by_data_id($data_id);
			$data['extra_charge'] = $this->manifest_model->get_extra_charge($data_id);
			$html = $this->load->view('download/airwaybill',$data,true);
			$pdf->WriteHTML($html);
			$pdf->Output($file_path, 'I');
		}
    }

    function barcode($type = null,$value = null) {
    	if($type == '1D') {
    		$this->barcode_1d($value);
    	} else if($type == 'QRCODE') {
    		$this->barcode_qrcode($value);
    	} else echo redirect('');
    }

    function barcode_1d($string) {
		require_once(PATH_APP . 'libraries/phpbarcode/class/BCGFontFile.php');
		require_once(PATH_APP . 'libraries/phpbarcode/class/BCGColor.php');
		require_once(PATH_APP . 'libraries/phpbarcode/class/BCGDrawing.php');
		require_once(PATH_APP . 'libraries/phpbarcode/class/BCGcode39.barcode.php');

		$font = new BCGFontFile(PATH_APP . 'libraries/phpbarcode/font/Arial.ttf', 8);
		$color_black = new BCGColor(0, 0, 0);
		$color_white = new BCGColor(255, 255, 255);

		$drawException = null;
		try {
		    $code = new BCGcode39();
		    $code->setScale(1);
		    $code->setThickness(30);
		    $code->setForegroundColor($color_black);
		    $code->setBackgroundColor($color_white);
		    $code->setFont($font);
		    $code->parse($string);
		} catch(Exception $exception) {
		    $drawException = $exception;
		}

		$drawing = new BCGDrawing('', $color_white);
		if($drawException) {
		    $drawing->drawException($drawException);
		} else {
		    $drawing->setBarcode($code);
		    $drawing->draw();
		}

		header('Content-Type: image/png');
		header('Content-Disposition: inline; filename="barcode.png"');
		$drawing->finish(BCGDrawing::IMG_FORMAT_PNG);
    }

    function barcode_qrcode($string) {
    	require_once(PATH_APP . 'libraries/phpqrcode/qrlib.php');
    	QRcode::png($string);
    }
}

?>