<?php
	/**
	 * 
	 */
	class Handler_model extends CI_model
	{

		
		public function view_event(){
			$eID = $this->session->userdata('employeeID');
			$this->db->select('*');
			$this->db->from('events');
			$this->db->where('employeeID',$eID);

			$query=$this->db->get();
			return $query->row_array();
			
		}

		public function view_transactions(){
			$eID = $this->session->userdata('employeeID');
			$this->db->select('*');
			$this->db->from('transactions');
			$this->db->where('employeeID',$eID);

			$query=$this->db->get();
			return $query->row_array();
		}

		public function view_home_ongoing_rentals(){
			$eID = $this->session->userdata('employeeID');
			/*$this->db->select('s.serviceName' 'Service Name', 'e.celebrantName' 'Celebrant Name', 'c.clientName' 'Client Name', 'c.contactNumber' 'Contact Number');
			$this->db->from('events');
			$this->db->where('eventStatus','on%going');*/
			$query= $this->db->query("SELECT 
			    s.serviceName 'Service Name',
			    e.celebrantName 'Celebrant Name',
			    c.clientName 'Client Name',
			    c.contactNumber 'Contact Number'
			FROM
			    services s
			        NATURAL JOIN
			    eventservices es
			        NATURAL JOIN
			    events e
			        NATURAL JOIN
			    clients c
			        NATURAL JOIN
			    transactions t
			WHERE
			    s.serviceName LIKE '%rental%'
			        AND e.eventStatus LIKE 'on%going'
			        AND t.employeeID = $eID;"); // ayusin ko tu

			//$query = $this->db->get();
			//return $query->row_array();
			return $query->result_array();
		}


	} 
?>