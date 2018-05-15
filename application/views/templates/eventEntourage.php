<style type="text/css">
  input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
  }

  input[type=text], select, textarea {
    width:100%;
    padding: 0.5em;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    background-color: #E6E6E6;
    text-align: center;
  }
</style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php
          $name = $eventName->eventName; 
          echo '<p>' . $name . '</p>';    
        ?>
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
              <button type="button" class="btn btn-block btn-primary btn-md" data-toggle="modal" data-target="#addExstDesignModal" >Add Attire Designs</button>  
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="designTable" class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                   <?php 
                    if (!empty($eventDesigns)) { 
                      foreach ($eventDesigns as $td) {
                        $designID = $td['designID'];
                    ?>
                      <tr>
                        <td><?php echo $td['designName']; ?></td>
                        <td>
                          <form id="updtDesignIdForm" role="form" method="post" action="<?php echo base_url('events/updateEvtDes') ?>">
                            <div class="row">
                              <div class="col-md-6">
                                <input type="text" name="design_qty" style="border: none;" placeholder="<?php echo $td['quantity']; ?>" class="form-control">
                              </div>
                              <div class="col-md-6">
                                <button class="btn btn-link btn-block" id="updtDecorBtn" name="designID" type="submit" value="<?php echo $designID ?>"><i class="fa fa-fw fa-edit"></i> Update</button>
                              </div>
                            </div>
                          </form>
                        </td>
                        <td>
                          <?php
                          if (!empty($eventThemeDet)) {
                            if (!empty($designtypesmap)) {
                              foreach ($designtypesmap as $dtm) {
                                $files = directory_map('./uploads/designs/' . $dtm . '/', 1);
                                foreach ($files as $f) {
                                  $f_no_extension = pathinfo($f, PATHINFO_FILENAME);
                                  if ($f_no_extension === $designID) { ?>
                                    <div class="thumbnail">
                                      <img src="<?php echo site_url('./uploads/designs/' . $dtm . '/' . $f); ?>" alt="" class="galleryImg">
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
                          <!-- remove design button -->
                          <div class="col-md-12 col-sm-12">
                            <form id="designidform" role="form" method="post" action="<?php echo base_url('events/setCurrentDesignID') ?>">
                              <button class="btn btn-link" id="rmvdesignbtn" name="designID" type="submit" value="<?php echo $designID ?>"><i class="fa fa-remove"></i> Remove</button> 
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

      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-lg-6">
              <h3 class="box-title">List of Entourage</h3>
            </div>
            <div class="col-lg-3">
              <a type="button" class="btn btn-block btn-primary btn-md" data-toggle="modal" data-target="#addEntourage" >Add Entourage</a>

             </div> 
              <div class="col-lg-3">
              <a type="button" class="btn btn-block btn-primary btn-md" data-toggle="modal" data-target="#editEntourage" >Edit Entourage</a>
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
              <th>Design Name</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody id="entTableBody">
              <?php 
                foreach ($entourage as $details) {
                    $entID = $details['entourageID'];
                 ?>
                  <tr>
                    <td><?php echo $details['entourageName'] ?></td>
                    <td><?php echo $details['role'] ?></td>
                    <td><?php echo $details['status'] ?></td>
                    <td>
                      <form id="entourageidform" role="form" method="post" action="<?php echo base_url('events/ ') ?>">
                        <div class="col-md-6">
                          <select name="designID">
                            <option selected disabled>Choose</option>
                            <?php if(!empty($designs)){ 
                              foreach($designs as $des) { ?>
                                <option value="<?php echo $des['designID'] ?>"><?php echo $des['designName'] ?></option>
                            <?php } 
                              }else{ 
                                echo "Please choose attire design/s"; 
                              } ?>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <button class="btn btn-link btn-block" id="updtDecorBtn" name="entourageID" type="submit" value="<?php echo $entID ?>"><i class="fa fa-fw fa-edit"></i> Update</button>
                        </div>
                      </form>
                    </td>
                    <td>
                      <div class="col-md-6 col-sm-6">
                        <form id="entourageidform" role="form" method="post" action="<?php echo base_url('events/removeEntourage') ?>">
                          <button class="btn btn-link" id="rmvdesignbtn" name="entourageID" type="submit" value="<?php echo $entID ?>"><i class="fa fa-remove"></i> Remove</button>
                        </form>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <form id="" role="form" method="post" action="<?php echo base_url('events/entourageDone') ?>">
                          <button class="btn btn-link" id="entdone" name="entdone" type="submit" value="<?php echo $entID ?>"><i class="fa fa-check-circle-o"></i> Mark as Done</button>
                        </form>
                      </div>
                    </td>
                  </tr>
              <?php  }
              ?>
            </tbody>
          </table>
          <!--<button type="button" class="button1">Save</button>-->
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
                            <td><input class="form-control" type="text" id="entName" name="entName" placeholder="<?php echo $det['entourageName'] ?>" ></td>
                            <td><input class="form-control" type="text" id="entRole" name="role" placeholder="<?php echo $det['role'] ?>"></td>
                            <td><input class="form-control" type="text" id="entShoulder" name="shoulder" placeholder="<?php echo $det['shoulder'] ?>" size="3"></td>
                            <td><input class="form-control" type="text" id="entChest" name="chest" placeholder="<?php echo $det['chest'] ?>" size="3"></td>
                            <td><input class="form-control" type="text" id="entStomach" name="stomach" placeholder="<?php echo $det['stomach'] ?>" size="3"></td>
                            <td><input class="form-control" type="text" id="entWaist" name="waist" placeholder="<?php echo $det['waist'] ?>" size="3"></td>
                            <td><input class="form-control" type="text" id="entArmLength" name="armLength" placeholder="<?php echo $det['armLength'] ?>" size="3"></td>
                            <td><input class="form-control" type="text" id="entArmHole" name="armHole" placeholder="<?php echo $det['armHole'] ?>" size="3"></td>
                            <td><input class="form-control" type="text" id="entMuscle" name="muscle" placeholder="<?php echo $det['muscle'] ?>" size="3"></td>
                            <td><input class="form-control" type="text" id="entPantsLength" name="pantsLength" placeholder="<?php echo $det['pantsLength'] ?>" size="3"></td>
                            <td><input class="form-control" type="text" id="entBaston" name="baston" placeholder="<?php echo $det['baston'] ?>" size="3"></td>
                            <td>
                              <div class="col-md-3 col-sm-4">
                                <form role="form" method="post" action="">
                                  <button class="btn-link" id="entInfo" name="entInfo" type="submit"><i class="fa fa-fw fa-exchange"></i></button>
                                </form>
                              </div>
                            </td>
                          </tr>
                          <?php 
                               }
                             }else{
                              echo "No data";
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
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
          <!-- /.modal-dialog -->
          </div>

          <!-- Modal for adding of entourage -->
              <div class="modal fade" id="addEntourage" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <!--<form role="form" method="post" action="<?php //echo base_url('events/addEntourage') ?>">-->
                      <?php 
                        $attributes = array("name" => "addNewEntourage", "id" => "addNewEntourage", "class" => "form-horizontal", "autocomplete" => "off");
                        echo form_open("events/addEntourage", $attributes);
                      ?>
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="col-lg-6">
                          <h4 class="modal-title">Add Entourage</h4>
                        </div>
                      </div>
                      <div id="the-message">
                      </div>
                      <div class="modal-body">
                        <div class="box">
                          <div class="box-body">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Entourage Name</label>
                                  <input type="text" name="new_ent_name" id="new_ent_name" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-offset-1 col-md-4">
                                <div class="form-group">
                                  <label>Role</label>
                                  <input type="text" name="new_ent_role" id="new_ent_role" class="form-control">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box">
                          <div class="box-body">
                            <!--<table id="entourageTableEdit" class="table table-bordered table-striped table-hover text-center">
                              <thead>
                                <tr>
                                  <th>Shoulder</th>
                                  <th>Chest</th>
                                  <th>Stomach</th>
                                  <th>Waist</th>
                                  <th>Arm Length</th>
                                  <th>Arm Hole</th>
                                  <th>Muscle</th>
                                  <th>Pants Length</th>
                                  <th>Baston</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><div class="form-group"><input class="form-control" type="text" id="shoulder" name="shoulder"></div></td>
                                  <td><input class="form-control" type="text" id="chest" name="chest"></td>
                                  <td><input class="form-control" type="text" id="stomach" name="stomach"></td>
                                  <td><input class="form-control" type="text" id="waist" name="waist"></td>
                                  <td><input class="form-control" type="text" id="armLength" name="armLength"></td>
                                  <td><input class="form-control" type="text" id="armHole" name="armHole"></td>
                                  <td><input class="form-control" type="text" id="muscle" name="muscle"></td>
                                  <td><input class="form-control" type="text" id="pantsLength" name="pantsLength"></td>
                                  <td><input class="form-control" type="text" id="baston" name="baston"></td>
                                </tr>
                              </tbody>
                            </table>-->
                            <div class="row">
                              <div class="col-md-1">
                                <div class="form-group">
                                  <label>Shoulder</label>
                                  <input class="form-control" type="text" id="shoulder" name="shoulder">
                                </div>
                              </div>  
                                <div class="col-md-1">
                                  <div class="form-group">
                                    <label>Chest</label>
                                    <input class="form-control" type="text" id="chest" name="chest">
                                  </div>
                                </div>
                                <div class="col-md-1">
                                  <div class="form-group">
                                    <label>Stomach</label>
                                    <input class="form-control" type="text" id="stomach" name="stomach">
                                  </div>
                                </div>
                                <div class="col-md-1">
                                  <div class="form-group">
                                    <label>Waist</label>
                                    <input class="form-control" type="text" id="waist" name="waist">
                                  </div>
                                </div>
                                <div class="col-md-1">
                                  <div class="form-group">
                                    <label>Arm Length</label>
                                    <input class="form-control" type="text" id="armLength" name="armLength">
                                  </div>
                                </div>
                                <div class="col-md-1">
                                  <div class="form-group">
                                    <label>Arm Hole</label>
                                    <input class="form-control" type="text" id="armHole" name="armHole">
                                  </div>
                                </div>
                                <div class="col-md-1">
                                  <div class="form-group">
                                    <label>Muscle</label>
                                    <input class="form-control" type="text" id="muscle" name="muscle">
                                  </div>
                                </div>
                                <div class="col-md-1">
                                  <div class="form-group">
                                    <label>Pants Length</label>
                                    <input class="form-control" type="text" id="pantsLength" name="pantsLength">
                                  </div>
                                </div>
                                <div class="col-md-1">
                                  <div class="form-group">
                                    <label>Baston</label>
                                    <input class="form-control" type="text" id="baston" name="baston">
                                  </div>
                                </div>
                            </div>
                          </div>
                        <!-- /.box-body -->
                  </div>
                      <div class="modal-footer">
                        <div class="col-lg-6" id="butt1">
                              <button type="submit" class="btn btn-block btn-primary btn-md">Add</button>
                          </div>
                      </div>
                    </div>
                  </div>
                  </div>
                <!--</form>-->
                <?php echo form_Close(); ?>
              </div>
            </div>
              <!-- End of modal -->

      <!-- add existing design to the event -->
      <form role="form" method="post" action="<?php echo base_url('events/addExstEventDes') ?>">
        <div class="modal fade" id="addExstDesignModal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Design</h4>
              </div>
              <div class="modal-body">
                <div class="box-body">
                  <table id="exstDesigns" class="table table-bordered text-center">
                    <thead>
                      <tr>
                        <th>Design Name</th>
                        <th>Color</th>
                        <th>Type</th>
                        <th>Image</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php
                        foreach ($allDesigns as $des) { ?>
                        <tr>
                          <td><?php echo $des['designName'] ?></td>
                          <td><?php echo $des['color'] ?></td>
                          <td><?php echo $des['designType'] ?></td>
                          <td>
                            <?php
                            if (!empty($designtypesmap)) {
                              foreach ($designtypesmap as $dtm) {
                                $files = directory_map('./uploads/designs/' . $dtm . '/', 1);
                                foreach ($files as $f) {
                                  $f_no_extension = pathinfo($f, PATHINFO_FILENAME);
                                  if ($f_no_extension === $des['designID']) { ?>
                                    <div class="thumbnail">
                                      <img src="<?php echo site_url('./uploads/designs/' . $dtm . '/' . $f); ?>" alt="" class="galleryImg">
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
                          <td><button type="submit" name="addExstDesign" class="btn btn-sm btn-primary" value="<?php echo $des['designID'] ?>">Choose</button></td>
                        </tr>
                      <?php  } ?>
                      
                    </tbody> 
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
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
    $('#exstDesigns').DataTable({
    })
  })

  $('#addNewEntourage').submit(function(e){
      e.preventDefault();

      var addNewEntourage = $(this);

      $.ajax({
        type: 'POST',
        url: addNewEntourage.attr('action'),
        data: addNewEntourage.serialize(),
        dataType: 'json',
        success: function(response){
          if (response.success == true) {
            // if success we would show message
            // and also remove the error class
            $('#the-message').append('<div class="alert alert-success text-center">' +
            '<span class="glyphicon glyphicon-ok"></span>' +
            ' New entourage has been saved.' +
            '</div>');

            $('td.dataTables_empty').remove();

            $('#entTableBody').prepend(
              '<tr>'+
              '<td>' + response.entName + '</td>' +
              '<td>' + response.eRole + '</td>' +
              '</tr>'
            );
            
            $('.form-group').removeClass('has-error')
                  .removeClass('has-success');
            $('.text-danger').remove();
            // reset the form
            addNewEntourage[0].reset();
            // close the message after seconds
            $('.alert-success').delay(500).show(10, function() {
            $(this).delay(3000).hide(10, function() {
              $(this).remove();
            });
            })
          }else{
            $.each(response.messages, function(key, value) {
              var element = $('#' + key);
              
              element.removeClass('has-error')
              .addClass(value.length > 0 ? 'has-error' : 'has-success')
              .find('.text-danger')
              .remove();
              
              element.after(value);
            });
          }
        }
      });
    });  
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
      with:850px;
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
  #entourageID, #designID {
    float: left;
    width: 150px;
  }
</style>