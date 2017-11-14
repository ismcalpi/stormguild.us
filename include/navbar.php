<?php

  include 'db.php';

  ob_start();
  session_start();

  if(!empty($_COOKIE['username']) && !empty($_COOKIE['user_rank'])) {
    $_SESSION['valid'] = true;
    $_SESSION['timeout'] = time();
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['user_rank'] = $_COOKIE['user_rank'];
  }

?>

<!-- Header -->
<header id="js-header" class="u-header u-header--sticky-top u-header--toggle-section u-header--change-appearance g-mb-50" data-header-fix-moment="300" data-header-fix-effect="slide">
    <div class="u-header__section u-header__section--light bg-white-0-90 g-transition-0_3 g-py-0 g-mb-50" data-header-fix-moment-exclude="g-py-0" data-header-fix-moment-classes="u-shadow-v18 g-py-0">
        <nav class="js-mega-menu navbar navbar-expand-lg">
            <div class="container">
                <!-- Responsive Toggle Button -->
                <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                    <span class="hamburger hamburger--slider">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </span>
                </button>
                <!-- End Responsive Toggle Button -->

                <!-- Navigation -->
                <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 " id="navBar">
                    <ul class="navbar-nav align-items-lg-center mx-auto text-uppercase g-font-weight-600 u-main-nav-v5">
                        <li class="nav-item g-mx-20--lg g-mb-5 g-mb-0--lg
                                   <?php if ($_SERVER['REQUEST_URI'] == '/stormguild/streams.php') {
    echo 'active';
} ?>">
                            <span></span><a href="streams.php" class="nav-link"><span class="u-icon-v1 u-icon-size--xs"><img src="img/icon/twitch.png" alt="Discord"></span>  Twitch</a>
                        </li>
                        <li class="nav-item g-mx-20--lg g-mb-5 g-mb-0--lg">
                            <a target="_blank" href="https://www.warcraftlogs.com/guilds/145258" class="nav-link"><span class="u-icon-v1 u-icon-size--xs"><img src="img/icon/logs.png" alt="Discord"></span>  Logs</a>
                        </li>
                        <li class="nav-item g-mx-20--lg g-mb-5 g-mb-0--lg">
                            <a target="_blank" href="https://discord.gg/SA5WsZs" class="nav-link"><span class="u-icon-v1 u-icon-size--xs"><img src="img/icon/discord.png" alt="Discord"></span>  Discord</a>
                        </li>
                        <!-- Logo -->
                        <li class="nav-logo-item g-mx-20--lg">
                            <a href="index.php" class="navbar-brand mr-0">
                                <img class="u-block-hover__img u-block-hover__main--blur" style="max-height:40px;" src="img/logo/storm_logo.png" title="Home">
                            </a>
                        </li>
                        <!-- End Logo -->
                        <li class="nav-item g-mx-20--lg g-mb-5 g-mb-0--lg
                                   <?php if ($_SERVER['REQUEST_URI'] == '/stormguild/aboutus.php') {
    echo 'active';
} ?>">
                            <a href="./aboutus.php" class="nav-link">About Us</a>
                        </li>
                        <li class="nav-item g-mx-20--lg g-mb-5 g-mb-0--lg
                                   <?php if ($_SERVER['REQUEST_URI'] == '/stormguild/recruitment.php') {
    echo 'active';
} ?> ">
                            <a href="recruitment.php" class="nav-link">Recruitment</a>
                        </li>
                        <!-- Mega Menu Item -->
                        <li class="hs-has-mega-menu nav-item g-mx-20--lg" data-animation-in="fadeIn" data-animation-out="fadeOut" data-position="right" <?php IF(!empty($_SESSION['valid']) || $_SESSION['valid'] == true){echo 'style="display:none"';} ?>>
                            <a id="mega-menu-label-1" class="nav-link g-px-0" href="#" aria-haspopup="true" aria-expanded="false">Login
                                <i class="hs-icon hs-icon-arrow-bottom g-font-size-11 g-ml-7"></i>
                            </a>

                            <!-- Mega Menu -->
                            <div class="w-75 hs-mega-menu u-shadow-v11 g-text-transform-none g-font-weight-400 g-brd-top g-brd-blue g-brd-top-2 g-mt-7--lg--scrolling" aria-labelledby="mega-menu-label-1">
                                <form class="g-pa-30" role="form" method="post" action="login.php">
                                    <div class="g-max-width-780 mx-auto">
                                        <div class="row">
                                            <div class="col-lg-5 g-mb-20 g-mb-0--lg">
                                                <input class="form-control form-control-lg g-font-size-default g-bg-gray-light-v5 g-bg-gray-light-v5--focus g-brd-gray-light-v5 g-rounded-30 g-px-15 g-py-13" type="text" placeholder="EMail or Username" name="username">
                                            </div>

                                            <div class="col-lg-5 g-mb-20 g-mb-0--lg">
                                                <input class="form-control form-control-lg g-font-size-default g-bg-gray-light-v5 g-bg-gray-light-v5--focus g-brd-gray-light-v5 g-rounded-30 g-px-15 g-py-13" type="password" placeholder="Password" name="password">

                                            </div>
                                            <div class="col-lg-2 text-md-right text-lg-left">
                                                <button class="btn u-btn-blue text-uppercase g-rounded-30 g-px-25 g-py-13" type="submit">Log In</button>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5 g-mb-20 g-mb-0--lg">
                                                <label class="custom-control custom-checkbox mr-sm-3 g-ml-10 mb-3 mb-sm-0">
                                                    <input type="checkbox" name="remember" class="custom-control-input" value="yes">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Remember Me</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-5 g-mb-20 g-mb-0--lg">
                                                <small class="d-block g-px-15 g-py-5">
                                                    <a class="g-color-main" href="signup.php">Create a new account</a>
                                                </small>
                                            </div>
                                        </div>

                                    </div>

                                </form>

                            </div>

                            <!-- End Mega Menu -->

                        </li>

                        <li class="nav-item hs-has-sub-menu g-mx-20--lg" <?php IF (empty($_SESSION['valid']) || $_SESSION['valid'] == false){echo 'style="display: none "';} ?> >
                            <a href="#" class="nav-link g-px-0 g-color-blue" id="nav-link-1" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu-1"><?php IF(!empty($_SESSION['username'])){echo $_SESSION['username'];} ?>
                                <i class="hs-icon hs-icon-arrow-bottom g-font-size-11 g-ml-7"></i>
                            </a>
                            <!-- Submenu -->
                            <ul class="hs-sub-menu list-unstyled g-text-transform-none g-brd-top g-brd-blue g-brd-top-2 g-min-width-200 g-mt-20 g-mt-10--lg--scrolling" id="nav-submenu-1" aria-labelledby="nav-link-1">

                                <?php
                                if (!empty($_SESSION['user_rank']) && $_SESSION['user_rank'] == 'admin') {
                                ?>
                                    <li class="dropdown-item">
                                      <a class="nav-link" href="admin.php">Admin</a>
                                    </li>
                                <?php
                                }
                                ?>
                                <li class="dropdown-item">
                                    <a class="nav-link" href="application.php">Applications</a>
                                </li>
                                <li class="dropdown-item">
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </li>
                            </ul>
                            <!-- End Submenu -->
                        </li>

                        <!-- End Mega Menu Item -->
                    </ul>

                </div>
                <!-- End Navigation -->
            </div>
        </nav>
        <!-- Warn -->
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
        <!-- End Warn -->
    </div>

</header>
<!-- End Header -->
