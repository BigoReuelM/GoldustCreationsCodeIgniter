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
				        AND t.dateAvail + 5 < CURDATE();"
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
				        AND t.dateAvail + 5 < CURDATE();"
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
						AND event.eventDate + 5 < CURDATE();
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
					AND event.eventID + 5 < CURDATE();
				");
			}
			return $query->result_array();
		}
		
		public function getAppointmentsToday(){
			$emID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			if ($empRole === "handler") {
				$query = $this->db->query("
					SELECT *
					FROM appointments
					WHERE appointments.date = CURDATE();
				");
			}else{
				$query = $this->db->query("
					SELECT *
					FROM appointments
					WHERE appointments.date = CURDATE();
				");
			}

			return $query->result_array();
		}

		public function getEventsToday(){
			$emID = $this->session->userdata('employeeID');
			$empRole = $this->session->userdata('role');
			if ($empRole === "handler") {
				$query = $this->db->query("
					SELECT *
					FROM events
					WHERE eventDate = CURDATE();
				");
			}else{
				$query = $this->db->query("
					SELECT *
					FROM events
					WHERE eventDate = CURDATE();
				");
			}

			return $query->result_array();
		}
		
	}
?>