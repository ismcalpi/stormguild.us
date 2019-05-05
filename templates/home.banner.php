<div class="master-slider g-ma-0 g-pa-0 ms-skin-default w-100" id="masterslider">
  <?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/class/database.php';
  $db = new database();
  $banners = $db -> readResults("SELECT * FROM stormguild.banner WHERE is_active = 1");
  foreach($banners as $banner) {
  ?>
  <div class="ms-slide" data-delay="10">
    <img style="max-width:100%;max-height:100%;" src="<?php echo $banner['img_path']; ?>" data-src="<?php echo $banner['img_path']; ?>" />
    <div class="ms-layer"
        style="bottom:50%;left:10px;right:10px;background-color:rgba(0,0,0,.6);"
        data-offset-x = "0"
        data-offset-y = "0"
        data-effect="<?php echo $banner['animation']; ?>"
        data-type="text"
        data-duration="2000"
        data-delay="0"
        data-ease="easeInCubic"
        data-hide-time="0"
        data-hide-duration="800"
        data-hide-ease="easeOutCubic">
          <section class="g-brd-around g-brd-gray-light-v4 g-pa-5">
           <div class="container">
             <div class="row justify-content-around">
               <div class="col-md-12 col-12 align-self-center">
                 <h3 class="text-uppercase g-color-white" style="font-size:calc(16px + 1vw);<?php echo $banner['title_style']; ?>">
                   <?php echo $banner['title']; ?>
                 </h3>
               </div>
               <div class="col-md-9 col-12 align-self-center">
                 <p class="lead g-mb-5 g-mb-0--md g-color-white" style="font-size:calc(10px + .5vw);<?php echo $banner['body_style']; ?>">
                   <?php echo $banner['body']; ?>
                 </p>
               </div>
               <div class="col-md-3 d-none d-sm-block align-self-left">
                 <a href="<?php echo $banner['button_url']; ?>"
                    class="btn btn-sm u-btn-skew u-btn-<?php echo $banner['button_color']; ?> g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mt-5">
                    <span class="u-btn-skew__inner">
                      <i class="fa fa-check-circle g-mr-3"></i>
                      <?php echo $banner['button_text']; ?>
                    </span>
                  </a>
               </div>
             </div>
           </div>
          </section>
    </div>
  </div>
  <?php
    }
  ?>
</div>
