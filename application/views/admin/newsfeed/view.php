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
                                    <li class="breadcrumb-item active">View</li>
                                </ol>
                            </div>
                            <h4 class="page-title">View Newsfeed</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">



                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th style="width:250px;">Title</th>
                    <th style="width:600px;">Description</th>
                    <th style="width:100px;">Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
              <?php $i=1; foreach($res as $rows) { ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $rows->title; ?></td>
                    <td><?php echo $rows->description; ?></td>
                    <td><?php echo $rows->status; ?></td>
                    <td><a href="<?php echo base_url(); ?>newsfeed/get_newsfeed/<?php echo base64_encode($rows->id*98765); ?>"><i class="fe-check-square"></i></a></td>

                </tr>
              <?php $i++; } ?>


            </tbody>
        </table>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
                <!-- end row-->




            </div> <!-- end container -->
        </div>
