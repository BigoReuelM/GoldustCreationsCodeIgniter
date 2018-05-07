
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
      <h1>
        Ongoing Rentals
      </h1>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

        <div class="content">
          <div class="row">
            <div class="col-lg-3">
              <div class="well">
                <p>total number of items rented</p>
                <p>overdue rentals</p>
                <p>number of clients with rental</p>
              </div>
            </div>
            <div class="col-md-9"> 
              <div class="box">
                  <div class="box-header">
                  </div>
                <div class="box-body">
                  <div  class="table table-responsive">
                    <table id="Rentals" class="table table-bordered table-condensed">
                      <thead>
                        <tr>
                          <th>Client Name</th>
                          <th>Contact Number</th>
                          <th>Item Name</th>
                          <th>Quantity Rented</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody> 
                           
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


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
    $('#Rentals').DataTable();
    $('#Events').DataTable();
  })
</script>
