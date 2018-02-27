<!-- Content Wrapper. Contains page content -->
<?php
  $employeeRole = $this->session->userdata('role');
  if ($employeeRole === 'handler') {
    echo'<div class="content-wrapper">';
   }
?>
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ongoing Events
      </h1>
    </section>

    <!-- Main content -->

    <section class="content container-fluid">
      <button class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#add-event">Add Event</button>

        <!-- add event modal -->
        <div id="add-event" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Event</h4>
              </div>
              <div class="modal-body">
                <form method="post">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Event Name</label>
                        <input type="text" name="event-name" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Client Name</label>
                        <input type="text" name="client-name" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" name="contact-number" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Celebrant</label>
                        <input type="text" name="celebrant" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div>
                        <label>Motiff</label>
                        <input type="color" name="motiff" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label>Event Date</label>
                        <input type="date" name="event-date" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label>Event Time</label>
                        <input type="time" name="event-time" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label>Package Availed</label>
                        <span class="radio"><label><input type="radio" name="event-time" value="full-Package">Full Package</label></span>
                        <soan class="radio"><label><input type="radio" name="event-time" value="semi-Package">Semi Package</label></soan>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Event Location</label>
                        <input type="text" name="event-loc" class="form-control">
                      </div>
                    </div>
                  </div>
                  
                  <!-- Services -->
       
                  <div class="box">
                    <div class="box-body">
                      <div class="table table-responsive">
                        <table id="svc-tbl" class="table table-hover table-bordered table-condensed table-hover text-center">
                          <h4>Services</h4>
                          <thead>
                            <tr>
                              <th>Services</th>
                              <th>Quantity</th>
                              <th>Amount</th>
                            </tr>
                          </thead>
                          <tbody>
                            <!--
                            <tr>
                              <td>
                                <form>
                                  <div class="form-group checkbox">
                                    <label><input type="checkbox" id="" value="gowns">Gowns</label>
                                  </div>
                                </form>
                              </td>
                              <td><input class="form-control" type="text" name="" style="border: none;" placeholder="Insert text here"></td>
                              <td><input class="form-control" type="text" name="" style="border: none;" placeholder="Insert text here"></td>
                            </tr>
                            -->
          
                                <tr>
                                  <td><form><span class="form-group checkbox"><label><input type="checkbox" value="<?php $row["serviceName"]; ?>"></label></span></form></td>
                                  <td><input class="form-control" type="text" name="" style="border: none;" placeholder="Insert text here"></td>
                                  <td><input class="form-control" type="text" name="" style="border: none;" placeholder="Insert text here"></td>
                                </tr>
                            
                            <!--
                            <td>
                              <form>
                                <div class="form-group checkbox">
                                  <label><input type="checkbox" name="" value="makeup">Makeup</label>
                                </div>
                              </form>
                            </td> 
                            --> 
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div> 
                </form>
                <div class="modal-footer">
                  <div class="row">
                    <div class="col-lg-2">
                      <button type="submit" class="btn btn-success" action="submitForm.php">Save</button>
                    </div>
                    <div class="col-lg-2">
                      <button type="reset" class="btn btn-danger" onclick="reset_chkbx()">Reset</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
        <div class="box">
            <div class="box-body">
                <div  class="table table-responsive">
                  <table id ="example1" class="table table-bordered table-condensed table-hover text-center">
                    <thead>
                      <tr>
                        <th>Event Name</th>
                        <th>Client Name</th>
                        <th>Event Type</th>
                        <th>Package Type</th>
                        <th>Event Date</th>
                        <th>Event Time</th>
                        <th>Event Location</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>
                            <div class="col-md-3 col-sm-4"><a data-toggle="modal" data-target="#modal-danger"><i class="fa fa-fw fa-check"></i></a></div>
                            <div class="col-md-3 col-sm-4"><a href="<?php echo base_url('events/eventDetails') ?>"><i class="fa fa-fw fa-info"></i></a></div>
                          </td>
                        </tr>

                    </tbody>
                </table>
              </div>
            </div>
          </div>

        <!-- /.col -->
        <div class="modal modal-danger fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Alert!!!</h4> 
              </div>
              <div class="modal-body">
                <p>Finish This Event?&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline" data-toggle="modal" data-target="#modal-success" data-dismiss="modal">Yes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <div class="modal modal-success fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Success</h4>
              </div>
              <div class="modal-body">
                <p>Event Successfully Finished&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

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
    $('#example1').DataTable()
    $('#svc-tbl').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  function reset_chkbx(){
    $('input:checkbox').prop('checked', false);
  }
</script>
