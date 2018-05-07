
</style>
  <!-- Content Header (Page header) -->
  <section class="content container-fluid">
    <div class="box box-info">
      <!--list of appointments col-->
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-md-6">
              <h3 class="box-title">List of Appointments</h3>
            </div>
            <?php if ($transactionStatus === "on-going"): ?>
              <div class="col-md-6">
                <button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addappoint">Add Appointment</button>
              </div>
            <?php endif ?>
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
            <tbody id="appTable">
              <?php if (!empty($transAppointments)){
                  foreach ($transAppointments as $appointment) {
              ?>
                <tr>
                  <td>
                    <?php
                      $date = date_create($appointment['date']);
                      $newDate = date_format($date, "M-d-Y"); 
                      echo $newDate; 
                    ?>
                  </td>
                  <td>
                    <?php
                      $newTime = date("g:i a", strtotime($appointment['time']));
                      echo $newTime;  
                    ?>
                  </td>
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
        <div id="appointConfirm">
        </div>
      </div>
      <?php 
        $attributes = array("name" => "addNewAppointment", "id" => "addNewAppointment", "class" => "form-horizontal","autocomplete" => "off");
        echo form_open("transactions/addTransactionAppointments", $attributes);
      ?>
        <div class="modal-body">       
          <div class="box-body">          
            <div class="form-group">
              <label class="col-sm-2 control-label">Agenda</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="agenda" name="agenda" rows="5" placeholder="Enter Agenda..." name="agenda"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Date of appointment:</label>
              <div class="col-lg-8">
                <input class="form-control" type="date" id="appointmentDate" name="appointmentDate">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-4 control-label">Time of appointment:</label>
              <div class="col-lg-8">
                <input type="time" class="form-control" name="appointmentTime" id="appointmentTime">
              </div>
            </div>
          </div>
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-6">
                <button type="submit" class="btn btn-block btn-default" >Save</button>                
              </div>
              <div class="col-sm-6">
                <button type="button" class="btn btn-block btn-default" data-dismiss="modal">Close</button>  
              </div>             
            </div>
          </div>
        </div>
      <?php echo form_close(); ?>
    </div>  
  </div>
</div>
<!-- End -->


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
  });

  //script for adding of appointments
  $('#addNewAppointment').submit(function(e){
    e.preventDefault();

    var appointmentDetails = $(this); 

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
            '<td>' + response.date + '</td>' +
            '<td>' + response.time + '</td>' +
            '<td>' + response.agenda + '</td>' +
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

</script>

