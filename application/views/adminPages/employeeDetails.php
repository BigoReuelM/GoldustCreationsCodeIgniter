  
<style>
.glyphicon.glyphicon-circle-arrow-left {
  font-size: 30px;
}

#img5 {
  width:250px;
  height:250px;
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
                    <?php if ($employee->role === "admin"): ?>
                      <p class="text-muted text-center">Admin</p>
                    <?php endif ?>
                    <?php if ($employee->role === "handler"): ?>
                      <p class="text-muted text-center">Event Handler</p>
                    <?php endif ?>
                  </div>
                  <div class="form-group">
                    <button type="button" class="btn btn-block btn-default"  data-toggle="modal" data-target="#reset" id="respass"> Reset Password</button>
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

<!-- Modal for reset password -->
<div class="modal fade" id="reset">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Reset Password</h4>
        <div id="the-message">
          
        </div>
      </div>
      <div class="modal-body">
      <form role="form" id="resetPass" name="resetPass" class="form-horizontal" action="<?php echo base_url('admin/resetEmployeePassword') ?>">
        <input type="text" name="empID" id="empID" value="<?php echo $employee->employeeID ?>" hidden>
        <div class="box-body text-center">
          <h1>Reset Password for</h1>
          <h2><strong><?php echo $employee->employeeName ?></strong></h2>
        </div>
        <div id="the-pin" class="text-center">
          
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button form="resetPass" type="submit" class="btn btn-primary">Reset</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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
    $('#resetPass').submit(function(e){
    e.preventDefault();

    var employeeDetails = $(this);

    $.ajax({
      type: 'POST',
      url: employeeDetails.attr('action'),
      data: employeeDetails.serialize(),
      dataType: 'json',
      success: function(response){
        if (response.success == true) {

          $('.alert-success').remove();
          $('.alert-default').remove();

          $('#the-message').append('<div class="alert alert-success text-center">' +
          '<span class="icon fa fa-check"></span>' +
          'The password has been reset.' +
          '</div>');

          $('#the-pin').append('<div class="alert alert-default text-center">' +
            '<p>Pin to be given to employee for verification.</p>'+
            response.pin +
          '</div>');
          // reset the form
          employeeDetails[0].reset();
          // close the message after seconds
          $('.alert-success').delay(500).show(10, function() {
            $(this).delay(3000).hide(10, function() {
              $(this).remove();
            });
          })
        }
      }
    });
  }); 
  </script>

