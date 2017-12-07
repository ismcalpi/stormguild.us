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
				$sql = "SELECT * FROM stormguild.application WHERE application_id = '".$_GET['appid']."'";
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
			<div class="row" style="min-height:100vh">

	<?php if ($access == 1) { ?>

			<div class="col-12 g-pa-20">
					<?php include 'templates/application.body.php' ?>
			</div>
			<div class="col-12 g-pa-20">
					<?php include 'templates/application.comments.php' ?>
			</div>

	<?php } else if ($access == 2) { ?>

		<div class="col-2 g-brd-right g-brd-black">
				<?php include 'templates/application.navbar.php' ?>
		</div>
		<div class='col-10'>
			<div class="row">
				<div class="col-12 g-pa-20">
						<?php include 'templates/application.body.php' ?>
				</div>
				<div class="col-12 g-pa-20">
						<?php include 'templates/application.comments.php' ?>
				</div>
			</div>
		</div>

	<?php } else if ($access == 3) { ?>

		<div class="col-2 g-brd-right g-brd-black">
				<?php include 'templates/application.navbar.php' ?>
		</div>
		<div class='col-10'>
			<div class="row">
				<div class="col-12">
						<?php if ($status == 'open') { include 'templates/application.admin.php'; } ?>
				</div>
				<div class="col-12 g-pa-20">
						<?php include 'templates/application.body.php' ?>
				</div>
				<div class="col-12 g-pa-20">
						<?php include 'templates/application.comments.php' ?>
				</div>
			</div>
		</div>

	<?php } else { ?>

			<form id="redirect" method="POST" action="user.php?page=login">
				<input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
			</form>
			<script type="text/javascript">
			    document.getElementById('redirect').submit(); // SUBMIT FORM
			</script>

	<?php } ?>

			</div>
		</main>
	</body>
	<?php include 'templates/admin.js.php' ?>
</html>
