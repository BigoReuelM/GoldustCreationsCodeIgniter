<?php 
	/**
	* 
	*/
	class Transactions_model extends CI_model
	{
		
		public function view_transactions($empID, $role)
		{

			if ($role === 'admin') {
				$query=$this->db->query(
					"SELECT *  
					from transactions
					where transactionstatus like 'on-going'"
				);
			}else{
				$query=$this->db->query(
					"SELECT * 
					from clients 
					join transactions using(clientID)
					where $empID = employeeID and transactionstatus like 'on-going'"
				);

			}

			return $query->result_array();

		}

		public function getTransactionDetails($empID, $role){
			if ($role === 'admin') {
				$query=$this->db->query(
					"SELECT * 
					from clients 
					join transactions using(clientID)
					where transactionstatus like 'on-going'"
				);
			}else{
				$query=$this->db->query(
					"SELECT * 
					from clients
					natural join transactions
					natural join transactiondetails
					where $empID = employeeID and transactionstatus like 'on-going'"
				);

			}

			return $query->result_array();

		}
		public function view_home_ongoing_rentals(){
			$eID = $this->session->userdata('employeeID');
			$query= $this->db->query("SELECT *
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


	}

?>