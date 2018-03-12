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
			$this->db->where('events.eventStatus', $status);

			$query=$this->db->get();

			return $query->result_array();
		}


		public function getEventCount($employeeID, $role, $status)
		{

			$this->db->select('*');
			$this->db->from('events');
			$this->db->join('clients','events.clientID = clients.clientID');
			if ($role === 'handler') {
				$this->db->where('employeeID', $employeeID);
			}
			$this->db->where('events.eventStatus', $status);

			$query=$this->db->count_all_results();

			return $query;

		}

		public function getNewEventsCount($employeeID, $role, $status)
		{
			$this->db->SELECT('eventID');
			$this->db->from('events');
			$this->db->join('clients','events.clientID = clients.clientID');
			if ($role === 'handler') {
				$this->db->where('employeeID', $employeeID);
			}
			$this->db->where('events.eventStatus', $status);
			if ($role === 'admin') {
				$this->db->where('employeeID', null);
			}

			$query=$this->db->count_all_results();

			return $query;
		}

		public function getNewEvents($employeeID, $role, $status)
		{
			
			$this->db->SELECT('*');
			$this->db->from('events');
			$this->db->join('clients','events.clientID = clients.clientID');
			if ($role === 'handler') {
				$this->db->where('employeeID', $employeeID);
			}
			$this->db->where('events.eventStatus', $status);
			if ($role === 'admin') {
				$this->db->where('employeeID', null);
			}

			$query=$this->db->get();

			return $query->result_array();
		}

		public function getEventDetails($eventID, $cID){

			$query=$this->db->query("
				SELECT *
				FROM events 
				NATURAL JOIN clients
				WHERE eventID = $eventID;
				");

			return $query->row();
			
		}

		public function getServices(){
			$query=$this->db->query("SELECT * FROM services WHERE status like 'active'");
			return $query->result_array();
		}

		public function getDecors($eventID){
			//$eID = $this->session->userdata('employeeID');
			//$evntID = $this->session->userdata('currentEventID');
			$this->db->select('*');
			$this->db->from('eventdecors');
			$this->db->join('decors', 'eventdecors.decorID = decors.decorsID');
			//$this->db->join('events', 'eventdecors.eventID = events.eventID');
			//$this->db->where('employeeID', $employeeID);
			$this->db->where('eventID', $eventID);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getDesigns($currentEventID){
			/*
			$this->db->select('*');
			$this->db->from('eventdesigns');
			$this->db->join('designs', 'eventdesigns.designID = designs.designID');
			$this->db->join('events', 'eventdesigns.eventID = events.eventID');
			$this->db->where('events.eventID', $currentEventID);
			*/
			$query = $this->db->query("SELECT * FROM eventdesigns NATURAL JOIN designs NATURAL JOIN events where events.eventID = $currentEventID" );
			return $query->result_array();
		}

		public function getPayments($currentEventID){

			$eID = $currentEventID;

			$this->db->select('*');
			$this->db->from('payments');
			$this->db->join('events', 'events.eventID = payments.eventID');
			$this->db->where('events.eventID', $eID);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getExpenses($currentEventID){

			$eID = $currentEventID;

			$this->db->select('*');
			$this->db->from('expenses');
			$this->db->join('events', 'events.eventID = expenses.eventID');
			$this->db->where('events.eventID', $eID);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getEventName($id){
			$query = $this->db->query("SELECT eventName FROM events where eventID = $id");
			return $query->row();
		}

		public function getClientName($cid){
			$query = $this->db->query("SELECT clientName FROM clients where clientID = $cid");
			return $query->row();
		}

		public function getEntourageDetails($currentEventID){
			$evID = $currentEventID;

			$this->db->select('*');
			$this->db->from('entouragedetails');
			$this->db->join('entourage', 'entouragedetails.entourageID = entourage.entourageID');
			$this->db->join('designs', 'designs.designID = entouragedetails.designID');
			//$this->db->where('entourage.eventID', $evID);

			$query = $this->db->get();
			return $query->result_array();
		}

		public function totalExpenses($eID){
			$query = $this->db->query("SELECT sum(expensesAmount) as total
				from expenses
				where eventID = $eID");
			return $query->row();
		}

		public function totalAmount($eID){
			$query = $this->db->query("SELECT totalAmount 
				from events
				where eventID = $eID");
			return $query->row();
		}

		public function totalAmountPaid($eID){
			$query = $this->db->query("SELECT sum(amount) as total
				from payments
				where eventID = $eID");
			return $query->row();	
		}

		public function balance($eID){
			$query = $this->db->query("SELECT TOTAL.totalAmount-sum(amount) AS balance FROM (select events.eventID, payments.amount, events.totalAmount from events join payments USING(eventID))AS TOTAL WHERE eventID=$eID;");
			return $query->row();
		}

		public function servcTransac($eID){
			$this->db->select('*');
			$this->db->from('eventservices');
			$this->db->join('services', 'eventservices.serviceID = services.serviceID');
			$this->db->where('eventID', $eID);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getHandlers(){
			$query = $this->db->query("
				SELECT *
				FROM employees
				WHERE role like 'handler' and status like 'active'
			");
			return $query->result_array();	
		}

		public function getCurrentHandler($ceid){
			$query = $this->db->query("
				SELECT employeeName, photo
				FROM employees
				Natural join events
				where events.eventID = $ceid  
			");
			return $query->row();
		}

		public function getStaff($ceid){
			$query = $this->db->query("
				SELECT employeeName as name, employeeRole as role, contactNumber as num
				FROM employees
				NATURAL JOIN eventstaff
				where eventID = $ceid    
			");
			return $query->result_array();
		}

		public function getOncallStaff($ceid){
			$query = $this->db->query("
				SELECT employeeName as name, employeeRole as role, contactNumber as num
				FROM oncallstaff
				where eventID = $ceid    
			");
			return $query->result_array();
		}



/*
*
*   ALL INSERT/DELETE BELOW
*/
		public function deleteEvntDecor($decId, $eId){
			$this->db->where('decorID', $decId);
			$this->db->where('eventID', $eId);
			$this->db->delete('eventdecors');
		}	

		public function addEventPayment($cID, $eID, $ceID, $date, $time, $amount){
			$data = array(
				'clientID' => $cID,
				'eventID' => $ceID,
				'employeeID' => $eID,
				'date' => $date,
				'time' => $time,
				'amount' => $amount
			 );

			$this->db->insert('payments', $data);
			/*
			$this->db->insert("INSERT INTO payments(clientID, eventID, employeeID, date, time, amount) values ($cID,$ceID,$eID,$date,$time,$amount);");	
			*/
		}

		public function addEventExpenses($empID, $ceID, $expName, $date, $amount, $num, $image){
			$data = array(
				'eventID' => $ceID,
				'employeeID' => $empID,
				'expensesName' => $expName,
				'expensesAmount' => $amount,
				'expensesDate' => $date,
				'receiptNum' => $num,
				'receiptImage' => $image
			);

			$this->db->insert('expenses', $data);
		}

		public function changeDecor($eId, $decId, $newdecId){
			// add $newdecId later....
			//$query = $this->db->query("UPDATE eventdecors SET decorID = {$newdecId} WHERE eventID = {$eId} and decorID = {$decId}");
			$data = array(
				'decorID' => $newdecId
			);

			$this->db->where('eventID', $eId);
			$this->db->where('decorID', $decId);
			$this->db->update('eventdecors', $data);
			//$this->db->get();
			//return $query->result_array();
		}

		public function addClient($cname, $contact){
			$data = array(
				'clientName' => $cname,
				'contactNumber' => $contact
			);

			$this->db->insert('clients', $data);
			return $this->db->insert_id();
		}

		public function addEvent($clientID, $ename, $celebrantName, $elocation, $edate, $etime, $emotif, $packageType, $etype){
			$eventStatus = "new";
			$data = array(
				'eventName' => $ename,
				'celebrantName' => $celebrantName,
				'eventLocation' => $elocation,
				'eventDate' => $edate,
				'eventTime' => $etime,
				'motif' => $emotif,
				'packageType' => $packageType,
				'clientID' => $clientID,
				'eventType' => $etype
			);

			$this->db->insert('events', $data);

			return $this->db->insert_id();

		}

		//public function addEventExpenses()
	
		/*public function getEntAttirePhoto($entID){
			$this->db->select('designImage');
			$this->db->from('designs');
			$this->db->join('entouragedetails', 'designs.designID = entouragedetails.designID');
			$this->db->where('entourageID', $entID);
			$query = $this->db->get();
			return $query->row();
		}*/

		public function deleteEntourage($entID, $eID){
			$this->db->where('entourageID', $entID);
			$this->db->where('eventID', $eID);
			$this->db->delete('entourage');
		}

		public function deleteAttireEntourage($entID, $desID){
			$this->db->where('entourageID', $entID);
			$this->db->where('designID', $desID);
			$this->db->delete('entouragedetails');

		}
		public function addEventEntourage($enID, $eID, $enName, $enRole, $sho, $che, $sto, $wai, $armL, $armH, $mus, $pantsL, $bas) {
	
			$data = array(
				'entourageID' => $enID,
				'eventID' => $eID,
				'entourageName' => $enName,
				'role' => $role,
				'shoulder' => $sho,
				'chest' => $che,
				'stomach' => $sto,
				'waist' => $wai,
				'armLength' => $armL,
				'armHole' => $armH,
				'muscle' => $mus,
				'pantsLength' => $pantsL,
				'baston' => $bas, 
			);
			$this->db->insert('entourage', $data);
		} 
	}


 ?>