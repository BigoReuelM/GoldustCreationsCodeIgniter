  
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
  <!-- Content Wrapper. Contains page content -->
  <?php
    $employeeRole = $this->session->userdata('role');
    if ($employeeRole === 'handler') {
      echo'<div class="content-wrapper">';
     }
  ?>
      <!-- Content Header (Page header) -->
      <section class="content-header">
      <h1>
        Ongoing Rentals
      </h1>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">
        <form method="post" id="rental">
          <div id="view-rental" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">On-Going Rentals</h4>
                </div>
                <div class="modal-body">
                  <div class="container" id="con1">
          <form action="/action_page.php">
            <div class="row">
              <div class="col-25">
                <label for="lname">Date Rented</label>
              </div>
              <div class="col-75">
                <input type="date" id="fname" name="lastname" placeholder="Date Rented">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Item Name</label>
              </div>
              <div class="col-75">
                <input type="text" id="fname" name="lastname" placeholder="Item Name">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Quantity</label>
              </div>
              <div class="col-75">
                <input type="number" id="fname" name="lastname" placeholder="Quantity">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Photo</label>
              </div>
              <div class="col-75">
                <img src="">
              </div>
            </div>
          </form>
        </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
                </div>
              </div>
        </form>
        <div class="content">
          <div class="row">
          <div class="col-md-6"> 
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Rentals</h3>
                </div>
              <div class="box-body">
                <div  class="table table-responsive">
                  <table id="Rentals" class="table table-bordered table-condensed">
                    <thead>
                      <tr>
                        <th>Service Name</th>
                        <th>Client Name</th>
                        <th>Contact Number</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody> 
                        
                          <?php
                          if (!empty($tdata)) {

                          foreach($tdata as $d) {
                          ?>
                          <tr>
                          <td><?php echo $d['serviceName']; ?></td>
                          <td><?php echo $d['clientName']; ?></td>
                          <td><?php echo $d['contactNumber']; ?></td>
                          <td>
                                  <div class="col-md-3 col-sm-4"><a href="#view-rental" data-toggle="modal"><i class="fa fa-fw fa-info"></i></a></div>
                          </td>
                          </tr>
                          <?php
                          }
                          }else{
                            echo "0 result";
                          } 
                          ?>
                         
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

         <div class="col-md-6">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Event Rentals</h3>
                </div>
                <div class="box-body">
                    <div  class="table table-responsive">
                      <table id ="Events" class="table table-bordered tab le-condensed">
                        <thead>
                          <tr>
                            <th>Event Name</th>
                            <th>Client Name</th>
                            <th>Contact Number</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if(!empty($evredata)){ 
                              while ($evredata = $ed) { ?> 
                                <tr>
                                  <td><?php echo $ed['serviceName']; ?></td>
                                  <td><?php echo $ed['clientName']; ?></td>
                                  <td><?php echo $ed['contactNumber']; ?></td>
                                  <td>
                                  <div class="col-md-3 col-sm-4"><a href="#view-rental" data-toggle="modal"><i class="fa fa-fw fa-info"></i></a></div>
                                  </td>
                                </tr>
                                <?php
                                  }
                                  }else{
                                   echo "0 result";
                                  } 
                                ?>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>
      </section>


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
    $('#Rentals').DataTable();
    $('#Events').DataTable();
  })
</script>
