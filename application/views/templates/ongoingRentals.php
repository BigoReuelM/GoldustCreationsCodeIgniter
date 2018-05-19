
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
      <h1>
        Ongoing Rentals
      </h1>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

        <div class="content">
          <div class="row">
          <div class="col-md-12"> 
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Rentals</h3>
                </div>
              <div class="box-body">
                <div  class="table table-responsive">
                  <table id="Rentals" class="table table-bordered table-condensed">
                    <thead>
                      <tr>
                        <th>Client Name</th>
                        <th>Contact Number</th>
                        <th>Image Design</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody> 
                        
                          <?php
                          if (!empty($tdata)) {

                          foreach($tdata as $d) {
                            $transInfo = $d['transactionID'];
                          ?>
                          <tr>
                          <td><?php echo $d['clientName']; ?></td>
                          <td><?php echo $d['contactNumber']; ?></td>
                          <!--td><?php echo $d['serviceName']; ?></td-->
                          <td></td>
                          <td>
                            <form role="form" method="post" action="<?php echo base_url('transactions/setTransactionID'); ?>">
                                <button class="btn btn-block" id="transactionID" name="transInfo" type="submit" value="<?php echo($transInfo) ?>"> View Info <i class="fa fa-fw fa-info"> </i>
                                </button>
                            </form>
                          </td>
                          </tr>
                          <?php
                          }
                          }else{
                            echo "0 result";
                          } 
                          ?>
                         
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

         <!--<div class="col-md-6">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Event Rentals</h3>
                </div>
                <div class="box-body">
                    <div  class="table table-responsive">
                      <table id ="Events" class="table table-bordered table-condensed">
                        <thead>
                          <tr>
                            <th>Event Name</th>
                            <th>Client Name</th>
                            <th>Contact Number</th>
                            <th>Service Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if(!empty($evredata)){ 
                              foreach ($evredata as $ed) { 
                                $eID = $ed['eventID'];
                                $clientID = $ed['clientID'];
                                $es = $ed['eventStatus'];
                                ?> 
                                <tr>
                                  <td><?php echo $ed['eventName']; ?></td>
                                  <td><?php echo $ed['clientName']; ?></td>
                                  <td><?php echo $ed['contactNumber']; ?></td>
                                  <td><?php echo $ed['serviceName']; ?></td>
                                  <td>
                                    <form role="form" method="post" action="<?php echo base_url('events/setEventID')?>">
                                      <input name="clientID" value="<?php echo($clientID)?>" hidden>
                                      <input name="eventStatus" value="<?php echo($es)?>" hidden>
                                      <button class="btn btn-default btn-block" id="eventID" name="eventInfo" type="submit" value="<?php echo($eID)?>"> View Info <i class="fa fa-fw fa-info"> </i>
                                      </button>
                                    </form>
                                  </td>
                                </tr>
                                <?php
                                  }
                                  }else{
                                   echo "0 result";
                                  } 
                                ?>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>
      </section-->


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
<!-- DataTables -->
<script src="<?php echo base_url();?>/public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>/public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>/public/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#Rentals').DataTable();
    $('#Events').DataTable();
  })
</script>
