<?php 
  $photo = $this->session->userdata('photo');
  $firstName = $this->session->userdata('firstName');
  $midName = $this->session->userdata('midName');
  $lastName = $this->session->userdata('lastName');
  $employeeName =  $firstName . " " . $midName . " " . $lastName;
  $photo = $this->session->userdata('photo');
  $appCount = count($appToday);
  $eventCount = count($eventsToday);
  $overTCount = count($overTRent);
  $overECount = count($overERent);
  $incECount = count($incEvents);
  $incACount = count($incAppointment);
  $overdueEPaymentsCount = count($overdueEPayments);

$notifTotalCount = $appCount + $eventCount + $overTCount + $overECount + $incECount + $incACount + $overdueEPaymentsCount;
?>
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>GC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>GoldustCreations</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
      
        <ul class="nav navbar-nav">
          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?php echo $notifTotalCount ?></span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <?php if (!empty($appToday)){
                  ?>
                    <li><!-- start notification -->
                      <a href="#appointmentsNotifModal" type="button"  data-toggle="modal" data-target="#appointmentsNotifModal">
                        <i class="fa fa-users text-aqua"></i><?php echo $appCount ?> Appointments Today
                      </a>
                    </li>
                  <?php
                  }
                  ?>
                  <?php if (!empty($incAppointment)){
                  ?>
                    <li><!-- start notification -->
                      <a href="#incommingAppointmentModal" data-toggle="modal" data-target="#incommingAppointmentModal">
                        <i class="fa fa-users text-aqua"></i><?php echo $incACount ?> Incoming Appointments
                      </a>
                    </li>
                  <?php
                  }
                  ?>
                  <?php if (!empty($eventsToday)){
                  ?>
                    <li><!-- start notification -->
                      <a href="#eventsTodayModal" data-toggle="modal" data-target="#eventsTodayModal">
                        <i class="fa fa-users text-aqua"></i><?php echo $eventCount ?> Events Today
                      </a>
                    </li>
                  <?php
                  }
                  ?>
                  <?php if (!empty($incEvents)){
                  ?>
                    <li><!-- start notification -->
                      <a href="#incommingEventsModal" data-toggle="modal" data-target="#incommingEventsModal">
                        <i class="fa fa-users text-aqua"></i><?php echo $incECount ?> Incoming Events
                      </a>
                    </li>
                  <?php
                  }
                  ?>
                  <?php if (!empty($overTRent)){
                  ?>
                    <li><!-- start notification -->
                      <a href="#overdueTRentalModal" data-toggle="modal" data-target="#overdueTRentalModal">
                        <i class="fa fa-users text-aqua"></i><?php echo $overTCount ?> Overdue Rental
                      </a>
                    </li>
                  <?php
                  }
                  ?>
                  <?php if (!empty($overERent)){
                  ?>
                    <li><!-- start notification -->
                      <a href="#overdueERentalModal" data-toggle="modal" data-target="#overdueERentalModal">
                        <i class="fa fa-users text-aqua"></i><?php echo $overECount ?> Overdue Event Rental
                      </a>
                    </li>
                  <?php
                  }
                  ?>
                  <li><!-- start notification -->
                      <a href="#overdueEPaymentsModal" data-toggle="modal" data-target="#overdueEPaymentsModal">
                        <i class="fa fa-users text-aqua"></i><?php echo $overdueEPaymentsCount ?> Overdue Event Payments
                      </a>
                    </li>
                  <!-- end notification -->
                </ul>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img class="user-image" alt="User profile picture" src="<?php echo base_url('/uploads/profileImage/' . $_SESSION['employeeID'] . ''); ?>" onerror="this.onerror=null;this.src='<?php echo base_url('/uploads/profileImage/default'); ?>';">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $employeeName ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img class="img-circle" alt="User profile picture" src="<?php echo base_url('/uploads/profileImage/' . $_SESSION{'employeeID'} . ''); ?>" onerror="this.onerror=null;this.src='<?php echo base_url('/uploads/profileImage/default'); ?>';">
                
                <p>
                  <?php echo $employeeName ?>
                </p>
                <p>
                  Admin
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('user/user_profile') ?>" class="btn btn-default btn-flat">Profile</a>
                </div> <!--trial-->
                <div class="pull-right">
                  <a href="<?php echo base_url('user/user_logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
  </nav>
</header>

<div id="appointmentsNotifModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Appointments Today</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="box">
          <div class="box-body">
            <div class="table table-responsive">
              <table id="appointmentsNotifTable" class="table table-bordered table-condensed table-hover text-center">
                <thead>
                  <tr>
                    <th>Appointment Agenda</th>
                    <th>Appointment Date and Time</th>
                    <th>Employee</th>
                  </tr>                  
                </thead>
                <tbody>
                  <?php foreach ($appToday as $app): ?>
                    <tr>
                      <td><?php echo $app['agenda'] ?></td>
                      <td>
                        <?php
                          $appTodayDate = date_create($app['date']);
                          $appTodayDateFormated = date_format($appTodayDate, "M-d-Y");
                          $appTodayTimeFormated = date("g:i a", strtotime($app['time'])); 
                          echo $appTodayDateFormated . " at " . $appTodayTimeFormated; 
                        ?>
                      </td>
                      <td><?php echo $app['employeeName'] ?></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="incommingAppointmentModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Incoming Appointments</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="box">
          <div class="box-body">
            <div class="table table-responsive">
              <table id="incomingAppointmentsTable" class="table table-bordered table-condensed table-hover text-center">
                <thead>
                  <tr>
                    <th>Appointment Agenda</th>
                    <th>Appointment Date and Time</th>
                    <th>Handler</th>
                  </tr>                  
                </thead>
                <tbody>
                  <?php foreach ($incAppointment as $incApp): ?>
                    <tr>
                      <td><?php echo $incApp['agenda'] ?></td>
                      <td>
                        <?php
                          $incAppDate = date_create($incApp['date']);
                          $incAppDateFormated = date_format($incAppDate, "M-d-Y");
                          $incAppTimeFormated = date("g:i a", strtotime($incApp['time'])); 
                          echo $incAppDateFormated . " at " . $incAppTimeFormated; 
                        ?>
                      </td>
                      <td><?php echo $incApp['employeeName'] ?></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="incommingEventsModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Incomming Events</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="box">
          <div class="box-body">
            <div class="table table-responsive">
              <table id="incommingEventsTable" class="table table-bordered table-condensed table-hover text-center">
                <thead>
                  <tr>
                    <th>Event Name</th>
                    <th>Event Date and Time</th>
                    <th>Event Handler</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($incEvents as $event): ?>
                    <tr>
                      <td><?php echo $event['eventName'] ?></td>
                      <td>
                        <?php
                          $incEventDate = date_create($event['eventDate']);
                          $incEventDateFormated = date_format($incEventDate, "M-d-Y");
                          $incEventTimeFormated = date("g:i a", strtotime($event['eventTime'])); 
                          echo $incEventDateFormated . " at " . $incEventTimeFormated; 
                        ?>
                      </td>
                      <td><?php echo $event['employeeName'] ?></td>
                    </tr>              
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div id="eventsTodayModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Events Today</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="box">
          <div class="box-body">
            <div class="table table-responsive">
              <table id="eventsTodayTable" class="table table-bordered table-condensed table-hover text-center">
                <thead>
                  <tr>
                    <th>Event Name</th>
                    <th>Event Date and Time</th>
                    <th>Event Handler</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($eventsToday as $eve): ?>
                    <tr>
                      <td><?php echo $eve['eventName'] ?></td>
                      <td>
                        <?php
                          $eventTodayDate = date_create($eve['eventDate']);
                          $eventTodayDateFormated = date_format($eventTodayDate, "M-d-Y");
                          $eventTodayTimeFormated = date("g:i a", strtotime($eve['eventTime'])); 
                          echo $eventTodayDateFormated . " at " . $eventTodayTimeFormated; 
                        ?>
                      </td>
                      <td><?php echo $eve['employeeName'] ?></td>
                    </tr>              
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="overdueTRentalModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Overdue Rentals</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="box">
          <div class="box-body">
            <div class="table table-responsive">
              <table id="overdueTRentalTable" class="table table-bordered table-condensed table-hover text-center">
                <thead>
                  <tr>
                    <th>Client Name</th>
                    <th>Date Availed</th>
                    <th>Contact Number</th>
                    <th>Handler of Rental</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($overTRent as $tRent): ?>
                    <tr>
                      <td><?php echo $tRent['clientName'] ?></td>
                      <td>
                        <?php
                          $tRentalDate = date_create($tRent['dateAvail']);
                          $tRentalDateFormated = date_format($tRentalDate, "M-d-Y");
                          echo $tRentalDateFormated; 
                        ?>
                      </td>
                      <td><?php echo $tRent['contactNumber'] ?></td>
                      <td><?php echo $tRent['employeeName'] ?></td>
                    </tr>              
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="overdueERentalModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Overdue Event Rentals</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="box">
          <div class="box-body">
            <div class="table table-responsive">
              <table id="eventsTodayTable" class="table table-bordered table-condensed table-hover text-center">
                <thead>
                  <tr>
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Contact Number</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($overERent as $eRent): ?>
                    <tr>
                      <td><?php echo $eRent['eventName'] ?></td>
                      <td>
                        <?php
                          $overERentDate = date_create($eRent['eventDate']);
                          $overERentDateFormated = date_format($overERentDate, "M-d-Y"); 
                          echo $overERentDateFormated; 
                        ?>
                      </td>
                      <td>
                        <?php echo $eRent['contactNumber'] ?>
                      </td>
                    </tr>              
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div id="overdueEPaymentsModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Overdue Event Payments</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="box">
          <div class="box-body">
            <div class="table table-responsive">
              <table id="eventsTodayTable" class="table table-bordered table-condensed table-hover text-center">
                <thead>
                  <tr>
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Contact Number</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($overdueEPayments as $ePayments): ?>
                    <tr>
                      <td><?php echo $ePayments['eventName'] ?></td>
                      <td>
                        <?php
                          $overEPaymentsDate = date_create($ePayments['eventDate']);
                          $overEPaymentsDateFormatted = date_format($overEPaymentsDate, "M-d-Y"); 
                          echo $overEPaymentsDateFormatted; 
                        ?>
                      </td>
                      <td>
                        <?php echo $ePayments['contactNumber'] ?>
                      </td>
                    </tr>              
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>






