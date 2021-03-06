<style type="text/css">
  th {
    text-align: center;
  }
  .tblnum {
    text-align: right;
  }
</style>
<?php
  $selectedDate = $this->session->userdata('selectedDate');
  $selectedMnthYr = $this->session->userdata('selectedMnthYr');
  $selectedYr = $this->session->userdata('selectedYr');
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Deposits
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
                  <h4>Deposits</h4>
                </div>
                <div class="box-body">
                  <div class="table table-responsive">
                    <table class="table table-bordered table-hover" id="allDeposits">
                      <thead>
                        <tr>
                          <th>Client</th>
                          <th>Date Availed</th>
                          <th>Date Finished</th>
                          <th>ID Type</th>
                          <th>Home Address</th>
                          <th>School</th>
                          <th>Amount</th>
                        </tr>
                      </thead>    
                      <tbody>
                          <?php
                            $totaldailydeposits = 0;
                            if (!empty($deposits) && !empty($selectedDate)) {
                              // get DAILY deposits...
                              foreach ($deposits as $d) { 
                                // based on the date availed...
                                if ($d['dateAvail'] == $selectedDate) {
                                  $totaldailydeposits += $d['depositAmt'];
                                ?>
                                <tr>
                                  <td><?php echo $d['fullname']; ?></td>
                                  <td class="tblnum"><?php echo $d['dateAvail']; ?></td>
                                  <td class="tblnum">
                                    <?php 
                                    if (!empty($d['finishDate'])) {
                                      echo $d['finishDate']; 
                                    } else {
                                      echo "Item/s not returned yet";
                                    }
                                    ?>
                                  </td>
                                  <td><?php echo $d['IDType']; ?></td>
                                  <td><?php echo $d['homeAddress']; ?></td>
                                  <td><?php echo $d['schoolyrsec']; ?></td>
                                  <td class="tblnum"><?php echo $d['depositAmt']; ?></td>
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
                    <input type="text" class="form-control pull-right" id="datepickerallpayments" name="datepicker" placeholder="<?php echo $selectedDate; ?>">
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
                  <input type="text" name="totaldailydeposits" placeholder="<?php echo $totaldailydeposits ?>" class="form-control" disabled>
                </div>
              </div>
            </div>
          </div>
          </form>
        </div>

        <!-- Monthly Reports -->
        <div class="tab-pane fade in" id="monthly">
          <form role="form" method="post" action="<?php echo base_url('admin/reportsSelectMnthYr') ?>" autocomplete="off">
          <div class="row">           
            <div class="col-md-9">
              <div class="box">
                <div class="box-header">
                  <h4>Deposits</h4>
                </div>
                <div class="box-body">
                  <div class="table table-responsive">
                    <table class="table table-bordered table-hover" id="allDepositsMonthly">
                      <thead>
                        <tr>
                          <th>Client</th>
                          <th>Date Availed</th>
                          <th>Date Finished</th>
                          <th>ID Type</th>
                          <th>Home Address</th>
                          <th>School</th>
                          <th>Amount</th>
                        </tr>
                      </thead>    
                      <tbody>
                          <?php
                          $totalmonthlydeposits = 0;
                          if (!empty($deposits) && !empty($selectedMnthYr)) {
                            foreach ($deposits as $d) {
                              $substr = explode('-', $selectedMnthYr);
                              // $substr[0] month
                              // $substr[1] year
                              if ($d['year'] === $substr[1] && $d['month'] === $substr[0]) { 
                                $totalmonthlydeposits += $d['depositAmt'];
                                ?>
                                <tr>
                                  <td><?php echo $d['fullname']; ?></td>
                                  <td class="tblnum"><?php echo $d['dateAvail']; ?></td>
                                  <td class="tblnum">
                                    <?php 
                                    if (!empty($d['finishDate'])) {
                                      echo $d['finishDate']; 
                                    } else {
                                      echo "Item/s not returned yet";
                                    }
                                    ?>
                                  </td>
                                  <td><?php echo $d['IDType']; ?></td>
                                  <td><?php echo $d['homeAddress']; ?></td>
                                  <td><?php echo $d['schoolyrsec']; ?></td>
                                  <td class="tblnum"><?php echo $d['depositAmt']; ?></td>
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
                  <label>Month and Year</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="monthallpayments" name="monthpicker" placeholder="<?php echo $selectedMnthYr; ?>">
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
                  <input type="text" name="totaldailydeposits" placeholder="<?php echo $totalmonthlydeposits ?>" class="form-control" disabled>
                </div>
              </div>
            </div>
          </div>
          </form>
        </div>

        <!-- Annual Reports -->
        <div class="tab-pane fade in" id="annual">
          <form role="form" method="post" action="<?php echo base_url('admin/reportsSelectYr') ?>" autocomplete="off">
          <div class="row">           
            <div class="col-md-9">
              <div class="box">
                <div class="box-header">
                  <h4>Deposits</h4>
                </div>
                <div class="box-body">
                  <div class="table table-responsive">
                    <table class="table table-bordered table-hover" id="allDepositsAnnual">
                      <thead>
                        <tr>
                          <th>Client</th>
                          <th>Date Availed</th>
                          <th>Date Finished</th>
                          <th>ID Type</th>
                          <th>Home Address</th>
                          <th>School</th>
                          <th>Amount</th>
                        </tr>
                      </thead>    
                      <tbody>
                          <?php
                            $totalannualdeposits = 0;
                            if (!empty($deposits)) {
                              // get DAILY deposits...
                              foreach ($deposits as $d) { 
                                // based on the date availed...
                                if ($d['year'] == $selectedYr) {
                                  $totalannualdeposits += $d['depositAmt'];
                                ?>
                                <tr>
                                  <td><?php echo $d['fullname']; ?></td>
                                  <td class="tblnum"><?php echo $d['dateAvail']; ?></td>
                                  <td class="tblnum">
                                    <?php 
                                    if (!empty($d['finishDate'])) {
                                      echo $d['finishDate']; 
                                    } else {
                                      echo "Item/s not returned yet";
                                    }
                                    ?>
                                  </td>
                                  <td><?php echo $d['IDType']; ?></td>
                                  <td><?php echo $d['homeAddress']; ?></td>
                                  <td><?php echo $d['schoolyrsec']; ?></td>
                                  <td class="tblnum"><?php echo $d['depositAmt']; ?></td>
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
                  <label>Year</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="yrallpayments" name="yrpicker" placeholder="<?php echo $selectedYr; ?>">
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
                  <input type="text" name="totaldailydeposits" placeholder="<?php echo $totalannualdeposits ?>" class="form-control" disabled>
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

<script>
  $(function () {
    $('#payments').DataTable()
    $('#expenses').DataTable()
  })
</script> 

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
    $('#allDeposits').DataTable()
    $('#allDepositsMonthly').DataTable()
    $('#allDepositsAnnual').DataTable()
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