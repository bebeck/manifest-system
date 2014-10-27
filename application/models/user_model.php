<?php

class User_model extends CI_Model {

	function get_list() {
		$get = $this->db->get('USER_TABLE');
		return $get->result();
	}

	function get_by_id($user_id){
		$this->db->where('USER_ID',$user_id);
		$get = $this->db->get('USER_TABLE');
		if($get->num_rows() > 0) return $get->row();
		else return FALSE;
	}

	function check_username($username) {
		$this->db->where('LOWER(USERNAME)',strtolower($username));
		$get = $this->db->get('USER_TABLE');
		if($get->num_rows() == 0) return TRUE;
		else return FALSE;
	}

	function create_user($username,$password) {
		$this->db->set('USER_ID','USR' . $this->create_user_id());
		$this->db->set('USERNAME',$username);
		$this->db->set('PASSWORD',$password);
		$this->db->set('TYPE','User');
		$this->db->set('CREATE_DATE',date('Y-m-d h:i:s'));
		$this->db->set('LAST_ACTIVITY',date('Y-m-d h:i:s'));
		$this->db->insert('USER_TABLE');
	}

	function delete_user($user_id) {
		$this->db->where('USER_ID',$user_id);
		$this->db->delete('user_table');
	}

	function create_user_id(){
		$get = $this->db->count_all('USER_TABLE');
		$get = $get + 1;
		$len = strlen($get);
		switch ($len) {
			case '1': return '0000' . $get; break;
			case '2': return '000' . $get; break;
			case '3': return '00' . $get; break;
			case '4': return '0' . $get; break;			
			default: return $get; break;
		}
	}
}


?>