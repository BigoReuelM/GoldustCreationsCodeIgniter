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
			$this->load->model('notifications_model');
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
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'Home | Admin';	
			}else{
				$headdata['pagename'] = 'Home | Handler';
			}			

			$this->load->view("templates/head.php", $headdata);
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("adminPages/adminHome.php", $data);
			$this->load->view("templates/footer.php");
		}
		public function viewReports(){
			$this->load->view("templates/head.php");
			$this->load->view("templates/adminHeader.php");
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("adminPages/statistics.php");
			$this->load->view("templates/footer.php");
		}

		public function employeeDetails(){
			$employeeID = $this->input->post('employeeID');
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments(); 
			$data['employee'] = $this->admin_model->getEmpDetails($employeeID);
			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'Employee Details | Admin';	
			}else{
				$headdata['pagename'] = 'Employee Details | Handler';
			}

			$this->load->view("templates/head.php", $headdata);
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("adminPages/employeeDetails.php", $data);
			$this->load->view("templates/footer.php");
			
		}


		public function adminEmployeeManagement(){
			$data['admin'] = $this->admin_model->getAdminEmployees();
			$data['handler'] = $this->admin_model->getHandlerEmployees();
			$data['staff'] = $this->admin_model->getStaffEmployees();
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'Manage Employee | Admin';	
			}else{
				$headdata['pagename'] = 'Manage Employee | Handler';
			}
			$this->load->view("templates/head.php", $headdata);
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("adminPages/adminEmployee.php", $data);
			$this->load->view("templates/footer.php");

		}

		public function addEmployee(){
			$config['upload_path'] = './uploads/userImage';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('userfile')) {
				$this->upload->data();
			}
			

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

				$this->admin_model->insertNewEmployee($fname, $mname, $lname, $cNumber, $email, $address, $role);
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
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'Services | Admin';	
			}else{
				$headdata['pagename'] = 'Services | Handler';
			}

			$this->load->view("templates/head.php", $headdata);
			$this->load->view("templates/adminHeader.php", $notif);
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
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'Expenses | Admin';	
			}else{
				$headdata['pagename'] = 'Expenses | Handler';
			}

			$this->load->view("templates/head.php", $headdata);
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("adminPages/expenseMonitoring.php", $data);
			$this->load->view("templates/footer.php");

		}

		public function addExpenses(){
			$empID = $this->session->userdata('employeeID');

			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('expenseName', 'Expense Name', 'trim|required');
			$this->form_validation->set_rules('expenseDate', 'Expenses Date', 'required');
			$this->form_validation->set_rules('expenseAmount', 'Amount', 'trim|required|numeric');
			$this->form_validation->set_rules('expenseReceipt', 'Receipt No.', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');


			if ($this->form_validation->run()) {

				$date = $this->input->post('expenseDate');
				$amount = $this->input->post('expenseAmount');
				$name = $this->input->post('expenseName');
				$rNum = $this->input->post('expenseReceipt');
				
				
				$this->admin_model->addExpenses($empID, $name, $date, $amount, $rNum);
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

		public function resetEmployeePassword(){

			$pin = $this->generatePIN();
			$empID = $this->input->post('empID');

			$data['pin'] = $pin;

			$this->admin_model->returnPassToDefault($pin, $empID);

			$data['success'] = true;

			echo json_encode($data);
		}

		public function generatePIN(){
			$digits = 4;
			$i = 0;
			$pin = "";
			while($i < $digits){
		        //generate a random number between 0 and 9.
		        $pin .= mt_rand(0, 9);
		        $i++;
		    }
		   
		    return $pin;
		}


		public function adminTheme(){
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			$data['themes'] = $this->events_model->getThemes();

			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'Themes | Admin';	
			}else{
				$headdata['pagename'] = 'Themes | Handler';
			}
			$this->load->view("templates/head.php", $headdata);
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("adminPages/theme.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function addNewTheme(){
			$name = $this->input->post('themeName');
			$desc = $this->input->post('themeDesc');
			$this->admin_model->addTheme($name, $desc);
			$this->adminTheme();
		}


	}

	?>