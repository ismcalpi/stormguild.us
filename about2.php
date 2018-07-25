<!DOCTYPE html>
<html lang="en">
	<?php include 'templates/all.user.php' ?>
	<?php include 'templates/about.head.php' ?>
	<body class="main-body">
		<main>
			<?php include 'templates/all.navbar.php' ?>
			<div class="container g-mt-80" style="min-height:100vh;">
				<div class="row">
					<?php
						include_once 'library/class.database.php';
						$db = new database();
						$sections = $db -> read_select("select * from stormguild.about_us where is_active = 1 order by a_order asc");
						foreach($sections as $section) {
					?>
					<div class="g-pa-10">
						<section class="<?php echo $section['size']; ?> g-bg-white g-brd-around g-brd-blue g-brd-2 g-pa-20">

							<div class="u-heading-v1-1 g-bg-main g-brd-blue g-mb-20 text-center">
								<h2 class="h3 u-heading-v1__title g-mx-20"><?php echo $section['title']; ?></h2>
							</div>

							<?php echo $section['content']; ?>

						</section>
					</div>
					<?php
						}
					?>
				</div>
			</div>
		</main>
		<?php include 'templates/about.js.php' ?>
	</body>
</html>
