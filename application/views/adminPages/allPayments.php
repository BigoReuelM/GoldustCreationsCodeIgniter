<?php
  $selectedDate = $this->session->userdata('selectedDate');
  $selectedMnthYr = $this->session->userdata('selectedMnthYr');
  $selectedYr = $this->session->userdata('selectedYr');
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Payments
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
          <form role="form" method="post" action="<?php echo base_url('admin/reportsSelectDate') ?>">
          <div class="row">           
            <div class="col-md-9">
              <div class="box">
                <div class="box-header">
                  <h4>Payments</h4>
                </div>
                <div class="box-body">
                  <div class="table table-responsive">
                    <table class="table table-bordered table-hover text-center" id="allPayments">
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
                    <input type="text" class="form-control pull-right" id="datepickerallpayments" name="datepickerallpayments" placeholder="<?php echo $selectedDate; ?>">
                    <div class="input-group-addon">
                      <button class="btn-link" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <!-- total payments -->
                <div class="input-group">
                  <label>Total</label>
                  <input type="text" name="totaldailypayments" placeholder="<?php echo $totaldailypayments ?>" class="form-control" disabled>
                </div>
              </div>
            </div>
          </div>
          </form>
        </div> 
        
        <!-- Monthly Reports -->
        <div class="tab-pane fade" id="monthly">
        <form role="form" method="post" action="<?php echo base_url('admin/reportsSelectMnthYr') ?>">
          <div class="row">
            <div class="col-lg-9">
              <div class="box">
                <div class="box-header">
                  <h4>Payments</h4>
                </div>
                <div class="box-body">
                  <div class="table table-responsive">
                    <table class="table table-bordered table-hover text-center" id="allpaymentsmonthly">
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
                            foreach ($payments as $p) {
                              $substr = explode('-', $selectedMnthYr);
                              // $substr[0] month
                              // $substr[1] year
                              if ($p['year'] === $substr[1] && $p['month'] === $substr[0]) { 
                                $totalmonthlypayments += $p['amount'];
                                ?>
                                <tr>
                                  <td><?php echo $p['clientName'] ?></td>
                                  <td><?php echo $p['date'] ?></td>
                                  <td><?php echo $p['time'] ?></td>
                                  <td><?php echo $p['receiverName'] ?></td>
                                  <td><?php echo $p['amount'] ?></td>
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
              <div class="col-lg-3">
                <div class="well">
                  <div class="form-group">
                    <label>Month and Year:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="monthallpayments" name="monthallpayments" placeholder="<?php echo $selectedMnthYr ?>">
                        <div class="input-group-addon">
                          <button class="btn-link" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="input-group">
                    <label>Total</label>
                    <input type="text" name="totalmonthlypayments" placeholder="<?php echo $totalmonthlypayments ?>" class="form-control" disabled>
                  </div>
                </div>
              </div>
            </div>  
          </form>
        </div>  

        <!-- Annual Reports -->
        <div class="tab-pane fade" id="annual">
          <form role="form" method="post" action="<?php echo base_url('admin/reportsSelectYr') ?>">
          <div class="row">
            <div class="col-lg-9">
              <div class="box">
                <div class="box-header">
                  <h4>Payments</h4>
                </div>
                <div class="box-body">
                  <div class="table table-responsive">
                    <table class="table table-bordered table-hover text-center" id="allpaymentsannual">
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
                            foreach ($payments as $p) {
                              if ($p['year'] === $selectedYr) { 
                                $totalannualpayments += $p['amount'];   
                                ?>
                                <tr>
                                  <td><?php echo $p['clientName'] ?></td>
                                  <td><?php echo $p['date'] ?></td>
                                  <td><?php echo $p['time'] ?></td>
                                  <td><?php echo $p['receiverName'] ?></td>
                                  <td><?php echo $p['amount'] ?></td>
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
            <div class="col-lg-3">
              <div class="well">
                <div class="form-group">
                  <label>Year:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="yrallpayments" name="yrallpayments" placeholder="<?php echo $selectedYr ?>">
                      <div class="input-group-addon">
                        <button class="btn-link" type="submit"><i class="fa fa-search"></i></button>
                      </div>
                  <!-- /.input group -->
                  </div>
                </div>
                <!-- total payments -->
                <div class="input-group">
                  <label>Total</label>
                  <input type="text" name="totalannualpayments" placeholder="<?php echo $totalannualpayments ?>" class="form-control" disabled>
                </div>
              </div>
            </div>
          </div>
        </div> 
      </form>
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
    //$('#payments').DataTable()
    $('#allPayments').DataTable()
    $('#allpaymentsmonthly').DataTable()
    $('#allpaymentsannual').DataTable()
    //$('#expenses').DataTable()
  });
  $(function () {
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
    //Date picker all payments
    $('#datepickerallpayments').datepicker({
      autoclose: true,
      orientation: 'bottom auto',
      todayHighlight: true,
      format: 'yyyy-mm-dd'
    })

    // Month and year only
    $('#monthallpayments').datepicker({
       format: 'm-yyyy',
       startView: 'months',
       minViewMode: 'months',
       orientation: 'bottom auto'
    });

    // Year only
    $('#yrallpayments').datepicker({
       format: 'yyyy',
       startView: 'years',
       minViewMode: 'years',
       orientation: 'bottom auto'
    });

    //Year picker
    $('#date-year').datepicker({
       minViewMode: 2,
       format: 'yyyy'
    });

    //Year picker all payments
    $('#date-yearallpayments').datepicker({
       minViewMode: 2,
       format: 'yyyy',
       orientation: 'bottom auto'
     });


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
    
  })

</script>
