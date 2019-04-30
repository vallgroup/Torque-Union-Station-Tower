<?php
  $img = get_the_post_thumbnail_url($post->ID, 'large');
  if ($img) {
?>
  <div class="post-thumbnail">
    <div style="background-image: url(<?php echo $img; ?>);"></div>
  </div>
<?php } ?>