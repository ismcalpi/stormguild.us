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

          <div class="col-12"><h1 class="h1 text-center g-pa-30">Coming Soon!</h1></div>

        </div>
      </div>
    </main>
  </body>
  <?php include 'templates/home.js.php' ?>
</html>
