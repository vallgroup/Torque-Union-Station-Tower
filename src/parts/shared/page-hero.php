<?php

$type = get_field('hero_type');

if (!$type) {
  $type = 'none';
}

$image = get_field('hero_image');
$slideshow = get_field('hero_slideshow');

$overlay_type = get_field('hero_overlay_type');
$text_overlay = get_field('hero_text_overlay');

?>

<div class="page-hero type-<?php echo $type; ?>">

  <?php if ($type === 'image' and $image) { ?>
    <div class="hero-image-size">
      <div class="hero-image" style="background-image: url(<?php echo $image; ?>);" ></div>
    </div>
  <?php } else if ($type === 'slideshow' and $slideshow) {
    echo do_shortcode($slideshow);
  } ?>

  <?php include locate_template('/parts/shared/hero-navigation.php'); ?>
</div>

<div class="page-hero-filler" ></div>
