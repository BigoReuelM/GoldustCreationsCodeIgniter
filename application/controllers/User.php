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
			$this->load->model('notifications_model');
			$this->load->model('events_model');
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->helper('file');

		}
		//WILL LOAD THE REGISTRATION VIEW
		public function index()
		{
			$headdata['pagename'] = 'Welcome | Login';	
			
			$this->load->view("login.php", $headdata);
		}
		
		//method for user to login to his/her account
		function login_user(){

			$username = trim(html_escape($this->input->post('username')));
			$password = trim(html_escape($this->input->post('password')));

			if (empty($username)) {
				$this->session->set_flashdata('error_msg', 'Username field should not be empty!');
				redirect('user/index');
			}

			if (empty($password)) {
				$this->session->set_flashdata('error_msg', 'Password field should not be empty!');
				redirect('user/index');
			}

			$data=$this->user_model->login_user($username,$password);
			if($data)
			{
				$this->session->set_userdata('employeeID',$data['employeeID']);
				$this->session->set_userdata('firstName',$data['firstName']);
				$this->session->set_userdata('midName',$data['midName']);
				$this->session->set_userdata('lastName',$data['lastName']);
				$this->session->set_userdata('address',$data['address']);
				$this->session->set_userdata('email',$data['email']);
				$this->session->set_userdata('photo',$data['photo']);
				$this->session->set_userdata('username',$data['username']);
				$this->session->set_userdata('contactNumber',$data['contactNumber']);
				$this->session->set_userdata('role',$data['role']);
				$this->session->set_userdata('allowed_idle_time', 6000);
				$this->session->set_userdata('last_acted_on', time());

				if ($data['role'] === "admin") {
					$this->session->set_userdata('sidebarControl', "0");
					redirect('admin');
				}else{
					redirect('handler');
				}

			}
			else{
				$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
				redirect('user/index');
			}

		}
		//user-profile loader

		public function changePassword(){
			$username = html_escape($this->input->post('username'));
			$pin = html_escape($this->input->post('pin'));

			$this->user_model->resetPasstoDefault($username, $pin);

			$this->session->set_flashdata('success_msg', 'Password reset to default.');
			redirect('user/index');
		}
		
		public function user_profile(){

			$userID = $this->session->userdata("employeeID");
			$empRole = $this->session->userdata('role');
			$data['employee'] = $this->user_model->getProfile($userID);
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			$data['currentEventNum'] = $this->events_model->currentEventNum($userID);
			$data['doneEvent'] = $this->events_model->doneEventNum($userID);
			$data['allTransac'] = $this->events_model->allTransacNum($userID);
			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'User Profile| Admin';	
			}else{
				$headdata['pagename'] = 'User Profile | Handler';
			}
			$this->load->view("templates/head.php", $headdata);
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php", $notif);
				$this->load->view("templates/adminNavbar.php");
				
			}else{
				$this->load->view("templates/header.php", $notif);
				
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
				$fname = ucwords(html_escape($this->input->post('fname')));
				$mname = ucwords(html_escape($this->input->post('mname')));
				$lname = ucwords(html_escape($this->input->post('lname')));
				$cNum = html_escape($this->input->post('cNum'));
				$emailAdd = html_escape($this->input->post('emailAdd'));
				$homeAdd = ucwords(html_escape($this->input->post('homeAdd')));

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

				$newPassword = html_escape($this->input->post('newPassword'));

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

			$this->form_validation->set_rules('newUsername', 'Username', 'trim|required|callback_usernameMatches');
			$this->form_validation->set_rules('usernameConfirmation', 'Username Confirmation', 'trim|required|matches[newUsername]');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {

				$newUsername = html_escape($this->input->post('newUsername'));

				$this->user_model->updateUserUsername($id, $newUsername);

				$data['success'] = true;
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}
			echo json_encode($data);
		}

		public function usernameMatches($username){
			if(!$this->user_model->checkUsernameAvailability($username)){
				$this->form_validation->set_message('usernameMatches', 'This username is already taken.');
				return false;
			}
			return true;
		}

		public function password_matches($pass, $empID){
			
			$password = $this->user_model->getPassword($empID);

			if (!password_verify($pass, $password->password)){
				$this->form_validation->set_message('password_matches', 'The password you supplied does not match your existing password. ');
				return FALSE;
			}

			return TRUE;
		}

		public function uploadProfilePhoto(){
			$userID = $this->input->post('userID');
			$userFilePath = './uploads/profileImage/' . $userID . ".*";
			$path = glob($userFilePath);
			if (!empty($path)) {
				unlink($path[0]);
			}
			$config['upload_path'] = './uploads/profileImage/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['file_name'] = $userID;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$data = array('upload_data' => $this->upload->data());
			redirect('user/user_profile');
			
		}

	}
	
	?>