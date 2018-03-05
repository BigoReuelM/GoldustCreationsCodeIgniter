<style type="text/css">
  * {
    box-sizing: border-box;
}

#lname {
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
}

#tab1 {
  border:1px solid #ccc;
  background-color: #E6E6E6;
}
</style>
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
                    <button class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addServiceTransaction">Add Transaction</button>  
                  </div>
                </div>
                
             </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div  class="table table-responsive">
                      <table id ="rentalTable" class="table table-bordered table-condensed">
                        <thead>
                          <tr>
                            <th>Sevice ID</th>
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
                                    <a href="#') ?>">
                                      <!-- Modal for viewing details o transactions -->
                                        <div class="modal fade" id="transactdetails" role="dialog">
                                          <div class="modal-dialog">
                                          
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Transaction Details</h4>
                                              </div>
                                              <div class="modal-body">
                                                <div class="container" id="con1">
                                                    <form action="/action_page.php">
                                                        <div class="row">
                                                            <div class="col-25">
                                                              <label for="fname">Name</label>
                                                            </div>
                                                            <div class="col-75">
                                                              <div id="lname" > Touma Kazusa </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                          <div class="col-25">
                                                            <label for="lname">Date Rented</label>
                                                          </div>
                                                          <div class="col-75">
                                                            <div id="lname" > 2015-07-01 </div>
                                                          </div>
                                                        </div>
                                                        <div class="row">
                                                          <div class="col-25">
                                                            <label for="lname">Contact Number</label>
                                                          </div>
                                                          <div class="col-75">
                                                            <div id="lname" > 09010101010 </div>
                                                          </div>
                                                        </div>
                                                        <div class="row">
                                                          <div class="col-25">
                                                            <label for="lname">ID Type</label>
                                                          </div>
                                                          <div class="col-75">
                                                            <div id="lname" > Government ID </div>
                                                          </div>
                                                        </div>
                                                        <div class="row">
                                                          <div class="col-25">
                                                            <label for="lname">Transaction State</label>
                                                          </div>
                                                          <div class="col-75">
                                                            <div id="lname" > Finished </div>
                                                          </div>
                                                        </div>
                                                        <div class="row">
                                                          <div class="col-25">
                                                            <label for="lname">Total Amount</label>
                                                          </div>
                                                          <div class="col-75">
                                                            <div id="lname" > 12100</div>
                                                          </div>
                                                        </div>
                                                        <div class="row">
                                                          <div class="col-25">
                                                            <label for="lname">Balance</label>
                                                          </div>
                                                          <div class="col-75">
                                                            <div id="lname">0 </div>
                                                          </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-25">
                                                                <label> Service Availed </label>
                                                            </div>
                                                            <div>          
                                                                <table class="table table-bordered" id="tab1">
                                                                  <tbody>
                                                                    <tr>
                                                                      <td id="tab1">Rental of Gowns</td>
                                                                      <td id="tab1">Rental of Accessories</td>
                                                                      <td id="tab1">Flower Entourage</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td id="tab1"></td>
                                                                      <td id="tab1"></td>
                                                                      <td id="tab1"></td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td id="tab1"></td>
                                                                      <td id="tab1"></td>
                                                                      <td id="tab1"></td>
                                                                    </tr>
                                                                  </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </form>
                                                  </div>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Add Payment</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Add Expenses</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                            
                                          </div>
                                        </div>
                                      <!-- End of Modal -->
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

          <div id="addServiceTransaction" class="modal fade bd-example-modal-lg" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Event</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                <div class="col-md-6">
                <form method="post">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Event Name</label>
                        <input type="text" name="event-name" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Client Name</label>
                        <input type="text" name="client-name" class="form-control">
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" name="contact-number" class="form-control">
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Celebrant</label>
                        <input type="text" name="celebrant" class="form-control">
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>Event Location</label>
                          <input type="text" name="event-loc" class="form-control">
                        </div>
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Event Date</label>
                        <input type="date" name="event-date" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Event Time</label>
                        <input type="time" name="event-time" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6">
                      <div class="form-group">
                        <label>Package Availed</label>
                        <span class="radio"><label><input type="radio" name="event-time" value="full-Package">Full Package</label></span>
                        <soan class="radio"><label><input type="radio" name="event-time" value="semi-Package">Semi Package</label></soan>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div>
                        <label>Motiff</label>
                        <input type="color" name="motiff" class="form-control">
                      </div>
                    </div>
                    </div>
                  
                </div>
                  
                  <!-- Services -->
                  <div class="col-lg-6">
        
                  <div class="box">
                    <div class="box-body">
                      <div class="table table-responsive">
                        <table id="svc-tbl" class="table table-hover table-bordered table-condensed table-hover text-center">
                          <h4>Services</h4>
                          <thead>
                            <tr>
                              <th>Services</th>
                              <th>Quantity</th>
                              <th>Amount</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            echo count($services);
                            if (!empty($services)) {
                               foreach ($services as $service) {
                              
                            ?>
                                <tr>
                                  <td><form><span class="form-group checkbox"><label><input type="checkbox" value=""></label><?php echo $service['serviceName'] ?></span></form
                                  ></td>
                                  <td><input class="form-control" type="text" name="" style="border: none;" placeholder="Insert text here"></td>
                                  <td><input class="form-control" type="text" name="" style="border: none;" placeholder="Insert text here"></td>
                                </tr>
                            <?php
                              }
                             }else {
                               echo "0 data";
                             }  
                             ?>
        
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  </div>

        
                  <!-- end of services table -->
                </form>
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
    $('#svc-tbl').DataTable()
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
