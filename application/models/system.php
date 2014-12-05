<?php

class System extends CI_Model {
	
	
	function check_login($username,$password) {
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$get = $this->db->get('user_table');
		if($get->num_rows() > 0) return $get->row();
		else return FALSE;
	}

	function set_session_login($user) {
		$session = array('login'=>TRUE,'user_id'=>$user->user_id,'username'=>$user->username,'user_type'=>$user->type,'time'=>time(), 'ip'=>$this->input->ip_address());
		$this->session->set_userdata($session);
	}

	function remove_session_login() {
		$session = array('login'=>'','user_id'=>'','username'=>'', 'time'=>'', 'ip'=>'');
		$this->session->set_userdata($session);
	}

}

?>