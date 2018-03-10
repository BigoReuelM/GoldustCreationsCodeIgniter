<?php 
	/**
	* 
	*/
	class Admin_model extends CI_model
	{
		public function getAdminEmployees(){
			$query=$this->db->query("
				SELECT *
				FROM employees
				where role = 'admin'
			");
			return $query->result_array();
		}

		public function getHandlerEmployees(){
			$query=$this->db->query("
				SELECT *
				FROM employees
				where role = 'handler'
			");
			return $query->result_array();
		}

		public function getStaffEmployees(){
			$query=$this->db->query("
				SELECT *
				FROM employees
				where role = 'staff'
			");
			return $query->result_array();
		}
		
	}
 ?>