<div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>adminlogin/home">Admin</a></li>
                                  <li class="breadcrumb-item"><a href="#">Event Gallery</a></li>
                                  <li class="breadcrumb-item active">View Gallery Image</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Event Gallery Image</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                          <div class="card-body">
                              <h4 class="mb-3 header-title">Event Gallery Image</h4>
                              <div class="row">
                              <?php foreach($res as $rows){ ?>
                                <div class="col-lg-2">
                                  <img src="<?php echo base_url(); ?>assets/gallery/images/<?php echo $rows->event_img; ?>" class="img_gallery">
                                <center>  <button class="btn btn-light btn-rounded" onclick="delete_gal('<?php echo $rows->id; ?>')">Remove</button></center>
                                </div>
                            <?php  } ?>

                              </div>
                            </div>
                        </div>
                    </div>
                </div>


  </div>
</div>
<style>
.img_gallery{
  width: 200px;
  margin:5px 10px 10px 10px;
}
</style>
<script>
function delete_gal(id){
  var id=id;
  			swal({
      title: "Are you sure?",
      text: "You want to delete image",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: '#DD6B55',
      confirmButtonText: 'Yes, I am sure!',
      cancelButtonText: "No, cancel it!"
   }).then(
         function () {
  				 $.ajax({
  						 url: "<?php echo base_url(); ?>eventgallery/delete_gallery_img",
  						 type: 'POST',
  						data:{id:id},
  						 success: function(response) {
    						 if (response == "success") {
                 swal({
                     title: "success",
                     text: "Deleted  Successfully",
                     type: "success"
                 }).then(function() {
                    location.reload();
                 });
  								 } else{
  										 sweetAlert("Oops...", response, "error");
  								 }
  						 }
  				 });
  			 },
         function () { return false; });

}
</script>
