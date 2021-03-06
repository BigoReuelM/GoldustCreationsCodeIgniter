<?php 
	/**
	* 
	*/
	class Admin_model extends CI_model
	{
		public function getAdminEmployees(){
			$this->db->select('*, concat(firstName, " ", midName, " ", lastName) as employeeName');
			$this->db->from('employees');
			$this->db->where('role', "admin");
			$this->db->where('status', "active");
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getHandlerEmployees(){
			$this->db->select('*, concat(firstName, " ", midName, " ", lastName) as employeeName');
			$this->db->from('employees');
			$this->db->where('role', "handler");
			$this->db->where('status', "active");
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getStaffEmployees(){
			$this->db->select('*, concat(firstName, " ", midName, " ", lastName) as employeeName');
			$this->db->from('employees');
			$this->db->where('role', "staff");
			$this->db->where('status', "active");
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getOncallStaffEmployees(){
			$this->db->select('*, concat(firstName, " ", midName, " ", lastName) as employeeName');
			$this->db->from('employees');
			$this->db->where('role', "on-call staff");
			$this->db->where('status', "active");
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getInactiveEmployees(){
			$this->db->select('*, concat(firstName, " ", midName, " ", lastName) as employeeName');
			$this->db->from('employees');
			$this->db->where('status', "inactive");

			$query = $this->db->get();

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

			if ($role == "admin" || $role == "handler") {
				$username = sprintf('%04d', $newEmpID) . $fname;
				$defaultpass = 'goldust';
				$userPass = password_hash($defaultpass, PASSWORD_BCRYPT);
				$credentials = array(
					'username' => $username,
					'password' => $userPass
				);

				$this->db->where('employeeID', $newEmpID);
				$this->db->update('employees', $credentials);
			}

			return $newEmpID;			

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

			$query = $this->db->query("
				SELECT *, concat(firstName, ' ', midName, ' ', lastName) as employeeName,
				month(expenseDate) as month,
    			year(expenseDate) as year
				FROM expenses
				NATURAL JOIN employees
			");
			return $query->result_array();
		}

		public function getExpensesPerDate($date){
			$query = $this->db->query("
				SELECT *, concat(firstName, ' ', midName, ' ', lastName) as employeeName
				FROM expenses
				NATURAL JOIN employees
				WHERE expenseDate = '$date'
			");
			return $query->result_array();
		}

		public function getExpensesPerMonthYear($date){
			$query = $this->db->query("
				SELECT *, concat(firstName, ' ', midName, ' ', lastName) as employeeName
				FROM expenses
				NATURAL JOIN employees
				WHERE date_format(expenseDate, '%m-%Y') = '$date'
			");
			return $query->result_array();
		}

		public function getExpensesPerYear($date){
			$query = $this->db->query("
				SELECT *, concat(firstName, ' ', midName, ' ', lastName) as employeeName
				FROM expenses
				NATURAL JOIN employees
				WHERE date_format(expenseDate, '%Y') = '$date'
			");
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

			$hashedNewPass = password_hash($newPass, PASSWORD_BCRYPT);

			$data = array(
				'password' => $hashedNewPass
			);

			$this->db->where('employeeID', $empID);
			$this->db->update('employees', $data);
		}

		public function disableEmpAccount($id){
			$data = array(
				'status' => "inactive"
			);

			$this->db->where('employeeID', $id);
			$this->db->update('employees', $data);
		}

		public function enableEmpAccount($id){
			$data = array(
				'status' => "active"
			);

			$this->db->where('employeeID', $id);
			$this->db->update('employees', $data);
		}

		public function addTheme($tName, $tDesc){
			$data = array(
				'themeName' => $tName,
				'themeDesc' => $tDesc
			);
			$this->db->insert('theme', $data);
		}

		public function getDecorTypes(){
			$query = $this->db->query("show columns from decors where Field like 'decorType'")->row(0)->Type;
			preg_match("/^enum\(\'(.*)\'\)$/", $query, $vals);
		    $enum = explode("','", $vals[1]);
		    return $enum;
		}

		public function getDesignTypes(){
			$query = $this->db->query("show columns from designs where Field like 'designType'")->row(0)->Type;
			preg_match("/^enum\(\'(.*)\'\)$/", $query, $vals);
		    $enum = explode("','", $vals[1]);
		    return $enum;
		}

		public function getEmpName($id){
			$this->db->select('concat(firstName, " ", midName, " ", lastName) as employeeName');
			$this->db->from('employees');
			$this->db->where('employeeID', $id);

			$query = $this->db->get();

			return $query->row();
		}

		public function getServiceDetails($id){
			$this->db->select('*');
			$this->db->form('services');
			$this->db->where('serviceID', $id);

			$query = $this->db->get();

			return $query->row();
		}

		public function getPayments(){
			$query = $this->db->query("SELECT CONCAT(clients.firstName, ' ', clients.middleName, ' ', clients.lastName) AS clientName, CONCAT(employees.firstName, ' ', employees.midName, ' ', employees.lastName) AS receiverName, payments.amount, payments.date, payments.time, YEAR(date) AS year, MONTH(date) AS month, DAY(date) AS day FROM payments JOIN clients ON payments.clientID = clients.clientID JOIN employees ON payments.employeeID = employees.employeeID");
			return $query->result_array();
		}

		public function getDeposits(){
			$query = $this->db->query("SELECT CONCAT(firstName, ' ', middleName, ' ', lastName) AS fullname, dateAvail, month(dateAvail) as month, year(dateAvail) as year, finishDate, IDType, CONCAT(school, ',', yearAndSection) AS schoolyrsec, depositAmt, homeAddress FROM transactions JOIN clients ON transactions.clientID = clients.clientID WHERE depositAmt IS NOT NULL");
			return $query->result_array();
		}

		public function getEventRefunds(){
			$query = $this->db->query("SELECT CONCAT(firstName, ' ', middleName, ' ', lastName) AS clientName, refundedAmount, refundedDate, cancelledDate, eventName, month(refundedDate) as month, year(refundedDate) as year FROM events JOIN clients ON events.clientID = clients.clientID WHERE refundedAmount IS NOT NULL AND refundedAmount > 0");
			return $query->result_array();
		}

		public function getTransacRefunds(){
			$query = $this->db->query("SELECT CONCAT(firstName,
            ' ', middleName, ' ', lastName) AS clientName, cancelledDate, month(cancelledDate) as month, year(cancelledDate) as year, refundAmt FROM transactions JOIN clients ON transactions.clientID = clients.clientID WHERE refundAmt IS NOT NULL AND refundAmt > 0");
            return $query->result_array();
		}
	}
 ?>