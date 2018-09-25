<div class="wrapper">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>adminlogin/home">Admin</a></li>
                                    <li class="breadcrumb-item"><a href="#">Newsfeed</a></li>
                                    <li class="breadcrumb-item active">Edit</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Newsfeed</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3 header-title">Edit Newsfeed</h4>
                                <?php foreach($res as $rows){} ?>
                                <form method="post" action="<?php echo base_url(); ?>eventgallery/update_gallery" enctype="multipart/form-data" id="formname" name="formname">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" value="<?php echo $rows->event_title; ?>" aria-describedby="emailHelp" placeholder="Enter Title">

                                    </div>
                                    <div class="form-group ">
                                        <label for="exampleInputPassword1">Cover Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="cover_img" name="cover_img" onchange="loadFile(event)" accept=".png, .jpg, .jpeg">
                                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                                </div>
                                            </div>
                                    </div>
                                    <input type="hidden" class="form-control" name="row_id" id="exampleInputEmail1"  value="<?php echo base64_encode($rows->id*98765); ?>">
                                      <input type="hidden" class="form-control" name="cover_img_old" id="cover_img_old"  value="<?php echo $rows->cover_img; ?>">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description</label>
                                        <textarea class="form-control" type="text" id="exampleInputPassword1" name="description" placeholder="Description" rows="4"><?php echo $rows->event_description; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                            <script>$('#status').val('<?php echo $rows->status; ?>');</script>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>
                    <div class="col-lg-4">
                      <img src="<?php echo base_url(); ?>assets/gallery/<?php echo $rows->cover_img;  ?>" class="img_preview" id="old_img">
                      <img id="output" class="img_preview"/>
                    </div>
                    <!-- end col -->


                </div>
                <!-- end row -->
            </div> <!-- end container -->
        </div>
        <style>
        .img_preview{
          width:200px;
          margin-top: 100px;
        }
        #cover_img-error{
          position: absolute;
            left: 0px;
            top: 35px;
        }
        </style>
<script>
var loadFile = function(event) {
  $('#old_img').hide();
  var reader = new FileReader();
  reader.onload = function(){
    var output = document.getElementById('output');
    output.src = reader.result;
  };
  reader.readAsDataURL(event.target.files[0]);
};
$('#formname').validate({
rules: {
    title: {
        required: true,maxlength: 50,
        remote: {
                   url: "<?php echo base_url(); ?>eventgallery/exist_title_check/<?php echo  base64_encode($rows->id*98765);  ?>",
                   type: "post"
                }
    },
    status: {
        required: true
    },
    cover_img: {
        required: false,accept:"jpg,png,jpeg"
    },
    description: {
        required: true,maxlength: 200
    }
},
messages: {
      title: { required:"Enter the title",maxlength: "Maximum 50 Characters ",remote:"Title Already Exists" },
      status: { required:"Enter the status" },
      cover_img: { required:"select image", accept: "Only image type jpg/png/jpeg is allowed" },
      description: { required:"Enter the Description",maxlength: "Maximum 200  Characters "}
}
});
</script>
