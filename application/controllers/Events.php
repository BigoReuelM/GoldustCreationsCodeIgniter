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
			$data['services']=$this->events_model->getServices();
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
			$clientID = $this->session->userdata('clientID');
			$data['eventName'] =$this->events_model->getEventName($id);
			// get ALL available services for modal (add service)
			$data['servcs'] = $this->events_model->getServices();
			// get services availed for an event ONLY
			$data['avlServcs'] = $this->events_model->servcTransac($id);
			$data['eventDetail'] = $this->events_model->getEventDetails($id, $clientID);
			$data['handlers'] = $this->events_model->getHandlers();
			$data['currentHandler'] = $this->events_model->getCurrentHandler($id);
			$data['eventStaff'] = $this->events_model->getStaff($id);
			$data['oncallStaff'] = $this->events_model->getOncallStaff($id);
			$data['serviceTotal'] = $this->events_model->getServiceTotal($id);
			 
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
			$data['entourage'] = $this->events_model->getEntourage($id);
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
			$empRole = $this->session->userdata('role');


			$data['eventName'] = $this->events_model->getEventName($currentEvent);
			$data['appointments'] = $this->events_model->getApointments($currentEvent);
			
			
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
			$currentEventStatus = $this->input->post('eventStatus');
			$empRole = $this->session->userdata('role');
			$this->session->set_userdata('currentEventID', $currentEventID);
			$this->session->set_userdata('clientID', $currentClientID);
			if ($currentEventStatus === "new" & $empRole === "handler") {
				$this->events_model->updateEventStatus($currentEventID);
			}
			redirect('events/eventDetails');
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
		// set and delete selected decor...
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

		// set and delete selected event service...
		public function setDltCurrentSvcID(){
			$currentSvcID = $this->input->post('svcID');
			$this->session->set_userdata('currentSvcID', $currentSvcID);
			
			$svcId = $this->session->userdata('currentSvcID');
			$eId = $this->session->userdata('currentEventID');
			$this->events_model->deleteEvntSvc($svcId, $eId);

			$this->eventDetails();			
		}

		public function removeEntourage(){
			$currentEntID = $this->input->post('entourageID');
			$this->session->set_userdata('currentEntID', $currentEntID);

			$entID = $this->session->userdata('currentEntID');
			$evID = $this->session->userdata('currentEventID');
			$this->events_model->deleteEntourage($entID, $evID);

			$this->eventEntourage();
		}

		public function removeAttireEntourage(){
			$currentEntID = $this->input->post('entourageID');
			$this->session->set_userdata('currentEntID', $currentEntID);

			$entID = $this->session->userdata('currentEntID');
			$desID = $this->session->userdata('currentDesignID');
			$this->events_model->deleteEntourage($entID, $desID);

			$this->eventEntourage();
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
			$clientID = $this->input->post('clientID');

			$newEventID = $this->events_model->insertNewEvent($clientID, $employeeID);

			$this->session->set_userdata('currentEventID', $newEventID);

			redirect('events/eventDetails');

		}

		public function addEventAppointments(){
			$empID = $this->session->userdata('employeeID');
			$ceID = $this->session->userdata('currentEventID');
			$adate = $this->input->post('appointmentDate');
			$time = $this->input->post('time');
			$agenda = $this->input->post('agenda');

			$this->events_model->addEventAppointment($empID, $ceID, $adate, $time, $agenda);

			redirect('events/appointments');
		}

		public function addEntourage() {
			$enId = $this->session->userdata('currentEntourageID');
			$eId = $this->session->userdata('currentEventID');

			$entName = $this->input->post('entourage_name');
			$eRole = $this->input->post('role');
			$eShoulder = $this->input->post('shoulder');
			$eChest = $this->input->post('chest');
			$eStomach = $this->input->post('stomach');
			$eWaist = $this->input->post('waist');
			$eArmL = $this->input->post('armLength');
			$eArmH = $this->input->post('armHole');
			$eMuscle = $this->input->post('muscle');
			$ePantsL = $this->input->post('pantsLength');
			$eBaston = $this->input->post('baston');

			$this->events_model->addEventEntourage($eId, $entName, $eRole, $eShoulder, $eChest, $eStomach, $eWaist, $eArmL, $eArmH, $eMuscle, $ePantsL, $eBaston);

			redirect('events/eventEntourage');
		}

		public function selectEventHandler(){
			$eId = $this->session->userdata('currentEventID');
			$handlerID = $this->input->post('handler');
			$this->events_model->updateEventHandler($eId, $handlerID);
			redirect('events/eventDetails');
		}

		public function addsvc(){
			$addSvc = $this->input->post('add_servc_chkbox');
			$eID = $this->session->userdata('currentEventID');
			$this->events_model->addServcs($eID, $addSvc);
			$this->eventDetails();
		}

		public function chkSvcQtyAmt(){
			$svcID = $this->input->post('svcID');
			$this->session->set_userdata('currentSvcID', $svcID);

			$eID = $this->session->userdata('currentEventID');
			$srvcID = $this->session->userdata('currentSvcID');

			$dbSvcQty = $this->events_model->returnSvcQty($eID, $srvcID);
			$dbSvcAmt = $this->events_model->returnSvcAmt($eID, $srvcID);	

			$qty = $this->input->post('svcqty');
			$amt = $this->input->post('svcamt');
			if (!($qty === $dbSvcQty) && ($amt === $dbSvcAmt)) {
				$this->events_model->updateSvcQty($eID, $qty, $srvcID);
				$this->eventDetails();
			}elseif (!($amt === $dbSvcAmt) && ($qty === $dbSvcQty)) {
				$this->events_model->updateSvcAmt($eID, $amt, $srvcID);
				$this->eventDetails();
			}else{			
				$this->events_model->updateSvcAmtQty($eID, $qty, $amt, $srvcID);
				$this->eventDetails();
			}
		}

		public function updateEventDetails(){
			$eventID = $this->session->userdata('currentEventID');
			$eventName = $this->input->post('eventName');
			$celebrant = $this->input->post('celebrantName');
			$dateAvailed = $this->input->post('dateAvailed');
			$packageType = $this->input->post('package');
			$eventDate = $this->input->post('eventDate');
			$eventTime = $this->input->post('eventTime');
			$location = $this->input->post('location');
			$type = $this->input->post('type');
			$motif = $this->input->post('motif');
			$theme = $this->input->post('theme');

			if (!empty($eventName)) {
				$this->events_model->upEventName($eventName, $eventID);		
			}
			if (!empty($celebrant)) {
				$this->events_model->upCelebrantName($celebrant, $eventID);
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

			redirect('events/eventDetails');
		}

	}

?>