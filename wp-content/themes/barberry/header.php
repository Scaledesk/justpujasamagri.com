<?php
global $woo_options;
global $woocommerce;
global $barberry_options;

$colorscheme = $barberry_options['tdl_color_scheme'];
$headertype = $barberry_options['tdl_header_type'];
$headerborder = $barberry_options['tdl_header_border'];
if($headerborder == 0) $headerborder = 'header_nb'; else $headerborder = '';
if (isset($_GET["headertype"])) { $headertype = $_GET["headertype"]; }
if (isset($_GET["headerborder"])) { $headerborder = $_GET["headerborder"]; }
$responsive = $barberry_options['tdl_responsive'];

$font_latin_ext = $barberry_options['tdl_font_latin_ext'];
$font_cyrillic = $barberry_options['tdl_font_cyrillic'];
$font_cyrillic_ext = $barberry_options['tdl_font_cyrillic_ext'];
$font_vietnamese = $barberry_options['tdl_font_vietnamese'];
$font_greek = $barberry_options['tdl_font_greek'];
$font_greek_ext = $barberry_options['tdl_font_greek_ext'];
$font_khmer = $barberry_options['tdl_font_khmer'];

if($font_latin_ext == 0) $font_latin_ext = ''; else $font_latin_ext  = ',latin-ext';
if($font_cyrillic == 0) $font_cyrillic = ''; else $font_cyrillic  = ',cyrillic';
if($font_cyrillic_ext == 0) $font_cyrillic_ext = ''; else $font_cyrillic_ext  = ',cyrillic-ext';
if($font_greek == 0) $font_greek = ''; else $font_greek  = ',greek';
if($font_greek_ext == 0) $font_greek_ext = ''; else $font_greek_ext  = ',greek-ext';
if($font_khmer == 0) $font_khmer = ''; else $font_khmer  = ',khmer';
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->

<!-- An Artem Shashkin design (http://www.temashdesign.com) - Proudly powered by WordPress (http://wordpress.org) -->

<head>

<!-- Basic Page Needs
================================================== -->
<meta name="google-site-verification" content="jsSRER7LhaW2ErC1ps6ZIo4mpMBmlk5JDs3bdP3hciw" />
<meta charset="<?php bloginfo('charset'); ?>"/>
<?php if( $responsive == 'responsive' || $responsive == 'responsive940'): ?>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no" />
<?php endif;?>


<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- Embed Google Web Fonts Via API -->
    <script type="text/javascript">
      WebFontConfig = {
        google: { families: [ '<?php if ( $main_font = $barberry_options['tdl_main_font']) { echo $main_font.':300,300italic,400,400italic,700,700italic,900,900italic:latin',$font_latin_ext,$font_cyrillic,$font_cyrillic_ext,$font_greek,$font_greek_ext,$font_khmer;} else { echo 'Oswald:300,300italic,400,400italic,700,700italic,900,900italic:latin',$font_latin_ext,$font_cyrillic,$font_cyrillic_ext,$font_greek,$font_greek_ext,$font_khmer; $main_font = 'Oswald:300,300italic,400,400italic,700,700italic,900,900italic:latin';} ?>', '<?php if ( $secondary_font = $barberry_options['tdl_secondary_font'] ) { echo $secondary_font.':300,300italic,400,400italic,700,700italic,900,900italic:latin',$font_latin_ext,$font_cyrillic,$font_cyrillic_ext,$font_greek,$font_greek_ext,$font_khmer; } else { echo 'PT Sans:300,300italic,400,400italic,700,700italic,900,900italic:latin',$font_latin_ext,$font_cyrillic,$font_cyrillic_ext,$font_greek,$font_greek_ext,$font_khmer; $secondary_font = 'PT Sans:300,300italic,400,400italic,700,700italic,900,900italic:latin';} ?>'] }
      };
      (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
      })();
    </script>
	<!-- Embed Google Web Fonts Via API -->
    
<!-- WordPress wp_head()
================================================== -->
<?php wp_head(); ?> 

</head>

<body <?php body_class(); ?>>

<div class="wrapper_header <?php echo $colorscheme ?> <?php echo $headerborder ?> <?php echo $headertype ?>">
<div id="page_wrapper" class="<?php if ( is_page_template('template-home-fullslider.php')) { ?>fullslider<?php } ?> <?php if (is_page_template('template-home-fullslider.php')) { ?><?php if ( $barberry_options['tdl_hide_topbar'] ) { ?>fullslider_tb<?php } ?><?php } ?>">

<?php if ($barberry_options['tdl_hide_topbar']) { ?>
<div id="header_topbar">
    <div class="container">
    	<div class="row-fluid">
            <div class="span8 info">
            <?php if ( has_nav_menu( 'topbar' ) ) : ?>
                 <?php wp_nav_menu(array(
                       'theme_location' => 'topbar',
                       'container' => 'div',
					   'container_class' => 'topbarmenu',
                       'menu_class' => '',
                       'echo' => true,
                       'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                       'before' => '',
                       'after' => '',
                       'link_before' => '',
                       'link_after' => '',
                       'depth' => 0,
                       'fallback_cb' => false,
                       ));
                 ?>
            <?php endif; ?>
            </div>
            <div class="span4 social">
				<ul id="social-icons">
<?php
$facebook = $barberry_options['tdl_facebook_url'];
$twitter = $barberry_options['tdl_twitter_url'];	
$googleplus = $barberry_options['tdl_googleplus_url'];	
$pinterest = $barberry_options['tdl_pinterest_url'];	
$vimeo = $barberry_options['tdl_vimeo_url'];	
$youtube = $barberry_options['tdl_youtube_url'];	
$flickr = $barberry_options['tdl_flickr_url'];	
$kippt = $barberry_options['tdl_kippt_url'];	
$skype = $barberry_options['tdl_skype_url'];
$behance = $barberry_options['tdl_behance_url'];
$dribbble = $barberry_options['tdl_dribbble_url'];
$tumblr = $barberry_options['tdl_tumblr_url'];
$linkedin = $barberry_options['tdl_linkedin_url'];
$github = $barberry_options['tdl_github_url'];
$vine = $barberry_options['tdl_vine_url'];
$instagram = $barberry_options['tdl_instagram_url'];
$rdio = $barberry_options['tdl_rdio_url'];
$dropbox = $barberry_options['tdl_dropbox_url'];
$rss = $barberry_options['tdl_rss_url'];
$cargo = $barberry_options['tdl_cargo_url'];
$stumbleupon = $barberry_options['tdl_stumbleupon_url'];
$paypal = $barberry_options['tdl_paypal_url'];
$zootool = $barberry_options['tdl_zootool_url'];
$etsy = $barberry_options['tdl_etsy_url'];
$foursquare = $barberry_options['tdl_foursquare_url'];
$soundcloud = $barberry_options['tdl_soundcloud_url'];	
$spotify = $barberry_options['tdl_spotify_url'];			 
?>                
                
<?php if($facebook) { ?><li class="facebook"><a target="_blank" href="<?php echo $facebook; ?>" title="Facebook"></a></li><?php } ?>
<?php if($twitter) { ?><li class="twitter"><a target="_blank" href="<?php echo $twitter; ?>" title="Twitter"></a></li><?php } ?>
<?php if($googleplus) { ?><li class="googleplus"><a target="_blank" href="<?php echo $googleplus; ?>" title="Googleplus"></a></li><?php } ?>
<?php if($pinterest) { ?><li class="pinterest"><a target="_blank" href="<?php echo $pinterest; ?>" title="Pinterest"></a></li><?php } ?>
<?php if($vimeo) { ?><li class="vimeo"><a target="_blank" href="<?php echo $vimeo; ?>" title="Vimeo"></a></li><?php } ?>
<?php if($youtube) { ?><li class="youtube"><a target="_blank" href="<?php echo $youtube; ?>" title="YouTube"></a></li><?php } ?>
<?php if($flickr) { ?><li class="flickr"><a target="_blank" href="<?php echo $flickr; ?>" title="Flickr"></a></li><?php } ?>
<?php if($kippt) { ?><li class="kippt"><a target="_blank" href="<?php echo $kippt; ?>" title="Kippt"></a></li><?php } ?>
<?php if($skype) { ?><li class="skype"><a target="_blank" href="<?php echo $skype; ?>" title="Skype"></a></li><?php } ?>
<?php if($behance) { ?><li class="behance"><a target="_blank" href="<?php echo $behance; ?>" title="Behance"></a></li><?php } ?>
<?php if($dribbble) { ?><li class="dribbble"><a target="_blank" href="<?php echo $dribbble; ?>" title="Dribbble"></a></li><?php } ?>
<?php if($tumblr) { ?><li class="tumblr"><a target="_blank" href="<?php echo $tumblr; ?>" title="Tumblr"></a></li><?php } ?>
<?php if($linkedin) { ?><li class="linkedin"><a target="_blank" href="<?php echo $linkedin; ?>" title="Linkedin"></a></li><?php } ?>
<?php if($github) { ?><li class="github"><a target="_blank" href="<?php echo $github; ?>" title="Github"></a></li><?php } ?>
<?php if($vine) { ?><li class="vine"><a target="_blank" href="<?php echo $vine; ?>" title="Vine"></a></li><?php } ?>
<?php if($instagram) { ?><li class="instagram"><a target="_blank" href="<?php echo $instagram; ?>" title="Instagram"></a></li><?php } ?>
<?php if($rdio) { ?><li class="rdio"><a target="_blank" href="<?php echo $rdio; ?>" title="Rdio"></a></li><?php } ?>
<?php if($dropbox) { ?><li class="dropbox"><a target="_blank" href="<?php echo $dropbox; ?>" title="Dropbox"></a></li><?php } ?>
<?php if($rss) { ?><li class="rss"><a target="_blank" href="<?php echo $rss; ?>" title="RSS"></a></li><?php } ?>
<?php if($cargo) { ?><li class="cargo"><a target="_blank" href="<?php echo $cargo; ?>" title="Cargo"></a></li><?php } ?>
<?php if($stumbleupon) { ?><li class="stumbleupon"><a target="_blank" href="<?php echo $stumbleupon; ?>" title="Stumbleupon"></a></li><?php } ?>
<?php if($paypal) { ?><li class="paypal"><a target="_blank" href="<?php echo $paypal; ?>" title="Paypal"></a></li><?php } ?>
<?php if($zootool) { ?><li class="zootool"><a target="_blank" href="<?php echo $zootool; ?>" title="Zootool"></a></li><?php } ?>
<?php if($etsy) { ?><li class="etsy"><a target="_blank" href="<?php echo $etsy; ?>" title="Etsy"></a></li><?php } ?>
<?php if($foursquare) { ?><li class="foursquare"><a target="_blank" href="<?php echo $foursquare; ?>" title="Foursquare"></a></li><?php } ?>
<?php if($soundcloud) { ?><li class="soundcloud"><a target="_blank" href="<?php echo $soundcloud; ?>" title="Soundcloud"></a></li><?php } ?>
<?php if($spotify) { ?><li class="spotify"><a target="_blank" href="<?php echo $spotify; ?>" title="Spotify"></a></li><?php } ?>

        		</ul>            
            
            </div>
        </div>
    </div>
</div>
<?php } ?>



<?php if ( is_page_template('template-home-fullslider.php') ) { ?>
     <?php get_template_part( 'includes/slider','loop' ); ?>
<?php } else { ?>
	<?php get_template_part( 'includes/header','loop' ); ?>
<?php } ?>
