  
<style>
.glyphicon.glyphicon-circle-arrow-left {
  font-size: 30px;
}
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="row">
      <div class="col-lg-9">
        <a href="<?php echo base_url('admin/adminEmployees') ?>" id="icon">
          <span class="glyphicon glyphicon-circle-arrow-left" ></span>
        </a>
      </div>
    </div>  
  </section>
  <section class="content container-fluid">
    <div classs="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">About Me</h3>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" alt="User profile picture" src="<?php echo base_url('/uploads/profileImage/' . $employee->employeeID . ''); ?>" onerror="this.onerror=null;this.src='<?php echo base_url('/uploads/profileImage/default'); ?>';">
              <!-- -->
              <h3 class="profile-username text-center"><?php echo $employee->firstName . " " . $employee->midName . " " . $employee->lastName ?></h3>

              <?php if ($employee->role  === "admin"): ?>
                <p class="text-muted text-center">Admin</p>
              <?php endif ?>

              <?php if ($employee->role  === "handler"): ?>
                <p class="text-muted text-center">Event Handler</p>

                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item" id="list6">
                    <b>Events Currently Handling</b> <a class="pull-right"><?php echo $currentEventNum->count ?></a>
                  </li>
                  <li class="list-group-item" id="list6">
                    <b>Handled Events</b> <a class="pull-right"><?php echo $doneEvent->count ?></a>
                  </li>
                  <li class="list-group-item" id="list6">
                    <b>Transactions</b> <a class="pull-right"><?php echo $allTransac->count ?></a>
                  </li>
                </ul>                      
              <?php endif ?>
              <form id="changeProfilePhotoForm" action="<?php echo base_url('admin/uploadProfilePhoto') ?>" method="post" role="form" enctype="multipart/form-data" class="text-center">
                <label class="control-label">Change Profile Photo</label>
                <div class="row">                
                  <div class="col-md-6">                  
                    <input type="hidden" name="userID" value="<?php echo $employee->employeeID ?>">
                    <input type="file" name="userfile" class="text-center">
                  </div>
                  <div class="col-md-6">
                    <button form="changeProfilePhotoForm" type="submit" class="btn btn-primary pull-right">Submit</button>
                  </div>
                </div>
                 
              </form>
            </div>
          </div>
          <div class="col-md-8">
            <!-- /.box-header -->
            <div class="box-body">

              <strong><i class="fa fa-tag margin-r-5"></i> Identification Number</strong>

              <p class="text-muted"><?php echo $employee->employeeID ?></p>

              <br>

              <strong><i class="fa fa-user margin-r-5"></i> Name</strong>

              <p class="text-muted"><?php echo $employee->firstName . " " . $employee->midName . " " . $employee->lastName ?></p>

              <br>

              <strong><i class="fa fa-phone margin-r-5"> Contact Number</i></strong>
              
              <p class="text-muted"><?php echo $employee->contactNumber ?></p>

              <br>
              
              <strong><i class="fa fa-envelope-o margin-r-5"> Email</i></strong>
              
              <p class="text-muted"><?php  echo $employee->email ?></p>

              <br>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php echo $employee->address ?></p>

              <br>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="pull-right">
            <button type="button" class="btn btn-default employeeButton"  data-toggle="modal" data-target="#reset"> Reset Password</button>
            <?php if ($employee->status === "active"): ?>
              <button type="button" class="btn btn-default employeeButton"  data-toggle="modal" data-target="#disable">Disable Account</button>
            <?php endif ?>
            <?php if ($employee->status === "inactive"): ?>
              <button type="button" class="btn btn-default employeeButton"  data-toggle="modal" data-target="#enable">Enable Account</button>
            <?php endif ?>
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
<!-- Modal for disable -->
<div class="modal fade" id="disable">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Disable Account</h4>
        <div id="the-disableMessage">
          
        </div>
      </div>
      <div class="modal-body">
      <form role="form" id="disableForm" name="disableAccount" class="form-horizontal" action="<?php echo base_url('admin/disableEmployeeAccount') ?>">
        <input type="text" name="empIDDisable" id="empIDDisable" value="<?php echo $employee->employeeID ?>" hidden>
        <div class="box-body text-center">
          <h1>Disable Account of</h1>
          <h2><strong><?php echo $employee->employeeName ?></strong></h2>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button form="disableForm" type="submit" class="btn btn-primary">Disable Account</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Modal for disable -->
<div class="modal fade" id="enable">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Enable Account</h4>
        <div id="the-enableMessage">
          
        </div>
      </div>
      <div class="modal-body">
      <form role="form" id="enableForm" name="enableAccount" class="form-horizontal" action="<?php echo base_url('admin/enableEmployeeAccount') ?>">
        <input type="text" name="empIDEnable" id="empIDEnable" value="<?php echo $employee->employeeID ?>" hidden>
        <div class="box-body text-center">
          <h1>Enable Account of</h1>
          <h2><strong><?php echo $employee->employeeName ?></strong></h2>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button form="enableForm" type="submit" class="btn btn-primary">Enable Account</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
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
  $('#disableForm').submit(function(e){
    e.preventDefault();

    var employeeDetailsDisable = $(this);

    $.ajax({
      type: 'POST',
      url: employeeDetailsDisable.attr('action'),
      data: employeeDetailsDisable.serialize(),
      dataType: 'json',
      success: function(response){
        if (response.success == true) {

          $('.alert-success').remove();
          $('.alert-default').remove();

          $('#the-disableMessage').append('<div class="alert alert-success text-center">' +
          '<span class="icon fa fa-check"></span>' +
          'The account has been disabled.' +
          '</div>');

          // reset the form
          employeeDetailsDisable[0].reset();
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
  $('#enableForm').submit(function(e){
    e.preventDefault();

    var employeeDetailsEnable = $(this);

    $.ajax({
      type: 'POST',
      url: employeeDetailsEnable.attr('action'),
      data: employeeDetailsEnable.serialize(),
      dataType: 'json',
      success: function(response){
        if (response.success == true) {

          $('.alert-success').remove();
          $('.alert-default').remove();

          $('#the-enableMessage').append('<div class="alert alert-success text-center">' +
          '<span class="icon fa fa-check"></span>' +
          'The account has been enabled.' +
          '</div>');

          // reset the form
          employeeDetailsEnable[0].reset();
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

