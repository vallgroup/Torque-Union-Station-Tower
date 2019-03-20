<?php

require_once( get_stylesheet_directory() . '/includes/union-station-tower-child-nav-menus-class.php');
require_once( get_stylesheet_directory() . '/includes/widgets/union-station-tower-child-widgets-class.php');
require_once( get_stylesheet_directory() . '/includes/customizer/union-station-tower-child-customizer-class.php');
require_once( get_stylesheet_directory() . '/includes/acf/union-station-tower-child-acf-class.php');

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

?>
