 <head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
 </style>
 <body>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gowns Selection
      </h1>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
    <button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addgowns">Add Gowns</button>

    <!-- Modal for add gown -->
<div id="addgowns" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Gowns</h4>
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
      <div class="row text-center text-lg-left">

        <div class="col-lg-3 col-md-4 col-xs-6" id="img">
          <a href="#" class="d-block mb-4 h-100" id="con1">
            <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6" id="img">
          <a href="#" class="d-block mb-4 h-100" id="con1">
            <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6" id="img">
          <a href="#" class="d-block mb-4 h-100" id="con1">
            <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6" id="img">
          <a href="#" class="d-block mb-4 h-100" id="con1">
            <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6" id="img">
          <a href="#" class="d-block mb-4 h-100" id="con1">
            <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6" id="img">
          <a href="#" class="d-block mb-4 h-100" id="con1">
            <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6" id="img">
          <a href="#" class="d-block mb-4 h-100" id="con1">
            <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6" id="img">
          <a href="#" class="d-block mb-4 h-100" id="con1">
            <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6" id="img">
          <a href="#" class="d-block mb-4 h-100" id="con1">
            <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6" id="img">
          <a href="#" class="d-block mb-4 h-100" id="con1">
            <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6" id="img">
          <a href="#" class="d-block mb-4 h-100" id="con1">
            <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6" id="img">
          <a href="#" class="d-block mb-4 h-100" id="con1">
            <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
          </a>
        </div>
      </div>


    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/public/dist/js/adminlte.min.js"></script>
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
