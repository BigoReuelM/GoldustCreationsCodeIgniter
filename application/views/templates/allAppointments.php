  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
        All Appointments
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">All Appointments Table</h3>
        </div>
          <!-- /.box-header -->
        <div class="box-body">
          <div  class="table table-responsive">
            <table id ="appointmentsTable" class="table table-bordered table-condensed">
              <thead>
                <tr>
                  <th>Agenda</th>
                  <?php if ($empRole === "admin"): ?>
                    <th>Handler</th>
                  <?php endif ?>
                  <th>Client</th>
                  <th>Date & Time</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php foreach ($appointments as $appointment): ?>
                    <td><?php echo $appointment['agenda'] ?></td>
                    <?php if ($empRole === "admin"): ?>
                      <td><?php echo $appointment['employeeName'] ?></td>  
                    <?php endif ?>
                    <td><?php echo $appointment['clientName'] ?></td>
                    <td><?php echo $appointment['appointmentDateAndTime'] ?></tr>
                  <?php endforeach ?>
                </tr>
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
    $('#appointmentsTable').DataTable()
  })
</script>
