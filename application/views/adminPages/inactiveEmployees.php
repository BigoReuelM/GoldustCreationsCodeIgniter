<style type="text/css">
  th {
    text-align: center;
  }
  .tblnum {
    text-align: right;
  }
</style>
<!-- Content Wrapper. Contains page content -->
  <!-- jQuery 3 -->

  <section class="content-header">
    <div class="row">
      <div class="col-lg-9">
        <h1>
          Inactive Employees
        </h1>
      </div>
    </div>  
  </section>
  <section class="content container-fluid">
    <div classs="content">
      <div class="box">
        <div class="box-header">
        </div>
        <div class="box-body">
          <div class="table table-responsive">
            <table id="empTable" class="table table-bordered table-condensed table-hover">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact Number</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if (!empty($inactiveEmp)) {
                    foreach ($inactiveEmp as $emp) {
                      $empID = $emp['employeeID'];
                ?>
                <tr>
                  <td><?php echo $emp['employeeName'] ?></td>
                  <td><?php echo $emp['email'] ?></td>
                  <td class="tblnum"><?php echo $emp['contactNumber'] ?></td>
                  <td>                   
                    <form role="form" action="<?php echo base_url('admin/setPersonnelID') ?>" method="post" autocomplete="off">
                      <input type="text" name="employeeID" value="<?php echo $empID ?>" hidden>
                      <button class="btn btn-block btn-default" id="butt5" type="submit"> View Info
                        <i class="fa fa-fw fa-info"></i>
                      </button>
                    </form>          
                  </td>
                </tr>
                <?php 
                    }
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
     </div>
  </section>
  <div class="control-sidebar-bg"></div>
</div>


  <script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.js"></script>

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
    $('#empTable').DataTable();
  });
</script>