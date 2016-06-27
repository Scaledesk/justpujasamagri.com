<?php

class WP_Widget_Custom_Posts extends WP_Widget {

	function WP_Widget_Custom_Posts() {
	$widget_ops = array( 'classname' => 'posts-widget', 'description' => __('Displays your Recent or Popular Posts', 'tdl_framework') );
		$this->WP_Widget( 'posts_widget', __('Barberry: Blog Posts List', 'tdl_framework'), $widget_ops);
	}
	
	function form($instance) {
	
		
		$instance = wp_parse_args( (array) $instance, array('title' => __('Recent Posts', 'tdl_framework'), 'number' => 3, 'display' => 'recent', 'followtext' => '') );

        $title = esc_attr($instance['title']);
		$number = absint($instance['number']);
        $display = $instance['display'];
		$followtext = $instance['followtext'];

?>
		<p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
               <?php _e('Title:', 'tdl_framework'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('number'); ?>">
               <?php _e('No. of Posts:', 'tdl_framework'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('display'); ?>">
               <?php _e('Display Type:', 'tdl_framework'); ?>
            </label>
            <select id="<?php echo $this->get_field_id('display'); ?>" name="<?php echo $this->get_field_name('display'); ?>">
                <option value="recent" <?php if ( $display == 'recent' ) echo 'selected'; ?>>recent</option>
                <option value="popular" <?php if ( $display == 'popular' ) echo 'selected'; ?>>popular</option>
                <option value="random" <?php if ( $display == 'random' ) echo 'selected'; ?>>random</option>
            </select>
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('followtext'); ?>">
               <?php _e('All Blog Posts Button Text:', 'tdl_framework'); ?>
            </label>
                <input class="widefat" id="<?php echo $this->get_field_id('followtext'); ?>" name="<?php echo $this->get_field_name('followtext'); ?>" type="text" value="<?php echo $followtext; ?>" />
        </p>        


<?php
    }

	function update($new_instance, $old_instance) {
        $instance=$old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = $new_instance['number'];
        $instance['display'] = $new_instance['display'];
		$instance['followtext'] = $new_instance['followtext'];
        return $instance;

    }

	function widget($args, $instance) {
	
		extract($args);

		$title = apply_filters('widget_title', $instance['title']);
		if ( empty($title) ) $title = false;

		$number = absint( $instance['number'] );
        $display = $instance['display'];
		$followtext = $instance['followtext'];
		
			
		echo $before_widget;
	
		if($title){
			echo $before_title;
			echo $title; 
			echo $after_title;
		}
        
        
        if( $display == 'recent' ) {
            
            $args = array( 'post_type' => 'post', 'posts_per_page' => $number, 'orderby' => 'date' );
            
        } elseif( $display == 'popular' ) {
            
            $args = array( 'post_type' => 'post', 'posts_per_page' => $number, 'orderby' => 'comment_count' );
            
        } elseif( $display == 'random' ) {
            
            $args = array( 'post_type' => 'post', 'posts_per_page' => $number, 'orderby' => 'rand' );
            
        } else {
            
            $args = array( 'post_type' => 'post', 'posts_per_page' => $number, 'orderby' => 'date' );
            
        }
        
		
        $postswidget = new WP_Query( $args );
        
        if( $postswidget->have_posts() ):
        
        echo '<ul class="clearfix">';
        
        while ( $postswidget->have_posts() ) : $postswidget->the_post();
        
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
        
        $thumb = tdl_resize( $thumb[0], 80, 80, true, false );
		
        ?>

			<li class="clearfix">
            
            
<?php if ( has_post_thumbnail() ):?>
                <a class="post_image" href="<?php the_permalink(); ?>"><?php if ( $thumb[0] ) { ?><img src="<?php echo $thumb[0]; ?>" width="<?php echo $thumb[1]; ?>" height="<?php echo $thumb[2]; ?>" alt="<?php the_title(); ?>" /><?php } ?><div class="item-overlay"></div></a>
<?php endif; ?>     



                <div class="post_block">

                    <div class="post_title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>

                    <div class="post_meta">

                        <?php the_time( 'jS M' ); ?> &middot; <a href="<?php echo get_permalink().'#comments'; ?>"><?php comments_number(__('No Comments', 'tdl_framework'), __('1 Comment', 'tdl_framework'), __('% Comments', 'tdl_framework')); ?></a>

                    </div>

                </div>

            </li>
        
        <?php
        
        endwhile;
        
        echo '</ul>';
        
        endif;
		
		; ?>
        
		<?php global $barberry_options; if (!empty($followtext)):?>
        <a class="follow-me-posts" href="<?php echo ( $barberry_options['tdl_blog_page'] != 0 ) ? get_permalink( $barberry_options['tdl_blog_page'] ) : get_post_type_archive_link( get_post_type() ); ?>" title="<?php echo $followtext; ?>"><?php echo $followtext; ?></a>
        <?php endif; ?>


			<div class="clear"></div>
            
        <?php
        wp_reset_postdata();
		
        		
		echo $after_widget;
		
	}

}


    
?>