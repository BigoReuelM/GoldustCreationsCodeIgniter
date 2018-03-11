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
        New Events
      </h1>
    </section>

    <!-- Main content -->

    <section class="content container-fluid">

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
                          <button id="eventInfo" name="eventInfo" type="submit" value="<?php echo($empID) ?>">
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
    </section>
    <!-- /.content -->

    <div class="control-sidebar-bg"></div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  
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
