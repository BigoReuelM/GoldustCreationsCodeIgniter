

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
                			$cID = $client['clientID'];
                	?>
                	<tr>
	                    <td><?php echo $client['clientName'] ?></td>
	                    <td>
                        <?php
                          $date = date_create($client['registrationDate']); 
                          $formatedDateAndTime = date_format($date, "M-d-Y g:i a");
                          echo $formatedDateAndTime ;
                        ?>
                      </td>
	                    <td><?php echo $client['contactNumber'] ?></td>
	                    <td>
                        <?php if ($this->session->userdata('role') === "admin"): ?>
                          <form role="form" method="post" action="<?php echo base_url('transactions/addTransaction') ?>">
                            <input type="text" name="clientID" value="<?php echo($cID) ?>" hidden>
                            <button type="submit" class="btn btn-block btn-default">
                              Add Transaction
                            </button>
                          </form>  
                        <?php endif ?>
                    		<?php if ($this->session->userdata('role') === "handler"): ?>
                          <!-- <form role="form" method="post" action="<?php echo base_url('events/addEvent') ?>">
                            <input type="text" name="clientID" value="<?php echo($cID) ?>" hidden>
                            <button type="submit" class="btn btn-block btn-default">
                              Add Event
                            </button>
                          </form> -->
                          <button class="btn btn-block btn-default" data-toggle="modal" data-target="#addNewEvent">Add Event</button>
                        <?php endif ?>	                    	
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
<div id="addNewEvent" class="modal fade" role="diallog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Add New Event for "Client Name"</h4>
      </div>
      <div class="modal-body form-horizontal">
        <div class="form-group">
          <label class="col-lg-3 control-label">Event Name</label>
          <div class="col-lg-9">
            <input type="text" name="eventName" placeholder="Enter Event Name" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Celebrant</label>
          <div class="col-lg-9">
            <input type="text" name="celebrantName" placeholder="Enter Celebrant Name" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Avail Date</label>
          <div class="col-lg-9">
            <input type="text" name="availDate" id="availDate" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Event Date</label>
          <div class="col-lg-9">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="eventDate" id="eventDate" class="form-control pull-right">
              </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Event Time</label>
          <div class="col-lg-9">
            <input type="time" name="eventTime" id="eventTime" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Duration(days)</label>
          <div class="col-lg-9">
            <input type="number" name="eventDuration" class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary">Confirm</button>
        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- modal -->
<div id="addClient" class="modal fade" role="dialog">
	<div class="modal-dialog">
	  	<div class="modal-content">
        <?php 
          $attributes = array("name" => "addNewClient", "id" => "addNewClient", "class" => "form-horizontal", "autocomplete" => "off");
          echo form_open("clients/addClient", $attributes);
        ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Add New Client</h4>
        </div>
        <div id="the-message">
          
        </div>
		    <div class="modal-body">
		    	<div class="box-body">
            <div class="form-group">
              <label class="control-label col-sm-3">First Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name ..">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-lg-3">Middle Name</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Enter middle name ..">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-lg-3">Last Name</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name ..">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-lg-3">Contact Number</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter contact Number ..">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-lg-3">Date Registerd:</label>
              <div class="col-lg-9">
                <input type="date" class="form-control" id="adddate" name="adddate">
              </div>
            </div>
		    	</div>
		    </div>
		    <div class="modal-footer">
          <button type="submit" class="btn btn-default">Add New Client</button>
          <button class="btn btn-default" data-dismiss="modal">Cancel</button>
		    </div>
			  <?php echo form_close(); ?>
		</div>
	</div>
</div>


<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/public/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>/public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>/public/bower_components/fastclick/lib/fastclick.js"></script>

<!-- date-picker -->

<script src="<?php echo base_url(); ?>/public/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>/public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
	$(function () {
		$('#allClientsTable').DataTable({})
	});

  $(function(){
    $('#availDate').datepicker({
      autoclose: true;
    });
    $('#eventDate').datepicker({
      autoclose: true;
    });
  });
</script>
<script>
      $('#addNewClient').submit(function(e){
      e.preventDefault();

      var clientDetails = $(this);

      $.ajax({
        type: 'POST',
        url: clientDetails.attr('action'),
        data: clientDetails.serialize(),
        dataType: 'json',
        success: function(response){
          if (response.success == true) {
            // if success we would show message
            // and also remove the error class
            $('#the-message').append('<div class="alert alert-success text-center">' +
            '<span class="glyphicon glyphicon-ok"></span>' +
            ' New client has been saved.' +
            '</div>');
            $('.form-group').removeClass('has-error')
                  .removeClass('has-success');
            $('.text-danger').remove();
            // reset the form
            clientDetails[0].reset();
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