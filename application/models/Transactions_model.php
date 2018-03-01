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
					"SELECT DISTINCT * FROM 
					(Select * from clients join transactions using(clientID))
					AS CL JOIN transactiondetails 
					ON CL.transactionID=transactiondetails.transactionID
					where serviceID = 0000001"
				);
			}else{
				$query=$this->db->query(
					"SELECT * FROM 
					(Select * from clients join transactions using(clientID)) 
					AS CL JOIN transactiondetails 
					ON CL.transactionID=transactiondetails.transactionID
					where $empID = employeeID and serviceID = 0000001"
				);

			}

			return $query->result_array();

		}
	}

?>