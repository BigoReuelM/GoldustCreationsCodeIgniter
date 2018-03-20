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
			$this->load->library('form_validation');
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


			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('middlename', 'Middle Name', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('cNumber', 'Contact Number', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');
			$this->form_validation->set_rules('role', 'Role', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
			if ($this->form_validation->run()) {
				$fname = $this->input->post('firstname');	
				$mname = $this->input->post('middlename');
				$lname = $this->input->post('lastname');
				$cNumber = $this->input->post('cNumber');
				$email = $this->input->post('email');
				$address = $this->input->post('address');
				$role = $this->input->post('role');
				$picture = $this->input->post('employeeImage');

				$this->admin_model->insertNewEmployee($fname, $mname, $lname, $cNumber, $email, $address, $role, $picture);
				$data['success'] = true;
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}

			echo json_encode($data);

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
			$empID = $this->session->userdata('employeeID');

			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('expenseName', 'Expense Name', 'trim|required');
			$this->form_validation->set_rules('expenseDate', 'Expenses Date', 'required');
			$this->form_validation->set_rules('expenseAmount', 'Amount', 'trim|required');
			$this->form_validation->set_rules('expenseReceipt', 'Receipt No.', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');



			if ($this->form_validation->run()) {
				$date = $this->input->post('expenseDate');
				$amount = $this->input->post('expenseAmount');
				$name = $this->input->post('expenseName');
				$image = $this->input->post('expensePhoto');
				$rNum = $this->input->post('expenseReceipt');
				
				
				$this->admin_model->addExpenses($empID, $name, $date, $amount, $rNum, $image);
				$data['success'] = true;
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}
			
			echo json_encode($data);

		}

		public function addNewService(){
			
			$data = array('success' => false, 'messages' => array(), 'alert' => false);

			$this->form_validation->set_rules('serviceName', 'Service Name', 'trim|required');
			$this->form_validation->set_rules('description', 'Service Description', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$serviceName = $this->input->post('serviceName');
				$serviceDisk = $this->input->post('description');

				if ($this->form_validation->is_unique($serviceName, 'services.serviceName')) {
					$this->admin_model->insertService($serviceName, $serviceDisk);

					$data['success'] = true;
				}else{
					$data['alert'] = true;
				}
				 
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}
			echo json_encode($data);
			
		}





	}

 ?>