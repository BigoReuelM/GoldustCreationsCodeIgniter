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
			$this->load->library('session');
		}


		public function gowns(){
			$this->load->model('items_model');
			$data['allGowns'] = $this->items_model->getAllGowns();
			$empRole = $this->session->userdata('role');
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				
			}else{
				$this->load->view("templates/header.php");
				$this->load->view("templates/itemSelectionNav.php");
				
			}
			$this->load->view("templates/gowns.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function decors(){
			$this->load->model('items_model');
			$data['allDecors'] = $this->items_model->getAllDecors();
			$empRole = $this->session->userdata('role');
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				
			}else{
				$this->load->view("templates/header.php");
				$this->load->view("templates/itemSelectionNav.php");
				
			}
			$this->load->view("templates/decors.php", $data);
			$this->load->view("templates/footer.php");
		}

		// nasa events controller din tu
		public function eventDecors(){
			$eventid = $this->session->userdata('currentEventID');
			$decorid = $this->session->userdata('currentDecorID');
			$empID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			$data['eventName'] =$this->events_model->getEventName($eventid);
			$data['eventDecors'] =$this->events_model->getDecors($eventid);
			$this->load->model('items_model');
			$data['allDecors'] = $this->items_model->getAllDecors();
			
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				$this->load->view("templates/eventNav.php", $data);
				
			}else{
				
				$this->load->view("templates/header.php");
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
			$data['allCostumes'] = $this->items_model->getAllCostumes();
			$empRole = $this->session->userdata('role');
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				
			}else{
				$this->load->view("templates/header.php");
				$this->load->view("templates/itemSelectionNav.php");
				
			}
			$this->load->view("templates/costumes.php", $data);
			$this->load->view("templates/footer.php");
		}

		public function suits(){
			$this->load->model('items_model');
			$data['allSuits'] = $this->items_model->getAllSuits();
			$empRole = $this->session->userdata('role');
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				
			}else{
				$this->load->view("templates/header.php");
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

		public function changeAttireEntourage() {
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
		}
	} 
?>