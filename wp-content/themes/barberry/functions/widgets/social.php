<?php

class WP_Widget_Custom_Social extends WP_Widget {

	function WP_Widget_Custom_Social() {
		$widget_ops = array( 'classname' => 'barberry_social', 'description' => __('A widget that displays customized social icons ', 'tdl_framework') );
		
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'barberry_social' );
		
		$this->WP_Widget( 'barberry_social', __('Barberry: Social', 'tdl_framework'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		$facebook = $instance['facebook'];
		$twitter = $instance['twitter'];
		$googleplus = $instance['googleplus'];
		$pinterest = $instance['pinterest'];
		$vimeo = $instance['vimeo'];
		$youtube = $instance['youtube'];
		$flickr = $instance['flickr'];	
		$skype = $instance['skype'];
		$behance = $instance['behance'];
		$dribbble = $instance['dribbble'];
		$tumblr = $instance['tumblr'];
		$linkedin = $instance['linkedin'];
		$instagram = $instance['instagram'];
		$dropbox = $instance['dropbox'];
		$rss = $instance['rss'];
		$paypal = $instance['paypal'];
		$foursquare = $instance['foursquare'];

	
		echo $before_widget;

		// Display the widget title 
		if ( $title ) echo $before_title . $title . $after_title;

		//Display icons
		echo('<div class="social_widget">' );
		if ( $facebook ) echo('<a class="facebook" href="' . $facebook . '" target="_blank"></a>' );
		if ( $twitter ) echo('<a class="twitter" href="' . $twitter . '" target="_blank"></a>' );
		if ( $googleplus ) echo('<a class="googleplus" href="' . $googleplus . '" target="_blank"></a>' );
		if ( $pinterest ) echo('<a class="pinterest" href="' . $pinterest . '" target="_blank"></a>' );		
		if ( $vimeo ) echo('<a class="vimeo" href="' . $vimeo . '" target="_blank"></a>' );
		if ( $youtube ) echo('<a class="youtube" href="' . $youtube . '" target="_blank"></a>' );
		if ( $flickr ) echo('<a class="flickr" href="' . $flickr . '" target="_blank"></a>' );
		if ( $skype ) echo('<a class="skype" href="' . $skype . '" target="_blank"></a>' );
		if ( $behance ) echo('<a class="behance" href="' . $behance . '" target="_blank"></a>' );
		if ( $dribbble ) echo('<a class="dribbble" href="' . $dribbble . '" target="_blank"></a>' );		
		if ( $tumblr ) echo('<a class="tumblr" href="' . $tumblr . '" target="_blank"></a>' );
		if ( $linkedin ) echo('<a class="linkedin" href="' . $linkedin . '" target="_blank"></a>' );
		if ( $instagram ) echo('<a class="instagram" href="' . $instagram . '" target="_blank"></a>' );
		if ( $dropbox ) echo('<a class="dropbox" href="' . $dropbox . '" target="_blank"></a>' );
		if ( $rss ) echo('<a class="rss" href="' . $rss . '" target="_blank"></a>' );
		if ( $paypal ) echo('<a class="paypal" href="' . $paypal . '" target="_blank"></a>' );
		if ( $foursquare ) echo('<a class="foursquare" href="' . $foursquare . '" target="_blank"></a>' );
		echo('</div>' );
		
		echo $after_widget;
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['facebook'] = strip_tags( $new_instance['facebook'] );
		$instance['twitter'] = strip_tags( $new_instance['twitter'] );
		$instance['googleplus'] = strip_tags( $new_instance['googleplus'] );
		$instance['pinterest'] = strip_tags( $new_instance['pinterest'] );
		$instance['vimeo'] = strip_tags( $new_instance['vimeo'] );		
		$instance['youtube'] = strip_tags( $new_instance['youtube'] );
		$instance['flickr'] = strip_tags( $new_instance['flickr'] );
		$instance['skype'] = strip_tags( $new_instance['skype'] );		
		$instance['behance'] = strip_tags( $new_instance['behance'] );
		$instance['dribbble'] = strip_tags( $new_instance['dribbble'] );
		$instance['tumblr'] = strip_tags( $new_instance['tumblr'] );
		$instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
		$instance['instagram'] = strip_tags( $new_instance['instagram'] );
		$instance['dropbox'] = strip_tags( $new_instance['dropbox'] );
		$instance['rss'] = strip_tags( $new_instance['rss'] );
		$instance['paypal'] = strip_tags( $new_instance['paypal'] );
		$instance['foursquare'] = strip_tags( $new_instance['foursquare'] );

		return $instance;
	}

	
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 
			'title' => __('Barberry Social', 'tdl_framework'),
			'facebook' => '',
			'twitter' => '',
			'googleplus' => '',
			'pinterest' => '',
			'vimeo' => '',			
			'youtube' => '',
			'flickr' => '',
			'skype' => '',
			'behance' => '',
			'dribbble' => '',
			'tumblr' => '',
			'linkedin' => '',
			'instagram' => '',
			'dropbox' => '',
			'rss' => '',
			'paypal' => '',
			'foursquare' => '',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Widget title:', 'tdl_framework'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e('Facebook URL', 'tdl_framework'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo $instance['facebook']; ?>" class="widefat" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e('Twitter URL', 'tdl_framework'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo $instance['twitter']; ?>" class="widefat" />
		</p>        

        <p>
			<label for="<?php echo $this->get_field_id( 'googleplus' ); ?>"><?php _e('Google+ URL', 'tdl_framework'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'googleplus' ); ?>" name="<?php echo $this->get_field_name( 'googleplus' ); ?>" value="<?php echo $instance['googleplus']; ?>" class="widefat" />
		</p>
                
        <p>
			<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e('Pinterest URL', 'tdl_framework'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo $instance['pinterest']; ?>" class="widefat" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e('Vimeo URL', 'tdl_framework'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" value="<?php echo $instance['vimeo']; ?>" class="widefat" />
		</p>        
        
        <p>
			<label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e('Youtube URL', 'tdl_framework'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo $instance['youtube']; ?>" class="widefat" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e('Flickr URL', 'tdl_framework'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" value="<?php echo $instance['flickr']; ?>" class="widefat" />
		</p>        
        
        
        <p>
			<label for="<?php echo $this->get_field_id( 'skype' ); ?>"><?php _e('Skype URL', 'tdl_framework'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'skype' ); ?>" name="<?php echo $this->get_field_name( 'skype' ); ?>" value="<?php echo $instance['skype']; ?>" class="widefat" />
		</p>        
        
        
        <p>
			<label for="<?php echo $this->get_field_id( 'behance' ); ?>"><?php _e('Behance URL', 'tdl_framework'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'behance' ); ?>" name="<?php echo $this->get_field_name( 'behance' ); ?>" value="<?php echo $instance['behance']; ?>" class="widefat" />
		</p>
        
        
        <p>
			<label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php _e('Dribbble URL', 'tdl_framework'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" value="<?php echo $instance['dribbble']; ?>" class="widefat" />
		</p>        
        
        
        <p>
			<label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php _e('Tumblr URL', 'tdl_framework'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" value="<?php echo $instance['tumblr']; ?>" class="widefat" />
		</p>         
        
        <p>
			<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e('LinkedIn URL', 'tdl_framework'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo $instance['linkedin']; ?>" class="widefat" />
		</p>

        <p>
			<label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e('Instagram URL', 'tdl_framework'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" value="<?php echo $instance['instagram']; ?>" class="widefat" />
		</p>
                        
        <p>
			<label for="<?php echo $this->get_field_id( 'dropbox' ); ?>"><?php _e('Dropbox URL', 'tdl_framework'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'dropbox' ); ?>" name="<?php echo $this->get_field_name( 'dropbox' ); ?>" value="<?php echo $instance['dropbox']; ?>" class="widefat" />
		</p>         
        
        <p>
			<label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e('RSS URL', 'tdl_framework'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" value="<?php echo $instance['rss']; ?>" class="widefat" />
		</p>
                        
        <p>
			<label for="<?php echo $this->get_field_id( 'paypal' ); ?>"><?php _e('Paypal URL', 'tdl_framework'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'paypal' ); ?>" name="<?php echo $this->get_field_name( 'paypal' ); ?>" value="<?php echo $instance['paypal']; ?>" class="widefat" />
		</p> 
        
        <p>
			<label for="<?php echo $this->get_field_id( 'foursquare' ); ?>"><?php _e('Foursquare URL', 'tdl_framework'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'foursquare' ); ?>" name="<?php echo $this->get_field_name( 'foursquare' ); ?>" value="<?php echo $instance['foursquare']; ?>" class="widefat" />
		</p> 
	<?php
	}
}

?>