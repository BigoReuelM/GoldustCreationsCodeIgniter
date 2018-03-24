<?php
defined('BASEPATH') OR exit('No direct script access allowed');


	/**
	* 
	*/
	class Notifications extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url', 'form');
			$this->load->model('notifications_model');
			$this->load->library('session', 'form_validation');
		}

		public function overdueTransactionRentals(){

		}

		public function overdueEventRentals(){

		}

		public function incommingEvents(){

		}

		public function eventsToday(){

		}

		public function incommingAppointments(){
			
		}

		public function appointmentsToday(){

			

		}
	}

?>