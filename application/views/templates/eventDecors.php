
<?php
  $employeeRole = $this->session->userdata('role');
  if ($employeeRole === 'handler') {
    echo'<div class="content-wrapper">';
   }
   $eventId = $this->session->userdata('currentEventID');
   //echo $eventId;
?>
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Decors
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="content">
       <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-lg-9">
              <h3 class="box-title">List Of Decors</h3>    
            </div>
            <div class="col-lg-3">
              <button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Add New Decors </button>
              <!-- Add new decors -->
              <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <p>Some text in the modal.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
  
              <!-- End -->
            </div>
          </div>
        </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="decorsTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Equipment ID</th>
                  <th>Event ID</th>
                  <th>Equipment Name</th>
                  <th>Quantity</th>
                  <th>Photo</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                      if(!empty($eventdecors)){
                        foreach ($eventdecors as $ed) { ?>
                        <tr>
                          <!-- Equipment ID -->
                          <td><?php echo $ed['decorID']; ?></td>
                          <!-- Event ID -->
                          <td><?php echo $ed['eventID']; ?></td>
                          <!-- Equipment Name -->
                          <td><?php echo $ed['decorName']; ?></td>
                          <!-- Quantity -->
                          <td><input class="form-control" type="text" name="" style="border: none;" placeholder="<?php echo $ed['quantity']; ?>"></td>
                          <!-- Photo -->
                          <td><?php echo '<img class = "eventDecorsImg" src="data:image/jpeg;base64,' . base64_encode( $ed['decorImage'] ) . '"/>' ?></td>
                          <!-- Action -->
                          <td>
                            <div class="col-md-3 col-sm-4"><a ><i class="fa fa-fw fa-remove" data-toggle="modal" data-target="#modal-danger"></i></a></div>

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
        </div>
        </section>  
  <!-- /.content-wrapper -->

  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/public/dist/js/adminlte.min.js"></script>
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

<script>
  $(function () {
    $('#designTable').DataTable({
    })
    $('#decorsTable').DataTable({
    })
  })
</script>