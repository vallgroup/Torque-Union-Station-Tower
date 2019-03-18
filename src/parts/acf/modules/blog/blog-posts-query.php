<?php

$POSTS_PER_PAGE = 8;

$query = new WP_Query( array(
    'post_type'      => 'post',
    'paged'          => $paged,
    'posts_per_page' => $POSTS_PER_PAGE
));

if ( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post();

    include locate_template('/parts/acf/modules/blog/loop-blog.php');
  }
}

wp_reset_postdata();

// check if next page has posts
$query = new WP_Query( array(
    'paged'          => $paged + 1,
    'posts_per_page' => $POSTS_PER_PAGE
));

if ( $query->have_posts() ) {
  include locate_template('/parts/acf/modules/blog/load-more-button.php');
}

wp_reset_postdata();

?>
