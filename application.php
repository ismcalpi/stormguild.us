<!DOCTYPE html>
<html lang="en">
	<?php include 'templates/all.user.php' ?>
	<?php include 'templates/admin.head.php' ?>
	<?php

	?>
	<body>
		<main>
      <div class="row" style="min-height:100vh">
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
			</div>
		</main>
	</body>
	<?php include 'templates/admin.js.php' ?>
</html>
