<style>
    
  #servicesBox{
    background-color: white;
    padding: 5%;  
  }
  #servicesBox .servicebox-body{
    overflow: scroll;
  }  
  
</style>

  <section class="content container-fluid">
    <div class="row">
      <div class="col-lg-4">
        <div id="servicesBox">
            <div class="h-100 servicebox-header">
              <h3 class="servicebox-title">Available Services</h3>            
            </div>
            <div class="servicebox-body">
              <table class="table table-bordered">
                <tr>
                  
                </tr>
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
              </table>
            </div>
            <div class="servicebox-footer">
              
            </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="box box-info">
          <!--list of services col-->
            <div class="box-header">
              <div class="row">
                <div class="col-lg-6">
                  <h3 class="box-title">List of Availed Services</h3>
                </div>
                <div class="col-lg-6">
                  <button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addServc">Add Services</button>
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
<!-- ./wrapper -->

<!-- add service modal -->
<div class="modal fade" role="dialog" id="addServc">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Service/s</h4>
        <div id="serviceConfirm">
        </div>
      </div>
      <?php 
        $attributes = array("name" => "addService", "id" => "addService", "class" => "form-horizontal", "autocomplete" => "off");
        echo form_open("transactions/addsvc", $attributes);
      ?>
        <div class="modal-body">
          <table class="table table-hover table-responsive table-bordered" id="modalServcTbl">
            <thead>
              <tr>
                <th>Service Name</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody id="serviceTable"> 
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
        <div class="modal-footer">                 
          <button class="btn btn-primary" onclick="reset_chkbx()">Reset</button>
          <button class="btn btn-default" type="submit">Add</button>
        </div>
      <?php echo form_close(); ?>
    </div>

  </div>
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
    $('#modalServcTbl').DataTable()
  });

</script>

