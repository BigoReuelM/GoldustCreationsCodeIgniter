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
        $data['appointments'] = $this->events_model->getAppointments($eventID);
        $data['payments']=$this->events_model->getPayments($eventID);
        $data['services'] = $this->events_model->servcTransac($eventID);
        $data['eventStaff'] = $this->events_model->getStaff($eventID);
        $data['entourage'] = $this->events_model->getEntourage($eventID);
        //$data['paymentReceiver'] = $this->event_model->getPaymentReceiver($eventID);
        //$data['clientName'] = $this->event_model->getClientName($eventID);
        $data['printItems'] = $this->input->post('printItem[]');

        if (!empty($this->input->post('printItem[]'))) {
            $this->load->view('printViews/eventDetailsToPDF.php', $data);    
        }
    }
}
 