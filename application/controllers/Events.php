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
			$this->load->helper('form');
		}

		public function newEvents(){
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$status = "new";
			$data['events']=$this->events_model->getNewEvents($empID, $empRole, $status);
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				
			}else{
				$this->load->view("templates/header.php");
				
			}
			$this->load->view("templates/newEvents.php", $data);
			$this->load->view("templates/footer.php");

			
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
				
			}else{
				$this->load->view("templates/header.php");
				
			}
			$this->load->view("templates/canceledEvents.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function eventDetails(){
			$id = $this->session->userdata('currentEventID');
			$data['eventName'] =$this->events_model->getEventName($id);
			// get ALL available services for modal (add service)
			$data['servcs'] = $this->events_model->getServices();
			// get services availed for an event ONLY
			$data['avlServcs'] = $this->events_model->servcTransac($id);
			$data['eventDetail'] = $this->events_modal->getEventDetails($id);
			$empRole = $this->session->userdata('role');
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/eventNav.php", $data);
				
			}else{
				$this->load->view("templates/header.php");
				$this->load->view("templates/eventNav.php", $data);
				
				
			}
			$this->load->view("templates/eventDetails.php");
			$this->load->view("templates/footer.php");
		}

		public function eventEntourage(){
			$id = $this->session->userdata('currentEventID');
			$data['eventName'] =$this->events_model->getEventName($id);
			$data['entourageDet'] = $this->events_model->getEntourageDetails($id);
			$empRole = $this->session->userdata('role');
			$currentEvent = $this->session->userdata('currentEventID');
			$data['designs']=$this->events_model->getDesigns($currentEvent);
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/eventNav.php", $data);
				
			}else{
				
				$this->load->view("templates/header.php");
				$this->load->view("templates/eventNav.php", $data);
				
			}
			$this->load->view("templates/eventEntourage.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function eventDecors(){
			$eventid = $this->session->userdata('currentEventID');
			$decorid = $this->session->userdata('currentDecorID');
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$data['eventName'] =$this->events_model->getEventName($eventid);
			$data['eventDecors'] =$this->events_model->getDecors($eventid);
			$this->load->model('items_model');
			$data['allDecors'] = $this->items_model->getAllDecors();
			
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/eventNav.php", $data);
				
			}else{
				
				$this->load->view("templates/header.php");
				$this->load->view("templates/eventNav.php", $data);
				
			}
			$data['eventdecors'] = $this->events_model->getDecors($eventid);
			$this->load->view("templates/eventDecors.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function paymentAndExpences(){
			$currentEvent = $this->session->userdata('currentEventID');
			$data['eventName'] =$this->events_model->getEventName($currentEvent);
			$empRole = $this->session->userdata('role');
			$cid = $this->session->userdata('clientID');
			$data['payments']=$this->events_model->getPayments($currentEvent);
			$data['totalPayments']=$this->events_model->totalAmountPaid($currentEvent);
			$data['expenses']=$this->events_model->getExpenses($currentEvent);
			$data['totalExpenses']=$this->events_model->totalExpenses($currentEvent);
			$data['totalAmount']=$this->events_model->totalAmount($currentEvent);
			$data['balance']=$this->events_model->balance($currentEvent);
			$data['clientName']=$this->events_model->getClientName($cid);
			
			
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/eventNav.php", $data);
				
			}else{
				
				$this->load->view("templates/header.php");
				$this->load->view("templates/eventNav.php", $data);
				
			}
			$this->load->view("templates/paymentAndExpences.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function appointments(){
			$currentEvent = $this->session->userdata('currentEventID');
			$data['eventName'] =$this->events_model->getEventName($currentEvent);
			$empRole = $this->session->userdata('role');
			
			
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/eventNav.php", $data);
				
			}else{
				
				$this->load->view("templates/header.php");
				$this->load->view("templates/eventNav.php", $data);
				
			}
			$this->load->view("templates/appointments.php");
			$this->load->view("templates/footer.php");
		}

		/*public function deleteDecor(){
			$decId = $this->session->userdata('currentDecorID');
			$eId = $this->session->userdata('currentEventID');
			$this->events_model->deleteEvntDecor($decId, $eId);
			$this->eventDecors();
		}*/ // nasa setCurrentDecorID() din tu

		/*
			Code for setting current event ID
			This code will only be executed when the info button of events is clicked

			This function will only set the current event ID value..
			it will then call the evenDetails function to display the event details page
		*/

		public function setEventID(){
			$currentEventID = $this->input->post('eventInfo');
			$currentClientID = $this->input->post('clientID');
			$this->session->set_userdata('currentEventID', $currentEventID);
			$this->session->set_userdata('clientID', $currentClientID);

			$this->eventDetails();
		}

		public function addPayment(){
			
			$date = $this->input->post('date');
			$time = $this->input->post('time');
			$amount = $this->input->post('amount');
			$currentEventID = $this->session->userdata('currentEventID');

			$empID = $this->session->userdata('employeeID');
			$clientID = $this->session->userdata('clientID');
			$this->events_model->addEventPayment($clientID, $empID, $currentEventID, $date, $time, $amount);
			

			redirect('events/paymentAndExpences');

		}

		public function addExpenses(){
			$date = $this->input->post('date');
			$amount = $this->input->post('expenseAmount');
			$name = $this->input->post('expenseName');
			$image = $this->input->post('expenseImage');
			$rNum = $this->input->post('receiptNumber');
			$currentEventID = $this->session->userdata('currentEventID');
			$empID = $this->session->userdata('employeeID');
			$this->events_model->addEventExpenses($empID, $currentEventID, $name, $date, $amount, $rNum, $image);

			redirect('events/paymentAndExpences');
		}

		public function setCurrentDecorID(){
			$currentDecorID = $this->input->post('decorID');
			$this->session->set_userdata('currentDecorID', $currentDecorID);
			
			$decId = $this->session->userdata('currentDecorID');
			$eId = $this->session->userdata('currentEventID');
			$this->events_model->deleteEvntDecor($decId, $eId);

			$this->eventDecors();			
		}

		/*
		public function setEntourageID(){
			$currentEntId = $this->input->post('entInfo');
			$this->session->set_userdata('currentEntId', $currentEntId);
			$this->eventEntourage();
		}*/

		public function removeEntourage(){
			$currentEntID = $this->input->post('entourageID');
			$this->session->set_userdata('currentEntID', $currentEntID);

			$entID = $this->session->userdata('currentEntID');
			$evID = $this->session->userdata('currentEventID');
			$this->events_model->deleteEntourage($entID, $evID);

			$this->eventEntourage();
		}

		public function changeDecor(){
			$eId = $this->session->userdata('currentEventID');
			$decId = $this->session->userdata('currentDecorID');

			$this->decors();
		}

		public function addEvent(){

			$clientName = $this->input->post('client-name');
			$clientContact = $this->input->post('contact-number');

			$newClientID = $this->events_model->addClient($clientName, $clientContact);

			$eventName = $this->input->post('event-name');
			$celebrantName = $this->input->post('celebrant');
			$location = $this->input->post('event-loc');
			$date = $this->input->post('event-date');
			$time = $this->input->post('event-time');
			$package = $this->input->post('package');
			$motiff = $this->input->post('motiff');
			$type = $this->input->post('event-type');
			$newEventID = $this->events_model->addEvent($newClientID, $eventName, $celebrantName, $location, $date, $time, $motiff, $package, $type);

			$this->ongoingEvents();

		}
	}

?>