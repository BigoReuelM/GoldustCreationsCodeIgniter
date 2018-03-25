<?php 
  $empRole = $this->session->userdata('role');
 ?>
 <style type="text/css">
   #butt5 {
    width: 100px;
   }

 </style>
<!-- Main content -->
<section class="content container-fluid">
  <section class="content-header">
    <div class="row">
      <div class="col-lg-3">
          <h1>
            <?php
            //foreach ($eventName as $name) {
              $name = $eventName->eventName; 
              echo '<p>' . $name . '</p>';

            //}
              
            ?>
          </h1>        
      </div>
    </div>
  </section>
  <div class="row">
    <div class="box box-primary">
      <div class="box-body">
        <div class="col-lg-4">
          <form id="updateEventHandler" role="form" method="post" action="<?php echo base_url('events/selectEventHandler') ?>">
            <div class="box-header">
              <h3>Select Event Handler</h3>
              <?php  
                if ($empRole === 'admin') {
                  echo "<label>Select</label>";
                  echo "<select class='form-control' name='handler'>";
                  echo "<option selected disabled hidden>Choose Handler</option>";

                  foreach ($handlers as $handler) {
                    echo "<option value='" . $handler['employeeID'] . "'>" . $handler['employeeName'] . "</option>";
                  }

                  echo "</select>";
                }
              ?>
            </div>
            <div class="box-body box-profile">
              
              <div class="form-group">

                <?php 
                  if(!empty($currentHandler)){

                ?>
                
                <img class="profile-user-img img-responsive img-circle" src="data:image/jpeg;base64, <?php echo base64_encode($currentHandler->photo); ?>" alt="User profile picture">

                <h3 class="profile-username text-center"><?php echo $currentHandler->employeeName ?></h3>

                <p class="text-muted text-center">Event Handler</p>

                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Events</b> <a class="pull-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Transactions</b> <a class="pull-right">543</a>
                  </li>
                </ul>

                <?php 
                  }else{
                    echo "
                          No Handler Selected.
                          ";
                  }
                ?>
              </div>
            </div>
          </form>      
        </div>
        <div class="col-lg-8">
          
          <form id="updateDetails" role="form" method="post" action="<?php echo base_url('events/updateEventDetails') ?>">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Event Name</label>
                <input type="text" name="eventName" class="form-control" placeholder="<?php echo $eventDetail->eventName ?>" value="">
              </div>
              <div class="form-group">
                <label>Client Name</label>
                <input type="text" name="clientName" class="form-control" placeholder="<?php echo $eventDetail->clientName ?>" value="" disabled>
              </div>
              <div class="form-group">
                <label>Contact Number</label>
                <input type="text" name="contactNumber" class="form-control" placeholder="<?php echo $eventDetail->contactNumber ?>" value="">
              </div>
              <div class="form-group">
                <label>Celebrant</label>
                <input type="text" name="celebrantName" class="form-control" placeholder="<?php echo $eventDetail->celebrantName ?>" value="">
              </div>
              <div class="form-group">
                <label>Date Availed</label>
                <input type="text" name="dateAvailed" class="form-control" placeholder="<?php echo $eventDetail->dateAssisted ?>" value="">
              </div>
              <div class="form-group">
                <div class="col-lg-4">
                  <label>Package Availed</label>
                  <input type="text" class="form-control" placeholder="<?php echo $eventDetail->packageType ?>">  
                </div>
                <div class="col-lg-8">
                  <label>Change Package Type</label>
                  <div class="row">
                    <div class="col-lg-6">
                      <span class="radio"><label><input type="radio" name="package" value="full-Package">Full Package</label></span>
                    </div>
                    <div class="col-lg-6">
                      <span class="radio"><label><input type="radio" name="package" value="semi-Package">Semi Package</label></span>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Event Location</label>
                <input type="text" name="location" class="form-control" placeholder="<?php echo $eventDetail->eventLocation ?>" value="">
              </div>

              <div class="form-group">
                <label>Event Type</label>
                <input type="text" name="type" class="form-control" placeholder="<?php echo $eventDetail->eventType ?>" value="">
              </div>
              <div class="form-group">
                <label>Motif</label>
                <input type="text" name="motif" class="form-control" placeholder="<?php echo $eventDetail->motif ?>" value="">
              </div>
              <div class="form-group">
                <label>Theme</label>
                <input type="text" name="theme" class="form-control" placeholder="<?php echo $eventDetail->theme ?>" value="">
              </div>
              <div class="form-group">   
                <label>Total Amount Due</label>
                <input type="text" name="theme" class="form-control" placeholder="<?php echo $totalAmount->totalAmount ?>" disabled>        
              </div>
              <div class="form-group">
                
                <div class="col-lg-4">
                  <label>Event Date</label>
                  <input type="text" class="form-control" value="<?php echo $eventDetail->eventDate ?>" disabled>  
                </div>
                <div class="col-lg-8">
                  <label>Change Date</label>
                  <input type="date" class="form-control" name="eventDate">
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-4">
                  <label>Event Time</label>
                  <input type="text" class="form-control" value="<?php echo $eventDetail->eventTime ?>" disabled>
                </div>
                <div class="col-lg-8">
                  <label>Change Time</label>
                  <input type="time" class="form-control" name="eventTime">
                </div>
                
              </div>
            </div>
            
          </form>

        </div>
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-lg-4">
            <?php
              if ($empRole === 'admin') {
                 echo '<button form="updateEventHandler" type="submit" class="btn btn-block btn-primary btn-lg">Select Handler</button>';
               } 
            ?>
          </div>
          <div class="col-lg-4">
            <button form="updateDetails" type="submit" class="btn btn-block btn-primary btn-lg">Update Details</button>
          </div>
          <div class="col-lg-4">
            <button class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#addAdditionalChargesModal">Additional Charges</button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <?php if ($eventDetail->eventStatus === "on-going"): ?>
      <div class="col-lg-3">
          <button type="button" data-toggle="modal" data-target="#finishEventModal" class="btn btn-block btn-primary btn-lg">Finish Event</button>
      </div>

      <div class="col-lg-3">
        <button type="button" class="btn btn-block btn-danger btn-lg" data-toggle="modal" data-target="#cancellEvent">Cancel Event</button>
      </div>
      <div class="col-lg-3">
        <button type="button" class="btn btn-block btn-primary btn-lg">Print Event Details</button>
      </div>     
    <?php endif ?>

    <?php if ($eventDetail->eventStatus === "cancelled"): ?>
      <form form="form" method="post" action="<?php echo base_url('events/contEvent') ?>">
        <div class="col-lg-3">
          <button type="button" data-toggle="modal" data-target="#continueEventModal" class="btn btn-block btn-primary btn-lg">Continue Event</button>
        </div>
      </form>
      <div class="col-lg-3">
        <button type="button" class="btn btn-block btn-primary btn-lg">Print Event Details</button>
      </div>
    <?php endif ?>

    <?php if ($eventDetail->eventStatus === "finished"): ?>
      <div class="col-lg-3">
        <button type="button" class="btn btn-block btn-primary btn-lg">Print Event Details</button>
      </div>
    <?php endif ?>
          
  </div>

  <div class="control-sidebar-bg"></div> 
</section>
    
</div>


  <!-- Cancel event Modal -->
<div class="modal fade" id="cancellEvent" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cancel Event</h4>
        </div>
        <form role="form" method="post" action="<?php echo base_url('events/cancelEvent') ?>" class="form-horizontal">
          <div class="modal-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Refund Amount</label>
              <div class="col-sm-10">
                <input type="text" name="refundAmount" class="form-control" placeholder="Enter Amount to Refund...">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Date Refunded</label>
              <div class="col-sm-10">
                <input type="date" name="dateRefunded" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Date Cancelled</label>
              <div class="col-sm-10">
                <input type="date" name="dateCancelled" class="form-control">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="text" name="eventID" value="<?php echo $eventDetail->eventID ?>" hidden>
            <div class="col-lg-6">
              <button type="submit" class="btn btn-block btn-primary btn-lg">Cancel Event</button>
            </div>
            <div class="col-lg-6">
              <button type="button" class="btn btn-block btn-default btn-lg" data-dismiss="modal">Close</button>
            </div>
          </div>
        </form>
      </div>   
  </div>
</div>
<!-- End of cancel event modal -->


<!-- Add additional charges Modal -->
<div class="modal fade" id="addAdditionalChargesModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Additional Charges</h4>
        </div>
        <?php 
          $attributes = array("name" => "addAdditionalCharges", "id" => "addAdditionalCharges", "class" => "form-horizontal");
          echo form_open("events/addAdditionalCharges", $attributes);
        ?>
          <div id="the-message">
          
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Client Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="<?php echo $eventDetail->clientName ?>" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Total Amount</label>
              <div class="col-sm-10">
                <input type="text" id="newTotalAmount" name="newTotalAmount" class="form-control" placeholder="<?php echo $totalAmount->totalAmount ?>" disabled>
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
            <input type="text" name="eventID" value="<?php echo $eventDetail->eventID ?>" hidden>
            <div class="col-lg-6">
              <button type="submit" class="btn btn-block btn-primary btn-lg">Add</button>
            </div>
            <div class="col-lg-6">
              <button type="button" class="btn btn-block btn-default btn-lg" data-dismiss="modal">Close</button>
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>   
  </div>
</div>
<!-- End of add additional charges modal -->
<!-- Finish event modal -->
<div id="finishEventModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Finished Events</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="<?php echo base_url('events/finishEvent') ?>">       
            <input type="text" name="eventID" value="<?php echo $eventDetail->eventID ?>" hidden>
            <p>Are you sure you want to proceed?</p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Proceed</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--end of fisnish event modal-->
<!-- Finish event modal -->
<div id="continueEventModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Continue Event</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="<?php echo base_url('events/finishEvent') ?>">       
            <input type="text" name="eventID" value="<?php echo $eventDetail->eventID ?>" hidden>
            <p>Are you sure you want to continue?</p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Continue</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--end of fisnish event modal-->

  <!-- REQUIRED JS SCRIPTS -->
  <script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.min.js"></script>
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
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url();?>/public/dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function () {
      $('#serviceTable').DataTable()
      $('#staffTable').DataTable()
      $('#modalServcTbl').DataTable()
      $('#modalStaffTbl').DataTable()
    })

    function reset_chkbx() {
      $('input:checkbox').prop('checked', false);
    }
  </script>

<style>
  @media screen and (min-with: 768px){
    #add-event .modal-dialog {
      width:900px;
    }
  }

  #add-event .modal-dialog {
    width:90%;
  }

  #addServc .modal-dialog {
    width:70%;
  }

  #addStaff .modal-dialog {
    width: 70%;
  }
</style>

<script>
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
            $('#the-message').append('<div class="alert alert-success text-center">' +
            '<span class="icon fa fa-ckeck"></span>' +
            ' Additional Charges Applied.' +
            '</div>');
            $('.form-group').removeClass('has-error')
                  .removeClass('has-success');
            $('.text-danger').remove();
            // reset the form
            chargeDetails[0].reset();
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