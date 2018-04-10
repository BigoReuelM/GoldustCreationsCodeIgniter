<?php

/**
* 
*/
class MYPDF extends TCPDF
{
	public function Header(){
		$this->SetFont('helvetica', 'B', 20);
		$this->Cell(0, 15, 'Goldust Creations', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

	public function Footer(){
		$this->SetY(-15);
		$this->SetFont('helvetica', 'I', 8);
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// Set font
$pdf->SetFont('times', 'BI', 14);

// Add a page
// This method has several options, check the source code documentation for more information.


// Set some content to print
if (in_array("eventDetails", $printItems)) {
$pdf->AddPage('P', 'A4');
//manipulate data format
$totalAmount = number_format($eventDetails->totalAmount, 2);
$date = date_create($eventDetails->eventDate);
$eventDate = date_format($date, "M-d-Y");
$eventTime = date("g:i a", strtotime($eventDetails->eventTime));
$eventDateAndTime = $eventDate . " at " . $eventTime;

//end of data manipulation
$html = <<<EOD
	<h1> $eventDetails->eventName</h1>
	<p>Handler Name: $currentHandler->employeeName</p>
	<p>Client Name: $eventDetails->clientName</p>
	<p>Contact Number: $eventDetails->contactNumber</p>
	<p>Celebrant Name: $eventDetails->celebrantName</p>
	<p>Date Assisted: $eventDetails->dateAssisted</p>
	<p>Package Type: $eventDetails->packageType</p>
	<p>Event Location: $eventDetails->eventLocation</p>
	<p>Event Type: $eventDetails->eventType</p>
	<p>Motif: $eventDetails->motif</p>
	<p>Total: Php $totalAmount</p>
	<p>Event Date: $eventDateAndTime</p>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);	
}

//print services

if(in_array("services", $printItems)){
$pdf->AddPage('P', 'A4');

$service_tbl_header = '<table style="width: 638px;" cellspacing="0">';
$service_tbl_footer = '</table>';
$service_tbl = '';

$html = <<<EOD
	<h1> Services Availed </h1>
	<tr>
		<td style="border: 1px solid #000000; width: 150px;"> Service </td>
		<td style="border: 1px solid #000000; width: 150px;"> Quantity </td>
		<td style="border: 1px solid #000000; width: 150px;"> Amount </td>
	</tr>
EOD;

foreach ($services as $service) {
	$service_tbl .= '

		<tr>	
			<td style="border: 1px solid #000000; width: 150px;">' . $service['serviceName'] . '</td>
			<td style="border: 1px solid #000000; width: 150px;">' . $service['quantity'] . '</td>
			<td style="border: 1px solid #000000; width: 150px;">' . $service['amount'] . '</td>
		</tr>
	';
}


// Print text using writeHTMLCell()
$pdf->writeHTML($service_tbl_header . $html . $service_tbl . $service_tbl_footer, true, false, false, false, '');

}

//print Appointments
if (in_array("appointments", $printItems)) {
//print
$pdf->AddPage('P', 'A4');

$tbl_header = '<table style="width: 638px;" cellspacing="0">';
$tbl_footer = '</table>';
$tbl = '';

$html = <<<EOD
	<h1> Appointments </h1>
	<tr>
		<td style="border: 1px solid #000000; width: 150px;"> Agenda </td>
		<td style="border: 1px solid #000000; width: 150px;"> Date </td>
		<td style="border: 1px solid #000000; width: 150px;"> Time </td>
	</tr>
EOD;

foreach ($appointments as $appointment) {
	$tbl .= '
		<tr>
			
			<td style="border: 1px solid #000000; width: 150px;">' . $appointment['agenda'] . '</td>
			<td style="border: 1px solid #000000; width: 150px;">' . $appointment['date'] . '</td>
			<td style="border: 1px solid #000000; width: 150px;">' . $appointment['time'] . '</td>
		</tr>
	';
}


// Print text using writeHTMLCell()
$pdf->writeHTML($tbl_header . $html . $tbl . $tbl_footer, true, false, false, false, '');

}



if (in_array("staff", $printItems)) {
//print event staff (staff/oncall)
$pdf->AddPage('L', 'A4');
$staff_tbl_header = '<table style="width: 638px;" cellspacing="0">';
$staff_tbl_footer = '</table>';
$staff_tbl = '';

$html = <<<EOD
	<h1> Staff </h1>
	<tr>
		<td style="border: 1px solid #000000; width: 150px;"> Name </td>
		<td style="border: 1px solid #000000; width: 150px;"> Address </td>
		<td style="border: 1px solid #000000; width: 150px;"> Email </td>
		<td style="border: 1px solid #000000; width: 150px;"> Contact Number </td>
		<td style="border: 1px solid #000000; width: 150px;"> Role </td>
		<td style="border: 1px solid #000000; width: 150px;"> Employee Role </td>
	</tr>
EOD;

foreach ($eventStaff as $staff) {
	$staff_tbl .= '
	
		<tr>
			
			<td style="border: 1px solid #000000; width: 150px;">' . $staff['name'] . '</td>
			<td style="border: 1px solid #000000; width: 150px;">' . $staff['address'] . '</td>
			<td style="border: 1px solid #000000; width: 150px;">' . $staff['email'] . '</td>
			<td style="border: 1px solid #000000; width: 150px;">' . $staff['contactNumber'] . '</td>
			<td style="border: 1px solid #000000; width: 150px;">' . $staff['role'] . '</td>
			<td style="border: 1px solid #000000; width: 150px;">' . $staff['employeeRole'] . '</td>
		</tr>
	';
}


// Print text using writeHTMLCell()
$pdf->writeHTML($staff_tbl_header . $html . $staff_tbl . $staff_tbl_footer, true, false, false, false, '');

}

if (in_array("entourageAndDesigns", $printItems)) {
//print 
$pdf->AddPage('L', 'A4');
$entourage_tbl_header = '<table style="width: 638px;" cellspacing="0">';
$entourage_tbl_footer = '</table>';
$entourage_tbl = '';

$html = <<<EOD
	<h1> Entourage </h1>
	<tr>
		<td style="border: 1px solid #000000; width: 150px;"> Name </td>
		<td style="border: 1px solid #000000; width: 100px;"> Role </td>
		<td style="border: 1px solid #000000; width: 75px;"> Shoulder </td>
		<td style="border: 1px solid #000000; width: 67px;"> Chest </td>
		<td style="border: 1px solid #000000; width: 67px;"> Stomach </td>
		<td style="border: 1px solid #000000; width: 67px;"> Waist </td>
		<td style="border: 1px solid #000000; width: 67px;"> Arm Length </td>
		<td style="border: 1px solid #000000; width: 67px;"> Arm Hole </td>
		<td style="border: 1px solid #000000; width: 67px;"> Muscle </td>
		<td style="border: 1px solid #000000; width: 75px;"> Pants Length </td>
		<td style="border: 1px solid #000000; width: 67px;"> Baston </td>
		<td style="border: 1px solid #000000; width: 67px;"> Status </td>
	</tr>
EOD;

foreach ($entourage as $ent) {
	$entourage_tbl .= '
	
		<tr>
			<td style="border: 1px solid #000000; width: 150px;">' . $ent['entourageName'] . '</td>
			<td style="border: 1px solid #000000; width: 100px;">' . $ent['role'] . '</td>
			<td style="border: 1px solid #000000; width: 75px;">' . $ent['shoulder'] . '</td>
			<td style="border: 1px solid #000000; width: 67px;">' . $ent['chest'] . '</td>
			<td style="border: 1px solid #000000; width: 67px;">' . $ent['stomach'] . '</td>
			<td style="border: 1px solid #000000; width: 67px;">' . $ent['waist'] . '</td>
			<td style="border: 1px solid #000000; width: 67px;">' . $ent['armLength'] . '</td>
			<td style="border: 1px solid #000000; width: 67px;">' . $ent['armHole'] . '</td>
			<td style="border: 1px solid #000000; width: 67px;">' . $ent['muscle'] . '</td>
			<td style="border: 1px solid #000000; width: 75px;">' . $ent['pantsLength'] . '</td>
			<td style="border: 1px solid #000000; width: 67px;">' . $ent['baston'] . '</td>
			<td style="border: 1px solid #000000; width: 67px;">' . $ent['status'] . '</td>
		</tr>
	';
}


// Print text using writeHTMLCell()
$pdf->writeHTML($entourage_tbl_header . $html . $entourage_tbl . $entourage_tbl_footer, true, false, false, false, '');

}

if (in_array("entourageAndDesigns", $printItems)) {
//print 
$designs_tbl_header = '<table style="width: 638px;" cellspacing="0">';
$designs_tbl_footer = '</table>';
$designs_tbl = '';

$html = <<<EOD
	<h1> Designs </h1>
	<tr>
		<td style="border: 1px solid #000000; width: 150px;"> Design Name </td>
		<td style="border: 1px solid #000000; width: 150px;"> Design Type </td>
		<td style="border: 1px solid #000000; width: 150px;"> Color </td>
		<td style="border: 1px solid #000000; width: 150px;"> Quantity </td>
	</tr>
EOD;

foreach ($designs as $design) {
	$designs_tbl .= '
	
		<tr>
			<td style="border: 1px solid #000000; width: 150px;">' . $design['designName'] . '</td>
			<td style="border: 1px solid #000000; width: 150px;">' . $design['designType'] . '</td>
			<td style="border: 1px solid #000000; width: 150px;">' . $design['color'] . '</td>
			<td style="border: 1px solid #000000; width: 150px;">' . $design['quantity'] . '</td>
		</tr>
	';
}


// Print text using writeHTMLCell()
$pdf->writeHTML($designs_tbl_header . $html . $designs_tbl . $designs_tbl_footer, true, false, false, false, '');

}

if (in_array("decors", $printItems)) {
//print 
$pdf->AddPage('L', 'A4');

$decors_tbl_header = '<table style="width: 638px;" cellspacing="0">';
$decors_tbl_footer = '</table>';
$decors_tbl = '';

$html = <<<EOD
	<h1> Decors </h1>
	<tr>
		<td style="border: 1px solid #000000; width: 150px;"> Decor Name </td>
		<td style="border: 1px solid #000000; width: 150px;"> Decor Type </td>
		<td style="border: 1px solid #000000; width: 150px;"> Color </td>
		<td style="border: 1px solid #000000; width: 150px;"> Quantity </td>
	</tr>
EOD;

foreach ($decors as $decor) {
	$decors_tbl .= '
	
		<tr>
			<td style="border: 1px solid #000000; width: 150px;">' . $decor['decorName'] . '</td>
			<td style="border: 1px solid #000000; width: 150px;">' . $decor['decorType'] . '</td>
			<td style="border: 1px solid #000000; width: 150px;">' . $decor['color'] . '</td>
			<td style="border: 1px solid #000000; width: 150px;">' . $decor['quantity'] . '</td>

		</tr>
	';
}

// Print text using writeHTMLCell()
$pdf->writeHTML($decors_tbl_header . $html . $decors_tbl . $decors_tbl_footer, true, false, false, false, '');

}

if (in_array("payments", $printItems)) {
//print 
$pdf->AddPage('P', 'A4');
$payments_tbl_header = '<table style="width: 638px;" cellspacing="0">';
$payments_tbl_footer = '</table>';
$payments_tbl = '';

$html = <<<EOD
	<h1> Payments </h1>
	<tr>
		<td style="border: 1px solid #000000; width: 150px;"> Date </td>
		<td style="border: 1px solid #000000; width: 150px;"> time </td>
		<td style="border: 1px solid #000000; width: 150px;"> amount </td>
	</tr>
EOD;

foreach ($payments as $payment) {
	$payment_tbl .= '
	
		<tr>
			<td style="border: 1px solid #000000; width: 150px;">' . $payment['date'] . '</td>
			<td style="border: 1px solid #000000; width: 150px;">' . $payment['time'] . '</td>
			<td style="border: 1px solid #000000; width: 150px;">' . $payment['amount'] . '</td>
		</tr>
	';
}

// Print text using writeHTMLCell()
$pdf->writeHTML($payments_tbl_header . $html . $payments_tbl . $payments_tbl_footer, true, false, false, false, '');

}

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output($eventDetails->eventName . ' Event_Details.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
