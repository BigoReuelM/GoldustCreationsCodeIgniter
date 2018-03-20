
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="box-header">
        <div class="row">
          <div class="col-md-9">
             <h3>Services</h3>
          </div>
          <div class="col-md-3">
            <button class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addService" >Add Service</button>  
          </div>
        </div>   
     </div>
    </section>
    <section class="content container-fluid">
      <h2>   Active Services</h2>
      <div class="box">
        <div class="box-body">
          <div class="table table-responsive">
            <table id="activeService" class="table table-bordered table-condensed table-hover text-center">
            <thead>
              <tr>
                <th>Service Name</th>
                <th>Descriptions</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                if (!empty($active)) {
                  foreach ($active as $a) {
                    $serviceID = $a['serviceID'];
              ?>
              <tr>
                <td><?php echo $a['serviceName']; ?></td>
                <td><?php echo $a['description']; ?></td>
                <td>
                  <form role="form" method="post" action="<?php echo base_url('admin/deactivateServiceStatus') ?>">
                    <input type="text" name="active" value="<?php echo($serviceID) ?> " hidden>
                    <button type="submit" class="btn btn-block btn-danger">Deactivate</button> 
                  </form>                  
                </td>
              </tr>
              <?php 
                  }
                }
              ?>       
            </tbody>
            </table>
          </div>
        </div>
      </div>
     <h2>   Deactivated Services</h2>
     <div class="box">
        <div class="box-body">
          <div class="table table-responsive">
            <table id="inactiveService" class="table table-bordered table-condensed table-hover text-center">
            <thead>
              <tr>
                <th>Service Name</th>
                <th>Descriptions</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                if (!empty($inactive)) {
                  foreach ($inactive as $ia) {
                    $iID = $ia['serviceID'];
              ?>
              <tr>
                <td><?php echo $ia['serviceName']; ?></td>
                <td><?php echo $ia['description']; ?></td>
                <td>
                  <form role="form" method="post" action="<?php echo base_url('admin/activateServiceStatus') ?>">
                    <input type="text" name="inactive" value="<?php echo($iID) ?>" hidden>
                    <button type="submit" class="btn btn-block btn-primary">Activate</button>
                  </form>
                </td>
              </tr>
              <?php 
                  }
                }
              ?>
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

  </div>

  <div class="control-sidebar-bg"></div>

  <div class="modal fade" id="addService" role="dialog" >
    <div class="modal-dialog">
      <div class="modal-content">
        <?php 
          $attributes = array("name" => "addNewService", "id" => "addNewService", "class" => "form-horizontal");
          echo form_open("admin/addNewService", $attributes);
        ?>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Service</h4>
          </div>
          <div id="the-message">
            
          </div>
          <div class="modal-body">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-3 control-label">Service Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="serviceName" name="serviceName" placeholder="Enter Service Name Here ... ">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Description</label>
                <div class="col-sm-9">
                  <textarea rows="5" class="form-control" id="description" name="description" placeholder="Enter Service Description Here ... "></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="row">
              <div class="col-sm-6">
                <button type="submit" class="btn btn-block btn-default">Add</button>
              </div>
              <div class="col-sm-6">
                <button type="button" class="btn btn-block btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </div>   
          </div>
        <?php  echo form_close(); ?>
      </div>
    </div>
  </div>
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
<!-- InputMask -->
<script src="<?php echo base_url(); ?>/public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script>
  $(function () {
    $('#activeService').DataTable()
    $('#inactiveService').DataTable()
  })
</script>

<script>
  $('#addNewService').submit(function(e){
    e.preventDefault();

    var serviceDetails = $(this);

    $.ajax({
      type: 'POST',
      url: serviceDetails.attr('action'),
      data: serviceDetails.serialize(),
      dataType: 'json',
      success: function(response){
        if (response.success == true) {
          $('#the-message').append('<div class="alert alert-success text-center">' +
          '<span class="icon fa fa-check"></span>' +
          ' New expense has been saved.' +
          '</div>');
          $('.form-group').removeClass('has-error')
                .removeClass('has-success');
          $('.text-danger').remove();
          // reset the form
          serviceDetails[0].reset();
          // close the message after seconds
          $('.alert-success').delay(500).show(10, function() {
            $(this).delay(3000).hide(10, function() {
              $(this).remove();
            });
          })
        }else{
          $.each(response.messages, function(key, value) {
            var element = $('#' + key);
            
            element.closest('div.form-group')
            .removeClass('has-error')
            .addClass(value.length > 0 ? 'has-error' : 'has-success')
            .find('.text-danger')
            .remove();
            
            element.after(value);
          });
        }

        if (response.alert == true) {
          $('#the-message').append('<div class="alert alert-warning text-center">' +
          '<span class="icon fa-fa-warning"></span>' +
          ' Service name already exist!' +
          '</div>');

          $('.alert-warning').delay(500).show(10, function() {
            $(this).delay(3000).hide(10, function() {
              $(this).remove();
            });
          })
        }
      }
    });
  });
</script>