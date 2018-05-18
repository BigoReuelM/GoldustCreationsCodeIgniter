<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Transactions extends CI_Controller
	{
		
		public function __construct()
		{
			
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('transactions_model');
			$this->load->model('events_model');
			$this->load->model('notifications_model');
			$this->load->model('session_model');
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}

		public function ongoingTransactions(){
			$this->session_model->sessionCheck();
			$page['pageName'] = "ongoing";
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			
			$data['ongoingTransactions']=$this->transactions_model->ongoingTransactions($empID, $empRole);
			
			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'Transactions | Admin';	
			}else{
				$headdata['pagename'] = 'Transactions | Handler';
			}

			$this->load->view("templates/head.php", $headdata);
			
			if ($empRole === 'admin') {
				$this->load->view("templates/adminHeader.php", $notif);
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/transNav.php", $page);

			}else{

				$this->load->view("templates/header.php", $notif);
				$this->load->view("templates/transNav.php", $page);

			}
			$this->load->view("templates/ongoingTransactions.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function finishedTransactions(){
			$this->session_model->sessionCheck();
			$page['pageName'] = "finished";
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			$data['finishedTransactions']=$this->transactions_model->finishedTransactions($empID, $empRole);

			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'Transactions | Admin';	
			}else{
				$headdata['pagename'] = 'Transactions | Handler';
			}

			$this->load->view("templates/head.php", $headdata);
			
			if ($empRole === 'admin') {
				$this->load->view("templates/adminHeader.php", $notif);
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/transNav.php", $page);

			}else{

				$this->load->view("templates/header.php", $notif);
				$this->load->view("templates/transNav.php", $page);

			}
			$this->load->view("templates/finishedTransactions.php", $data);
			$this->load->view("templates/footer.php");

		}

		public function cancelledTransactions(){
			$this->session_model->sessionCheck();
			$page['pageName'] = "cancelled";
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			$data['cancelledTransactions']=$this->transactions_model->cancelledTransactions($empID, $empRole);

			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'Transactions | Admin';	
			}else{
				$headdata['pagename'] = 'Transactions | Handler';
			}

			$this->load->view("templates/head.php", $headdata);
			
			if ($empRole === 'admin') {
				$this->load->view("templates/adminHeader.php", $notif);
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/transNav.php", $page);

			}else{

				$this->load->view("templates/header.php", $notif);
				$this->load->view("templates/transNav.php", $page);

			}
			$this->load->view("templates/cancelledTransactions.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function transactionDetails(){
			$this->session_model->sessionCheck();
			$page['pageName'] = "tdetails";
			$data['currentDate'] = date('Y-m-d');
			date_default_timezone_set('Asia/Manila');
			$data['currentTime'] = date('H:i');
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$tranID = $this->session->userdata('currentTransactionID');
			$data['transactionStatus'] = $this->transactions_model->getTransactionStatus($tranID)->transactionstatus;
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			$data['totalAmount'] = $this->transactions_model->totalAmount($tranID);		
			$data['balance'] = $this->transactions_model->getBalance($tranID);
			$data['details'] = $this->transactions_model->getTransactionDetails($tranID);
			if (!empty($data['details']->employeeID) || $data['details']->employeeID !== null) {
				$data['handlerName'] = $this->transactions_model->getHandlerName($data['details']->employeeID)->employeeName;
			}else{
				$data['handlerName'] = "None";
			}		
			$data['handlers'] = $this->transactions_model->gethandlers();
			$data['total'] = $this->transactions_model->totalAmountPaid($tranID);
			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'Transactions Details| Admin';	
			}else{
				$headdata['pagename'] = 'Transactions Details | Handler';
			}

			$this->load->view("templates/head.php", $headdata);
			
			if ($empRole === 'admin') {
				$this->load->view("templates/adminHeader.php", $notif);
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/transactionNav.php", $page);
			}else{

				$this->load->view("templates/header.php", $notif);
				$this->load->view("templates/transactionNav.php", $page);
			}
			$this->load->view("templates/transactionDetails.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function transactionServices(){
			$this->session_model->sessionCheck();
			$page['pageName'] = "tservices";
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$tranID = $this->session->userdata('currentTransactionID');
			$data['transactionStatus'] = $this->transactions_model->getTransactionStatus($tranID)->transactionstatus;
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			$data['transServices'] = $this->transactions_model->getTransactionServices($tranID);
			$data['servcs'] = $this->transactions_model->getServices($tranID);
			$data['serviceIDs'] = $this->transactions_model->getServiceIDs($tranID);
			
			$data['details'] = $this->transactions_model->getTransactionDetails($tranID);
			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'Transactions Services | Admin';	
			}else{
				$headdata['pagename'] = 'Transactions Services | Handler';
			}

			$this->load->view("templates/head.php", $headdata);
			
			if ($empRole === 'admin') {
				$this->load->view("templates/adminHeader.php", $notif);
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/transactionNav.php", $page);
			}else{

				$this->load->view("templates/header.php", $notif);
				$this->load->view("templates/transactionNav.php", $page);
			}
			$this->load->view("templates/transactionServices.php", $data);
			$this->load->view("templates/footer.php");

		}

		public function transactionAppointments(){
			$this->session_model->sessionCheck();
			$page['pageName'] = "tappointments";
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$tranID = $this->session->userdata('currentTransactionID');
			$data['transactionStatus'] = $this->transactions_model->getTransactionStatus($tranID)->transactionstatus;
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			$data['transAppointments'] = $this->transactions_model->getTransactionAppointments($tranID);
			$data['details'] = $this->transactions_model->getTransactionDetails($tranID);
			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'Transactions Appointments | Admin';	
			}else{
				$headdata['pagename'] = 'Transactions Appointments | Handler';
			}

			$this->load->view("templates/head.php", $headdata);
			
			if ($empRole === 'admin') {
				$this->load->view("templates/adminHeader.php", $notif);
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/transactionNav.php", $page);
			}else{

				$this->load->view("templates/header.php", $notif);
				$this->load->view("templates/transactionNav.php", $page);
			}
			$this->load->view("templates/transactionAppointments.php", $data);
			$this->load->view("templates/footer.php");

		}

		public function transactionPayments(){
			$this->session_model->sessionCheck();
			$page['pageName'] = "tpayments";
			$data['currentDate'] = date('Y-m-d');
			date_default_timezone_set('Asia/Manila');
			$data['currentTime'] = date('H:i');
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$tranID = $this->session->userdata('currentTransactionID');
			$data['transactionStatus'] = $this->transactions_model->getTransactionStatus($tranID)->transactionstatus;
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			$totalPayments = $this->transactions_model->totalAmountPaid($tranID);
			$totalAmount = $this->transactions_model->totalAmount($tranID);
			$data['totalPayments'] = $totalPayments;
			$data['totalAmount'] = $totalAmount;		
			$data['balance'] = $totalAmount->totalAmount - $totalPayments->total;
			$data['payments'] = $this->transactions_model->getTransactionPayments($tranID);
			$data['details'] = $this->transactions_model->getTransactionDetails($tranID);
			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'Transactions Payments | Admin';	
			}else{
				$headdata['pagename'] = 'Transactions Payments | Handler';
			}

			$this->load->view("templates/head.php", $headdata);
			
			if ($empRole === 'admin') {
				$this->load->view("templates/adminHeader.php", $notif);
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/transactionNav.php", $page);
			}else{

				$this->load->view("templates/header.php", $notif);
				$this->load->view("templates/transactionNav.php", $page);
			}
			$this->load->view("templates/transactionPayments.php", $data);
			$this->load->view("templates/footer.php");

		}

		public function addsvc(){
			$this->session_model->sessionCheck();

			$tID = $this->session->userdata('currentTransactionID');


			
			if (!empty($this->input->post('services[]'))) {
				foreach ($this->input->post('services[]') as $key => $service) {
					$this->transactions_model->addServcs($tID, $service);
					$data['availedServices'][$key] = $this->transactions_model->getService($service);
				}

			}

			redirect('transactions/transactionServices');
			
		}
		/*
		public function updateServiceDetails(){

			$tid = $this->session->userdata('currentTransactionID');
			$action = $this->input->post('action');
			$serviceID = $this->input->post('serviceID');

			$data = array('success' => false, 'messages' => array(), 'action' => "");

			$this->form_validation->set_rules('serviceQuantity', 'Quantity', 'trim|numeric');
			$this->form_validation->set_rules('serviceAmount', 'Amount', 'trim|numeric');

			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$quantity = $this->input->post('serviceQuantity');
				$amount = $this->input->post('serviceAmount');
				
				
				if ($action === "remove") {
					$this->transactions_model->removeService($tid, $serviceID);
					$data['action'] = "remove";
				}

				if ($action === "update") {
					$data['action'] = "update";
					if (!empty($quantity)) {
						$this->transactions_model->updateQuantity($tid, $serviceID, $quantity);		
					}
					if (!empty($amount)) {
						$this->transactions_model->updateAmount($tid, $serviceID, $amount);
					}
				}

				$this->transactions_model->updateTotalAmount($tid);

				$data['success'] = true;	
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}

			echo json_encode($data);
		}
		*/

		public function updateServiceDetails(){

			$this->session_model->sessionCheck();

			$tid = $this->session->userdata('currentTransactionID');
			$action = $this->input->post('action');
			$serviceID = $this->input->post('serviceID');


			$quantity = $this->input->post('serviceQuantity');
			$amount = $this->input->post('serviceAmount');
			
			
			if ($action === "remove") {
				$this->transactions_model->removeService($tid, $serviceID);
				$data['action'] = "remove";
			}

			if ($action === "update") {
				$data['action'] = "update";
				if (!empty($quantity)) {
					$this->transactions_model->updateQuantity($tid, $serviceID, $quantity);		
				}
				if (!empty($amount)) {
					$this->transactions_model->updateAmount($tid, $serviceID, $amount);

				}
			}
			$totalOfServices = $this->transactions_model->totalAmountForServices($tid);
			$this->transactions_model->updateTotalAmount($tid, $totalOfServices->total);

			redirect('transactions/transactionServices');

		}

		public function addAdditionalCharges(){

			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('additionalCharge', 'Amount', 'trim|required|numeric|greater_than_equal_to[0]');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if($this->form_validation->run()){
				$amount = $this->input->post('additionalCharge');
				$tID = $this->session->userdata('currentTransactionID');

				$totalAmount = $this->transactions_model->totalAmount($tID);
				$newTotalAmount = $totalAmount->totalAmount + $amount;
				$this->transactions_model->updateTotalAmount($tID, $newTotalAmount);
				$data['newTotalAmount'] = number_format($newTotalAmount, 2);
				$data['balance'] = number_format($this->transactions_model->getBalance($tID), 2);
				$data['success'] = true;
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}

			echo json_encode($data);

		}

		public function addTransactionAppointments(){
			$empID = $this->session->userdata('employeeID');
			$ctID = $this->session->userdata('currentTransactionID');
			
			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('agenda', 'Agenda', 'trim|required');
			$this->form_validation->set_rules('appointmentDate', 'Appointment Date', 'required');
			$this->form_validation->set_rules('appointmentTime', 'Appointment Time', 'required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$adate = html_escape($this->input->post('appointmentDate'));
				$time = html_escape($this->input->post('appointmentTime'));
				$agenda = ucwords(html_escape($this->input->post('agenda')));

				$this->transactions_model->addTransactionAppointment($empID, $ctID, $adate, $time, $agenda);
				$newDate = date_create($adate);
				$dateFormated = date_format($newDate, "M-d-Y");
				$newTime = date("g:i a", strtotime($time));
				$data['time'] = $newTime;
				$data['date'] = $dateFormated;
				$data['agenda'] = $agenda;

				$data['success'] = true;
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}
			echo json_encode($data);
			
		}
		
		public function ongoing_rentals(){
			$this->session_model->sessionCheck();
			$empRole = $this->session->userdata('role');
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			$data['tdata'] = $this->transactions_model->view_home_ongoing_rentals();
			$data['evredata'] = $this->transactions_model->viewEventRentals();
			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'Ongoing Rentals | Admin';	
			}else{
				$headdata['pagename'] = 'Ongoing Rentals | Handler';
			}
			$this->load->view("templates/head.php", $headdata);
			if ($empRole === 'admin') {
				$this->load->view("templates/adminHeader.php", $notif);
				$this->load->view("templates/adminNavbar.php");
			}else{
				$this->load->view("templates/header.php", $notif);
			}
			$this->load->view('templates/ongoingRentals', $data);

			$this->load->view("templates/footer.php");
		}

		public function setTransactionID(){
			$this->session_model->sessionCheck();
			$currentTransactionID = $this->input->post('transInfo');
			$clientID = $this->input->post('clientID');
			$this->session->set_userdata('currentTransactionID', $currentTransactionID);
			$this->session->set_userdata('clientID', $clientID);

			redirect('transactions/transactionDetails');
			
		}

		public function markFinish(){
			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('finishDate', 'Finish Date', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
			
			if ($this->form_validation->run()) {
				$id = $this->input->post('finish');
				$date = $this->input->post('finishDate');
				$this->transactions_model->finishTransaction($id, $date);

				$data['success'] = true;

			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}

			echo json_encode($data);
			
		}

		public function markCancel(){
			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('cancellDate', 'Finish Date', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$id = $this->input->post('cancel');
				$date = $this->input->post('cancellDate');
				$this->transactions_model->cancelTransaction($id, $date);

				$data['success'] = true;

			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}

			echo json_encode($data);
			
		}

		public function refundDeposit(){
			$id = $this->input->post('refund');
			if ($this->transactions_model->refundDeposit($id)) {
				$data['refunded'] = true;
			}else{
				$data['refunded'] = false;
			}

			$data['success'] = true;
			echo json_encode($data);
		}	

		public function addTransaction(){
			$this->session_model->sessionCheck();

			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('transactionAvailDate', 'Avail Date', 'trim|required');
			$this->form_validation->set_rules('transactionAvailTime', 'Avail Time', 'trim|required');
			$this->form_validation->set_rules('handler', 'Handler', 'trim');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$clientID = $this->input->post('transactionClientID');
				$availDate = htmlspecialchars($this->input->post('transactionAvailDate'));
				$availTime = htmlspecialchars($this->input->post('transactionAvailTime'));
				$handler = htmlspecialchars($this->input->post('handler'));

				$newTranID = $this->transactions_model->insertTransaction($clientID, $availDate, $availTime, $handler);

				$this->session->set_userdata('currentTransactionID', $newTranID);
				$data['success'] = true;
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
				if (!isset($_POST['handler'])) {
					$data['messages']['handler'] = '<p class="text-danger">The Handler field is required!</p>';
				}
			}

			echo json_encode($data);		

		}

		public function updateTransactionDetails(){
			$transID = $this->session->userdata('currentTransactionID');
			$clientID = $this->session->userdata('clientID');

			$transactionDetails = $this->transactions_model->getTransactionDetails($transID);

			$data = array('success' => false, 'messages' => array(), 'contactNumber' => false, 'address' => false, 'yNs' => false, 'school' => false, 'idType' => false, 'deposit' => false, 'newDate' => false, 'newTime' => false);

			$this->form_validation->set_rules('depositAmt', 'Deposit', 'trim|numeric|greater_than_equal_to[0]');
			$this->form_validation->set_rules('contactNumber', 'contactNumber', 'trim|numeric');
			$this->form_validation->set_rules('address', 'Address', 'trim|alpha_numeric_spaces');
			$this->form_validation->set_rules('yNs', 'Year and Section', 'trim|alpha_numeric_spaces');
			$this->form_validation->set_rules('school', 'School', 'trim|alpha_numeric_spaces');
			$this->form_validation->set_rules('idType', 'ID Type', 'trim|alpha_numeric_spaces');

			if ($transactionDetails->dateAvail == null) {
				$this->form_validation->set_rules('newDate', 'Date', 'trim|required');
			}else{
				$this->form_validation->set_rules('newDate', 'Date', 'trim');
			}

			if ($transactionDetails->time == null) {
				$this->form_validation->set_rules('newTime', 'Time', 'trim|required');
			}else{
				$this->form_validation->set_rules('newTime', 'Time', 'trim');
			}

			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$contactNumber = html_escape($this->input->post('contactNumber'));
				$address = ucwords(html_escape($this->input->post('address')));
				$yNs = ucwords(html_escape($this->input->post('yNs')));
				$school = ucwords(html_escape($this->input->post('school')));
				$idType = ucwords(html_escape($this->input->post('idType')));
				$depositAmount = html_escape($this->input->post('depositAmt'));
				$date = html_escape($this->input->post('newDate'));
				$time = html_escape($this->input->post('newTime'));
				$handler = html_escape($this->input->post('handler'));

				if (!empty($handler)) {
					$this->transactions_model->upTransactionHandler($handler, $transID);
					$data['handler'] = true;
					$data['handlerName'] = $this->transactions_model->getHandlerName($handler)->employeeName;
				}
				if (!empty($contactNumber)) {
					$this->transactions_model->upContactNumber($contactNumber, $clientID);
					$data['contactNumber'] = true;		
				}
				if (!empty($address)) {
					$this->transactions_model->upAddress($address, $transID);
					$data['address'] = true;		
				}
				if (!empty($yNs)) {
					$this->transactions_model->upYnS($yNs, $transID);
					$data['yNs'] = true;		
				}
				if (!empty($school)) {
					$this->transactions_model->upSchool($school, $transID);
					$data['school'] = true;		
				}
				if (!empty($idType)) {
					$this->transactions_model->upIdType($idType, $transID);
					$data['idType'] = true;		
				}
				if (!empty($depositAmount)) {
					$this->transactions_model->upDepositAmount($depositAmount, $transID);	
					$data['deposit'] = true;
					$data['depositAmt'] = number_format($depositAmount, 2);
					$data['totalAmount'] = number_format($this->transactions_model->totalAmount($transID)->totalAmount, 2);
					$data['balance'] = number_format($this->transactions_model->getBalance($transID), 2);	
				}
				if (!empty($date)) {
					$this->transactions_model->upDate($date, $transID);
					$data['newDate'] = true;
					$newDate = date_create($date);
					$data['newDateValue'] = date_format($newDate, "M-d-Y");
				}
				if (!empty($time)) {
					$this->transactions_model->upTime($time, $transID);
					$data['newTime'] = true;
					$data['newTimeValue'] = date("g:i a", strtotime($time));		
				}

				$data['success'] = true;
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
				if (!isset($_POST['handler']) && (empty($transactionDetails->employeeID) || $transactionDetails->employeeID == null)) {
					$data['messages']['currentHandler'] = '<p class="text-danger">A handler for this transaction should be selected!</p>';
				}else{
					$data['messages']['currentHandler'] = "";
				}
			}

			echo json_encode($data);

		}

		public function addPayment(){
	
			$transactionID = $this->session->userdata('currentTransactionID');
			$empID = $this->session->userdata('employeeID');
			$clientID = $this->session->userdata('clientID');

			$data = array('success' => false, 'messages' => array(), 'paymentID' => null, 'balance' => true, 'balanceAmount' => 0);

			$totalAmount = $this->transactions_model->totalAmount($transactionID);
			$totalAmountPaid = $this->transactions_model->totalAmountPaid($transactionID);

			$transactionBalance = $totalAmount->totalAmount - $totalAmountPaid->total;

			$this->form_validation->set_rules('amount', 'Amount', 'trim|required|less_than_equal_to[' . $transactionBalance . ']|greater_than_equal_to[0]');
			$this->form_validation->set_rules('date', 'Payment Date', 'trim|required');
			$this->form_validation->set_rules('time', 'Payment Time', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$date = $this->input->post('date');
				$time = $this->input->post('time');
				$amount = $this->input->post('amount');
				
				$this->transactions_model->addTransactionPayment($clientID, $empID, $transactionID, $date, $time, $amount);
				$newTotalAmountPaid = $this->transactions_model->totalAmountPaid($transactionID);

				$newTransactionBalance = $totalAmount->totalAmount - $newTotalAmountPaid->total;

				$data['receiver'] = $this->session->userdata('firstName') . " " . $this->session->userdata('midName') . " " . $this->session->userdata('lastName');				
				$data['balanceAmount'] = number_format($newTransactionBalance, 2);
				$data['paidAmount'] = number_format($amount, 2);
				$newDate = date_create($date);
				$newDateFormated = date_format($newDate, "M-d-Y");
				$newTimeFormated = date("g:i a", strtotime($time));
				$data['dateNtime'] = $newDateFormated . " " . $newTimeFormated;
				$data['success'] = true;
				
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
				if ($transactionBalance <= 0) {
					$data['balance'] = false;
				}
				
			}

			echo json_encode($data);
			
		}
		
	}
	?>