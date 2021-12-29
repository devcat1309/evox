<?php
use TemPlazaFramework\Functions;
if ( ! class_exists( 'Evox_Handler' ) ) {
	/**
	 * Main theme class with configuration
	 */
	class Evox_Handler {
		private static $instance;

		public function __construct() {
			require_once get_template_directory() . '/helpers/helper.php';
			require_once get_template_directory() . '/helpers/cause/cause-functions.php';
			require_once get_template_directory() . '/helpers/theme-functions.php';
			require_once get_template_directory() . '/helpers/theme-color.php';
			require_once get_template_directory() . '/plugins/class-tgm-plugin-activation.php';
			require_once get_template_directory() . '/helpers/data-install.php';
			add_action( 'after_setup_theme', array( $this, 'evox_setup' ) );
			add_action( 'widgets_init', array( $this, 'evox_sidebar_registration' ) );
			add_action( 'init', array( $this, 'evox_register_theme_scripts' ) );
			add_filter( 'widget_title', 'do_shortcode' );
			add_filter( 'wp_nav_menu_items', 'do_shortcode' );
			add_action( 'wp_ajax_evox_donate_action', array( $this, 'evox_donate_action' ) ); // wp_ajax_{action}
			add_action( 'wp_ajax_nopriv_evox_donate_action', array( $this, 'evox_donate_action') ); // wp_ajax_nopriv_{action}
			add_action( 'comment_form_before', array( $this, 'evox_enqueue_comments_reply' ) );
			add_filter( 'the_password_form', array( $this, 'evox_password_form' ), 10, 2 );
			add_action( 'tgmpa_register', array ( $this, 'evox_register_required_plugins' ) );
            add_filter( 'excerpt_more', array ( $this, 'evox_continue_reading_link_excerpt' ) );
            add_filter( 'the_content_more_link', array( $this, 'evox_continue_reading_link' ) );

			add_filter( 'excerpt_length', array($this,'evox_excerpt_length' ));


            add_filter( 'admin_body_class', array($this,'evox_admin_body_class') );
            add_filter('templaza-elements/settings-post-type', array($this, 'evox_add_post_type'));
            add_filter('templaza-elements-builder/uipost-post-except', array($this, 'evox_get_post_except'), 10, 2);
			get_template_part( 'inc/block-styles' );
			if ( class_exists( 'TemPlazaFramework\TemPlazaFramework' ) ) {
				if (is_admin()) {
					add_action('admin_enqueue_scripts', array($this,'evox_register_back_end_scripts'));
				}
			}

			if ( !class_exists( 'TemPlazaFramework\TemPlazaFramework' ) && !class_exists( 'Redux_Framework_Plugin' ) ) {
				add_action( 'after_setup_theme', array( $this, 'evox_basic_setup' ) );
				add_action( 'init', array( $this, 'evox_basic_register_theme_scripts' ) );
                add_filter( 'dynamic_sidebar_params', array( $this, 'evox_add_widget_classes' ) );
			}
		}

		/**
		 * @return Evox_Handler
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
		function evox_register_back_end_scripts(){
            wp_enqueue_style(TEMPLAZA_FRAMEWORK_NAME.'__css');
        }
        function evox_admin_body_class($classes){
            $screen = get_current_screen();
            if('cause_page_tz-cause-settings'==$screen->base){
                $classes .= ' templaza-framework__body';

            }else{
                $classes='';
            }
            return $classes;
        }
        function evox_get_post_except ($content, $item) {
            return $content.apply_filters('templaza_cause_donate',$item->ID);
        }

        function evox_add_post_type( $post_type ) {
            return array_merge( $post_type, array(
				'cause' => esc_html__('Cause', 'evox')
			));
        }


		function evox_setup() {
			load_theme_textdomain('evox', get_template_directory() . '/languages');
			add_theme_support( 'templaza-framework' );
            add_theme_support('templaza-post-type', array('cause'));
			add_theme_support('post-formats', array('gallery', 'video', 'audio', 'link', 'quote'));
			add_theme_support('post-thumbnails');
			add_theme_support( 'title-tag' );
			add_theme_support( 'automatic-feed-links' );
			add_image_size( 'evox-600-400', 600, 400, array( 'center', 'center' ) );
			add_theme_support(
			    'html5',
                array(
				    'script',
	                'style',
	                'comment-list',
                )
            );
			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );
			// Add support for Block Styles.
			// Add support for responsive embedded content.
			add_theme_support( 'responsive-embeds' );

			// Add support for custom line height controls.
			add_theme_support( 'custom-line-height' );

			// Add support for experimental link color control.
			add_theme_support( 'experimental-link-color' );

			// Add support for experimental cover block spacing.
			add_theme_support( 'custom-spacing' );
			add_theme_support( 'align-wide' );

			// Add support for custom units.
			// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
			add_theme_support( 'custom-units' );
			add_theme_support( 'wp-block-styles' );
			add_theme_support( 'editor-styles' );
			add_editor_style( array( 'assets/css/style-editor.css', evox_basic_fonts_url()) );
		}

		function evox_sidebar_registration() {
			register_sidebar(
				array(
					'before_widget' => '<div class="widget %2$s">',
					'after_widget' => '</div>',
					'name'        => esc_html__( 'Main Sidebar', 'evox' ),
					'id'          => 'sidebar-main',
					'description' => esc_html__( 'Widgets in this area will be displayed in the TemPlaza Framework layout builder sidebar only.', 'evox' ),
				)
			);
			register_sidebar(
				array(
					'name'        => esc_html__( 'Top Sidebar', 'evox' ),
					'id'          => 'sidebar-top',
					'description' => esc_html__( 'Widgets in this area will be displayed in the first column in the top sidebar.', 'evox' ),
				)
			);

			register_sidebar(
				array(
					'name'        => esc_html__( 'Header Sidebar Mode', 'evox' ),
					'id'          => 'sidebar-mode',
					'description' => esc_html__( 'Widgets in this area will be displayed in the first column in the Sidebar - Header Mode of TemPlaza Framework only.', 'evox' ),
				)
			);
		}

		function evox_register_front_end_styles()
		{
			if(!is_child_theme()){
				wp_enqueue_style('evox-style', get_template_directory_uri() . '/style.css', false );
			}

		}

		function evox_register_front_end_scripts()
		{

			wp_register_script('evox-progressbar', get_template_directory_uri() . '/assets/js/jQuery-plugin-progressbar.js', array(), false, $in_footer = true);
			wp_enqueue_script('evox-progressbar');

            $admin_url = admin_url('admin-ajax.php');
            $evox_ajax_url = array('url' => $admin_url);
			wp_register_script( 'evox-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery') );
			wp_enqueue_script( 'evox-scripts' );
            wp_localize_script('evox-scripts', 'evox_ajax_url', $evox_ajax_url);
		}

		function evox_register_theme_scripts()
		{
			if ($GLOBALS['pagenow'] != 'wp-login.php') {
				if ( !is_admin() ) {
					add_action('wp_enqueue_scripts', array( $this, 'evox_register_front_end_styles' ) );
					add_action('wp_enqueue_scripts', array( $this, 'evox_register_front_end_scripts') );
				}
			}
		}

		function evox_donate_action(){
			$itemID = $_POST['itemID'];
			$amount = $_POST['amount'];
			$email = $_POST['email'];
			$itemtitle = get_the_title($itemID);
			$itemurl = get_the_permalink($itemID);

			$donate_settings = get_option('tz_cause_settings');
			$paypal_sandbox = isset($donate_settings['paypal-sandbox'])?$donate_settings['paypal-sandbox']:1;
			if($paypal_sandbox ==1){
				$linkForm   = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
			}else{
				$linkForm   = 'https://www.paypal.com/cgi-bin/webscr';
			}

			$cause_single_settings = get_post_meta( $itemID, 'cause-single-donate',true );

			if($cause_single_settings == 'custom'){
				$currency = get_post_meta(get_the_ID(),'cause-single-paypal-currency',true);
				if($currency ==''){
					$currency = isset($donate_settings['paypal-currency'])?$donate_settings['paypal-currency']:'USD';
				}
				$emailBusiness = get_post_meta(get_the_ID(),'cause-single-paypal',true);
				if($emailBusiness==''){
					$emailBusiness = isset($donate_settings['paypal-email'])?$donate_settings['paypal-email']:'';
				}
			}else{
				$currency = isset($donate_settings['paypal-currency'])?$donate_settings['paypal-currency']:'USD';
				$emailBusiness = isset($donate_settings['paypal-email'])?$donate_settings['paypal-email']:'';
			}


            $post_variables = Array(
                'cmd' => '_ext-enter',
                'redirect_cmd' => '_xclick',
                'upload' => '1', //Indicates the use of third-party shopping cart
                'business' => $emailBusiness, //Email address or account ID of the payment recipient (i.e., the merchant). thuongnv123@gmail.com
                'receiver_email' => $emailBusiness, //Primary email address of the payment recipient (i.e., the merchant
                'custom' => $itemID,
                'item_name' => $itemtitle,
                'item_id' => $itemID,
                "amount" => $amount,
                "currency_code" => $currency,
                "address_override" => "0", // 0 ??   Paypal does not allow your country of residence to ship to the country you wish to
                "first_name" => '',
                "last_name" => '',
                "address1" => '',
                "address2" => '',
                "zip" => '',
                "city" => '',
                "state" => '',
                "country" => '',
                "email" => $email,
                "night_phone_b" => '',
                "return" => $itemurl,
                "notify_url" => $itemurl,
                "cancel_return" => $itemurl,
                "ipn_test" => 'NO',
                "image_url" => '',
                "no_shipping" => "1",
                "no_note" => "1");

            $html = '<div class="uk-text-center">';
            $html .= '<form action="'.$linkForm.'" method="post" name="tz_paypal_form" >';
            $html.= '<input type="image" name="submit" src="http://www.paypal.com/en_US/i/btn/x-click-but6.gif" alt="Payment Processing..." />';
            foreach ($post_variables as $name => $value) {
                $html.= '<input type="hidden" name="' . $name . '" value="' . htmlspecialchars($value) . '" />';
            }
            $html.= '</form></div>';
            echo wp_kses($html,'post');
            ?>
            <?php
			die; // here we exit the script and even no wp_reset_query() required!
		}

		function evox_enqueue_comments_reply() {
			if( get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		function evox_password_form( $output, $post = 0 ) {
			$post   = get_post( $post );
			$label  = 'pwbox-' . ( empty( $post->ID ) ? wp_rand() : $post->ID );
			$output = '<p class="post-password-message">' . esc_html__( 'This content is password protected. Please enter a password to view.', 'evox' ) . '</p>
	<p class="pass_label"> <label class="post-password-form__label" for="' . esc_attr( $label ) . '">' . esc_html_x( 'Password', 'Post password form', 'evox' ) . '</label></p>
	<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post">
	<input class="post-password-form__input" name="post_password" id="' . esc_attr( $label ) . '" type="password" size="20" />
	<input type="submit" class="post-password-form__submit" name="' . esc_attr_x( 'Submit', 'Post password form', 'evox' ) . '" value="' . esc_attr_x( 'Enter', 'Post password form', 'evox' ) . '" /></form>
	';
			return $output;
		}

		function evox_register_required_plugins()
		{
			/**
			 * Array of plugin arrays. Required keys are name and slug.
			 * If the source is NOT from the .org repo, then source is also required.
			 */
			$evox_plugins = array(

				// This is an example of how to include a plugin pre-packaged with a theme
				array(
					'name' => esc_html__('TemPlaza Framework', 'evox'), /* The plugin name */
					'slug' => 'templaza-framework', /* The plugin slug (typically the folder name) */
					'source' => get_template_directory_uri() . '/plugins/templaza-framework.zip', /* The plugin source */
					'required' => true, /* If false, the plugin is only 'recommended' instead of required */
					'version' => '1.0.2', /* E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented */
					'force_activation' => false, /* If true, plugin is activated upon theme activation and cannot be deactivated until theme switch */
					'force_deactivation' => false, /* If true, plugin is deactivated upon theme switch, useful for theme-specific plugins */
					'external_url' => '', /* If set, overrides default API URL and points to an external URL */
				),

				array(
					'name' => 'Elementor Website Builder',
					'slug' => 'elementor',
					'required' => true,
				),

				array(
					'name' => 'Contact Form by WPForms',
					'slug' => 'wpforms-lite',
					'required' => true,
				),
			);

			/**
			 * Array of configuration settings. Amend each line as needed.
			 * If you want the default strings to be available under your own theme domain,
			 * leave the strings uncommented.
			 * Some of the strings are added into a sprintf, so see the comments at the
			 * end of each line for what each argument will be.
			 */

			$evox_config = array(
				'id' => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
				'default_path' => '',                      // Default absolute path to bundled plugins.
				'menu' => 'tgmpa-install-plugins', // Menu slug.
				'parent_slug' => 'themes.php',            // Parent menu slug.
				'capability' => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
				'has_notices' => true,                    // Show admin notices or not.
				'dismissable' => true,                    // If false, a user cannot dismiss the nag message.
				'dismiss_msg' => '',                      // If 'dismissable' is false, this message will be output at top of nag.
				'is_automatic' => true,                   // Automatically activate plugins after installation or not.
				'message' => '',                      // Message to output right before the plugins table.
			);

			tgmpa($evox_plugins, $evox_config);
		}

		function evox_basic_setup(){
			register_nav_menus(
				array(
					'primary' => esc_html__( 'Primary menu', 'evox' ),
				)
			);
			$logo_width  = 115;
			$logo_height = 45;
			add_theme_support(
				'custom-logo',
				array(
					'height'               => $logo_height,
					'width'                => $logo_width,
					'flex-width'           => true,
					'flex-height'          => true,
					'unlink-homepage-logo' => true,
				)
			);
		}


		function evox_basic_register_front_end_styles()
		{
			wp_enqueue_style( 'evox-basic-fonts', evox_basic_fonts_url(), array(), null );
			wp_enqueue_style('evox-basic-style-min', get_template_directory_uri() . '/assets/css/style.min.css', false );
			wp_enqueue_style('evox-basic-fontawesome', get_template_directory_uri() . '/assets/css/fontawesome/css/all.min.css', false );
		}

		function evox_basic_register_front_end_scripts()
		{
			wp_enqueue_script('evox-basic-script-uikit', get_template_directory_uri() . '/assets/js/uikit.min.js', false );
			wp_enqueue_script('evox-basic-script-uikit-icon', get_template_directory_uri() . '/assets/js/uikit-icons.min.js', false );
			wp_enqueue_script('evox-basic-script-basic', get_template_directory_uri() . '/assets/js/basic.js', array('jquery') );
		}

		function evox_basic_register_theme_scripts()
		{
			if ($GLOBALS['pagenow'] != 'wp-login.php') {
				if ( !is_admin() )  {
					add_action('wp_enqueue_scripts', array( $this, 'evox_basic_register_front_end_styles' ) );
					add_action('wp_enqueue_scripts', array( $this, 'evox_basic_register_front_end_scripts' ) );
				}
			}
		}

		function evox_continue_reading_link_excerpt() {
			if ( ! is_admin() ) {
				return '';
			}
			return '';
		}

		function evox_continue_reading_link() {
			if ( ! is_admin() ) {
				return '<div class="more-link-container"><a class="more-link" href="' . esc_url( get_permalink() ) . '#more-' . esc_attr( get_the_ID() ) . '">' . evox_basic_continue_reading_text() . '</a></div>';
			}
			return '';
		}

		function evox_excerpt_length($length) {
			if ( get_post_type( get_the_ID() ) == 'event_listing' ) {
				return 25;
			}else{
				return $length;
			}
		}

		function evox_add_widget_classes($params) {
            $params[0] = array_replace($params[0], array('before_widget' => str_replace("widget_block", "widget_block style1", $params[0]['before_widget'])));
            return $params;
		}

	}
	Evox_Handler::get_instance();
}