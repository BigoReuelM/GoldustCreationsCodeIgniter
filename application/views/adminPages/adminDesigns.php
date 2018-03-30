<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="row">
        <div class="col-md-9">
          <h3>Design Types</h3>
        </div>
        <div class="col-lg-3">
          <button class="btn btn-primary btn-block btn-lg" role="button">Add New Type</button>
        </div>
      </div> 
    </section>
    <!-- Main content -->
    <section class="content container-fluid">       
        <form action="<?php echo base_url('admin/setCtDesType') ?>" role="form" method="post">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <select class="form-control" name="design_type" id="decor_type" placeholder="">
                  <option disabled selected>Choose</option>
                <?php
                  if (!empty('designTypes')) {
                    foreach ($designTypes as $dt) { ?>
                      <option><?php echo $dt['designType']?></option>
                <?php }
                  }
                ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <button type="submit" class="btn btn-primary">Select</button>
            </div>          
          </div>
        </form> 
<!-- Display all items accdg to the type selected -->
        <?php
        // get the filename of the folders...
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
        ?>
        <?php
          // display all images from the folder...
          if (!empty($type_map)) {
            foreach ($type_map as $img) { ?>
              <div class="col-lg-3">
                <div class="thumbnail">
                  <img src="<?php echo site_url('./uploads/designs/' . $currentDesType . '/' . $img); ?>" alt="" class="galleryImg">
                </div>
              </div>
        <?php } 
          } else {
            echo "No data";
          }
        ?>
     </section>
    <!-- /.content -->
  </div> 
  <!-- /.content-wrapper -->

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
