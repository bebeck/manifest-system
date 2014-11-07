<?php

class Qr_code extends CI_Model {

	function __construct(){
		parent::__construct();
		include PATH_APP . 'libraries/phpqrcode/qrlib.php';
	}

	function generate($data_id,$content = null) {
		$fileName = 'DATA_'.$data_id.'.png';

		$pngAbsoluteFilePath = PATH_QRCODE.$fileName;
		$pngAbsoluteFilePath = PATH_QRCODE.$fileName;

		if (!file_exists($pngAbsoluteFilePath)) {
			QRcode::png($content, $pngAbsoluteFilePath);
		}
	}
}

?>