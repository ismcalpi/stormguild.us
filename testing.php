<!DOCTYPE html>
<html lang="en">
	<?php include 'templates/all.user.php' ?>
	<?php include 'templates/twitch.head.php' ?>
	<body class="main-body">
		<main>
			<?php include 'templates/all.navbar.php' ?>
			<div class="container main-container g-mt-60">
				<?php
					echo '<h1>User Array</h1>';
					echo '<p>'.array_values($user).'</p>';
					echo '<h1>Auth Array</h1>';
					echo '<p>'.array_values($auth).'</p>';
				?>
			</div>
		</main>
	</body>
	<?php include 'templates/twitch.js.php' ?>
</html>
