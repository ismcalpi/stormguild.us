

<article class="text-center g-color-white g-overflow-hidden g-ma-0 g-pa-0" >
  <div class="u-block g-min-height-100 g-flex-middle g-bg-cover g-bg-bluegray-opacity-0_3--after g-transition-0_5" style="background-image: url('assets/img/home.recruit.jpg');background-size: cover;">
    <div class="g-flex-middle-item g-pos-rel g-z-index-1 g-py-5 g-px-20 bg-black-0-70">
      <h3 class="h5 text-uppercase text-center">Recruitment</h3>
<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/class/database.php';
    $db = new database;
  	$classes = $db -> readResults("SELECT DISTINCT class_name, lower(replace(class_name,' ','')) as class_path, class_color FROM stormguild.recruitment order by class_name asc");
?>
      <div class="row">
<?php
	foreach($classes as $class) {

		echo '<div style="color:'.$class['class_color'].';" class="col-6 text-right text-uppercase g-font-size-11">'.$class['class_name'].'</div>';
?>
		    <div class="col-6 text-left">
<?php
		$specs = $db -> readResults("SELECT spec_name, lower(replace(spec_name,' ','')) as spec_path, is_active FROM stormguild.recruitment WHERE class_name ='".$class['class_name']."' order by spec_name asc");
		foreach($specs as $spec) {
			$imgPath = "assets/img/class/".$class['class_path']."/".$spec['spec_path'].".png";
			if($spec['is_active'] == TRUE) {
				$iconStatus = '<img src="'.$imgPath.'" style="height:20px;padding-right:2px;opacity:1.0;" title="'.$spec['spec_name'].' '.$class['class_name'].'" />';
			}else{
				$iconStatus = '<img src="'.$imgPath.'" style="height:20px;padding-right:2px;opacity:.15" title="'.$spec['spec_name'].' '.$class['class_name'].'" />';
			}
			echo $iconStatus;
		}
?>
		    </div>
<?php
	}
?>
	    </div>
      <a class="btn btn-sm u-btn-outline-white g-font-weight-600 g-font-size-11 text-uppercase g-mx-20 g-my-10" href="recruit.php">Apply Now</a>
    </div>
  </div>
</article>
