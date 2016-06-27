<?php

class WP_Widget_Custom_Portfolio extends WP_Widget {

	function WP_Widget_Custom_Portfolio() {
	$widget_ops = array( 'classname' => 'portfolio-widget', 'description' => __('Displays your Recent Portfolio Posts', 'tdl_framework') );
		$this->WP_Widget( 'portfolio_widget', __('Barberry: Recent Portfolio', 'tdl_framework'), $widget_ops);
	}
	
	function form($instance) {
	
		
		$instance = wp_parse_args( (array) $instance, array('title' => __('Recent Portfolio', 'tdl_framework'), 'number' => 3, 'followtext' => '') );

        $title = esc_attr($instance['title']);
		$number = absint($instance['number']);
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
               <?php _e('No. of Portfolio Items:', 'tdl_framework'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
        </p>
        
		<p>
			<label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e( 'Filter by Category:' , 'tdl_framework' ); ?></label> 
			<select id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
				<option value='all' <?php if ( 'all' == $instance['categories'] ) echo 'selected="selected"'; ?>>All categories</option>
				<?php $categories = get_terms( 'port-group', 'orderby=count&hide_empty=1' ); ?>                

                
				<?php foreach( $categories as $category ) { ?>
				<option value='<?php echo $category->name; ?>' <?php if ($category->name == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->name; ?></option>
				<?php } ?>
			</select>
		</p>
   
        <p>
            <label for="<?php echo $this->get_field_id('followtext'); ?>">
               <?php _e('"All Portfolio" Posts Button Text:', 'tdl_framework'); ?>
            </label>
                <input class="widefat" id="<?php echo $this->get_field_id('followtext'); ?>" name="<?php echo $this->get_field_name('followtext'); ?>" type="text" value="<?php echo $followtext; ?>" />
        </p>        


<?php
    }

	function update($new_instance, $old_instance) {
        $instance=$old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = $new_instance['number'];
		$instance['categories'] = $new_instance['categories'];
		$instance['followtext'] = $new_instance['followtext'];
        return $instance;

    }

	function widget($args, $instance) {
	
		extract($args);

		$title = apply_filters('widget_title', $instance['title']);
		if ( empty($title) ) $title = false;

		$number = absint( $instance['number'] );
		$cat = $instance['categories'];
		$followtext = $instance['followtext'];
			
		echo $before_widget;
	
		if($title){
			echo $before_title;
			echo $title; 
			echo $after_title;
		}
		
		
		if ($cat == 'all') 
		
    		$args = array(
				'posts_per_page' => $number,
				'post_type' => 'portfolio',      
			);
			
		else
		
    		$args = array(
				'posts_per_page' => $number,
				'post_type' => 'portfolio',
				'tax_query' => array(
					array(
						'taxonomy' => 'port-group',
						'field' => 'slug',
						'terms' => array( 
							$cat 
						)
					)
				)       
			);		



		
        $postswidget = new WP_Query( $args );
        
        if( $postswidget->have_posts() ):
        
        echo '<div class="portfolio_widget">';
        
        while ( $postswidget->have_posts() ) : $postswidget->the_post();
        
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');        
        $thumb = tdl_resize( $thumb[0], 550, 400, true, false );
		
		
        ?>

			<div class="portfolio-item">
            <?php if ( has_post_thumbnail() ):?>
            	<figure>
                	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

                           <?php if ( has_post_thumbnail() ):?>
                           <?php if ( $thumb[0] ) { ?><img src="<?php echo $thumb[0]; ?>" width="<?php echo $thumb[1]; ?>" height="<?php echo $thumb[2]; ?>" alt="<?php the_title(); ?>" /><?php } ?>
                           <?php endif; ?> 
                   
                    </a>
                </figure>
            <?php endif; ?> 
                
                <div class="portfolio-item-details">
                    <span class="portfolio-item-category">
                    <?php echo get_the_term_list( get_the_ID(), 'port-group', '', ', ', '' ); ?>
                    </span>
                    <h4 class="portfolio-item-title"><a class="link-to-post" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                </div>

            </div>
        
        <?php
        
        endwhile;
        
        echo '</div>';
        
        endif;
		
		; ?>
        
		<?php global $barberry_options; if (!empty($followtext)):?>
        <a class="follow-me-ports" href="<?php echo ( $barberry_options['tdl_portfolio_page'] != 0 ) ? get_permalink( $barberry_options[ 'tdl_portfolio_page' ] ) : get_post_type_archive_link( get_post_type() ); ?>" title="<?php echo $followtext; ?>"><?php echo $followtext; ?></a>
        <?php endif; ?>

			<div class="clear"></div>
            
        <?php
        wp_reset_postdata();
		
        		
		echo $after_widget;
		
	}

}

    
?>