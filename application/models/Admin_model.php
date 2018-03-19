<?php 
	/**
	* 
	*/
	class Admin_model extends CI_model
	{
		public function getAdminEmployees(){
			$query=$this->db->query("
				SELECT *, concat(firstName, ' ', midName, ' ', lastName) as employeeName
				FROM employees
				where role = 'admin'
			");
			return $query->result_array();
		}

		public function getHandlerEmployees(){
			$query=$this->db->query("
				SELECT *, concat(firstName, ' ', midName, ' ', lastName) as employeeName
				FROM employees
				where role = 'handler'
			");
			return $query->result_array();
		}

		public function getStaffEmployees(){
			$query=$this->db->query("
				SELECT *, concat(firstName, ' ', midName, ' ', lastName) as employeeName
				FROM employees
				where role = 'staff' OR role = 'on-call staff'
			");
			return $query->result_array();
		}

		public function insertNewEmployee($fname, $mname, $lname, $cNumber, $email, $address, $role, $image){
			$data = array(
				'firstName' => $fname,
				'midName' => $mname,
				'lastName' => $lname,
				'contactNumber' => $cNumber,
				'address' => $address,
				'email' => $email,
				'role' => $role,
				'photo' => $image,
				'username' => $fname,
				'password' => "pwd",
				'status' => "active"
			);

			$this->db->insert('employees', $data);
		}

		public function getEmpDetails($empID){
			$query=$this->db->query("
				SELECT *, concat(firstName, ' ', midName, ' ', lastName) as employeeName
				FROM employees
				WHERE employeeID = $empID
			");

			return $query->row();
		}

		public function getExpenses(){


			$this->db->select('*');
			$this->db->from('expenses');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getActiveServices(){
			$query = $this->db->query("
				SELECT *
				FROM services
				WHERE status like 'active'
			");

			return $query->result_array();
		}

		public function totalExpenses(){
			$query = $this->db->query("SELECT sum(expensesAmount) as total
				from expenses
			");
			return $query->row();
		}

		
		public function addEventExpenses($empID, $ceID, $expName, $date, $amount, $num, $image){
			$data = array(
				'eventID' => $ceID,
				'employeeID' => $empID,
				'expensesName' => $expName,
				'expensesAmount' => $amount,
				'expensesDate' => $date,
				'receiptNum' => $num,
				'receiptImage' => $image
			);

			$this->db->insert('expenses', $data);
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