 <style type="text/css">
 #button1 {
  width: 180px;
}

.results tr[visible='false'],
.no-result{
  display:none;
}

.results tr[visible='true']{
  display:table-row;
}

.counter{
  padding:8px; 
  color:#ccc;
}

#in1 {
  width: 130px;
}


* {
  box-sizing: border-box;
}

#form1 {
  width:100%;
  padding: 8px;
  background-color:white;
}
#name{
 width:250%;
 padding: 12px;
 border: 1px solid #ccc;
 border-radius: 4px;
 resize: vertical;
 background-color: #E6E6E6;
}
#GovID {
  width:250%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  background-color: #E6E6E6;
}
#button3{
  margin-left: 150%;
  margin-top: 5%;
}
input[type=text], select, textarea {
  width:250%;
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
  margin-left: 8px;
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

#lname {
  margin-right: 5px;

}

#tab1 {
  border:1px solid #ccc;
  background-color: #E6E6E6;
}

#tab2 {
  padding-top: 10px;
}

</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <section class="content-header">
          <div class="row" id="swift">
            <div class="col-md-6">
             <h2>Taylor Swift</h2>
           </div>
           <div class="col-md-3">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addappoint" id ="button3">Add Appointment
            </button>
            <!--Add Appointment -->
            <div class="modal fade" id="addappoint" role="dialog">
              <div class="modal-dialog">
              <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Appointment</h4>
          </div>
          <div class="modal-body">
            <div class="container" id="con1">
          <form action="/action_page.php">
            <div class="row">
              <div class="col-25">
                <label for="lname">Client Name</label>
              </div>
              <div class="col-75">
                <input type="text" id="fname" name="lastname" placeholder="Employee Name">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Employee Name</label>
              </div>
              <div class="col-75">
                <input type="text" id="fname" name="lastname" placeholder="Contact Number">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Date</label>
              </div>
              <div class="col-75">
                <input type="date" id="fname" name="lastname" placeholder="Email">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Time</label>
              </div>
              <div class="col-75">
                <input type="time" id="fname" name="lastname" placeholder="Address">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Agenda</label>
              </div>
              <div class="col-75">
                <input type="text" id="fname" name="lastname" placeholder="Address">
              </div>
            </div>
          </form>
        </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
       <!-- End -->
          </div>
        </div>  
      </section>
      <section class="content container-fluid">
        <div classs="content">
          <div class="box">
            <div class="row">
              <div class="col-lg-6">
                <div class="box-header">
                  <h3 class="box-title">Transaction Details</h3>
                </div>
                <div class="box-body">
                  <div class="" id="con1">
                    <form>
                      <div class="row">
                        <div class="col-25">
                          <label for="fname">Name</label>
                        </div>
                        <div class="col-75">
                          <input type="text" id="lname" name="lastname" placeholder="0001">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Date Availed</label>
                        </div>
                        <div class="col-75">
                          <input type="text" id="lname" name="lastname" placeholder="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Contact Number</label>
                        </div>
                        <div class="col-75">
                          <input type="text" id="lname" name="lastname" placeholder="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">ID Type</label>
                        </div>
                        <div class="col-75">
                          <input type="text" id="lname" name="lastname" placeholder="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Transaction State</label>
                        </div>
                        <div class="col-75">
                          <input type="text" id="lname" name="lastname" placeholder="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Total Amount</label>
                        </div>
                        <div class="col-75">
                          <input type="text" id="lname" name="lastname" placeholder="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Balance</label>
                        </div>
                        <div class="col-75">
                          <input type="text" class="form-control" placeholder="">
                        </div>
                      </div>
                    </div>
                    <div class="col-25" id="tab2">
                      <label> Service Availed </label>
                    </div>
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
                    <button type="button" class="btn btn-default">Back</button>
                   <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addexpense">Add Expenses</button>
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addpayment">Add Payments</button>
                  </div>

<!-- Modal for adding expense -->
<div class="modal fade" id="addexpense" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <form role="form" method="post" action="<?php echo base_url('events/addExpenses') ?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Expenses</h4>
        </div>
        <div class="modal-body">
          <div class="container" id="con1">
            <div class="row">
               <div class="col-25">
                  <label for="fname">Client Name</label>
                </div>
                <div class="col-75">
                  <div id="name" > Azuma Kazuma </div>
             </div>
            </div>           <div class="row">
              <div class="col-25">
                <label for="fname">Event Name</label>
              </div>
              <div class="col-75">
                <div id="name" > Azuma Anniversary </div>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">Expense Name</label>
              </div>
              <div class="col-75">
                <input type="text" name="expenseName" placeholder="Amount" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">Date</label>
              </div>
              <div class="col-75">
                <input type="date" name="date" placeholder="Description" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">Expense Amount</label>
              </div>
              <div class="col-75">
                <input type="text" name="expenseAmount" placeholder="Amount" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">Reciept No.</label>
              </div>
              <div class="col-75">
                <input type="text" name="receiptNumber" placeholder="Amount" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <p id="head1">Select files</p>
                <div class="form-inline">
                  <div class="form-group">
                    <input type="file" name="expenseImage" id="js-upload-files" multiple>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="addExpenses" type="submit" name="addExpenses" class="btn btn-default">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
    
  </div>
</div>
                <!-- end of modal -->
                <!-- Modal for adding of payments -->
<div class="modal fade" id="addpayment" role="dialog">
  <div class="modal-dialog">  
    <!-- Modal content-->
    <div class="modal-content">
      <form role="form" method="post" action="<?php echo base_url('events/addPayment') ?>">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Payment</h4>
        </div>
        <div class="modal-body">
          <div class="container" id="con1">
              
            <div class="row">
               <div class="col-25">
                  <label for="fname">Client Name</label>
                </div>
                <div class="col-75">
                  <div id="name" >  </div>
                </div>
            </div>
            <div class="row">
               <div class="col-25">
                  <label for="fname">Event Name</label>
                </div>
                <div class="col-75">
                  <div id="name" >  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">Date</label>
              </div>
              <div class="col-75">
                <input type="date" name="date" placeholder="Description">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">Time</label>
             </div>
              <div class="col-75">
                <input type="time" name="time" placeholder="Description">
              </div>
            </div>
            <div class="row">
               <div class="col-25">
                  <label for="fname">Amount</label>
                </div>
                <div class="col-75">
                  <input type="text" name="amount" placeholder="Amount">
               
                </div>
            </div>
          </div>
        </div>      
        <div class="modal-footer">
          <button id="addPayment" type="submit" name="addPayment" class="btn btn-default">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
    
  </div>
</div>
<!-- End of add payment modal -->

                </div>
                <div class="col-lg-6">
                    <div class="box">
                      <div class="box-header">
                        <div class="row">
                          <div class="col-lg-9">
                            <h3 class="box-title">List of Appointments</h3>    
                          </div>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <table id="appointmentsTable" class="table table-bordered table-striped text-center">
                          <thead>
                            <tr>
                              <th>Date</th>
                              <th>Time</th>
                              <th>Agenda</th>
                              <th>Event Name</th>
                              <th>Handler</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>

                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="col-md-9">
                    </section>

                      <div class="content">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="box">
                              <div class="box-header with-border">
                                <div class="row">
                                  <div class="col-lg-5">
                                    <h3 class="box-title">Payments Table:</h3>
                                  </div>
                                  <div class="col-lg-7">
                                    <button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addpayment">Add Payments</button>
                                  </div>
                                </div>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body">
                                <div>

                                  <h3>Balance:</h3> <h1>eventBalance</h1>
                                </div>
                                <table id="paymentTable" class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Payment ID</th>
                                      <th>Amount</th>
                                      <th>Date</th>
                                      <th>Time</th>
                                    </tr>
                                  </thead>
                                  <tbody> 

                                    <tr>
                                      <td>paymentID</td>
                                      <td>amount</td>
                                      <td>date</td>
                                      <td>time</td>
                                    </tr>
                                  </tbody>
                                </table>

                                <div class="">
                                  <h3>Total Amount:</h3>
                                  <h3>Total Amount Paid: Php</h3>


                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="box">
                              <div class="box-header with-border">
                                <div class="row">
                                  <div class="col-lg-5">
                                    <h3 class="box-title">Expenses Table:</h3>
                                  </div>
                                  <div class="col-lg-7">
                                    <button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addexpenses">Add Expenses</button>
                                  </div>
                                </div>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body">
                                <div class="row">
                                  <div class="col-md-6">                 
                                    <h3>Total Expenses:</h3>
                                  </div>
                                  <div class="col-md-6">
                                    <h3>Remaining Budget:</h3>
                                  </div>
                                </div>

                                <table id="expenseTable" class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Expenses ID</th>
                                      <th>Amount</th>
                                      <th>Description</th>
                                      <th>Date</th>
                                      <th>Proof</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>expensesID</td>
                                      <td>expensesAmount</td>
                                      <td>expensesName</td>
                                      <td>expensesDate</td>
                                      <td><button href="#" data-toggle="modal" data-target="#modal-photo">View Photo</button></td>
                                    </tr>
                                  </tbody>
                                </table>

                                <!-- /.box-body -->
                                <div>

                                 <h3>Over Budget: Php</h3>
                                 <h3>Total Budget:</h3>

                               </div>
                             </div>
                           </div>
                         </div>

                       </div>

                     </div>
                   </div>

                 </div>
                 <!-- /.box-body -->
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

</div>
</div>
</form>

</div>
</div>
</div>
</div>
</div>

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
<script>
  $(function () {
    $('#appointmentsTable').DataTable()
  })

</script>
      <!-- End of Modal -->