<!DOCTYPE html>
<html lang="en">
  <?php include 'templates/general/user.php' ?>
  <?php include 'templates/general/head.php' ?>
  <body class="main-body g-mt-80">
    <main>
      <?php include 'templates/general/navbar.php' ?>
      <?php include 'templates/recruitment/banner.php' ?>
      <div id="application" class="container g-pa-0 g-mb-20 g-mt-0 u-shadow-v1-5 g-line-height-2">
        <div class="row">
          <div class="col-lg-12">
            <?php include 'templates/recruitment/form.php' ?>
          </div>
        </div>
      </div>
      <?php include 'templates/foot.php' ?>
    </main>
  </body>

  <?php include 'templates/general/script.php' ?>
  <script src="assets/js/jquery.validate.min.js"></script>
  <script src="assets/js/additional-methods.min.js"></script>
  <script >
      $(document).on('ready', function () {
          // initialize jquery validation
          $("#appForm").validate();
      });
  </script>

</html>
