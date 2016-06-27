<?php
global $post;
?>

<?php  $format = get_post_format(); if( false === $format ) { $format = 'standart'; } ?>
<div class="blog_list">

    <div class="entry_info">
        <div class="entry_date">
            <span><?php the_time('j'); ?></span><?php the_time('M'); ?>
        </div>    
    </div>
    
    <div class="entry_post">
    <h2 title="<?php the_title_attribute(); ?>"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'tdl_framework' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
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
    
    <?php 
	$the_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'post-thumb');
	$full_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full');
	$alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
	?>
    
    <?php if( $format == 'standart' ): ?><!-- Standart Post --> 
    	<?php if ( has_post_thumbnail() ):?>
        	<div class="entry_image single_image">
            <a href="<?php the_permalink(); ?>">
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
        
        <div class="entry_image">
        
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
                
        <?php if ($vendor['host'] == 'www.dailymotion.com' || $vendor['host'] == 'dailymotion.com'){
        $video_slug = explode( "video/", $video_embed_code );
        $video_id = explode( "_", $video_slug[1] );
        ?>        
        <iframe frameborder="0" width="620" height="350" src="http://www.dailymotion.com/embed/video/<?php echo $video_id[0]?>?logo=0&hideInfos=1"></iframe>
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
				
                
               jQuery(document).ready(function($){
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
					
					});

        
                </script>
                
                <div id="post_slider_<?php echo get_the_ID(); ?>" class="postSlider"> 
                	<div class = "slider"> 
                    	<?php foreach ( $gallery as $gallery_image ): ?>
                         <div class="item">
                            <span itemprop="image">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
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

    <div class="entry-content">
    <?php the_content(__('<div class="clearfix"></div><span class="moretag">Read more</span>', 'tdl_framework')); ?>
    </div><!-- .entry-content -->
    
    
    <div class="entry-meta-foot">
    	<ul>
             <li class="author"><?php _e( 'By', 'tdl_framework' ); ?></span> <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a></li>
             <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
             <li class="leave_comm"><span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'tdl_framework' ), __( '1 Comment', 'tdl_framework' ), __( '% Comments', 'tdl_framework' ) ); ?></span></li>
             <?php endif; ?>
         </ul>
         <div class="clearfix"></div>
   </div><!-- .entry-meta-foot -->  
   
   <?php edit_post_link( __( 'Edit', 'tdl_framework' ), '<span class="edit-link">', '</span>' ); ?>   
</div> <!-- .entry-post -->    
<div class="clearfix"></div>

</div>

