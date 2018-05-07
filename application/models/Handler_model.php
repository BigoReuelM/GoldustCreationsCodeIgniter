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

		public function toDoList($employeeID){
			$query = $this->db->query("
				SELECT *
				FROM appointments
				WHERE employeeID = $employeeID
			");

			return $query->result_array();
		}		

	} 
?>