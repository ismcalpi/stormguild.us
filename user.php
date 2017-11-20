<!DOCTYPE html>
<html lang="en">
	<?php include 'templates/all.user.php' ?>
	<?php include 'templates/user.head.php' ?>
	<body class="main-body">
		<main>
			<?php include 'templates/all.navbar.php' ?>
			<div class="container g-mt-80 g-pa-20">
				<?php include 'templates/user.'.$_GET['page'].'.php' ?>
			</div>
		</main>
	</body>
	<?php include 'templates/user.js.php' ?>
</html>
