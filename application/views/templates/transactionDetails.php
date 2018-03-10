 <style type="text/css">
#button1 {
  width: 180px;
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

#in1 {
  width: 130px;
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
    margin-left: 8px;
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

#lname {
    margin-right: 5px;

}

#tab1 {
  border:1px solid #ccc;
  background-color: #E6E6E6;
}

#tab2 {
  padding-top: 10px;
}

</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="row">
      <div class="col-lg-9">
        <h1>
          Taylor Swift
        </h1>
      </div>
    </div>  
  </section>
  <section class="content container-fluid">
    <div classs="content">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Transaction Details</h3>
        </div>
        <div class="box-body">
                <div class="" id="con1">
                    <form>
                        <div class="row">
                            <div class="col-25">
                              <label for="fname">Name</label>
                            </div>
                            <div class="col-75">
                              <input type="text" id="lname" name="lastname" placeholder="0001">
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-25">
                            <label for="lname">Date Availed</label>
                          </div>
                          <div class="col-75">
                            <input type="text" id="lname" name="lastname" placeholder="">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-25">
                            <label for="lname">Contact Number</label>
                          </div>
                          <div class="col-75">
                            <input type="text" id="lname" name="lastname" placeholder="">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-25">
                            <label for="lname">ID Type</label>
                          </div>
                          <div class="col-75">
                            <input type="text" id="lname" name="lastname" placeholder="">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-25">
                            <label for="lname">Transaction State</label>
                          </div>
                          <div class="col-75">
                            <input type="text" id="lname" name="lastname" placeholder="">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-25">
                            <label for="lname">Total Amount</label>
                          </div>
                          <div class="col-75">
                            <input type="text" id="lname" name="lastname" placeholder="">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-25">
                            <label for="lname">Balance</label>
                          </div>
                          <div class="col-75">
                            <input type="text" class="form-control" placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="col-25" id="tab2">
                        <label> Service Availed </label>
                      </div>
                                <div class="table table-responsive">          
                                    <table class="table table-bordered table-condensed table-hover" id="tTable">
                                      <thead>
                                        <tr>
                                          <th >Service</th>
                                          <th >Amount</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td ></td>
                                          <td ></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                </div>
                                <button type="button" class="btn btn-default"> <a href="<?php echo base_url('transactions/transactions') ?>">Back </a></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Add Expenses</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                        </div>
                    </form>
                    
                  </div>
                </div>
              </div>

      <!-- End of Modal -->