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
	}
	
?>