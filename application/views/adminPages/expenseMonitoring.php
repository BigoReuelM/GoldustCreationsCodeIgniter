
<script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.js"></script>
  <script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery-3.3.1.min.js"></script>
  <script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.min.js"></script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  </section>
  <section class="content container-fluid">
    <div classs="content">
      <div class="box">
        <div class="box-header with-border">
          <div class="row">
            <div class="col-lg-9">
              <h3 class="box-title">Expenses Table:</h3>
            </div>
            <div class="col-lg-3">
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
                <?php
                  if (!empty($expenses)) {
                     foreach ($expenses as $expense) {
          
                ?>
                <tr>
                  <td><?php  echo $expense['expensesID']; ?></td>
                  <td><?php  echo $expense['expensesAmount']; ?></td>
                  <td><?php  echo $expense['expensesName']; ?></td>
                  <td><?php  echo $expense['expenseDate']; ?></td>
                  <td><button href="#" data-toggle="modal" data-target="#modal-photo">View Photo</button></td>
                </tr>
                <?php
                    }
                  }else{
                    echo "0 data";
                  }
                ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <div class="control-sidebar-bg"></div>
</div>

<div class="modal fade" id="addexpenses" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <?php 
        $attributes = array("name" => "addExpenses", "id" => "addExpenses", "class" => "form-horizontal");
        echo form_open_multipart("admin/addExpenses", $attributes);
      ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Expenses</h4>
        </div>
        <div id="the-message">
          
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <label for="expenseName" class="control-label col-lg-3">Expense Name</label>
              <div class="col-lg-9">
                <input type="text" name="expenseName" id="expenseName" placeholder="Enter Expense Name..." class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="expenseDate" class="control-label col-lg-3">Date</label>
              <div class="col-lg-9">
                <input type="date" name="expenseDate" id="expenseDate" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="expenseAmount" class="control-label col-lg-3">Expenses Amount</label>
              <div class="col-lg-9">
                <input type="text" name="expenseAmount" id="expenseAmount" class="form-control" placeholder="Enter Amount here...">
              </div>
            </div>
            <div class="form-group">
              <label for="expenseReceipt" class="control-label col-lg-3">Receipt No.</label>
              <div class="col-lg-9">
                <input type="text" name="expenseReceipt" id="expenseReceipt" class="form-control" placeholder="Enter Receipt No. Here..">
              </div>
            </div> 
          </div>
        </div>
        <div class="modal-footer">
          <button name="upload" type="submit" class="btn btn-default">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      <?php echo form_close(); ?>
    </div>
    
  </div>
</div>


<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>/public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/public/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url();?>/public/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>/public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script>
    $(function () {
      $('#adminTable').DataTable()
      $('#handlerTable').DataTable()
      $('#expenseTable').DataTable()
    })
  </script>

  <script>
    $('#addExpenses').submit(function(e){
      e.preventDefault();

      var expensesDetails = $(this);

      $.ajax({
        type: 'POST',
        url: expensesDetails.attr('action'),
        data: expensesDetails.serialize(),
        dataType: 'json',
        success: function(response){
          if (response.success == true) {
            $('#the-message').append('<div class="alert alert-success text-center">' +
            '<span class="icon fa fa-ckeck"></span>' +
            ' New expense has been saved.' +
            '</div>');
            $('.form-group').removeClass('has-error')
                  .removeClass('has-success');
            $('.text-danger').remove();
            // reset the form
            expensesDetails[0].reset();
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