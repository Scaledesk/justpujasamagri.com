<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages = array();
		$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_title; }
		$of_pages_tmp = array_unshift($of_pages, "Select a page:");      
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);

		

		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

// General tab

$of_options[] = array( "name" => "General Settings",
					"type" => "heading");
					
$of_options[] = array( "name" => "Responsive Layout",
					"desc" => "Select Responsive Layout Type",
					"id" => "tdl_responsive",
					"std" => "responsive",
					"type" => "select",
					"options" => array(
                            'responsive' => 'Responsive - Max Width 1170px',
							'responsive940' => 'Responsive - Max Width 940px',
							'nonresponsive' => 'Non responsive - Min width 940px',
                        )                    
                    );					

					
$of_options[] = array( "name" => "Logo and Favicons",
					"desc" => "",
					"id" => "introduction",
					"std" => "Logo and Favicons",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => "Your Logo Image (For Dark Content)",
					"desc" => "Upload your Retina Logo. The canvas is 250 x 100 px. For retina upload a double size image (500 x 200 px)",
					"id" => "tdl_site_logo_dark",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => "Your Logo Image (For Light Content)",
					"desc" => "Upload your Retina Logo. The canvas is 250 x 100 px. For retina upload a double size image (500 x 200 px)",
					"id" => "tdl_site_logo_light",
					"std" => "",
					"type" => "media");					
					
$of_options[] = array( "name" => "Favicon",
					"desc" => "Add your custom Favicon image. 16x16px .ico or .png file required.",
					"id" => "tdl_favicon_image",
					"std" => "",
					"mod" => "min",
					"type" => "media");
					
$of_options[] = array( "name" => "Favicon - Retina",
					"desc" => "The Retina version of your Favicon. 144x144px .png file required.",
					"id" => "tdl_favicon_retina",
					"std" => "",
					"mod" => "min",
					"type" => "media");
					
$of_options[] = array( "name" => "Other Settings",
					"desc" => "",
					"id" => "introduction",
					"std" => "Other Settings",
					"icon" => true,
					"type" => "info");
										
					
$of_options[] = array( "name" => "Comments on Pages",
					"desc" => "Check to display comments form on pages.",
					"id" => "tdl_page_comments",
					"std" => 0,
					"type" => "switch");					
					
$of_options[] = array( "name" => "Back To Top Button",
					"desc" => "Check to enable a back to top button on your pages.",
					"id" => "tdl_totop",
					"std" => 1,
					"type" => "switch");
															
$of_options[] = array( "name" => "Revolution Slider",
					"desc" => "Check to enable the Revolution Slider in mobile phones.",
					"id" => "rev_slider_mobphones",
					"std" => 1,
					"type" => "switch");
					
// Header tab			
			
$of_options[] = array( "name" => "Header Settings",
                    "type" => "heading");
					
$of_options[] = array( "name" => "Header Sticky Menu",
					"desc" => "Check to enable Header Sticky Menu",
					"id" => "tdl_sticky_menu",
					"std" => 1,
					"type" => "switch");
					
$of_options[] = array( "name" => "Header Right Navigation Title",
					"desc" => "Enter the Title for Header Right Navigation.",
					"id" => "tdl_header_drop_title",
					"std" => "My Account",
					"type" => "text");					
										
$of_options[] = array( "name" => "Header Style",
					"desc" => "Choose Header Style",
					"id" => "tdl_header_type",
					"std" => "header1",
					"type" => "select",
					"options" => array(
                            'header1' => 'Header 1',
							'header2' => 'Header 2',
							'header3' => 'Header 3',
							'header4' => 'Header 4',
                        )                    
                    );
					
$of_options[] = array( "name" => "Header Border",
					"desc" => "Check to Show Header Border",
					"id" => "tdl_header_border",
					"std" => 1,
					"type" => "switch");
					
$of_options[] = array( "name" => "Header Content Area",
					"desc" => "Enter Header Content Area information here.",
					"id" => "tdl_topbar_text",
					"std" => "78 2ND HOUSE RD MONTAUK, NY, 11954 <a href='mailto:contact@barberry.com'>contact@barberry.com</a>",
					"type" => "textarea");					
					
					
$of_options[] = array( "name" => "Header Top Bar",
					"desc" => "",
					"std" => "Header Top Bar",
					"icon" => true,
					"type" => "info");					
					
					
$of_options[] = array( "name" => "Top Bar",
					"desc" => "Check to show the Top Bar.",
					"id" => "tdl_hide_topbar",
					"std" => 0,
					"on" 		=> "Show",
					"off" 		=> "Hide",
					"folds"		=> 1,
					"type" => "switch");
					
					
					
					
$of_options[] = array( "name" => "Social Introduction",
					"desc" => "",
					"id" => "socialintro",
					"std" => "These Social Links will be shown only in the header top bar.",
					"icon" => true,
					"fold" => "tdl_hide_topbar", /* the switch hook */
					"type" => "info");
					
$of_options[] = array( "name" => __("Facebook URL", 'tdl_framework'),
			          	"desc" => __("Enter your Facebook URL here.", 'tdl_framework'),
			          	"id" => "tdl_facebook_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");
											
					
$of_options[] = array( "name" => __("Twitter URL", 'tdl_framework'),
			          	"desc" => __("Enter your Twitter URL here.", 'tdl_framework'),
			          	"id" => "tdl_twitter_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");
						
$of_options[] = array( "name" => __("Google+ URL", 'tdl_framework'),
			          	"desc" => __("Enter your Google+ URL here.", 'tdl_framework'),
			          	"id" => "tdl_googleplus_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");
						
$of_options[] = array( "name" => __("Pinterest URL", 'tdl_framework'),
			          	"desc" => __("Enter your Pinterest URL here.", 'tdl_framework'),
			          	"id" => "tdl_pinterest_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");									

						
$of_options[] = array( "name" => __("Vimeo URL", 'tdl_framework'),
			          	"desc" => __("Enter your Vimeo URL here.", 'tdl_framework'),
			          	"id" => "tdl_vimeo_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");
						
												
$of_options[] = array( "name" => __("YouTube URL", 'tdl_framework'),
			          	"desc" => __("Enter your YouTube URL here.", 'tdl_framework'),
			          	"id" => "tdl_youtube_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");						
												 	          
$of_options[] = array( "name" => __("Flickr URL", 'tdl_framework'),
			          	"desc" => __("Enter your Flickr URL here.", 'tdl_framework'),
			          	"id" => "tdl_flickr_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");
						
$of_options[] = array( "name" => __("Kippt URL", 'tdl_framework'),
			          	"desc" => __("Enter your Kippt URL here.", 'tdl_framework'),
			          	"id" => "tdl_kippt_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");			          	

						
$of_options[] = array( "name" => __("Skype URL", 'tdl_framework'),
			          	"desc" => __("Enter your Skype URL here.", 'tdl_framework'),
			          	"id" => "tdl_skype_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");	
						
$of_options[] = array( "name" => __("Behance URL", 'tdl_framework'),
			          	"desc" => __("Enter your Behance URL here.", 'tdl_framework'),
			          	"id" => "tdl_behance_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");											
					
$of_options[] = array( "name" => __("Dribbble URL", 'tdl_framework'),
			          	"desc" => __("Enter your Dribbble URL here.", 'tdl_framework'),
			          	"id" => "tdl_dribbble_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");
						
$of_options[] = array( "name" => __("Tumblr URL", 'tdl_framework'),
			          	"desc" => __("Enter your Tumblr URL here.", 'tdl_framework'),
			          	"id" => "tdl_tumblr_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");						
						
$of_options[] = array( "name" => __("LinkedIn URL", 'tdl_framework'),
			          	"desc" => __("Enter your LinkedIn URL here.", 'tdl_framework'),
			          	"id" => "tdl_linkedin_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");
						
						
$of_options[] = array( "name" => __("Github URL", 'tdl_framework'),
			          	"desc" => __("Enter your Github URL here.", 'tdl_framework'),
			          	"id" => "tdl_github_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");						
						
$of_options[] = array( "name" => __("Vine URL", 'tdl_framework'),
			          	"desc" => __("Enter your Vine URL here.", 'tdl_framework'),
			          	"id" => "tdl_vine_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");
						
						
$of_options[] = array( "name" => __("Instagram URL", 'tdl_framework'),
			          	"desc" => __("Enter your Instagram URL here.", 'tdl_framework'),
			          	"id" => "tdl_instagram_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");
						
$of_options[] = array( "name" => __("Rdio URL", 'tdl_framework'),
			          	"desc" => __("Enter your Rdio URL here.", 'tdl_framework'),
			          	"id" => "tdl_rdio_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");						
						
																		
$of_options[] = array( "name" => __("Dropbox URL", 'tdl_framework'),
			          	"desc" => __("Enter your Dropbox URL here.", 'tdl_framework'),
			          	"id" => "tdl_dropbox_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");
						
$of_options[] = array( "name" => __("Feedburner RSS URL", 'tdl_framework'),
			          	"desc" => __("Enter your Feedburner URL here.", 'tdl_framework'),
			          	"id" => "tdl_rss_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");						

$of_options[] = array( "name" => __("Cargo RSS URL", 'tdl_framework'),
			          	"desc" => __("Enter your Cargo URL here.", 'tdl_framework'),
			          	"id" => "tdl_cargo_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");	
						
						
$of_options[] = array( "name" => __("Stumbleupon URL", 'tdl_framework'),
			          	"desc" => __("Enter your Stumbleupon URL here.", 'tdl_framework'),
			          	"id" => "tdl_stumbleupon_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");
						
						
$of_options[] = array( "name" => __("Paypal URL", 'tdl_framework'),
			          	"desc" => __("Enter your Paypal URL here.", 'tdl_framework'),
			          	"id" => "tdl_paypal_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");												
											
																		
$of_options[] = array( "name" => __("Zootool URL", 'tdl_framework'),
			          	"desc" => __("Enter your Zootool URL here.", 'tdl_framework'),
			          	"id" => "tdl_zootool_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");
						
$of_options[] = array( "name" => __("Etsy URL", 'tdl_framework'),
			          	"desc" => __("Enter your Etsy URL here.", 'tdl_framework'),
			          	"id" => "tdl_etsy_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");

$of_options[] = array( "name" => __("Foursquare URL", 'tdl_framework'),
			          	"desc" => __("Enter your Foursquare URL here.", 'tdl_framework'),
			          	"id" => "tdl_foursquare_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");						
												
						
$of_options[] = array( "name" => __("SoundCloud URL", 'tdl_framework'),
			          	"desc" => __("Enter your SoundCloud URL here.", 'tdl_framework'),
			          	"id" => "tdl_soundcloud_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");
						
$of_options[] = array( "name" => __("Spotify URL", 'tdl_framework'),
			          	"desc" => __("Enter your Spotify URL here.", 'tdl_framework'),
			          	"id" => "tdl_spotify_url",
			          	"std" => "",
						"fold" => "tdl_hide_topbar", /* the switch hook */
			          	"type" => "text");						
						


// Shop tab
$of_options[] = array( "name" => "Shop Settings",
                    "type" => "heading");
					
$of_options[] = array( "name" => "Catalog Mode",
					"desc" => "Check to enable Catalog Mode. This option will turn off the shopping functionality of WooCommerce on theme pages.",
					"id" => "tdl_catalog_mode",
					"std" => 0,
					"type" => "switch");
					
$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( 	"name" 		=> "Shop Sidebar",
						"desc" 		=> "Select Shop sidebar alignment.",
						"id" 		=> "tdl_sidebar_listing",
						"std" 		=> "left",
						"type" 		=> "images",
						"options" 	=> array(
							'left' 	=> $url . '2cl.png',							
							'right' 	=> $url . '2cr.png',							
							'fullwidth' 	=> $url . '1col.png',
						)
				);
				
$of_options[] = array( "name" => "Products Per Row",
					"desc" => "Select How many Products Per Row",
					"id" => "tdl_products_perrow",
					"std" => "three_side",
					"type" => "select",
					"options" => array(
                            'three_side' => '3 columns (Sidebar)',
							'four_side' => '4 columns (Sidebar or Full-width)',
							'five_full' => '5 columns (Full-width)',
                        )                    
                    );
					
$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( 	"name" 		=> "Shop Product Page Sidebar",
						"desc" 		=> "Select Shop Product page sidebar alignment.",
						"id" 		=> "tdl_spage_sidebar_listing",
						"std" 		=> "fullwidth",
						"type" 		=> "images",
						"options" 	=> array(				
							'fullwidth' 	=> $url . '1col.png',
							'right' 	=> $url . '2cr.png',	
						)
				);
									
$of_options[] = array( "name" => "'New' Badge",
					"desc" => "Check to enable 'New' Badge.",
					"id" => "tdl_newbadge",
					"std" => 0,
					"type" => "switch");
					
$of_options[] = array( "name" => "'New' Badge",
					"desc" => "How many days 'New' badge will display.",
					"id" => "tdl_newbadge_date",
					"std" => 5,
					"type" => "text");														
					
					
$of_options[] = array( "name" => "Products Animation",
					"desc" => "Check to enable the product animation.",
					"id" => "tdl_product_animation",
					"std" => 1,
					"type" => "switch");

					
$of_options[] = array( "name" => "Product Animation Type",
					"desc" => "Choose Product Animation Type",
					"id" => "tdl_productanim_type",
					"std" => "productanim1",
					"type" => "select",
					"options" => array(
                            'productanim1' => 'Flip',
							'productanim3' => 'Slide',
							'productanim5' => 'Fade',
                        )                    
                    );					
					
$of_options[] = array( "name" => "Category in Product Listing",
					"desc" => "Check to show/hide the Category in Product Listing",
					"id" => "tdl_category_listing",
					"on" 		=> "Show",
					"off" 		=> "Hide",
					"std" => 1,
					"type" => "switch");

$of_options[] = array( "name" => "Display only first Category in Product Listing",
					"desc" => "Display only first Category in Product Listing",
					"id" => "tdl_category_listing_first",
					"on" 		=> "Enable",
					"off" 		=> "Disable",
					"std" => 0,
					"folds"		=> 1,
					"fold" 		=> "tdl_category_listing", /* the switch hook */
					"type" => "switch");
					
$of_options[] = array( "name" => "Star Rating in Product Listing",
					"desc" => "Check to show/hide the Star Rating in Product Listing",
					"id" => "tdl_star_listing",
					"on" 		=> "Show",
					"off" 		=> "Hide",
					"std" => 1,
					"type" => "switch");
					
$of_options[] = array( "name" => "Product Image Lightbox",
					"desc" => "Select product image lightbox",
					"id" => "tdl_product_lightbox",
					"std" => "frescolight",
					"type" => "select",
					"options" => array(
                         'prettylight' => 'PrettyPhoto lightbox',
							'frescolight' => 'Fresco lightbox',
                        )                    
                    );					
					
$of_options[] = array( "name" => "Product info style",
					"desc" => "Select how you want to display product info",
					"id" => "tdl_product_info_style",
					"std" => "sidetabs",
					"type" => "select",
					"options" => array(
                            'sidetabs' => 'Side Tabs',
							'toptabs' => 'Top Tabs',
                        )                    
                    );
					
$of_options[] = array( "name" => "Show custom tab",
					"desc" => "Check to Show custom tab on Single product Page.",
					"id" => "tdl_custom_tab",
					"folds" => 1,
					"std" => 0,
					"type" => "switch");	
					
$of_options[] = array( "name" => "Custom tab title",
					"id" => "tdl_custom_tab_title",
					"fold" => "tdl_custom_tab", /* the switch hook */
					"std" => "Custom Tab",
					"type" => "text");
					
					
$of_options[] = array( "name" => "Custom tab content",
					"id" => "tdl_custom_tab_content",
					"std" => "This is a static Custom Tab Content from admin panel. You can insert any content here.",
					"fold" => "tdl_custom_tab", /* the switch hook */
					"type" => "textarea");														
					
					
					
$of_options[] = array( "name" => "Shop Banner",
					"desc" => "",
					"std" => "Shop Banner / Slider",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => "Shop Banner",
					"desc" => "Please select banner or slider",
					"id" => "tdl_shop_banner",
					"on" 		=> "Enable",
					"off" 		=> "Disable",
					"folds"		=> 1,
					"std" => 0,
					"type" => "switch");					
					
$of_options[] = array( "name" => "Shop Banner",
					"desc" => "Upload your image (png, jpg or gif).",
					"id" => "tdl_shop_banner_img",
					"fold" 		=> "tdl_shop_banner", /* the switch hook */
					"std" => "",
					"type" => "media");

										
$of_options[] = array( "name" => "Shop Banner Description",
					"desc" => "Enter Description for Shop Banner",
					"id" => "tdl_shop_banner_desc",
					"fold" 		=> "tdl_shop_banner", /* the switch hook */
					"type" => "textarea");					
					
					
$of_options[] = array( "name" => "Shop Banner Description Position",
					"desc" => "Select Shop Banner Description Position",
					"id" => "tdl_shop_banner_title_pos",
					"std" => "left",
					"type" => "select",
					"fold" 		=> "tdl_shop_banner", /* the switch hook */
					"options" => array(
                            'right' => 'Right',
							'left' => 'Left',
                        )                    
                    );				
						
					
$of_options[] = array( "name" => "Shop Banner Description Color",
					"desc" => "Select Shop Banner Description Color",
					"id" => "tdl_shop_banner_title_col",
					"std" => "dark",
					"type" => "select",
					"fold" 		=> "tdl_shop_banner", /* the switch hook */
					"options" => array(
                            'light' => 'Light',
							'dark' => 'Dark',
                        )                    
                    );				
					
$of_options[] = array( "name" => "Shop Banner Link",
					"desc" => "Enter Link Shop Banner",
					"id" => "tdl_shop_banner_title_link",
					"fold" => "tdl_shop_banner", /* the switch hook */
					"type" => "text");
			
					
$of_options[] = array( "name" => "Register",
					"desc" => "",
					"id" => "introduction",
					"std" => "Register",
					"icon" => true,
					"type" => "info");
					
					
$of_options[] = array( "name" => "Register Content",
					"desc" => "Registration body text.",
					"id" => "tdl_registration_content",
					"std" => "<h3>Your Title here</h3>
					<ul>
					<li>Your text here</li>
					<li>Your text here</li>
					<li>Your text here</li>
					<li>Your text here</li>
					</ul>",
					"type" => "textarea");

$of_options[] = array( "name" => "Single Products Related Products",
					"desc" => "",
					"id" => "introduction",
					"std" => "Register",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => "Related Products Area",
					"desc" => "Show/Hide Related Products",
					"id" => "tdl_product_related",
					"on" 		=> "Show",
					"off" 		=> "Hide",
					"folds"		=> 1,
					"std" => 1,
					"type" => "switch");
											
$of_options[] = array( "name" => "Related Product No. of items",
					"desc" => "Choose how many related products will display on single product page",
					"id" => "tdl_product_related_no",
					"std" => "four_side",
					"type" => "select",
					"fold" 		=> "tdl_product_related", /* the switch hook */
					"options" => array(
                         'four_side' => '4 items per page',
							'five_full' => '5 items per page',
                        )                    
                    );						
					
// Footer tab					
					
$of_options[] = array( "name" => "Footer Settings",
					"type" => "heading");
					

					
$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( "name" => "Footer Widget Areas",
					"desc" => "Select how many footer widget areas you want to display.",
					"id" => "tdl_footer_layout",
					"std" => "layout-off",
					"type" => "images",
					"options" => array(
						'layout-off' => $url . 'layout-off.png',
						'1' => $url . 'footer-widgets-1.png',
						'2' => $url . 'footer-widgets-2.png',
						'3' => $url . 'footer-widgets-3.png',						
						'4' => $url . 'footer-widgets-4.png',
						'footer-widgets-1-1-2' => $url . 'footer-widgets-1-1-2.png',
						'footer-widgets-1-2-1' => $url . 'footer-widgets-1-2-1.png',
						'footer-widgets-2-1-1' => $url . 'footer-widgets-2-1-1.png'),
					);
					

					
$of_options[] = array( "name" => "Show/Hide Footer Logos/Credit Cards Sprite",
					"desc" => "Check to Show Footer Logos/Credit Cards Sprite",
					"id" => "tdl_footer_logos_off",
					"on" 		=> "Show",
					"off" 		=> "Hide",
					"folds"		=> 1,
					"std" => 1,
					"type" => "switch");										
					
$of_options[] = array( "name" => "Custom Footer Logos/Credit Cards Sprite",
					"desc" => "Upload your custom icons sprite.",
					"id" => "tdl_footer_logos",
					"fold" 		=> "tdl_footer_logos_off", /* the switch hook */
					"std" => "",
					"type" => "media");
										
$of_options[] = array( "name" => "Footer Copyright Text",
                    "desc" => "Whatever text you enter here will be displayed in your website's footer area. The primary purpose of this option is to display your website's Copyright text, but you can enter whatever text you like.",
                    "id" => "tdl_footer_text",
                    "std" => "&copy; 2013 - Barberry Woocommerce Theme. Created by <a href='http://www.temashdesign.com'>TemashDesign</a>",
                    "type" => "textarea"); 							
					



// Styling tab

$of_options[] = array( "name" => "Styling & Typography",
					"type" => "heading");
					
$of_options[] = array( "name" => "Content Color",
					"desc" => "Choose Content color scheme. If you use light background select 'Dark'",
					"id" => "tdl_color_scheme",
					"std" => "dark",
					"type" => "select",
					"options" => array(
                            'light' => 'Light',
							'dark' => 'Dark',
                        )                    
                    );					
		
					
$of_options[] = array( "name" => "Main Background",
					"desc" => "",
					"id" => "introduction",
					"std" => "Main Background Options",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => "Background Color",
					"desc" => "Select a background color for your site.",
					"id" => "tdl_main_bg_color",
					"std" => "#ffffff",
					"type" => "color");
					

$of_options[] = array( "name" => "Typography",
					"desc" => "",
					"id" => "introduction",
					"std" => "Typography",
					"icon" => true,
					"type" => "info");			
					

					
$all_font_faces = array('arial'=>'Arial',
				'verdana'=>'Verdana, Geneva',
				'trebuchet'=>'Trebuchet MS',
				'georgia' =>'Georgia',
				'times'=>'Times New Roman',
				'tahoma'=>'Tahoma, Geneva',
				'helvetica'=>'Helvetica',
				
				'ABeeZee' => 'ABeeZee',
				'Abel' => 'Abel',
				'Abril Fatface' => 'Abril Fatface',
				'Aclonica' => 'Aclonica',
				'Acme' => 'Acme',
				'Actor' => 'Actor',
				'Adamina' => 'Adamina',
				'Advent Pro' => 'Advent Pro',
				'Aguafina Script' => 'Aguafina Script',
				'Akronim' => 'Akronim',
				'Aladin' => 'Aladin',
				'Aldrich' => 'Aldrich',
				'Alef' => 'Alef',
				'Alegreya' => 'Alegreya',
				'Alegreya SC' => 'Alegreya SC',
				'Alex Brush' => 'Alex Brush',
				'Alfa Slab One' => 'Alfa Slab One',
				'Alice' => 'Alice',
				'Alike' => 'Alike',
				'Alike Angular' => 'Alike Angular',
				'Allan' => 'Allan',
				'Allerta' => 'Allerta',
				'Allerta Stencil' => 'Allerta Stencil',
				'Allura' => 'Allura',
				'Almendra' => 'Almendra',
				'Almendra Display' => 'Almendra Display',
				'Almendra SC' => 'Almendra SC',
				'Amarante' => 'Amarante',
				'Amaranth' => 'Amaranth',
				'Amatic SC' => 'Amatic SC',
				'Amethysta' => 'Amethysta',
				'Anaheim' => 'Anaheim',
				'Andada' => 'Andada',
				'Andika' => 'Andika',
				'Angkor' => 'Angkor',
				'Annie Use Your Telescope' => 'Annie Use Your Telescope',
				'Anonymous Pro' => 'Anonymous Pro',
				'Antic' => 'Antic',
				'Antic Didone' => 'Antic Didone',
				'Antic Slab' => 'Antic Slab',
				'Anton' => 'Anton',
				'Arapey' => 'Arapey',
				'Arbutus' => 'Arbutus',
				'Arbutus Slab' => 'Arbutus Slab',
				'Architects Daughter' => 'Architects Daughter',
				'Archivo Black' => 'Archivo Black',
				'Archivo Narrow' => 'Archivo Narrow',
				'Arimo' => 'Arimo',
				'Arizonia' => 'Arizonia',
				'Armata' => 'Armata',
				'Artifika' => 'Artifika',
				'Arvo' => 'Arvo',
				'Asap' => 'Asap',
				'Asset' => 'Asset',
				'Astloch' => 'Astloch',
				'Asul' => 'Asul',
				'Atomic Age' => 'Atomic Age',
				'Aubrey' => 'Aubrey',
				'Audiowide' => 'Audiowide',
				'Autour One' => 'Autour One',
				'Average' => 'Average',
				'Average Sans' => 'Average Sans',
				'Averia Gruesa Libre' => 'Averia Gruesa Libre',
				'Averia Libre' => 'Averia Libre',
				'Averia Sans Libre' => 'Averia Sans Libre',
				'Averia Serif Libre' => 'Averia Serif Libre',
				'Bad Script' => 'Bad Script',
				'Balthazar' => 'Balthazar',
				'Bangers' => 'Bangers',
				'Basic' => 'Basic',
				'Battambang' => 'Battambang',
				'Baumans' => 'Baumans',
				'Bayon' => 'Bayon',
				'Belgrano' => 'Belgrano',
				'Belleza' => 'Belleza',
				'BenchNine' => 'BenchNine',
				'Bentham' => 'Bentham',
				'Berkshire Swash' => 'Berkshire Swash',
				'Bevan' => 'Bevan',
				'Bigelow Rules' => 'Bigelow Rules',
				'Bigshot One' => 'Bigshot One',
				'Bilbo' => 'Bilbo',
				'Bilbo Swash Caps' => 'Bilbo Swash Caps',
				'Bitter' => 'Bitter',
				'Black Ops One' => 'Black Ops One',
				'Bokor' => 'Bokor',
				'Bonbon' => 'Bonbon',
				'Boogaloo' => 'Boogaloo',
				'Bowlby One' => 'Bowlby One',
				'Bowlby One SC' => 'Bowlby One SC',
				'Brawler' => 'Brawler',
				'Bree Serif' => 'Bree Serif',
				'Bubblegum Sans' => 'Bubblegum Sans',
				'Bubbler One' => 'Bubbler One',
				'Buda' => 'Buda',
				'Buenard' => 'Buenard',
				'Butcherman' => 'Butcherman',
				'Butterfly Kids' => 'Butterfly Kids',
				'Cabin' => 'Cabin',
				'Cabin Condensed' => 'Cabin Condensed',
				'Cabin Sketch' => 'Cabin Sketch',
				'Caesar Dressing' => 'Caesar Dressing',
				'Cagliostro' => 'Cagliostro',
				'Calligraffitti' => 'Calligraffitti',
				'Cambo' => 'Cambo',
				'Candal' => 'Candal',
				'Cantarell' => 'Cantarell',
				'Cantata One' => 'Cantata One',
				'Cantora One' => 'Cantora One',
				'Capriola' => 'Capriola',
				'Cardo' => 'Cardo',
				'Carme' => 'Carme',
				'Carrois Gothic' => 'Carrois Gothic',
				'Carrois Gothic SC' => 'Carrois Gothic SC',
				'Carter One' => 'Carter One',
				'Caudex' => 'Caudex',
				'Cedarville Cursive' => 'Cedarville Cursive',
				'Ceviche One' => 'Ceviche One',
				'Changa One' => 'Changa One',
				'Chango' => 'Chango',
				'Chau Philomene One' => 'Chau Philomene One',
				'Chela One' => 'Chela One',
				'Chelsea Market' => 'Chelsea Market',
				'Chenla' => 'Chenla',
				'Cherry Cream Soda' => 'Cherry Cream Soda',
				'Cherry Swash' => 'Cherry Swash',
				'Chewy' => 'Chewy',
				'Chicle' => 'Chicle',
				'Chivo' => 'Chivo',
				'Cinzel' => 'Cinzel',
				'Cinzel Decorative' => 'Cinzel Decorative',
				'Clicker Script' => 'Clicker Script',
				'Coda' => 'Coda',
				'Coda Caption' => 'Coda Caption',
				'Codystar' => 'Codystar',
				'Combo' => 'Combo',
				'Comfortaa' => 'Comfortaa',
				'Coming Soon' => 'Coming Soon',
				'Concert One' => 'Concert One',
				'Condiment' => 'Condiment',
				'Content' => 'Content',
				'Contrail One' => 'Contrail One',
				'Convergence' => 'Convergence',
				'Cookie' => 'Cookie',
				'Copse' => 'Copse',
				'Corben' => 'Corben',
				'Courgette' => 'Courgette',
				'Cousine' => 'Cousine',
				'Coustard' => 'Coustard',
				'Covered By Your Grace' => 'Covered By Your Grace',
				'Crafty Girls' => 'Crafty Girls',
				'Creepster' => 'Creepster',
				'Crete Round' => 'Crete Round',
				'Crimson Text' => 'Crimson Text',
				'Croissant One' => 'Croissant One',
				'Crushed' => 'Crushed',
				'Cuprum' => 'Cuprum',
				'Cutive' => 'Cutive',
				'Cutive Mono' => 'Cutive Mono',
				'Damion' => 'Damion',
				'Dancing Script' => 'Dancing Script',
				'Dangrek' => 'Dangrek',
				'Dawning of a New Day' => 'Dawning of a New Day',
				'Days One' => 'Days One',
				'Delius' => 'Delius',
				'Delius Swash Caps' => 'Delius Swash Caps',
				'Delius Unicase' => 'Delius Unicase',
				'Della Respira' => 'Della Respira',
				'Denk One' => 'Denk One',
				'Devonshire' => 'Devonshire',
				'Didact Gothic' => 'Didact Gothic',
				'Diplomata' => 'Diplomata',
				'Diplomata SC' => 'Diplomata SC',
				'Domine' => 'Domine',
				'Donegal One' => 'Donegal One',
				'Doppio One' => 'Doppio One',
				'Dorsa' => 'Dorsa',
				'Dosis' => 'Dosis',
				'Dr Sugiyama' => 'Dr Sugiyama',
				'Droid Sans' => 'Droid Sans',
				'Droid Sans Mono' => 'Droid Sans Mono',
				'Droid Serif' => 'Droid Serif',
				'Duru Sans' => 'Duru Sans',
				'Dynalight' => 'Dynalight',
				'EB Garamond' => 'EB Garamond',
				'Eagle Lake' => 'Eagle Lake',
				'Eater' => 'Eater',
				'Economica' => 'Economica',
				'Electrolize' => 'Electrolize',
				'Elsie' => 'Elsie',
				'Elsie Swash Caps' => 'Elsie Swash Caps',
				'Emblema One' => 'Emblema One',
				'Emilys Candy' => 'Emilys Candy',
				'Engagement' => 'Engagement',
				'Englebert' => 'Englebert',
				'Enriqueta' => 'Enriqueta',
				'Erica One' => 'Erica One',
				'Esteban' => 'Esteban',
				'Euphoria Script' => 'Euphoria Script',
				'Ewert' => 'Ewert',
				'Exo' => 'Exo',
				'Expletus Sans' => 'Expletus Sans',
				'Fanwood Text' => 'Fanwood Text',
				'Fascinate' => 'Fascinate',
				'Fascinate Inline' => 'Fascinate Inline',
				'Faster One' => 'Faster One',
				'Fasthand' => 'Fasthand',
				'Fauna One' => 'Fauna One',
				'Federant' => 'Federant',
				'Federo' => 'Federo',
				'Felipa' => 'Felipa',
				'Fenix' => 'Fenix',
				'Finger Paint' => 'Finger Paint',
				'Fjalla One' => 'Fjalla One',
				'Fjord One' => 'Fjord One',
				'Flamenco' => 'Flamenco',
				'Flavors' => 'Flavors',
				'Fondamento' => 'Fondamento',
				'Fontdiner Swanky' => 'Fontdiner Swanky',
				'Forum' => 'Forum',
				'Francois One' => 'Francois One',
				'Freckle Face' => 'Freckle Face',
				'Fredericka the Great' => 'Fredericka the Great',
				'Fredoka One' => 'Fredoka One',
				'Freehand' => 'Freehand',
				'Fresca' => 'Fresca',
				'Frijole' => 'Frijole',
				'Fruktur' => 'Fruktur',
				'Fugaz One' => 'Fugaz One',
				'GFS Didot' => 'GFS Didot',
				'GFS Neohellenic' => 'GFS Neohellenic',
				'Gabriela' => 'Gabriela',
				'Gafata' => 'Gafata',
				'Galdeano' => 'Galdeano',

				'Galindo' => 'Galindo',
				'Gentium Basic' => 'Gentium Basic',
				'Gentium Book Basic' => 'Gentium Book Basic',
				'Geo' => 'Geo',
				'Geostar' => 'Geostar',
				'Geostar Fill' => 'Geostar Fill',
				'Germania One' => 'Germania One',
				'Gilda Display' => 'Gilda Display',
				'Give You Glory' => 'Give You Glory',
				'Glass Antiqua' => 'Glass Antiqua',
				'Glegoo' => 'Glegoo',
				'Gloria Hallelujah' => 'Gloria Hallelujah',
				'Goblin One' => 'Goblin One',
				'Gochi Hand' => 'Gochi Hand',
				'Gorditas' => 'Gorditas',
				'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
				'Graduate' => 'Graduate',
				'Grand Hotel' => 'Grand Hotel',
				'Gravitas One' => 'Gravitas One',
				'Great Vibes' => 'Great Vibes',
				'Griffy' => 'Griffy',
				'Gruppo' => 'Gruppo',
				'Gudea' => 'Gudea',
				'Habibi' => 'Habibi',
				'Hammersmith One' => 'Hammersmith One',
				'Hanalei' => 'Hanalei',
				'Hanalei Fill' => 'Hanalei Fill',
				'Handlee' => 'Handlee',
				'Hanuman' => 'Hanuman',
				'Happy Monkey' => 'Happy Monkey',
				'Headland One' => 'Headland One',
				'Henny Penny' => 'Henny Penny',
				'Herr Von Muellerhoff' => 'Herr Von Muellerhoff',
				'Holtwood One SC' => 'Holtwood One SC',
				'Homemade Apple' => 'Homemade Apple',
				'Homenaje' => 'Homenaje',
				'IM Fell DW Pica' => 'IM Fell DW Pica',
				'IM Fell DW Pica SC' => 'IM Fell DW Pica SC',
				'IM Fell Double Pica' => 'IM Fell Double Pica',
				'IM Fell Double Pica SC' => 'IM Fell Double Pica SC',
				'IM Fell English' => 'IM Fell English',
				'IM Fell English SC' => 'IM Fell English SC',
				'IM Fell French Canon' => 'IM Fell French Canon',
				'IM Fell French Canon SC' => 'IM Fell French Canon SC',
				'IM Fell Great Primer' => 'IM Fell Great Primer',
				'IM Fell Great Primer SC' => 'IM Fell Great Primer SC',
				'Iceberg' => 'Iceberg',
				'Iceland' => 'Iceland',
				'Imprima' => 'Imprima',
				'Inconsolata' => 'Inconsolata',
				'Inder' => 'Inder',
				'Indie Flower' => 'Indie Flower',
				'Inika' => 'Inika',
				'Irish Grover' => 'Irish Grover',
				'Istok Web' => 'Istok Web',
				'Italiana' => 'Italiana',
				'Italianno' => 'Italianno',
				'Jacques Francois' => 'Jacques Francois',
				'Jacques Francois Shadow' => 'Jacques Francois Shadow',
				'Jim Nightshade' => 'Jim Nightshade',
				'Jockey One' => 'Jockey One',
				'Jolly Lodger' => 'Jolly Lodger',
				'Josefin Sans' => 'Josefin Sans',
				'Josefin Slab' => 'Josefin Slab',
				'Joti One' => 'Joti One',
				'Judson' => 'Judson',
				'Julee' => 'Julee',
				'Julius Sans One' => 'Julius Sans One',
				'Junge' => 'Junge',
				'Jura' => 'Jura',
				'Just Another Hand' => 'Just Another Hand',
				'Just Me Again Down Here' => 'Just Me Again Down Here',
				'Kameron' => 'Kameron',
				'Karla' => 'Karla',
				'Kaushan Script' => 'Kaushan Script',
				'Kavoon' => 'Kavoon',
				'Keania One' => 'Keania One',
				'Kelly Slab' => 'Kelly Slab',
				'Kenia' => 'Kenia',
				'Khmer' => 'Khmer',
				'Kite One' => 'Kite One',
				'Knewave' => 'Knewave',
				'Kotta One' => 'Kotta One',
				'Koulen' => 'Koulen',
				'Kranky' => 'Kranky',
				'Kreon' => 'Kreon',
				'Kristi' => 'Kristi',
				'Krona One' => 'Krona One',
				'La Belle Aurore' => 'La Belle Aurore',
				'Lancelot' => 'Lancelot',
				'Lato' => 'Lato',
				'League Script' => 'League Script',
				'Leckerli One' => 'Leckerli One',
				'Ledger' => 'Ledger',
				'Lekton' => 'Lekton',
				'Lemon' => 'Lemon',
				'Libre Baskerville' => 'Libre Baskerville',
				'Life Savers' => 'Life Savers',
				'Lilita One' => 'Lilita One',
				'Lily Script One' => 'Lily Script One',
				'Limelight' => 'Limelight',
				'Linden Hill' => 'Linden Hill',
				'Lobster' => 'Lobster',
				'Lobster Two' => 'Lobster Two',
				'Londrina Outline' => 'Londrina Outline',
				'Londrina Shadow' => 'Londrina Shadow',
				'Londrina Sketch' => 'Londrina Sketch',
				'Londrina Solid' => 'Londrina Solid',
				'Lora' => 'Lora',
				'Love Ya Like A Sister' => 'Love Ya Like A Sister',
				'Loved by the King' => 'Loved by the King',
				'Lovers Quarrel' => 'Lovers Quarrel',
				'Luckiest Guy' => 'Luckiest Guy',
				'Lusitana' => 'Lusitana',
				'Lustria' => 'Lustria',
				'Macondo' => 'Macondo',
				'Macondo Swash Caps' => 'Macondo Swash Caps',
				'Magra' => 'Magra',
				'Maiden Orange' => 'Maiden Orange',
				'Mako' => 'Mako',
				'Marcellus' => 'Marcellus',
				'Marcellus SC' => 'Marcellus SC',
				'Marck Script' => 'Marck Script',
				'Margarine' => 'Margarine',
				'Marko One' => 'Marko One',
				'Marmelad' => 'Marmelad',
				'Marvel' => 'Marvel',
				'Mate' => 'Mate',
				'Mate SC' => 'Mate SC',
				'Maven Pro' => 'Maven Pro',
				'McLaren' => 'McLaren',
				'Meddon' => 'Meddon',
				'MedievalSharp' => 'MedievalSharp',
				'Medula One' => 'Medula One',
				'Megrim' => 'Megrim',
				'Meie Script' => 'Meie Script',
				'Merienda' => 'Merienda',
				'Merienda One' => 'Merienda One',
				'Merriweather' => 'Merriweather',
				'Merriweather Sans' => 'Merriweather Sans',
				'Metal' => 'Metal',
				'Metal Mania' => 'Metal Mania',
				'Metamorphous' => 'Metamorphous',
				'Metrophobic' => 'Metrophobic',
				'Michroma' => 'Michroma',
				'Milonga' => 'Milonga',
				'Miltonian' => 'Miltonian',
				'Miltonian Tattoo' => 'Miltonian Tattoo',
				'Miniver' => 'Miniver',
				'Miss Fajardose' => 'Miss Fajardose',
				'Modern Antiqua' => 'Modern Antiqua',
				'Molengo' => 'Molengo',
				'Molle' => 'Molle',
				'Monda' => 'Monda',
				'Monofett' => 'Monofett',
				'Monoton' => 'Monoton',
				'Monsieur La Doulaise' => 'Monsieur La Doulaise',
				'Montaga' => 'Montaga',
				'Montez' => 'Montez',
				'Montserrat' => 'Montserrat',
				'Montserrat Alternates' => 'Montserrat Alternates',
				'Montserrat Subrayada' => 'Montserrat Subrayada',
				'Moul' => 'Moul',
				'Moulpali' => 'Moulpali',
				'Mountains of Christmas' => 'Mountains of Christmas',
				'Mouse Memoirs' => 'Mouse Memoirs',
				'Mr Bedfort' => 'Mr Bedfort',
				'Mr Dafoe' => 'Mr Dafoe',
				'Mr De Haviland' => 'Mr De Haviland',
				'Mrs Saint Delafield' => 'Mrs Saint Delafield',
				'Mrs Sheppards' => 'Mrs Sheppards',
				'Muli' => 'Muli',
				'Mystery Quest' => 'Mystery Quest',
				'Neucha' => 'Neucha',
				'Neuton' => 'Neuton',
				'New Rocker' => 'New Rocker',
				'News Cycle' => 'News Cycle',
				'Niconne' => 'Niconne',
				'Nixie One' => 'Nixie One',
				'Nobile' => 'Nobile',
				'Nokora' => 'Nokora',
				'Norican' => 'Norican',
				'Nosifer' => 'Nosifer',
				'Nothing You Could Do' => 'Nothing You Could Do',
				'Noticia Text' => 'Noticia Text',
				'Noto Sans' => 'Noto Sans',
				'Noto Serif' => 'Noto Serif',
				'Nova Cut' => 'Nova Cut',
				'Nova Flat' => 'Nova Flat',
				'Nova Mono' => 'Nova Mono',
				'Nova Oval' => 'Nova Oval',
				'Nova Round' => 'Nova Round',
				'Nova Script' => 'Nova Script',
				'Nova Slim' => 'Nova Slim',
				'Nova Square' => 'Nova Square',
				'Numans' => 'Numans',
				'Nunito' => 'Nunito',
				'Odor Mean Chey' => 'Odor Mean Chey',
				'Offside' => 'Offside',
				'Old Standard TT' => 'Old Standard TT',
				'Oldenburg' => 'Oldenburg',
				'Oleo Script' => 'Oleo Script',
				'Oleo Script Swash Caps' => 'Oleo Script Swash Caps',
				'Open Sans' => 'Open Sans',
				'Open Sans Condensed' => 'Open Sans Condensed',
				'Oranienbaum' => 'Oranienbaum',
				'Orbitron' => 'Orbitron',
				'Oregano' => 'Oregano',
				'Orienta' => 'Orienta',
				'Original Surfer' => 'Original Surfer',
				'Oswald' => 'Oswald',
				'Over the Rainbow' => 'Over the Rainbow',
				'Overlock' => 'Overlock',
				'Overlock SC' => 'Overlock SC',
				'Ovo' => 'Ovo',
				'Oxygen' => 'Oxygen',
				'Oxygen Mono' => 'Oxygen Mono',
				'PT Mono' => 'PT Mono',
				'PT Sans' => 'PT Sans',
				'PT Sans Caption' => 'PT Sans Caption',
				'PT Sans Narrow' => 'PT Sans Narrow',
				'PT Serif' => 'PT Serif',
				'PT Serif Caption' => 'PT Serif Caption',
				'Pacifico' => 'Pacifico',
				'Paprika' => 'Paprika',
				'Parisienne' => 'Parisienne',
				'Passero One' => 'Passero One',
				'Passion One' => 'Passion One',
				'Pathway Gothic One' => 'Pathway Gothic One',
				'Patrick Hand' => 'Patrick Hand',
				'Patrick Hand SC' => 'Patrick Hand SC',
				'Patua One' => 'Patua One',
				'Paytone One' => 'Paytone One',
				'Peralta' => 'Peralta',
				'Permanent Marker' => 'Permanent Marker',
				'Petit Formal Script' => 'Petit Formal Script',
				'Petrona' => 'Petrona',
				'Philosopher' => 'Philosopher',
				'Piedra' => 'Piedra',
				'Pinyon Script' => 'Pinyon Script',
				'Pirata One' => 'Pirata One',
				'Plaster' => 'Plaster',
				'Play' => 'Play',
				'Playball' => 'Playball',
				'Playfair Display' => 'Playfair Display',
				'Playfair Display SC' => 'Playfair Display SC',
				'Podkova' => 'Podkova',
				'Poiret One' => 'Poiret One',
				'Poller One' => 'Poller One',
				'Poly' => 'Poly',
				'Pompiere' => 'Pompiere',
				'Pontano Sans' => 'Pontano Sans',
				'Port Lligat Sans' => 'Port Lligat Sans',
				'Port Lligat Slab' => 'Port Lligat Slab',
				'Prata' => 'Prata',
				'Preahvihear' => 'Preahvihear',
				'Press Start 2P' => 'Press Start 2P',
				'Princess Sofia' => 'Princess Sofia',
				'Prociono' => 'Prociono',
				'Prosto One' => 'Prosto One',
				'Puritan' => 'Puritan',
				'Purple Purse' => 'Purple Purse',
				'Quando' => 'Quando',
				'Quantico' => 'Quantico',
				'Quattrocento' => 'Quattrocento',
				'Quattrocento Sans' => 'Quattrocento Sans',
				'Questrial' => 'Questrial',
				'Quicksand' => 'Quicksand',
				'Quintessential' => 'Quintessential',
				'Qwigley' => 'Qwigley',
				'Racing Sans One' => 'Racing Sans One',
				'Radley' => 'Radley',
				'Raleway' => 'Raleway',
				'Raleway Dots' => 'Raleway Dots',
				'Rambla' => 'Rambla',
				'Rammetto One' => 'Rammetto One',
				'Ranchers' => 'Ranchers',
				'Rancho' => 'Rancho',
				'Rationale' => 'Rationale',
				'Redressed' => 'Redressed',
				'Reenie Beanie' => 'Reenie Beanie',
				'Revalia' => 'Revalia',
				'Ribeye' => 'Ribeye',
				'Ribeye Marrow' => 'Ribeye Marrow',
				'Righteous' => 'Righteous',
				'Risque' => 'Risque',
				'Roboto' => 'Roboto',
				'Roboto Condensed' => 'Roboto Condensed',
				'Roboto Slab' => 'Roboto Slab',
				'Rochester' => 'Rochester',
				'Rock Salt' => 'Rock Salt',
				'Rokkitt' => 'Rokkitt',
				'Romanesco' => 'Romanesco',
				'Ropa Sans' => 'Ropa Sans',
				'Rosario' => 'Rosario',
				'Rosarivo' => 'Rosarivo',
				'Rouge Script' => 'Rouge Script',
				'Ruda' => 'Ruda',
				'Rufina' => 'Rufina',
				'Ruge Boogie' => 'Ruge Boogie',
				'Ruluko' => 'Ruluko',
				'Rum Raisin' => 'Rum Raisin',
				'Ruslan Display' => 'Ruslan Display',
				'Russo One' => 'Russo One',
				'Ruthie' => 'Ruthie',
				'Rye' => 'Rye',
				'Sacramento' => 'Sacramento',
				'Sail' => 'Sail',
				'Salsa' => 'Salsa',
				'Sanchez' => 'Sanchez',
				'Sancreek' => 'Sancreek',
				'Sansita One' => 'Sansita One',
				'Sarina' => 'Sarina',
				'Satisfy' => 'Satisfy',
				'Scada' => 'Scada',
				'Schoolbell' => 'Schoolbell',
				'Seaweed Script' => 'Seaweed Script',
				'Sevillana' => 'Sevillana',
				'Seymour One' => 'Seymour One',
				'Shadows Into Light' => 'Shadows Into Light',
				'Shadows Into Light Two' => 'Shadows Into Light Two',
				'Shanti' => 'Shanti',
				'Share' => 'Share',
				'Share Tech' => 'Share Tech',
				'Share Tech Mono' => 'Share Tech Mono',
				'Shojumaru' => 'Shojumaru',
				'Short Stack' => 'Short Stack',
				'Siemreap' => 'Siemreap',
				'Sigmar One' => 'Sigmar One',
				'Signika' => 'Signika',
				'Signika Negative' => 'Signika Negative',
				'Simonetta' => 'Simonetta',
				'Sintony' => 'Sintony',
				'Sirin Stencil' => 'Sirin Stencil',
				'Six Caps' => 'Six Caps',
				'Skranji' => 'Skranji',
				'Slackey' => 'Slackey',
				'Smokum' => 'Smokum',
				'Smythe' => 'Smythe',
				'Sniglet' => 'Sniglet',
				'Snippet' => 'Snippet',
				'Snowburst One' => 'Snowburst One',
				'Sofadi One' => 'Sofadi One',
				'Sofia' => 'Sofia',
				'Sonsie One' => 'Sonsie One',
				'Sorts Mill Goudy' => 'Sorts Mill Goudy',
				'Source Code Pro' => 'Source Code Pro',
				'Source Sans Pro' => 'Source Sans Pro',
				'Special Elite' => 'Special Elite',
				'Spicy Rice' => 'Spicy Rice',
				'Spinnaker' => 'Spinnaker',
				'Spirax' => 'Spirax',
				'Squada One' => 'Squada One',
				'Stalemate' => 'Stalemate',
				'Stalinist One' => 'Stalinist One',
				'Stardos Stencil' => 'Stardos Stencil',
				'Stint Ultra Condensed' => 'Stint Ultra Condensed',
				'Stint Ultra Expanded' => 'Stint Ultra Expanded',
				'Stoke' => 'Stoke',
				'Strait' => 'Strait',
				'Sue Ellen Francisco' => 'Sue Ellen Francisco',
				'Sunshiney' => 'Sunshiney',
				'Supermercado One' => 'Supermercado One',
				'Suwannaphum' => 'Suwannaphum',
				'Swanky and Moo Moo' => 'Swanky and Moo Moo',
				'Syncopate' => 'Syncopate',
				'Tangerine' => 'Tangerine',
				'Taprom' => 'Taprom',
				'Tauri' => 'Tauri',
				'Telex' => 'Telex',
				'Tenor Sans' => 'Tenor Sans',
				'Text Me One' => 'Text Me One',
				'The Girl Next Door' => 'The Girl Next Door',
				'Tienne' => 'Tienne',
				'Tinos' => 'Tinos',
				'Titan One' => 'Titan One',
				'Titillium Web' => 'Titillium Web',
				'Trade Winds' => 'Trade Winds',
				'Trocchi' => 'Trocchi',
				'Trochut' => 'Trochut',
				'Trykker' => 'Trykker',
				'Tulpen One' => 'Tulpen One',
				'Ubuntu' => 'Ubuntu',
				'Ubuntu Condensed' => 'Ubuntu Condensed',
				'Ubuntu Mono' => 'Ubuntu Mono',
				'Ultra' => 'Ultra',
				'Uncial Antiqua' => 'Uncial Antiqua',
				'Underdog' => 'Underdog',
				'Unica One' => 'Unica One',
				'UnifrakturCook' => 'UnifrakturCook',
				'UnifrakturMaguntia' => 'UnifrakturMaguntia',
				'Unkempt' => 'Unkempt',
				'Unlock' => 'Unlock',
				'Unna' => 'Unna',
				'VT323' => 'VT323',
				'Vampiro One' => 'Vampiro One',
				'Varela' => 'Varela',
				'Varela Round' => 'Varela Round',
				'Vast Shadow' => 'Vast Shadow',
				'Vibur' => 'Vibur',
				'Vidaloka' => 'Vidaloka',
				'Viga' => 'Viga',
				'Voces' => 'Voces',
				'Volkhov' => 'Volkhov',
				'Vollkorn' => 'Vollkorn',
				'Voltaire' => 'Voltaire',
				'Waiting for the Sunrise' => 'Waiting for the Sunrise',
				'Wallpoet' => 'Wallpoet',
				'Walter Turncoat' => 'Walter Turncoat',
				'Warnes' => 'Warnes',
				'Wellfleet' => 'Wellfleet',
				'Wendy One' => 'Wendy One',
				'Wire One' => 'Wire One',
				'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
				'Yellowtail' => 'Yellowtail',
				'Yeseva One' => 'Yeseva One',
				'Yesteryear' => 'Yesteryear',
				'Zeyada' => 'Zeyada'
);
					
$of_options[] = array( "name" => "Main Font",
					"desc" => "Pick the main font for your website.",
					"id" => "tdl_main_font",
					"std" => "Oswald",
					"type" => "select_google_font",
					"options" => $all_font_faces); 

					
$of_options[] = array( "name" => "Secondary Font",
					"desc" => "Pick the secondary font for your website.",
					"id" => "tdl_secondary_font",
					"std" => "PT Sans",
					"type" => "select_google_font",
					"options" => $all_font_faces); 


$of_options[] = array( "name" => "Latin Extended",
					"desc" => "Add Latin Extended subsets support",
					"id" => "tdl_font_latin_ext",
					"std" => 0,
					"type" => "switch");

$of_options[] = array( "name" => "Cyrillic",
					"desc" => "Add Cyrillic subsets support",
					"id" => "tdl_font_cyrillic",
					"std" => 0,
					"type" => "switch");

$of_options[] = array( "name" => "Cyrillic Extended",
					"desc" => "Add Cyrillic Extended subsets support",
					"id" => "tdl_font_cyrillic_ext",
					"std" => 0,
					"type" => "switch");

$of_options[] = array( "name" => "Vietnamese",
					"desc" => "Add Vietnamese subsets support",
					"id" => "tdl_font_vietnamese",
					"std" => 0,
					"type" => "switch");

$of_options[] = array( "name" => "Greek",
					"desc" => "Add Greek subsets support",
					"id" => "tdl_font_greek",
					"std" => 0,
					"type" => "switch");

$of_options[] = array( "name" => "Greek Extended",
					"desc" => "Add Greek Extended subsets support",
					"id" => "tdl_font_greek_ext",
					"std" => 0,
					"type" => "switch");

$of_options[] = array( "name" => "Khmer",
					"desc" => "Add Khmer subsets support",
					"id" => "tdl_font_khmer",
					"std" => 0,
					"type" => "switch");

// Portfolio
					
$of_options[] = array( "name" => "Portfolio  Settings",
					"type" => "heading");
					
$of_options[] = array( "name" => "Portfolio Page",
					"desc" => "Select your Portfolio Items Page.",
					"id" => "tdl_portfolio_page",
					"std" => "Select a Page:",
					"type" => "select",
					"options" => $of_pages);
					
$of_options[] = array( "name" => "Portfolio Related Posts",
					"desc" => "Check this to Enable Portfolio Related Posts slider on Single Portfolio Post",
					"id" => "tdl_portfolio_related",
					"std" => 1,
					"type" => "switch");
					
$of_options[] = array( "name" => __("Related Project Thumbnails Height", 'tdl_framework'),
			          	"desc" => __("The Portfolio Thumbnails Height (in px). Just enter a number. Default:400", 'tdl_framework'),
			          	"id" => "tdl_recent_thumb",
			          	"std" => "400",
			          	"type" => "text");											
															
$of_options[] = array( "name" => "Comments on Portfolio",
					"desc" => "Check to display comments form on portfolio single pages.",
					"id" => "tdl_portfolio_comments",
					"std" => 0,
					"type" => "switch");
					
											
// Blog
					
$of_options[] = array( "name" => "Blog  Settings",
					"type" => "heading");
										
$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( 	"name" 		=> "Blog Sidebar",
						"desc" 		=> "Select Blog sidebar alignment.",
						"id" 		=> "tdl_blog_sidebar",
						"std" 		=> "right",
						"type" 		=> "images",
						"options" 	=> array(
							'left' 	=> $url . '2cl.png',							
							'right' 	=> $url . '2cr.png',							
						)
				);

// Custom Code tab

$of_options[] = array( "name" => "Custom Code",
					"type" => "heading");
					
$of_options[] = array( "name" => "Custom CSS",
					"desc" => "Paste your custom CSS code here. The code will be added to the header of your site.",
					"id" => "tdl_custom_css",
					"std" => ".add-your-own-classes-here {

}",
					"type" => "textarea"); 
					
					
$of_options[] = array( "name" => "Google Analytics / Footer JavaScript Code",
					"desc" => "Here is the place to paste your Google Analytics code or any other JS code you might want to add to be loaded in the footer of your website.",
					"id" => "tdl_custom_js_footer",
					"std" => "",
					"type" => "textarea");
					
					
					
					
// Backup Options tab
$of_options[] = array( "name" => "Backup Settings",
					"type" => "heading");
					
$of_options[] = array( "name" => "Backup and Restore Options",
                    "id" => "of_backup",
                    "std" => "",
                    "type" => "backup",
					"desc" => 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
					);
					
$of_options[] = array( "name" => "Transfer Theme Options Data",
                    "id" => "of_transfer",
                    "std" => "",
                    "type" => "transfer",
					"desc" => 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".
						',
					);
					
					
	}
}
?>
