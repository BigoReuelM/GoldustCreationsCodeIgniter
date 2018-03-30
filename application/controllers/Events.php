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
		$this->load->model('notifications_model');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function newEvents(){
		$empID = $this->session->userdata('employeeID');
		$empRole = $this->session->userdata('role');
		$status = "new";
		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'New Events | Admin';	
		}else{
			$headdata['pagename'] = 'New Events | Handler';
		}

		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$data['events']=$this->events_model->getNewEvents($empID, $empRole, $status);
		$data['services']=$this->events_model->getServices();
		$this->load->view("templates/head.php", $headdata);
		if ($empRole === 'admin') {
			
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("templates/eventNavigation.php");
			
		}else{
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNavigation.php");
			
		}
		$this->load->view("templates/newEvents.php", $data);
		$this->load->view("templates/footer.php");

		
	}


	public function ongoingEvents(){
		$empID = $this->session->userdata('employeeID');
		$empRole = $this->session->userdata('role');
		$status = "on-going";
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$data['events']=$this->events_model->getEvents($empID, $empRole, $status);
		$data['services']=$this->events_model->getServices();
		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'Ongoing Events | Admin';	
		}else{
			$headdata['pagename'] = 'Ongoing Events | Handler';
		}

		$this->load->view("templates/head.php", $headdata);
		if ($empRole === 'admin') {
			
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("templates/eventNavigation.php");
			
		}else{
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNavigation.php");
			
		}
		$this->load->view("templates/ongoingEvents.php", $data);
		$this->load->view("templates/footer.php");

		
	}

	public function finishedEvents(){
		$empID = $this->session->userdata('employeeID');
		$empRole = $this->session->userdata('role');
		$status = "finished";
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$data['events']=$this->events_model->getEvents($empID, $empRole, $status);
		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'Finished Events | Admin';	
		}else{
			$headdata['pagename'] = 'Finished Events | Handler';
		}
		$this->load->view("templates/head.php", $headdata);
		if ($empRole === 'admin') {
			
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("templates/eventNavigation.php");
			
		}else{
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNavigation.php");
			
		}
		$this->load->view("templates/finishedEvents.php", $data);
		$this->load->view("templates/footer.php");
	}

	public function canceledEvents(){
		$empID = $this->session->userdata('employeeID');
		$empRole = $this->session->userdata('role');
		$status = "cancelled";
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$data['events']=$this->events_model->getEvents($empID, $empRole, $status);
		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'Cancelled Events | Admin';	
		}else{
			$headdata['pagename'] = 'Cancelled Events | Handler';
		}
		$this->load->view("templates/head.php", $headdata);
		if ($empRole === 'admin') {
			
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("templates/eventNavigation.php");
			
		}else{
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNavigation.php");
			
		}
		$this->load->view("templates/canceledEvents.php", $data);
		$this->load->view("templates/footer.php");
	}

	public function eventDetails(){
		$id = $this->session->userdata('currentEventID');
		$clientID = $this->session->userdata('clientID');
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$data['eventName'] = $this->events_model->getEventName($id);
		$data['eventDetail'] = $this->events_model->getEventDetails($id, $clientID);
		$data['themes'] = $this->events_model->getThemes();
		$data['handlers'] = $this->events_model->getHandlers();
		$data['currentHandler'] = $this->events_model->getCurrentHandler($id);
		$data['totalAmount'] = $this->events_model->totalAmount($id);
		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'Event Details | Admin';	
		}else{
			$headdata['pagename'] = 'Event Details | Handler';
		}
		
		$empRole = $this->session->userdata('role');
		$this->load->view("templates/head.php", $headdata);
		if ($empRole === 'admin') {
			
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("templates/eventNav.php");
			
		}else{
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNav.php");			
		}
		$this->load->view("templates/eventDetails.php", $data);
		$this->load->view("templates/footer.php");
	}

	public function addAdditionalCharges(){

		$data = array('success' => false, 'messages' => array());

		$this->form_validation->set_rules('additionalCharge', 'Amount', 'trim|required|numeric|greater_than_equal_to[0]');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if($this->form_validation->run()){
			$amount = html_escape($this->input->post('additionalCharge'));
			$eID = html_escape($this->input->post('eventID'));

			$totalAmount = $this->events_model->totalAmount($eID);
			$newTotalAmount = $totalAmount->totalAmount + $amount;
			$this->events_model->updateTotalAmount($newTotalAmount, $eID);

			$data['success'] = true;
		}else{
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($data);

	}

	public function eventStaff(){
		$empRole = $this->session->userdata('role');
		$id = $this->session->userdata('currentEventID');
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$data['eventStaff'] = $this->events_model->getStaff($id);
		$data['allStaff'] = $this->events_model->showAllStaff();
		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'Event Staff | Admin';	
		}else{
			$headdata['pagename'] = 'Event Staff | Handler';
		}
		$this->load->view("templates/head.php", $headdata);
		if ($empRole === 'admin') {
			
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("templates/eventNav.php");
			
		}else{
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNav.php");			
		}
		$this->load->view("templates/eventStaff.php", $data);
		$this->load->view("templates/footer.php");

	}

	public function eventServices(){
		$id = $this->session->userdata('currentEventID');
		$empRole = $this->session->userdata('role');
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$data['servcs'] = $this->events_model->getServices();
		$data['avlServcs'] = $this->events_model->servcTransac($id);
		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'Event Services | Admin';	
		}else{
			$headdata['pagename'] = 'Event Services | Handler';
		}
		
		$this->load->view("templates/head.php",$headdata);
		if ($empRole === 'admin') {
			
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("templates/eventNav.php");
			
		}else{
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNav.php");			
		}
		$this->load->view("templates/eventServices.php", $data);
		$this->load->view("templates/footer.php");

	}

	public function eventEntourage(){
		$id = $this->session->userdata('currentEventID');
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$data['eventName'] = $this->events_model->getEventName($id);
		$data['entourageDet'] = $this->events_model->getEntourageDetails($id);
		$data['entourage'] = $this->events_model->getEntourage($id);
		$empRole = $this->session->userdata('role');
		$currentEvent = $this->session->userdata('currentEventID');
		$data['designs']= $this->events_model->getDesigns($currentEvent);
		$data['entourageRole'] = $this->events_model->getEntourageRole();
		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'Event Entourage | Admin';	
		}else{
			$headdata['pagename'] = 'Event Entourage | Handler';
		}
		$this->load->view("templates/head.php", $headdata);
		if ($empRole === 'admin') {
			
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("templates/eventNav.php", $data);
			
		}else{
			
			$this->load->view("templates/header.php", $notif);
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
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$data['eventName'] =$this->events_model->getEventName($eventid);
		$data['eventDecors'] =$this->events_model->getDecors($eventid);
		$this->load->model('items_model');
		$data['allDecors'] = $this->items_model->getAllDecors();
		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'Event Decorations | Admin';	
		}else{
			$headdata['pagename'] = 'Event Decorations | Handler';
		}
		
		$this->load->view("templates/head.php", $headdata);
		if ($empRole === 'admin') {
			
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("templates/eventNav.php", $data);
			
		}else{
			
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNav.php", $data);
			
		}
		$data['eventdecors'] = $this->events_model->getDecors($eventid);
		$this->load->view("templates/eventDecors.php", $data);
		$this->load->view("templates/footer.php");
	}

	public function payment(){
		$currentEvent = $this->session->userdata('currentEventID');
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$data['eventName'] =$this->events_model->getEventName($currentEvent);
		$empRole = $this->session->userdata('role');
		$cid = $this->session->userdata('clientID');
		$data['payments']=$this->events_model->getPayments($currentEvent);
		$totalPayments = $this->events_model->totalAmountPaid($currentEvent);
		$totalAmount = $this->events_model->totalAmount($currentEvent);
		$data['totalPayments'] = $totalPayments;
		$data['totalAmount'] = $totalAmount;		
		$data['balance'] = $totalAmount->totalAmount - $totalPayments->total;
		$data['clientName']=$this->events_model->getClientName($cid);
		$data['receiver']=$this->events_model->getPaymentReceiver($currentEvent);
		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'Payments | Admin';	
		}else{
			$headdata['pagename'] = 'Payments | Handler';
		}
		
		$this->load->view("templates/head.php", $headdata);
		if ($empRole === 'admin') {
			
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("templates/eventNav.php", $data);
			
		}else{
			
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNav.php", $data);
			
		}
		$this->load->view("templates/payment.php", $data);
		$this->load->view("templates/footer.php");
	}

	public function appointments(){
		$currentEvent = $this->session->userdata('currentEventID');
		$empRole = $this->session->userdata('role');
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();


		$data['eventName'] = $this->events_model->getEventName($currentEvent);
		$data['appointments'] = $this->events_model->getAppointments($currentEvent);
		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'Appointments | Admin';	
		}else{
			$headdata['pagename'] = 'Appointments | Handler';
		}

		
		$this->load->view("templates/head.php", $headdata);
		if ($empRole === 'admin') {
			
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("templates/eventNav.php", $data);
			
		}else{
			
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNav.php", $data);
			
		}
		$this->load->view("templates/appointments.php", $data);
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
				$currentEventID = html_escape($this->input->post('eventInfo'));
				$currentClientID = html_escape($this->input->post('clientID'));
				$currentEventStatus = html_escape($this->input->post('eventStatus'));
				$empRole = $this->session->userdata('role');
				$this->session->set_userdata('currentEventID', $currentEventID);
				$this->session->set_userdata('clientID', $currentClientID);
				if ($currentEventStatus === "new" & $empRole === "handler") {
					$this->events_model->updateEventStatus($currentEventID);
				}
				redirect('events/eventDetails');
			}

			public function addPayment(){
				$eventID = $this->session->userdata('currentEventID');
				$empID = $this->session->userdata('employeeID');
				$clientID = $this->session->userdata('clientID');

				$data = array('success' => false, 'messages' => array(), 'paymentID' => null, 'balance' => false, 'balanceAmount' => 0);

				$totalAmount = $this->events_model->totalAmount($eventID);
				$totalAmountPaid = $this->events_model->totalAmountPaid($eventID);

				$eventBalance = $totalAmount->totalAmount - $totalAmountPaid->total; 

				if ($eventBalance > 0) {
					$data['balance'] = true;
					$data['balanceAmount'] = $eventBalance;
				}

				$this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|less_than_equal_to[' . $eventBalance . ']|greater_than_equal_to[0]');
				$this->form_validation->set_message('greater_than_equal_to', 'The amount must be greater than 0.');

				$this->form_validation->set_rules('date', 'Payment Date', 'trim|required');
				$this->form_validation->set_rules('time', 'Payment Time', 'trim|required');
				$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

				if ($this->form_validation->run()) {
					$date = html_escape($this->input->post('date'));
					$time = html_escape($this->input->post('time'));
					$amount = html_escape($this->input->post('amount'));
					
					$paymentID = $this->events_model->addEventPayment($clientID, $empID, $eventID, $date, $time, $amount);

					$data['paymentID'] = $paymentID;

					$data['success'] = true;
					
				}else{
					foreach ($_POST as $key => $value) {
						$data['messages'][$key] = form_error($key);
					}
				}

				echo json_encode($data);
				
			}


		// set and delete selected decor...
			public function setCurrentDecorID(){
				$currentDecorID = html_escape($this->input->post('decorID'));
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

		// remove staff from event
		/*public function rmvStaff(){
			$svcStaff = $this->input->post('evtstaffdlt');
			$this->session->set_userdata('currrentSvcStaff', $svcStaff);

			$svcstaffID = $this->session->userdata('currrentSvcStaff');
			$eId = $this->session->userdata('currentEventID');
			
			$this->eventDetails();
		}*/

		public function removeEntourage(){
			$currentEntID = html_escape($this->input->post('entourageID'));
			$this->session->set_userdata('currentEntID', $currentEntID);

			$entID = $this->session->userdata('currentEntID');
			$evID = $this->session->userdata('currentEventID');
			$this->events_model->deleteEntourage($entID, $evID);

			$this->eventEntourage();
		}

		public function removeAttireEntourage(){
			$desID = html_escape($this->input->post('designID'));
			/*$this->session->set_userdata('currentEventID', $currentEvID);

			$evID = $this->session->userdata('currentEvID');*/
			$currentEvID = $this->session->userdata('currentEventID');
			$this->events_model->deleteAttireEntourage($currentEvID, $desID);

			redirect('events/eventEntourage');
		}

		/*public function changeDecor(){
			$newdecID = $this->input->post('decorID');
			$eId = $this->session->userdata('currentEventID');
			$decId = $this->session->userdata('currentDecorID');
			
			$this->events_model->changeDecor($eId, $decId, $newdecId);
			$this->'items/decors()';
		}*/

		public function addEvent(){
			$employeeID = $this->session->userdata('employeeID');
			$clientID = html_escape($this->input->post('clientID'));

			$newEventID = $this->events_model->insertNewEvent($clientID, $employeeID);

			$this->session->set_userdata('currentEventID', $newEventID);
			$this->session->set_userdata('clientID', $clientID);

			redirect('events/eventDetails');

		}

		public function addNewEventAppointment(){

			$empID = $this->session->userdata('employeeID');
			$ceID = $this->session->userdata('currentEventID');

			$data = array('success' => false, 'messages' => array(), 'appointmentID' => null);

			$this->form_validation->set_rules('agenda', 'Agenda', 'trim|required');
			$this->form_validation->set_rules('appointmentDate', 'Appointment Date', 'required');
			$this->form_validation->set_rules('appointmentTime', 'Appointment Time', 'required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$adate = html_escape($this->input->post('appointmentDate'));
				$time = html_escape($this->input->post('appointmentTime'));
				$agenda = html_escape($this->input->post('agenda'));

				$newAppID = $this->events_model->addEventAppointment($empID, $ceID, $adate, $time, $agenda);

				$data['appointmentID'] = $newAppID;

				$data['success'] = true;	
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}

			echo json_encode($data);
			
		}

		public function addEntourage() {
			$enId = $this->session->userdata('currentEntourageID');
			$eId = $this->session->userdata('currentEventID');

			$entName = html_escape($this->input->post('entourage_name'));
			$eRole = html_escape($this->input->post('role'));
			$eShoulder = html_escape($this->input->post('shoulder'));
			$eChest = html_escape($this->input->post('chest'));
			$eStomach = html_escape($this->input->post('stomach'));
			$eWaist = html_escape($this->input->post('waist'));
			$eArmL = html_escape($this->input->post('armLength'));
			$eArmH = html_escape($this->input->post('armHole'));
			$eMuscle = html_escape($this->input->post('muscle'));
			$ePantsL = html_escape($this->input->post('pantsLength'));
			$eBaston = html_escape($this->input->post('baston'));

			$this->events_model->addEventEntourage($eId, $entName, $eRole, $eShoulder, $eChest, $eStomach, $eWaist, $eArmL, $eArmH, $eMuscle, $ePantsL, $eBaston);

			redirect('events/eventEntourage');
		}

		public function selectEventHandler(){
			$eId = $this->session->userdata('currentEventID');
			$handlerID = html_escape($this->input->post('handler'));
			$this->events_model->updateEventHandler($eId, $handlerID);
			redirect('events/eventDetails');
		}

		public function addsvc(){
			$addSvc = html_escape(array($this->input->post('add_servc_chkbox')));
			$eID = $this->session->userdata('currentEventID');		
			
			if (!empty($this->input->post('add_servc_chkbox[]'))) {
				foreach ($this->input->post('add_servc_chkbox[]') as $svc) {
					$this->events_model->addServcs($eID, $svc);
				}
			}
			redirect('events/eventServices');
		}

		// add staff
		public function addstaff(){
			$addStaff = html_escape(array($this->input->post('add_staff_chkbox')));
			$eID = $this->session->userdata('currentEventID');
			if (!empty($this->input->post('add_staff_chkbox[]'))) {
				foreach ($this->input->post('add_staff_chkbox[]') as $s) {
					$this->events_model->addStaff($eID, $s);
				}
			}
			redirect('events/eventStaff');
		}

		// update staff table (event details)
		public function upEvtStaff(){
			$svcstaffID = html_escape($this->input->post('svcstaffid'));
			$this->session->set_userdata('currentSvcStaffID', $svcstaffID);
			$role = html_escape($this->input->post('staffRole'));

			$empID = $this->session->userdata('currentSvcStaffID');
			$evtID = $this->session->userdata('currentEventID');

			$btnval = html_escape($this->input->post('btn'));

			if ($btnval === "updt") {
				if (!empty($role)) {
					$this->events_model->updtEvtStaff($evtID, $empID, $role);
				}
			}	
			if ($btnval === "rmv") {
				$this->events_model->dltEvtStaff($evtID, $svcstaffID);
			}		
			$this->eventDetails();
		}

		// update service quantity and amount
		public function upSvcQtyAmt(){
			$svcID = ($this->input->post('svcid'));
			$this->session->set_userdata('currentSvcID', $svcID);

			$eID = $this->session->userdata('currentEventID');
			$srvcID = $this->session->userdata('currentSvcID');

			$btnval = html_escape($this->input->post('btn'));
			$qty = html_escape($this->input->post('svcqty'));
			$amt = html_escape($this->input->post('svcamt'));
			if ($btnval === "updt") {
				if (!empty($qty)) {
					$this->events_model->updateSvcQty($eID, $qty, $srvcID);
				}
				if (!empty($amt)) {
					$this->events_model->updateSvcAmt($eID, $amt, $srvcID);			
				}
			}	

			if ($btnval === "rmv") {
				$this->events_model->deleteEvntSvc($srvcID, $eID);
			}
			$total = $this->events_model->getServiceTotal($eID);
			$this->events_model->updateTotalAmount($total->total, $eID);	
			redirect('events/eventServices');
		}

		public function updateEventDetails(){
			$eventID = $this->session->userdata('currentEventID');
			$clientID = $this->session->userdata('clientID');
			$eventName = html_escape($this->input->post('eventName'));
			$clientContactNo = html_escape($this->input->post('contactNumber'));
			$celebrant = html_escape($this->input->post('celebrantName'));
			$dateAvailed = html_escape($this->input->post('dateAvailed'));
			$packageType = html_escape($this->input->post('package'));
			$eventDate = html_escape($this->input->post('eventDate'));
			$eventTime = html_escape($this->input->post('eventTime'));
			$location = html_escape($this->input->post('location'));
			$type = html_escape($this->input->post('type'));
			$motif = html_escape($this->input->post('motif'));
			$theme = html_escape($this->input->post('theme'));

			if (!empty($eventName)) {
				$this->events_model->upEventName($eventName, $eventID);		
			}
			if (!empty($celebrant)) {
				$this->events_model->upCelebrantName($celebrant, $eventID);
			}
			if (!empty($clientContactNo)) {
				$this->events_model->upClientContactNo($clientContactNo, $clientID);
			}
			if (!empty($packageType)) {
				$this->events_model->upPackageType($packageType, $eventID);
			}
			if (!empty($eventDate)) {
				$this->events_model->upEventDate($eventDate, $eventID);
			}
			if (!empty($eventTime)) {
				$this->events_model->upEventTime($eventTime, $eventID);
			}
			if (!empty($location)) {
				$this->events_model->upLocation($location, $eventID);
			}
			if (!empty($type)) {
				$this->events_model->upType($type, $eventID);
			}
			if (!empty($motif)) {
				$this->events_model->upMotif($motif, $eventID);
			}
			if(!empty($dateAvailed)){
				$this->events_model->updateAvailDate($dateAvailed, $eventID);
			}

			redirect('events/eventDetails');
		}

		public function finishEvent(){
			$eventID = html_escape($this->input->post('eventID'));

			$this->events_model->markEventFinish($eventID);

			redirect('events/finishedEvents');
		}

		public function cancelEvent(){
			$eventID = html_escape($this->input->post('eventID'));
			$refundAmount = html_escape($this->input->post('refundAmount'));
			$refundDate = html_escape($this->input->post('dateRefunded'));
			$cancelDate = html_escape($this->input->post('dateCancelled'));

			$this->events_model->markEventCancelled($eventID, $refundAmount, $refundDate, $cancelDate);

			redirect('events/canceledEvents');
		}

		/*public function getRole(){
			$this->load->model('events_model');
			$data['results'] = $this->events_model->getRole();
			$this->load->view('entourage', $data);
		}*/

		/*public function showEntourageRole(){
			$data = array();
			$this->load->model('events_model');
			$query = $this->events_model->getRole();
			if ($query){
				$data['roles'] = $query; 
			}
			$this->load->view('eventEntourage', $data);
		}*/

		public function showDesignName(){
			$data = array();
			$this->load->model('events_model');
			$query = $this->events_model->getDesignName();
			if ($query){
				$data['designs'] = $query;
			}
			$this->load->view('eventEntourage', $data);
		}

		// this method will resume a cancelled event 
		public function contEvent(){
			$this->load->model('events_model');
			$this->events_model->changeEvtStatus();
			$this->ongoingEvents();
		}

		public function updateAttireQty(){
			$eventID = $this->session->userdata('currentEventID');
			$entID = $this->session->userdata('currentEntourageID');
			$desID = $this->session->userdata('currentDesignID');

			$entAttireQty = html_escape($this->input->post('quantity'));
			$designName = html_escape($this->input->post('designName'));

			
			if (!empty($entAttireQty)) {
				$this->events_model->updateAttireQty($eventID, $desID, $entAttireQty);
			}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
			redirect('events/eventEntourage');
		}

		public function updateDesignName(){
			$eventID = $this->session->userdata('currentEventID');
			$entID = $this->session->userdata('currentEntourageID');
			$desID = $this->session->userdata('currentDesignID');

			$entAttireQty = html_escape($this->input->post('quantity'));
			$designName = html_escape($this->input->post('designName'));

			if (!empty($designName)) {
				$this->events_model->updateAttireDesign($eventID, $entID, $designName);
			}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
			redirect('events/eventEntourage');
		}

		public function addEventTheme(){
			
			$evID = $this->session->userdata('currentEventID');
			$themeID = html_escape($this->input->post('themes'));

			if (!empty($themeID)) {
				foreach ($this->input->post('themes[]') as $th) {
					$this->events_model->addEventTheme($evID, $th);
				}
			}

			redirect('events/eventDetails');
		}

		public function getEntourageTheme(){
			/*$themeID = $this->session->userdata('currentTheme');
			$data['themeDesign'] = $this->events_model->getThemeDesigns($themeID);
			$data['themeDecor'] = $this->events_model->getThemeDecors($themeID);*/

			$themeID = $this->session->userdata('currentTheme');
			$evID = $this->session->userdata('currentEventID');
			$data['thevedata'] = $this->events_model->displayEventThemeDesigns($themeID, $currentEvID);

			redirect('events/eventEntourage');

		}

	}

	?>

