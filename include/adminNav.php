
<!-- Nav tabs -->

<?php
    
    ob_start();
    session_start();

    if (EMPTY($_SESSION['user_rank'])) {
        #You shouldn't be seeing this page then!
        header('Refresh: 1; URL = index.php');
        echo "access denied";
        exit();
    } else if ($_SESSION['user_rank'] != 'admin') {
        #You shouldn't be seeing this page then!
        header('Refresh: 1; URL = index.php');
        echo "access denied";
        exit();
    }

?>

<ul class="nav flex-column u-nav-v3-1" role="tablist" data-target="nav-3-1-default-ver-default-icons" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-lightgray">
    <li class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="fa fa-home u-tab-line-icon-pro g-mr-3"></i>
            Go Back Home
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == '/stormguild.us/adminProgression.php') {
                                echo 'active'; 
                            } ?>" href="adminProgression.php">
            <i class="fa fa-flask u-tab-line-icon-pro g-mr-3"></i>
            Raid Progression
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == '/stormguild.us/adminRecruit.php') {
                                echo 'active'; 
                            } ?>" href="adminRecruit.php">
            <i class="fa fa-exclamation u-tab-line-icon-pro g-mr-3"></i>
            Recruitment Needs
        </a>
    </li>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if ($_SERVER['REQUEST_URI'] == '/stormguild.us/adminKillshots.php') {
                                echo 'active'; 
                            } ?>" href="adminKillshots.php">
            <i class="fa fa-file-photo-o u-tab-line-icon-pro g-mr-3"></i>
            Guild Killshots
        </a>
    </li>
</ul>
<!-- End Nav tabs -->