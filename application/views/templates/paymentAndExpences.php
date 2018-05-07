<?php
  $empRole = $this->session->userdata('role');
  $tAmount = $totalAmount->totalAmount; 
  $totalAmountPaid = $totalPayments->total;
  $totalBudget = $tAmount * .30;
  $eventBalance = $balance->balance;
  
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Payments And Expenses
      </h1>
    </section>

    <?php
    $success_msg= $this->session->flashdata('success_msg');
    $error_msg= $this->session->flashdata('error_msg');

    if ($success_msg) {
  ?>
      <div class="alert alert-success">
        <?php echo $success_msg; ?>
      </div>
    <?php  
    }
    if ($error_msg) {
      ?>
      <div class="alert alert-danger">
        <?php echo $error_msg; ?>
      </div>
      <?php 
    }
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
                    if ($empRole === "admin") {
                      echo '<button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addpayment">Add Payments</button>';
                    }
                  ?>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div>
                <?php 
                  echo '<h3>Balance: </h3> <h1>Php ' . $eventBalance . '</h1>';
                 ?>
                
              </div>
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
                  <?php
                    if(!empty($payments)){
                      foreach ($payments as $payment) {
                        
                  ?>
                  <tr>
                    <td><?php echo $payment['paymentID']; ?></td>
                    <td><?php echo $payment['amount']; ?></td>
                    <td><?php echo $payment['date']; ?></td>
                    <td><?php echo $payment['time']; ?></td>
                  </tr>
                  <?php
                      }
                    }else {
                      echo "0 data";
                    } 
                  ?>
                </tbody>
              </table>

            <div class="">
              <?php
                echo '<h3>Total Amount: Php ' . $tAmount . '</h3>';
                echo '<h3>Total Amount Paid: Php' . $totalAmountPaid . '</h3>';
               ?>
              
            </div>
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
        $attributes = array("name" => "addNewPayment", "id" => "addNewPayment", "class" => "form-horizontal");
        echo form_open("events/addPayment", $attributes);
      ?>
      <div id="the-message">
        
      </div>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Payment</h4>
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
              <input type="text" class="form-control" value="<?php echo $eventName->eventName; ?>" disabled>
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

      $.ajax({
        type: 'POST',
        url: paymentDetails.attr('action'),
        data: paymentDetails.serialize(),
        dataType: 'json',
        success: function(response){
          if (response.success == true) {
            // if success we would show message
            // and also remove the error class
            $('#the-message').append('<div class="alert alert-success text-center">' +
            '<span class="glyphicon glyphicon-ok"></span>' +
            ' New payment has been saved.' +
            '</div>');
            $('.form-group').removeClass('has-error')
                  .removeClass('has-success');
            $('.text-danger').remove();
            // reset the form
            paymentDetails[0].reset();
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