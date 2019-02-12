<!DOCTYPE html>
<html lang="en">
  <?php include 'templates/all.user.php' ?>
  <?php include 'templates/home.head.php' ?>
  <body class="main-body">
    <main>
      <?php include 'templates/all.navbar.php' ?>
      <div class="container g-bg-white g-brd-around g-brd-white g-brd-2 g-mt-80 g-pa-30" style="min-height:100vh;">
        <div class="u-heading-v3-1 text-center g-mb-15">
          <h2 class="text-uppercase h4 u-heading-v3__title g-brd-blue">Guild Roster</h2>
        </div>
          <?php
            include_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/class/roster.php';
            $roster = new Roster();

            $classList = $roster -> get_classList();
            foreach ($classList as $class) {
                $class_count = $class[5];
          ?>
            <div class="row g-mx-20">
              <div class="col-1">
                <img class="g-width-80 g-height-80" src="<?php echo $class[2]; ?>">
              </div>
              <div class="col-11">
                  <div class="row">
                      <?php
                      $results = $roster -> get_classResult($class);
                      foreach ($results as $result) {
                          $rank_name = $roster -> get_guildRank($result['rank']);
                          ?>
                          <div class='col-lg-3 col-md-6 col-12 g-mb-30'>
                              <figure class="u-block-hover u-shadow-v2 g-bg-white g-rounded-4 g-pa-5">
                                  <div class="d-flex justify-content-start">
                                      <img class="g-width-70 g-height-70 rounded-circle" src="http://render-us.worldofwarcraft.com/character/<?php echo $result['thumbnail']; ?>">
                                      <img class="g-width-20 g-height-20 rounded-circle g-mr-10" src="https://wow.zamimg.com/images/wow/icons/large/<?php echo $result['spec_icon'] ?>.jpg">
                                      <div class="d-block">
                                          <div class="g-mb-5 g-mt-5">
                                              <h4 class="h5 g-mb-0"><?php echo $result['name']; ?></h4>
                                              <!--<em class="d-block g-color-primary g-font-style-normal g-font-size-default"><?php echo $rank_name ?></em>-->
                                          </div>
                                      </div>
                                      <figcaption style="background-color:rgba(0,0,0,.5)" class="u-block-hover__additional--fade g-pa-30">
                                          <div class="u-block-hover__additional--fade u-block-hover__additional--fade-down g-flex-middle">
                                              <ul class="list-inline text-center g-flex-middle-item">
                                                  <li class="list-inline-item align-middle g-mx-7 g-color-white">
                                                      <a target="_blank" alt="WoW Armory" href="https://worldofwarcraft.com/en-us/character/stormrage/<?php echo urlencode($result['name']); ?>" class="g-color-white">
                                                          <span class="u-icon-v1 u-icon-size--xs g-mr-5">
                                                            <img width="30" height="30" src="assets/img/logo.armory.png">
                                                          </span>
                                                          <!-- Armory -->
                                                      </a>
                                                  </li>
                                                  <li class="list-inline-item align-middle g-mx-7 g-color-white">
                                                      <a target="_blank" alt="Warcraft Logs" href="https://www.warcraftlogs.com/character/us/stormrage/<?php echo urlencode($result['name']); ?>" class="g-color-white">
                                                          <span class="u-icon-v1 u-icon-size--xs g-mr-5">
                                                            <img width="30" height="30" src="assets/img/logo.warlogs.png">
                                                          </span>
                                                          <!-- Logs -->
                                                      </a>
                                                  </li>
                                                  <li class="list-inline-item align-middle g-mx-7">
                                                      <a target="_blank" alt="Raider.IO" href="https://raider.io/characters/us/stormrage/<?php echo urlencode($result['name']); ?>" class="g-color-white">
                                                          <span class="u-icon-v1 u-icon-size--xs g-mr-5">
                                                            <img width="30" height="30" src="assets/img/logo.raiderio.png">
                                                          </span>
                                                          <!-- Raider.IO -->
                                                      </a>
                                                  </li>
                                              </ul>
                                          </div>
                                      </figcaption>
                                  </div>
                              </figure>
                          </div>
                          <?php
                      }
                      ?>

                  </div>

              </div>

            </div>
          <?php
            }
          ?>
        </div>
        <?php include 'templates/all.footer.php' ?>
    </main>
  </body>
  <?php include 'templates/home.js.php' ?>
</html>
