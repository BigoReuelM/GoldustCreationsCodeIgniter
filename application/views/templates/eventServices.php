<style>
#servicesContainer{
  height: 500px;
  overflow: scroll;
}
.popover-title {
  color: #3c8dbc;
  font-size: 15px;
}
.popover-content {
  font-size: 12px;
}
.popover{
  max-width: 30%;
}
  th {
    text-align: center;
  }
  .tblnum {
    text-align: right;
  }
</style>
<section class="content-header">
  <h1>
    Event Name:
    <?php
    $name = $eventName->eventName; 
    echo '<b>' . $name . '</b>';    
    ?>
    <div class="pull-right">
      <a href="#" data-toggle="popover" data-placement="left" data-trigger="focus" data-html="true" title="Tips:" data-content="Simply Add or Change value of input fields and click on <b>Update</b> button to make changes. <b>Remove</b> button to cancel a service. Click <b>Reset</b> button to uncheck all chosen Services. Click checkbox to select and <b>Add</b> button to include chosen Services to list."><i class="fa fa-question-circle-o"></i></a></div>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content container-fluid">

    <div class="row">
      <?php if ($eventStatus === "on-going" || $eventStatus === "new"): ?>
        <div class="col-lg-5">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Services</h3>
            </div>
            <form id="addsvcform" role="form" method="post" action="<?php echo base_url('events/addsvc') ?>">
              <div class="box-body">
                <div id="servicesContainer">
                  <table class="table table-hover table-responsive table-bordered" id="modalServcTbl">
                    <thead>
                      <tr>
                        <th>Service Name</th>
                        <th>Description</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="checkbox" id="selectAll"> Select All</td>
                        <td></td>
                      </tr>
                      <?php
                      if (!empty($servcs)) {
                        $valid = true;
                        for($j = 0 ; $j < count($servcs) ; $j++){
                          for($i = 0 ; $i < count($avlServcs) ; $i++){
                            if ($servcs[$j]['serviceID'] == $avlServcs[$i]['serviceID']) {
                              $valid = false;
                            }
                          }                  
                          if($valid){  
                            ?>
                            <tr>                   
                              <td>
                                <div class="checkbox"><label><input class="serviceCheckBox" type="checkbox" name="add_servc_chkbox[]" value="<?php echo $servcs[$j]['serviceID'] ?>" multiple><?php echo $servcs[$j]['serviceName'] ?></label></div>
                              </td>
                              <td><?php echo $servcs[$j]['description'] ?></td>
                            </tr>
                          <?php }else{
                            $valid = true;
                          }
                        }
                      }
                      ?>             
                    </tbody>            
                  </table>
                </div> 
              </div>
              <div class="box-footer">
                <div class="pull-right">
                  <a href="#" data-toggle="tooltip" title="Click to uncheck all chosen services"><button class="btn btn-primary" onclick="reset_chkbx()">Reset</button></a>
                  <a href="#" data-toggle="tooltip" title="Click to add chosen services to list">
                    <button form="addsvcform" id="addevtsvc" name="addevtsvc" class="btn btn-default" type="submit">Add</button></a>
                  </div> 
                </div>
              </form>
            </div>
          </div>
        <?php endif ?>
        <div class="<?php if(($eventStatus === 'finished') || ($eventStatus === 'cancelled')){ echo 'col-lg-12'; }else{ echo 'col-lg-7'; } ?>">
          <div class="well">
            <div class="row">
              <div class="col-lg-7">
                <h2>Number of Services: <?php echo $serviceCount->serviceCount ?></h2>
              </div>
              <div class="col-lg-7">
                <h2>Total Amount: <?php echo $serviceTotal->total ?></h2>
              </div>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header">
              <div class="row">
                <div class="col-lg-7">
                  <h3 class="box-title">Services Availed</h3> 
                </div>
            <div class="box-body">        
              <table id="serviceTable" class="table table-striped table-bordered table-responsive">
                <thead>
                  <tr>
                    <th>Services</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <?php if ($eventStatus === 'on-going' || $eventStatus === 'new'): ?>
                      <th>Action</th>
                    <?php endif ?>
                  </tr>
                </thead>

                <tbody>
                  <div class="the-message"></div>
                  <?php
                  if (!empty($avlServcs)) {
                    foreach ($avlServcs as $avlSvc) { 
                      $svcID = $avlSvc['serviceID'];
                      ?>
                      <tr>
                        <!--<form id="svcform" role="form" method="post" action="<?php //echo base_url('events/upSvcQtyAmt') ?>" autocomplete="off">-->
                          <?php
                          $attributes = array("name"=>"svcform", "id"=>"svcform", "autocomplete"=>"off");
                          echo form_open('events/upSvcQtyAmt');
                          ?>  
                          <!-- service name -->
                          <td>
                            <?php echo $avlSvc['serviceName'] ?>
                          </td>
                          <!-- quantity -->                
                          <td>
                            <div class="form-group">
                              <?php
                              if ($eventStatus === "finished" || $eventStatus === "cancelled") {
                                ?>
                                <input class="form-control tblnum" type="number" min="0" name="svcqty" id="svcqty" style="border: none;" placeholder="<?php echo $avlSvc['quantity'] ?>" disabled>
                              <?php } else { ?>
                                <input class="form-control tblnum" type="number" min="0" name="svcqty" id="svcqty" style="border: none;" placeholder="<?php echo $avlSvc['quantity'] ?>">
                              <?php } ?>
                              <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
                            </div>
                          </td>
                          <!-- amount -->
                          <td>
                            <?php 
                            $serviceTotal = number_format($avlSvc['amount'], 2);
                            ?>
                            <div class="form-group">
                              <?php
                                if ($eventStatus === "finished" || $eventStatus === "cancelled") {
                              ?>
                                <input class="form-control tblnum" type="number" min="0" name="svcamt" id="svcamt" style="border: none;" placeholder="<?php echo $serviceTotal ?>" disabled>
                            <?php } else {?>
                              <input class="form-control tblnum" type="number" min="0" name="svcamt" id="svcamt" style="border: none;" placeholder="<?php echo $serviceTotal ?>">
                            <?php }?>
                              <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
                            </div>
                          </td>
                          <?php if ($eventStatus === 'on-going' || $eventStatus === 'new'): ?>
                            <td>  
                              <input type="hidden" name="svcid" value="<?php echo $avlSvc['serviceID'] ?>">
                              <div class="row">
                                <div class="col-md-6">
                                  <button class="btn btn-primary" id="updtsvcbtn" name="btn" type="submit" value="updt">Update</button>    
                                </div>
                                <div class="col-md-6">
                                  <button class="btn btn-danger" id="rmvsvcbtn" name="btn" type="submit" value="rmv">Remove</button>
                                </div>
                              </div>                      
                            </td>
                          <?php endif ?>
                          <?php 
                          echo form_close();
                          ?> 
                          <!--</form>-->
                        </tr>
                      <?php }
                    }
                    ?>
                  </tbody>
                </table>                 
              </div>
            </div>
          </div>
        </div> 
        <!--end of service col-->

        <div class="control-sidebar-bg"></div> 
      </section>
      <!-- /.content-wrapper -->
  <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    
  </div>
  <!-- REQUIRED JS SCRIPTS -->
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
      $('#serviceTable').DataTable()
      $('#modalServcTbl').DataTable({
        'paging'      : false,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      })
    })

    function reset_chkbx() {
      $('input:checkbox').prop('checked', false);
    }

    $('#selectAll').click(function(){
      $('.serviceCheckBox').prop('checked', $(this).prop("checked") );
    });
  </script>

  <script>
    $(document).ready(function(){
      $('[data-toggle="popover"]').popover();   
    });
  </script>