<?php
include_once 'library/class.database.php';
$db = new database();

$rank = $db -> read_row('SELECT * FROM stormguild.guild_rank');
?>
<div class="col-12 g-pa-0 g-ma-0">
	<a  href="https://www.wowprogress.com/guild/us/stormrage/storm"
			class="btn btn-xl u-btn-bluegray u-btn-content g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-mt-5 g-pa-5"
			target="_blank"
			style="width:100%;">
		<i class="fa fa-globe pull-left g-font-size-35"></i>
		<span class="float-left text-left g-font-size-15 g-color-white">
			<span class="d-block g-font-size-12">wowprogress ranking</span>
			US #<?php echo $rank['area_rank']; ?> Realm #<?php echo $rank['realm_rank']; ?>
		</span>
	</a>
</div>

<div id="raidprog" class="u-accordion col-12 g-pa-0 g-my-0" role="tablist" aria-multiselectable="false">

<?php
$firstraid = TRUE;
$raids = $db -> read_select("SELECT * FROM stormguild.vw_progression");

foreach($raids as $raid) {

	$path = $raid['icon_img'];
	#strtolower('assets/img/uploads/progression/'.preg_replace('/\PL/u', '', $raid['expansion']).'/'.preg_replace('/\PL/u', '', $raid['raid']).'/main.jpg');
	$raidname = strtolower(preg_replace('/\PL/u', '', $raid['raid']));
	if ($firstraid == TRUE) {
		$collapse = array('','show');
		$firstraid = FALSE;
	} else {
		$collapse = array('collapsed','');
	}

?>
<div id="<?php echo $raidname; ?>-header" class="u-accordion__header g-pa-0 g-ma-0" role="tab">
	<a  href="#<?php echo $raidname; ?>-body"
			data-toggle="collapse"
			data-parent="#raidprog"
			aria-expanded="false"
			aria-controls="<?php echo $raidname; ?>-body"
			class="<?php echo $collapse[0]; ?> btn btn-xl u-btn-content g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-mt-5 g-pa-5"
			style="width:100%;background-image:url('<?php echo $path ?>');background-size:cover;">
		<span class="u-accordion__control-icon d-inline-block g-color-white pull-left g-my-10">
			<i class="fa fa-plus"></i>
			<i class="fa fa-minus"></i>
		</span>
		<span class="float-left text-left g-font-size-18 g-color-white g-mx-20">
			<span class="d-block g-font-size-14"><?php echo $raid['raid']; ?></span>
			<?php echo $raid['progression']; ?>
			<?php if($raid['us_rank']) { ?>
					<span class="ml-10">US #<?php echo $raid['us_rank']; ?></span>
			<?php } ?>
		</span>
	</a>
</div>
<div id="<?php echo $raidname; ?>-body" class="collapse <?php echo $collapse[1]; ?>" role="tabpanel" aria-labelledby="<?php echo $raidname; ?>-header">
	<div class="u-accordion__body g-brd-black g-brd-around g-brd-1 g-mx-5 g-pa-0 g-bg-white">
		<?php
			$sql = 'SELECT raid_id, boss_id, name, kill_order, DATE_FORMAT(heroic_kill,"%m/%d/%y") as heroic_kill, DATE_FORMAT(mythic_kill,"%m/%d/%y") as mythic_kill
							FROM stormguild.boss WHERE raid_id = '.$raid['raid_id'].' order by kill_order desc';
			$bosses = $db -> read_select($sql);
			foreach($bosses as $boss) {

				if ($raid['difficulty'] == 'MYTHIC') {
					if ($boss['mythic_kill'] > 0) {
						$date = $boss['mythic_kill'];
						$icon = 'fa-check-square-o g-color-primary';
					} else {
						$date = 'Alive';
						$icon = 'fa-square-o g-color-red';
					}
				} else if ($raid['difficulty'] == 'HEROIC') {
					if ($boss['heroic_kill'] > 0) {
						$date = $boss['heroic_kill'];
						$icon = 'fa-check-square-o g-color-primary';
					} else {
						$date = 'Alive';
						$icon = 'fa-square-o g-color-red';
					}
				} else if ($raid['difficulty'] == 'NONE') {
						$date = 'Alive';
						$icon = 'fa-square-o g-color-red';
				}

		?>
		<p class="g-my-0 g-mx-5">
			<span><i class="fa <?php echo $icon; ?> g-mr-10"></i><?php echo $boss['name']; ?></span>
			<span class="g-pos-abs g-right-10"><?php echo $date; ?></span>
		</p>
		<!-- <div class="row g-px-5">
			<div class="col-1 g-py-5"><i class="fa <?php echo $icon; ?> g-mr-5"></i></div>
			<div class="col-8"><?php echo $boss['name']; ?><br /><span class="g-ml-10"><?php echo $date; ?></span></div>
		</div> -->
		<?php } ?>
	</div>
</div>
<?php
	}
?>

</div>
