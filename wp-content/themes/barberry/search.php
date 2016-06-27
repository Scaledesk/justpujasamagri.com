<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="span12">
                <header class="entry-header">
                    <h1 class="entry-title title-page"><?php printf( __( 'Search Results for: %s', 'tdl_framework' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                                
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
    <div class="row side_right">
        <div id="primary" class="span9 sidebar">


    <?php 
		// set page to load all returned results
	    global $query_string;
		query_posts( $query_string . '&posts_per_page=-1' );
		if( have_posts() ) : 
	?>
    
                <div class="search_portfolio">
                    <h2 class="search-title"><?php _e('Portfolios', 'tdl_framework'); ?></h2>
                    <div class="row">
                <?php 
                    // rewind the posts to filter for portfolio items
                    rewind_posts();
                    $i = 0;
                    while( have_posts() ) : the_post();
                        if( $post->post_type == 'portfolio' ) {
                            $i++;
							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
     						$thumb = tdl_resize( $thumb[0], 600, 300, true, false );
                        
					?>
                    
                <div id="portfolio-<?php the_ID(); ?>" class="portfolio-item span3">
                <?php if ( has_post_thumbnail() ):?>
                    <figure>
                        <a class="link-to-post" href="<?php the_permalink(); ?>">
                        <img src="<?php echo $thumb[0]; ?>" width="<?php echo $thumb[1]; ?>" height="<?php echo $thumb[2]; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                        </a>
                    </figure>
                 <?php endif; ?>   
                    <div class="portfolio-item-details">
                        <span class="portfolio-item-category">
                        <?php echo get_the_term_list( $post->ID, 'port-group', '', ', ', '' ); ?>
                        </span>
                        <h4 class="portfolio-item-title"><a class="link-to-post" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    </div>
                </div>
  	
				<?php				
				};		
                    endwhile; 
                    if( $i == 0 ) { printf('<div class="span12"><h4>%s</h4></div>', __('No portfolios match the search terms', 'tdl_framework')); }
                ?>
                    </div>
                </div>
                
                
                <div class="search_pages">
                    <h2 class="search-title"><?php _e('Pages', 'tdl_framework'); ?></h2>
                    <ol>
        		<?php 
        		    // return only our post items
        		    $i = 0;
        		    while( have_posts() ) : the_post(); 
                        if( $post->post_type == 'page' ) {
                            $i++;
                            printf('<li><h4><a href="%1$s">%2$s</a></h4><p>%3$s</p></li>', get_permalink(), get_the_title(), get_the_excerpt()); 
                        }
                    endwhile;
                    if( $i == 0 ) { printf('<li><h4>%s</h4></li>', __('No pages match the search terms', 'tdl_framework')); }
                ?>
                    </ol>

                </div>                
    
                <div class="search_posts">
                    <h2 class="search-title"><?php _e('Posts', 'tdl_framework'); ?></h2>
                    <ol>
        		<?php 
        		    // return only our post items
        		    $i = 0;
        		    while( have_posts() ) : the_post(); 
                        if( $post->post_type == 'post' ) {
                            $i++;
                            printf('<li><h4><a href="%1$s">%2$s</a></h4><p>%3$s</p></li>', get_permalink(), get_the_title(), get_the_excerpt()); 
                        }
                    endwhile;
                    if( $i == 0 ) { printf('<li><h4>%s</h4></li>', __('No posts match the search terms', 'tdl_framework')); }
                ?>
                    </ol>
                </div>

    
    
        	<?php else : ?>
            
            


    <h2><?php printf( __('Your search for <em>"%s"</em> did not match any entries','tdl_framework'), get_search_query() ); ?></h2 >
    <br />


        			<!--BEGIN .entry-content-->
        			<div class="entry-content">
        				    <div class="searchbox">
                            <div class="input-append">
                            <?php get_search_form(); ?>
                            </div>    
                            </div>
                        <div class="clearfix"></div>
        				<h4><?php _e('Suggestions:','tdl_framework') ?></h4>
                                				<ul>
        					<li><?php _e('Make sure all words are spelled correctly.', 'tdl_framework') ?></li>
        					<li><?php _e('Try different keywords.', 'tdl_framework') ?></li>
        					<li><?php _e('Try more general keywords.', 'tdl_framework') ?></li>
        				</ul>
        			<!--END .entry-content-->
        			</div>
                    
                        
    <?php endif; ?> 
        
		</div>
                <div class="span3 rsidebar">
                    <div class="aside_sidecolumn">
                        <?php get_sidebar(); ?>
                    </div>
                </div>      

	</div>
</div>
<?php get_footer(); ?>