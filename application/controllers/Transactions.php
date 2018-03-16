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
			$tranID = $this->input->post('transInfo');

			$data['details'] = $this->transactions_model->getTransactionDetails($tranID);
			$data['transServices'] = $this->transactions_model->getTransactionServices($tranID);
			$data['transAppointments'] = $this->transactions_model->getTransactionAppointments($tranID);
			$data['payments'] = $this->transactions_model->getTransactionPayments($tranID);
			$data['expenses'] = $this->transactions_model->getTransactionExpenses($tranID);
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
			//$this->session->set_serdata('tID');
			$currentTransactionID = $this->input->post('tID');
			$this->session->set_userdata('tID', $currentTransactionID);
			
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
		
	}
 ?>