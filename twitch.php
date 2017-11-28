<!DOCTYPE html>
<html lang="en">
	<?php include 'templates/all.user.php' ?>
	<?php include 'templates/twitch.head.php' ?>
	<body class="main-body">
		<main>
			<?php include 'templates/all.navbar.php' ?>
			<div class="container main-container g-mt-80">

				<div class="row">
					<div class="col-6 g-brd-around g-brd-gray-light-v4 g-brd-left-4 g-brd-green-left g-line-height-1_8 g-rounded-3 g-pa-20 g-mb-30" role="alert">
					  <h3 class="g-color-green g-font-weight-600">Blahpjiyah - Shadow Priest</h3>
					  <p class="mb-0 g-font-size-16">Some details will go here about Blah...but that's something he needs to give me!</p>
					</div>
					<div class="col-6">
						<div id="twitch-embed-kniny"></div>
					</div>
				</div>

				<div class="row">
					<div class="col-6 g-brd-around g-brd-gray-light-v4 g-brd-left-4 g-brd-green-left g-line-height-1_8 g-rounded-3 g-pa-20 g-mb-30" role="alert">
					  <h3 class="g-color-green g-font-weight-600">Toludin - Elemental Shaman</h3>
					  <p class="mb-0 g-font-size-16">Some details will go here about Toludin...but that's something he needs to give me!</p>
					</div>
					<div class="col-6">
						<div id="twitch-embed-toludin"></div>
					</div>
				</div>

				<div class="row">
					<div class="col-6 g-brd-around g-brd-gray-light-v4 g-brd-left-4 g-brd-green-left g-line-height-1_8 g-rounded-3 g-pa-20 g-mb-30" role="alert">
					  <h3 class="g-color-green g-font-weight-600">Ram - Havoc Demon Hunter</h3>
					  <p class="mb-0 g-font-size-16">Some details will go here about Ram...but that's something he needs to give me!</p>
					</div>
					<div class="col-6">
						<div id="twitch-embed-maahfky"></div>
					</div>
				</div>

			</div>
		</main>
	</body>
	<?php include 'templates/twitch.js.php' ?>
</html>
<!-- Twitch Stuff -->
<script src="https://embed.twitch.tv/embed/v1.js"></script>
<script type="text/javascript">
  new Twitch.Embed("twitch-embed-kniny", {
    width: "100%",
    height: 180,
    channel: "kniny",
    layout: "video",
    autoplay: false
  });
  new Twitch.Embed("twitch-embed-toludin", {
    width: "100%",
    height: 180,
    channel: "toludin",
    layout: "video",
    autoplay: false
  });
  new Twitch.Embed("twitch-embed-maahfky", {
    width: "100%",
    height: 180,
    channel: "maahfky",
    layout: "video",
    autoplay: false
  });
</script>
