<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="row">
      <div class="col-lg-9">
        <h1>
          Employees
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
          <h3 class="box-title">Admin Table</h3>
        </div>
        <div class="box-body">
          <div class="table table-responsive">
            <table id="adminTable" class="table table-bordered table-condensed table-hover">
              <thead>
                <tr>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Contact Number</th>
                  <th>Role</th>
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
                  <td><?php echo $a['employeeID'] ?></td>
                  <td><?php echo $a['employeeName'] ?></td>
                  <td><?php echo $a['address'] ?></td>
                  <td><?php echo $a['email'] ?></td>
                  <td><?php echo $a['contactNumber'] ?></td>
                  <td><?php echo $a['role'] ?></td>
                  <td>                   
                    <form role="form" action="<?php echo base_url('admin/employeeDetails') ?>" method="post">
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
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Handler Table</h3>
        </div>

        <div class="box-body">
          <div class="table table-responsive">
            <table id="handlerTable" class="table table-bordered table-condensed table-hover">
              <thead>
                <tr>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Contact Number</th>
                  <th>Role</th>
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
                  <td><?php echo $h['address'] ?></td>
                  <td><?php echo $h['email'] ?></td>
                  <td><?php echo $h['contactNumber'] ?></td>
                  <td><?php echo $h['role'] ?></td>
                  <td>
                    <form role="form" action="<?php echo base_url('admin/employeeDetails') ?>" method="post">
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
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Staff Table</h3>
        </div>
    
        <div class="box-body">
          <div class="table table-responsive">
            <table id="staffTable" class="table table-bordered table-condensed table-hover">
              <thead>
                <tr>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Contact Number</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if (!empty($staff)) {               
                    foreach ($staff as $s) {
                      $staffID = $s['employeeID'];
                ?>
                <tr>
                  <td><?php echo $s['employeeID'] ?></td>
                  <td><?php echo $s['employeeName'] ?></td>
                  <td><?php echo $s['address'] ?></td>
                  <td><?php echo $s['email'] ?></td>
                  <td><?php echo $s['contactNumber'] ?></td>
                  <td><?php echo $s['role'] ?></td>
                  <td>
                    <form role="form" action="<?php echo base_url('admin/employeeDetails') ?>" method="post">
                      <input type="text" name="employeeID" value="<?php echo $staffID ?>" hidden>
                      <button class="btn btn-block btn-default" id="butt5" type="submit"> View Info
                        <i class="fa fa-fw fa-info"></i>
                      </button>
                    </form> 
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
        $attributes = array("name" => "addEmployee", "id" => "addEmployee");
        echo form_open("admin/addEmployee", $attributes);
      ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Employee</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="row">
                <div class="col-sm-4">
                  <label class="control-label">First Name</label>
                </div>
                <div class="col-sm-4">
                  <label class="control-label">Middle Name</label>
                </div>
                <div class="col-sm-4"> 
                  <label class="control-label">Last Name</label>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name ... ">
                </div>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Enter Middle Name ... ">
                </div>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name ... ">
                </div>
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
            <div class="form-group">
              <label class="col-sm-5 control-label" for="exampleInputFile">Select Employee Image</label>
              <div class="col-sm-7">
                <input type="file" name="employeeImage" id="js-upload-files" multiple>
              </div>
            </div>
          </div>
        </div>
        <div id="alert-msg">
          
        </div>
        <div class="modal-footer">
          <div class="row">
            <div class="col-lg-6">
              <button id="submit" type="submit" class="btn btn-block btn-default">Add</button>
            </div>
            <div class="col-lg-6">
              <button type="button" class="btn btn-block btn-default" data-dismiss="modal">Cancel</button>
            </div>
          </div>   
        </div>
      <?php echo form_close(); ?>
    </div>       
  </div>
</div>
<!-- Modal -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.js"></script>
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

<script type="text/javascript">
  
    + function($) {
    'use strict';


    var dropZone = document.getElementById('drop-zone');
    var uploadForm = document.getElementById('js-upload-form');

    var startUpload = function(files) {
        console.log(files)
    }

    uploadForm.addEventListener('submit', function(e) {
        var uploadFiles = document.getElementById('js-upload-files').files;
        e.preventDefault()

        startUpload(uploadFiles)
    })

    dropZone.ondrop = function(e) {
        e.preventDefault();
        this.className = 'upload-drop-zone';

        startUpload(e.dataTransfer.files)
    }

    dropZone.ondragover = function() {
        this.className = 'upload-drop-zone drop';
        return false;
    }

    dropZone.ondragleave = function() {
        this.className = 'upload-drop-zone';
        return false;
    }

}
</script>
<script>
  //$(function(){
    $('#submit').click(function(event){
      event.preventDefault();
      var fname = $('#firstname').val();
      var mname = $('#middlename').val();
      var lname = $('#lastname').val();
      var cNumber = $('#cNumber').val();
      var email = $('#email').val();
      var address = $('#address').val();
      var role = $('#role').val();
      var image = $('#js-upload-files').val();

      $event.ajax({
        type: 'POST',
        url: <?php  echo base_url('admin/addEmployee') ?>,
        data: {
          'fname': fname,
          'mname': mname,
          'lname': lname,
          'cNumber': cNumber,
          'email': email,
          'address': address,
          'role': role,
          'image': image
        },
        success: function(results){
          if (results == 'success') {
            $('#alert-msg').html('<div class="alert alert-success text-center">Employee Was added successfully!</div>');
          }else{
            $('#alert-msg').html('<div class="alert alert-danger">' + results + '</div>');
          }
        }
      });
      return false;
    });
  //});
</script>