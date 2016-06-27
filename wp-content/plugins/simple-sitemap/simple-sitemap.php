<?php
/*
Plugin Name: Simple Sitemap
Plugin URI: http://wordpress.org/plugins/simple-sitemap/
Description: HTML sitemap to display content as a single linked list of posts, pages, or custom post types. You can even display posts in groups sorted by taxonomy!
Version: 1.82
Author: David Gwyer
Author URI: http://www.wpgothemes.com
Text Domain: simple-sitemap
*/

/*  Copyright 2009 David Gwyer (email : david@wpgothemes.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* wpss_ prefix is derived from [W]ord[P]ress [s]imple [s]itemap. */

add_shortcode( 'simple-sitemap', 'wpss_render_sitemap' );
add_shortcode( 'simple-sitemap-group', 'wpss_render_sitemap_group' );
add_action( 'admin_init', 'wpss_init' );
add_action( 'admin_menu', 'wpss_add_options_page' );
add_filter( 'plugin_action_links', 'wpss_plugin_action_links', 10, 2 );
add_filter( 'widget_text', 'do_shortcode' ); // make sitemap shortcode work in text widgets
add_action( 'plugins_loaded', 'wpss_localize_plugin' );

/* Init plugin options to white list our options. */
function wpss_init() {
	register_setting( 'wpss_plugin_options', 'wpss_options', 'wpss_validate_options' );
}

/* Add menu page. */
function wpss_add_options_page() {
	add_options_page( __( 'Simple Sitemap Options Page', 'simple-sitemap' ), __( 'Simple Sitemap', 'simple-sitemap' ), 'manage_options', __FILE__, 'wpss_render_form' );
}

/* Draw the menu page itself. */
function wpss_render_form() {
	?>
	<div class="wrap">
		<h2><?php _e( 'Simple Sitemap Options', 'simple-sitemap' ); ?></h2>

		<p><?php _e( 'From version 1.8 the Simple Sitemap plugin has been rewritten to provide much more flexibility. You now have access to a range of shortcode attributes to customize how the sitemap renders.', 'simple-sitemap' ); ?></p>

		<p><?php _e( 'You can still use the plain version of the shortcode as shown below and it will out put a full sitemap.', 'simple-sitemap' ); ?></p>

		<div style="background:#fff;border: 1px dashed #ccc;font-size: 13px;margin: 20px 0 10px 0;padding: 5px 0 5px 8px;">
			<?php printf( __( 'To display the Simple Sitemap on a post, page, or sidebar (via a Text widget), enter the following shortcode:<br><br>', 'simple-sitemap' ) ); ?> <code>[simple-sitemap]</code><br><br>
		</div>

		<h2><?php _e( 'Choose the Post Types to Display', 'simple-sitemap' ); ?></h2>

		<p><?php _e( 'You now have full control over what post types are displayed as well as the order they are rendered.', 'simple-sitemap' ); ?></p>

		<div style="background:#fff;border: 1px dashed #ccc;font-size: 13px;margin: 20px 0 10px 0;padding: 5px 0 5px 8px;">
			<?php printf( __( 'Specify post types and order.<br>', 'simple-sitemap' ) ); ?>
			<br><code>e.g. [simple-sitemap types="post, page, testimonial, download"]</code><br><br>
			<b>default: types="post, page"</b>
			<br><br><?php printf( __( 'Choose from any of the following registered post types currently available:<br><br>', 'simple-sitemap' ) ); ?>
			<?php
			$registered_post_types = get_post_types();
			$registered_post_types_str = implode(', ', $registered_post_types);
			echo '<code>' . $registered_post_types_str . '</code><br><br>';
			?>
		</div>

		<h2><?php _e( 'Formatting the Sitemap Output', 'simple-sitemap' ); ?></h2>

		<p><?php _e( 'You have various options for controlling how your sitemap displays.', 'simple-sitemap' ); ?></p>

		<div style="background:#fff;border: 1px dashed #ccc;font-size: 13px;margin: 20px 0 10px 0;padding: 5px 0 5px 8px;">
			<?php printf( __( 'Show a heading label for each post type as well as display a list of links or plain text. If you are outputting pages then you can also control page depth too (for page hierarchies).<br>', 'simple-sitemap' ) ); ?>
			<br>For the "order" attribute specify "asc" for ascending, and "desc" for descending post sort order. As for the "orderby" attribute you can filter posts by "title", "date", "author", "ID". The "exclude" attribute simply takes a comma separated list of post IDs.
			<br><br><code>e.g. [simple-sitemap show_label="true" links="true" page_depth="1" order="asc" orderby="title" exclude="1,2,3"]</code>
			<br><br><b>defaults:<br>
			show_label="true"<br>
			links="true"<br>
			page_depth="0"<br>
			order="asc"<br>
			orderby="title"<br>
			exclude=""<br><br></b>
		</div>

		<div style="clear:both;">
			<p>
				<a href="http://www.twitter.com/dgwyer" title="Follow me Twitter!" target="_blank"><img src="<?php echo plugins_url(); ?>/simple-sitemap/images/twitter.png"></a>&nbsp;&nbsp;
				<input class="button" style="vertical-align:12px;" type="button" value="Visit Our NEW Site!" onClick="window.open('http://www.wpgothemes.com')">
				<input class="button" style="vertical-align:12px;" type="button" value="Minn, Our Latest Theme" onClick="window.open('http://www.wpgothemes.com/themes/minn')">
			</p>
		</div>

		<?php
		$discount_date = "14th August 2014";
		if( strtotime($discount_date) > strtotime('now') ) {
			echo '<p style="background: #fff;border: 1px dashed #ccc;font-size: 13px;margin: 0 0 10px 0;padding: 5px 0 5px 8px;">' . __( 'For a limited time only! <strong>Get 50% OFF</strong> the price of our brand new mobile ready, fully responsive <a href="http://www.wpgothemes.com/themes/minn/" target="_blank"><strong>Minn WordPress theme</strong></a>. Simply enter the following code at checkout: <code>MINN50OFF</code>', 'simple-sitemap' ) . '</p>';
		} else {
			echo '<p style="background: #eee;border: 1px dashed #ccc;font-size: 13px;margin: 0 0 10px 0;padding: 5px 0 5px 8px;">' . __( 'As a user of our free plugins here\'s a bonus just for you! <strong>Get 30% OFF</strong> the price of our brand new mobile ready, fully responsive <a href="http://www.wpgothemes.com/themes/minn/" target="_blank"><strong>Minn WordPress theme</strong></a>. Simply enter the following code at checkout: <code>WPGO30OFF</code>', 'simple-sitemap' ) . '</p>';
		}
		?>

	</div>
<?php
}

/* Shortcode function. */
function wpss_render_sitemap($args) {

	/* Get slider attributes from the shortcode. */
	extract( shortcode_atts( array(
		'types' => 'page',
		'show_excerpt' => 'false',
		'title_tag' => '',
		'excerpt_tag' => 'div',
		'post_type_tag' => 'h2',
		'show_label' => 'true',
		'links' => 'true',
		'page_depth' => 0,
		'order' => 'asc',
		'orderby' => 'title',
		'exclude' => ''
	), $args ) );

	// escape tag names
	$title_tag = tag_escape( $title_tag );
	$excerpt_tag = tag_escape( $excerpt_tag );
	$post_type_tag = tag_escape( $post_type_tag );

	$page_depth = intval( $page_depth );
	$post_types = $types; // allows the use of the shorter 'types' rather than 'post_types' in the shortcode

	// Start output caching (so that existing content in the [simple-sitemap] post doesn't get shoved to the bottom of the post
	ob_start();

	// *************
	// CONTENT START
	// *************

	$post_types = array_map( 'trim', explode( ',', $post_types ) ); // convert comma separated string to array
	$exclude = array_map( 'trim', explode( ',', $exclude) ); // must be array to work in the post query
	$registered_post_types = get_post_types();

	//echo "<pre>";
	//print_r($registered_post_types);
	//print_r($post_types);
	//print_r($exclude);
	//echo "</pre>";

	foreach( $post_types as $post_type ) :

		// generate <ul> element class
		$ul_class = 'simple-sitemap-' . $post_type;

		// bail if post type isn't valid
		if( !array_key_exists( $post_type, $registered_post_types ) ) {
			break;
		}

		// set opening and closing title tag
		if( !empty($title_tag) ) {
			$title_open = '<' . $title_tag . '>';
			$title_close = '</' . $title_tag . '>';
		}
		else {
			$title_open = $title_close = '';
		}

		// conditionally show label for each post type
		if( $show_label == 'true' ) {
			$post_type_obj  = get_post_type_object( $post_type );
			$post_type_name = $post_type_obj->labels->name;
			echo '<' . $post_type_tag . '>' . esc_html($post_type_name) . '</' . $post_type_tag . '>';
		}

		$query_args = array(
			'posts_per_page' => -1,
			'post_type' => $post_type,
			'order' => $order,
			'orderby' => $orderby,
			'post__not_in' => $exclude
		);

		// use custom rendering for 'page' post type to properly render sub pages
		if( $post_type == 'page' ) {
			$arr = array(
				'title_tag' => $title_tag,
				'links' => $links,
				'title_open' => $title_open,
				'title_close' => $title_close,
				'page_depth' => $page_depth,
				'exclude' => $exclude
			);
			echo '<ul class="' . esc_attr($ul_class) . '">';
			wpss_list_pages($arr, $query_args);
			echo '</ul>';
			continue;
		}

		//post query
		$sitemap_query = new WP_Query( $query_args );

		if ( $sitemap_query->have_posts() ) :

			echo '<ul class="' . esc_attr($ul_class) . '">';

			// start of the loop
			while ( $sitemap_query->have_posts() ) : $sitemap_query->the_post();

				// title
				$title_text = get_the_title();

				if( !empty( $title_text ) ) {
					if ( $links == 'true' ) {
						$title = $title_open . '<a href="' . esc_url(get_permalink()) . '">' . esc_html($title_text) . '</a>' . $title_close;
					} else {
						$title = $title_open . esc_html($title_text) . $title_close;
					}
				}
				else {
					if ( $links == 'true' ) {
						$title = $title_open . '<a href="' . esc_url(get_permalink()) . '">' . '(no title)' . '</a>' . $title_close;
					} else {
						$title = $title_open . '(no title)' . $title_close;
					}
				}

				// excerpt
				$excerpt = $show_excerpt == 'true' ? '<' . $excerpt_tag . '>' . esc_html(get_the_excerpt()) . '</' . $excerpt_tag . '>' : '';

				// render list item
				echo '<li>';
				echo $title;
				echo $excerpt;
				echo '</li>';

			endwhile; // end of post loop -->

			echo '</ul>';

			// put pagination functions here
			wp_reset_postdata();

		else:

			echo '<p>' . __( 'Sorry, no posts matched your criteria.', 'wpgo-simple-sitemap-pro' ) . '</p>';

		endif;

	endforeach;

	// ***********
	// CONTENT END
	// ***********

	$sitemap = ob_get_contents();
	ob_end_clean();

	return wp_kses_post($sitemap);
}

/* Shortcode function. */
function wpss_render_sitemap_group($args) {

	/* Get slider attributes from the shortcode. */
	extract( shortcode_atts( array(
		'tax' => 'category', // single taxonomy
		'term_order' => 'asc',
		'term_orderby' => 'name',
		'show_excerpt' => 'false',
		'title_tag' => '',
		'excerpt_tag' => 'div',
		'post_type_tag' => 'h2',
		'show_label' => 'true',
		'links' => 'true',
		'page_depth' => 0,
		'order' => 'asc',
		'orderby' => 'title',
		'exclude' => ''
	), $args ) );

	// escape tag names
	$title_tag = tag_escape( $title_tag );
	$excerpt_tag = tag_escape( $excerpt_tag );
	$post_type_tag = tag_escape( $post_type_tag );

	$page_depth = intval( $page_depth );
	$post_type = 'post';

	// Start output caching (so that existing content in the [simple-sitemap] post doesn't get shoved to the bottom of the post
	ob_start();

	// *************
	// CONTENT START
	// *************

	$exclude = array_map( 'trim', explode( ',', $exclude) ); // must be array to work in the post query
	$registered_post_types = get_post_types();

	//echo "<pre>";
	//print_r($registered_post_types);
	//print_r($post_types);
	//print_r($exclude);
	//echo "</pre>";

	$taxonomy_arr = get_object_taxonomies( $post_type );

	// sort via specified taxonomy
	if ( !empty($tax) && in_array( $tax, $taxonomy_arr ) ) {

		// conditionally show label for each post type
		if( $show_label == 'true' ) {
			$post_type_obj  = get_post_type_object( $post_type );
			$post_type_name = $post_type_obj->labels->name;
			echo '<' . $post_type_tag . '>' . esc_html($post_type_name) . '</' . $post_type_tag . '>';
		}

		$term_attr = array(
			'orderby'           => $term_orderby,
			'order'             => $term_order
		);
		$terms = get_terms( $tax, $term_attr );

		foreach($terms as $term) {

			// generate <ul> element class
			$ul_class = 'simple-sitemap-' . $post_type;

			// bail if post type isn't valid
			if( !array_key_exists( $post_type, $registered_post_types ) ) {
				break;
			}

			// set opening and closing title tag
			if( !empty($title_tag) ) {
				$title_open = '<' . $title_tag . '>';
				$title_close = '</' . $title_tag . '>';
			}
			else {
				$title_open = $title_close = '';
			}

			$query_args = array(
				'posts_per_page' => -1,
				'post_type' => $post_type,
				'order' => $order,
				'orderby' => $orderby,
				'post__not_in' => $exclude,
				'tax_query' => array(
					array(
						'taxonomy' => $tax,
						'field' => 'slug',
						'terms' => $term
					)
				)
			);

			echo '<h4>' . $term->name . '</h4>';

			//post query
			$sitemap_query = new WP_Query( $query_args );

			if ( $sitemap_query->have_posts() ) :

				echo '<ul class="' . esc_attr($ul_class) . '">';

				// start of the loop
				while ( $sitemap_query->have_posts() ) : $sitemap_query->the_post();

					// title
					$title_text = get_the_title();

					if( !empty( $title_text ) ) {
						if ( $links == 'true' ) {
							$title = $title_open . '<a href="' . esc_url(get_permalink()) . '">' . esc_html($title_text) . '</a>' . $title_close;
						} else {
							$title = $title_open . esc_html($title_text) . $title_close;
						}
					}
					else {
						if ( $links == 'true' ) {
							$title = $title_open . '<a href="' . esc_url(get_permalink()) . '">' . '(no title)' . '</a>' . $title_close;
						} else {
							$title = $title_open . '(no title)' . $title_close;
						}
					}

					// excerpt
					$excerpt = $show_excerpt == 'true' ? '<' . $excerpt_tag . '>' . esc_html(get_the_excerpt()) . '</' . $excerpt_tag . '>' : '';

					// render list item
					echo '<li>';
					echo $title;
					echo $excerpt;
					echo '</li>';

				endwhile; // end of post loop -->

				echo '</ul>';

				// put pagination functions here
				wp_reset_postdata();

			else:

				echo '<p>' . __( 'Sorry, no posts matched your criteria.', 'wpgo-simple-sitemap-pro' ) . '</p>';

			endif;
		}
	}
	else {
		echo "No posts found.";
	}


	// ***********
	// CONTENT END
	// ***********

	$sitemap = ob_get_contents();
	ob_end_clean();

	return wp_kses_post($sitemap);
}

function wpss_list_pages( $arr, $query_args ) {

	$map_args = array(
		'title' => 'post_title',
		'date' => 'post_date',
		'author' => 'post_author',
		'modified' => 'post_modified'
	);

	// modify the query args for get_pages() if necessary
	$orderby = array_key_exists( $query_args['orderby'], $map_args ) ? $map_args[$query_args['orderby']] : $query_args['orderby'];

	$r = array(
		'depth' => $arr['page_depth'],
		'show_date' => '',
		'date_format' => get_option( 'date_format' ),
		'child_of' => 0,
		'exclude' => $arr['exclude'],
		'echo' => 1,
		'authors' => '',
		'sort_column' => $orderby,
		'sort_order' => $query_args['order'],
		'link_before' => '',
		'link_after' => '',
		'walker' => '',
	);

	$output = '';
	$current_page = 0;
	$r['exclude'] = preg_replace( '/[^0-9,]/', '', $r['exclude'] ); // sanitize, mostly to keep spaces out

	// Query pages.
	$r['hierarchical'] = 0;
	$pages = get_pages( $r );

	if ( ! empty( $pages ) ) {
		global $wp_query;
		if ( is_page() || is_attachment() || $wp_query->is_posts_page ) {
			$current_page = get_queried_object_id();
		} elseif ( is_singular() ) {
			$queried_object = get_queried_object();
			if ( is_post_type_hierarchical( $queried_object->post_type ) ) {
				$current_page = $queried_object->ID;
			}
		}

		$output .= walk_page_tree( $pages, $r['depth'], $current_page, $r );
	}

	// remove links
	if( $arr['links'] != 'true' )
		$output = preg_replace('/<a href=\"(.*?)\">(.*?)<\/a>/', "\\2", $output);

	if ( $r['echo'] ) {
		echo $output;
	} else {
		return $output;
	}
}

// Display a Settings link on the main Plugins page
function wpss_plugin_action_links( $links, $file ) {

	if ( $file == plugin_basename( __FILE__ ) ) {
		$posk_links = '<a href="' . esc_url(get_admin_url() . 'options-general.php?page=simple-sitemap/simple-sitemap.php' ) . '">' . __( 'Settings', 'simple-sitemap' ) . '</a>';
		// make the 'Settings' link appear first
		array_unshift( $links, $posk_links );
	}

	return $links;
}

/* Sanitize and validate input. Accepts an array, return a sanitized array. */
function wpss_validate_options( $input ) {
	// Strip html from textboxes
	// e.g. $input['textbox'] =  wp_filter_nohtml_kses($input['textbox']);

	$input['txt_page_ids'] = sanitize_text_field( $input['txt_page_ids'] );

	return $input;
}

/**
 * Add Plugin localization support.
 */
function wpss_localize_plugin() {

	load_plugin_textdomain( 'simple-sitemap', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}