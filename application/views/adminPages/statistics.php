
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Income
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!--<div style="width:75%;">
        <canvas id="canvas"></canvas>
      </div>-->

      <ul class="nav nav-tabs">
        <li class="active"><a href="#monthly" data-toggle="tab">Monthly</a></li>
        <li><a href="#annual" data-toggle="tab">Annual</a></li>
      </ul>

      <div class="tab-content">
        <!-- Monthly Reports -->
        <div class="tab-pane fade in active" id="monthly">
          <div class="box">
            <div class="box-header">
              <h4>Payments</h4>
            </div>
            <div class="box-body">
              <div class="table table-responsive">
                <table class="table table-bordered table-hover text-center" id="payments">
                  <thead>
                    <tr>
                      <th>Client</th>
                      <th>Event</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Receiver</th>
                      <th>Amount</th>
                    </tr>
                  </thead>    
                  <tbody>
                    <tr>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Total</label>
                    <input type="text" name="totalPayment" class="form-control" disabled>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box">  
            <div class="box-header">
              <h4>Expenses</h4>
            </div>
            <div class="box-body">
              <div class="table table-responsive">
                <table class="table table-bordered table-hover text-center" id="expenses">
                  <thead>
                    <tr>
                      <th>Client</th>
                      <th>Event</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Receiver</th>
                      <th>Amount</th>
                    </tr>
                  </thead>    
                  <tbody>
                    <tr>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Total</label>
                    <input type="text" name="totalPayment" class="form-control" disabled>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
        <!-- Annual Reports -->
        <div class="tab-pane fade" id="annual">
          <div class="box">
            <div class="box-header">
              <h4>Payments</h4>
            </div>
            <div class="box-body">
              <div class="table table-responsive">
                <table class="table table-bordered table-hover text-center" id="payments">
                  <thead>
                    <tr>
                      <th>Client</th>
                      <th>Event</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Receiver</th>
                      <th>Amount</th>
                    </tr>
                  </thead>    
                  <tbody>
                    <tr>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Total</label>
                    <input type="text" name="totalPayment" class="form-control" disabled>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box">  
            <div class="box-header">
              <h4>Expenses</h4>
            </div>
            <div class="box-body">
              <div class="table table-responsive">
                <table class="table table-bordered table-hover text-center" id="expenses">
                  <thead>
                    <tr>
                      <th>Client</th>
                      <th>Event</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Receiver</th>
                      <th>Amount</th>
                    </tr>
                  </thead>    
                  <tbody>
                    <tr>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Total</label>
                    <input type="text" name="totalPayment" class="form-control" disabled>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </section>
    <!-- /.content -->
  </div>

<script>
  $(function () {
    $('#payments').DataTable()
    $('#expenses').DataTable()
  })
</script> 

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
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>/public/bower_components/Chart.js/Chart.js"></script>

<script src="<?php echo base_url(); ?>/public/chart.bundle.js"></script>
<script src="<?php echo base_url(); ?>/public/utils.js"></script>
<script>
    var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var config = {
      type: 'line',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
          label: 'My First dataset',
          backgroundColor: window.chartColors.red,
          borderColor: window.chartColors.red,
          data: [
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor()
          ],
          fill: false,
        }, {
          label: 'My Second dataset',
          fill: false,
          backgroundColor: window.chartColors.blue,
          borderColor: window.chartColors.blue,
          data: [
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor()
          ],
        }]
      },
      options: {
        responsive: true,
        title: {
          display: true,
          text: 'Chart.js Line Chart'
        },
        tooltips: {
          mode: 'index',
          intersect: false,
        },
        hover: {
          mode: 'nearest',
          intersect: true
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Month'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Value'
            }
          }]
        }
      }
    };

    window.onload = function() {
      var ctx = document.getElementById('canvas').getContext('2d');
      window.myLine = new Chart(ctx, config);
    };

    document.getElementById('randomizeData').addEventListener('click', function() {
      config.data.datasets.forEach(function(dataset) {
        dataset.data = dataset.data.map(function() {
          return randomScalingFactor();
        });

      });

      window.myLine.update();
    });

    var colorNames = Object.keys(window.chartColors);
    document.getElementById('addDataset').addEventListener('click', function() {
      var colorName = colorNames[config.data.datasets.length % colorNames.length];
      var newColor = window.chartColors[colorName];
      var newDataset = {
        label: 'Dataset ' + config.data.datasets.length,
        backgroundColor: newColor,
        borderColor: newColor,
        data: [],
        fill: false
      };

      for (var index = 0; index < config.data.labels.length; ++index) {
        newDataset.data.push(randomScalingFactor());
      }

      config.data.datasets.push(newDataset);
      window.myLine.update();
    });

    document.getElementById('addData').addEventListener('click', function() {
      if (config.data.datasets.length > 0) {
        var month = MONTHS[config.data.labels.length % MONTHS.length];
        config.data.labels.push(month);

        config.data.datasets.forEach(function(dataset) {
          dataset.data.push(randomScalingFactor());
        });

        window.myLine.update();
      }
    });

    document.getElementById('removeDataset').addEventListener('click', function() {
      config.data.datasets.splice(0, 1);
      window.myLine.update();
    });

    document.getElementById('removeData').addEventListener('click', function() {
      config.data.labels.splice(-1, 1); // remove the label first

      config.data.datasets.forEach(function(dataset) {
        dataset.data.pop();
      });

      window.myLine.update();
    });
  </script>
