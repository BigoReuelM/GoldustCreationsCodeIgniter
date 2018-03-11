<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	
	/**
	* 
	*/
	class Admin extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('admin_model');
			$this->load->model('events_model');
			$this->load->library('session');
		}

		public function index(){
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$newStatus = "new";
			$ongoingStatus = "on-going";

			$data['new']=$this->events_model->getNewEventsCount($empID, $empRole, $newStatus);
			$data['ongoing']=$this->events_model->getEventCount($empID, $empRole, $ongoingStatus);

			$this->load->view("templates/head.php");
			$this->load->view("templates/adminHeader.php");
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("adminPages/adminHome.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function employeeDetails(){
			$this->load->view("templates/head.php");
			$this->load->view("templates/adminHeader.php");
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("adminPages/employeeDetails.php");
			$this->load->view("templates/footer.php");
		}


		public function adminEmployeeManagement(){
			$data['admin'] = $this->admin_model->getAdminEmployees();
			$data['handler'] = $this->admin_model->getHandlerEmployees();
			$data['staff'] = $this->admin_model->getStaffEmployees();
			$this->load->view("templates/head.php");
			$this->load->view("templates/adminHeader.php");
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("adminPages/adminEmployee.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function services(){
			$this->load->view("templates/head.php");
			$this->load->view("templates/adminHeader.php");
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("adminPages/adminServices.php");
			$this->load->view("templates/footer.php");
		}

	}

 ?>