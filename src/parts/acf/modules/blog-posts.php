<div
  <?php if ($anchor) { ?> id="<?php echo $anchor; ?>" <?php } ?>
  class="row blog-posts-section">
  <?php
    if ($number_rows >= 1) {
      $POSTS_PER_PAGE = $number_rows * 3;
    } else {
      $number_rows = 1;
    }

    $paged = 1;
    
  ?>

  <div id="blog-loop-entry" data-page="<?php echo $number_rows; ?>">

    <?php include locate_template('/parts/acf/modules/blog/blog-posts-query.php'); ?>

  </div>

</div>
