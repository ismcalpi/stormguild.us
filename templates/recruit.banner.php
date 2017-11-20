
<?php

	$db = new db();

	$classes = $db -> select("SELECT DISTINCT class_name, lower(replace(class_name,' ','')) as class_path, class_color FROM stormguild.recruitment order by class_name asc");

	foreach($classes as $class) {

		echo '<div style="color:'.$class['class_color'].';text-transform: uppercase;" class="col-lg-3 col-xs-3 text-right g-pa-10 g-my-5">'.$class['class_name'].'</div>';

		echo '<div class="col-lg-3 col-xs-3 g-my-5 text-left">';

		$specs = $db -> select("SELECT spec_name, lower(replace(spec_name,' ','')) as spec_path, is_active FROM stormguild.recruitment WHERE class_name ='".$class['class_name']."' order by spec_name asc");

		foreach($specs as $spec) {

			$imgPath = "img/class/".$class['class_path']."/".$spec['spec_path'].".png";

			if($spec['is_active'] == TRUE) {
				$iconStatus = '<img src="'.$imgPath.'" style="height:40px;padding-right:2px;opacity:1.0;" title="'.$spec['spec_name'].' '.$class['class_name'].'" />';
			}else{
				$iconStatus = '<img src="'.$imgPath.'" style="height:40px;padding-right:2px;opacity:.2" title="'.$spec['spec_name'].' '.$class['class_name'].'" />';
			}

			echo $iconStatus;

		}

		echo "</div>";

	}


?>
