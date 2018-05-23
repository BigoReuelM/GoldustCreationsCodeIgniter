<?php 
  $empRole = $this->session->userdata('role');
 ?>
 <style type="text/css">
   #butt5 {
    width: 100px;
 </style>

<section class="content-header">
  <h1>
    Event Name: 
    <?php
      $name = $eventName->eventName; 
      echo '<b>' . $name . '</b>';    
    ?>
  </h1>
</section>

<section class="content container-fluid">

    <div class="box box-primary">
      <div class="box-header">
        <div class="row">
          <div class="col-lg-12">
            <div class="navbar-custom-menu pull-right">
              <ul class="nav navbar-nav">
                <li class="dropdown tasks-menu">
                  <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                    <i class="fa fa-cogs"></i>
                    <span class="label label-info">Actions</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <ul class="menu">
                        <li class="text-center">
                          <a href="#printDetails" type="button" class="btn btn-default" data-toggle="modal" data-target="#printDetails">
                            <i class="fa fa-print pull-left"></i>
                            <span>Print Event Details</span>
                          </a>
                        </li>
                        <?php if ($eventDetail->eventStatus == "on-going"): ?>
                          <?php if ($empRole === "admin"): ?>
                            <li class="text-center">
                              <a href="#addAdditionalChargesModal" type="button" class="btn btn-default" data-toggle="modal" data-target="#addAdditionalChargesModal">
                                <i class="fa fa-money pull-left"></i>
                                <span>Add Additional Charges</span>
                              </a>
                            </li>
                          <?php endif ?>
                          <li class="text-center">
                            <a href="#finishEvent" type="button" class="btn btn-default" data-toggle="modal" data-target="#finishEventModal">
                              <i class="fa fa-check pull-left"></i>
                              <span>Finish Event</span>
                            </a>
                          </li>
                          <li class="text-center">
                            <a href="#cancellEvent" type="button" class="btn btn-default" data-toggle="modal" data-target="#cancellEvent">
                              <i class="fa fa-close pull-left"></i>
                              <span>Cancel Event</span>
                            </a>
                          </li>
                        <?php endif ?>
                        <?php if ($eventDetail->eventStatus == "cancelled"): ?>
                          <li class="text-center">
                            <a href="#continueEventModal" type="button" class="btn btn-default" data-toggle="modal" data-target="#continueEventModal">
                              <i class="fa fa-circle-o-notch pull-left"></i>
                              <span>Continue Event</span>
                            </a>
                          </li>
                        <?php endif ?>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>       
      </div>
      <div class="box-body">
        <div class="col-lg-3">
          <div class="form-group well">   
            <label>Total Amount Due</label>
            <?php 
              $formatedTotal = number_format($totalAmount->totalAmount, 2);
            ?>
            <input type="text" name="totalAmount" id="totalAmount" class="form-control" placeholder="<?php echo $formatedTotal ?>" disabled>        
          </div>
          <form id="updateEventHandler" role="form" method="post" action="<?php echo base_url('events/selectEventHandler') ?>">
            <div class="box-header text-center">
              <h3>Event Handler</h3>
              <?php  
                if ($empRole === 'admin') {
                  echo "<select class='form-control' name='handler' id='handler'>";
                  echo "<option selected disabled hidden>Choose Handler</option>";

                  foreach ($handlers as $handler) {
                    echo "<option value='" . $handler['employeeID'] . "'>" . $handler['employeeName'] . "</option>";
                  }

                  echo "</select>";
                }else{
                  echo "<select class='form-control' name='handler' disabled>";
                  echo "<option selected disabled hidden>Choose Handler</option>";
                  echo "</select>";                  
                }
              ?>
            </div>
            <div class="box-body box-profile">
              
              <div class="form-group">

                <?php 
                  if(!empty($currentHandler)){

                ?>
                
                <img id="handlerImage" class="profile-user-img img-responsive img-circle" src="<?php echo base_url('/uploads/profileImage/' . $currentHandler->employeeID . ''); ?>" alt="User profile picture" onerror="this.onerror=null;this.src='<?php echo base_url('/uploads/profileImage/default'); ?>';">

                <h3 class="profile-username text-center" id="handlerName"><?php echo $currentHandler->employeeName ?></h3>

                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item" id="list6">
                    <b>Events Currently Handling</b> <a class="pull-right" id="eventCount"><?php echo $currentEventNum->count ?></a>
                  </li>
                  <li class="list-group-item" id="list6">
                    <b>Handled Events</b> <a class="pull-right" id="doneEventCount"><?php echo $doneEvent->count ?></a>
                  </li>
                  <li class="list-group-item" id="list6">
                    <b>Transactions</b> <a class="pull-right" id="transactionCount"><?php echo $allTransac->count ?></a>
                  </li>
                </ul>

                <?php 
                  }
                ?>
              </div>
            </div>
          </form>      
        </div>
        <div class="col-lg-9 well">
          
          <form id="updateEventDetails" role="form" method="post" action="<?php echo base_url('events/updateEventDetails') ?>" autocomplete="off">
            <div class="row">
              <span><p class="text-info" style="font-size:12px;"><b class="fa fa-question-circle-o"></b>Simply change value of input fields and click on <b>Update Details</b> button to make changes.</p></span>
              <hr>
            </div>
            <div id="update-message">
              
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Client Name</label>
                <input type="text" name="clientName" class="form-control" placeholder="<?php echo $eventDetail->clientName ?>" value="" disabled>
              </div>
              <div class="form-group">
                <label>Contact Number</label>
                <input type="text" name="contactNumber" id="contactNumber" class="form-control" placeholder="<?php echo $eventDetail->contactNumber ?>" value="">
              </div>
              <div class="form-group">
                <label>Celebrant</label>
                <input type="text" name="celebrantName" id="celebrantName" class="form-control" placeholder="<?php echo $eventDetail->celebrantName ?>" value="">
              </div>
              <div class="form-group">
                <label>Event Name</label>
                <input type="text" id="eventName" name="eventName" class="form-control" placeholder="<?php echo $eventDetail->eventName ?>" value="">
              </div>
              <div class="form-group">
                <label>Event Location</label>
                <input type="text" name="location" id="location" class="form-control" placeholder="<?php echo $eventDetail->eventLocation ?>" value="">
              </div>

              <div class="form-group">
                <label>Event Type</label>
                <input type="text" name="type" id="type" class="form-control" placeholder="<?php echo $eventDetail->eventType ?>" value="">
              </div>
              
            </div>
            <div class="col-lg-6">
              
              <div class="form-group">
                <label>Motif</label>
                <input type="text" name="motif" id="motif" class="form-control" placeholder="<?php echo $eventDetail->motif ?>" value="">
              </div>

              <div class="form-group">
                <label>Theme</label>
                <select name="theme" id="theme" class="form-control">
                  <option hidden selected disabled id="themeNameHolder"><?php echo $themeName['themeName'] ?></option>
                  <?php foreach ($themes as $theme): ?>
                    <option value="<?php echo $theme['themeID'] ?>"><?php echo $theme['themeName'] ?></option>
                  <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
              <label>Package Availed</label>
              <select name="package" id="package" class="form-control">
                <option selected hidden disabled id="packageNameHolder"><?php echo $eventDetail->packageType ?></option>
                <option value="full-package">Full-Package</option>
                <option value="semi-package">Semi-Package</option>
              </select>  
            </div>
              <div class="form-group">
                <label>Date Availed</label>
                <?php
                  if (!$eventDetail->dateAssisted == null) {
                    $date = date_create($eventDetail->dateAssisted);
                    $dateAvailed = date_format($date, "M-d-Y");
                  }else{
                    $dateAvailed = "not set";
                  }
                ?>
                <div class="input-group">
                  <input type="text" class="form-control" id="dateAvl" placeholder="<?php echo $dateAvailed ?>" hidden>
                  <div class="input-group-addon">
                    <button type="button" id="newAvaileDateButton"><i class="fa fa-pencil"></i></button>
                  </div>
                </div>
              </div>
              <div class="form-group alert-warning" id="dateAvailedInputField">
                
              </div>           
              <div class="form-group">
                
                <!-- <div class="col-lg-6"> -->
                  <label>Event Date</label>
                  <?php

                    if (!$eventDetail->eventDate == null) {
                      $eventdate = date_create($eventDetail->eventDate);
                      $newDate = date_format($eventdate, "M-d-Y");
                    }else{
                      $newDate = "not set";
                    }
                                        
                  ?>
                  <div class="input-group">
                    <input type="text" class="form-control" id="date" placeholder="<?php echo $newDate ?>">
                    <div class="input-group-addon">
                      <button type="button" id="newEventDateButton"><i class="fa fa-pencil"></i></button>
                    </div>
                  </div>  
                </div>
                <div class="form-group alert-warning" id="eventDateInputField">

                </div>
              

              <div class="row">
                <!-- <div class="col-lg-6"> -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Event Time</label>
                    <?php

                      if (!$eventDetail->eventTime == null) {
                        $newTime = date("g:i a", strtotime($eventDetail->eventTime));
                      }else{
                        $newTime = "not set";
                      }     
                                          
                    ?>
                    <div class="input-group">
                      <input type="text" class="form-control" id="time" placeholder="<?php echo $newTime?>">
                      <div class="input-group-addon">
                        <button type="button" id="newEventTimeButton"><i class="fa fa-pencil"></i></button>
                      </div>
                    </div>
                    <div class="form-group alert-warning" id="eventTimeInputField">
                    
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="">Duration</label>
                    <input type="number" name="duration" id="duration" min="1" class="form-control" placeholder="<?php echo $eventDetail->eventDuration ?>">
                  </div>
                </div>
              </div>

            </div>
          </form>

        </div>
      </div>
      <div class="box-footer">
        <div class="row">
          <?php if ($eventDetail->eventStatus == "on-going" || $eventDetail->eventStatus == "new"): ?>
            <div class="col-lg-3">
              <?php
                if ($empRole === 'admin') {
                   echo '<a href="#" data-toggle="tooltip" title="Choose Handler and Click to Change Handler"><button form="updateEventHandler" type="submit" class="btn btn-primary btn-block">Select Handler</button></a>';
                }else{
                  echo '<button form="updateEventHandler" type="submit" class="btn btn-primary btn-block" disabled>Select Handler</button>';
                } 
              ?>
            </div>
            <div class="col-lg-9">
              <button form="updateEventDetails" type="submit" class="btn btn-block btn-primary">Update Details</button>
            </div>
          <?php endif ?>
        </div>
      </div>
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
        <div id="cancelMessage">
          
        </div>
        <form role="form" method="post" action="<?php echo base_url('events/cancelEvent') ?>" class="form-horizontal" autocomplete="off" id="cancelEventForm">
          
          <div class="modal-body">
            <div class="well text-center">
              <p>Cancel this event: <b><?php echo $eventName->eventName ?></b></p>
            </div>
            <div class="well">
              <div class="form-group">
                <label class="col-lg-5 col-md-5 col-sm-5 control-label">Refund Amount</label>
                <div class="col-lg-7 col-md-7 col-sm-7">
                  <input type="text" name="refundAmount" id="refundAmount" class="form-control" placeholder="Enter Amount to Refund...">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-5 col-md-5 col-sm-5 control-label">Date Refunded</label>
                <div class="col-lg-7 col-md-7 col-sm-7">
                  <input type="date" name="dateRefunded" value="<?php echo $currentDate ?>" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-5 col-md-5 col-sm-5 control-label">Date Cancelled</label>
                <div class="col-lg-7 col-md-7 col-sm-7">
                  <input type="date" name="dateCancelled" value="<?php echo $currentDate ?>" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="text" name="eventID" value="<?php echo $eventDetail->eventID ?>" hidden>
            <button type="submit" class="btn btn-primary">Ok</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
          $attributes = array("name" => "addAdditionalCharges", "id" => "addAdditionalCharges", "class" => "form-horizontal", "autocomplete" => "off");
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
                <input type="text" id="newTotalAmount" name="newTotalAmount" class="form-control" placeholder="<?php echo $formatedTotal ?>" disabled>
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
            <button type="submit" class="btn btn-primary">Ok</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
        <h4 class="modal-title">Finish Events</h4>
        <div id="finish-message">
          
        </div>
      </div>
      <div class="modal-body text-center">
        <div class="well">
          <p>Finish this event: <b><?php echo $eventName->eventName ?></b></p>
        </div>
        <div class="well">
          <form id="finishEvent" role="form" method="post" action="<?php echo base_url('events/finishEvent') ?>" 
           class="form-horizontal" >       
              <input type="text" name="eventID" value="<?php echo $eventDetail->eventID ?>" hidden>
              <div class="form-group">
                <label class="col-lg-5 col-sm-5 col-md-5 control-label">Select Finish Date</label>
                <div class="col-lg-7 col-sm-7 col-md-7">
                  <input type="date" name="finishDate" id="finishDate" value="<?php echo $currentDate ?>" class="form-control">
                </div>
              </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button form="finishEvent" type="submit" class="btn btn-primary">Ok</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
      <div class="modal-body text-center">
        <div class="well">
          <p>Continue this event: <b><?php echo $eventName->eventName ?></b></p>
        </div>
        <form id="continueEvent" method="post" class="form-horizontal" action="<?php echo base_url('events/contEvent') ?>">       
            <input type="text" name="eventID" value="<?php echo $eventDetail->eventID ?>" hidden>
            <div class="well">
              <div class="form-group">
                <label class="col-lg-5 control-label">Select Resume Date:</label>
                <div class="col-lg-7">
                  <input type="date" class="form-control" name="resumeDate" id="resumeDate" value="<?php echo $currentDate ?>">
                </div>
              </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button form="continueEvent" type="submit" class="btn btn-primary">Ok</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>
<!--end of fisnish event modal-->

<div class="modal fade" id="printDetails">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Print Event Details</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="checkbox" id="selectAll">
          <label class="control-label">Select All</label>
        </div>
        <form id="printEventDetails" method="post" action="<?php echo base_url('printDetailsAndReports/create_pdf') ?>">
          <input type="text" name="eventID" value="<?php echo $eventDetail->eventID ?>" hidden>
          <div class="form-group">
            
            <input type="checkbox" class="printCheckBox" name="printItem[]" value="eventDetails">
            <label class="control-label">Event Details</label>
          </div>
          <div class="form-group">
            
            <input type="checkbox" class="printCheckBox" name="printItem[]" value="payment">
            <label class="control-label">Event Payments</label>
          </div>
          <div class="form-group">
            
            <input type="checkbox" class="printCheckBox" name="printItem[]" value="entourageAndDesigns">
            <label class="control-label">Event Entourage and Designs</label>
          </div>
          <div class="form-group">
            
            <input type="checkbox" class="printCheckBox" name="printItem[]" value="decors">
            <label class="control-label">Event Decors</label>
          </div>
          <div class="form-group">
            
            <input type="checkbox" class="printCheckBox" name="printItem[]" value="services">
            <label class="control-label">Event Services</label>
          </div>
          <div class="form-group">
            
            <input type="checkbox" class="printCheckBox" name="printItem[]" value="staff">
            <label class="control-label">Event Staff</label>
          </div>
          <div class="form-group">
            
            <input type="checkbox" class="printCheckBox" name="printItem[]" value="appointments">
            <label class="control-label">Event Appointments</label>
          </div>  
        </form>
      </div>

        <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Ok</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>  
          </div>    
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End of Update Details -->
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
    $('#selectAll').click(function(){
      $('.printCheckBox').prop('checked', $(this).prop("checked") );
    });

    $(function () {
      $('#modalthemetbl').DataTable()
    });

    function reset_chkbx() {
      $('input:checkbox').prop('checked', false);
    };

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
            ' Additional charges applied.' +
            '</div>');
            $('.form-group').removeClass('has-error')
                  .removeClass('has-success');
            $('.text-danger').remove();
            // reset the form
            chargeDetails[0].reset();

            $('#totalAmount').attr('placeholder', response.newTotalAmount);
            $('#newTotalAmount').attr('placeholder', response.newTotalAmount);
            
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

    $('#updateEventDetails').submit(function(e){
      e.preventDefault();

      var eventDetails = $(this);

      $.ajax({
        type: 'POST',
        url: eventDetails.attr('action'),
        data: eventDetails.serialize(),
        dataType: 'json',
        success: function(response){
          if (response.success == true) {
            $('div.alert-success').remove();
            $('#update-message').append('<div class="alert alert-success text-center">' +
            '<span class="icon fa fa-ckeck"></span>' +
            ' Changes Applied.' +
            '</div>');
            $('.form-group').removeClass('has-error')
                  .removeClass('has-success');
            $('.text-danger').remove();

            $('#dateAvailedInputFieldContainer').remove();
            $('#eventDateInputFieldContainer').remove();
            $('#eventTimeInputFieldContainer').remove();
            // reset the form
            eventDetails[0].reset();

            if (response.eventName == true) {
              $('#eventName').attr('placeholder', response.newEventName);
            }

            if (response.clientContact == true) {
              $('#contactNumber').attr('placeholder', response.newClientContact);
            }

            if (response.celebrant == true) {
              $('#celebrantName').attr('placeholder', response.celebrantName);
            }

            if (response.packageType == true) {
              $('#packageNameHolder').text(response.newPackageType);
            }

            if (response.eventDate == true) {
              $('#date').attr('placeholder', response.newEventDate);
            }

            if (response.eventTime == true) {
              $('#time').attr('placeholder', response.newEventTime);
            }

            if (response.location == true) {
              $('#location').attr('placeholder', response.newLocation);
            }

            if (response.type == true) {
              $('#type').attr('placeholder', response.newType);
            }

            if (response.motif == true) {
              $('#motif').attr('placeholder', response.newMotif);
            }

            if (response.dateAvailed == true) {
              $('#dateAvl').attr('placeholder', response.newDateAvailed);
            }

            if (response.duration == true) {
              $('#duration').attr('placeholder', response.newDuration);
            }

            if (response.newTheme == true) {
              $('#themeNameHolder').text(response.themeName);
            }
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

    $('#finishEvent').submit(function(e){
      e.preventDefault();

      var finishDetails = $(this);

      $.ajax({
        type: 'POST',
        url: finishDetails.attr('action'),
        data: finishDetails.serialize(),
        dataType: 'json',
        success: function(response){
          if (response.success == true) {
            window.location.href = "<?php echo base_url('events/finishedEvents'); ?>";    
          }else{
      
            if (response.notPaid == true && response.eventDatePassed == false){
              $('#finish-message').append('<div class="alert alert-danger text-center">' +
              '<span class="icon fa fa-ckeck"></span>' +
              ' Event Date has not Passed and there are still remaning balance.' +
              '</div>');
              finishDetails[0].reset();
              // close the message after seconds
              $('.alert-danger').delay(500).show(10, function() {
                $(this).delay(3000).hide(10, function() {
                  $(this).remove();
                });
              })
            }
            if (response.notPaid == true && response.eventDatePassed == true) {
              $('#finish-message').append('<div class="alert alert-danger text-center">' +
              '<span class="icon fa fa-ckeck"></span>' +
              ' There are still remaining balance.' +
              '</div>');

              finishDetails[0].reset();
              // close the message after seconds
              $('.alert-danger').delay(500).show(10, function() {
                $(this).delay(3000).hide(10, function() {
                  $(this).remove();
                });
              })
            }

            if(response.eventDatePassed == false && response.notPaid == false){
              $('#finish-message').append('<div class="alert alert-danger text-center">' +
              '<span class="icon fa fa-ckeck"></span>' +
              ' The event date has not yet passed.' +
              '</div>');

              finishDetails[0].reset();
              // close the message after seconds
              $('.alert-danger').delay(500).show(10, function() {
                $(this).delay(3000).hide(10, function() {
                  $(this).remove();
                });
              })
            }
          }
        }
      });
    });

    $('#cancelEventForm').submit(function(e){
      e.preventDefault();

      var cancelDetails = $(this);

      $.ajax({
        type: 'POST',
        url: cancelDetails.attr('action'),
        data: cancelDetails.serialize(),
        dataType: 'json',
        success: function(response){
          if (response.success == true) {

            $('div.alert-danger').remove();
            if ((response.refundable == true) && (response.properAmount == true)) {
              window.location.href = "<?php echo base_url('events/canceledEvents'); ?>";
            }

            if (response.refundable == false) {
              $('#cancelMessage').append('<div class="alert alert-danger text-center">' +
              '<span class="icon fa fa-ckeck"></span>' +
              ' This event has no recorded payments. Not elligable for refund!' +
              '</div>');
            }

            if (response.properAmount == false) {
              $('#cancelMessage').append('<div class="alert alert-danger text-center">' +
              '<span class="icon fa fa-ckeck"></span>' +
              ' Refund must not be more than the total payments!' +
              '</div>');
            }

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

    $('#continueEvent').submit(function(e){
      e.preventDefault();

      var continueDetails = $(this);

      $.ajax({
        type: 'POST',
        url: continueDetails.attr('action'),
        data: continueDetails.serialize(),
        dataType: 'json',
        success: function(response){
          if (response.success == true) {
            window.location.href = "<?php echo base_url('events/ongoingEvents'); ?>";    
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

    $('#updateEventHandler').submit(function(e){
      e.preventDefault();

      var handlerDetails = $(this);

      $.ajax({
        type: 'POST',
        url: handlerDetails.attr('action'),
        data: handlerDetails.serialize(),
        dataType: 'json',
        success: function(response){
          if (response.success == true) {
            $('#handlerSelectionError').remove();
            $("#handler")[0].selectedIndex = 0;
            $('#handlerImage').attr("src", response.imageURL);
            $('#handlerName').text(response.newHandler['employeeName']);
            $('#eventCount').text(response.eventNum['count']);
            $('#doneEventCount').text(response.doneEventNum['count']);
            $('#transactionCount').text(response.allTransactionNum['count']); 
          }else{
              var element = $('#handler');
              element.removeClass('has-error')
              .addClass('has-error');
              $('#handlerSelectionError').remove();
              
              element.after(response.message);
          }
        }
      });

    });
  </script>
  <script>
    $('#newAvaileDateButton').click(function() {

      $('#dateAvailedInputFieldContainer').remove();
      $('#dateAvailedInputField').append(
        '<div id="dateAvailedInputFieldContainer">' +
          '<label>Select New Avail Date</label>' +
          '<div class="input-group">' +
            '<input type="date" name="dateAvailed" id="dateAvailed" class="form-control">' +
            '<div class="input-group-addon">' +
              '<button type="button" id="removeDateAvailedInputFieldContainer"><i class="fa fa-remove"></i></button>' +
            '</div>' +
          '</div>' +
        '</div>'
          
      );
    });
  </script>

  <script>
    $(document).on("click", "#removeDateAvailedInputFieldContainer", function(){
      $('#dateAvailedInputFieldContainer').remove();
    });
  </script>

  <script>
    $('#newEventDateButton').click(function() {
      $('#eventDateInputFieldContainer').remove();
      $('#eventDateInputField').append(
        '<div id="eventDateInputFieldContainer">' +
          '<label>Select New Event Date</label>' +
          '<div class="input-group">' +
            '<input type="date" class="form-control" name="eventDate" id="eventDate">' +
            '<div class="input-group-addon">' +
              '<button type="button" id="removeEventDateInputFieldContainer"><i class="fa fa-remove"></i></button>' +
            '</div>' +
          '</div>' +
        '</div>'
      );
    });

    
  </script>

  <script>
    $(document).on("click", "#removeEventDateInputFieldContainer", function(){
      $('#eventDateInputFieldContainer').remove();
    });
  </script>

  <script>
    $('#newEventTimeButton').click(function() {

      $('#eventTimeInputFieldContainer').remove();
      $('#eventTimeInputField').append(
        '<div id="eventTimeInputFieldContainer">' +
          '<label>Select New Event Time</label>' +
          '<div class="input-group">' +
            '<input type="time" class="form-control" name="eventTime" id="eventTime">' +
            '<div class="input-group-addon">' +
              '<button type="button" id="removeEventTimeInputFieldContainer"><i class="fa fa-remove"></i></button>' +
            '</div>' +
          '</div>' +
        '</div>'
      );
    });
  </script>

  <script>
    $(document).on("click", "#removeEventTimeInputFieldContainer", function(){
      $('#eventTimeInputFieldContainer').remove();
    });
  </script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>