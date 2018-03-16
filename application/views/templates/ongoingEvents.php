<!-- Content Wrapper. Contains page content -->
<?php
  //$employeeRole = $this->session->userdata('role');
  //if ($employeeRole === 'admin') {
    //echo'<div class="content-wrapper">';
   //}
  //$eventId = $this->session->userdata('currentEventID'); 
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ongoing Events
      </h1>
    </section>

    <!-- Main content -->

    <section class="content container-fluid">
      <!--
      <?php
        $employeeRole = $this->session->userdata('role');
        if ($employeeRole === 'handler') {
          echo'<button class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#add-event">Add Event</button>';
         }
      ?>
    -->

      <!-- Data table of ongoing events -->
        <div class="box">
            <div class="box-body">
                <div  class="table table-responsive">
                  <table id ="eventTable" class="table table-bordered table-condensed table-hover text-center">
                    <thead>
                      <tr>
                        <th>Event Name</th>
                        <th>Client Name</th>
                        <th>Event Type</th>
                        <th>Package Type</th>
                        <th>Event Date</th>
                        <th>Event Time</th>
                        <th>Event Location</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      if(!empty($events)){
                      foreach ($events as $event) {
                      $empID = $event['eventID'];
                      $clientID = $event['clientID'];
                     ?>
                      
                        <tr>
                          <td><?php echo $event['eventName']; ?></td>
                          <td><?php echo $event['clientName']; ?></td>
                          <td><?php echo $event['eventType']; ?></td>
                          <td><?php echo $event['packageType']; ?></td>
                          <td><?php echo $event['eventDate']; ?></td>
                          <td><?php echo $event['eventTime']; ?></td>
                          <td><?php echo $event['eventLocation']; ?></td>
                          <td>
                            <!--
                              Bellow is the code for displaying the event details page.

                              A form is used to be able to pass the current value of the 
                              button clicked to the server. 

                              Only when the value is posted to the server can it be accesed
                              by php. We can now store the current ID to the session.

                              events/setEventID is called in order to store the current id to the session.
                                  *setEventID is a function located at the Event controller.

                              Value of button with id eventInfo is set by using the value attribute..
                              everytime a table row is printed.. the value of employe id in that row will
                              be set as the value of the value atribute..

    
                            -->

                            <form role="form" method="post" action="<?php echo base_url('events/setEventID') ?>">
                              <input type="hidden" name="clientID" value="<?php echo($clientID) ?>">
                              <button class="btn btn-block" id="eventInfo" name="eventInfo" type="submit" value="<?php echo($empID) ?>">
                                View Info <i class="fa fa-fw fa-info"></i>
                              </button>  
                            </form>


                          </td>
                        </tr>
                    <?php }
                      }else{
                        echo "0 results";
                      }
                         ?>    
                    </tbody>
                </table>
              </div>
            </div>
          </div>
                <!-- add event modal -->
        <div id="add-event" class="modal fade bd-example-modal-lg" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <form role="form" method="post" action="<?php echo base_url('events/addEvent'); ?>">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Event</h4>
              </div>
              <div class="modal-body">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Event Name</label>
                        <input type="text" name="event-name" class="form-control">
                      </div>
                    
                      <div class="form-group">
                        <label>Client Name</label>
                        <input type="text" name="client-name" class="form-control">
                      </div>
                    
                      <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" name="contact-number" class="form-control">
                      </div>
                    
                      <div class="form-group">
                        <label>Event Date</label>
                        <input type="date" name="event-date" class="form-control">
                      </div>
                    
                      <div class="form-group">
                        <label>Event Time</label>
                        <input type="time" name="event-time" class="form-control">
                      </div>
                    </div>
                  
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Celebrant</label>
                        <input type="text" name="celebrant" class="form-control">
                      </div>
                    
                      <div class="form-group">
                        <label>Event Type</label>
                        <input type="text" name="event-type" class="form-control">
                      </div>
                    
                      <div class="form-group">
                        <label>Event Location</label>
                        <input type="text" name="event-loc" class="form-control">
                      </div>
                    
                      <div class="form-group">
                        <label>Package Availed</label>
                        <span class="radio"><label><input type="radio" name="package" value="full-Package">Full Package</label></span>
                        <soan class="radio"><label><input type="radio" name="package" value="semi-Package">Semi Package</label></soan>
                      </div>
                    
                      <div class="form-group">
                        <label>Motiff</label>
                        <input type="text" name="motiff" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="row">
                    <div class="col-lg-6">
                      <button type="submit" class="btn btn-block btn-success">Save</button>
                    </div>
                    <div class="col-lg-6">
                      <button type="reset" class="btn btn-block btn-danger" onclick="reset_chkbx()">Reset</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/public/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>/public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>/public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>/public/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {

    $('#svc-tbl').DataTable()
    $('#eventTable').DataTable()

  })

  function reset_chkbx() {
    $('input:checkbox').prop('checked', false);
  }

</script>

<style>
  @media screen and (min-with: 768px){
    #add-event .modal-dialog {
      with:900px;
    }
  }

  #add-event .modal-dialog {
    width:90%;
  }
</style>
