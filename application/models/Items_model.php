<?php
	/**
	* 
	*/
	class Items_model extends CI_model
	{		
		public function getAllDecors(){
			$this->db->select('*');
			$this->db->from('decors');
			$query = $this->db->get();
			return $query->result_array();
		}
	}
?>