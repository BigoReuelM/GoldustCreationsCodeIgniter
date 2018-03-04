<?php

   echo $_SESSION["currentEventID"];
?>
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
              <h3 class="box-title">Payments Table:</h3>
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
              <h3>Total Amount: Php 150, 000</h3>
              <h3>Total Amount Paid: Php 100, 000</h3>
            </div>
          </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Expenses Table:</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">                 
                  <h3>Total Expenses:</h3>
                  <h1>Php 30, 000</h1>  
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
                <h3>Over Budget: Php 50, 000</h3>
                <h3>Total Budget: Php 100, 000</h3>
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
