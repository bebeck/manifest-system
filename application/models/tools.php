<?php

class Tools extends CI_Model {
	
	function get_kurs() {
		$this->db->where('name','kurs');
		$get = $this->db->get('tools_table');
		return $get->row()->value;
	}
	function update_kurs($kurs){
		$this->db->where('name','kurs');
		$this->db->set('value',$kurs);
		$this->db->update('tools_table');
	}


	function remove_tags_excel($string) {
		$string = str_ireplace('_x000D_', ' ',$string);
		$string = preg_replace('/[^A-Za-z0-9\-]/', ' ',$string);
		$string = str_ireplace('-', ' ',$string);
		$string = preg_replace('!\s+!', ' ',$string);
		return $string;
	}

	function rounded($num) {
		$exp = explode('.', $num);
		if(is_array($exp) && count($exp) == 2) {
			if(is_numeric($exp[0]) && is_numeric($exp[1])) {
				if(end($exp) >= 1 && end($exp) <= 5) {
					return $exp[0].'.5';
				} else if(end($exp) >= 6 && end($exp) <= 9) {
					return $exp[0] + 1 . '.0';
				}
			} return $num;
		} return $num;
	}
}

?>