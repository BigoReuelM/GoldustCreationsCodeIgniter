<?php
  $employeeRole = $this->session->userdata('role');
  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $pagename; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="<?php echo base_url();?>/public/dist/css/skins/skin-blue.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">




</head>

<?php
  if ($employeeRole === 'handler') {
    echo'<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">';
   }else{
    $control = $this->session->userdata('sidebarControl');
    if ($control === "0") {
      echo "<body class='hold-transition skin-blue sidebar-mini sidebar-collapse'>
      <div class='wrapper'>";
    }else{
      echo "<body class='hold-transition skin-blue sidebar-mini'>
      <div class='wrapper'>";
    }
    
   }
?>


  