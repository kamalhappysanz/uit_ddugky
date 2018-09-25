<div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>adminlogin/home">Admin</a></li>
                                  <li class="breadcrumb-item"><a href="#">Setting</a></li>
                                  <li class="breadcrumb-item active">Change Password </li>
                                </ol>
                            </div>
                            <h4 class="page-title">Change Password</h4>
                        </div>
                    </div>
                </div>
                <div class="row">


                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="mb-3 header-title">Password Update</h4>

                                <form class="form-horizontal" id="adminform" method="post" enctype="multipart/form-data" name="adminform">
                                    <div class="form-group row mb-3">
                                        <label for="inputEmail3" class="col-3 col-form-label">Current Password</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="currentpassword" name="currentpassword" placeholder="Current Password">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="inputPassword3" class="col-3 col-form-label">Password</label>
                                        <div class="col-9">
                                            <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="inputPassword5" class="col-3 col-form-label">Retype Password</label>
                                        <div class="col-9">
                                            <input type="password" class="form-control" id="retypepassword" name="retypepassword" placeholder="Retype Password">
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 justify-content-end row">
                                        <div class="col-9">
                                            <button type="submit" class="btn btn-info  ">Update</button>
                                        </div>
                                    </div>
                                </form>

                            </div>  <!-- end card-body -->
                        </div>  <!-- end card -->
                    </div>  <!-- end col -->

                </div>


  </div>
</div>

<script>

$('#adminform').validate({ // initialize the plugin
    rules: {
        currentpassword: {required: true,
          remote: {
                url: "<?php echo base_url(); ?>adminlogin/checkpassword",
                type: "post"
             }
           },
        newpassword : {
          required: true, minlength : 6,maxlength:12,
       },
       retypepassword : {

           equalTo : '[name="newpassword"]',
       }
    },
    messages: {
        currentpassword: { required:"Enter the Current Password",remote:"Password was Wrong" },
        newpassword: {   required: "Enter  New Password",minlength: "Min is 6", maxlength: "Max is 12"},
         retypepassword: {
             required: "Enter Confirm Password",
             equalTo:"New password should not match",
             notEqualTo: "Password Should Match"
         }

    },
    submitHandler: function(form) {
        $.ajax({
            url: "<?php echo base_url(); ?>adminlogin/updatepassword",
            type: 'POST',
            data: $('#adminform').serialize(),
            success: function(response) {
             // alert(response);
                if (response == "success") {
                  swal({
                  title: "success",
                  text: " Password Has been Changed Successfully",
                  type: "success"
              }).then(function() {
                  location.href = '<?php echo base_url(); ?>adminlogin/home';
              });

                } else{
                    sweetAlert("Oops...", response, "error");
                }
            }
        });
    }
});
</script>
