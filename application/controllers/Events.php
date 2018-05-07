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
		$page['pageName'] = "new";
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
			$this->load->view("templates/eventNavigation.php", $page);
			
		}else{
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNavigation.php", $page);
			
		}
		$this->load->view("templates/newEvents.php", $data);
		$this->load->view("templates/footer.php");

		
	}


	public function ongoingEvents(){
		$page['pageName'] = "ongoing";
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
			$this->load->view("templates/eventNavigation.php", $page);
			
		}else{
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNavigation.php", $page);
			
		}
		$this->load->view("templates/ongoingEvents.php", $data);
		$this->load->view("templates/footer.php");

		
	}

	public function finishedEvents(){
		$page['pageName'] = "finished";
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
			$this->load->view("templates/eventNavigation.php", $page);
			
		}else{
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNavigation.php", $page);
			
		}
		$this->load->view("templates/finishedEvents.php", $data);
		$this->load->view("templates/footer.php");
	}

	public function canceledEvents(){
		$page['pageName'] = "canceled";
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
			$this->load->view("templates/eventNavigation.php", $page);
			
		}else{
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNavigation.php", $page);
			
		}
		$this->load->view("templates/canceledEvents.php", $data);
		$this->load->view("templates/footer.php");
	}

	public function eventDetails(){
		$page['pageName'] = "details";
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
		$handlerID = $data['currentHandler']->employeeID;
		$data['totalAmount'] = $this->events_model->totalAmount($id);
		$data['nagan'] = $this->events_model->getThemeName($id);
		$data['currentEventNum'] = $this->events_model->currentEventNum($handlerID);
		$data['doneEvent'] = $this->events_model->doneEventNum($handlerID);
		$data['allTransac'] = $this->events_model->allTransacNum($handlerID);
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
			$this->load->view("templates/eventNav.php", $page);
			
		}else{
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNav.php", $page);			
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
		$page['pageName'] = "staff";
		$empRole = $this->session->userdata('role');
		$id = $this->session->userdata('currentEventID');
		$data['eventStatus'] = $this->events_model->getEventStatus($id)->eventStatus;
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$data['eventStaff'] = $this->events_model->getStaff($id);
		$data['allStaff'] = $this->events_model->showAllStaff($id);
		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'Event Staff | Admin';	
		}else{
			$headdata['pagename'] = 'Event Staff | Handler';
		}
		$this->load->view("templates/head.php", $headdata);
		if ($empRole === 'admin') {
			
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("templates/eventNav.php", $page);
			
		}else{
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNav.php", $page);			
		}
		$this->load->view("templates/eventStaff.php", $data);
		$this->load->view("templates/footer.php");

	}

	public function eventServices(){
		$page['pageName'] = "services";
		$id = $this->session->userdata('currentEventID');
		$data['eventStatus'] = $this->events_model->getEventStatus($id)->eventStatus;
		$empRole = $this->session->userdata('role');
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$data['avlServcs'] = $this->events_model->servcTransac($id);
		$data['servcs'] = $this->events_model->getServices($id);
		
		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'Event Services | Admin';	
		}else{
			$headdata['pagename'] = 'Event Services | Handler';
		}
		
		$this->load->view("templates/head.php",$headdata);
		if ($empRole === 'admin') {
			
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("templates/eventNav.php", $page);
			
		}else{
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNav.php", $page);			
		}
		$this->load->view("templates/eventServices.php", $data);
		$this->load->view("templates/footer.php");

	}

	public function eventEntourage(){
		$page['pageName'] = "entourage";
		$this->load->helper('directory');
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
		//$currentEvent = $this->session->userdata('currentEventID');
		$this->load->model('items_model');
		$data['allDesigns'] = $this->items_model->getAllDesigns();
		$data['designs']= $this->events_model->getDesigns($id);
		$data['eventDesigns'] =$this->events_model->getDesigns($id);

		$data['designTypes'] = $this->events_model->getDesignEnum();
		// get all folders (types) inside the design folder
		$data['designtypesmap'] = directory_map('./uploads/designs/', 1);

		// display the designs accdg to the selected theme...
		$themeDet = $this->events_model->getEventTheme($id);
		if (!empty($themeDet)) {
			// ...as well as pass to view, along with other info...
			$data['eventThemeDet'] = $this->events_model->getEventTheme($id);
			// store event theme ID to variable...
			$eventTheme = $themeDet->themeID;	
			// display event theme designs
			$data['themeDesigns'] = $this->events_model->displayEventThemeDesigns($eventTheme);
			// insert each [theme] designs to the eventdesigns table
			$thdes = $this->events_model->displayEventThemeDesigns($eventTheme);
			if (!empty($thdes)) {
				foreach ($thdes as $des) {
					//$chkExist = $this->events_model->chkEvtDesExist($id, $des['designID']);
					//if (empty($chkExist)) {
					$this->events_model->insertEventDesignTheme($id, $des['designID']);
					//}
				}
			}
		} 

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
			$this->load->view("templates/eventNav.php", $page);
			
		}else{
			
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNav.php", $page);
			
		}
		$this->load->view("templates/eventEntourage.php", $data);
		$this->load->view("templates/footer.php");
	}

	public function eventDecors(){
		$page['pageName'] = "decors";
		$this->load->helper('directory');
		$clientID = $this->session->userdata('clientID');
		$eventid = $this->session->userdata('currentEventID');
		$decorid = $this->session->userdata('currentDecorID');
		$empID = $this->session->userdata('employeeID');
		$themeID = $this->session->userdata('currentThemeID');
		$empRole = $this->session->userdata('role');
		$data['empRole'] = $this->session->userdata('role');
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$data['eventName'] =$this->events_model->getEventName($eventid);
		// decors w/o theme that are in the eventdecors table
		$data['eventDecors'] =$this->events_model->getDecors($eventid);
		$data['decorTypes'] = $this->events_model->getDecorEnum();
		// get all folders (types) inside the design folder
		$data['decortypesmap'] = directory_map('./uploads/decors/', 1);

		$this->load->model('items_model');
		$data['allDecors'] = $this->items_model->getAllDecors();
		
		// display the decors accdg to the selected theme...
		$themeDet = $this->events_model->getEventTheme($eventid);
		if (!empty($themeDet)) {
			// ...as well as pass to view, along with other info...
			$data['eventThemeDet'] = $this->events_model->getEventTheme($eventid);
			// store event theme ID to variable...
			$eventTheme = $themeDet->themeID;		
			// display event theme decors
			$data['themeDecors'] = $this->events_model->displayEventThemeDecors($eventTheme);
			// insert each [theme] decors to the eventdecors table
			$thdec = $this->events_model->displayEventThemeDecors($eventTheme);
			if (!empty($thdec)) {
				foreach ($thdec as $dec) {
					$chkExist = $this->events_model->chkEvtDecExist($eventid, $dec['decorsID']);
					if (empty($chkExist)) {
						$this->events_model->insertEventDecorTheme($eventid, $dec['decorsID']);
					}
				}
			}
		}

		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'Event Decorations | Admin';	
		}else{
			$headdata['pagename'] = 'Event Decorations | Handler';
		}
		
		$this->load->view("templates/head.php", $headdata);
		if ($empRole === 'admin') {
			
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("templates/eventNav.php", $page);
			
		}else{
			
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNav.php", $page);
			
		}
		$data['eventdecors'] = $this->events_model->getDecors($eventid);
		$this->load->view("templates/eventDecors.php", $data);
		$this->load->view("templates/footer.php");
	}

	public function payment(){
		$page['pageName'] = "payments";
		$currentEvent = $this->session->userdata('currentEventID');
		$data['eventStatus'] = $this->events_model->getEventStatus($currentEvent)->eventStatus;
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
		$data['clientName']=$this->events_model->getClientName($cid);
		$totalPayments = $this->events_model->totalAmountPaid($currentEvent);
		$totalAmount = $this->events_model->totalAmount($currentEvent);
		$data['totalPayments'] = $totalPayments;
		$data['totalAmount'] = $totalAmount;		
		$data['balance'] = $totalAmount->totalAmount - $totalPayments->total;
		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'Payments | Admin';	
		}else{
			$headdata['pagename'] = 'Payments | Handler';
		}
		
		$this->load->view("templates/head.php", $headdata);
		if ($empRole === 'admin') {
			
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("templates/eventNav.php", $page);
			
		}else{
			
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNav.php", $page);
			
		}
		$this->load->view("templates/payment.php", $data);
		$this->load->view("templates/footer.php");
	}

	public function appointments(){
		$page['pageName'] = "appointments";
		$currentEvent = $this->session->userdata('currentEventID');
		$data['eventStatus'] = $this->events_model->getEventStatus($currentEvent)->eventStatus;
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
			$this->load->view("templates/eventNav.php", $page);
			
		}else{
			
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNav.php", $page);
			
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
				$clientName = $this->events_model->getClientName($clientID);

				$data = array('success' => false, 'messages' => array(), 'paymentID' => null, 'hasBalance' => false, 'balanceAmount' => 0);

				$totalAmount = $this->events_model->totalAmount($eventID);
				$totalAmountPaid = $this->events_model->totalAmountPaid($eventID);

				$eventBalance = $totalAmount->totalAmount - $totalAmountPaid->total; 

				if ($eventBalance > 0) {
					$data['hasBalance'] = true;
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

					$totalAmount = $this->events_model->totalAmount($eventID)->totalAmount;
					$totalAmountPaid = $this->events_model->totalAmountPaid($eventID)->total;
					
					$data['totalAmountPaid'] = number_format($totalAmountPaid + $amount, 2);

					$data['balance'] = number_format($totalAmount-($totalAmountPaid+$amount), 2);
					$this->events_model->addEventPayment($clientID, $empID, $eventID, $date, $time, $amount);

					$data['amount'] = number_format($amount, 2);

                    $d = date_create($date);
                    $newDate = date_format($d, "M-d-Y");
                    $newTime = date("g:i a", strtotime($time));

                    $data['dateTime'] = $newDate . " at " . $newTime;


					$data['success'] = true;

					$data['client'] = $clientName->clientName;
					
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

			// set and delete selected design...
			public function setCurrentDesignID(){
				$currentDesignID = html_escape($this->input->post('designID'));
				$this->session->set_userdata('currentDesignID', $currentDesignID);
				
				$desId = $this->session->userdata('currentDesignID');
				$eId = $this->session->userdata('currentEventID');
				$this->events_model->deleteEvntDesign($desId, $eId);

				$this->eventEntourage();			
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

			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('eventName', 'Event Name', 'trim|required');
			$this->form_validation->set_rules('celebrantName', 'Celebrant Name', 'trim|required');
			$this->form_validation->set_rules('availDate', 'Avail Date', 'trim|required');
			$this->form_validation->set_rules('eventDate', 'Event Date', 'trim|required');
			$this->form_validation->set_rules('eventTime', 'Event Time', 'trim|required');
			$this->form_validation->set_rules('eventDuration', 'Event Duration', 'trim|required|numeric');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$employeeID = $this->session->userdata('employeeID');
				$clientID = html_escape($this->input->post('clientID'));

				$eventName = ucwords(html_escape($this->input->post('eventName')));
				$celebrantName = ucwords(html_escape($this->input->post('celebrantName')));
				$availDate = html_escape($this->input->post('availDate'));
				$eventDate = html_escape($this->input->post('eventDate'));
				$eventTime = html_escape($this->input->post('eventTime'));
				$eventDuration = html_escape($this->input->post('eventDuration'));

				$newEventID = $this->events_model->insertNewEvent($clientID, $employeeID, $eventName, $celebrantName, $availDate, $eventDate, $eventTime, $eventDuration);

				$this->session->set_userdata('currentEventID', $newEventID);
				$this->session->set_userdata('clientID', $clientID);

				$data['success'] = true;

			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}

			echo json_encode($data);
				

			

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
				$agenda = ucwords(html_escape($this->input->post('agenda')));

				$this->events_model->addEventAppointment($empID, $ceID, $adate, $time, $agenda);
				$date = date_create($adate);
                $newDate = date_format($date, "M-d-Y");
                $newTime = date("g:i a", strtotime($time));
				$data['appDateTime'] = $newDate . " at " . $newTime;
				$data['agenda'] = $agenda;
				$data['status'] = "ongoing";
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

			$entName = html_escape($this->input->post('new_ent_name'));
			$eRole = html_escape($this->input->post('new_ent_role'));
			$eShoulder = html_escape($this->input->post('shoulder'));
			$eChest = html_escape($this->input->post('chest'));
			$eStomach = html_escape($this->input->post('stomach'));
			$eWaist = html_escape($this->input->post('waist'));
			$eArmL = html_escape($this->input->post('armLength'));
			$eArmH = html_escape($this->input->post('armHole'));
			$eMuscle = html_escape($this->input->post('muscle'));
			$ePantsL = html_escape($this->input->post('pantsLength'));
			$eBaston = html_escape($this->input->post('baston'));

			$newEntId = $this->events_model->addEventEntourage($eId, $entName, $eRole, $eShoulder, $eChest, $eStomach, $eWaist, $eArmL, $eArmH, $eMuscle, $ePantsL, $eBaston);
			$this->events_model->insertEntDet($newEntId);

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
			redirect('events/eventStaff');
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
			$data = array('success' => false, 'messages' => array());
			$eventID = $this->session->userdata('currentEventID');
			$clientID = $this->session->userdata('clientID');

			$eventDetails = $this->events_model->getEventDetails($eventID, $clientID);

			if (empty($eventDetails->eventName) || $eventDetails->eventName == null) {
				$this->form_validation->set_rules('eventName', 'Event Name', 'trim|required');
			}else{
				$this->form_validation->set_rules('eventName', 'Event Name', 'trim');
			}

			$this->form_validation->set_rules('contactNumber', 'Contact Number', 'trim|numeric');
			
			if (empty($eventDetails->celebrantName) || $eventDetails->celebrantName == null) {
				$this->form_validation->set_rules('celebrantName', 'Celebrant Name', 'trim|required');
			}else{
				$this->form_validation->set_rules('celebrantName', 'Celebrant Name', 'trim');
			}
			
			if ($eventDetails->dateAssisted == null) {
				$this->form_validation->set_rules('dateAvailed', 'Date Availed', 'trim|required');
			}else{
				$this->form_validation->set_rules('dateAvailed', 'Date Availed', 'trim');
			}

			if ($eventDetails->eventDate == null) {
				$this->form_validation->set_rules('eventDate', 'Event Date', 'trim|required');
			}else{
				if (!empty($_POST['eventDate']) && !empty($_POST['dateAvailed'])){
					$enteredDateEvent = $this->input->post('eventDate');
					$enteredDateAvailed = $this->input->post('dateAvailed');
					$this->form_validation->set_rules('eventDate', 'Event Date', 'trim|callback_compareDates[' . $enteredDateAvailed . ']');
				}elseif(isset($_POST['eventDate']) && $eventDetails->dateAssisted != null){
					$this->form_validation->set_rules('eventDate', 'Event Date', 'trim|callback_eventDateValidation[' . $eventID . ']');
				}
			}

			if ($eventDetails->eventTime == null) {
				$this->form_validation->set_rules('eventTime', 'Event Time', 'trim|required');
			}else{
				$this->form_validation->set_rules('eventTime', 'Event Time', 'trim');
			}
			
			$this->form_validation->set_rules('location', 'Location', 'trim');
			$this->form_validation->set_rules('type', 'Type', 'trim');
			$this->form_validation->set_rules('motif', 'Event Motif', 'trim');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
			if ($this->form_validation->run()) {
				$eventName = ucwords(html_escape($this->input->post('eventName')));
				$clientContactNo = html_escape($this->input->post('contactNumber'));
				$celebrant = ucwords(html_escape($this->input->post('celebrantName')));
				$dateAvailed = html_escape($this->input->post('dateAvailed'));
				$packageType = ucwords(html_escape($this->input->post('package')));
				$eventDate = html_escape($this->input->post('eventDate'));
				$eventTime = html_escape($this->input->post('eventTime'));
				$location = ucwords(html_escape($this->input->post('location')));
				$type = ucwords(html_escape($this->input->post('type')));
				$motif = ucwords(html_escape($this->input->post('motif')));
				$theme = html_escape($this->input->post('theme'));

				if (!empty($eventName)) {
					$this->events_model->upEventName($eventName, $eventID);
					$data['eventName'] = true;
					$data['newEventName'] = $eventName;		
				}
				if (!empty($celebrant)) {
					$this->events_model->upCelebrantName($celebrant, $eventID);
					$data['celebrant'] = true;
					$data['celebrantName'] = $celebrant;
				}
				if (!empty($clientContactNo)) {
					$this->events_model->upClientContactNo($clientContactNo, $clientID);
					$data['clientContact'] = true;
					$data['newClientContact'] = $clientContactNo;
				}
				if (!empty($packageType)) {
					$this->events_model->upPackageType($packageType, $eventID);
					$data['packageType'] = true;
					$data['newPackageType'] = $packageType;
				}
				if (!empty($eventDate)) {
					$this->events_model->upEventDate($eventDate, $eventID);
					$newDate = date_create($eventDate);
					$data['eventDate'] = true;
					$data['newEventDate'] = date_format($newDate, "M-d-Y");
				}
				if (!empty($eventTime)) {
					$this->events_model->upEventTime($eventTime, $eventID);
					$data['eventTime'] = true;
					$data['newEventTime'] = date("g:i a", strtotime($eventTime));
				}
				if (!empty($location)) {
					$this->events_model->upLocation($location, $eventID);
					$data['location'] = true;
					$data['newLocation'] = $location;
				}
				if (!empty($type)) {
					$this->events_model->upType($type, $eventID);
					$data['type'] = true;
					$data['newType'] = $type;
				}
				if (!empty($motif)) {
					$this->events_model->upMotif($motif, $eventID);
					$data['motif'] = true;
					$data['newMotif'] = $motif;
				}
				if(!empty($dateAvailed)){
					$this->events_model->updateAvailDate($dateAvailed, $eventID);
					$dateAvl = date_create($dateAvailed);
					$data['dateAvailed'] = true;
					$data['newDateAvailed'] = date_format($dateAvl, "M-d-Y");
				}

				$data['success'] = true;
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}

				if (!isset($_POST['package']) && (empty($eventDetails->packageType) || $eventDetails->packageType == null)) {
					$data['messages']['package'] = '<p class="text-danger">The Package Type is required!</p>';
				}else{
					$data['messages']['package'] = "";
				}

			}

			echo json_encode($data);
		}

		public function compareDates($eventDate, $dateAvl){
			$edate = date_create($eventDate);
			$adate = date_create($dateAvl);

			if ($edate <= $adate) {
				$this->form_validation->set_message('compareDates', 'Event Date must be later than the Availed Date.');
				return false;
			}else{
				return true;
			}
		}

		public function eventDateValidation($date, $id){
			if($this->events_model->eventDateValidate($date, $id)){
				return true;
			}else{
				$this->form_validation->set_message('eventDateValidation', 'Event Date must be later than the Availed Date. ');
				return false;
			}
		}

		public function finishEvent(){
			$data = array('success' => false, 'notPaid' => false, 'eventDatePassed' => false);

			$this->form_validation->set_rules('finishDate', 'Finish Date', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$eventID = html_escape($this->input->post('eventID'));
				$finishDate = $this->input->post('finishDate');

				$datePassed = $this->events_model->validateEventDate($eventID, $finishDate);
				$hasBalance = $this->events_model->validateBalance($eventID);

				if ($datePassed and !$hasBalance) {
					$this->events_model->markEventFinish($eventID, $finishDate);
					$data['success'] = true;	
				}else{
					$data['notPaid'] = $hasBalance;
					$data['eventDatePassed'] = $datePassed;
				}
					
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}

			echo json_encode($data);
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
			//$this->load->model('events_model');
			//$this->events_model->changeEvtStatus();
			//$this->ongoingEvents();
			$contDate = $this->input->post('resumeDate');
			$this->events_model->changeEvtStatus($contDate);
			redirect('events/ongoingEvents');
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

		public function updateEntDesign(){
			//$eventID = $this->session->userdata('currentEventID');
			//$entourageID = $this->session->userdata('currentEntourageID');
			//$desID = $this->session->userdata('currentDesignID');
			$entourageID = $this->input->post('entourageID');
			$desID = $this->input->post('designID');

			$this->events_model->updateAttireDesign($entourageID, $desID);

			//$entAttireQty = html_escape($this->input->post('quantity'));
			//$designName = html_escape($this->input->post('designName'));

			//if (!empty($designName)) {
				//$this->events_model->updateAttireDesign($eventID, $entID, $designName);
			//}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
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

			$themeID = $this->session->userdata('currentThemeID');
			//$evID = $this->session->userdata('currentEventID');
			//$desID = $this->session->userdata('currentDesignID');
			$data['themeEvEnt'] = $this->events_model->displayEventThemeDesigns($themeID);

			redirect('events/eventEntourage');

		}
		/*
		public function getThemeDecors(){
			//$themeID = $this->session->userdata('currentThemeID');
			$evID = $this->session->userdata('currentEventID');
			//$decorID = $this->session->userdata('currentDecorID');

			// get theme of an event
			$eventTheme = $this->event_model->getEventTheme($evID);
			$data['themeDecors'] = $this->events_model->displayEventThemeDecors($eventTheme);

			redirect('events/eventDecors');

		}*/

		public function adminDecorsHome(){
			$this->load->helper('directory');
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$data['empRole'] = $this->session->userdata('role');
			$newStatus = "new";
			$ongoingStatus = "on-going";

			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			$data['decorTypes'] = $this->events_model->getDecorEnum();

			if (!is_dir('./uploads/decors')) {
				mkdir('./uploads/decors');
			}
			if (!is_dir('./uploads/decors/furnishing')) {
				mkdir('./uploads/decors/furnishing');
			}
			if (!is_dir('./uploads/decors/trinkets')) {
				mkdir('./uploads/decors/trinkets');
			}
			if (!is_dir('./uploads/decors/utensils')) {
				mkdir('./uploads/decors/utensils');
			}

			// get all folders inside DECOR folder in uploads folder
			$data['map'] = directory_map('./uploads/decors/', 1);
			// get contents of the folder similarly named to the current type selected
			$decorTypeFoldr = html_escape($this->input->post('decor_type'));
			//$type_map_dir = './uploads/decors/' . $decorTypeFoldr . '/';
			$data['type_map'] = directory_map('./uploads/decors/' . $decorTypeFoldr . '/', 1);

			// get all folders inside DESIGN folder in uploads folder
			$data['map1'] = directory_map('./uploads/designs/', 1);
			// get contents of the folder similarly named to the current type selected
			$data['type_map1'] = directory_map('./uploads/designs/' . $decorTypeFoldr . '/', 1);

			// get the enum values of decor types from the database
			$data['enumVals'] = $this->events_model->getDecorEnum();
			// pass the existing enum values to query.. then add new enum value...

			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'Decors Home | Admin';	
			}else{
				$headdata['pagename'] = 'Decors Home | Handler';
			}			

			$this->load->view("templates/head.php", $headdata);
			if ($this->session->userdata('role') === "admin") {
				$this->load->view("templates/adminHeader.php", $notif);
				$this->load->view("templates/adminNavbar.php");
			}else{
				$this->load->view("templates/header.php", $notif);
				$this->load->view("templates/galleryNavigation.php");
			}
			$this->load->view("templates/adminDecorHome.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function adminDesignsHome(){
			$this->load->helper('directory');
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$data['empRole'] = $this->session->userdata('role');
			$newStatus = "new";
			$ongoingStatus = "on-going";

			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			$data['designTypes'] = $this->events_model->getDesignEnum();

			if (!is_dir('./uploads/designs')) {
				mkdir('./uploads/designs');
			}
			if (!is_dir('./uploads/designs/accesory')) {
				mkdir('./uploads/designs/accesory');
			}
			if (!is_dir('./uploads/designs/costume')) {
				mkdir('./uploads/designs/costume');
			}
			if (!is_dir('./uploads/designs/gown')) {
				mkdir('./uploads/designs/gown');
			}
			if (!is_dir('./uploads/designs/suit')) {
				mkdir('./uploads/designs/suit');
			}

			// get all folders inside DESIGNS folder in uploads folder
			$data['map'] = directory_map('./uploads/designs/', 1);
			// get contents of the folder similarly named to the current type selected
			$designTypeFoldr = html_escape($this->input->post('design_type'));
			$data['type_map'] = directory_map('./uploads/designs/' . $designTypeFoldr . '/', 1);

			// get all folders inside DESIGN folder in uploads folder
			$data['map1'] = directory_map('./uploads/designs/', 1);
			// get contents of the folder similarly named to the current type selected
			$data['type_map1'] = directory_map('./uploads/designs/' . $designTypeFoldr . '/', 1);

			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'Designs Home | Admin';	
			}else{
				$headdata['pagename'] = 'Designs Home | Handler';
			}			

			$this->load->view("templates/head.php", $headdata);
			if ($this->session->userdata('role') === "admin") {
				$this->load->view("templates/adminHeader.php", $notif);
				$this->load->view("templates/adminNavbar.php");
			}else{
				$this->load->view("templates/header.php", $notif);
				$this->load->view("templates/galleryNavigation.php");
			}
			$this->load->view("templates/adminDesignsHome.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function setDecorType(){
			$decorType = $this->input->post('decor_type');
			$this->session->set_userdata('decorType', $decorType);

			redirect('events/adminDecors');
		}

		public function adminDecors(){
			$this->load->helper('directory');
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$data['empRole'] = $this->session->userdata('role');
			$currentDecType = $this->session->userdata('currentType');
			$newStatus = "new";
			$ongoingStatus = "on-going";

			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();

			// get all folders inside DECOR folder in uploads folder
			$data['map'] = directory_map('./uploads/decors/', 1);
			// get contents of the folder similarly named to the current type selected
			// $decorTypeFoldr = html_escape($this->input->post('decor_type'));
			$decorTypeFoldr = $this->session->userdata('decorType');
			$this->session->set_userdata('currentType', $decorTypeFoldr);
			$data['type_map'] = directory_map('./uploads/decors/' . $decorTypeFoldr . '/', 1);

			// get all folders inside DESIGN folder in uploads folder
			$data['map1'] = directory_map('./uploads/designs/', 1);
			// get contents of the folder similarly named to the current type selected
			$data['type_map1'] = directory_map('./uploads/designs/' . $decorTypeFoldr . '/', 1);

			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'Decors | Admin';	
			}else{
				$headdata['pagename'] = 'Decors | Handler';
			}			

			$this->load->view("templates/head.php", $headdata);
			if ($this->session->userdata('role') === "admin") {
				$this->load->view("templates/adminHeader.php", $notif);
				$this->load->view("templates/adminNavbar.php");
			}else{
				$this->load->view("templates/header.php", $notif);
			}
			$this->load->view("templates/adminDecors.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function setDesignType(){
			$designType = $this->input->post('design_type');
			$this->session->set_userdata('designType', $designType);

			redirect('events/adminDesigns');
		}

		public function adminDesigns(){
			$this->load->helper('directory');
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$data['empRole'] = $this->session->userdata('role');
			$newStatus = "new";
			$ongoingStatus = "on-going";

			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			$data['designTypes'] = $this->events_model->getDesignEnum();

			// get all folders inside DESIGN folder in uploads folder
			$data['map'] = directory_map('./uploads/designs/', 1);
			// get contents of the folder similarly named to the current type selected
			//$designTypeFoldr = $this->input->post('design_type');
			$designTypeFoldr = $this->session->userdata('designType');
			$this->session->set_userdata('currentType', $designTypeFoldr);
			$data['type_map'] = directory_map('./uploads/designs/' . $designTypeFoldr . '/', 1);

			// get all folders inside DESIGN folder in uploads folder
			$data['map1'] = directory_map('./uploads/designs/', 1);
			// get contents of the folder similarly named to the current type selected
			$data['type_map1'] = directory_map('./uploads/designs/' . $designTypeFoldr . '/', 1);

			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'Designs Home | Admin';	
			}else{
				$headdata['pagename'] = 'Designs Home | Handler';
			}			

			$this->load->view("templates/head.php", $headdata);
			if ($this->session->userdata('role') === "admin") {
				$this->load->view("templates/adminHeader.php", $notif);
				$this->load->view("templates/adminNavbar.php");
			}else{
				$this->load->view("templates/header.php", $notif);
			}
			$this->load->view("templates/adminDesigns.php", $data);
			$this->load->view("templates/footer.php");
		}

		// set the currently selected decor type
		/*public function setCtDecType(){
			$cDecType = html_escape($this->input->post('decor_type'));
			$this->session->set_userdata('currentType', $cDecType);
			$this->adminDecors();
			//redirect('events/adminDecors');
		}*/

		// set the currently selected design type
		/*public function setCtDesType(){
			$cDesType = html_escape($this->input->post('design_type'));
			$this->session->set_userdata('currentType', $cDesType);
			$this->adminDesigns();
		}*/

		public function uploadDecImg(){
			$cType = $this->session->userdata('currentType');
			$themeID = $this->session->userdata('currentThemeID');
			
			$this->load->library('form_validation');
			$this->load->helper('url');
			
			$this->form_validation->set_rules('dec_name', 'New Decor Name', 'required');
			$this->form_validation->set_rules('dec_color', 'New Decor Color', 'required');		

			if ($this->form_validation->run()) {		
				$decorName = html_escape($this->input->post('dec_name'));
				$decorColor = html_escape($this->input->post('dec_color'));
				$decID = $this->events_model->addNewDecor($decorName, $decorColor, $cType, $themeID);
				$config['upload_path'] = './uploads/decors/' . $cType . '/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['file_name'] = sprintf('%07d', $decID);
				$this->load->library('upload', $config);
				$this->upload->do_upload('userfile');
				$data = array('upload_data' => $this->upload->data());
				//$this->adminDecorsHome();
				redirect('events/adminDecors');
			}
		}

		public function uploadDesImg(){
			$cType = $this->session->userdata('currentType');
			$themeID = $this->session->userdata('currentThemeID');
					
			$this->load->library('form_validation');

			$this->form_validation->set_rules('des_name', 'New Design Name', 'required');
			$this->form_validation->set_rules('des_color', 'New Design Color', 'required');		

			if ($this->form_validation->run()) {			
				$designName = html_escape($this->input->post('des_name')); 
				$designColor = html_escape($this->input->post('des_color'));
				$desID = $this->events_model->addNewDesign($designName, $designColor, $cType, $themeID);
				$config['upload_path'] = './uploads/designs/' . $cType . '/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['file_name'] = sprintf('%07d', $desID);
				$this->load->library('upload', $config);
				$this->upload->do_upload('userfile');
				$data = array('upload_data' => $this->upload->data());
				//$this->adminDesignsHome();
				redirect('events/adminDesigns');
			}
		}	

		public function addNewDecType(){
			$this->load->helper('directory');
			$enumVals = $this->events_model->getDecorEnum();
			$newEnumVal = $this->input->post('type_name');

			if (!is_dir('./uploads/decors/' . $newEnumVal)) {
				mkdir('./uploads/decors/' . $newEnumVal);
			}
			$this->events_model->addDecType($enumVals, $newEnumVal);
			redirect('events/adminDecorsHome');
		}

		public function addNewDesType(){
			$this->load->helper('directory');
			$enumVals = $this->events_model->getDesignEnum();
			$newEnumVal = $this->input->post('type_name');

			if (!is_dir('./uploads/designs/' . $newEnumVal)) {
				mkdir('./uploads/designs/' . $newEnumVal);
			}
			$this->events_model->addDesType($enumVals, $newEnumVal);
			redirect('events/adminDesignsHome');
		}

		public function addNewEventDecor(){
			$themeID = $this->session->userdata('currentTheme');
			$eventID = $this->session->userdata('currentEventID');
						
			$this->load->library('form_validation');

			$this->form_validation->set_rules('decor_name', 'New Decor Name', 'required');
			$this->form_validation->set_rules('decor_color', 'New Decor Color', 'required');	
			$this->form_validation->set_rules('decor_type', 'New Decor Type', 'required');

			if ($this->form_validation->run()) {				
				$name = html_escape($this->input->post('decor_name'));
				$color = html_escape($this->input->post('decor_color'));
				$type = html_escape($this->input->post('decor_type'));

				$decID = $this->events_model->addNewDecor($name, $color, $type, $themeID);
				$this->events_model->addNewEventDecor($eventID, $decID);

				$config['upload_path'] = './uploads/decors/' . $type . '/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				// rename file 
				$config['file_name'] = sprintf('%07d', $decID);
				$this->load->library('upload', $config);
				$this->upload->do_upload('userfile');
				$data = array('upload_data' => $this->upload->data()); 

				$this->eventDecors();
			}
		}

		public function addExstEventDec(){
			// add an existing decor to the eventdecors table
			$decID = html_escape($this->input->post('addExstDecor'));
			$eventID = $this->session->userdata('currentEventID');
			$this->events_model->addNewEventDecor($eventID, $decID);
			$this->eventDecors();
		}

		public function addExstEventDes(){
			// add an existing design to the eventdecors table
			$desID = html_escape($this->input->post('addExstDesign'));
			$eventID = $this->session->userdata('currentEventID');
			$this->events_model->addNewEventDesign($eventID, $desID);
			$this->eventEntourage();
		}

		public function updateEvtDec(){
			// update event decor quantity
			$eventID = $this->session->userdata('currentEventID');
			$decorID = $this->input->post('decorID');
			$qty = $this->input->post('decor_qty');
			$this->events_model->updtDecorQty($eventID, $decorID, $qty);
			$this->eventDecors();
		}

		public function updateEvtDes(){
			// update event design quantity
			$eventID = $this->session->userdata('currentEventID');
			$designID = $this->input->post('designID');
			$qty = $this->input->post('design_qty');
			$this->events_model->updtDesignQty($eventID, $designID, $qty);
			$this->eventEntourage();
		}
	}

?>