<!-- <link href="<?php echo base_url(); ?>assets/admin/css/vendor/dropzone.min.css" rel="stylesheet" />
  <script src="<?php echo base_url(); ?>assets/admin/js/dropzone.js"></script> -->

<div class="wrapper">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>adminlogin/home">Admin</a></li>
                                  <li class="breadcrumb-item"><a href="#">Event Gallery</a></li>
                                  <li class="breadcrumb-item active">Add Gallery Image</li>
                                </ol>
                            </div>
                            <h4 class="page-title">File Uploads</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="mb-3 header-title">Horizontal form</h4>

                                <form class="form-horizontal" action="<?php echo base_url(); ?>eventgallery/create_gallery_img" method="post" enctype="multipart/form-data" name="gallery_img" id="gallery_img">
                                  <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Upload Gallery Image</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" name="event_token" value="<?php 	echo $this->uri->segment(3); ?>">
                                            <div class="input-group">
                                                <div class="custom-file">

                                                    <input type="file" class="custom-file-input" id="files" name="gallery_img[]" multiple accept=".png, .jpg, .jpeg" required>
                                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                    <div class="field" id="field" align="left">
                                    </div>
                                      </div>



                                    <div class="form-group mb-0 justify-content-end row">
                                        <div class="col-9">
                                            <button type="submit" class="btn btn-info  ">Upload</button>
                                        </div>
                                    </div>
                                </form>

                            </div>  <!-- end card-body -->
                        </div>  <!-- end card -->
                    </div>  <!-- end col -->

                </div>

            </div> <!-- end container -->
        </div>
        <style>
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.field{
margin: 10px 10px 10px 10px;
}

.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
        </style>
<script>
$(document).ready(function() {
  $('button[type=submit], input[type=submit]').prop('disabled',true);
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<div class=\"field\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</div>").insertAfter("#field");
            $(".remove").click(function(){
                    $(this).parent(".field").remove();
                    $('#files').val("");
                  });

        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});

</script>
