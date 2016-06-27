<?php
/**
 * Plugin Name: Jigoshop Product Add-ons
 * Plugin URI: http://jigoshop.com
 * Description: Jigoshop Product Add-ons lets you add extra options to products which the user can select. Add-ons can be checkboxes, a select box, or custom input. Each option can optionally be given a price which is added to the cost of the product.
 * Version: 1.19.1
 * Author: OptArt | Zbigniew Niedzielski
 * Author URI: http://optart.biz
 * Requires at least: 3.1
 * Tested up to: 3.9.1
*/

add_action('init', 'init_jigoshop_product_addons', 0);
function init_jigoshop_product_addons() {

  if ( class_exists('jigoshop') ) {

    define('JIGOSHOP_PRODUCT_ADDONS_ENABLED', true);
    define('JIGOSHOP_PRODUCT_ADDONS_ROOT', plugin_dir_url(__FILE__));

    include_once( 'classes/addon_order_item_meta.class.php' );

    if (function_exists('is_multisite') && is_multisite()) {
      require_once (ABSPATH . 'wp-admin/includes/ms.php');
    }

    /**
     * Localisation
     **/
    load_plugin_textdomain( 'jigoshop_product_addons', false, dirname( plugin_basename( __FILE__ ) ) . '/' );

    /**
     * jigoshop_product_addons class
     **/
    class jigoshop_product_addons {

      var $settings;
      var $orderItems = null;
      var $checkedItems = array();

      public function __construct() {

        // Addon display
        add_action( 'jigoshop_before_add_to_cart_form_button', array(&$this, 'product_addons'), 10 );
        add_action( 'jigoshop_display_item_meta_data', array(&$this, 'display_item_data') );

        // Filters for cart actions
        add_filter( 'jigoshop_add_cart_item_data', array(&$this, 'add_cart_item_data'), 10, 2 );
        add_filter( 'jigoshop_get_item_data', array(&$this, 'get_item_data'), 10, 2 );
        add_filter( 'jigoshop_add_cart_item', array(&$this, 'add_cart_item'), 10, 2 );
        add_filter( 'new_order_item', array(&$this, 'new_order_item'), 10, 2 );
        add_filter( 'update_order_item', array(&$this, 'update_order_item'), 10, 2 );
        add_filter( 'jigoshop_display_item_meta_data_email', array(&$this, 'display_item_data_email'), 10, 2 );

        // Write Panel
        add_action( 'admin_print_styles-post.php', array(&$this, 'meta_box_css') );
        add_action( 'admin_print_styles-post-new.php', array(&$this, 'meta_box_css') );
        add_action( 'product_write_panel_js', array(&$this, 'meta_box_js'));
        add_action( 'add_meta_boxes', array(&$this, 'add_meta_box'));
        add_action( 'jigoshop_process_product_meta', array(&$this, 'process_meta_box'), 1, 2);
        add_action( 'jigoshop_admin_order_item_headers', array(&$this, 'order_meta_box_header'), 1, 2);
        add_action( 'jigoshop_admin_order_item_values', array(&$this, 'order_meta_box'), 1, 2);

        add_filter( 'jigoshop_multi_currencies_product_cart_rebuild', array(&$this, 'rebuild_cart') );

        $this->check_extensions();
        }

        /*-----------------------------------------------------------------------------------*/
      /* Write Panel */
      /*-----------------------------------------------------------------------------------*/

        function add_meta_box() {
          add_meta_box( 'jigoshop-product-addons', __('Product Add-ons', 'jigoshop_product_addons'), array(&$this, 'meta_box'), 'product', 'side', 'default' );
        }

        function meta_box_css() {

          wp_enqueue_style( 'jigoshop_product_addons_css', plugins_url(basename(dirname(__FILE__))) . '/css/admin.css' );
        }

        function meta_box( $post ) {
        ?>
        <div id="product_addons" class="panel">
          <div class="jigoshop_addons">

            <?php
            //$product_addons = get_post_meta( $post->ID, '_product_addons', true );
            $product_addons = get_post_meta( get_the_ID(), '_product_addons', true );

            $loop = 0;

            if (is_array($product_addons) && sizeof($product_addons)>0) foreach ($product_addons as $addon) :

              if (!$addon['name']) continue;

              ?><div class="jigoshop_addon">
                <p class="addon_name">
                  <label class="hidden"><?php _e('Name', 'jigoshop_product_addons'); ?>:</label>
                  <input type="text" name="addon_name[<?php echo $loop; ?>]" placeholder="<?php _e('Name', 'jigoshop_product_addons'); ?>" value="<?php echo esc_attr($addon['name']); ?>" />
                  <input type="hidden" name="addon_position[<?php echo $loop; ?>]" class="addon_position" value="<?php echo $loop; ?>" />
                </p>
                <p class="addon_type">
                  <label class="hidden"><?php _e('Type', 'jigoshop_product_addons'); ?>:</label>
                  <select name="addon_type[<?php echo $loop; ?>]">
                    <option <?php selected('checkbox', $addon['type']); ?> value="checkbox"><?php _e('Checkboxes', 'jigoshop_product_addons'); ?></option>
                    <option <?php selected('select', $addon['type']); ?> value="select"><?php _e('Select box', 'jigoshop_product_addons'); ?></option>
                    <option <?php selected('radio', $addon['type']); ?> value="radio"><?php _e('Radio list', 'jigoshop_product_addons'); ?></option>
                    <option <?php selected('custom', $addon['type']); ?> value="custom"><?php _e('Customer Input boxes', 'jigoshop_product_addons'); ?></option>
                    <option <?php selected('textarea', $addon['type']); ?> value="textarea"><?php _e('Textareas', 'jigoshop_product_addons'); ?></option>
                    <option <?php selected('datepicker', $addon['type']); ?> value="datepicker"><?php _e('Datepickers', 'jigoshop_product_addons'); ?></option>
                    <option <?php selected('file_upload', $addon['type']); ?> value="file_upload"><?php _e('File upload', 'jigoshop_product_addons'); ?></option>
                    <?php do_action('jigoshop_product_addons_addon_types', $addon); ?>
                  </select>
                </p>
                <p class="addon_description">
                  <label class="hidden"><?php _e('Description', 'jigoshop_product_addons'); ?>:</label>
                  <input type="text" name="addon_description[<?php echo $loop; ?>]" placeholder="<?php _e('Description', 'jigoshop_product_addons'); ?>" value="<?php echo esc_attr($addon['description']); ?>" />
                  <?php do_action('jigoshop_product_addons_addon_after_description', $addon, $loop); ?>
                </p>
                <table cellpadding="0" cellspacing="0" class="jigoshop_addon_options">
                  <thead>
                    <tr>
                      <th><?php _e('Label/Value', 'jigoshop_product_addons'); ?>:</th>
                      <th><?php _e('Price', 'jigoshop_product_addons'); ?>:</th>
                      <th width="1%" class="actions"><button type="button" class="add_addon_option button"><?php _e('Add', 'jigoshop_product_addons'); ?></button></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($addon['options'] as $option) :
                      ?>
                      <tr>
                        <td>
                        <?php do_action('jigoshop_product_addons_before_option_label', $addon, $option, $loop) ?>
                        <input type="text" class="addon_option_label" name="addon_option_label[<?php echo $loop; ?>][]" value="<?php echo esc_attr($option['label']) ?>" placeholder="<?php _e('Label', 'jigoshop_product_addons'); ?>" />
                        <?php do_action('jigoshop_product_addons_after_option_label', $addon, $option, $loop) ?>
                        </td>
                        <td><input type="text" name="addon_option_price[<?php echo $loop; ?>][]" value="<?php echo esc_attr($option['price']) ?>" placeholder="0.00" /></td>
                        <td class="actions"><button type="button" class="remove_addon_option button">x</button></td>
                      </tr>
                      <?php
                    endforeach;
                    ?>
                  </tbody>
                </table>
                <span class="handle">&varr; <?php _e('Move', 'jigoshop_product_addons'); ?></span>
                <a href="#" class="delete_addon"><?php _e('Delete add-on', 'jigoshop_product_addons'); ?></a>
              </div><?php

              $loop++;

            endforeach;
            ?>

          </div>

          <h4><a href="#" class="add_new_addon">+ <?php _e('Add New Product Add-on', 'jigoshop_product_addons'); ?></a></h4>

        </div>
          <?php
        }

        function meta_box_js() {
          ?>
        jQuery(function(){

          <?php do_action('jigoshop_product_addons_addon_before_admin_scripts'); ?>

          jQuery('a.add_new_addon').live('click', function(){

            var loop = jQuery('.jigoshop_addons .jigoshop_addon').size();

            jQuery('.jigoshop_addons').append('<div class="jigoshop_addon">\
              <p class="addon_name">\
                <label class="hidden"><?php _e('Name', 'jigoshop_product_addons'); ?>:</label>\
                <input type="text" name="addon_name[' + loop + ']" placeholder="<?php _e('Name', 'jigoshop_product_addons'); ?>" />\
                <input type="hidden" name="addon_position[' + loop + ']" class="addon_position" value="' + loop + '" />\
              </p>\
              <p class="addon_type">\
                <label class="hidden"><?php _e('Type', 'jigoshop_product_addons'); ?>:</label>\
                <select name="addon_type[' + loop + ']">\
                  <option value="checkbox"><?php _e('Checkboxes', 'jigoshop_product_addons'); ?></option>\
                  <option value="select"><?php _e('Select box', 'jigoshop_product_addons'); ?></option>\
                  <option value="radio"><?php _e('Radio list', 'jigoshop_product_addons'); ?></option>\
                  <option value="custom"><?php _e('Customer Input boxes', 'jigoshop_product_addons'); ?></option>\
                  <option value="textarea"><?php _e('Textareas', 'jigoshop_product_addons'); ?></option>\
                  <option value="datepicker"><?php _e('Datepickers', 'jigoshop_product_addons'); ?></option>\
                  <option value="file_upload"><?php _e('File upload', 'jigoshop_product_addons'); ?></option>\
                  <?php do_action('jigoshop_product_addons_addon_types_js'); ?>
                </select>\
              </p>\
              <p class="addon_description">\
                <label class="hidden"><?php _e('Description', 'jigoshop_product_addons'); ?>:</label>\
                <input type="text" name="addon_description[' + loop + ']" placeholder="<?php _e('Description', 'jigoshop_product_addons'); ?>" />\
                <?php do_action('jigoshop_product_addons_addon_after_description_js'); ?>
              </p>\
              <table cellpadding="0" cellspacing="0" class="jigoshop_addon_options">\
                <thead>\
                  <tr>\
                    <th><?php _e('Option', 'jigoshop_product_addons'); ?>:</th>\
                    <th><?php _e('Price', 'jigoshop_product_addons'); ?>:</th>\
                    <th width="1%" class="actions"><button type="button" class="add_addon_option button"><?php _e('Add', 'jigoshop_product_addons'); ?></button></th>\
                  </tr>\
                </thead>\
                <tbody>\
                  <tr>\
                    <td>\
                    <?php do_action('jigoshop_product_addons_before_option_label_js') ?>
                    <input type="text" name="addon_option_label[' + loop + '][]" value="<?php ?>" placeholder="<?php _e('Label', 'jigoshop_product_addons'); ?>" />\
                    <?php do_action('jigoshop_product_addons_after_option_label_js') ?>
                    </td>\
                    <td><input type="text" name="addon_option_price[' + loop + '][]" value="<?php ?>" placeholder="0.00" /></td>\
                    <td class="actions"><button type="button" class="remove_addon_option button">x</button></td>\
                  </tr>\
                </tbody>\
              </table>\
              <span class="handle">&varr; <?php _e('Move', 'jigoshop_product_addons'); ?></span>\
              <a href="#" class="delete_addon"><?php _e('Delete add-on', 'jigoshop_product_addons'); ?></a>\
            </div>');

            return false;

          });

          jQuery('button.add_addon_option').live('click', function(){

            var loop = jQuery(this).closest('.jigoshop_addon').index('.jigoshop_addon');

            jQuery(this).closest('.jigoshop_addon_options').find('tbody').append('<tr>\
              <td>\
              <?php do_action('jigoshop_product_addons_before_option_label_js') ?>
              <input type="text" name="addon_option_label[' + loop + '][]" placeholder="<?php _e('Label', 'jigoshop_product_addons'); ?>" />\
              <?php do_action('jigoshop_product_addons_after_option_label_js') ?>
              </td>\
              <td><input type="text" name="addon_option_price[' + loop + '][]" placeholder="0.00" /></td>\
              <td class="actions"><button type="button" class="remove_addon_option button">x</button></td>\
            </tr>');

            return false;

          });

          jQuery('button.remove_addon_option').live('click', function(){

            var answer = confirm('<?php _e('Are you sure you want delete this add-on option?', 'jigoshop_product_addons'); ?>');

            if (answer) {
              jQuery(this).closest('tr').remove();
            }

            return false;

          });

          jQuery('a.delete_addon').live('click', function(){

            var answer = confirm('<?php _e('Are you sure you want delete this add-on?', 'jigoshop_product_addons'); ?>');

            if (answer) {
              var addon = jQuery(this).closest('.jigoshop_addon');
              jQuery(addon).find('input').val('');
              jQuery(addon).hide();
            }

            return false;

          });

          jQuery('.jigoshop_addon table.jigoshop_addon_options tbody').sortable({
            items:'tr',
            cursor:'move',
            axis:'y',
            scrollSensitivity:40,
            helper:function(e,ui){
              ui.children().each(function(){
                jQuery(this).width(jQuery(this).width());
              });
              return ui;
            },
            start:function(event,ui){
              ui.item.css('background-color','#f6f6f6');
            },
            stop:function(event,ui){
              ui.item.removeAttr('style');
            }
          });

          jQuery('.jigoshop_addons').sortable({
            items:'.jigoshop_addon',
            cursor:'move',
            axis:'y',
            handle:'.handle',
            scrollSensitivity:40,
            helper:function(e,ui){
              ui.children().each(function(){
                jQuery(this).width(jQuery(this).width());
              });
              return ui;
            },
            start:function(event,ui){
              ui.item.css('border-style','dashed');
            },
            stop:function(event,ui){
              ui.item.removeAttr('style');
              addon_row_indexes();
            }
          });

          function addon_row_indexes() {
            jQuery('.jigoshop_addons .jigoshop_addon').each(function(index, el){ jQuery('.addon_position', el).val( parseInt( jQuery(el).index('.jigoshop_addons .jigoshop_addon') ) ); });
          };

          <?php do_action('jigoshop_product_addons_addon_after_admin_scripts'); ?>

        });
        <?php
        }

        function floatvalue($value) {
           // http://php.net/manual/en/function.floatval.php#85346
           return floatval(preg_replace('#^([-]*[0-9\.,\' ]+?)((\.|,){1}([0-9-]{1,2}))*$#e', "str_replace(array('.', ',', \"'\", ' '), '', '\\1') . '.\\4'", $value));
        }

        function process_meta_box( $post_id, $post ) {

          // Save addons as serialised array
        $product_addons = array();

        if (isset($_POST['addon_name'])) :
           $addon_name			= $_POST['addon_name'];
           $addon_description		= $_POST['addon_description'];
           $addon_type 			= $_POST['addon_type'];
           $addon_option_label	= $_POST['addon_option_label'];
           $addon_option_price	= $_POST['addon_option_price'];
           $addon_position 		= $_POST['addon_position'];

           for ($i=0; $i<sizeof($addon_name); $i++) :

            if (!isset($addon_name[$i]) || trim($addon_name[$i])=='') continue;

            // Meta
            $addon_options 			= array();
            $option_label 			= $addon_option_label[$i];
            $option_price 			= $addon_option_price[$i];

            for ($ii=0; $ii<sizeof($option_label); $ii++) :
              $label = esc_attr(stripslashes($option_label[$ii]));
              $price = esc_attr($this->floatvalue(stripslashes($option_price[$ii])));

              $addon_options[] = apply_filters('jigoshop_product_addons_process_meta_option',array(
                'label' => $label,
                'price' => $price
              ), $i, $ii);

            endfor;

            if (sizeof($addon_options)==0) continue; // Needs options

            // Add to array
            $product_addons[] = apply_filters('jigoshop_product_addons_process_meta',array(
              'name' 			=> esc_attr(stripslashes($addon_name[$i])),
              'description' 	=> esc_attr(stripslashes($addon_description[$i])),
              'type' 			=> esc_attr(stripslashes($addon_type[$i])),
              'position'		=> (int) $addon_position[$i],
              'options' 		=> $addon_options
            ), $i);

           endfor;
        endif;

        if (!function_exists('addons_cmp')) {
          function addons_cmp($a, $b) {
              if ($a['position'] == $b['position']) {
                  return 0;
              }
              return ($a['position'] < $b['position']) ? -1 : 1;
          }
        }
        uasort($product_addons, 'addons_cmp');

        update_post_meta( $post_id, '_product_addons', $product_addons );

        }


        /*-----------------------------------------------------------------------------------*/
      /* Class Functions */
      /*-----------------------------------------------------------------------------------*/

      function product_addons() {
        global $post;

        $product_addons = get_post_meta( $post->ID, '_product_addons', true );
        $addonPrices = array();
        $product = new jigoshop_product($post->ID);
        $addonPrices['product_price'] = strip_tags(jigoshop_price($product->get_price(),array('with_currency'=>false)));
        $addonPrices['product_price_currency'] = strip_tags(jigoshop_price($product->get_price()));
        $addonPrices['product_price_raw'] = $product->get_price();
        $addonPrices['product_price_num_decimals'] = (int) Jigoshop_Base::get_options()->get_option('jigoshop_price_num_decimals');
        $addonPrices['product_price_decimal_sep'] = Jigoshop_Base::get_options()->get_option('jigoshop_price_decimal_sep');
        $addonPrices['product_price_thousand_sep'] = Jigoshop_Base::get_options()->get_option('jigoshop_price_thousand_sep');
        $addonPrices['product_currency_symbol'] = get_jigoshop_currency_symbol();
        $addonPrices['product_currency'] = Jigoshop_Base::get_options()->get_option('jigoshop_currency');

        $datepickers = array();
        if (is_array($product_addons) && sizeof($product_addons)>0) foreach ($product_addons as $addon) :

          if (!isset($addon['name'])) continue;

          ?>
          <div class="<?php echo apply_filters('product_addons_addon_css_class','product-addon', $addon) ?> product-addon-<?php echo sanitize_title($addon['name']); ?>">
            <?php if ($addon['name']) : ?><h3><?php echo wptexturize($addon['name']); ?> <?php if ($addon['type']=='file_upload') echo sprintf(__('(max size %s)', 'jigoshop_product_addons'), $this->max_upload_size()); ?></h3><?php endif; ?>
            <?php if ($addon['description']) : ?><p><?php echo wptexturize($addon['description']); ?></p><?php endif; ?>
            <?php

            switch ($addon['type']) :
              case "checkbox" :
                foreach ($addon['options'] as $option) :
                  $price_value = apply_filters( 'jigoshop_multi_currencies_exchange', $option['price'] );
                  $price = ( $price_value > 0 ) ? ' (' . jigoshop_price( $price_value ) . ')' : '';
                  $aname = 'addon-' . sanitize_title( $addon['name'] );
                  $addonPrices[$aname . '-' . sanitize_title( $option['label'] )] = $price_value;
                  $checked = (isset($_POST[$aname]) && in_array(sanitize_title( $option['label'] ),$_POST[$aname])) ? ' checked="checked"' : '';
                  echo '<p class="form-row form-row-wide '.$aname.'-'.sanitize_title( $option['label'] ).'"><label><input type="checkbox" name="'. $aname .'[]" value="'. sanitize_title( $option['label'] ) .'"'.$checked.'/> '. wptexturize($option['label']) . $price .'</label></p>';
                endforeach;
              break;
              case "select" :
                $aname = 'addon-'. sanitize_title( $addon['name'] );
                echo '<p class="form-row form-row-wide '.$aname.'"><select name="'. $aname .'">'.apply_filters('product_addons_select_option_none','<option value="">'. __('None', 'jigoshop_product_addons') .'</option>', $addon);
                foreach ($addon['options'] as $option) :
                  $price_value = apply_filters( 'jigoshop_multi_currencies_exchange', $option['price'] );
                  $price = ( $price_value > 0 ) ? ' (' . jigoshop_price( $price_value ) . ')' : '';
                  $addonPrices[$aname . '-' . sanitize_title( $option['label'] )] = $price_value;
                  $selected = (isset($_POST[$aname]) && $_POST[$aname] == sanitize_title( $option['label'] )) ? ' selected="selected"' : '';
                  echo '<option value="'. sanitize_title( $option['label'] ) .'"'.$selected.'>'. wptexturize($option['label']) . $price .'</option>';
                endforeach;
                echo '</select></p>';
              break;
              case "radio" :
                foreach ($addon['options'] as $option) :
                  $price_value = apply_filters( 'jigoshop_multi_currencies_exchange', $option['price'] );
                  $price = ( $price_value > 0 ) ? ' (' . jigoshop_price( $price_value ) . ')' : '';
                  $aname = 'addon-' . sanitize_title( $addon['name'] );
                  $addonPrices[$aname . '-' . sanitize_title( $option['label'] )] = $price_value;
                  $checked = (isset($_POST[$aname]) && sanitize_title( $option['label'] ) == $_POST[$aname]) ? ' checked="checked"' : '';
                  echo '<p class="form-row form-row-wide '.$aname.'-'.sanitize_title( $option['label'] ).'"><label><input type="radio" name="'. $aname .'" value="'. sanitize_title( $option['label'] ) .'"'.$checked.'/> '. wptexturize($option['label']) . $price .'</label></p>';
                endforeach;
              break;
              case "custom" :
                foreach ($addon['options'] as $option) :
                  $price_value = apply_filters( 'jigoshop_multi_currencies_exchange', $option['price'] );
                  $price = ( $price_value > 0 ) ? ' (' . jigoshop_price( $price_value ) . ')' : '';
                  $aname = 'addon-' . sanitize_title( $addon['name'] ) . '-' . sanitize_title( $option['label'] );
                  $addonPrices[$aname] = $price_value;
                  $show_colon = ($price != '' || $option['label'] != '');
                  $value = isset($_POST[$aname]) ? $_POST[$aname] : '';
                  echo '<p class="form-row form-row-wide '.$aname.'"><label>'. wptexturize($option['label']) . $price .($show_colon ? ':' : '').' <input type="text" class="input-text" name="' . $aname .'" value="'. $value .'"/></label></p>';
                endforeach;
              break;
              case "textarea" :
                foreach ($addon['options'] as $option) :
                  $price_value = apply_filters( 'jigoshop_multi_currencies_exchange', $option['price'] );
                  $price = ( $price_value > 0 ) ? ' (' . jigoshop_price( $price_value ) . ')' : '';
                  $aname = 'addon-' . sanitize_title( $addon['name'] ) . '-' . sanitize_title( $option['label'] );
                  $addonPrices[$aname] = $price_value;
                  $show_colon = ($price != '' || $option['label'] != '');
                  $value = isset($_POST[$aname]) ? $_POST[$aname] : '';
                  echo '<p class="form-row form-row-wide '.$aname.'"><label>'. wptexturize($option['label']) . $price .($show_colon ? ':' : '').' <textarea class="input-text" name="' . $aname .'">'.$value.'</textarea></label></p>';
                endforeach;
              break;
              case "datepicker" :
                foreach ($addon['options'] as $option) :
                  $price_value = apply_filters( 'jigoshop_multi_currencies_exchange', $option['price'] );
                  $price = ( $price_value > 0 ) ? ' (' . jigoshop_price( $price_value ) . ')' : '';
                  $aname = 'addon-' . sanitize_title( $addon['name'] ) . '-' . sanitize_title( $option['label'] );
                  $addonPrices[$aname] = $price_value;
                  $show_colon = ($price != '' || $option['label'] != '');
                  $datepicker_id = 'did-' . sanitize_title( $addon['name'] ) . '-' . sanitize_title( $option['label'] );
                  $value = isset($_POST[$aname]) ? $_POST[$aname] : '';
                  echo '<p class="form-row form-row-wide '.$aname.'"><label>'. wptexturize($option['label']) . $price .($show_colon ? ':' : '').' <input type="text" class="input-text" id="'.$datepicker_id.'" name="' . $aname .'" value="'. $value .'" placeholder="'.__('Click to select a date', 'jigoshop_product_addons').'"/></label></p>';
                  $datepickers[$datepicker_id] = $addon;
                  wp_enqueue_script('jquery-ui-datepicker',  false, array('jquery','jquery-ui-core') );
                  wp_enqueue_style( 'jquery.ui.theme', plugins_url( '/css/datepicker/jquery-ui-1.8.22.custom.css', __FILE__ ) );
                endforeach;
              break;
              case "file_upload" :
                echo "<script>jQuery('form.cart').attr('enctype','multipart/form-data');</script>";
                foreach ($addon['options'] as $option) :
                  $price_value = apply_filters( 'jigoshop_multi_currencies_exchange', $option['price'] );
                  $price = ( $price_value > 0 ) ? ' (' . jigoshop_price( $price_value ) . ')' : '';
                  $addonPrices['addon-' . sanitize_title( $addon['name'] ) . '-' . sanitize_title( $option['label'] )] = $price_value;
                  $show_colon = ($price != '' || $option['label'] != '');
                  echo '<p class="form-row form-row-wide '.$aname.'"><label>'. wptexturize($option['label']) . $price . ($show_colon ? ':' : '').' <input type="file" class="input-text" name="addon-' . sanitize_title( $addon['name'] ) . '-' . sanitize_title( $option['label'] ) .'" /></label></p>';
                endforeach;
              break;
              default:
                do_action('jigoshop_product_addons_display_addon', $addon );
              break;
            endswitch;
            ?>
            <div class="clear"></div>
          </div>
          <?php
        endforeach;

        ?>
          <script type="text/javascript">
              /* <![CDATA[ */
                jQuery(document).ready( function () {

                  <?php do_action('jigoshop_product_addons_before_front_scripts'); ?>

                  // http://stackoverflow.com/a/149099
                  Number.prototype.formatMoney = function(c, d, t){
                    var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
                       return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
                  };

                  <?php echo "var addonsPrices = ".json_encode($addonPrices).";"; ?>
                  var is_variable = jQuery('form > fieldset.variations').length > 0;

                  function htmlDecode(value) {
                    return (typeof value === 'undefined') ? '' : jQuery('<div/>').html(value).text();
                  }

                  function convertToNumber(value) {
                    var thousand = new RegExp('['+addonsPrices.product_price_thousand_sep+']+','g');
                    var decimal = new RegExp('['+addonsPrices.product_price_decimal_sep+']+','g');

                    var nr = value.replace(thousand,"").replace(decimal,".");
                    return nr;
                  }

                  jQuery.fn.jigoshopProductAddons = function(method) {
                    if (method == 'countTotalPrice') {
                      countTotalPrice();
                    }
                  };

                  function countTotalPrice() {

                    if (is_variable) {
                      var insPrice = jQuery('div.single_variation span.price ins');
                      if (jQuery.trim(insPrice.text()) != '') {
                        var originalPriceCurrency = insPrice.html();
                        var originalPrice = insPrice.html().replace(htmlDecode(addonsPrices.product_currency_symbol),"").replace(addonsPrices.product_currency,"");
                        var totalPrice = Number(convertToNumber(originalPrice));
                      }
                      else {
                        var regPrice = jQuery('div.single_variation span.price');
                        if (jQuery.trim(regPrice.text()) != '') {
                          var originalPriceCurrency = regPrice.html();
                          var originalPrice = regPrice.html().replace(htmlDecode(addonsPrices.product_currency_symbol),"").replace(addonsPrices.product_currency,"");
                          var totalPrice = Number(convertToNumber(originalPrice));
                        }
                        else {
                          var totalPrice = 0;
                        }
                      }
                    }
                    else {
                      var originalPriceCurrency = addonsPrices['product_price_currency'];
                      var originalPrice = addonsPrices['product_price'];
                      var totalPrice = Number(addonsPrices.product_price_raw);
                    }

                    if (totalPrice > 0) {

                      jQuery('div.product-addon input[type=text], div.product-addon input[type=file], div.product-addon textarea').each(function() {
                        if (jQuery.trim(jQuery(this).val()) != '') {
                          totalPrice += Number(addonsPrices[jQuery(this).attr('name')]);
                        }
                      });

                      jQuery('div.product-addon select').each(function() {
                        if (jQuery.trim(jQuery(this).val()) != '') {
                          totalPrice += Number(addonsPrices[jQuery(this).attr('name') + '-' + jQuery(this).val()]);
                        }
                      });

                      jQuery('div.product-addon input[type=radio]').each(function() {
                        if (jQuery(this).prop('checked')) {
                          totalPrice += Number(addonsPrices[jQuery(this).attr('name') + '-' + jQuery(this).val()]);
                        }
                      });

                      jQuery('div.product-addon input[type=checkbox]').each(function() {
                        if (jQuery(this).prop('checked')) {
                          totalPrice += Number(addonsPrices[jQuery(this).attr('name').slice(0,-2) + '-' + jQuery(this).val()]);
                        }
                      });

                      <?php do_action('jigoshop_product_addons_count_total_price_js' ); ?>

                      if (jQuery('div.quantity input[name=quantity]').length > 0) {
                        totalPrice = totalPrice * Number(jQuery('div.quantity input[name=quantity]').val());
                      }

                      var endPrice = totalPrice.formatMoney(addonsPrices.product_price_num_decimals,
                                                            addonsPrices.product_price_decimal_sep,
                                                            addonsPrices.product_price_thousand_sep);

                      var priceForDisplay = originalPriceCurrency.replace(originalPrice,endPrice);

                      if (jQuery('#addon_total_price').length == 0) {
                        var endPriceObj = jQuery('<div id="addon_total_price"><span><?php _e('Total price','jigoshop_product_addons') ?>: </span><span class="price">' + priceForDisplay + '</span></div>');
                        jQuery('form > div.product-addon').last().after(endPriceObj);
                      }
                      else {
                        jQuery('#addon_total_price span.price').html(priceForDisplay);
                      }

                    }
                  }

                  jQuery('div.product-addon input[type=text]').keyup(function() {
                    countTotalPrice();
                  });

                  jQuery('div.product-addon select, div.product-addon input[type=file], div.product-addon textarea').change(function() {
                    countTotalPrice();
                  });

                  jQuery('div.product-addon input[type=checkbox], div.product-addon input[type=radio], #add1, #minus1').click(function() {
                    countTotalPrice();
                  });

                  if (is_variable) {
                    jQuery('fieldset.variations select').change(function() {
                      countTotalPrice();
                    });
                  }

                  <?php
                    if (count($datepickers))
                    {
                      $dp_settings = array();
                      $dp_settings['dateFormat'] = "'".$this->dateStringToDatepickerFormat(get_option('date_format'))."'";
                      $dp_settings['onSelect'] = "function () { countTotalPrice(); }";

                      foreach (array_keys($datepickers) as $id)
                      {
                        $dp_settings = apply_filters('jigoshop_product_addons_datepicker_settings', $dp_settings, $datepickers[$id]);
                        $pairs_arr = array();
                        foreach ($dp_settings as $key => $value) {
                          $pairs_arr[] = $key.': '.$value;
                        }
                        echo "jQuery('#".$id."').datepicker({
                                    ".implode(",\n",$pairs_arr)."
                        });";
                      }
                    }
                  ?>

                  <?php do_action('jigoshop_product_addons_after_front_scripts'); ?>

                });
                /* ]]> */
           </script>
        <?php
      }

      function add_cart_item_data( $cart_item_meta, $product_id ) {
        global $jigoshop;

        $product_addons = get_post_meta( $product_id, '_product_addons', true );

        $cart_item_meta['addons'] = array();

        if (is_array($product_addons) && sizeof($product_addons)>0) foreach ($product_addons as $addon) :

          if (!isset($addon['name'])) continue;

          switch ($addon['type']) :
            case "checkbox" :

              // Posted var = name, value = label
              $posted = (isset( $_POST['addon-' . sanitize_title( $addon['name'] )] )) ? $_POST['addon-' . sanitize_title( $addon['name'] )] : '';

              if (!$posted || sizeof($posted)==0) continue;

              foreach ($addon['options'] as $option) :

                if (array_search(sanitize_title($option['label']), $posted)!==FALSE) :

                  // Set
                  $cart_item_meta['addons'][] = array(
                    'name'  	=> esc_attr( $addon['name'] ),
                    'value' 	=> esc_attr( $option['label'] ),
                    'price' 	=> esc_attr( apply_filters( 'jigoshop_multi_currencies_exchange', $option['price'] ) ),
                    'addon' 	=> $addon,
                    'option' 	=> $option
                  );

                endif;

              endforeach;

            break;
            case "select" :
            case "radio" :

              // Posted var = name, value = label
              $posted = (isset( $_POST['addon-' . sanitize_title( $addon['name'] )] )) ? $_POST['addon-' . sanitize_title( $addon['name'] )] : '';

              if (!$posted) continue;

              $chosen_option = '';

              foreach ($addon['options'] as $option) :
                if (sanitize_title($option['label'])==$posted) :
                  $chosen_option = $option;
                  break;
                endif;
              endforeach;

              if (!$chosen_option) continue;

              $cart_item_meta['addons'][] = array(
                'name' 		=> esc_attr( $addon['name'] ),
                'value'		=> esc_attr( $chosen_option['label'] ),
                'price' 	=> esc_attr( apply_filters( 'jigoshop_multi_currencies_exchange', $chosen_option['price'] ) ),
                'addon' 	=> $addon,
                'option' 	=> $chosen_option
              );

            break;
            case "textarea" :
            case "datepicker" :
            case "custom" :

              // Posted var = label, value = custom
              foreach ($addon['options'] as $option) :

                $posted = (isset( $_POST['addon-' . sanitize_title( $addon['name'] ) . '-' . sanitize_title( $option['label'] )] )) ? $_POST['addon-' . sanitize_title( $addon['name'] ) . '-' . sanitize_title( $option['label'] )] : '';

                if (!$posted) continue;

                $price_value = apply_filters( 'jigoshop_multi_currencies_exchange', $option['price'] );
                $price = $price_value > 0 ? " (". jigoshop_price( $price_value ) .")" : "";
                $label = $option['label'] != '' ? $option['label'].$price.": " : ( $price != '' ? $price.": " : "");

                $cart_item_meta['addons'][] = array(
                  'name'  	=> esc_attr( $addon['name'] ),
                  'value' 	=> esc_attr( stripslashes( trim( $posted ) ) ),
                  'display'	=> $label.esc_attr( stripslashes( trim( $posted ) ) ),
                  'price' 	=> esc_attr( $price_value ),
                  'addon' 	=> $addon,
                  'option'	=> $option
                );

              endforeach;

            break;
            case "file_upload" :

              /** WordPress Administration File API */
              include_once(ABSPATH . 'wp-admin/includes/file.php');
              /** WordPress Media Administration API */
              include_once(ABSPATH . 'wp-admin/includes/media.php');

              add_filter('upload_dir',  array(&$this, 'upload_dir'));

              foreach ($addon['options'] as $option) {

                $field_name = 'addon-' . sanitize_title( $addon['name'] ) . '-' . sanitize_title( $option['label'] );

                if (isset( $_FILES[$field_name] ) && !empty( $_FILES[$field_name]) && !empty($_FILES[$field_name]['name'])) {

                  $file   = $_FILES[$field_name];
                  $upload = wp_handle_upload($file, array('test_form' => false));
                  if(!isset($upload['error']) && isset($upload['file'])) {

                    $file_path = $upload['url'];

                    $cart_item_meta['addons'][] = array(
                      'name'  	=> esc_attr( $addon['name'] ),
                      'value' 	=> esc_attr( stripslashes( trim( $file_path ) ) ),
                      'display'	=> basename( esc_attr( stripslashes( trim( $file_path ) ) ) ),
                      'price' 	=> esc_attr( apply_filters( 'jigoshop_multi_currencies_exchange', $option['price'] ) ),
                      'addon' 	=> $addon,
                      'option' 	=> $option
                    );

                  } else {

                    jigoshop::add_error( $upload['error'] );

                  }
                }

              }

              remove_filter('upload_dir',  array(&$this, 'upload_dir'));
            break;
            default:
              $cart_item_meta = apply_filters('jigoshop_product_addons_add_cart_item', $cart_item_meta, $addon );
            break;
          endswitch;

        endforeach;

        return $cart_item_meta;

      }

      function max_upload_size() {
        $u_bytes = $this->convert_hr_to_bytes( ini_get( 'upload_max_filesize' ) );
        $p_bytes = $this->convert_hr_to_bytes( ini_get( 'post_max_size' ) );
        $bytes = apply_filters( 'upload_size_limit', min($u_bytes, $p_bytes), $u_bytes, $p_bytes );
        return $this->convert_bytes_to_hr( $bytes );
      }

      function convert_hr_to_bytes( $size ) {
        $size = strtolower($size);
        $bytes = (int) $size;
        if ( strpos($size, 'k') !== false )
          $bytes = intval($size) * 1024;
        elseif ( strpos($size, 'm') !== false )
          $bytes = intval($size) * 1024 * 1024;
        elseif ( strpos($size, 'g') !== false )
          $bytes = intval($size) * 1024 * 1024 * 1024;
        return $bytes;
      }

      function convert_bytes_to_hr( $bytes ) {
        $units = array( 0 => 'B', 1 => 'kB', 2 => 'MB', 3 => 'GB' );
        $log = log( $bytes, 1024 );
        $power = (int) $log;
        $size = pow(1024, $log - $power);
        return $size . $units[$power];
      }

      function upload_dir( $pathdata ) {
        $subdir = '/product_addons_uploads/'.md5(session_id());
        $pathdata['path'] = str_replace($pathdata['subdir'], $subdir, $pathdata['path']);
        $pathdata['url'] = str_replace($pathdata['subdir'], $subdir, $pathdata['url']);
        $pathdata['subdir'] = str_replace($pathdata['subdir'], $subdir, $pathdata['subdir']);
        return $pathdata;
      }

      function get_cart_item_from_session( $cart_item, $values ) {
        if (isset($values['addons'])) :
          $cart_item['addons'] = $values['addons'];
          $cart_item = $this->add_cart_item( $cart_item, array() );
        endif;
        return $cart_item;

      }

      function get_item_data( $other_data, $cart_item ) {
        if (isset($cart_item['addons'])) {

          foreach ($cart_item['addons'] as $addon) {

            $name = $addon['name'];

            $valueAdd = '';
            if ($addon['price'] > 0) $valueAdd .= ' (' . jigoshop_price($addon['price']) . ')';

            $valueDisplay = isset($addon['display']) ? $addon['display'] : $addon['value'].$valueAdd;

            if ($addon['addon']['type'] == 'file_upload')
            {
              if (strpos($addon['value'],get_option('siteurl')) === 0) {
                $prefix = $addon['option']['label'].$valueAdd;
                $valueDisplay = $prefix.': <a href="'.$addon['value'].'">'.$addon['display'].'</a>';
              }
              elseif (strpos($addon['value'],'http://') === 0 || strpos($addon['value'],'https://') === 0) {
                $prefix = $addon['option']['label'].$valueAdd;
                $valueDisplay = $prefix.': <a href="'.$addon['value'].'">'.$addon['display'].'</a>';
              }
            }

            $other_data[] = apply_filters('jigoshop_product_addons_get_item_data',array(
              'name' => $name,
              'display' => $valueDisplay,
            ), $cart_item, $addon, $valueAdd);

          }

        }

        return $other_data;

      }

      function add_cart_item( $cart_item, $cart_item_data ) {
        // Adjust price if addons are set
        if ( isset( $cart_item_data['addons'] ) ) {

          $extra_cost = 0;

          foreach ( $cart_item_data['addons'] as $key => $addon ) {

            if ( $addon['price'] > 0 && !isset( $cart_item_data['addons'][$key]['price_added'] ) ) {
              $extra_cost += $addon['price'];
              $cart_item_data['addons'][$key]['price_added'] = true;
            }

          }

          $cart_item['data']->adjust_price( $extra_cost );

        }
        return array_merge($cart_item, $cart_item_data);

      }

      function new_order_item( $item, $values ) {

        // Store order item meta data
        $order_item_meta = new addon_order_item_meta();
        $order_item_meta->new_order_item( $values );
        $item['item_meta'] = $order_item_meta->meta;

        return $item;
      }

      function update_order_item( $item ) {

        // put order items in cache
        if (is_null($this->orderItems) && !is_array($this->orderItems))
        {
          $this->orderItems = get_post_meta( get_the_ID(), 'order_items', true );
        }

        foreach ($this->orderItems as $key => $savedItem) {
          $md5 = md5(serialize($savedItem['item_meta']));
          if ($savedItem['id'] == $item['id'] && isset($savedItem['item_meta']) && in_array($md5, $_POST['item_addons_md5']) && !in_array($key,$this->checkedItems)) {
            $item['item_meta'] = $savedItem['item_meta'];
            $this->checkedItems[] = $key;
            break;
          }
        }

        return $item;
      }

      function display_item_data( $item ) {

        if ( isset( $item['item_meta'] ) ) {

          $order_item_meta = new addon_order_item_meta( $item['item_meta'] );
          $order_item_meta->display();

        }

      }

      function order_meta_box_header( ) {
        echo "<th>".__('Addons', 'jigoshop_product_addons')."</th>";
      }

      function order_meta_box( $_product, $item ) {

         ?><td>
            <table class="meta" cellspacing="0">
                  <tbody class="meta_items">
                  <?php
                    if (isset($item['item_meta']) && is_array($item['item_meta']) && sizeof($item['item_meta'])>0) :
                      foreach ($item['item_meta'] as $key => $meta) :

                        $meta_display = null;
                        // Backwards compatibility
                        if (is_array($meta) && isset($meta['meta_name'])) :
                          $meta_name = $meta['meta_name'];
                          $meta_value = $meta['meta_value'];
                          $meta_display = isset($meta['meta_display']) ? $meta['meta_display'] : null;
                        else :
                          $meta_name = $key;
                          $meta_value = $meta;
                        endif;

                        if (strpos($meta_value,get_option('siteurl')) === 0) {
                          $priceAdd = isset($meta['meta_price_sign']) ? ' ('.$meta['meta_price_sign'].')' : '';
                          $prefix = isset($meta['meta_option']) ? $meta['meta_option']['label'].$priceAdd.': ' : '';
                          $display_value = $prefix.'<a href="'.$meta_value.'">'.esc_attr( basename($meta_value) ).'</a>';
                        }
                        elseif (strpos($meta_value,'http://') === 0 || strpos($meta_value,'https://') === 0) {
                          $priceAdd = isset($meta['meta_price_sign']) ? ' ('.$meta['meta_price_sign'].')' : '';
                          $prefix = isset($meta['meta_option']) ? $meta['meta_option']['label'].$priceAdd.': ' : '';
                          $display_value = $prefix.'<a href="'.$meta_value.'">'.esc_attr( $meta_value ).'</a>';
                        }
                        else {
                          $display_value = (null != $meta_display) ? $meta_display : $meta_value;
                        }

                        $display_value = apply_filters('jigoshop_product_addons_order_item_meta_display_value', $display_value, $meta, $item['item_meta']);

                        echo '<tr><td>'.esc_attr( $meta_name ).':</td><td>'.$display_value.'</td></tr>';
                      endforeach;
                      echo '<input type="hidden" name="item_addons_md5[]" value="'.md5(serialize($item['item_meta'])).'"/>';
                    else :
                     echo "-";
                     echo '<input type="hidden" name="item_addons_md5[]" value=""/>';
                    endif;
                  ?>
                  </tbody>
                </table>
             </td>
        <?php
      }

      function display_item_data_email( $item ) {

        $return = '';
        if ( isset( $item['item_meta'] ) ) {
          $order_item_meta = new addon_order_item_meta( $item['item_meta'] );
          $return = $order_item_meta->display(true, true);
        }

        return $return;
      }

      function dateStringToDatepickerFormat($dateString)
      {
        $pattern = array(

          //day
          'd',		//day of the month
          'j',		//3 letter name of the day
          'l',		//full name of the day
          'z',		//day of the year

          //month
          'F',		//Month name full
          'M',		//Month name short
          'n',		//numeric month no leading zeros
          'm',		//numeric month leading zeros

          //year
          'Y', 		//full numeric year
          'y'		//numeric year: 2 digit
        );
        $replace = array(
          'dd','d','DD','o',
          'MM','M','m','mm',
          'yy','y'
        );
        foreach($pattern as &$p)
        {
          $p = '/'.$p.'/';
        }
        return preg_replace($pattern,$replace,$dateString);
      }

      function adjust_price( $price, $item ) {

        if ( isset( $item['item_meta'] ) ) {

          $extra_cost = 0;

          foreach ( $item['item_meta'] as $key => $addon ) {

            if ( $addon['meta_price'] > 0 ) {
              $extra_cost += (float) $addon['meta_price'];
            }

          }

          return $price + $extra_cost;
        }

        return $price;
      }

      function check_extensions() {
        $extensions_dir_name = 'extensions';
        $extensions_dir = WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . dirname( plugin_basename( __FILE__ ) ) . DIRECTORY_SEPARATOR . $extensions_dir_name;
        if (is_dir($extensions_dir)) {
          if ($handle = opendir($extensions_dir)) {
            while (false !== ($entry = readdir($handle))) {
              if (in_array($entry,array('.','..'))) continue;

              if (is_dir($extensions_dir .  DIRECTORY_SEPARATOR . $entry))
              {
                if ($handle_dir = opendir($extensions_dir .  DIRECTORY_SEPARATOR . $entry)) {
                  while (false !== ($file = readdir($handle_dir))) {
                    if (in_array($file,array('.','..'))) continue;
                    // require only php files
                    if (strpos($file,'.php') == false) continue;
                    require_once($extensions_dir_name .  DIRECTORY_SEPARATOR . $entry .  DIRECTORY_SEPARATOR . $file);

                    $class_name = basename($file, ".class.php");
                    if (isset(${$class_name}) && is_object(${$class_name}) && method_exists(${$class_name}, 'setContext'))
                    {
                      $obj = ${$class_name};
                      $obj->setContext($this);
                    }
                  }
                }
              }
              else
              {
                // require only php files
                if (strpos($entry,'.php') == false) continue;
                require_once($extensions_dir_name .  DIRECTORY_SEPARATOR . $entry);

                $class_name = basename($file, ".class.php");
                if ($class_name && is_object(${$class_name}) && method_exists(${$class_name}, 'setContext'))
                {
                  $obj = ${$class_name};
                  $obj->setContext($this);
                }
              }
            }
            closedir($handle);
          }
        }
      }

      public function rebuild_cart($cart) {
        if (isset($cart['addons']))
        {
          $extra_costs = 0;
          foreach ($cart['addons'] as $key => $addon)
          {
            switch ($addon['addon']['type'])
            {
              case "checkbox" :
              case "select" :
              case "radio" :
              case "file_upload" :

                $addon['price'] = esc_attr( apply_filters( 'jigoshop_multi_currencies_exchange', $addon['option']['price'] ) );

              break;
              case "textarea" :
              case "datepicker" :
              case "custom" :

                $price_value = apply_filters( 'jigoshop_multi_currencies_exchange', $addon['option']['price'] );
                $price = $price_value > 0 ? " (".esc_attr( jigoshop_price( $price_value ) ).")" : "";
                $label = $addon['option']['label'] != '' ? $addon['option']['label'].$price.": " : ( $price != '' ? $price.": " : "");

                $addon['display'] = $label.$addon['value'];
                $addon['price'] = esc_attr( $price_value );

              break;
              default:
                $addon = apply_filters('jigoshop_product_addons_rebuild_cart_item', $addon, $cart );
              break;

            }
            $extra_costs += $addon['price'];
            $cart['addons'][$key] = $addon;
          }

          $cart['data']->adjust_price( $extra_costs );

        }
        return $cart;
      }

    }

    new jigoshop_product_addons();

  }

}

function jigoshop_product_addons_activation_check(){
       if (defined('JIGOSHOP_PRODUCT_ADDONS_ENABLED')) {
         wp_die("Sorry, but you can't activate this plugin, because other Jigoshop Addon Plugin is activated. Please deactive the other one and then activate this one once again.");
       }
}
register_activation_hook(__FILE__, 'jigoshop_product_addons_activation_check');