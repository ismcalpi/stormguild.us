<article class="text-center g-color-white g-overflow-hidden g-rounded-top-5" >
     <div class="u-block g-min-height-100 g-flex-middle g-bg-cover g-bg-bluegray-opacity-0_3--after g-transition-0_5" style="background-image: url('assets/img/home.sales.jpg');">
        <div class="g-flex-middle-item g-pos-rel g-z-index-1 g-py-10 g-px-10 bg-black-0-70">
          <h4 class="text-uppercase">
            Loot & Achievement Sales!
          </h4>
          <ul class="u-list-inline">
            <li class="list-inline-item g-mb-10">
              <p><strong>Contact: </strong></p>
            </li>
            <li class="list-inline-item g-mb-10">
              <a class="u-tags-v1 g-color-blue g-brd-around g-brd-blue g-bg-blue-opacity-0_1 g-bg-blue--hover g-color-white--hover g-py-4 g-px-10" href="#">
                Aalistor#1455
              </a>
            </li>
            <li class="list-inline-item g-mb-10">
              <a class="u-tags-v1 g-color-blue g-brd-around g-brd-blue g-bg-blue-opacity-0_1 g-bg-blue--hover g-color-white--hover g-py-4 g-px-10" href="#">
                Lokilok#1587
              </a>
            </li>
          </ul>
          <?php
        	$json = json_decode(file_get_contents('https://www.wowprogress.com/guild/us/stormrage/storm/json_rank'));
        	?>
          <a  href="https://www.wowprogress.com/guild/us/stormrage/storm"
              class="btn btn-xl u-btn-bluegray u-btn-content g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-ma-5 g-pa-0">
            <i class="fa fa-globe pull-left g-font-size-25 g-my-10"></i>
            <span class="float-right text-left g-font-size-14">
              <span class="d-block g-font-size-11">wowprogress ranking</span>
              US Rank <?php echo $json->area_rank; ?> Realm Rank <?php echo $json->realm_rank; ?>
            </span>
          </a>
        </div>
      </div>
  </article>
