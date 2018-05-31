

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
          <div class="well">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#attires" data-toggle="tab">Rented Attires</a></li>
              <li><a href="#items" data-toggle="tab">Rented Items</a></li>
            </ul>
          </div>
          <div class="well">
            <div class="tab-content">
              <div class="tab-pane fade in active" id="attires">
                <div class="row">
                  <div class="box">
                    <div class="box-header">
                      <h3>Event Attire Rentals</h3>
                    </div>
                    <div class="box-body">
                      <div class="table table-responsive">
                        <table class="table table-bordered table-hover text-center" id="attireRentals">
                          <thead>
                            <tr>
                              <th>Image</th>
                              <th>Attire Name</th>
                              <th>Quantity</th>
                              <th>Client Name</th>
                              <?php if ($empRole === "admin"): ?>
                               <th>Handler</th> 
                              <?php endif ?>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($eventAttireRentals as $eventAttireRental): ?>
                              <tr>
                                <td><button type="button" data-toggle="modal" data-target="#photoView" value="<?php echo $eventAttireRental['designID'] . ',' . $eventAttireRental['designType'] ?>" class="attireModalButton">view</button></td>
                                <td><?php echo $eventAttireRental['designName'] ?></td>
                                <td><?php echo $eventAttireRental['quantity'] ?></td>
                                <td><?php echo $eventAttireRental['clientName'] ?></td>
                                <?php if ($empRole === "admin"): ?>
                                  <td><?php echo $eventAttireRental['handlerName'] ?></td>
                                <?php endif ?>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="box">
                    <div class="box-header">
                      <h3>Transaction Attire Rentals</h3>
                    </div>
                    <div class="box-body">
                      <div class="table table-responsive">
                        <<table class="table table-bordered table-hover text-center" id="transactionAttireRentals">
                          <thead>
                            <tr>
                              <th>Image</th>
                              <th>Attire Name</th>
                              <th>Quantity</th>
                              <th>Client Name</th>
                              <?php if ($empRole === "admin"): ?>
                               <th>Handler</th> 
                              <?php endif ?>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($transactionAttireRentals as $transactionAttireRental): ?>
                              <tr>
                                <td><button type="button" data-toggle="modal" data-target="#photoView" value="<?php echo $transactionAttireRental['designID'] . ',' . $transactionAttireRental['designType'] ?>" class="attireModalButton">view</button></td>
                                <td><?php echo $transactionAttireRental['designName'] ?></td>
                                <td><?php echo $transactionAttireRental['quantity'] ?></td>
                                <td><?php echo $transactionAttireRental['clientName'] ?></td>
                                <?php if ($empRole === "admin"): ?>
                                  <td><?php echo $transactionAttireRental['handlerName'] ?></td>
                                <?php endif ?>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="items">
                <div class="row">
                  <div class="box">
                    <div class="box-body">
                      <div class="row">
                        <div class="col-lg-4">
                          <h1>Number of items on rent</h1>                          
                        </div>
                        <div class="col-lg-4">
                          <h1>Total number or items</h1>
                        </div>
                        <div>
                          <h1>overdue?</h1>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="box">
                    <div class="box-header">
                      <h3>Event Rentals</h3>
                    </div>
                    <div class="box-body">
                      <div class="table table-responsive">
                        <table class="table table-bordered table-hover text-center" id="itemRentals">
                          <thead>
                            <tr>
                              <th>Image</th>
                              <th>Attire Name</th>
                              <th>Quantity</th>
                              <th>Client Name</th>
                              <?php if ($empRole === "admin"): ?>
                               <th>Handler</th> 
                              <?php endif ?>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($eventItemRentals as $eventItemRental): ?>
                              <tr>
                                <td><button type="button" data-toggle="modal" data-target="#photoView" value="<?php echo $eventItemRental['decorID'] . ',' . $eventItemRental['decorType'] ?>" class="itemModalButton">view</button></td>
                                <td><?php echo $eventItemRental['decorName'] ?></td>
                                <td><?php echo $eventItemRental['quantity'] ?></td>
                                <td><?php echo $eventItemRental['clientName'] ?></td>
                                <?php if ($empRole === "admin"): ?>
                                  <td><?php echo $eventItemRental['handlerName'] ?></td>
                                <?php endif ?>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="box">
                    <div class="box-header">
                      <h3>Transaction Rentals</h3>
                    </div>
                    <div class="box-body">
                      <div class="table table-responsive">
                        <table class="table table-bordered table-hover text-center" id="transactionItemRentals">
                          <thead>
                            <tr>
                              <th>Image</th>
                              <th>Attire Name</th>
                              <th>Quantity</th>
                              <th>Client Name</th>
                              <?php if ($empRole === "admin"): ?>
                               <th>Handler</th> 
                              <?php endif ?>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($transactionItemRentals as $transactionItemRental): ?>
                              <tr>
                                <td><button type="button" data-toggle="modal" data-target="#photoView" value="<?php echo $transactionItemRental['decorID'] . ',' . $transactionItemRental['decorType'] ?>" class="itemModalButton">view</button></td>
                                <td><?php echo $transactionItemRental['decorName'] ?></td>
                                <td><?php echo $transactionItemRental['quantity'] ?></td>
                                <td><?php echo $transactionItemRental['clientName'] ?></td>
                                <?php if ($empRole === "admin"): ?>
                                  <td><?php echo $transactionItemRental['handlerName'] ?></td>
                                <?php endif ?>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
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

<div class="modal" tabindex="-1" role="dialog" id="photoView">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="" alt="image" id="rentalItemPhoto" class="galleryImgModal">      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

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
    $('#transactionAttireRentals').DataTable();
    $('#transactionItemRentals').DataTable();
  })
</script>

<script>
  $('.itemModalButton').click(function(){
    var itemInfo = $(this).val().split(',');
    $('#rentalItemPhoto').attr('src', '<?php echo base_url() ?>uploads/decors/' + itemInfo[1] + '/' + itemInfo[0]);
  });
</script>

<script>
  $('.attireModalButton').click(function(){
    var attireInfo = $(this).val().split(',');
    $('#rentalItemPhoto').attr('src', '<?php echo base_url() ?>uploads/designs/' + attireInfo[1] + '/' + attireInfo[0]);
  });
</script>