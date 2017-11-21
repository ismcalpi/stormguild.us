<!DOCTYPE html>
<html lang="en">
	<?php include 'templates/all.user.php' ?>
	<?php include 'templates/twitch.head.php' ?>
	<body class="main-body">
		<main>
			<?php include 'templates/all.navbar.php' ?>
			<div class="container main-container g-mt-80">
				<?php
					echo '<h1>'.$user -> data['username'].' '.$user -> data['user_rank'].'</h1>';
					echo '<ul>';
					foreach($user -> data as $item) {
						echo '<li>'.$item.'</li>';
					}
					echo '</ul>';
				?>
			</div>
		</main>
	</body>
	<?php include 'templates/twitch.js.php' ?>
</html>
