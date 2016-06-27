<?php if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); } ?>
<div class="wrap">
  <div class="form-wrap">
    <div id="icon-edit" class="icon32 icon32-posts-post"><br>
    </div>
    <h2><?php _e(WP_hsa_TITLE, 'horizontal-scrolling-announcement'); ?></h2>	
    <?php
	$hsa_title = get_option('hsa_title');
	$hsa_scrollamount = get_option('hsa_scrollamount');
	$hsa_scrolldelay = get_option('hsa_scrolldelay');
	$hsa_direction = get_option('hsa_direction');
	$hsa_style = get_option('hsa_style');
	$hsa_noannouncement = get_option('hsa_noannouncement');
	$hsa_capability = get_option('hsa_capability');

	if (isset($_POST['hsa_submit'])) 
	{
		//	Just security thingy that wordpress offers us
		check_admin_referer('hsa_form_setting');
			
		$hsa_title = stripslashes(wp_filter_post_kses($_POST['hsa_title']));
		$hsa_scrollamount = stripslashes(intval($_POST['hsa_scrollamount']));
		$hsa_scrolldelay = stripslashes(intval($_POST['hsa_scrolldelay']));
		$hsa_direction = stripslashes(sanitize_text_field($_POST['hsa_direction']));
		$hsa_style = stripslashes(wp_filter_post_kses($_POST['hsa_style']));
		$hsa_noannouncement = stripslashes(wp_filter_post_kses($_POST['hsa_noannouncement']));
		$hsa_capability = stripslashes(sanitize_text_field($_POST['hsa_capability']));
		
		if(!is_numeric($hsa_scrollamount) || $hsa_scrollamount == 0) { $hsa_scrollamount = 2; }
		if(!is_numeric($hsa_scrolldelay) || $hsa_scrolldelay == 0) { $hsa_scrolldelay = 5; }
		
		if($hsa_capability != "edit_others_pages" && $hsa_capability != "manage_options" && $hsa_capability != "edit_posts")
		{
			$hsa_capability = "edit_others_pages";
		} 
		
		if($hsa_direction != "left" && $hsa_direction != "right")
		{
			$hsa_direction = "left";
		}
	
		update_option('hsa_title', $hsa_title );
		update_option('hsa_scrollamount', $hsa_scrollamount );
		update_option('hsa_scrolldelay', $hsa_scrolldelay );
		update_option('hsa_direction', $hsa_direction );
		update_option('hsa_style', $hsa_style );
		update_option('hsa_noannouncement', $hsa_noannouncement );
		update_option('hsa_capability', $hsa_capability );
		?>
		<div class="updated fade">
			<p><strong><?php _e('Details successfully updated.', 'horizontal-scrolling-announcement'); ?></strong></p>
		</div>
		<?php
	}
	?>
	<script language="JavaScript" src="<?php echo plugins_url(); ?>/horizontal-scrolling-announcement/pages/setting.js"></script>
    <form name="hsa_form" method="post" action="">
        <h3><?php _e('Default settings', 'horizontal-scrolling-announcement'); ?></h3>
		<label for="tag-width"><?php _e('Widget Title', 'horizontal-scrolling-announcement'); ?></label>
		<input name="hsa_title" type="text" value="<?php echo $hsa_title; ?>"  id="hsa_title" size="70" maxlength="150">
		<p><?php _e('Please enter your widget title.', 'horizontal-scrolling-announcement'); ?></p>
		
		<label for="tag-width"><?php _e('Scroll amount', 'horizontal-scrolling-announcement'); ?></label>
		<input name="hsa_scrollamount" type="text" value="<?php echo $hsa_scrollamount; ?>"  id="hsa_scrollamount" maxlength="3">  
		<p><?php _e('Please enter scroll amount, This will make the scroll faster. (Example: 2)', 'horizontal-scrolling-announcement'); ?></p>
		
		<label for="tag-width"><?php _e('Scroll delay', 'horizontal-scrolling-announcement'); ?></label>
		<input name="hsa_scrolldelay" type="text" value="<?php echo $hsa_scrolldelay; ?>"  id="hsa_scrolldelay" maxlength="3">
		<p><?php _e('Set the amount of delay in milliseconds. (Example: 5)', 'horizontal-scrolling-announcement'); ?></p>
		
		<label for="tag-width"><?php _e('Direction', 'horizontal-scrolling-announcement'); ?></label>
		<select name="hsa_direction" id="hsa_direction">
			<option value='left' <?php if($hsa_direction == 'left') { echo "selected='selected'" ; } ?>>Right to Left</option>
			<option value='right' <?php if($hsa_direction == 'right') { echo "selected='selected'" ; } ?>>Left to Right</option>
		</select>
		<p><?php _e('Please select your scroll direction.', 'horizontal-scrolling-announcement'); ?></p>
		
		<label for="tag-width"><?php _e('CSS attribute', 'horizontal-scrolling-announcement'); ?></label>
		<input name="hsa_style" type="text" value="<?php echo $hsa_style; ?>"  id="hsa_style" size="70" maxlength="500">
		<p><?php _e('Please enter your CSS attributes for style. (Example: color:#FF0000; font:Arial;)', 'horizontal-scrolling-announcement'); ?></p>
		
		<label for="tag-width"><?php _e('No announcement text', 'horizontal-scrolling-announcement'); ?></label>
		<input name="hsa_noannouncement" type="text" value="<?php echo $hsa_noannouncement; ?>"  id="hsa_noannouncement" size="70" maxlength="500">
		<p><?php _e('This text will be display, if no announcement available or all announcement expired.', 'horizontal-scrolling-announcement'); ?></p>
		
		<label for="tag-width"><?php _e('Capability', 'horizontal-scrolling-announcement'); ?></label>
		<select name="hsa_capability" id="hsa_capability">
		<?php
		if ( current_user_can('manage_options') ) 
		{
			?>
			<option value='manage_options' <?php if($hsa_capability == 'manage_options') { echo "selected='selected'" ; } ?>>Administrator Only</option>
			<option value='edit_others_pages' <?php if($hsa_capability == 'edit_others_pages') { echo "selected='selected'" ; } ?>>Administrator/Editor</option>
			<option value='edit_posts' <?php if($hsa_capability == 'edit_posts') { echo "selected='selected'" ; } ?>>Administrator/Editor/Author/Contributor</option>
			<?php
		}
		elseif( current_user_can('edit_others_pages') )
		{
			?>
			<option value='edit_others_pages' <?php if($hsa_capability == 'edit_others_pages') { echo "selected='selected'" ; } ?>>Administrator/Editor</option>
			<?php
		}
		else
		{
			?>
			<option value='edit_posts' <?php if($hsa_capability == 'edit_posts') { echo "selected='selected'" ; } ?>>Administrator/Editor/Author/Contributor</option>
			<?php
		}
		?>
		</select>
		<p><?php _e('Select user role to access the plugin admin menu. Only Admin user can change this value.', 'horizontal-scrolling-announcement'); ?></p>
		
		<p class="submit">
		<input name="hsa_submit" id="hsa_submit" class="button" value="Submit" type="submit" />
		<input name="publish" lang="publish" class="button" onclick="hsa_redirect()" value="Cancel" type="button" />
		<input name="Help" lang="publish" class="button" onclick="hsa_help()" value="Help" type="button" />
		</p>
		<?php wp_nonce_field('hsa_form_setting'); ?>
    </form>
  </div>
  <p class="description"><?php echo WP_hsa_LINK; ?></p>
</div>