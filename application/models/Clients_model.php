<?php  

	/**
	* 
	*/
	class Clients_model extends CI_model
	{
		public function clients(){
			$query=$this->db->query("
				SELECT clientID, CONCAT(firstName, ' ', middleName, ' ', lastName) as clientName, registrationDate, contactNumber 
				from clients
			");

			return $query->result_array();
		}
		
		public function insertClient($fname, $mname, $lname, $con, $date){
			$data = array(
				'firstName' => $fname,
				'middleName' => $mname,
				'lastName' => $lname,
				'contactNumber' => $con,
				'registrationDate' => $date
			);

			$this->db->insert('clients', $data);
			return $this->db->insert_id();
		}

		public function countNewClient(){

			$query = $this->db->query("
				SELECT * FROM clients WHERE registrationDate between date_sub(CURRENT_TIMESTAMP, INTERVAL 7 day) and CURRENT_TIMESTAMP
			");

			return count($query->result_array());
		}

		public function getAvailableHandler(){
			$this->db->select('*, concat(firstname, " ", midName, " ", lastName) as handlerName');
			$this->db->from('employees');
			$this->db->where('role', "handler");
			$this->db->where('status', "active");

			$query = $this->db->get();

			return $query->result_array();
		}
	}

?>