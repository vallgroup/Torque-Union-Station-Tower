<?php if ($cta) { ?>
  <div class="row button-section">
      <div class="cta-wrapper" >
        <a href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target']; ?>">
          <button><?php echo $cta['title']; ?></button>
        </a>
      </div>
    </div>
  </div>
  <?php } ?>
