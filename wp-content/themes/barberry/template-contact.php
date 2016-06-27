<?php 
	/*
		Template Name: Contact
	*/
?>

<?php get_header(); ?>
<?php if (is_front_page()) : ?>
<hr class="paddingbottom25" />
<?php endif ?>
<?php if (!is_front_page()) : ?>
<div class="container contact-page">
    <div class="row">
        <div class="span12">
                <header class="entry-header">
                    <h1 class="entry-title title-page"><?php the_title(); ?></h1>
                    <h2 class="sub-title-page"><?php echo get_post_meta(get_the_ID(), 'tdl_page_caption', TRUE); ?></h2>
                                
                    <?php 
                    // BREADCRUMBS
                     echo tdl_breadcrumbs();
                    ?>
                    <div class="clearfix"></div>       
                </header><!-- .entry-header -->
        </div>
    </div>
</div>
<?php endif ?> 

		<?php if(in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?> 
            <!-- woocommerce message -->
        <div class="container">
            <div class="row">
                <div class="span12">    
            <?php  woocommerce_show_messages(); ?>
                </div>
            </div>
        </div> 
        <?php } ?>

<?php if(get_post_meta(get_the_ID(), 'tdl_page_contact_map', true) == 1) { ?>

<?php if(get_post_meta(get_the_ID(), 'tdl_page_fullwidth_map', true) == 0) { ?>
<div class="container">
    <div class="row">
        <div class="span12">
<?php } ?>

<?php if (have_posts()) : while (have_posts()) : the_post();
                
                $map = array();
                
                $map['view'] = get_post_meta(get_the_ID(), 'tdl_page_contact_map', true);
                $map['height'] = get_post_meta(get_the_ID(), 'tdl_page_contact_mheight', true);
                $map['lat'] = get_post_meta(get_the_ID(), 'tdl_page_contact_latitude', true);
                $map['lon'] = get_post_meta(get_the_ID(), 'tdl_page_contact_longitude', true);
                $map['add'] = get_post_meta(get_the_ID(), 'tdl_page_contact_address', true);
                $map['html'] = get_post_meta(get_the_ID(), 'tdl_page_contact_html', true);
                $map['zoom'] = get_post_meta(get_the_ID(), 'tdl_page_contact_zoom', true);
                $map['type'] = get_post_meta(get_the_ID(), 'tdl_page_contact_maptype', true);
                $map['scroll'] = get_post_meta(get_the_ID(), 'tdl_page_contact_scrollwheel', true);
                $map['panc'] = get_post_meta(get_the_ID(), 'tdl_page_contact_pancontrol', true);
                $map['zoomc'] = get_post_meta(get_the_ID(), 'tdl_page_contact_zoomcontrol', true);
                $map['mtypec'] = get_post_meta(get_the_ID(), 'tdl_page_contact_maptypecontrol', true);
                $map['scalec'] = get_post_meta(get_the_ID(), 'tdl_page_contact_scalecontrol', true);
                $map['svc'] = get_post_meta(get_the_ID(), 'tdl_page_contact_streetviewcontrol', true);
                $map['ovc'] = get_post_meta(get_the_ID(), 'tdl_page_contact_overviewmapcontrol', true);
                
                if( $map['view'] == 1 ) {
                
                ?>
     <style>           
     <?php if(get_post_meta(get_the_ID(), 'tdl_page_toppadding_map', true) == 1) { ?>
     .contact_map { margin-top:30px;}	 
     <?php } ?>
     <?php if(get_post_meta(get_the_ID(), 'tdl_page_shadows_map', true) == 0) { ?>
     #map_overlay_top, #map_overlay_bottom { display:none}	 
     <?php } ?>	 
     </style>
                
     <div class="contact_map">
		<div id="gmap" class="notopmargin" style="height: <?php echo is_numeric( $map['height'] ) ? ceil( $map['height'] ) . 'px' : '400px' ?>;"></div>
        <div id="map_overlay_top"></div>
        <div id="map_overlay_bottom"></div>
     </div>
            
                <script type="text/javascript">
                    
                    jQuery('#gmap').gMap({
                        <?php if( $map['add'] == '' ): ?>
                         latitude: <?php echo $map['lat']; ?>,
                         longitude: <?php echo $map['lon']; ?>,
                        <?php elseif( $map['add'] != '' ): ?>
                         address: '<?php echo $map['add']; ?>',
                        <?php endif; ?>
                         maptype: '<?php echo $map['type']; ?>',
                         zoom: <?php echo $map['zoom']; ?>,
                         scrollwheel: <?php echo ( $map['scroll'] == 1 ) ? 'true' : 'false'; ?>,
                         markers:[
                    		{
          		                <?php if( $map['add'] == '' ): ?>
                                 latitude: <?php echo $map['lat']; ?>,
                                 longitude: <?php echo $map['lon']; ?>,
                                <?php elseif( $map['add'] != '' ): ?>
                                 address: '<?php echo $map['add']; ?>',
                                <?php endif; ?>
                                 html: '<?php echo $map['html']; ?>'
                    		}
                         ],
                         controls: {
                             panControl: <?php echo ( $map['panc'] == 1 ) ? 'true' : 'false'; ?>,
                             zoomControl: <?php echo ( $map['zoomc'] == 1 ) ? 'true' : 'false'; ?>,
                             mapTypeControl: <?php echo ( $map['mtypec'] == 1 ) ? 'true' : 'false'; ?>,
                             scaleControl: <?php echo ( $map['scalec'] == 1 ) ? 'true' : 'false'; ?>,
                             streetViewControl: <?php echo ( $map['svc'] == 1 ) ? 'true' : 'false'; ?>,
                             overviewMapControl: <?php echo ( $map['ovc'] == 1 ) ? 'true' : 'false'; ?>
                         }
                    });
                    
                </script>

                
                <?php } endwhile; endif; ?>
<?php if(get_post_meta(get_the_ID(), 'tdl_page_fullwidth_map', true) == 0) { ?>
		</div>
	</div>
</div>
<?php } ?>                
                
<?php } ?>
<hr class="paddingbottom25" />
<div class="container">
    <div class="row">
        <div id="primary" class="span12 fullwidth">

		<?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                    <?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
                        <div class="entry-thumbnail">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php } ?>
                    
                    <div class="entry-content">
                        <div class="content_wrapper four_side shopproductlist">
                            <?php the_content(); ?>
                            <div class="clearfix"></div>
                            <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'tdl_framework' ), 'after' => '</div>' ) ); ?>
                            <?php edit_post_link( __( 'Edit', 'tdl_framework' ), '<span class="edit-link">', '</span>' ); ?>
                        </div>
                    </div><!-- .entry-content -->
                    
                </article><!-- #post-<?php the_ID(); ?> -->
                
              
                <div class="clearfix"></div>

        <?php endwhile; // end of the loop. ?>
        
		</div>
      

	</div>
</div>
<?php get_footer(); ?>