<?php

class System extends CI_Model {
	
	function __construct(){
		parent::__construct();
		$this->load->library('user_agent');	
	}
	
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
	
	function set_activity($activity = null){
		$this->db->set('activity_id',time());
		$this->db->set('user_id',$this->session->userdata('user_id'));
		$this->db->set('date',date('Y-m-d h:i:s'));
		$this->db->set('ip_address',$this->input->ip_address());
		$this->db->set('browser',$this->agent->browser());
		$this->db->set('activity',$activity);
		$this->db->set('request',(isset($_REQUEST)) ? json_encode($_REQUEST) : null);
		$this->db->insert('activity_user_table');
	}

}

?>