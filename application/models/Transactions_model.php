<?php 
	/**
	* 
	*/
	class Transactions_model extends CI_model
	{
		
		public function view_transactions($empID, $role)
		{
			$this->db->select('*');
			$this->db->from('transactions');
			$this->db->join('clients','transactions.clientID = clients.clientID');
			
			if ($role === 'handler') {
				$this->db->where('employeeID', $empID);
			}

			$query=$this->db->get();

			return $query->result_array();

		}
	}

?>