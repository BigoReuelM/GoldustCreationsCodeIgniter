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

#butt4 {
  margin-right: 10px;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="box-header">
                <div class="row">
                  <div class="col-md-9">
                     <h3>Services</h3>
                  </div>
                  <div class="col-md-3">
                    <button href="addEvent.php" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#adserv" >Add Service</button>  
                  </div>
                </div>
                
             </div>
    </section>
    <section class="content container-fluid">
      <!-- Modal for Add Services -->
      <div class="modal fade" id="adserv" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Service</h4>
        </div>
        <div class="modal-body">
          <div class="container" id="con1">
              <form action="/action_page.php">
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Type</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="fname" name="firstname" placeholder="Type">
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Description</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="fname" name="firstname" placeholder="Description">
                  </div>
                </div>
              </form>
          </div>
        </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      </div>
      </div>
      <!-- End of modal -->
    <h2>   Active Services</h2>
    <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
                <table id="rentalService" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Descriptions</th>
                      <th id="tietch">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Gown</td>
                      <td>Rental of Gowns</td>
                      <td id="tietch">
                       <a href="#">
                          <button type="button" class="btn btn-danger" id="butt4">Remove</button>
                          <button type="button" class="btn btn-primary" id="butt4">Deactivate</button>
                    </tr>
                    <tr>
                      <td>Accessories</td>
                      <td>Rental of Accessories</td>
                      <td id="tietch">
                <a href="#">
                   <button type="button" class="btn btn-danger" id="butt4">Remove</button>
                   <button type="button" class="btn btn-primary" id="butt4">Deactivate</button>
                </a>
                </td>
                    </tr>
                    <tr>
                      <td>Make-Up</td>
                      <td>Make-Up Services</td>
                      <td id="tietch">
                <a href="#">
                   <button type="button" class="btn btn-danger" id="butt4">Remove</button>
                   <button type="button" class="btn btn-primary" id="butt4">Deactivate</button>
                </a>
                </td>
                    </tr>

                    <!--
                    <tr>
                        <div class="col-md-3 col-sm-4"><a data-toggle="modal" data-target="#modal-danger"><i class="fa fa-fw fa-check"></i></a></div>
                        <div class="col-md-3 col-sm-4"><a href="eventDetails.php"><i class="fa fa-fw fa-info"></i></a></div>
                      </td>
                    </tr>
                  -->
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <h2>   Deactivated Services</h2>
     <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
                <table id="rentalService" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Descriptions</th>
                      <th id="tietch">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Gown</td>
                      <td>Rental of Gowns</td>
                      <td id="tietch">
                       <a href="#">
                          <button type="button" class="btn btn-danger" id="butt4">Remove</button>
                          <button type="button" class="btn btn-primary" id="butt4">Activate</button>
                      </a>

                </td>
                    </tr>
                    <tr>
                      <td>Accessories</td>
                      <td>Rental of Accessories</td>
                      <td id="tietch">
                <a href="#">
                    <button type="button" class="btn btn-danger" id="butt4">Remove</button>
                    <button type="button" class="btn btn-primary" id="butt4">Activate</button>
                </a>
                </td>
                    </tr>
                    <tr>
                      <td>Make-Up</td>
                      <td>Make-Up Services</td>
                      <td id="tietch">
                <a href="#">
                    <button type="button" class="btn btn-danger" id="butt4">Remove</button>
                    <button type="button" class="btn btn-primary" id="butt4">Activate</button>
                </a>
                </td>
                    </tr>

                    <!--
                    <tr>
                        <div class="col-md-3 col-sm-4"><a data-toggle="modal" data-target="#modal-danger"><i class="fa fa-fw fa-check"></i></a></div>
                        <div class="col-md-3 col-sm-4"><a href="eventDetails.php"><i class="fa fa-fw fa-info"></i></a></div>
                      </td>
                    </tr>
                  -->
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
         </section>
    <!-- Main content -->
    
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
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>