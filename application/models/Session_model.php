<?php  
	/**
	 * 
	 */
	class Session_model extends CI_model
	{
		
		public function sessionCheck(){

			if(isset($_SESSION['last_acted_on']) && (time() - $_SESSION['last_acted_on'] > $_SESSION['allowed_idle_time'])){
				redirect(base_url('user/user_logout'));
				exit;
			}else{
				$_SESSION['last_acted_on'] = time();
			}

			if(!isset($_SESSION['employeeID'])){
				redirect(base_url('user/user_logout'));
				exit;
			}

		}
	}

?>