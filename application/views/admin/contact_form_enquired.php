<div class="wrapper">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>adminlogin/home">Admin</a></li>
                                    <li class="breadcrumb-item"><a href="#">Contact form</a></li>
                                    <li class="breadcrumb-item active">Enquired</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Contact form</h4>
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
                    <th style="width:150px;">Name</th>
                    <th style="width:150px;">Phone</th>
                    <th style="width:300px;">Subject</th>
                    <th style="width:600px;">Message</th>
                    <th style="width:200px;">Enquired on Date</th>


                </tr>
            </thead>
            <tbody>
              <?php $i=1; foreach($res as $rows) { ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $rows->name; ?></td>
                    <td><?php echo $rows->phone; ?></td>
                    <td><?php echo $rows->subject; ?></td>
                    <td><?php echo $rows->message; ?></td>
                      <td><?php echo $rows->updated_at; ?></td>


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
