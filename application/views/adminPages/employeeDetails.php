
<style>
.glyphicon.glyphicon-circle-arrow-left {
  font-size: 30px;
}

#in5 {
  border-radius: 5px;
}
#img5 {
  width:250px;
  height:250px;
}

#list6 {
  width:260px;
  margin-left:40%;
  padding-top: 15px;
}


#respass {
  width: 400px;
  margin-left:35%;
  padding-top: 15px;
  background: #3c8dbc;
}
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="row">
      <div class="col-lg-9">
        <a href="<?php echo base_url('admin/adminEmployeeManagement') ?>" id="icon">
          <span class="glyphicon glyphicon-circle-arrow-left" ></span>
        </a>
      </div>
    </div>  
  </section>
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
                <div class="col-lg-12">               
                  <div class="form-group">
                    <img class="profile-user-img img-responsive img-circle" id="img5" alt="User profile picture" src="data:image/jpeg;base64, <?php echo base64_encode($employee->photo); ?>">

                    <!-- -->

                    <h3 class="profile-username text-center"></h3>

                    <p class="text-muted text-center">Event Handler</p>
                    <ul class="list-group list-group-unbordered">
                      <li class="list-group-item" id="list6">
                        <b>Handled Events</b> <a class="pull-right">1,322</a>
                      </li>
                      <li class="list-group-item" id="list6">
                        <b>Events Currently Handling</b> <a class="pull-right">50</a>
                      </li>
                      <li class="list-group-item" id="list6">
                        <b>Transactions</b> <a class="pull-right">543</a>
                      </li>
                    </ul>
                  </div>
                  <div class="form-group">
                    <button type="button" class="btn btn-block btn-default"  data-toggle="modal" data-target="#reset" id="respass"> Reset Password</button>\
                    <!-- Modal for reset password -->
                    <div class="modal fade" id="reset">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Reset Password</h4>
                          </div>
                          <div class="modal-body">
                          <form class="form-horizontal" action="/action_page.php">
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="email">Username</label>
                              <div class="col-sm-10">
                                <input type="email" readonly class="form-control" id="staticEmail" placeholder="001Handler" placeholder="001Handler">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="pwd">New Password:</label>
                              <div class="col-sm-10"> 
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                              </div>
                            </div>
                          </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Reset</button>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                    <!-- End of modal -->
                  </div>
                </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Employee ID</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" placeholder="Email" value="<?php echo $employee->employeeID ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Name</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" placeholder="Email" value="<?php echo $employee->employeeName ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Contact Number</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" placeholder="Email" value="<?php echo $employee->contactNumber ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Email Address</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" placeholder="Email" value="<?php echo $employee->email ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Home Address</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" placeholder="Email" value="<?php echo $employee->address ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Role</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" placeholder="Email" value="<?php echo $employee->role?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" placeholder="Email" value="<?php echo $employee->status ?>" disabled>
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