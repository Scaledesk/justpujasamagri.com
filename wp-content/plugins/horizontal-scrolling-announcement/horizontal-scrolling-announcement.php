<?php
/*
Plugin Name: Horizontal scrolling announcement
Plugin URI: http://www.gopiplus.com/work/2010/07/18/horizontal-scrolling-announcement/
Description: This horizontal scrolling announcement wordpress plug-in let's scroll the content from one end to another end like reel.    
Version: 8.4
Author: Gopi Ramasamy
Author URI: http://www.gopiplus.com/work/2010/07/18/horizontal-scrolling-announcement/
Donate link: http://www.gopiplus.com/work/2010/07/18/horizontal-scrolling-announcement/
Text Domain: horizontal-scrolling-announcement
Domain Path: /languages
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

global $wpdb, $wp_version, $hsa_db_version;
define("WP_HSA_TABLE", $wpdb->prefix . "hsa_plugin");
define("WP_hsa_UNIQUE_NAME", "horizontal-scrolling-announcement");
define("WP_hsa_TITLE", "Horizontal scrolling announcement");
define('WP_hsa_FAV', 'http://www.gopiplus.com/work/2010/07/18/horizontal-scrolling-announcement/');
define('WP_hsa_LINK', 'Check official website for more information <a target="_blank" href="'.WP_hsa_FAV.'">click here</a>');
$hsa_db_version = "7.9";

function announcement()
{
	horizontal_scrolling_announcement();
}

function newannouncement( $group = "GROUP1" ) 
{
	$arr = array();
	$arr["group"]=$group;
	echo HSA_shortcode($arr);
}

function horizontal_scrolling_announcement()
{
	$arr = array();
	$arr["scrollamount"] = "";;
	$arr["scrolldelay"] = "";
	$arr["direction"] = "";
	$arr["group"] = "";
	echo HSA_shortcode($arr);
}

add_shortcode( 'horizontal-scrolling', 'HSA_shortcode' );

function HSA_shortcode( $atts ) 
{
	// [horizontal-scrolling group="GROUP1"]
	// [horizontal-scrolling group="GROUP1" scrollamount="" scrolldelay="" direction=""]
	global $wpdb;
	$group = "";
	$scrollamount = "";
	$scrolldelay = "";
	$direction = "";
	$style = "";

	if ( is_array( $atts ) )
	{
		foreach(array_keys($atts) as $key)
		{
			if($key == "group")
			{
				$group = $atts["group"];
			}
			elseif($key == "scrollamount")
			{
				$scrollamount = $atts["scrollamount"];
			}
			elseif($key == "scrolldelay")
			{
				$scrolldelay = $atts["scrolldelay"];
			}
			elseif($key == "direction")
			{
				$direction = $atts["direction"];
			}
			elseif($key == "style")
			{
				$style = $atts["style"];
			}
		}
	}

	$sSql = "select hsa_text,hsa_link,hsa_target from ".WP_HSA_TABLE." where hsa_status='YES'";
	$sSql = $sSql . " and ( hsa_dateend >= NOW() or hsa_dateend = '0000-00-00 00:00:00')";
	$sSql = $sSql . " and ( hsa_datestart <= NOW() or hsa_datestart = '0000-00-00 00:00:00')";
	if($group <> "")
	{
		$sSql = $sSql . " and hsa_group='$group'";
	}
	$sSql = $sSql . " ORDER BY hsa_order";

	$data = $wpdb->get_results($sSql);
	$what_marquee = "";	
	if ( ! empty($data) ) 
	{
		$cnt = 0;
		$hsa = "";
		$link = "";
		foreach ( $data as $data ) 
		{
			$link = $data->hsa_link;
			$target = $data->hsa_target;
			
			if($target == "")
			{
				$target = "_self";
			}
			
			if($cnt==0) 
			{  
				if($link != "") { $hsa = $hsa . "<a target='".$target."' href='".$link."'>"; } 
				$hsa = $hsa . stripslashes($data->hsa_text);
				if($link != "") { $hsa = $hsa . "</a>"; }
			}
			else
			{
				$hsa = $hsa . "&nbsp;&nbsp;&nbsp;&nbsp;";
				if($link != "") { $hsa = $hsa . "<a target='".$target."' href='".$link."'>"; } 
				$hsa = $hsa . stripslashes($data->hsa_text);
				if($link != "") { $hsa = $hsa . "</a>"; }
			}			
			$cnt = $cnt + 1;
		}

		if($scrollamount == "")
		{
			$scrollamount = get_option('hsa_scrollamount');
		}
		if($scrolldelay == "")
		{
			$scrolldelay = get_option('hsa_scrolldelay');
		}
		if($direction == "")
		{
			$direction = get_option('hsa_direction');
		}
		if($style == "")
		{
			$style = get_option('hsa_style');
		}
		$what_marquee = $what_marquee . "<div>";
		$what_marquee = $what_marquee . "<marquee style='$style' scrollamount='$scrollamount' scrolldelay='$scrolldelay' direction='$direction' onmouseover='this.stop()' onmouseout='this.start()'>";
		$what_marquee = $what_marquee . $hsa;
		$what_marquee = $what_marquee . "</marquee>";
		$what_marquee = $what_marquee . "</div>";
	}
	else
	{
		$hsa_noannouncement = get_option('hsa_noannouncement');
		if($hsa_noannouncement <> "")
		{
			$what_marquee = $what_marquee . $hsa_noannouncement;
		}
	}

	return $what_marquee;
}

function HSA_deactivate() 
{
	// No action required.
}

function HSA_uninstall()
{
	global $wpdb;
	delete_option('hsa_title');
	delete_option('hsa_scrollamount');
	delete_option('hsa_scrolldelay');
	delete_option('hsa_direction');
	delete_option('hsa_style');
	delete_option('hsa_pluginversion');
	delete_option('hsa_noannouncement');
	delete_option('hsa_capability');
	if($wpdb->get_var("show tables like '". WP_HSA_TABLE . "'") == WP_HSA_TABLE) 
	{
		$wpdb->query("DROP TABLE ". WP_HSA_TABLE);
	}
}

function HSA_activation() 
{
	global $wpdb, $hsa_db_version;
	$hsa_pluginversion = "";
	$hsa_tableexists = "YES";
	$hsa_pluginversion = get_option("hsa_pluginversion");
	
	if($wpdb->get_var("show tables like '". WP_HSA_TABLE . "'") != WP_HSA_TABLE)
	{
		$hsa_tableexists = "NO";
	}
	
	if(($hsa_tableexists == "NO") || ($hsa_pluginversion != $hsa_db_version)) 
	{
		$sSql = "CREATE TABLE ". WP_HSA_TABLE . " (
			 hsa_id mediumint(9) NOT NULL AUTO_INCREMENT,
			 hsa_text text NOT NULL,
			 hsa_order int(11) NOT NULL default '0',
			 hsa_status char(3) NOT NULL default 'YES',
			 hsa_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,	 
			 hsa_link VARCHAR(1024) DEFAULT '#' NOT NULL,
			 hsa_group VARCHAR(100) DEFAULT 'GROUP1' NOT NULL,
			 hsa_dateend datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			 hsa_datestart datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			 hsa_target VARCHAR(20) DEFAULT '_self' NOT NULL,
			 hsa_extra1 VARCHAR(100) DEFAULT '' NOT NULL,
			 hsa_extra2 VARCHAR(100) DEFAULT '' NOT NULL,
			 hsa_extra3 VARCHAR(100) DEFAULT '' NOT NULL,
			 hsa_extra4 VARCHAR(100) DEFAULT '' NOT NULL,
			 UNIQUE KEY hsa_id (hsa_id)
		  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  		dbDelta( $sSql );
		
		if($hsa_pluginversion == "")
		{
			add_option('hsa_pluginversion', "7.9");
		}
		else
		{
			update_option( "hsa_pluginversion", $hsa_db_version );
		}
		
		if($hsa_tableexists == "NO")
		{
			$welcome_text = "Congratulations, you just completed Horizontal Scrolling Announcement plugin installation.";		
			$rows_affected = $wpdb->insert( WP_HSA_TABLE , array( 'hsa_text' => $welcome_text) );
		}
	}

	add_option('hsa_title', "Announcement");
	add_option('hsa_scrollamount', "2");
	add_option('hsa_scrolldelay', "5");
	add_option('hsa_direction', "left");
	add_option('hsa_style', "");
	add_option('hsa_noannouncement', "No announcement available or all announcement expired.");
	add_option('hsa_capability', "manage_options");
}

function HSA_admin_options() 
{
	global $wpdb;
	$current_page = isset($_GET['ac']) ? $_GET['ac'] : '';
	switch($current_page)
	{
		case 'edit':
			include('pages/content-management-edit.php');
			break;
		case 'add':
			include('pages/content-management-add.php');
			break;
		case 'set':
			include('pages/content-setting.php');
			break;
		default:
			include('pages/content-management-show.php');
			break;
	}
}

function HSA_add_to_menu() 
{
	$hsa_capability = get_option('hsa_capability');
	//manage_options(Administrator), edit_posts(Administrator/Editor/Author/Contributor), edit_others_pages(Administrator/Editor)
	if($hsa_capability == "")
	{
		$hsa_capability = "manage_options";
	}
	if($hsa_capability <> "manage_options" && $hsa_capability <> "edit_posts" && $hsa_capability <> "edit_others_pages")
	{
		$hsa_capability = "manage_options";
	}
	add_options_page('Horizontal scrolling announcement',  __('Horizontal Scrolling', 'horizontal-scrolling-announcement'), $hsa_capability, 'horizontal-scrolling-announcement', 'HSA_admin_options' );
}

class HSA_widget_register extends WP_Widget 
{
	function __construct() 
	{
		$widget_ops = array('classname' => 'widget_text hsa-widget', 'description' => __('Horizontal scrolling announcement', 'horizontal-scrolling-announcement'), 'horizontal-scrolling');
		parent::__construct('HorizontalScrolling', __('Horizontal Scrolling', 'horizontal-scrolling-announcement'), $widget_ops);
	}
	
	function widget( $args, $instance ) 
	{
		extract( $args, EXTR_SKIP );

		$title 			= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$scrollamount	= $instance['scrollamount'];
		$scrolldelay	= $instance['scrolldelay'];
		$direction		= $instance['direction'];
		$group			= $instance['group'];

		echo $args['before_widget'];
		if ( ! empty( $title ) )
		{
			echo $args['before_title'] . $title . $args['after_title'];
		}
		// Call widget method
		$arr = array();
		$arr["scrollamount"] = $scrollamount;
		$arr["scrolldelay"] = $scrolldelay;
		$arr["direction"] = $direction;
		$arr["group"] = $group;
		echo HSA_shortcode($arr);
		// Call widget method
		echo $args['after_widget'];
	}
	
	function update( $new_instance, $old_instance ) 
	{
		$instance 					= $old_instance;
		$instance['title'] 			= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['scrollamount'] 	= ( ! empty( $new_instance['scrollamount'] ) ) ? strip_tags( $new_instance['scrollamount'] ) : '';
		$instance['scrolldelay'] 	= ( ! empty( $new_instance['scrolldelay'] ) ) ? strip_tags( $new_instance['scrolldelay'] ) : '';
		$instance['direction'] 		= ( ! empty( $new_instance['direction'] ) ) ? strip_tags( $new_instance['direction'] ) : '';
		$instance['group'] 			= ( ! empty( $new_instance['group'] ) ) ? strip_tags( $new_instance['group'] ) : '';
		return $instance;
	}

	function form( $instance ) 
	{
		$defaults = array(
			'title' 		=> '',
            'scrollamount' 	=> '',
            'scrolldelay' 	=> '',
            'direction' 	=> '',
			'group' 		=> ''
        );
		
		$instance 			= wp_parse_args( (array) $instance, $defaults);
        $title 				= $instance['title'];
        $scrollamount 		= $instance['scrollamount'];
        $scrolldelay 		= $instance['scrolldelay'];
        $direction 			= $instance['direction'];
		$group 				= $instance['group'];
	
		?>
		<p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'horizontal-scrolling-announcement'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('scrollamount'); ?>"><?php _e('Scroll amount', 'horizontal-scrolling-announcement'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('scrollamount'); ?>" name="<?php echo $this->get_field_name('scrollamount'); ?>" type="text" value="<?php echo $scrollamount; ?>" />
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('scrolldelay'); ?>"><?php _e('Scroll delay', 'horizontal-scrolling-announcement'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('scrolldelay'); ?>" name="<?php echo $this->get_field_name('scrolldelay'); ?>" type="text" value="<?php echo $scrolldelay; ?>" />
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('direction'); ?>"><?php _e('Direction', 'horizontal-scrolling-announcement'); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id('direction'); ?>" name="<?php echo $this->get_field_name('direction'); ?>">
				<option value=""><?php _e('Select', 'horizontal-scrolling-announcement'); ?></option>
				<option value="left" <?php $this->HSA_render_selected($direction == 'left'); ?>>Right to Left</option>
				<option value="right" <?php $this->HSA_render_selected($direction == 'right'); ?>>Left to Right</option>
			</select>
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('group'); ?>"><?php _e('Group', 'horizontal-scrolling-announcement'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('group'); ?>" name="<?php echo $this->get_field_name('group'); ?>" type="text" value="<?php echo $group; ?>" />
        </p>
		<p><?php echo WP_hsa_LINK; ?></p>
		<?php
	}

	function HSA_render_selected($var) 
	{
		if ($var==1 || $var==true) 
		{
			echo 'selected="selected"';
		}
	}
}

function HSA_textdomain() 
{
	  load_plugin_textdomain( 'horizontal-scrolling-announcement', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action('plugins_loaded', 'HSA_textdomain');

function HSA_widget_loading()
{
	register_widget( 'HSA_widget_register' );
}

register_activation_hook(__FILE__, 'HSA_activation');
register_deactivation_hook(__FILE__, 'HSA_deactivate' );
register_uninstall_hook(__FILE__, 'HSA_uninstall' );
add_action('admin_menu', 'HSA_add_to_menu');
add_action( 'widgets_init', 'HSA_widget_loading');
?>