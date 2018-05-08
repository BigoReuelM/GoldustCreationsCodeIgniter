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
			$this->load->model('transactions_model');
			$this->load->model('clients_model');
			$this->load->model('session_model');
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}

		public function index(){
			$this->session_model->sessionCheck();
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$newStatus = "new";
			$ongoingStatus = "on-going";

			$tRentalCount = count($this->transactions_model->view_home_ongoing_rentals());
			$tEventCount = count($this->transactions_model->viewEventRentals());

			$data['rentalCount'] = $tRentalCount + $tEventCount;

			$data['newClient'] = $this->clients_model->countNewClient();

			$data['new']=$this->events_model->getNewEventsCount($empID, $empRole, $newStatus);
			$data['ongoing']=$this->events_model->getEventCount($empID, $empRole, $ongoingStatus);
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			$data['eventData'] = $this->events_model->getEventDetailsForCalendar();
			$data['eventDates'] = $this->events_model->getEventDates();
			$data['years'] = $this->events_model->getEventYear();
			$data['months'] = $this->events_model->getEventMonth();
			$data['days'] = $this->events_model->getEventDay();
			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'Home | Admin';	
			}else{
				$headdata['pagename'] = 'Home | Handler';
			}			

			$this->load->view("templates/head.php", $headdata);
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("adminPages/adminHome.php", $data);
			$this->load->view("templates/calendar.php");
			$this->load->view("templates/footer.php");
		}

		public function reportsSelectDate(){
			$date = $this->input->post('datepickerallpayments');
			$this->session->set_userdata('selectedDate', $date);
			redirect('admin/viewPaymentsReports');
		}

		public function reportsSelectMnthYr(){
			$date = $this->input->post('monthallpayments');
			$this->session->set_userdata('selectedMnthYr', $date);
			redirect('admin/viewPaymentsReports');
		}

		public function reportsSelectYr(){
			$date = $this->input->post('yrallpayments');
			$this->session->set_userdata('selectedYr', $date);
			redirect('admin/viewPaymentsReports');
		}

		public function viewIncomeReports(){
			$page['pageName'] = "income";
			$headdata['pagename'] = 'Admin | Reports';
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			$this->load->view("templates/head.php", $headdata);
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("adminPages/reportNav.php", $page);
			$this->load->view("adminPages/income.php");
			$this->load->view("templates/footer.php");
		}

		public function viewPaymentsReports(){
			$page['pageName'] = "payments";
			$headdata['pagename'] = 'Admin | Reports';
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();

			$data['payments'] = $this->admin_model->getPayments();

			$this->load->view("templates/head.php", $headdata);
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("adminPages/reportNav.php", $page);
			$this->load->view("adminPages/allPayments.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function viewDepositReports(){
			$page['pageName'] = "deposits";
			$headdata['pagename'] = 'Admin | Reports';
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			$this->load->view("templates/head.php", $headdata);
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("adminPages/reportNav.php", $page);
			$this->load->view("adminPages/allDeposits.php");
			$this->load->view("templates/footer.php");
		}

		public function viewRefundReports(){
			$page['pageName'] = "refunds";
			$headdata['pagename'] = 'Admin | Reports';
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
			$this->load->view("templates/head.php", $headdata);
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("adminPages/reportNav.php", $page);
			$this->load->view("adminPages/allRefunds.php");
			$this->load->view("templates/footer.php");
		}

		public function setPersonnelID(){
			$id = $this->input->post('employeeID');
			$this->session->set_userdata('personnelId', $id);
			redirect('admin/employeeDetails');
		}

		public function employeeDetails(){
			$this->session_model->sessionCheck();
			$employeeID = $this->session->userdata('personnelId');
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments(); 
			$data['employee'] = $this->admin_model->getEmpDetails($employeeID);
			$data['currentEventNum'] = $this->events_model->currentEventNum($employeeID);
			$data['doneEvent'] = $this->events_model->doneEventNum($employeeID);
			$data['allTransac'] = $this->events_model->allTransacNum($employeeID);
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

		public function adminEmployees(){
			$this->session_model->sessionCheck();
			$page['pageName'] = "admin";
			$data['admin'] = $this->admin_model->getAdminEmployees();
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
			$this->load->view("templates/employeeNav.php", $page);
			$this->load->view("adminPages/adminEmployees.php", $data);
			$this->load->view("templates/footer.php");

		}

		public function handlerEmployees(){
			$this->session_model->sessionCheck();
			$page['pageName'] = "handler";
			$data['handler'] = $this->admin_model->getHandlerEmployees();
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
			$this->load->view("templates/employeeNav.php", $page);
			$this->load->view("adminPages/handlerEmployees.php", $data);
			$this->load->view("templates/footer.php");

		}


		public function staffEmployees(){
			$this->session_model->sessionCheck();
			$page['pageName'] = "staff";
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
			$this->load->view("templates/employeeNav.php", $page);
			$this->load->view("adminPages/staffEmployees.php", $data);
			$this->load->view("templates/footer.php");

		}


		public function oncallstaffEmployees(){
			$this->session_model->sessionCheck();
			$page['pageName'] = "oncall";
			$data['oncallStaff'] = $this->admin_model->getOncallStaffEmployees();
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
			$this->load->view("templates/employeeNav.php", $page);
			$this->load->view("adminPages/oncallStaffEmployees.php", $data);
			$this->load->view("templates/footer.php");

		}

		public function inactiveEmployees(){
			$this->session_model->sessionCheck();
			$page['pageName'] = "inactive";
			$data['inactiveEmp'] = $this->admin_model->getInactiveEmployees();
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
			$this->load->view("templates/employeeNav.php", $page);
			$this->load->view("adminPages/inactiveEmployees.php", $data);
			$this->load->view("templates/footer.php");

		}


		public function addEmployee(){

			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('middlename', 'Middle Name', 'trim');
			$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('cNumber', 'Contact Number', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');
			$this->form_validation->set_rules('role', 'Role', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
			if ($this->form_validation->run()) {

				$fname = ucwords(html_escape($this->input->post('firstname')));	
				$mname = ucwords(html_escape($this->input->post('middlename')));
				$lname = ucwords(html_escape($this->input->post('lastname')));
				$cNumber = html_escape($this->input->post('cNumber'));
				$email = html_escape($this->input->post('email'));
				$address = ucwords(html_escape($this->input->post('address')));
				$role = html_escape($this->input->post('role'));

				$newEmpID = $this->admin_model->insertNewEmployee($fname, $mname, $lname, $cNumber, $email, $address, $role);
				$id = sprintf('%04d', $newEmpID);
				$data['success'] = true;
				$this->session->set_userdata('personnelId', $id);
				
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}

			echo json_encode($data);
		}

		public function uploadProfilePhoto(){
			$this->session_model->sessionCheck();
			$userID = $this->input->post('userID');
			$userFilePath = './uploads/profileImage/' . $userID . ".*";
			$path = glob($userFilePath);
			if (!empty($path)) {
				unlink($path[0]);
			}
			$config['upload_path'] = './uploads/profileImage/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['file_name'] = $userID;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$data = array('upload_data' => $this->upload->data());
			$this->session->set_userdata('personnelId', $userID);
			redirect('admin/employeeDetails');			
		}

		public function services(){
			$this->session_model->sessionCheck();
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
			$this->session_model->sessionCheck();
			$serviceID = html_escape($this->input->post('inactive'));

			$this->admin_model->activateService($serviceID);

			redirect('admin/services');		


		}

		public function deactivateServiceStatus(){
			$this->session_model->sessionCheck();
			$serviceID = $this->input->post('active');

			$this->admin_model->deactivateService($serviceID);

			redirect('admin/services');

		}

		public function expenses(){
			$this->session_model->sessionCheck();
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
			$this->form_validation->set_rules('expenseAmount', 'Amount', 'trim|required|numeric|greater_than_equal_to[0]');
			$this->form_validation->set_rules('expenseReceipt', 'Receipt No.', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');


			if ($this->form_validation->run()) {

				$expenceDate = html_escape($this->input->post('expenseDate'));
				$date = date_create($expenceDate);
				$formatedDate = date_format($date, "M-d-Y");
				$data['date'] = $formatedDate;
				$amount = html_escape($this->input->post('expenseAmount'));
				$data['amount'] = number_format($amount, 2);
				$name = ucwords(html_escape($this->input->post('expenseName')));
				$data['description'] = $name;
				$rNum = html_escape($this->input->post('expenseReceipt'));
				
				$this->admin_model->addExpenses($empID, $name, $expenceDate, $amount, $rNum);

				$data['receiver'] = $this->admin_model->getEmpName($empID)->employeeName;
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
				$serviceName = ucwords(html_escape($this->input->post('serviceName')));
				$serviceDisk = ucwords(html_escape($this->input->post('description')));

				if ($this->form_validation->is_unique($serviceName, 'services.serviceName')) {
					$this->admin_model->insertService($serviceName, $serviceDisk);

					$data['serviceName'] = $serviceName;
					$data['description'] = $serviceDisk;

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

			$pin = html_escape($this->generatePIN());
			$empID = html_escape($this->input->post('empID'));

			$data['pin'] = $pin;

			$this->admin_model->returnPassToDefault($pin, $empID);

			$data['success'] = true;

			echo json_encode($data);
		}

		public function disableEmployeeAccount(){
			$empID = html_escape($this->input->post('empIDDisable'));

			$this->admin_model->disableEmpAccount($empID);

			$data['success'] = true;

			echo json_encode($data); 
		}

		public function enableEmployeeAccount(){
			$empID = html_escape($this->input->post('empIDEnable'));

			$this->admin_model->enableEmpAccount($empID);

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
			$this->session_model->sessionCheck();
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

		public function setCurrentThemeID(){
			$currentThemeID = html_escape($this->input->post('themeID'));
			$this->session->set_userdata('currentTheme', $currentThemeID);
			redirect('admin/adminThemeDetails');
		}

		public function adminThemeDetails(){
			$this->session_model->sessionCheck();
			$currentDesType = $this->session->userdata('currentType');
			$this->load->helper('directory');
			$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
			$notif['eventsToday'] = $this->notifications_model->getEventsToday();
			$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
			$notif['overERent'] = $this->notifications_model->overdueEventRentals();
			$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
			$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();

			$themeID = $this->session->userdata('currentTheme');
			$data['themeDet'] = $this->events_model->getThemeDetails($themeID);
			$data['themeDecor'] = $this->events_model->getThemeDecors($themeID);
			$data['themeDesign'] = $this->events_model->getThemeDesigns($themeID);
			$data['decorTypes'] = $this->admin_model->getDecorTypes();
			$data['designTypes'] = $this->admin_model->getDesignTypes();

			// get all folders (types) inside the design folder
			$data['designtypesmap'] = directory_map('./uploads/designs/', 1);
			$data['decortypesmap'] = directory_map('./uploads/decors/', 1);

			if ($this->session->userdata('role') === "admin") {
				$headdata['pagename'] = 'Themes | Admin';	
			}else{
				$headdata['pagename'] = 'Themes | Handler';
			}
			$this->load->view("templates/head.php", $headdata);
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("adminPages/themeDetails.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function addNewTheme(){
			$this->load->library('form_validation');

			$this->form_validation->set_rules('themeName', 'New Theme Name', 'trim|required');

			if ($this->form_validation->run()) {
				$name = ucwords(html_escape($this->input->post('themeName')));
				$desc = ucwords(html_escape($this->input->post('themeDesc')));
				$this->admin_model->addTheme($name, $desc);
				$this->adminTheme();
			}
		}

		public function addNewThemeDecor(){
			$themeID = $this->session->userdata('currentTheme');
						
			$this->load->library('form_validation');

			$this->form_validation->set_rules('decor_name', 'New Decor Name', 'required');
			$this->form_validation->set_rules('decor_color', 'New Decor Color', 'required');	
			$this->form_validation->set_rules('decor_type', 'New Decor Type', 'required');

			if ($this->form_validation->run()) {				
				
				$name = html_escape($this->input->post('decor_name'));
				$color = html_escape($this->input->post('decor_color'));
				$type = html_escape($this->input->post('decor_type'));
				
				//$decID = $this->admin_model->addNewDecor($themeID, $name, $color, $type);
				//$this->admin_model->addNewThemeDecor($themeID, $decID);
				$decID = $this->events_model->addNewDecor($name, $color, $type, $themeID);

				$config['upload_path'] = './uploads/decors/' . $type . '/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				// rename file 
				$config['file_name'] = sprintf('%07d', $decID);
				$this->load->library('upload', $config);
				$this->upload->do_upload('userfile');
				$data = array('upload_data' => $this->upload->data()); 

				$this->adminThemeDetails();
			}
		}

		public function addNewThemeDesign(){
			$themeID = $this->session->userdata('currentTheme');
			
			$this->load->library('form_validation');

			$this->form_validation->set_rules('design_name', 'New Design Name', 'required');
			$this->form_validation->set_rules('design_color', 'New Design Color', 'required');	
			$this->form_validation->set_rules('design_type', 'New Design Type', 'required');

			if ($this->form_validation->run()) {
				$name = html_escape($this->input->post('design_name'));
				$color = html_escape($this->input->post('design_color'));
				$type = html_escape($this->input->post('design_type'));

				//$desID = $this->admin_model->addNewDesign($themeID, $name, $color, $type);
				//$this->admin_model->addNewThemeDesign($themeID, $desID);
				$desID = $this->events_model->addNewDesign($name, $color, $type, $themeID);

				$config['upload_path'] = './uploads/designs/' . $type . '/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['file_name'] = sprintf('%07d', $desID);
				$this->load->library('upload', $config);
				$this->upload->do_upload('userfile');
				$data = array('upload_data' => $this->upload->data());

				$this->adminThemeDetails();
			}
		}
	}

	?>