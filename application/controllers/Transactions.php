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
			$this->load->library('session');
		}

		public function transactions(){
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$data['transactions']=$this->transactions_model->view_transactions($empID, $empRole);


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

		

	}
 ?>