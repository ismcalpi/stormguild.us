<!DOCTYPE html>
<html lang="en">
	<?php include 'templates/all.user.php' ?>
	<?php include 'templates/admin.head.php' ?>
	<body>
		<main>
        <?php
          if($user_rank > 2){
        ?>
				<div class="row">
          <div style="min-height:100vh;" class="col-2 g-brd-right g-brd-black">
              <?php include 'templates/admin.navbar.php' ?>
          </div>
          <div class="col-9 g-pa-10">
              <?php
								if (EMPTY($_GET['mode'])) {
									include 'templates/admin.instruction.php';
								} else {
									include 'templates/admin.'.$_GET['mode'].'.php';
								}
							?>
          </div>
        </div>
        <?php
        } else {
        ?>
					<form id="redirect" method="POST" action="user.php?page=login">
						<input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
					</form>
					<script type="text/javascript">
							document.getElementById('redirect').submit(); // SUBMIT FORM
					</script>
        <?php
        }
        ?>
		</main>
	</body>
	<?php include 'templates/admin.js.php' ?>
</html>
