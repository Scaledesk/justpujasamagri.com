<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

global $post;
?>
<li itemprop="reviews" itemscope itemtype="http://schema.org/Review" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>" class="comment_container">

		<?php echo get_avatar( $GLOBALS['comment'], $size='60' ); ?>

		<div class="comment-text">

			<?php if ($GLOBALS['comment']->comment_approved == '0') : ?>
				<p class="meta"><em><?php _e('Your comment is awaiting approval', 'tdl_framework'); ?></em></p>
			<?php else : ?>
				<p class="meta">
					<strong itemprop="author"><?php comment_author(); ?></strong> <?php

						if ( get_option('woocommerce_review_rating_verification_label') == 'yes' )
							if ( woocommerce_customer_bought_product( $GLOBALS['comment']->comment_author_email, $GLOBALS['comment']->user_id, $post->ID ) )
								echo '(' . __('verified owner', 'tdl_framework') . ') ';

					?>&ndash; <time itemprop="datePublished" time datetime="<?php echo get_comment_date('c'); ?>"><?php echo get_comment_date(__('M jS Y', 'tdl_framework')); ?></time>:
				</p>
			<?php endif; ?>
            
           <?php if (get_option( 'woocommerce_enable_review_rating' ) === 'yes') : ?>  
			<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="<?php echo esc_attr( get_comment_meta( $GLOBALS['comment']->comment_ID, 'rating', true ) ); ?>">
				<span style="width:<?php echo (get_comment_meta( $GLOBALS['comment']->comment_ID, 'rating', true )/5)*100; ?>%"><span itemprop="ratingValue"><?php echo get_comment_meta( $GLOBALS['comment']->comment_ID, 'rating', true ); ?></span> <?php _e('out of 5', 'tdl_framework'); ?></span>
			</div>  
            <?php endif; ?>
            
            
            
            <div class="clearfix"></div>          

				<div itemprop="description" class="description"><?php comment_text(); ?></div>
				<div class="clearfix"></div>
			</div>
		<div class="clearfix"></div>
	</div>