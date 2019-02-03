<html lang="en">
  <?php
    include 'templates/home.head.php';
    Header("Cache-Control: must-revalidate");
    $offset = 60 * 60 * 24 * 1;
    $ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
    Header($ExpStr);
  ?>
  <body>
    <main style="background:rgba(255,255,255,0.01);">
      <div class="container g-py-10 p-px-5">
        <div class="row justify-content-center">
          <div class="col-12">
      <?php
      require($_SERVER['DOCUMENT_ROOT'] . '/blog/wp-load.php');
      global $post;
      $args = array('posts_per_page' => 5, 'order' => 'DESC', 'orderby' => 'date');  // add cat as option to limit to category
      $myposts = get_posts( $args );
        foreach ( $myposts as $post ) :
          setup_postdata( $post );
      ?>
      <article class="g-mb-15 g-pa-10 g-brd-around g-brd-gray-light-v4">
        <div class="g-ma-10 text-center">
          <a  target="_blank" href="<?php the_post_thumbnail_url('full'); ?>">
            <img  class="img-fluid w-100 g-mb-15"
                  src="<?php the_post_thumbnail_url('medium_large'); ?>"
                  style="max-height:364">
          </a>
          <h2 class="h4 g-color-black g-font-weight-600 mb-3">
            <a target=_blank class="u-link-v5 g-color-black g-color-primary--hover" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <span class="d-block g-color-gray-dark-v4 g-font-size-12"><?php the_time('l jS F, Y') ?></span>
          </h2>
          <p class="g-color-gray-dark-v4 g-line-height-1_8"><?php the_excerpt(); ?></p>
        </div>
      </article>

        <?php
        endforeach;
        wp_reset_postdata();
        ?>
          <a target=_blank style="text-align:center;" class="h3 g-color-blue text-center" href="https://www.stormguild.us/blog/">See older posts...</a>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
