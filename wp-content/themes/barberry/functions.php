<?php

/*-----------------------------------------------------------------------------------

	Here we have all the custom functions for the theme
	Please be extremely cautious editing this file,
	When things go wrong, they tend to go wrong in a big way.
	You have been warned!

-----------------------------------------------------------------------------------*/


define('TDL_FUNCTIONS', get_template_directory() . '/functions');
define('TDL_INCLUDES', get_template_directory() . '/includes');
define('TDL_ADMIN', get_template_directory() . '/admin');
define('TDL_JS', get_template_directory() . '/js');
define('TDL_CSS', get_template_directory() . '/css');
define('TDL_IMAGES', get_template_directory() . '/images');
define('TDL_DIRECTORY', get_template_directory());
define('TDL_THEME_NAME', 'barberry');
add_theme_support( 'woocommerce');




/*-----------------------------------------------------------------------------------*/
/* Includes
/*-----------------------------------------------------------------------------------*/
require_once( TDL_ADMIN . '/index.php'); // Theme Options

require_once( TDL_FUNCTIONS . '/megamenu/tdl_mega_menu.php' ); // Mega Menu
include_once( TDL_INCLUDES . '/custom_styles.php'); // Custom Styles

define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/functions/metabox' ) );
define( 'RWMB_DIR', trailingslashit( TDL_FUNCTIONS . '/metabox' ) );

require_once RWMB_DIR . 'meta-box.php';

include( TDL_FUNCTIONS . '/posttypes.php' ); // Theme PostTypes
include( TDL_FUNCTIONS . '/metaboxes.php' ); // Theme MetaBoxes
include( TDL_FUNCTIONS . '/taxonomy-meta.php' ); // Theme Taxonomy Meta
include( TDL_FUNCTIONS . '/theme-functions.php' ); // Theme Functions
include( TDL_FUNCTIONS . '/woo.php' ); // WooCommerce Functions


//utility function for Barberry shortcode generator conditional
function is_edit_page($new_edit = null){
    global $pagenow;
    //make sure we are on the backend
    if (!is_admin()) return false;


    if($new_edit == "edit")
        return in_array( $pagenow, array( 'post.php',  ) );
    elseif($new_edit == "new") //check for new post page
        return in_array( $pagenow, array( 'post-new.php' ) );
    else //check for either new or edit
        return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
}


#-----------------------------------------------------------------#
# Shortcodes - have to load after taxonomy/post type declarations
#-----------------------------------------------------------------#

function tdl_shortcode_init() {
 	
	if(is_admin()){

		if(is_edit_page()){
			//load barberry shortcode button
			require_once( TDL_FUNCTIONS . '/tinymce/tinymce-class.php' ); 		
		}
	}
}

add_action('init', 'tdl_shortcode_init');


//Add button to page
add_action('media_buttons','tdl_buttons',100);

function tdl_buttons() {
     echo "<a data-effect='mfp-zoom-in' class='button tdl-shortcode-generator' href='#tdl-sc-generator'>Barberry Shortcodes</a>";
}

//Shortcode Processing
require_once( TDL_FUNCTIONS . '/tinymce/shortcode-processing.php' );

    // Windows-proof constants: replace backward by forward slashes - thanks to: https://github.com/peterbouwmeester
    $fslashed_dir = trailingslashit(str_replace('\\','/', dirname(__FILE__)));
    $fslashed_abs = trailingslashit(str_replace('\\','/', ABSPATH));
    
    if(!defined('Redux_OPTIONS_DIR')) {
        define('Redux_OPTIONS_DIR', $fslashed_dir);
    }
    
    if(!defined('Redux_OPTIONS_URL')) {
        define('Redux_OPTIONS_URL', site_url(str_replace($fslashed_abs, '', $fslashed_dir)));
    }
	
function enqueue_media(){
	
	//enqueue the correct media scripts for the media library 

	if ( floatval(get_bloginfo('version')) < "3.5" ) {
	    wp_enqueue_script(
	        'redux-opts-field-upload-js', 
	        Redux_OPTIONS_URL . 'functions/tinymce/fields/upload/field_upload_3_4.js', 
	        array('jquery', 'thickbox', 'media-upload'),
	        time(),
	        true
	    );
	    wp_enqueue_style('thickbox');// thanks to https://github.com/rzepak
	} else {
	    wp_enqueue_script(
	        'redux-opts-field-upload-js', 
	        Redux_OPTIONS_URL . 'functions/tinymce/fields/upload/field_upload.js', 
	        array('jquery'),
	        time(),
	        true
	    );
	    wp_enqueue_media();
	}
	
}



//post meta scripts
function tdl_metabox_scripts() {
	wp_register_script('tdl-upload', TDL_FUNCTIONS . '/tinymce/assets/js/tdl-meta.js', array('jquery'));
	wp_enqueue_script('tdl-upload');
	wp_localize_script('redux-opts-field-upload-js', 'redux_upload', array('url' => Redux_OPTIONS_URL .'functions/tinymce/fields/upload/blank.png'));
	
	if(floatval(get_bloginfo('version')) >= '3.5') {
	    wp_enqueue_style('wp-color-picker');
	    wp_enqueue_script(
	        'redux-opts-field-color-js',
	        Redux_OPTIONS_URL . 'functions/tinymce/fields/color/field_color.js',
	        array('wp-color-picker'),
	        time(),
	        true
	    );
	} else {
	    wp_enqueue_script(
	        'redux-opts-field-color-js', 
	        Redux_OPTIONS_URL . 'functions/tinymce/fields/color/field_color_farb.js', 
	        array('jquery', 'farbtastic'),
	        time(),
	        true
	    );
	}
	
}

add_action('admin_enqueue_scripts', 'tdl_metabox_scripts');
add_action('admin_print_styles', 'enqueue_media'); 


/*-----------------------------------------------------------------------------------*/
/* Widgets */
/*-----------------------------------------------------------------------------------*/
require_once( TDL_FUNCTIONS . '/widgets/posts.php' ); // Posts Widget
require_once( TDL_FUNCTIONS . '/widgets/twitter.php' ); // Twitter Widget
require_once( TDL_FUNCTIONS . '/widgets/social.php' ); // Social Icons Widget
require_once( TDL_FUNCTIONS . '/widgets/portfolio.php' ); // Portfolio List Widget
require_once( TDL_FUNCTIONS . '/widgets/brands.php' ); // Brands Widget

/*-----------------------------------------------------------------------------------*/
/*	 Make theme available for translation
/*	 Translations can be filed in the /languages/ directory
/*	 If you're building a theme based on barberry, use a find and replace
/*	 to change 'tdl_framework' to the name of your theme in all the template files
/*-----------------------------------------------------------------------------------*/


function barberry_theme_setup(){
	load_theme_textdomain( 'tdl_framework', get_template_directory() . '/languages' );
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable($locale_file) ) require_once($locale_file);
}
add_action('after_setup_theme', 'barberry_theme_setup');

/*-----------------------------------------------------------------------------------*/
/*	REGISTER Widgets
/*-----------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'barberry_load_widgets' );
function barberry_load_widgets()
{
   register_widget( 'WP_Widget_Custom_Posts' );
   register_widget( 'WP_Widget_Custom_Twitter' );
   register_widget( 'WP_Widget_Custom_Social' );
   register_widget( 'WP_Widget_Custom_Portfolio' );
}

/*-----------------------------------------------------------------------------------*/
/* Theme Options Function
/*-----------------------------------------------------------------------------------*/

global $barberry_options;
$barberry_options = $smof_data;


/*-----------------------------------------------------------------------------------*/
/* GET PAGE URL
/*-----------------------------------------------------------------------------------*/

function get_permalink_by_name($title){
	$page = get_page_by_title($title);
	$pageID = $page->ID;
	$permalink = get_permalink($pageID);
	return $permalink;
}


/*-----------------------------------------------------------------------------------*/
/* Add postMessage support for site title and description for the Theme Customizer.
/*-----------------------------------------------------------------------------------*/

function barberry_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}

//add_action( 'customize_register', 'barberry_customize_register' );

/*-----------------------------------------------------------------------------------*/
/* Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
/*-----------------------------------------------------------------------------------*/

function barberry_customize_preview_js() {
	wp_enqueue_script( 'barberry-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20120827', true );
}

add_action( 'customize_preview_init', 'barberry_customize_preview_js' );

/*-----------------------------------------------------------------------------------*/
/* Plugin recommendations
/*-----------------------------------------------------------------------------------*/


require_once ( 'includes/class-tgm-plugin-activation.php');
add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
function my_theme_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme
	
		array(
			'name'     				=> 'Contact Form 7', // The plugin name
			'slug'     				=> 'contact-form-7', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/includes/plugins/contact-form-7.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '3.7.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'WooCommerce', // The plugin name
			'slug'     				=> 'woocommerce', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/includes/plugins/woocommerce.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '2.1.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

		array(
			'name'     				=> 'Revolution Slider', // The plugin name
			'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/includes/plugins/revslider.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '4.3.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'Regenerate Thumbnails', // The plugin name
			'slug'     				=> 'regenerate-thumbnails', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/includes/plugins/regenerate-thumbnails.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '2.2.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'Unlimited Sidebars Woosidebars', // The plugin name
			'slug'     				=> 'woosidebars', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/includes/plugins/woosidebars.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.3.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'Search by SKU for Woocommerce', // The plugin name
			'slug'     				=> 'search-by-sku-for-woocommerce', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/includes/plugins/search-by-sku-for-woocommerce.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '0.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
							
		
		array(
			'name'     				=> 'Envato Toolkit', // The plugin name
			'slug'     				=> 'envato-wordpress-toolkit-master', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/includes/plugins/envato-wordpress-toolkit-master.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.6.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'Breadcrumb NavXT', // The plugin name
			'slug'     				=> 'breadcrumb-navxt', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/includes/plugins/breadcrumb-navxt.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '5.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'WP Retina 2x', // The plugin name
			'slug'     				=> 'wp-retina-2x', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/includes/plugins/wp-retina-2x.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.9.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),		


	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> 'barberry',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', 'tdl_framework' ),
			'menu_title'                       			=> __( 'Install Plugins', 'tdl_framework' ),
			'installing'                       			=> __( 'Installing Plugin: %s', 'tdl_framework' ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', 'tdl_framework' ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', 'tdl_framework' ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'tdl_framework' ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'tdl_framework' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}


	


/*-----------------------------------------------------------------------------------*/
/*	Configure WP2.9+ Thumbnails 
/*-----------------------------------------------------------------------------------*/

if( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	add_image_size('admin_thumbs', 150, 90, true);
	add_image_size('recent_posts_shortcode', 190, 190, true);
    add_image_size( 'small', 150, 90, true );        
    add_image_size( 'medium', 400, 250, true );        
    add_image_size( 'large', 860, '', true );        
    add_image_size( 'post-thumb', 860, 450, true );        
    add_image_size( 'slider-image', 1170, 500, true );        
    add_image_size( 'full-width', 1170, '', true );
	add_image_size( 'brands', 200, 150, true );	
	create_barberry_brands_table(); // create wp_wcm_sds_brands table if not exists
}



/*-----------------------------------------------------------------------------------*/
/*	Post Formats
/*-----------------------------------------------------------------------------------*/

$formats = array( 
			'gallery', 
			'video');

add_theme_support( 'post-formats', $formats );


/*--------------------------------------------------------
    Excerpts Setup
--------------------------------------------------------*/


function tdl_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= '';
	}
	return $output;
}

add_filter( 'get_the_excerpt', 'tdl_custom_excerpt_more' );


/*-----------------------------------------------------------------------------------*/
/*	Cleanup Shortcode Fix
/*-----------------------------------------------------------------------------------*/

        function cleanup_shortcode_fix($content) {   
          $array = array (
            '<p>[' => '[', 
            ']</p>' => ']', 
            ']<br />' => ']',
            ']<br>' => ']'
          );
          $content = strtr($content, $array);
            return $content;
        }
        add_filter('the_content', 'cleanup_shortcode_fix', 10);


/*-----------------------------------------------------------------------------------*/
/*	Set Max Content Width (use in conjuction with ".entry-content img" css)
/*-----------------------------------------------------------------------------------*/

	if ( ! isset( $content_width ) ) $content_width = 1170;



/*-----------------------------------------------------------------------------------*/
/*	BETTER SEO PAGE TITLE
/*-----------------------------------------------------------------------------------*/
	
	add_filter( 'wp_title', 'filter_wp_title' );
	/**
	 * Filters the page title appropriately depending on the current page
	 *
	 * This function is attached to the 'wp_title' fiilter hook.
	 *
	 * @uses	get_bloginfo()
	 * @uses	is_home()
	 * @uses	is_front_page()
	 */
	function filter_wp_title( $title ) {
		global $page, $paged;
	
		if ( is_feed() )
			return $title;
	
		$site_description = get_bloginfo( 'description' );
	
		$filtered_title = $title . get_bloginfo( 'name' );
		$filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
		$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) ) : '';
	
		return $filtered_title;
	}
	
	
/*-----------------------------------------------------------------------------------*/
/*	Remove Certain HEAD Tags
/*-----------------------------------------------------------------------------------*/
	
	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );


/*-----------------------------------------------------------------------------------*/
/*	Add Browser Detection Body Class
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tdl_browser_body_class' ) ) {
    function tdl_browser_body_class($classes) {
		global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	
		if($is_lynx) $classes[] = 'lynx';
		elseif($is_gecko) $classes[] = 'gecko';
		elseif($is_opera) $classes[] = 'opera';
		elseif($is_NS4) $classes[] = 'ns4';
		elseif($is_safari) $classes[] = 'safari';
		elseif($is_chrome) $classes[] = 'chrome';
		elseif($is_IE){ 
			$classes[] = 'ie';
			if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version)) $classes[] = 'ie'.$browser_version[1];
		} else $classes[] = 'unknown';
	
		if($is_iphone) $classes[] = 'iphone';
		return $classes;
    }
    
    add_filter('body_class','tdl_browser_body_class');
}


/*--------------------------------------------------------
    Theme CSS Queueing
--------------------------------------------------------*/


function tdl_css_queueing() {
	if (!is_admin()) {
		
		wp_register_style('stylesheet', get_stylesheet_uri(), array(), '1.0', 'all');
		wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
		wp_register_style('bootstrap-responsive', get_template_directory_uri() . '/css/bootstrap-responsive.css');
		wp_register_style('prettyphoto', get_template_directory_uri() . '/css/prettyPhoto.css', array(), '3.1.5', 'all' );
		wp_register_style('fonts', get_template_directory_uri() . '/css/fonts.css');		
		wp_register_style('iosslider', get_template_directory_uri() . '/css/iosslider.css');	
		wp_register_style('responsive', get_template_directory_uri() . '/css/responsive.css');
		wp_register_style('fresco', get_template_directory_uri() . '/css/fresco/fresco.css', array(), '1.2.7', 'all' );
			
		        
        wp_enqueue_style('bootstrap');        
		wp_enqueue_style('prettyphoto' );
		wp_enqueue_style('fonts' );
		wp_enqueue_style('stylesheet');			
		wp_enqueue_style('iosslider');
		wp_enqueue_style( 'fresco' );
		
		
		global $barberry_options;
        if ( $barberry_options['tdl_responsive'] == 'responsive') {

					wp_register_style('bootstrap-responsive', get_template_directory_uri() . '/css/bootstrap-responsive.css');				
					wp_enqueue_style('bootstrap-responsive');
					wp_register_style('responsive', get_template_directory_uri() . '/css/responsive.css');
					wp_enqueue_style('responsive'); 
			} else if ( $barberry_options['tdl_responsive'] == 'responsive940') {
					wp_register_style('bootstrap-responsive940', get_template_directory_uri() . '/css/bootstrap-responsive940.css');				
					wp_enqueue_style('bootstrap-responsive940');				
					wp_register_style('responsive940', get_template_directory_uri() . '/css/responsive940.css');
					wp_enqueue_style('responsive940'); 			
			
			} else {
				wp_register_style('nonresponsive', get_template_directory_uri() . '/css/nonresponsive.css');
				wp_enqueue_style('nonresponsive');				
			}		

    }
}
add_action('wp_enqueue_scripts', 'tdl_css_queueing');

/*-----------------------------------------------------------------------------------*/
/*	Register and load common JS
/*-----------------------------------------------------------------------------------*/

function tdl_register_js() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', NULL, TRUE);		
		wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr.full.min.js', 'jquery', NULL, TRUE);
		wp_register_script('hoverIntent', get_template_directory_uri() . '/js/hoverIntent.js', 'jquery', NULL, TRUE);
		wp_register_script('prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', 'jquery', NULL, TRUE);
		wp_register_script('iosslider', get_template_directory_uri() . '/js/jquery.iosslider.min.js', 'jquery', NULL, TRUE);
		wp_register_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', 'jquery', NULL, TRUE);
		wp_register_script('easing', get_template_directory_uri() . '/js/jquery.easing-1.3.js', 'jquery', NULL, TRUE);
		wp_register_script('customSelect', get_template_directory_uri() . '/js/jquery.customSelect.min.js', 'jquery', NULL, TRUE);
		wp_register_script('fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', 'jquery', NULL, TRUE);
		wp_register_script('fresco', get_template_directory_uri() . '/js/fresco.js', 'jquery', NULL, TRUE);
		wp_register_script('custom', get_template_directory_uri() . '/js/custom.js', 'jquery', NULL, TRUE);

		wp_enqueue_script('bootstrap');		
		wp_enqueue_script('modernizr');
		wp_enqueue_script('hoverIntent');
		wp_enqueue_script('prettyphoto');
		wp_enqueue_script('iosslider');
		wp_enqueue_script('isotope');
		wp_enqueue_script('easing');
		wp_enqueue_script('customSelect');
		wp_enqueue_script('fitvids');
		wp_enqueue_script('fresco');
		wp_enqueue_script('custom');
	}
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
    if ( is_page_template('template-contact.php') ) {        	
		
          	wp_register_script('gMapapi', 'http://maps.google.com/maps/api/js?sensor=false', 'jquery');
            wp_register_script('gMap', get_template_directory_uri() . '/js/jquery.gmap.js', 'jquery');
            wp_enqueue_script('gMapapi');
			wp_enqueue_script('gMap');
            
    }

	global $is_IE;

    if ( $is_IE ) {
        wp_register_script('html5', get_stylesheet_directory_uri() . '/js/html5.js', array(), '3.6', TRUE);
		wp_register_script('respond', get_stylesheet_directory_uri() . '/js/respond.min.js', array(), NULL, TRUE);
		
		wp_enqueue_script('html5');
		wp_enqueue_script('respond');
    }
}

add_action('wp_enqueue_scripts', 'tdl_register_js');


/*-----------------------------------------------------------------------------------*/
/*	Register and load admin javascript
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'tdl_admin_js' ) ) {
    function tdl_admin_js($hook) {
    	if ($hook == 'post.php' || $hook == 'post-new.php') {
    		wp_register_script('tdl-admin', get_template_directory_uri() . '/js/custom.admin.js', 'jquery', true);
    		wp_enqueue_script('tdl-admin');
    	}
    }
    
    add_action('admin_enqueue_scripts','tdl_admin_js',10,1);

}

/*-----------------------------------------------------------------------------------*/
/*	adding shortcodes to excerpts
/*-----------------------------------------------------------------------------------*/

add_filter('the_excerpt', 'do_shortcode');


/*-----------------------------------------------------------------------------------*/
/*	ADD prettyPhoto rel to [gallery] with link=file
/*-----------------------------------------------------------------------------------*/

add_filter( 'wp_get_attachment_link', 'sant_prettyadd', 10, 6);
function sant_prettyadd ($content, $id, $size, $permalink, $icon, $text) {
    if ($permalink) {
    return $content;    
    }
    $content = preg_replace("/<a/","<a rel=\"prettyPhoto[gallery]\"",$content,1);
    return $content;
}

/*-----------------------------------------------------------------------------------*/
/*	Sidebars
/*-----------------------------------------------------------------------------------*/

function barberry_widgets_init() {
	if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
			'name' => __( 'Sidebar', 'tdl_framework' ),
			'id' => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h1 class="widget-title">',
			'after_title' => '</h1>',
		));
		
		register_sidebar(array(
			'name' => __( 'Product listing', 'tdl_framework' ),
			'id' => 'widgets_product_listing',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h1 class="widget-title">',
			'after_title' => '</h1>',
		));
		
		register_sidebar(array(
			'name' => __( 'Product page sidebar', 'tdl_framework' ),
			'id' => 'widgets_product_page_listing',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h1 class="widget-title">',
			'after_title' => '</h1>',
		));		
		
		register_sidebar(array(
			'name' => 'Footer 1',
			'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</div>',
			'before_title' => '<h1 class="widget-title">',
			'after_title' => '</h1>'
		));
		
		register_sidebar(array(
			'name' => 'Footer 2',
			'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</div>',
			'before_title' => '<h1 class="widget-title">',
			'after_title' => '</h1>'
		));
		
		register_sidebar(array(
			'name' => 'Footer 3',
			'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</div>',
			'before_title' => '<h1 class="widget-title">',
			'after_title' => '</h1>'
		));
		
		register_sidebar(array(
			'name' => 'Footer 4',
			'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
			'after_widget' => '</div>',
			'before_title' => '<h1 class="widget-title">',
			'after_title' => '</h1>'
		));

	}
}
add_action( 'widgets_init', 'barberry_widgets_init' );


register_nav_menus(array(
    'primary-menu' => __('Primary Navigation', 'tdl_framework'),
	'topbar' => __( 'Top Bar Navigation', 'tdl_framework' ),
    'secondary' => __( 'Right Header Navigation', 'tdl_framework' ),
));



?>