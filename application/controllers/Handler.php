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
			$this->load->library('session');
		}

		public function index(){
			$this->load->view("templates/head.php");
			$this->load->view("templates/header.php");
			$this->load->view("handlerPages/home.php");
			$this->load->view("templates/footer.php");
		}


		public function services(){
			$this->load->view("templates/head.php");
			$this->load->view("templates/header.php");
			$this->load->view("handlerPages/services.php");
			$this->load->view("templates/footer.php");
		}

		public function ongoing_rentals(){
			$this->load->view("templates/head.php");
			$this->load->view("templates/header.php");

			$this->load->model('handler_model');
			$data['tdata'] = $this->handler_model->view_home_ongoing_rentals();
			$this->load->view('handlerPages/homeongoingRentals', $data);

			$this->load->view("templates/footer.php");
		}

	} 
?>