<?php
  $employeeRole = $this->session->userdata('role');
  if ($employeeRole === 'handler') {
    echo'<div class="content-wrapper">';
   }
   $eventId = $this->session->userdata('currentEventID');
   //echo $eventId;
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Decors
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="content">
       <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-lg-9">
              <h3 class="box-title">List Of Decors</h3>    
            </div>
            <div class="col-lg-3">
              <button type="button" class="btn btn-block btn-primary btn-lg" >Add New Decors</button>  
            </div>
          </div>
        </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="decorsTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Equipment ID</th>
                  <th>Event ID</th>
                  <th>Equipment Name</th>
                  <th>Quantity</th>
                  <th>Photo</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                      if(!empty($eventdecors)){
                        foreach ($eventdecors as $ed) { ?>
                        <tr>
                          <!-- Equipment ID -->
                          <td><?php echo $ed['decorID']; ?></td>
                          <!-- Event ID -->
                          <td><?php echo $ed['eventID']; ?></td>
                          <!-- Equipment Name -->
                          <td><?php echo $ed['decorName']; ?></td>
                          <!-- Quantity -->
                          <td><input class="form-control" type="text" name="" style="border: none;" placeholder="<?php echo $ed['quantity']; ?>"></td>
                          <!-- Photo -->
                          <td><?php echo '<img class = "eventDecorsImg" src="data:image/jpeg;base64,' . base64_encode( $ed['decorImage'] ) . '"/>' ?></td>
                          <!-- Action -->
                          <td>
                            <div class="col-md-3 col-sm-4"><a data-toggle="modal" data-target="#modal-danger"><i class="fa fa-fw fa-remove"></i></a></div>
                          </td>
                        </tr>
                    <?php      
                        }
                      }
                    ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        </section>  
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

<script>
  $(function () {
    $('#designTable').DataTable({
    })
    $('#decorsTable').DataTable({
    })
  })
</script>