<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>UIT DDUGKY</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/admin/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/admin/css/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/sweetalert2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/additional-methods.min.js"></script>
        <!-- <script src="<?php echo base_url(); ?>assets/admin/js/vendor.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/app.min.js"></script> -->

    </head>

    <body class="authentication-bg">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">

                            <div class="card-body p-4">

                                <div class="text-center w-75 m-auto">
                                    <a href="">
                                        <span><img src="<?php echo base_url(); ?>assets/admin/images/logo-dark.png" alt="" height="22"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Enter your Username and password to access admin panel.</p>
                                </div>

                                <form action="#" method="post" enctype="multipart/form-data" name="loginform" id="loginform">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Username</label>
                                        <input class="form-control" type="text" id="user_name" name="user_name" placeholder="Enter your Username">
                                    </div>

                                    <div class="form-group mb-3">

                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="password" id="password" placeholder="Enter your password">
                                    </div>



                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->


                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <!-- App js -->
        <style>

        </style>

        <script type="text/javascript">

        $('#loginform').validate({ // initialize the plugin
        rules: {
            user_name: {
                required: true
            },
            password: {
                required: true
            }
        },
    messages: {
        user_name: { required:"Enter the Username" },
        password: { required:"Enter the Password"}

    },
    submitHandler: function(form) {


        $.ajax({
            url: "<?php echo base_url(); ?>adminlogin/check_login",
            type: 'POST',
            data: $('#loginform').serialize(),
            success: function(response) {

                if (response == "success") {
                    swal({
                        title: "Success",
                        text: "Logged in Successfully",
                        type: "success"
                    }).then(function() {
                        location.href = '<?php echo base_url(); ?>adminlogin/home';
                    });
                } else {
                    sweetAlert("Oops...", response, "error");
                }
            }
        });
    }
    });

        </script>
    </body>
</html>
