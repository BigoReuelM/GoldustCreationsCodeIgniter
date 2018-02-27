<?php 
	/**
	* 
	*/
	class Events_model extends CI_model
	{
		
		public function getEvents($employeeID, $role, $status)
		{
			
			$this->db->select('*');
			$this->db->from('events');
			$this->db->join('clients','events.clientID = clients.clientID');
			if ($role === 'handler') {
				$this->db->where('employeeID', $employeeID);
			}
			$this->db->where('eventStatus', $status);

			$query=$this->db->get();

			return $query->result_array();
		}
	}

 ?>