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
		$this->load->model('session_model');
		$this->load->library('session');
	}

	public function gowns(){
		$this->session_model->sessionCheck();
		$this->load->model('items_model');
		$data['allGowns'] = $this->items_model->getAllGowns();
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$notif['overdueEPayments'] = $this->notifications_model->overdueEPayments();
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
		$this->session_model->sessionCheck();
		$this->load->model('items_model');
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$notif['overdueEPayments'] = $this->notifications_model->overdueEPayments();
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
		$this->session_model->sessionCheck();
		$eventid = $this->session->userdata('currentEventID');
		$decorid = $this->session->userdata('currentDecorID');
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$notif['overdueEPayments'] = $this->notifications_model->overdueEPayments();
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

	public function costumes(){
		$this->session_model->sessionCheck();
		$this->load->model('items_model');
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$notif['overdueEPayments'] = $this->notifications_model->overdueEPayments();
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
		$this->session_model->sessionCheck();
		$this->load->model('items_model');
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$notif['overdueEPayments'] = $this->notifications_model->overdueEPayments();
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
		$this->session_model->sessionCheck();
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
	} 
	?>