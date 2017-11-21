<?php
  $twitchActive = $aboutActive = $homeActive = $recruitActive = $userActive = '';
  switch($_SERVER['REQUEST_URI']) {
    case 'twitch.php':
      $twitchActive = 'active';
      break;
    case 'about.php':
      $aboutActive = 'active';
      break;
    case 'index.php':
      $homeActive = 'active';
      break;
    case 'recruit.php':
      $recruitActive = 'active';
      break;
    case 'user.php':
      $userActive = 'active';
      break;
  }

  $phpbb_username = $user -> data['username'];

?>
<header
  id="js-header"
  class="u-header u-header--sticky-top u-header--toggle-section u-header--change-appearance g-mb-50"
  data-header-fix-moment="300"
  data-header-fix-effect="slide">
  <div
    class="u-header__section u-header__section--light bg-white-0-90 g-transition-0_3 g-py-0 g-mb-50"
    data-header-fix-moment-exclude="g-py-0"
    data-header-fix-moment-classes="u-shadow-v18 g-py-0">
    <nav class="js-mega-menu navbar navbar-expand-lg">
      <div class="container">
        <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
        <span class="hamburger hamburger--slider">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </span>
        </button>
        <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 " id="navBar">
        <ul class="navbar-nav align-items-lg-center mx-auto text-uppercase g-font-weight-600 u-main-nav-v5">
          <li class="nav-item g-mx-20--lg g-mb-5 g-mb-0--lg <?php $twitchActive ?>">
            <a href="twitch.php" class="nav-link">
              <span class="u-icon-v1 u-icon-size--xs">
                <img src="assets/img/logo.twitch.png">
              </span>
              Twitch
            </a>
          </li>
          <li class="nav-item g-mx-20--lg g-mb-5 g-mb-0--lg">
            <a target="_blank" href="https://www.warcraftlogs.com/guilds/145258" class="nav-link">
              <span class="u-icon-v1 u-icon-size--xs">
                <img src="assets/img/logo.warlogs.png">
              </span>
              Logs
            </a>
          </li>
          <li class="nav-item g-mx-20--lg g-mb-5 g-mb-0--lg">
            <a target="_blank" href="https://discord.gg/SA5WsZs" class="nav-link">
              <span class="u-icon-v1 u-icon-size--xs">
                <img src="assets/img/logo.discord.png">
              </span>
              Discord
            </a>
          </li>
          <li class="nav-logo-item g-mx-20--lg">
            <a href="index.php" class="navbar-brand mr-0">
              <img class="u-block-hover__img u-block-hover__main--blur" style="max-height:40px;" src="assets/img/logo.storm.png" title="Home">
            </a>
          </li>
          <li class="nav-item g-mx-20--lg g-mb-5 g-mb-0--lg <?php $aboutActive ?>">
            <a href="./about.php" class="nav-link">About Us</a>
          </li>
          <li class="nav-item g-mx-20--lg g-mb-5 g-mb-0--lg <?php $recruitActive ?>">
            <a href="recruit.php" class="nav-link">Recruitment</a>
          </li>

          <?php
            if($phpbb_username != 'Anonymous' && ISSET($phpbb_username)) {
          ?>
          <li class="nav-item hs-has-sub-menu g-mx-20--lg" data-event="click">
                  <a href="#" class="nav-link g-px-0 g-color-blue" id="nav-link-1" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu-1"><?php echo $phpbb_username; ?></a>
          <!-- Submenu -->
          <ul class="hs-sub-menu list-unstyled g-text-transform-none g-brd-top g-brd-blue g-brd-top-2 g-min-width-200 g-mt-20 g-mt-10--lg--scrolling" id="nav-submenu-1" aria-labelledby="nav-link-1">
            <li class="dropdown-item">
              <a class="nav-link g-px-0" href="#">Logout</a>
            </li>
          </ul>
          <!-- End Submenu -->
          <?php
        } else {
          ?>
          <li class="nav-item g-mx-20--lg g-mb-5 g-mb-0--lg <?php $userActive ?>">
            <a href="user.php?page=login" class="nav-link">Log In</a>
          </li>
          <?php
          }
          ?>
        </ul>
        </div>
      </div>
    </nav>
    <div class="alert alert-dismissible fade show g-bg-red g-color-white rounded-0 <?php if (empty($msg)) { echo "g-hide"; } ?>" role="alert">
      <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <div class="media">
        <span class="d-flex g-mr-10 g-mt-5">
          <i class="icon-ban g-font-size-25"></i>
        </span>
        <span class="media-body align-self-center">
          <?php if (!empty($msg)) { echo $msg; } ?>
        </span>
      </div>
    </div>
  </div>
</header>
<script src="assets/js/helpers/hs.navigation-splitted.js"></script>
<script>
	$(document).on('ready', function () {
		$.HSCore.helpers.HSNavigationSplitted.init($('.navbar-collapse'));
	});
	$(window).on('load', function () {
		$.HSCore.components.HSHeader.init($('#js-header'));
		$.HSCore.helpers.HSHamburgers.init('.hamburger');
  });
</script>
