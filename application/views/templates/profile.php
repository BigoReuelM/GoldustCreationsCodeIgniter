<style type="text/css">
  #list6 {
  width:260px;
  margin-left:40%;
  padding-top: 15px;
}

#img5 {
  width:250px;
  height:250px;
}
</style>
<div class="content-wrapper">
  <section class="content container-fluid">
    <div classs="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Profile</h3>
            </div>
              <div class="box-body box-profile">
              <div id="the-message">
                  
                </div>         
                <div class="col-lg-12">               
                  <div class="form-group">
                    <img class="profile-user-img img-responsive img-circle" id="img5"  alt="User profile picture" src="data:image/jpeg;base64, <?php echo base64_encode($employee->photo); ?>">
                    <!-- -->

                    <h3 class="profile-username text-center"></h3>

                    <?php if ($this->session->userdata('role')  === "admin"): ?>
                      <p class="text-muted text-center">Admin</p>
                    <?php endif ?>

                    <?php if ($this->session->userdata('role')  === "handler"): ?>
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
                    <?php endif ?>

                  </div>
                </div>
                <?php 
                  $attributes = array("name" => "updateProfile", "id" => "updateProfile", "class" => "form-horizontal");
                  echo form_open("user/updateProfile", $attributes);
                ?>
                
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Employee ID</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" placeholder="Email" value="<?php echo $employee->employeeID ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Role</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" value="<?php echo $employee->role?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" value="<?php echo $employee->status ?>" disabled>
                    </div>
                  </div>

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
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Click to Save updates</label>
                    <div class="col-lg-5">
                      <button type="submit" class="btn btn-default btn-primary form-control">Save Updates</button>
                    </div>
                  </div>
                <?php echo form_close(); ?>
              </div>
              <div class="box-footer">
                <button class="btn btn-primary" data-toggle="modal" data-target="#changeUsername">Change Username</button>
                <button class="btn btn-primary"  data-toggle="modal" data-target="#changePass">Change Password</button>
              </div>     
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="control-sidebar-bg"></div>
</div>

<!-- charges pasword Modal -->
<div class="modal fade" id="changePass" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Additional Charges</h4>
          <div id="pass-message">
          
          </div>
        </div>
        <?php 
          $attributes = array("name" => "changePassword", "id" => "changePassword", "class" => "form-horizontal");
          echo form_open("user/changeUserPassword", $attributes);
        ?>
          
          <div class="modal-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Old password</label>
              <div class="col-sm-10">
                <input type="text" id="oldPassword" name="oldPassword" class="form-control" placeholder="Enter your old password..">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">New Password</label>
              <div class="col-sm-10">
                <input type="text" id="newPassword" name="newPassword" class="form-control" placeholder="Enter new password">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Confirm Password</label>
              <div class="col-sm-10">
                <input type="text" id="passConfirmation" name="passConfirmation" class="form-control" placeholder="Confirm new password">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="text" name="employeeID" value="" hidden>
            <div class="col-lg-6">
              <button type="submit" class="btn btn-block btn-primary btn-lg">Update Password</button>
            </div>
            <div class="col-lg-6">
              <button type="button" class="btn btn-block btn-default btn-lg" data-dismiss="modal">Close</button>
            </div>
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
          <h4 class="modal-title">Add Additional Charges</h4>
          <div id="username-message">
          
          </div>
        </div>
        <?php 
          $attributes = array("name" => "changeUser", "id" => "changeUser", "class" => "form-horizontal");
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
              <button type="submit" class="btn btn-block btn-primary btn-lg">Update Username</button>
            </div>
            <div class="col-lg-6">
              <button type="button" class="btn btn-block btn-default btn-lg" data-dismiss="modal">Close</button>
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
    $(function () {
      $('#adminTable').DataTable()
      $('#handlerTable').DataTable()
      $('#staffTable').DataTable()
    })
  </script>

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