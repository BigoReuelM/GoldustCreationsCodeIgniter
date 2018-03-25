<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	* 
	*/
	class User extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('user_model');
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->library('form_validation');

		}
		//WILL LOAD THE REGISTRATION VIEW
		public function index()
		{
			$this->load->view("templates/head.php");
			$this->load->view("login.php");
		}
		
		//method for user to login to his/her account
		function login_user(){
		  	$user_login=array(
		 
		  		'username'=>$this->input->post('username'),
		  		'password'=>$this->input->post('password')
		 
		    );
		 
		    $data=$this->user_model->login_user($user_login['username'],$user_login['password']);
		      	if($data)
		      	{
		        	$this->session->set_userdata('employeeID',$data['employeeID']);
		        	$this->session->set_userdata('employeeName',$data['employeeName']);
		        	$this->session->set_userdata('address',$data['address']);
		        	$this->session->set_userdata('email',$data['email']);
		        	$this->session->set_userdata('photo',$data['photo']);
		 			$this->session->set_userdata('username',$data['username']);
		 			$this->session->set_userdata('password',$data['password']);
		 			$this->session->set_userdata('employeeContactNumber',$data['employeeContactNumber']);
		 			$this->session->set_userdata('role',$data['role']);

		 			if ($data['role'] === "admin") {
		 				$this->session->set_userdata('sidebarControl', "0");
		 				redirect('admin');
		 			}else{
		 				redirect('handler');
		 			}
		 
		      	}
		      	else{
		        	$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
		        	$this->load->view("templates/head.php");
		       		$this->load->view("login.php");
		 
		      	}


		 
		}
		//user-profile loader
		
		public function user_profile(){

			$userID = $this->session->userdata("employeeID");
			$empRole = $this->session->userdata('role');
			$data['employee'] = $this->user_model->getProfile($userID);

			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				
			}else{
				$this->load->view("templates/header.php");
				
			}
			$this->load->view("templates/profile.php", $data);
			$this->load->view("templates/footer.php");
 
		}
		
		//user logout, session destroy
		public function user_logout(){
 
  			$this->session->sess_destroy();
  			redirect('user/index', 'refresh');
		}

		public function updateProfile(){
			$id= $this->session->userdata('employeeID');

			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('fname', 'First Name', 'trim');
			$this->form_validation->set_rules('mname', 'Middle Name', 'trim');
			$this->form_validation->set_rules('lname', 'Last Name', 'trim');
			$this->form_validation->set_rules('cNum', 'Contact Number', 'trim');
			$this->form_validation->set_rules('emailAdd', 'Email Address', 'trim|valid_email');
			$this->form_validation->set_rules('homeAdd', 'Home Address', 'trim');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$fname = $this->input->post('fname');
				$mname = $this->input->post('mname');
				$lname = $this->input->post('lname');
				$cNum = $this->input->post('cNum');
				$emailAdd = $this->input->post('emailAdd');
				$homeAdd = $this->input->post('homeAdd');

				if (!empty($fname)) {
					$this->user_model->updateUserFirstname($id, $fname);
				}
				if (!empty($mname)) {
					$this->user_model->updateUserMiddlename($id, $mname);
				}
				if (!empty($lname)) {
					$this->user_model->updateUserLastname($id, $lname);
				}
				if (!empty($cNum)) {
					$this->user_model->updateUserCnum($id, $cNum);
				}
				if (!empty($emailAdd)) {
					$this->user_model->updateUserEmail($id, $emailAdd);
				}
				if (!empty($homeAdd)) {
					$this->user_model->updateUserHomeadd($id, $homeAdd);
				}

				$data['success'] = true;
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}

			echo json_encode($data);

		}

		public function changeUserPassword(){
			$id= $this->session->userdata('employeeID');

			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('oldPassword', 'Current Password', 'trim|required|callback_password_matches['. $id . ']');
			$this->form_validation->set_rules('newPassword', 'New Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('passConfirmation', 'Password Confirmation', 'trim|required|matches[newPassword]');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {

				$newPassword = $this->input->post('newPassword');

				$this->user_model->updateUserPassword($id, $newPassword);

				$data['success'] = true;
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}
			echo json_encode($data);
		}

		public function changeUserUsername(){
			$id= $this->session->userdata('employeeID');

			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('newUsername', 'Username', 'trim|required|is_unique[employees.username]');
			$this->form_validation->set_rules('usernameConfirmation', 'Username Confirmation', 'trim|required|matches[newUsername]');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {

				$newUsername = $this->input->post('newUsername');

				$this->user_model->updateUserUsername($id, $newUsername);

				$data['success'] = true;
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}
			echo json_encode($data);
		}

		public function password_matches($pass, $empID){
			
			$password = $this->user_model->getPassword($empID);

			if ($password->password !== $pass){
			    $this->form_validation->set_message('password_matches', 'The password you supplied does not match your existing password. ');
			    return FALSE;
			}

			return TRUE;
		}

	}
	
?>