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
				<form id="redirect" method="POST" action="user.php?page=login">
					<input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
				</form>
				<script type="text/javascript">
				    document.getElementById('redirect').submit(); // SUBMIT FORM
				</script>
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
