<div class="content-wrapper">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->


      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#employeeNav" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <ul class="nav navbar-nav navbar-centered collapse navbar-collapse" id="employeeNav">
        <li class="<?php if($pageName === 'admin'){echo 'active';} ?>">
          <a href="<?php echo base_url('admin/adminEmployees') ?>">Admin Employees</a>
        </li>
        <li class="<?php if($pageName === 'handler'){echo 'active';} ?>">
          <a href="<?php echo base_url('admin/handlerEmployees') ?>">Handler Employees</a>
        </li>
        <li class="<?php if($pageName === 'staff'){echo 'active';} ?>">
          <a href="<?php echo base_url('admin/staffEmployees') ?>">Staff</a>
        </li>
        <li class="<?php if($pageName === 'oncall'){echo 'active';} ?>">
          <a href="<?php echo base_url('admin/oncallstaffEmployees') ?>">On-call Staff</a>
        </li>
        <li class="<?php if($pageName === 'inactive'){echo 'active';} ?>">
          <a href="<?php echo base_url('admin/inactiveEmployees') ?>">Inactive Employee</a>
        </li>
        <li>
          <a href="#addEmployeeModal" data-toggle="modal" data-target="#addEmployeeModal">Add Employee</a>
        </li>
      </ul>
    </div><!-- /.container-fluid -->
  </nav>

<div class="modal fade" id="addEmployeeModal" role="dialog">
  <div class="modal-dialog">    
    <!-- Modal content-->
    <div class="modal-content">
      <?php 
        $attributes = array("name" => "addEmployee", "id" => "addEmployee", "class" => "form-horizontal", "autocomplete" => "off", "method" => "post");
        echo form_open("admin/addEmployee", $attributes);
      ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Employee</h4>
        </div>
        <div id="message">
          
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <label for="firstname" class="col-sm-3 control-label">First Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name ... ">
              </div>
            </div>
            <div class="form-group">
              <label for="middlename" class="col-sm-3 control-label">Middle Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Enter Middle Name ... ">
              </div>
            </div>
            <div class="form-group">
              <label for="lastname" class="col-sm-3 control-label">Last Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name ... ">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Contact Number</label>
              <div class="col-sm-9">
                <input type="tel" class="form-control" id="cNumber" name="cNumber" placeholder="Enter Contact Number ... ">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="email" name="email" placeholder="email@gmail.com">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Address</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address ...">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Select Role</label>
              <div class="col-sm-9">
                <select id="role" name="role" class="form-control">
                  <option selected disabled hidden>Choose Role</option>
                  <option value="admin">Admin</option>
                  <option value="handler">Handler</option>
                  <option value="staff">Staff</option>
                  <option value="on-call staff">On-call Staff</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Ok</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> 
        </div>
      <?php echo form_close() ?>
    </div>       
  </div>
</div>
<!-- Modal -->
<script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.js"></script>

<script>
   
    $('#addEmployee').submit(function(e){
      e.preventDefault();

      var empData = $(this);

      $.ajax({
        type: 'POST',
        url: empData.attr('action'),
        data: empData.serialize(),
        dataType: 'json',
        success: function(response){

          if (response.success == true) {

            window.location.href = "<?php echo base_url('admin/employeeDetails'); ?>";

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
