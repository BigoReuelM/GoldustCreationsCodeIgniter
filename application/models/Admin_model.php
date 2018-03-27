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

		public function getOncallStaffEmployees(){
			$query=$this->db->query("
				SELECT *, concat(firstName, ' ', midName, ' ', lastName) as employeeName
				FROM employees
				where role = 'on-call staff'
			");
			return $query->result_array();
		}

		public function insertNewEmployee($fname, $mname, $lname, $cNumber, $email, $address, $role){

			$data = array(
				'firstName' => $fname,
				'midName' => $mname,
				'lastName' => $lname,
				'contactNumber' => $cNumber,
				'address' => $address,
				'email' => $email,
				'role' => $role,
				'status' => "active"
			);

			$this->db->insert('employees', $data);

			$newEmpID = $this->db->insert_id();
			$username = $newEmpID . $fname;
			$second = array(
				'username' => $username,
				'password' => "goldust"
			);

			$this->db->where('employeeID', $newEmpID);
			$this->db->update('employees', $second);

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

		
		public function addExpenses($empID, $expName, $date, $amount, $num){
			$data = array(
				'employeeID' => $empID,
				'expensesName' => $expName,
				'expensesAmount' => $amount,
				'expenseDate' => $date,
				'receiptNum' => $num,
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

		public function returnPassToDefault($pin, $empID){
			$newPass = "goldust" . $pin;

			$data = array(
				'password' => $newPass
			);

			$this->db->where('employeeID', $empID);
			$this->db->update('employees', $data);
		}

		public function addTheme($tName, $tDesc){
			$data = array(
				'themeName' => $tName,
				'themeDesc' => $tDesc
			);
			$this->db->insert('theme', $data);
		}
		
	}
 ?>