<style type="text/css">
  body{
  padding:20px 20px;
}

.results tr[visible='false'],
.no-result{
  display:none;
}

.results tr[visible='true']{
  display:table-row;
}

.counter{
  padding:8px; 
  color:#ccc;
}

#rigth {
  float:right;
  margin-left: 100%;
  z-index: 10;  
position: absolute;  
right: 0;  
top: 0;
overflow: auto;
}

* {
    box-sizing: border-box;
}

#form1 {
  width:100%;
  padding: 8px;
  background-color:white;
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
input[type=text], select, textarea {
    width:250%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    background-color: #E6E6E6;
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
</style>

<?php

if (!$this->session->has_userdata('currentEventID')) {
  echo "wala laman";
}else{
  $id = $this->session->userdata('currentEventID');
  //echo $id;
}
//echo $id;
?>
<!-- Content Header (Page header) -->

<div class="row">
  <div class="col-lg-4">
    <section class="content-header">
     <h1>
       Event Details
     </h1>
     </section>
   </div>
   <div class="col-lg-2">
     <button style="margin-left: 338%; margin-top: 5%" type="button" class="btn btn-block btn-primary btn-lg">Print Event Details</button>
   </div>
 </div>



<!-- Main content -->
<section class="content container-fluid">
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label>Event Name</label>
        <input type="text" id="event-name" class="form-control">
      </div>
      <div class="form-group">
        <label>Contact Number</label>
        <input type="text" id="contact-number" class="form-control">
      </div>

      <div class="form-group">
        <label>Client Name</label>
        <input type="text" id="client-name" class="form-control">
      </div>
      <div class="form-group">
        <label>Celebrant</label>
        <input type="text" id="celebrant" class="form-control">
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">

        <div class="form-group">
          <label>Event Date</label>
          <input type="date" id="event-date" class="form-control">
        </div>

        <div class="form-group">
          <label>Event Time</label>
          <input type="time" id="event-time" class="form-control">
        </div>

        <div class="form-group">
          <label>Event Location</label>
          <input type="text" id="event-time" class="form-control">
        </div>
        <label>Package Availed</label>
        <label style="margin-left: 53%">Motiff</label>
        <div class="row">
          <div class="col-lg-4">
            <div class="form-group">
              <span class="radio"><label><input type="radio" id="event-time" value="full-Package">Full Package</label></span>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <span class="radio"><label><input type="radio" id="event-time" value="semi-Package">Semi Package</label></span>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <input type="color" id="motiff" class="form-control">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="col-lg-6">
      <div class="box">
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
              <tr>
                <td>
                  <form>
                    <div class="form-group checkbox">
                      <label><input type="checkbox" id="" value="gowns">Gowns</label>
                    </div>
                  </form>
                </td>
                <td>12</td>
                <td>35000</td>
              </tr>
              <td>
                <form>
                  <div class="form-group checkbox">
                    <label><input type="checkbox" id="" value="makeup">Makeup</label>
                  </div>
                </form>
              </td> 
              <td>7</td>
              <td>10000</td> 
            </tbody>
            <tfoot>
              <tr>
                <td><button type="button" class="btn btn-primary">Add Services</button></td>
              </tr>
            </tfoot>
          </table>  
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="box">
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
              <th>Availability</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <form>
                  <div class="form-group checkbox">
                    <label><input type="checkbox" id="" value="gowns">Nemo Kamo</label>
                  </div>
                </form>
              </td>
              <td>Makeup Artist</td>
              <td>09876541234</td>
              <td>Available</td>
            </tr>
            <td>
              <form>
                <div class="form-group checkbox">
                  <label><input type="checkbox" id="" value="makeup">Kame Wave</label>
                </div>
              </form>
            </td> 
            <td>Costume Designer</td>
            <td>09291387121</td>
            <td>Available</td>
          </tbody>
          <tfoot>
            <tr>
              <td>
                <div class="col-xs-12 col-md-8">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addstaff">Add Staff</button>
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
                        <div class="form-group pull-right">
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
                </div>
                <div class="col-xs-6 col-lg-4" id="right">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addoncallstaff">Add On-Call Staff
                  </button>
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
                    </div
                  <!-- End modal for on-call Staff -->
                </div>
              </td>
            </tr>
          </tfoot>
        </table>
        </div>
      </div>
    </div>
  </div>
</div> 
</section>
<!-- /.content-wrapper -->

  <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

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
    })
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
