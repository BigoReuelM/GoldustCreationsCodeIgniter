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

		public function getEmpDetails($empID){
			$query=$this->db->query("
				SELECT *
				FROM employees
				WHERE employeeID = $empID
			");

			return $query->row();
		}

		public function getActiveServices(){
			$query = $this->db->query("
				SELECT *
				FROM services
				WHERE status like 'active'
			");

			return $query->result_array();
		}

		public function getInactiveServices(){
			$query = $this->db->query("
				SELECT *
				FROM services
				WHERE status like 'inactive'
			");

			return $query->result_array();
		}

		public function activateService($serviceID){
			$data = array(
				'status' => "active"
			);

			$this->db->where('serviceID', $serviceID);
			$this->db->update('services', $data);
		}

		public function deactivateService($serviceID){
			$data = array(
				'status' => "inactive"
			);

			$this->db->where('serviceID', $serviceID);
			$this->db->update('services', $data);
		}

		public function insertService($serviceName, $serviceDisk){
			$data = array(
				'serviceName' => $serviceName,
				'description' => $serviceDisk,
				'status' => "active" 
			);

			$this->db->insert('services', $data);
		}
		
	}
 ?>