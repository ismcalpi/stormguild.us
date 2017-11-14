<!DOCTYPE html>

<html lang="en">



<?php include 'include/head.php' ?>



<body class="main-body">

	<main>

	<?php include 'include/navbar.php' ?>
	
	<div class="container main-container g-mt-80">
		<div class="row">
			<div class="col-lg-6">
				<div id="twitch-embed-kniny"></div>
			</div>
			<div class="col-lg-6">
				<div id="twitch-embed-Zaxvriin"></div>
			</div>
		</div>	
	</div>

    <!-- Load the Twitch embed script -->
    <script src="https://embed.twitch.tv/embed/v1.js"></script>


    <!-- Create a Twitch.Embed object that will render within the "twitch-embed" root element. -->
    <script type="text/javascript">

      new Twitch.Embed("twitch-embed-kniny", {
        width: "100%",
        height: 480,
        channel: "kniny",
		layout: "video",
		autoplay: false
      });
	  
	  new Twitch.Embed("twitch-embed-Zaxvriin", {
        width: "100%",
        height: 480,
        channel: "Zaxvriin",
		layout: "video",
		autoplay: false
      });

    </script>

	</main>

</body>



</html>