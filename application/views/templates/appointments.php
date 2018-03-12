
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Appointments
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-lg-9">
              <h3 class="box-title">List of Appointments</h3>    
            </div>
            <div class="col-lg-3">
              <button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addappoint">Add Appointments</button> 
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="appointmentTable" class="table table-bordered table-striped text-center">
            <thead>
            
            <tr>
              <th>Date</th>
              <th>Time</th>
              <th>Agenda</th>
              <?php
                $empRole = $this->session->userdata('role');  
                if ($empRole === 'admin') {
                  echo "<th>Event Name</th>";
                  echo '<th>Handler</th>';
                }
              ?>
              
            </tr>

            </thead>
            <tbody>
              <?php 
                if (!empty($appointments)) {
                  foreach ($appointments as $appointment) {                
              ?>
              <tr>
                <td><?php echo $appointment['date'] ?></td>
                <td><?php echo $appointment['time'] ?></td>
                <td><?php echo $appointment['agenda'] ?></td>
                <?php
                  $empRole = $this->session->userdata('role');  
                  if ($empRole === 'admin') {
                ?>
                <td><?php echo $appointment['eventName'] ?></td>
                <td><?php echo $appointment['employeeName'] ?></td>
                <?php 
                  }
                ?>
              </tr>
              <?php  
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
            <!-- /.box-body -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

                <!-- Modal for adding of Appointments -->
<!-- Modal -->
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
          <form action="" class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-2 control-label">Client Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Email" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Agenda</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="5" placeholder="Enter Agenda..."></textarea>
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
<!-- End of Modal --> 

  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
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
    $('#appointmentTable').DataTable({
    })
   
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
<style>
  @media screen and (min-with: 768px){
    #editEntourage .modal-dialog {
      with:900px;
    }
  }
  @media screen and (min-with: 768px){
    #addEntourage .modal-dialog {
      with:950px;
    }
  }

</style>