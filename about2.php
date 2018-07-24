<!DOCTYPE html>
<html lang="en">
	<?php include 'templates/all.user.php' ?>
	<?php include 'templates/about.head.php' ?>
	<body class="main-body">
		<main>
			<?php include 'templates/all.navbar.php' ?>
			<div class="container g-bg-white g-brd-around g-brd-white g-brd-2 g-mt-80 m-pa-30" style="min-height:100vh;">
				<?php
					include_once 'library/class.database.php';
					$db = new database();
					$sections = $db -> read_select("select * from stormguild.about_us where is_active = 1 order by a_order asc");
					foreach($sections as $section) {
				?>
				<section class="g-pt-20">
					<div class="u-heading-v2-3--bottom g-brd-blue g-mb-30">
						<h2 class="h2 text-uppercase g-font-weight-300 u-heading-v2__title"><?php echo $section['title']; ?></h2>
					</div>
					<?php echo $section['content']; ?>
				</section>
				<?php
					}
				?>

			</div>
		</main>
		<?php include 'templates/about.js.php' ?>
	</body>
</html>
