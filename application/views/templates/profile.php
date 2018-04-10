
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      User Profile
    </h1>
  </section>
  <section class="content container-fluid">
    <div classs="content">
      <div class="row">
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" alt="User profile picture" src="<?php echo base_url('/uploads/profileImage/' . $employee->employeeID . ''); ?>" onerror="this.onerror=null;this.src='<?php echo base_url('/uploads/profileImage/default'); ?>';">
              <!-- -->
              <h3 class="profile-username text-center"><?php echo $employee->firstName . " " . $employee->midName . " " . $employee->lastName ?></h3>

              <?php if ($this->session->userdata('role')  === "admin"): ?>
                <p class="text-muted text-center">Admin</p>
              <?php endif ?>

              <?php if ($this->session->userdata('role')  === "handler"): ?>
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
              <form id="changeProfilePhotoForm" action="<?php echo base_url('user/uploadProfilePhoto') ?>" method="post" role="form" enctype="multipart/form-data" class="text-center">
                <label class="control-label">Change Profile Photo</label>
                <input type="hidden" name="userID" value="<?php echo $employee->employeeID ?>">
                <input type="file" name="userfile" class="text-center"> 
              </form>
            </div>
            <div class="box-footer">
              <button form="changeProfilePhotoForm" type="submit" class="btn btn-primary pull-right">Submit</button>
            </div>
          </div>
          
        </div>

        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
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
            <div class="box-footer">
              <div class="pull-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#changeUsername">Change Username</button>
                <button class="btn btn-primary"  data-toggle="modal" data-target="#changePass">Change Password</button>
                <button class="btn btn-primary"  data-toggle="modal" data-target="#editProfile">Edit Profile</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="control-sidebar-bg"></div>
</div>
<div class="modal fade" id="editProfile" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4>Update Profile Info</h4>
        <div id="the-message">
            
        </div>
      </div>
      <div class="modal-body">
        <?php 
          $attributes = array("name" => "updateProfile", "id" => "updateProfile", "class" => "form-horizontal", "autocomplete" => "off");
          echo form_open("user/updateProfile", $attributes);
        ?>
          <div class="form-group">
            <label class="col-sm-4 control-label">First Name</label>
            <div class="col-sm-5">
              <input type="text" id="fname" name="fname" class="form-control" placeholder="<?php echo $employee->firstName ?>" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Middle Name</label>
            <div class="col-sm-5">
              <input type="text" id="mname" name="mname" class="form-control" placeholder="<?php echo $employee->midName ?>" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Last Name</label>
            <div class="col-sm-5">
              <input type="text" id="lname" name="lname" class="form-control" placeholder="<?php echo $employee->lastName ?>" value="">
            </div>
          </div>  
          <div class="form-group">
            <label class="col-sm-4 control-label">Contact Number</label>
            <div class="col-sm-5">
              <input type="text" id="cNum" name="cNum" class="form-control" placeholder="<?php echo $employee->contactNumber ?>" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Email Address</label>
            <div class="col-sm-5">
              <input type="text" id="emailAdd" name="emailAdd"  class="form-control" placeholder="<?php echo $employee->email ?>" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Home Address</label>
            <div class="col-sm-5">
              <input type="text" id="homeAdd" name="homeAdd" class="form-control" placeholder="<?php echo $employee->address ?>" value="">
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>
      <div class="modal-footer">
        <button form="updateProfile" type="submit" class="btn btn-primary">Save Updates</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- charges pasword Modal -->
<div class="modal fade" id="changePass" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Your Password</h4>
          <div id="pass-message">
          
          </div>
        </div>
        <?php 
          $attributes = array("name" => "changePassword", "id" => "changePassword", "class" => "form-horizontal", "autocomplete" => "off");
          echo form_open("user/changeUserPassword", $attributes);
        ?>
          
          <div class="modal-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Old password</label>
              <div class="col-sm-10">
                <input type="password" id="oldPassword" name="oldPassword" class="form-control" placeholder="Enter old password">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">New Password</label>
              <div class="col-sm-10">
                <input type="password" id="newPassword" name="newPassword" class="form-control" placeholder="Enter new password">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Confirm Password</label>
              <div class="col-sm-10">
                <input type="password" id="passConfirmation" name="passConfirmation" class="form-control" placeholder="Confirm new password">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="text" name="employeeID" value="" hidden>
            <button type="submit" class="btn btn-primary">Update Password</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        <?php echo form_close(); ?>
      </div>   
  </div>
</div>
<!-- End of charges pasword modal -->

<!-- charges pasword Modal -->
<div class="modal fade" id="changeUsername" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Your Username</h4>
          <div id="username-message">
          
          </div>
        </div>
        <?php 
          $attributes = array("name" => "changeUser", "id" => "changeUser", "class" => "form-horizontal", "autocomplete" => "off");
          echo form_open("user/changeUserUsername", $attributes);
        ?>
          
          <div class="modal-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Current Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="<?php echo $employee->username ?>" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">New Username</label>
              <div class="col-sm-10">
                <input type="text" id="newUsername" name="newUsername" class="form-control" placeholder="Enter new username">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Confirm Username</label>
              <div class="col-sm-10">
                <input type="text" id="usernameConfirmation" name="usernameConfirmation" class="form-control" placeholder="Confirm new username">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="text" name="employeeID" value="" hidden>
            <div class="col-lg-6">
              <button type="submit" class="btn btn-primary">Update Username</button>
            </div>
            <div class="col-lg-6">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>   
  </div>
</div>
<!-- End of charges pasword modal -->


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
      $('#updateProfile').submit(function(e){
      e.preventDefault();

      var profileDetails = $(this);

      $.ajax({
        type: 'POST',
        url: profileDetails.attr('action'),
        data: profileDetails.serialize(),
        dataType: 'json',
        success: function(response){

          if (response.success == true) {
            // if success we would show message
            // and also remove the error class
            $('#the-message').append('<div class="alert alert-success text-center">' +
            '<span class="glyphicon glyphicon-ok"></span>' +
            ' Updates to profile has been saved.' +
            '</div>');

            $('.form-group').removeClass('has-error')
                  .removeClass('has-success');
            $('.text-danger').remove();
            // reset the form
            profileDetails[0].reset();
            // close the message after seconds
            $('.alert-success').delay(500).show(10, function() {
            $(this).delay(3000).hide(10, function() {
              $(this).remove();
            });
            })
          }else{
            $.each(response.messages, function(key, value) {
              var element = $('#' + key);
              
              element.closest('div.form-group')
              .removeClass('has-error')
              .addClass(value.length > 0 ? 'has-error' : 'has-success')
              .find('.text-danger')
              .remove();
              
              element.after(value);
            });
          }
        }
      });
    });

    $('#changePassword').submit(function(e){
      e.preventDefault();

      var passwordDetails = $(this);

      $.ajax({
        type: 'POST',
        url: passwordDetails.attr('action'),
        data: passwordDetails.serialize(),
        dataType: 'json',
        success: function(response){

          if (response.success == true) {
            // if success we would show message
            // and also remove the error class
            $('#pass-message').append('<div class="alert alert-success text-center">' +
            '<span class="glyphicon glyphicon-ok"></span>' +
            ' Password has been updated.' +
            '</div>');

            $('.form-group').removeClass('has-error')
                  .removeClass('has-success');
            $('.text-danger').remove();
            // reset the form
            passwordDetails[0].reset();
            // close the message after seconds
            $('.alert-success').delay(500).show(10, function() {
            $(this).delay(3000).hide(10, function() {
              $(this).remove();
            });
            })
          }else{
            $.each(response.messages, function(key, value) {
              var element = $('#' + key);
              
              element.closest('div.form-group')
              .removeClass('has-error')
              .addClass(value.length > 0 ? 'has-error' : 'has-success')
              .find('.text-danger')
              .remove();
              
              element.after(value);
            });
          }
        }
      });
    });

    $('#changeUser').submit(function(e){
      e.preventDefault();

      var username = $(this);

      $.ajax({
        type: 'POST',
        url: username.attr('action'),
        data: username.serialize(),
        dataType: 'json',
        success: function(response){

          if (response.success == true) {
            // if success we would show message
            // and also remove the error class
            $('#username-message').append('<div class="alert alert-success text-center">' +
            '<span class="glyphicon glyphicon-ok"></span>' +
            ' Username has been updated.' +
            '</div>');

            $('.form-group').removeClass('has-error')
                  .removeClass('has-success');
            $('.text-danger').remove();
            // reset the form
            username[0].reset();
            // close the message after seconds
            $('.alert-success').delay(500).show(10, function() {
            $(this).delay(3000).hide(10, function() {
              $(this).remove();
            });
            })
          }else{
            $.each(response.messages, function(key, value) {
              var element = $('#' + key);
              
              element.closest('div.form-group')
              .removeClass('has-error')
              .addClass(value.length > 0 ? 'has-error' : 'has-success')
              .find('.text-danger')
              .remove();
              
              element.after(value);
            });
          }
        }
      });
    });

    
</script>