<!DOCTYPE html>
<html lang="en">
	<?php include 'templates/all.user.php' ?>
	<?php include 'templates/admin.head.php' ?>
	<?php
		include_once 'library/class.database.php';
		$db = new database();
		#Lets setup our Application access and variables
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

			<?php
				echo "<p>User Rank: ".$user_rank."</p>";
				echo "<p>Access Level: ".$access."</p>";
				echo "<p>Request URI: ".$_SERVER['REQUEST_URI']."</p>";
			?>

		</main>
	</body>
	<?php include 'templates/admin.js.php' ?>
</html>
