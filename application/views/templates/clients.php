<style type="text/css">
   #butt5 {
    width: 100px;
  }
  .popover-title {
    color: #3c8dbc;
    font-size: 15px;
  }
  .popover-content {
    font-size: 12px;
  }
  .popover{
    max-width: 30%;
  }
  th {
    text-align: center;
  }
  .tblnum {
    text-align: right;
  }
</style>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Clients
      <div class="pull-right">
        <a href="#" data-toggle="popover" data-placement="left" data-trigger="focus" data-html="true" title="Tips:" data-content="Simply click on <b>Add New Client</b> button to add new client. Upon clicking the button, add value to the input fields and click <b> Ok</b>. Also click <b>Add Event </b> button to add an event to a specific client."><i class="fa fa-question-circle-o"></i></a>
      </div>
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
	                    <td class="tblnum">
                        <?php
                          $date = date_create($client['registrationDate']); 
                          $formatedDateAndTime = date_format($date, "M-d-Y");
                          echo $formatedDateAndTime ;
                        ?>
                      </td>
	                    <td class="tblnum"><?php echo $client['contactNumber'] ?></td>
	                    <td>
                        <?php if ($this->session->userdata('role') === "admin"): ?>
                          <button class="btn btn-block btn-default addTransactionButton" data-toggle="modal" data-target="#addNewTransaction" value="<?php echo($cID . ',' . $client['clientName'])?>" >
                              Add Transaction
                          </button> 
                        <?php endif ?>
                    		<?php if ($this->session->userdata('role') === "handler"): ?>
                          <button class="btn btn-block btn-default addEventButton" data-toggle="modal" data-target="#addNewEvent" value="<?php echo($cID . ',' . $client['clientName'])?>">Add Event</button>
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
        <h4 class="modal-title">Add Event</h4>
      </div>
      <div class="modal-body form-horizontal">
        <div class="well">
          <h4 id="clientNameModal" class="text-center"></h4>  
        </div>
          <div class="well">
            <form id="addEvent" action="<?php echo base_url('events/addEvent') ?>" autocomplete="off">
              <div class="form-group">
                <label class="col-lg-3 control-label">Event Name</label>
                <div class="col-lg-9">
                  <input type="text" id="eventName" name="eventName" placeholder="Enter Event Name" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Celebrant</label>
                <div class="col-lg-9">
                  <input type="text" id="celebrantName" name="celebrantName" placeholder="Enter Celebrant Name" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Avail Date</label>
                <div class="col-lg-9">
                  <input type="date" name="availDate" id="availDate" class="form-control" value="<?php echo $currentDate ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Event Date</label>
                <div class="col-lg-9">
                  <input type="date" name="eventDate" id="eventDate" class="form-control">
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
                  <input type="number" id="eventDuration" name="eventDuration" class="form-control">
                </div>
              </div>
              <input type="text" id="clientID" name="clientID" hidden>
            </form>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" form="addEvent" class="btn btn-primary">Ok</button>
        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>


<div id="addNewTransaction" class="modal fade" role="diallog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Add Transaction</h4>
      </div>
      <div class="modal-body">
          <div class="well">
            <h4 id="transactionClientNameModal" class="text-center"></h4>    
          </div>
          <div class="well form-horizontal">
            <form id="addTransaction" action="<?php echo base_url('transactions/addTransaction') ?>" autocomplete="off">
              
              <div class="form-group">
                <label class="col-lg-3 control-label">Avail Date:</label>
                <div class="col-lg-9">
                  <input type="date" name="transactionAvailDate" id="transactionAvailDate" class="form-control" value="<?php echo $currentDate ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Avail Time:</label>
                <div class="col-lg-9">
                  <input type="time" name="transactionAvailTime" id="transactionAvailTime" class="form-control" value="<?php echo $currentTime ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Handler:</label>
                <div class="col-lg-9">
                  <select name="handler" id="handler" class="form-control">
                    <option hidden selected disabled>Choose Handler..</option>
                    <?php foreach ($handlers as $handler): ?>
                      <option value="<?php echo $handler['employeeID'] ?>"><?php echo $handler['handlerName'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <input type="text" id="transactionClientID" name="transactionClientID" hidden>
            </form>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" form="addTransaction" class="btn btn-primary">Ok</button>
        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- modal -->
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
              <label class="control-label col-lg-3">First Name</label>
              <div class="col-lg-9">
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
              <label class="control-label col-lg-3">Date Registered:</label>
              <div class="col-lg-9">
                <input type="date" class="form-control" id="adddate" name="adddate" value="<?php echo $currentDate ?>">
              </div>
            </div>
		    	</div>
		    </div>
		    <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Ok</button>
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
		$('#allClientsTable').DataTable()
	});
</script>
<!-- <script>
  $(function(){
    $('#availDate').datepicker({
      autoclose: true
    });
    $('#eventDate').datepicker({
      autoclose: true
    });
  });
</script> -->
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

            $('td.dataTables_empty').remove();

            $('#allClientsTable').prepend(
              '<tr>'+
              '<td>' + response.clientName + '</td>' +
              '<td>' + response.regDate + '</td>' +
              '<td>' + response.contactNumber + '</td>' +
              '<td>' + response.button + '</td>' +
              '</tr>'
            );
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
<script>
    $('.addTransactionButton').click(function(){
      var clientinfo = $(this).val().split(',');
      $('#transactionClientID').val(clientinfo[0]);
      $('#transactionClientNameModal').text(" Add Event For " + clientinfo[1] + "?");

    });

    $(document).on('click', '.newClientAddTransactionButton', function(){
      $('#addNewTransaction').modal('show');
      var newClientInfo = $(this).val().split(',');
      $('#transactionClientID').val(newClientInfo[0]);
      $('#transactionClientNameModal').text(" Add Event For " + newClientInfo[1] + "?");
    });
</script>
<script>
    $('.addEventButton').click(function(){
      var clientinfo = $(this).val().split(',');
      $('#clientID').val(clientinfo[0]);
      $('#clientNameModal').text(" Add Event For " + clientinfo[1] + "?");

    });

    $(document).on('click', '.newClientAddEventButton', function(){
      $('#addNewEvent').modal('show');
      var eventclientinfo = $(this).val().split(',');
      $('#clientID').val(eventclientinfo[0]);
      $('#clientNameModal').text(" Add Event For " + eventclientinfo[1] + "?");
    });
</script> 
<script>
    $('#addEvent').submit(function(e){
      e.preventDefault();

      var eventDetails = $(this);

      $.ajax({
        type: 'POST',
        url: eventDetails.attr('action'),
        data: eventDetails.serialize(),
        dataType: 'json',
        success: function(response){
          if (response.success == true) {
            window.location.href = "<?php echo base_url('events/eventDetails'); ?>";
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
<script>
    $('#addTransaction').submit(function(e){
      e.preventDefault();

      var transactionDetails = $(this);

      $.ajax({
        type: 'POST',
        url: transactionDetails.attr('action'),
        data: transactionDetails.serialize(),
        dataType: 'json',
        success: function(response){
          if (response.success == true) {
            window.location.href = "<?php echo base_url('transactions/transactionDetails'); ?>";
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
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>