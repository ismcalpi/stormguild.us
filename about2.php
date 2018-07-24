<!DOCTYPE html>
<html lang="en">
	<?php include 'templates/all.user.php' ?>
	<?php include 'templates/about.head.php' ?>
	<body class="main-body">
		<main>
			<?php include 'templates/all.navbar.php' ?>
			<div class="container g-bg-white g-brd-around g-brd-white g-brd-2 g-mt-80" style="min-height:100vh;">
				<?php
					include_once 'library/class.database.php';
					$db = new database();
					$sections = $db -> read_select("select * from stormguild.about_us where is_active = 1 order by a_order asc");
					foreach($sections as $section) {
				?>
				<section class="g-pt-20 g-mx-50 g-my-30">
					<div class="g-bg-blue g-mb-0 g-pa-10 g-rounded-15 b-brd-top">
						<h2 class="h2 text-uppercase g-font-weight-300 g-color-white g-mx-20"><?php echo $section['title']; ?></h2>
					</div>
					<div class="g-brd-2 g-mt-0 g-brd-blue g-brd-around g-rounded-bottom-15">
						<?php echo $section['content']; ?>
					</div>
				</section>
				<?php
					}
				?>

			</div>
		</main>
		<?php include 'templates/about.js.php' ?>
	</body>
</html>
