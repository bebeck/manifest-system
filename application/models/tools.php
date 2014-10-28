<?php

class Tools extends CI_Model {
	
	function remove_tags_excel($string) {
		$string = str_ireplace('_x000D_', ' ',$string);
		$string = preg_replace('/[^A-Za-z0-9\-]/', ' ',$string);
		$string = str_ireplace('-', ' ',$string);
		$string = preg_replace('!\s+!', ' ',$string);
		return $string;
	}
}

?>