<?php 
$page_for_posts = get_option('page_for_posts');
$blog = get_post($page_for_posts);
global $barberry_options;
$sidebar_pos = $barberry_options['tdl_blog_sidebar'] ? $barberry_options['tdl_blog_sidebar'] : 'right';
?>

<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="span12">
                <header class="entry-header">
                    <h1 class="entry-title title-page">
 						<?php
							if ( is_category() ) {
								printf( __( 'Category Archives: %s', 'tdl_framework' ), '<span>' . single_cat_title( '', false ) . '</span>' );

							} elseif ( is_tag() ) {
								printf( __( 'Tag Archives: %s', 'tdl_framework' ), '<span>' . single_tag_title( '', false ) . '</span>' );

							} elseif ( is_author() ) {
								/* Queue the first post, that way we know
								 * what author we're dealing with (if that is the case).
								*/
								the_post();
								printf( __( 'Author Archives: %s', 'tdl_framework' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
								/* Since we called the_post() above, we need to
								 * rewind the loop back to the beginning that way
								 * we can run the loop properly, in full.
								 */
								rewind_posts();

							} elseif ( is_day() ) {
								printf( __( 'Daily Archives: %s', 'tdl_framework' ), '<span>' . get_the_date() . '</span>' );

							} elseif ( is_month() ) {
								printf( __( 'Monthly Archives: %s', 'tdl_framework' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

							} elseif ( is_year() ) {
								printf( __( 'Yearly Archives: %s', 'tdl_framework' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

							} else {
								_e( 'Archives', 'tdl_framework' );

							}
						?>                   
                    </h1>
                                
                    <?php 
                    // BREADCRUMBS
                     echo tdl_breadcrumbs();
                    ?>
                    <div class="clearfix"></div>       
                </header><!-- .entry-header -->
        </div>
    </div>
</div>
<div class="container">
    <div class="row side_<?php echo $sidebar_pos; ?>">
        <div id="primary" class="span9 sidebar">

		<?php if(in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?> 
            <!-- woocommerce message -->
            <?php  woocommerce_show_messages(); ?>
        <?php } ?>  
        
                    <div class="postcontent nobottommargin">
                    
                    <?php if (have_posts()) : ?>
                    
                        <div id="posts" class="clearfix">
                        
                    <?php while (have_posts()) : the_post(); ?>
                    
                            <article id="post-<?php the_ID(); ?>" <?php post_class('entry clearfix'); ?>>                         
                        
                                <?php get_template_part( 'includes/post', 'standard' ); ?>
                        
                            </article>
                        
                    <?php endwhile;?>
                        
                        </div>
                        
                        <div class="navigation page-navigation clearfix">

                            <?php tdl_pagination(); ?>
                        
                        </div>
                        
                    <?php else: ?>
                        
                    <div class="styledmsg errormsg clearfix"><span class="clearfix"><?php _e("Sorry, Couldn't find any Posts..!", "tdl_framework") ?></span></div>
                        
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                        
                    </div>

        
		</div>
        

                <div class="span3 rsidebar">
                    <div class="aside_sidecolumn">
                        <?php get_sidebar(); ?>
                    </div>
                </div>            


	</div>
</div>
<?php get_footer(); ?>