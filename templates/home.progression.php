<?php

	include_once 'library/class.database.php';
	$db = new database();

	$raids = $db -> read_select("SELECT raid_name,
							lower(replace(raid_name,' ','')) as raid_path,
							sum(case when status = 'alive' then 0 when status = 'dead' then 1 else 0 end) as killed_bosses,
							count(*) as total_bosses,
                            tier,
                            (select max(tier) from stormguild.progression where kill_date <> 'NULL') as max_tier
							FROM stormguild.progression
                            WHERE expansion = 'legion'
							group by raid_name desc order by tier desc");

	foreach($raids as $raid) {

        if($raid['tier'] == $raid['max_tier']) {
            $colClass = "collapse show";
            $colsClass = "";
        } else {
            $colClass = "collapse";
            $colsClass = "collapsed";
        }

		echo '<div class="col-lg-12 col-sm-12 g-pa-0 g-ma-0">
            <div id="'.$raid['raid_path'].'" class="u-accordion" role="tablist" aria-multiselectable="true">

                <div class="u-bg-overlay g-bg-black-gradient-opacity-v1--after g-pa-0 g-ma-0" role="tab">
                    <img style="max-height:60px;width:100%;" class="img-fluid" src="img/raid/'.$raid['raid_path'].'/main.jpg">
                </div>

			    <div id="'.$raid['raid_path'].'-head" class="g-pos-abs g-top-10 g-left-10 g-right-10">
                <a class="'.$colsClass.' d-block g-color-main g-text-underline--none--hover" href="#'.$raid['raid_path'].'-body"
                   data-toggle="collapse" data-parent="#'.$raid['raid_path'].'" aria-expanded="true" aria-controls="'.$raid['raid_path'].'-body">

                  <span class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-white text-center g-pa-10">
                    <i class="fa fa-plus"></i>
                    <i class="fa fa-minus"></i>
                  </span>

                  <span class="d-inline-block g-pl-10 g-top-10 g-left-10 g-color-white">
                    '.$raid['raid_name'].'
                  </span>

                  <span class="u-label g-bg-blue u-label--sm g-rounded-3 g-pos-abs g-top-5 g-right-10 g-pa-5">
			<span class="float-left u-label g-color-white">
			Mythic
			</span>
			<span class="float-right u-label u-label-default g-color-white">
			'.$raid['killed_bosses'].'/'.$raid['total_bosses'].'
			</span>
                  </span>

                </a>
              </div>
              <div id="'.$raid['raid_path'].'-body" class="'.$colClass.'" role="tabpanel" aria-labelledby="'.$raid['raid_path'].'-head">
                <div class="u-accordion__body g-bg-gray-light-v5 g-px-10 g-py-10">';

		$bosses = $db -> read_select("SELECT boss_name, lower(replace(boss_name,' ','')) as boss_path, status, date_format(kill_date, '%b %D, %Y') as kill_date
			FROM stormguild.progression where raid_name ='".$raid['raid_name']."' order by kill_order desc");

		foreach($bosses as $boss) {

			if ($boss['status'] == 'alive') {
				$iconKill = '<i class="fa fa-square-o g-color-red g-mt-5 g-mr-10"></i>';
			} else {
				$iconKill = '<i class="fa fa-check-square-o g-color-primary g-mt-5 g-mr-10"></i>';
			}

			echo '<p class="g-my-0">'
					.$iconKill.$boss['boss_name'].'<span class="g-pos-abs g-right-20">'.$boss['kill_date'].'</span>
				</p>';

		}

	echo '</div></div></div></div>';

	}

?>
