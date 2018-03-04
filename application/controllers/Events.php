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
			$data['services']=$this->events_model->getServices();
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
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$status = "finished";
			$data['events']=$this->events_model->getEvents($empID, $empRole, $status);
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/eventNav.php");
				
			}else{
				$this->load->view("templates/header.php");
				
			}
			$this->load->view("templates/finishedEvents.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function canceledEvents(){
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$status = "cancelled";
			$data['events']=$this->events_model->getEvents($empID, $empRole, $status);
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/eventNav.php");
				
			}else{
				$this->load->view("templates/header.php");
				
			}
			$this->load->view("templates/canceledEvents.php", $data);
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
				$this->load->view("templates/header.php");
				$this->load->view("templates/eventNav.php");
				
				
			}
			$this->load->view("templates/eventDetails.php");
			$this->load->view("templates/footer.php");
		}

		public function eventEntourage(){
			$empRole = $this->session->userdata('role');
			$currentEvent = $this->session->userdata('currentEventID');
			$data['designs']=$this->events_model->getDesigns($currentEvent);
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/eventNav.php");
				
			}else{
				
				$this->load->view("templates/header.php");
				$this->load->view("templates/eventNav.php");
				
			}
			$this->load->view("templates/eventEntourage.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function eventDecors(){
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/eventNav.php");
				
			}else{
				
				$this->load->view("templates/header.php");
				$this->load->view("templates/eventNav.php");
				
			}
			$data['eventdecors'] = $this->events_model->getDecors($empID);
			$this->load->view("templates/eventDecors.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function paymentAndExpences(){
			$empRole = $this->session->userdata('role');
			$currentEvent = $this->session->userdata('currentEventID');
			$data['payments']=$this->events_model->getPayments($currentEvent);

			$data['expenses']=$this->events_model->getExpenses($currentEvent);
			
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/eventNav.php");
				
			}else{
				
				$this->load->view("templates/header.php");
				$this->load->view("templates/eventNav.php");
				
			}
			$this->load->view("templates/paymentAndExpences.php", $data);
			$this->load->view("templates/footer.php");
		}


		/*
			Code for setting current event ID
			This code will only be executed when the info button of events is clicked

			This function will only set the current event ID value..
			it will then call the evenDetails function to display the event details page
		*/
		public function setEventID(){
			$currentEventID = $this->input->post('eventInfo');
			$this->session->set_userdata('currentEventID', $currentEventID);

			$this->eventDetails();
		}

	}

?>