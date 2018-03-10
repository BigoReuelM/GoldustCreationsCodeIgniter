 <!-- Modal for viewing details o transactions -->
     <h4>Transaction Details</h4>
                <div class="" id="con1">
                    <form>
                      <div class="box">

                        <input type="text" name="transactionId" id="transactionId" value=""/>
                        <div class="row">
                            <div class="col-lg-5">
                              <label for="fname">Name</label>
                            </div>
                            <div class="col-lg-7">
                              <?php 
                                echo '<input type="text" class="form-control" placeholder="' . $transac['clientName'] . '"; disabled>'
                               ?>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-5">
                            <label for="lname">Date Availed</label>
                          </div>
                          <div class="col-lg-7">
                            <?php
                              echo '<input type="text" class="form-control" placeholder="' . $transac['dateAvail'] . '" disabled>';
                            ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-5">
                            <label for="lname">Contact Number</label>
                          </div>
                          <div class="col-lg-7">
                            <?php
                              echo '<input type="text" class="form-control" placeholder="' . $transac['contactNo'] . '" disabled>';
                            ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-5">
                            <label for="lname">ID Type</label>
                          </div>
                          <div class="col-lg-7">
                            <?php 
                              echo '<input type="text" class="form-control" placeholder="' . $transac['IDType'] . '" disabled>';
                            ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-5">
                            <label for="lname">Transaction State</label>
                          </div>
                          <div class="col-lg-7">
                            <?php 
                              echo '<input type="text" class="form-control" placeholder="' . $transac['transactionstatus'] . '" disabled>';
                            ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-5">
                            <label for="lname">Total Amount</label>
                          </div>
                          <div class="col-lg-7">
                            <?php 
                              echo '<input type="text" class="form-control" placeholder="' . $transac['totalAmount'] . '" disabled>';
                            ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-5">
                            <label for="lname">Balance</label>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="form-control" placeholder="0" disabled>
                          </div>
                        </div>
                      </div>

                        <div class="row">
                            <div class="col-lg-5">
                                <label> Service Availed </label>
                            </div>
                            <div class="box">
                              <div class="box-body">
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
                              </div>
                            </div>
                        </div>
                    </form>
                  </div>
              </div>
              <div class="modal-footer">
                <div class="row">
                  <div class="col-lg-4">
                    <button type="button" class="btn btn-block btn-primary btn-lg" data-dismiss="modal">Add Payment</button>
                  </div>
                  <div class="col-lg-4">
                    <button type="button" class="btn btn-block btn-primary btn-lg" data-dismiss="modal">Add Expenses</button>
                  </div>
                  <div class="col-lg-4">
                    <button type="button" class="btn btn-block btn-primary btn-lg" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>

      <!-- End of Modal -->