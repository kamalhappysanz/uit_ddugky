<div class="education-subheader">
            <span class="subheader-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="education-subheader-title"><h1>Event List</h1></div>
                        <ul class="education-breadcrumb">
                            <li><a href="index-2.html">Home</a></li>
                            <li><i class="fa fa-long-arrow-right"></i></li>
                            <li class="active">Event List</li>
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
                            <div class="education-event education-event-list">
                                <ul class="row">

                                  <?php foreach($res as $rows){ ?>

                                    <li class="col-md-12 event_tab">
                                        <figure><a href="<?php echo base_url(); ?>gallery_view/<?php echo base64_encode($rows->id*98765); ?>">
                                          <img class="event_thumb" src="<?php echo base_url(); ?>assets/gallery/<?php echo $rows->cover_img; ?>" alt=""><i class="fa fa-link"></i></a>

                                        </figure>
                                        <div class="education-event-list-wrap">
                                            <div class="education-event-list-text">
                                                <h5><a href=""><?php echo $rows->event_title; ?></a></h5>

                                                <p><?php echo $rows->event_description; ?></p>
                                            </div>

                                        </div>
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
    .education-event-list-text{
      height: 232px;
    }
    .event_thumb{
        height: 232px;
    }
    </style>
