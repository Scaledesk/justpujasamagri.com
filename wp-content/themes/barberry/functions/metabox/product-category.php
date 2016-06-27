<?php
/**
 * Registering meta sections for taxonomies
 *
 * All the definitions of meta sections are listed below with comments, please read them carefully.
 * Note that each validation method of the Validation Class MUST return value.
 *
 * You also should read the changelog to know what has been changed
 *
 */

// Hook to 'admin_init' to make sure the class is loaded before
// (in case using the class in another plugin)
add_action( 'admin_init', 'barberry_register_taxonomy_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function barberry_register_taxonomy_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Taxonomy_Meta' ) )
		return;

	$meta_sections = array();

	// First meta section
	$meta_sections[] = array(
		'title'      => 'Category Banner',             // section title
		'taxonomies' => array('product_cat', 'post_tag'), // list of taxonomies. Default is array('category', 'post_tag'). Optional
		'id'         => 'banner',                 // ID of each section, will be the option name

		'fields' => array(                             // List of meta fields
		// SELECT
			array(
				'name'    => 'Banner Description Color',
				'desc'    => 'Select Banner Description Content Color',
				'id'      => 'color',
				'type'    => 'select',
				'size' => 'dark',
				'options' => array(                     // Array of value => label pairs for radio options
					'dark' => 'Dark',
					'light' => 'Light'
				),
			),
			
		// SELECT
			array(
				'name'    => 'Banner Description Position',
				'desc'    => 'Select Banner Description Position',
				'id'      => 'position',
				'type'    => 'select',
				'size' => 'right',
				'options' => array(  
					'right' => 'Right', 
					'left' => 'Left'
					
				),
			),
						
		// IMAGE
			array(
				'name' => 'Banner Image',
				'id'   => 'banner_image',
				'type' => 'image',
				'desc'    => 'Upload your image (png, jpg or gif)'
			),

		),
	);


	foreach ( $meta_sections as $meta_section )
	{
		new RW_Taxonomy_Meta( $meta_section );
	}
}
