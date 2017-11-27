<!DOCTYPE html>
<html lang="en">
	<?php include 'templates/all.user.php' ?>
	<?php include 'templates/admin.head.php' ?>
	<body>
		<main>
			<div class="row" style="min-height:100vh">
	<?php
		if (!empty($_GET['accessid'])) {
			#Then we have a valid applicant looking at us
			include_once 'library/class.database.php';
			$db = new database();
		  $sql = "SELECT * FROM stormguild.application WHERE access_id = '".$_GET['accessid']."'";
		  $result = $db -> sql_fetchrow($sql);
			$appid = $result['application_id'];
			$username = $result['charName'];
		?>
		<h1>Testing to see if ACCESSID Works?</h1>
		<p>AppID: <?php echo $appid ?></p>
		<div class="col-lg-8 g-pa-20">
				<?php include 'templates/application.body.php' ?>
		</div>
		<div class="col-lg-4 g-pa-20">
				<?php include 'templates/application.comments.php' ?>
		</div>
		<?php
		} else if ($user_rank >= 2) {
			#Then we have a raider or officer looking at us
			if(!empty($_GET['appid'])){ $appid = $_GET['appid']; }
			$username = $user -> data['username'];
		?>
		<div class="col-2 g-brd-right g-brd-black">
				<?php include 'templates/application.navbar.php' ?>
		</div>
		<div class='col-10'>
			<div class="row">
				<div class="col-lg-8 g-pa-20">
						<?php include 'templates/application.body.php' ?>
				</div>
				<div class="col-lg-4 g-pa-20">
						<?php include 'templates/application.comments.php' ?>
				</div>
			</div>
		</div>
		<?php
		} else {
			#Shouldn't be here, go to Login
	?>
			<form id="redirect" method="POST" action="user.php?page=login">
				<input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
			</form>
			<script type="text/javascript">
			    document.getElementById('redirect').submit(); // SUBMIT FORM
			</script>
	<?php
		}
	?>
			</div>
		</main>
	</body>
	<?php include 'templates/admin.js.php' ?>
</html>
