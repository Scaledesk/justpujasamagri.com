<?php 
global $barberry_options;
$page_for_posts = get_option('page_for_posts');
$blog = get_post($page_for_posts);
$sidebar_pos = $barberry_options['tdl_blog_sidebar'] ? $barberry_options['tdl_blog_sidebar'] : 'right';
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), false, '' );
?>
<?php  $format = get_post_format(); if( false === $format ) { $format = 'standart'; } ?>
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
    <div class="row side_<?php echo $sidebar_pos; ?> blogsingle ">
    
        <div id="primary" class="span9 sidebar">

			<div id="content" class="site-content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
    


            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <div class="blog_list single_blog_title">
            
                <div class="entry_info">
                    <div class="entry_date">
                        <span><?php the_time('j'); ?></span><?php the_time('M'); ?>
                    </div>    
                </div>
                
            <div class="entry_post">
            <h2 title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h2>
            <div class="entry_meta clearfix">
            <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
                <ul>        	
                    <?php if( has_category() ): ?>
                    <li><span><?php _e( 'Posted in', 'tdl_framework' ); ?></span> <?php the_category( ', ' ); ?></li>
                    <?php endif; ?>
                    <li class="date_show"><span><?php _e( 'Posted on', 'tdl_framework' ); ?></span> <?php the_time( get_option('date_format') ); ?></li>
                    <?php $tags_list = get_the_tag_list( '', __( ', ', 'tdl_framework' ) );
                          if ( $tags_list ) :?>
                    <li><?php printf( __( 'Tags: %1$s', 'tdl_framework' ), $tags_list ); ?></li>
                    <?php endif; // End if $tags_list ?>
                </ul>
            <?php endif; // End if 'post' == get_post_type() ?>
            </div>
            </div>
            <div class="clearfix"></div>
            </div>
            
            
<?php  if ( get_post_meta(get_the_ID(), 'tdl_post_featured_image', true) == '1' ) :?>    
            
    <?php 
	$the_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'post-thumb');
	$full_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full');
	$alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
	?>
    
    <?php if( $format == 'standart' ): ?><!-- Standart Post --> 
    	<?php if ( has_post_thumbnail() ):?>
        	<div class="entry_image single_image">
            <a class="zoom" rel="prettyPhoto" href="<?php echo $full_thumb[0]; ?>" title="<?php the_title_attribute(); ?>"></a>
            <a href="<?php echo $full_thumb[0]; ?>" rel="prettyPhoto" title="<?php the_title_attribute(); ?>">
            <img src="<?php echo $the_thumb[0]; ?>" width="<?php echo $the_thumb[1]; ?>" height="<?php echo $the_thumb[2]; ?>" 
    alt="<?php if(count($alt)) echo $alt; ?>" title="<?php the_title_attribute(); ?>" />
            </a>
            </div>
        <?php endif; ?>
        
    <?php elseif( $format == 'video' ): ?><!-- Video Post --> 
		<?php if ( get_post_meta( get_the_ID(), 'tdl_post_video', true ) !== '' ):?>
        <?php
        $video_embed_code = get_post_meta( get_the_ID(), 'tdl_post_video', true );
        $vendor = parse_url($video_embed_code);?>
        
        <div class="entry_image single_image">
        
        <div class="vcontainer">
        <?php if ($vendor['host'] == 'www.youtube.com' || $vendor['host'] == 'youtu.be' || $vendor['host'] == 'www.youtu.be' || $vendor['host'] == 'youtube.com'){ ?>
                    
        <?php if ($vendor['host'] == 'www.youtube.com') { parse_str( parse_url( $video_embed_code, PHP_URL_QUERY ), $my_array_of_vars ); ?>
                        <iframe width="620" height="350" src="http://www.youtube.com/embed/<?php echo $my_array_of_vars['v']; ?>?modestbranding=1;rel=0;showinfo=0;autoplay=0;autohide=1;yt:stretch=16:9;" frameborder="0" allowfullscreen></iframe>
        <?php } else { ?>
                        <iframe width="620" height="350" src="http://www.youtube.com/embed<?php echo parse_url($video_embed_code, PHP_URL_PATH);?>?modestbranding=1;rel=0;showinfo=0;autoplay=0;autohide=1;yt:stretch=16:9;" frameborder="0" allowfullscreen></iframe>
        <?php } } ?>
            
        <?php if ($vendor['host'] == 'vimeo.com'){ ?>
        <iframe src="http://player.vimeo.com/video<?php echo parse_url($video_embed_code, PHP_URL_PATH);?>?title=1&amp;byline=1&amp;portrait=1" width="620" height="350" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>  
        <?php } ?>        
     
                
        </div>
        </div>    
        <?php endif; ?>
    <?php elseif( $format == 'gallery' ): ?><!-- Gallery Post -->
    	<?php if ( rwmb_meta( 'tdl_post_gallery') !== '' ):?>
        <?php 
		$gallery = rwmb_meta( 'tdl_post_gallery', 'type=image&size=large' );
		$post_thumbnails = get_post_meta( get_the_ID(), 'tdl_post_thumbnails', true );
		?> 
        
                <script type="text/javascript">
                
                    (function($){
                       $(window).load(function(){
                           $('#post_slider_<?php echo get_the_ID(); ?>').iosSlider({
                                scrollbar: false,
                                snapToChildren: true,
                                desktopClickDrag: true,
                                infiniteSlider: false,
								autoSlide: <?php if (get_post_meta( get_the_ID(), 'tdl_post_slideshow', true ) == 1) {echo "true";} else {echo "false";}?>,
                                autoSlideTimer: <?php echo get_post_meta( get_the_ID(), 'tdl_post_slideshowSpeed', true ); ?>,								
                                navPrevSelector: $('.products_slider_previous'),
                                navNextSelector: $('.products_slider_next'),
                                scrollbarHeight: '2',
                                scrollbarBorderRadius: '0',
                                scrollbarOpacity: '0.5',
								onSliderLoaded: custom_post_UpdateSliderHeight,
								onSlideChange: custom_post_UpdateSliderHeight,
								onSliderResize: custom_post_UpdateSliderHeight,
							
						});
		
					function custom_post_UpdateSliderHeight(args) {
											
						currentSlide = args.currentSlideNumber;
						
						/* update height of the first slider */
			
							setTimeout(function() {
								var setHeight = $('#post_slider_<?php echo get_the_ID(); ?> .item:eq(' + (args.currentSlideNumber-1) + ')').outerHeight(true);
								$('#post_slider_<?php echo get_the_ID(); ?>').animate({ height: setHeight+30 }, 300);
							},300);
							
						}
					
					})
				})(jQuery);
        
                </script>
                
                <div id="post_slider_<?php echo get_the_ID(); ?>" class="postSlider"> 
                	<div class = "slider"> 
                    	<?php foreach ( $gallery as $gallery_image ): ?>
                         <div class="item">
                            <span itemprop="image">
                            <a class="zoom" rel="prettyPhoto[gallery_<?php echo get_the_ID(); ?>]" href="<?php echo $gallery_image['url']; ?>" title="<?php the_title_attribute(); ?>"></a>
							<img src="<?php echo $gallery_image['url']; ?>" width="<?php echo $gallery_image['width']; ?>" height="<?php echo $gallery_image['height']; ?>" alt="<?php echo $gallery_image['alt']; ?>" title="<?php the_title_attribute(); ?>" /></a>
                            </span>
                        </div>
                        <?php endforeach; ?>
                        
                    </div>
                    
                    <div class='products_slider_previous'></div>
                    <div class='products_slider_next'></div>
               </div>
                
                      
        
        <?php endif; ?>  
    <?php else: ?>    
	<?php endif; ?>
     <?php endif; ?>           
                <div class="entry-content">
                    <?php the_content(); ?>
                    <div class="clearfix"></div>
                    <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'tdl_framework' ), 'after' => '</div>' ) ); ?>
                </div><!-- .entry-content -->
                
            <div class="product_share post_share"> 
                <span><?php _e('Share:', 'tdl_framework'); ?></span>   
                    <ul>    
                        <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
			      '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"  class="product_share_facebook" title="<?php _e('Share on Facebook', 'tdl_framework'); ?>"></a></li>
                        <li><a href="https://twitter.com/share?url=<?php the_permalink(); ?>" target="_blank" onclick="javascript:window.open(this.href,
			      '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="product_share_twitter" title="<?php _e('Tweet this item', 'tdl_framework'); ?>"></a></li> 
                         <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="product_share_google" onclick="javascript:window.open(this.href,
						      '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" title="<?php _e('Share on Google+', 'tdl_framework'); ?>"></a></li>                       
                        <li><a href="//pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $src[0] ?>&description=<?php strip_tags(the_title()); ?>" onclick="javascript:window.open(this.href,
			      '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="product_share_pinterest" title="<?php _e('Pin this item', 'tdl_framework'); ?>"></a></li>
                        <li><a href="mailto:enteryour@addresshere.com?subject=<?php strip_tags(the_title()); ?>&body=<?php echo strip_tags(apply_filters( 'woocommerce_short_description', $post->post_excerpt )); ?> <?php the_permalink(); ?>" class="product_share_email"  title="<?php _e('Email a Friend', 'tdl_framework'); ?>"></a></li>
                        <li><a href="<?php the_permalink(); ?>" class="product_share_permalink"  title="<?php _e('Permalink', 'tdl_framework'); ?>"></a></li>  
                    </ul>
                <div class="clearfix"></div>        
            </div>
                
            <div class="entry-meta-foot">
                    <ul>
                         <li class="author"><?php _e( 'By', 'tdl_framework' ); ?></span> <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a></li>
                     </ul>
                     <div class="clearfix"></div>
            </div><!-- .entry-meta-foot -->                  
                
            </article><!-- #post-<?php the_ID(); ?> -->

                    
                    <div class="clearfix"></div>
    
   
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || '0' != get_comments_number() )
                            comments_template( '', true );
                    ?>
    
                <?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
         <div class="clearfix"></div>
        <?php edit_post_link( __( 'Edit', 'tdl_framework' ), '<span class="edit-link">', '</span>' ); ?>  
		</div>
        

        <div class="span3 rsidebar">
             <div class="aside_sidecolumn">
                  <?php get_sidebar(); ?>
             </div>
        </div>            
    

	</div>
</div>
<?php get_footer(); ?>