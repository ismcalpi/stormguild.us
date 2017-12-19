<!DOCTYPE html>
<html lang="en">
	<?php include 'templates/all.user.php' ?>
	<?php include 'templates/twitch.head.php' ?>
	<body class="main-body">
		<main>
			<?php include 'templates/all.navbar.php' ?>
			<div class="container main-container g-mt-80">

				<?php

					$user_curl = curl_init();
					curl_setopt_array($user_curl, array(
					    CURLOPT_RETURNTRANSFER => 1,
					    CURLOPT_URL => 'https://api.twitch.tv/kraken/users?login=kniny',
					    CURLOPT_HTTPHEADER => array('Accept: application/vnd.twitchtv.v5+json','Client-ID: dixpnolwj0yth0r3wpzxrp2edowugp')
					));
					$twitch_user = curl_exec($user_curl);
					$json_user = json_decode($twitch_user, true);
					curl_close($user_curl);

					$channel_curl = curl_init();
					$channel_url = 'https://api.twitch.tv/kraken/channels/'.$json_user['users'][0]['logo'];
					curl_setopt_array($channel_curl, array(
					    CURLOPT_RETURNTRANSFER => 1,
					    CURLOPT_URL => $channel_url,
					    CURLOPT_HTTPHEADER => array('Accept: application/vnd.twitchtv.v5+json','Client-ID: dixpnolwj0yth0r3wpzxrp2edowugp')
					));
					$twitch_channel = curl_exec($channel_curl);
					$json_channel = json_decode($twitch_channel, true);
					curl_close($channel_curl);
					
				?>
				<div class="row">

					<!-- Blah Twitch Stuff -->
					<div class="u-shadow-v19 col-3 g-bg-white text-center rounded g-pb-40 g-px-30 g-ma-20 g-mt-80">
			      <img class="g-brd-7 g-brd-style-solid g-brd-white g-width-100 g-height-100 rounded-circle g-pull-50x-up" src="<?php echo $json_user['users'][0]['logo']; ?>" alt="Image Description">
			      <div class="g-mt-minus-20">
			        <h4 class="h6 g-color-primary g-font-weight-600 text-uppercase g-mb-5"><?php echo $json_user['users'][0]['display_name']; ?></h4>
			        <em class="d-block g-color-gray-dark-v4 g-font-style-normal g-font-size-13 g-mb-20"><?php echo $json_channel['status']; ?></em>
			        <blockquote class="g-color-black g-font-style-italic g-font-size-20 g-line-height-1_4">Does stuff with tentacles.</blockquote>
							<button href="<?php echo $json_channel['url']; ?>">Watch</button>
			      </div>
			    </div>
					<!-- End Blah Section -->

				</div>
			</div>
		</main>
	</body>
	<?php include 'templates/twitch.js.php' ?>
</html>
