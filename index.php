<!DOCTYPE html>
<html lang="en">
  <?php include 'templates/all.user.php' ?>
  <?php include 'templates/home.head.php' ?>
  <body class="main-body">
    <main>
      <?php include 'templates/all.navbar.php' ?>
      <div class="container main-container g-px-10 g-mt-60">
        <div class="row">
          <!-- Start Left Column -->
          <div class = "col-lg-8 g-pa-10">
            <div class = "row g-mx-10 g-mb-10">
              <div class="col-lg-12 col-sm-12 g-pa-0">
                <?php include 'templates/home.recruit.php' ?>
              </div>
            </div>
            <div class = "row g-mx-10 g-mb-10">
              <div class="col-lg-12 col-sm-12 g-pa-0">
                <div class="g-brd-around bg-color-black g-bg-black-opacity-0_9 g-rounded-10 g-pa-10">
                  <?php include 'templates/home.killshots.php' ?>
                </div>
              </div>
            </div>
          </div>
          <!-- End Left Column -->
          <!-- Start Right Column -->
          <div class = "col-lg-4 g-pa-10">
            <div class = "row g-mx-10 g-my-0">
              <div class="col-lg-12 col-sm-12 g-pa-0">
                <?php include 'templates/home.sales.php' ?>
              </div>
            </div>
            <div class = "row g-mx-10 g-my-0">
              <?php include 'templates/home.progression.php' ?>
            </div>
          </div>
          <!-- End Right Column -->
        </div>
      </div>
    </main>
  </body>
  <?php include 'templates/home.js.php' ?>
</html>
