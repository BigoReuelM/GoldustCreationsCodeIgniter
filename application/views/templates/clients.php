<script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.js"></script>
  <script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery-3.3.1.min.js"></script>
  <script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.min.js"></script>

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
	                    <td><?php echo $client['registrationDate'] ?></td>
	                    <td><?php echo $client['contactNumber'] ?></td>
	                    <td>
	                    	<div class="row">
	                    		<form role="form" method="post" action="<?php echo base_url('transactions/addTransaction') ?>">
		                    		<div class="col-lg-6">
                              <input type="text" name="clientID" value="<?php echo($cID) ?>" hidden>
		                    			<button type="submit" class="btn btn-block btn-default">
		                    				Add Transaction
		                    			</button>
		                    		</div>
	                    		</form>
                          <form role="form" method="post" action="<?php echo base_url('events/addEvent') ?>">
  	                    		<div class="col-lg-6">
                              <input type="text" name="clientID" value="<?php echo($cID) ?>" hidden>
    	                    			<button type="submit" class="btn btn-block btn-default">
    	                    				Add Event
    	                    			</button>
  	                    		</div>
                          </form>
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
		        <span aria-hidden="true">&times;</span>
          </button>
		      <h4 class="modal-title">Add New Client</h4>
		    </div>
        <?php 
          $attributes = array("name" => "addNewClient", "id" => "addNewClient", "class" => "form-horizontal");
          echo form_open("clients/addClient", $attributes);
        ?>
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
            ' New employee has been saved.' +
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