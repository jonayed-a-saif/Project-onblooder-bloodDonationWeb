<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( );
}
/**
 * @Packge    : webteck
 * @version   : 1.0
 * @Author    : Themeholy
 * @Author URI: https://www.themeholy.com/
 */

// demo import file
function webteck_import_files() {

	$demoImg = '<img src="'. WEBTECK_DEMO_DIR_URI  .'screen-image.png" alt="'.esc_attr__('Demo Preview Imgae','webteck').'" />';

    return array(
        array(
            'import_file_name'             => esc_html__('Webteck Demo','webteck'),
            'local_import_file'            =>  WEBTECK_DEMO_DIR_PATH  . 'webteck-demo.xml',
            'local_import_widget_file'     =>  WEBTECK_DEMO_DIR_PATH  . 'webteck-widgets-demo.json',
            'local_import_redux'           => array(
                array(
                    'file_path'   =>  WEBTECK_DEMO_DIR_PATH . 'redux_options_demo.json',
                    'option_name' => 'webteck_opt',
                ),
            ),
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'webteck_import_files' );

// demo import setup
function webteck_after_import_setup() {
	// Assign menus to their locations.

	$primary_menu  		= get_term_by( 'name', 'Primary Menu', 'nav_menu' );
	$footer_menu  		= get_term_by( 'name', 'Footer Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary-menu'   	=> $primary_menu->term_id,
			'footer-menu'   	=> $footer_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id 	= get_page_by_title( 'Digital Agency' );
	$blog_page_id  	= get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
  
}
add_action( 'pt-ocdi/after_import', 'webteck_after_import_setup' );


//disable the branding notice after successful demo import
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

//change the location, title and other parameters of the plugin page
function webteck_import_plugin_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title']  = esc_html__( 'Webteck Demo Import' , 'webteck' );
	$default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'webteck' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'webteck-demo-import';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'webteck_import_plugin_page_setup' );

// Enqueue scripts
function webteck_demo_import_custom_scripts(){
	if( isset( $_GET['page'] ) && $_GET['page'] == 'webteck-demo-import' ){
		// style
		wp_enqueue_style( 'webteck-demo-import', WEBTECK_DEMO_DIR_URI.'css/webteck.demo.import.css', array(), '1.0', false );
	}
}
add_action( 'admin_enqueue_scripts', 'webteck_demo_import_custom_scripts' );