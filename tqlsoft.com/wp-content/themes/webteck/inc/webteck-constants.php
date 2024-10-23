<?php
/**
 * @Packge     : Webteck
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://www.themeholy.com/
 *
 */

// Block direct access
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 *
 * Define constant
 *
 */

// Base URI
if ( ! defined( 'WEBTECK_DIR_URI' ) ) {
    define('WEBTECK_DIR_URI', get_parent_theme_file_uri().'/' );
}

// Assist URI
if ( ! defined( 'WEBTECK_DIR_ASSIST_URI' ) ) {
    define( 'WEBTECK_DIR_ASSIST_URI', get_theme_file_uri('/assets/') );
}


// Css File URI
if ( ! defined( 'WEBTECK_DIR_CSS_URI' ) ) {
    define( 'WEBTECK_DIR_CSS_URI', get_theme_file_uri('/assets/css/') );
}

// Js File URI
if (!defined('WEBTECK_DIR_JS_URI')) {
    define('WEBTECK_DIR_JS_URI', get_theme_file_uri('/assets/js/'));
}


// Base Directory
if (!defined('WEBTECK_DIR_PATH')) {
    define('WEBTECK_DIR_PATH', get_parent_theme_file_path() . '/');
}

//Inc Folder Directory
if (!defined('WEBTECK_DIR_PATH_INC')) {
    define('WEBTECK_DIR_PATH_INC', WEBTECK_DIR_PATH . 'inc/');
}

//WEBTECK framework Folder Directory
if (!defined('WEBTECK_DIR_PATH_FRAM')) {
    define('WEBTECK_DIR_PATH_FRAM', WEBTECK_DIR_PATH_INC . 'webteck-framework/');
}

//Hooks Folder Directory
if (!defined('WEBTECK_DIR_PATH_HOOKS')) {
    define('WEBTECK_DIR_PATH_HOOKS', WEBTECK_DIR_PATH_INC . 'hooks/');
}

//Demo Data Folder Directory Path
if( !defined( 'WEBTECK_DEMO_DIR_PATH' ) ){
    define( 'WEBTECK_DEMO_DIR_PATH', WEBTECK_DIR_PATH_INC.'demo-data/' );
}
    
//Demo Data Folder Directory URI
if( !defined( 'WEBTECK_DEMO_DIR_URI' ) ){
    define( 'WEBTECK_DEMO_DIR_URI', WEBTECK_DIR_URI.'inc/demo-data/' );
}