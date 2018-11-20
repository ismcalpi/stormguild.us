<!DOCTYPE html>
<html lang="en">
	<?php include 'templates/all.user.php' ?>
	<?php include 'templates/twitch.head.php' ?>
	<?php
		include_once 'library/function.twitch.php';
		include_once 'library/class.database.php';
		$db = new database();
	?>
	<body class="main-body">
		<main>
			<?php include 'templates/all.navbar.php' ?>
			<div class="container g-bg-white g-brd-around g-brd-white g-brd-2 g-mt-80" style="min-height:100vh;">
				<div class="row g-pa-20">
					<div class="u-heading-v2-3--bottom col-12 g-brd-purple g-mb-30">
						<h2 class="h1 text-uppercase g-font-weight-300 u-heading-v2__title"><strong><i class="fa fa-twitch u-tab-line-icon-pro g-mr-3 g-color-purple"></i> Storm Streamers</strong></h2>
					</div>
					<?php
						$results = $db -> read_select("select * from stormguild.streamers where is_active = 1");
						foreach($results as $result) {
							$twitchStatus = getTwitchStatus($result['username']);
							$user = getUserJSON($result['username']);
							$channel = getChannelJSON($result['username']);
					?>

					<div class="col-md-3 col-6">
						<div class="u-shadow-v19 g-brd-around g-brd-purple g-brd-3 text-center rounded g-pb-20 g-px-15 g-my-50 g-mx-10" style="background-color: rgba(100, 65, 165, .2);">
				      <img class="g-brd-3 g-brd-style-solid g-brd-purple g-width-100 g-height-100 rounded-circle g-pull-50x-up" src="<?php echo $user['users'][0]['logo']; ?>" alt="Image Description">
				      <div class="g-mt-minus-20">
				        <h4 class="h6 g-color-purple g-font-weight-600 text-uppercase g-mb-5"><?php echo $user['users'][0]['display_name']; ?></h4>
				        <em class="d-block g-color-black g-font-style-normal g-font-size-13 g-mb-20"><?php echo $channel['status']; ?></em>
								<?php if($twitchStatus){ ?>
									<a target="_blank" href="<?php echo $channel['url']; ?>" class="btn u-btn-sm u-btn-primary">Live Now!</a>
								<?php } else { ?>
									<a target="_blank" href="<?php echo $channel['url']; ?>" class="btn u-btn-sm u-btn-bluegray">Offline</a>
								<?php }?>
				      </div>
				    </div>
					</div>

				<?php } ?>
				</div>
			</div>
			<?php include 'templates/all.footer.php' ?>
		</main>
	</body>
	<?php include 'templates/twitch.js.php' ?>
</html>
