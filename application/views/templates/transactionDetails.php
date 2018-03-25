
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
          <div id="updateConfirmation">
            
          </div>
        </div>
        <?php 
          $attributes = array("name" => "updateTransactionDetails", "id" => "updateTransactionDetails", "class" => "form-horizontal");
          echo form_open("transactions/updateTransactionDetails", $attributes);
        ?>
          <div class="box-body">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Client Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="clientName" class="form-control" placeholder="<?php echo $details->clientName ?>" value="" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Contact Number</label>
                  <div class="col-sm-10">
                    <input type="text" id="contactNumber" name="contactNumber" class="form-control" placeholder="<?php echo $details->contactNumber ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text" id="address" name="address" class="form-control" placeholder="<?php echo $details->homeAddress ?>" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Year & Section</label>
                  <div class="col-sm-10">
                    <input type="text" id="yNs" name="yNs" class="form-control" placeholder="<?php echo $details->yearAndSection ?>" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">School</label>
                  <div class="col-sm-10">
                    <input type="text" id="school" name="school" class="form-control" placeholder="<?php echo $details->school ?>" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">ID Type</label>
                  <div class="col-sm-10">
                    <input type="text" id="idType" name="idType" class="form-control" placeholder="<?php echo $details->IDType ?>" value="">
                  </div>
                </div>
              </div>
              <div class="col-lg-6">             
                <div class="form-group">
                  <label class="col-sm-2 control-label">Deposited Amount</label>
                  <div class="col-sm-10">
                    <input type="text" id="depositAmt" name="depositAmt" class="form-control" placeholder="<?php echo $details->depositAmt ?>" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Total Amount</label>
                  <div class="col-sm-10">
                    <input type="text" id="totalAmount" name="totalAmount" class="form-control" placeholder="<?php echo $details->totalAmount ?>" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Balance</label>
                  <div class="col-sm-10">
                    <input type="text" id="balance" name="balance" class="form-control" placeholder="<?php echo $balance; ?>" value="" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">
                    <input type="text" id="status" name="status" class="form-control" placeholder="<?php echo $details->transactionstatus ?>" value="" disabled>
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
                        <input type="date" id="newDate" name="newDate" class="form-control" value="">
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
                        <input type="time" id="newTime" name="newTime" class="form-control" value="">
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
        <?php echo form_close(); ?>
      </div>
     <div class="control-sidebar-bg"></div>             
  </section> 
</div>
<!-- ./wrapper -->


<!-- add service modal -->
<div class="modal fade" role="dialog" id="addServc">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Service/s</h4>
        <div id="serviceConfirm">
        </div>
      </div>
      <?php 
        $attributes = array("name" => "addService", "id" => "addService", "class" => "form-horizontal");
        echo form_open("transactions/addsvc", $attributes);
      ?>
        <div class="modal-body">
          <table class="table table-hover table-responsive table-bordered" id="modalServcTbl">
            <thead>
              <tr>
                <th>Service Name</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody id="serviceTable"> 
                <?php
                  if (!empty($servcs)) {
                    foreach ($servcs as $svc) { ?>
                      <tr>                   
                          <td>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="services[]" value="<?php echo $svc['serviceID'] ?>" multiple><?php echo $svc['serviceName'] ?>
                              </label>
                            </div>
                          </td>
                          <td><?php echo $svc['description'] ?></td>
                      </tr>
                <?php }
                  }
                ?>
              
            </tbody>            
          </table> 
        </div>
        <div class="modal-footer">                 
          <button class="btn btn-primary" onclick="reset_chkbx()">Reset</button>
          <button class="btn btn-default" type="submit">Add</button>
        </div>
      <?php echo form_close(); ?>
    </div>

  </div>
</div>


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
    $('#modalServcTbl').DataTable()
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
  //Script for updating the transaction details
  $('#updateTransactionDetails').submit(function(e){
    e.preventDefault();

    var transactionDetails = $(this);
    var cNum = $('#contactNumber').val();
    var address = $('#address').val();
    var yNs = $('#yNs').val();
    var school = $('#school').val();
    var idType = $('#idType').val();
    var depositAmt = $('#depositAmt').val();
    var totalAmount = $('#totalAmount').val();
    var time = $('#newTime').val();
    var date = $('#newDate').val();
    $.ajax({
      type: 'POST',
      url: transactionDetails.attr('action'),
      data: transactionDetails.serialize(),
      dataType: 'json',
      success: function(response){

        if (response.success == true) {
          $('.alert-success').remove();

          // if success we would show message
          // and also remove the error class

          $('#updateConfirmation').append(
            '<div class="alert alert-success text-center">' +
              '<span class="glyphicon glyphicon-ok"></span>' +
              '<span>Updates saved.</span>' +
            '</div>'
          );

          $('.form-group').removeClass('has-error')
                .removeClass('has-success');
          $('.text-danger').remove();
          // reset the form
          transactionDetails[0].reset();
          // close the message after seconds
          if (response.contactNumber == true) {
            $('#contactNumber').val(cNum);
          }
          if (response.address == true) {
            $('#address').val(address);
          }
          if (response.yNs == true) {
            $('#yNs').val(yNs);
          }
          if (response.school == true) {
            $('#school').val(school);
          }
          if (response.idType == true) {
            $('#idType').val(idType);
          }
          if (response.depositAmt == true) {
            $('#depositAmt').val(depositAmt);  
          }
          if (response.totalAmount == true) {
            $('#totalAmount').val(totalAmount);
          }
          if (response.newTime == true) {
            $('#time').val(time);
          }
          if (response.newDate == true) {
            $('#date').val(date);
          }

          $('.alert-success').delay(500).show(10, function() {
            $(this).delay(3000).hide(10, function() {
              $(this).remove();
            });
          })
  
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
      }
    });
  });
  //end of transaction details update
  //script for adding of appointments
  $('#addNewAppointment').submit(function(e){
    e.preventDefault();

    var appointmentDetails = $(this);
    var agenda = $('#agenda').val();
    var time = $('#appointmentTime').val();
    var date = $('#appointmentDate').val();

    $.ajax({
      type: 'POST',
      url: appointmentDetails.attr('action'),
      data: appointmentDetails.serialize(),
      dataType: 'json',
      success: function(response){
        if (response.success == true) {
          // if success we would show message
          // and also remove the error class
          $('#appointConfirm').append('<div class="alert alert-success text-center">' +
          '<span class="glyphicon glyphicon-ok"></span>' +
          ' New appointment has been saved.' +
          '</div>');

          $('#appTable').prepend(
            '<tr>'+
            '<td>' + date + '</td>' +
            '<td>' + time + '</td>' +
            '<td>' + agenda + '</td>' +
            '</tr>'
          );
          
          $('.form-group').removeClass('has-error')
                .removeClass('has-success');
          $('.text-danger').remove();
          // reset the form
          appointmentDetails[0].reset();
          // close the message after seconds
          $('.alert-success').delay(500).show(10, function() {
          $(this).delay(3000).hide(10, function() {
            $(this).remove();
          });
          })
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
      }
    });
  });
  //end of adding of appointments
  //script for adding services
    $('#addService').submit(function(e){
    e.preventDefault();

    var services = $(this);


    $.ajax({
      type: 'POST',
      url: services.attr('action'),
      data: services.serialize(),
      dataType: 'json',
      success: function(response){
        if (response.success == true) {

          $('.alert-success').remove();

          $('#serviceConfirm').append('<div class="alert alert-success text-center">' +
          '<span class="glyphicon glyphicon-ok"></span>' +
          ' Service/s saved.' +
          '</div>');

          $.each(response.availedServices, function(key, value){
            $('#serviceTableBody').prepend(
              '<tr id="' + value.serviceID + '">' +
                '<form method="post" name="updateServiceDetails" id="updateServiceDetails" class="form-horizontal" action="<?php echo base_url('transactions/updateServiceDetails'); ?>">' +
                  '<td>' + value.serviceName + '</td>' +
                  '<td><input class="form-control" id="serviceQuantity" name="serviceQuantity" type="text">' +
                  '<td><input class="form-control" id="serviceAmount" name="serviceAmount" type="text"></td>' +
                  '<td>' +
                    '<input type="text" id="servi" name="serviceID" value="' + value.serviceID + '" hidden>' +
                    '<button class="btn btn-block btn-danger" type="submit" name="action" value="remove">Remove</button>' +
                    '<button class="btn btn-block btn-default" type="submit" name="action" value="update">Update</button>' +
                  '</td>' +
                '</form>' +
              '</tr>'
            );
          });

          services[0].reset();
          // close the message after seconds
          $('.alert-success').delay(500).show(10, function() {
          $(this).delay(3000).hide(10, function() {
            $(this).remove();
          });
          })
        }else{
          
        }
      }
    });
  });
  //end of script for adding od services
  //script for updating transaction services details

  $('.updateServiceDetails').submit(function(e){
    e.preventDefault();

    var updateDetails = $(this);

    $.ajax({
      type: 'POST',
      url: updateDetails.attr('action'),
      data: updateDetails.serialize(),
      dataType: 'json',
      success: function(response){
        if (response.success == true) {
          if (response.action === "update") {
          }else{

          }
          /*
          $('.form-group').removeClass('has-error')
                .removeClass('has-success');
          $('.text-danger').remove();
          */
          // reset the form
          updateDetails[0].reset();
          // close the message after seconds
  
        }else{
          /*
          $.each(response.messages, function(key, value) {
            var element = $('#' + key);
            
            element.closest('div.form-group')
            .removeClass('has-error')
            .addClass(value.length > 0 ? 'has-error' : 'has-success')
            .find('.text-danger')
            .remove();
            
            element.after(value);
          }); */
        }
      }
    });
  });

</script>

