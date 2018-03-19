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

			$data['servcs'] = $this->transactions_model->getServices();

			$data['details'] = $this->transactions_model->getTransactionDetails($tranID);
			$data['transServices'] = $this->transactions_model->getTransactionServices($tranID);
			$data['transAppointments'] = $this->transactions_model->getTransactionAppointments($tranID);
			$data['payments'] = $this->transactions_model->getTransactionPayments($tranID);

			$data['total'] = $this->transactions_model->totalAmountPaid($tranID);

			$this->load->view("templates/head.php");
			
			if ($empRole === 'admin') {
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
			}else{

				$this->load->view("templates/header.php");
			}
			$this->load->view("templates/transactionDetails.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function addsvc(){
			//$addSvc = $this->input->post('add_servc_chkbox');
			$tID = $this->session->userdata('currentTransactionID');
			if (!empty($this->input->post('services[]'))) {
				foreach ($this->input->post('services[]') as $service) {
					$this->transactions_model->addServcs($tID, $service);
				}
			}
			
			redirect('transactions/transactionDetails');
		}

		public function updateServiceDetails(){
			$tid = $this->session->userdata('currentTransactionID');
			$serviceID = $this->input->post('serviceID');
			$quantity = $this->input->post('quantity');
			$amount = $this->input->post('amount');
			$action = $this->input->post('action');
			
			if ($action === "remove") {
				$this->transactions_model->removeService($tid, $serviceID);
			}

			if ($action === "update") {
				if (!empty($quantity)) {
					$this->transactions_model->updateQuantity($tid, $serviceID, $quantity);		
				}
				if (!empty($amount)) {
					$this->transactions_model->updateAmount($tid, $serviceID, $amount);
				}
			}
			redirect('transactions/transactionDetails');
		}

		public function addTransactionAppointments(){
			$empID = $this->session->userdata('employeeID');
			$ctID = $this->session->userdata('currentTransactionID');
			$adate = $this->input->post('appointmentDate');
			$time = $this->input->post('time');
			$agenda = $this->input->post('agenda');

			$this->transactions_model->addTransactionAppointment($empID, $ctID, $adate, $time, $agenda);

			redirect('transactions/transactionDetails');
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
			$this->session->set_userdata('currentTransactionID', $currentTransactionID);

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
			$contactNumber = $this->input->post('contactNumber');
			$address = $this->input->post('address');
			$yNs = $this->input->post('yNs');
			$school = $this->input->post('school');
			$idType = $this->input->post('idType');
			$depositAmount = $this->input->post('depositAmt');
			$totalAmount = $this->input->post('totalAmount');
			$date = $this->input->post('date');
			$time = $this->input->post('time');

			if (!empty($contactNumber)) {
				$this->transactions_model->upContactNumber($contactNumber, $clientID);		
			}
			if (!empty($address)) {
				$this->transactions_model->upAddress($address, $transID);		
			}
			if (!empty($yNs)) {
				$this->transactions_model->upYnS($yNs, $transID);		
			}
			if (!empty($school)) {
				$this->transactions_model->upSchool($school, $transID);		
			}
			if (!empty($idType)) {
				$this->transactions_model->upIdType($idType, $transID);		
			}
			if (!empty($depositAmount)) {
				$this->transactions_model->upDepositAmount($depositAmount, $transID);		
			}
			if (!empty($totalAmount)) {
				$this->transactions_model->upTotalAmount($totalAmount, $transID);		
			}
			if (!empty($date)) {
				$this->transactions_model->upDate($date, $transID);		
			}
			if (!empty($time)) {
				$this->transactions_model->upTime($time, $transID);		
			}

			redirect('transactions/transactionDetails');

		}
		
	}
 ?>