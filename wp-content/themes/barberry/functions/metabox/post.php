<?php

$prefix = 'tdl_post_';

global $meta_boxes;

$pometa_boxes = array();

$pometa_boxes[] = array(
	'id' => 'sidebarsettings',
	'title' => __('Sidebar Settings', 'tdl_framework'),
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		

		array(
            'name' => __('Featured Image/Slider/Video on Single Post Page', 'tdl_framework'),
			'id' => $prefix . 'featured_image',
			'type' => 'checkbox',
			'desc' => __('Check this to show the featured image, slider or video at the beginning of the post on the single post page.', 'tdl_framework'),
			'std' => 1
		),
        
    )
);


$pometa_boxes[] = array(
	'id' => 'tdl-post-image',
	'title' => __('Image Settings', 'tdl_framework'),
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(	

			
        array(
			'name'  => __('Images', 'tdl_framework'),
			'desc' => __('Additional Images for your Gallery. Maximum 8 Images.', 'tdl_framework'),
			'id' => $prefix . 'gallery',
			'type' => 'plupload_image',
			'max_file_uploads' => 8,
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

$pometa_boxes[] = array(
	'id' => 'tdl-post-video',
	'title' => 'Video Settings',
	'pages' => array( 'post' ),
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


function tdl_post_register_meta_boxes() {

    global $pometa_boxes;
    
	if ( class_exists( 'RW_Meta_Box' ) ) {
	
        foreach ( $pometa_boxes as $pometa_box ) {
			new RW_Meta_Box( $pometa_box );
		}
    
	}

}

add_action( 'admin_init', 'tdl_post_register_meta_boxes' );

?>