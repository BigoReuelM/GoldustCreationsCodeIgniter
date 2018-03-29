<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(false);
$pdf->setFooterData(false);

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

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('helvetica', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage('P', 'A4');

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
if (in_array("eventDetails", $printItems)) {

//manipulate data format
$totalAmount = number_format($eventDetails->totalAmount, 2);
$date = date_create($eventDetails->eventDate);
$eventDate = date_format($date, "M-d-Y");
$eventTime = date("g:i a", strtotime($eventDetails->eventTime));
$eventDateAndTime = $eventDate . " at " . $eventTime;

//end of data manipulation
$html = <<<EOD
	<h1> $eventDetails->eventName</h1>
	<p> $currentHandler->employeeName</p>
	<p> $eventDetails->clientName</p>
	<p> $eventDetails->contactNumber</p>
	<p> $eventDetails->celebrantName</p>
	<p> $eventDetails->dateAssisted</p>
	<p> $eventDetails->packageType</p>
	<p> $eventDetails->eventLocation</p>
	<p> $eventDetails->eventType</p>
	<p> $eventDetails->motif</p>
	<p> Php $totalAmount</p>
	<p> $eventDateAndTime</p>
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
$pdf->writeHTML($service_tbl_header . $service_tbl . $service_tbl_footer, true, false, false, false, '');

}

//print Appointments
if (in_array("appointments", $printItems)) {
//print
$pdf->AddPage('P', 'A4');

$tbl_header = '<table style="width: 638px;" cellspacing="0">';
$tbl_footer = '</table>';
$tbl = '';

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
$pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

}



if (in_array("staff", $printItems)) {
//print event staff (staff/oncall)
$pdf->AddPage('L', 'A4');
$staff_tbl_header = '<table style="width: 638px;" cellspacing="0">';
$staff_tbl_footer = '</table>';
$staff_tbl = '';

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
$pdf->writeHTML($staff_tbl_header . $staff_tbl . $staff_tbl_footer, true, false, false, false, '');

}

if (in_array("entourageAndDesigns", $printItems)) {
//print 
$tbl_header = '<table style="width: 638px;" cellspacing="0">';
$tbl_footer = '</table>';
$tbl = '';

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
$pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

}

if (in_array("decors", $printItems)) {
//print 
$tbl_header = '<table style="width: 638px;" cellspacing="0">';
$tbl_footer = '</table>';
$tbl = '';

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
$pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

}

if (in_array("payments", $printItems)) {
//print 
$payment_tbl_header = '<table style="width: 638px;" cellspacing="0">';
$payment_tbl_footer = '</table>';
$payment_tbl = '';

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
$pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

}

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Event_Details.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
