<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="row">
        <div class="col-md-9">
          <h3>Design Types</h3>
        </div>
        <div class="col-lg-3">
          <button class="btn btn-primary btn-block btn-lg" role="button" data-toggle="modal" data-target="#addDesType">Add New Type</button>
        </div>
      </div> 
    </section>
    <!-- Main content -->
    <section class="content container-fluid">       
        <form action="<?php echo base_url('admin/setCtDesType') ?>" role="form" method="post">
          <div class="row">
            <div class="col-md-3">
                <?php
                  if (!empty('designTypes')) {
                    foreach ($designTypes as $dt) { ?>
                      <button name="design_type" id="design_type" type="submit" class="btn btn-primary" value="<?php echo $dt['designType']?>"><?php echo $dt['designType']?></button>
                <?php }
                  }
                ?>
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
            </div>        
          </div>
        </form> 
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
          <form role="form" method="post" action="<?php echo base_url() ?>">
            <div class="form-group">
              <label>Name</label>
              <input class="form-control" type="text" name="type_name">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
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

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
