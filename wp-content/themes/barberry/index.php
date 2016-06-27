<?php 
global $barberry_options;
$page_for_posts = get_option('page_for_posts');
$blog = get_post($page_for_posts);
$sidebar_pos = $barberry_options['tdl_blog_sidebar'] ? $barberry_options['tdl_blog_sidebar'] : 'right';
?>

<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="span12">
                <header class="entry-header">
                    <h1 class="entry-title title-page"><?php echo $blog->post_title; ?></h1>
                    <h2 class="sub-title-page"><?php echo get_post_meta($page_for_posts, 'tdl_page_caption', TRUE); ?></h2>
                                
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
    <div class="row side_<?php echo $sidebar_pos; ?> blogpostslist">
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