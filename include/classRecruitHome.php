

<article class="text-center g-color-white g-overflow-hidden g-rounded-10" >
 	 <div class="u-block-hover--scale g-min-height-100 g-flex-middle g-bg-cover g-bg-bluegray-opacity-0_3--after g-transition-0_5" data-bg-img-src="img/1920x800/wow_index.jpg">
    	<div class="g-flex-middle-item g-pos-rel g-z-index-1 g-py-50 g-px-20 bg-black-0-70">
        	<h3 class="text-uppercase">
        		Storm is Recruiting!
        	</h3>

<?php
	
	$db = new db();	
	
	$classes = $db -> select("SELECT DISTINCT class_name, lower(replace(class_name,' ','')) as class_path, class_color FROM stormguild.recruitment order by class_name asc");

	echo '<div class="row">';
	
	foreach($classes as $class) {
		
		echo '<div style="color:'.$class['class_color'].';text-transform: uppercase;" class="col-lg-3 col-sm-auto">'.$class['class_name'].'</div>';

		echo '<div class="col-lg-3 col-sm-auto">';
		
		$specs = $db -> select("SELECT spec_name, lower(replace(spec_name,' ','')) as spec_path, is_active FROM stormguild.recruitment WHERE class_name ='".$class['class_name']."' order by spec_name asc");

		foreach($specs as $spec) {

			$imgPath = "img/class/".$class['class_path']."/".$spec['spec_path'].".png";
			
			if($spec['is_active'] == TRUE) {
				$iconStatus = '<img src="'.$imgPath.'" style="height:25px;padding-right:2px;opacity:1.0;" title="'.$spec['spec_name'].' '.$class['class_name'].'" />';
			}else{
				$iconStatus = '<img src="'.$imgPath.'" style="height:25px;padding-right:2px;opacity:.2" title="'.$spec['spec_name'].' '.$class['class_name'].'" />';
			}
			
			echo $iconStatus;
			
		}
		
		echo "</div>";
		
	}

	echo "</div>";
	
?>

			<a class="btn btn-md u-btn-outline-white g-font-weight-600 g-font-size-11 text-uppercase g-my-10" href="recruitment.php#application">
      			Apply Now
      		</a>
   		</div>
  	</div>
</article>
						
					