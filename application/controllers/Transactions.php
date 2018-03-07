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
			$data['transactions']=$this->transactions_model->view_transactions($empID, $empRole);
			$data['transactionsDetails']=$this->transactions_model->getTransactionDetails($empID, $empRole);
			$data['decors'] = $this->transactions_model->getDecors();
			$data['designs'] = $this->transactions_model->getDesigns();


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
		
		public function ongoing_rentals(){
			$empRole = $this->session->userdata('role');
			$this->load->view("templates/head.php");
			$this->load->view("templates/header.php");
			$data['tdata'] = $this->transactions_model->view_home_ongoing_rentals();
			$this->load->view('templates/ongoingRentals', $data);

			$this->load->view("templates/footer.php");
		}
		

	}
 ?>