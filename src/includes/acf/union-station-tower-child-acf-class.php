<?php

require_once( get_template_directory() . '/includes/acf/torque-acf-search-class.php' );

class UnionStationTower_ACF {

  public function __construct() {
    add_action('admin_init', array( $this, 'acf_admin_init'), 99);
    add_action('acf/init', array( $this, 'acf_init' ) );

    // hide acf in admin - client doesnt need to see this
    // add_filter('acf/settings/show_admin', '__return_false');

    // add acf fields to wp search
    if ( class_exists( 'Torque_ACF_Search' ) ) {
      add_filter( Torque_ACF_Search::$ACF_SEARCHABLE_FIELDS_FILTER_HANDLE, array( $this, 'add_fields_to_search' ) );
    }
  }

  public function acf_admin_init() {
    // hide options page
    // remove_menu_page('acf-options');
  }

  public function add_fields_to_search( $fields ) {
    // $fields[] = 'custom_field_name';
    return $fields;
  }

  public function acf_init() {
    // add content sections here


  if( function_exists('acf_add_local_field_group') ):

    /**
     * Page Hero
     */

    acf_add_local_field_group(array(
      'key' => 'group_5c82b305f208d',
      'title' => 'Page Hero',
      'fields' => array(
        array(
          'key' => 'field_5c82b318cae8c',
          'label' => 'Type',
          'name' => 'hero_type',
          'type' => 'radio',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'choices' => array(
            'none' => 'None',
            'image' => 'Image',
            'slideshow' => 'Slideshow',
          ),
          'allow_null' => 0,
          'other_choice' => 0,
          'default_value' => 'image',
          'layout' => 'horizontal',
          'return_format' => 'value',
          'save_other_choice' => 0,
        ),
        array(
          'key' => 'field_5c82b36acae8d',
          'label' => 'Image',
          'name' => 'hero_image',
          'type' => 'image',
          'instructions' => '',
          'required' => 1,
          'conditional_logic' => array(
            array(
              array(
                'field' => 'field_5c82b318cae8c',
                'operator' => '==',
                'value' => 'image',
              ),
            ),
          ),
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'return_format' => 'url',
          'preview_size' => 'medium',
          'library' => 'all',
          'min_width' => '',
          'min_height' => '',
          'min_size' => '',
          'max_width' => '',
          'max_height' => '',
          'max_size' => '',
          'mime_types' => '',
        ),
        array(
          'key' => 'field_5c82b384cae8e',
          'label' => 'Slideshow',
          'name' => 'hero_slideshow',
          'type' => 'text',
          'instructions' => 'Create a slideshow, then copy the \'shortcode\' into this field',
          'required' => 1,
          'conditional_logic' => array(
            array(
              array(
                'field' => 'field_5c82b318cae8c',
                'operator' => '==',
                'value' => 'slideshow',
              ),
            ),
          ),
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_5c82b745cae8f',
          'label' => 'Overlay Type',
          'name' => 'hero_overlay_type',
          'type' => 'radio',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => array(
            array(
              array(
                'field' => 'field_5c82b318cae8c',
                'operator' => '!=',
                'value' => 'none',
              ),
            ),
          ),
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'choices' => array(
            'none' => 'None',
            'text' => 'Text',
            'default' => 'Default',
          ),
          'allow_null' => 0,
          'other_choice' => 0,
          'default_value' => 'default',
          'layout' => 'horizontal',
          'return_format' => 'value',
          'save_other_choice' => 0,
        ),
        array(
          'key' => 'field_5c82b79acae91',
          'label' => 'Text Overlay',
          'name' => 'hero_text_overlay',
          'type' => 'text',
          'instructions' => 'use \'em\' tags to add use cursive font',
          'required' => 0,
          'conditional_logic' => array(
            array(
              array(
                'field' => 'field_5c82b745cae8f',
                'operator' => '==',
                'value' => 'text',
              ),
            ),
          ),
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => 'eg <em>Floor</em> Plans',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'page',
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

    /**
     * Modules
     */

     acf_add_local_field_group(array(
       'key' => 'group_5c82dae5a1e8a',
       'title' => 'Modules',
       'fields' => array(
         array(
           'key' => 'field_5c82daeb9e55f',
           'label' => 'Modules',
           'name' => 'modules',
           'type' => 'flexible_content',
           'instructions' => '',
           'required' => 0,
           'conditional_logic' => 0,
           'wrapper' => array(
             'width' => '',
             'class' => '',
             'id' => '',
           ),
           'layouts' => array(
             '5c92965f74a7d' => array(
      					'key' => '5c92965f74a7d',
      					'name' => 'post_slideshow',
      					'label' => 'Post Slideshow',
      					'display' => 'block',
      					'sub_fields' => array(
      						array(
      							'key' => 'field_5c9296ced452a',
      							'label' => 'Choose Slideshow',
      							'name' => 'slideshow_id',
                    'type' => 'post_object',
              			'instructions' => '',
              			'required' => 0,
              			'conditional_logic' => 0,
              			'wrapper' => array(
              				'width' => '',
              				'class' => '',
              				'id' => '',
              			),
              			'post_type' => array(
              				0 => 'torque_post_ss',
              			),
              			'taxonomy' => array(
              			),
              			'allow_null' => 0,
              			'multiple' => 0,
              			'return_format' => 'id',
              			'ui' => 1,
      						),
      					),
      					'min' => '',
      					'max' => '',
      				),
              '5c82db52e74ba' => array(
                'key' => '5c82db52e74ba',
                'name' => 'content_section',
                'label' => 'Content Section',
                'display' => 'block',
                'sub_fields' => array(
                  array(
                    'key' => 'field_5c82db9c9e560',
                    'label' => 'Align',
                    'name' => 'align',
                    'type' => 'radio',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'choices' => array(
                      'left' => 'Left',
                      'centre' => 'Centre',
                      'right' => 'Right',
                    ),
                    'allow_null' => 0,
                    'other_choice' => 0,
                    'default_value' => 'centre',
                    'layout' => 'horizontal',
                    'return_format' => 'value',
                    'save_other_choice' => 0,
                  ),
                  array(
                    'key' => 'field_5c82dbca9e561',
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                    'instructions' => 'use \'em\' tags for cursive font',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => 'eg <em>Floor</em> Plans',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                  ),
                  array(
                    'key' => 'field_5c82dbf79e562',
                    'label' => 'Body',
                    'name' => 'body',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'rows' => '',
                    'new_lines' => 'wpautop',
                  ),
                  array(
                    'key' => 'field_5c82dc139e563',
                    'label' => 'CTA',
                    'name' => 'cta',
                    'type' => 'link',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'return_format' => 'array',
                  ),
                  array(
                    'key' => 'field_5c82dc319e564',
                    'label' => 'Background',
                    'name' => 'background',
                    'type' => 'radio',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'choices' => array(
                      'none' => 'None',
                      'threes' => 'Threes',
                    ),
                    'allow_null' => 0,
                    'other_choice' => 0,
                    'default_value' => 'none',
                    'layout' => 'horizontal',
                    'return_format' => 'value',
                    'save_other_choice' => 0,
                  ),
                ),
                'min' => '',
                'max' => '',
              ),
              '5c8c260b25903' => array(
                'key' => '5c8c260b25903',
                'name' => 'intro_section',
                'label' => 'Intro Section',
                'display' => 'block',
                'sub_fields' => array(
                  array(
                    'key' => 'field_5c8c26bfa0b43',
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                  ),
                  array(
                    'key' => 'field_5c8c2703a0b44',
                    'label' => 'Description',
                    'name' => 'description',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'rows' => '',
                    'new_lines' => '',
                  ),
                ),
                'min' => '',
                'max' => '',
              ),
              '5c9ab158bf0cf' => array(
                'key' => '5c9ab158bf0cf',
                'name' => 'button',
                'label' => 'Button',
                'display' => 'block',
                'sub_fields' => array(
                  array(
                    'key' => 'field_5c9ab16466a23',
                    'label' => 'CTA',
                    'name' => 'cta',
                    'type' => 'link',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'return_format' => 'array',
                  ),
                ),
                'min' => '',
                'max' => '',
              ),
              'layout_5c8d3072ce530' => array(
                'key' => 'layout_5c8d3072ce530',
                'name' => 'image_with_text',
                'label' => 'Image with Text',
                'display' => 'block',
                'sub_fields' => array(
                  array(
                    'key' => 'field_5c8d3072ce531',
                    'label' => 'Image',
                    'name' => 'image',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'return_format' => 'url',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                  ),
                  array(
                    'key' => 'field_5c8d3072ce532',
                    'label' => 'Description',
                    'name' => 'description',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'rows' => '',
                    'new_lines' => '',
                  ),
                ),
                'min' => '',
                'max' => '',
              ),
              'layout_5c6736bdf85a4' => array(
                'key' => 'layout_5c6736bdf85a4',
                'name' => 'blog_posts',
                'label' => 'Blog Posts',
                'display' => 'block',
                'sub_fields' => array(
                  array(
                    'key' => 'field_5c6736c9f85a5',
                    'label' => 'Anchor',
                    'name' => 'anchor',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                  ),
                  array(
                    'key' => 'field_5c92709e9a798',
                    'label' => 'Number of Rows',
                    'name' => 'number_rows',
                    'type' => 'number',
                    'instructions' => 'Please type how many rows you want to show.  Every row has 3 posts on Desktop.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'default_value' => 1,
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'min' => 1,
                    'max' => '',
                    'step' => '',
                  ),
                  array(
                    'key' => 'field_5c9271139a799',
                    'label' => 'Show the Button to Load More Posts',
                    'name' => 'show_button_load_more_posts',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'message' => '',
                    'default_value' => 0,
                    'ui' => 1,
                    'ui_on_text' => '',
                    'ui_off_text' => '',
                  ),
                ),
                'min' => '',
                'max' => '',
              ),
              '5c6488d8017bf' => array(
                'key' => '5c6488d8017bf',
                'name' => 'text_and_image',
                'label' => 'Text and Image',
                'display' => 'row',
                'sub_fields' => array(
                  array(
                    'key' => 'field_5c64892f633d1',
                    'label' => 'Anchor',
                    'name' => 'anchor',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                  ),
                  array(
                    'key' => 'field_5c648940633d2',
                    'label' => 'Order',
                    'name' => 'order',
                    'type' => 'radio',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'choices' => array(
                      'image-text' => 'Image - Text',
                      'text-image' => 'Text - Image',
                    ),
                    'allow_null' => 0,
                    'other_choice' => 0,
                    'default_value' => 'image-text',
                    'layout' => 'horizontal',
                    'return_format' => 'value',
                    'save_other_choice' => 0,
                  ),
                  array(
                    'key' => 'field_5c648a5b633d5',
                    'label' => 'Image',
                    'name' => 'image',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                  ),
                  array(
                    'key' => 'field_5c648a74633d6',
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                  ),
                  array(
                    'key' => 'field_5c648ae1633d8',
                    'label' => 'Subtitle',
                    'name' => 'subtitle',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                  ),
                  array(
                    'key' => 'field_5c648a9e633d7',
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
                    'toolbar' => 'full',
                    'media_upload' => 0,
                    'delay' => 1,
                  ),
                ),
                'min' => '',
                'max' => '',
              ),
            ),
            'button_label' => 'Add Module',
            'min' => '',
            'max' => '',
         ),
       ),
       'location' => array(
         array(
           array(
             'param' => 'post_type',
             'operator' => '==',
             'value' => 'page',
           ),
         ),
       ),
       'menu_order' => 10,
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
