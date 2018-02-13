<div class="master-slider g-ma-0 g-pa-0 ms-skin-default" id="masterslider">
  <?php
  include_once 'library/class.database.php';
  $db = new database();
  $banners = $db -> read_select("SELECT * FROM stormguild.banners WHERE is_active = 1");
  foreach($banners as $banner) {
  ?>
  <div class="ms-slide g-ma-0 g-pa-0" data-delay="10">
    <img style="max-width:100%;max-height:100%;" src="<?php echo $banner['path']; ?>" data-src="<?php echo $banner['path']; ?>" />
    <a href="<?php echo $banner['url']; ?>"></a>
  </div>
  <?php
  }
  ?>
</div>
