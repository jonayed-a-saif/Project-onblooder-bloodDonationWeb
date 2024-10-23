<?php
/**
 * Plugin Name: Webteck Core
 * Description: This is a helper plugin of webteck theme
 * Version:     1.0
 * Author:      Themeholy
 * Author URI:  http://angfuzsoft.com/
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: webteck
 */



 // Blocking direct access

if( ! defined( 'ABSPATH' ) ) {

    exit();

}



// Define Constant

define( 'WEBTECK_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

define( 'WEBTECK_PLUGIN_INC_PATH', plugin_dir_path( __FILE__ ) . 'inc/' );
define( 'WEBTECK_PLUGIN_CMB2EXT_PATH', plugin_dir_path( __FILE__ ) . 'cmb2-ext/' );

define( 'WEBTECK_PLUGIN_WIDGET_PATH', plugin_dir_path( __FILE__ ) . 'inc/widgets/' );

define( 'WEBTECK_PLUGDIRURI', plugin_dir_url( __FILE__ ) );

define( 'WEBTECK_ADDONS', plugin_dir_path( __FILE__ ) .'addons/' );

define( 'WEBTECK_CORE_PLUGIN_TEMP', plugin_dir_path( __FILE__ ) .'webteck-template/' );



// load textdomain

load_plugin_textdomain( 'webteck', false, basename( dirname( __FILE__ ) ) . '/languages' );



//include file.

require_once WEBTECK_PLUGIN_INC_PATH .'webteckcore-functions.php';
require_once WEBTECK_PLUGIN_INC_PATH .'builder/builder.php';
require_once WEBTECK_PLUGIN_INC_PATH . 'MCAPI.class.php';
require_once WEBTECK_PLUGIN_INC_PATH .'webteckajax.php';
require_once WEBTECK_PLUGIN_INC_PATH .'webteck-elementor-functions.php';

require_once WEBTECK_PLUGIN_CMB2EXT_PATH . 'cmb2ext-init.php';



//Widget

require_once WEBTECK_PLUGIN_WIDGET_PATH . 'recent-post-widget.php';
require_once WEBTECK_PLUGIN_WIDGET_PATH . 'about-me.php';
require_once WEBTECK_PLUGIN_WIDGET_PATH . 'about-us-widget.php';
require_once WEBTECK_PLUGIN_WIDGET_PATH . 'webteck-cta.php';



//addons

require_once WEBTECK_ADDONS . 'addons.php';

// Register widget styles
add_action( 'elementor/editor/before_enqueue_styles', 'widget_styles' );


function widget_styles() {

    wp_register_style( 'editor-style-1', plugins_url( 'assets/css/editor.css', __FILE__ ) );
    wp_enqueue_style( 'editor-style-1' );

}