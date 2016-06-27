<?php
/*
Plugin Name: Disable Right Click
Plugin URI:
Description: Disable right click plugin prevents right click which avoids copying website content and source code up to some extent.
Author: Shrinivas Naik
Version: 1.1
Author URI: http://techsini.com
*/

if(!class_exists('disable_right_click')){

    class disable_right_click{

        public function __construct(){

            //Activate the plugin for first time
            register_activation_hook(__FILE__, array($this, "activate"));


            //Load scipts and styles
            add_action('wp_enqueue_scripts', array($this, 'register_scripts'));
            add_action('wp_enqueue_scripts', array($this, 'register_styles'));

            //Run the plugin in footer
            add_action('wp_footer', array($this, 'run_plugin'));

        }


        public function activate(){

        }

        public function deactivate(){

        }

        public function register_scripts(){
            if(!is_page( 'contact-us' )){
                wp_enqueue_script('jquery');
                wp_enqueue_script('jquery-ui-dialog');

                wp_register_script('no_right_click_js',plugins_url( 'disable-right-click-js.js' , __FILE__ ),array( 'jquery' ));
                wp_enqueue_script('no_right_click_js');
            }
        }

        public function register_styles(){
            wp_register_style( 'jquery_ui_modal_box', plugins_url('jquery-ui.css', __FILE__) );
            wp_enqueue_style( 'jquery_ui_modal_box' );
        }

        public function run_plugin() {
            ?>
            <div id="dialog-message" title="Sorry.." style="display:none">
                <p style="padding:10px 5px; line-height:2">
                    Sorry!.. Right click menu has been disabled for <strong><?php echo get_bloginfo('name');?></strong>.
                </p>

            </div>

            <?php

        }

    }

}


$disable_right_click = new disable_right_click();

?>
