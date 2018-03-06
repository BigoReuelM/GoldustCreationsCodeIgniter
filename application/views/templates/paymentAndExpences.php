<?php

?>
<style type="text/css">
#name{
   width:250%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    background-color: #E6E6E6;
}
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
  background-color: #E6E6E6
}
</style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Payments And Expenses
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

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
                  <!-- Add Payment Modal -->
                  <div class="modal fade" id="addpayment" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Add Payment</h4>
                        </div>
                        <div class="modal-body">
                          <div class="container" id="con1">
                              <form action="/action_page.php">
                                <div class="row">
                                   <div class="col-25">
                                      <label for="fname">Client Name</label>
                                    </div>
                                    <div class="col-75">
                                      <div id="name" > Azuma Kazuma </div>
                                    </div>
                                </div>
                                <div class="row">
                                   <div class="col-25">
                                      <label for="fname">Event Name</label>
                                    </div>
                                    <div class="col-75">
                                      <div id="name" > Azuma Anniversary </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-25">
                                    <label for="fname">Date</label>
                                  </div>
                                  <div class="col-75">
                                    <input type="date" id="fname" name="firstname" placeholder="Description">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-25">
                                    <label for="fname">Date</label>
                                  </div>
                                  <div class="col-75">
                                    <input type="time" id="fname" name="firstname" placeholder="Description">
                                  </div>
                                </div>
                              </form>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Add</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <!-- End of add payment modal -->
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div>
                <h3>Balance: </h3> <h1>Php 50, 000</h1>
              </div>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Payment ID</th>
                    <th>Amount</th>
                    <th>Balance</th>
                    <th>Date</th>
                    <th>Time</th>
                  </tr>
                </thead>
                <tbody> 
                  <?php
                    if(!empty($payments)){
                      foreach ($payments as $payment) {
                        
                  ?>
                  <tr>
                    <td><?php echo $payment['paymentID']; ?></td>
                    <td><?php echo $payment['amount']; ?></td>
                    <td><?php echo $payment['totalAmount'] - $payment['amount']; ?></td>
                    <td><?php echo $payment['date']; ?></td>
                    <td><?php echo $payment['time']; ?></td>
                  </tr>
                  <?php
                      }
                    }else {
                      echo "0 data";
                    } 
                  ?>
                </tbody>
              </table>
            
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>

            <div class="">
              <?php
                $tAmount = $totalAmount->totalAmount; 
                echo '<h3>Total Amount: Php ' . $tAmount . '</h3>'
               ?>
              
              <h3>Total Amount Paid: Php 100, 000</h3>
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
                  <button type="button" class="btn btn-block btn-primary btn-lg" >Add Expenses</button>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">                 
                  <h3>Total Expenses:</h3>
                  <?php 
                    $totalExpenses = $totalExpenses->total;
                    echo '<h1>Php' . $totalExpenses . '</h1>';  
                  ?>
                </div>
                <div class="col-md-6">
                  <h3>Remaining Budget:</h3>
                  <h1>Php 30, 000</h1>
                </div>
              </div>
              
              <table class="table table-bordered">
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
                  <?php
                    if (!empty($expenses)) {
                       foreach ($expenses as $expense) {
            
                  ?>
                  <tr>
                    <td><?php  echo $expense['expensesID']; ?></td>
                    <td><?php  echo $expense['expensesAmount']; ?></td>
                    <td><?php  echo $expense['expensesName']; ?></td>
                    <td><?php  echo $expense['expensesDate']; ?></td>
                    <td><button href="#" data-toggle="modal" data-target="#modal-photo">View Photo</button></td>
                  </tr>
                  <?php
                      }
                    }else{
                      echo "0 data";
                    }

                  ?>
                </tbody>
              </table>
            
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
              <div>
                <?php

                  echo '<h3>Over Budget: Php 50, 000</h3>';
                  echo '<h3>Total Budget: Php 100, 000</h3>';
                 ?>
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
<div class="modal modal-default fade" id="modal-photo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Design Name Here</h4> 
      </div>
      <div class="modal-body">
        <img src="sly2.jpg" alt="photo">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <a href="gowns.php"><button type="button" class="btn btn-primary">Change</button></a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
<!-- /.modal-dialog -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/public/dist/js/adminlte.min.js"></script>
<script>
function date() {
    var x = document.createElement("INPUT");
    x.setAttribute("type", "date");
    x.setAttribute("value", "2014-02-09");
    document.body.appendChild(x);
}
</script>
