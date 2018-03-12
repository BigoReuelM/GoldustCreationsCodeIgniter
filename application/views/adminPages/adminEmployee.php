<style type="text/css">
* {
  box-sizing: border-box;
}
#name{
 width:250%;
 padding: 12px;
 border: 1px solid #ccc;
 border-radius: 4px;
 resize: vertical;
 background-color: #E6E6E6;
}
#GovID {
  width:250%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  background-color: #E6E6E6;
}
input[type=text], select, textarea {
  width:250%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  background-color: #E6E6E6;
}

label {
  padding: 6px 6px 6px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  margin-right: 50px;
  width: 25%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

#butt5 {
 width: 100px;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media (max-width: 50px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

#con1 {
  width:100%;
  background-color: white;
}

#tab1 {
  border:1px solid #ccc;
  background-color: #E6E6E6;
}
</style>

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
                    <div class="col-md-3 col-sm-4">
                    <form role="form" action="<?php echo base_url('admin/employeeDetails') ?>" method="post">
                    <button class="btn btn-block" id="butt5" type="submit"> View Info
                    <i class="fa fa-fw fa-info"></i>
                    </button>
                    </form>
                    </div>
                 
                   
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
                    <div class="col-md-3 col-sm-4">
                    <form role="form" action="<?php echo base_url('admin/employeeDetails') ?>" method="post">
                    <button class="btn btn-block" id="butt5" type="submit"> View Info
                    <i class="fa fa-fw fa-info"></i>
                    </button>
                    </form>
                    </div>
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
                    <div class="col-md-3 col-sm-4">
                    <form role="form" action="<?php echo base_url('admin/employeeDetails') ?>" method="post">
                    <button class="btn btn-block" id="butt5" type="submit"> View Info
                    <i class="fa fa-fw fa-info"></i>
                    </button>
                    </form>
                    </div>
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
        <!-- /.content -->
</div>
                <!-- /.content-wrapper -->
  <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>

    <!-- Modal -->
<div class="modal fade" id="addAdmin" role="dialog">
  <div class="modal-dialog">    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Employee</h4>
      </div>
      <div class="modal-body">
        <div class="container" id="con1">
          <form action="/action_page.php">
            <div class="row">
              <div class="col-25">
                <label for="lname">Employee Name</label>
              </div>
              <div class="col-75">
                <input type="text" id="lname" name="lastname" placeholder="Employee Name">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Contact Number</label>
              </div>
              <div class="col-75">
                <input type="text" id="lname" name="lastname" placeholder="Contact Number">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Email</label>
              </div>
              <div class="col-75">
                <input type="text" id="lname" name="lastname" placeholder="Email">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Address</label>
              </div>
              <div class="col-75">
                <input type="text" id="lname" name="lastname" placeholder="Address">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="country">Role</label>
              </div>
              <div class="col-75">
                <select id="role" name="role">
                  <option value="Admin">Admin</option>
                  <option value="Staff">Staff</option>
                  <option value="Handler">Handler</option>
                </select>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#save">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>       
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="save" role="dialog">
  <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ALERT</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="row">
            <p>Are you sure you want to save this?</p>
            <div class="col-lg-5">
            </div>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
      </div>
    </div>
    
  </div>
</div>

<!-- /.modal -->
<div class="modal modal-danger fade" id="modal-danger">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Alert!!!</h4> 
      </div>
      <div class="modal-body">
        <p>Finish This Event?&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-outline" data-toggle="modal" data-target="#modal-success" data-dismiss="modal">Yes</button>
      </div>
    </div>
      <!-- /.modal-content -->
  </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal modal-success fade" id="modal-success">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Success</h4>
      </div>
      <div class="modal-body">
        <p>Event Successfully Finished&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
      </div>
    </div>
      <!-- /.modal-content -->
  </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal -->
<div class="modal fade" id="edits" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="row" id="row1">
            <div class="col-lg-7" id="row1">
              <div class="form-group" id="row1">
                <label>Name</label>
                <input type="text" id="staff-name" class="form-control">
              </div>
            </div>
          </div>
          <div class="row" id="row1">
            <div class="col-lg-7" id="row1">
              <div class="form-group" id="row1">
                <label>Contact Number</label>
                <input type="text" id="staff-name" class="form-control">
              </div>
            </div>
          </div>
          <div class="row" id="row1">
            <div class="col-lg-7" id="row1">
              <div class="form-group" id="row1">
                <label>Address</label>
                <input type="text" id="staff-name" class="form-control">
              </div>
            </div>
          </div>
          <div class="row" id="row1">
            <div class="col-lg-7" id="row1">
              <div class="form-group" id="row1">
                <label>Email</label>
                <input type="text" id="staff-name" class="form-control">
              </div>
            </div>
          </div>
          <div class="row" id="row1">
            <div class="col-lg-7" id="row1">
              <div class="form-group" id="row1">
                <label>Role</label>
                <input type="text" id="staff-name" class="form-control">
              </div>
            </div>
          </div>
          <div class="row" id="row1">
            <div class="col-lg-7" id="row1">
              <div class="form-group" id="row1">
                <label>Standing</label>
                <input type="text" id="staff-name" class="form-control">
              </div>
            </div>
          </div>
        </form>
      </div>
          <table id="customers">
            <tr>
              <th>ID</th>
              <th>Customer Name</th>
              <th>Events/Rental Name</th>
              <th>Date</th>

            </tr>
            <tr>
              <td>001</td>
              <td>Emmarie Cayabyab</td>
              <td>Emm-Reu Nuptial</td>
              <td>December 18, 2017</td>
            </tr>
            <tr>
              <td>009</td>
              <td>Christina Berglund</td>
              <td>Debut</td>
              <td>January 23, 2018</td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </table>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <!-- end of edit employee profile Modal -->
  </div>
</div>

        <!-- end of modal -->
  <!-- ./wrapper -->

<div class="modal fade" id="reset" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Password Reset</h4>
      </div>
      <div class="modal-body">
        <p>Change Password to DEFAULT</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
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

