<?php
global $woocommerce;
global $barberry_options;
function barberry_custom_styles() {
?>

<?php global $barberry_options; $main_bg_color = $barberry_options['tdl_main_bg_color']; if( empty($main_bg_color) ) {$main_bg_color = '#fff';}?>

<!-- ******************************************************************** -->
<!-- Custom CSS Styles -->
<!-- ******************************************************************** -->
	
<style>
/*========== Body ==========*/
body {<?php if ( $barberry_options['tdl_main_bg_color'] ) { ?>background-color:<?php echo $main_bg_color; ?>;<?php } ?>}

/*========== Header ==========*/

.dark #menu div.children, .light #menu div.children, .dark #menu>li>ul.children, .light #menu>li>ul.children, #sticky-menu, .tdl_minicart, .header-dropdown, .product_details .category, .product_details .category a, .orderby_bg, #toggle_sidebar, .widget_price_filter .ui-slider .ui-slider-handle, .tagcloud a, .social_widget a, .go-top:hover, .minicart_cart_but:hover, .minicart_checkout_but:hover, .widget.widget_shopping_cart .buttons a:hover, .widget.widget_shopping_cart .buttons .checkout:hover, .widget_price_filter .price_slider_amount .button:hover, .product_navigation_container, .woocommerce #reviews #comments ol.commentlist li img.avatar, .woocommerce-page #reviews #comments ol.commentlist li img.avatar, #reviews a.button:hover, .items_sliders_nav, .edit-link, .edit-address, .quantity .plus,
.quantity .minus, #content .quantity .plus, #content .quantity .minus, .quantity input.qty, #content .quantity input.qty, .coupon .input-text, .coupon .button-coupon:hover, .left_column_cart .update-button:hover, .left_column_cart .checkout-button:hover, .uneditable-input, .single_add_to_cart_button:hover, .form-row .button:hover, .woocommerce table.my_account_orders  .order-actions .button:hover,
.woocommerce-page table.my_account_orders .order-actions .button:hover, .content_title.bold_title span, .toggle h3 a, .col.boxed .ins_box, .pagination ul > li > a, .pagination ul > li > span, .entry-content .moretag:hover, .tdl-button:hover, .commentlist li article img.avatar, .comment-text .reply a:hover, .form-submit input:hover, .modal-body .button:hover, .register_warp .button:hover, #change-password .button:hover, .change_password_form .button:hover, .wpcf7 input[type="submit"]:hover, .light .widget.widget_shopping_cart .buttons a:hover, .light .widget.widget_shopping_cart .buttons .checkout:hover, .light .widget_price_filter .price_slider_amount .button:hover, #menu>li>ul.children ul, .prodstyle1 .products_slider_images, .widget_calendar #calendar_wrap, .variation-select select, .variation-select:after 
{background:<?php echo $main_bg_color; ?> !important;}

.jck_quickview .quantity .plus, .jck_quickview .quantity .minus, .jck_quickview .quantity input.qty {background:#fff !important;}
.jck_quickview .quantity .plus:hover, .jck_quickview .quantity .minus:hover {background:#000 !important;}

#social-icons li a, .search-trigger a:hover:before, #menu div.children h6, #header_topbar .topbar_info, #header_topbar .topbar_info a, .tdl_minicart, #sticky-menu .sticky-search-trigger a:hover:before, .header-switch:hover span.current, .header-switch:hover span.current:before, #header_topbar .topbarmenu ul li a, .tagcloud a:hover, .wig_twitbox .tweetitem:before, .social_widget a:hover, .go-top:before, .barberry_product_sort.customSelectHover, .barberry_product_sort.customSelectHover:after, .price_slider_amount button, .minicart_cart_but, .widget.widget_shopping_cart .buttons a, .widget_shopping_cart .buttons a.checkout, .minicart_checkout_but, product_navigation .product_navigation_container a.next:hover:after, .product_navigation .product_navigation_container a.prev:hover:after, .product_sliders_header .big_arrow_right:hover:after, .items_sliders_header .big_arrow_right:hover:after, .product_sliders_header .big_arrow_left:hover:after, items_sliders_header .big_arrow_left:hover:after, .product_share ul li a:hover:before, #reviews a.button, .product_navigation .product_navigation_container a.next:hover:after, .product_navigation .product_navigation_container a.prev:hover:after, .product_sliders_header .big_arrow_right:hover:after, .items_sliders_header .big_arrow_right:hover:after, .product_sliders_header .big_arrow_left:hover:after, .items_sliders_header .big_arrow_left:hover:after, .edit-link:hover a, .edit-link:hover a:after, .edit-address:hover a, .edit-address:hover a:after, .quantity .minus:hover, #content .quantity .minus:hover, .quantity .plus:hover, #content .quantity .plus:hover, .coupon .button-coupon, .left_column_cart .update-button, .left_column_cart .checkout-button, .single_add_to_cart_button, .form-row .button, .woocommerce table.my_account_orders  .order-actions .button, .woocommerce-page table.my_account_orders .order-actions .button, [class^="icon-"].style3,[class*=" icon-"].style3, [class^="icon-"].style4,[class*=" icon-"].style4, #portfolio-filter li a:hover, #portfolio-filter li.activeFilter a, .entry-content .moretag, .tdl-button, .comment-text .reply a, a.button,     button.button, input.button, #respond input#submit, #content input.button, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .portfolio_details .project_button a, #change-password .button, .change_password_form .button, .wpcf7 input[type="submit"], .tdl_small_shopbag, .tdl_small_shopbag span, .tdl_small_shopbag:hover:before, .minicart_cart_but, .widget.widget_shopping_cart .buttons a, .light .minicart_cart_but, .light .widget.widget_shopping_cart .buttons a, .widget_shopping_cart .buttons a.checkout, .minicart_checkout_but, .light .widget_shopping_cart .buttons a.checkout, .light .minicart_checkout_but, .prodstyle1 .products_slider_images, .prodstyle1 .products_slider_item .f_button, .widget_calendar tbody tr > td a, .form-row .button, .empty_bag_button, .left_column_cart .checkout-button, .shipping-calculator-form .button, .coupon .button-coupon, table.shop_table a.remove, .woocommerce table.shop_table a.remove
{color:<?php echo $main_bg_color; ?> !important;}

.jck_quickview .quantity .plus, .jck_quickview .quantity .minus, .jck_quickview .quantity input.qty {color:#000 !important;}
.jck_quickview .quantity .plus:hover, .jck_quickview .quantity .minus:hover, .jck_quickview .single_add_to_cart_button, .jck_quickview .viewProduct {color:#fff !important;}

ul.cart_list li img, .woocommerce ul.cart_list li img, ul.product_list_widget li img, .woocommerce ul.product_list_widget li img, table.shop_table img,
.woocommerce table.shop_table img, .posts-widget .post_image, .branditems_slider ul li a img
{border-color:<?php echo $main_bg_color; ?> !important;}

.shortcode_tabgroup.top ul.tabs li
{border-color:<?php echo $main_bg_color; ?>;}

.shortcode_tabgroup.top ul.tabs li.active {border-bottom:2px solid #000 !important;}
.light .shortcode_tabgroup.top ul.tabs li.active {border-bottom:2px solid #fff !important;}

/*========== Main font ==========*/

H1,H2,H3,H4,H5,H6, #menu>li>a, #menu ul.children li a, #menu div.children h6, .iosSlider .slider .item .caption, .tdl_small_shopbag span, .mobile_menu_select, .sticky-search-area input, .search-area input, .header_shopbag .overview .amount, .custominfo, .header-switch span.current, .header-dropdown ul li a, #breadcrumbs, .barberry_product_sort, .orderby_bg .perpage_cont p, .perpage_cont ul li, div.onsale, div.newbadge, div.outstock, .product_details .price, .jck_quickview  div.product p.price, .jck_quickview  div.product span.price, .product_button, .bag-items, .cart_list_product_title a, ul.cart_list li.empty, .cart_list_product_price, .minicart_total_checkout, .minicart_total_checkout span, .minicart_cart_but, .minicart_checkout_but, .widget h1.widget-title, .widget ul li a, .widget_layered_nav ul small.count, .widget.widget_shopping_cart ul li .quantity .amount, .widget.widget_shopping_cart .total strong, .widget.widget_shopping_cart .total .amount, .widget.widget_shopping_cart .buttons a, .widget.widget_shopping_cart .buttons .checkout, .widget_price_filter .price_slider_amount .button, .widget input[type=text], .footer_copyright .copytxt p, ul.product_list_widget span.amount, .woocommerce ul.product_list_widget span.amount, ul.product_list_widget span.from, .woocommerce ul.product_list_widget span.from, .woocommerce-show-products, .product-category-description p, .added-text, .nav-back, div.product .summary span.price, div.product .summary p.price, #content div.product .summary span.price, #content div.product .summary p.price, .product_main_infos span.onsale, .single_add_to_cart_button, div.product form.cart .variations .label, #content div.product form.cart .variations .label, .variations_select, div.product .woocommerce_tabs ul.tabs li a, #content div.product .woocommerce_tabs ul.tabs li a, div.product .woocommerce-tabs ul.tabs li a, #content div.product .woocommerce-tabs ul.tabs li a, #reviews #comments ol.commentlist li .comment-text p.meta, #reviews a.button, .woocommerce_message, .woocommerce_error, .woocommerce_info, .woocommerce-message, .woocommerce-error, .woocommerce-info, .form-submit input, .featured_section_title, .woocommerce table.shop_table th, .woocommerce-page table.shop_table th, table.shop_table td.product-subtotal, .woocommerce table.shop_table td.product-subtotal, table.shop_table .product-name a, .woocommerce table.shop_table .product-name a, table.shop_table .product-name .product-price, .cart_totals th, .cart_totals .amount, .left_column_cart .update-button, .left_column_cart .checkout-button, .coupon .button-coupon, .coupon .input-text, .shipping-calculator-form .button, .empty_bag_button, .form-row .button, table.shop_table td.product-name, .woocommerce table.shop_table td.product-name, #order_review table.shop_table tfoot .cart-subtotal th, #order_review table.shop_table tfoot .cart-subtotal td, #order_review table.shop_table .product-total, #order_review table.shop_table tfoot td, .cart_totals .shipping td, .woocommerce .order_details li, .woocommerce-page .order_details li, .modal-body .buttonreg, .register_warp .button, ul.my-account-nav > li a, .woocommerce    table.my_account_orders  .order-actions .button, .woocommerce-page table.my_account_orders .order-actions .button, .woocommerce  table.my_account_orders tbody td.order-number, .woocommerce-page table.my_account_orders tbody td.order-number, .woocommerce table.my_account_orders tbody td.order-amount, .woocommerce-page table.my_account_orders tbody td.order-amount, #change-password .button, .edit-link a, .edit-address a, .order-info, table.shop_table td.product-total, .woocommerce table.shop_table td.product-total, table.totals_table tr th, table.totals_table tr td, .change_password_form .button, .shortcode_tabgroup ul.tabs li a, .toggle h3 a, .prodstyle1 .products_slider_title a, .prodstyle1 .products_slider_item .f_button, .prodstyle1 .products_slider_price, .blog_list .entry_date, .entry-content .moretag, .product_share span, .comment-author, .comment-text .reply a, .widget ul li.recentcomments, .error404page, a.follow-me-posts, #portfolio-filter li a, .portfolio_details .project_button a, .portfolio_meta ul.project_details li, .wpcf7 input[type="submit"], .tdl-button, .wishlist_table td.product-price, .wishlist_table .add_to_cart, .yith-woocompare-widget .compare.button, .branditems_slider ul li a, .mfp-preloader, .jck_quickview .button.viewProduct, .page_archive_date, #mc_signup_submit, .variation-select select, .my-account-right .edit-address-form .button
{
	font-family: '<?php echo $barberry_options['tdl_main_font']; ?>', Arial, Helvetica, sans-serif !important;
}

/*========== Secondary font ==========*/

body, table.shop_table td.product-name .variation, .posts-widget .post_meta a, .yith-woocompare-widget .products-list a.remove, .mc_input {font-family: '<?php echo $barberry_options['tdl_secondary_font']; ?>', Arial, Helvetica, sans-serif !important;}

/*========== Logo ==========*/

.entry-header, .headerline {background:url(<?php echo get_template_directory_uri(); ?>/images/dark/bg1.png) top left;background-size:4px 4px;}
.light .entry-header, .light .headerline {background:url(<?php echo get_template_directory_uri(); ?>/images/light/bg1.png) top left;background-size:4px 4px;}

.dark #header .logo, .fullslider #header.dark .logo {
background:url(
<?php if ( !$barberry_options['tdl_site_logo_dark'] ) { ?>
<?php echo get_template_directory_uri(); ?>/images/dark/logo.png
<?php } else echo $barberry_options['tdl_site_logo_dark']; ?>) no-repeat;background-size:250px 100px;
}				
				
.light #header .logo, .fullslider #header.light .logo {
background:url(
<?php if ( !$barberry_options['tdl_site_logo_light'] ) { ?>
<?php echo get_template_directory_uri(); ?>/images/light/logo.png
<?php } else echo $barberry_options['tdl_site_logo_light']; ?>) no-repeat;background-size:250px 100px;
}

@media only screen and (-webkit-min-device-pixel-ratio: 2), 
only screen and (min-device-pixel-ratio: 2)
{

.entry-header {background:url(<?php echo get_template_directory_uri(); ?>/images/dark/bg1@2x.png) top left;background-size:4px 4px;}

.dark #header .logo, .fullslider #header.dark .logo {
background:url(
<?php if ( !$barberry_options['tdl_site_logo_dark'] ) { ?>
<?php echo get_template_directory_uri(); ?>/images/dark/logo@2x.png
<?php } else echo $barberry_options['tdl_site_logo_dark']; ?>) no-repeat;background-size:250px 100px;
}				
				
.light #header .logo, .fullslider #header.light .logo {
background:url(
<?php if ( !$barberry_options['tdl_site_logo_light'] ) { ?>
<?php echo get_template_directory_uri(); ?>/images/light/logo@2x.png
<?php } else echo $barberry_options['tdl_site_logo_light']; ?>) no-repeat;background-size:250px 100px;
}
}

/*========== Other Styles ==========*/

.fullslider .dark #menu div.children h6  {color:#fff !important; }
.fullslider .light #menu div.children h6  {color:#000 !important;}

.fullslider .search-trigger a:hover:before  {color:#fff !important;}
.fullslider .light .search-trigger a:hover:before  {color:#000 !important;}


.dark #menu li:first-child, .dark #menu .children li, .light #menu li:first-child, .light #menu .children li, 
#header.dark #menu li:first-child, #header.dark #menu .children li, #header.light #menu li:first-child, #header.light #menu .children li, .dark #sticky-menu #menu, .light #sticky-menu #menu {background:none !important;}

.woocommerce-checkout .form-row .chzn-container-single .chzn-single div b, .chzn-container-single .chzn-single div b {
    background: none !important;
}

<?php if (!in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || !in_array( 'yith-woocommerce-compare/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) : ?>
.product_details .product-actions .action {width: 100%; text-align:center;}
.product_details .product-actions .action:first-child {text-align:center;}	
.product_details .product-actions .wishlist a, .product_details .product-actions .compare a {margin:0;}	
<?php endif; ?>

<?php if (get_option('woocommerce_enable_myaccount_registration')=='yes') : ?>
.login-wrap { border-right:1px solid #ccc;}
<?php endif; ?>

@media only screen and (-webkit-min-device-pixel-ratio: 2), 
only screen and (min-device-pixel-ratio: 2)
{

.dark #header menu li:first-child, .dark #header menu .children li, .light #menu li:first-child, .light #menu .children li, 
#header.dark #menu li:first-child, #header.dark #menu .children li, #header.light #menu li:first-child, #header.light #menu .children li{background:none !important;}
}

<?php if ( !function_exists('icl_get_languages') || !has_nav_menu( 'secondary' ) ) { ?> 
.header4 .custominfo, .header_nb.header4 .custominfo, .header_nb.header4 .fullslider .custominfo {right:130px;}
<?php } ?>

<?php if ( !function_exists('icl_get_languages') || !has_nav_menu( 'secondary' ) ) { ?> 
.header2 .custominfo, .header3 .custominfo, .header_nb .header2 .custominfo, .header_nb .header3 .custominfo {top:15px!important;}
.header4 .custominfo, .header_nb.header4 .custominfo, .header_nb.header4 .fullslider .custominfo {right:15px; left:auto}
.header_nb.header4 .custominfo, .header_nb.header4 .fullslider .custominfo {right:0; left:auto}
@media (min-width: 768px) and (max-width: 979px) {
	<?php if ( !$barberry_options['tdl_responsive'] == 'nonresponsive' ) { ?> 
	#navigation, .dynamic_shopbag {top:35px !important;}
	<?php } ?>
}
<?php if ( function_exists('icl_get_languages') or has_nav_menu( 'secondary' ) ) { ?>
.header2 .custominfo, .header_nb.header2 .custominfo, .header_nb.header2 .fullslider .custominfo,
.header4 .custominfo, .header_nb.header4 .custominfo, .header_nb.header4 .fullslider .custominfo {right:130px;}
<?php } ?>
<?php } ?>

<?php if ( $barberry_options['tdl_catalog_mode'] || ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) ) { ?> 
@media (min-width: 768px) and (max-width: 979px) {#navigation {right: 15px;}}
@media (max-width: 767px) {#navigation {position:absolute; bottom:0px; left:50%; margin:0; margin-left:-100px}}
<?php } ?>

<?php if ( !$barberry_options['rev_slider_mobphones']) { ?>
/*========== Remove Revolution on mobile phones ==========*/
@media (max-width: 767px) {.rev_slider_wrapper {display:none !important;}}
<?php } ?>


<?php if ( $barberry_options['tdl_product_animation']) { ?>

/*========== Shop Product Animation ==========*/
<?php if ( $barberry_options['tdl_productanim_type'] == 'productanim1' || $barberry_options['tdl_productanim_type'] == 'productanim5') { ?>
.productanim1.product_item .image_container a, .productanim2.product_item .image_container a, .productanim5.product_item .image_container a {
	float: left;
	-webkit-perspective: 600px;
	-moz-perspective: 600px;
}
	
.productanim1.product_item .image_container, .productanim2.product_item .image_container, .productanim5.product_item .image_container  {
	position:relative;
	width:auto;
	height: auto;
}

.productanim1 .loop_products, .productanim2 .loop_products, .productanim5 .loop_products {
	position:absolute;
	top:0;
	left:0;
	z-index:-1;
}

.productanim1.product_item img, .productanim2.product_item img, .productanim5.product_item img {
	width:100%;
	height:auto;
}


.productanim1 .image_container a .front, .productanim2 .image_container a .front {
	-o-transition: all .4s ease-in-out;
	-ms-transition: all .4s ease-in-out;
	-moz-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
}

.productanim1 .image_container a .front {
	-webkit-transform: rotateX(0deg) rotateY(0deg);
	-webkit-transform-style: preserve-3d;
	-webkit-backface-visibility: hidden;

	-moz-transform: rotateX(0deg) rotateY(0deg);
	-moz-transform-style: preserve-3d;
	-moz-backface-visibility: hidden;
}

.productanim2 .image_container a .front {
	-webkit-transform: rotateX(0deg) rotateY(0deg);
	-webkit-transform-style: preserve-3d;
	-webkit-backface-visibility: hidden;

	-moz-transform: rotateX(0deg) rotateY(0deg);
	-moz-transform-style: preserve-3d;
	-moz-backface-visibility: hidden;
}

.productanim5 .image_container a .front {
  -webkit-opacity: 1;
  -moz-opacity: 1;
  opacity: 1;
  -webkit-transition: all .35s ease;
  -moz-transition: all .35s ease;
  -ms-transition: all .35s ease;
  -o-transition: all .35s ease;
  transition: all .35s ease;
}

.productanim1 .image_container a:hover .front {
	-webkit-transform: rotateY(180deg);
	-moz-transform: rotateY(180deg);
}

.productanim2 .image_container a:hover .front {
	-webkit-transform: rotateX(-180deg);
	-moz-transform: rotateX(-180deg);
}

.productanim5 .image_container a:hover .front {
  -webkit-opacity: 0;
  -moz-opacity: 0;
  opacity: 0;
  -webkit-transition: all .35s ease;
  -moz-transition: all .35s ease;
  -ms-transition: all .35s ease;
  -o-transition: all .35s ease;
  transition: all .35s ease;
}

.productanim1 .image_container a .back, .productanim2 .image_container a .back {
	-o-transition: all .4s ease-in-out;
	-ms-transition: all .4s ease-in-out;
	-moz-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
	/*z-index:10;
	position:absolute;*/
}

.productanim1 .image_container a .back {
	-webkit-transform: rotateY(-180deg);
	-webkit-transform-style: preserve-3d;
	-webkit-backface-visibility: hidden;

	-moz-transform: rotateY(-180deg);
	-moz-transform-style: preserve-3d;
	-moz-backface-visibility: hidden;
}

.productanim2 .image_container a .back {
	-webkit-transform: rotateX(180deg);
	-webkit-transform-style: preserve-3d;
	-webkit-backface-visibility: hidden;

	-moz-transform: rotateX(180deg);
	-moz-transform-style: preserve-3d;
	-moz-backface-visibility: hidden;
}

.productanim5 .image_container a .back {
  -webkit-opacity: 0;
  -moz-opacity: 0;
  opacity: 0;
  -webkit-transition: all .35s ease;
  -moz-transition: all .35s ease;
  -ms-transition: all .35s ease;
  -o-transition: all .35s ease;
  transition: all .35s ease;
}


.productanim1 .image_container a:hover .back, .productanim2 .image_container a:hover .back  {
	z-index:10;
	position:absolute;
	-webkit-transform: rotateX(0deg) rotateY(0deg);
	-moz-transform: rotateX(0deg) rotateY(0deg);
}

.productanim5 .image_container a:hover .back  {
	z-index:10;
  -webkit-opacity: 1;
  -moz-opacity: 1;
  opacity: 1;
  -webkit-transition: all .35s ease;
  -moz-transition: all .35s ease;
  -ms-transition: all .35s ease;
  -o-transition: all .35s ease;
  transition: all .35s ease;

}
<?php } ?>

<?php if ( $barberry_options['tdl_productanim_type'] == 'productanim3') { ?>

.productanim3.product_item  {
	list-style:none;
}

.productanim3 .image_container {
	position:relative;
	width:100%;
	overflow:hidden;
}


.productanim3 .image_container a.prodimglink {
	display: block;
	float: left;
	position: absolute;
	-webkit-transform: translate3d(0,0,0);
	-moz-transform: translate3d(0,0,0);
	-ms-transform: translate3d(0,0,0);
	-o-transform: translate3d(0,0,0);
	transform: translate3d(0,0,0);
	-webkit-transition: -webkit-transform 1s cubic-bezier(0.190,1.000,0.220,1.000);
	-webkit-transition-delay: .0s;
	-moz-transition: -moz-transform 1s cubic-bezier(0.190,1.000,0.220,1.000) 0s;
	-o-transition: -o-transform 1s cubic-bezier(0.190,1.000,0.220,1.000) 0s;
	transition: transform 1s cubic-bezier(0.190,1.000,0.220,1.000) 0s;
}


.productanim3 .image_container a.prodimglink {
	width: 100%;
	height: 200%;
	display: block;
	margin-bottom: 0;
}

.productanim3 .image_container a.prodimglink:hover {
	-webkit-transform: translate3d(0,-50%,0);
	-moz-transform: translate3d(0,-50%,0);
	-ms-transform: translate3d(0,-50%,0);
	-o-transform: translate3d(0,-50%,0);
	transform: translate3d(0,-50%,0);
	-webkit-transition: -webkit-transform 1s cubic-bezier(0.190,1.000,0.220,1.000);
	-webkit-transition-delay: 0s;
	-moz-transition: -moz-transform 1s cubic-bezier(0.190,1.000,0.220,1.000) 0s;
	-o-transition: -o-transform 1s cubic-bezier(0.190,1.000,0.220,1.000) 0s;
	transition: transform 1s cubic-bezier(0.190,1.000,0.220,1.000) 0s;
}


.productanim3 .image_container .front img, .productanim3 .image_container .back img {
	filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
	opacity: 1;
	padding-bottom:0;
	-webkit-transition: opacity 1.5s cubic-bezier(0.190,1.000,0.220,1.000);
	-webkit-transition-delay: 0ms;
	-moz-transition: opacity 1.5s cubic-bezier(0.190,1.000,0.220,1.000) 0ms;
	-o-transition: opacity 1.5s cubic-bezier(0.190,1.000,0.220,1.000) 0ms;
	transition: opacity 1.5s cubic-bezier(0.190,1.000,0.220,1.000) 0ms;
}
<?php } ?>


<?php } ?>


/*========== Custom CSS ==========*/

<?php echo $barberry_options['tdl_custom_css']; ?>

</style>

<?php 
}
add_action( 'wp_head', 'barberry_custom_styles', 100 );
?>