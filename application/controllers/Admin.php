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
			$this->load->helper('form');
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
			$employeeID = $this->input->post('employeeID');

			$data['employee'] = $this->admin_model->getEmpDetails($employeeID);

			$this->load->view("templates/head.php");
			$this->load->view("templates/adminHeader.php");
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("adminPages/employeeDetails.php", $data);
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

		public function addEmployee(){
			$fname = $this->input->post('firstname');
			$mname = $this->input->post('middlename');
			$lname = $this->input->post('lastname');
			$cNumber = $this->input->post('cNumber');
			$email = $this->input->post('email');
			$address = $this->input->post('address');
			$role = $this->input->post('role');
			$image = $this->input->post('employeeImage');

			$this->admin_model->insertNewEmployee($fname, $mname, $lname, $cNumber, $email, $address, $role, $image);

			redirect('admin/adminEmployeeManagement');

		}

		public function services(){
			$data['active'] = $this->admin_model->getActiveServices();
			$data['inactive'] = $this->admin_model->getInactiveServices();
			$this->load->view("templates/head.php");
			$this->load->view("templates/adminHeader.php");
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("adminPages/adminServices.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function activateServiceStatus(){
			$serviceID = $this->input->post('inactive');

			$this->admin_model->activateService($serviceID);
				
			redirect('admin/services');		

		}

		public function deactivateServiceStatus(){
			$serviceID = $this->input->post('active');

			$this->admin_model->deactivateService($serviceID);

			redirect('admin/services');

		}

		public function expenses(){

			$data['expenses']=$this->admin_model->getExpenses();
			$data['totalExpenses']=$this->admin_model->totalExpenses();

			$this->load->view("templates/head.php");
			$this->load->view("templates/adminHeader.php");
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("adminPages/expenseMonitoring.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function addExpenses(){
			$date = $this->input->post('date');
			$amount = $this->input->post('expenseAmount');
			$name = $this->input->post('expenseName');
			$image = $this->input->post('expenseImage');
			$rNum = $this->input->post('receiptNumber');
			$currentEventID = $this->session->userdata('currentEventID');
			$empID = $this->session->userdata('employeeID');
			$this->admin_model->addEventExpenses($empID, $currentEventID, $name, $date, $amount, $rNum, $image);

			redirect('admin/expenses');
		}

		public function addNewService(){
			$serviceName = $this->input->post('serviceName');
			$serviceDisk = $this->input->post('description');

			$this->admin_model->insertService($serviceName, $serviceDisk);

			redirect('admin/services');
		}





	}

 ?>