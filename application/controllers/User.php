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
		//CHECK IF CREDENTIALS EXIST, IF NOT? REGISTER NEW USER
		/*
		public function register_user(){
 
		    $user=array(
		    'user_name'=>$this->input->post('user_name'),
		    'user_email'=>$this->input->post('user_email'),
		    'user_password'=>md5($this->input->post('user_password')),
		    'user_age'=>$this->input->post('user_age'),
		    'user_mobile'=>$this->input->post('user_mobile')
		    );
		        
		    print_r($user);
 
			$email_check=$this->user_model->email_check($user['user_email']);
			 
			if($email_check){
			  $this->user_model->register_user($user);
			  $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
			  redirect('user/login_view');
			 
			}
			else{
			 
			  $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
			  redirect('user');
			 
			 
			}
		 
		}*/
		
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
		/*
		function user_profile(){
 
			$this->load->view('user_profile.php');
 
		}
		*/
		//user logout, session destroy
		public function user_logout(){
 
  			$this->session->sess_destroy();
  			redirect('user/index', 'refresh');
		}
	}
	
?>