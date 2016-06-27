<?php
global $barberry_options;
#-----------------------------------------------------------------#
# Columns
#-----------------------------------------------------------------# 

//full-width columns
function tdl_container( $atts, $content = null ) {
    extract(shortcode_atts(array(), $atts));
    return '<div class="container">' . do_shortcode($content) .'</div>';
}
add_shortcode('container', 'tdl_container');

//full-width columns
function tdl_full_width( $atts, $content = null ) {
    extract(shortcode_atts(array(
		"boxed" => 'false',
	 	"centered_text" => 'false',
		'bg_color' => '#ffffff',
		'image_url' => '',
		'h_padding' => '',
		'v_padding' => '',	
	), $atts));
	
	
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($h_padding == '')  { $h_padding .= '0px';}
	if($v_padding == '')  { $v_padding .= '0px';}
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col full_width last' . $column_classes . '" style="background-color:'.$bg_color.'; background-image:url('.$image_url.')"><div style="padding:'.$v_padding.' '.$h_padding.';">' . $box_top . do_shortcode($content) . $box_bottom . '</div></div><div class="clearcol"></div>';
}
add_shortcode('full_width', 'tdl_full_width');

//half columns
function tdl_one_half( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;	
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col one_half' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div>';
}
add_shortcode('one_half', 'tdl_one_half');

function tdl_one_half_last( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;	
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col one_half last' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div><div class="clearcol"></div>';
}
add_shortcode('one_half_last', 'tdl_one_half_last');



//one third columns
function tdl_one_third( $atts, $content = null ) {
	extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;	
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col one_third' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div>';
}
add_shortcode('one_third', 'tdl_one_third');

function tdl_one_third_last( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;	
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col one_third last' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div><div class="clearcol"></div>';
}
add_shortcode('one_third_last', 'tdl_one_third_last');

function tdl_two_thirds( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;	
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col two_third' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div>';
}
add_shortcode('two_thirds', 'tdl_two_thirds');

function tdl_two_thirds_last( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;	
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col two_third last' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div><div class="clearcol"></div>';
}
add_shortcode('two_thirds_last', 'tdl_two_thirds_last');



//one fourth columns
function tdl_one_fourth( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;	
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col one_fourth' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div>';
}
add_shortcode('one_fourth', 'tdl_one_fourth');

function tdl_one_fourth_last( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;	
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col one_fourth last' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div><div class="clearcol"></div>';
}
add_shortcode('one_fourth_last', 'tdl_one_fourth_last');

function tdl_three_fourths( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;		
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col three_fourth' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div>';
}
add_shortcode('three_fourths', 'tdl_three_fourths');

function tdl_three_fourths_last( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;	
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col three_fourth last' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div><div class="clearcol"></div>';
}
add_shortcode('three_fourths_last', 'tdl_three_fourths_last');

//one fifth columns
function tdl_one_fifth( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;		
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col one_fifth' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div>';
}
add_shortcode('one_fifth', 'tdl_one_fifth');

function tdl_one_fifth_last( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;	
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col one_fifth last' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div><div class="clearcol"></div>';
}
add_shortcode('one_fifth_last', 'tdl_one_fifth_last');

//two fifth columns
function tdl_two_fifth( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;	
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col two_fifth' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div>';
}
add_shortcode('two_fifth', 'tdl_two_fifth');

function tdl_two_fifth_last( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;	
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col two_fifth last' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div><div class="clearcol"></div>';
}
add_shortcode('two_fifth_last', 'tdl_two_fifth_last');

//three fifth columns
function tdl_three_fifth( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;	
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col three_fifth' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div>';
}
add_shortcode('three_fifth', 'tdl_three_fifth');

function tdl_three_fifth_last( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;	
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col three_fifth last' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div><div class="clearcol"></div>';
}
add_shortcode('three_fifth_last', 'tdl_three_fifth_last');

//four fifth columns
function tdl_four_fifth( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;		
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col four_fifth' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div>';
}
add_shortcode('four_fifth', 'tdl_four_fifth');

function tdl_four_fifth_last( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;	
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col four_fifth last' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div><div class="clearcol"></div>';
}
add_shortcode('four_fifth_last', 'tdl_four_fifth_last');

//one sixth columns
function tdl_one_sixth( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;	
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col one_sixth' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div>';
}
add_shortcode('one_sixth', 'tdl_one_sixth');

function tdl_one_sixth_last( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col one_sixth last' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div><div class="clearcol"></div>';
}
add_shortcode('one_sixth_last', 'tdl_one_sixth_last');

//five sixth columns
function tdl_five_sixth( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;	
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col five_sixth' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div>';
}
add_shortcode('five_sixth', 'tdl_five_sixth');

function tdl_five_sixth_last( $atts, $content = null ) {
    extract(shortcode_atts(array("boxed" => 'false', "centered_text" => 'false'), $atts));
	$column_classes = null;
	$box_border = null;
	$box_top = null;
	$box_bottom = null;	
	if($boxed == 'true')  { $column_classes .= ' boxed'; $box_top = '<div class="ins_box">'; $box_bottom = '</div>'; }
	if($centered_text == 'true') $column_classes .= ' centered-text';
    return '<div class="col five_sixth last' . $column_classes . '">' . $box_top . do_shortcode($content) . $box_bottom . '</div><div class="clearcol"></div>';
}
add_shortcode('five_sixth_last', 'tdl_five_sixth_last');




#-----------------------------------------------------------------#
# Elements
#-----------------------------------------------------------------# 

//code
function tdl_code($atts, $content = null) { 
    extract(shortcode_atts(array("title" => 'Title'), $atts));
    return'
		<code><pre>'.htmlspecialchars($content).'</pre></code><div class="clearcol"></div>';
}
add_shortcode('code', 'tdl_code');

//banner
function tdl_banner($atts, $content = null) {  
    extract(shortcode_atts(array(
		'title' => '',
		'subtitle' => '',
		'url' => '',
		'align' => 'center',
		'style' => 'dark',
		'borders' => '',
		'divider' => '',
		'bg_color' => '#ffffff',
		'inner_stroke' => '2px',
		'image_url' => '',
		'h_padding' => '20px',
		'v_padding' => '20px',
	
	), $atts));


	($borders == 'true') ? $borders = 'borders' :  $borders = '';
	($divider == 'true') ? $divider = '<div class="shortcode_banner_simple_sep"></div><div class="clearfix"></div>' :  $divider = '';
	if (!empty($url)) {$url = 'onclick="location.href=\''.$url.'\';"';$urllink = 'link';} else {$url = '';$urllink = '';};
	(!empty($title)) ? $title = '<div><h3>'.$title.'</h3></div>' :  $title = '';
	(!empty($subtitle)) ? $subtitle = '<div><h4>'.$subtitle.'</h4></div>' :  $subtitle = '';

	$banner_simple = '
		<div class="shortcode_banner_simple '.$style.' '.$urllink.' '.$borders.'" '.$url.'  style="background-color:'.$bg_color.'; background-image:url('.$image_url.')"><div class="shortcode_banner_simple_inside '.$align.'" style="background-color:'.$bg_color.';padding:'.$v_padding.' '.$h_padding.';">
				'.$title.'
				'.$divider.'
				'.$subtitle.'
			</div></div>';
	return $banner_simple;
	
}
add_shortcode('banner', 'tdl_banner');

//heading
function tdl_heading($atts, $content = null) { 
    extract(shortcode_atts(array(
		"heading_size" => '',
		"heading_align" => '',
		"heading_style" => '',
		"heading_weight" => '',
		"v_padding" => ''
		), $atts));
		
	($heading_weight == 'true') ? $heading_weight = 'bold' :  $heading_weight = '';
	(!empty($v_padding)) ? $v_padding = 'style="margin:'.$v_padding.' 0;"' :  $v_padding = '';
	if ($heading_style == 'bold_title') {$h_before = '<span>';$h_after = '</span>';} else {$h_before = '';$h_after = '';};
	
    return'
    <div class="content_title '.$heading_weight.' '.$heading_style.' '.$heading_align.'" '.$v_padding.'>
		<'.$heading_size.'>'.$h_before.''.$content.''.$h_after.'</'.$heading_size.'>
	<div class="clearfix"></div></div>';
}
add_shortcode('heading', 'tdl_heading');


//heading
function tdl_blockquote($atts, $content = null) { 
    extract(shortcode_atts(array(
		"align" => '',
		"style" => '',
		"author" => '',
		), $atts));
		
    if( $style != '' ) {
        $style = ' quote';
    }
    
    if( $align == 'left' ) {
        $align = ' quote-left';
    } elseif( $align == 'right' ) {
        $align = ' quote-right';
    }
    
    if( $author != '' ) {
        $author = '<span>'. $author .'</span>';
    }
	
    return'<blockquote class="'. $style . $align .'"><p>' . $content . '</p>'. $author .'</blockquote>';
}
add_shortcode('blockquote', 'tdl_blockquote');


//divider
function tdl_divider($atts, $content = null) {  
    extract(shortcode_atts(array(
	"line" => 'false',
	"top_space" => '',
	"bottom_space" => ''	
	), $atts));
	
	($line == 'true') ? $divider = '<div class="divider-border" style="margin-top:'.$top_space.';margin-bottom:'.$bottom_space.'"></div>' :  $divider = '<div class="divider" style="margin-top:'.$top_space.';margin-bottom:'.$bottom_space.'"></div>';
    return $divider;
}
add_shortcode('divider', 'tdl_divider');



//button
function tdl_button($atts, $content = null) {  
    extract(shortcode_atts(array("size" => 'small', "url" => '#', "text" => 'Button Text'), $atts));
	switch ($size) {
		case 'small' :
			$button_open_tag = '<a class="tdl-button small"';
			break;
		case 'medium' :
			$button_open_tag = '<a class="tdl-button medium"';
			break;
		case 'large' :
			$button_open_tag = '<a class="tdl-button large"';
			break;	
	}
    return $button_open_tag . ' href="' . $url . '">' . $text . '</a>';
}
add_shortcode('button', 'tdl_button');



//icon
function tdl_icon($atts, $content = null) {
	extract(shortcode_atts(array("size" => 'large', "url" => '', "style" => 'style1', 'image' => 'icon-circle'), $atts)); 
	
	if($size == 'large') {
		$size_class = 'icon-3x';
	} 
	else if($size == 'tiny') {
		$size_class = 'icon-tiny';
	}
	else {
		$size_class = ''; 
	}
	
	if(!$url == '') {
		$url_before = '<a href="'.$url.'">';
		$url_after = '</a>';
	} 
	else {
		$url_before = '';
		$url_after = '';
	}
	$border = '';
    return ''.$url_before.'<i class="'. $size_class . ' ' . $image . ' ' . $style . '">' . $border . '</i>'.$url_after.'';
}
add_shortcode('icon', 'tdl_icon');



//tabbed sections
function tdl_tabs($atts, $content = null) {
	extract(shortcode_atts(array("style" => 'top'), $atts)); 
    $GLOBALS['tab_count'] = 0;
	$i = 1;
	$randomid = rand();
	do_shortcode( $content );
	
	if( is_array( $GLOBALS['tabs'] ) ){
		
		foreach( $GLOBALS['tabs'] as $tab ){
			$tabs[] = '<li><a href="#'.$randomid.$i.'">'.$tab['title'].'</a></li>';
			$panes[] = '<div class="panel" id="'.$randomid.$i.'">'.$tab['content'].'</div>';
			$i++;
		}
		
		$return = '<div class="shortcode_tabgroup '.$style.'"><ul class="tabs">'.implode( "\n", $tabs ).'</ul><div class="panels">'.implode( "\n", $panes )."</div><div class='clearfix'></div></div>\n";
	}
	return $return;
}

add_shortcode('tabbed_section', 'tdl_tabs');


function tdl_tab( $atts, $content ){
	extract(shortcode_atts(array( 'title' => '%d', 'id' => '%d'), $atts));
	
	$x = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][$x] = array(
		'title' => sprintf( $title, $GLOBALS['tab_count'] ),
		'content' =>  do_shortcode($content),
		'id' =>  $id );
	
	$GLOBALS['tab_count']++;
}
add_shortcode( 'tab', 'tdl_tab' );


//toggle
function tdl_toggle($atts, $content = null) {
	extract(shortcode_atts(array("title" => 'Title'), $atts));  
    return '<div class="toggle"><h3><a href="#">'. $title .'</a></h3><div>' . do_shortcode($content) . '</div></div>';
}
add_shortcode('toggle', 'tdl_toggle');

#-----------------------------------------------------------------#
# Shop Shortcodes
#-----------------------------------------------------------------# 

//Custom Category Products
function tdl_custom_category_products($atts, $content = null) {
	$sliderrandomid = rand();
	extract(shortcode_atts(array(
		"title" => '',
		"category" => 'all',
		'perpage'  => '',
        'orderby' => 'date',
        'order' => 'desc',
	), $atts));
	ob_start();
	
	//incase only all was selected
	if($category == 'all') {
		$category = null;
	}
	
	if($perpage == '') {
		$perpage = '8';
	}

	?>
    
    <?php 
	/**
	* Check if WooCommerce is active
	**/
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	?>
    
    <script>
	(function($){
		$(window).load(function(){
		/* items_slider */
		$('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider').iosSlider({
			snapToChildren: true,
			desktopClickDrag: true,
			navNextSelector: $('.items_slider_id_<?php echo $sliderrandomid ?> .items_sliders_nav .big_arrow_right'),
			navPrevSelector: $('.items_slider_id_<?php echo $sliderrandomid ?> .items_sliders_nav .big_arrow_left'),
			onSliderLoaded: custom_latest_products_UpdateSliderHeight,
			onSlideChange: custom_latest_products_UpdateSliderHeight,
			onSliderResize: custom_latest_products_UpdateSliderHeight
		});
		
		function custom_latest_products_UpdateSliderHeight(args) {
                                
			currentSlide = args.currentSlideNumber;
			
			/* update height of the first slider */

				setTimeout(function() {
					<?php global $barberry_options; ?>
					<?php if ($barberry_options['tdl_product_animation']) { ?>
					<?php if ($barberry_options['tdl_productanim_type'] == "productanim3") { ?>
					$('li.productanim3').each(function() {
								var productImageHeight = $(this).find('.loop_product > img').height();
								$(this).find('.image_container').css('padding-bottom', productImageHeight  + 'px');
					});
					<?php } ?>
					 <?php } ?>					
					
					var setHeight = $('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider .product_item:eq(' + (args.currentSlideNumber-1) + ')').outerHeight(true);
					$('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider').animate({ height: setHeight+20 }, 300);
				},300);
				
			}
		
		})
	})(jQuery);
	</script>
    
    <div class="woocommerce prod_slider items_slider_id_<?php echo $sliderrandomid ?> four_side">
    
        <div class="items_sliders_header">
            <div class="items_sliders_title">
                <div class="featured_section_title"><span><?php echo $title ?></span></div>
            </div>
            <div class="clearfix"></div>
            <div class="items_sliders_nav">                        
                <a class='big_arrow_right'></a>
                <a class='big_arrow_left'></a>
                <div class='clearfix'></div>
            </div>
        </div>

        <div class="items_slider_wrapper">
            <div class="items_slider">
                <ul class="slider">
                    <?php
            		
                    $args = array(
                      'post_type' => 'product',
						'product_cat'=> $category,
						'post_status' => 'publish',
						'ignore_sticky_posts'   => 1,
						'posts_per_page' => $perpage
                    );
                    
                    $products = new WP_Query( $args );
                    
                    if ( $products->have_posts() ) : ?>
                                
                        <?php while ( $products->have_posts() ) : $products->the_post(); ?>
                    
                            <?php woocommerce_get_template_part( 'content', 'product' ); ?>
                
                        <?php endwhile; // end of the loop. ?>
                        
                    <?php
                    
                    endif; 
                    //wp_reset_query();
                    wp_reset_postdata();
                    ?>
                </ul>     
            </div>
        </div>
    
    </div>
    
    <?php } ?>

	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('custom_category_products', 'tdl_custom_category_products');

//Custom Latest Products
function tdl_custom_latest_products($atts, $content = null) {
	$sliderrandomid = rand();
	extract(shortcode_atts(array(
		"title" => '',
		'perpage'  => '',
        'orderby' => 'date',
        'order' => 'desc',
	), $atts));
	ob_start();
	
	if($perpage == '') {
		$perpage = '8';
	}

	?>
    
    <?php 
	/**
	* Check if WooCommerce is active
	**/
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	?>
    
    <script>
	(function($){
		$(window).load(function(){
		/* items_slider */
		$('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider').iosSlider({
			snapToChildren: true,
			desktopClickDrag: true,
			navNextSelector: $('.items_slider_id_<?php echo $sliderrandomid ?> .items_sliders_nav .big_arrow_right'),
			navPrevSelector: $('.items_slider_id_<?php echo $sliderrandomid ?> .items_sliders_nav .big_arrow_left'),
			onSliderLoaded: custom_latest_products_UpdateSliderHeight,
			onSlideChange: custom_latest_products_UpdateSliderHeight,
			onSliderResize: custom_latest_products_UpdateSliderHeight
		});
		
		function custom_latest_products_UpdateSliderHeight(args) {
                                
			currentSlide = args.currentSlideNumber;
			
			/* update height of the first slider */

				setTimeout(function() {
					<?php global $barberry_options; ?>
					<?php if ($barberry_options['tdl_product_animation']) { ?>
					<?php if ($barberry_options['tdl_productanim_type'] == "productanim3") { ?>
					$('li.productanim3').each(function() {
								var productImageHeight = $(this).find('.loop_product > img').height();
								$(this).find('.image_container').css('padding-bottom', productImageHeight  + 'px');
					});
					<?php } ?>
					 <?php } ?>					
					
					var setHeight = $('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider .product_item:eq(' + (args.currentSlideNumber-1) + ')').outerHeight(true);
					$('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider').animate({ height: setHeight+20 }, 300);
				},300);
				
			}
		
		})
	})(jQuery);
	</script>
    
    <div class="woocommerce prod_slider items_slider_id_<?php echo $sliderrandomid ?> four_side">
    
        <div class="items_sliders_header">
            <div class="items_sliders_title">
                <div class="featured_section_title"><span><?php echo $title ?></span></div>
            </div>
            <div class="clearfix"></div>
            <div class="items_sliders_nav">                        
                <a class='big_arrow_right'></a>
                <a class='big_arrow_left'></a>
                <div class='clearfix'></div>
            </div>
        </div>

        <div class="items_slider_wrapper">
            <div class="items_slider">
                <ul class="slider">
                    <?php
            		
                    $args = array(
                      'post_type' => 'product',
						'post_status' => 'publish',
						'ignore_sticky_posts'   => 1,
						'posts_per_page' => $perpage
                    );
                    
                    $products = new WP_Query( $args );
                    
                    if ( $products->have_posts() ) : ?>
                                
                        <?php while ( $products->have_posts() ) : $products->the_post(); ?>
                    
                            <?php woocommerce_get_template_part( 'content', 'product' ); ?>
                
                        <?php endwhile; // end of the loop. ?>
                        
                    <?php
                    
                    endif; 
                    //wp_reset_query();
                    wp_reset_postdata();
                    ?>
                </ul>     
            </div>
        </div>
    
    </div>
    
    <?php } ?>

	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('custom_latest_products', 'tdl_custom_latest_products');


// [custom_best_sellers]
function tdl_custom_best_sellers($atts, $content = null) {
	$sliderrandomid = rand();
	extract(shortcode_atts(array(
		"title" => '',
		'perpage'  => '',
        'orderby' => 'date',
        'order' => 'desc',
	), $atts));
	ob_start();
	
	if($perpage == '') {
		$perpage = '8';
	}	
	?>
    
    <?php 
	/**
	* Check if WooCommerce is active
	**/
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	?>
    
    <script>
	(function($){
		$(window).load(function(){
		/* items_slider */
		$('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider').iosSlider({
			snapToChildren: true,
			desktopClickDrag: true,
			navNextSelector: $('.items_slider_id_<?php echo $sliderrandomid ?> .items_sliders_nav .big_arrow_right'),
			navPrevSelector: $('.items_slider_id_<?php echo $sliderrandomid ?> .items_sliders_nav .big_arrow_left'),
			onSliderLoaded: custom_best_sellers_UpdateSliderHeight,
			onSlideChange: custom_best_sellers_UpdateSliderHeight,
			onSliderResize: custom_best_sellers_UpdateSliderHeight
		});
		
		function custom_best_sellers_UpdateSliderHeight(args) {
                                
			currentSlide = args.currentSlideNumber;
			
			/* update height of the first slider */

				setTimeout(function() {
					<?php global $barberry_options; ?>
					<?php if ($barberry_options['tdl_product_animation']) { ?>
					<?php if ($barberry_options['tdl_productanim_type'] == "productanim3") { ?>
					$('li.productanim3').each(function() {
								var productImageHeight = $(this).find('.loop_product > img').height();
								$(this).find('.image_container').css('padding-bottom', productImageHeight  + 'px');
					});
					<?php } ?>
					 <?php } ?>					
					var setHeight = $('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider .product_item:eq(' + (args.currentSlideNumber-1) + ')').outerHeight(true);
					$('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider').animate({ height: setHeight+20 }, 300);
				},300);
				
			}
		
		})
	})(jQuery);
	</script>
    
    <div class="woocommerce items_slider_id_<?php echo $sliderrandomid ?> four_side">
    
        <div class="items_sliders_header">
            <div class="items_sliders_title">
                <div class="featured_section_title"><span><?php echo $title ?></span></div>
                <div class="clearfix"></div>
            </div>
            <div class="items_sliders_nav">                        
                <a class='big_arrow_right'></a>
                <a class='big_arrow_left'></a>
                <div class='clearfix'></div>
            </div>
        </div>

        <div class="items_slider_wrapper">
            <div class="items_slider">
                <ul class="slider">
                    <?php
            
                    $args = array(
                        'post_type' => 'product',
						'post_status' => 'publish',
						'ignore_sticky_posts'   => 1,
						'posts_per_page' => $perpage,
						'meta_key' 		=> 'total_sales',
    					'orderby' 		=> 'meta_value'
                    );
                    
                    $products = new WP_Query( $args );
                    
                    if ( $products->have_posts() ) : ?>
                                
                        <?php while ( $products->have_posts() ) : $products->the_post(); ?>
                    
                            <?php woocommerce_get_template_part( 'content', 'product' ); ?>
                
                        <?php endwhile; // end of the loop. ?>
                        
                    <?php
                    
                    endif; 
                    //wp_reset_query();
                    wp_reset_postdata();
                    ?>
                </ul>     
            </div>
        </div>
    
    </div>
    
    <?php } ?>

	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('custom_best_sellers', 'tdl_custom_best_sellers');

// [custom_on_sale_products]
function tdl_custom_on_sale_products($atts, $content = null) {
	global $woocommerce;
	$sliderrandomid = rand();
	extract(shortcode_atts(array(
		"title" => '',
		'perpage'  => '',
        'orderby' => 'date',
        'order' => 'desc',
	), $atts));
	ob_start();
	?>
    
    <?php 
	/**
	* Check if WooCommerce is active
	**/
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	?>
    
    <script>
	(function($){
		$(window).load(function(){
		/* items_slider */
		$('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider').iosSlider({
			snapToChildren: true,
			desktopClickDrag: true,
			navNextSelector: $('.items_slider_id_<?php echo $sliderrandomid ?> .items_sliders_nav .big_arrow_right'),
			navPrevSelector: $('.items_slider_id_<?php echo $sliderrandomid ?> .items_sliders_nav .big_arrow_left'),
			onSliderLoaded: custom_on_sale_products_UpdateSliderHeight,
			onSlideChange: custom_on_sale_products_UpdateSliderHeight,
			onSliderResize: custom_on_sale_products_UpdateSliderHeight
		});
		
		function custom_on_sale_products_UpdateSliderHeight(args) {
                                
			currentSlide = args.currentSlideNumber;
			
			/* update height of the first slider */

				setTimeout(function() {
					<?php global $barberry_options; ?>
					<?php if ($barberry_options['tdl_product_animation']) { ?>
					<?php if ($barberry_options['tdl_productanim_type'] == "productanim3") { ?>
					$('li.productanim3').each(function() {
								var productImageHeight = $(this).find('.loop_product > img').height();
								$(this).find('.image_container').css('padding-bottom', productImageHeight  + 'px');
					});
					<?php } ?>
					 <?php } ?>					
					var setHeight = $('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider .product_item:eq(' + (args.currentSlideNumber-1) + ')').outerHeight(true);
					$('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider').animate({ height: setHeight+20 }, 300);
				},300);
				
			}
		
		})
	})(jQuery);
	</script>
    
    <div class="woocommerce items_slider_id_<?php echo $sliderrandomid ?> four_side">
    
        <div class="items_sliders_header">
            <div class="items_sliders_title">
                <div class="featured_section_title"><span><?php echo $title ?></span></div>
                <div class='clearfix'></div>
            </div>
            <div class="items_sliders_nav">                        
                <a class='big_arrow_right'></a>
                <a class='big_arrow_left'></a>
                <div class='clearfix'></div>
            </div>
        </div>
 
    
        <div class="items_slider_wrapper">
            <div class="items_slider">
                <ul class="slider">
                    <?php
            
                    /*$args = array(
                        'post_type' => 'product',
						'post_status' => 'publish',
						'ignore_sticky_posts'   => 1,
						'posts_per_page' => $per_page,
						'orderby' => $orderby,
						'order' => $order,
						'meta_query' => array(
							array(
								'key' => '_visibility',
								'value' => array('catalog', 'visible'),
								'compare' => 'IN'
							),
							array(
								'key' => '_sale_price',
								'value' =>  0,
								'compare'   => '>',
								'type'      => 'NUMERIC'
							)
						)
                    );*/
					
					// Get products on sale
					$product_ids_on_sale = woocommerce_get_product_ids_on_sale();
					$product_ids_on_sale[] = 0;
					
					$meta_query = $woocommerce->query->get_meta_query();
					
					$args = array(
						'posts_per_page' 	=> $perpage,
						'no_found_rows' => 1,
						'post_status' 	=> 'publish',
						'post_type' 	=> 'product',
						'orderby' 		=> 'date',
						'order' 		=> 'ASC',
						'meta_query' 	=> $meta_query,
						'post__in'		=> $product_ids_on_sale
					);
                    
                    $products = new WP_Query( $args );
                    
                    if ( $products->have_posts() ) : ?>
                                
                        <?php while ( $products->have_posts() ) : $products->the_post(); ?>
                    
                            <?php woocommerce_get_template_part( 'content', 'product' ); ?>
                
                        <?php endwhile; // end of the loop. ?>
                        
                    <?php
                    
                    endif; 
                    //wp_reset_query();
                    wp_reset_postdata();
                    ?>
                </ul>     
            </div>
        </div>
    
    </div>
    
    <?php } ?>

	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('custom_on_sale_products', 'tdl_custom_on_sale_products');

// [custom_featured_products]
function tdl_custom_featured_products($atts, $content = null) {
	$sliderrandomid = rand();
	extract(shortcode_atts(array(
		"title" => '',
		'perpage'  => '',
        'orderby' => 'date',
        'order' => 'desc',
	), $atts));
	ob_start();

	?>

    <?php 
	/**
	* Check if WooCommerce is active
	**/
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	?>  
    
    <script>
	(function($){
	   $(window).load(function(){
		/* items_slider */
		$('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider').iosSlider({
			snapToChildren: true,
			desktopClickDrag: true,
			navNextSelector: $('.items_slider_id_<?php echo $sliderrandomid ?> .items_sliders_nav .big_arrow_right'),
			navPrevSelector: $('.items_slider_id_<?php echo $sliderrandomid ?> .items_sliders_nav .big_arrow_left'),
			onSliderLoaded: custom_featured_products_UpdateSliderHeight,
			onSlideChange: custom_featured_products_UpdateSliderHeight,
			onSliderResize: custom_featured_products_UpdateSliderHeight
		});
		
		function custom_featured_products_UpdateSliderHeight(args) {
                                
			currentSlide = args.currentSlideNumber;
			
			/* update height of the first slider */

		
			setTimeout(function() {
					<?php global $barberry_options; ?>
					<?php if ($barberry_options['tdl_product_animation']) { ?>
					<?php if ($barberry_options['tdl_productanim_type'] == "productanim3") { ?>
					$('li.productanim3').each(function() {
								var productImageHeight = $(this).find('.loop_product > img').height();
								$(this).find('.image_container').css('padding-bottom', productImageHeight  + 'px');
					});
					<?php } ?>
					 <?php } ?>				
				var setHeight = $('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider .product_item:eq(' + (args.currentSlideNumber-1) + ')').outerHeight(true);
				$('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider').animate({ height: setHeight+20 }, 300);
			},300);			
				
			}		
		})
	})(jQuery);
	</script>
    
    <div class="woocommerce items_slider_id_<?php echo $sliderrandomid ?> four_side">
    
        <div class="items_sliders_header">
            <div class="items_sliders_title">
                <div class="featured_section_title"><span><?php echo $title ?></span></div>
                <div class='clearfix'></div>
            </div>
            <div class="items_sliders_nav">                        
                <a class='big_arrow_right'></a>
                <a class='big_arrow_left'></a>
                <div class='clearfix'></div>
            </div>
        </div>
    
        <div class="items_slider_wrapper">
            <div class="items_slider">
                <ul class="slider">
                    <?php
            
                    $args = array(
                        'post_status' => 'publish',
                        'post_type' => 'product',
						'ignore_sticky_posts'   => 1,
                        'meta_key' => '_featured',
                        'meta_value' => 'yes',
                        'posts_per_page' => $perpage,
						'orderby' => $orderby,
						'order' => $order,
                    );
                    
                    $products = new WP_Query( $args );
                    
                    if ( $products->have_posts() ) : ?>
                                
                        <?php while ( $products->have_posts() ) : $products->the_post(); ?>
                    
                            <?php woocommerce_get_template_part( 'content', 'product' ); ?>
                
                        <?php endwhile; // end of the loop. ?>
                        
                    <?php
                    
                    endif; 
                    //wp_reset_query();
                    wp_reset_postdata();
                    ?>
                </ul>     
            </div>
        </div>
    
    </div>
    
    <?php } ?>

	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('custom_featured_products', 'tdl_custom_featured_products');

// [products_slider]
function tdl_custom_big_featured_products($atts, $content=null, $code) {
	$sliderrandomid = rand();
	
	extract(shortcode_atts(array(
		'perpage'  => '',
        'orderby' => 'date',
        'order' => 'desc',
	), $atts));
	
	ob_start();
	?> 
    
    <script>
	(function($){
	   $(window).load(function(){
		   /* items_slider */
			$('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider').iosSlider({
				snapToChildren: true,
				desktopClickDrag: true,
				navNextSelector: $('.items_slider_id_<?php echo $sliderrandomid ?> .products_slider_next'),
				navPrevSelector: $('.items_slider_id_<?php echo $sliderrandomid ?> .products_slider_previous'),
				onSliderLoaded: update_height_products_slider,
				onSlideChange: update_height_products_slider,
				onSliderResize: update_height_products_slider

			});
			
			function update_height_products_slider(args) {
				
				/* update height of the first slider */
	
				//alert (setHeight);
				setTimeout(function() {
					var setHeight = $('.items_slider_id_<?php echo $sliderrandomid ?> .products_slider_item:eq(' + (args.currentSlideNumber-1) + ')').outerHeight(true);
					$('.items_slider_id_<?php echo $sliderrandomid ?> .products_slider').stop().animate({ height: setHeight+20 }, 300);
				},0);
				
			}
			
			$(".prodstyle1 .products_slider_item").mouseenter(function(){
				$(this).find('.products_slider_infos').stop().fadeTo(100, 0);
				$(this).find('.products_slider_images img').stop().fadeTo(100, 0.3, function() {
					$(this).parent().parent().parent().find('.products_slider_infos').stop().fadeTo(200, 1);
				});
				//alert("aaaaaaa");
			}).mouseleave(function(){
				$(this).find('.products_slider_images img').stop().fadeTo(100, 1);
				$(this).find('.products_slider_infos').stop().fadeTo(100, 0);
			});
	   })
	})(jQuery);

	</script>
    
    <div class="items_slider_id_<?php echo $sliderrandomid ?> products_slider">  
    
        <div class="items_slider_wrapper">
            <div class="items_slider products_slider">
                <ul class="slider prodstyle1">
                    
                    <?php            
					$args = array(
						'post_status' => 'publish',
						'post_type' => 'product',
						'ignore_sticky_posts'   => 1,
						'meta_key' => '_featured',
						'meta_value' => 'yes',
						'posts_per_page' => $perpage,
						'orderby' => $orderby,
						'order' => $order,
					);
					
					$products = new WP_Query( $args );
					
					if ( $products->have_posts() ) : ?>
								
						<?php while ( $products->have_posts() ) : $products->the_post(); ?>
                    
                            <?php woocommerce_get_template_part( 'content', 'product-slider' ); ?>
                
                        <?php endwhile; // end of the loop. ?>
						
					<?php
					
					endif; 
					//wp_reset_query();
					wp_reset_postdata();
					?>

                </ul>
                                       
                <div class='products_slider_previous'></div>
                <div class='products_slider_next'></div>
                    
            </div>
        </div>
    
    </div>

	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('custom_big_featured_products', 'tdl_custom_big_featured_products');

#-----------------------------------------------------------------#
# Recent Posts/Work
#-----------------------------------------------------------------# 

function string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

//Recent Posts
function tdl_custom_recent_posts($atts, $content = null) {
	$sliderrandomid = rand();
	extract(shortcode_atts(array(
		"title" => '',
		"posts" => '6',
		"category" => ''
	), $atts));
	ob_start();
	?> 

    <script>
	(function($){
	   $(window).load(function(){
		/* items_slider */
		$('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider').iosSlider({
			snapToChildren: true,
			desktopClickDrag: true,
			navNextSelector: $('.items_slider_id_<?php echo $sliderrandomid ?> .items_sliders_nav .big_arrow_right'),
			navPrevSelector: $('.items_slider_id_<?php echo $sliderrandomid ?> .items_sliders_nav .big_arrow_left'),
			onSliderLoaded: custom_portfolio_UpdateSliderHeight,
			onSlideChange: custom_portfolio_UpdateSliderHeight,
			onSliderResize: custom_portfolio_UpdateSliderHeight
		});
		
		function custom_portfolio_UpdateSliderHeight(args) {
                                
			currentSlide = args.currentSlideNumber;
			
			/* update height of the first slider */

			setTimeout(function() {
			
				var setHeight = $('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider .blogslider_item:eq(' + (args.currentSlideNumber-1) + ')').outerHeight(true);
				$('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider').animate({ height: setHeight+50 }, 300);
			},300);			
				
			}		
		})
	})(jQuery);
	</script>

    
    <div class="items_slider_id_<?php echo $sliderrandomid ?>">
    
        <div class="items_sliders_header">
            <div class="items_sliders_title">
                <div class="featured_section_title"><span><?php echo $title ?></span></div>
                <div class='clearfix'></div>
            </div>
            <div class="items_sliders_nav">                        
                <a class='big_arrow_right'></a>
                <a class='big_arrow_left'></a>
                <div class='clearfix'></div>
            </div>
        </div>
    
        <div class="items_slider_wrapper">
            <div class="items_slider blogitems_slider">
                <ul class="slider">
					<?php
            
                    $args = array(
                        'post_status' => 'publish',
                        'post_type' => 'post',
						'category_name' => $category,
                        'posts_per_page' => $posts
                    );
                    
                    $recentPosts = new WP_Query( $args );
                    
                    if ( $recentPosts->have_posts() ) : ?>
                                
                        <?php while ( $recentPosts->have_posts() ) : $recentPosts->the_post(); ?>
                    
                            <li class="blogslider_item">
                                <?php if ( has_post_thumbnail()) : ?>
                                <a class="blogslider_item_img" href="<?php the_permalink() ?>">                                    
                                    <?php the_post_thumbnail('recent_posts_shortcode') ?>                                    
                                </a>
                                <?php endif; ?>
                                <div class="blogslider_item_content" style=" <?php if ( !has_post_thumbnail()) : ?>width:100%;<?php endif; ?>">
                                
                                    <a class="blogslider_item_title" href="<?php the_permalink() ?>"><h3><?php the_title(); ?></h3></a>	
                                    
                                    <div class="blogslider_item_meta"><?php echo get_comments_number( get_the_ID() ); ?> comments</div>
                                                                
                                    <div class="blogslider_item_excerpt">
                                        <?php
                                            $excerpt = get_the_excerpt();
                                            echo string_limit_words($excerpt,25) . '...';
                                        ?>
                                    </div>
                                
                                </div>
                                
                            </li>
                
                        <?php endwhile; // end of the loop. ?>
                        
                    <?php

                    endif;
					//wp_reset_query();
                    
                    ?>
                </ul>     
            </div>
        </div>
    
    </div>
    
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('recent_posts', 'tdl_custom_recent_posts');



//recent projects
function tdl_recent_projects($atts, $content = null) {
	$sliderrandomid = rand();
	extract(shortcode_atts(array(
		"title" => '',
		"posts" => '8',
		"category" => ''
	), $atts));
	ob_start();
	?> 

    <script>
	(function($){
	   $(window).load(function(){
		/* items_slider */
		$('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider').iosSlider({
			snapToChildren: true,
			desktopClickDrag: true,
			navNextSelector: $('.items_slider_id_<?php echo $sliderrandomid ?> .items_sliders_nav .big_arrow_right'),
			navPrevSelector: $('.items_slider_id_<?php echo $sliderrandomid ?> .items_sliders_nav .big_arrow_left'),
			onSliderLoaded: custom_portfolio_UpdateSliderHeight,
			onSlideChange: custom_portfolio_UpdateSliderHeight,
			onSliderResize: custom_portfolio_UpdateSliderHeight
		});
		
		function custom_portfolio_UpdateSliderHeight(args) {
                                
			currentSlide = args.currentSlideNumber;
			
			/* update height of the first slider */

			setTimeout(function() {
			
				var setHeight = $('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider .portfolio-item:eq(' + (args.currentSlideNumber-1) + ')').outerHeight(true);
				$('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider').animate({ height: setHeight+20 }, 300);
			},300);			
				
			}		
		})
	})(jQuery);
	</script>
    
    
    
    <div class="items_slider_id_<?php echo $sliderrandomid ?>">
    
        <div class="items_sliders_header">
            <div class="items_sliders_title">
                <div class="featured_section_title"><span><?php echo $title ?></span></div>
                <div class='clearfix'></div>
            </div>
            <div class="items_sliders_nav">                        
                <a class='big_arrow_right'></a>
                <a class='big_arrow_left'></a>
                <div class='clearfix'></div>
            </div>
        </div>
    
        <div class="items_slider_wrapper">
            <div class="items_slider portfolioitems_slider">
                <ul class="slider">
					<?php
            
                    $args = array(
                        'post_status' => 'publish',
                        'post_type' => 'portfolio',
						'category_name' => $category,
						'orderby' => 'menu_order',
						'order' => 'ASC',
                        'posts_per_page' => $posts
                    );
                    
                    $recentPosts = new WP_Query( $args );
                    
                    if ( $recentPosts->have_posts() ) : ?>
                                
                        <?php while ( $recentPosts->have_posts() ) : $recentPosts->the_post(); 
						 global $barberry_options;
						 $height = $barberry_options['tdl_recent_thumb'];
						 $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
						 $thumb = tdl_resize( $thumb[0], 500, $height, true, false );
						?>
                    
                            <li class="portfolio-item">

                                <figure>
                                    <a class="link-to-post" href="<?php the_permalink(); ?>">
                                    <img src="<?php echo $thumb[0]; ?>" width="<?php echo $thumb[1]; ?>" height="<?php echo $thumb[2]; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                    </a>
                                </figure>
                                
                                <div class="portfolio-item-details">
                                    <span class="portfolio-item-category">
                                    <?php echo get_the_term_list( get_the_ID(), 'port-group', '', ', ', '' ); ?>
                                    </span>
                                    <h4 class="portfolio-item-title"><a class="link-to-post" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                </div>                                
                            </li>
                
                        <?php endwhile; // end of the loop. ?>
                        
                    <?php

                    endif;
					//wp_reset_query();
                    
                    ?>
                </ul>     
            </div>
        </div>
    
    </div>
    
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('recent_projects', 'tdl_recent_projects');


//brands
function tdl_brands($atts, $content = null) {
	$sliderrandomid = rand();
	extract(shortcode_atts(array(
		"title" => '',
		"posts" => '30',
		"category" => ''
	), $atts));
	ob_start();
	?> 

    <script>
	(function($){
	   $(window).load(function(){
		/* items_slider */
		$('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider').iosSlider({
			snapToChildren: true,
			desktopClickDrag: true,
			navNextSelector: $('.items_slider_id_<?php echo $sliderrandomid ?> .items_sliders_nav .big_arrow_right'),
			navPrevSelector: $('.items_slider_id_<?php echo $sliderrandomid ?> .items_sliders_nav .big_arrow_left'),
			onSliderLoaded: custom_portfolio_UpdateSliderHeight,
			onSlideChange: custom_portfolio_UpdateSliderHeight,
			onSliderResize: custom_portfolio_UpdateSliderHeight
		});
		
		function custom_portfolio_UpdateSliderHeight(args) {
                                
			currentSlide = args.currentSlideNumber;
			
			/* update height of the first slider */

			setTimeout(function() {
			
				var setHeight = $('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider .brand-item:eq(' + (args.currentSlideNumber-1) + ')').outerHeight(true);
				$('.items_slider_id_<?php echo $sliderrandomid ?> .items_slider').animate({ height: setHeight+50 }, 300);
			},300);			
				
			}		
		})
	})(jQuery);
	</script>
    
    
    
    <div class="items_slider_id_<?php echo $sliderrandomid ?>">
    
        <div class="items_sliders_header">
            <div class="items_sliders_title">
                <div class="featured_section_title"><span><?php echo $title ?></span></div>
                <div class='clearfix'></div>
            </div>
            <div class="items_sliders_nav">                        
                <a class='big_arrow_right'></a>
                <a class='big_arrow_left'></a>
                <div class='clearfix'></div>
            </div>
        </div>
    
        <div class="items_slider_wrapper">
            <div class="items_slider branditems_slider">
                <ul class="slider">
                
                
                 <?php
				$arr = array('hide_empty'=>0,'number'=>$posts);			
				$terms = get_terms('brands',$arr);
			
				foreach($terms as $term):
				
					$attach_id = barberry_brands_thumbnail_id($term->term_id);		
					$image = wp_get_attachment_image_src($attach_id,'brands');
				
					//echo gettype($attach_id);
				
					if($attach_id > 0)
						$image = $image[0];
						
					else $image = sprintf("%s/image/featured-43x43.jpg",get_template_directory_uri());
				
				?>	
                	<li class="brand-item">
                    	<a title="<?php echo $term->name?>" href="<?php echo get_term_link($term->slug,'brands')?>">

                        <img class="attachment-shop_thumbnail wp-post-image" src="<?php echo $image?>" width="32" height="32" /></a>
                    </li>
                
                <?php
				endforeach;
				?>               

                </ul>     
            </div>
        </div>
    
    </div>
    
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('brands', 'tdl_brands');



?>