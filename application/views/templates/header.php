<?php
$employeeID = $this->session->userdata('employeeID');
$employeeName = $this->session->userdata('employeeName');
$photo = $this->session->userdata('photo');

 ?>
<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="navbar-header">
          <a href="<?php echo base_url('handler/index') ?>" class="navbar-brand"><b>Goldust Creations</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url('handler/index') ?>">Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url('events/newEvents') ?>">New Events</a></li>
                <li><a href="<?php echo base_url('events/ongoingEvents') ?>">Ongoing Events</a></li>
                <li><a href="<?php echo base_url('events/finishedEvents') ?>">Finished Events</a></li>
                <li><a href="<?php echo base_url('events/canceledEvents') ?>">Canceled Events</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url('transactions/transactions') ?>">Service Transactions</a></li>
                <li><a href="<?php echo base_url('transactions/ongoing_rentals') ?>">Ongoing Rentals</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url('items/gowns') ?>">Gallery</a></li>
            <li><a href="<?php echo base_url('clients/clients') ?>">Clients</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <?php if (!empty($appToday)){
                    $appCount = count($appToday);
                  ?>
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i><?php echo $appCount ?> Appointments Today
                      </a>
                    </li>
                  <?php
                  }
                  ?>
                  <?php if (!empty($eventsToday)){
                    $eventCount = count($eventsToday);
                  ?>
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i><?php echo $eventCount ?> Events Today
                      </a>
                    </li>
                  <?php
                  }
                  ?>
                  <?php if (!empty($overTRent)){
                    $overTCount = count($overTRent);
                  ?>
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i><?php echo $overTCount ?> Overdue Rental
                      </a>
                    </li>
                  <?php
                  }
                  ?>
                  <?php if (!empty($overERent)){
                    $overECount = count($overERent);
                  ?>
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i><?php echo $overECount ?> Overdue Event Rental
                      </a>
                    </li>
                  <?php
                  }
                  ?>
                  <?php if (!empty($incEvents)){
                    $incECount = count($incEvents);
                  ?>
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i><?php echo $incECount ?> Incoming Events
                      </a>
                    </li>
                  <?php
                  }
                  ?>
                  <?php if (!empty($incAppointment)){
                    $incACount = count($incAppointment);
                  ?>
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i><?php echo $incACount ?> Incoming Appointments
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
                <span class="hidden-xs">
                  <?php echo($employeeName)?>
                </span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img class="img-circle" src="data:image/jpeg;base64, <?php echo base64_encode($_SESSION['photo']); ?>" alt="user">

                  <p>
                    <?php echo($employeeName)?> - Event Handler
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo base_url('user/user_profile') ?>" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url('user/user_logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
    </nav>
  </header>
