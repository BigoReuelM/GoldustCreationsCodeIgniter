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

		public function insertNewEmployee($name, $cNumber, $email, $address, $role, $image){
			$data = array(
				'employeeName' => $name,
				'contactNumber' => $cNumber,
				'address' => $address,
				'email' => $email,
				'role' => $role,
				'photo' => $image,
				'username' => $name,
				'password' => "pwd",
				'status' => "active"
			);

			$this->db->insert('employees', $data);
		}
		
	}
 ?>