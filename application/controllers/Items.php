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
			$empRole = $this->session->userdata('role');
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				
			}else{
				$this->load->view("templates/header.php");
				$this->load->view("templates/itemSelectionNav.php");
				
			}
			$this->load->view("templates/gowns.php");
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

		public function costumes(){
			$empRole = $this->session->userdata('role');
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				
			}else{
				$this->load->view("templates/header.php");
				$this->load->view("templates/itemSelectionNav.php");
				
			}
			$this->load->view("templates/costumes.php");
			$this->load->view("templates/footer.php");
		}

		public function suits(){
			$empRole = $this->session->userdata('role');
			$this->load->view("templates/head.php");
			if ($empRole === 'admin') {
				
				$this->load->view("templates/adminHeader.php");
				$this->load->view("templates/adminNavbar.php");
				
			}else{
				$this->load->view("templates/header.php");
				$this->load->view("templates/itemSelectionNav.php");
				
			}
			$this->load->view("templates/suits.php");
			$this->load->view("templates/footer.php");
		}

		public function getEntourageAttire($currentEntId){
			$this->load->model('events_model');
			$data['attirePhoto'] = $this->events_model->getEntAttirePhoto($currentEntId);
			$this->load->view("templates/eventEntourage.php", $data);
		}

	} 
?>