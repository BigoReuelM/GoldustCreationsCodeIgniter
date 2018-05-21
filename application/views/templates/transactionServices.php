<style>
  #servicesContainer{
    height: 500px;
    overflow: scroll;
  }
</style>
  <section class="content container-fluid">
    <div class="row">
      <?php if ($transactionStatus === "on-going"): ?>
        <div class="col-lg-5">
          <div id="servicesBox" class="box">
            <div class="box-header">
              <h3 class="box-title">Available Services</h3>            
            </div>
            <?php 
              $attributes = array("name" => "addService", "id" => "addService", "class" => "form-horizontal", "autocomplete" => "off");
              echo form_open("transactions/addsvc", $attributes);
            ?>
              <div class="box-body">
                <div id="servicesContainer">
                <table class="table table-hover table-responsive table-bordered" id="servicesAvailable">
                  <thead>
                    <tr>
                      <th>Service Name</th>
                      <th>Service Description</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if (!empty($servcs)) {
                      $valid = true;
                      for($j = 0; $j < count($servcs) ; $j++) { 
                        for($i = 0 ; $i < count($transServices) ; $i++){
                          if ($servcs[$j]['serviceID'] == $transServices[$i]['serviceID']) {
                            $valid = false;
                          }
                        }                  
                        if($valid){ 
                    ?>
                        <tr>                   
                            <td>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="services[]" value="<?php echo $servcs[$j]['serviceID'] ?>" multiple><?php echo $servcs[$j]['serviceName'] ?>
                                </label>
                              </div>
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
                  <button class="btn btn-primary" onclick="reset_chkbx()">Reset</button>
                  <button class="btn btn-default" type="submit">Add</button>
                </div>
              </div>
            <?php echo form_close() ?>
          </div>
        </div>    
      <?php endif ?>  
      <div class="<?php if($transactionStatus !== 'on-going'){ echo 'col-lg-12'; }else{ echo 'col-lg-7'; } ?>">
        <div class="well">
          <div class="row">
            <div class="col-lg-6">
              <h2>Number of Service: <?php echo $serviceCount->serviceCount ?></h2>
            </div>
            <div class="col-lg-6">
              <h2>Total Amount: <?php echo $serviceTotal->total ?></h2>
            </div>
          </div>
        </div>
        <div class="box box-info">
          <!--list of services col-->
            <div class="box-header">
              <div class="row">
                <div class="col-lg-6">
                  <h3 class="box-title">List of Availed Services</h3>
                </div>
              </div>    
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="servicesTable" class="table table-bordered table-striped text-center">
                <thead>
                  <tr>
                    <th>Service</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <?php if ($transactionStatus === "on-going"): ?>
                      <th>Action</th>
                    <?php endif ?>
                  </tr>
                </thead>
                
                  <tbody id="serviceTableBody">
                    <?php if ($transServices){
                      foreach ($transServices as $service) {
                        $serviceID = $service['serviceID'];
                    ?>
                      <tr id="<?php echo $serviceID;?>">
                        <?php 
                          $attributes = array("name" => "updateServiceDetails", "id" => "updateServiceDetails", "class" => "form-horizontal", "autocomplete" => "off");
                          echo form_open("transactions/updateServiceDetails", $attributes);
                        ?>
                          <td><?php echo $service['serviceName'] ?></td>
                          <td><input class="form-control" id="serviceQuantity" name="serviceQuantity" type="number" min="0" placeholder="<?php echo $service['quantity'] ?>"></td>
                          <td>
                            <?php  
                              $formatedServiceAmount = number_format($service['amount'], 2);
                            ?>
                            <input class="form-control" id="serviceAmount" name="serviceAmount" type="number" min="0" placeholder="<?php echo $formatedServiceAmount ?>">
                          </td>
                          <?php if ($transactionStatus === "on-going"): ?>
                            <td>
                              <input type="text" id="servi" name="serviceID" value="<?php echo $serviceID ?>" hidden>
                              <div class="row">
                                <div class="col-lg-6">
                                  <button class="btn btn-block btn-primary" type="submit" name="action" value="update">Update</button> 
                                </div>
                                <div class="col-lg-6">
                                  <button class="btn btn-block btn-danger" type="submit" name="action" value="remove">Remove</button>  
                                </div>
                              </div>
                            </td>
                          <?php endif ?>
                        <?php echo form_close(); ?>
                      </tr>
                    <?php }}?>
                  </tbody>
                
              </table>
            </div>
          <!--END OF services-->
        </div>
      </div>
    </div>
    <div class="control-sidebar-bg"></div>             
  </section> 
</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>/public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>/public/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url(); ?>/public/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>/public/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url();?>/public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#servicesTable').DataTable()
    $('#servicesAvailable').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  });
  function reset_chkbx() {
    $('input:checkbox').prop('checked', false);
  }
</script>

