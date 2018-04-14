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
        <li class="<?php if($pageName === 'ongoing'){ echo 'active';} ?>"><a href="<?php echo base_url('transactions/ongoingTransactions') ?>">Ongoing Transactions</a></li>
        <li class="<?php if($pageName === 'finished'){ echo 'active';} ?>"><a href="<?php echo base_url('transactions/finishedTransactions') ?>">Finished Transactions</a></li>
        <li class="<?php if($pageName === 'cancelled'){ echo 'active';} ?>"><a href="<?php echo base_url('transactions/cancelledTransactions') ?>">Cancelled Transactions</a></li>
      </ul>
    </div><!-- /.container-fluid -->
  </nav>