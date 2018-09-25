<div class="education-subheader">
            <span class="subheader-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="education-subheader-title"><h1>contact us</h1></div>
                        <ul class="education-breadcrumb">
                            <li><a href="index-2.html">Home</a></li>
                            <li><i class="fa fa-long-arrow-right"></i></li>
                            <li class="active">contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="education-main-content">

			<!--// Main Section \\-->
			<div class="education-main-section">
				<div class="container">
					<div class="row">
                        <div class="col-md-12">
                            <div class="education-fancy-title">
                                <i class="fa fa-graduation-cap"></i>
                                <span>find us now</span>
                                <h2>contact us</h2>
                            </div>
                        </div>
						<div class="col-md-3">
                            <div class="education-contact-us">
                                <ul>
                                    <li>
                                        <h6>Phone</h6>
                                        <span>+123 45 678 - (+92) 123 45 678</span>
                                        <i class="fa fa-phone"></i>
                                    </li>
                                     <li>
                                        <h6>Email</h6>
                                        <a href="mailto:name@email.com">info@exap.com - abc@gmail.com</a>
                                        <i class="fa fa-envelope"></i>
                                    </li>
                                     <li>
                                        <h6>Location</h6>
                                        <span>2925 Swick Hill Street, Charlott</span>
                                        <i class="fa fa-map-marker"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                        </div>
                        <div class="col-md-12">
                            <div class="education-fancy-title">
                                <i class="fa fa-graduation-cap"></i>
                                <span>get it touch</span>
                                <h2>message now</h2>
                            </div>
                             <div class="education-contact-us-form">
                                <form method="post" enctype="multipart/form-data" action="" id="formname">
                                    <ul>
                                        <li>
                                            <input type="text" name="name" id="name" placeholder="Name" >
                                            <i class="fa fa-user"></i>
                                        </li>
                                        <li>
                                            <input type="text" name="phone" id="phone" placeholder="Phone Number" >
                                            <i class="fa fa-mobile"></i>
                                        </li>
                                        <li class="message-box">
                                            <input type="text" name="subject" id="subject" placeholder="Subject" >

                                        </li>

                                        <li class="message-box">
                                            <textarea name="message" id="message" type="text" placeholder="Message"></textarea>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="submit" value="Send">
                                            </label>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
					</div>
				</div>
			</div>
			<!--// Main Section \\-->


		</div>
    <style>
    .education-contact-us-form ul li label input[ type="submit"]{
      background-color: #3f51b5;
      color:#fff;
    }
    .error{
      color:red;
    }
    </style>
    <script>

    $('#formname').validate({ // initialize the plugin
    rules: {
        name: {
            required: true,maxlength: 50

        },
        phone: {
            required: true,number:true
        },
        subject: {
            required: true
        },
        message: {
            required: true,maxlength: 200
        }
    },
    messages: {
    name: { required:"Enter the title",maxlength: "Maximum 50 Characters " },
    phone: { required:"Enter the Phone Number",number:"Enter the Phone Number" },
    subject: { required:"Enter the status" },
    message: { required:"Enter the Message",maxlength: "Maximum 200 Characters "}
    },
    submitHandler: function(form) {
      $('button[type=submit], input[type=submit]').prop('disabled',true);

    $.ajax({
        url: "<?php echo base_url(); ?>contact_form",
        type: 'POST',
        data: $('#formname').serialize(),
        success: function(response) {
            if (response == "success") {
                swal({
                    title: "Success",
                    text: "Thank you for Contacting ",
                    type: "success"
                }).then(function() {
                    location.href = '<?php echo base_url(); ?>contact';
                });
            } else {
                sweetAlert("Oops...", response, "error");
            }
        }
    });
    }
    });
    </script>
