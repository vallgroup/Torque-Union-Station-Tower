<h3>KEEP READING</h3>
<div class="sidebar-primary-container">
  <?php
    $args = array( 
      'numberposts' => '4',
      'post__not_in' => array( $post->ID )
    );
    $recent_posts = wp_get_recent_posts( $args );
    
    foreach( $recent_posts as $recent ){ 
      echo '<div class="col2-tablet col1-desktop recent-post-box">';
      if ( has_post_thumbnail( $recent["ID"]) ) {
        echo  '<a href="' . get_permalink($recent['ID']) . '">' . get_the_post_thumbnail($recent["ID"],'medium'). '</a>';
      }
      echo '<a href="' . get_permalink($recent['ID']) . '" class="recent-post-title">' .   $recent['post_title'].'</a>';
      echo '<div class="recent-post-excerpt">'. $recent['post_excerpt'] .'</div>';
      echo '<a href="'. get_permalink($recent['ID']).'" class="post-read-more">READ MORE</a>';
      echo '</div>';
    }
    wp_reset_query();
  ?>
</div>