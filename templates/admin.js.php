<!-- JS Global Compulsory -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
<script src="assets/vendor/jquery.easing/js/jquery.easing.js"></script>
<script src="assets/vendor/popper.min.js"></script>
<script src="assets/vendor/bootstrap/bootstrap.min.js"></script>
<script src="assets/vendor/jquery-ui/jquery-ui.core.js"></script>

<!-- JS Implementing Plugins -->
<script src="assets/vendor/chosen/chosen.jquery.js"></script>
<script src="assets/vendor/image-select/src/ImageSelect.jquery.js"></script>
<script src="assets/vendor/masonry/dist/masonry.pkgd.min.js"></script>
<script src="assets/vendor/slick-carousel/slick/slick.js"></script>
<script src="assets/vendor/fancybox/jquery.fancybox.min.js"></script>

<!-- JS Unify -->
<script src="assets/js/hs.core.js"></script>
<script src="assets/js/components/hs.header.js"></script>
<script src="assets/js/helpers/hs.hamburgers.js"></script>
<script src="assets/js/components/hs.header-side.js"></script>
<script src="assets/js/helpers/hs.height-calc.js"></script>
<script src="assets/js/helpers/hs.navigation-splitted.js"></script>
<script src="assets/js/components/hs.popup.js"></script>

<script src="assets/vendor/appear.js"></script>
<script src="assets/vendor/custombox/custombox.min.js"></script>
<script src="assets/js/components/hs.modal-window.js"></script>
<script src="assets/vendor/bootstrap/offcanvas.js"></script>

<!-- JS Custom -->
<script src="assets/js/custom.js"></script>

<!-- Twitch Stuff -->
<script type="text/javascript">
  $(document).on('ready', function () {
    // initialization of countdowns
    $.HSCore.components.HSPopup.init('.js-fancybox');
    $.HSCore.components.HSModalWindow.init('[data-modal-target]');
  });

  $(window).on('load', function () {
      // initialization of header
      $.HSCore.components.HSHeaderSide.init($('#js-header'));
      $.HSCore.helpers.HSHamburgers.init('.hamburger');
    });

</script>
