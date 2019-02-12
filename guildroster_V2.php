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
            include_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/class/roster.php';
            $roster = new Roster();

            $classList = $roster -> get_classList();
            foreach ($classList as $class) {

                $results = $roster->get_classResult($class);
                foreach ($results as $result) {
                    $rank_name = $roster->get_guildRank($result['rank']);
                    ?>

                    <div class='col-lg-4 col-md-6 col-12 g-mb-30'>
                        <figure class="u-block-hover u-shadow-v2 g-bg-white g-pa-0">
                            <div style="background-color:rgba(0,0,0,.85);border-radius: 30px; border: 2px solid #000000" class="d-flex justify-content-start g-pa-0">
                                <img style="border-radius: 30px 0px 0px 30px;" class="g-width-70 g-height-100x g-mr-0" src="http://render-us.worldofwarcraft.com/character/<?php echo $result['thumbnail']; ?>">
                                <img style="border-radius: 0px 30px 30px 0px;" class="g-width-70 g-height-100x g-ml-0 g-mr-15" src="https://wow.zamimg.com/images/wow/icons/large/<?php echo $result['spec_icon'] ?>.jpg">
                                <div class="d-block">
                                    <h4 style="color:<?php echo $class[1]; ?>;" class="h5 g-mt-15 g-mb-5"><?php echo $result['name']; ?></h4>
                                    <em class="d-block g-color-white g-font-style-normal g-font-size-small g-mb-15 g-mt-0"><?php echo $rank_name ?></em>
                                </div>
                                <figcaption style="background-color:rgba(255,255,255,.6)" class="u-block-hover__additional--fade g-pa-30">
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

                <?php }
            }?>
        </div>

        </div>
        <?php include 'templates/all.footer.php' ?>
    </main>
  </body>
  <?php include 'templates/home.js.php' ?>
</html>
