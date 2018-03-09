

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Entourage
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-lg-9">
              <h3 class="box-title">Attire Designs</h3>    
            </div>
            <div class="col-lg-3">
              <button type="button" class="btn btn-block btn-primary btn-lg" >Add Attire Designs</button>  
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="designTable" class="table table-bordered table-striped text-center">
            <thead>
            <tr>
              <th>Design ID</th>
              <th>Name</th>
              <th>Quantity</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              <?php
                if (!empty($designs)) {
                   foreach ($designs as $design) {
                     
              ?>
              <tr>
                <td><?php echo $design['designID'] ?></td>
                <td><?php echo $design['designName'] ?></td>
                <td><?php echo $design['quantity'] ?></td>
                <td><?php echo '<a data-toggle="modal" data-target="#modal-photo"><img class="eventDecorsImg" src="data:image/jpeg;base64,' . base64_encode($design['designImage']) . '"/></a>' ?></td>
                <td>
                  <div class="col-md-3 col-sm-4"><a data-toggle="modal" data-target="#modal-photo"><i class="fa fa-fw fa-exchange"></i></a></div>
                  <div class="col-md-3 col-sm-4"><a data-toggle="modal" data-target="#modal-danger"><i class="fa fa-fw fa-remove"></i></a></div>
                </td>
              </tr>
              <?php 
                   }
                 }else {
                  echo "0 details";
                 }
              ?>
            </tbody>
          </table>
        </div>
            <!-- /.box-body -->
      </div>

      <div class="box">
        

        <div class="box-header">
          <div class="row">
            <div class="col-lg-6">
              <h3 class="box-title">List of Entourage</h3>
            </div>
            <div class="col-lg-3">
              <a type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addEntourage" >Add Entourage</a>

              <!-- Modal for adding of entourage -->
              <div class="modal fade" id="addEntourage" role="dialog">
                  <div class="modal-dialog">

                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="col-lg-6">
                          <h4 class="modal-title">Add Entourage</h4>
                        </div>
                        <div class="col-lg-6" id="butt1">
                          <a type="button" class="btn btn-block btn-primary btn-lg">Add</a>
                        </div>
                      </div>
                    <div class="modal-body">
                  <div class="box">
      
                    <div class="box-body">
                      
                    
                      <table id="entourageTableEdit" class="table table-bordered table-striped table-hover text-center">
                        <thead>
                        <tr>
                          <th>Name</th>
                          <th>Role</th>
                          <th>Shoulder</th>
                          <th>Chest</th>
                          <th>Stomach</th>
                          <th>Waist</th>
                          <th>Arm Length</th>
                          <th>Arm Hole</th>
                          <th>Muscle</th>
                          <th>Pants Length</th>
                          <th>Baston</th>
                          <th>Design Photo</th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                            <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Name">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Role">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Shoulder">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Chest">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Stomach">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Waist">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Arm Length">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Arm Hole">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Muscle">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Pants Length">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Baston">
                                  </div>
                            </td>
                            <td>
                              <form action="" method="post" enctype="multipart/form-data" id="js-upload-form" id="lname">
              <div class="form-inline" id="lname">
                <div class="form-group">
                  <input type="file" name="files[]" id="js-upload-files" multiple id="lname">
                </div>
              </div>
            </form>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Name">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Role">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Shoulder">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Chest">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Stomach">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Waist">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Arm Length">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Arm Hole">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Muscle">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Pants Length">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Baston">
                                  </div>
                            </td>
                            <td>
                              <form action="" method="post" enctype="multipart/form-data" id="js-upload-form" id="lname">
              <div class="form-inline" id="lname">
                <div class="form-group">
                  <input type="file" name="files[]" id="js-upload-files" multiple id="lname">
                </div>
              </div>
            </form>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Name">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Role">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Shoulder">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Chest">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Stomach">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Waist">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Arm Length">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Arm Hole">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Muscle">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Pants Length">
                                  </div>
                            </td>
                            <td>
                              <div>
                                    <input type="text" id="lname" name="lastname" placeholder="Baston">
                                  </div>
                            </td>
                            <td>
                              <form action="" method="post" enctype="multipart/form-data" id="js-upload-form" id="lname">
              <div class="form-inline" id="lname">
                <div class="form-group">
                  <input type="file" name="files[]" id="js-upload-files" multiple id="lname">
                </div>
              </div>
            </form>
                            </td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                        <!-- /.box-body -->
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Add</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
        
              </div>
            </div>
            </div>
              <!-- End of modal -->
              <div class="col-lg-3">
              <a type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#editEntourage" >Edit Entourage</a>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="entourageTable" class="table table-bordered table-striped text-center">
            <thead>
            <tr>
              <th>Name</th>
              <th>Role</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              <?php 
                foreach ($entourageDet as $details) { ?>
                  <tr>
                    <td><?php echo $details['entourageName'] ?></td>
                    <td><?php echo $details['role'] ?></td>
                    <td>status</td>
                    <td>
                      <div class="col-md-3 col-sm-4"><a data-toggle="modal" data-target="#modal-photo"><i class="fa fa-fw fa-exchange"></i></a></div>
                      <div class="col-md-3 col-sm-4"><a data-toggle="modal" data-target="#modal-danger"><i class="fa fa-fw fa-remove"></i></a></div>
                    </td>
                  </tr>
              <?php  }
              ?>
            </tbody>
          </table>
          <button type="button" class="button1">Save</button>
        </div>
        <!-- /.box-body -->
      </div>

          
          </div>
        
          <!-- edit entourage -->
          <div class="modal modal-default fade" id="editEntourage">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Entourage</h4> 
                </div>
                <div class="modal-body">
                  <div class="box">
      
                    <div class="box-body">
                      <table id="entourageTableEdit" class="table table-bordered table-striped table-hover text-center">
                        <thead>
                        <tr>
                          <th>Name</th>
                          <th>Role</th>
                          <th>Shoulder</th>
                          <th>Chest</th>
                          <th>Stomach</th>
                          <th>Waist</th>
                          <th>Arm Length</th>
                          <th>Arm Hole</th>
                          <th>Muscle</th>
                          <th>Pants Length</th>
                          <th>Baston</th>
                          <th>Design Photo</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php
                            if (!empty($entourageDet)) {
                               foreach ($entourageDet as $det) {
                               $entId = $det['entourageID'];     
                          ?>
                          <tr>
                            <td><?php echo $det['entourageName'] ?></td>
                            <td><?php echo $det['role'] ?></td>
                            <td><?php echo $det['shoulder'] ?></td>
                            <td><?php echo $det['chest'] ?></td>
                            <td><?php echo $det['stomach'] ?></td>
                            <td><?php echo $det['waist'] ?></td>
                            <td><?php echo $det['armLength'] ?></td>
                            <td><?php echo $det['armHole'] ?></td>
                            <td><?php echo $det['muscle'] ?></td>
                            <td><?php echo $det['pantsLength'] ?></td>
                            <td><?php echo $det['baston'] ?></td>
                            <td><?php echo '<a data-target="#modal-photo" data-toggle="modal"><img class="eventDecorsImg" src="data:image/jpeg;base64,' . base64_encode($det['designImage']) . '"/></a>' ?></td>
                            <td>
                              <div class="col-md-3 col-sm-4"><a data-toggle="modal" data-target="#modal-danger"><i class="fa fa-fw fa-remove"></i></a></div>
                              <!--
                              <div class="col-md-3 col-sm-4">
                                <form role="form" method="post" action="<?php //echo base_url('events/setEntourageID') ?>">
                                  <button class="btn-link" id="entInfo" name="entInfo" type="submit" value="<?php //echo($entId) ?>"><i class="fa fa-fw fa-exchange"></i></button>
                                </form>
                              </div>-->
                            </td>
                          </tr>
                          <?php 
                               }
                             }
                          ?>
                        </tbody>
                      </table>
                    </div>
                        <!-- /.box-body -->
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
          <!-- /.modal-dialog -->
          </div>

          <!-- modal body -->
          <div class="modal modal-default fade" id="modal-photo">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Design Name Here</h4> 
                </div>
                <div class="modal-body">
                  <!--<img class="eventDecorsImg" src="" alt="photo">
                  <?echo $attirePhoto ?>-->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <a href="<?php echo base_url('items/gowns') ?>"><button type="button" class="btn btn-primary">Change</button></a>
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Remove</button>
                </div>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
          <!-- /.modal-dialog -->

          <div class="modal fade" id="modal-danger">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Alert!</h4> 
                </div>
                <div class="modal-body">
                  <p>Remove this person from the list?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Remove</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
          <!-- /.modal-dialog -->
          </div>
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
<script>
  $(function () {
    $('#designTable').DataTable({
    })
    $('#entourageTable').DataTable({
    })
    $('#entourageTableEdit').DataTable({
    })
  })
</script>
<style>
  @media screen and (min-with: 768px){
    #editEntourage .modal-dialog {
      with:900px;
    }
  }

  #editEntourage .modal-dialog {
    width:90%;
  }
    @media screen and (min-with: 768px){
    #addEntourage .modal-dialog {
      with:950px;
    }
  }

  #addEntourage .modal-dialog {
    width:95%;
  }

  #lname {
    width: 70px;
  }

  #butt1 {
    float:right;
    width:250px;
  }
</style>