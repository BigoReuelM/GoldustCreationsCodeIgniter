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
  margin-left: 10px;
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

#opt1 {
  width: 50px;
}
.glyphicon.glyphicon-circle-arrow-left {
  font-size: 50px;
}
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="row">
    <div class="col-lg-9">
        <a href="<?php echo base_url('admin/adminEmployeeManagement') ?>" id="icon">
          <span class="glyphicon glyphicon-circle-arrow-left" ></span>
        </a>
        <h1>
          Aina Andreason
        </h1>
      </div>
    </div>  
  </section>
  <section class="content container-fluid">
    <div classs="content">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Admin Table</h3>
        </div>
        <div class="box-body">
          <form action="/action_page.php">
            <div class="row">
              <div class="col-25">
                <label for="fname">Employee ID</label>
              </div>
              <div class="col-75">
                <input type="text" id="lname" name="lastname" placeholder="0001">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Contact Number</label>
              </div>
              <div class="col-75">
                <input type="text" id="lname" name="lastname" placeholder="09128623549">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Address</label>
              </div>
              <div class="col-75">
                <input type="text" id="lname" name="lastname" placeholder="#1 ABC Street Baguio City">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Role</label>
              </div>
              <div class="col-75">
                <input type="text" id="lname" name="lastname" placeholder="Handler">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Standing</label>
              </div>
              <div class="col-75">
                <input type="text" id="lname" name="lastname" placeholder="Regular">
              </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Status</label>
                </div>
                <div class="col-75" id="opt1">
                    <select>
                      <option value="volvo">Active</option>
                      <option value="saab">Inactive</option>
                    </select>
                </div>
            </div>
              <div class="col-25">
                <label> Handled Events</label>
              </div>          
                <table class="table table-bordered" id="tab1">
                  <thead>
                    <tr>
                      <th id="tab1">ID</th>
                      <th id="tab1">Customer Name</th>
                      <th id="tab1">Events/Rental Name</th>
                      <th id="tab1">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td id="tab1">0000001</td>
                      <td id="tab1">Touma Kazusa</td>
                      <td id="tab1">Nagato-Nagato Nuptial</td>
                      <td id="tab1">2017-04-08</td>
                    </tr>
                    <tr>
                      <td id="tab1">0000002</td>
                      <td id="tab1">Rin Tohsaka</td>
                      <td id="tab1">Emiya Shorou Birthday</td>
                      <td id="tab1">2019-09-02</td>
                    </tr>
                    <tr>
                      <td id="tab1"></td>
                      <td id="tab1"></td>
                      <td id="tab1"></td>
                      <td id="tab1"></td>
                    </tr>
                  </tbody>
                </table>
                 <button type="button" class="btn btn-default"  data-toggle="modal" data-target="#reset" id="respass"> <a href="<?php echo base_url('admin/adminEmployeeManagement') ?>">Back </a></button>
          <button type="button" class="btn btn-default"  data-toggle="modal" data-target="#reset" id="respass"> Reset Password</button>
              </div>
            </div>
          </form>
        </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  </section>
          