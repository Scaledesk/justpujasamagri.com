<?php
/**
 * Addon Order Item Meta Class
 *
 */
class addon_order_item_meta {

  var $meta;

  /**
   * Constructor
   *
   * @param array $order_item_meta
   */
  function __construct( $order_item_meta = '' ) {
    $this->meta = array();

    if ( $order_item_meta ) {
      $this->meta = $order_item_meta;
    }
  }

  /**
   * Prepares meta values for order item
   *
   * @param array $order_item
   */
  function new_order_item( $order_item )
  {
        if ( $order_item ) {

            // Add the fields
            if (isset($order_item['addons'])) {

                foreach ($order_item['addons'] as $addon) {

                    $name       = $addon['name'];
                    $value      = $addon['value'];
                    $addonArr   = isset( $addon['addon'] ) ? $addon['addon'] : '';
                    $optionArr  = isset( $addon['option'] ) ? $addon['option'] : '';

                    $this->add(
                        $name,
                        $value,
                        isset( $addon['display'] ) ? $addon['display'] : null,
                        $addon['price'] > 0 ? $addon['price'] : 0,
                        $addonArr,
                        $optionArr,
                        $order_item['data']->ID
                    );
                }
            }
        }
  }

  /**
   * Adds pair meta, value
   *
   * @param string $name
   * @param string $value
   */
  function add( $name, $value, $display = null, $price = 0, $addon = '', $option = '', $prod_id = 0 ) {
    $this->meta[] = array(
        'meta_name'         => $name,
        'meta_value' 	    => $value,
        'meta_display'      => $display,
        'meta_price'        => $price,
        'meta_price_sign'   => jigoshop_price($price),
        'meta_addon'        => $addon,
        'meta_option'       => $option,
        'prod_id'           => $prod_id
    );
  }

  /**
   * Displays or returns meta
   *
   * @param boolean $flat
   * @param boolean $return
   */
  function display( $flat = false, $return = false ) {

    if ( $this->meta && is_array( $this->meta ) ) {

      if ( !$flat ) {
        $output = '<dl class="variation">';
      }
      else {
        $output = '';
      }

      $meta_list = array();

      foreach ( $this->meta as $meta ) {

        $name 	= $meta['meta_name'];
        $value	= !empty($meta['meta_display']) ? $meta['meta_display'] : $meta['meta_value'];

        if (!$value) continue;

        // If this is a term slug, get the term's nice name
        if ( taxonomy_exists( esc_attr( str_replace( 'attribute_', '', $name ) ) ) ) {
          $term = get_term_by('slug', $value, esc_attr(str_replace('attribute_', '', $name)));
          if ( !is_wp_error( $term ) && $term->name ) {
            $value = $term->name;
          }
        }
        elseif (strpos($meta['meta_value'],get_option('siteurl')) === 0) {
          $priceAdd = isset($meta['meta_price_sign']) ? ' ('.$meta['meta_price_sign'].')' : '';
          $prefix = isset($meta['meta_option']) ? $meta['meta_option']['label'].$priceAdd.': ' : '';

          if ( $flat ) {
            $value = $prefix.$meta['meta_value'];
          }
          else {
            $value = $prefix.'<a href="'.$meta['meta_value'].'">'.esc_attr( basename($value) ).'</a>';
          }
        }
        elseif (strpos($meta['meta_value'],'http://') === 0 || strpos($meta['meta_value'],'https://') === 0) {
          $priceAdd = isset($meta['meta_price_sign']) ? ' ('.$meta['meta_price_sign'].')' : '';
          $prefix = isset($meta['meta_option']) ? $meta['meta_option']['label'].$priceAdd.': ' : '';

          if ($flat) {
            $value = $prefix.$meta['meta_value'];
          }
          else {
            $value = $prefix.'<a href="'.$meta['meta_value'].'">'.esc_attr( $value ).'</a>';
          }
        }

        $value      = apply_filters('jigoshop_product_addons_order_item_meta_value', $value, $flat, $meta, $this->meta);
        $product    = new jigoshop_product( $meta['prod_id'] );

        if ( $flat ) {
          $meta_list[] = $product->attribute_label( str_replace( 'attribute_', '', $name ) ).': '.$value;
        }
        else {
          $meta_list[] = '<dt>' . $product->attribute_label( str_replace( 'attribute_', '', $name ) ) . ':</dt><dd>' . $value . '</dd>';
        }
      }

      if ($flat) {
        $output .= implode( ', '.PHP_EOL, $meta_list );
      }
      else {
        $output .= implode( '', $meta_list );
      }

      if ( !$flat ) $output .= '</dl>';

      if ( $return ) {
        return $output.PHP_EOL;
      }
      else {
        echo $output;
      }

    }

  }

}
