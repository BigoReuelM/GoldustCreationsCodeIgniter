
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
          <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $new ?></h3>
              <p>New Events</p>
              <div class="icon">
                <i class="ion ion-calendar"></i>
              </div>
              <a href="<?php echo base_url('events/newEvents') ?>" class="small-box-footer">More Info<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $ongoing ?></h3>
              <p>Ongoing Events</p>
              <div class="icon">
                <i class="ion ion-android-calendar"></i>
              </div>
              <a href="<?php echo base_url('events/ongoingEvents') ?>" class="small-box-footer">More Info<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $rentalCount ?></h3>
              <p>Ongoing Rentals</p>
              <div class="icon">
                <i class="ion ion-bowtie"></i>
              </div>
              <a href="<?php echo base_url('transactions/ongoing_rentals') ?>" class="small-box-footer">More Info<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $newClient ?></h3>
              <p>New Client/s Within The Past 7 Days</p>
              <div class="icon">
                <i class="ion ion-android-calendar"></i>
              </div>
              <a href="<?php echo base_url('clients/clients') ?>" class="small-box-footer">More Info<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
          <div class="wrapper2">
            <div id="calendarContainer"></div>
            <div id="organizerContainer" style="margin-left: 8px;"></div>
          </div>
          </div>
        </div>

     </section>
    <!-- /.content -->
  </div> 
  <!-- /.content-wrapper -->

  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/public/dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
