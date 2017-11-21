<!-- JS Global Compulsory -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
<script src="assets/vendor/jquery.easing/js/jquery.easing.js"></script>
<script src="assets/vendor/popper.min.js"></script>
<script src="assets/vendor/bootstrap/bootstrap.min.js"></script>
<script src="assets/vendor/jquery-ui/jquery-ui.core.js"></script>

<!-- JS Implementing Plugins -->
<script src="assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
<script src="assets/vendor/dzsparallaxer/dzsparallaxer.js"></script>
<script src="assets/vendor/dzsparallaxer/dzsscroller/scroller.js"></script>
<script src="assets/vendor/dzsparallaxer/advancedscroller/plugin.js"></script>
<script src="assets/vendor/chosen/chosen.jquery.js"></script>
<script src="assets/vendor/image-select/src/ImageSelect.jquery.js"></script>
<script src="assets/vendor/masonry/dist/masonry.pkgd.min.js"></script>
<script src="assets/vendor/slick-carousel/slick/slick.js"></script>
<script src="assets/vendor/fancybox/jquery.fancybox.min.js"></script>
<script src="assets/vendor/appear.js"></script>

<!-- JS Unify -->
<script src="assets/js/hs.core.js"></script>
<script src="assets/js/components/hs.header.js"></script>
<script src="assets/js/helpers/hs.hamburgers.js"></script>
<script src="assets/js/components/hs.scroll-nav.js"></script>
<script src="assets/js/components/hs.go-to.js"></script>
<script src="assets/js/components/hs.sticky-block.js"></script>
<script src="assets/js/helpers/hs.height-calc.js"></script>
<script src="assets/js/components/hs.carousel.js"></script>
<script src="assets/js/components/hs.countdown.js"></script>
<script src="assets/js/components/hs.popup.js"></script>
<script src="assets/js/components/hs.progress-bar.js"></script>
<script src="assets/js/helpers/hs.navigation-splitted.js"></script>

<!-- JS Custom -->
<script src="assets/js/custom.js"></script>

<script>
  $(document).on('ready', function () {
    // initialization of HSNavigationSplitted helper
    $.HSCore.helpers.HSNavigationSplitted.init($('.navbar-collapse'));
    // initialization of countdowns
    $.HSCore.components.HSPopup.init('.js-fancybox');
  });
  $(window).on('load', function () {
    // initialization of header
    $.HSCore.components.HSHeader.init($('#js-header'));
    $.HSCore.helpers.HSHamburgers.init('.hamburger');
  });
  // Initailization of Master Slider
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
