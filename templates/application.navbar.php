
<?php
  $app_counts = $db -> sql_select("SELECT status, count(*) as count FROM stormguild.application WHERE create_datetime BETWEEN date_sub(now(), INTERVAL 3 MONTH) AND now() GROUP BY status");
  foreach ($app_counts as $app_count) {
    $tmp_name = $app_count['status'].'_cnt';
    $$tmp_name = $app_count['count'];
  }

  $actOpen = $actAccept = $actDecline = $actArchived = array('collapsed','collapse');
  switch ($status) {
    case 'open':
      $actOpen = array('','collapse show');
      break;
    case 'accepted':
      $actAccept = array('','collapse show');
      break;
    case 'declined':
      $actDecline = array('','collapse show');
      break;
    case 'archived':
      $actArchived = array('','collapse show');
      break;
  }
?>
<ul class="nav flex-column u-nav-v3">

    <li class="nav-item">
        <a class="nav-link text-center" href="#">
            <strong>Storm Applications</strong><br />
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
          $open_sql = "SELECT *, date_format(create_datetime,'%M %d %Y') as submit_date FROM stormguild.application WHERE status = 'open' order by create_datetime desc";
          $open_apps = $db -> sql_select($open_sql);
          foreach ($open_apps as $open_app) {
            if ($appid == $open_app['application_id']) {
              $is_active = 'active';
            } else {
              $is_active = '';
            }
            $open_char = '<strong>'.$open_app['charName'].'</strong><br /><i>'.$open_app['charSpec'].' '.$open_app['charClass'].'</i><br />'.$open_app['submit_date'];
            $open_link = 'application.php?appid='.$open_app['application_id'];
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
          $accept_sql = "SELECT *, date_format(create_datetime,'%M %d %Y') as submit_date FROM stormguild.application WHERE status = 'accepted' AND create_datetime BETWEEN date_sub(now(), INTERVAL 3 MONTH) AND now() order by create_datetime desc";
          $accept_apps = $db -> sql_select($accept_sql);
          foreach ($accept_apps as $accept_app) {
            if ($appid == $accept_app['application_id']) {
              $is_active = 'active';
            } else {
              $is_active = '';
            }
            $accept_char = '<strong>'.$accept_app['charName'].'</strong><br /><i>'.$accept_app['charSpec'].' '.$accept_app['charClass'].'</i><br />'.$accept_app['submit_date'];
            $accept_link = 'application.php?appid='.$accept_app['application_id'];
            ?>
            <li class="nav-item">
              <a href="<?php echo $accept_link ?>" class="nav-link <?php echo $is_active ?>"><?php echo $accept_char ?></a>
            </li>
        <?php } ?>
      </div>
      <!-- End Accepted -->

      <!-- Declined -->
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
          $decline_sql = "SELECT *, date_format(create_datetime,'%M %d %Y') as submit_date FROM stormguild.application WHERE status = 'declined' AND create_datetime BETWEEN date_sub(now(), INTERVAL 3 MONTH) AND now() order by create_datetime desc";
          $decline_apps = $db -> sql_select($decline_sql);
          foreach ($decline_apps as $decline_app) {
            if ($appid == $decline_app['application_id']) {
              $is_active = 'active';
            } else {
              $is_active = '';
            }
            $decline_char = '<strong>'.$decline_app['charName'].'</strong><br /><i>'.$decline_app['charSpec'].' '.$decline_app['charClass'].'</i><br />'.$decline_app['submit_date'];
            $decline_link = 'application.php?appid='.$decline_app['application_id'];
            ?>
            <li class="nav-item">
              <a href="<?php echo $decline_link ?>" class="nav-link <?php echo $is_active ?>"><?php echo $decline_char ?></a>
            </li>
        <?php } ?>
      </div>
      <!-- End Declined -->

      <!-- Archived -->
      <!-- <li class="nav-item">
          <a class="nav-link <?php echo $actArchived[0] ?> g-color-cyan" href="#archived-body" data-toggle="collapse" data-parent="#app-accordion" aria-expanded="false" aria-controls="archived-body">
              <span class="d-inline-block">
                <i class="fa fa-circle-o-notch u-tab-line-icon-pro g-mr-3"></i>
                <span class="float-right u-label u-label-num u-label--sm u-label-default g-color-white g-rounded-15 g-ml-15"></span>
                Archived
              </span>
              <span class="u-accordion__control-icon d-inline-block g-pos-abs g-right-20">
                  <i class="fa fa-plus"></i>
                  <i class="fa fa-minus"></i>
              </span>
          </a>
      </li>
      <div id="archived-body" class="<?php echo $actArchived[1] ?> g-ml-20" role="tabpanel">
        <?php
          $archived_sql = "SELECT *, date_format(create_datetime,'%M %d %Y') as submit_date FROM stormguild.application WHERE status in ('accepted','declined') AND create_datetime < date_sub(now(), INTERVAL 3 MONTH) order by create_datetime desc";
          $archived_apps = $db -> sql_select($archived_sql);
          foreach ($archived_apps as $archived_app) {
            if ($appid == $archived_app['application_id']) {
              $is_active = 'active';
            } else {
              $is_active = '';
            }
            $archived_char = '<strong>'.$archived_app['charName'].'<span class="g-color-cyan"> ('.$archived_app['status'].')</span></strong><br /><i>'.$archived_app['charSpec'].' '.$archived_app['charClass'].'</i><br />'.$archived_app['submit_date'];
            $archived_link = 'application.php?appid='.$archived_app['application_id'];
            ?>
            <li class="nav-item">
              <a href="<?php echo $archived_link ?>" class="nav-link <?php echo $is_active ?>"><?php echo $archived_char ?></a>
            </li>
        <?php } ?>
      </div> -->
      <!-- End Declined -->


    </div>
</ul>
