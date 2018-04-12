<div class="content-wrapper">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->


      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#employeeNav" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <ul class="nav navbar-nav navbar-centered collapse navbar-collapse" id="employeeNav">
        <li class="<?php if($pageName === 'admin'){echo 'active';} ?>">
          <a href="<?php echo base_url('admin/adminEmployees') ?>">Admin Employees</a>
        </li>
        <li class="<?php if($pageName === 'handler'){echo 'active';} ?>">
          <a href="<?php echo base_url('admin/handlerEmployees') ?>">Handler Employees</a>
        </li>
        <li class="<?php if($pageName === 'staff'){echo 'active';} ?>">
          <a href="<?php echo base_url('admin/staffEmployees') ?>">Staff</a>
        </li>
        <li class="<?php if($pageName === 'oncall'){echo 'active';} ?>">
          <a href="<?php echo base_url('admin/oncallstaffEmployees') ?>">On-call Staff</a>
        </li>
        <li class="<?php if($pageName === 'inactive'){echo 'active';} ?>">
          <a href="<?php echo base_url('admin/inactiveEmployees') ?>">Inactive Employee</a>
        </li>
      </ul>
    </div><!-- /.container-fluid -->
  </nav>