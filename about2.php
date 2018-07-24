<!DOCTYPE html>
<html lang="en">
	<?php include 'templates/all.user.php' ?>
	<?php include 'templates/about.head.php' ?>
	<body class="main-body">
		<main>
			<?php include 'templates/all.navbar.php' ?>
			<div class="container g-mt-80" style="min-height:100vh;">
				<?php
					include_once 'library/class.database.php';
					$db = new database();
					$sections = $db -> read_select("select * from stormguild.about_us where is_active = 1 order by a_order asc");
					foreach($sections as $section) {
				?>
				<section class="g-bg-white g-brd-around g-brd-black g-brd-2 g-pa-30">

					<div class="u-heading-v1-1 g-bg-main g-brd-blue g-mb-20">
						<h2 style="text-align:center;" class="h3 u-heading-v1__title"><?php echo $section['title']; ?></h2>
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
