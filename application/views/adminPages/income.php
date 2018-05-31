<?php
$selectedDate = $this->session->userdata('selectedDate');
$selectedMnthYr = $this->session->userdata('selectedMnthYr');
$selectedYr = $this->session->userdata('selectedYr');
?>  
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Income
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <ul class="nav nav-tabs">
    <li class="active"><a href="#daily" data-toggle="tab">Daily</a></li>
    <li><a href="#monthly" data-toggle="tab">Monthly</a></li>
    <li><a href="#annual" data-toggle="tab">Annual</a></li>
  </ul>

  <div class="tab-content">
    <!-- Daily Reports -->
    <div class="tab-pane fade in active" id="daily">
      <form role="form" method="post" action="<?php echo base_url('admin/reportsSelectDate') ?>" autocomplete="off">
        <div class="row">
          <div class="col-md-9">
            <div class="box">
              <div class="box-header">
                <h4>Revenue (Payments)</h4>
              </div>
              <div class="box-body">
                <div class="table table-responsive">
                  <table class="table table-bordered table-hover text-center" id="dailyrevenue">
                    <thead>
                      <tr>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Receiver</th>
                        <th>Amount</th>
                      </tr>
                    </thead>    
                    <tbody>
                      <?php
                      $totaldailypayments = 0;
                      if (!empty($payments) && !empty($selectedDate)) {
                                  // get DAILY payments...
                        foreach ($payments as $p) { 
                          if ($p['date'] == $selectedDate) {
                            $totaldailypayments += $p['amount'];
                            ?>
                            <tr>
                              <td><?php echo $p['clientName']; ?></td>
                              <td><?php echo $p['date']; ?></td>
                              <td><?php echo $p['time']; ?></td>
                              <td><?php echo $p['receiverName']; ?></td>
                              <td><?php echo $p['amount']; ?></td>
                            </tr>
                          <?php  }
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="box-footer">
              </div>
            </div>

            <div class="box">
              <div class="box-header">
                <h4>Expenses</h4>
              </div>
              <div class="box-body">
                <div class="table table-responsive">
                  <table class="table table-bordered table-hover text-center" id="dailyexpenses">
                    <thead>
                      <tr>
                        <th>Employee Name</th>
                        <th>Expense Name</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Receipt No.</th>
                      </tr>
                    </thead>    
                    <tbody>
                      <?php
                      $totaldailyexpenses = 0;
                      if (!empty($expenses) && !empty($selectedDate)) {
                                  // get DAILY expenses...
                        foreach ($expenses as $x) { 
                          if ($x['expenseDate'] == $selectedDate) {
                            $totaldailyexpenses += $x['expensesAmount'];
                            ?>
                            <tr>
                              <td><?php echo $x['employeeName']; ?></td>
                              <td><?php echo $x['expensesName']; ?></td>
                              <td><?php echo $x['expensesAmount']; ?></td>
                              <td><?php echo $x['expenseDate']; ?></td>
                              <td><?php echo $x['receiptNum']; ?></td>
                            </tr>
                          <?php  }
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="box-footer">
              </div>
            </div>

            <div class="box">
              <div class="box-header">
                <h4>Event Refunds</h4>
              </div>
              <div class="box-body">
                <div class="table table-responsive">
                  <table class="table table-bordered table-hover text-center" id="allEventRefundsDaily">
                    <thead>
                      <tr>
                        <th>Client</th>
                        <th>Event Name</th>
                        <th>Date Cancelled</th>
                        <th>Refunded Amount</th>
                        <th>Date Refunded</th>
                      </tr>
                    </thead>    
                    <tbody>
                      <?php
                      $evtTotalDailyRefunds = 0;
                      if (!empty($eventRefunds) && !empty($selectedDate)) {
                                    // get DAILY eventRefunds...
                        foreach ($eventRefunds as $er) { 
                          if ($er['refundedDate'] === $selectedDate) {
                            $evtTotalDailyRefunds += $er['refundedAmount'];
                            ?>
                            <tr>
                              <td><?php echo $er['clientName']; ?></td>
                              <td><?php echo $er['eventName']; ?></td>
                              <td><?php echo $er['cancelledDate']; ?></td>
                              <td><?php echo $er['refundedAmount']; ?></td>
                              <td><?php echo $er['refundedDate']; ?></td>
                            </tr>
                          <?php  }
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="box">
              <div class="box-header">
                <h4>Transaction Refunds</h4>
              </div>
              <div class="box-body">
                <div class="table table-responsive">
                  <table class="table table-bordered table-hover text-center" id="allTransacRefundsDaily">
                    <thead>
                      <tr>
                        <th>Client</th>
                        <th>Date Cancelled</th>
                        <th>Refunded Amount</th>
                      </tr>
                    </thead>    
                    <tbody>
                      <?php
                      $trTotalDailyRefunds = 0;
                      if (!empty($transacRefunds) && !empty($selectedDate)) {
                                    // get DAILY transacRefunds...
                        foreach ($transacRefunds as $tr) { 
                          if ($tr['cancelledDate'] === $selectedDate) {
                            $trTotalDailyRefunds += $tr['refundAmt'];
                            ?>
                            <tr>
                              <td><?php echo $tr['clientName']; ?></td>
                              <td><?php echo $tr['cancelledDate']; ?></td>
                              <td><?php echo $tr['refundAmt']; ?></td>
                            </tr>
                          <?php  }
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="well">
              <!-- Date -->
              <div class="form-group">
                <label>Date</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="datepicker" placeholder="<?php echo $selectedDate; ?>">
                  <div class="input-group-addon">
                    <button class="btn-link" type="submit"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                <!-- /.input group -->
              </div>
              <div class="input-group">
                <label>Total Revenue</label>
                <input type="text" name="totaldailypayments" placeholder="<?php echo $totaldailypayments ?>" class="form-control" disabled>
              </div>
              <div class="input-group">
                <label>Total Expenses</label>
                <input type="text" name="totaldailyexpenses" placeholder="<?php echo $totaldailyexpenses ?>" class="form-control" disabled>
              </div>
              <div class="input-group">
                <label>Total Event Refunds</label>
                <input type="text" name="evtTotalDailyRefunds" placeholder="<?php echo $evtTotalDailyRefunds ?>" class="form-control" disabled>
              </div>
              <div class="input-group">
                <label>Total Transaction Refunds</label>
                <input type="text" name="trTotalDailyRefunds" placeholder="<?php echo $trTotalDailyRefunds ?>" class="form-control" disabled>
              </div>
              <div class="input-group">
                <?php 
                  // income = revenue - (expenses + transaction refunds + event refunds)
                $dailyIncome = 0; 
                $dailyIncome = $totaldailypayments - ($totaldailyexpenses + $trTotalDailyRefunds + $evtTotalDailyRefunds); 
                ?>
                <label>Income</label>
                <input type="text" name="totalIncome" placeholder="<?php echo $dailyIncome ?>" class="form-control" disabled>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>    

    <!-- Monthly Reports -->
    <div class="tab-pane fade" id="monthly">
      <form role="form" method="post" action="<?php echo base_url('admin/reportsSelectMnthYr') ?>" autocomplete="off">
        <div class="row">
          <div class="col-md-9">
            <div class="box">
              <div class="box-header">
                <h4>Revenue (Payments)</h4>
              </div>
              <div class="box-body">
                <div class="table table-responsive">
                  <table class="table table-bordered table-hover text-center" id="monthlyrevenue">
                    <thead>
                      <tr>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Receiver</th>
                        <th>Amount</th>
                      </tr>
                    </thead>    
                    <tbody>
                      <?php
                      $totalmonthlypayments = 0;
                      if (!empty($payments) && !empty($selectedMnthYr)) {
                                  // get DAILY payments...
                        foreach ($payments as $p) { 
                          $substr = explode('-', $selectedMnthYr);
                          // $substr[0] month
                          // $substr[1] year
                          if ($p['year'] === $substr[1] && $p['month'] === $substr[0]) { 
                                $totalmonthlypayments += $p['amount'];
                            ?>
                            <tr>
                              <td><?php echo $p['clientName']; ?></td>
                              <td><?php echo $p['date']; ?></td>
                              <td><?php echo $p['time']; ?></td>
                              <td><?php echo $p['receiverName']; ?></td>
                              <td><?php echo $p['amount']; ?></td>
                            </tr>
                          <?php  }
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="box-footer">
              </div>
            </div>
            
            <div class="box">
              <div class="box-header">
                <h4>Expenses</h4>
              </div>
              <div class="box-body">
                <div class="table table-responsive">
                  <table class="table table-bordered table-hover text-center" id="monthlyexpenses">
                    <thead>
                      <tr>
                        <th>Employee Name</th>
                        <th>Expense Name</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Receipt No.</th>
                      </tr>
                    </thead>    
                    <tbody>
                      <?php
                      $totalmonthlyexpenses = 0;
                      if (!empty($expenses) && !empty($selectedMnthYr)) {
                                  // get monthly expenses...
                        foreach ($expenses as $x) { 
                          $substr = explode('-', $selectedMnthYr);
                          if ($x['year'] === $substr[1] && $x['month'] === $substr[0]) { 
                                $totalmonthlyexpenses += $x['expensesAmount'];
                                ?>
                            <tr>
                              <td><?php echo $x['employeeName']; ?></td>
                              <td><?php echo $x['expensesName']; ?></td>
                              <td><?php echo $x['expensesAmount']; ?></td>
                              <td><?php echo $x['expenseDate']; ?></td>
                              <td><?php echo $x['receiptNum']; ?></td>
                            </tr>
                          <?php  }
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="box-footer">
              </div>
            </div>
            
            <div class="box">
              <div class="box-header">
                <h4>Event Refunds</h4>
              </div>
              <div class="box-body">
                <div class="table table-responsive">
                  <table class="table table-bordered table-hover text-center" id="allEventRefundsMonthly">
                    <thead>
                      <tr>
                        <th>Client</th>
                        <th>Event Name</th>
                        <th>Date Cancelled</th>
                        <th>Refunded Amount</th>
                        <th>Date Refunded</th>
                      </tr>
                    </thead>    
                    <tbody>
                      <?php
                      $evtTotalMonthlyRefunds = 0;
                      if (!empty($eventRefunds) && !empty($selectedDate)) {
                                    // get MONTHLY eventRefunds...
                        foreach ($eventRefunds as $er) { 
                          $substr = explode('-', $selectedMnthYr);
                                // $substr[0] month
                                // $substr[1] year 
                                if ($er['month'] === $substr[0] && $er['year'] === $substr[1]) {
                                  $evtTotalMonthlyRefunds += $er['refundedAmount'];
                                ?>
                            <tr>
                              <td><?php echo $er['clientName']; ?></td>
                              <td><?php echo $er['eventName']; ?></td>
                              <td><?php echo $er['cancelledDate']; ?></td>
                              <td><?php echo $er['refundedAmount']; ?></td>
                              <td><?php echo $er['refundedDate']; ?></td>
                            </tr>
                          <?php  }
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
            <div class="box">
              <div class="box-header">
                <h4>Transaction Refunds</h4>
              </div>
              <div class="box-body">
                <div class="table table-responsive">
                  <table class="table table-bordered table-hover text-center" id="allTransacRefundsMonthly">
                    <thead>
                      <tr>
                        <th>Client</th>
                        <th>Date Cancelled</th>
                        <th>Refunded Amount</th>
                      </tr>
                    </thead>    
                    <tbody>
                      <?php
                      $trTotalMonthlyRefunds = 0;
                      if (!empty($transacRefunds) && !empty($selectedDate)) {
                                    // get monthly transacRefunds...
                        foreach ($transacRefunds as $tr) { 
                          $substr2 = explode('-', $selectedMnthYr); 
                                // $substr[0] month
                                // $substr[1] year
                                if ($tr['month'] === $substr2[0] && $tr['year'] === $substr2[1]) {
                                  $trTotalMonthlyRefunds += $tr['refundAmt'];
                                ?>
                            <tr>
                              <td><?php echo $tr['clientName']; ?></td>
                              <td><?php echo $tr['cancelledDate']; ?></td>
                              <td><?php echo $tr['refundAmt']; ?></td>
                            </tr>
                          <?php  }
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="well">
              <div class="form-group">
                <label>Month and Year</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="monthpicker" name="monthpicker" placeholder="<?php echo $selectedMnthYr; ?>">
                  <div class="input-group-addon">
                    <button class="btn-link" type="submit"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                <!-- /.input group -->
              </div>
              <div class="input-group">
                <label>Total Revenue</label>
                <input type="text" name="totalmonthlypayments" placeholder="<?php echo $totalmonthlypayments ?>" class="form-control" disabled>
              </div>
              <div class="input-group">
                <label>Total Expenses</label>
                <input type="text" name="totalmonthlyexpenses" placeholder="<?php echo $totalmonthlyexpenses ?>" class="form-control" disabled>
              </div>
              <div class="input-group">
                <label>Total Event Refunds</label>
                <input type="text" name="evtTotalMonthlyRefunds" placeholder="<?php echo $evtTotalMonthlyRefunds ?>" class="form-control" disabled>
              </div>
              <div class="input-group">
                <label>Total Transaction Refunds</label>
                <input type="text" name="trTotalMonthlyRefunds" placeholder="<?php echo $trTotalMonthlyRefunds ?>" class="form-control" disabled>
              </div>
              <div class="input-group">
                <?php 
                  // income = revenue - (expenses + transaction refunds + event refunds)
                $monthlyIncome = 0; 
                $monthlyIncome = $totalmonthlypayments - ($totalmonthlyexpenses + $trTotalMonthlyRefunds + $evtTotalMonthlyRefunds); 
                ?>
                <label>Income</label>
                <input type="text" name="totalIncome" placeholder="<?php echo $monthlyIncome ?>" class="form-control" disabled>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

    <!-- Annual Reports -->
    <div class="tab-pane fade" id="annual">
      <form role="form" method="post" action="<?php echo base_url('admin/reportsSelectYr') ?>" autocomplete="off">
        <div class="row">
          <div class="col-md-9">
            <div class="box">
              <div class="box-header">
                <h4>Revenue (Payments)</h4>
              </div>
              <div class="box-body">
                <div class="table table-responsive">
                  <table class="table table-bordered table-hover text-center" id="annualrevenue">
                    <thead>
                      <tr>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Receiver</th>
                        <th>Amount</th>
                      </tr>
                    </thead>    
                    <tbody>
                      <?php
                      $totalannualpayments = 0;
                      if (!empty($payments) && !empty($selectedYr)) {
                                  // get DAILY payments...
                        foreach ($payments as $p) { 
                          if ($p['year'] === $selectedYr) { 
                                $totalannualpayments += $p['amount'];
                            ?>
                            <tr>
                              <td><?php echo $p['clientName']; ?></td>
                              <td><?php echo $p['date']; ?></td>
                              <td><?php echo $p['time']; ?></td>
                              <td><?php echo $p['receiverName']; ?></td>
                              <td><?php echo $p['amount']; ?></td>
                            </tr>
                          <?php  }
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="box-footer">
              </div>
            </div>
            
            <div class="box">
              <div class="box-header">
                <h4>Expenses</h4>
              </div>
              <div class="box-body">
                <div class="table table-responsive">
                  <table class="table table-bordered table-hover text-center" id="annualexpenses">
                    <thead>
                      <tr>
                        <th>Employee Name</th>
                        <th>Expense Name</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Receipt No.</th>
                      </tr>
                    </thead>    
                    <tbody>
                      <?php
                      $totalannualexpenses = 0;
                      if (!empty($expenses) && !empty($selectedYr)) {
                                  // get monthly expenses...
                        foreach ($expenses as $x) {
                          if ($x['year'] === $selectedYr) { 
                                $totalannualexpenses += $x['expensesAmount'];
                                ?>
                            <tr>
                              <td><?php echo $x['employeeName']; ?></td>
                              <td><?php echo $x['expensesName']; ?></td>
                              <td><?php echo $x['expensesAmount']; ?></td>
                              <td><?php echo $x['expenseDate']; ?></td>
                              <td><?php echo $x['receiptNum']; ?></td>
                            </tr>
                          <?php  }
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="box-footer">
              </div>
            </div>
            
            <div class="box">
              <div class="box-header">
                <h4>Event Refunds</h4>
              </div>
              <div class="box-body">
                <div class="table table-responsive">
                  <table class="table table-bordered table-hover text-center" id="allEventRefundsAnnual">
                    <thead>
                      <tr>
                        <th>Client</th>
                        <th>Event Name</th>
                        <th>Date Cancelled</th>
                        <th>Refunded Amount</th>
                        <th>Date Refunded</th>
                      </tr>
                    </thead>    
                    <tbody>
                      <?php
                      $evtTotalAnnualRefunds = 0;
                      if (!empty($eventRefunds) && !empty($selectedYr)) {
                        foreach ($eventRefunds as $er) { 
                                if ($er['year'] === $selectedYr) {
                                  $evtTotalAnnualRefunds += $er['refundedAmount'];
                                ?>
                            <tr>
                              <td><?php echo $er['clientName']; ?></td>
                              <td><?php echo $er['eventName']; ?></td>
                              <td><?php echo $er['cancelledDate']; ?></td>
                              <td><?php echo $er['refundedAmount']; ?></td>
                              <td><?php echo $er['refundedDate']; ?></td>
                            </tr>
                          <?php  }
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
            <div class="box">
              <div class="box-header">
                <h4>Transaction Refunds</h4>
              </div>
              <div class="box-body">
                <div class="table table-responsive">
                  <table class="table table-bordered table-hover text-center" id="allTransacRefundsAnnual">
                    <thead>
                      <tr>
                        <th>Client</th>
                        <th>Date Cancelled</th>
                        <th>Refunded Amount</th>
                      </tr>
                    </thead>    
                    <tbody>
                      <?php
                      $trTotalAnnualRefunds = 0;
                      if (!empty($transacRefunds) && !empty($selectedYr)) {
                        foreach ($transacRefunds as $tr) {  
                                if ($tr['year'] === $selectedYr) {
                                  $trTotalAnnualRefunds += $tr['refundAmt'];
                                ?>
                            <tr>
                              <td><?php echo $tr['clientName']; ?></td>
                              <td><?php echo $tr['cancelledDate']; ?></td>
                              <td><?php echo $tr['refundAmt']; ?></td>
                            </tr>
                          <?php  }
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="well">
              <div class="form-group">
                <label>Year</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="yrpicker" name="yrpicker" placeholder="<?php echo $selectedYr; ?>">
                  <div class="input-group-addon">
                    <button class="btn-link" type="submit"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                <!-- /.input group -->
              </div>
              <div class="input-group">
                <label>Total Revenue</label>
                <input type="text" name="totalannualpayments" placeholder="<?php echo $totalannualpayments ?>" class="form-control" disabled>
              </div>
              <div class="input-group">
                <label>Total Expenses</label>
                <input type="text" name="totalannualexpenses" placeholder="<?php echo $totalannualexpenses ?>" class="form-control" disabled>
              </div>
              <div class="input-group">
                <label>Total Event Refunds</label>
                <input type="text" name="evtTotalAnnualRefunds" placeholder="<?php echo $evtTotalAnnualRefunds ?>" class="form-control" disabled>
              </div>
              <div class="input-group">
                <label>Total Transaction Refunds</label>
                <input type="text" name="trTotalAnnualRefunds" placeholder="<?php echo $trTotalAnnualRefunds ?>" class="form-control" disabled>
              </div>
              <div class="input-group">
                <?php 
                  // income = revenue - (expenses + transaction refunds + event refunds)
                $annualIncome = 0; 
                $annualIncome = $totalannualpayments - ($totalannualexpenses + $trTotalAnnualRefunds + $evtTotalAnnualRefunds); 
                ?>
                <label>Income</label>
                <input type="text" name="totalIncome" placeholder="<?php echo $annualIncome ?>" class="form-control" disabled>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

  </div>

</section>
<!-- /.content -->
</div>

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
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>/public/bower_components/Chart.js/Chart.js"></script>

<script src="<?php echo base_url(); ?>/public/chart.bundle.js"></script>
<script src="<?php echo base_url(); ?>/public/utils.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>/public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>/public/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>/public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>/public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
  $(function () {
    $('#dailyrevenue').DataTable()
    $('#monthlyrevenue').DataTable()
    $('#annualrevenue').DataTable()

    $('#dailyexpenses').DataTable()
    $('#monthlyexpenses').DataTable()
    $('#annualexpenses').DataTable()

    $('#allEventRefundsDaily').DataTable()
    $('#allEventRefundsMonthly').DataTable()
    $('#allEventRefundsAnnual').DataTable()

    $('#allTransacRefundsDaily').DataTable()
    $('#allTransacRefundsMonthly').DataTable()
    $('#allTransacRefundsAnnual').DataTable()
  });

  $(function () {
    //Date picker all payments
    $('#datepicker').datepicker({
      autoclose: true,
      orientation: 'bottom auto',
      todayHighlight: true,
      format: 'yyyy-mm-dd'
    })

    // Month and year only
    $('#monthpicker').datepicker({
     format: 'm-yyyy',
     startView: 'months',
     minViewMode: 'months',
     orientation: 'bottom auto'
   });

    // Year only
    $('#yrpicker').datepicker({
     format: 'yyyy',
     startView: 'years',
     minViewMode: 'years',
     orientation: 'bottom auto'
   });
    /****************************************************/
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range as a button
    $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
    )

    //Year picker
    $('#date-year').datepicker({
     minViewMode: 2,
     format: 'yyyy'
   });
  })

</script>
