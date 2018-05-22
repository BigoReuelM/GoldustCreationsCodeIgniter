<?php  
	/**
	* 
	*/
	class Notifications_model extends CI_model
	{

		
		public function overdueTransactionRentals(){
			$eID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			if ($empRole === "handler") {
				$this->db->select('concat(clients.firstName, " ", clients.middleName, " ", clients.lastName) as clientName, transactions.dateAvail, clients.contactNumber, concat(employees.firstName, " ", employees.midName, " ", employees.lastName) as employeeName');
				$this->db->from('transactions');
				$this->db->join('transactiondetails','transactions.transactionID = transactiondetails.transactionID');
				$this->db->join('services','transactiondetails.serviceID = services.serviceID');
				$this->db->join('clients','transactions.clientID = clients.clientID');
				$this->db->join('employees','transactions.employeeID = employees.employeeID');
				$this->db->where('services.serviceName like "%rental%"');
				$this->db->where('transactions.transactionstatus like "on%going"');
				$this->db->where('CURDATE() >= DATE_ADD(transactions.dateAvail, INTERVAL 3 DAY)');
				$this->db->where('transactions.employeeID', $eID);
			}else{
				$this->db->select('concat(clients.firstName, " ", clients.middleName, " ", clients.lastName) as clientName, transactions.dateAvail, clients.contactNumber, concat(employees.firstName, " ", employees.midName, " ", employees.lastName) as employeeName');
				$this->db->from('transactions');
				$this->db->join('transactiondetails','transactions.transactionID = transactiondetails.transactionID');
				$this->db->join('services','transactiondetails.serviceID = services.serviceID');
				$this->db->join('clients','transactions.clientID = clients.clientID');
				$this->db->join('employees','transactions.employeeID = employees.employeeID');
				$this->db->where('services.serviceName like "%rental%"');
				$this->db->where('transactions.transactionstatus like "on%going"');
				$this->db->where('CURDATE() >= DATE_ADD(transactions.dateAvail, INTERVAL 3 DAY)');
			}
			
			$query = $this->db->get();
			return $query->result_array();
		}
		public function overdueEPayments(){
			$emID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			if($empRole === "handler"){
				$query = $this->db->query("
				SELECT eventID, eventName, clientID, concat(firstName, ' ', middleName, ' ', lastName) as clientName, contactNumber, eventStatus, eventDate
				FROM events LEFT JOIN clients USING(clientID) JOIN (SELECT eventID, totalAmount-sum(payments.amount) AS Balance FROM events join `payments` USING(eventID) GROUP by eventID) AS bal USING(eventID) where bal.balance !=0 and DATE_ADD(eventDate, INTERVAL eventDuration+5 day) < CURDATE() and eventStatus='on-going' and events.employeeID=$emID;
				");
			}else{
				$query = $this->db->query("
				SELECT eventID, eventName, clientID, concat(firstName, ' ', middleName, ' ', lastName) as clientName, contactNumber, eventStatus, eventDate
				FROM events LEFT JOIN clients USING(clientID) JOIN (SELECT eventID, totalAmount-sum(payments.amount) AS Balance FROM events join `payments` USING(eventID) GROUP by eventID) AS bal USING(eventID) where bal.balance !=0 and DATE_ADD(eventDate, INTERVAL eventDuration+5 day) < CURDATE() and eventStatus='on-going';
				");
			}
			return $query->result_array();

		}

		public function overdueEventRentals(){
			$emID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			if($empRole === "handler"){
				$query = $this->db->query("
				SELECT eventID, eventName, clientID, concat(firstName, ' ', middleName, ' ', lastName) as clientName, contactNumber, serviceName, eventStatus, eventDate
				FROM (SELECT * FROM events LEFT JOIN clients USING(clientID) WHERE eventStatus='on-going' and employeeID = $emID) 
				AS event 
				LEFT JOIN eventservices using (eventID) 
				JOIN services 
				ON eventservices.serviceID=services.serviceID 
				WHERE description LIKE '%rental%'
						AND DATE_ADD(eventDate, INTERVAL eventDuration+5 day) < CURDATE();
				");
			}else{
				$query = $this->db->query("
				SELECT eventName, concat(firstName, ' ', middleName, ' ', lastName) as clientName, contactNumber, serviceName, eventDate 
				FROM (SELECT * FROM events LEFT JOIN clients USING(clientID) WHERE eventStatus='on-going') 
				AS event 
				LEFT JOIN eventservices using (eventID) 
				JOIN services 
				ON eventservices.serviceID=services.serviceID 
				WHERE description LIKE '%rental%'
					AND DATE_ADD(eventDate, INTERVAL eventDuration+5 day) < CURDATE();
				");
			}
			return $query->result_array();
		}
		
		public function getAppointmentsToday(){
			$emID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			if ($empRole === "handler") {
				$this->db->select('*');
				$this->db->from('appointments');
				$this->db->where('appointments.date = CURDATE()');
				$this->db->where('employeeID', $emID);
			}else{
				$this->db->select('*, concat(firstName, " ", midName, " ", lastName) as employeeName');
				$this->db->from('appointments');
				$this->db->join('employees', 'appointments.employeeID = employees.employeeID');
				$this->db->where('appointments.date = CURDATE()');
			}
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getEventsToday(){
			$emID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			if ($empRole === "handler") {
				$this->db->select('*');
				$this->db->from('events');
				$this->db->where('eventDate = CURDATE()');
				$this->db->where('employeeID', $emID);
			}else{
				$this->db->select('*, concat(firstName, " ", midName, " ", lastName) as employeeName');
				$this->db->from('events');
				$this->db->join('employees', 'events.employeeID = employees.employeeID');
				$this->db->where('eventDate = CURDATE()');
			}

			$query = $this->db->get();	

			return $query->result_array();
		}

		public function getIncommingEvents(){
			$emID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			if ($empRole === "handler") {
				$this->db->select('*');
				$this->db->from('events');
				$this->db->where('events.eventDate > CURDATE() && events.eventDate < DATE_ADD(CURDATE(), INTERVAL 5 DAY)');
				$this->db->where('events.employeeID', $emID);
			}else{
				$this->db->select('*, concat(firstName, " ", midName, " ", lastName) as employeeName');
				$this->db->from('events');
				$this->db->join('employees', 'events.employeeID = employees.employeeID');
				$this->db->where('events.eventDate > CURDATE() && events.eventDate < DATE_ADD(CURDATE(), INTERVAL 5 DAY)');
			}
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getIncommingAppointments(){
			$emID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			if ($empRole === "handler") {
				$this->db->select('*');
				$this->db->from('appointments');
				$this->db->where('appointments.date = DATE_ADD(CURDATE(), INTERVAL 1 DAY)');
				$this->db->where('appointments.employeeID', $emID);

				$query = $this->db->get();
			}else{

				$this->db->select('*, concat(firstName, " ", midName, " ", lastName) as employeeName');
				$this->db->from('appointments');
				$this->db->join('employees', 'appointments.employeeID = employees.employeeID');
				$this->db->where('appointments.date = DATE_ADD(CURDATE(), INTERVAL 1 DAY)');

				$query = $this->db->get();
			}

			return $query->result_array();
		}
		
	}
?>