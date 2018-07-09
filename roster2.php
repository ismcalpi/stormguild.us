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
          <?php

            include_once 'library/class.roster.php';
            $roster = new Roster();

            $classList = $roster -> get_classList();
            foreach ($classList as $class) {

              #echo "<p>".$class[0].", ".$class[1].", ".$class[2]."</p>";
          ?>
            <div class="row">
              <h1 style="text-color:<?php echo $class[1]; ?>"><img src="<?php echo $class[2]; ?>" /><?php echo $class[0]; ?></h1>

            </div>
          <?php
            }
          ?>
      </div>
    </main>
  </body>
  <?php include 'templates/home.js.php' ?>
</html>
