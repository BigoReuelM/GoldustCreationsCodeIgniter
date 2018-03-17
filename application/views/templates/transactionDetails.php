
<style type="text/css">
  .glyphicon.glyphicon-circle-arrow-left {
  font-size: 50px;

}
</style>

<?php 
  $transactiontotalAmount = $details->totalAmount;
  $totalAmountPaid = $total->total;

  $balance = $transactiontotalAmount - $totalAmountPaid;

?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header">
    <div class="row">
      <div class="col-lg-6">
        <a href="<?php echo base_url('transactions/transactions') ?>" id="icon">
              <span class="glyphicon glyphicon-circle-arrow-left" ></span>
        </a>
      </div>

      <?php if ($details->transactionstatus === "on-going"): ?>
        
          <form method="post" action="<?php echo base_url('transactions/markFinish') ?>">
            <div class="col-lg-3">
              <input type="text" value="<?php echo $details->transactionID ?>" name="finish" hidden>
              <button type="submit" class="btn btn-block btn-primary btn-lg">Finish</button>
            </div>
          </form>
          <form method="post" action="<?php echo base_url('transactions/markCancel') ?>">
            <div class="col-lg-3">
              <input type="text" value="<?php echo $details->transactionID ?>" name="cancel" hidden>
              <button type="submit" class="btn btn-block btn-danger btn-lg">Cancel</button>
            </div>
          </form>
               
      <?php endif ?>
    </div>
  </section>
  <section class="content container-fluid">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Transaction Details</h3>
        </div>
        <form role="form" method="post" action="<?php echo base_url('transactions/updateTransactionDetails') ?>" class="form-horizontal">
          <div class="box-body">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Client Names</label>
                  <div class="col-sm-10">
                    <input type="text" name="clientName" class="form-control" placeholder="<?php echo $details->clientName ?>" value="" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Contact Number</label>
                  <div class="col-sm-10">
                    <input type="text" name="contactNumber" class="form-control" placeholder="<?php echo $details->contactNumber ?>" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text" name="address" class="form-control" placeholder="<?php echo $details->homeAddress ?>" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Year & Section</label>
                  <div class="col-sm-10">
                    <input type="text" name="yNs" class="form-control" placeholder="<?php echo $details->yearAndSection ?>" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">School</label>
                  <div class="col-sm-10">
                    <input type="text" name="school" class="form-control" placeholder="<?php echo $details->school ?>" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">ID Type</label>
                  <div class="col-sm-10">
                    <input type="text" name="idType" class="form-control" placeholder="<?php echo $details->IDType ?>" value="">
                  </div>
                </div>
              </div>
              <div class="col-lg-6">             
                <div class="form-group">
                  <label class="col-sm-2 control-label">Deposited Amount</label>
                  <div class="col-sm-10">
                    <input type="text" name="depositAmt" class="form-control" placeholder="<?php echo $details->depositAmt ?>" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Total Amount</label>
                  <div class="col-sm-10">
                    <input type="text" name="totalAmount" class="form-control" placeholder="<?php echo $details->totalAmount ?>" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Balance</label>
                  <div class="col-sm-10">
                    <input type="text" name="balance" class="form-control" placeholder="<?php echo $balance; ?>" value="" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">
                    <input type="text" name="status" class="form-control" placeholder="<?php echo $details->transactionstatus ?>" value="" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-5">
                      <label class="col-sm-4 control-label">Date Availed</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?php echo $details->dateAvail ?>" disabled>
                      </div>
                    </div>
                    <div class="col-lg-7">
                      <label class="col-sm-4 control-label">Change Date Availed</label>
                      <div class="col-sm-8">
                        <input type="date" name="date" class="form-control" value="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-5">
                      <label class="col-sm-4 control-label">Time Availed</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?php echo $details->time ?>" disabled>
                      </div>
                    </div>
                    <div class="col-lg-7">
                      <label class="col-sm-4 control-label">Change Time Availed</label>
                      <div class="col-sm-8">
                        <input type="time" name="time" class="form-control" value="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>                  
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-block btn-primary btn-lg">Update Details</button>
          </div>
        </form>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="box box-info">
            <!--list of services col-->
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">List of Services</h3>    
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="servicesTable" class="table table-bordered table-striped text-center">
                  <thead>
                    <tr>
                      <th>Service</th>
                      <th>Amount</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($transServices){
                      foreach ($transServices as $service) {
                    ?>
                      <tr>
                        <td><?php echo $service['serviceName'] ?></td>
                        <td><?php echo $service['amount'] ?></td>
                        <td></td>
                      </tr>
                    <?php }}?>
                  </tbody>
                </table>
              </div>
            </div>
            <!--END OF services-->
          </div>
        </div> 
        <div class="col-lg-6">
          <div class="box box-info">
            <!--list of appointments col-->
            <div class="box">
              <div class="box-header">
                <div class="row">
                  <div class="col-md-6">
                    <h3 class="box-title">List of Appointments</h3>
                  </div>
                  <div class="col-md-6">
                    <button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addappoint">Add Appointment</button>
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
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($transAppointments)){
                        foreach ($transAppointments as $appointment) {
                    ?>
                      <tr>
                        <td><?php echo $appointment['date'] ?></td>
                        <td><?php echo $appointment['time'] ?></td>
                        <td><?php echo $appointment['agenda'] ?></td>
                      </tr>  
                    <?php
                        }
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!--END OF APPOINTMENTS-->
          </div>
        </div>
      </div>
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
                  <?php if (!empty($payments)){
                    foreach ($payments as $payment) {
                  ?>
                    <tr>
                      <td><?php echo $payment['paymentID'] ?></td>
                      <td><?php echo $payment['amount'] ?></td>
                      <td><?php echo $payment['date'] ?></td>
                      <td><?php echo $payment['time'] ?></td>
                    </tr>
                  <?php 
                      }
                    }
                  ?>
                </tbody>
              </table>
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
                  <?php if (!empty($expenses)){
                    foreach ($expenses as $expense) {
                  ?>
                    <tr>
                      <td><?php echo $expense['expensesID'] ?></td>
                      <td><?php echo $expense['expensesAmount'] ?></td>
                      <td><?php echo $expense['expensesname'] ?></td>
                      <td><?php echo $expense['espensesDate'] ?></td>
                      <td><button href="#" data-toggle="modal" data-target="#modal-photo">View Photo</button></td>
                    </tr> 
                  <?php
                      }
                    }
                  ?>
                  
                </tbody>
              </table>
           </div>
         </div>
       </div>
     </div>
     <div class="control-sidebar-bg"></div>             
  </section> 
</div>
<!-- ./wrapper -->

<!--Add Appointment Modal -->
<div class="modal fade" id="addappoint" role="dialog">
  <div class="modal-dialog">
          <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Appointment</h4>
      </div>
      <div class="modal-body">
        <div class="box-body">
          <form class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-2 control-label">Client Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Email" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Employee Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Email" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Agenda</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Email" disabled>
              </div>
            </div>
            <div class="form-group">
              <label>Date:</label>

              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker">
              </div>
            </div>
            <div class="bootstrap-timepicker">
              <div class="form-group">
                <label>Time Picker:</label>

                <div class="input-group">
                  <input type="text" class="form-control timepicker">

                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                </div>
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

<!-- Modal for adding expense -->
<div class="modal fade" id="addexpenses" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <form role="form" method="post" action="<?php echo base_url('events/addExpenses') ?>" class="form-horizontal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Expenses</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Client Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Email" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Expenses Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Enter Expenses Name...">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Amount</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Enter Amount">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Receipt No.</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Enter Receipt No....">
              </div>
            </div>
            <div class="form-group">
              <label>Date:</label>

              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Select Receipt Image</label>
              <input type="file" name="expenseImage" id="js-upload-files" multiple>
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
      <form role="form" method="post" action="<?php echo base_url('events/addPayment') ?>" class="form-horizontal">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Payment</h4>
        </div>
        <div class="modal-body">
          <div class="box-body"">
            <div class="form-group">
              <label class="col-sm-2 control-label">Client Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Email" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Amount</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Enter Amount">
              </div>
            </div>
            <div class="form-group">
              <label>Date:</label>

              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker">
              </div>
            </div>
            <div class="bootstrap-timepicker">
              <div class="form-group">
                <label>Time Picker:</label>

                <div class="input-group">
                  <input type="text" class="form-control timepicker">

                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                </div>
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


<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>/public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>/public/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>/public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>/public/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>/public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>/public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>/public/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>/public/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url(); ?>/public/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>/public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>/public/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>/public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#appointmentsTable').DataTable()
    $('#servicesTable').DataTable()
    $('#paymentTable').DataTable()
    $('#expenseTable').DataTable()
  })

</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
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

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

<script type="text/javascript">
  
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

}
</script>
