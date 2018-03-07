<?php
  $employeeRole = $this->session->userdata('role');
  if ($employeeRole === 'handler') {
    echo'<div class="content-wrapper">';
   }
   $eventId = $this->session->userdata('currentEventID');
   //echo $eventId;
    
    if(!$this->session->has_userdata('currentDecorID')){
      echo "awan";
    }else{
      $decorID = $this->session->userdata('currentDecorID');
      echo $decorID;
    }
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Decors
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      
       <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-lg-9">
              <h3 class="box-title">List Of Decors</h3>    
            </div>
            <div class="col-lg-3">
              <button type="button" class="btn btn-block btn-primary btn-lg" >Add New Decors</button>  
            </div>
          </div>
        </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="decorsTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Equipment ID</th>
                  <!--<th>Event ID</th>-->
                  <th>Equipment Name</th>
                  <th>Quantity</th>
                  <th>Photo</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="decTblBody">
                    <?php
                      if(!empty($eventdecors)){
                        foreach ($eventdecors as $ed) { 
                          $decID = $ed['decorID'];
                          ?>
                        <tr id="<?php echo $decID ?>">
                          <!-- Equipment ID -->
                          <td><?php echo $ed['decorID']; ?></td>
                          <!-- Event ID -->
                          <!--<td><?php //echo $ed['eventID']; ?></td>-->
                          <!-- Equipment Name -->
                          <td><?php echo $ed['decorName']; ?></td>
                          <!-- Quantity -->
                          <td><input class="form-control" type="text" name="" style="border: none;" placeholder="<?php echo $ed['quantity']; ?>"></td>
                          <!-- Photo -->
                          <td><?php echo '<img class = "eventDecorsImg" src="data:image/jpeg;base64,' . base64_encode( $ed['decorImage'] ) . '"/>' ?></td>
                          <!-- Action -->
                          <td>
                            <!--<div class="col-md-3 col-sm-4"><a data-toggle="modal" data-target="#rmvDecor"><i class="fa fa-fw fa-remove"></i></a></div>-->

                            <div class="col-md-3 col-sm-4">
                              <form role="form" method="post" action="<?php echo base_url('events/setCurrentDecorID') ?>">
                                <button class="btn-link" id="<?php echo($decID) ?>" name="decorID" type="submit" value="<?php echo($decID) ?>" onclick="rmv()"> 
                                  <i class="fa fa-fw fa-remove"></i>
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
            <!-- /.box-body -->
          </div>
        
        </section>  
      </div>
  <!-- /.content-wrapper -->

  <!-- modals... -->
  <!-- remove decor modal -->
  <div role="dialog" class="modal fade" id="rmvDecor">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Confirmation</h4>
        </div>
        <div class="modal-body">
          <p>Remove decor from this event?</p>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-danger">Remove</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/public/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
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

<script>
  $(function () {
    $('#designTable').DataTable({
    })
    $('#decorsTable').DataTable({
    })
  })

  function rmv(){
    // get index of table row
    //var i = id.parentNode.rowIndex;
    //var i = document.getElementById($decTblBody).indexOf($decId);
    //document.getElementById(decTblBody).deleteRow(i);
    var tbl = document.getElementById(decTblBody);
    var i = "<?php echo $decorID?>";
    tbl.remove(i);
  }
</script>