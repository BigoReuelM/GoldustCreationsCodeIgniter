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
        <div class="box">
            <div class="box-body">
                <div  class="table table-responsive">
                  <table id ="example1" class="table table-bordered table-condensed table-hover text-center">
                    <thead>
                      <tr>
                        <th>Service Name</th>
                        <th>Celebrant Name</th>
                        <th>Client Name</th>
                        <th>Contact Number</th>
                      </tr>
                    </thead>
                    <tbody> 
                        <tr>
                          <?php
                            foreach ($data as $d) {?>
                              <td><?php echo $d["Service Name"]; ?></td>
                              <td><?php echo $d["Celebrant Name"]; ?></td>
                              <td><?php echo $d["Client Name"]; ?></td>
                              <td><?php echo $d["Contact Number"]; ?></td>
                          <?php  }
                          ?>
                          
                        </tr> 
                    </tbody>
                </table>
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
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
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
