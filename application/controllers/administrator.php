<?php

class Administrator extends MY_Controller {
	
	
	function __construct(){
		parent::__construct();
	}

	function index() {
		$this->set_layout();
	}

	function manage_user() {

		$data = array('list_user' => $this->user_model->get_list());
		$this->set_layout('administrator/manage_user',$data);
	}

	function ajax($method = null) {
		switch ($method) {
			case 'add_user':
				$error = ''; $message = '';

				$this->form_validation->set_error_delimiters('<div>', '</div>');
				$this->form_validation->set_rules('username', 'Username', 'required|trim|alpha|min_length[5]|max_length[12]');
				$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[12]');
				if($this->form_validation->run() == TRUE) {
					if($this->user_model->check_username(set_value('username'))) {
						$this->user_model->create_user(set_value('username'),md5(set_value('password')));
						$message = 'User telah dibuat.';
					} else {
						$error = 'error';
						$message = 'Username Telah digunakan!';
					}
				} else {
					$error = 'error';
					$message = htmlspecialchars_decode(validation_errors());
				}
				echo json_encode(array('error'=>$error,'message'=>$message));
				break;
			case 'delete_user':
				$error = ''; $message = '';
				$USER_ID = $_POST['USER_ID'];
				if($this->user_model->get_by_id($USER_ID) != FALSE) {
					$this->user_model->delete_user($USER_ID);
					$message = 'User has been deleted';
				} else {
					$error = 'error';
					$message = 'Failed to delete!';
				}
				echo json_encode(array('error'=>$error,'message'=>$message));					
				break;
			default:
				# code...
				break;
		}
	}
}


?>