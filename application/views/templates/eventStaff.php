<?php 
  $empRole = $this->session->userdata('role');
 ?>
 <style type="text/css">
   #butt5 {
    width: 100px;
   }

 </style>
<!-- Main content -->
<section class="content container-fluid">


    <!--end of service col-->

    <!--start of staff col-->
    <form id="evtstaffdltform" role="form" method="post" action="<?php echo base_url('events/rmvStaff') ?>"></form>
      <div class="box box-primary">
        <div class="box-header">
          <div class="row">
            <div class="col-lg-6">
              <h3 class="box-title">Staff</h3>
            </div>
            <div class="col-lg-6">
              <button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addStaff">Add Staff </button>
            </div>
          </div>
        </div>
        <div class="box-body">
          <table id="staffTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Contact Number</th>
                <th>Action </th>
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
                      <td><input type="text" name="staffRole" placeholder="<?php echo $staff['employeeRole']; ?>" class="form-control"></td>
                      <td><?php echo $staff['contactNumber']; ?></td>
                      <td>
                        <input type="hidden" name="svcstaffid" value="<?php echo $svcstaff ?>">
                          <button class="btn btn-link" id="evtstaffdlt" name="btn" type="submit" value="rmv"> Remove <i class="fa fa-remove"></i></button>
                          <button class="btn btn-link" id="svcstfid" name="btn" type="submit" value="updt"> Update <i class="fa fa-remove"></i></button>
                      </td>
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

    <!--end staff col-->

<div class="control-sidebar-bg"></div> 
</section>
<!-- /.content-wrapper -->
  <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    
</div>



<!-- Add staff Modal -->
<div class="modal fade" role="dialog" id="addStaff">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- pwede ditu form -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Staff</h4>
      </div>
      <div class="modal-body">
        <form id="addstaffform" role="form" method="post" action="<?php echo base_url('events/addStaff') ?>">
          <table class="table table-hover table-responsive table-bordered" id="modalStaffTbl">
            <thead>
              <tr>
                <th>Name</th>
                <th>Contact Number</th>
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
                        <td><?php echo $allStaff[$j]['contactNumber'] ?></td>
                      </tr>
                <?php }else{
                        $valid = true;
                      }
                    }
                  }
                ?> 
            </tbody>            
          </table>
          <div class="modal-footer">                 
            <button class="btn btn-primary" onclick="reset_chkbx()">Reset</button>
            <button form="addstaffform" id="addstaff" name="addstaff" class="btn btn-default" type="submit">Add</button>
          </div>
        </form>
      </div>     
    </div>
  </div>
</div>
<!-- End of Add staff modal -->

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
      $('#serviceTable').DataTable()
      $('#staffTable').DataTable()
      $('#modalServcTbl').DataTable()
      $('#modalStaffTbl').DataTable()
    })

    function reset_chkbx() {
      $('input:checkbox').prop('checked', false);
    }
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
  $(".search").keyup(function () {
    var searchTerm = $(".search").val();
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });
    
  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','false');
  });

  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','true');
  });

  var jobCount = $('.results tbody tr[visible="true"]').length;
    $('.counter').text(jobCount + ' item');

  if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
      });
});
  </script>

<style>
  @media screen and (min-with: 768px){
    #add-event .modal-dialog {
      width:900px;
    }
  }

  #add-event .modal-dialog {
    width:90%;
  }

  #addServc .modal-dialog {
    width:70%;
  }

  #addStaff .modal-dialog {
    width: 70%;
  }
</style>