
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Services
      </h1>
    </section>
    <section class="content container-fluid">
      <a href="addEvent.php" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#adserv" >Add Service </a>
      <!-- Modal for Add Services -->
      <div class="modal fade" id="adserv" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Service</h4>
        </div>
        <div class="modal-body">
          <form>
              <div class="row" id="row1">
                  <div class="col-lg-7" id="row1">
                      <div class="form-group" id="row1">
                          <label>Name:</label>
                          <input type="text" id="staff-name" class="form-control">
                      </div>
                  </div>
              </div>
              <div class="row" id="row1">
                  <div class="col-lg-7" id="row1">
                          <div class="form-group" id="row1">
                              <label>Description:</label>
              <!-- combobox intended here.... -->
                              <input type="text" id="staff-role" class="form-control">
                          </div>
                  </div>
              </div>
            </form>
          </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      </div>
      </div>
      <!-- End of modal -->
    <h2>   Active Services</h2>
    <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
                <table id="rentalService" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Descriptions</th>
                      <th id="tietch">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Gown</td>
                      <td>Rental of Gowns</td>
                      <td id="tietch">
                        <a href="#">
                    <span class="glyphicon glyphicon-ban-circle" id="active" data-toggle="modal" data-target="#deact"></span>
                    <!-- Modal for  deactivating services -->
                  <div class="modal fade" id="deact" role="dialog" >
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Alert</h4>
                      </div>
                      <div class="modal-body">
                        <p> Are you sure you want to deactivate this Service? </p>  
                      </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                      </div>
                    </div>
                    </div>
                    </div>
                    <!-- End of modal for  deactivating services-->
                </a>
                <a href="#">
                    <span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#eddd"></span>
                    <!--start of edit service modal -->
                    <div class="modal fade" id="eddd" role="dialog" >
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Service</h4>
                      </div>
                      <div class="modal-body">
                        <form>
                            <div class="row" id="row1">
                                <div class="col-lg-7" id="row1">
                                    <div class="form-group" id="row1">
                                        <label>Type:</label>
                                        <input type="text" id="staff-name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="row1">
                                <div class="col-lg-7" id="row1">
                                        <div class="form-group" id="row1">
                                            <label>Description:</label>
                            <!-- combobox intended here.... -->
                                            <input type="text" id="staff-role" class="form-control">
                                        </div>
                                </div>
                            </div>
                          </form>
                      </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Edit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                    </div>
                    </div>
                    <!-- end of edit service modal -->
                </a>
                </td>
                    </tr>
                    <tr>
                      <td>Accessories</td>
                      <td>Rental of Accessories</td>
                      <td id="tietch">
                        <a href="#">
                    <span class="glyphicon glyphicon-ban-circle" id="active" data-toggle="modal" data-target="#deact"></span>
                    <!-- Modal for  deactivating services -->
                  <div class="modal fade" id="deact" role="dialog" >
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Alert</h4>
                      </div>
                      <div class="modal-body">
                        <p> Are you sure you want to deactivate this Service? </p>  
                      </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                      </div>
                    </div>
                    </div>
                    </div>
                    <!-- End of modal for  deactivating services-->
                </a>
                <a href="#">
                    <span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#eddd"></span>
                    <!--start of edit service modal -->
                    <div class="modal fade" id="eddd" role="dialog" >
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Service</h4>
                      </div>
                      <div class="modal-body">
                        <form>
                            <div class="row" id="row1">
                                <div class="col-lg-7" id="row1">
                                    <div class="form-group" id="row1">
                                        <label>Type:</label>
                                        <input type="text" id="staff-name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="row1">
                                <div class="col-lg-7" id="row1">
                                        <div class="form-group" id="row1">
                                            <label>Description:</label>
                            <!-- combobox intended here.... -->
                                            <input type="text" id="staff-role" class="form-control">
                                        </div>
                                </div>
                            </div>
                          </form>
                      </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Edit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                    </div>
                    </div>
                    <!-- end of edit service modal -->
                </a>
                </td>
                    </tr>
                    <tr>
                      <td>Make-Up</td>
                      <td>Make-Up Services</td>
                      <td id="tietch">
                        <a href="#">
                    <span class="glyphicon glyphicon-ban-circle" id="active" data-toggle="modal" data-target="#deact"></span>
                    <!-- Modal for  deactivating services -->
                  <div class="modal fade" id="deact" role="dialog" >
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Alert</h4>
                      </div>
                      <div class="modal-body">
                        <p> Are you sure you want to deactivate this Service? </p>  
                      </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                      </div>
                    </div>
                    </div>
                    </div>
                    <!-- End of modal for  deactivating services-->
                </a>
                <a href="#">
                    <span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#eddd"></span>
                    <!--start of edit service modal -->
                    <div class="modal fade" id="eddd" role="dialog" >
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Service</h4>
                      </div>
                      <div class="modal-body">
                        <form>
                            <div class="row" id="row1">
                                <div class="col-lg-7" id="row1">
                                    <div class="form-group" id="row1">
                                        <label>Type:</label>
                                        <input type="text" id="staff-name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="row1">
                                <div class="col-lg-7" id="row1">
                                        <div class="form-group" id="row1">
                                            <label>Description:</label>
                            <!-- combobox intended here.... -->
                                            <input type="text" id="staff-role" class="form-control">
                                        </div>
                                </div>
                            </div>
                          </form>
                      </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Edit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                    </div>
                    </div>
                    <!-- end of edit service modal -->
                </a>
                </td>
                    </tr>

                    <!--
                    <tr>
                        <div class="col-md-3 col-sm-4"><a data-toggle="modal" data-target="#modal-danger"><i class="fa fa-fw fa-check"></i></a></div>
                        <div class="col-md-3 col-sm-4"><a href="eventDetails.php"><i class="fa fa-fw fa-info"></i></a></div>
                      </td>
                    </tr>
                  -->
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <h2>   Deactivated Services</h2>
    <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
                <table id="rentalService" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Descriptions</th>
                      <th id="tietch">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Gown</td>
                      <td>Rental of Gowns</td>
                      <td id="tietch">
                        <a href="#" >
                    <span class="glyphicon glyphicon-ok-sign" id="active" data-toggle="modal" data-target="#act"></span>
                    <!-- Modal for  activating services -->
                  <div class="modal fade" id="act" role="dialog" >
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Alert</h4>
                      </div>
                      <div class="modal-body">
                        <p> Are you sure you want to activate this Service? </p>  
                      </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                      </div>
                    </div>
                    </div>
                    </div>
                    <!-- End of modal for  activating services-->

                </a>
                </td>
                    </tr>
                    <tr>
                      <td>Accessories</td>
                      <td>Rental of Accessories</td>
                      <td id="tietch">
                        <a href="#">
                    <span class="glyphicon glyphicon-ok-sign" id="active" data-toggle="modal" data-target="#act"></span>
                  <!-- Modal for  activating services -->
                  <div class="modal fade" id="act" role="dialog" >
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Alert</h4>
                      </div>
                      <div class="modal-body">
                        <p> Are you sure you want to activate this Service? </p>  
                      </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                      </div>
                    </div>
                    </div>
                    </div>
                    <!-- End of modal for  activating services-->
                </a>
                </td>
                    </tr>
                    <tr>
                      <td>Make-Up</td>
                      <td>Make-Up Services</td>
                      <td id="tietch">
                        <a href="#">
                    <span class="glyphicon glyphicon-ok-sign" id="active" data-toggle="modal" data-target="#act"></span>
                  <!-- Modal for  activating services -->
                  <div class="modal fade" id="act" role="dialog" >
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Alert</h4>
                      </div>
                      <div class="modal-body">
                        <p> Are you sure you want to activate this Service? </p>  
                      </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                      </div>
                    </div>
                    </div>
                    </div>
                    <!-- End of modal for  activating services-->
                </a>
                </td>
                    </tr>

                <!--
                    <tr>
                        <div class="col-md-3 col-sm-4"><a data-toggle="modal" data-target="#modal-danger"><i class="fa fa-fw fa-check"></i></a></div>
                        <div class="col-md-3 col-sm-4"><a href="eventDetails.php"><i class="fa fa-fw fa-info"></i></a></div>
                      </td>
                    </tr>
                  -->
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
         </section>
    <!-- Main content -->
    
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
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>