<article class="text-center g-color-white g-overflow-hidden g-rounded-top-5" >
     <div class="u-block g-min-height-100 g-flex-middle g-bg-cover g-bg-bluegray-opacity-0_3--after g-transition-0_5" style="background-image: url('assets/img/home.sales.jpg');">
        <div class="g-flex-middle-item g-pos-rel g-z-index-1 g-py-50 g-px-20 bg-black-0-70">
          <h4 class="text-uppercase">
            Loot & Achievement Sales!
          </h4>
          <ul class="u-list-inline">
            <li class="list-inline-item g-mb-10">
              <p><strong>Contact: </strong></p>
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
              <h5 class="h5 text-center g-color-white">
                <strong><u>WoW Progress Ranking</u></strong><br /> US Rank #<?php echo $json->area_rank; ?> Realm Rank #<?php echo $json->realm_rank; ?>
              </h5>
            </a>
      		</div>
          <a href="#" class="btn btn-xl u-btn-outline-black u-btn-content g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-mr-10 g-mb-15">
            <i class="fa fa-globe pull-left g-font-size-42 g-mr-15"></i>
            <span class="float-right text-left">
              <span class="d-block g-font-size-11">wowprogress ranking</span>
              US Rank #<?php echo $json->area_rank; ?> Realm Rank #<?php echo $json->realm_rank; ?>
            </span>
          </a>
        </div>
      </div>
  </article>
