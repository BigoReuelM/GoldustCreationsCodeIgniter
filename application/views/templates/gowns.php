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
                     <h3>Gowns Selection</h3>
                  </div>
                  <div class="col-md-3">
                    <button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addgowns">Add Gowns</button>  
                  </div>
                </div>
                
             </div>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">

    <!-- Modal for add gown -->
<div id="addgowns" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Gowns</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('items/uploadImg') ?>" method="post" role="form" enctype="multipart/form-data" id="js-upload-form">
        <!--<?php //echo form_open_multipart('items/uploadImg') ?>-->  
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Design Name</label>
                <input type="text" name="gown_name" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Color</label>
                <input type="text" name="gown_color" class="form-control">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Select files from your computer</label>
            <input type="file" name="files[]" id="js-upload-files" multiple>
          </div>         
          <!-- drop zone -->
          <br>
          <p>Or drag and drop files below</p>
            <div class="upload-drop-zone" id="drop-zone">
              Just drag and drop files here
            </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
          </div>  
        </form>  
      </div>    
    </div>

  </div>
</div>   
 <!-- End of modal -->
 
    <div class="container" id="con">
        <div class="row">
          <?php
            if(!empty($allGowns)){
            foreach ($allGowns as $gow) { 
              $gowID = $gow['designID'] ?>             
                  <div class="col-lg-3">
                    <div class="thumbnail">
                      <form id="" role="form" method="post" action="">
                            
                      <?php 
                      /*echo '<input type="hidden" id="newDesId" name="newDesId" value="' . $gowID . '"/>';*/

                      echo '<img class = "galleryImg" src="data:image/jpeg;base64,' . base64_encode( $gow['designImage'] ) . '"/>'; 
                      ?>
                      </form>
                    </div>
                  </div>                
          <?php }
              } else {
                echo 'No gowns';
              }
              ?>

              <!-- submit button should be here... -->          
              
        </div>
      <!--div class="row">
        < submit id of the new ... id >
        <button type="submit" class="btn btn-md btn-primary" id="donebtn" name="donebtn">Done</button>
                    
        <button type="submit" class="btn btn-md btn-primary" id="backbtn">Back</button>
      </div>  
    </div-->

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
</body>
