<?php if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); } ?>
<?php
$hsa_pluginversion = get_option('hsa_pluginversion');
if ($hsa_pluginversion <> "7.9")
{
	?>
	<div class="error fade">
		<p><strong>Note: You have recently upgraded the plugin. Please "Deactivate" and "Activate" the plugin. This is mandatory and it will not affect your data.</strong></p>
	</div>
	<?php
}

// Form submitted, check the data
if (isset($_POST['frm_hsa_display']) && $_POST['frm_hsa_display'] == 'yes')
{
	$did = isset($_GET['did']) ? intval($_GET['did']) : '0';
	if(!is_numeric($did)) { die('<p>Are you sure you want to do this?</p>'); }
	
	$hsa_success = '';
	$hsa_success_msg = FALSE;
	
	// First check if ID exist with requested ID
	$sSql = $wpdb->prepare(
		"SELECT COUNT(*) AS `count` FROM ".WP_HSA_TABLE."
		WHERE `hsa_id` = %d",
		array($did)
	);
	$result = '0';
	$result = $wpdb->get_var($sSql);
	
	if ($result != '1')
	{
		?>
		<div class="error fade">
		  <p><strong><?php _e('Oops, selected details doesnt exist.', 'horizontal-scrolling-announcement'); ?></strong></p>
		</div>
		<?php
	}
	else
	{
		// Form submitted, check the action
		if (isset($_GET['ac']) && $_GET['ac'] == 'del' && isset($_GET['did']) && $_GET['did'] != '')
		{
			//	Just security thingy that wordpress offers us
			check_admin_referer('hsa_form_show');
			
			//	Delete selected record from the table
			$sSql = $wpdb->prepare("DELETE FROM `".WP_HSA_TABLE."`
					WHERE `hsa_id` = %d
					LIMIT 1", $did);
			$wpdb->query($sSql);
			
			//	Set success message
			$hsa_success_msg = TRUE;
			$hsa_success = __('Selected record was successfully deleted.', 'horizontal-scrolling-announcement');
		}
	}
	
	if ($hsa_success_msg == TRUE)
	{
		?>
		<div class="updated fade">
		  <p><strong><?php echo $hsa_success; ?></strong></p>
		</div>
		<?php
	}
}
?>
<div class="wrap">
  <div id="icon-edit" class="icon32 icon32-posts-post"></div>
	<h2><?php _e(WP_hsa_TITLE, 'horizontal-scrolling-announcement'); ?>
	<a class="add-new-h2" href="<?php echo admin_url(); ?>options-general.php?page=horizontal-scrolling-announcement&amp;ac=add">
		<?php _e('Add New', 'horizontal-scrolling-announcement'); ?>
	</a> 
	</h2>
  <div class="tool-box">
    <?php
		$sSql = "SELECT * FROM `".WP_HSA_TABLE."` order by hsa_id";
		$myData = array();
		$myData = $wpdb->get_results($sSql, ARRAY_A);
		?>
    <script language="JavaScript" src="<?php echo plugins_url(); ?>/horizontal-scrolling-announcement/pages/setting.js"></script>
    <form name="frm_hsa_display" method="post">
      <table width="100%" class="widefat" id="straymanage">
        <thead>
          <tr>
            <th class="check-column" scope="row" style="padding: 8px 2px;"><input type="checkbox" /></th>
            <th width="55%" scope="col"><?php _e('Announcement text', 'horizontal-scrolling-announcement'); ?></th>
            <th scope="col"><?php _e('Order', 'horizontal-scrolling-announcement'); ?></th>
            <th scope="col"><?php _e('Display', 'horizontal-scrolling-announcement'); ?></th>
            <th scope="col"><?php _e('Group', 'horizontal-scrolling-announcement'); ?></th>
            <th scope="col"><?php _e('Start Date', 'horizontal-scrolling-announcement'); ?></th>
			<th scope="col"><?php _e('Expiration', 'horizontal-scrolling-announcement'); ?></th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th class="check-column" scope="row" style="padding: 8px 2px;"><input type="checkbox" /></th>
            <th scope="col"><?php _e('Announcement text', 'horizontal-scrolling-announcement'); ?></th>
            <th scope="col"><?php _e('Order', 'horizontal-scrolling-announcement'); ?></th>
            <th scope="col"><?php _e('Display', 'horizontal-scrolling-announcement'); ?></th>
            <th scope="col"><?php _e('Group', 'horizontal-scrolling-announcement'); ?></th>
			<th scope="col"><?php _e('Start Date', 'horizontal-scrolling-announcement'); ?></th>
            <th scope="col"><?php _e('Expiration', 'horizontal-scrolling-announcement'); ?></th>
          </tr>
        </tfoot>
        <tbody>
          <?php 
			$i = 0;
			if(count($myData) > 0 )
			{
				foreach ($myData as $data)
				{
				?>
				<tr class="<?php if ($i&1) { echo'alternate'; } else { echo ''; }?>">
					<td align="left"><input type="checkbox" value="<?php echo $data['hsa_id']; ?>" name="hsa_group_item[]"></td>
					<td><?php echo stripslashes($data['hsa_text']); ?>
					<div class="row-actions"> <span class="edit"> <a title="Edit" href="<?php echo admin_url(); ?>options-general.php?page=horizontal-scrolling-announcement&amp;ac=edit&amp;did=<?php echo $data['hsa_id']; ?>">
					<?php _e('Edit', 'horizontal-scrolling-announcement'); ?>
					</a> | </span> <span class="trash"> <a onClick="javascript:hsa_delete('<?php echo $data['hsa_id']; ?>')" href="javascript:void(0);">
					<?php _e('Delete', 'horizontal-scrolling-announcement'); ?>
					</a> </span> </div>
					</td>
					<td><?php echo stripslashes($data['hsa_order']); ?></td>
					<td><?php echo stripslashes($data['hsa_status']); ?></td>
					<td><?php echo stripslashes($data['hsa_group']); ?></td>
					<td><?php echo substr($data['hsa_datestart'],0,10); ?></td>
					<td><?php echo substr($data['hsa_dateend'],0,10); ?></td>
				</tr>
				<?php 
				$i = $i+1; 
				} 
			}
			else
			{
				?>
				<tr>
					<td colspan="7" align="center"><?php _e('No records available.', 'horizontal-scrolling-announcement'); ?></td>
				</tr>
				<?php 
			}
			?>
        </tbody>
      </table>
      <?php wp_nonce_field('hsa_form_show'); ?>
      <input type="hidden" name="frm_hsa_display" value="yes"/>
    </form>
    <div class="tablenav">
	<h2> 
	<a class="button add-new-h2" href="<?php echo admin_url(); ?>options-general.php?page=horizontal-scrolling-announcement&amp;ac=add">
		<?php _e('Add New', 'horizontal-scrolling-announcement'); ?>
	</a> 
	<a class="button add-new-h2" href="<?php echo admin_url(); ?>options-general.php?page=horizontal-scrolling-announcement&amp;ac=set">
		<?php _e('Default Settings', 'horizontal-scrolling-announcement'); ?>
	</a> 
	<a class="button add-new-h2" target="_blank" href="<?php echo WP_hsa_FAV; ?>">
		<?php _e('Help', 'horizontal-scrolling-announcement'); ?>
	</a> 
	</h2>
    </div>
    <div style="height:5px"></div>
    <h3><?php _e('Plugin configuration option', 'horizontal-scrolling-announcement'); ?></h3>
    <ol>
      <li><?php _e('Drag and drop the widget to your sidebar.', 'horizontal-scrolling-announcement'); ?></li>
      <li><?php _e('Add the plugin in the posts or pages using short code.', 'horizontal-scrolling-announcement'); ?></li>
      <li><?php _e('Add directly in to the theme using PHP code.', 'horizontal-scrolling-announcement'); ?></li>
    </ol>
    <p class="description"><?php echo WP_hsa_LINK; ?></p>
  </div>
</div>