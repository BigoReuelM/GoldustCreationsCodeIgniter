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
          Admin Employees
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
            <table id="adminTable" class="table table-bordered table-condensed table-hover">
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
                  if (!empty($admin)) {
                    foreach ($admin as $a) {
                      $adminID = $a['employeeID'];
                ?>
                <tr>
                  <td><?php echo $a['employeeName'] ?></td>
                  <td><?php echo $a['email'] ?></td>
                  <td class="tblnum"><?php echo $a['contactNumber'] ?></td>
                  <td>                   
                    <form role="form" action="<?php echo base_url('admin/setPersonnelID') ?>" method="post" autocomplete="off">
                      <input type="text" name="employeeID" value="<?php echo $adminID ?>" hidden>
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

    <!-- Modal -->

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

<script>
  $(function () {
    $('#adminTable').DataTable();
  });
</script>