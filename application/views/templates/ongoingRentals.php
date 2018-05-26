

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
      <h1>
        Ongoing Rentals
      </h1>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

        <div class="content">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#attires" data-toggle="tab">Rented Attires</a></li>
            <li><a href="#items" data-toggle="tab">Rented Items</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade in active" id="attires">
              <div class="row">
                <div class="col-lg-9">
                  <div class="box">
                    <div class="box-header">
                      
                    </div>
                    <div class="box-body">
                      <div class="table table-responsive">
                        <table class="table table-bordered table-hover text-center" id="attireRentals">
                          <thead>
                            <tr>
                              <th>Attire Name</th>
                              <th>Quantity</th>
                              <th>Client Name</th>
                              <?php if ($empRole === "admin"): ?>
                               <th>Handler</th> 
                              <?php endif ?>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($attireRentals as $attireRental): ?>
                              <tr>
                                <td><?php echo $attireRental['designName'] ?></td>
                                <td><?php echo $attireRental['quantity'] ?></td>
                                <td><?php echo $attireRental['clientName'] ?></td>
                                <?php if ($empRole === "admin"): ?>
                                  <td><?php echo $attireRental['handlerName'] ?></td>
                                <?php endif ?>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="well">
                    <h1>number of items on rent</h1>
                    <h1>overdue</h1>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="items">
              <div class="row">
                <div class="col-lg-9">
                  <div class="box">
                    <div class="box-header">
                      
                    </div>
                    <div class="box-body">
                      <div class="table table-responsive">
                        <table class="table table-bordered table-hover text-center" id="itemRentals">
                          <thead>
                            <tr>
                              <th>Attire Name</th>
                              <th>Quantity</th>
                              <th>Client Name</th>
                              <?php if ($empRole === "admin"): ?>
                               <th>Handler</th> 
                              <?php endif ?>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($itemRentals as $itemRental): ?>
                              <tr>
                                <td><?php echo $itemRental['decorName'] ?></td>
                                <td><?php echo $itemRental['quantity'] ?></td>
                                <td><?php echo $itemRental['clientName'] ?></td>
                                <?php if ($empRole === "admin"): ?>
                                  <td><?php echo $itemRental['handlerName'] ?></td>
                                <?php endif ?>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="well">
                    <h1>number of items on rent</h1>
                    <h1>overdue</h1>
                  </div>
                </div>
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
    $('#attireRentals').DataTable();
    $('#itemRentals').DataTable();
  })
</script>
