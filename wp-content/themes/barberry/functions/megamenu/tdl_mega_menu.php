<?php
/*Mega-Menu-Start*/
class TDL_Menu_Frontend extends Walker_Nav_Menu  {
    /**
        * @see Walker::$tree_type
        * @since 3.0.0
        * @var string
        */
    var $tree_type = array( 'post_type', 'taxonomy', 'custom' );
    var $isMegaMenu = false;
    var $rowcount = 0;
    var $rowlimit = 5;
    var $menutype = "none";
    var $widgetflag = true;
    var $widget_id = "";
    var $isTextBox = false;
    /**

        * @see Walker::$db_fields
        * @since 3.0.0
        * @todo Decouple this.
        * @var array
        */
    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

    /**
        * @see Walker::start_lvl()
        * @since 3.0.0
        *
        * @param string $output Passed by reference. Used to append additional content.
        * @param int $depth Depth of page. Used for padding.
        */
    function start_lvl(&$output, $depth = 0, $args = array()) {
    global $wp_query;
        $indent = str_repeat("\t", $depth);
        $element = 'ul'; $widget_class = '';
        $this->rowcount = 0;
        if($depth==0&&$this->isMegaMenu)
        {
                $element = 'div';
            if($this->menutype=="widget")
                $widget_class = 'widget_menu';
        }
        
        
        if($depth==1  && $this->menutype=="widget")
            $output .= "$indent \n";
        else {
            $output .= "\n$indent<{$element} class=\"children  clearfix  $widget_class \">\n"; }
    }

    /**
        * @see Walker::end_lvl()
        * @since 3.0.0
        *
        * @param string $output Passed by reference. Used to append additional content.
        * @param int $depth Depth of page. Used for padding.
        */
    function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);

        $element = 'ul';
        if($depth==0&&$this->isMegaMenu)
            $element = 'div';

        if($depth==1  && $this->menutype=="widget")
            $output .= "$indent \n";
        else
            $output .= "$indent</{$element}>\n";

        $this->isTextBox = false;
    }

    /**
        * @see Walker::start_el()
        * @since 3.0.0
        *
        * @param string $output Passed by reference. Used to append additional content.
        * @param object $item Menu item data object.
        * @param int $depth Depth of menu item. Used for padding.
        * @param int $current_page Menu item ID.
        * @param object $args
        */
    function start_el(&$output, $object, $depth = 0, $args = array(), $id = 0) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        // Hades Mega menu custom values

        $value = get_post_meta( $object->ID, 'menu-item-megamenu-'.$object->ID,true);
        $value = ($value=="on") ? true  : false ;

        $type = get_post_meta( $object->ID, 'menu-item-megamenu-layout-'.$object->ID,true);

        $enable_textbox = get_post_meta( $object->ID, 'menu-item-enable-textbox-'.$object->ID,true);
        $textbox = get_post_meta( $object->ID, 'menu-item-textbox-'.$object->ID,true);

        $newrow = get_post_meta( $object->ID, 'menu-item-newrow-'.$object->ID,true);
        $newrow = ($newrow=="on") ? true  : false;
		
        $fullwidth = get_post_meta( $object->ID, 'menu-item-fullwidth-'.$object->ID,true);
        $fullwidth = ($fullwidth=="on") ? true  : false;		

        if($depth==0)
        {
            $this->isMegaMenu = $value;

            if($this->isMegaMenu) {
                if($type=="column")
                    $this->menutype = "column";
                else
                {
                    $this->menutype = "widget";
                    $this->widget_id = 'menu-item-megamenu-'.$object->ID.'-widget';
                }
            }

        }// End of Hades menu custom values

        if($depth==1 && $enable_textbox=="on")
        {
            $this->isTextBox = true;
        }
        else
            $this->isTextBox = false;

        $classes = empty( $object->classes ) ? array() : (array) $object->classes;
        $classes[] = 'menu-item-' . $object->ID;
        $ex_class = '';
        if( ($this->rowcount>=$this->rowlimit&&$depth==1) || $newrow )
        {
            $this->rowcount = 0;
            $ex_class = 'clearleft';
        }
        if( ($this->rowcount>=$this->rowlimit&&$depth==1) || $fullwidth )
        {
            $this->rowcount = 0;
            $ex_class = 'fullwidth';
        }		
        $test_variable = '';
        if(!$this->isMegaMenu)
            $test_variable = 'rel';
        
        
        $megaItem=($this->isMegaMenu)? "mega-item":"";

        
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object, $args ) );
        $menu_columns=get_post_meta( $object->ID, 'mega-menu-columns-'.$object->ID,true);
        if($menu_columns && $this->isMegaMenu){
            $menu_column_class = " mega_width ";

            if($menu_columns == "2 Columns"){
            $menu_column_class .= "mega-two";
            }elseif($menu_columns == "3 Columns"){
            $menu_column_class .= "mega-three";
            }else{
            $menu_column_class .= "mega-four";
            }
            $class_names.=$menu_column_class." ";
        }
        $class_names = ' class="' . esc_attr( $class_names )." $ex_class $megaItem $test_variable ". '   "';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $object->ID, $object, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';


        if(!$this->isMegaMenu) {	 
            $output .= $indent . '<li' . $id  . $class_names .'>';

            $attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
            $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
            $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
            $attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $object->title, $object->ID ) . $args->link_after;
            $item_output .= '</a> ';
            $item_output .= $args->after;

        }elseif($this->menutype=="column"){
            
                
                
            if($depth==1){
                $output .= $indent . '<div' . $id  . $class_names .'>';
                $this->rowcount++;
            }else  
                $output .= $indent . '<li' . $id .  $class_names .'>';
            
            $attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
            $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
            $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
            $attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';

            $item_output = $args->before;
            if($depth==1)
                $item_output .= '<h6>';
            else
                $item_output .= '<a'. $attributes .'>';


            $item_output .= $args->link_before . apply_filters( 'the_title', $object->title, $object->ID ) . $args->link_after;

            if($depth==1)
                $item_output .= '</h6>';
            else
                $item_output .= '</a>';

            $item_output .= $args->after;


            if($depth==1 && $this->isTextBox )
            {
                $item_output .= "<div class='megamenu-textbox'> ".do_shortcode( $textbox)." </div>";
            }
        }elseif($this->menutype=="widget"){
            if($depth==1)
            {
                $output .= $indent . '<div' . $id  . $class_names .'>';
                $this->rowcount++;
            }elseif($depth==2 ){
                
            }else  
                $output .= $indent . '<li' . $id  . $class_names .'>';
            
            $attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
            $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
            $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
            $attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';

            if($depth<1) { 
                $item_output = $args->before;
                $item_output .= '<a'. $attributes .'>';
                $item_output .= $args->link_before . apply_filters( 'the_title', $object->title, $object->ID ) . $args->link_after;
                $item_output .= '</a>';
                $item_output .= $args->after;
            }elseif($depth==2 && $this->widgetflag){
                ob_start();

                dynamic_sidebar($this->widget_id);
                $data = ob_get_contents();
                ob_end_clean();
                ob_end_flush();

                $item_output .= $data;

                $this->widgetflag = false;
            }
        }
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $object, $depth, $args );
    }

    /**
        * @see Walker::end_el()
        * @since 3.0.0
        *
        * @param string $output Passed by reference. Used to append additional content.
        * @param object $item Page data object. Not used.
        * @param int $depth Depth of page. Not Used.
        */
    function end_el(&$output, $object, $depth = 0, $args = array(), $current_object_id = 0){
        if(!$this->isMegaMenu)
            $output .= "</li>\n";
        else
        {
            if($depth==1)
                $output .= "</div>\n";
            elseif($depth==2 && $this->menutype=="widget" )
                $output .= "\n";
            else
                $output .= "</li>\n";
        }
    }
}

class TDL_MegaMenu_Nav_Menu extends Walker_Nav_Menu {
    /**
        * @see Walker_Nav_Menu::start_lvl()
        * @since 3.0.0
        *
        * @param string $output Passed by reference.
        * @param int $depth Depth of page.
        */
    function start_lvl(&$output, $depth = 0, $args = array()) {}

    /**
        * @see Walker_Nav_Menu::end_lvl()
        * @since 3.0.0
        *
        * @param string $output Passed by reference.
        * @param int $depth Depth of page.
        */
    function end_lvl(&$output, $depth = 0, $args = array()) {}

    /**
        * @see Walker::start_el()
        * @since 3.0.0
        *
        * @param string $output Passed by reference. Used to append additional content.
        * @param object $item Menu item data object.
        * @param int $depth Depth of menu item. Used for padding.
        * @param int $current_page Menu item ID.
        * @param object $args
        */
    function start_el(&$output, $object, $depth = 0, $args = array(), $id = 0) {
        global $_wp_nav_menu_max_depth;
        $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        ob_start();
        $item_id = esc_attr( $object->ID );
        $removed_args = array(
            'action',
            'customlink-tab',
            'edit-menu-item',
            'menu-item',
            'page-tab',
            '_wpnonce',
        );

        $original_title = '';
        if ( 'taxonomy' == $object->type ) {
            $original_title = get_term_field( 'name', $object->object_id, $object->object, 'raw' );
        } elseif ( 'post_type' == $object->type ) {
            $original_object = get_post( $object->object_id );
            $original_title = $original_object->post_title;
        }

        $classes = array(
            'menu-item menu-item-depth-' . $depth,
            'menu-item-' . esc_attr( $object->object ),
            'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
        );

        $title = $object->title;

        if ( isset( $object->post_status ) && 'draft' == $object->post_status ) {
            $classes[] = 'pending';
            /* translators: %s: title of menu item in draft status */
            $title = sprintf( __('%s (Pending)'), $object->title );
        }

        $title = empty( $object->label ) ? $title : $object->label;
        $value = get_post_meta( $item_id, 'menu-item-megamenu-'.$item_id,true);
        $value = ($value=="on") ? "checked='checked'"  : "";

        $type = get_post_meta( $item_id, 'menu-item-megamenu-layout-'.$item_id,true);

        $newrow = get_post_meta( $item_id, 'menu-item-newrow-'.$item_id,true);
        $newrow = ($newrow=="on") ? "checked='checked'"  : "";

        $fullwidth = get_post_meta( $item_id, 'menu-item-fullwidth-'.$item_id,true);
        $fullwidth = ($fullwidth=="on") ? "checked='checked'"  : "";
		        
        $menu_columns = get_post_meta( $item_id, 'mega-menu-columns-'.$item_id,true);
        $enable_textbox = get_post_meta( $item_id, 'menu-item-enable-textbox-'.$item_id,true);
        $enable_textbox= ($enable_textbox=="on") ? "checked='checked'"  : "";

        $textbox = get_post_meta( $item_id, 'menu-item-textbox-'.$item_id,true);
?>
        <li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes ); ?>">
            <dl class="menu-item-bar">
                <dt class="menu-item-handle">
                    <span class="item-title"><?php echo esc_html( $title ); ?></span>
                    <span class="item-controls">
                        <span class="item-type"><?php echo esc_html( $object->type_label ); ?></span>
                        <span class="item-type item-type-tdl-column"><?php _e('Column','tdl_framework'); ?></span>
                        <span class="item-type item-type-hmenu"><?php _e('(Mega Menu)','tdl_framework'); ?></span>
                        <span class="item-type item-type-tdl-widget"><?php _e('Widget','tdl_framework'); ?></span>

                        
                        <a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php _e('Edit Menu Item','tdl_framework'); ?>" href="<?php
                            echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
                        ?>"><?php _e( 'Edit Menu Item' ,'tdl_framework'); ?>
                        </a>
                    </span>
                </dt>
            </dl>

            <div class="menu-item-settings" id="menu-item-settings-<?php echo $item_id; ?>">
                <?php if( 'custom' == $object->type ) : ?>
                    <p class="field-url description description-wide">
                        <label for="edit-menu-item-url-<?php echo $item_id; ?>">
                            <?php _e( 'URL','tdl_framework' ); ?><br />
                            <input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $object->url ); ?>" />
                        </label>
                    </p>
                <?php endif; ?>
                <p class="description description-thin">
                    <label for="edit-menu-item-title-<?php echo $item_id; ?>">
                        <?php _e( 'Navigation Label','tdl_framework' ); ?><br />
                        <input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $object->title ); ?>" />
                    </label>
                </p>
                <p class="description description-thin">
                    <label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
                        <?php _e( 'Title Attribute','tdl_framework' ); ?><br />
                        <input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $object->post_excerpt ); ?>" />
                    </label>
                </p>

                <p class="field-link-target description description-thin">
                    <label for="edit-menu-item-target-<?php echo $item_id; ?>">
                        <?php _e( 'Link Target','tdl_framework' ); ?><br />
                        <select id="edit-menu-item-target-<?php echo $item_id; ?>" class="widefat edit-menu-item-target" name="menu-item-target[<?php echo $item_id; ?>]">
                            <option value="" <?php selected( $object->target, ''); ?>><?php _e('Same window or tab','tdl_framework'); ?></option>
                            <option value="_blank" <?php selected( $object->target, '_blank'); ?>><?php _e('New window or tab','tdl_framework'); ?></option>
                        </select>
                    </label>
                </p>
                <p class="field-css-classes description description-thin">
                    <label for="edit-menu-item-classes-<?php echo $item_id; ?>">
                        <?php _e( 'CSS Classes (optional)','tdl_framework' ); ?><br />
                        <input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $object->classes ) ); ?>" />
                    </label>
                </p>
                <p class="field-xfn description description-thin">
                    <label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
                        <?php _e( 'Link Relationship (XFN)','tdl_framework' ); ?><br />
                        <input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $object->xfn ); ?>" />
                    </label>
                </p>
                <p class="field-description description description-wide">
                    <label for="edit-menu-item-description-<?php echo $item_id; ?>">
                        <?php _e( 'Description','tdl_framework' ); ?><br />
                        <textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html( $object->description ); ?></textarea>
                        <span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.','tdl_framework'); ?></span>
                    </label>
                </p>

                <div class="menu-item-actions description-wide submitbox">
                    <p class="tdl_megamenu_box clearfix">
                        <label for="menu-item-megamenu-<?php echo $item_id; ?>">Mega Menu </label>
                        <input type="checkbox" id="menu-item-megamenu-<?php echo $item_id; ?>"  name="menu-item-megamenu-<?php echo $item_id; ?>" <?php  echo $value; ?> />
                        <input type="hidden" name="menu-item-megamenu-layout-<?php echo $item_id; ?>" id="menu-item-megamenu-layout-<?php echo $item_id; ?>" value="column" />
                        <select name="mega-menu-columns-<?php echo $item_id; ?>" id="mega-menu-columns-<?php echo $item_id; ?>">
                        	<option <?php if($menu_columns == "2 Columns") echo("selected") ?>>2 Columns</option>
                        	<option <?php if($menu_columns == "3 Columns") echo("selected") ?>>3 Columns</option>
                        	<option <?php if($menu_columns == "4 Columns") echo("selected") ?>>4 Columns</option>
                        </select>
                    </p> 
                    <p class="tdl_megamenu_row_box clearfix">
                        <label for="menu-item-newrow-<?php echo $item_id; ?>">Begin from a new row </label>
                        <input type="checkbox" id="menu-item-newrow-<?php echo $item_id; ?>"  name="menu-item-newrow-<?php echo $item_id; ?>" <?php  echo $newrow; ?> />
                        <label for="menu-item-fullwidth-<?php echo $item_id; ?>">&nbsp;&nbsp;&nbsp;Full-width row </label>
                        <input type="checkbox" id="menu-item-fullwidth-<?php echo $item_id; ?>"  name="menu-item-fullwidth-<?php echo $item_id; ?>" <?php  echo $fullwidth; ?> />
                        <label for="menu-item-enable-textbox-<?php echo $item_id; ?>">&nbsp;&nbsp;&nbsp;Enable text box </label>
                        <input type="checkbox" id="menu-item-enable-textbox-<?php echo $item_id; ?>"  name="menu-item-enable-textbox-<?php echo $item_id; ?>" <?php  echo $enable_textbox; ?> class="enable_textbox" />
                        <textarea name="menu-item-textbox-<?php echo $item_id; ?>" id="menu-item-textbox-<?php echo $item_id; ?>" class="textbox <?php if($enable_textbox=="") echo "hide"; ?>" > <?php echo $textbox; ?></textarea>
                        <span class="hmenu_info"> If you dont want any title on columns, add "no-title" to CSS Clases. Dont leave it empty else wordpress will delete it. </span>
                    </p>
                    <?php if( 'custom' != $object->type ) : ?>
                        <p class="link-to-original">
                            <?php printf( __('Original:','tdl_framework').' %s', '<a href="' . esc_attr( $object->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
                        </p>
                    <?php endif; ?>
                    <a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
                        echo wp_nonce_url(
                                add_query_arg(
                                        array(
                                                'action' => 'delete-menu-item',
                                                'menu-item' => $item_id,
                                        ),
                                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                ),
                                'delete-menu_item_' . $item_id
                        ); ?>"><?php _e('Remove','tdl_framework'); ?>
                    </a> 
                    <span class="meta-sep"> | </span> 
                    <a class="item-cancel submitcancel" id="cancel-<?php echo $item_id; ?>" href="<?php	echo add_query_arg( array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) ) );
                            ?>#menu-item-settings-<?php echo $item_id; ?>"><?php _e('Cancel','tdl_framework'); ?>
                    </a>
                </div>
                <input type="hidden" name="menu-item-megamenu-label-<?php echo $item_id; ?>" value="<?php echo $object->title; ?>" />
                <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
                <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $object->object_id ); ?>" />
                <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $object->object ); ?>" />
                <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $object->menu_item_parent ); ?>" />
                <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
                <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $object->type ); ?>" />
            </div><!-- .menu-item-settings-->
            <ul class="menu-item-transport"></ul>
            <?php
            $output .= ob_get_clean();
    }

    /**
        * @see Walker::end_el()
        * @since 3.0.0
        *
        * @param string $output Passed by reference. Used to append additional content.
        * @param object $item Page data object. Not used.
        * @param int $depth Depth of page. Not Used.
        */
    function end_el(&$output, $object, $depth = 0, $args = array(), $id = 0) {
        $output .= "</li>\n";
    }
}

add_filter( 'wp_edit_nav_menu_walker', 'modify_backend_walker' , 100);
function modify_backend_walker($name)
{
    return 'TDL_MegaMenu_Nav_Menu';
}

function hmenu_scripts()
{
    if(basename( $_SERVER['PHP_SELF']) == "nav-menus.php" )
    {
        wp_enqueue_script( 'tdl_mega_menu' , get_template_directory_uri() . '/functions/megamenu/tdl_mega_menu.js',array('jquery', 'jquery-ui-sortable'), false, true ); 
		wp_enqueue_style('tdl-admin-style', get_template_directory_uri() . '/functions/megamenu/tdl_mega_menu_style.css');
    }
}
add_action('admin_init', 'hmenu_scripts');

add_action( 'wp_update_nav_menu_item', 'update_menu', 100, 3);
function update_menu($menu_id, $menu_item_db)
{
	$menu_label = '';
	if (isset($_POST["menu-item-megamenu-label-".$menu_item_db])) {$value = $_POST["menu-item-megamenu-label-".$menu_item_db];}

    $widget_id = 'menu-item-megamenu-'.$menu_item_db.'-widget';
	
	$value = '';
	$newrow = '';
	$fullwidth = '';
	$value_type = '';
	$value_textbox ='';
	$value_item_textbox ='';
	$value_menu_columns ='';
	
	if (isset($_POST['menu-item-megamenu-'.$menu_item_db])) {$value = $_POST['menu-item-megamenu-'.$menu_item_db];}
	if (isset($_POST['menu-item-newrow-'.$menu_item_db])) {$newrow = $_POST['menu-item-newrow-'.$menu_item_db];}
	if (isset($_POST['menu-item-fullwidth-'.$menu_item_db])) {$fullwidth = $_POST['menu-item-fullwidth-'.$menu_item_db];}
	if (isset($_POST['menu-item-megamenu-layout-'.$menu_item_db])) {$value_type = $_POST['menu-item-megamenu-layout-'.$menu_item_db];}
	
	if (isset($_POST['menu-item-enable-textbox-'.$menu_item_db])) {$value_textbox = $_POST['menu-item-enable-textbox-'.$menu_item_db];}
	if (isset($_POST['menu-item-textbox-'.$menu_item_db])) {$value_item_textbox = $_POST['menu-item-textbox-'.$menu_item_db];}
	if (isset($_POST['mega-menu-columns-'.$menu_item_db])) {$value_menu_columns = $_POST['mega-menu-columns-'.$menu_item_db];}

    update_post_meta( $menu_item_db, 'menu-item-megamenu-'.$menu_item_db , $value );
    update_post_meta( $menu_item_db, 'menu-item-newrow-'.$menu_item_db , $newrow );
	update_post_meta( $menu_item_db, 'menu-item-fullwidth-'.$menu_item_db , $fullwidth );
    update_post_meta( $menu_item_db, 'menu-item-megamenu-layout-'.$menu_item_db , $value_type );
    update_post_meta( $menu_item_db, 'menu-item-enable-textbox-'.$menu_item_db, $value_textbox );
    update_post_meta( $menu_item_db, 'menu-item-textbox-'.$menu_item_db, $value_item_textbox );
    update_post_meta( $menu_item_db, 'mega-menu-columns-'.$menu_item_db, $value_menu_columns );

    if($value_type=="widgetized"&&$value=="on")
    {
        $hwidgets = get_option("hmenu_widgets");
        if($hwidgets=="")
        {
            $w = array( $widget_id => $menu_label);
            add_option("hmenu_widgets",$w);	
        }
        else
        {
            $test_flag = false;
            $w = $hwidgets;
            foreach( $w as $key => $val)
            {
                if($key == $widget_id)
                {
                    $test_flag = true; break;
                }
            }

            if(!$test_flag)
            {
                $w[$widget_id] = $menu_label;
            }
            update_option("hmenu_widgets",$w);	
        }
    }
    if($value=="") {
        $hwidgets = get_option("hmenu_widgets");

        if($hwidgets!="")
        {
            $test_flag = false;
            $w = $hwidgets;
            foreach( $w as $key => $val)
            {
                if($key == $widget_id)
                {
                    $test_flag = true; break;
                }
            }

            if($test_flag)
            {
                unset($w[$widget_id]);
                $array = array_values($w);
            }

    //  print_r($w);
            update_option("hmenu_widgets",$w);
        }
    }
}

function TDL_MegaMenu_AJAX_Menu()
{	
    if ( ! current_user_can( 'edit_theme_options' ) )
        die('-1');

    check_ajax_referer( 'add-menu_item', 'menu-settings-column-nonce' );

    require_once ABSPATH . 'wp-admin/includes/nav-menu.php';

    $item_ids = wp_save_nav_menu_items( 0, $_POST['menu-item'] );
    if ( is_wp_error( $item_ids ) )
        die('-1');

    foreach ( (array) $item_ids as $menu_item_id ) {
        $menu_obj = get_post( $menu_item_id );
        if ( ! empty( $menu_obj->ID ) ) {
            $menu_obj = wp_setup_nav_menu_item( $menu_obj );
            $menu_obj->label = $menu_obj->title; // don't show "(pending)" in ajax-added items
            $menu_items[] = $menu_obj;
        }
    }

    if ( ! empty( $menu_items ) ) {
            $args = array(
                    'after' => '',
                    'before' => '',
                    'link_after' => '',
                    'link_before' => '',
                    'walker' => new TDL_MegaMenu_Nav_Menu,
            );
            echo walk_nav_menu_tree( $menu_items, 0, (object) $args );
    }

    die('end');
}
//hook into wordpress admin.php
add_action('wp_ajax_TDL_MegaMenu_AJAX_Menu', 'TDL_MegaMenu_AJAX_Menu');
/*Mega-Menu-End*/