<?php
  $empRole = $this->session->userdata('role');
  $tAmount = $totalAmount->totalAmount; 
  $totalExpenses = $totalExpenses->total;
  $totalAmountPaid = $totalPayments->total;
  $totalBudget = $tAmount * .30;
  $eventBalance = $balance->balance;

  $remainingBudget = $totalBudget - $totalExpenses;
  if ($remainingBudget < 0) {
    $remainingBudget = "0000";
  }
  
  $overBudget = $totalExpenses - $totalBudget;
  if($overBudget < 0){
    $overBudget = "00000";
  }
?>
<style type="text/css">
#name{
   width:250%;
    padding: 8px;
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

#head1 {
  font-size: 18px;
  font-weight: bold;
}
</style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Payments And Expenses
        <?php 
          echo $this->session->userdata('clientID');
          echo $this->session->userdata('amount');
         ?>
      </h1>
    </section>

    <?php
    $success_msg= $this->session->flashdata('success_msg');
    $error_msg= $this->session->flashdata('error_msg');

    if ($success_msg) {
  ?>
      <div class="alert alert-success">
        <?php echo $success_msg; ?>
      </div>
    <?php  
    }
    if ($error_msg) {
      ?>
      <div class="alert alert-danger">
        <?php echo $error_msg; ?>
      </div>
      <?php 
    }
  ?>

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
                  <?php 
                    if ($empRole === "admin") {
                      echo '<button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addpayment">Add Payments</button>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div>
                <?php 
                  echo '<h3>Balance: </h3> <h1>Php ' . $eventBalance . '</h1>';
                 ?>
                
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
                  <?php
                    if(!empty($payments)){
                      foreach ($payments as $payment) {
                        
                  ?>
                  <tr>
                    <td><?php echo $payment['paymentID']; ?></td>
                    <td><?php echo $payment['amount']; ?></td>
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

            <div class="">
              <?php
                echo '<h3>Total Amount: Php ' . $tAmount . '</h3>';
                echo '<h3>Total Amount Paid: Php' . $totalAmountPaid . '</h3>';
               ?>
              
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
                  <?php 
                    
                    echo '<h1>Php' . $totalExpenses . '</h1>';  
                  ?>
                </div>
                <div class="col-md-6">
                  <h3>Remaining Budget:</h3>
                  <?php 
                    
                    echo '<h1>Php ' . $remainingBudget . '</h1>';
                  ?>
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
              <div>
                <?php
                  
                  echo '<h3>Over Budget: Php ' . $overBudget . '</h3>';
                  echo '<h3>Total Budget: ' . $totalBudget . '</h3>';
                 ?>
              </div>
          </div>
        </div>
      </div>

    </div>
    </section>
    <!-- /.content -->
  </div>
<!-- Add Payment Modal -->
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
          <!--
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        -->
        </div>
      </form>
    </div>
    
  </div>
</div>
<!-- End of add payment modal -->
<!-- Modal for add expenses -->
<div class="modal fade" id="addexpenses" role="dialog">
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
                    <label for="fname">Expense Name</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="name" name="firstname" placeholder="Amount" class="form-control">
                  </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="fname">Date</label>
                </div>
                <div class="col-75">
                  <input type="date" id="name" name="firstname" placeholder="Description" class="form-control">
                </div>
              </div>
              <div class="row">
                 <div class="col-25">
                    <label for="fname">Expense Amount</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="name" name="firstname" placeholder="Amount" class="form-control">
                  </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <p id="head1">Select files</p>
                    <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
                      <div class="form-inline">
                        <div class="form-group">
                          <input type="file" name="files[]" id="js-upload-files" multiple>
                        </div>
                      </div>
                    </form>
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
<!-- end modal for add expenses -->
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
<!-- Slimscroll -->
<script src="<?php echo base_url();?>/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>/public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/public/dist/js/adminlte.min.js"></script>
<script type="text/javascript">
  /**
    + function($) {
    'use strict';


    var dropZone = document.getElementById('drop-zone');
    var uploadForm = document.getElementById('js-upload-form');

    var startUpload = function(files) {
        console.log(files)
    }

    uploadForm.addEventListener('submit', function(e) {
        var uploadFiles = document.getElementById('js-upload-files').files;
        e.preventDefault()

        startUpload(uploadFiles)
    })

    dropZone.ondrop = function(e) {
        e.preventDefault();
        this.className = 'upload-drop-zone';

        startUpload(e.dataTransfer.files)
    }

    dropZone.ondragover = function() {
        this.className = 'upload-drop-zone drop';
        return false;
    }

    dropZone.ondragleave = function() {
        this.className = 'upload-drop-zone';
        return false;
    }

}**/
  </script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>/public/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>/public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
function date() {
    var x = document.createElement("INPUT");
    x.setAttribute("type", "date");
    x.setAttribute("value", "2014-02-09");
    document.body.appendChild(x);
}
</script>

<script>
  $(function () {
    $('#expenseTable').DataTable({
    })
    $('#paymentTable').DataTable({
    })
  })
</script>
