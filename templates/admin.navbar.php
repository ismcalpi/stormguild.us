<ul class="nav flex-column u-nav-v3-1" role="tablist" data-target="nav-3-1-default-ver-default-icons" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-lightgray">
    <li class="nav-item">
        <a class="nav-link text-center" href="#">
            <strong>Admin Console</strong>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="fa fa-home u-tab-line-icon-pro g-mr-3"></i>
            Go Back Home
        </a>
    </li>
    <?php
      if($user_rank >= 3) {
    ?>
    <li class="nav-item">
        <a class="nav-link" href="admin.php?mode=recruitneeds">
            <i class="fa fa-exclamation u-tab-line-icon-pro g-mr-3"></i>
            Recruitment Needs
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="admin.php?mode=progression">
            <i class="fa fa-flask u-tab-line-icon-pro g-mr-3"></i>
            Raid Progression
        </a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="admin.php?mode=guildnews">
            <i class="fa fa-file-photo-o u-tab-line-icon-pro g-mr-3"></i>
            Guild News
        </a>
    </li> -->
    <?php
    }
    ?>
    <!-- End Admin Required Links -->
</ul>
