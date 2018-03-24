
<style type="text/css">
.glyphicon.glyphicon-circle-arrow-left {
  font-size: 25px;
}

</style>
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

          <div>
            <a href="<?php echo base_url('events/ongoingEvents') ?>" id="icon">
              <span class="glyphicon glyphicon-circle-arrow-left" ></span>
            </a>  
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
            <ul class="nav navbar-nav navbar-centered collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <li><a href="<?php echo base_url('events/eventDetails') ?>">Details</a></li>
              <li><a href="<?php echo base_url('events/eventServices') ?>">Services</a></li>
              <li><a href="<?php echo base_url('events/payment') ?>">Payments</a></li>
              <li><a href="<?php echo base_url('events/eventEntourage') ?>">Entourage</a></li>
              <li><a href="<?php echo base_url('events/eventDecors') ?>">Decors</a></li>
              <li><a href="<?php echo base_url('events/eventStaff') ?>">Staff</a></li>
              <li><a href="<?php echo base_url('events/appointments') ?>">Appointments</a></li>
            </ul>
        </div><!-- /.container-fluid -->
      </nav>