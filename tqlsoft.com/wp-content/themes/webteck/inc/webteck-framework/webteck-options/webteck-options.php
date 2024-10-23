<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "webteck_opt";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }


    $alowhtml = array(
        'p' => array(
            'class' => array()
        ),
        'span' => array()
    );


    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => '',
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Webteck Options', 'webteck' ),
        'page_title'           => esc_html__( 'Webteck Options', 'webteck' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );


    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'webteck' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'webteck' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'webteck' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'webteck' )
        )
    );
    Redux::set_help_tab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'webteck' );
    Redux::set_help_sidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */


    // -> START General Fields

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General', 'webteck' ),
        'id'               => 'webteck_general',
        'customizer_width' => '450px',
        'icon'             => 'el el-cog',
        'fields'           => array(
            array(
                'id'       => 'webteck_theme_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Theme Primary Color', 'webteck' ),
                'subtitle' => esc_html__( 'Set Theme Color', 'webteck' )
            ),
            array(
                'id'       => 'webteck_theme_title_typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'Title Typography', 'webteck' ),
                'subtitle' => esc_html__( 'Set Theme title font family', 'webteck'  ),
                'google'      => true, 
                'font-size' => false,
                'line-height' => false,
                'subsets' => false,
                'text-align' => false,
                'color' => false,
                'font-style' => false,
                'font-weight' => false,
                'output'      => array(''),
            ),
            array(
                'id'       => 'webteck_theme_body_typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Typography', 'webteck' ),
                'subtitle' => esc_html__( 'Set Theme body font family', 'webteck'  ),
                'google'      => true, 
                'font-size' => false,
                'line-height' => false,
                'subsets' => false,
                'text-align' => false,
                'color' => false,
                'font-style' => false,
                'font-weight' => false,
                'output'      => array(''),
            ),
            array(
                'id'       => 'webteck_map_apikey',
                'type'     => 'text',
                'title'    => esc_html__( 'Map Api Key', 'webteck' ),
                'subtitle' => esc_html__( 'Set Map Api Key', 'webteck' ),
            ),
        )

    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Back To Top', 'webteck' ),
        'id'               => 'webteck_backtotop',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'webteck_display_bcktotop',
                'type'     => 'switch',
                'title'    => esc_html__( 'Back To Top Button', 'webteck' ),
                'subtitle' => esc_html__( 'Switch On to Display back to top button.', 'webteck' ),
                'default'  => true,
                'on'       => esc_html__( 'Enabled', 'webteck' ),
                'off'      => esc_html__( 'Disabled', 'webteck' ),
            ),
            array(
                'id'       => 'webteck_custom_bcktotop',
                'type'     => 'switch',
                'title'    => esc_html__( 'Custom Back To Top Button', 'webteck' ),
                'subtitle' => esc_html__( 'If you select "Disabled", it will show default design for "back to top" button.', 'webteck' ),
                'default'  => false,
                'on'       => esc_html__( 'Enabled', 'webteck' ),
                'off'      => esc_html__( 'Disabled', 'webteck' ),
                'required' => array('webteck_display_bcktotop','equals','1'),
            ),
            array(
                'id'       => 'webteck_bcktotop_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Back To Top Button Background Color', 'webteck' ),
                'subtitle' => esc_html__( 'Set Back to top button Background Color.', 'webteck' ),
                'required' => array('webteck_display_bcktotop','equals','1'),
                'output'   => array( 'background-color' =>'.scroll-btn i' ),
            ),
            array(
                'id'       => 'webteck_bcktotop_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Back To Top Icon Color', 'webteck' ),
                'subtitle' => esc_html__( 'Set Back to top Icon Color.', 'webteck' ),
                'required' => array('webteck_display_bcktotop','equals','1'),
                'output'   => array( '.scrollToTop i' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Preloader', 'webteck' ),
        'id'               => 'webteck_preloader',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'webteck_display_preloader',
                'type'     => 'switch',
                'title'    => esc_html__( 'Preloader', 'webteck' ),
                'subtitle' => esc_html__( 'Switch Enabled to Display Preloader.', 'webteck' ),
                'default'  => true,
                'on'       => esc_html__('Enabled','webteck'),
                'off'      => esc_html__('Disabled','webteck'),
            ),
            array(
                'id'       => 'webteck_preloader_text',
                'type'     => 'text',
                'validate' => 'html',
                'default'  => esc_html__( 'WEBTECK', 'webteck' ),
            ),
            array(
                'id'       => 'webteck_mouse_effect',
                'type'     => 'switch',
                'title'    => esc_html__( 'Mouse Courser Effect', 'webteck' ),
                'default'  => true,
                'on'       => esc_html__('Enabled','webteck'),
                'off'      => esc_html__('Disabled','webteck'),
            ),

            

        )
    ));

    /* End General Fields */

    /* Admin Lebel Fields */
    Redux::setSection( $opt_name, array(
        'title'             => esc_html__( 'Admin Label', 'webteck' ),
        'id'                => 'webteck_admin_label',
        'customizer_width'  => '450px',
        'subsection'        => true,
        'fields'            => array(
            array(
                'title'     => esc_html__( 'Admin Login Logo', 'webteck' ),
                'subtitle'  => esc_html__( 'It belongs to the back-end of your website to log-in to admin panel.', 'webteck' ),
                'id'        => 'webteck_admin_login_logo',
                'type'      => 'media',
            ),
            array(
                'title'     => esc_html__( 'Custom CSS For admin', 'webteck' ),
                'subtitle'  => esc_html__( 'Any CSS your write here will run in admin.', 'webteck' ),
                'id'        => 'webteck_theme_admin_custom_css',
                'type'      => 'ace_editor',
                'mode'      => 'css',
                'theme'     => 'chrome',
                'full_width'=> true,
            ),
        ),
    ) );

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'webteck' ),
        'id'               => 'webteck_header',
        'customizer_width' => '400px',
        'icon'             => 'el el-credit-card',
        'fields'           => array(
            array(
                'id'       => 'webteck_header_options',
                'type'     => 'button_set',
                'default'  => '1',
                'options'  => array(
                    "1"   => esc_html__('Prebuilt','webteck'),
                    "2"      => esc_html__('Header Builder','webteck'),
                ),
                'title'    => esc_html__( 'Header Options', 'webteck' ),
                'subtitle' => esc_html__( 'Select header options.', 'webteck' ),
            ),
            array(
                'id'       => 'webteck_header_select_options',
                'type'     => 'select',
                'data'     => 'posts',
                'args'     => array(
                    'post_type'     => 'webteck_header'
                ),
                'title'    => esc_html__( 'Header', 'webteck' ),
                'subtitle' => esc_html__( 'Select header.', 'webteck' ),
                'required' => array( 'webteck_header_options', 'equals', '2' )
            ),
            array(
                'id'       => 'webteck_header_topbar_switcher',
                'type'     => 'switch',
                'default'  => 0,
                'on'       => esc_html__( 'Show', 'webteck' ),
                'off'      => esc_html__( 'Hide', 'webteck' ),
                'title'    => esc_html__( 'Header Topbar?', 'webteck' ),
                'subtitle' => esc_html__( 'Control Header Topbar By Show Or Hide System.', 'webteck'),
                'required' => array( 'webteck_header_options', 'equals', '1' )
            ),                    
            array(
                'id'       => 'webteck_header_topbar_social_icon_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__( 'Show', 'webteck' ),
                'off'      => esc_html__( 'Hide', 'webteck' ),
                'title'    => esc_html__( 'Header Social Icon?', 'webteck' ),
                'subtitle' => esc_html__( 'Click Show To Display Social Icon?', 'webteck'),
                'required' => array( 'webteck_header_topbar_switcher', 'equals', '1' )
            ),
            array(
                'id'       => 'webteck_menu_topbar_location',
                'type'     => 'text',
                'validate' => 'html',
                'title'    => esc_html__( 'Topbar Location :', 'webteck' ),
                'default'  => esc_html__( '54 NJ-12, Flemington, United States', 'webteck' ),
                'required' => array( 'webteck_header_topbar_switcher', 'equals', '1' )
            ), 
            array(
                'id'       => 'webteck_menu_topbar_phone',
                'type'     => 'text',
                'validate' => 'html',
                'title'    => esc_html__( 'Topbar Phone :', 'webteck' ),
                'default'  => esc_html__( '+153-987-3657', 'webteck' ),
                'required' => array( 'webteck_header_topbar_switcher', 'equals', '1' )
            ), 
            array(
                'id'       => 'webteck_menu_topbar_email',
                'type'     => 'text',
                'validate' => 'html',
                'title'    => esc_html__( 'Topbar Email :', 'webteck' ),
                'default'  => esc_html__( 'info@webteck.com', 'webteck' ),
                'required' => array( 'webteck_header_topbar_switcher', 'equals', '1' )
            ), 
            array(
                'id'       => 'webteck_menu_topbar_social_title',
                'type'     => 'text',
                'validate' => 'html',
                'title'    => esc_html__( 'Social Title :', 'webteck' ),
                'default'  => esc_html__( 'Follow Us On :', 'webteck' ),
                'required' => array( 'webteck_header_topbar_switcher', 'equals', '1' )
            ),
            array(
                'id'       => 'webteck_header_btn_text',
                'type'     => 'text',
                'validate' => 'html',
                'default'  => esc_html__( 'Make Appointment', 'webteck' ),
                'title'    => esc_html__( 'Button Text', 'webteck' ),
                'subtitle' => esc_html__( 'Set Button Text', 'webteck' ),
            ),
            array(
                'id'       => 'webteck_btn_url',
                'type'     => 'text',
                'default'  => esc_html__( '#', 'webteck' ),
                'title'    => esc_html__( 'Button URL?', 'webteck' ),
                'subtitle' => esc_html__( 'Set Button URL Here', 'webteck' ),
            ),
            array(
                'id'       => 'webteck_header_topbar_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Header Topbar Color', 'webteck' ),
                'subtitle' => esc_html__( 'Set Topbar Color', 'webteck' ),
                'output'   => array( 'background-color'    =>  '.header-layout1 .header-top' ),
                'required' => array( 'webteck_header_topbar_switcher', 'equals', '1' )
            ),
            array(
                'id'       => 'webteck_header_social_icon_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Header Social Icon Color', 'webteck' ),
                'subtitle' => esc_html__( 'Set Header Social Icon Color', 'webteck' ),
                'output'   => array( 'color'    =>  '.header-social a' ),
                'required' => array( 'webteck_header_topbar_social_icon_switcher', 'equals', '1' )
            ),
        ),
    ) );
    // -> START Header Logo
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Logo', 'webteck' ),
        'id'               => 'webteck_header_logo_option',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'webteck_site_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo', 'webteck' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your site logo for header ( recommendation png format ).', 'webteck' ),
            ),
            array(
                'id'       => 'webteck_site_logo_dimensions',
                'type'     => 'dimensions',
                'units'    => array('px'),
                'title'    => esc_html__('Logo Dimensions (Width/Height).', 'webteck'),
                'output'   => array('.header-logo .logo img'),
                'subtitle' => esc_html__('Set logo dimensions to choose width, height, and unit.', 'webteck'),
            ),
            array(
                'id'       => 'webteck_site_logomargin_dimensions',
                'type'     => 'spacing',
                'mode'     => 'margin',
                'output'   => array('.header-logo .logo img'),
                'units_extended' => 'false',
                'units'    => array('px'),
                'title'    => esc_html__('Logo Top and Bottom Margin.', 'webteck'),
                'left'     => false,
                'right'    => false,
                'subtitle' => esc_html__('Set logo top and bottom margin.', 'webteck'),
                'default'            => array(
                    'units'           => 'px'
                )
            ),
            array(
                'id'       => 'webteck_text_title',
                'type'     => 'text',
                'validate' => 'html',
                'title'    => esc_html__( 'Text Logo', 'webteck' ),
                'subtitle' => esc_html__( 'Write your logo text use as logo ( You can use span tag for text color ).', 'webteck' ),
            )
        )
    ) );
    // -> End Header Logo

    // -> START Header Menu
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Menu', 'webteck' ),
        'id'               => 'webteck_header_menu_option',
        'subsection'       => true,
        'fields'           => array(     
            array(
                'id'       => 'webteck_sticky_enable',
                'type'     => 'switch',
                'default'  => 0,
                'on'       => esc_html__( 'On', 'webteck' ),
                'off'      => esc_html__( 'Off', 'webteck' ),
                'title'    => esc_html__( 'Enable Sticky Header ?', 'webteck' ),
                'subtitle' => esc_html__( 'Click To Enable Sticky Header.', 'webteck')
            ),       
            array(
                'id'       => 'webteck_menu_background',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Menu Bakcground Image', 'webteck' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your site Menu Bakcground Image for header ( recommendation png format ).', 'webteck' ),
            ),
            array(
                'id'       => 'webteck_header_menu_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu Color', 'webteck' ),
                'subtitle' => esc_html__( 'Set Menu Color', 'webteck' ),
                'output'   => array( 'color'    =>  '.main-menu > ul > li > a' ),
            ),
            array(
                'id'       => 'webteck_header_menu_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu Hover Color', 'webteck' ),
                'subtitle' => esc_html__( 'Set Menu Hover Color', 'webteck' ),
                'output'   => array( 'color'    =>  '.main-menu > ul > li > a:hover' ),
            ),
            array(
                'id'       => 'webteck_header_submenu_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Submenu Color', 'webteck' ),
                'subtitle' => esc_html__( 'Set Submenu Color', 'webteck' ),
                'output'   => array( 'color'    =>  '.main-menu ul li ul.sub-menu li a' ),
            ),
            array(
                'id'       => 'webteck_header_submenu_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Submenu Hover Color', 'webteck' ),
                'subtitle' => esc_html__( 'Set Submenu Hover Color', 'webteck' ),
                'output'   => array( 'color'    =>  '.main-menu ul li ul.sub-menu li a:hover' ),
            ),
            array(
                'id'       => 'webteck_search_enable',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__( 'Show', 'webteck' ),
                'off'      => esc_html__( 'Hide', 'webteck' ),
                'title'    => esc_html__( 'Search Icon ?', 'webteck' ),
                'subtitle' => esc_html__( 'Click Show To Display Search Icon?', 'webteck')
            ),
            array(
                'id'       => 'webteck_cart_enable',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__( 'Show', 'webteck' ),
                'off'      => esc_html__( 'Hide', 'webteck' ),
                'title'    => esc_html__( 'Cart Icon ?', 'webteck' ),
                'subtitle' => esc_html__( 'Click Show To Display Cart Icon?', 'webteck')
            )           

        )
    ) );
    // -> End Header Menu

     // -> START Mobile Menu
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Offcanvas', 'webteck' ),
        'id'               => 'webteck_offcanvas_panel',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'webteck_offcanvas_panel_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Offcanvas Panel Background', 'webteck' ),
                'output'   => array('.sidemenu-wrapper .sidemenu-content'),
                'subtitle' => esc_html__( 'Set Offcanvas Panel Background Color', 'webteck' ),
            ),
            array(
                'id'       => 'webteck_offcanvas_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Offcanvas Title Color', 'webteck' ),
                'subtitle' => esc_html__( 'Set Offcanvas Title color.', 'webteck' ),
                'output'   => array( '.sidemenu-content h3.sidebox-title' )
            ),
        )
    ) );
    // -> End Mobile Menu

    // -> START Blog Page
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog', 'webteck' ),
        'id'         => 'webteck_blog_page',
        'icon'  => 'el el-blogger',
        'fields'     => array(

            array(
                'id'       => 'webteck_blog_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Layout', 'webteck' ),
                'subtitle' => esc_html__( 'Choose blog layout from here. If you use this option then you will able to change three type of blog layout ( Default Left Sidebar Layour ). ', 'webteck' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','webteck'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','webteck'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','webteck'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '3'
            ),
            array(
                'id'       => 'webteck_blog_grid',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Post Column', 'webteck' ),
                'subtitle' => esc_html__( 'Select your blog post column from here. If you use this option then you will able to select three type of blog post layout ( Default Two Column ).', 'webteck' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','webteck'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/1column.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','webteck'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2column.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','webteck'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3column.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'webteck_blog_page_title_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__('Show','webteck'),
                'off'      => esc_html__('Hide','webteck'),
                'title'    => esc_html__('Blog Page Title', 'webteck'),
                'subtitle' => esc_html__('Control blog page title show / hide. If you use this option then you will able to show / hide your blog page title ( Default Setting Show ).', 'webteck'),
            ),
            array(
                'id'       => 'webteck_blog_page_title_setting',
                'type'     => 'button_set',
                'title'    => esc_html__('Blog Page Title Setting', 'webteck'),
                'subtitle' => esc_html__('Control blog page title setting. If you use this option then you can able to show default or custom blog page title ( Default Blog ).', 'webteck'),
                'options'  => array(
                    "predefine"   => esc_html__('Default','webteck'),
                    "custom"      => esc_html__('Custom','webteck'),
                ),
                'default'  => 'predefine',
                'required' => array("webteck_blog_page_title_switcher","equals","1")
            ),
            array(
                'id'       => 'webteck_blog_page_custom_title',
                'type'     => 'text',
                'title'    => esc_html__('Blog Custom Title', 'webteck'),
                'subtitle' => esc_html__('Set blog page custom title form here. If you use this option then you will able to set your won title text.', 'webteck'),
                'required' => array('webteck_blog_page_title_setting','equals','custom')
            ),
            array(
                'id'            => 'webteck_blog_postExcerpt',
                'type'          => 'slider',
                'title'         => esc_html__('Blog Posts Excerpt', 'webteck'),
                'subtitle'      => esc_html__('Control the number of characters you want to show in the blog page for each post.. If you use this option then you can able to control your blog post characters from here ( Default show 10 ).', 'webteck'),
                "default"       => 29,
                "min"           => 0,
                "step"          => 1,
                "max"           => 100,
                'resolution'    => 1,
                'display_value' => 'text',
            ),
            array(
                'id'       => 'webteck_blog_readmore_setting',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Read More Text Setting', 'webteck' ),
                'subtitle' => esc_html__( 'Control read more text from here.', 'webteck' ),
                'options'  => array(
                    "default"   => esc_html__('Default','webteck'),
                    "custom"    => esc_html__('Custom','webteck'),
                ),
                'default'  => 'default',
            ),
            array(
                'id'       => 'webteck_blog_custom_readmore',
                'type'     => 'text',
                'title'    => esc_html__('Read More Text', 'webteck'),
                'subtitle' => esc_html__('Set read moer text here. If you use this option then you will able to set your won text.', 'webteck'),
                'required' => array('webteck_blog_readmore_setting','equals','custom')
            ),
            array(
                'id'       => 'webteck_blog_title_color',
                'output'   => array( '.th-blog .blog-title a'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Title Color', 'webteck' ),
                'subtitle' => esc_html__( 'Set Blog Title Color.', 'webteck' ),
            ),
            array(
                'id'       => 'webteck_blog_title_hover_color',
                'output'   => array( '.th-blog .blog-title a:hover'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Title Hover Color', 'webteck' ),
                'subtitle' => esc_html__( 'Set Blog Title Hover Color.', 'webteck' ),
            ),
            array(
                'id'       => 'webteck_blog_contant_color',
                'output'   => array( '.blog-content p'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Excerpt / Content Color', 'webteck' ),
                'subtitle' => esc_html__( 'Set Blog Excerpt / Content Color.', 'webteck' ),
            ),
            array(
                'id'       => 'webteck_blog_read_more_button_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Read More Button Color', 'webteck' ),
                'subtitle' => esc_html__( 'Set Read More Button Color.', 'webteck' ),
                'output'   => array( '--theme-color' => '.blog-single .th-btn' ),
            ),
            array(
                'id'       => 'webteck_blog_read_more_button_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Read More Button Hover Gradient Color 1', 'webteck' ),
                'subtitle' => esc_html__( 'Set Read More Button Hover Color.', 'webteck' ),
                'output'   => array( '--theme-color' => '.blog-single .blog-content .th-btn' ),
            ),
            array(
                'id'       => 'webteck_blog_read_more_button_hover_color_2',
                'type'     => 'color',
                'title'    => esc_html__( 'Read More Button Hover Gradient Color 2', 'webteck' ),
                'subtitle' => esc_html__( 'Set Read More Button Hover Color.', 'webteck' ),
                'output'   => array( '--theme-color2' => '.blog-single .blog-content .th-btn' ),
            ),
            array(
                'id'       => 'webteck_blog_pagination_color',
                'output'   => array( '.pagination li a,.pagination a i'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Pagination Color', 'webteck'),
                'subtitle' => esc_html__('Set Blog Pagination Color.', 'webteck'),
            ),
            array(
                'id'       => 'webteck_blog_pagination_active_color',
                'output'   => array( '.pagination li span.current'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Pagination Active Color', 'webteck'),
                'subtitle' => esc_html__('Set Blog Pagination Active Color.', 'webteck'),
                'required'  => array('webteck_blog_pagination', '=', '1')
            ),
            array(
                'id'       => 'webteck_blog_pagination_hover_color',
                'output'   => array( '.pagination li a:hover,.pagination a i:hover'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Pagination Hover Color', 'webteck'),
                'subtitle' => esc_html__('Set Blog Pagination Hover Color.', 'webteck'),
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Single Blog Page', 'webteck' ),
        'id'         => 'webteck_post_detail_styles',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'webteck_blog_single_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Layout', 'webteck' ),
                'subtitle' => esc_html__( 'Choose blog single page layout from here. If you use this option then you will able to change three type of blog single page layout ( Default Left Sidebar Layour ). ', 'webteck' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','webteck'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','webteck'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','webteck'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '3'
            ),
            array(
                'id'       => 'webteck_post_details_title_position',
                'type'     => 'button_set',
                'default'  => 'header',
                'options'  => array(
                    'header'        => esc_html__('On Header','webteck'),
                    'below'         => esc_html__('Below Thumbnail','webteck'),
                ),
                'title'    => esc_html__('Blog Post Title Position', 'webteck'),
                'subtitle' => esc_html__('Control blog post title position from here.', 'webteck'),
            ),
            array(
                'id'       => 'webteck_post_details_custom_title',
                'type'     => 'text',
                'title'    => esc_html__('Blog Details Custom Title', 'webteck'),
                'subtitle' => esc_html__('This title will show in Breadcrumb title.', 'webteck'),
                'required' => array('webteck_post_details_title_position','equals','below')
            ),
            array(
                'id'       => 'webteck_display_post_tags',
                'type'     => 'switch',
                'title'    => esc_html__( 'Tags', 'webteck' ),
                'subtitle' => esc_html__( 'Switch On to Display Tags.', 'webteck' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','webteck'),
                'off'       => esc_html__('Disabled','webteck'),
            ),
            array(
                'id'       => 'webteck_post_details_share_options',
                'type'     => 'switch',
                'title'    => esc_html__('Share Options', 'webteck'),
                'subtitle' => esc_html__('Control post share options from here. If you use this option then you will able to show or hide post share options.', 'webteck'),
                'on'        => esc_html__('Show','webteck'),
                'off'       => esc_html__('Hide','webteck'),
                'default'   => '0',
            ),
            array(
                'id'       => 'webteck_post_details_author_desc_trigger',
                'type'     => 'switch',
                'title'    => esc_html__('Biography Info', 'webteck'),
                'subtitle' => esc_html__('Control biography info from here. If you use this option then you will able to show or hide biography info ( Default setting Show ).', 'webteck'),
                'on'        => esc_html__('Show','webteck'),
                'off'       => esc_html__('Hide','webteck'),
                'default'   => '0',
            ),
            array(
                'id'       => 'webteck_post_details_post_navigation',
                'type'     => 'switch',
                'title'    => esc_html__('Post Navigation', 'webteck'),
                'subtitle' => esc_html__('Control post navigation from here. If you use this option then you will able to show or hide post navigation ( Default setting Show ).', 'webteck'),
                'on'        => esc_html__('Show','webteck'),
                'off'       => esc_html__('Hide','webteck'),
                'default'   => true,
            ),
            array(
                'id'       => 'webteck_post_details_related_post',
                'type'     => 'switch',
                'title'    => esc_html__('Related Post', 'webteck'),
                'subtitle' => esc_html__('Control related post from here. If you use this option then you will able to show or hide related post ( Default setting Show ).', 'webteck'),
                'on'        => esc_html__('Show','webteck'),
                'off'       => esc_html__('Hide','webteck'),
                'default'   => false,
            ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Meta Data', 'webteck' ),
        'id'         => 'webteck_common_meta_data',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'webteck_blog_meta_icon_color',
                'output'   => array( '.blog-meta span i'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Meta Icon Color', 'webteck'),
                'subtitle' => esc_html__('Set Blog Meta Icon Color.', 'webteck'),
            ),
            array(
                'id'       => 'webteck_blog_meta_text_color',
                'output'   => array( '.blog-meta a,.blog-meta span'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Meta Text Color', 'webteck' ),
                'subtitle' => esc_html__( 'Set Blog Meta Text Color.', 'webteck' ),
            ),
            array(
                'id'       => 'webteck_blog_meta_text_hover_color',
                'output'   => array( '.blog-meta a:hover'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Meta Hover Text Color', 'webteck' ),
                'subtitle' => esc_html__( 'Set Blog Meta Hover Text Color.', 'webteck' ),
            ),
            array(
                'id'       => 'webteck_display_post_author',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Author', 'webteck' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Author.', 'webteck' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','webteck'),
                'off'       => esc_html__('Disabled','webteck'),
            ),
            array(
                'id'       => 'webteck_display_post_date',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Date', 'webteck' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Date.', 'webteck' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','webteck'),
                'off'       => esc_html__('Disabled','webteck'),
            ),
            array(
                'id'       => 'webteck_display_post_tag',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Tag', 'webteck' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Tag.', 'webteck' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','webteck'),
                'off'       => esc_html__('Disabled','webteck'),
            ),
            array(
                'id'       => 'webteck_display_post_comment',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Comments', 'webteck' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Comments.', 'webteck' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','webteck'),
                'off'       => esc_html__('Disabled','webteck'),
            ),
        )
    ));

    /* End blog Page */

    // -> START Page Option
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Page', 'webteck' ),
        'id'         => 'webteck_page_page',
        'icon'  => 'el el-file',
        'fields'     => array(
            array(
                'id'       => 'webteck_page_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Select layout', 'webteck' ),
                'subtitle' => esc_html__( 'Choose your page layout. If you use this option then you will able to choose three type of page layout ( Default no sidebar ). ', 'webteck' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','webteck'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','webteck'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','webteck'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'webteck_page_layoutopt',
                'type'     => 'button_set',
                'title'    => esc_html__('Sidebar Settings', 'webteck'),
                'subtitle' => esc_html__('Set page sidebar. If you use this option then you will able to set three type of sidebar ( Default no sidebar ).', 'webteck'),
                //Must provide key => value pairs for options
                'options' => array(
                    '1' => esc_html__( 'Page Sidebar', 'webteck' ),
                    '2' => esc_html__( 'Blog Sidebar', 'webteck' )
                 ),
                'default' => '1',
                'required'  => array('webteck_page_sidebar','!=','1')
            ),
            array(
                'id'       => 'webteck_page_title_switcher',
                'type'     => 'switch',
                'title'    => esc_html__('Title', 'webteck'),
                'subtitle' => esc_html__('Switch enabled to display page title. Fot this option you will able to show / hide page title.  Default setting Enabled', 'webteck'),
                'default'  => '1',
                'on'        => esc_html__('Enabled','webteck'),
                'off'       => esc_html__('Disabled','webteck'),
            ),
            array(
                'id'       => 'webteck_page_title_tag',
                'type'     => 'select',
                'options'  => array(
                    'h1'        => esc_html__('H1','webteck'),
                    'h2'        => esc_html__('H2','webteck'),
                    'h3'        => esc_html__('H3','webteck'),
                    'h4'        => esc_html__('H4','webteck'),
                    'h5'        => esc_html__('H5','webteck'),
                    'h6'        => esc_html__('H6','webteck'),
                ),
                'default'  => 'h1',
                'title'    => esc_html__( 'Title Tag', 'webteck' ),
                'subtitle' => esc_html__( 'Select page title tag. If you use this option then you can able to change title tag H1 - H6 ( Default tag H1 )', 'webteck' ),
                'required' => array("webteck_page_title_switcher","equals","1")
            ),
            array(
                'id'       => 'webteck_allHeader_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Title Color', 'webteck' ),
                'subtitle' => esc_html__( 'Set Title Color', 'webteck' ),
                'output'   => array( 'color' => '.breadcumb-title' ),
            ),
            array(
                'id'       => 'webteck_allHeader_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background', 'webteck' ),
                'subtitle' => esc_html__( 'Setting page header background. If you use this option then you will able to set Background Color, Background Image, Background Repeat, Background Size, Background Attachment, Background Position.', 'webteck' ),
                'output'   => array( 'background' => '.breadcumb-wrapper' ),
            ),
            array(
                'id'       => 'webteck_shoppage_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background For Shop Pages', 'webteck' ),
                'output'   => array( 'background' => '.custom-woo-class' ),
            ),
            array(
                'id'       => 'webteck_archivepage_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background For Archive Pages', 'webteck' ),
                'output'   => array( 'background' => '.custom-archive-class' ),
            ),
            array(
                'id'       => 'webteck_searchpage_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background For Search Pages', 'webteck' ),
                'output'   => array( 'background' => '.custom-search-class' ),
            ),
            array(
                'id'       => 'webteck_errorpage_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background For Error Pages', 'webteck' ),
                'output'   => array( 'background' => '.custom-fof-class' ),
            ),
            array(
                'id'       => 'webteck_enable_breadcrumb',
                'type'     => 'switch',
                'title'    => esc_html__( 'Breadcrumb Hide/Show', 'webteck' ),
                'subtitle' => esc_html__( 'Hide / Show breadcrumb from all pages and posts ( Default settings hide ).', 'webteck' ),
                'default'  => '1',
                'on'       => 'Show',
                'off'      => 'Hide',
            ),
            array(
                'id'       => 'webteck_allHeader_breadcrumbtextcolor',
                'type'     => 'color',
                'title'    => esc_html__( 'Breadcrumb Color', 'webteck' ),
                'subtitle' => esc_html__( 'Choose page header breadcrumb text color here.If you user this option then you will able to set page breadcrumb color.', 'webteck' ),
                'required' => array("webteck_page_title_switcher","equals","1"),
                'output'   => array( 'color' => '.breadcumb-wrapper .breadcumb-content ul li a' ),
            ),
            array(
                'id'       => 'webteck_allHeader_breadcrumbtextactivecolor',
                'type'     => 'color',
                'title'    => esc_html__( 'Breadcrumb Active Color', 'webteck' ),
                'subtitle' => esc_html__( 'Choose page header breadcrumb text active color here.If you user this option then you will able to set page breadcrumb active color.', 'webteck' ),
                'required' => array( "webteck_page_title_switcher", "equals", "1" ),
                'output'   => array( 'color' => '.breadcumb-wrapper .breadcumb-content ul li:last-child' ),
            ),
            array(
                'id'       => 'webteck_allHeader_dividercolor',
                'type'     => 'color',
                'output'   => array( 'color'=>'.breadcumb-wrapper .breadcumb-content ul li:after' ),
                'title'    => esc_html__( 'Breadcrumb Divider Color', 'webteck' ),
                'subtitle' => esc_html__( 'Choose breadcrumb divider color.', 'webteck' ),
            ),
        ),
    ) );
    /* End Page option */

    // -> START 404 Page

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( '404 Page', 'webteck' ),
        'id'         => 'webteck_404_page',
        'icon'       => 'el el-ban-circle',
        'fields'     => array(
            array(
                'id'       => 'webteck_404_bg',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( '404  bg Image', 'webteck' ),
                'compiler' => 'true',
            ),
            array(
                'id'       => 'webteck_404_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( '404  Image', 'webteck' ),
                'compiler' => 'true',
            ),
            array(
                'id'       => 'webteck_fof_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Page Title', 'webteck' ),
                'subtitle' => esc_html__( 'Set Page Title', 'webteck' ),
                'default'  => esc_html__( 'Page Not Found', 'webteck' ),
            ),
            array(
                'id'       => 'webteck_fof_description',
                'type'     => 'text',
                'title'    => esc_html__( 'Page Description', 'webteck' ),
                'subtitle' => esc_html__( 'Set Page Subtitle ', 'webteck' ),
                'default'  => esc_html__( 'Were sorry The page you are looking for on longer exists.', 'webteck' ),
            ),
            array(
                'id'       => 'webteck_fof_btn_text',
                'type'     => 'text',
                'title'    => esc_html__( 'Button Text', 'webteck' ),
                'subtitle' => esc_html__( 'Set Button Text ', 'webteck' ),
                'default'  => esc_html__( 'Return To Home', 'webteck' ),
            ),
            array(
                'id'       => 'webteck_fof_text_color',
                'type'     => 'color',
                'output'   => array( '.error-content h3' ),
                'title'    => esc_html__( 'Title Color', 'webteck' ),
                'subtitle' => esc_html__( 'Pick a title color', 'webteck' ),
                'validate' => 'color'
            ),
            array(
                'id'       => 'webteck_fof_subtitle_color',
                'type'     => 'color',
                'output'   => array( '.error-content p' ),
                'title'    => esc_html__( 'Description Color', 'webteck' ),
                'subtitle' => esc_html__( 'Pick a subtitle color', 'webteck' ),
                'validate' => 'color'
            ),
            array(
                'id'       => 'webteck_fof_btn_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Color', 'webteck' ),
                'subtitle' => esc_html__( 'Button Color.', 'webteck' ),
                'output'   => array( '--theme-color' => '.th-error-wrapper.th-btn' ),
            ),
            array(
                'id'       => 'webteck_fof_btn_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Hover Gradient Color 1', 'webteck' ),
                'subtitle' => esc_html__( 'Set Button Hover Color.', 'webteck' ),
                'output'   => array( '--theme-color' => '.th-error-wrapper .th-btn' ),
            ),
            array(
                'id'       => 'webteck_fof_btn_hover_color_2',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Hover Gradient Color 2', 'webteck' ),
                'subtitle' => esc_html__( 'Read More Button Hover Color.', 'webteck' ),
                'output'   => array( '--theme-color2' => '.th-error-wrapper .th-btn' ),
            ),
        ),
    ) );

    /* End 404 Page */
    // -> START Woo Page Option

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Woocommerce Page', 'webteck' ),
        'id'         => 'webteck_woo_page_page',
        'icon'  => 'el el-shopping-cart',
        'fields'     => array(
            array(
                'id'       => 'webteck_woo_product_style',
                'type'     => 'switch',
                'title'    => esc_html__( 'Product Image style', 'webteck' ),
                'default'  => '1',
                'on'       => esc_html__('Round','webteck'),
                'off'      => esc_html__('Square','webteck')
            ),
            array(
                'id'       => 'webteck_woo_shoppage_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Set Shop Page Sidebar.', 'webteck' ),
                'subtitle' => esc_html__( 'Choose shop page sidebar', 'webteck' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','webteck'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','webteck'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','webteck'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'webteck_woo_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Product Column', 'webteck' ),
                'subtitle' => esc_html__( 'Set your woocommerce product column.', 'webteck' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '2' => array(
                        'alt' => esc_attr__('2 Columns','webteck'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('3 Columns','webteck'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '4' => array(
                        'alt' => esc_attr__('4 Columns','webteck'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '5' => array(
                        'alt' => esc_attr__('5 Columns','webteck'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/5col.png')
                    ),
                    '6' => array(
                        'alt' => esc_attr__('6 Columns','webteck'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),
                    '5' => array(
                        'alt' => esc_attr__('5 Columns','webteck'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/5col.png')
                    ),
                    '6' => array(
                        'alt' => esc_attr__('6 Columns','webteck'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),),
                'default'  => '4'
            ),
            array(
                'id'       => 'webteck_woo_product_perpage',
                'type'     => 'text',
                'title'    => esc_html__( 'Product Per Page', 'webteck' ),
                'default' => '10'
            ),
            array(
                'id'       => 'webteck_woo_singlepage_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Product Single Page sidebar', 'webteck' ),
                'subtitle' => esc_html__( 'Choose product single page sidebar.', 'webteck' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','webteck'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','webteck'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','webteck'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'webteck_product_details_title_position',
                'type'     => 'button_set',
                'default'  => 'below',
                'options'  => array(
                    'header'        => esc_html__('On Header','webteck'),
                    'below'         => esc_html__('Below Thumbnail','webteck'),
                ),
                'title'    => esc_html__('Product Details Title Position', 'webteck'),
                'subtitle' => esc_html__('Control product details title position from here.', 'webteck'),
            ),
            array(
                'id'       => 'webteck_product_details_custom_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Product Details Title', 'webteck' ),
                'default'  => esc_html__( 'Shop Details', 'webteck' ),
                'required' => array('webteck_product_details_title_position','equals','below'),
            ),
            array(
                'id'       => 'webteck_product_details_custom_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Product Details Title', 'webteck' ),
                'default'  => esc_html__( 'Shop Details', 'webteck' ),
                'required' => array('webteck_product_details_title_position','equals','below'),
            ),
            array(
                'id'       => 'webteck_woo_relproduct_display',
                'type'     => 'switch',
                'title'    => esc_html__( 'Related product Hide/Show', 'webteck' ),
                'subtitle' => esc_html__( 'Hide / Show related product in single page (Default Settings Show)', 'webteck' ),
                'default'  => '1',
                'on'       => esc_html__('Show','webteck'),
                'off'      => esc_html__('Hide','webteck')
            ),
            array(
                'id'       => 'webteck_woo_relproduct_subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Related products Subtitle', 'webteck' ),
                'default'  => esc_html__( 'Some Others Product', 'webteck' ),
                'required' => array('webteck_woo_relproduct_display','equals',true)
            ),
            array(
                'id'       => 'webteck_woo_relproduct_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Related products Title', 'webteck' ),
                'default'  => esc_html__( 'Related products', 'webteck' ),
                'required' => array('webteck_woo_relproduct_display','equals',true)
            ),
            array(
                'id'       => 'webteck_woo_relproduct_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Related products number', 'webteck' ),
                'subtitle' => esc_html__( 'Set how many related products you want to show in single product page.', 'webteck' ),
                'default'  => 5,
                'required' => array('webteck_woo_relproduct_display','equals',true)
            ),

            array(
                'id'       => 'webteck_woo_related_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Related Product Column', 'webteck' ),
                'subtitle' => esc_html__( 'Set your woocommerce related product column.', 'webteck' ),
                'required' => array('webteck_woo_relproduct_display','equals',true),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '6' => array(
                        'alt' => esc_attr__('2 Columns','webteck'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '4' => array(
                        'alt' => esc_attr__('3 Columns','webteck'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '3' => array(
                        'alt' => esc_attr__('4 Columns','webteck'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('6 Columns','webteck'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),

                ),
                'default'  => '4'
            ),
            array(
                'id'       => 'webteck_woo_upsellproduct_display',
                'type'     => 'switch',
                'title'    => esc_html__( 'Upsell product Hide/Show', 'webteck' ),
                'subtitle' => esc_html__( 'Hide / Show upsell product in single page (Default Settings Show)', 'webteck' ),
                'default'  => '1',
                'on'       => esc_html__('Show','webteck'),
                'off'      => esc_html__('Hide','webteck'),
            ),
            array(
                'id'       => 'webteck_woo_upsellproduct_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Upsells products number', 'webteck' ),
                'subtitle' => esc_html__( 'Set how many upsells products you want to show in single product page.', 'webteck' ),
                'default'  => 3,
                'required' => array('webteck_woo_upsellproduct_display','equals',true),
            ),

            array(
                'id'       => 'webteck_woo_upsell_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Upsells Product Column', 'webteck' ),
                'subtitle' => esc_html__( 'Set your woocommerce upsell product column.', 'webteck' ),
                'required' => array('webteck_woo_upsellproduct_display','equals',true),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '6' => array(
                        'alt' => esc_attr__('2 Columns','webteck'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '4' => array(
                        'alt' => esc_attr__('3 Columns','webteck'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '3' => array(
                        'alt' => esc_attr__('4 Columns','webteck'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('6 Columns','webteck'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),

                ),
                'default'  => '4'
            ),
            array(
                'id'       => 'webteck_woo_crosssellproduct_display',
                'type'     => 'switch',
                'title'    => esc_html__( 'Cross sell product Hide/Show', 'webteck' ),
                'subtitle' => esc_html__( 'Hide / Show cross sell product in single page (Default Settings Show)', 'webteck' ),
                'default'  => '1',
                'on'       => esc_html__( 'Show', 'webteck' ),
                'off'      => esc_html__( 'Hide', 'webteck' ),
            ),
            array(
                'id'       => 'webteck_woo_crosssellproduct_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Cross sell products number', 'webteck' ),
                'subtitle' => esc_html__( 'Set how many cross sell products you want to show in single product page.', 'webteck' ),
                'default'  => 3,
                'required' => array('webteck_woo_crosssellproduct_display','equals',true),
            ),

            array(
                'id'       => 'webteck_woo_crosssell_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Cross sell Product Column', 'webteck' ),
                'subtitle' => esc_html__( 'Set your woocommerce cross sell product column.', 'webteck' ),
                'required' => array( 'webteck_woo_crosssellproduct_display', 'equals', true ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '6' => array(
                        'alt' => esc_attr__('2 Columns','webteck'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '4' => array(
                        'alt' => esc_attr__('3 Columns','webteck'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '3' => array(
                        'alt' => esc_attr__('4 Columns','webteck'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('6 Columns','webteck'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),

                ),
                'default'  => '4'
            ),
        ),
    ) );

    /* End Woo Page option */
    // -> START Gallery
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Gallery', 'webteck' ),
        'id'         => 'webteck_gallery_widget',
        'icon'       => 'el el-gift',
        'fields'     => array(
            array(
                'id'          => 'webteck_gallery_image_widget',
                'type'        => 'slides',
                'title'       => esc_html__('Add Gallery Image', 'webteck'),
                'subtitle'    => esc_html__('Add gallery Image and url.', 'webteck'),
                'show'        => array(
                    'title'          => false,
                    'description'    => false,
                    'progress'       => false,
                    'icon'           => false,
                    'facts-number'   => false,
                    'facts-title1'   => false,
                    'facts-title2'   => false,
                    'facts-number-2' => false,
                    'facts-title3'   => false,
                    'facts-number-3' => false,
                    'url'            => true,
                    'project-button' => false,
                    'image_upload'   => true,
                ),
            ),
        ),
    ) );
    // -> START Subscribe
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Subscribe', 'webteck' ),
        'id'         => 'webteck_subscribe_page',
        'icon'       => 'el el-eject',
        'fields'     => array(

            array(
                'id'       => 'webteck_subscribe_apikey',
                'type'     => 'text',
                'title'    => esc_html__( 'Mailchimp API Key', 'webteck' ),
                'subtitle' => esc_html__( 'Set mailchimp api key.', 'webteck' ),
            ),
            array(
                'id'       => 'webteck_subscribe_listid',
                'type'     => 'text',
                'title'    => esc_html__( 'Mailchimp List ID', 'webteck' ),
                'subtitle' => esc_html__( 'Set mailchimp list id.', 'webteck' ),
            ),
        ),
    ) );

    /* End Subscribe */

    // -> START Social Media

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Social', 'webteck' ),
        'id'         => 'webteck_social_media',
        'icon'      => 'el el-globe',
        'desc'      => esc_html__( 'Social', 'webteck' ),
        'fields'     => array(
            array(
                'id'          => 'webteck_social_links',
                'type'        => 'slides',
                'title'       => esc_html__('Social Profile Links', 'webteck'),
                'subtitle'    => esc_html__('Add social icon and url.', 'webteck'),
                'show'        => array(
                    'title'          => true,
                    'description'    => true,
                    'progress'       => false,
                    'facts-number'   => false,
                    'facts-title1'   => false,
                    'facts-title2'   => false,
                    'facts-number-2' => false,
                    'facts-title3'   => false,
                    'facts-number-3' => false,
                    'url'            => true,
                    'project-button' => false,
                    'image_upload'   => false,
                ),
                'placeholder'   => array(
                    'icon'          => esc_html__( 'Icon (example: fa fa-facebook) ','webteck'),
                    'title'         => esc_html__( 'Social Icon Class', 'webteck' ),
                    'description'   => esc_html__( 'Social Icon Title', 'webteck' ),
                ),
            ),
        ),
    ) );

    /* End social Media */


    // -> START Footer Media
    Redux::setSection( $opt_name , array(
       'title'            => esc_html__( 'Footer', 'webteck' ),
       'id'               => 'webteck_footer',
       'desc'             => esc_html__( 'webteck Footer', 'webteck' ),
       'customizer_width' => '400px',
       'icon'              => 'el el-photo',
   ) );

   Redux::setSection( $opt_name, array(
       'title'      => esc_html__( 'Pre-built Footer / Footer Builder', 'webteck' ),
       'id'         => 'webteck_footer_section',
       'subsection' => true,
       'fields'     => array(
            array(
               'id'       => 'webteck_footer_builder_trigger',
               'type'     => 'button_set',
               'default'  => 'prebuilt',
               'options'  => array(
                   'footer_builder'        => esc_html__('Footer Builder','webteck'),
                   'prebuilt'              => esc_html__('Pre-built Footer','webteck'),
               ),
               'title'    => esc_html__( 'Footer Builder', 'webteck' ),
            ),
            array(
               'id'       => 'webteck_footer_builder_select',
               'type'     => 'select',
               'required' => array( 'webteck_footer_builder_trigger','equals','footer_builder'),
               'data'     => 'posts',
               'args'     => array(
                   'post_type'     => 'webteck_footer_build'
               ),
               'on'       => esc_html__( 'Enabled', 'webteck' ),
               'off'      => esc_html__( 'Disable', 'webteck' ),
               'title'    => esc_html__( 'Select Footer', 'webteck' ),
               'subtitle' => esc_html__( 'First make your footer from footer custom types then select it from here.', 'webteck' ),
            ),
            array(
               'id'       => 'webteck_footerwidget_enable',
               'type'     => 'switch',
               'title'    => esc_html__( 'Footer Widget', 'webteck' ),
               'default'  => 1,
               'on'       => esc_html__( 'Enabled', 'webteck' ),
               'off'      => esc_html__( 'Disable', 'webteck' ),
               'required' => array( 'webteck_footer_builder_trigger','equals','prebuilt'),
            ),
            array(
               'id'       => 'webteck_footer_background',
               'type'     => 'background',
               'title'    => esc_html__( 'Footer Background', 'webteck' ),
               'subtitle' => esc_html__( 'Set footer background.', 'webteck' ),
               'output'   => array( '.footer-custom' ),
               'required' => array( 'webteck_footerwidget_enable','=','1' ),
            ),
            array(
                'id'       => 'webteck_footer_shape_1',
                'type'     => 'media',
                'title'    => esc_html__( 'Footer Shape 1', 'webteck' ),
                'required' => array( 'webteck_footer_top_active','=','1'),
            ),
            // array(
            //     'id'       => 'webteck_footer_shape_3',
            //     'type'     => 'media',
            //     'title'    => esc_html__( 'Footer Shape 2', 'webteck' ),
            //     'required' => array( 'webteck_footer_top_active','=','1'),
            // ),
            array(
                'id'       => 'webteck_footer_shape_2',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__( 'Enabled', 'webteck' ),
                'off'      => esc_html__( 'Disable', 'webteck' ),
                'title'    => esc_html__( 'Enable Particle', 'webteck' ),
                'required' => array( 'webteck_footer_top_active','=','1'),
            ),
            array(
               'id'       => 'webteck_footer_widget_title_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Widget Title Color', 'webteck' ),
               'required' => array('webteck_footerwidget_enable','=','1'),
               'output'   => array( '.footer-custom-style h5' ),
            ),
            array(
                'id'       => 'webteck_footer_top_active',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Top?', 'webteck' ),
                'default'  => 1,
                'on'       => esc_html__('Enabled', 'webteck'),
                'off'      => esc_html__('Disable', 'webteck'),
                'required' => array('webteck_footer_builder_trigger','equals','prebuilt'),
            ),
            array(
                'id'       => 'webteck_footer_logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Footer Logo', 'webteck' ),
                'required' => array( 'webteck_footer_top_active','=','1'),
            ),
            array(
                'id'       => 'footer_contact_phone_label',
                'type'     => 'text',
                'title'    => esc_html__( 'Footer Phone Label', 'webteck' ),
                'default'  => esc_html__( 'Quick Call Us:', 'webteck' ),
                'required' => array( 'webteck_footer_top_active','=','1'),
            ),
            array(
                'id'       => 'footer_contact_phone_number',
                'type'     => 'text',
                'title'    => esc_html__( 'Footer Phone Number', 'webteck' ),
                'default'  => esc_html__( '+190-8800-0393', 'webteck' ),
                'required' => array( 'webteck_footer_top_active','=','1'),
            ),
            array(
                'id'       => 'footer_contact_email_label',
                'type'     => 'text',
                'title'    => esc_html__( 'Footer Email Label', 'webteck' ),
                'default'  => esc_html__( 'Mail Us On:', 'webteck' ),
                'required' => array( 'webteck_footer_top_active','=','1'),
            ),
            array(
                'id'       => 'footer_contact_email',
                'type'     => 'text',
                'title'    => esc_html__( 'Footer Email', 'webteck' ),
                'default'  => esc_html__( 'info@webteck.com', 'webteck' ),
                'required' => array( 'webteck_footer_top_active','=','1'),
            ),
            array( 
                'id'       => 'footer_contact_location_label',
                'type'     => 'text',
                'title'    => esc_html__( 'Footer Location Label', 'webteck' ),
                'default'  => esc_html__( 'Visit Location:', 'webteck' ),
                'required' => array( 'webteck_footer_top_active','=','1'),
            ),
            array(
                'id'       => 'footer_contact_location',
                'type'     => 'text',
                'title'    => esc_html__( 'Footer Location', 'webteck' ),
                'default'  => esc_html__( '54 Flemington, USA', 'webteck' ),
                'required' => array( 'webteck_footer_top_active','=','1'),
            ),
            array(
                'id'       => 'footer_contact_location_url',
                'type'     => 'text',
                'title'    => esc_html__( 'Footer Location URL', 'webteck' ),
                'default'  => esc_html__( 'https://www.google.com/maps', 'webteck' ),
                'required' => array( 'webteck_footer_top_active','=','1'),
            ),
            array(
               'id'       => 'webteck_footer_widget_anchor_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Widget Anchor Color', 'webteck' ),
               'required' => array('webteck_footerwidget_enable','=','1'),
               'output'   => array( '.footer-custom-style a' ),
            ),
            array(
               'id'       => 'webteck_footer_widget_anchor_hov_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Widget Anchor Hover Color', 'webteck' ),
               'required' => array('webteck_footerwidget_enable','=','1'),
               'output'   => array( '.footer-layout1 .footer-wid-wrap .widget_contact p a:hover,.footer-layout1 .footer-wid-wrap .widget-links ul li a:hover' ),
            ),
            array(
               'id'       => 'webteck_disable_footer_bottom',
               'type'     => 'switch',
               'title'    => esc_html__( 'Footer Bottom?', 'webteck' ),
               'default'  => 1,
               'on'       => esc_html__('Enabled','webteck'),
               'off'      => esc_html__('Disable','webteck'),
               'required' => array('webteck_footer_builder_trigger','equals','prebuilt'),
            ),
            array(
               'id'       => 'webteck_footer_bottom_background',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Bottom Background Color', 'webteck' ),
               'default'  =>'#1b1b1b',
               'required' => array( 'webteck_disable_footer_bottom','=','1' ),
               'output'   => array( 'background-color'   =>   '.footer-copyright' ),
            ),
            array(
               'id'       => 'webteck_copyright_text',
               'type'     => 'text',
               'title'    => esc_html__( 'Copyright Text', 'webteck' ),
               'subtitle' => esc_html__( 'Add Copyright Text', 'webteck' ),
               'default'  => sprintf( 'Copyright <i class="fal fa-copyright"></i> %s <a href="%s">%s</a> All Rights Reserved by <a href="%s">%s</a>',date('Y'),esc_url('#'),__( 'Webteck.','webteck' ),esc_url('https://angfuzsoft.com/'),__( 'Themeholy', 'webteck' ) ),
               'required' => array( 'webteck_disable_footer_bottom','equals','1' ),
            ),
            array(
               'id'       => 'webteck_footer_copyright_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Copyright Text Color', 'webteck' ),
               'subtitle' => esc_html__( 'Set footer copyright text color', 'webteck' ),
               'required' => array( 'webteck_disable_footer_bottom','equals','1'),
               'output'   => array( '.footer-layout2 .footer-copyright .copyright' ),
            ),
            array(
               'id'       => 'webteck_footer_copyright_acolor',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Copyright Ancor Color', 'webteck' ),
               'subtitle' => esc_html__( 'Set footer copyright ancor color', 'webteck' ),
               'required' => array( 'webteck_disable_footer_bottom','equals','1'),
               'output'   => array( '.footer-copyright p a' ),
            ),
            array(
               'id'       => 'webteck_footer_copyright_a_hover_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Copyright Ancor Hover Color', 'webteck' ),
               'subtitle' => esc_html__( 'Set footer copyright ancor Hover color', 'webteck' ),
               'required' => array( 'webteck_disable_footer_bottom','equals','1'),
               'output'   => array( '.footer-copyright p a:hover' ),
            ),

       ),
   ) );


    /* End Footer Media */

    // -> START Custom Css
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Custom Css', 'webteck' ),
        'id'         => 'webteck_custom_css_section',
        'icon'  => 'el el-css',
        'fields'     => array(
            array(
                'id'       => 'webteck_css_editor',
                'type'     => 'ace_editor',
                'title'    => esc_html__('CSS Code', 'webteck'),
                'subtitle' => esc_html__('Paste your CSS code here.', 'webteck'),
                'mode'     => 'css',
                'theme'    => 'monokai',
            )
        ),
    ) );

    /* End custom css */



    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'webteck' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'webteck' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'webteck' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }