<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $pagename ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/public/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/public/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/public/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/public/plugins/iCheck/square/blue.css">

</head>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <p><b>Goldust </b>Creations</p>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  <?php

    $error_msg = $this->session->flashdata('error_msg');
    $success_msg = $this->session->flashdata('success_msg');


    if ($error_msg) {
      ?>
      <div class="alert alert-danger text-center">
        <?php echo $error_msg; ?>
      </div>
      <?php 
    }

    if ($success_msg) {
      ?>
      <div class="alert alert-success text-center">
        <?php echo $success_msg; ?>
      </div>
      <?php 
    }
  ?>
    <p class="login-box-msg">Sign in to start your session</p>

    <form id="loginForm" role="form" method="post" action="<?php echo base_url('user/login_user'); ?>" autocomplete="off">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" id="username" name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
    </form>
    
    <a class="btn btn-block" data-toggle="modal" data-target="#passChange">I forgot my password</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<div class="modal modal-default" id="passChange" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title text-center">Change Password</h5>
      </div>
      <form id="changePassword" name="changePassword" method="post" action="<?php echo base_url('user/changePassword') ?>">
      <div class="modal-body">
        <div class="box-body">
          <div class="text-center alert">
            <p>Personaly request for a 4 digit pin to your admin.</p>
            <p>Enter username with 4 digit pin bellow.</p>
          </div>
          <div class="form-group text-center box-body">
            <label class="control-label">Username</label>
            <input type="text" class="form-control text-center" name="username" id="username" placeholder="Enter username here...">
          </div>
          <div class="form-group text-center box-body">
            <label class="control-label">4 digit PIN</label>
            <input type="text" class="form-control text-center" name="pin" id="pin" placeholder="Enter 4 digit pin here...">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Reset</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>/public/plugins/iCheck/icheck.min.js"></script>

<style>

  #passChange .modal-dialog  {
    top:20%;
    width:25%;
  }

</style>

</body>
</html>

