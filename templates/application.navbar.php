
<?php
  include_once 'library/class.database.php';
  $db = new database;

  $app_counts = $db -> sql_select("SELECT status, count(*) as count FROM stormguild.application WHERE create_datetime BETWEEN date_sub(now(), INTERVAL 3 MONTH) AND now() GROUP BY status");
  foreach ($app_counts as $app_count) {
    $tmp_name = $app_count['status'].'_cnt';
    $$tmp_name = $app_count['count'];
  }

  $actOpen = $actAccept = $actDecline = array('collapsed','collapse');
  if(!empty($_GET['status'])) {
    switch ($_GET['status']) {
      case 'open':
        $actOpen = array('','');
        break;
      case 'accepted':
        $actAccept = array('','');
        break;
      case 'declined':
        $actDecline = array('','');
        break;
    }
  }

?>
<ul class="nav flex-column u-nav-v3-1" role="tablist" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-lightgray" aria-multiselectable="false">

    <li class="nav-item">
        <a class="nav-link text-center" href="#">
            <strong>Storm Applications</strong>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="fa fa-home u-tab-line-icon-pro g-mr-3"></i>
            Go Back Home
        </a>
    </li>
    <div id="app-accordion">
      <!-- Open -->
      <li class="nav-item">
          <a class="nav-link <?php echo $actOpen[0] ?> g-color-blue" href="#open-body" data-toggle="collapse" data-parent="#app-accordion" aria-expanded="true" aria-controls="open-body">
              <span class="d-inline-block">
                <i class="fa fa-circle-o-notch u-tab-line-icon-pro g-mr-3"></i>
                <span class="float-right u-label u-label-num u-label--sm u-label-default g-color-white g-rounded-15 g-ml-15"><?php echo $open_cnt ?></span>
                Open
              </span>
              <span class="u-accordion__control-icon d-inline-block g-pos-abs g-right-20">
                  <i class="fa fa-plus"></i>
                  <i class="fa fa-minus"></i>
              </span>
          </a>
      </li>
      <div id="open-body" class="<?php echo $actOpen[1] ?> g-ml-20" role="tabpanel">
        <?php
          $open_sql = "SELECT * FROM stormguild.application WHERE status = 'open' AND create_datetime BETWEEN date_sub(now(), INTERVAL 3 MONTH) AND now()";
          $open_apps = $db -> sql_select($open_sql);
          foreach ($open_apps as $open_app) {
            if (!empty($_GET['appid']) && $_GET['appid'] == $open_app['application_id']) {
              $is_active = 'active';
            } else {
              $is_active = '';
            }
            $open_char = $open_app['charName'].' - '.$open_app['charSpec'].' '.$open_app['charClass'];
            $open_link = 'application.php?appid='.$open_app['application_id'].'&status='.$open_app['status'];
            ?>
            <li class="nav-item">
              <a href="<?php echo $open_link ?>" class="nav-link <?php echo $is_active ?>"><?php echo $open_char ?></a>
            </li>
        <?php } ?>
      </div>
      <!-- End Open -->

      <!-- Accepted -->
      <li class="nav-item">
          <a class="nav-link <?php echo $actAccept[0] ?> g-color-primary" href="#accepted-body" data-toggle="collapse" data-parent="#app-accordion" aria-expanded="false" aria-controls="accepted-body">
              <span class="d-inline-block">
                <i class="fa fa-circle-o-notch u-tab-line-icon-pro g-mr-3"></i>
                <span class="float-right u-label u-label-num u-label--sm u-label-default g-color-white g-rounded-15 g-ml-15"><?php echo $accepted_cnt ?></span>
                Accepted
              </span>
              <span class="u-accordion__control-icon d-inline-block g-pos-abs g-right-20">
                  <i class="fa fa-plus"></i>
                  <i class="fa fa-minus"></i>
              </span>
          </a>
      </li>
      <div id="accepted-body" class="<?php echo $actAccept[1] ?> g-ml-20" role="tabpanel">
        <?php
          $open_sql = "SELECT * FROM stormguild.application WHERE status = 'accepted' AND create_datetime BETWEEN date_sub(now(), INTERVAL 3 MONTH) AND now()";
          $open_apps = $db -> sql_select($open_sql);
          foreach ($open_apps as $open_app) {
            if (!empty($_GET['appid']) && $_GET['appid'] == $open_app['application_id']) {
              $is_active = 'active';
            } else {
              $is_active = '';
            }
            $open_char = $open_app['charName'].' - '.$open_app['charSpec'].' '.$open_app['charClass'];
            $open_link = 'application.php?appid='.$open_app['application_id'].'&status='.$open_app['status'];
            ?>
            <li class="nav-item">
              <a href="<?php echo $open_link ?>" class="nav-link <?php echo $is_active ?>"><?php echo $open_char ?></a>
            </li>
        <?php } ?>
      </div>
      <!-- End Accepted -->

      <!-- Accepted -->
      <li class="nav-item">
          <a class="nav-link <?php echo $actDecline[0] ?> g-color-red" href="#declined-body" data-toggle="collapse" data-parent="#app-accordion" aria-expanded="false" aria-controls="declined-body">
              <span class="d-inline-block">
                <i class="fa fa-circle-o-notch u-tab-line-icon-pro g-mr-3"></i>
                <span class="float-right u-label u-label-num u-label--sm u-label-default g-color-white g-rounded-15 g-ml-15"><?php echo $declined_cnt ?></span>
                Declined
              </span>
              <span class="u-accordion__control-icon d-inline-block g-pos-abs g-right-20">
                  <i class="fa fa-plus"></i>
                  <i class="fa fa-minus"></i>
              </span>
          </a>
      </li>
      <div id="declined-body" class="<?php echo $actDecline[1] ?> g-ml-20" role="tabpanel">
        <?php
          $decline_sql = "SELECT * FROM stormguild.application WHERE status = 'declined' AND create_datetime BETWEEN date_sub(now(), INTERVAL 3 MONTH) AND now()";
          $decline_apps = $db -> sql_select($decline_sql);
          foreach ($decline_apps as $decline_app) {
            if (!empty($_GET['appid']) && $_GET['appid'] == $decline_app['application_id']) {
              $is_active = 'active';
            } else {
              $is_active = '';
            }
            $decline_char = $decline_app['charName'].' - '.$decline_app['charSpec'].' '.$decline_app['charClass'];
            $decline_link = 'application.php?appid='.$decline_app['application_id'].'&status='.$decline_app['status'];
            ?>
            <li class="nav-item">
              <a href="<?php echo $decline_link ?>" class="nav-link <?php echo $is_active ?>"><?php echo $decline_char ?></a>
            </li>
        <?php } ?>
      </div>
      <!-- End Accepted -->
    </div>
</ul>
