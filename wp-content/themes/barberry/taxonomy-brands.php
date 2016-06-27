<?php
global $woocommerce, $wpdb, $wp_query, $barberry_options;
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

	<div class="container woocommerce woocommerce-page">
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
    
                     <h3><?php _e( 'No products found which match your selection.', 'tdl_framework' ); ?></h3>
    
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