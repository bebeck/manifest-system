<?php

class Download extends MY_Controller {
	
	function __construct(){
		parent::__construct();
		include PATH_APP . 'libraries/phpqrcode/qrlib.php';
	}

	function index(){
		$this->load->view('download/airwaybill');
	}

	function qr_code(){
		// how to save PNG codes to server
		$tempDir = PATH_ATTACH;
		for ($i=0; $i < 5; $i++) { 
			# code...
			$codeContents = 'This Goes From File';
			$fileName = '005_file_'.$i.'.png';
			$pngAbsoluteFilePath = $tempDir.$fileName;
			$urlRelativeFilePath = PATH_ATTACH.$fileName;
			if (!file_exists($pngAbsoluteFilePath)) {
			QRcode::png($codeContents, $pngAbsoluteFilePath);
			echo 'File generated!';
			echo '<hr />';
			} else {
			echo 'File already generated! We can use this cached file to speed up site on common codes!';
			echo '<hr />';
			}
			echo 'Server PNG File: '.$pngAbsoluteFilePath;
			echo '<hr />';
			// displaying
			echo '<img src="'.$urlRelativeFilePath.'" />'; 
		}
	}
}

?>