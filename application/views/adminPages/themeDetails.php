  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="box-header">
        <div class="row">
          <div class="col-md-9">
            <h3>Theme Details</h3>
          </div>
        </div>  
     </div>
    </section>
    <section class="content container-fluid">
      <div class="box">
        <div class="box-header">
          
        </div>
        <div class="box-body">
          <form role="form" method="post" action="<?php echo base_url('') ?>">
            <div class="form-group">
              <label>Theme Name</label>
              <input type="text" class="form-control" name="themeName" placeholder="<?php echo $themeDet->themeName ?>">
            </div>
            <div class="form-group">
              <label>Theme Description</label>
              <textarea class="form-control" rows="3" name="themeDesc" placeholder="<?php echo $themeDet->themeDesc ?>"></textarea>
            </div>
            <div class="box">
              <div class="box-header">
                <div class="row">
                  <div class="col-md-9">
                    <h4>Decors</h4>
                  </div>
                  <div class="col-md-3">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addDecorModal">Add Decor</button>
                  </div>
                </div>
              </div>
              <div class="box-body">
                <div class="table table-responsive">
                  <table id="themedecors" class="table table-bordered table-hover text-center">
                    <thead>
                      <tr>
                        <th>Decor Name</th>
                        <th>Color</th>
                        <th>Type</th>
                        <th>Image</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        if (!empty($themeDecor)) {
                          foreach ($themeDecor as $td) {
                      ?>
                      <tr>
                        <td><?php echo $td['decorName']; ?></td>
                        <td><?php echo $td['color']; ?></td>
                        <td><?php echo $td['decorType']; ?></td>
                        <td>
                          <?php 
                          if (!empty($decortypesmap)) {
                          foreach ($decortypesmap as $dtm) {
                            // files inside uploads/designs/type/
                            $files = directory_map('./uploads/decors/' . $dtm . '/', 1);
                            foreach ($files as $f) {
                              $f_no_extension = pathinfo($f, PATHINFO_FILENAME);
                              if ($f_no_extension === $td['decorsID']) { ?>
                                <div class="thumbnail">
                                  <img src="<?php echo site_url('./uploads/decors/' . $dtm . '/' . $f); ?>" alt="" class="galleryImg">
                                </div>
                            <?php  }
                              }
                            }
                          }
                          ?>
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
            <div class="box">
              <div class="box-header">
                <div class="row">
                  <div class="col-md-9">
                    <h4>Designs</h4>
                  </div>
                  <div class="col-md-3">
                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#addDesignModal" type="button">Add Design</button>
                  </div>
                </div>
              </div>
              <div class="box-body">
                <div class="table table-responsive">
                  <table id="themedesigns" class="table table-bordered table-condensed table-hover text-center">
                    <thead>
                      <tr>
                        <th>Design Name</th>
                        <th>Color</th>
                        <th>Type</th>
                        <th>Image</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        if (!empty($themeDesign)) {
                          foreach ($themeDesign as $td) {
                      ?>
                      <tr>
                        <td><?php echo $td['designName']; ?></td>
                        <td><?php echo $td['color']; ?></td>
                        <td><?php echo $td['designType']; ?></td>
                        <td>
                          <?php 
                          if (!empty($designtypesmap)) {
                          foreach ($designtypesmap as $dtm) {
                            // files inside uploads/designs/type/
                            $files = directory_map('./uploads/designs/' . $dtm . '/', 1);
                            foreach ($files as $f) {
                              $f_no_extension = pathinfo($f, PATHINFO_FILENAME);
                              if ($f_no_extension === $td['designID']) { ?>
                                <div class="thumbnail">
                                  <img src="<?php echo site_url('./uploads/designs/' . $dtm . '/' . $f); ?>" alt="" class="galleryImg">
                                </div>
                            <?php  }
                              }
                            }
                          }
                          ?>
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
          </form>
        </div>       
      </div>
<!-- Modals -->
      <div class="modal fade" id="addDecorModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add Decor</h4>
            </div>
            <div class="modal-body">
              <div class="the-message">
              </div>
              <form action="<?php echo base_url('admin/addNewThemeDecor') ?>" method="post" role="form" enctype="multipart/form-data" autocomplete="off">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="decor_name" id="decor_name" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Color</label>
                <input type="text" name="decor_color" id="decor_color" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Type</label>
                <select class="form-control" name="decor_type" id="decor_type">
                  <?php
                    if (!empty('decorTypes')) {
                      foreach ($decorTypes as $dt) { ?>
                    <option><?php echo $dt ?></option>
                  <?php }
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Image</label>
                <div class="form-group">
                  <label>Select files from your computer</label>
                  <input type="file" name="userfile" >
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="upload" class="btn btn-sm btn-primary">Upload files</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="addDesignModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add Design</h4>
            </div>
            <div class="modal-body">
              <div class="the-message">
              </div>
              <form action="<?php echo base_url('admin/addNewThemeDesign') ?>" method="post" role="form" enctype="multipart/form-data" autocomplete="off">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="design_name" id="design_name" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Color</label>
                <input type="text" name="design_color" id="design_color" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Type</label>
                <select class="form-control" name="design_type" id="design_type">
                  <?php
                    if (!empty('designTypes')) {
                      foreach ($designTypes as $dt) { ?>
                    <option><?php echo $dt ?></option>
                  <?php }
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Image</label>
                <div class="form-group">
                  <label>Select files from your computer</label>
                  <input type="file" name="userfile">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="upload" class="btn btn-sm btn-primary">Upload files</button>
            </div>
            </form>
          </div>
        </div>
      </div>

    </section>
  </div>

  <div class="control-sidebar-bg"></div>
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
    $('#themedecors').DataTable()
    $('#themedesigns').DataTable()
  })

  function reset_chkbx() {
    $('input:checkbox').prop('checked', false);
  }
</script>