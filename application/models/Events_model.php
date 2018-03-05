<?php 
	/**
	* 
	*/
	class Events_model extends CI_model
	{
		
		public function getEvents($employeeID, $role, $status)
		{
			
			$this->db->select('*');
			$this->db->from('events');
			$this->db->join('clients','events.clientID = clients.clientID');
			if ($role === 'handler') {
				$this->db->where('employeeID', $employeeID);
			}
			$this->db->where('eventStatus', $status);

			$query=$this->db->get();

			return $query->result_array();
		}
		public function getServices(){
			$query=$this->db->query("SELECT * FROM services WHERE status like 'active'");
			return $query->result_array();
		}

		public function getDecors($eventID){
			//$eID = $this->session->userdata('employeeID');
			//$evntID = $this->session->userdata('currentEventID');
			$this->db->select('*');
			$this->db->from('eventdecors');
			$this->db->join('decors', 'eventdecors.decorID = decors.decorsID');
			//$this->db->join('events', 'eventdecors.eventID = events.eventID');
			//$this->db->where('employeeID', $employeeID);
			$this->db->where('eventID', $eventID);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getDesigns($currentEventID){
			/*
			$this->db->select('*');
			$this->db->from('eventdesigns');
			$this->db->join('designs', 'eventdesigns.designID = designs.designID');
			$this->db->join('events', 'eventdesigns.eventID = events.eventID');
			$this->db->where('events.eventID', $currentEventID);
			*/
			$query = $this->db->query("SELECT * FROM eventdesigns NATURAL JOIN designs NATURAL JOIN events where events.eventID = $currentEventID" );
			return $query->result_array();
		}

		public function getPayments($currentEventID){

			$eID = $currentEventID;

			$this->db->select('*');
			$this->db->from('payments');
			$this->db->join('events', 'events.eventID = payments.eventID');
			$this->db->where('events.eventID', $eID);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getExpenses($currentEventID){

			$eID = $currentEventID;

			$this->db->select('*');
			$this->db->from('expenses');
			$this->db->join('events', 'events.eventID = expenses.eventID');
			$this->db->where('events.eventID', $eID);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getEventName($id){
			$query = $this->db->query("SELECT eventName FROM events where eventID = $id");
			return $query->row();
		}
	}

 ?>