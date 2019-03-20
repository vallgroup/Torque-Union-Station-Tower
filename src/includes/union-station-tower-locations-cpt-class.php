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
      'excerpt',
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
	}
}

?>
