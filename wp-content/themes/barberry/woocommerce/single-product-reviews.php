<?php
/**
 * Display single product reviews (comments)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */
/*
global $woocommerce, $product;

if ( ! defined( 'ABSPATH' ) ) 
	exit; // Exit if accessed directly

if ( ! comments_open() )
	return;
?>
<div id="reviews">
	<div id="comments">
		<h2><?php 
			if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_rating_count() ) )
				printf( _n('%s review for %s', '%s reviews for %s', $count, 'theretailer'), $count, get_the_title() );
			else
				_e( 'Reviews', 'theretailer' ); 
		?></h2>

		<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<div class="navigation">
					<div class="nav-previous wc-backward"><?php previous_comments_link( __( 'Previous', 'theretailer' ) ); ?></div>
					<div class="nav-next wc-forward"><?php next_comments_link( __( 'Next', 'theretailer' ) ); ?></div>
				</div>
			<?php endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'theretailer' ); ?></p>

		<?php endif; ?>
        
        <?php
        
		if (get_option( 'woocommerce_enable_lightbox' ) == "yes") {
			echo '<p class="add_review"><a href="#" class="inline //show_review_form custom_show_review_form  button">'.__('Add Review', 'theretailer').'</a></p>';
		}
		
		?>
        
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
					$commenter = wp_get_current_commenter();
					
					echo '<div class="review_form_thumb">';
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('review_thumb');
					}
					echo '</div>';

					$comment_form = array(
						'title_reply'          => have_comments() ? __( 'Add a review', 'theretailer' ) : __( 'Be the first to review', 'theretailer' ) . ' &ldquo;' . get_the_title() . '&rdquo;',
						'title_reply_to'       => __( 'Leave a Reply to %s', 'theretailer' ),
						'comment_notes_before' => '',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'theretailer' ) . ' <span class="required">*</span></label> ' .
							            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></p>',
							'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'theretailer' ) . ' <span class="required">*</span></label> ' .
							            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></p>',
						),
						'label_submit'  => __( 'Submit', 'theretailer' ),
						'logged_in_as'  => '',
						'comment_field' => ''
					);

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . __( 'Your Rating', 'theretailer' ) .'</label><select name="rating" id="rating">
							<option value="">' . __( 'Rate&hellip;', 'theretailer' ) . '</option>
							<option value="5">' . __( 'Perfect', 'theretailer' ) . '</option>
							<option value="4">' . __( 'Good', 'theretailer' ) . '</option>
							<option value="3">' . __( 'Average', 'theretailer' ) . '</option>
							<option value="2">' . __( 'Not that bad', 'theretailer' ) . '</option>
							<option value="1">' . __( 'Very Poor', 'theretailer' ) . '</option>
						</select></p>';
					}

					$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . __( 'Your Review', 'theretailer' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>' . wp_nonce_field( 'woocommerce-comment_rating', '_wpnonce', true, false ) . '</p>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'theretailer' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>

<?php if (get_option( 'woocommerce_enable_lightbox' ) == "yes") : ?>
<script>
jQuery(document).ready(function($) {
	
	"use strict";
	
	
	$("#review_form_wrapper").prependTo("#review_form_wrapper_overlay");
	
});
</script>
<?php endif; ?>*/