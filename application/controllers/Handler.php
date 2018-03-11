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
			$this->load->view("templates/header.php");
			$this->load->view("handlerPages/home.php", $data);
			$this->load->view("templates/footer.php");
		}

		

	} 
?>