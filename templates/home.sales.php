<article class="text-center g-color-white g-overflow-hidden g-rounded-top-5" >
     <div class="u-block g-min-height-100 g-flex-middle g-bg-cover g-bg-bluegray-opacity-0_3--after g-transition-0_5" style="background-image: url('assets/img/home.sales.jpg');">
        <div class="g-flex-middle-item g-pos-rel g-z-index-1 g-py-50 g-px-20 bg-black-0-70">
          <h4 class="text-uppercase">
            Loot & Achievement Sales!
          </h4>
          <ul class="u-list-inline">
            <li class="list-inline-item g-mb-10">
              <h5 class="h5 text-center text-uppercase">Contact: </h5>
            </li>
            <li class="list-inline-item g-mb-10">
              <a class="u-tags-v1 g-color-main g-brd-around g-brd-gray-light-v3 g-bg-gray-dark-v2--hover g-brd-gray-dark-v2--hover g-color-white--hover g-py-4 g-px-10" href="#">
                Aalistor#1455
              </a>
            </li>
            <li class="list-inline-item g-mb-10">
              <a class="u-tags-v1 g-color-main g-brd-around g-brd-gray-light-v3 g-bg-gray-dark-v2--hover g-brd-gray-dark-v2--hover g-color-white--hover g-py-4 g-px-10" href="#">
                Lokilok#1587
              </a>
            </li>
          </ul>

            <?php
          	$json = json_decode(file_get_contents('https://www.wowprogress.com/guild/us/stormrage/storm/json_rank'));
          	?>
      		<div class="g-pa-30 g-ma-0">
      			<a href='https://www.wowprogress.com/guild/us/stormrage/storm' target='_blank'>
              <h5 class="h5 g-pos-abs g-left-40 g-bottom-10">
                <strong><u>WoW Progress Ranking</u></strong><br /> US Rank #<?php echo $json->area_rank; ?> Realm Rank #<?php echo $json->realm_rank; ?>
              </h5>
            </a>
      		</div>
        </div>
      </div>
  </article>
