<!DOCTYPE html>
<html lang="en">
  <?php include 'templates/all.user.php' ?>
  <?php include 'templates/home.head.php' ?>
  <script>
    function resizeIframe(obj) {
      obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
    }
  </script>
  <body class="main-body">
    <main>
      <?php include 'templates/all.navbar.php' ?>
      <div class="container g-bg-white g-brd-around g-brd-white g-brd-2 g-mt-80" style="min-height:100vh;">
        <div class="row">

          <div class = "col-12 g-pa-0 g-ma-0">
            <?php include 'templates/home.banner.php' ?>
          </div>

          <div class = "col-md-3 col-xs-12 g-pa-5">
            <!-- <h3 class="h3 g-brd-bottom g-brd-1 g-brd-black g-color-black">Raid Progression</h3> -->
            <?php include 'templates/home.recruit.php' ?>
            <?php include 'templates/home.sales.php' ?>
            <?php include 'templates/home.progression.php' ?>
          </div>

          <div class = "col-md-9 col-xs-12 g-py-5 g-px-15">
            <div class="u-heading-v3-1 text-center g-mb-15">
              <h2 class="text-uppercase h4 u-heading-v3__title g-brd-blue">Guild News</h2>
            </div>
            <!-- <h2 class="h2 g-brd-bottom g-brd-1 g-brd-black g-color-black">Guild News</h2> -->
            <iframe frameborder="0" scrolling="no" onload="resizeIframe(this)" src='blog.php' width="100%"></iframe>
          </div>

        </div>
      </div>
    </main>
  </body>
  <?php include 'templates/home.js.php' ?>
</html>
