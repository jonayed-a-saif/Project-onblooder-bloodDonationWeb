<?php
if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.
}

/**
 * Main Traga Core Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */

final class Traga_Extension {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */

	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';


	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Test_Extension The single instance of the class.
	 */

	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Test_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated

		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version

		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version

		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}


		// Add Plugin actions

		add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );


        // Register widget scripts

		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ]);


		// Specific Register widget scripts

		// add_action( 'elementor/frontend/after_register_scripts', [ $this, 'webteck_regsiter_widget_scripts' ] );
		// add_action( 'elementor/frontend/before_register_scripts', [ $this, 'webteck_regsiter_widget_scripts' ] );


        // category register

		add_action( 'elementor/elements/categories_registered',[ $this, 'webteck_elementor_widget_categories' ] );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'webteck' ),
			'<strong>' . esc_html__( 'Webteck Core', 'webteck' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'webteck' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */

			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'webteck' ),
			'<strong>' . esc_html__( 'Webteck Core', 'webteck' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'webteck' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(

			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'webteck' ),
			'<strong>' . esc_html__( 'Webteck Core', 'webteck' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'webteck' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */

	public function init_widgets() {

		// Include Widget files

		require_once( WEBTECK_ADDONS . '/widgets/button.php' );
		require_once( WEBTECK_ADDONS . '/widgets/section-title.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-blog.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-service.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-team.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-group-button.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-group-image.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-list.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-project.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-features.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-shape-image.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-testimonials.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-particle.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-contact-info.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-contact-form.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-secimg.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-brand-logo.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-banner.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-video-box.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-progress-bar.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-pricing.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-faq.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-process.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-tabs.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-experience.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-gallery.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-project-info.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-counter.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-footer-menu.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-subscribed-form.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-about.php' );

		

		require_once( WEBTECK_ADDONS . '/widgets/webteck-banner2.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-counterup2.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-mission.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-services2.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-section-title.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-wcu.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-project2.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-button.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-price.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-features2.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-contactform2.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-cta.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-group-image2.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-revew-area.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-team2.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-faq2.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-testimonials2.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-footer-aboutus.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-blog-v2.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-cta-v2.php' );





		require_once( WEBTECK_ADDONS . '/widgets/webteck-banner3.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-features-v2.php' );
		require_once( WEBTECK_ADDONS . '/widgets/webteck-app-ss.php' );






		

		// Register widget

		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Section_Title_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Blog_Post() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Service() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Team() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Group_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Group_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_List() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Project() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Feature() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Animated_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Testimonial_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Particle() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Contact_Info() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Contact() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Sec_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Brand_Logo() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Banner() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Video_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Progress_Bar() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Pricing() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Faq() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Process() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Tabs() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Experience() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Gallery() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Project_Info() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Counter() );

		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Footer_Menu() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Footer_Subscribe() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_About() );








		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_Banner() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_Counter_Up() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_Mission() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_Service() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_Section_Title_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_Why_Chose_Us() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_Project() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Konsal_Price() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_Features() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_Contact_Form() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_CTA() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_Group_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_Review() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_Team() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_Faq() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_Testimonials() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_Footer_About_Us() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_Blog_Post() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_CTA2() );





		
		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Banner_v3() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_Feature_v2() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_App_Screnshot() );
		

		// Header Elements

		require_once( WEBTECK_ADDONS . '/header/header.php' );
		require_once( WEBTECK_ADDONS . '/header/header-v2.php' );
		

		// Header Widget Register

		\Elementor\Plugin::instance()->widgets_manager->register( new \Traga_Header() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Webteck_Header() );

	}

    public function widget_scripts() {

        wp_enqueue_script(
            'webteck-frontend-script',
            WEBTECK_PLUGDIRURI . 'assets/js/webteck-frontend.js',
            array('jquery'),
            false,
            true
		);
	}

    function webteck_elementor_widget_categories( $elements_manager ) {

        $elements_manager->add_category(
            'webteck',
            [
                'title' => __( 'Webteck', 'webteck' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );

        $elements_manager->add_category(
            'webteck_footer_elements',
            [
                'title' => __( 'Webteck Footer Elements', 'webteck' ),
                'icon' 	=> 'fa fa-plug',
            ]
		);

		$elements_manager->add_category(
            'webteck_header_elements',
            [
                'title' => __( 'Webteck Header Elements', 'webteck' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );
	}
}

Traga_Extension::instance();