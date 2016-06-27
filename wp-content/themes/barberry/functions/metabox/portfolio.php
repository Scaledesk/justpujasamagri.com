<?php

$prefix = 'tdl_port_';

global $portmeta_boxes;

$portmeta_boxes = array();


$portmeta_boxes[] = array(
	'id' => 'portfoliodetails',
	'title' => __('Details', 'tdl_framework'),
	'pages' => array( 'portfolio' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
			
        array(
			'name' => __('Item Type', 'tdl_framework'),
			'id'   => $prefix . 'type',
			'type' => 'select',
			'options' => array(
				'pic' => __('Picture', 'tdl_framework'),
				'gallery' => __('Gallery', 'tdl_framework'),
				'video' => __('Video', 'tdl_framework')
			),
			'std'  => array( 'pic' ),
			'desc' => __('Select the Portfolio Item Type.', 'tdl_framework'),
		),

        array(
			'name' => __('Project Date', 'tdl_framework'),
			'id' => $prefix . 'date',
			'desc' => __('When the project was done?', 'tdl_framework'),
			'type'  => 'text',
			'std' => '',
            'size' => '50'
		),
        array(
			'name' => __('Client', 'tdl_framework'),
			'id' => $prefix . 'client',
			'desc' => __('For whom was the project completed', 'tdl_framework'),
			'type'  => 'text',
			'std' => '',
            'size' => '50'
		),
        array(
			'name' => __('Project URL', 'tdl_framework'),
			'id' => $prefix . 'url',
			'desc' => __('The Project\'s Link Address. Include http://', 'tdl_framework'),
			'type'  => 'text',
			'std' => 'http://',
            'size' => '100'
		)
        
    )
);


$portmeta_boxes[] = array(
	'id' => 'tdl-port-image',
	'title' => __('Image Settings', 'tdl_framework'),
	'pages' => array( 'portfolio' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(	

			
        array(
			'name'  => __('Images', 'tdl_framework'),
			'desc' => __('Additional Images for your Gallery. Maximum 8 Images.', 'tdl_framework'),
			'id' => $prefix . 'gallery',
			'type' => 'plupload_image',
			'max_file_uploads' => 12,
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
				
  
    )
);

$portmeta_boxes[] = array(
	'id' => 'tdl-port-video',
	'title' => __('Video Settings', 'tdl_framework'),
	'pages' => array( 'portfolio' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(	

			

        array(
			'name' => __('Video Embed Code', 'tdl_framework'),
			'desc' => __('Enter the direct URL to a YouTube or Vimeo video page.', 'tdl_framework'),
			'id'   => $prefix . 'video',
			'type' => 'textarea',
			'std'  => '',
			'cols' => '40',
			'rows' => '2',
		)
        
    )
);


function tdl_port_register_meta_boxes() {

    global $portmeta_boxes;
    
	if ( class_exists( 'RW_Meta_Box' ) ) {
	
        foreach ( $portmeta_boxes as $portmeta_box ) {
			new RW_Meta_Box( $portmeta_box );
		}
    
	}

}

add_action( 'admin_init', 'tdl_port_register_meta_boxes' );

?>