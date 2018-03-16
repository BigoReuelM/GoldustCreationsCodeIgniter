<?php
	class User_model extends CI_model{
		//register user function, insert new user data to the database
		/*
		public function register_user($user){
 
 
			$this->db->insert('user', $user);
 
		}
		*/
		//query to login user, check user availability
		public function login_user($username,$pass){
	 
			$this->db->select('*');
			$this->db->from('employees');
			$this->db->where('username',$username);
			$this->db->where('password',$pass);

			if($query=$this->db->get())
			{
				return $query->row_array();
			}
			else{
				return false;
			}
		}

		public function getProfile($empID){
			$query=$this->db->query("
				SELECT *
				FROM employees
				WHERE employeeID = $empID
			");

			return $query->row();
		}
		//check if email already registered
		/*
		public function email_check($email){
 
  			$this->db->select('*');
  			$this->db->from('user');
  			$this->db->where('user_email',$email);
  			$query=$this->db->get();
 
  			if($query->num_rows()>0){
    			return false;
  				}else{
    				return true;
  				}
 
		}
		*/
		
	}
?>