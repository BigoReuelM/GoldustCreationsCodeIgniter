

<div class="content-wrapper">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->


          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
            <ul class="nav navbar-nav navbar-centered collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <li class="<?php if($pageName === "details"){echo 'active';} ?>"><a href="<?php echo base_url('events/eventDetails') ?>">Details</a></li>
              <li class="<?php if($pageName === "services"){echo 'active';} ?>"><a href="<?php echo base_url('events/eventServices') ?>">Services</a></li>
              <li class="<?php if($pageName === "payments"){echo 'active';} ?>"><a href="<?php echo base_url('events/payment') ?>">Payments</a></li>
              <li class="<?php if($pageName === "entourage"){echo 'active';} ?>"><a href="<?php echo base_url('events/eventEntourage') ?>">Entourage</a></li>
              <li class="<?php if($pageName === "decors"){echo 'active';} ?>"><a href="<?php echo base_url('events/eventDecors') ?>">Decors</a></li>
              <li class="<?php if($pageName === "staff"){echo 'active';} ?>"><a href="<?php echo base_url('events/eventStaff') ?>">Staff</a></li>
              <li class="<?php if($pageName === "appointments"){echo 'active';} ?>"><a href="<?php echo base_url('events/appointments') ?>">Appointments</a></li>
            </ul>
        </div><!-- /.container-fluid -->
      </nav>