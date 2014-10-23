<?php

class System extends CI_Model {
	
	
	function check_login($username,$password) {
		$this->db->where('USERNAME',$username);
		$this->db->where('PASSWORD',$password);
		$get = $this->db->get('USER_TABLE');
		if($get->num_rows() > 0) return $get->row();
		else return FALSE;
	}

	function set_session_login($user) {
		$session = array('login'=>TRUE,'user_id'=>$user->USER_ID,'username'=>$user->USERNAME, 'time'=>time(), 'ip'=>$this->input->ip_address());
		$this->session->set_userdata($session);
	}

	function remove_session_login($username) {
		$session = array('login'=>FALSE,'user'=>'', 'time'=>'', 'ip'=>'');
		$this->session->unset_userdata($session);
	}

}

?>