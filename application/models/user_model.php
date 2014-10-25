<?php

class User_model extends CI_Model {

	function get_by_id($user_id){
		$this->db->where('USER_ID',$user_id);
		$get = $this->db->get('USER_TABLE');
		return $get->row();
	}

}


?>