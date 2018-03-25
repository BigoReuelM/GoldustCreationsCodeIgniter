<?php 
  $name = $this->session->userdata('employeeName');
  $photo = $this->session->userdata('photo');
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
              <span class="hidden-xs"><?php echo $name ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img class="img-circle" src="data:image/jpeg;base64, <?php echo base64_encode($_SESSION['photo']); ?>" alt="user">
                
                <p>
                  <?php echo $name ?> - Admin
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