<article class="text-center g-color-white g-overflow-hidden g-rounded-top-5" >
     <div class="u-block g-min-height-100 g-flex-middle g-bg-cover g-bg-bluegray-opacity-0_3--after g-transition-0_5" style="background-image: url('assets/img/home.sales.jpg');">
        <div class="g-flex-middle-item g-pos-rel g-z-index-1 g-pt-25 g-pb-5 g-px-15 bg-black-0-70">
          <h4 class="text-uppercase">
            Loot & Achievement Sales!
          </h4>
          <ul class="u-list-inline">
            <li class="list-inline-item g-mb-10">
              <p><strong>Contact: </strong></p>
            </li>
            <li class="list-inline-item g-mb-10">
              <a class="u-tags-v1 g-color-white g-brd-around g-brd-white g-bg-white--hover g-color-black--hover g-py-4 g-px-10" href="#">
                Aalistor#1455
              </a>
            </li>
            <li class="list-inline-item g-mb-10">
              <a class="u-tags-v1 g-color-white g-brd-around g-brd-white g-bg-white--hover g-color-black--hover g-py-4 g-px-10" href="#">
                Lokilok#1587
              </a>
            </li>
          </ul>
          <?php
        	$json = json_decode(file_get_contents('https://www.wowprogress.com/guild/us/stormrage/storm/json_rank'));
        	?>
          <a  href="https://www.wowprogress.com/guild/us/stormrage/storm"
              class="btn btn-xl u-btn-bluegray u-btn-content g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-my-15 g-pa-5"
              target="_blank">
            <i class="fa fa-globe pull-left g-font-size-40 g-my-5"></i>
            <span class="float-right text-left g-font-size-16">
              <span class="d-block g-font-size-12">wowprogress ranking</span>
              US #<?php echo $json->area_rank; ?> Realm #<?php echo $json->realm_rank; ?>
            </span>
          </a>
        </div>
      </div>
  </article>
