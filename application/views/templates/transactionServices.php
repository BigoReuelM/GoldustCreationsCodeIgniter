
<style type="text/css">
  .glyphicon.glyphicon-circle-arrow-left {
  font-size: 50px;

}
</style>

  <!-- Content Header (Page header) -->

  <section class="content-header">
    <div class="row">
      <div class="col-lg-6">
        <a href="<?php echo base_url('transactions/transactions') ?>" id="icon">
              <span class="glyphicon glyphicon-circle-arrow-left" ></span>
        </a>
      </div>
    </div>
  </section>
  <section class="content container-fluid">

      <div class="box box-info">
        <!--list of services col-->
          <div class="box-header">
            <div class="row">
              <div class="col-lg-6">
                <h3 class="box-title">List of Services</h3>
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
                        $attributes = array("name" => "updateServiceDetails", "id" => "updateServiceDetails", "class" => "form-horizontal");
                        echo form_open("transactions/updateServiceDetails", $attributes);
                      ?>
                        <td><?php echo $service['serviceName'] ?></td>
                        <td><input class="form-control" id="serviceQuantity" name="serviceQuantity" type="text" placeholder="<?php echo $service['quantity'] ?>"></td>
                        <td>
                          <?php  
                            $formatedServiceAmount = number_format($service['amount'], 2);
                          ?>
                          <input class="form-control" id="serviceAmount" name="serviceAmount" type="text" placeholder="<?php echo $formatedServiceAmount ?>">
                        </td>
                        <td>
                          <input type="text" id="servi" name="serviceID" value="<?php echo $serviceID ?>" hidden>
                          <button class="btn btn-block btn-danger" type="submit" name="action" value="remove">Remove</button>
                          <button class="btn btn-block btn-default" type="submit" name="action" value="update">Update</button>
                        </td>
                      <?php echo form_close(); ?>
                    </tr>
                  <?php }}?>
                </tbody>
              
            </table>
          </div>
        <!--END OF services-->
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
        $attributes = array("name" => "addService", "id" => "addService", "class" => "form-horizontal");
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
                    foreach ($servcs as $svc) { ?>
                      <tr>                   
                          <td>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="services[]" value="<?php echo $svc['serviceID'] ?>" multiple><?php echo $svc['serviceName'] ?>
                              </label>
                            </div>
                          </td>
                          <td><?php echo $svc['description'] ?></td>
                      </tr>
                <?php }
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
<!-- InputMask -->
<script src="<?php echo base_url(); ?>/public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>/public/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>/public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>/public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>/public/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>/public/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url(); ?>/public/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>/public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>/public/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>/public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#servicesTable').DataTable()
    $('#modalServcTbl').DataTable()
  });

  /*
  //script for adding services
    $('#addService').submit(function(e){
    e.preventDefault();

    var services = $(this);


    $.ajax({
      type: 'POST',
      url: services.attr('action'),
      data: services.serialize(),
      dataType: 'json',
      success: function(response){
        if (response.success == true) {

          $('.alert-success').remove();

          $('#serviceConfirm').append('<div class="alert alert-success text-center">' +
          '<span class="glyphicon glyphicon-ok"></span>' +
          ' Service/s saved.' +
          '</div>');

          $.each(response.availedServices, function(key, value){
            $('#serviceTableBody').prepend(
              '<tr id="' + value.serviceID + '">' +
                '<form method="post" name="updateServiceDetails" id="updateServiceDetails" class="form-horizontal" action="<?php echo base_url('transactions/updateServiceDetails'); ?>">' +
                  '<td>' + value.serviceName + '</td>' +
                  '<td><input class="form-control" id="serviceQuantity" name="serviceQuantity" type="text">' +
                  '<td><input class="form-control" id="serviceAmount" name="serviceAmount" type="text"></td>' +
                  '<td>' +
                    '<input type="text" id="servi" name="serviceID" value="' + value.serviceID + '" hidden>' +
                    '<button class="btn btn-block btn-danger" type="submit" name="action" value="remove">Remove</button>' +
                    '<button class="btn btn-block btn-default" type="submit" name="action" value="update">Update</button>' +
                  '</td>' +
                '</form>' +
              '</tr>'
            );
          });

          services[0].reset();
          // close the message after seconds
          $('.alert-success').delay(500).show(10, function() {
          $(this).delay(3000).hide(10, function() {
            $(this).remove();
          });
          })
        }else{
          
        }
      }
    });
  });
  //end of script for adding od services
  //script for updating transaction services details
  */

</script>

