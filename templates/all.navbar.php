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
          <li class="nav-item hs-has-sub-menu g-mx-20--lg">
            <a href="#" class="nav-link g-px-0" id="nav-link-1" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu-1">Pages

        </a>
            <!-- Submenu -->
            <ul class="hs-sub-menu list-unstyled g-text-transform-none g-brd-top g-brd-primary g-brd-top-2 g-min-width-200 g-mt-20 g-mt-10--lg--scrolling" id="nav-submenu-1" aria-labelledby="nav-link-1">
              <li class="dropdown-item">
                <a class="nav-link g-px-0" href="#">Page 1</a>
              </li>
              <li class="dropdown-item hs-has-sub-menu active">
                <a id="nav-link-2" class="nav-link g-px-0" href="#" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu-2">Page 2
            </a>
                <!-- Submenu (level 2) -->
                <ul class="hs-sub-menu list-unstyled g-brd-top g-brd-primary g-brd-top-2 g-min-width-200 g-my-2" id="nav-submenu-2" aria-labelledby="nav-link-2">
                  <li class="dropdown-item active">
                    <a class="nav-link g-px-0" href="#">Page 2-1</a>
                  </li>
                  <li class="dropdown-item">
                    <a class="nav-link g-px-0" href="#">Page 2-2</a>
                  </li>
                  <li class="dropdown-item">
                    <a class="nav-link g-px-0" href="#">Page 2-3</a>
                  </li>
                  <li class="dropdown-item">
                    <a class="nav-link g-px-0" href="#">Page 2-4</a>
                  </li>
                  <li class="dropdown-item">
                    <a class="nav-link g-px-0" href="#">Page 2-5</a>
                  </li>
                </ul>
                <!-- End Submenu (level 2) -->
              </li>
              <li class="dropdown-item">
                <a class="nav-link g-px-0" href="#">Page 3</a>
              </li>
              <li class="dropdown-item">
                <a class="nav-link g-px-0" href="#">Page 4</a>
              </li>
              <li class="dropdown-item">
                <a class="nav-link g-px-0" href="#">Page 5</a>
              </li>
              <li class="dropdown-item">
                <a class="nav-link g-px-0" href="#">Page 6</a>
              </li>
              <li class="dropdown-item">
                <a class="nav-link g-px-0" href="#">Page 7</a>
              </li>
            </ul>
            <!-- End Submenu -->
          </li>
          <?php
            if($phpbb_username != 'Anonymous' && ISSET($phpbb_username)) {
          ?>
          <li class="nav-item hs-has-sub-menu g-mx-20--lg g-mb-5 g-mb-0--lg" data-event="click">
            <a href="#" class="nav-link g-color-blue" id="nav-link-1" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu-1"><?php echo $phpbb_username; ?></a>
            <!-- Submenu -->
            <ul class="hs-sub-menu list-unstyled g-text-transform-none g-brd-top g-brd-blue g-brd-top-2 g-min-width-200 g-mt-20 g-mt-10--lg--scrolling" id="nav-submenu-1" aria-labelledby="nav-link-1">
              <li class="dropdown-item">
                <a class="nav-link g-px-0" href="#">Logout</a>
              </li>
              <li class="dropdown-item">
                <a class="nav-link g-px-0" href="#">Logout</a>
              </li>
              <li class="dropdown-item">
                <a class="nav-link g-px-0" href="#">Logout</a>
              </li>
            </ul>
            <!-- End Submenu -->
          </li>
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
  </div>
</header>
