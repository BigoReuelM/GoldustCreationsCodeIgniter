<style>
  #servicesContainer{
    height: 500px;
    overflow: scroll;
  }
</style>
  <section class="content container-fluid">
    <div class="row">
      <?php if ($transactionStatus === "on-going"): ?>
        <div class="col-lg-4">
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
      <div class="<?php if($transactionStatus !== 'on-going'){ echo 'col-lg-12'; }else{ echo 'col-lg-8'; } ?>">
        <div class="well">
          <div class="row">
            <div class="col-lg-8">
              <h2>Number of Service: <?php echo $serviceCount->serviceCount ?></h2>
            </div>
            <div class="col-lg-8">
              <h2>Total Amount: <?php echo $serviceTotal->total ?></h2>
            </div>
          </div>
        </div>
        <div class="box box-info">
          <!--list of services col-->
            <div class="box-header">
              <div class="row">
                <div class="col-lg-8">
                  <h3 class="box-title">List of Availed Services</h3>
                </div>
              </div>    
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
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
                          <td>
                            <?php 
                              echo $service['serviceName'];
                              if (!empty($transacDesigns) && strcasecmp($service['serviceName'], "gowns") === 0) {
                                echo "<ul>";
                                foreach ($transacDesigns as $design) {
                                  echo "<li>" . $design['designName'] . " (" . $design['color'] . ")" . "</li>";
                                }
                                echo "</ul>";
                              }

                              if (!empty($transacItems) && (strcasecmp($service['serviceName'], "gowns") > 0 || strcasecmp($service['serviceName'], "gowns") < 0)) {
                                echo "<ul>";
                                foreach ($transacItems as $item) {
                                  echo "<li>" . $item['decorName'] . " (" . $item['color'] . ")" . "</li>";
                                }
                                echo "</ul>";
                              }
                            ?>
                          </td>
                          <td><input class="form-control" id="serviceQuantity" name="serviceQuantity" type="number" min="0" placeholder="<?php echo $service['quantity'] ?>"></td>
                          <td>
                            <?php  
                              $formatedServiceAmount = number_format($service['amount'], 2);
                            ?>
                            <input class="form-control" id="serviceAmount" name="serviceAmount" type="number" min="0" placeholder="<?php echo $formatedServiceAmount ?>">
                          </td>
                          <?php if ($transactionStatus === "on-going"): ?>
                            <td>
                              <div class="row">
                                <input type="text" id="serviceID" name="serviceID" value="<?php echo $serviceID ?>" hidden>
                                <div class="col-md-4">
                                  <button class="btn btn-md btn-link" type="submit" name="action" value="update">Update</button> 
                                </div>
                                <div class="col-md-4">
                                  <button class="btn btn-md btn-link" type="submit" name="action" value="remove">Remove</button>  
                                </div>
                                <div class="col-md-4">
                                  <button class="btn btn-md btn-link chooseSvcType" id="chooseBtn" name="choose" type="button" data-toggle="modal" data-target="#chooseModal" value="<?php echo $service['serviceID'] . " " . $service['serviceName'] ?>">Choose</button>
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

<!-- MODALS -->  
  <div class="modal fade" id="chooseModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Choose...</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <button type="button" data-toggle="collapse" data-target="#chooseAttire" class="btn btn-default btn-block">Attire</button>
            </div>
            <div class="col-md-4">
              <button type="button" data-toggle="collapse" data-target="#chooseItems" class="btn btn-default btn-block">Items</button> 
            </div> 
          </div>

            <form role="form" action="<?php echo base_url('transactions/addTransacDesign') ?>" method="post">
            <div class="collapse" id="chooseAttire">
              <input type="text" name="svcIDChoose" id="svcIDChoose" hidden>
              <input type="text" name="svcTypeChoose" id="svcTypeChoose" hidden>
              <div class="box">
                <div class="box-header">
                  <div class="box-title">Choose Attire</div>
                </div>
                <div class="box-body">
                  <table id="attiresTable" class="table table-bordered table-responsive table-striped text-center">
                      <thead>
                        <tr>
                          <th>Design Name</th>
                          <th>Color</th>
                          <th>Type</th>
                          <th>Image</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach ($allDesigns as $des) { ?>
                          <tr>
                            <td>
                              <?php
                              echo $des['designName'];
                              ?>
                            </td>
                            <td><?php echo $des['color'] ?></td>
                            <td><?php echo $des['designType'] ?></td>
                            <td>
                              <?php
                              if (!empty($designtypesmap)) {
                                foreach ($designtypesmap as $dtm) {
                                  $files = directory_map('./uploads/designs/' . $dtm . '/', 1);
                                  foreach ($files as $f) {
                                    $f_no_extension = pathinfo($f, PATHINFO_FILENAME);
                                    if ($f_no_extension === $des['designID']) { ?>
                                      <div class="thumbnail">
                                        <img src="<?php echo site_url('./uploads/designs/' . $dtm . '/' . $f); ?>" alt="" class="galleryImg">
                                      </div>
                              <?php     
                                    }
                                  }
                                }
                              }else{
                                echo "No image";
                              }
                              ?>
                            </td>
                            <td><button type="submit" name="addTransacDesign" class="btn btn-sm btn-primary" value="<?php echo $des['designID'] ?>">Choose</button></td>
                          </tr>
                        <?php  } ?>
                      </tbody> 
                  </table>
                </div>
              </div>
            </div>
            </form>

            <form role="form" method="post" action="<?php echo base_url('transactions/addTransacItem') ?>">
            <div class="collapse" id="chooseItems">
              <div class="box">
                <div class="box-header">
                  <div class="box-title">Choose item/s</div>
                </div>
                <div class="box-body">
                  <table id="exstItems" class="table table-bordered text-center">
                    <thead>
                      <tr>
                        <th>Item Name</th>
                        <th>Color</th>
                        <th>Type</th>
                        <th>Image</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($allDecors as $dec) { ?>
                        <tr>
                          <td>
                            <?php 
                              echo $dec['decorName'];
                            ?>
                          </td>
                          <td><?php echo $dec['color'] ?></td>
                          <td><?php echo $dec['decorType'] ?></td>
                          <td>
                            <?php
                            if (!empty($decortypesmap)) {
                              foreach ($decortypesmap as $dtm) {
                                $files = directory_map('./uploads/decors/' . $dtm . '/', 1);
                                foreach ($files as $f) {
                                  $f_no_extension = pathinfo($f, PATHINFO_FILENAME);
                                  if ($f_no_extension === $dec['decorsID']) { ?>
                                    <div class="thumbnail">
                                      <img src="<?php echo site_url('./uploads/decors/' . $dtm . '/' . $f); ?>" alt="" class="galleryImg">
                                    </div>
                            <?php     
                                  }
                                }
                              }
                            }else{
                              echo "No image";
                            }
                            ?>
                          </td>
                          <td><button type="submit" name="addTransacItem" class="btn btn-sm btn-default" value="<?php echo $dec['decorsID'] ?>">Choose</button></td>
                        </tr>
                      <?php  } ?>
                    </tbody> 
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <style type="text/css">
    @media screen and (min-width: 768px){
      #chooseModal .modal-dialog {
        width:900px;
      }
    }
  </style>

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
<script>
  $(function () {
    $('#attiresTable').DataTable({
    }) 
    $('#exstItems').DataTable({
    })
  })

  $('.chooseSvcType').click(function(){
    var svcInfo = $(this).val().split(' ');
    $('#svcIDChoose').val(svcInfo[0]);
    $('#svcTypeChoose').val(svcInfo[1]);
  });
</script>

