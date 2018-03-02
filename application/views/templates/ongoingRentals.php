  <!-- Content Wrapper. Contains page content -->
  <?php
    $employeeRole = $this->session->userdata('role');
    if ($employeeRole === 'handler') {
      echo'<div class="content-wrapper">';
     }
  ?>
      <!-- Content Header (Page header) -->
      <section class="content-header">
      <h1>
        Ongoing Rentals
      </h1>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">
        <div class="content">
        <div class="box">
          <div class="box-header">
              <div >
                 <h3 class="box-title">Ongoing Rentals Table</h3>
              </div>               
          </div>
            <div class="box-body">
                <div  class="table table-responsive">
                  <table id="ongoingRentals" class="table table-bordered table-condensed">
                    <thead>
                      <tr>
                        <th>Service Name</th>
                        <th>Celebrant Name</th>
                        <th>Client Name</th>
                        <th>Contact Number</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody> 
                        <tr>
                          <?php
                          if (!empty($tdata)) {

                          foreach($tdata as $d) {
                          ?>
                          <td><?php echo $d['serviceName']; ?></td>
                          <td><?php echo $d['clientName']; ?></td>
                          <td><?php echo $d['clientName']; ?></td>
                          <td><?php echo $d['contactNumber']; ?></td>
                          <td>
                                  <div class="col-md-3 col-sm-4"><a data-toggle="modal" data-target="#modal-danger"><i class="fa fa-fw fa-check"></i></a></div>
                                  <div class="col-md-3 col-sm-4"><a href="#') ?>"><i class="fa fa-fw fa-info"></i></a></div>
                          </td>
                          <?php
                          }
                          }else{
                            echo "0 result";
                          } 
                          ?>
                        </tr> 
                    </tbody>
                </table>
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
    $('#ongoingRentals').DataTable();
  })
</script>