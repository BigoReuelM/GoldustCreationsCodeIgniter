  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar Menu -->
      
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header"></li>
        <!-- Optionally, you can add icons to the links -->
        <li>
          <a href="<?php echo base_url('admin/index') ?>"><i class="glyphicon glyphicon-home"></i><span>Home</span></a>
        </li>
        <li>
          <a href="<?php echo base_url('events/newEvents') ?>">
            <i class="glyphicon glyphicon-calendar"></i> 
            <span>Event</span>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('transactions/ongoingTransactions') ?>">
            <i class="glyphicon glyphicon-credit-card"></i> 
            <span>Transactions</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('transactions/ongoing_rentals') ?>">
            <i class="glyphicon glyphicon-hourglass"></i> 
            <span>Ongoing Rentals</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('clients/clients') ?>">
            <i class="fa fa-users"></i>
            <span>Clients</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('admin/expenses') ?>">
            <i class="fa fa-money"></i>
            <span>Expenses</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('admin/viewReports') ?>">
            <i class="fa fa-line-chart"></i>
            <span>Reports</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-cog"></i>
            <span>Manage</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/adminEmployees') ?>">Employees</a></li>
            <li><a href="<?php echo base_url('admin/services') ?>">Services</a></li>
            <li><a href="<?php echo base_url('events/adminDecorsHome') ?>">Decors</a></li>
            <li><a href="<?php echo base_url('events/adminDesignsHome') ?>">Designs</a></li>
            <li><a href="<?php echo base_url('admin/adminTheme') ?>">Themes</a></li>
          </ul>
        </li>
        <li>
          <a href=""></a>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
