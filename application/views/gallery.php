<div class="education-subheader">
            <span class="subheader-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="education-subheader-title"><h1>Event List</h1></div>
                        <ul class="education-breadcrumb">
                            <li><a href="index-2.html">Gallery</a></li>
                            <li><i class="fa fa-long-arrow-right"></i></li>
                            <li class="active"><?php foreach($res_title as $rows_title){} echo $rows_title->event_title; ?></li>
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
<div class="education-gallery education-event-gallery">
                                <ul class="row">
                                  <?php  foreach($res as $rows) { ?>


                                    <li class="col-md-3">
                                        <figure><a data-fancybox-group="group" href="<?php  echo base_url(); ?>assets/gallery/images/<?php echo $rows->event_img; ?>" class="fancybox">
                                          <img src="<?php  echo base_url(); ?>assets/gallery/images/<?php echo $rows->event_img; ?>" alt=""><i class="icon-enlarge"></i></a>


                                        </figure>
                                    </li>
                                      <?php  } ?>


                                </ul>
                            </div>
                          </div>


  					</div>
  				</div>
  			</div>
  			<!--// Main Section \\-->

  		</div>
      <style>

    .education-event-gallery figure > a:before{
        background-color:#ffffff2e;
      }
      </style>
