<?php
$employeeRole = $this->session->userdata('role');
if ($employeeRole === 'handler') {
  echo'<div class="content-wrapper">';
}
$eventId = $this->session->userdata('currentEventID');
   //echo $eventId;

  /*if(!$this->session->has_userdata('currentDecorID')){
      echo "awan";
  }else{
    $decorID = $this->session->userdata('currentDecorID');
    echo $decorID;
  }*/
  ?>
  <style type="text/css">
  * {
    box-sizing: border-box;
  }
  #name{
   width:250%;
   padding: 12px;
   border: 1px solid #ccc;
   border-radius: 4px;
   resize: vertical;
   background-color: #E6E6E6;
 }
 #GovID {
  width:250%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  background-color: #E6E6E6;
}
#updtDecorIdForm input[type=text], select, textarea {
  width:100%;
  padding: 0.5em;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  background-color: #E6E6E6;
  text-align: center;
}

label {
  padding: 6px 6px 6px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  margin-right: 50px;
  width: 25%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media (max-width: 50px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

#con1 {
  width:100%;
  background-color: white;
}

#tab1 {
  border:1px solid #ccc;
  background-color: #E6E6E6;
}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Decors
  </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
  <div class="content">
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-lg-6">
          <h3 class="box-title">List Of Decors</h3>    
        </div>
        <?php
          if ($empRole === "admin") { ?>
            <div class="col-lg-3">
              <button type="button" class="btn btn-block btn-primary btn-md" data-toggle="modal" data-target="#addNewDecorModal">Add New Decor From Computer</button>
            </div>
            <div class="col-lg-3">
              <button type="button" class="btn btn-block btn-primary btn-md" data-toggle="modal" data-target="#addExstDecorModal">Add Existing Decor</button>
            </div>
        <?php } else { ?>
          <div class="col-lg-offset-3 col-lg-3">
            <button type="button" class="btn btn-block btn-primary btn-md" data-toggle="modal" data-target="#addExstDecorModal">Add Decor</button>
          </div>
        <?php }
        ?>

    </div>      
          <!-- /.box-header -->
          <div class="box-body">
            <table id="decorsTable" class="table table-bordered table-responsive table-striped text-center">
              <thead>
                <tr>
                  <th>Decor Name</th>
                  <th>Quantity</th>
                  <th>Photo</th>
                  <th>Action</th>
                </tr>
              </thead>
                <tbody>
                  <?php 
                    if (!empty($eventDecors)) { 
                      foreach ($eventDecors as $td) {
                        $decorID = $td['decorsID'];
                    ?>
                      <tr>
                        <td><?php echo $td['decorName']; ?></td>
                        <td>
                          <form id="updtDecorIdForm" role="form" method="post" action="<?php echo base_url('events/updateEvtDec') ?>">
                            <div class="row">
                              <div class="col-md-6">
                                <input type="text" name="decor_qty" style="border: none;" placeholder="<?php echo $td['quantity']; ?>" class="form-control">
                              </div>
                              <div class="col-md-6">
                                <button class="btn btn-link btn-block" id="updtDecorBtn" name="decorID" type="submit" value="<?php echo $decorID ?>"><i class="fa fa-fw fa-edit"></i> Update</button>
                              </div>
                            </div>
                          </form>
                        </td>
                        <td>
                          <?php
                          if (!empty($eventThemeDet)) {
                            if (!empty($decortypesmap)) {
                              foreach ($decortypesmap as $dtm) {
                                $files = directory_map('./uploads/decors/' . $dtm . '/', 1);
                                foreach ($files as $f) {
                                  $f_no_extension = pathinfo($f, PATHINFO_FILENAME);
                                  if ($f_no_extension === $decorID) { ?>
                                    <div class="thumbnail">
                                      <img src="<?php echo site_url('./uploads/decors/' . $dtm . '/' . $f); ?>" alt="" class="galleryImg">
                                    </div>
                          <?php     
                                }
                              }
                            }
                          }
                          }else{
                            echo "No data";
                          }
                          ?>
                        </td>
                        <td>                            
                          <!-- remove decor button -->
                          <div class="col-md-12 col-sm-12">
                            <form id="decoridform" role="form" method="post" action="<?php echo base_url('events/setCurrentDecorID') ?>">
                              <button class="btn btn-link" id="rmvdecorbtn" name="decorID" type="submit" value="<?php echo $decorID ?>"><i class="fa fa-remove"></i> Remove</button> 
                            </form>   
                          </div>
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

<!-- MODALS -->  
        <!-- add new decor/event decor from computer -->      
        <div class="modal fade" id="addNewDecorModal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Decor From Computer</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url('events/addNewEventDecor') ?>" method="post" role="form" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="decor_name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Color</label>
                    <input type="text" name="decor_color" class="form-control">
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
        </div>

        <!-- add existing an decor to the event -->
        <form role="form" method="post" action="<?php echo base_url('events/addExstEventDec') ?>">
        <div class="modal fade" id="addExstDecorModal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Existing Decor</h4>
              </div>
              <div class="modal-body">
                <div class="box-body">
                  <table id="exstDecors" class="table table-bordered text-center">
                    <thead>
                      <tr>
                        <th>Decor Name</th>
                        <th>Color</th>
                        <th>Type</th>
                        <th>Image</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php
                        foreach ($allDecors as $dec) { ?>
                        <tr>
                          <td><?php echo $dec['decorName'] ?></td>
                          <td><?php echo $dec['color'] ?></td>
                          <td><?php echo $dec['decorType'] ?></td>
                          <td>
                            <?php
                            if (!empty($decortypesmap)) {
                              foreach ($decortypesmap as $dtm) {
                                $files = directory_map('./uploads/decors/' . $dtm . '/', 1);
                                foreach ($files as $f) {
                                  $f_no_extension = pathinfo($f, PATHINFO_FILENAME);
                                  if ($f_no_extension === $dec['decorsID']) { ?>
                                    <div class="thumbnail">
                                      <img src="<?php echo site_url('./uploads/decors/' . $dtm . '/' . $f); ?>" alt="" class="galleryImg">
                                    </div>
                            <?php     
                                  }
                                }
                              }
                            }else{
                              echo "No image";
                            }
                            ?>
                          </td>
                          <td><button type="submit" name="addExstDecor" class="btn btn-sm btn-primary" value="<?php echo $dec['decorsID'] ?>">Choose</button></td>
                        </tr>
                      <?php  } ?>
                      
                    </tbody> 
                  </table>
                </div>
                <!--<form action="<?php //echo base_url('events/addNewEventDecor') ?>" method="post" role="form" enctype="multipart/form-data">
                  
                  <div class="modal-footer">
                    <button type="submit" name="addExstDecor" class="btn btn-sm btn-primary">Add</button>
                  </div>
                </form>-->
              </div>
            </div>
          </div>
        </div> 
      </form>
      </section>  
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

  <script>
    $(function () {
      $('#decorsTable').DataTable({
      })
      $('#exstDecors').DataTable({
      })
    })
  </script>

  <script>
    $('#modal-dialog').on('show', function() {
      var link = $(this).data('link'),
      confirmBtn = $(this).find('.confirm');
    })


    $('#btnYes').click(function() {

      // handle form processing here
      
      alert('submit form');
      $('form').submit();

    });

  // submit decor id form
  function (){
    // open modal first... 
    //$('#rmvdecor').modal('show');
    // submit this form to set decor id session variable ...
    var form = document.getElementById("dltdecorform");
    // button id v ... form id ^
    document.getElementById("decorID").addEventListener("click", function(){
      form.submit();
    });
    // remove ... create a query that will remove the data itself in the database
  };
  
  /*function changeBtnVal(val){
    document.getElementById("rmvbtn").value = val;
    //alert("btn value" + document.getElementById("rmvbtn").value);
  }*/
</script>

<style>
@media screen and (min-width: 768px){
  #changedecormodal .modal-dialog {
    width:90%;
  }
  #addExstDecorModal .modal-dialog {
    width:70%;
  }
}
</style>