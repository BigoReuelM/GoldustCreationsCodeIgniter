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
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}

		public function transactions(){
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$data['services']=$this->events_model->getServices();

			$data['transactionsDetails']=$this->transactions_model->getTransactionDetails($empID, $empRole);
			$data['decors'] = $this->transactions_model->getDecors();
			$data['designs'] = $this->transactions_model->getDesigns();
			$data['ongoingTransactions']=$this->transactions_model->ongoingTransactions($empID, $empRole);
			$data['finishedTransactions']=$this->transactions_model->finishedTransactions($empID, $empRole);
			$data['cancelledTransactions']=$this->transactions_model->cancelledTransactions($empID, $empRole);

			$this->load->view("templates/head.php");
			
			if ($empRole === 'admin') {
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");

			}else{

				$this->load->view("templates/header.php");

			}
			$this->load->view("templates/transactions.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function transactionDetails(){
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$tranID = $this->session->userdata('currentTransactionID');

			$totalPayments = $this->transactions_model->totalAmountPaid($tranID);
			$totalAmount = $this->transactions_model->totalAmount($tranID);
			$data['totalPayments'] = $totalPayments;
			$data['totalAmount'] = $totalAmount;		
			$data['balance'] = $totalAmount->totalAmount - $totalPayments->total;
			$data['details'] = $this->transactions_model->getTransactionDetails($tranID);		

			$data['total'] = $this->transactions_model->totalAmountPaid($tranID);

			$this->load->view("templates/head.php");
			
			if ($empRole === 'admin') {
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/transactionNav.php");
			}else{

				$this->load->view("templates/header.php");
				$this->load->view("templates/transactionNav.php");
			}
			$this->load->view("templates/transactionDetails.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function transactionServices(){
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$tranID = $this->session->userdata('currentTransactionID');

			$data['transServices'] = $this->transactions_model->getTransactionServices($tranID);
			$data['servcs'] = $this->transactions_model->getServices();
			$data['details'] = $this->transactions_model->getTransactionDetails($tranID);

			$this->load->view("templates/head.php");
			
			if ($empRole === 'admin') {
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/transactionNav.php");
			}else{

				$this->load->view("templates/header.php");
				$this->load->view("templates/transactionNav.php");
			}
			$this->load->view("templates/transactionServices.php", $data);
			$this->load->view("templates/footer.php");

		}

		public function transactionAppointments(){
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$tranID = $this->session->userdata('currentTransactionID');

			$data['transAppointments'] = $this->transactions_model->getTransactionAppointments($tranID);
			$data['details'] = $this->transactions_model->getTransactionDetails($tranID);

			$this->load->view("templates/head.php");
			
			if ($empRole === 'admin') {
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/transactionNav.php");
			}else{

				$this->load->view("templates/header.php");
				$this->load->view("templates/transactionNav.php");
			}
			$this->load->view("templates/transactionAppointments.php", $data);
			$this->load->view("templates/footer.php");

		}

		public function transactionPayments(){
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$tranID = $this->session->userdata('currentTransactionID');

			$totalPayments = $this->transactions_model->totalAmountPaid($tranID);
			$totalAmount = $this->transactions_model->totalAmount($tranID);
			$data['totalPayments'] = $totalPayments;
			$data['totalAmount'] = $totalAmount;		
			$data['balance'] = $totalAmount->totalAmount - $totalPayments->total;
			$data['payments'] = $this->transactions_model->getTransactionPayments($tranID);
			$data['details'] = $this->transactions_model->getTransactionDetails($tranID);

			$this->load->view("templates/head.php");
			
			if ($empRole === 'admin') {
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/transactionNav.php");
			}else{

				$this->load->view("templates/header.php");
				$this->load->view("templates/transactionNav.php");
			}
			$this->load->view("templates/transactionPayments.php", $data);
			$this->load->view("templates/footer.php");

		}

		public function addsvc(){

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

			$this->form_validation->set_rules('additionalCharge', 'Amount', 'trim|required|numeric');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if($this->form_validation->run()){
				$amount = $this->input->post('additionalCharge');
				$tID = $this->session->userdata('currentTransactionID');

				$totalAmount = $this->transactions_model->totalAmount($tID);
				$newTotalAmount = $totalAmount->totalAmount + $amount;
				$this->transactions_model->updateTotalAmount($tID, $newTotalAmount);

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
				$adate = $this->input->post('appointmentDate');
				$time = $this->input->post('appointmentTime');
				$agenda = $this->input->post('agenda');

				$this->transactions_model->addTransactionAppointment($empID, $ctID, $adate, $time, $agenda);

				$data['success'] = true;
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}
			echo json_encode($data);
			
		}
		
		public function ongoing_rentals(){
			$empRole = $this->session->userdata('role');
			
			$data['tdata'] = $this->transactions_model->view_home_ongoing_rentals();
			$data['evredata'] = $this->transactions_model->viewEventRentals();
			
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
			}else{
				$this->load->view("templates/header.php");
			}
			$this->load->view('templates/ongoingRentals', $data);

			$this->load->view("templates/footer.php");
		}

		public function setTransactionID(){
			$currentTransactionID = $this->input->post('transInfo');
			$clientID = $this->input->post('clientID');
			$this->session->set_userdata('currentTransactionID', $currentTransactionID);
			$this->session->set_userdata('clientID', $clientID);

			redirect('transactions/transactionDetails');
			
		}

		public function markFinish(){
			$id = $this->input->post('finish');

			$this->transactions_model->finishTransaction($id);

			redirect('transactions/transactions');
		}

		public function markCancel(){
			$id = $this->input->post('cancel');

			$this->transactions_model->cancelTransaction($id);

			redirect('transactions/transactions');
			
		}

		public function addTransaction(){
			$clientID = $this->input->post('clientID');
			$empID = $this->session->userdata('employeeID');

			$newTranID = $this->transactions_model->insertTransaction($clientID, $empID);

			$this->session->set_userdata('currentTransactionID', $newTranID);

			redirect('transactions/transactionDetails');
		}

		public function updateTransactionDetails(){
			$transID = $this->session->userdata('currentTransactionID');
			$clientID = $this->session->userdata('clientID');

			$data = array('success' => false, 'messages' => array(), 'contactNumber' => false, 'address' => false, 'yNs' => false, 'school' => false, 'idType' => false, 'depositAmt' => false, 'newDate' => false, 'newTime' => false);

			$this->form_validation->set_rules('depositAmt', 'Deposit', 'trim|numeric');

			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$contactNumber = $this->input->post('contactNumber');
				$address = $this->input->post('address');
				$yNs = $this->input->post('yNs');
				$school = $this->input->post('school');
				$idType = $this->input->post('idType');
				$depositAmount = $this->input->post('depositAmt');
				$date = $this->input->post('newDate');
				$time = $this->input->post('newTime');

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
					$data['depositAmt'] = true;	
				}
				if (!empty($date)) {
					$this->transactions_model->upDate($date, $transID);
					$data['newDate'] = true;
				}
				if (!empty($time)) {
					$this->transactions_model->upTime($time, $transID);
					$data['newTime'] = true;		
				}

				$data['success'] = true;
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}

			echo json_encode($data);

		}

		public function addPayment(){
			$transactionID = $this->session->userdata('currentTransactionID');
			$empID = $this->session->userdata('employeeID');
			$clientID = $this->session->userdata('clientID');

			$data = array('success' => false, 'messages' => array(), 'paymentID' => null, 'balance' => false, 'balanceAmount' => 0);

			$totalAmount = $this->transactions_model->totalAmount($transactionID);
			$totalAmountPaid = $this->transactions_model->totalAmountPaid($transactionID);

			$transactionBalance = $totalAmount->totalAmount - $totalAmountPaid->total; 

			if ($transactionBalance > 0) {
				$data['balance'] = true;
				$data['balanceAmount'] = $transactionBalance;
			}

			$this->form_validation->set_rules('amount', 'Amount', 'trim|required|less_than_equal_to[' . $transactionBalance . ']');
			$this->form_validation->set_rules('date', 'Payment Date', 'trim|required');
			$this->form_validation->set_rules('time', 'Payment Time', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$date = $this->input->post('date');
				$time = $this->input->post('time');
				$amount = $this->input->post('amount');
				
				$paymentID = $this->transactions_model->addTransactionPayment($clientID, $empID, $transactionID, $date, $time, $amount);

				$data['paymentID'] = $paymentID;

				$data['success'] = true;
					
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}

			echo json_encode($data);
			
		}
		
	}
 ?>