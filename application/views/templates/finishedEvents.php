<?php
  $employeeRole = $this->session->userdata('role');
  if ($employeeRole === 'handler') {
    echo'<div class="content-wrapper">';
   }
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Finished Events
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      
          <div class="box">
            <div class="box-body">
                <div  class="table table-responsive">
                  <table id ="example1" class="table table-bordered table-hover table-condensed text-center">
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
                            <div class="col-md-3 col-sm-4">
                              <form role="form" method="post" action="<?php echo base_url('events/setEventID') ?>">
                                <button id="eventInfo" name="eventInfo" type="submit" value="<?php echo($empID) ?>">
                                  <i class="fa fa-fw fa-info"></i>
                                </button>  
                              </form>
                            </div>
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
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

