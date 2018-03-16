
<div class="content-wrapper">
  <section class="content container-fluid">
    <div classs="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Profile</h3>
            </div>
            <form class="form-horizontal">
              <div class="box-body box-profile">          
                <div class="col-lg-6">               
                  <div class="form-group">
                    <img class="profile-user-img img-responsive img-circle"  alt="User profile picture" src="data:image/jpeg;base64, <?php echo base64_encode($employee->photo); ?>">

                    <!-- -->

                    <h3 class="profile-username text-center"></h3>

                    <p class="text-muted text-center">Event Handler</p>

                    <ul class="list-group list-group-unbordered">
                      <li class="list-group-item">
                        <b>Events</b> <a class="pull-right">1,322</a>
                      </li>
                      <li class="list-group-item">
                        <b>Transactions</b> <a class="pull-right">543</a>
                      </li>
                    </ul>
                  </div>
                  <div class="form-group">
                    <button type="button" class="btn btn-block btn-default"  data-toggle="modal" data-target="#reset" id="respass"> Reset Password</button>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Employee ID</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Email" value="<?php echo $employee->employeeID ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Email" value="<?php echo $employee->employeeName ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Contact Number</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Email" value="<?php echo $employee->contactNumber ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Email Address</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Email" value="<?php echo $employee->email ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Home Address</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Email" value="<?php echo $employee->address ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Role</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Email" value="<?php echo $employee->role?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Email" value="<?php echo $employee->status ?>" disabled>
                    </div>
                  </div>
                </div>     
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="control-sidebar-bg"></div>
</div>

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
      $('#adminTable').DataTable()
      $('#handlerTable').DataTable()
      $('#staffTable').DataTable()
    })
  </script>