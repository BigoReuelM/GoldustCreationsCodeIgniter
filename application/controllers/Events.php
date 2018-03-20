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
			$this->load->library('form_validation');
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
			// get staff assigned to an event ONLY
			$data['eventStaff'] = $this->events_model->getStaff($id);
			$data['serviceTotal'] = $this->events_model->getServiceTotal($id);
			// get ALL staff from the database
			$data['staff'] = $this->events_model->getAllStaff();
			 
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
			$this->load->view("templates/eventDetails.php", $data);
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
			$data['entourageRole'] = $this->events_model->getEntourageRole();
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

			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('amount', 'Amount', 'trim|required');
			$this->form_validation->set_rules('date', 'Payment Date', 'trim|required');
			$this->form_validation->set_rules('time', 'Payment Time', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$date = $this->input->post('date');
				$time = $this->input->post('time');
				$amount = $this->input->post('amount');
				$currentEventID = $this->session->userdata('currentEventID');

				$empID = $this->session->userdata('employeeID');
				$clientID = $this->session->userdata('clientID');
				$this->events_model->addEventPayment($clientID, $empID, $currentEventID, $date, $time, $amount);

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

		// remove staff from event
		public function rmvStaff(){
			$svcStaff = $this->input->post('evtstaffdlt');
			$this->session->set_userdata('currrentSvcStaff', $svcStaff);

			$svcstaffID = $this->session->userdata('currrentSvcStaff');
			$eId = $this->session->userdata('currentEventID');
			$this->events_model->deleteEvtStaff($eId, $svcstaffID);
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
			$desID = $this->input->post('designID');
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
			$clientID = $this->input->post('clientID');

			$newEventID = $this->events_model->insertNewEvent($clientID, $employeeID);

			$this->session->set_userdata('currentEventID', $newEventID);
			$this->session->set_userdata('clientID', $clientID);

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
			$addSvc = array($this->input->post('add_servc_chkbox'));
			$eID = $this->session->userdata('currentEventID');		
			
			if (!empty($this->input->post('add_servc_chkbox[]'))) {
				foreach ($this->input->post('add_servc_chkbox[]') as $svc) {
					$this->events_model->addServcs($eID, $svc);
				}
			}

			$this->eventDetails();
		}
		// update service quantity and amount
		public function upSvcQtyAmt(){
			$svcID = $this->input->post('svcid');
			$this->session->set_userdata('currentSvcID', $svcID);

			$eID = $this->session->userdata('currentEventID');
			$srvcID = $this->session->userdata('currentSvcID');

			$btnval = $this->input->post('btn');
			$qty = $this->input->post('svcqty');
			$amt = $this->input->post('svcamt');
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
			$this->eventDetails();
		}

		public function updateEventDetails(){
			$eventID = $this->session->userdata('currentEventID');
			$clientID = $this->session->userdata('clientID');
			$eventName = $this->input->post('eventName');
			$clientContactNo = $this->input->post('contactNumber');
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

			redirect('events/eventDetails');
		}

		public function finishEvent(){
			$eventID = $this->input->post('eventID');

			$this->events_model->markEventFinish($eventID);

			redirect('events/finishedEvents');
		}

		public function cancelEvent(){
			$eventID = $this->input->post('eventID');
			$refundAmount = $this->input->post('refundAmount');
			$refundDate = $this->input->post('dateRefunded');
			$cancelDate = $this->input->post('dateCancelled');

			$this->events_model->markEventCancelled($eventID, $refundAmount, $refundDate, $cancelDate);

			redirect('events/canceledEvents');
		}

		/*public function getRole(){
			$this->load->model('events_model');
			$data['results'] = $this->events_model->getRole();
			$this->load->view('entourage', $data);
		}*/

		public function showEntourageRole(){
		 	$data = array();
		 	$this->load->model('events_model');
		 	$query = $this->events_model->getRole();
		 	if ($query){
		 		$data['roles'] = $query; 
		 	}
		 	$this->load->view('eventEntourage', $data);
		 }

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
	}

?>

