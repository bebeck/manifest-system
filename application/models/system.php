<?php

class System extends CI_Model {
	
	
	function check_login($username,$password) {
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$get = $this->db->get('users');
		if($get->num_rows() > 0) return TRUE;
		else return FALSE;
	}

	function set_session_login($username) {
		$session = array('login'=>TRUE,'user'=>$username, 'time'=>time(), 'ip'=>$this->input->ip_address());
		$this->session->set_userdata($session);
	}

	function remove_session_login($username) {
		$session = array('login'=>FALSE,'user'=>'', 'time'=>'', 'ip'=>'');
		$this->session->unset_userdata($session);
	}

}

?>