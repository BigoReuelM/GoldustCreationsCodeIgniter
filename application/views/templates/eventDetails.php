
<?php
$employeeRole = $this->session->userdata('role');
if ($employeeRole === 'handler') {
  echo'<div class="content-wrapper">';
}
if (!$this->session->has_userdata('currentEventID')) {
  echo "wala laman";
}else{
  $id = $this->session->userdata('currentEventID');
  echo $id;
}
//echo $id;
?>
<!-- Content Header (Page header) -->

<div class="row">
  <div class="col-lg-4">
    <section class="content-header">
     <h1>
       Event Details
     </h1>
     </section>
   </div>
   <div class="col-lg-2">
     <button style="margin-left: 338%; margin-top: 5%" type="button" class="btn btn-block btn-primary btn-lg">Print Event Details</button>
   </div>
 </div>



<!-- Main content -->
<section class="content container-fluid">
  <div class="row">
    <div class="col-lg-6">
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
    </div>
    <div class="col-lg-6">
      <div class="form-group">

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
        <label>Package Availed</label>
        <label style="margin-left: 53%">Motiff</label>
        <div class="row">
          <div class="col-lg-4">
            <div class="form-group">
              <span class="radio"><label><input type="radio" id="event-time" value="full-Package">Full Package</label></span>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <span class="radio"><label><input type="radio" id="event-time" value="semi-Package">Semi Package</label></span>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <input type="color" id="motiff" class="form-control">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-tittle">Services</h3>
        </div>
        <div class="box-body">
          <table id="serviceTable" class="table table-striped table-bordered">
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
            <tfoot>
              <tr>
                <td><button type="button" class="btn btn-primary">Add Services</button></td>
              </tr>
            </tfoot>
          </table>  
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Staff</h3>
        </div>
        <div class="box-body">
        <table id="staffTable" class="table table-bordered table-striped">
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
              <td>
                <form>
                  <div class="form-group checkbox">
                    <label><input type="checkbox" id="" value="gowns">Nemo Kamo</label>
                  </div>
                </form>
              </td>
              <td>Makeup Artist</td>
              <td>09876541234</td>
              <td>Available</td>
            </tr>
            <td>
              <form>
                <div class="form-group checkbox">
                  <label><input type="checkbox" id="" value="makeup">Kame Wave</label>
                </div>
              </form>
            </td> 
            <td>Costume Designer</td>
            <td>09291387121</td>
            <td>Available</td>
          </tbody>
          <tfoot>
            <tr>
              <td><button type="button" class="btn btn-primary">Add Staff</button></td>
            </tr>
          </tfoot>
        </table>
        </div>
      </div>
    </div>
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
    })
  </script>
