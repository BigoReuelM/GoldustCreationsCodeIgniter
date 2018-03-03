
  <?php
  $employeeRole = $this->session->userdata('role');
  if ($employeeRole === 'handler') {
    echo'<div class="content-wrapper">';
   }

   $_SESSION["currentEventID"] = $id;

   echo $id;
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Details
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <button type="button" class="btn btn-block btn-primary btn-lg">Print Event Details</button>
      <div class="content">
        <div id="details" class="tab-pane">
          <form>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label>Event Name</label>
                  <input type="text" id="event-name" class="form-control">
                </div>
                <div class="form-group">
                  <label>Contact Number</label>
                  <input type="text" id="contact-number" class="form-control">
                </div>
                <div class="form-group">
                  <label>Client Name</label>
                  <input type="text" id="client-name" class="form-control">
                </div>
                <div class="form-group">
                  <label>Celebrant</label>
                  <input type="text" id="celebrant" class="form-control">
                </div>
                <div class="form-group">
                  <label>Event Date</label>
                  <input type="date" id="event-date" class="form-control">
                </div>
                <div class="form-group">
                  <label>Event Time</label>
                  <input type="time" id="event-time" class="form-control">
                </div>
                <div class="form-group">
                  <label>Event Location</label>
                  <input type="text" id="event-time" class="form-control">
                </div>
              </div>
              <div class="col-lg-8">
                <div>
                  <label>Motiff</label>
                  <input type="color" id="motiff" class="form-control">
                </div>
                <div class="form-group">
                  <label>Package Availed</label>
                  <span class="radio"><label><input type="radio" id="event-time" value="full-Package">Full Package</label></span>
                  <soan class="radio"><label><input type="radio" id="event-time" value="semi-Package">Semi Package</label></soan>
                </div>
                <div class="table-responsive">
                <table id="" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Services</th>
                      <th>Quantity</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <form>
                          <div class="form-group checkbox">
                            <label><input type="checkbox" id="" value="gowns">Gowns</label>
                          </div>
                        </form>
                      </td>
                      <td>12</td>
                      <td>35000</td>
                    </tr>
                    <td>
                      <form>
                        <div class="form-group checkbox">
                          <label><input type="checkbox" id="" value="makeup">Makeup</label>
                        </div>
                      </form>
                    </td> 
                    <td>7</td>
                    <td>10000</td> 
                  </tbody>
                </table>
              </div>
              <div class="table-responsive">
                <table id="" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Role</th>
                      <th>Contact Number</th>
                      <th>Availability</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Nemo Kamo</td>
                      <td>Makeup Artist</td>
                      <td>09876541234</td>
                      <td>Available</td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td><button type="button" class="btn btn-primary">Add</button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            </div>  
          </form>
        </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

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
