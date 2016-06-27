<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
 
global $wp_query;
global $barberry_options;
$sidebar_pos = $barberry_options['tdl_sidebar_listing'] ? $barberry_options['tdl_sidebar_listing'] : 'left';
if (isset($_GET["product_sidebar"])) { $sidebar_pos = $_GET["product_sidebar"]; }

$prodrow = $barberry_options['tdl_products_perrow'] ? $barberry_options['tdl_products_perrow'] : 'three_side';
if (isset($_GET["product_num"])) { $prodrow = $_GET["product_num"]; }
get_header('shop'); ?>


<div class="container headerline"></div> 
<hr class="paddingbottom30" />

		<?php if(in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?> 
            <!-- woocommerce message -->
        <div class="container">
            <div class="row">
                <div class="span12">    
            <?php  woocommerce_show_messages(); ?>
                </div>
            </div>
        </div> 
        <?php } ?>

	<div class="container">
    	<div class="row side_<?php echo $sidebar_pos; ?>">
        
        
		<?php if( $sidebar_pos == 'fullwidth' ): ?>
        <div id="primary" class="span12 fullwidth">
        <?php else: ?>
        <div id="primary" class="span9 sidebar">
        <?php endif; ?>              

         <?php if ( have_posts() ) : ?>       
        <div class="category_header">
			 <div class="page_heading">
             	<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
             </div>
             
             <?php 
				// BREADCRUMBS
				echo tdl_breadcrumbs();
			 ?>
             
          
            
            <div class="clearfix"></div>

            <?php if( is_shop() ): ?>

            <?php  
			$shop_banner = $barberry_options['tdl_shop_banner'];
			global $wp_query;
            $cat = $wp_query->get_queried_object();
			?>
            
            <?php if( $shop_banner == '1'): ?>
            
            <?php           

            $image = $barberry_options['tdl_shop_banner_img'];
			$description = $barberry_options['tdl_shop_banner_desc'];
			$color = $barberry_options['tdl_shop_banner_title_pos'];
			$position = $barberry_options['tdl_shop_banner_title_col'];
			$link = $barberry_options['tdl_shop_banner_title_link'];
 
            if($image && $image !=''){
                ?> <?php if(!empty ($link)) { ?><a href="<?php echo $link; ?>"><?php }; ?>
                    <div class="grid_slider">
                    
                    <?php  if(!empty ($description)) { ?>
                            <div class="product-category-description <?php echo $color; ?> <?php echo $position; ?>">
                                <?php echo $description; ?>
                            </div>
                    <?php } ?>
                       
                          <img class="cat-banner" src="<?php echo $image ?>" /> 
                    </div>
                    
                <?php } ?>
			<?php if(!empty ($link)) { ?></a><?php }; ?>

            <?php endif; ?>            
            
            <?php else: ?>


            <?php
			global $wp_query;
            $cat = $wp_query->get_queried_object();
			
			$meta = get_option('banner');
			if (empty($meta)) $meta = array();
			if (!is_array($meta)) $meta = (array) $meta;
			$meta = isset($meta[$cat->term_id]) ? $meta[$cat->term_id] : array();
			$catimage = $meta['banner_image'];
			$bannercolor = $meta['color'];
			$bannerposition = $meta['position'];
			if($catimage && $catimage !=''){
				
			foreach ($catimage as $att) {
            // get image's source based on size, can be 'thumbnail', 'medium', 'large', 'full' or registed post thumbnails sizes
            $src = wp_get_attachment_image_src($att, 'full');
            $src = $src[0];				
			?>

                    <div class="grid_slider">
						<?php  if(isset($cat->description) && $cat->description !='' && !is_shop()) { ?>
                                <div class="product-category-description <?php echo $bannercolor; ?> <?php echo $bannerposition; ?>">
									<?php echo do_shortcode($cat->description); ?>
                                </div>
                        <?php } ?>                    
                        <img class="cat-banner" src="<?php echo $src ?>" /> 
                    </div>
             
				<?php } ?>
			<?php } ?>
        
        <?php endif; ?>

             <div class="orderby_container">
             <div class="filter_wrapper woocommerce2">
			<?php woocommerce_get_template( 'loop/result-count.php' );?>
            
            <div class="orderby_bg">            
            
            <div id="toggle_sidebar"></div>
                    
             <?php global $woocommerce;
					$orderby = isset( $_GET['orderby'] ) ? woocommerce_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
			
					woocommerce_get_template( 'loop/orderby.php', array( 'orderby' => $orderby ) );				
			 ?>
             </div></div>
             <div class="clearfix"></div>
             </div>
  
        	</div>
            
		<?php if (woocommerce_product_subcategories(array( 'before' => '<div id="shop_categories" class="'.$prodrow.'"><ul id="products_cat" class="products">', 'after' => '</ul></div>' ))) : ?>         
        <?php endif; ?>
            
        	<div id="prodrow" class="row-fluid <?php echo $prodrow?>">
                <div class="span12">
                    
                        <ul id="products">                    

                        <?php while ( have_posts() ) : the_post(); ?>        
                                
                                    <?php woocommerce_get_template_part( 'content', 'product' ); ?>                                
        
                        <?php endwhile; // end of the loop. ?>
                        </ul>
                        
                        <script type="text/javascript">
						var $ = jQuery.noConflict();
						
                         $(window).load(function() {
							 
					<?php if ($barberry_options['tdl_product_animation']) { ?>
					<?php if ($barberry_options['tdl_productanim_type'] == "productanim3") { ?>

					<?php } ?>
					 <?php } ?>
							 
						<?php if( $sidebar_pos == 'fullwidth' ): ?>
								$("#toggle_sidebar").hide();
						<?php else: ?>
							
								$(function(){
									$('#toggle_sidebar').toggle(function(){
										$(".rsidebar").addClass("removeside");
										$("#primary").removeClass().addClass("span12 fullwidth");
										<?php if( $prodrow == 'three_side' ): ?>
										$("#prodrow").removeClass().addClass("row-fluid four_side");
										$("#shop_categories").removeClass().addClass("four_side");
										<?php endif; ?>
										$('#products, #products_cat').isotope( 'reloadItems' ).isotope();
									}, function(){

										$(".rsidebar").removeClass("removeside");
										$("#primary").removeClass().addClass("span9 sidebar");
										<?php if( $prodrow == 'three_side' ): ?>
										$("#prodrow").removeClass().addClass("row-fluid three_side");
										$("#shop_categories").removeClass().addClass("three_side");
										<?php endif; ?>
										$('#products, #products_cat').isotope( 'reloadItems' ).isotope();
									});
									
								});
											
							 
						<?php endif; ?> 							 

							
                            // cache container
                            var $container = $('#products, #products_cat');
							
                            // initialize isotope
                            $container.isotope({
                                itemSelector : '.product_item, .product-category',
                                animationEngine : 'best-available',
								layoutMode : 'fitRows',

								animationOptions: {
                        	     	easing: 'easeInOutQuad',
                        	     	queue: false
                        	   	}

                            });							

                        });
                        </script>
                 </div>
             </div>        
    
    


    
            <?php else : ?>
            
                <?php if ( ! woocommerce_product_subcategories() ) : ?>
    
                     <h3><?php _e( 'No products found which match your selection.', 'tdl_framework' ); ?> </h3>
    
                <?php endif; ?>            
    
            <?php endif; ?>
    
            <div class="clearfix"></div>
            
				<?php
					/**
					 * woocommerce_after_shop_loop hook
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				?>
    

        </div>
        
		<?php if( $sidebar_pos == 'left' ||  $sidebar_pos == 'right' ): ?>
                <div class="span3 rsidebar">
                    <div class="aside_sidecolumn">
                        <?php dynamic_sidebar('widgets_product_listing'); ?>
                    </div>
                </div>            
        <?php endif; ?>          
      </div>    
    </div>



<?php get_footer('shop'); ?>