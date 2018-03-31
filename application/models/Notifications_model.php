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
				        AND t.employeeID = $eID
				        AND DATE_ADD(t.dateAvail, INTERVAL 5 day) > CURDATE();"
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
				        AND t.transactionstatus LIKE 'on%going'
				        AND DATE_ADD(t.dateAvail, INTERVAL 5 day) > CURDATE();"
				); 
			}
			
			return $query->result_array();
		}

		public function overdueEventRentals(){
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
				WHERE serviceName LIKE '%rental%'
						AND DATE_ADD(event.eventDate, INTERVAL 5 day) > CURDATE();
				");
			}else{
				$query = $this->db->query("
				SELECT eventName, concat(firstName, ' ', middleName, ' ', lastName) as clientName, contactNumber, serviceName 
				FROM (SELECT * FROM events LEFT JOIN clients USING(clientID) WHERE eventStatus='on-going') 
				AS event 
				LEFT JOIN eventservices using (eventID) 
				JOIN services 
				ON eventservices.serviceID=services.serviceID 
				WHERE serviceName LIKE '%rental%'
					AND DATE_ADD(event.eventDate, INTERVAL 5 day) > CURDATE();
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
				$query = $this->db->query("
					SELECT *
					FROM events
					WHERE DATE_ADD(CURDATE(), INTERVAL 5 day) <= events.eventDate and employeeID = employeeID;
				");
			}else{
				$query = $this->db->query("
					SELECT *
					FROM events
					WHERE DATE_ADD(CURDATE(), INTERVAL 5 day) <= events.eventDate and CURDATE() >= events.eventDate and (eventStatus like 'on-going' or eventStatus like 'new');
				");
			}

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