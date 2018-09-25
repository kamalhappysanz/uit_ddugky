<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="" name="description" />
        <meta content="" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/admin/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/admin/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/admin/css/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/sweetalert2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/additional-methods.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/dataTables.bootstrap4.min.js"></script>

    </head>

    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <nav class="navbar-custom">

                <div class="container-fluid">
                    <ul class="list-unstyled topbar-right-menu float-right mb-0">

                        <li class="dropdown notification-list">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>


                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="<?php echo base_url(); ?>assets/admin/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                <small class="pro-user-name ml-1">
                                    <?php echo $this->session->userdata('name');?>
                                </small>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>



                                <!-- item-->
                                <a href="<?php echo base_url(); ?>adminlogin/change_password" class="dropdown-item notify-item">
                                    <i class="fe-settings"></i>
                                    <span>Settings</span>
                                </a>



                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a onclick="logout()" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <a href="<?php echo base_url(); ?>adminlogin/home" class="logo">
                                <span class="logo-lg">
                                    <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" height="18">
                                </span>

                            </a>
                        </li>
                        <li class="app-search">

                        </li>
                    </ul>
                </div>

            </nav>
            <!-- end topbar-main -->

            <div class="topbar-menu">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="<?php echo base_url(); ?>adminlogin/home">
                                    <i class="fe-airplay"></i>Dashboard</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#">
                                    <i class="fe-layers"></i>NewsFeed</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="<?php echo base_url(); ?>newsfeed/home">Create </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>newsfeed/view"> View </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"> <i class="fe-bookmark"></i>Event Gallery</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="<?php echo base_url(); ?>eventgallery/home">Create gallery</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>eventgallery/view">View gallery</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="<?php echo base_url(); ?>adminlogin/contact_enquired"> <i class="fe-cpu"></i>Contact form</a>
                            </li>
                        </ul>
                        <!-- End navigation menu -->

                        <div class="clearfix"></div>
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->
