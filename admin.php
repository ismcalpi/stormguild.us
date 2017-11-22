<!DOCTYPE html>
<html lang="en">
	<?php include 'templates/all.user.php' ?>
	<?php include 'templates/admin.head.php' ?>
	<body class="main-body">
		<main>
			<div class="container main-container g-mt-80">
        <div class="col-sm-2 g-brd-right g-brd-black">
            <?php include 'templates/admin.navbar.php' ?>
        </div>
        <div class="col-sm-10 g-pa-20">
            <?php include 'templates/admin.'.$_GET['mode'].'.php' ?>
        </div>
			</div>
		</main>
	</body>
	<?php include 'templates/admin.js.php' ?>
</html>
