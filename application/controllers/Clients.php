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
			$this->load->library('form_validation');
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

			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('middlename', 'Middle Name', 'trim');
			$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('contact', 'Contact Number', 'trim|required');
			$this->form_validation->set_rules('adddate', 'Date', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger"', '</p>');

			if ($this->form_validation->run()) {
				$firstname = $this->input->post('firstname');
				$middlename = $this->input->post('middlename');
				$lastname = $this->input->post('lastname');
				$contactNo = $this->input->post('contact');
				$date = $this->input->post('adddate');
				$this->clients_model->insertClient($firstname, $middlename, $lastname, $contactNo, $date);

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