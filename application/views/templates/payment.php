<?php
  $empRole = $this->session->userdata('role');
  $empname = $this->session->userdata('firstName') . " " . $this->session->userdata('midName') . " " . $this->session->userdata('lastName');
?>


    <!-- Main content -->
    <section class="content container-fluid">

      <div class="content">
          <div class="box">
            <div class="box-header with-border">
              <div class="row">
                <div class="col-lg-5">
                  <h3 class="box-title">Payments Table:</h3>
                </div>
                <div class="col-lg-7">
                  <?php 
                    if ($empRole === "admin" && ($eventStatus === "on-going" || $eventStatus === "new")) {
                      echo '<button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addpayment">Add Payments</button>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="well">
                <div class="row">
                  <div class="col-lg-4">
                    <?php
                      $formatedTotalAmount = number_format($totalAmount->totalAmount, 2);
                      echo '<h3>Total Amount: Php ' . $formatedTotalAmount . '</h3>';
                    ?>
                  </div>
                  <div class="col-lg-4">
                    <div id="paidTotal">
                      <?php  
                        $formatedTotalPayment = number_format($totalPayments->total, 2);
                        echo '<h3>Total Amount Paid: Php' . $formatedTotalPayment . '</h3>';
                      ?>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div id="balance">
                      <?php
                        $formatedBalance = number_format($balance, 2);
                        echo '<h3>Balance: Php ' . $formatedBalance . '</h3>';
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <table id="paymentTable" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Client Name</th>
                    <th>Receiver</th>
                    <th>Amount</th>
                    <th>Date and Time of Payment</th>
                  </tr>
                </thead>
                <tbody id="paymentTableBody"> 
                  <?php
                    if(!empty($payments)){
                      foreach ($payments as $payment) {
                        
                  ?>
                  <tr>
                    <td><?php echo $clientName->clientName; ?></td>
                    <td><?php echo $payment['employeeName'] ?></td>
                    <td>
                      <?php 
                        $amount = number_format($payment['amount'], 2);
                        echo $amount;
                      ?>
                    </td>
                    <td>
                      <?php
                        $date = date_create($payment['date']);
                        $newDate = date_format($date, "M-d-Y");
                        $newTime = date("g:i a", strtotime($payment['time'])); 
                        echo $newDate . " at " . $newTime; 
                      ?>
                    </td>
                  </tr>
                  <?php
                      }
                    }else {
                      echo "0 data";
                    } 
                  ?>
                </tbody>
              </table>
            
          </div>
          </div>

      </div>
    </section>
    <!-- /.content -->
  </div>
<!-- Add Payment Modal -->
<div class="modal fade" id="addpayment" role="dialog">
  <div class="modal-dialog">  
    <!-- Modal content-->
    <div class="modal-content">
      <?php 
        $attributes = array("name" => "addNewPayment", "id" => "addNewPayment", "class" => "form-horizontal","autocomplete" => "off");
        echo form_open("events/addPayment", $attributes);
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
          <div class="form-group">
            <label class="col-lg-3 control-label">Client Name</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" value="<?php echo $clientName->clientName; ?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Event Name</label>
            <div class="col-lg-9">
              <?php
                if (empty($eventName->eventName) || $eventName->eventName == null) {
                   $currentEventName = "Event Name Not Set!";
                }else{
                  $currentEventName = $eventName->eventName;
                } 
              ?>
              <input type="text" class="form-control" value="<?php echo $currentEventName ?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Amount</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter amount..">
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
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      <?php echo form_close(); ?>
    </div>
    
  </div>
</div>
<!-- End of add payment modal -->
<!-- Modal for add expenses -->

<!-- end modal for add expenses -->
  <!-- /.content-wrapper -->

  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>/public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>/public/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>/public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $('#expenseTable').DataTable({
    })
    $('#paymentTable').DataTable({
    })
  })
</script>


<script>
      $('#addNewPayment').submit(function(e){
      e.preventDefault();

      var paymentDetails = $(this);
      var amount = $('#amount').val();
      $.ajax({
        type: 'POST',
        url: paymentDetails.attr('action'),
        data: paymentDetails.serialize(),
        dataType: 'json',
        success: function(response){
          if(response.hasBalance == true){
            if (response.success == true) {
              var eventBalance = response.balanceAmount - amount;
              var dateTime = response.dateTime;
              var client = response.client;
              var receiver = "<?php echo $empname ?>";

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

              $('td.dataTables_empty').remove();
              
              $('#paymentTableBody').prepend(
                '<tr>' +
                  '<td>' + client + '</td>' +
                  '<td>' + receiver + '</td>' +
                  '<td>' + response.amount + '</td>' +
                  '<td>' + dateTime + '</td>' +
                '</tr>'
              );

              $('#balance h3').html("Balance: Php " + response.balance);
              $('#paidTotal h3').html("Total Amount Paid: Php " + response.totalAmountPaid);
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
              ' This event is fully paid!' +
              '</span>' +
              '</div>'
            );
          }
        }
      });
    });
</script>