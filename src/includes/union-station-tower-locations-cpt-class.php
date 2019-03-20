<?php
/**
 * Register the torque cpt and it's meta boxes
 */
class UnionStationTower_Locations_CPT {

	/**
	 * Holds the locations cpt object
	 *
	 * @var Object
	 */
	protected $locations = null;

	/**
	 * Holds the labels needed to build the locations custom post type.
	 *
	 * @var array
	 */
	public static $locations_labels = array(
			'singular'       => 'Location',
			'plural'         => 'Locations',
			'slug'           => 'torque-location',
			'post_type_name' => 'torque_location',
	);

	/**
	 * Holds options for the locations custom post type
	 *
	 * @var array
	 */
	protected $locations_options = array(
		'supports' => array(
			'title',
      'thumbnail'
		),
		'menu_icon'           => 'dashicons-editor-contract',
    'show_in_rest'        => true
	);

	/**
	 * register our post type and meta boxes
	 */
	function __construct() {
		if ( class_exists( 'PremiseCPT' ) ) {
			new PremiseCPT( self::$locations_labels, $this->locations_options );
		}

    if( function_exists('acf_add_local_field_group') ):

      acf_add_local_field_group(array(
      	'key' => 'group_5c92bc526e40d',
      	'title' => 'Location Fields',
      	'fields' => array(
      		array(
      			'key' => 'field_5c92bc5cf92f8',
      			'label' => 'Content',
      			'name' => 'content',
      			'type' => 'wysiwyg',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'tabs' => 'all',
      			'toolbar' => 'basic',
      			'media_upload' => 0,
      			'delay' => 0,
      		),
      	),
      	'location' => array(
      		array(
      			array(
      				'param' => 'post_type',
      				'operator' => '==',
      				'value' => 'torque_location',
      			),
      		),
      	),
      	'menu_order' => 0,
      	'position' => 'normal',
      	'style' => 'default',
      	'label_placement' => 'top',
      	'instruction_placement' => 'label',
      	'hide_on_screen' => '',
      	'active' => 1,
      	'description' => '',
      ));

      endif;
	}
}

?>
