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
		$this->load->model('events_model');
		$this->load->library('session');
	}

	public function index(){
		$notif['appToday'] = $this->notifications_model->getAppointmentsToday();
		$notif['eventsToday'] = $this->notifications_model->getEventsToday();
		$notif['overTRent'] = $this->notifications_model->overdueTransactionRentals();
		$notif['overERent'] = $this->notifications_model->overdueEventRentals();
		$notif['incEvents'] = $this->notifications_model->getIncommingEvents();
		$notif['incAppointment'] = $this->notifications_model->getIncommingAppointments();
		$empID = $this->session->userdata('employeeID');
		$empRole = $this->session->userdata('role');
		$newStatus = "new";
		$ongoingStatus = "on-going";

		$data['new']=$this->events_model->getNewEventsCount($empID, $empRole, $newStatus);
		$data['ongoing']=$this->events_model->getEventCount($empID, $empRole, $ongoingStatus);
		$data['todoItems'] = $this->handler_model->toDoList($empID);

		$this->load->view("templates/head.php");
		$this->load->view("templates/header.php", $notif);
		$this->load->view("handlerPages/home.php", $data);
		$this->load->view("templates/footer.php");
	}

	

} 
?>