<!-- Content Wrapper. Contains page content -->
  <!-- jQuery 3 -->
  <script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.js"></script>
  <script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery-3.3.1.min.js"></script>
  <script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.min.js"></script>

  <section class="content-header">
    <div class="row">
      <div class="col-lg-9">
        <h1>
          Handler Employees
        </h1>
      </div>
      <div class="col-lg-3">
        <button class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addAdmin">Add Employee</button>
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
            <table id="handlerTable" class="table table-bordered table-condensed table-hover">
              <thead>
                <tr>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact Number</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if (!empty($handler)) {

                     foreach ($handler as $h) {
                      $handlerID = $h['employeeID'];
                ?>
                <tr>
                  <td><?php echo $h['employeeID'] ?></td>
                  <td><?php echo $h['employeeName'] ?></td>
                  <td><?php echo $h['email'] ?></td>
                  <td><?php echo $h['contactNumber'] ?></td>
                  <td>
                    <form role="form" action="<?php echo base_url('admin/setPersonnelID') ?>" method="post">
                      <input type="text" name="employeeID" value="<?php echo $handlerID ?>" hidden>
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
<div class="modal fade" id="addAdmin" role="dialog">
  <div class="modal-dialog">    
    <!-- Modal content-->
    <div class="modal-content">
      <?php 
        $attributes = array("name" => "addEmployee", "id" => "addEmployee", "class" => "form-horizontal", "enctype" => "multipart/form-data","autocomplete" => "off");
        echo form_open("admin/addEmployee", $attributes);
      ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Employee</h4>
        </div>
        <div id="the-message">
          
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
                <input type="text" class="form-control" id="cNumber" name="cNumber" placeholder="Enter Contact Number ... ">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="email" name="email" placeholder="email@gmail.com">
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
          <button id="submit" type="submit" class="btn btn-default">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> 
        </div>
      <?php echo form_close(); ?>
    </div>       
  </div>
</div>
<!-- Modal -->


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
  //$(function(){
    $('#addEmployee').submit(function(e){
      e.preventDefault();

      var employeeDetails = $(this);

      $.ajax({
        type: 'POST',
        url: employeeDetails.attr('action'),
        data: employeeDetails.serialize(),
        dataType: 'json',
        success: function(response){
          if (response.success == true) {
            // if success we would show message
            // and also remove the error class
            $('#the-message').append('<div class="alert alert-success text-center">' +
            '<span class="glyphicon glyphicon-ok"></span>' +
            ' New employee has been saved.' +
            '</div>');
            $('.form-group').removeClass('has-error')
                  .removeClass('has-success');
            $('.text-danger').remove();
            // reset the form
            employeeDetails[0].reset();
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
  //});
</script>