<?php

$prefix = 'tdl_page_';

global $pmeta_boxes;

$pmeta_boxes = array();


$pmeta_boxes[] = array(
	'id' => 'pageoptions',
	'title' => __('Page Options', 'tdl_framework'),
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		
        array(
            'name' => __('Sub Title', 'tdl_framework'),
			'id' => $prefix . 'caption',
			'desc' => __('Set your Page Sub Title to be displayed beside the Main Page Title (Excluding the homepage)', 'tdl_framework'),
			'type'  => 'text',
			'std' => '',
            'size' => '100'
		),
		
        array(
            'name' => __('Hide Title Area', 'tdl_framework'),
			'id' => $prefix . 'hidetitle',
			'type' => 'checkbox',
			'desc' => __('Check to Hide the Title Area from the Page', 'tdl_framework'),
			'std' => 0
		)		
      
    ),

);


$pmeta_boxes[] = array(
	'id' => 'sidebarsettings',
	'title' => __('Sidebar Settings', 'tdl_framework'),
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		

        array(
            'name' => __('Sidebar Position', 'tdl_framework'),
			'id' => $prefix . 'sidebar_position',
			'type' => 'select',
			'options' => array(
				'right' => __('Right Sidebar', 'tdl_framework'),
				'left' => __('Left Sidebar', 'tdl_framework'),
			),
			'std'  => array( 'right' ),
			'desc' => __('Select the position of the Sidebar on this page.', 'tdl_framework'),
		)
        
    ),
	'only_on'    => array(
		'template' => array( 'page-sidebar.php' )
	)
);



$pmeta_boxes[] = array(
	'id' => 'pageportfolio',
	'title' => __('Portfolio Settings', 'tdl_framework'),
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
        array(
			'name' => __('Portfolio Layout', 'tdl_framework'),
			'id'   => $prefix . 'portfolio',
			'type' => 'select',
			'options' => array(
				'span6' => __('2 Column', 'tdl_framework'),
				'span4' => __('3 Column', 'tdl_framework'),
				'span3' => __('4 Column', 'tdl_framework'),
			),
			'std'  => array( 'span4' ),
			'desc' => __('Select the Portfolio Layout Type', 'tdl_framework'),
		),
        array(
			'name' => __('Height', 'tdl_framework'),
			'id' => $prefix . 'height',
			'desc' => __('The Portfolio Thumbnails Height (in px). Just enter a number. Default:400', 'tdl_framework'),
			'type'  => 'text',
			'std' => '400',
            'size' => '10'
		),			
        array(
			'name' => __('Portfolio Categories', 'tdl_framework'),
			'id'   => $prefix . 'port_cats',
			'type'    => 'taxonomy',
			'options' => array(
				'taxonomy' => 'port-group',
				'type' => 'checkbox_list'
			),
			'desc' => __('Choose the Categories you want to display on this Portfolio Page. Do not check anything if you want to show items from all categories', 'tdl_framework'),
		)
        
    ),
	'only_on'    => array(
		'template' => array( 'template-portfolio.php' )
	)
);


$pmeta_boxes[] = array(
	'id' => 'pageportfolio',
	'title' => __('Portfolio Settings', 'tdl_framework'),
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
        array(
			'name' => __('Portfolio Layout', 'tdl_framework'),
			'id'   => $prefix . 'portfolio',
			'type' => 'select',
			'options' => array(
				'span6' => __('2 Column', 'tdl_framework'),
				'span4' => __('3 Column', 'tdl_framework'),
				'span3' => __('4 Column', 'tdl_framework'),
			),
			'std'  => array( 'span4' ),
			'desc' => __('Select the Portfolio Layout Type', 'tdl_framework'),
		),
        array(
			'name' => __('Height', 'tdl_framework'),
			'id' => $prefix . 'height',
			'desc' => __('The Portfolio Thumbnails Height (in px). Just enter a number. Default:400', 'tdl_framework'),
			'type'  => 'text',
			'std' => '400',
            'size' => '10'
		),		
        array(
            'name' => __('No. of Items', 'tdl_framework'),'No. of Items',
			'id' => $prefix . 'portfolio_itemcount',
			'desc' => __('Enter the No. of Items you want to show on this Portfolio Items Page. Enter a Number only. 0 - display all portfolio posts in page', 'tdl_framework'),
			'type'  => 'text',
			'std' => '0',
            'size' => '2'
		),
		
        array(
			'name' => __('Portfolio Categories', 'tdl_framework'),
			'id'   => $prefix . 'port_cats',
			'type'    => 'taxonomy',
			'options' => array(
				'taxonomy' => 'port-group',
				'type' => 'checkbox_list'
			),
			'desc' => __('Choose the Categories you want to display on this Portfolio Page. Do not check anything if you want to show items from all categories', 'tdl_framework'),
		)
        
    ),
	'only_on'    => array(
		'template' => array( 'template-portfolio-nofilter.php' )
	)
);



$pmeta_boxes[] = array(
	'id' => 'slidersettings',
	'title' => __('Slider Settings', 'tdl_framework'),
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		
        array(
			'name' => __( 'Slider Category', 'tdl_framework' ),
			'id'   => $prefix . 'lslider_category',
			'type'    => 'taxonomy',
			'options' => array(
				'taxonomy' => 'slider-group',
				'type' => 'select'
			),
			'desc' => __( 'Choose a Category for the Slider', 'tdl_framework' )
		),

        array(
            'name' => __( 'Slide Order', 'tdl_framework' ),
			'id' => $prefix . 'lslider_order',
            'type' => 'select',
			'options' => array(
				'ASC' => 'ASC',
				'DESC' => 'DESC'
			),
			'std'  => array( 'DESC' ),
			'desc' => __( 'Select the Slide Order. (Works on all Sliders except Layer Slider)', 'tdl_framework' )
		),
        array(
            'name' => __( 'Slide Order by', 'tdl_framework' ),
			'id' => $prefix . 'lslider_orderby',
            'type' => 'select',
			'options' => array(
				'ID' => 'ID',
				'title' => __( 'Title', 'tdl_framework' ),
				'date' => __( 'Date', 'tdl_framework' ),
				'rand' => __( 'Random', 'tdl_framework' ),
				'menu_order' => __( 'Menu Order', 'tdl_framework' )
			),
			'std'  => array( 'date' ),
			'desc' => __( 'Select the parameter by which you want the Slide Order. (Works on all Sliders except Layer Slider)', 'tdl_framework' )
		),		

		
		array(
            'name' => __('Slideshow', 'tdl_framework'),
			'id' => $prefix . 'slideshow',
			'type' => 'checkbox',
			'desc' => __('Animate slider automatically', 'tdl_framework'),
			'std' => 0
		),
		
        array(
            'name' => __('Slideshow Speed', 'tdl_framework'),
			'id' => $prefix . 'slideshowSpeed',
			'desc' => __('Set the speed of the slideshow cycling, in milliseconds', 'tdl_framework'),
			'type'  => 'text',
			'std' => '5000',
            'size' => '6'
		),	
		
		
        array(
            'name' => __('No. of slides', 'tdl_framework'),
			'id' => $prefix . 'lslider_items',
			'desc' => __('Enter No. of slides. By default: 6', 'tdl_framework'),
			'type'  => 'text',
			'std' => '6',
            'size' => '3'
		),	

       
    ),
	'only_on'    => array(
		'template' => array( 'template-home-fullslider.php' )
	)
);


$pmeta_boxes[] = array(
	'id' => 'contactsettings',
	'title' => __( 'Contact Page Settings', 'tdl_framework' ),
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		
        array(
            'name' => __( 'Show Map', 'tdl_framework' ),
			'id' => $prefix . 'contact_map',
			'type' => 'checkbox',
			'desc' => __( 'Check to show the Map on the Contact Page', 'tdl_framework' ),
			'std' => 1
		),
		
		
        array(
            'name' => __( 'Full-Width', 'tdl_framework' ),
			'id' => $prefix . 'fullwidth_map',
			'type' => 'checkbox',
			'desc' => __( 'Check to show the Map Full-width', 'tdl_framework' ),
			'std' => 0
		),
		
        array(
            'name' => __( 'Top padding', 'tdl_framework' ),
			'id' => $prefix . 'toppadding_map',
			'type' => 'checkbox',
			'desc' => __( 'Check to enable Top Padding for Map', 'tdl_framework' ),
			'std' => 0
		),
		
        array(
            'name' => __( 'Inner Shadows', 'tdl_framework' ),
			'id' => $prefix . 'shadows_map',
			'type' => 'checkbox',
			'desc' => __( 'Check to enable Inner Shadows for map', 'tdl_framework' ),
			'std' => 0
		),				
		
				
        array(
            'name' => __( 'Map Height', 'tdl_framework' ),
			'id' => $prefix . 'contact_mheight',
			'desc' => __( 'Enter the Height for the Map. Enter a Number', 'tdl_framework' ),
			'type'  => 'text',
			'std' => '400',
            'size' => '5'
		),
        array(
            'name' => __( 'Latitude', 'tdl_framework' ),
			'id' => $prefix . 'contact_latitude',
			'desc' => __( 'Enter the Latitude Value for the Map. Enter a Float Number', 'tdl_framework' ),
			'type'  => 'text',
			'std' => '',
            'size' => '20'
		),
        array(
            'name' => __( 'Longitude', 'tdl_framework' ),
			'id' => $prefix . 'contact_longitude',
			'desc' => __( 'Enter the Longitude Value for the Map. Enter a Float Number', 'tdl_framework' ),
			'type'  => 'text',
			'std' => '',
            'size' => '20'
		),
        array(
            'name' => __( 'Address', 'tdl_framework' ),
			'id' => $prefix . 'contact_address',
			'desc' => __( 'Enter the Address in 4-5 Words for the Map. Enter Text. If you use "Address" Option, then "Latitude" and "Longitude" Values will not be considered', 'tdl_framework' ),
			'type'  => 'text',
			'std' => '',
            'size' => '50'
		),
        array(
			'name' => __( 'Map Popup', 'tdl_framework' ),
			'desc' => __( 'Content to show in the Map Popup. HTML Supported', 'tdl_framework' ),
			'id'   => $prefix . 'contact_html',
			'type' => 'textarea',
			'cols' => '40',
			'rows' => '3'
		),
        array(
            'name' => __( 'Zoom', 'tdl_framework' ),
			'id' => $prefix . 'contact_zoom',
            'type' => 'select',
			'options' => array(
				1 => 1,
				2 => 2,
				3 => 3,
				4 => 4,
				5 => 5,
				6 => 6,
				7 => 7,
				8 => 8,
				9 => 9,
				10 => 10,
				11 => 11,
				12 => 12,
				13 => 13,
				14 => 14
			),
			'std'  => array( 12 ),
			'desc' => __( 'Select the amount of Zoom for the Map', 'tdl_framework' )
		),
        array(
            'name' => __( 'Map Type', 'tdl_framework' ),
			'id' => $prefix . 'contact_maptype',
            'type' => 'select',
			'options' => array(
				'HYBRID' => 'HYBRID',
				'ROADMAP' => 'ROADMAP',
				'SATELLITE' => 'SATELLITE',
				'TERRAIN' => 'TERRAIN'
			),
			'std'  => array( 'ROADMAP' ),
			'desc' => __( 'Select the Map Type', 'tdl_framework' )
		),
        array(
            'name' => __( 'Scrollwheel', 'tdl_framework' ),
			'id' => $prefix . 'contact_scrollwheel',
			'type' => 'checkbox',
			'desc' => __( 'Check to use Scrollwheel on the Map', 'tdl_framework' ),
			'std' => 0
		),
        array(
            'name' => __( 'Pan Control', 'tdl_framework' ),
			'id' => $prefix . 'contact_pancontrol',
			'type' => 'checkbox',
			'desc' => __( 'Check to use Pan Control on the Map', 'tdl_framework' ),
			'std' => 1
		),
        array(
            'name' => __( 'Zoom Control', 'tdl_framework' ),
			'id' => $prefix . 'contact_zoomcontrol',
			'type' => 'checkbox',
			'desc' => __( 'Check to use Zoom Control on the Map', 'tdl_framework' ),
			'std' => 1
		),
        array(
            'name' => __( 'MapType Control', 'tdl_framework' ),
			'id' => $prefix . 'contact_maptypecontrol',
			'type' => 'checkbox',
			'desc' => __( 'Check to use MapType Control on the Map', 'tdl_framework' ),
			'std' => 1
		),
        array(
            'name' => __( 'Scale Control', 'tdl_framework' ),
			'id' => $prefix . 'contact_scalecontrol',
			'type' => 'checkbox',
			'desc' => __( 'Check to use Scale Control on the Map', 'tdl_framework' ),
			'std' => 0
		),
        array(
            'name' => __( 'Street View Control', 'tdl_framework' ),
			'id' => $prefix . 'contact_streetviewcontrol',
			'type' => 'checkbox',
			'desc' => __( 'Check to use Street View Control on the Map', 'tdl_framework' ),
			'std' => 0
		),
        array(
            'name' => __( 'Overview Map Control', 'tdl_framework' ),
			'id' => $prefix . 'contact_overviewmapcontrol',
			'type' => 'checkbox',
			'desc' => __( 'Check to use Overview Map Control on the Map', 'tdl_framework' ),
			'std' => 0
		)
        
    ),
	'only_on'    => array(
		'template' => array( 'template-contact.php' )
	)
);



function tdl_page_register_meta_boxes() {

    global $pmeta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) ) {
		foreach ( $pmeta_boxes as $pmeta_box ) {
			if ( isset( $pmeta_box['only_on'] ) && ! rw_maybe_include( $pmeta_box['only_on'] ) ) {
				continue;
			}

			new RW_Meta_Box( $pmeta_box );
		}
	}

}

add_action( 'admin_init', 'tdl_page_register_meta_boxes' );


function rw_maybe_include( $conditions ) {
	// Include in back-end only
	if ( ! defined( 'WP_ADMIN' ) || ! WP_ADMIN ) {
		return false;
	}

	// Always include for ajax
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return true;
	}

	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	}
	elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	}
	else {
		$post_id = false;
	}

	$post_id = (int) $post_id;
	$post = get_post( $post_id );

	foreach ( $conditions as $cond => $v ) {
		// Catch non-arrays too
		if ( ! is_array( $v ) ) {
			$v = array( $v );
		}

		switch ( $cond ) {
			case 'id':
				if ( in_array( $post_id, $v ) ) {
					return true;
				}
			break;
			case 'parent':
				$post_parent = $post->post_parent;
				if ( in_array( $post_parent, $v ) ) {
					return true;
				}
			break;
			case 'slug':
				$post_slug = $post->post_name;
				if ( in_array( $post_slug, $v ) ) {
					return true;
				}
			break;
			case 'template':
				$template = get_post_meta( $post_id, '_wp_page_template', true );
				if ( in_array( $template, $v ) ) {
					return true;
				}
			break;
		}
	}

	// If no condition matched
	return false;
}


?>