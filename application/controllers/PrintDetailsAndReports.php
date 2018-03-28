<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PrintDetailsAndReports extends CI_Controller {
  
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form', 'url');
        $this->load->model('events_model');
        $this->load->library("Pdf");
    }
  
    public function create_pdf() {
        $eventID = $this->input->post('eventID');
        $clientID = null;
        $data['eventDetails'] = $this->events_model->getEventDetails($eventID, $clientID);
        $data['currentHandler'] = $this->events_model->getCurrentHandler($eventID);
        $appointmentData['appointments'] = $this->events_model->getAppointments($eventID);
        if (!empty($this->input->post('printItem[]'))) {
            foreach ($this->input->post('printItem[]') as $item) {
                if ($item === "eventDetails") {
                    $this->load->view('printViews/eventDetailsToPDF.php', $data);
                }
                if ($item === "payment") {
                    $this->load->view('printViews/eventPaymentsToPDF.php', $data);
                }
                if ($item === "entourage") {
                    $this->load->view('printViews/eventEntourageToPDF.php', $data);
                }
                if ($item === "decors") {
                    $this->load->view('printViews/eventDecorsToPDF.php', $data);
                }
                if ($item === "services") {
                    $this->load->view('printViews/eventServicesToPDF.php', $data);
                }
                if ($item === "staff") {
                    $this->load->view('printViews/eventStaffToPDF.php', $data);
                }
                if ($item === "appointments") {
                    $this->load->view('printViews/eventAppointmentsToPDF.php', $appointmentData);
                }
            }
        }
    }
}
 