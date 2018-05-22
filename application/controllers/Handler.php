<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Handler extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('handler_model');
		$this->load->model('notifications_model');
		$this->load->model('session_model');
		$this->load->model('events_model');
		$this->load->model('transactions_model');
		$this->load->library('session');
	}

	public function index(){
		$this->session_model->sessionCheck();
		$empID = $this->session->userdata('employeeID');
		$empRole = $this->session->userdata('role');
		$newStatus = "new";
		$ongoingStatus = "on-going";

		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$notif['overdueEPayments'] = $this->notifications_model->overdueEPayments();
		
		$data['eventData'] = $this->events_model->getEventDetailsForCalendar();
		$data['eventDates'] = $this->events_model->getEventDates();
		$data['years'] = $this->events_model->getEventYear();
		$data['months'] = $this->events_model->getEventMonth();
		$data['days'] = $this->events_model->getEventDay();
		$data['new']=$this->events_model->getNewEventsCount($empID, $empRole, $newStatus);
		$data['ongoing']=$this->events_model->getEventCount($empID, $empRole, $ongoingStatus);
		$tRentalCount = count($this->transactions_model->view_home_ongoing_rentals());
		$tEventCount = count($this->transactions_model->viewEventRentals());

		$data['rentalCount'] = $tRentalCount + $tEventCount;
		$data['todoItems'] = $this->handler_model->toDoList($empID);
		if ($this->session->userdata('role') === "admin") {
			$headdata['pagename'] = 'Home | Admin';	
		}else{
			$headdata['pagename'] = 'Home | Handler';
		}

		$this->load->view("templates/head.php", $headdata);
		$this->load->view("templates/header.php", $notif);
		$this->load->view("handlerPages/home.php", $data);
		$this->load->view("templates/calendar.php");
		$this->load->view("templates/footer.php");
	}

} 
?>