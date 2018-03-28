<?php 
  $empRole = $this->session->userdata('role');

  /*if(!$this->session->has_userdata('currentSvcID')){
      echo "awan";
  }else{
    $svcid = $this->session->userdata('currentSvcID');
    echo $svcid;
  }*/
 ?>
 <style type="text/css">
   #butt5 {
    width: 100px;
   }

 </style>
<!-- Main content -->
<section class="content container-fluid">
    <div class="box box-primary">
      <div class="box-header">
        <div class="row">
          <div class="col-lg-6">
            <h3 class="box-title">Services</h3> 
          </div>            
          <div class= "col-lg-6">
            <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#addServc" id="butt2">Add Services</button> 
          </div> 
        </div>  
      </div>
      <div class="box-body">
        
        <table id="serviceTable" class="table table-striped table-bordered table-responsive">
          <thead>
            <tr>
              <th>Services</th>
              <th>Quantity</th>
              <th>Amount</th>
              <th>Action</th>
            </tr>
          </thead>
          
          <tbody>
            
            <?php
              if (!empty($avlServcs)) {
                foreach ($avlServcs as $avlSvc) { 
                    $svcID = $avlSvc['serviceID'];
                  ?>

                  <tr>
                    <form id="svcform" role="form" method="post" action="<?php echo base_url('events/upSvcQtyAmt') ?>">
                      <!-- service name -->
                      <td>
                        <?php echo $avlSvc['serviceName'] ?>
                      </td>
                      <!-- quantity -->                
                      <td>
                        <input class="form-control" type="text" name="svcqty" style="border: none;" placeholder="<?php echo $avlSvc['quantity'] ?>">
                      </td>
                      <!-- amount -->
                      <td>
                        <?php 
                          $serviceTotal = number_format($avlSvc['amount'], 2);
                        ?>
                        <input class="form-control" type="text" name="svcamt" style="border: none;" placeholder="<?php echo $serviceTotal ?>">
                      </td>
                      <td>  
                        <input type="hidden" name="svcid" value="<?php echo $avlSvc['serviceID'] ?>">                    
                        <button class="btn btn-link" id="rmvsvcbtn" name="btn" type="submit" value="rmv">Remove <i class="fa fa-remove"></i></button>
                        <button class="btn btn-link" id="updtsvcbtn" name="btn" type="submit" value="updt">Update <i class="fa fa-remove"></i></button>   
                      </td> 
                    </form>
                  </tr>
                <?php }
                  }
                ?>
          </tbody>
        </table>                 
      </div>
    </div>     

    <!--end of service col-->

<div class="control-sidebar-bg"></div> 
</section>
<!-- /.content-wrapper -->
  <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    
</div>
<!-- modals... -->
<!-- add service modal -->
<div class="modal fade" role="dialog" id="addServc">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Service/s</h4>
      </div>
      <div class="modal-body">
        <form id="addsvcform" role="form" method="post" action="<?php echo base_url('events/addsvc') ?>">
          <table class="table table-hover table-responsive table-bordered" id="modalServcTbl">
            <thead>
              <tr>
                <th>Service Name</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>              
                <?php
                  if (!empty($servcs)) {
                    foreach ($servcs as $svc) { ?>
                      <tr>                   
                          <td>
                            <div class="checkbox"><label><input type="checkbox" name="add_servc_chkbox[]" value="<?php echo $svc['serviceID'] ?>" multiple><?php echo $svc['serviceName'] ?></label></div>
                          </td>
                          <td><?php echo $svc['description'] ?></td>
                      </tr>
                <?php }
                  }
                ?>             
            </tbody>            
          </table> 
      </div>
      <div class="modal-footer">                 
        <button class="btn btn-primary" onclick="reset_chkbx()">Reset</button>
        <button form="addsvcform" id="addevtsvc" name="addevtsvc" class="btn btn-default" type="submit">Add</button>
      </div>
      </form>
    </div>

  </div>
</div>



  <!-- REQUIRED JS SCRIPTS -->
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
      $('#serviceTable').DataTable()
      $('#staffTable').DataTable()
      $('#modalServcTbl').DataTable()
      $('#modalStaffTbl').DataTable()
    })

    function reset_chkbx() {
      $('input:checkbox').prop('checked', false);
    }
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
  $(".search").keyup(function () {
    var searchTerm = $(".search").val();
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });
    
  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','false');
  });

  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','true');
  });

  var jobCount = $('.results tbody tr[visible="true"]').length;
    $('.counter').text(jobCount + ' item');

  if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
      });
});
  </script>

<style>
  @media screen and (min-with: 768px){
    #add-event .modal-dialog {
      width:900px;
    }
  }

  #add-event .modal-dialog {
    width:90%;
  }

  #addServc .modal-dialog {
    width:70%;
  }

  #addStaff .modal-dialog {
    width: 70%;
  }
</style>