<?php

$modules = 'modules';

if ( have_rows( $modules ) ):

  while ( have_rows( $modules ) ) : the_row();

    switch ( get_row_layout() ) {

      case 'intro_section' :

        $title = get_sub_field( 'title' );
        $description = get_sub_field( 'description' );

        include locate_template('/parts/acf/modules/intro-section.php');

        break;

      case 'image_with_text' :

        $image = get_sub_field( 'image' );
        $description = get_sub_field( 'description' );

        include locate_template('/parts/acf/modules/image-with-text.php');

        break;

      case 'content_section' :

        $align = get_sub_field( 'align' );
        $background = get_sub_field('background');
        $title = get_sub_field( 'title' );
        $body = get_sub_field( 'body' );
        $cta = get_sub_field('cta');

        include locate_template('/parts/acf/modules/content-section.php');

        break;

      case 'post_slideshow' :

        $slideshow_id = get_sub_field('slideshow_id');

        echo do_shortcode('[torque_slideshow id="'.$slideshow_id.'" type="post"]');

        break;

      case 'blog_posts' :

        $anchor = get_sub_field('anchor');
        $number_rows = get_sub_field( 'number_rows' );
        $show_button = get_sub_field( 'show_button_load_more_posts' );

        include locate_template('/parts/acf/modules/blog-posts.php');

        break;

      case 'text_and_image' :

        $anchor = get_sub_field('anchor');
        $order = get_sub_field( 'order' );
        $image = get_sub_field( 'image' );
        $title = get_sub_field( 'title' );
        $subtitle = get_sub_field( 'subtitle' );
        $content = get_sub_field( 'content' );

        include locate_template('/parts/acf/modules/text-and-image.php');

        break;

    }

  endwhile;
endif;

?>
