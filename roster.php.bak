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
        <div class="row">
          <?php

            include_once 'library/class.database.php';
            $db = new Database();
            $sql = "SELECT * FROM stormguild.guild_roster WHERE rank in (0,2,4,6) order by rank asc, name asc";
            $results = $db -> read_select($sql);
            foreach ($results as $result) {

              switch ($result['class']) {
                case 1:
                  $class_name = 'Warrior';
                  break;
                case 2:
                  $class_name = 'Paladin';
                  break;
                case 3:
                  $class_name = 'Hunter';
                  break;
                case 4:
                  $class_name = 'Rogue';
                  break;
                case 5:
                  $class_name = 'Priest';
                  break;
                case 6:
                  $class_name = 'Death Knight';
                  break;
                case 7:
                  $class_name = 'Shaman';
                  break;
                case 8:
                  $class_name = 'Mage';
                  break;
                case 9:
                  $class_name = 'Warlock';
                  break;
                case 10:
                  $class_name = 'Monk';
                  break;
                case 11:
                  $class_name = 'Druid';
                  break;
                case 12:
                  $class_name = 'Demon Hunter';
                  break;
                default:
                  $class_name = 'Time Mage';
                  break;
              }

              switch ($result['rank']) {
                case 0:
                  $rank_name = 'Guild Master';
                  break;
                case 2:
                  $rank_name = 'Officer';
                  break;
                case 4:
                  $rank_name = 'Veteran Raider';
                  break;
                case 6:
                  $rank_name = 'Raider';
                  break;
              }

          ?>
          <div class='col-lg-4 col-md-6 col-12 g-mb-30'>
            <figure class="u-block-hover u-shadow-v19 g-bg-white g-rounded-4 g-pa-15 g-brd-black g-brd-2 g-brd-around">
              <div class="d-flex justify-content-start">
                <img class="g-width-80 g-height-80 rounded-circle g-mr-15" src="http://render-us.worldofwarcraft.com/character/<?php echo $result['thumbnail']; ?>">

                <!-- Figure Info -->
                <div class="d-block">
                  <div class="g-mb-5">
                    <h4 class="h5 g-mb-0"><?php echo $result['name']; ?></h4>
                    <em class="d-block g-color-primary g-font-style-normal g-font-size-default"><?php echo $rank_name ?></em>
                  </div>
                  <em class="d-block g-color-black g-font-style-normal g-font-size-13 g-mb-2">
                    <img width="20" height="20" class="img-fluid g-mr-10" src="https://wow.zamimg.com/images/wow/icons/large/<?php echo $result['spec_icon'] ?>.jpg"><?php echo $class_name; ?>
                  </em>
                </div>
                <!-- End Figure Info -->

                <!-- Figure Caption -->
                <figcaption style="background-color:rgba(0,0,0,.5)" class="u-block-hover__additional--fade g-pa-30">
                  <div class="u-block-hover__additional--fade u-block-hover__additional--fade-down g-flex-middle">
                    <!-- Figure Social Icons -->
                    <ul class="list-inline text-center g-flex-middle-item">
                      <li class="list-inline-item align-middle g-mx-7 g-color-white">
                        <a target="_blank" href="https://worldofwarcraft.com/en-us/character/stormrage/<?php echo urlencode($result['name']); ?>" class="g-color-white">
                          <span class="u-icon-v1 u-icon-size--xs g-mr-5">
                            <img width="30" height="30" src="assets/img/logo.armory.png">
                          </span>
                          Armory
                        </a>
                      </li>
                      <li class="list-inline-item align-middle g-mx-7 g-color-white">
                        <a target="_blank" href="https://www.warcraftlogs.com/character/us/stormrage/<?php echo urlencode($result['name']); ?>" class="g-color-white">
                          <span class="u-icon-v1 u-icon-size--xs g-mr-5">
                            <img width="30" height="30" src="assets/img/logo.warlogs.png">
                          </span>
                          Logs
                        </a>
                      </li>
                      <li class="list-inline-item align-middle g-mx-7">
                        <a target="_blank" href="https://raider.io/characters/us/stormrage/<?php echo urlencode($result['name']); ?>" class="g-color-white">
                          <span class="u-icon-v1 u-icon-size--xs g-mr-5">
                            <img width="30" height="30" src="assets/img/logo.raiderio.png">
                          </span>
                          Raider.IO
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
    </main>
  </body>
  <?php include 'templates/home.js.php' ?>
</html>
