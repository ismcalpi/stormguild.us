
<div class="ms-stackview-template g-rounded-10">
    <!-- masterslider -->
    <div class="master-slider ms-skin-default" id="masterslider">

<?php

    include_once 'library/class.database.php';
    $db = new database();

    $killshots = $db -> read_select("select image_url, video_url, upload_date
                                from stormguild.killshots
                                order by killshot_id desc
                                limit 5");

    foreach($killshots as $killshot) {

      if (strpos($killshot['video_url'], 'youtube') !== FAlSE ) {

          $vidBlock = '<a class="js-fancybox" href="'.$killshot['video_url'].'">
                            <span class="u-icon-v2 u-icon-size--md g-color-white g-color-red--hover g-mr-15 g-mb-15">
                                <i class="fa fa-youtube-play"></i>
                            </span>
                        </a>';

      } else if (strpos($killshot['video_url'], 'twitch') !== FAlSE ) {

          $vidBlock = '<a target=_blank href="'.$killshot['video_url'].'">
                            <span class="u-icon-v2 u-icon-size--md g-color-white g-color-purple--hover g-mr-15 g-mb-15">
                                <i class="fa fa-twitch"></i>
                            </span>
                        </a>';

      } else {
      	$vidBlock = '';
      }

      echo '<div class="ms-slide" data-delay="6">
                <img src="'.$killshot['image_url'].'" data-src="'.$killshot['image_url'].'" />
                <div class="ms-layer ms-caption" style="top:20px; left:40px;">
                    <a class="js-fancybox" href="'.$killshot['image_url'].'">
                        <span class="u-icon-v2 u-icon-size--md g-color-white g-color-blue--hover g-mr-15 g-mb-15">
                            <i class="fa fa-image"></i>
                        </span>
                    </a>
                    '.$vidBlock.'
                </div>
            </div>';
    }

?>

    </div>
    <!-- end of masterslider -->
</div>

<script src="assets/js/components/hs.carousel.js"></script>
<script src="assets/vendor/slick-carousel/slick/slick.js"></script>
<script src="assets/vendor/master-slider/source/assets/js/masterslider.min.js"></script>

<script src="assets/vendor/fancybox/jquery.fancybox.min.js"></script>
<script src="assets/js/components/hs.popup.js"></script>

<script>
  var slider = new MasterSlider();
    slider.control('arrows');
    slider.control('bullets', {autohide: true, align: 'bottom', margin: 10});
    slider.setup('masterslider', {
      width: 750,
      height: 430,
      space: 5,
      view: 'stack',
      loop: true,
      autoplay: true,
      overPause: true,
      speed: 40
    });
</script>
<script >
  $(document).on('ready', function () {
    $.HSCore.components.HSPopup.init('.js-fancybox');
  });
</script>
