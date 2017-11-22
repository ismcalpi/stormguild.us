<?php
if (!empty($_GET['app_id'])) {
  $app_id = $_GET['app_id'];

?>
  <div class="row">
    <div class="col-3">
      <?php include 'templates/admin.application.navar.php' ?>
    </div>
    <div class="col-9">
      <div class="row">
        <div class="col-lg-8">
          <?php include 'templates/admin.application.body' ?>
        </div>
        <div class="col-lg-4">
          <?php include 'templates/admin.application.comments' ?>
        </div>
    </div>
  </div>
<?php
} else {
?>
  <h1 class="h1 g-color-red">No Applications Found</h1>
<?php
}
?>
