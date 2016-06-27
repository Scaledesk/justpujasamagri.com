<?php

require_once('posttypes.class.php');

$slider_posttype = new Add_post_types;

$options = array(
  'single' => __('Slider', 'tdl_framework' ),
  'plural' => __('Slider', 'tdl_framework' ),
  'singlealt' => __('Slider Item', 'tdl_framework' ),
  'pluralalt' => __(' Slider Items', 'tdl_framework' ),
  'type' => 'slider',
  'support' => array('title','thumbnail'),
  'rewrite' => false
);

$slider_posttype->init($options);

add_action('init', array(&$slider_posttype, 'add_post_type'));
add_filter('post_updated_messages', array(&$slider_posttype, 'add_messages'));



add_action( 'init', 'create_slider_taxonomies', 0 );

function create_slider_taxonomies() {

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

  register_taxonomy('slider-group','slider',array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => false
  ));
  
}



function tdl_columns_head_slider($defaults) {
    $defaults['slider_thumb'] = 'Thumbnail';
    $defaults['slider_group'] = 'Group';
    return $defaults;
}

function tdl_columns_content_slider($column_name, $slider_ID) {
    if($column_name == 'slider_thumb') {
        if( !get_post_meta($slider_ID, 'ch_slider_video', true) ) {
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($slider_ID), 'thumbnail');
            echo '<img src="' . $thumb[0] . '" title="'. get_the_title($slider_ID) .'" alt="'. get_the_title($slider_ID) .'" />';
        } else { echo 'Video'; }
    } elseif($column_name == 'slider_group') {
        
        $getterms = get_the_terms($slider_ID, 'slider-group');
        
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

add_filter('manage_slider_posts_columns', 'tdl_columns_head_slider', 10);
add_action('manage_slider_posts_custom_column', 'tdl_columns_content_slider', 10, 2);



add_action( 'admin_head', 'slider_custom_icons' );
function slider_custom_icons() {
    ?>
    <style type="text/css" media="screen">
        
        #menu-posts-slider .wp-menu-image {
            background: url("<?php echo get_template_directory_uri() ?>/images/slider-icon.png") no-repeat 0px 7px !important;
			opacity:0.7;
        }
		
        
        #menu-posts-slider:hover .wp-menu-image, #menu-posts-slider.wp-has-current-submenu .wp-menu-image { opacity: 1; }
        
        #icon-edit.icon32-posts-slider { background: url("<?php echo get_template_directory_uri() ?>/images/slider-32x32.png") no-repeat center center; }
        
    </style>    

<?php }




?>