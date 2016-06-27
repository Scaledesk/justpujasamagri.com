<?php

function create_barberry_brands_table()
{
	global $wpdb;
	
	$sql = "CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."barberry_brands` (
	  `meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
	  `brands_term_id` bigint(20) NOT NULL,
	  `meta_key` varchar(255) DEFAULT NULL,
	  `meta_value` longtext,
	  PRIMARY KEY (`meta_id`)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
	
	$wpdb->query($sql);
	
	add_option('barberry_brands_version','1.0') or update_option('barberry_brands_version','1.0');
	
}

add_action( 'init', 'register_taxonomy_brands' );

function register_taxonomy_brands() {

	global $woocommerce;
	
	if(!isset($woocommerce)) return;

    $labels = array(
		'name'              => _x( 'Brands', 'taxonomy general name','tdl_framework' ),
		'singular_name'     => _x( 'Brand', 'taxonomy singular name','tdl_framework' ),
		'search_items'      => __( 'Search Brands','tdl_framework'  ),
		'all_items'         => __( 'All Brands','tdl_framework'  ),
		'parent_item'       => __( 'Parent Brand','tdl_framework'  ),
		'parent_item_colon' => __( 'Parent Brand:','tdl_framework'  ),
		'edit_item'         => __( 'Edit Brand','tdl_framework'  ),
		'update_item'       => __( 'Update Brand' ,'tdl_framework' ),
		'add_new_item'      => __( 'Add New Brand','tdl_framework'  ),
		'new_item_name'     => __( 'New Brand Name','tdl_framework'  ),
		'menu_name'         => __( 'Brands','tdl_framework'  ),
	);

    $args = array( 
        'labels' => $labels,
        'public' => true,
        //'show_in_nav_menus' => false,
        'show_ui' => true,
       // 'show_tagcloud' => true,
        'hierarchical' => true,
        'rewrite' => array('slug'=>'product-brands'),
        'query_var' => true,
		'can_export' => true,
				
    );

	if(post_type_exists('product'))
		register_taxonomy( 'brands', 'product', $args );

}

function get_brands_term_by_product_id($post_id){
	
	global $wpdb;
	
	return (int)$wpdb->get_var( "SELECT tt.term_id as term_id FROM $wpdb->term_taxonomy tt left join $wpdb->term_relationships tr on tt.term_taxonomy_id = tr.term_taxonomy_id where tr.object_id = $post_id and tt.taxonomy = 'brands' limit 0,1");
	
}

function barberry_brands_thumbnail_id($term_id)
{
	global $wpdb;
	
	return (int)$wpdb->get_var( "SELECT meta_value FROM {$wpdb->prefix}barberry_brands where brands_term_id = $term_id");
	
}

function brands_admin_custom_columns_title($columns)
{
	$columns = array(	
		"cb" => "<input type=\"checkbox\" />",
		"thumb" => __('Thumbnail','tdl_framework'),
		"name" => __( "Name",'tdl_framework'),
		"description"=> __( "Description",'tdl_framework'),
		"slug" => __( "Slug",'tdl_framework' ),
		"posts" => __( "Count",'tdl_framework' ),
	);
	
	return $columns;
}

function brands_admin_custom_columns($display,$columns,$term_id){
	
	global $woocommerce;
	
	switch($columns):
	
		case 'thumb':
		
			$attach_id = barberry_brands_thumbnail_id($term_id);
		
			$image = wp_get_attachment_image_src($attach_id,'brands');
		
			//echo gettype($attach_id);
		
			if($attach_id > 0)
				$image = $image[0];
				
			elseif(isset($woocommerce))
				$image = woocommerce_placeholder_img_src();
		
		
			echo "<img src='{$image}' height='150' width='200' />";
		
			break;
		
	endswitch;
	
}
function brands_admin_add_form(){
	
	global $woocommerce;
	
?>
	<script type="text/javascript">
	
		jQuery(function($){
			
			if(!$('#edittag').length)
				$('.remove_image_button').hide();
			
			var file_frame;

			$(document).on( 'click', '.upload_image_button', function( event ){
				
				event.preventDefault();
				
				// If the media frame already exists, reopen it.
				if ( file_frame ) {
					file_frame.open();
					return;
				}
				
				file_frame = wp.media.frames.downloadable_file = wp.media({
					title: '<?php _e( 'Choose an image', 'tdl_framework' ); ?>',
					button: {
						text: '<?php _e( 'Use image', 'tdl_framework' ); ?>',
					},
					multiple: false
				});

				// When an image is selected, run a callback.
				file_frame.on( 'select', function() {
					attachment = file_frame.state().get('selection').first().toJSON();

					$('#barberry_brand_logo').val( attachment.id );				
					
					if($('#product_cat_thumbnail img').length > 0)
					
						$('#product_cat_thumbnail img').attr('src', attachment.url );
						
					else
						$('#product_cat_thumbnail').html('<img src="'+attachment.url+'" width="60" height="60" />');
						
					jQuery('.remove_image_button').show();
				});
				
				// Finally, open the modal.
				file_frame.open();
				
				return false;  
				
				
			});
			
			jQuery(document).on( 'click', '.remove_image_button', function( event ){
				
				$('#product_cat_thumbnail img').attr('src', '<?php echo isset($woocommerce)? woocommerce_placeholder_img_src():''; ?>');
				$('#barberry_brand_logo').val('');
				
				$('.remove_image_button').hide();
				
				return false;
				
			});
			
				
			
			
		});
	
	</script>	
<?php
}

function brands_admin_add_form_fields(){
	
	global $woocommerce;
	
	if(isset($woocommerce)) $imgsrc = woocommerce_placeholder_img_src();
	
	
?>
    
    <style type="text/css">
	input.upload_image_button:hover{
		cursor:pointer;
	}
	</style>
    <div class="form-field">
		<label><?php _e( 'Thumbnail', 'tdl_framework' ); ?></label>
		
        <div id="product_cat_thumbnail" style="float:left;margin-right:10px;">
            <img src="<?php echo $imgsrc?>" width="60" height="60" />
        </div>
        <div style="line-height:60px;">
            
            <input type="hidden" id="barberry_brand_logo" name="barberry_brand_logo" value="" /> 
            <button type="submit" class="upload_image_button button"><?php _e( 'Upload/Add image', 'woocommerce' ); ?></button>
            <button type="submit" class="remove_image_button button"><?php _e( 'Remove image', 'woocommerce' ); ?></button>
        </div>
        
    </div>
    
<?php
	
}


function brands_admin_edit_form_fields($vals,$p2){
	
	global $woocommerce;
	
	$term_id = (int)$vals->term_id;
	
	$attach_id = barberry_brands_thumbnail_id($term_id);
	
	$image = wp_get_attachment_image_src($attach_id,'full');
	
	if($attach_id > 0)
		$image = $image[0];
		
	elseif(isset($woocommerce))
		$image = woocommerce_placeholder_img_src();
	
	?>
    <style type="text/css">
	input.upload_image_button:hover{
		cursor:pointer;
	}
	</style>
    <tr class="form-field">
		<th scope="row" valign="top"><label><?php _e( 'Thumbnail','tdl_framework' ); ?></label></th>
		<td>
    <div class="brand_logo">
        <div id="product_cat_thumbnail" style="float:left;margin-right:10px;"><img src="<?php echo $image?>" width="60" height="60" /></div>
        <div style="line-height:60px;">
        <input type="hidden" id="barberry_brand_logo" name="barberry_brand_logo" value="<?php echo $attach_id?>" /> 
        <button type="submit" class="upload_image_button button"><?php _e( 'Upload/Add image', 'woocommerce' ); ?></button>
		<button type="submit" class="remove_image_button button"><?php _e( 'Remove image', 'woocommerce' ); ?></button>
        </div>
    </div>
    </td>
    </tr>
    
<?php
	
}

function admin_enqueue_scripts_for_brands(){	
	wp_enqueue_script('jquery');
	wp_enqueue_media();	
}

function set_barberry_brand_logo($params = array())
{
	global $wpdb;
	
	if(empty($params)) return;
	
	extract($params);
	
	$meta_key = 'thumbnail_id';
	
	$count = $wpdb->get_var( "SELECT COUNT(*) FROM {$wpdb->prefix}barberry_brands where brands_term_id = $term_id");
	
	if($count>0):
		
		$wpdb->query("update {$wpdb->prefix}barberry_brands set meta_value = '$attach_id' where brands_term_id = $term_id and meta_key = '$meta_key'");
	
	else:
	
		$wpdb->query("insert into {$wpdb->prefix}barberry_brands(brands_term_id, meta_key, meta_value) values($term_id, '$meta_key', '$attach_id')");	
	
	endif;
		
}

function barberry_brands_fields_save($term_id, $tt_id, $taxonomy)
{
	if(isset($_POST['barberry_brand_logo'])):
	
		set_barberry_brand_logo(array('term_id' => $term_id, 'attach_id' => $_POST['barberry_brand_logo']));
		
	endif;
}



add_action('admin_enqueue_scripts','admin_enqueue_scripts_for_brands');
add_action('manage_edit-brands_columns', 'brands_admin_custom_columns_title');
add_action('manage_brands_custom_column', 'brands_admin_custom_columns', 10 , 3);

add_action('brands_edit_form_fields','brands_admin_edit_form_fields',10,2);
add_action('brands_edit_form', 'brands_admin_add_form');
add_action('brands_add_form_fields','brands_admin_add_form_fields');
add_action('brands_add_form','brands_admin_add_form');
add_action('created_term', 'barberry_brands_fields_save', 10,3 );
add_action('edit_term', 'barberry_brands_fields_save', 10,3 );



?>