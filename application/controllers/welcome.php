<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		if($this->session->userdata('login') == TRUE) redirect(base_url('home'));

		$this->set_page('auth/login');		
	}

	function home() {
		$this->set_layout(null);
	}

	function login(){
		if($this->session->userdata('login') == TRUE) redirect(base_url('home'));

		if(isset($_POST)) {
			$username = $_POST['username'];
			$password = md5($_POST['password']);

			if($this->system->check_login($username,$password)) {
				$this->system->set_session_login($username);
				$status = 0;
			} else {
				$status = 1;
			}
			echo json_encode(array('status' => $status, 'redirect' => base_url('home')));
		} else {
			redirect(base_url('home'));
		}
	}

	function logout() {
		$this->system->remove_session_login();
		redirect('');
	}
}

?>