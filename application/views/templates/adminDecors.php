<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="row">
        <div class="col-md-9">
          <h3>Decors</h3>
        </div>
        <div class="col-lg-3">
          <button class="btn btn-primary btn-block btn-lg" role="button" data-toggle="modal" data-target="#addNew">Add New</button>
        </div>
      </div> 
    </section>
    <!-- Main content -->
    <section class="content container-fluid">       
<!-- Display all items accdg to the type selected -->
        <?php
          $currentDecType = $this->session->userdata('currentType');
          // display all images from the folder...
          if (!empty($type_map)) {
            foreach ($type_map as $img) { ?>
              <div class="col-lg-3">
                <div class="thumbnail">
                  <img src="<?php echo site_url('./uploads/decors/' . $currentDecType . '/' . $img); ?>" alt="" class="galleryImg">
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

<!-- modals... -->
  <div class="modal fade" id="addDecType" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Decor Type</h4>
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

  <div id="addNew" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload New Decor</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('events/uploadDecImg') ?>" method="post" role="form" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Decor Name</label>
                  <input type="text" name="dec_name" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Color</label>
                  <input type="text" name="dec_color" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Select files from your computer</label>
              <input type="file" name="userfile" >
            </div>         
    
            <div class="modal-footer">
              <button type="submit" name="upload" class="btn btn-sm btn-primary">Upload files</button>
            </div>  
          </form>  
        </div>    
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
