<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Clients extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('clients_model');
			$this->load->library('session');
			$this->load->helper('form');
		}

		public function clients(){
			$empRole = $this->session->userdata('role');

			$data['clients'] = $this->clients_model->clients();

			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				
			}else{
				$this->load->view("templates/header.php");
				
			}
			$this->load->view("templates/clients.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function addClient(){
			$firstname = $this->input->post('firstname');
			$middlename = $this->input->post('middlename');
			$lastname = $this->input->post('lastname');
			$contactNo = $this->input->post('contact');
			$date = $this->input->post('addDate');

			$this->clients_model->insertClient($firstname, $middlename, $lastname, $contactNo, $date);

			redirect('clients/clients');
		}
	}


?>