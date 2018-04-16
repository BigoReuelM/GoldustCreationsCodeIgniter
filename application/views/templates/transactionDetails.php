
  <section class="content container-fluid">
      <div class="box box-info">
        <div class="box-header">
          <div class="row">
            <div class="col-lg-12">
              <nav class="navbar">
                <div class="navbar-header">
                  <h3 class="box-title">Transaction Details</h3>
                </div>
                <div class="navbar-custom-menu pull-right">
                  <ul class="nav navbar-nav">
                    <li class="dropdown tasks-menu">
                      <?php if ($details->transactionstatus == "on-going"): ?>
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                          <i class="fa fa-cog"></i>
                          <span class="label label-info">Actions</span>
                        </a>      
                      <?php endif ?>
                      <ul class="dropdown-menu">
                        <li>
                          <ul class="menu">
                            <li class="text-center">
                              <a href="#addCharges" type="button" data-toggle="modal" data-target="#addCharges">
                                <i class="fa fa-money"></i>
                                <span>Additional Charges</span>
                              </a>
                            </li>
                            <li class="text-center">
                              <a href="#refundDeposit" type="button" data-toggle="modal" data-target="#refundDeposit">
                                <i class="fa fa-money"></i>
                                <span>Refund Deposit</span>
                              </a>
                            </li>
                            <li class="text-center">
                              <a href="#finish" type="button" data-toggle="modal" data-target="#finish">
                                <i class="fa fa-check"></i>
                                <span>Finish Event</span>
                              </a>
                            </li>
                            <li class="text-center">
                              <a href="#cancel" type="button" data-toggle="modal" data-target="#cancel">
                                <i class="fa fa-close"></i>
                                <span>Cancel Event</span>
                              </a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
          <div id="updateConfirmation">
            
          </div>
        </div>
          <div class="box-body">
            <?php 
              $attributes = array("name" => "updateTransactionDetails", "id" => "updateTransactionDetails", "class" => "form-horizontal", "autocomplete" => "off");
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
                  <label class="col-sm-2 control-label">Required Deposit</label>
                  <div class="col-sm-10">
                    <?php  
                      $formatedDepositedAmount = number_format($details->depositAmt, 2);
                    ?>
                    <input type="text" id="depositAmt" name="depositAmt" class="form-control" placeholder="<?php echo $formatedDepositedAmount ?>" value="">
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
                        if (!$details->dateAvail == null) {
                          $date = date_create($details->dateAvail);
                          $newDate = date_format($date, "M-d-Y");
                        }else{
                          $newDate = "not set";
                        }
                           
                        ?>
                        <input type="text" id="date" class="form-control" placeholder="<?php echo $newDate ?>" disabled>
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
                          if (!$details->time == null) {
                            $newTime = date("g:i a", strtotime($details->time)); 
                          }else{
                            $newTime = "not set";
                          } 
                          
                        ?>
                        <input type="text" id="time" class="form-control" placeholder="<?php echo $newTime ?>" disabled>
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
            <?php if ($details->transactionstatus == "on-going"): ?>
              <button form="updateTransactionDetails" type="submit" class="btn btn-block btn-primary btn-lg">Update Details</button>
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
        $attributes = array("name" => "addAdditionalCharges", "id" => "addAdditionalCharges", "class" => "form-horizontal", "autocomplete" => "off");
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
              <?php  
                $formatedTotalAmount = number_format($totalAmount->totalAmount, 2);
              ?>
              <input type="text" id="totalAmountModal" name="totalAmountModal" class="form-control" placeholder="<?php echo $formatedTotalAmount ?>" disabled>
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
      <form id="finishTransaction" method="post" action="<?php echo base_url('transactions/markFinish') ?>">
        <div class="modal-body text-center form-horizontal">
          <p>Are you sure you want to finish this Transaction?</p>
          <div class="form-group">
            <label class="col-lg-3 control-label">Finish Date</label>
            <div class="col-lg-9">
              <input type="date" name="finishDate" id="finishDate" class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <input type="text" value="<?php echo $details->transactionID ?>" name="finish" hidden>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
      </form>
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
      <form id="cancellTransaction" method="post" action="<?php echo base_url('transactions/markCancel') ?>">
        <div class="modal-body text-center form-horizontal">
          <p>Are you sure you want to cancel?</p>
          <div class="form-group">
            <label class="col-lg-3 control-label">Cancell Date</label>
            <div class="col-lg-9">
              <input type="date" name="cancellDate" id="cancellDate" class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <input type="text" value="<?php echo $details->transactionID ?>" name="cancel" hidden>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>  <!-- /.modal -->
<!-- /Cancel Modal -->
<!-- refund deposit modal -->

<div class="modal fade" id="refundDeposit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Refund Deposit</h4>
      </div>
      <div id="refundConfirm">
        
      </div>
      <form id="refundTransactionDeposit" method="post" action="<?php echo base_url('transactions/refundDeposit') ?>" class="form-horizontal" autocomplete="off">
        <div class="modal-body text-center">
          <div class="form-group">
            <label class="col-sm-3 control-label">Client Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" placeholder="<?php echo $details->clientName ?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Deposit Amount</label>
            <div class="col-sm-9">
              <?php  
                $formatedDepositedAmountModal = number_format($details->depositAmt, 2);
              ?>
              <input type="text" id="depositModal" name="depositModal" class="form-control" placeholder="<?php echo $formatedDepositedAmountModal ?>" disabled>
            </div>
          </div>
          <div class="alert-info well">
            <p>Click on confirm to record refund</p>
          </div>
        </div>   
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</butto>
          <input type="text" value="<?php echo $details->transactionID ?>" name="refund" hidden>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- end refund modal -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>/public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>/public/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url(); ?>/public/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>/public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>/public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  //Script for updating the transaction details
  $('#updateTransactionDetails').submit(function(e){
    e.preventDefault();

    var transactionDetails = $(this);
    var cNum = $('#contactNumber').val().trim();
    var address = $('#address').val().trim();
    var yNs = $('#yNs').val().trim();
    var school = $('#school').val().trim();
    var idType = $('#idType').val().trim();
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
            $('#contactNumber').attr('placeholder', cNum);
          }
          if (response.address == true) {
            $('#address').attr('placeholder', address);
          }
          if (response.yNs == true) {
            $('#yNs').attr('placeholder', yNs);
          }
          if (response.school == true) {
            $('#school').attr('placeholder', school);
          }
          if (response.idType == true) {
            $('#idType').attr('placeholder', idType);
          }
          if (response.deposit == true) {
            $('#depositAmt').attr('placeholder', response.depositAmt);  
            $('#totalAmount').attr('placeholder', response.totalAmount);
            $('#balance').attr('placeholder', response.balance);
            $('#totalAmountModal').attr('placeholder', response.totalAmount);
            $('#depositModal').attr('placeholder', response.depositAmt);
          }
          if (response.newTime == true) {
            $('#time').attr('placeholder', response.newTimeValue);
          }
          if (response.newDate == true) {
            $('#date').attr('placeholder', response.newDateValue);
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

            $('#totalAmount').attr('placeholder', response.newTotalAmount);
            $('#balance').attr('placeholder', response.balance);
            $('#totalAmountModal').attr('placeholder', response.newTotalAmount);

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

    $('#finishTransaction').submit(function(e){
      e.preventDefault();

      var finishDetails = $(this);

      $.ajax({
        type: 'POST',
        url: finishDetails.attr('action'),
        data: finishDetails.serialize(),
        dataType: 'json',
        success: function(response){
          if (response.success == true) {
            
            window.location.href = "<?php echo base_url('transactions/finishedTransactions') ?>";

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

    $('#cancellTransaction').submit(function(e){
      e.preventDefault();

      var cancellDetails = $(this);

      $.ajax({
        type: 'POST',
        url: cancellDetails.attr('action'),
        data: cancellDetails.serialize(),
        dataType: 'json',
        success: function(response){
          if (response.success == true) {
            
            window.location.href = "<?php echo base_url('transactions/cancelledTransactions') ?>";

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

    $('#refundTransactionDeposit').submit(function(e){
      e.preventDefault();

      var refundDetails = $(this);

      $.ajax({
        type: 'POST',
        url: refundDetails.attr('action'),
        data: refundDetails.serialize(),
        dataType: 'json',
        success: function(response){
          if (response.success == true) {
            if (response.refunded == false) {
              $('div.alert-danger').remove();
              $('#refundConfirm').append('<div class="alert alert-danger text-center">' +
              '<span class="icon fa fa-ckeck"></span>' +
              ' This transaction has allready been refunded!' +
              '</div>');
              // reset the form
              refundDetails[0].reset();
            }else{

              $('#refundConfirm').append('<div class="alert alert-success text-center">' +
              '<span class="icon fa fa-ckeck"></span>' +
              ' Refund is successfully recorder' +
              '</div>');
              // reset the form
              refundDetails[0].reset();
            }
              
            // close the message after seconds
            $('.alert-success').delay(500).show(10, function() {
              $(this).delay(3000).hide(10, function() {
                $(this).remove();
              });
            })
          }
        }
      });
    });

</script>

