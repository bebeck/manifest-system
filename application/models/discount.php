<?php

class Discount extends CI_Model {
	
	function get_list($user_id) {
		$this->db->where('user_id',$user_id);
		$get = $this->db->get('discount_table');
		if($get->num_rows() > 0) return $get->result();
		else return false;
	}

	function set_discount($discount) {
		$this->db->insert('discount_table',$discount);
	}
}

?>