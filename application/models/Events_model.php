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
			
			$this->db->SELECT('*, concat(clients.firstName, " ", middleName, " ", clients.lastName) as clientName, concat(employees.firstName, " ", midName, " ", employees.lastName) as employeeName');
			$this->db->from('events');
			$this->db->join('clients','events.clientID = clients.clientID');
			$this->db->join('employees','events.employeeID = employees.employeeID');
			$this->db->where('events.eventStatus', $status);
			if ($role === "handler") {
				$this->db->where('events.employeeID', $employeeID);
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
			if ($role === 'admin') {
				$this->db->where('employeeID', null);
			}

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

		public function getServices(){
			$query=$this->db->query("SELECT * FROM services WHERE status like 'active'");
			return $query->result_array();
		}

		public function getDecors($eventID){
			//$eID = $this->session->userdata('employeeID');
			//$evntID = $this->session->userdata('currentEventID');
			// $this->db->select('*');
			// $this->db->from('eventdecors');
			// $this->db->join('decors', 'eventdecors.decorID = decors.decorsID');
			// //$this->db->join('events', 'eventdecors.eventID = events.eventID');
			// //$this->db->where('employeeID', $employeeID);
			// $this->db->where('eventID', $eventID);
			// $query = $this->db->get();
			// return $query->result_array();

			$query = $this->db->query("SELECT * FROM eventdecors NATURAL JOIN decors where eventID = $eventID GROUP BY color ORDER BY decorName");
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

			$this->db->select('*');
			$this->db->from('entouragedetails');
			$this->db->join('entourage', 'entouragedetails.entourageID = entourage.entourageID');
			$this->db->join('designs', 'designs.designID = entouragedetails.designID');
			$this->db->where('entourage.eventID', $currentEventID);

			$query = $this->db->get();
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
				SELECT DISTINCT employeeID, det.employeeName, det.employeeID 
				FROM (SELECT eventID, eventName, eventDate, concat(employees.firstName,' ', employees.midName,' ', employees.lastName) AS employeeName, employeeID, role, status FROM employees left join events using(employeeID) 
				WHERE role='handler'  and status='active' order by employeeName) AS det where det.eventID is null or $eventDate not between date_sub(det.eventDate, INTERVAL 5 day) and date_add(det.eventDate, INTERVAL 3 day)
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
				SELECT concat(firstName, ' ', midName, ' ', lastName) as employeeName, photo
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

		public function showAllStaff(){
			$query = $this->db->query("SELECT concat(firstName, ' ', midName, ' ', lastName) as name, role, contactNumber as num, employeeID as empId FROM employees WHERE role like '%staff'");
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


		public function insertNewEvent($clientID, $employeeID){
			$data = array(
				'clientID' => $clientID,
				'employeeID' => $employeeID
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
		public function markEventFinish($eventID){
			$data = array(
				'eventStatus' => "finished" 
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
			$this->db->insert('eventservices', $data);
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
		public function changeEvtStatus(){
			$eID = $this->session->userdata('currentEventID');
			$data = array(
				'eventStatus' => 'on-going'
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

		public function updateAttireDesign($evID, $entID, $designName){
			$evID = $this->session->userdata('$currentEventID');
			$enID = $this->session->userdata('$currentEntourageID');
			$desID = $this->session->userdata('$currentDesignID');

			$query= $this->db->query("
				SELECT designID, designName, quantity, role FROM (SELECT designID, role FROM `entouragedetails` join entourage using($enID) where eventID='$evID') AS entourage join designs using ($desID) join eventdesigns USING(currentDesignID) where eventID='$evID' group by role");
			
			return $query->result_array();
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
				SELECT * FROM themedecor JOIN decors ON themedecor.decorID = decors.decorsID WHERE themeID = $currentThemeID"
			);
			/*$this->db->select('*');
			$this->db->from('themedecor');
			$this->db->join('decors', 'themedecor.decorID = decors.decorsID');
			$this->db->where('themeID', $currentThemeID);
			$query = $this->db->get();*/
			return $query->result_array();
		}

		public function getThemeDesigns($currentThemeID){
			/*$this->db->select('*');
			$this->db->from('themedesign');
			$query = $this->db->get();
			return $query->result_array();*/
			$currentThemeID = $this->session->userdata('currentTheme');
			$query = $this->db->query("
				SELECT * FROM themedesign JOIN designs ON themedesign.designID = designs.designID WHERE themeID = $currentThemeID"
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
				'eventID' => $currentEventID,
				'themeID' => $currentThemeID
			);

			$this->db->insert('eventthemes', $data);

			return $this->db->insert_id();

		}

		public function displayEventThemeDesigns($currentThemeID, $currentEventID, $currentDesignID){
			$eventID = $this->session->userdata('currentEventID');
			$themeID = $this->session->userdata('currentThemeID');
			$designID = $this->session->userdata('currentDesignID');
			$entID = $this->session->userdata('currentEntourageID');

			$query = $this->db->query("
				SELECT eventID, themeID, designID, designName, designImage, quantity FROM (SELECT designID FROM `entouragedetails` join entourage using($entID) where eventID='$eventID') AS entourage join designs using ($designID) join eventdesigns USING(currentDesignID) join themedesign USING(designID) WHERE eventID = '$eventID'
				");
			return $query->result_array();
		}

		public function displayEventThemeDecors($currentThemeID, $currentEventID, $currentDecorID){
			$eventID = $this->session->userdata('currentEventID');
			$themeID = $this->session->userdata('currentThemeID');
			$decorID = $this->session->userdata('currentDecorID');

			/*$query = $this->db->query("
				SELECT themeID, decorID, decorName, decorImage, quantity FROM 
				");
			*/

			$query = $this->db->query("
				SELECT eventID, themeID, decorID, decorName, decorImage, decorType, color, quantity FROM (SELECT decorID FROM `eventdecors` join themedecor using($themeID) where eventID='$eventID') AS eventDecor join decors using ($decorID) join eventthemes USING($themeID) join themedecor USING($decorID) WHERE eventID = '$eventID'
			");
		}

		//The following queries is meant for the calendar

		public function getEventDetailsForCalendar(){

			$query = $this->db->query("
				SELECT YEAR(eventDate) as year, MONTH(eventDate) as month, DAY(eventDate) as day, eventID, eventName, eventTime 
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
		
		public function addNewDecor($name, $color, $type){
			$data = array(
				'decorName' => $name,
				'color' => $color,
				'decorType' => $type
			);
			$this->db->insert('decors', $data);
			return $this->db->insert_id();
		}

		public function addNewThemeDecor($themeID, $decorID){
			$data = array(
				'themeID' => $themeID,
				'decorID' => $decorID
			);
			$this->db->insert('themedecor', $data);
		}

		public function addNewDesign($name, $color, $type){
			$data = array(
				'designName' => $name,
				'color' => $color,
				'designType' => $type
			);
			$this->db->insert('designs', $data);
			return $this->db->insert_id();
		}

		public function addNewThemeDesign($themeID, $designID){
			$data = array(
				'themeID' => $themeID,
				'designID' => $designID
			);
			$this->db->insert('themedesign', $data);
		}

		public function getDecorTypes(){
			$query = $this->db->query("SELECT DISTINCT decorType FROM decors");
			return $query->result_array();
		}

		public function getDesignTypes(){
			$query = $this->db->query("SELECT DISTINCT designType FROM designs");
			return $query->result_array();
		}	

	
	}


 ?>