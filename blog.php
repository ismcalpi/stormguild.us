<html lang="en">
  <?php include 'templates/home.head.php' ?>
  <body>
    <main style="background:rgba(255,255,255,0.01);">
      <div class="container g-py-10 p-px-5">
        <div class="row justify-content-center">
          <div class="col-12">
      <?php
      require($_SERVER['DOCUMENT_ROOT'] . '/blog/wp-load.php');
      $args = array('posts_per_page' => 5);  // add cat as option to limit to category
      $latest_posts = new WP_Query( $args );
      if ( $latest_posts->have_posts() ) {
        while ( $latest_posts->have_posts() ) {
          $latest_posts->the_post();
      ?>
      <article class="g-mb-15">
        <div class="g-mb-30">
          <a class="js-fancybox" href="<?php the_post_thumbnail_url(); ?>" data-fancybox-animate-in="zoomIn" data-fancybox-animate-out="zoomOut" data-fancybox-speed="1000" data-fancybox-bg="rgba(0,0,0, 1)">
            <img class="img-fluid w-100 g-mb-25" src="<?php the_post_thumbnail_url(); ?>" alt="Image Description">
          </a>
          <h2 class="h4 g-color-black g-font-weight-600 mb-3">
            <a target=_blank class="u-link-v5 g-color-black g-color-primary--hover" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <span class="d-block g-color-gray-dark-v4 g-font-size-12"><?php the_time('l jS F, Y') ?></span>
          </h2>
          <p class="g-color-gray-dark-v4 g-line-height-1_8"><?php the_excerpt(); ?></p>
          <a target=_blank class="g-font-size-13" href="<?php the_permalink(); ?>">Read more...</a>
        </div>
      </article>

      <hr class="u-divider-dashed g-brd-gray-light-v2 g-my-15">

      <?php }
        } else {
          echo '<p>There are no posts available</p>';
        }
      wp_reset_postdata();
      ?>
          </div>
        </div>
      </div>
    </main>
  <?php include 'templates/home.js.php' ?>
  </body>
</html>
