<?php 
  $empRole = $this->session->userdata('role');
 ?>
 <style type="text/css">
   #butt5 {
    width: 100px;
   }

 </style>

<section class="content container-fluid">
<div class="content">
  <div class="row">
    <div class="box box-primary">
      <div class="box-header">
        <div class="row">
          <div class="col-lg-6">
            <h1>
              <?php
                $name = $eventName->eventName; 
                echo '<p>' . $name . '</p>';    
              ?>
            </h1>
          </div>
          <div class="col-lg-6">
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
                          <li class="text-center">
                            <a href="#addAdditionalChargesModal" type="button" class="btn btn-default" data-toggle="modal" data-target="#addAdditionalChargesModal">
                              <i class="fa fa-money pull-left"></i>
                              <span>Add Additional Charges</span>
                            </a>
                          </li>
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
          <form id="updateEventHandler" role="form" method="post" action="<?php echo base_url('events/selectEventHandler') ?>">
            <div class="box-header text-center">
              <h3>Event Handler</h3>
              <?php  
                if ($empRole === 'admin') {
                  echo "<select class='form-control' name='handler'>";
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
                
                <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('/uploads/profileImage/' . $currentHandler->employeeID . ''); ?>" alt="User profile picture" onerror="this.onerror=null;this.src='<?php echo base_url('/uploads/profileImage/default'); ?>';">

                <h3 class="profile-username text-center"><?php echo $currentHandler->employeeName ?></h3>

                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item" id="list6">
                    <b>Events Currently Handling</b> <a class="pull-right"><?php echo $currentEventNum->count ?></a>
                  </li>
                  <li class="list-group-item" id="list6">
                    <b>Handled Events</b> <a class="pull-right"><?php echo $doneEvent->count ?></a>
                  </li>
                  <li class="list-group-item" id="list6">
                    <b>Transactions</b> <a class="pull-right"><?php echo $allTransac->count ?></a>
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
            <div id="update-message">
              
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Event Name</label>
                <input type="text" id="eventName" name="eventName" class="form-control" placeholder="<?php echo $eventDetail->eventName ?>" value="">
              </div>
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
                <div class="col-lg-6 col-sm-6">
                  <label>Date Availed</label>
                  <?php
                    if (!$eventDetail->dateAssisted == null) {
                      $date = date_create($eventDetail->dateAssisted);
                      $dateAvailed = date_format($date, "M-d-Y");
                    }else{
                      $dateAvailed = "not set";
                    }
                  ?>
                  <input type="text" class="form-control" id="dateAvl" placeholder="<?php echo $dateAvailed ?>" hidden>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <label>Change Avail Date</label>
                  <input type="date" name="dateAvailed" id="dateAvailed" class="form-control">
                </div>
              </div>
              <!-- <div class="form-group"> -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Package Availed</label>
                    <input type="text" class="form-control" id="package" placeholder="<?php echo $eventDetail->packageType ?>">  
                  </div>
                </div>
                <div class="col-lg-6">
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
              <!-- </div> -->
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Event Location</label>
                <input type="text" name="location" id="location" class="form-control" placeholder="<?php echo $eventDetail->eventLocation ?>" value="">
              </div>

              <div class="form-group">
                <label>Event Type</label>
                <input type="text" name="type" id="type" class="form-control" placeholder="<?php echo $eventDetail->eventType ?>" value="">
              </div>
              <div class="form-group">
                <label>Motif</label>
                <input type="text" name="motif" id="motif" class="form-control" placeholder="<?php echo $eventDetail->motif ?>" value="">
              </div>
              <!--<div class="form-group">
                <label>Theme</label>
                <input type="text" name="theme" class="form-control" placeholder="<?php //echo $eventDetail->theme ?>" value="">
              </div>-->
              <form role="form" method="post" id="themeID" action="<?php echo base_url('events/showThemeName')?>">
              <label>Theme/s</label>
              <div class="input-group"> 
              <?php
                  if(!empty($nagan)){
                    
                      $themeName = $nagan->themeName;
              ?>           
                <input type="text" class="form-control" id="themeName" placeholder="<?php echo($themeName) ?>" disabled>
                <?php if ($eventDetail->eventStatus === "on-going"): ?>
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addtheme">Choose</button>
                  </span>
                <?php endif ?>
                <?php 
                    } else {
                      //echo "wala";
                ?>
                <input type="text" class="form-control" id="themeName" placeholder="Theme" disabled>
                <?php if ($eventDetail->eventStatus === "on-going"): ?>
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addtheme">Choose</button>
                  </span>
                <?php endif ?>
                <?php
                  }
                ?>
              </div>
              </form>
              <div class="form-group">   
                <label>Total Amount Due</label>
                <?php 
                  $formatedTotal = number_format($totalAmount->totalAmount, 2);
                ?>
                <input type="text" name="theme" class="form-control" placeholder="<?php echo $formatedTotal ?>" disabled>        
              </div>
              <div class="form-group">
                
                <div class="col-lg-6">
                  <label>Event Date</label>
                  <?php

                    if (!$eventDetail->eventDate == null) {
                      $eventdate = date_create($eventDetail->eventDate);
                      $newDate = date_format($eventdate, "M-d-Y");
                    }else{
                      $newDate = "not set";
                    }
                                        
                  ?>
                  <input type="text" class="form-control" id="date" placeholder="<?php echo $newDate ?>" disabled>  
                </div>
                <div class="col-lg-6">
                  <label>Change Date</label>
                  <input type="date" class="form-control" name="eventDate" id="eventDate">
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-6">
                  <label>Event Time</label>
                  <?php

                    if (!$eventDetail->eventTime == null) {
                      $newTime = date("g:i a", strtotime($eventDetail->eventTime));
                    }else{
                      $newTime = "not set";
                    }     
                                        
                  ?>
                  <input type="text" class="form-control" id="time" placeholder="<?php echo $newTime?>" disabled>
                </div>
                <div class="col-lg-6">
                  <label>Change Time</label>
                  <input type="time" class="form-control" name="eventTime" id="eventTime">
                </div>
                
              </div>
            </div>
          </form>

        </div>
      </div>
      <div class="box-footer">
        <div class="row">
          <?php if ($eventDetail->eventStatus == "on-going"): ?>
            <div class="col-lg-3">
              <?php
                if ($empRole === 'admin') {
                   echo '<button class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#select-handler">Select Handler</button>';
                }else{
                  echo '<button class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#select-handler" disabled>Select Handler</button>';
                } 
              ?>
            </div>
            <div class="col-lg-9">
              <button form="updateEventDetails" type="submit" class="btn btn-block btn-primary btn-lg">Update Details</button>
            </div>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</div>

  <div class="control-sidebar-bg"></div> 
</section>
    
</div>


<!-- Themes modal -->
<div class="modal fade" id="addtheme" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Themes</h4>
        </div>
        <form role="form" method="post" action="<?php echo base_url('events/addEventTheme') ?>" class="form-horizontal">
          <div class="modal-body">
            <div class="table table-responsive">
            <table id="themes" class="table table-bordered table-condensed table-hover text-center">
            <thead>
              <tr>
                <th>Theme Name</th>
                <th>Descriptions</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                if (!empty($themes)) {
                  foreach ($themes as $th) {
                    $themeID = $th['themeID'];
              ?>
              <tr>
                <td>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="themes" name="themes[]" value="<?php echo $th['themeID'] ?>" multiple><?php echo $th['themeName']; ?>
                    </label>
                  </div>
                </td>
                <td><?php echo $th['themeDesc']; ?></td>
              </tr>
              <?php 
                  }
                }
              ?>   
            </tbody>
            </table>
          </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" onclick="reset_chkbx()">Reset</button>
            <button type="submit" class="btn btn-default" type="submit">Add</button>
          </div>
        </form>
      </div>   
  </div>
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
        <form role="form" method="post" action="<?php echo base_url('events/cancelEvent') ?>" class="form-horizontal" autocomplete="off">
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
        <h4 class="modal-title">Finish Events</h4>
        <div id="finish-message">
          
        </div>
      </div>
      <div class="modal-body text-center">
        <p>Are you sure you want to proceed?</p>
        <form id="finishEvent" role="form" method="post" action="<?php echo base_url('events/finishEvent') ?>">       
            <input type="text" name="eventID" value="<?php echo $eventDetail->eventID ?>" hidden>
            <div class="form-group">
              <label>Select Finish Date</label>
              <input type="date" name="finishDate" >
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button form="finishEvent" type="submit" class="btn btn-primary">Proceed</button>
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
      <div class="modal-body text-center">
        <p>Are you sure you want to continue?</p>
        <form id="continueEvent" method="post" action="<?php echo base_url('events/contEvent') ?>">       
            <input type="text" name="eventID" value="<?php echo $eventDetail->eventID ?>" hidden>
            <div class="form-group">
              <label>Select Resume Date:</label>
              <input type="date" name="resumeDate">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button form="continueEvent" type="submit" class="btn btn-primary">Continue</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--end of fisnish event modal-->

<div class="modal fade" id="select-handler">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Select handler</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to update?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button form="updateEventHandler" type="submit" class="btn btn-primary">Confirm</button>
      </div>
    </div>
  </div>
</div>
<!-- End of Selecting handler modal -->
<!-- Update Details Modal -->
<!-- <div class="modal fade" id="update-details">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Update Details</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to update?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button form="updateDetails" type="submit" class="btn btn-primary">Confirm</button>
      </div>
    </div>
  </div>
</div>
 -->
<div class="modal fade" id="printDetails">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Update Details</h4>
      </div>
      <div class="modal-body">
        <form id="printEventDetails" method="post" action="<?php echo base_url('printDetailsAndReports/create_pdf') ?>">
          <input type="text" name="eventID" value="<?php echo $eventDetail->eventID ?>" hidden>
          <div class="form-group">
            
            <input type="checkbox" name="printItem[]" value="eventDetails">
            <label class="control-label">Event Details</label>
          </div>
          <div class="form-group">
            
            <input type="checkbox" name="printItem[]" value="payment">
            <label class="control-label">Event Payments</label>
          </div>
          <div class="form-group">
            
            <input type="checkbox" name="printItem[]" value="entourageAndDesigns">
            <label class="control-label">Event Entourage and Designs</label>
          </div>
          <div class="form-group">
            
            <input type="checkbox" name="printItem[]" value="decors">
            <label class="control-label">Event Decors</label>
          </div>
          <div class="form-group">
            
            <input type="checkbox" name="printItem[]" value="services">
            <label class="control-label">Event Services</label>
          </div>
          <div class="form-group">
            
            <input type="checkbox" name="printItem[]" value="staff">
            <label class="control-label">Event Staff</label>
          </div>
          <div class="form-group">
            
            <input type="checkbox" name="printItem[]" value="appointments">
            <label class="control-label">Event Appointments</label>
          </div>  
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button form="printEventDetails" type="submit" class="btn btn-primary">Confirm</button>
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
    $(function () {
      $('#modalthemetbl').DataTable()
    })

    function reset_chkbx() {
      $('input:checkbox').prop('checked', false);
    }

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
            ' Details Successfully Updated.' +
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
              $('#package').attr('placeholder', response.newPackageType);
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
            $('#finish-message').append('<div class="alert alert-success text-center">' +
            '<span class="icon fa fa-ckeck"></span>' +
            ' Event Successfully Finished.' +
            '</div>');
            $('.form-group').removeClass('has-error')
                  .removeClass('has-success');
            $('.text-danger').remove();
            // reset the form
            finishDetails[0].reset();
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
  </script>