
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
      <h2>   Active Services</h2>
      <div class="box">
        <div class="box-body">
          <div class="table table-responsive">
            <table id="activeService" class="table table-bordered table-condensed table-hover text-center">
            <thead>
              <tr>
                <th>Service Name</th>
                <th>Descriptions</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                if (!empty($active)) {
                  foreach ($active as $a) {
                    $serviceID = $a['serviceID'];
              ?>
              <tr>
                <td><?php echo $a['serviceName']; ?></td>
                <td><?php echo $a['description']; ?></td>
                <td>
                  <form role="form" method="post" action="<?php echo base_url('admin/deactivateServiceStatus') ?>">
                    <input type="text" name="active" value="<?php echo($serviceID) ?> " hidden>
                    <button type="submit" class="btn btn-block btn-danger">Deactivate</button> 
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
     <h2>   Deactivated Services</h2>
     <div class="box">
        <div class="box-body">
          <div class="table table-responsive">
            <table id="inactiveService" class="table table-bordered table-condensed table-hover text-center">
            <thead>
              <tr>
                <th>Service Name</th>
                <th>Descriptions</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                if (!empty($inactive)) {
                  foreach ($inactive as $ia) {
                    $iID = $ia['serviceID'];
              ?>
              <tr>
                <td><?php echo $ia['serviceName']; ?></td>
                <td><?php echo $ia['description']; ?></td>
                <td>
                  <form role="form" method="post" action="<?php echo base_url('admin/activateServiceStatus') ?>">
                    <input type="text" name="inactive" value="<?php echo($iID) ?>" hidden>
                    <button type="submit" class="btn btn-block btn-primary">Activate</button>
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
    </section>

  </div>

  <div class="control-sidebar-bg"></div>

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
    $('#activeService').DataTable()
    $('#inactiveService').DataTable()
  })
</script>