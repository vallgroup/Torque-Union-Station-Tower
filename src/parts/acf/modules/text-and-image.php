<div
  <?php if ($anchor) { ?> id="<?php echo $anchor; ?>" <?php } ?>
  class="row text-and-image-section">

  <div class="text-and-image-wrapper" >
    <div class="text-and-image-row <?php echo $order; ?>" >
  
      <div class="image-wrapper col-text-and-image" >
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
      </div>

      <div class="content-wrapper col-text-and-image" >
        <div class="content-inner">
          <?php if ($title) { ?>
              <h2><?php echo $title; ?></h2>
          <?php } ?>

          <?php if ($subtitle) { ?>
              <h3><?php echo $subtitle; ?></h3>
          <?php } ?>

          <?php if ($content) { ?>
            <div class="content"><?php echo $content; ?></div>
          <?php } ?>

        </div>
      </div>
    </div>
  </div>

</div>
