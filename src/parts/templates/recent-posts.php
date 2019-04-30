<h4>KEEP READING</h4>
<div class="sidebar-primary-container row blog-posts-section">
  <?php  
    $POSTS_PER_PAGE = 4;
    $paged = 1;
    $show_button = false;
    $post_not_in = array( $post->ID );
    ?>

    <div id="blog-loop-entry" data-page="1">
      <?php include locate_template('/parts/acf/modules/blog/blog-posts-query.php'); ?>
    </div>
</div>