<!DOCTYPE html>
<html lang="en">
	<?php include 'templates/all.user.php' ?>
	<?php include 'templates/admin.head.php' ?>
	<?php
		include_once 'library/class.database.php';
		$db = new database();
		#Lets setup our Application access and variables
		$access = 0;
		if (!empty($_GET['accessid'])) {
			$sql = "SELECT * FROM stormguild.application WHERE access_id = '".$_GET['accessid']."'";
			$result = $db -> sql_fetchrow($sql);
			$access = 1; #Applicant
			$appid = $result['application_id'];
			$username = $result['charName'];
			$status = $result['status'];
		} else if ($user_rank >= 2) {
			if (!empty($_GET['appid'])) {
				$sql = "SELECT CASE WHEN create_datetime < date_sub(now(), INTERVAL 3 MONTH) THEN 'yes' ELSE 'no' END AS 'archived?', ap.* FROM stormguild.application ap WHERE application_id = ".$_GET['appid'];
			} else {
				$sql = "SELECT * FROM stormguild.application WHERE status = 'open' ORDER BY create_datetime DESC LIMIT 1";
			}
			$result = $db -> sql_fetchrow($sql);
			$access = $user_rank; #Raider or Officer
			$appid = $result['application_id'];
			$username = $user -> data['username'];
			$status = $result['status'];
		}

	?>
	<body>
		<main>
			<?php if($access < 1) { ?>
				<h1>Access Denied</h1>
				<p>...or you need to <a href="user.php?page=login">login</a></p>
				<?php
					echo "<p>Debug Info</p>";
					echo "<p>User Rank: ".$user_rank."</p>";
					echo "<p>Access Level: ".$access."</p>";
					echo "<p>Request URI: ".$_SERVER['REQUEST_URI']."</p>";
				?>
			<?php } ?>
			<?php if($access >= 2) { ?>
			<div class="row" style="min-height:100vh">
				<div class="col-md-2 col-xs-12 g-brd-right g-brd-black">
						<?php include 'templates/application.navbar.php' ?>
				</div>
			<?php } ?>
				<div class='col-md-10 col-xs-12'>
					<div class="row">
						<div class="col-12 g-py-10 g-px-40">
							<?php if ($status == 'open' && $access == 3) { include 'templates/application.admin.php'; } ?>
							<?php include 'templates/application.body.php' ?>
							<?php include 'templates/application.comments.php' ?>
						</div>
					</div>
				</div>
			</div>

		<?php include 'templates/application.archive.php' ?>

		</main>
	</body>
	<?php include 'templates/admin.js.php' ?>
</html>
