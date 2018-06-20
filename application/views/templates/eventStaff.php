<style>
#staffContainer{
  height: 500px;
  overflow: scroll;
}
.popover-title {
  color: #3c8dbc;
  font-size: 15px;
}
.popover-content {
  font-size: 12px;
}
.popover{
  max-width: 30%;
}
th {
  text-align: center;
}
.tblnum {
    text-align: right;
}
</style>

<section class="content-header">
  <h1>
    Event Name:
    <?php
    $name = $eventName->eventName; 
    echo '<b>' . $name . '</b>';    
    ?>
    <div class="pull-right">
      <a href="#" data-toggle="popover" data-placement="left" data-trigger="focus" data-html="true" title="Tips:" data-content="Simply Add or Change value of input fields and click on <b>Update</b> button to make changes. <b>Remove</b> button to cancel a staff. Click <b>Reset</b> button to uncheck all chosen Staff. Click checkbox to select and <b>Add</b> button to include chosen Staff to list."><i class="fa fa-question-circle-o"></i></a></div>
    </h1>
  </section>

  <section class="content container-fluid">
    
    <div class="row">
      <?php if ($eventStatus === "on-going" || $eventStatus === "new"): ?>
        <div class="col-lg-5">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Staff</h3>
            </div>
            <div class="box-body">
              <div id="staffContainer">
                <form id="addstaffform" role="form" method="post" action="<?php echo base_url('events/addStaff') ?>">
                  <table class="table table-hover table-responsive table-bordered" id="modalStaffTbl">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Standing</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (!empty($allStaff)) {
                        $valid = true;
                        for($j = 0 ; $j < count($allStaff) ; $j++){
                          for($i = 0 ; $i < count($eventStaff) ; $i++){
                            if ($allStaff[$j]['employeeID'] == $eventStaff[$i]['empId']) {
                              $valid = false;
                            }
                          }                  
                          if($valid){      
                            ?>
                            <tr>                   
                              <td>
                                <div class="checkbox"><label><input type="checkbox" name="add_staff_chkbox[]" value="<?php echo $allStaff[$j]['employeeID'] ?>" multiple><?php echo $allStaff[$j]['employeeName'] ?></label></div>
                              </td>
                              <td class="tblnum"><?php echo $allStaff[$j]['contactNumber'] ?></td>
                              <td><?php echo $allStaff[$j]['role'] ?></td>
                            </tr>
                          <?php }else{
                            $valid = true;
                          }
                        }
                      }
                      ?> 
                    </tbody>            
                  </table>
                </form>
              </div>
            </div>
            <div class="box-footer">
              <div class="pull-right">
                <button class="btn btn-primary" onclick="reset_chkbx()">Reset</button>
                <button form="addstaffform" id="addstaff" name="addstaff" class="btn btn-default" type="submit">Add</button>
              </div>
            </div>
          </div>  
        </div>
      <?php endif ?>
      <div class="<?php if(($eventStatus === 'finished') || ($eventStatus === 'cancelled')){ echo 'col-lg-12'; }else{ echo 'col-lg-7'; } ?>">
        <form id="evtstaffdltform" role="form" method="post" action="<?php echo base_url('events/rmvStaff') ?>"></form>
        <div class="box box-primary">
          <div class="box-header">
            <div class="row">
              <div class="col-lg-6">
                <h3 class="box-title">Staff</h3>
              </div></div>
            </div>
            <div class="box-body">
              <table id="staffTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Contact Number</th>
                    <?php if ($eventStatus === 'on-going' || $eventStatus === 'new'): ?>
                      <th>Action </th>
                    <?php endif ?>
                  </tr>
                </thead>
                <tbody>
                  <?php  
                  if (!empty($eventStaff)) {
                    foreach ($eventStaff as $staff) {  
                      $svcstaff = $staff['empId'];
                      ?>
                      <tr>
                        <form role="form" action="<?php echo base_url('events/upEvtStaff') ?>" method="post" id="staff_form">
                          <td><?php echo $staff['name']; ?></td>
                          <td>
                            <?php
                            if ($eventStatus === "finished" || $eventStatus === "cancelled") { ?>
                              <input type="text" name="staffRole" placeholder="<?php echo $staff['employeeRole']; ?>" class="form-control" disabled>
                            <?php  } else {
                              ?>
                              <input type="text" name="staffRole" placeholder="<?php echo $staff['employeeRole']; ?>" class="form-control">
                            <?php } ?>
                          </td>
                          <td class="tblnum"><?php echo $staff['contactNumber']; ?></td>
                          <?php if ($eventStatus === 'on-going' || $eventStatus === 'new'): ?>
                            <td>
                              <input type="hidden" name="svcstaffid" value="<?php echo $svcstaff ?>">
                              <div class="row">
                                <div class="col-md-6">
                                  <button class="btn btn-link" id="evtstaffdlt" name="btn" type="submit" value="rmv"> Remove <i class="fa fa-remove"></i></button>
                                </div>
                                <div class="col-md-6">
                                  <button class="btn btn-link" id="svcstfid" name="btn" type="submit" value="updt"> Update <i class="glyphicon glyphicon-edit"></i></button>
                                </div>
                              </div>
                            </td>
                          <?php endif ?>
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
      
      <div class="control-sidebar-bg"></div> 
    </section>
    <!-- /.content-wrapper -->
  <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    
  </div>


  <!-- REQUIRED JS SCRIPTS -->
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
      $('#staffTable').DataTable()
      $('#modalStaffTbl').DataTable({
        'paging'      : false,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      })
    })

    function reset_chkbx() {
      $('input:checkbox').prop('checked', false);
    }
  </script>

  <script>
    $(document).ready(function(){
      $('[data-toggle="popover"]').popover();   
    });
  </script>


