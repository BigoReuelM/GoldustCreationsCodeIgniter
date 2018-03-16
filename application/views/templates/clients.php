

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Clients
		</h1>	
	</section>
  <section class="content container-fluid">
      <div class="box">
            <div class="box-header">
	            <div class="row">
		            <div class="col-lg-9">
						<h3>
							Clients Table
						</h3>	
					</div>
					<div class="col-lg-3">
						<button class="btn btn-block btn-lg btn-primary" data-toggle="modal" data-target="#addClient">Add New Client</button>
					</div>
				</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="allClientsTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Client Name</th>
                  <th>Registered Date</th>
                  <th>Contact Number</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	<?php 
                		if (!empty($clients)) {
                			foreach ($clients as $client) {
                				
                	?>
                	<tr>
	                    <td><?php echo $client['clientName'] ?></td>
	                    <td><?php echo $client['registrationDate'] ?></td>
	                    <td><?php echo $client['contactNumber'] ?></td>
	                    <td>
	                    	<div class="row">
	                    		<form role="form" action="">
		                    		<div class="col-lg-6">
		                    			<button class="btn btn-block btn-default">
		                    				Add Transaction
		                    			</button>
		                    		</div>
	                    		</form>
	                    		<div class="col-lg-6">
	                    			<button class="btn btn-block btn-default">
	                    				Add Event
	                    			</button>
	                    		</div>
	                    	</div>
	                    </td>
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
    
  <div class="control-sidebar-bg"></div>

</div>

</div>

<!-- modal -->
<div id="addClient" class="modal fade" role="dialog">
	<div class="modal-dialog">
	  	<div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span></button>
		      <h4 class="modal-title">Add New Client</h4>
		    </div>
		    <form role="form" method="post" class="form-horizontal" action="<?php echo base_url('clients/addClient') ?>">
			    <div class="modal-body">
			    	<div class="box-body">
			    		<div class="form-group">
			              <label class="col-sm-3 control-label">First Name</label>
			              <div class="col-sm-9">
			                <input type="text" class="form-control" name="firstname">
			              </div>
			            </div>
			            <div class="form-group">
			              <label class="col-sm-3 control-label">Middle Name</label>
			              <div class="col-sm-9">
			                <input type="text" class="form-control" name="middlename">
			              </div>
			            </div>
			            <div class="form-group">
			              <label class="col-sm-3 control-label">Last Name</label>
			              <div class="col-sm-9">
			                <input type="text" class="form-control" name="lastname">
			              </div>
			            </div>
			            <div class="form-group">
			              <label class="col-sm-3 control-label">Contact Number</label>
			              <div class="col-sm-9">
			                <input type="text" class="form-control" name="contact">
			              </div>
			            </div>
			    		<div class="form-group">
			              <label class="col-sm-3 control-label">Date Registerd:</label>
			              <div class="col-sm-9">
			              	<input type="date" class="form-control pull-right" name="addDate">
			              </div>
			            </div>
			    	</div>
			    </div>
			    <div class="modal-footer">
			      <div class="row">
			        <div class="col-lg-6">
			          <button type="submit" class="btn btn-block btn-primary">Add New Client</button>
			        </div>
			        <div class="col-lg-6">
			          <button class="btn btn-block btn-primary" data-dismiss="modal">Cancel</button>
			        </div>
			      </div>
			    </div>
			</form>
		</div>
	</div>
</div>


<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/public/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>/public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>s

<script>
	$(function () {
		$('#allClientsTable').DataTable({})
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