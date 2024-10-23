<?php

/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

 /**
 * Only return default value if we don't have a post ID (in the 'post' query variable)
 *
 * @param  bool  $default On/Off (true/false)
 * @return mixed          Returns true or '', the blank default
 */
function webteck_set_checkbox_default_for_new_post( $default ) {
	return isset( $_GET['post'] ) ? '' : ( $default ? (string) $default : '' );
}

add_action( 'cmb2_admin_init', 'webteck_register_metabox' );

/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */

function webteck_register_metabox() {

	$prefix = '_webteck_';

	$prefixpage = '_webteckpage_';
	
	
	$webteck_post_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'blog_post_control',
		'title'         => esc_html__( 'Post Thumb Controller', 'webteck' ),
		'object_types'  => array( 'post' ), // Post type
		'closed'        => true
	) );
	$webteck_post_meta->add_field( array(
		'name' => esc_html__( 'Post Format Video', 'webteck' ),
		'desc' => esc_html__( 'Use This Field When Post Format Video', 'webteck' ),
		'id'   => $prefix . 'post_format_video',
        'type' => 'text_url',
    ) );
	$webteck_post_meta->add_field( array(
		'name' => esc_html__( 'Post Format Audio', 'webteck' ),
		'desc' => esc_html__( 'Use This Field When Post Format Audio', 'webteck' ),
		'id'   => $prefix . 'post_format_audio',
        'type' => 'oembed',
    ) );
	$webteck_post_meta->add_field( array(
		'name' => esc_html__( 'Post Thumbnail For Slider', 'webteck' ),
		'desc' => esc_html__( 'Use This Field When You Want A Slider In Post Thumbnail', 'webteck' ),
		'id'   => $prefix . 'post_format_slider',
        'type' => 'file_list',
    ) );
	
	$webteck_page_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'page_meta_section',
		'title'         => esc_html__( 'Page Meta', 'webteck' ),
		'object_types'  => array( 'page', 'webteck_event' ), // Post type
        'closed'        => true
    ) );

    $webteck_page_meta->add_field( array(
		'name' => esc_html__( 'Page Breadcrumb Area', 'webteck' ),
		'desc' => esc_html__( 'check to display page breadcrumb area.', 'webteck' ),
		'id'   => $prefix . 'page_breadcrumb_area',
        'type' => 'select',
        'default' => '1',
        'options'   => array(
            '1'   => esc_html__('Show','webteck'),
            '2'     => esc_html__('Hide','webteck'),
        )
    ) );


    $webteck_page_meta->add_field( array(
		'name' => esc_html__( 'Page Breadcrumb Settings', 'webteck' ),
		'id'   => $prefix . 'page_breadcrumb_settings',
        'type' => 'select',
        'default'   => 'global',
        'options'   => array(
            'global'   => esc_html__('Global Settings','webteck'),
            'page'     => esc_html__('Page Settings','webteck'),
        )
	) );

    $webteck_page_meta->add_field( array(
        'name'    => esc_html__( 'Breadcumb Image', 'webteck' ),
        'desc'    => esc_html__( 'Upload an image or enter an URL.', 'webteck' ),
        'id'      => $prefix . 'breadcumb_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => __( 'Add File', 'webteck' ) // Change upload button text. Default: "Add or Upload File"
        ),
        'preview_size' => 'large', // Image size to use when previewing in the admin.
    ) );

    $webteck_page_meta->add_field( array(
		'name' => esc_html__( 'Page Title', 'webteck' ),
		'desc' => esc_html__( 'check to display Page Title.', 'webteck' ),
		'id'   => $prefix . 'page_title',
        'type' => 'select',
        'default' => '1',
        'options'   => array(
            '1'   => esc_html__('Show','webteck'),
            '2'     => esc_html__('Hide','webteck'),
        )
	) );

    $webteck_page_meta->add_field( array(
		'name' => esc_html__( 'Page Title Settings', 'webteck' ),
		'id'   => $prefix . 'page_title_settings',
        'type' => 'select',
        'options'   => array(
            'default'  => esc_html__('Default Title','webteck'),
            'custom'  => esc_html__('Custom Title','webteck'),
        ),
        'default'   => 'default'
    ) );

    $webteck_page_meta->add_field( array(
		'name' => esc_html__( 'Custom Page Title', 'webteck' ),
		'id'   => $prefix . 'custom_page_title',
        'type' => 'text'
    ) );

    $webteck_page_meta->add_field( array(
		'name' => esc_html__( 'Breadcrumb', 'webteck' ),
		'desc' => esc_html__( 'Select Show to display breadcrumb area', 'webteck' ),
		'id'   => $prefix . 'page_breadcrumb_trigger',
        'type' => 'switch_btn',
        'default' => webteck_set_checkbox_default_for_new_post( true ),
    ) );

    $webteck_layout_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'page_layout_section',
		'title'         => esc_html__( 'Page Layout', 'webteck' ),
        'context' 		=> 'side',
        'priority' 		=> 'high',
        'object_types'  => array( 'page' ), // Post type
        'closed'        => true
	) );

	$webteck_layout_meta->add_field( array(
		'desc'       => esc_html__( 'Set page layout container,container fluid,fullwidth or both. It\'s work only in template builder page.', 'webteck' ),
		'id'         => $prefix . 'custom_page_layout',
		'type'       => 'radio',
        'options' => array(
            '1' => esc_html__( 'Container', 'webteck' ),
            '2' => esc_html__( 'Container Fluid', 'webteck' ),
            '3' => esc_html__( 'Fullwidth', 'webteck' ),
        ),
	) );
    $webteck_layout_meta->add_field( array(
        'name' => esc_html__( 'Insert Your Body Class', 'webteck' ),
        'id'   => $prefix . 'custom_body_class',
        'type' => 'text',
        'desc' => esc_html__( 'use this body class for dark version " home-dark "', 'webteck' ),
    ) );
    


    $webteck_product_meta = new_cmb2_box( array(
        'id'            => $prefixpage . 'product_meta_section_extra_description',
        'title'         => esc_html__( 'Product Extra Description Area', 'webteck' ),
        'object_types'  => array( 'product' ), // Post type
        'closed'        => true,
        'context'       => 'side',
        'priority'      => 'default'
    ) );

    $webteck_product_meta->add_field( array(
        'name' => esc_html__( 'Extra Description', 'webteck' ),
        'id'   => $prefix . 'extra_description',
        'type' => 'textarea'
    ) );
}

add_action( 'cmb2_admin_init', 'webteck_register_taxonomy_metabox' );
/**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
function webteck_register_taxonomy_metabox() {

    $prefix = '_webteck_';
	/**
	 * Metabox to add fields to categories and tags
	 */
	$webteck_term_meta = new_cmb2_box( array(
		'id'               => $prefix.'term_edit',
		'title'            => esc_html__( 'Category Metabox', 'webteck' ),
		'object_types'     => array( 'term' ),
		'taxonomies'       => array( 'category'),
	) );
	$webteck_term_meta->add_field( array(
		'name'     => esc_html__( 'Extra Info', 'webteck' ),
		'id'       => $prefix.'term_extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );
	$webteck_term_meta->add_field( array(
		'name' => esc_html__( 'Category Image', 'webteck' ),
		'desc' => esc_html__( 'Set Category Image', 'webteck' ),
		'id'   => $prefix.'term_avatar',
        'type' => 'file',
        'text'    => array(
			'add_upload_file_text' => esc_html__('Add Image','webteck') // Change upload button text. Default: "Add or Upload File"
		),
	) );


	/**
	 * Metabox for the user profile screen
	 */
	$webteck_user = new_cmb2_box( array(
		'id'               => $prefix.'user_edit',
		'title'            => esc_html__( 'User Profile Metabox', 'webteck' ), // Doesn't output for user boxes
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta as post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );
	$webteck_user->add_field( array(
		'name'     => esc_html__( 'Social Profile', 'webteck' ),
		'id'       => $prefix.'user_extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$group_field_id = $webteck_user->add_field( array(
        'id'          => $prefix .'social_profile_group',
        'type'        => 'group',
        'description' => __( 'Social Profile', 'webteck' ),
        'options'     => array(
            'group_title'       => __( 'Social Profile {#}', 'webteck' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Add Another Social Profile', 'webteck' ),
            'remove_button'     => __( 'Remove Social Profile', 'webteck' ),
            'closed'         => true
        ),
    ) );

    $webteck_user->add_group_field( $group_field_id, array(
        'name'        => __( 'Icon Class', 'webteck' ),
        'id'          => $prefix .'social_profile_icon',
        'type'        => 'text', // This field type
    ) );

    $webteck_user->add_group_field( $group_field_id, array(
        'desc'       => esc_html__( 'Set social profile link.', 'webteck' ),
        'id'         => $prefix . 'lawyer_social_profile_link',
        'name'       => esc_html__( 'Social Profile link', 'webteck' ),
        'type'       => 'text'
    ) );
}
