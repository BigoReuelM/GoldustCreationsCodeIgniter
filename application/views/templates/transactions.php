<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
        Service Transactions
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="content">
       
         <div class="row">
          <div class="col-md-12"> 
            <div class="box">
              <div class="box-header">
                <div class="row">
                  <div class="col-md-9">
                     <h3 class="box-title">Service Transactions Table</h3>
                  </div>
                  <div class="col-md-3">
                    <button class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#add-transactions">Add Transaction</button>  
                  </div>
                </div>
                
             </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div  class="table table-responsive">
                      <table id ="rentalTable" class="table table-bordered table-condensed">
                        <thead>
                          <tr>
                            <th>Celebrant Name</th>
                            <th>Contact Number</th>
                            <th>Balance</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            if(!empty($transactions)){

                            foreach ($transactions as $transac) { 
                              
                          ?> 
                              
                              <tr>
                                <td><?php echo $transac['clientName']; ?></td>
                                <td><?php echo $transac['contactNo']; ?></td>
                                <td><?php echo $transac['amount']; ?></td>
                                <td>
                                  <div class="col-md-3 col-sm-4"><a data-toggle="modal" data-target="#modal-danger"><i class="fa fa-fw fa-check"></i></a></div>
                                  <div class="col-md-3 col-sm-4"><a href="<?php echo base_url('events/eventDetails') ?>"><i class="fa fa-fw fa-info"></i></a></div>
                                </td>
                              </tr>
                          <?php }
                            }else{
                              echo "0 results";
                            }
                          ?>
                      
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div id="add-transactions" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Add New Rental</h4>
                </div>
                <div class="modal-body">
                  <form>
                    <span class="form-group">
                      <label>Client Name</label>
                      <input type="text" id="c-name" class="form-control">
                    </span>

                    <span class="form-group">
                      <label>Contact Number</label>
                      <input type="text" id="contact-number" class="form-control">
                    </span>

                    <span class="form-group">
                      <label>Date Rented</label>
                      <input type="date" id="date-rented" class="form-control">
                    </span>

                    <span class="form-group">
                      <label>Date Due</label>
                      <input type="date" id="date-due" class="form-control">
                    </span>

                    <div class="modal-footer">
                       <div class="col-md-2 col-md-offset-8">
                          <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                        <div class="col-md-2">
                          <button type="submit" class="btn btn-success">Confirm</button>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
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
    $('#rentalTable').DataTable()
    $('#serviceTable').DataTable()
  })
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
