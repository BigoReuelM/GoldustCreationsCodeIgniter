<?php 
	/**
	* 
	*/
	class Transactions_model extends CI_model
	{
		
		public function ongoingTransactions($empID, $role)
		{

			if ($role === 'admin') {
				$query=$this->db->query(
					"SELECT *, concat(firstName, ' ', middleName, ' ', lastName) as clientName  
					from clients 
					join transactions using(clientID)
					where transactionstatus like 'on-going'"
				);
			}else{
				$query=$this->db->query(
					"SELECT *, concat(firstName, ' ', middleName, ' ', lastName) as clientName 
					from clients 
					join transactions using(clientID)
					where $empID = employeeID and transactionstatus like 'on-going'"
				);

			}

			return $query->result_array();

		}
		
		public function finishedTransactions($empID, $role)
		{

			if ($role === 'admin') {
				$query=$this->db->query(
					"SELECT *, concat(firstName, ' ', middleName, ' ', lastName) as clientName  
					from clients 
					join transactions using(clientID)
					where transactionstatus like 'finished'"
				);
			}else{
				$query=$this->db->query(
					"SELECT *, concat(firstName, ' ', middleName, ' ', lastName) as clientName 
					from clients 
					join transactions using(clientID)
					where $empID = employeeID and transactionstatus like 'finished'"
				);

			}

			return $query->result_array();

		}

		public function cancelledTransactions($empID, $role)
		{

			if ($role === 'admin') {
				$query=$this->db->query(
					"SELECT *, concat(firstName, ' ', middleName, ' ', lastName) as clientName  
					from clients 
					join transactions using(clientID)
					where transactionstatus like 'cancelled'"
				);
			}else{
				$query=$this->db->query(
					"SELECT *, concat(firstName, ' ', middleName, ' ', lastName) as clientName 
					from clients 
					join transactions using(clientID)
					where $empID = employeeID and transactionstatus like 'cancelled'"
				);

			}

			return $query->result_array();

		}

		public function getTransactionDetails($transID){
			$query=$this->db->query(
					"SELECT *, concat(firstName, ' ', middleName, ' ', lastName) as clientName 
					FROM transactions  
					NATURAL JOIN clients
					WHERE transactionID = $transID"
			);

			return $query->row();

		}

		public function getHandlerName($id){
			$this->db->select('concat(firstName, " ", midName, " ", lastName) as employeeName');
			$this->db->from('employees');
			$this->db->where('employeeID', $id);

			$query = $this->db->get();

			return $query->row();
		}

		public function getTransactionServices($transID){
			$query=$this->db->query(
				"
				SELECT * 
				FROM transactiondetails
				NATURAL JOIN services
				WHERE transactionID = $transID 
				"
			);

			return $query->result_array();
		}

		public function getServiceAmount($tid, $sid){
			$this->db->select('*');
			$this->db->from('transactiondetails');
			$this->db->where('transactionID', $tid);
			$this->db->where('serviceID', $sid);

			$query = $this->db->get();

			return $query->row();
		}

		/**
			Below is the code for updating transaction services

		*/

		public function removeService($tid, $serviceID){
			$this->db->where('transactionID', $tid);
			$this->db->where('serviceID', $serviceID);
			$this->db->delete('transactiondetails');
		}

		public function updateAmount($tid, $serviceID, $amount){
			$data = array(
				'amount' => $amount
			);

			$this->db->where('transactionID', $tid);
			$this->db->where('serviceID', $serviceID);
			$this->db->update('transactiondetails', $data);
		}

		public function updateQuantity($tid, $serviceID, $quantity){
			$data = array(
				'quantity' => $quantity
			);

			$this->db->where('transactionID', $tid);
			$this->db->where('serviceID', $serviceID);
			$this->db->update('transactiondetails', $data);
		}

		/**
			Above is the code for updating transaction services

		*/

		public function addTransactionAppointment($employeeID, $currentTransactionID, $adate, $time, $agenda){
			$data = array(
				'transactionID' => $currentTransactionID,
				'date' => $adate,
				'time' => $time,
				'agenda' => $agenda,
				'employeeID' => $employeeID
			);

			$this->db->insert('appointments', $data);
		}

		//script for adding transaction payment and also for validation porpuses
		public function addTransactionPayment($cID, $eID, $ctID, $date, $time, $amount){
			$data = array(
				'clientID' => $cID,
				'transactionID' => $ctID,
				'employeeID' => $eID,
				'date' => $date,
				'time' => $time,
				'amount' => $amount
			 );

			$this->db->insert('payments', $data);

			return $this->db->insert_id();
		}

		public function totalAmount($tID){
			$query = $this->db->query("SELECT totalAmount 
				from transactions
				where transactionID = $tID");
			return $query->row();
		}

		public function totalAmountPaid($tID){
			$query = $this->db->query("SELECT sum(amount) as total
				from payments
				where transactionID = $tID");
			return $query->row();	
		}

		public function totalAmountForServices($tid){
			$query = $this->db->query("
				SELECT sum(amount) as total
				FROM transactiondetails
				WHERE transactionID = $tid;
			");

			return $query->row();
		}

		public function servicesCount($tid){
			$query = $this->db->query("
				SELECT count(serviceID) as serviceCount
				FROM transactiondetails
				WHERE transactionID = $tid;
			");

			return $query->row();
		}

		public function getBalance($id){
			$totalAmount = $this->totalAmount($id)->totalAmount;
			$totalAmountPaid = $this->totalAmountPaid($id)->total;
			$balance = $totalAmount - $totalAmountPaid;
			return $balance;
		}

		public function updateTotalAmount($tid, $amount){	
			$data = array(
				'totalAmount' => $amount
			);

			$this->db->where('transactionID', $tid);
			$this->db->update('transactions', $data);
		}
		//end of payment scripts

		public function getTransactionAppointments($transID){
			$query=$this->db->query("
				SELECT appointments.date, appointments.time, agenda
				FROM appointments
				WHERE appointments.transactionID = $transID
			");
			return $query->result_array();
		}

		public function getTransactionPayments($transID){
			$query=$this->db->query("
				SELECT *, concat(firstName, ' ', midName, ' ', lastName) as employeeName
				FROM payments
				NATURAL JOIN employees
				WHERE transactionID = $transID
			");
			return $query->result_array();
		}


		public function getdecors(){
			$this->db->select('*');
			$this->db->from('decors');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getDesigns(){
			$this->db->select('*');
			$this->db->from('designs');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function addServcs($tID, $svcid){
			$data = array(
				'transactionID' => $tID,
				'serviceID' => $svcid,
				'quantity' => 1
			);
			$this->db->insert('transactiondetails', $data);
		}
		
		public function getServices($tranID){
			$query=$this->db->query("
				SELECT *
				FROM services
				WHERE status like 'active'
			");
			return $query->result_array();
		}

		public function getService($service){
			$query=$this->db->query("SELECT * FROM services WHERE serviceID = $service");
			return $query->row();
		}

		public function getServiceIDs($service){
			$query=$this->db->query("
				SELECT serviceID
				FROM services
				WHERE serviceID = $service
			");
			return $query->result_array();
		}

		public function viewEventRentals(){
			$emID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			if($empRole === "handler"){
				$query = $this->db->query("
				SELECT eventID, eventName, clientID, concat(firstName, ' ', middleName, ' ', lastName) as clientName, contactNumber, serviceName, eventStatus
				FROM (SELECT * FROM events LEFT JOIN clients USING(clientID) WHERE eventStatus='on-going' and employeeID = $emID) 
				AS event 
				LEFT JOIN eventservices using (eventID) 
				JOIN services 
				ON eventservices.serviceID=services.serviceID 
				WHERE serviceName LIKE '%rental%';
				");
			}else{
				$query = $this->db->query("
				SELECT eventID, clientID, eventStatus, eventName, concat(firstName, ' ', middleName, ' ', lastName) as clientName, contactNumber, serviceName 
				FROM (SELECT * FROM events LEFT JOIN clients USING(clientID) WHERE eventStatus='on-going') 
				AS event 
				LEFT JOIN eventservices using (eventID) 
				JOIN services 
				ON eventservices.serviceID=services.serviceID 
				WHERE serviceName LIKE '%rental%';
				");
			}
			return $query->result_array();
		}

		public function view_home_ongoing_rentals(){
			$eID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			if ($empRole === "handler") {
				$query= $this->db->query("SELECT *, concat(firstName, ' ', middleName, ' ', lastName) as clientName
				FROM
				    services s
				        NATURAL JOIN			  
				    clients c
				        NATURAL JOIN
				    transactions t
	                	NATURAL JOIN
	                transactiondetails ts
				WHERE
				    s.serviceName LIKE '%rental%'
				        AND t.transactionstatus LIKE 'on%going'
				        AND t.employeeID = $eID"
				);
			}else{
				$query= $this->db->query("SELECT *, concat(firstName, ' ', middleName, ' ', lastName) as clientName
				FROM
				    services s
				        NATURAL JOIN			  
				    clients c
				        NATURAL JOIN
				    transactions t
	                	NATURAL JOIN
	                transactiondetails ts
				WHERE
				    s.serviceName LIKE '%rental%'
				        AND t.transactionstatus LIKE 'on%going'"
				); 
			}
			
			return $query->result_array();
		}

		public function finishTransaction($transID, $date){

			$data = array(
				'transactionstatus' => "finished",
				'finishDate' => $date
			);

			$this->db->where('transactionID', $transID);
			$this->db->update('transactions', $data);

		}

		public function cancelTransaction($transID, $date){

			$data = array(
				'transactionstatus' => "cancelled",
				'cancelledDate' =>$date
			);

			$this->db->where('transactionID', $transID);
			$this->db->update('transactions', $data);
		}

		public function refundDeposit($transID, $depositAmount){
			$data = array(
				'refundAmt' => $depositAmount
			);

			$this->db->where('transactionID', $transID);
			$this->db->update('transactions', $data);
			
		}

		public function checkForRefund($transID){
			$this->db->select('refundAmt');
			$this->db->from('transactions');
			$this->db->where('transactionID', $transID);

			$query = $this->db->get();
			$result = $query->row();

			if ($result->refundAmt == null || empty($result->refundAmt)) {
				return true;
			}else{
				return false;
			}
		}

		public function insertTransaction($clientID, $date, $time, $handler){
			$defaultStatus = "on-going";
			$data = array(
				'clientID' => $clientID,
				'dateAvail' => $date,
				'time' => $time,
				'employeeID' => $handler,
				'transactionstatus' => $defaultStatus,
			);

			$this->db->insert('transactions', $data);

			return $this->db->insert_id();
		}

		/*

		Bellow are the queries for updating each transactino detail attribute...

		*/
		public function upContactNumber($contactNumber, $clientID){
			$data = array(
				'contactNumber' => $contactNumber
			);
			$this->db->where('clientID', $clientID);
			$this->db->update('clients', $data);
		}

		public function upAddress($address, $transID){
			$data = array(
				'homeAddress' => $address
			);
			$this->db->where('transactionID', $transID);
			$this->db->update('transactions', $data);
		}

		public function upYnS($yNs, $transID){
			$data = array(
				'yearAndSection' => $yNs
			);
			$this->db->where('transactionID', $transID);
			$this->db->update('transactions', $data);
		}

		public function upSchool($school, $transID){
			$data = array(
				'school' => $school
			);
			$this->db->where('transactionID', $transID);
			$this->db->update('transactions', $data);
		}

		public function upIdType($idType, $transID){
			$data = array(
				'IDType' => $idType
			);
			$this->db->where('transactionID', $transID);
			$this->db->update('transactions', $data);
		}

		public function getDepositAmount($id){
			$this->db->select('depositAmt');
			$this->db->from('transactions');
			$this->db->where('transactionID', $id);

			$query = $this->db->get();

			return $query->row();
		}
		public function upDepositAmount($depositAmount, $transID){

			$oldDepositAmount = $this->getDepositAmount($transID)->depositAmt;

			$data = array(
				'depositAmt' => $depositAmount
			);

			$this->db->where('transactionID', $transID);
			$this->db->update('transactions', $data);

			$totalAmount = $this->totalAmount($transID)->totalAmount;

			$total = $totalAmount - $oldDepositAmount;
			$newTotal = $total + $depositAmount;

			$this->updateTotalAmount($transID, $newTotal);
			
		}

		public function upDate($date, $transID){
			$data = array(
				'dateAvail' => $date
			);
			$this->db->where('transactionID', $transID);
			$this->db->update('transactions', $data);
		}

		public function upTime($time, $transID){
			$data = array(
				'time' => $time
			);
			$this->db->where('transactionID', $transID);
			$this->db->update('transactions', $data);
		}

		public function uptransactionHandler($empID, $trnID){
			$data = array(
				'employeeID' => $empID
			);
			$this->db->where('transactionID', $trnID);
			$this->db->update('transactions', $data);
		}

		// end of trandaction details update

		// validate time and date of transactions

		public function getTimeNDate($id){
			$this->db->select('time, dateAvail');
			$this->db->from('transactions');
			$this->db->where('transactionID', $id);

			$query = $this->db->get();

			return $query->row();
		}

		public function getTransactionStatus($id){
			$this->db->select('transactionstatus');
			$this->db->from('transactions');
			$this->db->where('transactionID', $id);

			$query = $this->db->get();

			return $query->row();
		}

		public function getHandlers(){
			$this->db->select('employeeID, concat(firstName, " ", midName, " ", lastName) as employeeName');
			$this->db->from('employees');
			$this->db->where('status', "active");
			$this->db->where('role', "handler");

			$query = $this->db->get();

			return $query->result_array();
		}

		public function getTransactionHandler($tranID){
			$this->db->select('employeeID');
			$this->db->from('transactions');
			$this->db->where('transactionID', $tranID);

			$query = $this->db->get();

			return $query->row();
		}

		public function addTransacDes($transacID, $desID){
			$data = array(
				'designID' => $desID,
				'transactionID' => $transacID 
			);
			$this->db->insert('transactiondesign', $data);
		}

		public function addTransacItem($transacID, $itemID){
			$data = array(
				'decorID' => $itemID,
				'transactionID' => $transacID 
			);
			$this->db->insert('transactiondecors', $data);
		}

		public function getTransacItems($transacID){
			$this->db->select('*');
			$this->db->from('transactiondecors');
			$this->db->where('transactionID', $transacID);
			$this->db->join('decors', 'transactiondecors.decorID = decors.decorsID');

			$query = $this->db->get();
			return $query->result_array();
		}

		public function getTransacDesigns($transacID){
			$this->db->select('*');
			$this->db->from('transactiondesign');
			$this->db->where('transactionID', $transacID);
			$this->db->join('designs', 'transactiondesign.designID = designs.designID');

			$query = $this->db->get();
			return $query->result_array();
		}

		public function getTransactionAttireRentals(){
			$emprole = $this->session->userdata('role');
			$empID = $this->session->userdata('employeeID');
			if ($emprole === "handler") {
				$this->db->select('*, concat(clients.firstName, " ", clients.middleName, " ", clients.lastName) as clientName');
				$this->db->from('transactiondesign');
				$this->db->join('designs', 'designs.designID = transactiondesign.designID');
				$this->db->join('transactions', 'transactiondesign.transactionID = transactions.transactionID');
				$this->db->join('clients', 'transactions.clientID = clients.clientID');
				$this->db->where('transactions.employeeID', $empID);
				$this->db->where('transactions.transactionstatus', 'on-going');
			}else{
				$this->db->select('*, concat(clients.firstName, " ", clients.middleName, " ", clients.lastName) as clientName, concat(employees.firstName, " ", employees.midName, " ", employees.lastName) as handlerName');
				$this->db->from('transactiondesign');
				$this->db->join('designs', 'designs.designID = transactiondesign.designID');
				$this->db->join('transactions', 'transactiondesign.transactionID = transactions.transactionID');
				$this->db->join('clients', 'transactions.clientID = clients.clientID');
				$this->db->join('employees', 'employees.employeeID = transactions.employeeID');
				$this->db->where('transactions.transactionstatus', 'on-going');
			}

			$query = $this->db->get();
			return $query->result_array();
		}

		public function getTransactionItemRentals(){
			$emprole = $this->session->userdata('role');
			$empID = $this->session->userdata('employeeID');
			if ($emprole === "handler") {
				$this->db->select('*, concat(clients.firstName, " ", clients.middleName, " ", clients.lastName) as clientName');
				$this->db->from('transactiondecors');
				$this->db->join('decors', 'decors.decorsID = transactiondecors.decorID');
				$this->db->join('transactions', 'transactiondecors.transactionID = transactions.transactionID');
				$this->db->join('clients', 'transactions.clientID = clients.clientID');
				$this->db->where('transactions.employeeID', $empID);
				$this->db->where('transactions.transactionstatus', 'on-going');
			}else{
				$this->db->select('*, concat(clients.firstName, " ", clients.middleName, " ", clients.lastName) as clientName, concat(employees.firstName, " ", employees.midName, " ", employees.lastName) as handlerName');
				$this->db->from('transactiondecors');
				$this->db->join('decors', 'decors.decorsID = transactiondecors.decorID');
				$this->db->join('transactions', 'transactiondecors.transactionID = transactions.transactionID');
				$this->db->join('clients', 'transactions.clientID = clients.clientID');
				$this->db->join('employees', 'employees.employeeID = transactions.employeeID');
				$this->db->where('transactions.transactionstatus', 'on-going');
			}

			$query = $this->db->get();
			return $query->result_array();
		}
	}

?>