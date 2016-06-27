<?php

require_once('posttypes.class.php');

$portfolio_posttype = new Add_post_types;

$options = array(
  'single' => __('Portfolio', 'tdl_framework' ),
  'plural' => __('Portfolio', 'tdl_framework' ),
  'singlealt' => __('Portfolio Item', 'tdl_framework' ),
  'pluralalt' => __(' Portfolio Items', 'tdl_framework' ),
  'type' => 'portfolio',
  'support' => array('title','editor','thumbnail','comments'),
  'rewrite' => array( 'slug' => 'portfolio-item' )
);

$portfolio_posttype->init($options);

add_action('init', array(&$portfolio_posttype, 'add_post_type'));
add_filter('post_updated_messages', array(&$portfolio_posttype, 'add_messages'));



add_action( 'init', 'create_portfolio_taxonomies', 0 );

function create_portfolio_taxonomies() {

  $labels = array(
    'name' => __( 'Groups', 'tdl_framework' ),
    'singular_name' => __( 'Group', 'tdl_framework' ),
    'search_items' =>  __( 'Search Groups', 'tdl_framework' ),
    'popular_items' => __( 'Popular Groups', 'tdl_framework' ),
    'all_items' => __( 'All Groups', 'tdl_framework' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Group', 'tdl_framework' ), 
    'update_item' => __( 'Update Group', 'tdl_framework' ),
    'add_new_item' => __( 'Add New Group', 'tdl_framework' ),
    'new_item_name' => __( 'New Group Name', 'tdl_framework' ),
    'separate_items_with_commas' => null,
    'add_or_remove_items' => null,
    'choose_from_most_used' => null,
    'menu_name' => __( 'Groups', 'tdl_framework' ),
  ); 

  register_taxonomy('port-group','portfolio',array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'portfolio-group', 'hierarchical' => true )
  ));
 
}



function tdl_columns_head_portfolio($defaults) {
    $defaults['portfolio_thumb'] = __( 'Thumbnail', 'tdl_framework' );
    $defaults['portfolio_type'] = __('Item Type', 'tdl_framework' );
    $defaults['portfolio_group'] = __('Group', 'tdl_framework' );
    return $defaults;
}

function tdl_columns_content_portfolio($column_name, $portfolio_ID) {
    if($column_name == 'portfolio_thumb'){
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($portfolio_ID), 'small');
        echo '<img src="' . $thumb[0] . '" title="'. get_the_title($portfolio_ID) .'" alt="'. get_the_title($portfolio_ID) .'" />';
    } elseif($column_name == 'portfolio_type') {
        
        echo ucwords( get_post_meta( $portfolio_ID, 'tdl_port_type', true ) );
        
    } elseif($column_name == 'portfolio_group') {
        
        $getterms = get_the_terms($portfolio_ID, 'port-group');
        
        if ($getterms) {
            
            $terms = array();
            
			foreach ($getterms as $getterm) {
                $terms[] = $getterm->name;
			}
            
            $terms = implode(", ", $terms);
        }
        
        echo $terms;
        
    }
}

add_filter('manage_portfolio_posts_columns', 'tdl_columns_head_portfolio', 10);
add_action('manage_portfolio_posts_custom_column', 'tdl_columns_content_portfolio', 10, 2);



add_action( 'admin_head', 'portfolio_custom_icons' );
function portfolio_custom_icons() {
    ?>
    <style type="text/css" media="screen">
        
        #menu-posts-portfolio .wp-menu-image {
            background: url("<?php echo get_template_directory_uri() ?>/images/portfolio-icon.png") no-repeat 6px 7px !important;
			opacity:0.7;
        }
		
        
        #menu-posts-portfolio:hover .wp-menu-image, #menu-posts-portfolio.wp-has-current-submenu .wp-menu-image { opacity: 1; }
        
        #icon-edit.icon32-posts-portfolio { background: url("<?php echo get_template_directory_uri() ?>/images/portfolio-32x32.png") no-repeat center center; }
        
    </style>
<?php }



function tdl_enable_portfolio_sort() {
    add_submenu_page('edit.php?post_type=portfolio', __('Sort Portfolio Items', 'tdl_framework' ), __('Sort Portfolio', 'tdl_framework' ), 'edit_posts', 'sort_portfolio_items', 'tdl_sort_portfolio');
}
add_action('admin_menu' , 'tdl_enable_portfolio_sort');
 
 
function tdl_sort_portfolio() {
	$portfolio = new WP_Query('post_type=portfolio&posts_per_page=-1&orderby=menu_order&order=ASC');
?>
	<div class="wrap">
	<h2><?php echo __('Sort Portfolio Items', 'tdl_framework' );?> <img src="<?php echo home_url(); ?>/wp-admin/images/loading.gif" id="loading-animation" /></h2>
	<ul id="portfolio-item-list">
	<?php while ( $portfolio->have_posts() ) : $portfolio->the_post(); ?>
		<li id="<?php the_ID(); ?>"><?php the_title(); ?> <span><?php echo ucwords( get_post_meta( get_the_ID(), 'tdl_port_type', true ) ); ?></span></li>			
	<?php endwhile; ?>
	</div><!-- End div#wrap //-->
 
<?php
}


function tdl_portfoliosort_print_scripts() {
	global $pagenow;
 
	$pages = array('edit.php');
	if (in_array($pagenow, $pages)) {
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('portfoliosortJS', get_template_directory_uri().'/functions/posttypes/portfoliosort.js');
	}
}
add_action( 'admin_print_scripts', 'tdl_portfoliosort_print_scripts' );


function tdl_portfoliosort_print_styles() {
	global $pagenow;
 
	$pages = array('edit.php');
	if (in_array($pagenow, $pages))
		wp_enqueue_style('portfoliosortCSS', get_template_directory_uri('template_url').'/functions/posttypes/portfoliosort.css');
}
add_action( 'admin_print_styles', 'tdl_portfoliosort_print_styles' );

 
function tdl_save_portfoliosort_order() {
	global $wpdb;
 
	$order = explode(',', $_POST['portfoliosortorder']);
	$counter = 0;
 
	foreach ($order as $portfolio_id) {
		$wpdb->update($wpdb->posts, array( 'menu_order' => $counter ), array( 'ID' => $portfolio_id) );
		$counter++;
	}
	die(1);
}
add_action('wp_ajax_portfolio_sort', 'tdl_save_portfoliosort_order');

?>