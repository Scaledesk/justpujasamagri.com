<?php

/*--------------------------------------------------------
    Comments
--------------------------------------------------------*/

if ( ! function_exists( 'tdl_comment' ) ) :

function tdl_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
    <div class="clearfix"></div>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'tdl_framework' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'tdl_framework' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<?php echo get_avatar( $comment, 40 ); ?>
            <div class="comment-text">
				<div class="comment-author vcard">
					
					<?php printf( sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                    <span class="comment-meta commentmetadata">
                        <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php comment_time( 'c' ); ?>">
                        <?php
                            /* translators: 1: date, 2: time */
                            printf( __( '%1$s at %2$s', 'tdl_framework' ), get_comment_date(), get_comment_time() ); ?>
                        </time></a>
                        <?php edit_comment_link( __( '(Edit)', 'tdl_framework' ), ' ' );
                        ?>
                    </span><!-- .comment-meta .commentmetadata -->
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'tdl_framework' ); ?></em>
					<br />
				<?php endif; ?>



			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
            </div>
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for tdl_comment()

/*--------------------------------------------------------
    Validation Checks
--------------------------------------------------------*/

function checkurl($url) {
    return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
}


/*-----------------------------------------------------------------------------------*/
/*	Add Favicon
/*-----------------------------------------------------------------------------------*/

function tdl_custom_favicon() {
	global $barberry_options;
	$favicon_url = $barberry_options['tdl_favicon_image'];
	
	if ( $favicon_url ) {
		echo '<link rel="shortcut icon" href="'.  $favicon_url  .'"/>'."\n";
	}
	else { ?>
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicon.png" />
	<?php }	
	
}

add_action( 'wp_head', 'tdl_custom_favicon' );

// Custom Retina Favicon

function tdl_custom_favicon_retina() {
	global $barberry_options;
	$favicon_retina = $barberry_options['tdl_favicon_retina'];
	
	if ( $favicon_retina ) {
		echo '<link rel="apple-touch-icon-precomposed" href="'.  $favicon_retina  .'"/>'."\n";
	}
	else { ?>
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri() ?>/images/apple-touch-icon-precomposed.png" />
	<?php }	
	
}

add_action( 'wp_head', 'tdl_custom_favicon_retina' );

/*-----------------------------------------------------------------------------------*/
/*	BREADCRUMBS
/*-----------------------------------------------------------------------------------*/

	function tdl_breadcrumbs() {
		$breadcrumb_output = "";
		
		if ( function_exists('bcn_display') ) {
			$breadcrumb_output .= '<div id="breadcrumbs">'. "\n";
			$breadcrumb_output .= bcn_display(true);
			$breadcrumb_output .= '</div>'. "\n";
		} else if ( function_exists('yoast_breadcrumb') ) {
			$breadcrumb_output .= '<div id="breadcrumbs">'. "\n";
			$breadcrumb_output .= yoast_breadcrumb("","",false);
			$breadcrumb_output .= '</div>'. "\n";
		}
		
		return $breadcrumb_output;
	}
	
/*-----------------------------------------------------------------------------------*/
/*	WPML dropdown
/*-----------------------------------------------------------------------------------*/

	function languages_list() {
		
		if (function_exists('icl_get_languages')) {
		    
		$languages = icl_get_languages('skip_missing=0&orderby=code');
			if(!empty($languages)){
				foreach($languages as $l){
				if($l['active']) 
					echo '<span class="current">'.$l['native_name'].'</span>';
				else echo '';			
				}
		
				echo '<div class="header-dropdown"><ul>';
				foreach($languages as $l){			
		
					if($l['active']) echo '<li class="current-menu-item"><a href="'.$l['url'].'">';
					if(!$l['active']) echo '<li><a href="'.$l['url'].'">';
					echo '<span>'.$l['native_name'].'</span>';
					echo '</a></li>';				
		
				}
				echo '</ul></div>';
			}			
			
			
	    } else {
			
	    	echo '<span class="current">English</span><div class="header-dropdown"><ul><li><a href="#"><span>Deutsch</span></a></li><li class="current-menu-item"><a href="#"><span>English</span></a></li><li><a href="#"><span>Français</span></a></li></ul></div>'."\n";			
			
	    }

	}
	

/*-----------------------------------------------------------------------------------*/
/*	Add Navigations
/*-----------------------------------------------------------------------------------*/


function navigation() {
    $combo = array(
        'theme_location' => 'primary-menu',
        'menu_id' => 'main-menu-mobile',
        'container' => false,
        'items_wrap' => '<select id="%1$s" class="%2$s"><option selected>' . __('Navigation', 'tdl_framework') . '</option>%3$s</select>',
        'menu_class' => 'main-menu-mobile',
        'echo' => true,
        'link_after' => '',
        'link_before' => '',
        'fallback_cb' => false,
        'after' => '</option>',
        'depth' => 0,
        'walker' => new combonavWalker()
    );
	
    $mega = array(
        'theme_location' => 'primary-menu',
        'container' => '',
        'depth' => 3,
        'container_class' => 'clearfix',
        'fallback_cb' => 'nomenu',
        'menu_id' => 'menu',
		'before' => '<span class="separator"></span>',
        'walker' => new TDL_Menu_Frontend());

    //wp_nav_menu($args);
    wp_nav_menu($combo);
    wp_nav_menu($mega);
}

function nomenu() {
    echo "<ul id='menu' class='menu'><li><a>Define your primary navigation in <strong>Appearance -> Menus</strong>.</a></li></ul>";
}

class combonavWalker extends Walker_Nav_Menu {
    function start_el(&$output, $object, $depth = 0, $args = array(), $id = 0) {
		// add spacing to the title based on the depth
        $object->title = str_repeat("&nbsp;-&nbsp;", $depth). " " . $object->title;
                            
        parent::start_el($output, $object, $depth, $args);
		$output = str_replace("<li", "\n<option", $output);
                                  
        $output = str_replace('><a href=', ' value=', $output);
        $output = str_replace('</a></option>', '</option>', $output);
		$output = str_replace('</option></option>', '</option>', $output);
		$output = str_replace("</a>", "</option>\n", $output);
    }
    function start_lvl(&$output, $depth = 0, $args = array()){
        $indent = str_repeat("\t", $depth); // don't output children opening tag (`<ul>`)
    }
    function end_lvl(&$output, $depth = 0, $args = array()){
        $indent = str_repeat("\t", $depth); // don't output children closing tag
    }
    function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $output .= "\n";
    }
}

class TDL_Menu_Right extends Walker_Nav_Menu {
function start_el(&$output, $object, $depth = 0, $args = array(), $id = 0) {  
        global $wp_query;  
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';  
  
        $class_names = $value = '';  
  
        $classes = empty( $object->classes ) ? array() : (array) $object->classes;  
  
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );  
        $class_names = ' class="'. esc_attr( $class_names ) . '"';  
  
        $output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';  
  
        $attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';  
        $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';  
        $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';  
        $attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';  
        $description  = ! empty( $object->description ) ? '<span>'.esc_attr( $object->description ).'</span>' : '';  
  
        if($depth != 0) {  
            $description = $append = $prepend = "";  
        }  
  
        $item_output = $args->before;  
        $item_output .= '<a'. $attributes .'>';  
        $item_output .= $args->link_before .apply_filters( 'the_title', $object->title, $object->ID );  
        $item_output .= $description.$args->link_after;  
        $item_output .= '</a>';  
        $item_output .= $args->after;  
  
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $object, $depth, $args );  
    } 
    function start_lvl(&$output, $depth = 0, $args = array()){
		$indent = str_repeat("\t", $depth);
    }
    function end_lvl(&$output, $depth = 0, $args = array()){
		$indent = str_repeat("\t", $depth);

    }
    function end_el(&$output, $object, $depth = 0, $args = array(), $id = 0) {
        $output .= "\n";
    }
}


/*--------------------------------------------------------
    Pagination Function
--------------------------------------------------------*/


function tdl_pagination ( $pages = '', $range = 4 ) {
     
     $showitems = ($range * 2) + 1;

 
     global $paged;
     
     if( empty( $paged ) ) $paged = 1;
 
     if( $pages == '' ) {
         
         global $wp_query;
         
         $pages = $wp_query->max_num_pages;
         
         if(!$pages) {
             
             $pages = 1;
             
         }
         
     }   
 
     if(1 != $pages) {
         
         echo "<div class=\"pagination \"><ul><li class=\"disabled\"><a href=\"#\">" . __('Page ', 'tdl_framework') . $paged . __(' of ', 'tdl_framework') . $pages . "</a></li>";
         
         if( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) echo "<li><a href='" . get_pagenum_link( 1 ) . "'>&lArr; " . __('First', 'tdl_framework') . "</a></li>";
         
         if( $paged > 1 && $showitems < $pages ) echo "<li><a href='" . get_pagenum_link( $paged - 1 ) . "'>&larr; " . __('Previous', 'tdl_framework') . "</a></li>";
 
         for ( $i = 1; $i <= $pages; $i++ ) {
             
             if ( 1 != $pages && ( !( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems )) {
                 
                 echo ( $paged == $i ) ? "<li class=\"active\"><a href=\"#\">" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link( $i ) . "' class=\"inactive\">" . $i . "</a></li>";
                 
             }
             
         }
 
         if ( $paged < $pages && $showitems < $pages ) echo "<li><a href=\"" . get_pagenum_link( $paged + 1 ) . "\">" . __('Next', 'tdl_framework') . " &rarr;</a></li>";
         
         if ( $paged < $pages-1 &&  $paged + $range - 1 < $pages && $showitems < $pages ) echo "<li><a href='" . get_pagenum_link( $pages ) . "'>" . __('Last', 'tdl_framework') . " &rArr;</a></li>";
         
         echo "</ul></div>\n";
         
     }
     
}


/**
* Title		: Aqua Resizer
* Description	: Resizes WordPress images on the fly
* Version	: 1.1.5
* Author	: Syamil MJ
* Author URI	: http://aquagraphite.com
* License	: WTFPL - http://sam.zoy.org/wtfpl/
* Documentation	: https://github.com/sy4mil/Aqua-Resizer/
*
* @param string $url - (required) must be uploaded using wp media uploader
* @param int $width - (required)
* @param int $height - (optional)
* @param bool $crop - (optional) default to soft crop
* @param bool $single - (optional) returns an array if false
* @uses wp_upload_dir()
* @uses image_resize_dimensions()
* @uses image_resize()
*
* @return str|array
*/

function tdl_resize( $url, $width, $height = null, $crop = null, $single = true ) {
	
	//validate inputs
	if(!$url OR !$width ) return false;
	
	//define upload path & dir
	$upload_info = wp_upload_dir();
	$upload_dir = $upload_info['basedir'];
	$upload_url = $upload_info['baseurl'];
	
	//check if $img_url is local
	if(strpos( $url, $upload_url ) === false) return false;
	
	//define path of image
	$rel_path = str_replace( $upload_url, '', $url);
	$img_path = $upload_dir . $rel_path;
	
	//check if img path exists, and is an image indeed
	if( !file_exists($img_path) OR !getimagesize($img_path) ) return false;
	
	//get image info
	$info = pathinfo($img_path);
	$ext = $info['extension'];
	list($orig_w,$orig_h) = getimagesize($img_path);
	
	//get image size after cropping
	$dims = image_resize_dimensions($orig_w, $orig_h, $width, $height, $crop);
	$dst_w = $dims[4];
	$dst_h = $dims[5];
	
	//use this to check if cropped image already exists, so we can return that instead
	$suffix = "{$dst_w}x{$dst_h}";
	$dst_rel_path = str_replace( '.'.$ext, '', $rel_path);
	$destfilename = "{$upload_dir}{$dst_rel_path}-{$suffix}.{$ext}";
	
	if(!$dst_h) {
		//can't resize, so return original url
		$img_url = $url;
		$dst_w = $orig_w;
		$dst_h = $orig_h;
	}
	//else check if cache exists
	elseif(file_exists($destfilename) && getimagesize($destfilename)) {
		$img_url = "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}";
	} 
	//else, we resize the image and return the new resized image url
	else {
		$resized_img_path = image_resize( $img_path, $width, $height, $crop );
		if(!is_wp_error($resized_img_path)) {
			$resized_rel_path = str_replace( $upload_dir, '', $resized_img_path);
			$img_url = $upload_url . $resized_rel_path;
		} else {
			return false;
		}
	}
	
	//return the output
	if($single) {
		//str return
		$image = $img_url;
	} else {
		//array return
		$image = array (
			0 => $img_url,
			1 => $dst_w,
			2 => $dst_h
		);
	}
	
	return $image;
}




?>
