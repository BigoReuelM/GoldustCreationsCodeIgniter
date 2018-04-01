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
			$this->db->where('username like binary',$username);
			$this->db->where('password like binary',$pass);
			$this->db->where('status', "active");

			if($query=$this->db->get())
			{
				return $query->row_array();
			}
			else{
				return false;
			}
		}


		public function getPassword($empID){
			$query = $this->db->query("
				SELECT password
				FROM employees
				WHERE employeeID = $empID;
			");

			return $query->row();
		}


		public function getProfile($empID){
			$query=$this->db->query("
				SELECT *
				FROM employees
				WHERE employeeID = $empID
			");

			return $query->row();
		}

		/*
			This is where update for profile is done
		*/

		public function updateUserFirstname($empID, $fname){
			$data = array(
				'firstName' => $fname
			);

			$this->db->where('employeeID', $empID);
			$this->db->update('employees', $data);
		}

		public function updateUserMiddlename($empID, $mname){
			$data = array(
				'midName' => $mname 
			);

			$this->db->where('employeeID', $empID);
			$this->db->update('employees', $data);
		}

		public function updateUserLastname($empID, $lname){
			$data = array(
				'lastName' => $lname 
			);

			$this->db->where('employeeID', $empID);
			$this->db->update('employees', $data);
		}

		public function updateUserCnum($empID, $cnum){
			$data = array(
				'contactNumber' => $cnum 
			);

			$this->db->where('employeeID', $empID);
			$this->db->update('employees', $data);
		}

		public function updateUserEmail($empID, $email){
			$data = array(
				'email' => $email 
			);

			$this->db->where('employeeID', $empID);
			$this->db->update('employees', $data);
		}

		public function updateUserHomeadd($empID, $homeadd){
			$data = array(
				'address' => $homeadd 
			);

			$this->db->where('employeeID', $empID);
			$this->db->update('employees', $data);
		}

		/*
			End of update for profile
		*/

		/**
			Change Password of user
		*/
		public function updateUserPassword($empID, $newPass){
			$data = array(
				'password' => $newPass
			);

			$this->db->where('employeeID', $empID);
			$this->db->update('employees', $data);
		}
		/*
		*	End of password change
		*/

		/*
		* Change username
		*/
		public function updateuserUsername($empID, $newUsername){
			$data = array(
				'username' => $newUsername
			);

			$this->db->where('employeeID', $empID);
			$this->db->update('employees', $data);
		}
		/*
			end of change username
		*/


		public function resetPasstoDefault($username, $pin){
			$data = array(
				'password' => "goldust"
			);

			$this->db->where('username like binary', $username);
			$this->db->where('password like binary', "goldust" . $pin);
			$this->db->update('employees', $data);
		}

		public function checkUsernameAvailability($username){
			$this->db->select('count(employeeID) as count');
			$this->db->from('employees');
			$this->db->where('username like binary',$username);

			$query=$this->db->get();
			$data = $query->row();

			if( $data->count > 0 )
			{
				return false;
			}
			return true;
		}
		
	}
?>