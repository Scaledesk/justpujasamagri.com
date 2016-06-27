<?php
/*
Template Name: Archive
*/
?>
<?php 
global $barberry_options;
?>

<?php get_header(); ?>
<?php if (is_front_page()) : ?>
<hr class="paddingbottom25" />
<?php endif ?> 
<?php if (!is_front_page()) : ?>
	<?php if ( get_post_meta(get_the_ID(), 'tdl_page_hidetitle', true) != 1) : ?>
    <div class="container">
        <div class="row">
            <div class="span12">
                    <header class="entry-header">
                        <h1 class="entry-title title-page"><?php the_title(); ?></h1>
                        <h2 class="sub-title-page"><?php echo get_post_meta(get_the_ID(), 'tdl_page_caption', TRUE); ?></h2>
                                    
                        <?php 
                        // BREADCRUMBS
                         echo tdl_breadcrumbs();
                        ?>
                        <div class="clearfix"></div>       
                    </header><!-- .entry-header -->
            </div>
        </div>
    </div>
    <?php else : ?>
    	<hr class="paddingbottom25" />
    <?php endif; ?> 
<?php endif; ?> 

<div class="container">
    <div class="row side_<?php echo $sidebar_pos; ?>">

        <div id="primary" class="span9 sidebar page-archive">
        
		<?php if(in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?> 
            <!-- woocommerce message -->
            <?php  woocommerce_show_messages(); ?>
        <?php } ?>        
		<h3 class="archive_title"><?php _e('List of Last 25 Posts:', 'tdl_framework'); ?></h3>
                <ul>

				<?php
				$temp = $wp_query;
				$wp_query= null;
				$wp_query = new WP_Query();
				$wp_query->query('posts_per_page=25'.'&paged='.$paged);				
				while ($wp_query->have_posts()) : $wp_query->the_post();
				?>
                    
                <li>
                    <span class="page_archive_date">
                        <span class="blog_date_day"><?php echo get_the_time('j', $post->ID); ?></span>
                        <span class="blog_date_month"><?php echo get_the_time('M', $post->ID); ?></span>
                    </span>
                    <div class="page_archive_items">
                        <a class="" href="<?php the_permalink() ?>"><h4><?php the_title(); ?></h4></a>	
                        <div class="comments"><?php echo get_comments_number( get_the_ID() ); ?> comments</div>
                    </div>
                </li>	
				
				<?php endwhile; // end of the loop. ?>
                
                </ul>
                
                <?php $wp_query = null; $wp_query = $temp;?>
                
                
                
        		<h3 class="archive_title"><?php _e('Posts by Month (Last 3 Months)', 'tdl_framework'); ?></h3>
        
       			<?php for( $pm = 0; $pm < 3; $pm++ ){
               $pm_last = date('n') - $pm;
               $pm_year = date('Y');
                                    
               if( $pm_last < 1 ) {
                   $pm_last = $pm_last + 12;
                   $pm_year = $pm_year - 1;
               }
                                    
               $pmargs = array( 'post_type' => 'post' , 'posts_per_page' => 10, 'monthnum' => $pm_last, 'year' => $pm_year );
               $post_month = new WP_Query( $pmargs );
                                    
               if ($post_month->have_posts()) :?>                
                
                <h4 class="archive_subtitle"><?php echo date("F", mktime(0, 0, 0, $pm_last)) . ' ' . $pm_year; ?></h4>
                
                <ul class="sitemap-list">
                                            
                      <?php while ( $post_month->have_posts() ) : $post_month->the_post(); ?>
                                      <li>
                    <span class="page_archive_date">
                        <span class="blog_date_day"><?php echo get_the_time('j', $post->ID); ?></span>
                        <span class="blog_date_month"><?php echo get_the_time('M', $post->ID); ?></span>
                    </span>
                    <div class="page_archive_items">
                        <a class="" href="<?php the_permalink() ?>"><h4><?php the_title(); ?></h4></a>	
                        <div class="comments"><?php echo get_comments_number( get_the_ID() ); ?> comments</div>
                    </div>
                </li>
                      <?php endwhile;?>
                                            
                </ul>
                                            
                <?php endif; wp_reset_postdata(); }?>  
                
                <h3 class="archive_title"><?php _e('Posts by Subject (Categories)', 'tdl_framework'); ?></h3>
                
                <ul class="sitemap-list">
                <?php wp_list_categories('orderby=name&show_count=1&number=10&title_li='); ?>
                </ul>              
                
        
		</div>
        
                <div class="span3 rsidebar">
                    <div class="aside_sidecolumn">
                        <?php get_sidebar(); ?>
                    </div>
                </div>            
     

	</div>
</div>
<?php get_footer(); ?>