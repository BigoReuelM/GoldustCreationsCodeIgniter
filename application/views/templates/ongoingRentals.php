<style>
.otherInformation {
min-height: 20px;
padding: 19px;
margin-bottom: 20px;
background-color: #f5f5f5;
border: 1px solid #e3e3e3;
border-radius: 4px;
-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
}
</style>

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
          <div class="row">
          <div class="col-md-9"> 
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Rentals</h3>
                </div>
              <div class="box-body">
                <div  class="table table-responsive">
                  <table id="Rentals" class="table table-bordered table-condensed">
                    <thead>
                      <tr>
                        <th>Client Name</th>
                        <th>Contact Number</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody> 
                        
                          <?php
                          if (!empty($tdata)) {

                          foreach($tdata as $d) {
                            $transInfo = $d['transactionID'];
                          ?>
                          <tr>
                          <td><?php echo $d['clientName']; ?></td>
                          <td><?php echo $d['contactNumber']; ?></td>
                          <!--td><?php echo $d['serviceName']; ?></td-->
                          <td><?php echo $d['dateAvail']; ?></td>
                          <td>
                              <form id="updtTransactionIdForm" role="role" method="post" action="<?php echo base_url('events/updateRentDes') ?>">
                                <div class="row">
                                  <div class="col-md-6">
                                    <input type="text" name="rental_qty" style="border: none;" placeholder="<?php echo $d['quantity']; ?>" class="form-control">
                                  </div>
                          </td>
                          <td>
                            <div class="col-md-6">
                                  <button class="btn btn-link btn-block" id="updtDecorBtn" name="designID" type="submit" value="<?php echo $designID ?>"><i class="fa fa-fw fa-edit"></i> Update</button>
                            </div>
                            </form>

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

        <div class="col-md-3">
          <div class="otherInformation">
              <?php 
                  if (!empty($rentalCount)) {
                    $rentCount = $rentalCount;
                  } else {
                    $rentCount = 0;
                  }

                  if (!empty($overdueRentalCount)){
                    $overdueRent = $overdueRentalCount;
                  } else {
                    $overdueRent = 0;
                  }
              ?>

            <h4>Number of Rentals : <?php echo $rentCount ?></h4>
            <h4>Overdue Rentals : <?php echo $overdueRent ?></h4>
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
