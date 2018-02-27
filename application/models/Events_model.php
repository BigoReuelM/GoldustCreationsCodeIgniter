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
			if ($role === 'handler') {
				$this->db->where('employeeID', $employeeID);
			}
			$this->db->where('eventStatus', $status)

			$query=$this->db->get();

			return $query->row_array();
		}
	}

 ?>