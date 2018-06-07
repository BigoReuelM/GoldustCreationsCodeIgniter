  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="box-header">
        <div class="row">
          <div class="col-md-9">
            <h3>Themes</h3>
          </div>
        </div> 
        <div class="col-md-2 col-md-offset-10">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addthememodal">Add New Theme</button>
        </div>  
     </div>
    </section>
    <section class="content container-fluid">
      <div class="box">
        <div class="box-header">
          
        </div>
        <div class="box-body">
          <div class="table table-responsive">
            <table id="themes" class="table table-bordered table-condensed table-hover text-center">
            <thead>
              <tr>
                <th>Theme Name</th>
                <th>Descriptions</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                if (!empty($themes)) {
                  foreach ($themes as $th) {
                    $themeID = $th['themeID'];
              ?>
              <tr>
                <td><?php echo $th['themeName']; ?></td>
                <td><?php echo $th['themeDesc']; ?></td>
                <td>
                  <form role="form" method="post" action="<?php echo base_url('admin/setCurrentThemeID') ?>">
                    <input type="hidden" name="themeID" value="<?php echo $th['themeID'] ?>">
                    <button type="submit" class="btn btn-link" name="editThemeBtn">Edit</button> 
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

  <div class="modal fade" id="addthememodal" role="dialog" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Theme</h4>
        </div>
        <div id="the-message">
            
        </div>
        <div class="modal-body">
          <div class="the-message"></div>
          <!--<form method="post" action="<?php //echo base_url('admin/addNewTheme') ?>" role="form" enctype="multipart/form-data">-->
          <?php
            $attributes = array("name"=>"newTheme", "id"=>"newTheme", "autocomplete"=>"off");
            echo form_open('admin/addNewTheme', $attributes);
          ?>
            <div class="form-group">
              <label>Theme Name</label>
              <input type="text" class="form-control" name="themeName" id="themeName">
            </div>
            <div class="form-group">
              <label>Theme Description</label>
              <textarea class="form-control" rows="4" name="themeDesc" id="themeDesc" style="resize: vertical;"></textarea>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" onclick="reset_chkbx()">Ok</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
          <!--</form>-->
          <?php  echo form_close(); ?>
        </div> 
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
    $('#themes').DataTable()
  })

  function reset_chkbx() {
    $('input:checkbox').prop('checked', false);
  }

  $('#newTheme').submit(function(e){
      e.preventDefault();

      var newTheme = $(this);

      $.ajax({
        type: 'POST',
        url: newTheme.attr('action'),
        data: newTheme.serialize(),
        dataType: 'json',
        success: function(response){
          if (response.success == true) {
            $('.alert-success').remove();
            // if success we would show message
            // and also remove the error class
            $('#the-message').append('<div class="alert alert-success text-center">' +
            '<span class="glyphicon glyphicon-ok"></span>' +
            ' New theme has been saved.' +
            '</div>');
            
            $('.form-group').removeClass('has-error')
                  .removeClass('has-success');
            $('.text-danger').remove();
            // reset the form
            newTheme[0].reset();
            // close the message after seconds
            $('.alert-success').delay(500).show(10, function() {
            $(this).delay(500).hide(2, function() {
              $(this).remove();
            location.reload();
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
        }
      });
    });
</script>