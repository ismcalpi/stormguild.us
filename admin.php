<!DOCTYPE html>
<html lang="en">
	<?php include 'templates/all.user.php' ?>
	<?php include 'templates/admin.head.php' ?>
	<body>
		<main>
        <?php
          if($user_rank <= 1){
        ?>
          <h1 class="h1 g-color-red">Access Denied, Redirecting Home.</h1>
          <script>
            window.location = "index.php";
          </script>
        <?php
        } else {
        ?>
        <div class="row">
          <div class="col-2 g-brd-right g-brd-black">
              <?php include 'templates/admin.navbar.php' ?>
          </div>
          <div class="col-9 g-pa-10">
              <?php 
								if (EMPTY($_GET['mode'])) {
									include 'templates/admin.instruction.php';
								} else {
									include 'templates/admin.'.$_GET['mode'].'.php';
								}
							?>
          </div>
        <div class="row">
        <?php
        }
        ?>
		</main>
	</body>
	<?php include 'templates/admin.js.php' ?>
</html>
