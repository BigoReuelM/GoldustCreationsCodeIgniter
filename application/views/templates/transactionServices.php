
  <section class="content container-fluid">
    <div class="row">
      <div class="col-lg-5">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Available Services</h3>            
          </div>
          <?php 
            $attributes = array("name" => "addService", "id" => "addService", "class" => "form-horizontal", "autocomplete" => "off");
            echo form_open("transactions/addsvc", $attributes);
          ?>
            <div class="box-body">
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
            <div class="box-footer">
              <div class="pull-right">
                <button class="btn btn-primary" onclick="reset_chkbx()">Reset</button>
                <button class="btn btn-default" type="submit">Add</button>
              </div>
            </div>
          <?php echo form_close() ?>
        </div>
      </div>
      <div class="col-lg-7">
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
                    <th>Action</th>
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
                          <td><input class="form-control" id="serviceQuantity" name="serviceQuantity" type="number" placeholder="<?php echo $service['quantity'] ?>"></td>
                          <td>
                            <?php  
                              $formatedServiceAmount = number_format($service['amount'], 2);
                            ?>
                            <input class="form-control" id="serviceAmount" name="serviceAmount" type="text" placeholder="<?php echo $formatedServiceAmount ?>">
                          </td>
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

