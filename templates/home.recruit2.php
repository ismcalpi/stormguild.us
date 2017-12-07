

<article class="text-center g-color-white g-overflow-hidden g-rounded-1" >
  <div class="u-block g-min-height-100 g-flex-middle g-bg-cover g-bg-bluegray-opacity-0_3--after g-transition-0_5" style="background-image: url('assets/img/home.recruit.jpg');">
    <div class="g-flex-middle-item g-pos-rel g-z-index-1 g-py-5 g-px-20 bg-black-0-70">
      <div class="row">
        <h2 class="h1 text-uppercase pull-left text-center col-8">Storm is Recruiting!</h2>
        <div class="col-4">
          <a class="btn btn-md u-btn-outline-white g-font-weight-600 g-font-size-11 text-uppercase g-my-10 text-center" href="recruit.php#application">Apply Now</a>
        </div>
      </div>
<?php
    include_once 'library/class.database.php';
    $db = new database;
  	$classes = $db -> read_select("SELECT DISTINCT class_name, lower(replace(class_name,' ','')) as class_path, class_color FROM stormguild.recruitment order by class_name asc");
?>
      <div class="row">
<?php
	foreach($classes as $class) {

		echo '<div style="color:'.$class['class_color'].';text-transform: uppercase;" class="col-3">'.$class['class_name'].'</div>';
?>
		    <div class="col-3 text-left">
<?php
		$specs = $db -> read_select("SELECT spec_name, lower(replace(spec_name,' ','')) as spec_path, is_active FROM stormguild.recruitment WHERE class_name ='".$class['class_name']."' order by spec_name asc");
		foreach($specs as $spec) {
			$imgPath = "assets/img/class/".$class['class_path']."/".$spec['spec_path'].".png";
			if($spec['is_active'] == TRUE) {
				$iconStatus = '<img src="'.$imgPath.'" style="height:25px;padding-right:2px;opacity:1.0;" title="'.$spec['spec_name'].' '.$class['class_name'].'" />';
			}else{
				$iconStatus = '<img src="'.$imgPath.'" style="height:25px;padding-right:2px;opacity:.45" title="'.$spec['spec_name'].' '.$class['class_name'].'" />';
			}
			echo $iconStatus;
		}
?>
		    </div>
<?php
	}
?>
	    </div>

    </div>
  </div>
</article>
