<?php
  $twitchActive = $aboutActive = $homeActive = $recruitActive = $userActive = '';
  switch($_SERVER['REQUEST_URI']) {
    case 'twitch.php':
      $twitchActive = 'active';
      break;
    case 'about.php':
      $aboutActive = 'active';
      break;
      case 'sales.php':
        $salesActive = 'active';
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
  class="u-header u-header--sticky-top u-header--toggle-section u-header--change-appearance"
  data-header-fix-moment="300"
  data-header-fix-effect="slide">
  <div
    class="u-header__section u-header__section--light bg-white-0-90 g-transition-0_3 g-py-0"
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
              <a target="_blank" href="https://www.warcraftlogs.com/guild/us/stormrage/storm" class="nav-link">
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
            <li class="nav-item dropdown g-mx-20--lg">
              <a href="#" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu-1" data-toggle="dropdown">Guild Info</a>
              <!-- Submenu -->
              <ul class="dropdown-menu rounded-0 g-text-transform-none g-brd-none g-brd-top g-brd-bottom g-brd-bottom-2 g-brd-blue g-brd-top-2 g-mt-0 g-mt-10--lg--scrolling" aria-labelledby="nav-link-1">
                <li class="dropdown-item">
                  <a class="nav-link g-px-0" href="aboutus.php">About Us</a>
                </li>
                <li class="dropdown-item">
                  <a class="nav-link g-px-0" href="guildroster.php">Guild Roster</a>
                </li>
                <li class="dropdown-item">
                  <a class="nav-link g-px-0" href="sales.php">Sales</a>
                </li>
              </ul>
            </li>
            <!-- <li class="nav-item g-mx-20--lg g-mb-5 g-mb-0--lg <?php $aboutActive ?>">
              <a href="./about.php" class="nav-link">About Us</a>
            </li> -->
            <!-- <li class="nav-item g-mx-20--lg g-mb-5 g-mb-0--lg <?php $salesActive ?>">
              <a href="./sales.php" class="nav-link">Sales</a>
            </li> -->
            <li class="nav-item g-mx-20--lg g-mb-5 g-mb-0--lg <?php $recruitActive ?>">
              <a href="recruit.php" class="nav-link">Recruitment</a>
            </li>
            <?php
              if($user_rank >= 1) {
            ?>
            <li class="nav-item dropdown g-mx-20--lg">
              <a href="#" class="nav-link dropdown-toggle g-color-blue" id="nav-link-1" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu-1" data-toggle="dropdown"><?php echo $phpbb_username; ?></a>
              <!-- Submenu -->
              <ul class="dropdown-menu rounded-0 g-text-transform-none g-brd-none g-brd-top g-brd-bottom g-brd-bottom-2 g-brd-blue g-brd-top-2 g-mt-0 g-mt-10--lg--scrolling" id="nav-submenu-1" aria-labelledby="nav-link-1">
                <?php
                  if($user_rank >= 3) {
                ?>
                <li class="dropdown-item">
                  <a class="nav-link g-px-0" target="_blank" href="admin.php?mode=instruction">Admin Console</a>
                </li>
                <li class="dropdown-item">
                  <a class="nav-link g-px-0" target="_blank" href="/blog/wp-admin">Blog Admin</a>
                </li>
                <?php
                }
                  if($user_rank >= 2) {
                ?>
                <li class="dropdown-item">
                  <a class="nav-link g-px-0" target="_blank" href="application.php?source=navbar">Applications</a>
                </li>
                <?php
                }
                ?>
                <li class="dropdown-item">
                  <a class="nav-link g-px-0" target="_blank" href="forums/">Forums</a>
                </li>
                <li class="dropdown-item">
                  <a class="nav-link g-px-0" href="user.php?page=logout">Logout</a>
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
