<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/
	class Events extends CI_Controller
	{


		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('events_model');
			$this->load->library('session');
		}

		public function ongoingEvents(){
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$status = "on-going";
			$data['events']=$this->events_model->getEvents($empID, $empRole, $status);
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/eventNav.php");
				
			}else{
				$this->load->view("templates/header.php");
				
			}
			$this->load->view("templates/ongoingEvents.php", $data);
			$this->load->view("templates/footer.php");

			
		}

		public function finishedEvents(){
			$empRole = $this->session->userdata('role');
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/eventNav.php");
				
			}else{
				$this->load->view("templates/header.php");
				
			}
			$this->load->view("templates/finishedEvents.php");
			$this->load->view("templates/footer.php");
		}

		public function canceledEvents(){
			$empRole = $this->session->userdata('role');
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/eventNav.php");
				
			}else{
				$this->load->view("templates/header.php");
				
			}
			$this->load->view("templates/canceledEvents.php");
			$this->load->view("templates/footer.php");
		}

		public function eventDetails(){

			$empRole = $this->session->userdata('role');
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/eventNav.php");
				
			}else{
				$this->load->view("templates/eventNav.php");
				$this->load->view("templates/header.php");
				
			}
			$this->load->view("templates/eventDetails.php");
			$this->load->view("templates/footer.php");
		}

		public function eventEntourage(){
			$empRole = $this->session->userdata('role');
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/eventNav.php");
				
			}else{
				$this->load->view("templates/eventNav.php");
				$this->load->view("templates/header.php");
				
			}
			$this->load->view("templates/eventEntourage.php");
			$this->load->view("templates/footer.php");
		}

		public function eventDecors(){
			$empRole = $this->session->userdata('role');
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/eventNav.php");
				
			}else{
				$this->load->view("templates/eventNav.php");
				$this->load->view("templates/header.php");
				
			}
			$this->load->view("templates/eventDecors.php");
			$this->load->view("templates/footer.php");
		}

		public function paymentAndExpences(){
			$empRole = $this->session->userdata('role');
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/eventNav.php");
				
			}else{
				$this->load->view("templates/eventNav.php");
				$this->load->view("templates/header.php");
				
			}
			$this->load->view("templates/paymentAndExpences.php");
			$this->load->view("templates/footer.php");
		}

		function displayOngoingEvents(){
			
		}
	}

?>