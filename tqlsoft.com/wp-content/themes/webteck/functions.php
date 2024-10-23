<?php
/**
 * @Packge     : Webteck
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://www.themeholy.com/
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Include File
 *
 */

// Constants
require_once get_parent_theme_file_path() . '/inc/webteck-constants.php';

//theme setup
require_once WEBTECK_DIR_PATH_INC . 'theme-setup.php';

//essential scripts
require_once WEBTECK_DIR_PATH_INC . 'essential-scripts.php';

// Woo Hooks
require_once WEBTECK_DIR_PATH_INC . 'woo-hooks/webteck-woo-hooks.php';

// Woo Hooks Functions
require_once WEBTECK_DIR_PATH_INC . 'woo-hooks/webteck-woo-hooks-functions.php';

// plugin activation
require_once WEBTECK_DIR_PATH_FRAM . 'plugins-activation/webteck-active-plugins.php';

// theme dynamic css
require_once WEBTECK_DIR_PATH_INC . 'webteck-commoncss.php';

// meta options
require_once WEBTECK_DIR_PATH_FRAM . 'webteck-meta/webteck-config.php';

// page breadcrumbs
require_once WEBTECK_DIR_PATH_INC . 'webteck-breadcrumbs.php';

// sidebar register
require_once WEBTECK_DIR_PATH_INC . 'webteck-widgets-reg.php';

//essential functions
require_once WEBTECK_DIR_PATH_INC . 'webteck-functions.php';

// helper function
require_once WEBTECK_DIR_PATH_INC . 'wp-html-helper.php';

// Demo Data
require_once WEBTECK_DEMO_DIR_PATH . 'demo-import.php';

// pagination
require_once WEBTECK_DIR_PATH_INC . 'wp_bootstrap_pagination.php';

// webteck options
require_once WEBTECK_DIR_PATH_FRAM . 'webteck-options/webteck-options.php';

// hooks
require_once WEBTECK_DIR_PATH_HOOKS . 'hooks.php';

// hooks funtion
require_once WEBTECK_DIR_PATH_HOOKS . 'hooks-functions.php';

