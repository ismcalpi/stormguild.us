<!DOCTYPE html>
<html lang="en">
	<?php include 'templates/all.user.php' ?>
	<?php include 'templates/about.head.php' ?>
	<body class="main-body">
		<main>
			<?php include 'templates/all.navbar.php' ?>
			<div class="container g-my-80 g-bg-white" style="min-height:100vh;">
				<div class="row">
					<?php
						include_once 'library/class.database.php';
						$db = new database();
						$sections = $db -> read_select("select * from stormguild.about_us where is_active = 1 order by a_order asc");
						foreach($sections as $section) {
					?>
					<div class="col-md-<?php echo $section['size']; ?> col-12 g-pa-5">
						<section class="g-px-30 g-py-10">
							<div class="u-heading-v1-1 g-bg-main g-brd-blue g-mb-20 text-center">
								<h2 class="h3 u-heading-v1__title"><?php echo $section['title']; ?></h2>
							</div>
							<?php echo $section['content']; ?>
						</section>
					</div>
					<?php
						}
					?>
				</div>
			</div>
			<?php include 'templates/all.footer.php' ?>
		</main>
		<?php include 'templates/about.js.php' ?>
	</body>
</html>
