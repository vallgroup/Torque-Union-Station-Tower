<div class="loop-blog" >

  <div class="image-position">
    <a href="<?php the_permalink(); ?>">
      <div class="image-size" style="background-image: url(<?php echo get_the_post_thumbnail_url(null, 'medium'); ?>)">
      </div>
    </a>
  </div>

  <a href="<?php the_permalink(); ?>">
    <h2><?php the_title(); ?></h2>
  </a>

  <div class="excerpt" ><?php the_excerpt(); ?></div>

  <a href="<?php the_permalink(); ?>" >
    <button>Read More</button>
  </a>

</div>
