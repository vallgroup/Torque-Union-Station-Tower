<div
  <?php if ($anchor) { ?> id="<?php echo $anchor; ?>" <?php } ?>
  class="row blog-posts-section">

  <div id="blog-loop-entry">

    <?php

    $paged = 1;

    include locate_template('/parts/acf/modules/blog/blog-posts-query.php');

    ?>

  </div>

</div>
