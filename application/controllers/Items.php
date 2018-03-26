<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Items extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('handler_model');
		$this->load->model('notifications_model');
		$this->load->library('session');
	}

	public function gowns(){
		$this->load->model('items_model');
		$data['allGowns'] = $this->items_model->getAllGowns();
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$empRole = $this->session->userdata('role');
		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'Gowns | Admin';	
		}else{
			$headdata['pagename'] = 'Gowns | Handler';
		}
		$this->load->view("templates/head.php", $headdata);
		if ($empRole === 'admin') {
			
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			
		}else{
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/itemSelectionNav.php");
			
		}
		$this->load->view("templates/gowns.php", $data);
		$this->load->view("templates/footer.php");
	}

	public function decors(){
		$this->load->model('items_model');
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$data['allDecors'] = $this->items_model->getAllDecors();
		$empRole = $this->session->userdata('role');
		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'Decorations | Admin';	
		}else{
			$headdata['pagename'] = 'Decorations | Handler';
		}
		$this->load->view("templates/head.php", $headdata);
		if ($empRole === 'admin') {
			
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			
		}else{
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/itemSelectionNav.php");
			
		}
		$this->load->view("templates/decors.php", $data);
		$this->load->view("templates/footer.php");
	}

	public function eventDecors(){
		$eventid = $this->session->userdata('currentEventID');
		$decorid = $this->session->userdata('currentDecorID');
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$empID = $this->session->userdata('employeeID');
		$empRole = $this->session->userdata('role');
		$data['eventName'] =$this->events_model->getEventName($eventid);
		$data['eventDecors'] =$this->events_model->getDecors($eventid);
		$this->load->model('items_model');
		$data['allDecors'] = $this->items_model->getAllDecors();
		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'Event Decorations | Admin';	
		}else{
			$headdata['pagename'] = 'Event Decorations | Handler';
		}
		
		$this->load->view("templates/head.php", $headdata);
		if ($empRole === 'admin') {
			
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			$this->load->view("templates/eventNav.php", $data);
			
		}else{
			
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/eventNav.php", $data);
			
		}
		$data['eventdecors'] = $this->events_model->getDecors($eventid);
		$this->load->view("templates/eventDecors.php", $data);
		$this->load->view("templates/footer.php");
	}

	public function changeDecorSetVals(){		
			// id of the current decor id.. yung papalitan
		$currentDecorID = $this->input->post('decorID');
		$this->session->set_userdata('currentDecorID', $currentDecorID);

		

			//$this->load->model('events_model');
			//$this->events_model->changeDecor($eId, $decId, $newdecID);
		$this->decors();
	}

		// nasa events din controller tu
	public function changeDecor(){
			// id nung decor na ipapalit 
		$newdecID = $this->input->post('newdecId');
		$eId = $this->session->userdata('currentEventID');
		$decId = $this->session->userdata('currentDecorID');

		$this->load->model('events_model');
		$this->events_model->changeDecor($eId, $decId, $newdecID);
		redirect('events/eventDecors');
	}

	public function costumes(){
		$this->load->model('items_model');
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$data['allCostumes'] = $this->items_model->getAllCostumes();
		$empRole = $this->session->userdata('role');
		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'Costumes | Admin';	
		}else{
			$headdata['pagename'] = 'Costumes | Handler';
		}
		$this->load->view("templates/head.php", $headdata);
		if ($empRole === 'admin') {
			
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			
		}else{
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/itemSelectionNav.php");
			
		}
		$this->load->view("templates/costumes.php", $data);
		$this->load->view("templates/footer.php");
	}

	public function suits(){
		$this->load->model('items_model');
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$data['allSuits'] = $this->items_model->getAllSuits();
		$empRole = $this->session->userdata('role');
		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'Suits | Admin';	
		}else{
			$headdata['pagename'] = 'Suits | Handler';
		}
		$this->load->view("templates/head.php", $headdata);
		if ($empRole === 'admin') {
			
			$this->load->view("templates/adminHeader.php", $notif);
			$this->load->view("templates/adminNavbar.php");
			
		}else{
			$this->load->view("templates/header.php", $notif);
			$this->load->view("templates/itemSelectionNav.php");
			
		}
		$this->load->view("templates/suits.php", $data);
		$this->load->view("templates/footer.php");
	}

	public function getEntourageAttire($currentEntId){
		$this->load->model('events_model');
		$data['attirePhoto'] = $this->events_model->getEntAttirePhoto($currentEntId);
		$this->load->view("templates/eventEntourage.php", $data);
	}

		/*public function changeAttireEntourage() {
			$newDesID = $this->input->post('newDesId');
			$eID = $this->session->userdata('currentEventID');
			$deID = $this->session->userdata('currentDesignID');

			$this->load->model('events_model');
			$this->events_model->changeAttireEntourage($eID, $deID, $newDesID);

			redirect('events/eventEntourage');
		}

		public function changeAttireEntourageNewVal(){
			$currentDesignID = $this->input->post('designID');
			$this->session->set_userdata('currentDesignID', $currentDesignID);

			$this->gowns();
		}*/

		public function uploadImg(){
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			
			$this->load->library('form_validation');
			$this->load->library('upload', $config);

			$this->form_validation->set_rules('gown_name', 'New Gown Name', 'required');
			$this->form_validation->set_rules('gown_color', 'New Gown Color', 'required');		

			if ($this->form_validation->run()) {
				$this->upload->do_upload('userfile');
				$data = array('upload_data' => $this->upload->data());
				$this->input->post('gown_name');
				$this->input->post('gown_color');
				$this->gowns();
			}
		}
	} 
	?>