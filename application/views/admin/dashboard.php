<div class="wrapper">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body p-0">
                        <div class="p-3 pb-0">
                            <div class="float-right">
                                <i class="fe-file-text text-primary widget-icon"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0">Total Newsfeed</h5>
                            <h3 class="mt-2"><?php echo $res_news; ?></h3>
                        </div>
                        <div id="sparkline1"></div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-xl-3 col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body p-0">
                        <div class="p-3 pb-0">
                            <div class="float-right">
                                <i class="mdi mdi-camera-image text-danger widget-icon"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0">Total Gallery</h5>
                            <h3 class="mt-2"><?php echo $res_gallery; ?></h3>
                        </div>
                        <div id="sparkline2"></div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-xl-3 col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body p-0">
                        <div class="p-3 pb-0">
                            <div class="float-right">
                                <i class="mdi mdi-contacts text-primary widget-icon"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0">Total Enquired</h5>
                            <h3 class="mt-2"><?php echo $res_contact; ?></h3>
                        </div>
                        <div id="sparkline3"></div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->


        </div>
        <!-- end row -->




    </div> <!-- end container -->
</div>
<!-- end wrapper -->
