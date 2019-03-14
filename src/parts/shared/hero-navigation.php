<header
  id="header-style-2"
  class="torque-header hero-overlay">

  <div class="row torque-header-content-wrapper torque-navigation-toggle">

    <div class="torque-header-burger-menu-wrapper">
      <?php get_template_part( 'parts/elements/element', 'burger-menu-squeeze'); ?>
    </div>

    <div class="header-links-wrapper">
      <div class="torque-header-menu-items-inline-wrapper">
        <?php get_template_part( 'parts/shared/header-parts/menu-items/menu-items', 'inline'); ?>
      </div>
    </div>

  </div>

  <div class="torque-header-logo-wrapper">
    <?php get_template_part( 'parts/shared/logo', 'white' ); ?>
  </div>

  <div class="torque-navigation-toggle torque-header-menu-items-mobile">
    <?php get_template_part( 'parts/shared/header-parts/menu-items/menu-items', 'stacked'); ?>
  </div>

</header>