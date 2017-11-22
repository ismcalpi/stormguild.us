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
        <div class="col-2 g-brd-right g-brd-black">
            <?php include 'templates/admin.navbar.php' ?>
        </div>
        <div class="col-10 g-pa-20">
            <?php include 'templates/admin.'.$_GET['mode'].'.php' ?>
        </div>
        <?php
        }
        ?>
		</main>
	</body>
	<?php include 'templates/admin.js.php' ?>
</html>
