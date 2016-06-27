<?php

$prefix = 'tdl_slider_';

global $smeta_boxes;

$smeta_boxes = array();

$smeta_boxes[] = array(
	'id' => 'metabox',
	'title' => __( 'Slide Data', 'tdl_framework' ),
	'pages' => array( 'slider' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		
        array(
			'name' => __( 'Caption', 'tdl_framework' ),
			'desc' => __( 'Text to be shown as a Caption. HTML not supported.', 'tdl_framework' ),
			'id'   => $prefix . 'caption',
			'type' => 'textarea',
			'std'  => '',
			'cols' => '40',
			'rows' => '4',
		),
        array(
            'name' => __('Title & Caption Position', 'tdl_framework'),
			'id' => $prefix . 'caption_position',
			'type' => 'select',
			'options' => array(
				'left' => __('Left', 'tdl_framework'),
				'right' => __('Right', 'tdl_framework'),
				'center' => __('Center', 'tdl_framework'),
			),
			'std'	=> __( 'left', 'tdl_framework' ),
			'desc' => __('Select Title & Caption Position.', 'tdl_framework'),
		),		
		
        array(
			'name' => __( 'Title URL', 'tdl_framework' ),
			'id' => $prefix . 'button_url',
			'desc' => __( 'The Slide\'s Link Address. Include http://', 'tdl_framework' ),
			'type'  => 'text',
			'std' => 'http://',
            'size' => '100'
		),
        array(
            'name' => __('Header Content Color', 'tdl_framework'),
			'id' => $prefix . 'slide_style',
			'type' => 'select',
			'options' => array(
				'dark' => __('Dark', 'tdl_framework'),
				'light' => __('Light', 'tdl_framework'),
			),
			'std'	=> __( 'Dark', 'tdl_framework' ),
			'desc' => __('Select header content color. If your image is dark please select Light style.', 'tdl_framework'),
		),
        
    )
);

function tdl_slider_register_meta_boxes() {

    global $smeta_boxes;
    
	if ( class_exists( 'RW_Meta_Box' ) ) {
	
        foreach ( $smeta_boxes as $smeta_box ) {
			new RW_Meta_Box( $smeta_box );
		}
    
	}

}

add_action( 'admin_init', 'tdl_slider_register_meta_boxes' );

?>