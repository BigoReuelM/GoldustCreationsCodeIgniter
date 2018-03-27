  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar Menu -->
      
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header"></li>
        <!-- Optionally, you can add icons to the links -->
        <li>
          <a href="<?php echo base_url('admin/index') ?>"><i class="glyphicon glyphicon-home"></i> <span>Home</span></a>
        </li>
        <li>
          <a href="<?php echo base_url('events/newEvents') ?>">
            <i class="glyphicon glyphicon-calendar"></i> 
            <span>Event</span>
            </span>
          </a>

        </li>
        <li>
          <a href="<?php echo base_url('transactions/ongoing_rentals') ?>">
            <i class="glyphicon glyphicon-briefcase"></i> 
            <span>Ongoing Rentals</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('admin/services') ?>"><i class="glyphicon glyphicon-shopping-cart"></i> <span>Services</span></a>
        </li>
        <li>
          <a href="<?php echo base_url('clients/clients') ?>">
            <i class="glyphicon glyphicon-sunglasses"></i>
            <span>Clients</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('admin/adminEmployees') ?>">
            <i class="glyphicon glyphicon-user"></i>
            <span>Employees</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-folder-close"></i> 
            <span>Decors And Design</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-rigth"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo base_url('items/gowns') ?>">Gowns</a>
            </li>
            <li>
              <a href="<?php echo base_url('items/suits') ?>">Suits</a>
            </li>
            <li>
              <a href="<?php echo base_url('items/costumes') ?>">Costumes</a>
            </li>
            <li>
              <a href="<?php echo base_url('items/decors') ?>">Decors</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="<?php echo base_url('transactions/ongoingTransactions') ?>">
            <i class="glyphicon glyphicon-credit-card"></i> 
            <span>Transactions</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('admin/expenses') ?>">
            <i class="glyphicon glyphicon-transfer"></i>
            <span>Expenses</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('admin/adminTheme') ?>">
            <i class="fa fa-leaf"></i>
            <span>Themes</span>
          </a>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
