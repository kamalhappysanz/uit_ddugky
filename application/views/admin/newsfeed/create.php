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
                                    <li class="breadcrumb-item active">Create</li>
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
                                <h4 class="mb-3 header-title">Create Newsfeed</h4>

                                <form method="post" action="" enctype="multipart/form-data" id="formname" name="formname">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description</label>
                                        <textarea class="form-control" type="text" id="exampleInputPassword1"  name="description" placeholder="Description" rows="4"></textarea>
                                  <div id="charNum"></div>  </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>
                    <!-- end col -->


                </div>
                <!-- end row -->
            </div> <!-- end container -->
        </div>
<script>

$('#formname').validate({ // initialize the plugin
rules: {
    title: {
        required: true,maxlength: 50,
        remote: {
                   url: "<?php echo base_url(); ?>newsfeed/exist_title",
                   type: "post"
                }
    },
    status: {
        required: true
    },
    description: {
        required: true,maxlength: 200
    }
},
messages: {
title: { required:"Enter the title",maxlength: "Maximum 50 Characters ",remote:"Title Already Exists" },
status: { required:"Enter the status" },
description: { required:"Enter the Description",maxlength: "Maximum 200 Characters "}
},
submitHandler: function(form) {
  $('button[type=submit], input[type=submit]').prop('disabled',true);
$.ajax({
    url: "<?php echo base_url(); ?>newsfeed/create",
    type: 'POST',
    data: $('#formname').serialize(),
    success: function(response) {
        if (response == "success") {
            swal({
                title: "Success",
                text: "Added  Successfully",
                type: "success"
            }).then(function() {
                location.href = '<?php echo base_url(); ?>newsfeed/view';
            });
        } else {
            sweetAlert("Oops...", response, "error");
        }
    }
});
}
});
</script>
