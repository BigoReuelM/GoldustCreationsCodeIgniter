<script src="<?php echo base_url();?>/public/bower_components/jquery/dist/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
 </head>
 <style type="text/css">
   #img {
    width: 270px;
    height: 200px;
   }
   .upload-drop-zone {
  height: 200px;
  border-width: 2px;
  margin-bottom: 20px;
}

/* skin.css Style*/
.upload-drop-zone {
  color: #ccc;
  border-style: dashed;
  border-color: #ccc;
  line-height: 200px;
  text-align: center
}
.upload-drop-zone.drop {
  color: #222;
  border-color: #222;
}
#button {
  margin-left: 20px;
  height: 40px;
  width: 70px;
}
#button {
  margin-left: 20px;
  height: 40px;
  width: 70px;
}
 </style>
<body>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="box-header">
                <div class="row">
                  <div class="col-md-9">
                     <h3>Suits Selection</h3>
                  </div>
                  <div class="col-md-3">
                    <button class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addsuits" >Add Suits </button>  
                  </div>
                </div>
                
             </div>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
    <!-- Modal for add suits -->
    <div id="addsuits" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Upload Suits</h4>
          </div>
        <div class="modal-body">
          <p>Select files from your computer</p>
          <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
            <div class="form-inline">
              <div class="form-group">
                <input type="file" name="files[]" id="js-upload-files" multiple>
              </div>
            </div>
          </form>
        <!-- drop zone -->
          <br>
          <p>Or drag and drop files below</p>
          <div class="upload-drop-zone" id="drop-zone">
            Just drag and drop files here
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
        </div>
        </div>

      </div>
    </div>   
 <!-- End of modal -->

    <div class="container" id="con">
        <div class="row">
          <form id="" role="form" method="post" action="">
          <?php
            if(!empty($allSuits)){
            foreach ($allSuits as $suit) { 
              $suitID = $suit['designID'] ?>             
                  <div class="col-lg-3">
                    <div class="thumbnail">
                      <?php echo '<img class = "galleryImg" src="data:image/jpeg;base64,' . base64_encode( $suit['designImage'] ) . '"/>'; ?>
                    </div>
                  </div>                
          <?php }
              } else {
                echo 'No suits';
              }
              ?>
              <!-- submit button should be here... -->          
          </form>    
        </div>
      <div class="row">
        <!-- submit id of the new ... id -->
        <button type="submit" class="btn btn-md btn-primary" id="donebtn" name="donebtn">Done</button>
                    
        <button type="submit" class="btn btn-md btn-primary" id="backbtn">Back</button>
      </div> 
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/public/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>/public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>s
<script type="text/javascript">
    + function($) {
    'use strict';

    // UPLOAD CLASS DEFINITION
    // ======================

    var dropZone = document.getElementById('drop-zone');
    var uploadForm = document.getElementById('js-upload-form');

    var startUpload = function(files) {
        console.log(files)
    }

    uploadForm.addEventListener('submit', function(e) {
        var uploadFiles = document.getElementById('js-upload-files').files;
        e.preventDefault()

        startUpload(uploadFiles)
    })

    dropZone.ondrop = function(e) {
        e.preventDefault();
        this.className = 'upload-drop-zone';

        startUpload(e.dataTransfer.files)
    }

    dropZone.ondragover = function() {
        this.className = 'upload-drop-zone drop';
        return false;
    }

    dropZone.ondragleave = function() {
        this.className = 'upload-drop-zone';
        return false;
    }

}(jQuery);
  </script>
</body>

