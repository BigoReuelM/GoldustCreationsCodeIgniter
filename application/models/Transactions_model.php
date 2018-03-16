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

		public function getTransactionServices($transID){
			$query=$this->db->query(
				"
				SELECT serviceName, amount 
				FROM transactiondetails
				NATURAL JOIN services
				WHERE transactionID = $transID 
				"
			);

			return $query->result_array();
		}

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
				SELECT *
				FROM payments
				WHERE transactionID = $transID
			");
			return $query->result_array();
		}

		public function totalAmountPaid($transID){
			$query = $this->db->query("
				SELECT sum(amount) as total
				from payments
				where transactionID = $transID
			");

			return $query->row();
		}
		
		public function getTransactionExpenses($transID){
			$query=$this->db->query("
				SELECT *
				FROM expenses 
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

		public function viewEventRentals(){
			$emID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			if($empRole === "handler"){
				$query = $this->db->query("
				SELECT eventName, concat(firstName, ' ', middleName, ' ', lastName) as clientName, contactNumber, serviceName FROM (SELECT * FROM events LEFT JOIN clients USING(clientID) WHERE eventStatus='on-going' and employeeID = $emID) AS event LEFT JOIN eventservices using (eventID) JOIN services ON eventservices.serviceID=services.serviceID WHERE serviceName LIKE '%rental%';
				");
			}else{
				$query = $this->db->query("
				SELECT eventName, concat(firstName, ' ', middleName, ' ', lastName) as clientName, contactNumber, serviceName FROM (SELECT * FROM events LEFT JOIN clients USING(clientID) WHERE eventStatus='on-going') AS event LEFT JOIN eventservices using (eventID) JOIN services ON eventservices.serviceID=services.serviceID WHERE serviceName LIKE '%rental%';
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

		public function finishTransaction($transID){

			$data = array(
				'transactionstatus' => "finished"
			);

			$this->db->where('transactionID', $transID);
			$this->db->update('transactions', $data);

		}

		public function cancelTransaction($transID){

			$data = array(
				'transactionstatus' => "cancelled"
			);

			$this->db->where('transactionID', $transID);
			$this->db->update('transactions', $data);
		}

		public function insertTransaction($clientID){

			$data = array(
				'clientID' => $clientID,
			);

			$this->db->insert('transactions', $data);

			return $this->db->insert_id();
		}


	}

?>