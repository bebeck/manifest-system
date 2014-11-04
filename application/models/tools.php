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
}

?>