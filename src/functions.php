<?php

require_once( get_stylesheet_directory() . '/includes/union-station-tower-child-nav-menus-class.php');
require_once( get_stylesheet_directory() . '/includes/widgets/union-station-tower-child-widgets-class.php');
require_once( get_stylesheet_directory() . '/includes/customizer/union-station-tower-child-customizer-class.php');
require_once( get_stylesheet_directory() . '/includes/acf/union-station-tower-child-acf-class.php');
require_once( get_stylesheet_directory() . '/includes/union-station-tower-locations-cpt-class.php');

/**
 * Child Theme Nav Menus
 */

 if ( class_exists( 'UnionStationTower_Nav_Menus' ) ) {
   new UnionStationTower_Nav_Menus();
 }

/**
 * Child Theme Widgets
 */

if ( class_exists( 'UnionStationTower_Widgets' ) ) {
  new UnionStationTower_Widgets();
}

/**
 * Child Theme Customizer
 */

if ( class_exists( 'UnionStationTower_Customizer' ) ) {
  new UnionStationTower_Customizer();
}

/**
 * Child Theme ACF
 */

 if ( class_exists( 'UnionStationTower_ACF' ) ) {
   new UnionStationTower_ACF();
 }

/**
 * Locations CPT
 */

 if ( class_exists( 'UnionStationTower_Locations_CPT' ) ) {
   new UnionStationTower_Locations_CPT();
 }


 /**
 * Slideshow plugin settings
 */

 if ( class_exists( 'Torque_Slideshow' ) ) {
   add_filter( Torque_Slideshow::$USE_POST_SLIDESHOW_FILTER_HOOK, function() { return true; });

   if ( class_exists( 'Torque_Post_Slideshow_CPT' ) ) {
     add_filter( Torque_Post_Slideshow_CPT::$RELATIONSHIP_FIELD_FILTER_HOOK, function($field) {

       $field['post_type'] = array(
         0 => Torque_Floor_Plan_CPT::$floor_plan_labels['post_type_name'],
         1 => UnionStationTower_Locations_CPT::$locations_labels['post_type_name'],
       );

       $field['filters'] = array(
				 0 => 'post_type',
			 );

       return $field;
     });
   }
 }

 /**
 * Floor Plan Plugin Settings
 */

 if ( class_exists( 'Torque_Floor_Plan_CPT' ) ) {
   add_filter(Torque_Floor_Plan_CPT::$METABOXES_FILTER_HOOK, function($metaboxes) {
     unset($metaboxes['floor_number']);
     unset($metaboxes['rsf']);

     $metaboxes['floor_plan_images'] = array (
				'Images',
				array( Torque_Floor_Plan_CPT::$floor_plan_labels['post_type_name'] ),
				array(
					'name_prefix' => 'floor_plan_images',
          array(
						'type'     => 'wp_media',
						'context'  => 'post',
						'name'     => '[floor_plan]',
						'label'    => 'Floor Plan',
					),
					array(
						'type'     => 'wp_media',
						'context'  => 'post',
						'name'     => '[stacking_plan]',
						'label'    => 'Stacking Plan',
					),
          array(
						'type'     => 'wp_media',
						'context'  => 'post',
						'name'     => '[view]',
						'label'    => 'View',
					),
          array(
            'type'     => 'textarea',
            'context'  => 'post',
            'name'     => '[360]',
            'before_field' => '<br />Paste the embed code for a 360 tour below.',
            'label'    => '360',
          ),
				),
				'floor_plan_images'
			);

     remove_post_type_support( Torque_Floor_Plan_CPT::$floor_plan_labels['post_type_name'], 'excerpt' );
     remove_post_type_support( Torque_Floor_Plan_CPT::$floor_plan_labels['post_type_name'], 'thumbnail' );

     return $metaboxes;
   });
 }


/**
 * Admin settings
 */

 // remove menu items
 function torque_remove_menus(){

   //remove_menu_page( 'index.php' );                  //Dashboard
   //remove_menu_page( 'edit.php' );                   //Posts
   //remove_menu_page( 'upload.php' );                 //Media
   //remove_menu_page( 'edit.php?post_type=page' );    //Pages
   //remove_menu_page( 'edit-comments.php' );          //Comments
   //remove_menu_page( 'themes.php' );                 //Appearance
   //remove_menu_page( 'plugins.php' );                //Plugins
   //remove_menu_page( 'users.php' );                  //Users
   //remove_menu_page( 'tools.php' );                  //Tools
   //remove_menu_page( 'options-general.php' );        //Settings

 }
 add_action( 'admin_menu', 'torque_remove_menus' );




/**
 * Enqueues
 */

// enqueue child styles after parent styles, both style.css and main.css
// so child styles always get priority
add_action( 'wp_enqueue_scripts', 'torque_enqueue_child_styles' );
function torque_enqueue_child_styles() {

    $parent_style = 'parent-styles';
    $parent_main_style = 'torque-theme-styles';

    // make sure parent styles enqueued first
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( $parent_main_style, get_template_directory_uri() . '/bundles/main.css' );

    // enqueue child style
    wp_enqueue_style( 'union-station-tower-child-styles',
        get_stylesheet_directory_uri() . '/bundles/main.css',
        array( $parent_style, $parent_main_style ),
        wp_get_theme()->get('Version')
    );
}

// enqueue child scripts after parent script
add_action( 'wp_enqueue_scripts', 'torque_enqueue_child_scripts');
function torque_enqueue_child_scripts() {

    wp_enqueue_script( 'union-station-tower-child-script',
        get_stylesheet_directory_uri() . '/bundles/bundle.js',
        array( 'torque-theme-scripts' ), // depends on parent script
        wp_get_theme()->get('Version'),
        true       // put it in the footer
    );
}

/*
Add REST API endpoints
 */

include locate_template('parts/acf/modules/blog/blog-posts-endpoint.php');


add_shortcode( 'tq_homepage_animation', 'tq_homepage_animation_func' );

function tq_homepage_animation_func( $atts, $content = '' ) {
  $atts = shortcode_atts( array(

  ), $atts, 'tq_homepage_animation' );

  ob_start();

  ?>
  <div class="homepage-animation">
    <div class="homepage-animation-image homepage-animation-image-1" style="background-image: url(<?php echo get_stylesheet_directory_uri() . '/statics/images/homepage-animation-1.jpg'; ?>);"></div>
    <div class="homepage-animation-image homepage-animation-image-2" style="background-image: url(<?php echo get_stylesheet_directory_uri() . '/statics/images/homepage-animation-2.jpg'; ?>);"></div>
  </div>
  <?php

  return ob_get_clean();
}

?>
