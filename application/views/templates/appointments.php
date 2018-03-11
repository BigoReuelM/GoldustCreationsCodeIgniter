
<style type="text/css">
  input[type=text], select, textarea {
    width: 250%;
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

#fname {
  width: 250px;
}
</style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Appointments
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-lg-9">
              <h3 class="box-title">List of Appointments</h3>    
            </div>
            <div class="col-lg-3">
              <button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addappoint">Add Appointments</button>
              <!-- Modal for adding of Appointments -->
  <!-- Modal -->
    <div class="modal fade" id="addappoint" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Appointment</h4>
          </div>
          <div class="modal-body">
            <div class="container" id="con1">
          <form action="/action_page.php">
            <div class="row">
              <div class="col-25">
                <label for="lname">Client Name</label>
              </div>
              <div class="col-75">
                <input type="text" id="fname" name="lastname" placeholder="Employee Name">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Employee Name</label>
              </div>
              <div class="col-75">
                <input type="text" id="fname" name="lastname" placeholder="Contact Number">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Date</label>
              </div>
              <div class="col-75">
                <input type="date" id="fname" name="lastname" placeholder="Email">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Time</label>
              </div>
              <div class="col-75">
                <input type="time" id="fname" name="lastname" placeholder="Address">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Agenda</label>
              </div>
              <div class="col-75">
                <input type="text" id="fname" name="lastname" placeholder="Address">
              </div>
            </div>
          </form>
        </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
              <!-- End of Modal -->  
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="designTable" class="table table-bordered table-striped text-center">
            <thead>
            <tr>
              <th>Date</th>
              <th>Time</th>
              <th>Agenda</th>
              <th>Event Name</th>
              <th>Handler</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
    
                </td>
              </tr>
            </tbody>
          </table>
        </div>
            <!-- /.box-body -->
      </div>
    </section>
    <!-- /.content -->
  </div>
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
    $('#designTable').DataTable({
    })
    $('#entourageTable').DataTable({
    })
    $('#entourageTableEdit').DataTable({
    })
  })
</script>
<style>
  @media screen and (min-with: 768px){
    #editEntourage .modal-dialog {
      with:900px;
    }
  }

  #editEntourage .modal-dialog {
    width:90%;
  }
    @media screen and (min-with: 768px){
    #addEntourage .modal-dialog {
      with:950px;
    }
  }

  #addEntourage .modal-dialog {
    width:95%;
  }

  #lname {
    width: 70px;
  }

  #butt1 {
    float:right;
    width:250px;
  }
</style>