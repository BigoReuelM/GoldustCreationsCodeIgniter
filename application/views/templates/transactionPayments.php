
<style type="text/css">
  .glyphicon.glyphicon-circle-arrow-left {
  font-size: 50px;

}
</style>


  <!-- Content Header (Page header) -->

  <section class="content-header">
    <div class="row">
      <div class="col-lg-6">
        <a href="<?php echo base_url('transactions/transactions') ?>" id="icon">
              <span class="glyphicon glyphicon-circle-arrow-left" ></span>
        </a>
      </div>
    </div>
  </section>
  <section class="content container-fluid">
    <div class="box">
      <div class="box-header with-border">
        <div class="row">
          <div class="col-lg-5">
            <h3 class="box-title">Payments Table:</h3>
          </div>
          <div class="col-lg-7">
            <?php if ($this->session->userdata('role') === "admin"): ?>
              <button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addpayment">Add Payments</button>
            <?php endif ?>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="paymentTable" class="table table-bordered">
          <thead>
            <tr>
              <th>Receiver</th>
              <th>Date and Time</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody id="paymentTableBody"> 
            <?php if (!empty($payments)){
              foreach ($payments as $payment) {
            ?>
              <tr>
                <td><?php echo $payment['employeeName'] ?></td>
                <td>
                  <?php
                    $date = date_create($payment['date']);
                    $newDate = date_format($date, "M-d-Y");
                    $newTime = date("g:i a", strtotime($payment['time']));
                    echo $newDate . " at " . $newTime; 
                  ?>
                </td>
                <td>
                  <?php 
                    $formatedPaymentAmount = number_format($payment['amount'], 2);
                    echo $formatedPaymentAmount; 
                  ?>
                </td>
              </tr>
            <?php 
                }
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="control-sidebar-bg"></div>             
  </section> 
</div>
<!-- ./wrapper -->
<!-- Modal for adding of payments -->
<div class="modal fade" id="addpayment" role="dialog">
  <div class="modal-dialog">  
    <!-- Modal content-->
    <div class="modal-content">
      <?php 
        $attributes = array("name" => "addNewPayment", "id" => "addNewPayment", "class" => "form-horizontal", "autocomplete" => "off");
        echo form_open("transactions/addPayment", $attributes);
      ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Payment</h4>
          <div id="the-message">
          <?php if ($balance <= 0): ?>
            <div class="alert alert-danger text-center">
              <span class="icon fa fa-hand-stop-o"></span>
              <span>This event is fully paid!</span>
            </div>
          <?php endif ?>
          <?php if ($balance > 0): ?>
            <div class="alert alert-success text-center">
              <span>Remaining Balance</span>
              <div>
                <strong><?php echo $balance ?></strong>
              </div>
            </div>
          <?php endif ?>
          </div>
        </div>
        <div class="modal-body">
          <div class="box-body"">
            <div class="form-group">
              <label class="col-sm-2 control-label">Client Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Email" value="<?php echo $details->clientName ?>" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Amount</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter Amount">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Date Payed</label>
              <div class="col-lg-9">
                <input type="date" class="form-control" name="date" id="date">
              </div>            
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Time Payed</label>
              <div class="col-lg-9">
                <input type="time" class="form-control" name="time" id="time">
              </div>            
            </div>
          </div>
        </div>      
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      <?php echo form_close(); ?>
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

    $('#paymentTable').DataTable()

  });

  //Script for updating the payment
  $('#addNewPayment').submit(function(e){
    e.preventDefault();

    var paymentDetails = $(this);
    var time = $('#time').val();
    var date = $('#date').val();
    var amount = $('#amount').val();
    $.ajax({
      type: 'POST',
      url: paymentDetails.attr('action'),
      data: paymentDetails.serialize(),
      dataType: 'json',
      success: function(response){
        if(response.balance == true){
          if (response.success == true) {

            var paymentID = response.paymentID;
            var eventBalance = response.balanceAmount - amount;

            $('.alert-success').remove();

            // if success we would show message
            // and also remove the error class

            $('#the-message').append(
              '<div class="alert alert-success text-center">' +
                '<span class="glyphicon glyphicon-ok"></span>' +
                '<span>New payment has been saved.</span>' +
                '<div class="row">' +
                  '<div class="col-lg-6">' +
                    '<span>New Balance: </span>' +
                  '</div>' +
                  '<div class="col-lg-6">' +
                    '<strong>' + eventBalance + '</strong>'+
                  '</div>' +
                '</div>' +
              '</div>'
            );

            $('#paymentTableBody').prepend(
              '<tr>' +
                '<td>' + paymentID + '</td>' +
                '<td>' + amount + '</td>' +
                '<td>' + date + '</td>' +
                '<td>' + time + '</td>' +
              '</tr>'
            );

            $('.form-group').removeClass('has-error')
                  .removeClass('has-success');
            $('.text-danger').remove();
            // reset the form
            paymentDetails[0].reset();
            // close the message after seconds
    
          }else{
            $.each(response.messages, function(key, value) {
              var element = $('#' + key);
              
              element.closest('div.form-group')
              .removeClass('has-error')
              .addClass(value.length > 0 ? 'has-error' : 'has-success')
              .find('.text-danger')
              .remove();
              
              element.after(value);
            });
          }
        }else{

          $('.alert-success').remove();

          $('.alert-danger').remove();

          $('#the-message').append(
            '<div class="alert alert-danger text-center">' +
            '<span class="icon fa fa-hand-stop-o"></span>' +
            '<span>' +
            ' This transaction is fully paid!' +
            '</span>' +
            '</div>'
          );
        }
      }
    });
  });
  //end of script for payments
</script>

