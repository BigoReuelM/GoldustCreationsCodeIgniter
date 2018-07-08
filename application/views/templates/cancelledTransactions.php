<style type="text/css">
  th {
    text-align: center;
  }
  .tblnum {
    text-align: right;
  }
</style>
<?php 
  
  $empRole = $this->session->userdata('role');
 ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
        Cancelled Service Transactions
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Cancelled Transactions Table</h3>
        </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div  class="table table-responsive">
              <table id ="rentalTable" class="table table-bordered table-condensed">
                <thead>
                  <tr>
                    <th>Client Name</th>
                    <th>Contact Number</th>
                    <th>Total Amount</th>
                    <th>Cancelled Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if(!empty($cancelledTransactions)){

                    foreach ($cancelledTransactions as $ctransac) { 
                    $ctranID = $ctransac['transactionID'];
                      
                  ?> 
                      
                      <tr>
                        <td><?php echo $ctransac['clientName']; ?></td>
                        <td class="tblnum"><?php echo $ctransac['contactNumber']; ?></td>
                        <td class="tblnum">
                          <?php
                            $trasacAmountReformated = number_format($ctransac['totalAmount'], 2); 
                            echo $trasacAmountReformated; 
                          ?>
                        </td>
                        <td class="tblnum"><?php echo $ctransac['cancelledDate'] ?></td>
                        <td>

                          <form role="form" action="<?php echo base_url('transactions/setTransactionID') ?>" method="post">
                            <input type="text" value="<?php echo($ctranID) ?>" name="transInfo" hidden>
                            <button class="btn btn-block" type="submit">View Info <i class="fa fa-fw fa-info"></i></button>
                          </form>

                        </td>
                      
                  <?php }
                    }else{
                      echo "0 results";
                    }
                  ?>
                  </tr>
              
                </tbody>
              </table>
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
    $('#borrowedItms').DataTable()
    $('#tTable').DataTable()
  })
  function reset_chkbx(){
    $('input:checkbox').prop('checked', false);
  }
</script>
<style>
  @media screen and (min-with: 768px){
    #addServiceTransaction .modal-dialog {
      with:900px;
    }
  }

  #addServiceTransaction .modal-dialog {
    width:75%;
  }
</style>

<script>
  $(document).ready(function(){
    $(".open-transactionDetails").on('click', function(){
      var tID = this.getAttribute('value');
      $('#transactionId').val(tID);
       
      
      $.ajax({
        //url: "<?php echo base_url(); ?>transactions/setTransactionID",
        type: 'post',
        data: {tID : this.getAttribute('value')},
        success: function() {
          console.log(tID);
        }

      })
      $("#transactdetails").modal("show");  
    })
  })
  
</script>


              

                  <!-- borrowed items --> 
                  <!--
                  <div class="col-lg-12">
                    <div class="box">
                      <div class="box-header">
                        <h4>Borrowed Items</h4>
                      </div>
                      <div class="box-body">
                        <div class="table table-responsive">
                          <table id="borrowedItms" class="table table-bordered table-condensed table-hover text-center">
                            <thead>
                              <tr>
                                <th>Item Name</th>
                                <th>Color</th>
                                <th>Image</th>
                              </tr>
                            </thead>
                            <tbody>
                            -->
                              <!--<label>Decors</label>-->
                              <!--
                              <?php
                                foreach ($decors as $dec) { ?> 
                                  <tr>
                                    <td><form><span class="form-group checkbox"><label><input type="checkbox" name="" value=""></label><?php echo $dec['decorName']?></span></form></td>
                                    <td><?php echo $dec['color'] ?></td>
                                    <td><?php echo '<img class="eventDecorsImg" src="data:image/jpeg;base64,' . base64_encode($dec['decorImage']) . '"/>' ?></td>
                                  </tr>
                              <?php  }
                              ?>
                            -->
                              <!--<label>Designs</label>-->
                              <!--
                              <?php
                                foreach ($designs as $des) { ?>
                                  <tr>
                                    <td><form><span class="form-group checkbox"><label><input type="checkbox" name="" value=""></label><?php echo $des['designName']?></span></form></td>
                                    <td><?php echo $des['color'] ?></td>
                                    <td><?php echo '<img class="eventDecorsImg" src="data:image/jpeg;base64,' . base64_encode($des['designImage']) . '"/>' ?></td>
                                  </tr>
                              <?php  }
                              ?>
                            </tbody>
                          </table>  
                        </div>
                      </div>
                    </div>
                  </div>
                  -->