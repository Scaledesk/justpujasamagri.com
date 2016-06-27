<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
 
	global $post, $product, $barberry_options;
	
	// Get category permalink
	$permalinks 	= get_option( 'woocommerce_permalinks' );
	
	$category_slug 	= empty( $permalinks['category_base'] ) ? _x( 'product-category', 'slug', 'woocommerce' ) : $permalinks['category_base'];
	$product_sidebar = $barberry_options['tdl_spage_sidebar_listing'] ? $barberry_options['tdl_spage_sidebar_listing'] : 'fullwidth';
 
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="product_main_infos row-fluid">
    
    	<?php
			/**
			 * woocommerce_before_single_product hook
			 *
			 * @hooked woocommerce_show_messages - 10
			 */
			 do_action( 'woocommerce_before_single_product' );
		?>    

		<div class="product_navigation mobiles"> 
        
		<?php
			$terms = get_the_terms($post->ID,'product_cat');
			$term_list = '';
			if( !empty( $terms )):
		?> 
               
		<div class="product_navigation_wrapper">	
            
 			<?php

				foreach ($terms as $term) {
							$term_list .= '<a href="'.home_url() . '/' . $category_slug . '/'. $term->slug . '">' . $term->name . '</a>';
				}
				
				echo '<div class="nav-back">'. __('Back to ', 'tdl_framework').$term_list.'</div>';
			?> 
            

        <div class="product_navigation_container">
            <?php next_post_link_product('%link', 'next', true); ?>
            <?php previous_post_link_product('%link', 'prev', true); ?>
        </div> 

		</div>
  		<div class="clearfix"></div> 
  	<?php endif; ?>
  
  <h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1>

 <?php if (get_option( 'woocommerce_enable_review_rating' ) === 'yes') : ?> 
    <?php

$count   = $product->get_rating_count();
$average = $product->get_average_rating();

if ( $count > 0 ) : ?>

	<div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
		<div class="star-rating" title="<?php printf( __( 'Rated %s out of 5', 'woocommerce' ), $average ); ?>">
			<span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
				<strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php _e( 'out of 5', 'woocommerce' ); ?>
			</span>
		</div>
		<a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '%s customer review', '%s customer reviews', $count, 'woocommerce' ), '<span itemprop="ratingCount" class="count">' . $count . '</span>' ); ?>)</a>
	</div>
	
<?php endif; ?>

<?php endif; ?>



            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer"  class="summary">
            
                <p itemprop="price" class="price"><?php  echo $product->get_price_html(); ?></p>
            
                <link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
            
            </div> 
       

		</div>
		

        <div class="poduct_details_left_col span6">

        
            <?php
                /**
                 * woocommerce_show_product_images hook
                 *
                 * @hooked woocommerce_show_product_sale_flash - 10
                 * @hooked woocommerce_show_product_images - 20
                 */
                do_action( 'woocommerce_before_single_product_summary' );
            ?>
        
        </div>
 
        <div class="poduct_details_right_col span6">
               
			<?php
				$terms = get_the_terms($post->ID,'product_cat');
				$term_list = '';
				if( !empty( $terms )):					
			?>          

        <div class="product_navigation desktops">
        
        
                <?php
					$term_list = '';
					$j=0;
					foreach ($terms as $term) {
						if($term->parent==0){
							$j++;
							if( $j <= 1 ){
								$term_list .= '<a href="'.home_url() . '/' . $category_slug . '/'. $term->slug . '">' . $term->name . '</a>';
							}
						}
					}
					if(strlen($term_list) > 0){ 
					$size = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
		echo $product->get_categories( ', ', '<div class="nav-back">' . _n( 'Back to','Back to', $size, 'tdl_framework' ) . '', '</div>' );
					};
				?>        
      

        
              
        <div class="product_navigation_container">
            <?php next_post_link_product('%link', 'next', true); ?>
            <?php previous_post_link_product('%link', 'prev', true); ?>
        </div> 
        
        
              
      <div class="clearfix"></div>
      </div> 
      
       
  
  <?php endif; ?> 
  
         
            <div class="summary">

                <?php
                    /**
                     * woocommerce_single_product_summary hook
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked woocommerce_template_single_excerpt - 20
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     */
                    do_action( 'woocommerce_single_product_summary' );
                ?>
           
        
            </div><!-- .summary -->
        
        </div>
        
       
        
        <div class="clearfix"></div>
    
    </div>
    
    <div class="clearfix"></div>
    
    <?php
		//Get the Thumbnail URL
		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), false, '' );
	?>
    


	<div class="product_tabs">
	
		<?php
            /**
             * woocommerce_after_single_product_summary hook
             *
             * @hooked woocommerce_output_product_data_tabs - 10
             * @hooked woocommerce_output_related_products - 20
             */
            do_action( 'woocommerce_after_single_product_summary' );
        ?>
    
    </div>
    
  

</div><!-- #product-<?php the_ID(); ?> -->

     	<?php if( $product_sidebar == 'right' ): ?>
        <div class="poduct_page_sidebar span3">
                <div class="span3 rsidebar">
                    <div class="aside_sidecolumn">
                        <?php dynamic_sidebar('widgets_product_page_listing'); ?>
                    </div>
                </div>         
        </div>
        <?php endif; ?>  

<?php do_action( 'woocommerce_after_single_product' ); ?>