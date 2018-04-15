<?php
	/**
	* 
	*/
	class Items_model extends CI_model
	{		
		public function getAllDecors(){
			// get all decors W/O THEME 
			/*$this->db->select('*');
			$this->db->from('decors');
			$this->db->where('themeID', 'NULL');
			$query = $this->db->get();*/
			$query = $this->db->query("SELECT * FROM decors WHERE themeID IS NULL");
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

		/*public function uploadGown(){
			$this->db->insert();
		}*/
	}
?>