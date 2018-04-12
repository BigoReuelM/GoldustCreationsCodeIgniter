<!-- Content Wrapper. Contains page content -->
  <!-- jQuery 3 -->

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
                    <form role="form" action="<?php echo base_url('admin/setPersonnelID') ?>" method="post" autocomplete="off">
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
          <button type="submit" class="btn btn-default">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> 
        </div>
      <?php echo form_close() ?>
    </div>       
  </div>
</div>
<!-- Modal -->

  <script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.js"></script>

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
    $('#adminTable').DataTable();
  });
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