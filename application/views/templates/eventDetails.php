<?php 
  $empRole = $this->session->userdata('role');
 ?>
 <style type="text/css">
   #butt5 {
    width: 100px;
   }
 </style>
<!-- Main content -->
<section class="content container-fluid">
  <section class="content-header">
    <div class="row">
      <div class="col-lg-9">
          <h1>
            <?php
            //foreach ($eventName as $name) {
              $name = $eventName->eventName; 
              echo $name . '</a>';
            //}
              
            ?>
          </h1>        
      </div>
      <div class="col-lg-2">
        <button style="margin-left: 338%; margin-top: 5%" type="button" class="btn btn-block btn-primary btn-lg" id="button1">Print Event Details</button>
      </div>
    </div>
  </section>
  <div class="row">
    <div class="col-lg-8">
      <div class="box box-primary">
        <div class="box-body">
          <form role="form" method="post" action="">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Event Name</label>
                <input type="text" id="form1" class="form-control" value="<?php echo $eventDetail->eventName ?>">
              </div>
              <div class="form-group">
                <label>Contact Number</label>
                <input type="text" id="form1" class="form-control" value="<?php echo $eventDetail->contactNumber ?>">
              </div>
              <div class="form-group">
                <label>Client Name</label>
                <input type="text" id="form1" class="form-control" value="<?php echo $eventDetail->clientName ?>">
              </div>
              <div class="form-group">
                <label>Celebrant</label>
                <input type="text" id="form1" class="form-control" value="<?php echo $eventDetail->celebrantName ?>">
              </div>
              <div class="form-group">
                <label>Date Availed</label>
                <input type="text" id="form1" class="form-control" value="<?php echo $eventDetail->celebrantName ?>">
              </div>
              <div class="form-group">
                <label>Package Availed</label>
                <?php 
                  $full = "";
                  $semi = "";
                  if ($eventDetail->packageType === 'full-Package') {
                    $full="checked";
                  }else{
                    $semi = "checked";
                  }
                 ?> 
                <span class="radio"><label><input type="radio" id="event-time" value="full-Package" <?php echo $full ?>>Full Package</label></span>
                <span class="radio"><label><input type="radio" id="event-time" value="semi-Package" <?php echo $semi ?>>Semi Package</label></span>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Event Date</label>
                <input type="date" id="form1" class="form-control" value="<?php echo $eventDetail->eventDate ?>">
              </div>

              <div class="form-group">
                <label>Event Time</label>
                <input type="time" id="form1" class="form-control" value="<?php echo $eventDetail->eventTime ?>">
              </div>

              <div class="form-group">
                <label>Event Location</label>
                <input type="text" id="form1" class="form-control" value="<?php echo $eventDetail->eventLocation ?>">
              </div>

              <div class="form-group">
                <label>Event Type</label>
                <input type="text" id="form1" class="form-control" value="<?php echo $eventDetail->eventType ?>">
              </div>
              <div class="form-group">
                <label>Motif</label>
                <input type="text" id="form1" class="form-control" value="<?php echo $eventDetail->motif ?>">
              </div>
              <div class="form-group">
                <label>Theme</label>
                <input type="text" id="form1" class="form-control" value="<?php echo $eventDetail->celebrantName ?>">
              </div>
            </div>
            <button type="submit" class="btn btn-block btn-primary btn-lg">Update Details</button>
          </form>
        </div>
      </div>
      
    </div>
    <div class="col-lg-4">
      <div class="box box-primary">
        <div class="box-header">
          <h3>Select Event Handler</h3>
          <?php  
            if ($empRole === 'admin') {
              echo "<label>Select</label>";
              echo "<select class='form-control'>";

              foreach ($handlers as $handler) {
                echo "<option>" . $handler['employeeName'] . "</option>";
              }

              echo "</select>";
            }
          ?>
        </div>
        <div class="box-body box-profile">
          <form role="form" method="post" >
            <div class="form-group">

              <?php 
                if(!empty($currentHandler)){

              ?>
              
              <img class="profile-user-img img-responsive img-circle" src="data:image/jpeg;base64, <?php echo base64_encode($currentHandler->photo); ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $currentHandler->employeeName ?></h3>

              <p class="text-muted text-center">Event Handler</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Events</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Transactions</b> <a class="pull-right">543</a>
                </li>
              </ul>

              <?php 
                }else{
                  echo "
                        No Handler Selected.
                        ";
                }
              ?>
            </div>
            <div>
              <?php
                if ($empRole === 'admin') {
                   echo '<button type="submit" class="btn btn-block btn-primary btn-lg">Select Handler</button>';
                 } 
              ?>
              
            </div>
          </form>
        </div>
      </div>
    </div>     
  </div>

  <div class="row">
    <div class="col-lg-6">
      <div class="box box-primary">
      
        <div class="box-header">
          <h3>Total Due For Services:</h3>
        </div>

        <div class="box-body">
          <div class="row">
            <div class="form-group">
              <label class="col-lg-2 control-label">Amount</label>

              <div class="col-lg-10">
                <input type="text" class="form-control" placeholder="PHP 30,000.00" disabled>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    
    <div class="col-lg-6">
      <div class="box box-primary">
      
        <div class="box-header">
          <h3>Total Amount Due:</h3>
        </div>

        <div class="box-body">
          <div class="row">
            <form action="">
              <div class="form-group">
                <label class="col-lg-2 control-label">Amount</label>

                <div class="col-lg-10">
                  <input type="text" class="form-control" placeholder="Enter Total Amount...." value="<?php echo 'Php ' . $eventDetail->totalAmount ?>"> 
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="box-footer">
          <div class="form-group">
            <label class="col-lg-8">
              Click Update Amount Button when sure..
            </label>
            <div class="col-lg-4">
              <button type="submit" class="btn btn-block btn-primary">Update Amount</button>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </div>

  <div class="row">
    <!--service column-->
    <div class="col-lg-6">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Services</h3>
        </div>
        <div class="box-body">
          <table id="serviceTable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Services</th>
                <th>Quantity</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if (!empty($avlServcs)) {
                 // $mergeArray = array_merge($servcs, $avlServcs);
                  foreach ($avlServcs as $avlSvc) { ?>
              <tr>
                <!-- service name -->
                <td><?php echo $avlSvc['serviceName'] ?></td>
                <!-- quantity... query later... -->
                <td><input class="form-control" type="text" name="" style="border: none;" placeholder="qty" value="<?php echo $avlSvc['quantity'] ?>"></td>
                <!-- amount... query later...  -->
                <td><input class="form-control" type="text" name="" style="border: none;" placeholder="amount" value="<?php  echo $avlSvc['amount']?>"></td>
              </tr>
              <?php }
                }
              ?>
            </tbody>
          </table>
          <div class="row">
            <div class= "col-lg-6">
              <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#addServc" >Update Services</button> 
              </div>
              <div class= "col-lg-6">
              <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#addServc" id="butt2">Add Services</button> 
              </div>
          </div>
            
        </div>
      </div>
    </div>
    <!--end of service col-->

    <!--start of stff col-->
    <div class="col-lg-6">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Staff</h3>
        </div>
        <div class="box-body">
          <table id="staffTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Contact Number</th>
                <th>Action </th>
              </tr>
            </thead>
            <tbody>
              <?php  
                  if (!empty($eventStaff) || !empty($oncallStaff)) {
                    $mergedStaffArray = array_merge($eventStaff, $oncallStaff);
                    foreach ($mergedStaffArray as $staff) {  
                      
                ?>
              <tr>               
                <td><?php echo $staff['name']; ?></td>
                <td><?php echo $staff['role']; ?></td>
                <td><?php echo $staff['num']; ?></td>
                <td>
                  <div class="col-md-6 col-sm-6">
                  <form role="form" method="post">
                      <button class="btn btn-block" id="butt5" name="eventInfo" type="submit"> Remove <i class="fa fa-fw fa-remove"> </i>
                      </button>
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
          <div class="row">
            <div class="col-lg-6">
              <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#addstaff">Add Staff</button>

            </div>
            <div class="col-lg-6">
              <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#addoncallstaff">Add On-Call Staff
              </button>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end staff col-->

  </div>

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
          <table class="table table-hover table-responsive table-bordered" id="modalServcTbl">
            <thead>
              <tr>
                <th>Service Name</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <form>
                <?php
                  if (!empty($servcs)) {
                    foreach ($servcs as $svc) { ?>
                      <tr>
                        <td><div class="checkbox"><label><input type="checkbox" name=""><?php echo $svc['serviceName'] ?></label></div></td>
                        <td><?php echo $svc['description'] ?></td>
                      </tr>
                <?php }
                  }
                ?>
              </form>
            </tbody>
          </table>  
      </div>
      <div class="modal-footer">
        <tfoot>
          <div class="row">
            <div class="col-lg-6">
              <button class="btn btn-primary" onclick="reset_chkbx()">Reset</button>
            </div>
            <div class="col-lg-6">
              <button class="btn btn-default" action="" type="submit">Add</button>
            </div>
          </div>
        </tfoot>
      </div>
    </div>
  </div>
</div>


  <!-- Add staff Modal -->
<div class="modal fade" id="addstaff" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Staff</h4>
      </div>
      <div class="modal-body">
        <div class="col-lg-4">
            <input type="text" class="search form-control" placeholder="What you looking for?">
        </div>
        <span class="counter pull-right"></span>
        <table class="table table-hover table-bordered results">
          <thead>
            <tr>
              <th>#</th>
              <th class="col-md-5 col-xs-5">Name</th>
              <th class="col-md-4 col-xs-4">Role</th>
              <th class="col-md-3 col-xs-3">Conatct Number</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">
                <form action="/action_page.php">
                  <input type="checkbox" name="check" value="Bike"><br>
                </form>
              </th>
              <td>Frida Eadwig</td>
              <td>
                <form action="/action_page.php">
                  <input type="text" name="FirstName" value="" id="form1">
                </form>
              </td>
              <td>09982765760</td>
            </tr>
            <tr>
              <th scope="row">
                <form action="/action_page.php">
                  <input type="checkbox" name="check" value="Bike"><br>
                </form>
              </th>
              <td>Aloisa Piccio</td>
              <td>
                <form action="/action_page.php">
                  <input type="text" name="FirstName" value="" id="form1">
                </form>
              </td>
              <td>09987765560</td>
            </tr>
            <tr>
              <th scope="row">
                <form action="/action_page.php">
                  <input type="checkbox" name="check" value="Bike"><br>
                </form>
              </th>
              <td>Daniella Mattsson</td>
              <td>
                <form action="/action_page.php">
                  <input type="text" name="FirstName" value="" id="form1">
                </form>
              </td>
              <td>09877789082</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
</div>
<!-- End of Add staff modal -->

<!-- Modal for add on-call Staff -->
<div class="modal fade" id="addoncallstaff" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add On-Call Staff</h4>
      </div>
      <div class="modal-body">
        <div class="container" id="con1">
          <form action="/action_page.php">
            <div class="row">
              <div class="col-25">
                <label for="fname">On-Call Staff ID</label>
              </div>
              <div class="col-75">
                <div id="GovID" > ****** </div>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Staff Name</label>
              </div>
              <div class="col-75">
                <input type="text" id="lname" name="lastname" placeholder="Staff Name">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Role</label>
              </div>
              <div class="col-75">
                <input type="text" id="lname" name="lastname" placeholder="Role">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Contact Number</label>
              </div>
              <div class="col-75">
                <input type="text" id="lname" name="lastname" placeholder="Contact Number">
              </div>
            </div>
          </form>
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
<!-- End modal for on-call Staff -->

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
      with:900px;
    }
  }

  #add-event .modal-dialog {
    width:90%;
  }
</style>