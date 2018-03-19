<style type="text/css">
#name{
   width:250%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    background-color: #E6E6E6;
}
  input[type=text], select, textarea {
    width: 250%;
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
  background-color: #E6E6E6
}

#head1 {
  font-size: 18px;
  font-weight: bold;
}
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  </section>
  <section class="content container-fluid">
    <div classs="content">
      <div class="box">
        <div class="box-header with-border">
          <div class="row">
            <div class="col-lg-9">
              <h3 class="box-title">Expenses Table:</h3>
            </div>
            <div class="col-lg-3">
              <button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addexpenses">Add Expenses</button>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="expenseTable" class="table table-bordered">
              <thead>
                <tr>
                  <th>Expenses ID</th>
                  <th>Amount</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>Proof</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if (!empty($expenses)) {
                     foreach ($expenses as $expense) {
          
                ?>
                <tr>
                  <td><?php  echo $expense['expensesID']; ?></td>
                  <td><?php  echo $expense['expensesAmount']; ?></td>
                  <td><?php  echo $expense['expensesName']; ?></td>
                  <td><?php  echo $expense['expensesDate']; ?></td>
                  <td><button href="#" data-toggle="modal" data-target="#modal-photo">View Photo</button></td>
                </tr>
                <?php
                    }
                  }else{
                    echo "0 data";
                  }
                ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <div class="control-sidebar-bg"></div>
</div>

<div class="modal fade" id="addexpenses" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <form role="form" method="post" action="<?php echo base_url('admin/addExpenses') ?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Expenses</h4>
        </div>
        <div class="modal-body">
          <div class="container" id="con1">
            <div class="row">
               <div class="col-25">
                  <label for="fname">Client Name</label>
                </div>
                <div class="col-75">
                  <div id="name" > Azuma Kazuma </div>
                </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">Event Name</label>
              </div>
              <div class="col-75">
                <div id="name" > Azuma Anniversary </div>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">Expense Name</label>
              </div>
              <div class="col-75">
                <input type="text" name="expenseName" placeholder="Amount" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">Date</label>
              </div>
              <div class="col-75">
                <input type="date" name="date" placeholder="Description" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">Expense Amount</label>
              </div>
              <div class="col-75">
                <input type="text" name="expenseAmount" placeholder="Amount" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">Reciept No.</label>
              </div>
              <div class="col-75">
                <input type="text" name="receiptNumber" placeholder="Amount" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <p id="head1">Select files</p>
                <div class="form-inline">
                  <div class="form-group">
                    <input type="file" name="expenseImage" id="js-upload-files" multiple>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="addExpenses" type="submit" name="addExpenses" class="btn btn-default">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
    
  </div>
</div>

    <!-- REQUIRED JS SCRIPTS -->
<script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>/public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/public/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url();?>/public/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>/public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script>
    $(function () {
      $('#adminTable').DataTable()
      $('#handlerTable').DataTable()
      $('#expenseTable').DataTable()
    })
  </script>