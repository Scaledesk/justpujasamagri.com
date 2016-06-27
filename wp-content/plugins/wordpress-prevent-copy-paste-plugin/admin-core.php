<?php
//define all variables the needed alot
include 'the_globals.php';
if($_POST["action"] == 'update')
{
	//----------------------------------------------------list the options array values
	$single_posts_protection = $_POST["single_posts_protection"];
	$right_click_by_mouse_protection = $_POST["right_click_by_mouse_protection"];
	$css_protection = $_POST["css_protection"];
	$home_page_protection = $_POST["home_page_protection"];
	$show_protection_info = $_POST["show_protection_info"];
	//----------------------------------------------------Get the  options array values
	$wpcp_settings = 
	Array (
			'single_posts_protection' => $single_posts_protection, // prevent content copy, take 2 parameters
			'right_click_by_mouse_protection' => $right_click_by_mouse_protection, // Prevent Right Click By Mouse
			'css_protection' => $css_protection, // PROTECTION BY CSS TECHNIQUES
			'home_page_protection' => $home_page_protection, // PROTECT THE HOME PAGE OR NOT
			'show_protection_info' => $show_protection_info // about the plugin
		);
		if ($wpcp_settings != '' ) {
		    update_option( 'wpcp_settings' , $wpcp_settings );
		} else {
		    $deprecated = ' ';
		    $autoload = 'no';
		    add_option( 'wpcp_settings', $wpcp_settings, $deprecated, $autoload );
		}
}else //no update action
{
	$wpcp_settings = wpcp_read_options();
}

?>
<style>
#aio_admin_main {
text-align:left;
direction:ltr;
padding:10px;
margin: 10px;
background-color: #ffffff;
border:1px solid #EBDDE2;
display: relative;
overflow: auto;
}
.inner_block{
height: 370px;
display: inline;
min-width:770px;
}
#donate{
    background-color: #EEFFEE;
    border: 1px solid #66DD66;
    border-radius: 10px 10px 10px 10px;
    height: 58px;
    padding: 10px;
    margin: 15px;
    }
</style>
<div id="donate" style="width: 914px; height: 179px">
<table border="0" width="100%" cellspacing="0" cellpadding="0" dir="ltr" height="88" bgcolor="#FFFFFF">
	<tr>
		<td align="center"><b>
		<font size="7">
		<a target="_blank" href="http://www.wp-buy.com/TestDrive/wpcp-demos/Premium-Version-Full-Protection.htm">Live Preview</a></font></b><p><b><font color="#00A600">Get the premium 
		version 
		</font></b></p>
		<p><b><font color="#00A600">and enjoy</font></b></p>
		<p><b><font color="#00A600">a full protection!</font></b></td>
		<td width="443">
		<p align="center">
		<img class="decoded" src="http://www.wp-buy.com/wp-content/uploads/2014/01/box-wpcp-150x150.png"></td>
	</tr>
</table>
<div style="width: 6px; height: 0px"></div></div>
<div id="aio_admin_main">
<form method="POST">
<input type="hidden" value="update" name="action">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td width="77%">

<div class="inner_block">
	<h2>Smart Wordpress Prevent Copy/Paste Options:</h2>
		<table border="0" width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<td width="60%">
		<div><font color="#C47500"><b>Change Options as You Like:</b></font></div>
	<div style="width: 603px; height: 284px; float: left; border: 1px solid #E9E9E9; padding: 4px" id="layer3">
		<table border="0" width="100%" height="270" cellspacing="0" cellpadding="0">
			<tr>
				<td width="221"><b>Posts</b> Protection</td>
				<td>
				<select size="1" name="single_posts_protection">
				<?php 
				if ($wpcp_settings['single_posts_protection'] == 'Enabled')
					{
						echo '<option selected>Enabled</option>';
						echo '<option>Disabled</option>';
					}
					else
					{
						echo '<option>Enabled</option>';
						echo '<option selected>Disabled</option>';
					}
				?>
				</select>
				</td>
				<td width="212">
				<p align="center"><font color="#008000">For single posts content</font></td>
			</tr>
			<tr>
				<td width="221"><b>Home Page</b> Protection</td>
				<td>
				<select size="1" name="home_page_protection">
				<?php 
				if ($wpcp_settings['home_page_protection'] == 'Enabled')
					{
						echo '<option selected>Enabled</option>';
						echo '<option>Disabled</option>';
					}
					else
					{
						echo '<option>Enabled</option>';
						echo '<option selected>Disabled</option>';
					}
				?>
				</select>
				</td>
				<td width="212">
				<p align="center"><font color="#008000">Dont copy any thing! 
				even from my homepage</font></td>
			</tr>
			</table></div>

				<p>&nbsp;</td>
			</tr>
	</table>
	
	<p align="left">
				<input type="submit" value="     Save all Settings     " name="B4" style="width: 193; height: 29; border: 1px solid #008000; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">&nbsp;&nbsp;
	</p>

	<p>&nbsp;</p>
</div>
&nbsp;</td>
	</tr>
</table>

<p>
	</li></p>
</form></div>
<p>&nbsp;</p>