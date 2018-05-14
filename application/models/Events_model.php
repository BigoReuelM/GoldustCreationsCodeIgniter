<?php 
	/**
	* 
	*/
	class Events_model extends CI_model
	{
		
		public function getEvents($employeeID, $role, $status)
		{
			
			$this->db->select('*, concat(firstName, " ", middleName, " ", lastName) as clientName');
			$this->db->from('events');
			$this->db->join('clients','events.clientID = clients.clientID');
			if ($role === 'handler') {
				$this->db->where('employeeID', $employeeID);
			}
			$this->db->where('events.eventStatus', $status);

			$query=$this->db->get();

			return $query->result_array();
		}

		public function getNewEvents($employeeID, $role, $status)
		{
			if ($role === "handler") {
				$this->db->SELECT('*, concat(clients.firstName, " ", middleName, " ", clients.lastName) as clientName, concat(employees.firstName, " ", midName, " ", employees.lastName) as employeeName');
				$this->db->from('events');
				$this->db->join('clients','events.clientID = clients.clientID');
				$this->db->join('employees','events.employeeID = employees.employeeID');
				$this->db->where('events.eventStatus', $status);
				
				$this->db->where('events.employeeID', $employeeID);
			}else{
				$this->db->SELECT('*, concat(clients.firstName, " ", middleName, " ", clients.lastName) as clientName, concat(employees.firstName, " ", midName, " ", employees.lastName) as employeeName');
				$this->db->from('events');
				$this->db->join('clients','events.clientID = clients.clientID');
				$this->db->join('employees','events.employeeID = employees.employeeID');
				$this->db->where('events.eventStatus', $status);
			}
			
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
			

			$query=$this->db->count_all_results();

			return $query;
		}


		public function getEventDetails($eventID, $cID){

			$query=$this->db->query("
				SELECT *, concat(firstName, ' ', middleName, ' ', lastName) as clientName
				FROM events 
				NATURAL JOIN clients
				WHERE eventID = $eventID;
				");

			return $query->row();
			
		}

		public function getEventStatus($id){
			$this->db->select('eventStatus');
			$this->db->from('events');
			$this->db->where('eventID', $id);

			$query = $this->db->get();

			return $query->row();
		}

		public function getServices(){
			$id=$this->session->userdata('currentEventID');
			$query=$this->db->query("
				SELECT *
				FROM services
				WHERE status like 'active'
			");
			return $query->result_array();
		}

		public function getDecors($eventID){
			$query = $this->db->query("SELECT * FROM eventdecors JOIN decors ON eventdecors.decorID = decors.decorsID WHERE eventID = $eventID GROUP BY decorsID ORDER BY decorName");
			return $query->result_array();
		}

		public function getDesigns($currentEventID){
			$query = $this->db->query("SELECT * FROM eventdesigns NATURAL JOIN designs where eventID = $currentEventID" );
			return $query->result_array();
		}

		public function getPayments($currentEventID){

			$eID = $currentEventID;

			$query = $this->db->query("SELECT concat(firstName, ' ', midName, ' ', lastName) as employeeName, amount, date, time from employees natural join payments where eventID=$eID");
			return $query->result_array();
		}

		
		/*public function getPayment($currentEventID){

			$eID = $currentEventID;

			$query = $this->db->query("SELECT * FROM payments NATURAL JOIN employees where eventID = $eID");
			return $query->result_array();
		}*/

		

		public function getEventName($id){
			$query = $this->db->query("SELECT eventName FROM events where eventID = $id");
			return $query->row();
		}

		public function getPaymentReceiver($ceid){
			$query = $this->db->query("
				SELECT concat(firstName, ' ', midName, ' ', lastName) as employeeName 
				FROM employees NATURAL JOIN payments
				WHERE payments.eventID = $ceid 
			");
			return $query->row();
		}

		public function getClientName($cid){
			$query = $this->db->query("SELECT concat(firstName, ' ', middleName, ' ', lastName) as clientName FROM clients where clientID = $cid");
			return $query->row();
		}

		public function getEntourageDetails($currentEventID){
			/*$this->db->select('*');
			$this->db->from('entouragedetails');
			$this->db->join('entourage', 'entouragedetails.entourageID = entourage.entourageID');
			$this->db->join('designs', 'designs.designID = entouragedetails.designID');
			$this->db->where('entourage.eventID', $currentEventID);*/
			$query = $this->db->query("SELECT * FROM entourage WHERE eventID = $currentEventID");
			//$query = $this->db->get();
			return $query->result_array();
		}

		public function getEntourage($currentEventID){
			$this->db->select('*');
			$this->db->from('entourage');
			$this->db->where('entourage.eventID', $currentEventID);

			$query = $this->db->get();
			return $query->result_array();
		}

		public function totalAmount($eID){
			$query = $this->db->query("SELECT totalAmount 
				from events
				where eventID = $eID");
			return $query->row();
		}

		public function updateTotalAmount($amount, $evtID){
			$data = array(
				'totalAmount' => $amount
			);
			$this->db->where('eventID', $evtID);
			$this->db->update('events', $data);
		}

		public function totalAmountPaid($eID){
			$query = $this->db->query("SELECT sum(amount) as total
				from payments
				where eventID = $eID");
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
			$date = $this->getEventDate();
			
			$eventDate = $date->eventDate;
			if ($eventDate == null) {
				return false;
			}
			$query = $this->db->query("
				SELECT DISTINCT employeeID, concat(firstName,' ', midName,' ', lastName) AS employeeName FROM employees left join events using(employeeID) where role='handler' and status='active' and employeeID NOT IN
				(SELECT employeeID FROM employees left join events using(employeeID) WHERE role='handler'  and status='active' and '$eventDate' between date_sub(eventDate, INTERVAL 5 day) and date_add(eventDate, INTERVAL 3 day))
			");
			
			return $query->result_array();	
				
		}

		public function getEventDate(){
			$id = $this->session->userdata('currentEventID');
			$query = $this->db->query("
				SELECT eventDate
				FROM events
				WHERE eventID = $id
			");

			return $query->row();
		}

		public function getCurrentHandler($ceid){
			$query = $this->db->query("
				SELECT concat(firstName, ' ', midName, ' ', lastName) as employeeName, employeeID
				FROM employees
				Natural join events
				where events.eventID = $ceid  
			");
			return $query->row();
		}

		// get event staff
		public function getStaff($ceid){
			$this->db->select('*, concat(firstName, " ", midName, " ", lastName) as name, employees.employeeID as empId');
			$this->db->from('employees');
			$this->db->join('eventstaff', 'employees.employeeID = eventstaff.employeeID');
			$this->db->where('eventID', $ceid);

			$query = $this->db->get();
			return $query->result_array();
		}

		public function getStaffID($ceid){
			$this->db->select('employees.employeeID as empId');
			$this->db->from('employees');
			$this->db->join('eventstaff', 'employees.employeeID = eventstaff.employeeID');
			$this->db->where('eventID', $ceid);

			$query = $this->db->get();
			return $query->result_array();
		}

		public function addStaff($eID, $staffID){
			$data = array(
				'eventID' => $eID,
				'employeeID' => $staffID
			);
			$this->db->insert('eventstaff', $data);
		}

		public function updtEvtStaff($evtID, $empID, $role){
			$data = array(
				'employeeRole' => $role
			);
			$this->db->where('employeeID', $empID);
			$this->db->where('eventID', $evtID);
			$this->db->update('eventstaff', $data);
		}

		public function dltEvtStaff($evtID, $svcStaffId){
			$this->db->where('eventID', $evtID);
			$this->db->where('employeeID', $svcStaffId);
			$this->db->delete('eventstaff');
		}

		public function showAllStaff($id){
			$date = $this->getEventDate($id);
			$query = $this->db->query("
				SELECT *, concat(firstName, ' ', midName, ' ', lastName) as employeeName
				FROM employees
				WHERE status like 'active' and ((role like 'staff') or (role like 'on%call%staff'))
			");
			return $query->result_array();
		}

		public function getServiceTotal($ceid){
			$query = $this->db->query("
				SELECT SUM(amount) as total
				FROM eventservices
				WHERE eventID = $ceid
				");

			return $query->row();
		}

		public function getAppointments($ceid){
			$query = $this->db->query("
				SELECT *
				FROM appointments
				WHERE eventID = $ceid
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

		public function deleteEvntDesign($desId, $eId){
			$this->db->where('designID', $desId);
			$this->db->where('eventID', $eId);
			$this->db->delete('eventdesigns');
		}

		public function deleteEvntSvc($svcId, $eId){
			$this->db->where('serviceID', $svcId);
			$this->db->where('eventID', $eId);
			$this->db->delete('eventservices');
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

			return $this->db->insert_id();
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

		public function addEventAppointment($employeeID, $currentEventID, $adate, $time, $agenda){
			$data = array(
				'eventID' => $currentEventID,
				'date' => $adate,
				'time' => $time,
				'agenda' => $agenda,
				'employeeID' => $employeeID,
				'status' => "ongoing"
			);

			$this->db->insert('appointments', $data);

			return $this->db->insert_id();
		}


		public function insertNewEvent($clientID, $employeeID, $eventName, $celebrantName, $availDate, $eventDate, $eventTime, $eventDuration){
			$data = array(
				'clientID' => $clientID,
				'employeeID' => $employeeID,
				'eventName' => $eventName,
				'celebrantName' => $celebrantName,
				'dateAssisted' => $availDate,
				'eventDate' => $eventDate,
				'eventTime' => $eventTime,
				'eventDuration' => $eventDuration
			);

			$this->db->insert('events', $data);

			return $this->db->insert_id();

		}

		public function deleteEntourage($entID, $eID){
			$this->db->where('entourageID', $entID);
			$this->db->where('eventID', $eID);
			$this->db->delete('entourage');
		}

		public function deleteAttireEntourage($eID, $desID){
			$this->db->where('eventID', $eID);
			$this->db->where('designID', $desID);
			$this->db->delete('eventdesigns');

		}

		public function deleteEvtOCStaff($eID, $svcStaffId){
			$this->db->where('eventID', $eID);
			$this->db->where('OCStaffID', $svcStaffId);
			$this->db->delete('oncallstaff');
		}

		public function addEventEntourage($eID, $enName, $enRole, $sho, $che, $sto, $wai, $armL, $armH, $mus, $pantsL, $bas) {
	
			$data = array(
				'eventID' => $eID,
				'entourageName' => $enName,
				'role' => $enRole,
				'shoulder' => $sho,
				'chest' => $che,
				'stomach' => $sto,
				'waist' => $wai,
				'armLength' => $armL,
				'armHole' => $armH,
				'muscle' => $mus,
				'pantsLength' => $pantsL,
				'baston' => $bas, 
				'status' => "not-done"
			);
			$this->db->insert('entourage', $data);
			return $this->db->insert_id();
		}
		/*

		Bellow are the queries for updating each event detail attribute...

		*/
		public function upEventName($eventName, $eventID){
			$data = array(
				'eventName' => $eventName
			);
			$this->db->where('eventID', $eventID);
			$this->db->update('events', $data);
		}
		public function upCelebrantName($celebrantName, $eventID){
			$data = array(
				'celebrantName' => $celebrantName
			);
			$this->db->where('eventID', $eventID);
			$this->db->update('events', $data);
		}
		public function upClientContactNo($clientContactNo, $clientID){
			$data = array(
				'contactNumber' => $clientContactNo
			);
			$this->db->where('clientID', $clientID);
			$this->db->update('clients', $data);
		}
		public function upPackageType($packageType, $eventID){
			$data = array(
				'packageType' => $packageType
			);
			$this->db->where('eventID', $eventID);
			$this->db->update('events', $data);
		}
		public function upEventDate($eventDate, $eventID){
			$data = array(
				'eventDate' => $eventDate
			);
			$this->db->where('eventID', $eventID);
			$this->db->update('events', $data);
		}
		public function upEventTime($eventTime, $eventID){
			$data = array(
				'eventTime' => $eventTime
			);
			$this->db->where('eventID', $eventID);
			$this->db->update('events', $data);
		}
		public function upLocation($location, $eventID){
			$data = array(
				'eventLocation' => $location
			);
			$this->db->where('eventID', $eventID);
			$this->db->update('events', $data);
		}
		public function upType($type, $eventID){
			$data = array(
				'eventType' => $type
			);
			$this->db->where('eventID', $eventID);
			$this->db->update('events', $data);
		}
		public function upMotif($motif, $eventID){
			$data = array(
				'motif' => $motif
			);
			$this->db->where('eventID', $eventID);
			$this->db->update('events', $data);
		}

		public function updateEventHandler($eventID, $handlerID){
			$data = array(
				'employeeID' =>$handlerID
			);

			$this->db->where('eventID', $eventID);
			$this->db->update('events', $data);
		}

		public function updateEventStatus($eventID){
			$data = array(
				'eventStatus' => "on-going" 
			);

			$this->db->where('eventID', $eventID);
			$this->db->update('events', $data);
		}

		public function updateAvailDate($date, $eventID){
			$data = array(
				'dateAssisted' => $date
			);

			$this->db->where('eventID', $eventID);
			$this->db->update('events', $data);
		}

		/*

		Above are the queries for updating each event detail attribute...

		*/

		/*

		Bellow are the queries for updating event status...

		*/
		public function markEventFinish($eventID, $date){
			$data = array(
				'eventStatus' => "finished",
				'finishedDate' => $date 
			);

			$this->db->where('eventID', $eventID);
			$this->db->update('events', $data);
		}

		public function markEventCancelled($eventID, $refundedAmount, $dateRefunded, $dateCancelled){
			$data = array(
				'refundedAmount' => $refundedAmount,
				'refundedDate' => $dateRefunded,
				'cancelledDate' => $dateCancelled,
				'eventStatus' => "cancelled" 
			);

			$this->db->where('eventID', $eventID);
			$this->db->update('events', $data);
		}
		/*

		Above are the queries for updating event status...

		*/

		public function returnSvcQty($eventID, $svcID){
			$this->db->select('quantity');
			$this->db->from('eventservices');
			$this->db->where('eventID', $eventID);
			$this->db->where('serviceID', $svcID);
			$query = $this->db->get();
			return $query->row();
		}

		public function returnSvcAmt($eventID, $svcID){
			$this->db->select('amount');
			$this->db->from('eventservices');
			$this->db->where('eventID', $eventID);
			$this->db->where('serviceID', $svcID);
			$query = $this->db->get();
			return $query->row();
		}

		public function updateSvcQty($eventID, $qty, $svcID){
			$data = array(
				'quantity' => $qty
			);
			$this->db->where('eventID', $eventID);
			$this->db->where('serviceID', $svcID);
			$this->db->update('eventservices', $data);
		}

		public function updateSvcAmt($eventID, $amt, $svcID){
			$data = array(
				'amount' => $amt
			);
			$this->db->where('eventID', $eventID);
			$this->db->where('serviceID', $svcID);
			$this->db->update('eventservices', $data);
		}

		public function addServcs($eID, $svcid){
			$data = array(
				'eventID' => $eID,
				'serviceID' => $svcid
			);
			if($this->db->insert('eventservices', $data)){
				return true;
			}else{
				return false;
			}
		}

		public function changeAttireEntourage($eID, $desID, $newDesId) {
			$data = array('designID' => $newDesId);

			$this->db->where('eventID', $eID);
			$this->db->where('designID', $desID);
			$this->db->update('eventdesigns', $data);
		}

		public function getEntourageRole(){
			$eventID = $this->session->userdata('currentEventID');
			$query = $this->db->query("
				SELECT entourage.role
				FROM entourage
				NATURAL JOIN events
				WHERE eventID = $eventID
			");

			return $query->result_array();
		}

		public function getDesignName(){
			$eventID = $this->session->userdata('currentEventID');
			$query = $this->db->query("
				SELECT designs.designName 
				FROM designs 
				NATURAL JOIN eventdesigns 
				WHERE eventID = $eventID"
			);

			return $query->result_array();
		}

		// resume a cancelled event
		public function changeEvtStatus($date){
			$eID = $this->session->userdata('currentEventID');
			$data = array(
				'eventStatus' => 'on-going',
				'resumeDate' => $date
			);
			$this->db->where('eventID', $eID);
			$this->db->update('events', $data);
		}

		public function updateAttireQty($evID, $desID, $qty){
				$eID = $this->session->userdata('currentEventID');
				$desID = $this->session->userdata('currentDesignID');
				$query = $this->db->query("
					UPDATE eventdesign
					SET quantity = $qty
					WHERE eventID = $eID
					AND designID = $desID
				");

				//UPDATE eventdesign set quantity=5 where eventID=’0001’ and designID=’002’
		}

		/*public function updateAttireDesign($evID, $entID, $designName){
			$evID = $this->session->userdata('$currentEventID');
			$enID = $this->session->userdata('$currentEntourageID');
			$desID = $this->session->userdata('$currentDesignID');

			$query= $this->db->query("
				SELECT designID, designName, quantity, role FROM (SELECT designID, role FROM `entouragedetails` join entourage using($enID) where eventID='$evID') AS entourage join designs using ($desID) join eventdesigns USING(currentDesignID) where eventID='$evID' group by role");
			
			return $query->result_array();
		}*/

		public function insertEntDet($entID){
			// insert entourage to entouragedetails table...
			$data = array(
				'entourageID' => $entID
			);
			$this->db->insert('entouragedetails', $data);
		}

		public function updateAttireDesign($entID, $desID){
			$data = array(
				'designID' => $desID
			);
			$this->db->where('entourageID', $entID);
			$this->db->update('entouragedetails', $data);

		}

		/*public function updateAttireRole($evID, $entID, $entRole){
				$eID = $this->session->userdata('currentEventID');
				$entID = $this->session->userdata('currentEntourageID');
				$desID = $this->session->userdata('currentDesignID');

				$query = $this->db->query("
					UPDATE entourage 
					JOIN entouragedetails USING ($entID)
					SET entouragedetails.designID = $desID
					WHERE entourage.eventID = $eID
					AND entourage.role = $entRole
				");
				//UPDATE entourage JOIN entouragedetails using(entourageID) SET entouragedetails.designID ='001' WHERE entourage.eventID='001' and entourage.role='Brides Maid'
		}*/

		/*public function getEntourageDet($currentEventID, $currentDesignID, $currentEntourageID) {
			$evID = $this->session->userdata('$currentEventID');
			$enID = $this->session->userdata('$currentEntourageID');
			$desID = $this->session->userdata('$currentDesignID');

			$query= $this->db->query("
				SELECT designID, designName, quantity, role FROM (SELECT designID, role FROM `entouragedetails` join entourage using($enID) where eventID='$evID') AS entourage join designs using ($desID) join eventdesigns USING(currentDesignID) where eventID='$evID' group by role");
			
			return $query->result_array();
		}*/

		// all themes


		public function getThemes(){
			$this->db->select('*');
			$this->db->from('theme');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getThemeDecors($currentThemeID){
			$currentThemeID = $this->session->userdata('currentTheme');
			$query = $this->db->query("
				SELECT * FROM decors WHERE themeID = $currentThemeID"
			);
			return $query->result_array();
		}

		public function getThemeDesigns($currentThemeID){
			$currentThemeID = $this->session->userdata('currentTheme');
			$query = $this->db->query("SELECT * FROM designs WHERE themeID = $currentThemeID"
			);
			return $query->result_array();
		}

		public function getThemeDetails($currentThemeID){
			$currentThemeID = $this->session->userdata('currentTheme');
			$query = $this->db->query("
				SELECT * FROM theme WHERE themeID = $currentThemeID;
				");
			//$query = $this->db->get();
			return $query->row();
		}

		public function addEventTheme($currentEventID, $currentThemeID){
			$data = array(
				'themeID' => $currentThemeID
			);
			$this->db->where('eventID', $currentEventID);
			$this->db->update('events', $data);

			return $this->db->insert_id();

		}

		public function getEventTheme($eventID){
			$query = $this->db->query("SELECT * FROM events WHERE eventID = $eventID");
			return $query->row();
		}

		public function displayEventThemeDesigns($eventThemeID){
			$query = $this->db->query("SELECT * FROM designs JOIN eventdesigns ON designs.designID = eventdesigns.designID WHERE themeID = $eventThemeID");

			return $query->result_array();
		}

		public function displayEventThemeDecors($eventThemeID){
			$query = $this->db->query("SELECT * FROM decors JOIN eventdecors ON decors.decorsID = eventdecors.decorID WHERE themeID = $eventThemeID");

			return $query->result_array();
		}

		public function chkDecExist($decorID){
			// check if the decor being inserted already exists...
			$query = $this->db->query("SELECT * FROM decors WHERE decorID = $decorID");
			return $query->result_array();
		}

		public function chkEvtDecExist($eventID, $decorID){
			// check if the eventdecor being inserted already exists...
			$query = $this->db->query("SELECT * FROM eventdecors WHERE eventID = $eventID AND decorID = $decorID");
			return $query->result_array();
		}

		public function chkEvtDesExist($eventID, $designID){
			// check if the eventdecor being inserted already exists...
			$query = $this->db->query("SELECT * FROM eventdesigns WHERE eventID = $eventID AND designID = $designID");
			return $query->result_array();
		}

		public function insertEventDecorTheme($eventID, $decorID){
			// insert the decors of a theme [for an event] to the eventdecors table...
			$data = array(
				'eventID' => $eventID,
				'decorID' => $decorID
			);
			$this->db->insert('eventdecors', $data);
		}

		public function insertEventDesignTheme($eventID, $designID){
			// insert the designs of a theme [for an event] to the eventdesigns table...
			$data = array(
				'eventID' => $eventID,
				'designID' => $designID
			);
			$this->db->insert('eventdesigns', $data);
		}

		//The following queries is meant for the calendar

		public function getEventDetailsForCalendar(){

			$query = $this->db->query("
				SELECT YEAR(eventDate) as year, MONTH(eventDate) as month, DAY(eventDate) as day, eventID, eventName, eventTime, packageType 
				FROM `events`
				WHERE eventDate is not null and (eventStatus like 'new' or eventStatus like 'on%going') and eventName is not null and eventTime is not null;
			");

			return $query->result_array();
		}

		public function getEventDates(){

			$query = $this->db->query("
				SELECT eventDate
				from events
				where eventDate is not null
				group by eventDate
			");

			return $query->result_array();
		}

		public function getEventYear(){
			$query = $this->db->query("
				SELECT YEAR(eventDate) as year FROM `events`
				where eventDate is not null
				group by year
			");

			return $query->result_array();
		}

		public function getEventMonth(){
			$query = $this->db->query("
				SELECT MONTH(eventDate) as month FROM `events`
				where eventDate is not null
				group by month
			");

			return $query->result_array();
		}
		
		public function getEventDay(){
			$query = $this->db->query("
				SELECT DAY(eventDate) as day FROM `events`
				where eventDate is not null
				group by day
			");

			return $query->result_array();
		}
		

		//end of calendar queries
		
		public function addNewDecor($name, $color, $type, $themeID){
			$data = array(
				'decorName' => $name,
				'color' => $color,
				'decorType' => $type,
				'themeID' => $themeID
			);
			$this->db->insert('decors', $data);
			return $this->db->insert_id();
		}

		public function addNewDesign($name, $color, $type, $themeID){
			$data = array(
				'designName' => $name,
				'color' => $color,
				'designType' => $type,
				'themeID' => $themeID
			);
			$this->db->insert('designs', $data);
			return $this->db->insert_id();
		}

		public function getDecorTypes(){
			$query = $this->db->query("SELECT DISTINCT decorType FROM decors");
			return $query->result_array();
		}

		public function getDesignTypes(){
			$query = $this->db->query("SELECT DISTINCT designType FROM designs");
			return $query->result_array();
		}

		public function getDecorEnum(){
			$query = $this->db->query("show columns from decors where Field like 'decorType'")->row(0)->Type;
			preg_match("/^enum\(\'(.*)\'\)$/", $query, $vals);
		    $enum = explode("','", $vals[1]);
		    return $enum;
		}

		public function getDesignEnum(){
			$query = $this->db->query("show columns from designs where Field like 'designType'")->row(0)->Type;
			preg_match("/^enum\(\'(.*)\'\)$/", $query, $vals);
		    $enum = explode("','", $vals[1]);
		    return $enum;
		}

		public function addDecType($enumVals, $newEnum){
			// ALTER TABLE decors MODIFY COLUMN decorType enum('utensils', 'furnishing', 'trinkets', 'new_value') NOT NULL AFTER decorImage
			$enumString = "'" . implode("', '", $enumVals) . "'";
			$newEnumString = "'" . $newEnum . "'";
			$this->db->query("ALTER TABLE decors MODIFY COLUMN decorType enum($enumString, $newEnumString)");
		}

		public function addDesType($enumVals, $newEnum){
			$enumString = "'" . implode("', '", $enumVals) . "'";
			$newEnumString = "'" . $newEnum . "'";
			$this->db->query("ALTER TABLE designs MODIFY COLUMN designType enum($enumString, $newEnumString)");
 		}

		public function getThemeName($themeID){
			$this->db->select('*');
			$this->db->from('theme');
			$this->db->where('themeID', $themeID);

			$query = $this->db->get();
			
			return $query->row_array();
		}
	

		public function getDecorID(){
			$query = $this->db->query('SELECT decorsID FROM decors');
			return $query->result_array();
		}

		public function currentEventNum($id){
			$this->db->select('count(eventID) as count');
			$this->db->from('events');
			$this->db->where('employeeID', $id);
			$this->db->where('eventStatus', "on-going");
			$this->db->or_where('eventStatus', "new");

			$query = $this->db->get();
			return $query->row();
		}

		public function doneEventNum($id){
			$this->db->select('count(eventID) as count');
			$this->db->from('events');
			$this->db->where('employeeID', $id);
			$this->db->where('eventStatus', "finished");

			$query = $this->db->get();
			return $query->row();
		}

		public function allTransacNum($id){
			$this->db->select('count(transactionID) as count');
			$this->db->from('transactions');
			$this->db->where('employeeID', $id);

			$query = $this->db->get();
			return $query->row();
		}

		public function validateBalance($id){
			$totalAmount = $this->totalAmount($id);
			$totalPayments = $this->totalAmountPaid($id);

			if($totalAmount->totalAmount > $totalPayments->total){
				return true;
			}else{
				return false;
			}
		}

		public function validateEventDate($id, $date){
			$query = $this->db->query("
				SELECT *
				FROM events
				WHERE eventID = $id and eventDate > '$date'
			");

			if(empty($query->row())){
				return true;
			}else{
				return false;
			}
		}

		public function eventDateValidate($date, $id){
			$query = $this->db->query("
				SELECT *
				FROM events
				WHERE eventID = $id and dateAssisted <= '$date'
			");

			if (!empty($query->row())) {
				return true;
			}else{
				return false;
			}
		}

		public function addNewEventDecor($eventID, $decID){
			$data = array(
				'eventID' => $eventID,
				'decorID' => $decID
			);
			$this->db->insert('eventdecors', $data);
		}

		public function addNewEventDesign($eventID, $desID){
			$data = array(
				'eventID' => $eventID,
				'designID' => $desID
			);
			$this->db->insert('eventdesigns', $data);
		}

		public function updtDecorQty($eventID, $decorID, $qty){
			$data = array(
				'quantity' => $qty
			);
			$this->db->where('eventID', $eventID);
			$this->db->where('decorID', $decorID);
			$this->db->update('eventdecors', $data);
		}

		public function updtDesignQty($eventID, $designID, $qty){
			$data = array(
				'quantity' => $qty
			);
			$this->db->where('eventID', $eventID);
			$this->db->where('designID', $designID);
			$this->db->update('eventdesigns', $data);
		}
	}
 ?>