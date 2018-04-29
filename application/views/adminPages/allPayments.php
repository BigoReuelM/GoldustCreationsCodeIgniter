
<div class="content-wrapper">
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
          <div class="row">
            
            <div class="col-lg-5">
              <div class="row">
                <div class="col-lg-12">
                  <div class="well">
                    <!-- Date -->
                    <div class="form-group">
                      <label>Date:</label>

                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                  </div>
                </div>
              </div>    
              <div class="well">
                <p>total payment</p>
                <p>total expenses</p>
                <p>total refunds</p>
                <p>or any relevant information for the admin to see</p>
                <p>comparison of this month and last month etc....</p>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="box">
                <div class="box-header">
                  <h4>Payments</h4>
                </div>
                <div class="box-body">
                  <div class="table table-responsive">
                    <table class="table table-bordered table-hover text-center" id="payments">
                      <thead>
                        <tr>
                          <th>Client</th>
                          <th>Event</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Receiver</th>
                          <th>Amount</th>
                        </tr>
                      </thead>    
                      <tbody>
                        <tr>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Total</label>
                        <input type="text" name="totalPayment" class="form-control" disabled>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box">  
                <div class="box-header">
                  <h4>Expenses</h4>
                </div>
                <div class="box-body">
                  <div class="table table-responsive">
                    <table class="table table-bordered table-hover text-center" id="expenses">
                      <thead>
                        <tr>
                          <th>Client</th>
                          <th>Event</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Receiver</th>
                          <th>Amount</th>
                        </tr>
                      </thead>    
                      <tbody>
                        <tr>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Total</label>
                        <input type="text" name="totalPayment" class="form-control" disabled>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <!-- Monthly Reports -->
        <div class="tab-pane fade" id="monthly">
          <!-- Date range -->
          <div class="form-group">
            <label>Date range:</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="reservation">
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->

          <div class="row">
            <div class="col-lg-5">
              <div class="well">
                <p>total payment</p>
                <p>total expenses</p>
                <p>or any relevant information for the admin to see</p>
                <p>comparison of this month and last month etc....</p>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="box">
                <div class="box-header">
                  <h4>Payments</h4>
                </div>
                <div class="box-body">
                  <div class="table table-responsive">
                    <table class="table table-bordered table-hover text-center" id="payments">
                      <thead>
                        <tr>
                          <th>Client</th>
                          <th>Event</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Receiver</th>
                          <th>Amount</th>
                        </tr>
                      </thead>    
                      <tbody>
                        <tr>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Total</label>
                        <input type="text" name="totalPayment" class="form-control" disabled>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box">  
                <div class="box-header">
                  <h4>Expenses</h4>
                </div>
                <div class="box-body">
                  <div class="table table-responsive">
                    <table class="table table-bordered table-hover text-center" id="expenses">
                      <thead>
                        <tr>
                          <th>Client</th>
                          <th>Event</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Receiver</th>
                          <th>Amount</th>
                        </tr>
                      </thead>    
                      <tbody>
                        <tr>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Total</label>
                        <input type="text" name="totalPayment" class="form-control" disabled>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
        <!-- Annual Reports -->
        <div class="tab-pane fade" id="annual">
          <!-- Date range -->
          <div class="form-group">
            <label>Date range:</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="date-year">
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->
          <div class="row">
            <div class="col-lg-5">
              <div class="well">
                <p>total payment</p>
                <p>total expenses</p>
                <p>or any relevant information for the admin to see</p>
                <p>comparison of this month and last month etc....</p>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="box">
                <div class="box-header">
                  <h4>Payments</h4>
                </div>
                <div class="box-body">
                  <div class="table table-responsive">
                    <table class="table table-bordered table-hover text-center" id="payments">
                      <thead>
                        <tr>
                          <th>Client</th>
                          <th>Event</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Receiver</th>
                          <th>Amount</th>
                        </tr>
                      </thead>    
                      <tbody>
                        <tr>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Total</label>
                        <input type="text" name="totalPayment" class="form-control" disabled>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box">  
                <div class="box-header">
                  <h4>Expenses</h4>
                </div>
                <div class="box-body">
                  <div class="table table-responsive">
                    <table class="table table-bordered table-hover text-center" id="expenses">
                      <thead>
                        <tr>
                          <th>Client</th>
                          <th>Event</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Receiver</th>
                          <th>Amount</th>
                        </tr>
                      </thead>    
                      <tbody>
                        <tr>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Total</label>
                        <input type="text" name="totalPayment" class="form-control" disabled>
                      </div>
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
