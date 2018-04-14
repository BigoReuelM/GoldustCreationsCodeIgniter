

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
          <!-- Collect the nav links, forms, and other content for toggling -->
            <ul class="nav navbar-nav navbar-centered collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <li class="<?php if($pageName === 'tdetails'){ echo 'active';} ?>"><a href="<?php echo base_url('transactions/transactionDetails') ?>">Transaction Details</a></li>
              <li class="<?php if($pageName === 'tservices'){ echo 'active';} ?>"><a href="<?php echo base_url('transactions/transactionServices') ?>">Transaction Services</a></li>
              <li class="<?php if($pageName === 'tpayments'){ echo 'active';} ?>"><a href="<?php echo base_url('transactions/transactionPayments') ?>">Transaction Payments</a></li>
              <li class="<?php if($pageName === 'tappointments'){ echo 'active';} ?>"><a href="<?php echo base_url('transactions/transactionAppointments') ?>">Transaction Appointments</a></li>
            </ul>
        </div><!-- /.container-fluid -->
      </nav>