  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header"></li>
        <!-- Optionally, you can add icons to the links -->
        <li>
          <a href="<?php echo base_url('admin/index') ?>"><i class="glyphicon glyphicon-home"></i> <span>Home</span></a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-calendar"></i> 
            <span>Event</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-rigth"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo base_url('events/newEvents') ?>"><i class=""></i>New Events</a>
            </li>
            <li>
              <a href="<?php echo base_url('events/ongoingEvents') ?>"><i class=""></i>Ongoing Events</a>
            </li>
            <li>
              <a href="<?php echo base_url('events/finishedEvents') ?>"><i class=""></i>Finished Events</a>
            </li>
            <li>
              <a href="<?php echo base_url('events/canceledEvents') ?>"><i class=""></i>Canceled Events</a>
            </li>
            <li>
          </ul>

        </li>
        <li>
          <a href="<?php echo base_url('transactions/ongoingTransactions') ?>">
            <i class="glyphicon glyphicon-credit-card"></i> 
            <span>Transactions</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('admin/adminEmployeeManagement') ?>">
            <i class="glyphicon glyphicon-user"></i>
            <span>Employees</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('admin/services') ?>"><i class="glyphicon glyphicon-shopping-cart"></i> <span>Services</span></a>
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
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
