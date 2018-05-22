<?php
	class User_model extends CI_model{
		
		public function login_user($username,$pass){
	 
			$this->db->select('*');
			$this->db->from('employees');
			$this->db->where('username like binary',$username);
			$this->db->where('status', "active");

			if($query=$this->db->get())
			{
				$userData = $query->row_array();
				if (password_verify($pass, $userData['password'])) {
					return $userData;
				}else{
					return false;
				}
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
			$hashPass = password_hash($newPass, PASSWORD_BCRYPT);
			$data = array(
				'password' => $hashPass
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
			$password = $this->getPassByUsername($username);
			if (!$password) {
				return false;
			}else{
				$resetPass = "goldust" . $pin;
				if (password_verify($resetPass, $password->password)) {
					$pass = password_hash("goldust", PASSWORD_BCRYPT);
					$data = array(
						'password' => $pass
					);

					$this->db->where('username like binary', $username);
					$this->db->update('employees', $data);
					return true;	
				}else{
					return false;
				}
			}
			
		}

		public function getPassByUsername($username){
			$this->db->select('password');
			$this->db->from('employees');
			$this->db->where('username', $username);

			$query = $this->db->get();
			if (!empty($query->row())) {
				return $query->row();	
			}else{
				return false;
			}
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

		public function getAllAppointments($userID, $empRole){
			$this->db->select('*, concat(employees.firstName, " ", employees.midName, " ", employees.lastName) as employeeName, concat(clients.firstName, " ", clients.middleName, " ", clients.lastName) as clientName, concat(DATE_FORMAT(appointments.date, "%M-%d-%Y"), " ", DATE_FORMAT(appointments.time, "%r")) as appointmentDateAndTime');
			$this->db->from('appointments');
			$this->db->join('transactions', 'appointments.transactionID = transactions.transactionID');
			$this->db->join('clients', 'transactions.clientID = clients.clientID');
			$this->db->join('employees', 'transactions.employeeID = employees.employeeID');
			if ($empRole === "handler") {
				$this->db->where('transactions.employeeID', $userID);
			}

			$query = $this->db->get();

			return $query->result_array();
		}
		
	}
?>