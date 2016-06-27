<?php global $barberry_options; ?>
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
    <div class="row">
        <div id="primary" class="span12 fullwidth">
        
<?php if(in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?> 
	<!-- woocommerce message -->
	<?php  woocommerce_show_messages(); ?>
<?php } ?>        


		<?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                    <?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
                        <div class="entry-thumbnail">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php } ?>
                    
                    <div class="entry-content">
                        <div class="content_wrapper four_side shopproductlist">
                            <?php the_content(); ?>
                            <div class="clearfix"></div>
                            <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'tdl_framework' ), 'after' => '</div>' ) ); ?>
                            <?php edit_post_link( __( 'Edit', 'tdl_framework' ), '<span class="edit-link">', '</span>' ); ?>
                        </div>
                    </div><!-- .entry-content -->
                    
                </article><!-- #post-<?php the_ID(); ?> -->
                
                <?php if ($barberry_options['tdl_page_comments']) { ?>
                
                <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template( '', true );
                ?>
                
                <?php } ?>
                
                <div class="clearfix"></div>

        <?php endwhile; // end of the loop. ?>
        
		</div>
      

	</div>
</div>
<?php get_footer(); ?>