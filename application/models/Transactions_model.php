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
					"Select * from clients join transactions using(clientID)"
				);
			}else{
				$query=$this->db->query(
					"Select * from clients join transactions using(clientID)
					where $empID = employeeID"
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
	}

?>