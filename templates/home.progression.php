<?php
$json = json_decode(file_get_contents('https://www.wowprogress.com/guild/us/stormrage/storm/json_rank'));
?>
<div class="col-12 g-pa-0 g-ma-0">
	<a  href="https://www.wowprogress.com/guild/us/stormrage/storm"
			class="btn btn-xl u-btn-bluegray u-btn-content g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-mt-5 g-pa-5"
			target="_blank"
			style="width:100%;">
		<i class="fa fa-globe pull-left g-font-size-35"></i>
		<span class="float-left text-left g-font-size-15 g-color-white">
			<span class="d-block g-font-size-12">wowprogress ranking</span>
			US #<?php echo $json->area_rank; ?> Realm #<?php echo $json->realm_rank; ?>
		</span>
	</a>
</div>

<div class="col-12 g-pa-0 g-my-0">

<?php
include_once 'library/class.database.php';
$db = new database();

$raids = $db -> read_select("SELECT * FROM stormguild.vw_progression");

foreach($raids as $raid) {
?>

	<a  href="#"
			class="btn btn-xl u-btn-content g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-mt-5 g-pa-5"
			style="width:100%;background-image:url('img/raid/antorus/main.jpg');background-size:cover;">
		<span class="u-accordion__control-icon d-inline-block g-color-white pull-left">
			<i class="fa fa-plus g-font-size-20"></i>
			<i class="fa fa-minus g-font-size-20"></i>
		</span>
		<span class="float-left text-left g-font-size-18 g-color-white g-mx-20">
			<span class="d-block g-font-size-14"><?php echo $raid['raid']; ?></span>
			<?php echo $raid['progression']; ?>
		</span>
	</a>

<?php } ?>

</div>
