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

		public function getAllCostumes(){
			$this->db->select('*');
			$this->db->from('designs');
			$this->db->where('designType', 'costume');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getAllGowns(){
			$this->db->select('*');
			$this->db->from('designs');
			$this->db->where('designType', 'gown');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getAllSuits(){
			$this->db->select('*');
			$this->db->from('designs');
			$this->db->where('designType', 'suit');
			$query = $this->db->get();
			return $query->result_array();
		}

		
	}
?>