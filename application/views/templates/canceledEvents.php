<?php
  $employeeRole = $this->session->userdata('role');
  //if ($employeeRole === 'admin') {
   // echo'<div class="content-wrapper">';
   //}
?>
<style type="text/css">
  #butt5 {
    width:100px;
  }
  th {
    text-align: center;
  }
  .tblnum {
    text-align: right;
  }
</style>

    <section class="content-header">
      <h1>
        Canceled Events
      </h1>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
     
          <div class="box">
            <div class="box-body">
                <div  class="table table-responsive">
                  <table id ="example1" class="table table-bordered table-condensed table-hover">
                    <thead>
                      <tr>
                        <th>Event Name</th>
                        <th>Client Name</th>
                        <th>Event Type</th>
                        <th>Event Date</th>
                        <th>Date Cancelled</th>                        
                        <th>Refunded Amount</th>
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
                          <td class="tblnum">
                            <?php
                              $date = date_create($event['eventDate']);
                              $newDate = date_format($date, "M-d-Y"); 
                              echo $newDate; 
                            ?>
                          </td>
                          <td class="tblnum">
                            <?php
                              $date = date_create($event['cancelledDate']);
                              $newDate = date_format($date, "M-d-Y"); 
                              echo $newDate; 
                            ?>
                          </td>
                          <td class="tblnum">
                            <?php
                              $refundedAmountFormated = number_format($event['refundedAmount'], 2); 
                              echo $refundedAmountFormated; 
                            ?>
                          </td>
                          <td>
                            <div class="col-md-6 col-sm-4">
                              <form role="form" method="post" action="<?php echo base_url('events/setEventID') ?>">
                                <input type="text" name="clientID" value="<?php echo $clientID ?>" hidden>
                                <button class="btn btn-block" id="butt5" name="eventInfo" type="submit" value="<?php echo($empID) ?>">View Info
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
  </div>
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
