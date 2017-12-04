<div class="container g-mb-0" style="width:100%;background:url(assets/img/recruit.banner.jpg) no-repeat center; background-size: cover;">
	<div class="container text-center g-color-white bg-black-0-70 g-pa-30">
		<h2 class="text-uppercase g-font-weight-700 g-mb-20">Storm is Recruiting!</h2>
		<p class="lead g-px-100--md g-mb-20">Seeking the classes and specs outlined below but always interested in exceptional applicants.</p>
		<div class="row">
					<?php
						include_once 'library/class.database.php';
						$db = new database();
						$classes = $db -> read_select("SELECT DISTINCT class_name, lower(replace(class_name,' ','')) as class_path, class_color FROM stormguild.recruitment order by class_name asc");
						foreach($classes as $class) {
							echo '<div style="color:'.$class['class_color'].';text-transform: uppercase;" class="col-lg-3 col-xs-3 text-right g-pa-10 g-my-5"><strong>'.$class['class_name'].'</strong></div>';
							echo '<div class="col-lg-3 col-xs-3 g-my-5 text-left">';
							$specs = $db -> read_select("SELECT spec_name, lower(replace(spec_name,' ','')) as spec_path, is_active FROM stormguild.recruitment WHERE class_name ='".$class['class_name']."' order by spec_name asc");
							foreach($specs as $spec) {
								$imgPath = "assets/img/class/".$class['class_path']."/".$spec['spec_path'].".png";
								if($spec['is_active'] == TRUE) {
									$iconStatus = '<img src="'.$imgPath.'" style="height:30px;padding-right:2px;opacity:1.0;" title="'.$spec['spec_name'].' '.$class['class_name'].'" />';
								}else{
									$iconStatus = '<img src="'.$imgPath.'" style="height:30px;padding-right:2px;opacity:.5" title="'.$spec['spec_name'].' '.$class['class_name'].'" />';
								}
								echo $iconStatus;
							}
							echo "</div>";
						}
					?>
			</div>
		</div>
</div>
