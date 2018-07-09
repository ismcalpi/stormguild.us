<!DOCTYPE html>
<html lang="en">
  <?php include 'templates/all.user.php' ?>
  <?php include 'templates/home.head.php' ?>
  <body class="main-body">
    <main>
      <?php include 'templates/all.navbar.php' ?>
      <div class="container g-bg-white g-brd-around g-brd-white g-brd-2 g-mt-80 g-pa-30" style="min-height:100vh;">
        <div class="u-heading-v3-1 text-center g-mb-15">
          <h2 class="text-uppercase h4 u-heading-v3__title g-brd-blue">Guild Roster V2.0 Testing</h2>
        </div>
        <div class="row">
          <?php

            include_once 'library/class.roster.php';
            $roster = new Roster();

            $classList = $roster -> get_classList();
            foreach ($classList as $class) {
          ?>
          <div class="col">
            <div class="row">
              <div class="col-12">
                <h3 style="color:<?php echo $class[1]; ?>;"><img style="margin-right:10px;" src="<?php echo $class[2]; ?>"><?php echo $class[0]; ?></h3>
              </div>
              <?php
              $results = $roster -> get_classResult($class);
              foreach ($results as $result) {
                $rank_name = $roster -> get_guildRank($result['rank']);
              ?>
              <div class='col-lg-3 col-md-4 col-6 g-mb-30'>
                <figure class="u-block-hover u-shadow-v19 g-bg-white g-rounded-4 g-pa-5 g-brd-black g-brd-1 g-brd-around">
                  <div class="d-flex justify-content-start">
                    <img class="g-width-60 g-height-60 rounded-circle" src="http://render-us.worldofwarcraft.com/character/<?php echo $result['thumbnail']; ?>">
                    <img class="g-width-20 g-height-20 rounded-circle g-mr-10" src="https://wow.zamimg.com/images/wow/icons/large/<?php echo $result['spec_icon'] ?>.jpg">
                    <!-- Figure Info -->
                    <div class="d-block">
                      <div class="g-mb-5 g-mt-5">
                        <h4 class="h5 g-mb-0"><?php echo $result['name']; ?></h4>
                        <em class="d-block g-color-primary g-font-style-normal g-font-size-default"><?php echo $rank_name ?></em>
                      </div>
                    </div>
                    <!-- End Figure Info -->

                    <!-- Figure Caption -->
                    <figcaption style="background-color:rgba(0,0,0,.5)" class="u-block-hover__additional--fade g-pa-30">
                      <div class="u-block-hover__additional--fade u-block-hover__additional--fade-down g-flex-middle">
                        <!-- Figure Social Icons -->
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
                        <!-- End Figure Social Icons -->
                      </div>
                    </figcaption>
                    <!-- End Figure Caption -->

                  </div>
                </figure>
              </div>
              <?php
              }
              ?>
            </div>
          </div>
          <?php
            }
          ?>
        </div>
      </div>
    </main>
  </body>
  <?php include 'templates/home.js.php' ?>
</html>
