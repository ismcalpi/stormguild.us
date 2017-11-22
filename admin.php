<!DOCTYPE html>
<html lang="en">
	<?php include 'templates/all.user.php' ?>
	<?php include 'templates/admin.head.php' ?>
	<body class="main-body">
		<main>
			<div class="container main-container g-mt-80">
        <?php
          if($rank < 1){
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
			</div>
		</main>
	</body>
	<?php include 'templates/admin.js.php' ?>
</html>
