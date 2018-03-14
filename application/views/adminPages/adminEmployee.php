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
        <button href="addAdmin.php" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addAdmin">Add Employee</button>
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
      <form role="role" method="post" class="form-horizontal" action="<?php  echo base_url('admin/addEmployee') ?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Employee</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-3 control-label">Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="name" placeholder="Enter Employee Name ... ">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Contact Number</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="cNumber" placeholder="Enter Contact Number ... ">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Email</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="email" placeholder="email@gmail.com">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Address</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="address" placeholder="Enter Address ...">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3">Select Role</label>
              <div class="col-sm-9">
                <select name="role" class="form-control">
                  <option selected disabled hidden>Choose Role</option>
                  <option value="admin">Admin</option>
                  <option value="handler">Handler</option>
                  <option value="staff">Staff</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3" for="exampleInputFile">Select Employee Image</label>
              <div class="col-sm-9">
                <input type="file" name="employeeImage" id="js-upload-files" multiple>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="row">
            <div class="col-lg-6">
              <button type="submit" class="btn btn-block btn-default" data-toggle="modal">Save</button>
            </div>
            <div class="col-lg-6">
              <button type="button" class="btn btn-block btn-default" data-dismiss="modal">Cancel</button>
            </div>
          </div>   
        </div>
      </form>
    </div>       
  </div>
</div>
<!-- Modal -->

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