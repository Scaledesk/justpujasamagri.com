<?php


#-----------------------------------------------------------------
# Enqueue scripts
#-----------------------------------------------------------------

function enqueue_generator_scripts(){

	wp_enqueue_style('tinymce',get_template_directory_uri() . '/functions/tinymce/shortcode_generator/css/tinymce.css'); 
	wp_enqueue_style('chosen',get_template_directory_uri() . '/functions/tinymce/shortcode_generator/css/chosen/chosen.css'); 
	wp_enqueue_style('simple-slider',get_template_directory_uri() . '/functions/tinymce/shortcode_generator/css/simple_slider/simple-slider.css'); 
	wp_enqueue_style('simple-slider-volume',get_template_directory_uri() . '/functions/tinymce/shortcode_generator/css/simple_slider/simple-slider-volume.css'); 
	wp_enqueue_style('fonts',get_template_directory_uri() . '/css/fonts.css'); 
	
	wp_enqueue_script('chosen',get_template_directory_uri() . '/functions/tinymce/shortcode_generator/js/chosen/chosen.jquery.min.js','jquery','1.0 ', TRUE);
	wp_enqueue_script('simple-slider',get_template_directory_uri() . '/functions/tinymce/shortcode_generator/js/simple_slider/simple-slider.min.js','jquery','1.0 ', TRUE);
	
	wp_enqueue_style('magnific',get_template_directory_uri() . '/functions/tinymce/shortcode_generator/css/magnific-popup.css'); 
	wp_enqueue_script('magnific',get_template_directory_uri() . '/functions/tinymce/shortcode_generator/js/magnific-popup.js','jquery','0.9.7 ', TRUE);
	
	wp_enqueue_script('tdl-shortcode-generator-popup',get_template_directory_uri() . '/functions/tinymce/shortcode_generator/js/popup.js','jquery','0.9.7 ', TRUE);
	wp_enqueue_script('tdl-shortcode-generator',get_template_directory_uri() . '/functions/tinymce/tdl-shortcode-generator.js','jquery','0.9.7 ', TRUE);
	
}

add_action('admin_enqueue_scripts','enqueue_generator_scripts');



 
add_action('admin_footer','content_display');


function content_display(){
		
//Shortcodes Definitions
#-----------------------------------------------------------------
# Columns
#-----------------------------------------------------------------


$tdl_shortcodes['header_1'] = array( 
	'type'=>'heading', 
	'title'=>__('Columns', 'tdl_framework')
);

//Container
$tdl_shortcodes['container'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Container', 'tdl_framework' ), 
	'attr'=>array()
);

//Full-width
$tdl_shortcodes['full_width'] = array( 
	'type'=>'simple', 
	'title'=>__('Full-width (1)', 'tdl_framework' ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'checkbox', 'title'=>__('Boxed Column','tdl_framework')),
		'centered_text'=>array('type'=>'checkbox', 'title'=>__('Centered Text','tdl_framework')),
		'bg_color'=>array(
			'type'=>'text', 
			'title'=>'Background Color',
			'desc' => __('Sets the background color. Default: #ffffff', 'tdl_framework'),
		),		
		
		'image'=>array(
			'type'=>'custom',
			'title'  => __('Background Image','tdl_framework'),
			'desc' => __('Sets the an image background for your banner (URL). Set it to none for a transparent background.', 'tdl_framework'),
		),

		
		'h_padding'=>array(
			'type'=>'text', 
			'title'=>'Horizontal Padding',
			'std' => '0px',
			'desc' => __('Sets the horizontal padding (size in px or percentage). Default: 0px', 'tdl_framework'),
		),
		
		'v_padding'=>array(
			'type'=>'text', 
			'title'=>'Vertical Padding',
			'std' => '0px',
			'desc' => __('Sets the vertical padding (size in px or percentage). Default: 0px', 'tdl_framework'),
		)		
		
	)
);

//Half
$tdl_shortcodes['one_half'] = array( 
	'type'=>'checkbox', 
	'title'=>__('One Half (1/2)', 'tdl_framework' ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column','tdl_framework')),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text','tdl_framework')),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column','tdl_framework'), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', 'tdl_framework'))
	)
);


//Thirds
$tdl_shortcodes['one_third'] = array( 
	'type'=>'checkbox', 
	'title'=>__('One Third Column (1/3)', 'tdl_framework' ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column','tdl_framework')),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text','tdl_framework')),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column','tdl_framework'), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', 'tdl_framework'))
	)
);

$tdl_shortcodes['two_thirds'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Two Thirds Column (2/3)', 'tdl_framework' ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column','tdl_framework')),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text','tdl_framework')),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column','tdl_framework'), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', 'tdl_framework'))
	)
);


//Fourths
$tdl_shortcodes['one_fourth'] = array( 
	'type'=>'checkbox', 
	'title'=>__('One Fourth Column (1/4)', 'tdl_framework' ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column','tdl_framework')),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text','tdl_framework')),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column','tdl_framework'), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', 'tdl_framework'))
	)
);

$tdl_shortcodes['three_fourths'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Three Fourths Column (3/4)', 'tdl_framework' ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column','tdl_framework')),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text','tdl_framework')),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column','tdl_framework'), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', 'tdl_framework'))
	)
);

//Fifth
$tdl_shortcodes['one_fifth'] = array( 
	'type'=>'checkbox', 
	'title'=>__('One Fifth Column (1/5)', 'tdl_framework' ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column','tdl_framework')),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text','tdl_framework')),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column','tdl_framework'), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', 'tdl_framework'))
	)
);

$tdl_shortcodes['two_fifth'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Two Fifth Column (2/5)', 'tdl_framework' ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column','tdl_framework')),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text','tdl_framework')),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column','tdl_framework'), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', 'tdl_framework'))
	)
);

$tdl_shortcodes['three_fifth'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Three Fifth Column (3/5)', 'tdl_framework' ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column','tdl_framework')),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text','tdl_framework')),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column','tdl_framework'), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', 'tdl_framework'))
	)
);

$tdl_shortcodes['four_fifth'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Four Fifth Column (4/5)', 'tdl_framework' ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column','tdl_framework')),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text','tdl_framework')),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column','tdl_framework'), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', 'tdl_framework'))
	)
);


//Sixths
$tdl_shortcodes['one_sixth'] = array( 
	'type'=>'checkbox', 
	'title'=>__('One Sixth Column (1/6)', 'tdl_framework' ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column','tdl_framework')),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text','tdl_framework')),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column','tdl_framework'), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', 'tdl_framework'))
	)
);


$tdl_shortcodes['five_sixth'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Five Sixth Column (5/6)', 'tdl_framework' ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column','tdl_framework')),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text','tdl_framework')),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column','tdl_framework'), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', 'tdl_framework'))
	)
);




#-----------------------------------------------------------------
# Elements 
#-----------------------------------------------------------------

$tdl_shortcodes['header_6'] = array( 
	'type'=>'heading', 
	'title'=>__('Elements', 'tdl_framework' )
);


//Code
$tdl_shortcodes['code'] = array( 
	'type'=>'simple', 
	'title'=>__('Code', 'tdl_framework' ), 
	'attr'=>array()
);

//Banner
$tdl_shortcodes['banner'] = array( 
	'type'=>'regular', 
	'title'=>__('Banner', 'tdl_framework'), 
	'attr'=>array(
	
		'style'=>array(
				'type'=>'select', 
				'title'=> __('Content Color Style', 'tdl_framework'), 
				'desc' => __('Select Color of Content. Default: Dark', 'tdl_framework'),
				'values'=>array(
					'dark'=>'dark',
					'light'=>'light',
				),
			),
		
		'align'=>array(
				'type'=>'select', 
				'title'=> __('Title Align', 'tdl_framework'), 
				'desc' => __('Select align for titles.', 'tdl_framework'),
				'values'=>array(
					'center'=>'center',
					'left'=>'left',				
					'right'=>'right',
				),
			),
				
		'title'=>array(
			'type'=>'text', 
			'title'=>__('Title', 'tdl_framework'),
			
		),
		'subtitle'=>array(
			'type'=>'text', 
			'title'=>__('Sub Title', 'tdl_framework')
		),		
		'url'=>array(
			'type'=>'text', 
			'title'=>'Link URL'
		),
		
		'borders'=>array(
			'type'=>'checkbox',
			'std' => 'true',
			'title'=>__('Show borders?', 'tdl_framework')
		),
		
		'divider'=>array(
			'type'=>'checkbox',
			'std' => 'true',
			'title'=>__('Show divider?', 'tdl_framework')
		),		
		
		'bg_color'=>array(
			'type'=>'text', 
			'title'=>'Background Color',
			'desc' => __('Sets the background color. Default: #ffffff', 'tdl_framework'),
		),		
		
		'image'=>array(
			'type'=>'custom',
			'title'  => __('Background Image','tdl_framework'),
			'desc' => __('Sets the an image background for your banner (URL). Set it to none for a transparent background.', 'tdl_framework'),
		),

		
		'h_padding'=>array(
			'type'=>'text', 
			'title'=>'Horizontal Padding',
			'std' => '20px',
			'desc' => __('Sets the horizontal padding (size in px or percentage). Default: 20px', 'tdl_framework'),
		),
		
		'v_padding'=>array(
			'type'=>'text', 
			'title'=>'Vertical Padding',
			'std' => '20px',
			'desc' => __('Sets the vertical padding (size in px or percentage). Default: 20px', 'tdl_framework'),
		),	
		
	) 
);

//Heading
$tdl_shortcodes['heading'] = array( 
	'type'=>'simple', 
	'title'=>__('Heading', 'tdl_framework' ), 
	'attr'=>array( 
		'heading_size'=>array(
				'type'=>'select', 
				'title'=> __('Heading Size', 'tdl_framework'), 
				'values'=>array(
					'H1'=>'H1',
					'H2'=>'H2',				
					'H3'=>'H3',
					'H4'=>'H4',
				),
			),
			
		'heading_align'=>array(
				'type'=>'select', 
				'title'=> __('Heading Align', 'tdl_framework'), 
				'values'=>array(
					'left'=>'left',
					'center'=>'center',				
					'right'=>'right',
				),
			),
			
		'heading_style'=>array(
				'type'=>'select', 
				'title'=> __('Heading Style', 'tdl_framework'), 
				'values'=>array(
					'none'=>'none',
					'border_bottom'=>'border_bottom',
					'bold_title'=>'bold_title',				
				),
			),						
	
		'heading_weight'=>array(
		'type'=>'checkbox',
		'title'=>__('Bold Heading Weight?', 'tdl_framework')
		), 
		
		'v_padding'=>array(
			'type'=>'text', 
			'title'=>'Vertical Padding',
			'std' => '15px',
			'desc' => __('Sets the vertical padding (size in px or percentage). Default: 15px', 'tdl_framework'),
		),
	)
);

//Blockquote
$tdl_shortcodes['blockquote'] = array( 
	'type'=>'simple', 
	'title'=>__('Blockquote', 'tdl_framework' ), 
	'attr'=>array( 
			
        'align' => array(
			'type' => 'select',
			'title' => __('Align', 'tdl_framework'),
			'desc' => __('Select the Blockquote Alignment', 'tdl_framework'),
			'values' => array(
				'' => 'none',
				'left' => 'left',
				'right' => 'right'
			)
		),			
			
		'style'=>array(
				'type'=>'select', 
				'title'=> __('Blockquote Style', 'tdl_framework'), 
				'desc' => __('Select the Blockquote Style', 'tdl_framework'),
				'values'=>array(
					''=>'normal',
					'quote'=>'quote',			
				),
			),						

		'author'=>array(
			'type'=>'text', 
			'title' => __('Author', 'tdl_framework'),
			'desc' => __('The Author of the Blockquote. Optional', 'tdl_framework'),
		),
	)
);

//Divider
$tdl_shortcodes['divider'] = array( 
	'type'=>'regular', 
	'title'=>__('Divider', 'tdl_framework' ), 
	'attr'=>array( 
		'line'=>array(
		'type'=>'checkbox',
		'title'=>__('Show line?', 'tdl_framework')
		),
		
		'top_space'=>array(
			'type'=>'text', 
			'title'=>'Top Space',
			'std' => '15px',
			'desc' => __('Sets the top margin (size in px).', 'tdl_framework'),
		),
		'bottom_space'=>array(
			'type'=>'text', 
			'title'=>'Bottom Space',
			'std' => '15px',
			'desc' => __('Sets the bottom margin (size in px).', 'tdl_framework'),
		),

	)
);

//Button
$tdl_shortcodes['button'] = array( 
	'type'=>'radios', 
	'title'=>__('Button', 'tdl_framework'), 
	'attr'=>array(
		'size'=>array(
			'type'=>'radio', 
			'title'=>__('Size', 'tdl_framework'), 
			'opt'=>array(
				'small'=>'Small',
				'medium'=>'Medium',
				'large'=>'Large'
			)
		),
		'url'=>array(
			'type'=>'text', 
			'title'=>'Link URL'
		),
		'text'=>array(
			'type'=>'text', 
			'title'=>__('Text', 'tdl_framework')
		)
	) 
);


//Icon
$tdl_shortcodes['icon'] = array( 
	'type'=>'regular', 
	'title'=>__('Icon', 'tdl_framework'), 
	'attr'=>array(
		'size'=>array(
			'type'=>'radio', 
			'title'=>__('Icon Size', 'tdl_framework'), 
			'desc' => __('Tiny is recommended to be used inline with regular text. <br/> Small is recommended to be used inline right before heading text. <br> Large is recommended to be used at the top of columns.', 'tdl_framework'),
			'opt'=>array(
				'tiny'=>'Tiny',
				'small'=>'Small',
				'large'=>'Large'
			)
		),
		
		'style'=>array(
				'type'=>'select', 
				'title'=> __('Icon Style', 'tdl_framework'), 
				'values'=>array(
					'style1'=>'style1',
					'style2'=>'style2',
					'style3'=>'style3',
					'style4'=>'style4',				
				),
			),
			
		'url'=>array(
			'type'=>'text', 
			'title'=>'Link URL'
		),			
					
		'icons' => array(
			'type'=>'icons', 
			'title'=>'Icon', 
			'values'=> array(
			  'icon-music' => 'icon-music',
			  'icon-search' => 'icon-search',
			  'icon-envelope' => 'icon-envelope',
			  'icon-heart' => 'icon-heart',
			  'icon-star' => 'icon-star',
			  'icon-star-empty' => 'icon-star-empty',
			  'icon-user' => 'icon-user',
			  'icon-film' => 'icon-film',
			  'icon-th-large' => 'icon-th-large',
			  'icon-th' => 'icon-th',
			  'icon-th-list' => 'icon-th-list',
			  'icon-ok' => 'icon-ok',
			  'icon-remove' => 'icon-remove',
			  'icon-zoom-in' => 'icon-zoom-in',
			  'icon-zoom-out' => 'icon-zoom-out',
			  'icon-off' => 'icon-off',
			  'icon-signal' => 'icon-signal',
			  'icon-cog' => 'icon-cog',
			  'icon-trash' => 'icon-trash',
			  'icon-home' => 'icon-home',
			  'icon-file' => 'icon-file',
			  'icon-time' => 'icon-time',
			  'icon-road' => 'icon-road',
			  'icon-download-alt' => 'icon-download-alt',
			  'icon-download' => 'icon-download',
			  'icon-upload' => 'icon-upload',
			  'icon-inbox' => 'icon-inbox',
			  'icon-play-circle' => 'icon-play-circle',
			  'icon-repeat' => 'icon-repeat',
			  'icon-refresh' => 'icon-refresh',
			  'icon-list-alt' => 'icon-list-alt',
			  'icon-lock' => 'icon-lock',
			  'icon-flag' => 'icon-flag',
			  'icon-headphones' => 'icon-headphones',
			  'icon-volume-off' => 'icon-volume-off',
			  'icon-volume-down' => 'icon-volume-down',
			  'icon-volume-up' => 'icon-volume-up',
			  'icon-qrcode' => 'icon-qrcode',
			  'icon-barcode' => 'icon-barcode',
			  'icon-tag' => 'icon-tag',
			  'icon-tags' => 'icon-tags',
			  'icon-book' => 'icon-book',
			  'icon-bookmark' => 'icon-bookmark',
			  'icon-print' => 'icon-print',
			  'icon-camera' => 'icon-camera',
			  'icon-font' => 'icon-font',
			  'icon-bold' => 'icon-bold',
			  'icon-italic' => 'icon-italic',
			  'icon-text-height' => 'icon-text-height',
			  'icon-text-width' => 'icon-text-width',
			  'icon-align-left' => 'icon-align-left',
			  'icon-align-center' => 'icon-align-center',
			  'icon-align-right' => 'icon-align-right',
			  'icon-align-justify' => 'icon-align-justify',
			  'icon-list' => 'icon-list',
			  'icon-indent-left' => 'icon-indent-left',
			  'icon-indent-right' => 'icon-indent-right',
			  'icon-facetime-video' => 'icon-facetime-video',
			  'icon-picture' => 'icon-picture',
			  'icon-pencil' => 'icon-pencil',
			  'icon-map-marker' => 'icon-map-marker',
			  'icon-adjust' => 'icon-adjust',
			  'icon-tint' => 'icon-tint',
			  'icon-edit' => 'icon-edit',
			  'icon-share' => 'icon-share',
			  'icon-check' => 'icon-check',
			  'icon-move' => 'icon-move',
			  'icon-step-backward' => 'icon-step-backward',
			  'icon-fast-backward' => 'icon-fast-backward',
			  'icon-backward' => 'icon-backward',
			  'icon-play' => 'icon-play',
			  'icon-pause' => 'icon-pause',
			  'icon-stop' => 'icon-stop',
			  'icon-forward' => 'icon-forward',
			  'icon-fast-forward' => 'icon-fast-forward',
			  'icon-step-forward' => 'icon-step-forward',
			  'icon-eject' => 'icon-eject',
			  'icon-chevron-left' => 'icon-chevron-left',
			  'icon-chevron-right' => 'icon-chevron-right',
			  'icon-plus-sign' => 'icon-plus-sign',
			  'icon-minus-sign' => 'icon-minus-sign',
			  'icon-remove-sign' => 'icon-remove-sign',
			  'icon-ok-sign' => 'icon-ok-sign',
			  'icon-question-sign' => 'icon-question-sign',
			  'icon-info-sign' => 'icon-info-sign',
			  'icon-screenshot' => 'icon-screenshot',
			  'icon-remove-circle' => 'icon-remove-circle',
			  'icon-ok-circle' => 'icon-ok-circle',
			  'icon-ban-circle' => 'icon-ban-circle',
			  'icon-arrow-left' => 'icon-arrow-left',
			  'icon-arrow-right' => 'icon-arrow-right',
			  'icon-arrow-up' => 'icon-arrow-up',
			  'icon-arrow-down' => 'icon-arrow-down',
			  'icon-share-alt' => 'icon-share-alt',
			  'icon-resize-full' => 'icon-resize-full',
			  'icon-resize-small' => 'icon-resize-small',
			  'icon-plus' => 'icon-plus',
			  'icon-minus' => 'icon-minus',
			  'icon-asterisk' => 'icon-asterisk',
			  'icon-exclamation-sign' => 'icon-exclamation-sign',
			  'icon-gift' => 'icon-gift',
			  'icon-leaf' => 'icon-leaf',
			  'icon-fire' => 'icon-fire',
			  'icon-eye-open' => 'icon-eye-open',
			  'icon-eye-close' => 'icon-eye-close',
			  'icon-warning-sign' => 'icon-warning-sign',
			  'icon-plane' => 'icon-plane',
			  'icon-calendar' => 'icon-calendar',
			  'icon-random' => 'icon-random',
			  'icon-comment' => 'icon-comment',
			  'icon-magnet' => 'icon-magnet',
			  'icon-chevron-up' => 'icon-chevron-up',
			  'icon-chevron-down' => 'icon-chevron-down',
			  'icon-retweet' => 'icon-retweet',
			  'icon-shopping-cart' => 'icon-shopping-cart',
			  'icon-folder-close' => 'icon-folder-close',
			  'icon-folder-open' => 'icon-folder-open',
			  'icon-resize-vertical' => 'icon-resize-vertical',
			  'icon-resize-horizontal' => 'icon-resize-horizontal',
			  'icon-bar-chart' => 'icon-bar-chart',
			  'icon-twitter-sign' => 'icon-twitter-sign',
			  'icon-facebook-sign' => 'icon-facebook-sign',
			  'icon-camera-retro' => 'icon-camera-retro',
			  'icon-key' => 'icon-key',
			  'icon-cogs' => 'icon-cogs',
			  'icon-comments' => 'icon-comments',
			  'icon-thumbs-up' => 'icon-thumbs-up',
			  'icon-thumbs-down' => 'icon-thumbs-down',
			  'icon-star-half' => 'icon-star-half',
			  'icon-heart-empty' => 'icon-heart-empty',
			  'icon-signout' => 'icon-signout',
			  'icon-linkedin-sign' => 'icon-linkedin-sign',
			  'icon-pushpin' => 'icon-pushpin',
			  'icon-external-link' => 'icon-external-link',
			  'icon-signin' => 'icon-signin',
			  'icon-trophy' => 'icon-trophy',
			  'icon-github-sign' => 'icon-github-sign',
			  'icon-upload-alt' => 'icon-upload-alt',
			  'icon-lemon' => 'icon-lemon',
			  'icon-phone' => 'icon-phone',
			  'icon-check-empty' => 'icon-check-empty',
			  'icon-bookmark-empty' => 'icon-bookmark-empty',
			  'icon-phone-sign' => 'icon-phone-sign',
			  'icon-twitter' => 'icon-twitter',
			  'icon-facebook' => 'icon-facebook',
			  'icon-github' => 'icon-github',
			  'icon-unlock' => 'icon-unlock',
			  'icon-credit-card' => 'icon-credit-card',
			  'icon-rss' => 'icon-rss',
			  'icon-hdd' => 'icon-hdd',
			  'icon-bullhorn' => 'icon-bullhorn',
			  'icon-bell' => 'icon-bell',
			  'icon-certificate' => 'icon-certificate',
			  'icon-hand-right' => 'icon-hand-right',
			  'icon-hand-left' => 'icon-hand-left',
			  'icon-hand-up' => 'icon-hand-up',
			  'icon-hand-down' => 'icon-hand-down',
			  'icon-circle-arrow-left' => 'icon-circle-arrow-left',
			  'icon-circle-arrow-right' => 'icon-circle-arrow-right',
			  'icon-circle-arrow-up' => 'icon-circle-arrow-up',
			  'icon-circle-arrow-down' => 'icon-circle-arrow-down',
			  'icon-globe' => 'icon-globe',
			  'icon-wrench' => 'icon-wrench',
			  'icon-tasks' => 'icon-tasks',
			  'icon-filter' => 'icon-filter',
			  'icon-briefcase' => 'icon-briefcase',
			  'icon-fullscreen' => 'icon-fullscreen',
			  'icon-group' => 'icon-group',
			  'icon-link' => 'icon-link',
			  'icon-cloud' => 'icon-cloud',
			  'icon-beaker' => 'icon-beaker',
			  'icon-cut' => 'icon-cut',
			  'icon-copy' => 'icon-copy',
			  'icon-paper-clip' => 'icon-paper-clip',
			  'icon-save' => 'icon-save',
			  'icon-sign-blank' => 'icon-sign-blank',
			  'icon-reorder' => 'icon-reorder',
			  'icon-list-ul' => 'icon-list-ul',
			  'icon-list-ol' => 'icon-list-ol',
			  'icon-strikethrough' => 'icon-strikethrough',
			  'icon-underline' => 'icon-underline',
			  'icon-table' => 'icon-table',
			  'icon-magic' => 'icon-magic',
			  'icon-truck' => 'icon-truck',
			  'icon-pinterest' => 'icon-pinterest',
			  'icon-pinterest-sign' => 'icon-pinterest-sign',
			  'icon-google-plus-sign' => 'icon-google-plus-sign',
			  'icon-google-plus' => 'icon-google-plus',
			  'icon-money' => 'icon-money',
			  'icon-caret-down' => 'icon-caret-down',
			  'icon-caret-up' => 'icon-caret-up',
			  'icon-caret-left' => 'icon-caret-left',
			  'icon-caret-right' => 'icon-caret-right',
			  'icon-columns' => 'icon-columns',
			  'icon-sort' => 'icon-sort',
			  'icon-sort-down' => 'icon-sort-down',
			  'icon-sort-up' => 'icon-sort-up',
			  'icon-envelope-alt' => 'icon-envelope-alt',
			  'icon-linkedin' => 'icon-linkedin',
			  'icon-undo' => 'icon-undo',
			  'icon-legal' => 'icon-legal',
			  'icon-dashboard' => 'icon-dashboard',
			  'icon-comment-alt' => 'icon-comment-alt',
			  'icon-comments-alt' => 'icon-comments-alt',
			  'icon-bolt' => 'icon-bolt',
			  'icon-sitemap' => 'icon-sitemap',
			  'icon-umbrella' => 'icon-umbrella',
			  'icon-paste' => 'icon-paste',
			  'icon-lightbulb' => 'icon-lightbulb',
			  'icon-exchange' => 'icon-exchange',
			  'icon-cloud-download' => 'icon-cloud-download',
			  'icon-cloud-upload' => 'icon-cloud-upload',
			  'icon-user-md' => 'icon-user-md',
			  'icon-stethoscope' => 'icon-stethoscope',
			  'icon-suitcase' => 'icon-suitcase',
			  'icon-bell-alt' => 'icon-bell-alt',
			  'icon-coffee' => 'icon-coffee',
			  'icon-food' => 'icon-food',
			  'icon-file-alt' => 'icon-file-alt',
			  'icon-building' => 'icon-building',
			  'icon-hospital' => 'icon-hospital',
			  'icon-ambulance' => 'icon-ambulance',
			  'icon-medkit' => 'icon-medkit',
			  'icon-fighter-jet' => 'icon-fighter-jet',
			  'icon-beer' => 'icon-beer',
			  'icon-h-sign' => 'icon-h-sign',
			  'icon-double-angle-left' => 'icon-double-angle-left',
			  'icon-double-angle-right' => 'icon-double-angle-right',
			  'icon-double-angle-up' => 'icon-double-angle-up',
			  'icon-double-angle-down' => 'icon-double-angle-down',
			  'icon-angle-left' => 'icon-angle-left',
			  'icon-angle-right' => 'icon-angle-right',
			  'icon-angle-up' => 'icon-angle-up',
			  'icon-angle-down' => 'icon-angle-down',
			  'icon-desktop' => 'icon-desktop',
			  'icon-laptop' => 'icon-laptop',
			  'icon-tablet' => 'icon-tablet',
			  'icon-circle-blank' => 'icon-circle-blank',
			  'icon-quote-left' => 'icon-quote-left',
			  'icon-quote-right' => 'icon-quote-right',
			  'icon-spinner' => 'icon-spinner',
			  'icon-circle' => 'icon-circle',
			  'icon-reply' => 'icon-reply',
			  'icon-github-alt' => 'icon-github-alt',
			  'icon-folder-close-alt' => 'icon-folder-close-alt',
			  'icon-folder-open-alt' => 'icon-folder-open-alt'
			)
		)
	) 
);

//Toggle
$tdl_shortcodes['toggle'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Toggle Panel', 'tdl_framework' ), 
	'attr'=>array( 
		'title'=>array('type'=>'text', 'title'=>__('Title', 'tdl_framework')) 
	)
);

//Tabbed Sections
$tdl_shortcodes['tabbed_section'] = array( 
	'type'=>'dynamic', 
	'title'=>__('Tabbed Section', 'tdl_framework' ), 
	'attr'=>array(
		'tabs'=>array('type'=>'custom'),
		'style'=>array(
				'type'=>'select', 
				'title'=> __('Tabs Style', 'tdl_framework'), 
				'values'=>array(
					'top'=>'top',
					'side'=>'side',
				),
			),
	)
);




#-----------------------------------------------------------------
# Shop Shortcodes 
#-----------------------------------------------------------------

$tdl_shortcodes['header_7'] = array( 
	'type'=>'heading', 
	'title'=>__('Shop Shortcodes', 'tdl_framework' )
);

//Custom Big Featured Products
$tdl_shortcodes['custom_big_featured_products'] = array( 
	'type'=>'regular', 
	'title'=>__('Custom Big Featured Products', 'tdl_framework' ), 
	'attr'=>array()
);



//Custom Featured Products
$tdl_shortcodes['custom_featured_products'] = array( 
	'type'=>'regular', 
	'title'=>__('Custom Featured Products', 'tdl_framework' ), 
	'attr'=>array(
	
		'title'=>array(
			'type'=>'text', 
			'title'=>__('Title', 'tdl_framework'),			
		),
		
		'orderby' => array(
			'type' => 'select',
			'title' => 'How to display featured products',
			'values' => array(
			     "date" => "date",
			     "rand" => "rand"
			)
		),		
		
		'perpage'=>array(
			'type'=>'text',
			'std' => '8',
			'title'=>__('Products per page. Default: 8', 'tdl_framework'),			
		),		
	)
);


//Custom Latest Products
$tdl_shortcodes['custom_latest_products'] = array( 
	'type'=>'regular', 
	'title'=>__('Custom Latest Products', 'tdl_framework' ), 
	'attr'=>array(
	
		'title'=>array(
			'type'=>'text', 
			'title'=>__('Title', 'tdl_framework'),			
		),
		
		'perpage'=>array(
			'type'=>'text',
			'std' => '8',
			'title'=>__('Products per page. Default: 8', 'tdl_framework'),			
		),		
	
	)
);

//Custom Best Sellers
$tdl_shortcodes['custom_best_sellers'] = array( 
	'type'=>'regular', 
	'title'=>__('Custom Best Sellers', 'tdl_framework' ), 
	'attr'=>array(
	
		'title'=>array(
			'type'=>'text', 
			'title'=>__('Title', 'tdl_framework'),			
		),	
		
		'perpage'=>array(
			'type'=>'text',
			'std' => '8',
			'title'=>__('Products per page. Default: 8', 'tdl_framework'),			
		),		

	)
);

//Custom On Sale Products
$tdl_shortcodes['custom_on_sale_products'] = array( 
	'type'=>'regular', 
	'title'=>__('Custom On Sale Products', 'tdl_framework' ), 
	'attr'=>array(
	
		'title'=>array(
			'type'=>'text', 
			'title'=>__('Title', 'tdl_framework'),			
		),	
		
		'perpage'=>array(
			'type'=>'text',
			'std' => '8',
			'title'=>__('Products per page. Default: 8', 'tdl_framework'),			
		),		
	
	)
);

//Custom Category/Categories Products
$product_types = get_terms('product_cat');

$types_options = array("all" => "All");

foreach ($product_types as $type) {
	$types_options[$type->slug] = $type->name;
}

$tdl_shortcodes['custom_category_products'] = array( 
	'type'=>'regular', 
	'title'=>__('Custom Category Products', 'tdl_framework' ), 
	'attr'=>array(
	
		'title'=>array(
			'type'=>'text', 
			'title'=>__('Titesttle', 'tdl_framework'),			
		),
		
		'category' => array(
			'type' => 'multi-select',
			'title' => 'Category To Display From',
			'values' => $types_options
		),		
		
		'perpage'=>array(
			'type'=>'text',
			'std' => '8',
			'title'=>__('Products per page. Default: 8', 'tdl_framework'),			
		),		
	)
);



#-----------------------------------------------------------------
# Recent Posts/Projects/Brands 
#-----------------------------------------------------------------

$tdl_shortcodes['header_8'] = array( 
	'type'=>'heading', 
	'title'=>__('Recent Posts/Work', 'tdl_framework' )
);

//Recent Posts
$tdl_shortcodes['recent_posts'] = array( 
	'type'=>'direct_to_editor', 
	'title'=>__('Recent Posts', 'tdl_framework' ), 
	'attr'=>array( 
		'title'=>array(
			'type'=>'text', 
			'title'=>__('Title', 'tdl_framework'),
			
		),
	)
);

//Recent Work
$tdl_shortcodes['recent_projects'] = array( 
	'type'=>'direct_to_editor', 
	'title'=>__('Recent Projects', 'tdl_framework' ), 
	'attr'=>array( 
		'title'=>array(
			'type'=>'text', 
			'title'=>__('Title', 'tdl_framework'),
			
		),
	)
);

//Brands
$tdl_shortcodes['brands'] = array( 
	'type'=>'direct_to_editor', 
	'title'=>__('Brands', 'tdl_framework' ), 
	'attr'=>array( 
		'title'=>array(
			'type'=>'text', 
			'title'=>__('Title', 'tdl_framework'),
			
		),
	)
);
	
	


		//Shortcode html
		$html_options = null;
		
		$shortcode_html = '
		
		<div id="tdl-sc-heading">
		
		<div id="tdl-sc-generator" class="mfp-hide mfp-with-anim">
		    					
			<div class="shortcode-content">
				<div id="tdl-sc-header">
					<div class="label"><strong>Barberry Shortcodes</strong></div>			
					<div class="content"><select id="tdl-shortcodes" data-placeholder="' . __("Choose a shortcode", 'tdl_framework') .'">
				    <option></option>';
					
					foreach( $tdl_shortcodes as $shortcode => $options ){
						
						if(strpos($shortcode,'header') !== false) {
							$shortcode_html .= '<optgroup label="'.$options['title'].'">';
						}
						else {
							$shortcode_html .= '<option value="'.$shortcode.'">'.$options['title'].'</option>';
							$html_options .= '<div class="shortcode-options" id="options-'.$shortcode.'" data-name="'.$shortcode.'" data-type="'.$options['type'].'">';
							
							if( !empty($options['attr']) ){
								 foreach( $options['attr'] as $name => $attr_option ){
									$html_options .= tdl_option_element( $name, $attr_option, $options['type'], $shortcode );
								 }
							}
			
							$html_options .= '</div>'; 
						}
						
					} 
			
			$shortcode_html .= '</select></div></div>'; 	
		
	
		 echo $shortcode_html . $html_options; ?>
			
			<div id="shortcode-content">
				
				<div class="label"><label id="option-label" for="shortcode-content"><?php echo __( 'Content: ', 'tdl_framework' ); ?> </label></div>
				<div class="content"><textarea id="shortcode_content"></textarea></div>
			
			    <div class="hr"></div>
			    
			</div>
		
			<code class="shortcode_storage"><span id="shortcode-storage-o" style=""></span><span id="shortcode-storage-d"></span><span id="shortcode-storage-c" style=""></span></code>
			<a class="btn" id="add-shortcode"><?php echo __( 'Add Shortcode', 'tdl_framework' ); ?></a>
			
		</div>

	</div>	
		
	<?php 
}



//Option Element Function
	
function tdl_option_element( $name, $attr_option, $type, $shortcode ){
	
	$option_element = null;
	
	(isset($attr_option['desc']) && !empty($attr_option['desc'])) ? $desc = '<p class="description">'.$attr_option['desc'].'</p>' : $desc = '';
		
	switch( $attr_option['type'] ){
		
	case 'radio':
	    
		$option_element .= '<div class="label"><strong>'.$attr_option['title'].': </strong></div><div class="content">';
	    foreach( $attr_option['opt'] as $val => $title ){
	    
		(isset($attr_option['def']) && !empty($attr_option['def'])) ? $def = $attr_option['def'] : $def = '';
		
		 $option_element .= '
			<label for="shortcode-option-'.$shortcode.'-'.$name.'-'.$val.'">'.$title.'</label>
		    <input class="attr" type="radio" data-attrname="'.$name.'" name="'.$shortcode.'-'.$name.'" value="'.$val.'" id="shortcode-option-'.$shortcode.'-'.$name.'-'.$val.'"'. ( $val == $def ? ' checked="checked"':'').'>';
	    }
		
		$option_element .= $desc . '</div>';
		
	    break;
		
	case 'checkbox':
		
		$option_element .= '<div class="label"><label for="' . $name . '"><strong>' . $attr_option['title'] . ': </strong></label></div>    <div class="content"> <input type="checkbox" class="' . $name . '" id="' . $name . '" />'. $desc. '</div> ';
		
		break;	
	
	case 'select':
		
		$option_element .= '
		<div class="label"><label for="'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		
		<div class="content"><select id="'.$name.'">';
			$values = $attr_option['values'];
			foreach( $values as $value ){
		    	$option_element .= '<option value="'.$value.'">'.$value.'</option>';
			}
		$option_element .= '</select>' . $desc . '</div>';
		
		break;
	
	case 'regular-select':
		
		$option_element .= '
		<div class="label"><label for="'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		
		<div class="content"><select id="'.$name.'">';
			$values = $attr_option['values'];
			foreach( $values as $k => $v ){
		    	$option_element .= '<option value="'.$k.'">'.$v.'</option>';
			}
		$option_element .= '</select>' . $desc . '</div>';
		
		break;
	
	case 'multi-select':
		
		$option_element .= '
		<div class="label"><label for="'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		
		<div class="content"><select multiple="multiple" id="'.$name.'">';
			$values = $attr_option['values'];
			foreach( $values as $k => $v ){
		    	$option_element .= '<option value="'.$k.'">'.$v.'</option>';
			}
		$option_element .= '</select>' . $desc . '</div>';
		
		break;
		
	case 'icons':
		
		$option_element .= '

		<div class="icon-option">';
			$values = $attr_option['values'];
			foreach( $values as $value ){
		    	$option_element .= '<i class="'.$value.'"></i>';
			}
		$option_element .= $desc . '</div>';
		
		break;
		
	case 'custom':
 
		if( $name == 'tabs' ){
			$option_element .= '
			<div class="shortcode-dynamic-items" id="options-item" data-name="item">
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>Title: </strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>Tab Content: </strong></label></div>
					<div class="content"><textarea class="shortcode-dynamic-item-text" type="text" name="" /></textarea></div>
				</div>
			</div>
			<a href="#" class="btn blue remove-list-item">'.__('Remove Tab', 'tdl_framework' ). '</a> <a href="#" class="btn blue add-list-item">'.__('Add Tab', 'tdl_framework' ).'</a>';
			
		}

		if( $name == 'toggles' ){
			$option_element .= '
			
			<div class="shortcode-dynamic-items" id="options-item" data-name="item">
			
				<div class="label"><label><strong>Turn into accordion?</strong>:</label></div>
				<div class="content">
					<input id="shortcode-option-carousel" class="accordion" type="checkbox" name="accordion">
				</div>
				<div class="clear"></div>

				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>Title: </strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>Tab Content: </strong></label></div>
					<div class="content"><textarea class="shortcode-dynamic-item-text" type="text" name="" /></textarea></div>
					<div class="label"><label><strong>Color: </strong></label></div>
					<div class="content">
						<select class="dynamic-select" id="color">
							<option value="Accent-Color">Accent-Color</option>
							<option value="Extra-Color-1">Extra-Color-1</option>
							<option value="Extra-Color-2">Extra-Color-2</option>
							<option value="Extra-Color-3">Extra-Color-3</option>
						</select>
					</div>
				</div>
			</div>
			<a href="#" class="btn blue remove-list-item">'.__('Remove Toggle', 'tdl_framework' ). '</a> <a href="#" class="btn blue add-list-item">'.__('Add Toggle', 'tdl_framework' ).'</a>';
			
		}  
		
		elseif( $name == 'bar_graph' ){
			$option_element .= '
			<div class="shortcode-dynamic-items" id="options-item" data-name="item">
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>Title: </strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>Bar Percent: </strong></label></div>
					<div class="content dd-percent"><input class="shortcode-dynamic-item-input percent" data-slider="true"  data-slider-range="1,100" data-slider-step="1" type="text" name=""  value="" /></div><div class="clear no-border"></div>
					<div class="label"><label><strong>Color: </strong></label></div>
					<div class="content">
						<select class="dynamic-select" id="color">
							<option value="Accent-Color">Accent-Color</option>
							<option value="Extra-Color-1">Extra-Color-1</option>
							<option value="Extra-Color-2">Extra-Color-2</option>
							<option value="Extra-Color-3">Extra-Color-3</option>
						</select>
					</div>
				</div>
			</div>
			<a href="#" class="btn blue remove-list-item">'.__('Remove Bar', 'tdl_framework' ). '</a> <a href="#" class="btn blue add-list-item">'.__('Add Bar', 'tdl_framework' ).'</a>';
			
		} 
		
		elseif( $name == 'testimonials' ){
			$option_element .= '
			
			<div class="label"><label for="shortcode-option-autorotate"><strong>Autorotate?: </strong></label></div>
			<div class="content"><input class="attr" type="text" data-attrname="autorotate" value="" />If you would like this to autorotate, enter the rotation speed in <b>miliseconds</b> here. i.e 5000</div>
			
			<div class="clear"></div>
			
			<div class="shortcode-dynamic-items testimonials" id="options-item" data-name="testimonial">
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>Name: </strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>Quote: </strong></label></div>
					<div class="content"><textarea class="quote" name="quote"></textarea></div>
				</div>
			</div>

			<a href="#" class="btn blue remove-list-item">'.__('Remove Testimonial', 'tdl_framework' ). '</a> <a href="#" class="btn blue add-list-item">'.__('Add Testimonial', 'tdl_framework' ).'</a>';
			
		} 
		
		elseif( $name == 'image' ){
			$option_element .= '
				<div class="shortcode-dynamic-item" id="options-item" data-name="image-upload">
					<div class="label"><label><strong> '.$attr_option['title'].' </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="image_url" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);"class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', 'tdl_framework') . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', 'tdl_framework') . '</a>';
					
					if(!empty($desc)) $option_element .= $desc;
					
					$option_element .='
					</div>
				</div>';
		}

		elseif( $name == 'poster' ){
			$option_element .= '
				<div class="shortcode-dynamic-item" id="options-item" data-name="image-upload">
					<div class="label"><label><strong> '.$attr_option['title'].' </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="poster" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);"class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', 'tdl_framework') . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', 'tdl_framework') . '</a>';
					
					if(!empty($desc)) $option_element .= $desc;
					
					$option_element .='
					</div>
				</div>';
		}

		elseif( $name == 'color' ){
			
			if(get_bloginfo('version') >= '3.5') {
	           $option_element .= '
	           <div class="label"><label><strong>Background Color: </strong></label></div>
			   <div class="content"><input type="text" value="" class="popup-colorpicker" style="width: 70px;" data-default-color=""/></div>';
	        } else {
	           $option_element .='You\'re using an outdated version of WordPress. Please update to use this feature.';
	        }	
				
		}
		
		elseif( $name == 'clients' ){
			$option_element .= '
			<div class="shortcode-dynamic-items clients" id="options-item" data-name="item">
			    
				<div class="label"><label><strong>Columns</strong>:</label></div>
				<div class="content">
					<label for="shortcode-option-button-2-col" class="inline">Two</label>
					<input id="shortcode-option-button-2-col" class="attr" type="radio" value="2" name="client_columns[]" data-attrname="columns">
					<label for="shortcode-option-button-3-col" class="inline">Three</label>
					<input id="shortcode-option-button-3-col" class="attr" type="radio" value="3" name="client_columns[]" data-attrname="columns">
					<label for="shortcode-option-button-4-col" class="inline">Four</label>
					<input id="shortcode-option-button-4-col" class="attr" type="radio" value="4" name="client_columns[]" data-attrname="columns">
					<label for="shortcode-option-button-5-col" class="inline">Five</label>
					<input id="shortcode-option-button-5-col" class="attr" type="radio" value="5" name="client_columns[]" data-attrname="columns">
					<label for="shortcode-option-button-6-col" class="inline">Six</label>
					<input id="shortcode-option-button-6-col" class="attr" type="radio" value="6" name="client_columns[]" data-attrname="columns">
				</div>
				
				<div class="clear"></div>
				
				<div class="label"><label><strong>Fade In One by One?</strong>:</label></div>
				<div class="content">
					<input id="shortcode-option-carousel" class="fade_in_animation" type="checkbox" name="fade_in_animation">
				</div>
				
				<div class="clear"></div>
				
				<div class="label"><label><strong>Turn Into Carousel?</strong>:</label></div>
				<div class="content">
					<input id="shortcode-option-carousel" class="carousel" type="checkbox" name="carousel">
				</div>
				
				<div class="clear"></div>
				
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>Client Image: </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="redux-opts-screenshot-" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);"class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', 'tdl_framework') . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', 'tdl_framework') . '</a>
					
					</div>
					<div class="clear"></div>
					<div class="label"><label><strong>Client URL</strong> (optional):</label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					
				</div>
			</div>
			<a href="#" class="btn blue remove-list-item">'.__('Remove Client', 'tdl_framework' ). '</a> <a href="#" class="btn blue add-list-item">'.__('Add Client', 'tdl_framework' ).'</a>';
			
		} 
		
		elseif( $type == 'checkbox' ){
			$option_element .= '<div class="label"><label for="' . $name . '"><strong>' . $attr_option['title'] . ': </strong></label></div>    <div class="content"> <input type="checkbox" class="' . $name . '" id="' . $name . '" />' . $desc . '</div> ';
		} 
	
		
		break;
		
	case 'textarea':
		$option_element .= '
		<div class="label"><label for="shortcode-option-'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		<div class="content"><textarea data-attrname="'.$name.'"></textarea> ' . $desc . '</div>';
		break;
			
	case 'text':
	default:
	    $option_element .= '
		<div class="label"><label for="shortcode-option-'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		<div class="content"><input class="attr" type="text" data-attrname="'.$name.'" value="" />' . $desc . '</div>';
	    break;
    }
	
	$option_element .= '<div class="clear"></div>';
    
    return $option_element;
}



?>