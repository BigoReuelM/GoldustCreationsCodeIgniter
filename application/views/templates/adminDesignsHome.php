<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="row">
        <div class="col-md-9">
          <h3>Design Types</h3>
        </div>
        <?php
          if ($empRole === "admin") { ?>
            <div class="col-lg-3">
              <button class="btn btn-primary btn-block btn-lg" role="button" data-toggle="modal" data-target="#addDesType">Add New Type</button>
            </div>
        <?php  }
        ?>
        
      </div> 
    </section>
    <!-- Main content -->
    <section class="content container-fluid">       
        <form action="<?php echo base_url('events/setDesignType') ?>" role="form" method="post">
          <div class="row">       
            <?php
              if (!empty('designTypes')) {
                foreach ($designTypes as $dt) { ?>
                  <div class="col-md-3" style="margin-bottom: 10px;">
                    <button name="design_type" id="design_type" type="submit" class="btn btn-primary btn-block" value="<?php echo $dt ?>"><?php echo $dt ?></button>
                  </div>  
            <?php }
              }
            ?>
          </div>
        </form>      
      <!-- Display all items accdg to the type selected -->
        <?php
        // get the filename of the folders...
        if (!empty($map)) {
        foreach ($map as $key => $m) {
          $currentDesType = $this->session->userdata('currentType');
            // remove characters except letters, dashes, and numbers
            $m_cleanstring = preg_replace("/[^a-zA-Z0-9\s \w-]/", "", $m);
            if ($currentDesType === $m_cleanstring) {
          ?>
          <!-- submit name of the folder similarly named to the current type selected -->
            <input type="hidden" name="typefolder" value="<?php echo $m_cleanstring ?>">
          <?php
              }
            }
          }
        ?>
                    
           
     </section>
    <!-- /.content -->
  </div> 
  <!-- /.content-wrapper -->

  <!-- modals... -->
  <div class="modal fade" id="addDesType" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Design Type</h4>
        </div>
        <div class="modal-body">
          <!--<form role="form" method="post" action="<?php //echo base_url('events/addNewDesType') ?>">-->
          <div class="the-message"></div>
          <?php
            $attributes = array("name"=>"addNewDesTypeForm", "id"=>"addNewDesTypeForm", "autocomplete"=>"off");
            echo form_open('events/addNewDesType', $attributes);
          ?>
            <div class="form-group">
              <label>Name</label>
              <input class="form-control" type="text" name="type_name" id="type_name">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Ok</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
        <?php echo form_close(); ?>
        <!--</form>-->
      </div>
    </div>
  </div>

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

<script type="text/javascript">
  $('#addNewDesTypeForm').submit(function(e){
      e.preventDefault();

      var addNewDesTypeForm = $(this);

      $.ajax({
        type: 'POST',
        url: addNewDesTypeForm.attr('action'),
        data: addNewDesTypeForm.serialize(),
        dataType: 'json',
        success: function(response){
          if (response.success == true) {
            // if success we would show message
            // and also remove the error class
            $('#the-message').append('<div class="alert alert-success text-center">' +
            '<span class="glyphicon glyphicon-ok"></span>' +
            ' New decor type has been saved.' +
            '</div>');
            
            $('.form-group').removeClass('has-error')
                  .removeClass('has-success');
            $('.text-danger').remove();
            // reset the form
            addNewDesTypeForm[0].reset();
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

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
