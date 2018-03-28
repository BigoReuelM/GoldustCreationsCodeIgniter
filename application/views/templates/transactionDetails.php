
<style type="text/css">
  .glyphicon.glyphicon-circle-arrow-left {
  font-size: 50px;

}

  #but8 {
    width:30px;
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
      <?php if ($this->session->userdata('role') === "admin"): ?>
        <?php if ($details->transactionstatus === "on-going"): ?>
          
              <div class="col-lg-3">
                <button type="submit" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#finish">Finish</button>
              </div>
              <div class="col-lg-3">
                <button type="submit" class="btn btn-block btn-danger btn-lg" data-toggle="modal" data-target="#cancel">Cancel</button>
              </div>
                 
        <?php endif ?>
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
          <div class="box-body">
            <?php 
              $attributes = array("name" => "updateTransactionDetails", "id" => "updateTransactionDetails", "class" => "form-horizontal");
              echo form_open("transactions/updateTransactionDetails", $attributes);
            ?>
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
                    <?php  
                      $formatedTotal = number_format($details->totalAmount, 2);
                    ?>
                    <input type="text" id="totalAmount" name="totalAmount" class="form-control" placeholder="<?php echo $formatedTotal ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Balance</label>
                  <div class="col-sm-10">
                    <?php  
                      $formatedBalance = number_format($balance, 2);
                    ?>
                    <input type="text" id="balance" name="balance" class="form-control" placeholder="<?php echo $formatedBalance ?>" value="" disabled>
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
                    <div class="col-lg-6">
                      <label class="col-sm-5 control-label">Date Availed</label>
                      <div class="col-sm-7">
                        <?php
                          $date = date_create($details->dateAvail);
                          $newDate = date_format($date, "M-d-Y"); 
                        ?>
                        <input type="text" class="form-control" value="<?php echo $newDate ?>" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <label class="col-sm-5 control-label">Change Date Availed</label>
                      <div class="col-sm-7">
                        <input type="date" id="newDate" name="newDate" class="form-control" value="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-6">
                      <label class="col-sm-5 control-label">Time Availed</label>
                      <div class="col-sm-7">
                        <?php 
                          $newTime = date("g:i a", strtotime('$detail->time'));
                        ?>
                        <input type="text" class="form-control" value="<?php echo $newTime ?>" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <label class="col-sm-5 control-label">Change Time Availed</label>
                      <div class="col-sm-7">
                        <input type="time" id="newTime" name="newTime" class="form-control" value="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php echo form_close(); ?>                  
          </div>
          <div class="box-footer">  
            <button form="updateTransactionDetails" type="submit" class="btn btn-block btn-primary btn-lg">Update Details</button>
            <?php if ($this->session->userdata('role') === "admin"): ?>
              <button class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addCharges">Additional Payments</button>
            <?php endif ?>
          </div>
      </div>
     <div class="control-sidebar-bg"></div>             
  </section> 
</div>
<!-- ./wrapper -->
<!-- add charges modal -->
<div class="modal fade" role="dialog" id="addCharges">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Additional Charges</h4>
        <div id="chargeAddon">
        </div>
      </div>
      <?php 
        $attributes = array("name" => "addAdditionalCharges", "id" => "addAdditionalCharges", "class" => "form-horizontal");
        echo form_open("transactions/addAdditionalCharges", $attributes);
      ?>
        <div class="modal-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">Client Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="<?php echo $details->clientName ?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Total Amount</label>
            <div class="col-sm-10">
              <input type="text" id="newTotalAmount" name="newTotalAmount" class="form-control" placeholder="<?php echo $totalAmount->totalAmount ?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Additional Charge</label>
            <div class="col-sm-10">
              <input type="text" id="additionalCharge" name="additionalCharge" class="form-control" placeholder="Enter amount .. ">
            </div>
          </div>
        </div>
        <div class="modal-footer">               
          <button class="btn btn-primary" type="submit">Add</button>
          <button class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      <?php echo form_close(); ?>
    </div>

  </div>
</div>

<!-- Finish Modal -->
        <div class="modal fade" id="finish">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Finish Transaction</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to end this Transaction?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <form id="finishTransaction" method="post" action="<?php echo base_url('transactions/markFinish') ?>">
                  <input type="text" value="<?php echo $details->transactionID ?>" name="finish" hidden>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
<!-- /Finish modal -->
<!-- Cancel Modal -->
      <div class="modal fade" id="cancel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cancel Transaction</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to cancel?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <form method="post" action="<?php echo base_url('transactions/markCancel') ?>">
                  <input type="text" value="<?php echo $details->transactionID ?>" name="cancel" hidden>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
<!-- /Cancel Modal -->
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

  $('#addAdditionalCharges').submit(function(e){
      e.preventDefault();

      var chargeDetails = $(this);

      $.ajax({
        type: 'POST',
        url: chargeDetails.attr('action'),
        data: chargeDetails.serialize(),
        dataType: 'json',
        success: function(response){
          if (response.success == true) {
            $('#chargeAddon').append('<div class="alert alert-success text-center">' +
            '<span class="icon fa fa-ckeck"></span>' +
            ' Additional Charges Applied.' +
            '</div>');
            $('.form-group').removeClass('has-error')
                  .removeClass('has-success');
            $('.text-danger').remove();
            // reset the form
            chargeDetails[0].reset();
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

</script>

