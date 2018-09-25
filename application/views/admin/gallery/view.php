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
                                    <li class="breadcrumb-item active">View</li>
                                </ol>
                            </div>
                            <h4 class="page-title">View Event Gallery</h4>
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
                    <th style="width:100px;">Cover image</th>
                    <th style="width:100px;">Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
              <?php $i=1; foreach($res as $rows) { ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $rows->event_title; ?></td>
                    <td><?php echo $rows->event_description; ?></td>
                    <td><img src="<?php echo base_url(); ?>assets/gallery/<?php echo $rows->cover_img; ?>" class="img-circle event_cover_img"></td>
                    <td><?php echo $rows->status; ?></td>
                    <td><a data-toggle="tooltip" title="Edit  Gallery" href="<?php echo base_url(); ?>eventgallery/get_eventgallery/<?php echo base64_encode($rows->id*98765); ?>"><i class="fe-check-square"></i></a>
                    <a data-toggle="tooltip" title="Add Gallery" href="<?php echo base_url(); ?>eventgallery/add_gallery_image/<?php echo base64_encode($rows->id*98765); ?>"><i class="fe-plus-circle"></i></a>
                    <a data-toggle="tooltip" title="View  Gallery" href="<?php echo base_url(); ?>eventgallery/view_gallery_image/<?php echo base64_encode($rows->id*98765); ?>"><i class="fe-image"></i></a>


                  </td>

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
<style>
.event_cover_img{
  width:150px;
}
</style>
