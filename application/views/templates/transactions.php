<?php 

  $empRole = $this->session->userdata('role');
 ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
        Service Transactions
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="content">
       
         <div class="row">
          <div class="col-md-12"> 
            <div class="box">
              <div class="box-header">
                <div class="row">
                  <div class="col-md-9">
                     <h3 class="box-title">Service Transactions Table</h3>
                  </div>
                  <div class="col-md-3">
                    <?php 
                      if ($empRole === "admin") {
                        echo '<button class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addServiceTransaction">Add Transaction</button>  ';
                      }

                     ?>
                    
                  </div>
                </div>
                
             </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div  class="table table-responsive">
                      <table id ="rentalTable" class="table table-bordered table-condensed">
                        <thead>
                          <tr>
                            <th>Service ID</th>
                            <th>Celebrant Name</th>
                            <th>Contact Number</th>
                            <th>Total Amount</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            if(!empty($transactions)){

                            foreach ($transactions as $transac) { 
                              
                          ?> 
                              
                              <tr>
                                <td><?php echo $transac['transactionID']; ?></td>
                                <td><?php echo $transac['clientName']; ?></td>
                                <td><?php echo $transac['contactNo']; ?></td>
                                <td><?php echo $transac['totalAmount']; ?></td>
                                <td>
                                  <div class="col-md-3 col-sm-4">
                                    <a >
                                    <i class="fa fa-fw fa-check"></i>
                                    </a>
                                  </div>
                                  <div class="col-md-3 col-sm-4" >
                                    
                                    <i class="fa fa-fw fa-info" data-toggle="modal" data-target="#transactdetails"> </i></a>
                                  </div>
                                </td>
                              
                          <?php }
                            }else{
                              echo "0 results";
                            }
                          ?>
                          </tr>
                      
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- Modal for viewing details o transactions -->
        <div class="modal fade bd-example-modal-lg" id="transactdetails" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Transaction Details</h4>
              </div>
              <div class="modal-body">
                <div class="" id="con1">
                    <form action="/action_page.php">
                        <div class="row">
                            <div class="col-lg-5">
                              <label for="fname">Name</label>
                            </div>
                            <div class="col-lg-7">
                              <input type="text" class="form-control" placeholder="Touma Kazuma" disabled>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-5">
                            <label for="lname">Date Rented</label>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="form-control" placeholder="This Date" disabled>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-5">
                            <label for="lname">Contact Number</label>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="form-control" placeholder="09260878700" disabled>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-5">
                            <label for="lname">ID Type</label>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="form-control" placeholder="School ID" disabled>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-5">
                            <label for="lname">Transaction State</label>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="form-control" placeholder="Finished" disabled>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-5">
                            <label for="lname">Total Amount</label>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="form-control" placeholder="12,000" disabled>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-5">
                            <label for="lname">Balance</label>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="form-control" placeholder="0" disabled>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <label> Service Availed </label>
                            </div>
                            <div class="box">
                              <div class="box-body">
                                <div class="table table-responsive">          
                                    <table class="table table-bordered table-condensed table-hover" id="tTable">
                                      <thead>
                                        <tr>
                                          <th >Service</th>
                                          <th >Amount</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td ></td>
                                          <td ></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                </div>
                              </div>
                            </div>
                        </div>
                    </form>
                  </div>
              </div>
              <div class="modal-footer">
                <div class="row">
                  <div class="col-lg-4">
                    <button type="button" class="btn btn-block btn-primary btn-lg" data-dismiss="modal">Add Payment</button>
                  </div>
                  <div class="col-lg-4">
                    <button type="button" class="btn btn-block btn-primary btn-lg" data-dismiss="modal">Add Expenses</button>
                  </div>
                  <div class="col-lg-4">
                    <button type="button" class="btn btn-block btn-primary btn-lg" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      <!-- End of Modal -->
        <!-- add service transaction modal-->
        <div id="addServiceTransaction" class="modal fade bd-example-modal-lg" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Transaction</h4>
              </div>
              <div class="modal-body">
                <form>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Client Name</label>
                        <input type="text" name="client-name" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" name="contactNum" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Home Address</label>
                        <input type="text" name="hAddress" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Rental Charge</label>
                        <input type="text" name="rentChrge" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Advance</label>
                        <input type="text" name="advnce" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Balance</label>
                        <input type="text" name="balance" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label>ID Type</label>
                        <input type="text" name="idType" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>School<i>(For Students)</i></label>
                        <input type="text" name="school" class="form-control">
                      </div>                 
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label>Year & Section<i>(For Students)</i></label>
                        <input type="text" name="yrSec" class="form-control">
                      </div>
                    </div>
                  </div>

                  <!-- borrowed items --> 
                  <div class="col-lg-12">
                    <div class="box">
                      <div class="box-header">
                        <h4>Borrowed Items</h4>
                      </div>
                      <div class="box-body">
                        <div class="table table-responsive">
                          <table id="borrowedItms" class="table table-bordered table-condensed table-hover text-center">
                            <thead>
                              <tr>
                                <th>Item Name</th>
                                <th>Color</th>
                                <th>Image</th>
                              </tr>
                            </thead>
                            <tbody>
                              <!--<label>Decors</label>-->
                              <?php
                                foreach ($decors as $dec) { ?> 
                                  <tr>
                                    <td><form><span class="form-group checkbox"><label><input type="checkbox" name="" value=""></label><?php echo $dec['decorName']?></span></form></td>
                                    <td><?php echo $dec['color'] ?></td>
                                    <td><?php echo '<img class="eventDecorsImg" src="data:image/jpeg;base64,' . base64_encode($dec['decorImage']) . '"/>' ?></td>
                                  </tr>
                              <?php  }
                              ?>
                              <!--<label>Designs</label>-->
                              <?php
                                foreach ($designs as $des) { ?>
                                  <tr>
                                    <td><form><span class="form-group checkbox"><label><input type="checkbox" name="" value=""></label><?php echo $des['designName']?></span></form></td>
                                    <td><?php echo $des['color'] ?></td>
                                    <td><?php echo '<img class="eventDecorsImg" src="data:image/jpeg;base64,' . base64_encode($des['designImage']) . '"/>' ?></td>
                                  </tr>
                              <?php  }
                              ?>
                            </tbody>
                          </table>  
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <div class="row">
                      <div class="col-lg-2">
                        <button type="submit" class="btn btn-success" action="submitForm.php">Save</button>
                      </div>
                      <div class="col-lg-2">
                        <button type="reset" class="btn btn-danger" onclick="reset_chkbx()">Reset</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
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
    $('#rentalTable').DataTable()
    $('#serviceTable').DataTable()
    $('#borrowedItms').DataTable()
    $('#tTable').DataTable()
  })
  function reset_chkbx(){
    $('input:checkbox').prop('checked', false);
  }
</script>
<style>
  @media screen and (min-with: 768px){
    #addServiceTransaction .modal-dialog {
      with:900px;
    }
  }

  #addServiceTransaction .modal-dialog {
    width:75%;
  }
</style>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
