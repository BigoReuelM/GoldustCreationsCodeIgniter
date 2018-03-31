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

  $notifTotalCount = $appCount + $eventCount + $overTCount + $overECount + $incECount + $incACount;
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
          <li>
           <a href = "<?php echo base_url('admin/viewReports') ?>">
            <i class="fa fa-line-chart" style="font-size:18px"></i>
          </a>
          </li>
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
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i><?php echo $eventCount ?> Events Today
                      </a>
                    </li>
                  <?php
                  }
                  ?>
                  <?php if (!empty($incEvents)){
                  ?>
                    <li><!-- start notification -->
                      <a >
                        <i class="fa fa-users text-aqua"></i><?php echo $incECount ?> Incoming Events
                      </a>
                    </li>
                  <?php
                  }
                  ?>
                  <?php if (!empty($overTRent)){
                  ?>
                    <li><!-- start notification -->
                      <a href="" data-toggle="modal" data-target="#incommingAppointmentModal">
                        <i class="fa fa-users text-aqua"></i><?php echo $overTCount ?> Overdue Rental
                      </a>
                    </li>
                  <?php
                  }
                  ?>
                  <?php if (!empty($overERent)){
                  ?>
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i><?php echo $overECount ?> Overdue Event Rental
                      </a>
                    </li>
                  <?php
                  }
                  ?>
                  
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img class="user-image" src="data:image/jpeg;base64, <?php echo base64_encode($_SESSION['photo']); ?>" alt="user">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $employeeName ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img class="img-circle" src="data:image/jpeg;base64, <?php echo base64_encode($_SESSION['photo']); ?>" alt="user">
                
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
              <table id="appointmentsNotifTable" class="table table-bordered table-condensed table-hover">
                <thead>
                  <tr>
                    <th>Appointment Name</th>
                    <th>Appointment Date and Time</th>
                    <th>Employee</th>
                  </tr>                  
                </thead>
                <tbody>
                  <?php foreach ($appToday as $app): ?>
                    <tr>
                      <td>
                        <?php
                          $date = date_create($app['date']);
                          $newDate = date_format($date, "M-d-Y");
                          $newTime = date("g:i a", strtotime($app['time'])); 
                          echo $newDate . " at " . $newTime; 
                        ?>
                      </td>
                      <td><?php echo $app['agenda'] ?></td>
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
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="incommingAppointmentModal" class="modal" tabindex="-1" role="dialog">
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
              <table id="appointmentsNotifTable" class="table table-bordered table-condensed table-hover">
                <thead>
                  <tr>
                    <th>Appointment Name</th>
                    <th>Appointment Date and Time</th>
                    <th>Employee</th>
                  </tr>                  
                </thead>
                <tbody>
                  <?php foreach ($incAppointment as $incApp): ?>
                    <tr>
                      <td>
                        <?php
                          $date = date_create($incApp['date']);
                          $newDate = date_format($date, "M-d-Y");
                          $newTime = date("g:i a", strtotime($incApp['time'])); 
                          echo $newDate . " at " . $newTime; 
                        ?>
                      </td>
                      <td><?php echo $incApp['agenda'] ?></td>
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
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="incommingEventsModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Incomming Events</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="box">
          <div class="box-body">
            <div class="table table-responsive">
              <table id="incommingEventsTable" class="table table-bordered table-condensed table-hover">
                <thead>
                  <tr>
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Event Handler</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($incEvents as $event): ?>
                    <tr>
                      <td><?php echo $event['eventName'] ?></td>
                      <td><?php echo $event['eventDate'] ?></td>
                      <td><?php echo $event['employeeID'] ?></td>
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

<script>
  $(function () {
    $('#appointmentsNotifTable').DataTable()
    $('#incommingEventsTable').DataTable()
  })
</script>