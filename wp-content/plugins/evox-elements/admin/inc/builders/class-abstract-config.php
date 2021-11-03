<?php
/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit;
use Elementor\Controls_Manager;
if ( ! class_exists( 'Evox_Elements_Abstract_Config' ) ) {
 	/**
	 * Class Evox_Elements_Abstract_Config
	 */
	abstract class Evox_Elements_Abstract_Config {

		/**
		 * @var string
		 */
		public static $group = '';
		/**
		 * @var string
		 */
		public static $template_name = '';

		/**
		 * @var string
		 */
		public static $base = '';

		/**
		 * @var string
		 */
		public static $name = '';

		/**
		 * @var string
		 */
		public static $desc = '';
		/**
		 * @var string
		 */
		public static $icon = '';
		/**
		 * @var array
		 */
		public static $options = array();

		/**
		 * @var string
		 */
		public static $assets_url = '';

		/**
		 * @var string
		 */
		public static $assets_path = '';

		/**
		 * @var array
		 */
		public static $styles = array();

		/**
		 * @var array
		 */
		public static $scripts = array();

		/**
		 * @var array
		 */
		public static $queue_assets = array();

		/**
		 * @var array
		 */
		public static $localize = array();

		/**
		 * Evox_Elements_Abstract_Config constructor.
		 */
		public function __construct() {

			// set group

//			self::$group = Evox_Elements_Builders_Helper::get_group( self::$base );
			self::$group = '';

//			self::$assets_url  = TP_THEME_ELEMENTS_THIM_URI . self::$group . '/' . self::$base . '/assets/';
//			self::$assets_path = TP_THEME_ELEMENTS_THIM_DIR . self::$group . '/' . self::$base . '/assets/';

			self::$assets_url  = plugin_dir_url(Evox_Elements_BUILDERS_WIDGETS_PATH).'widgets' . self::$group . '/' . self::$base . '/assets/';
			self::$assets_path = Evox_Elements_BUILDERS_WIDGETS_PATH . self::$group . '/' . self::$base . '/assets/';

			// set options
			self::$options = is_array( $this->get_options() ) ? $this->get_options() : array();
			// set options
			self::$template_name =  $this->get_template_name() ? $this->get_template_name() : '';
			// handle std, add default options
			self::$options = apply_filters( "evox-elements/" . self::$base . '/config-options', $this->_handle_options( self::$options ) );

			// set styles
			self::$styles = apply_filters( 'evox-elements/' . self::$base . '/styles', $this->get_styles() );
			// set scripts
			self::$scripts = apply_filters( 'evox-elements/' . self::$base . '/scripts', $this->get_scripts() );
			// set localize
			self::$localize = apply_filters( 'evox-elements/' . self::$base . '/localize', $this->get_localize() );
		}

		/**
		 * @param $options
		 *
		 * @return mixed
		 */
		protected function _handle_options( $options ) {

			foreach ( $options as $key => $option ) {
				if ( ! isset( $option['std'] ) ) {
					$type = $option['type'];

					switch ( $type ) {
						case 'dropdown':
							$values                 = ( ! empty( $option['value'] ) && is_array( $option['value'] ) ) ? array_values( $option['value'] ) : '';
							$options[ $key ]['std'] = $values ? reset( $values ) : '';
							break;
						case 'param_group':
							$options[ $key ]['params'] = $this->_handle_options( $option['params'] );
							break;
						case 'radio_image':
							$values                 = ( ! empty( $option['options'] ) && is_array( $option['options'] ) ) ? array_values( $option['options'] ) : '';
							$options[ $key ]['std'] = $values ? reset( $values ) : '';
							break;
						default:
							$options[ $key ]['std'] = '';
							break;
					}
				}
			}

			return $options;
		}

		/**
		 * @return array
		 */
		public function get_options() {
			return array();
		}

//		abstract function get_template_name( $instance );
		public function get_template_name() {

		}

		/**
		 * @return array
		 */
		public function get_styles() {
			return array();
		}

		/**
		 * @return array
		 */
		public function get_scripts() {
			return array();
		}

		/**
		 * @return array
		 */
		public function get_localize() {
			return array();
		}

		/**
		 * @return array
		 */
		public static function _get_assets() {
			$queue_assets = array();

			$prefix = apply_filters( 'evox-elements/prefix-assets', 'templaza-' );

			if ( self::$styles ) {
				// allow hook default folder
				$default_folder_css = apply_filters( 'evox-elements/default-assets-folder', self::$assets_path . 'css/', self::$base );
				$default_url_css    = apply_filters( 'evox-elements/default-assets-folder', self::$assets_url . 'css/', self::$base );

				foreach ( self::$styles as $handle => $args ) {
					$src      = $args['src'];
					$depends  = ( isset( $args['deps'] ) && is_array( $args['deps'] ) ) ? $args['deps'] : array();
					$media    = ! empty( $args['media'] ) ? $args['media'] : 'all';
					$deps_src = isset( $args['deps_src'] ) ? $args['deps_src'] : array();

					if ( file_exists( $default_folder_css . $src ) ) {
						// enqueue depends
						if ( $depends ) {
							foreach ( $depends as $depend ) {
								if ( wp_script_is( $depend ) ) {

									wp_enqueue_style( $depend );
								} else {
									do_action( 'evox-elements/enqueue-depends-styles', self::$base, $depend );
								}
							}
						}

						// add to queue
						$queue_assets['styles'][ $prefix . $handle ] = array(
							'url'      => $default_url_css . $src,
							'deps'     => $depends,
							'media'    => $media,
							'deps_src' => $deps_src
						);
					}
				}
			}

			if ( !empty(self::$scripts) ) {
				// allow hook default folder
				$default_folder_js = apply_filters( 'evox-elements/default-assets-folder', self::$assets_path . 'js/', self::$base );
				$default_url_js    = apply_filters( 'evox-elements/default-assets-folder', self::$assets_url . 'js/', self::$base );
				$localized         = false;

				foreach ( self::$scripts as $handle => $args ) {
					$src       = $args['src'];
					$depends   = ! empty( $args['deps'] ) ? $args['deps'] : array();
					$in_footer = isset( $args['in_footer'] ) ? $args['in_footer'] : true;
					$deps_src = isset( $args['deps_src'] ) ? $args['deps_src'] : array();

					if ( file_exists( $default_folder_js . $src ) ) {
						// enqueue depends
						if ( $depends ) {
							foreach ( $depends as $depend ) {
								if ( wp_script_is( $depend ) && $depend != 'jquery' ) {
									wp_enqueue_script( $depend );
								} else {
									do_action( 'evox-elements/enqueue-depends-scripts', self::$base, $depend );
								}
							}
						}
						// add to queue
						$queue_assets['scripts'][ $prefix . $handle ] = array(
							'url'       => $default_url_js . $src,
							'deps'      => $depends,
							'in_footer' => $in_footer,
							'deps_src' => $deps_src
						);

						if ( self::$localize ) {
							foreach ( self::$localize as $name => $data ) {
								$queue_assets['scripts'][ $prefix . $handle ]['localize'][ $name ] = $data;
							}
						}
//						if ( ! $localized && self::$localize ) {
//							$localized = true;
//							foreach ( self::$localize as $name => $data ) {
//								wp_localize_script( $prefix . $handle, $name, $data );
//							}
//						}
					}
				}
			}
			return $queue_assets;
		}

		/**
		 * Register scripts
		 */
		public static function register_scripts() {
			$queue = self::_get_assets();
			$localized = false;
			if ( $queue ) {
				foreach ( $queue as $key => $assets ) {
					if ( $key == 'styles' ) {
						if ( ! empty( $args['deps_src'] ) ) {
							foreach ( $args['deps_src'] as $deps_name => $deps_src ) {
								if ( ! wp_script_is( $deps_name, 'registered' ) ) {
									wp_register_style( $deps_name, $deps_src );
								}
							}
						}
						foreach ( $assets as $name => $args ) {
							wp_register_style( $name, $args['url'], $args['deps'], '', $args['media'] );
						}
					} else if ( $key == 'scripts' ) {
						foreach ( $assets as $name => $args ) {
							if ( ! empty( $args['deps_src'] ) ) {
								foreach ( $args['deps_src'] as $deps_name => $deps_src ) {
									if ( ! wp_script_is( $deps_name, 'registered' ) ) {
										wp_register_script( $deps_name, $deps_src );
									}
								}
							}
							if (! wp_script_is($name, 'registered')) {
								wp_register_script( $name, $args['url'], $args['deps'], '', $args['in_footer'] );
								// localize scripts
								if ( ! $localized && isset( $args['localize'] )  ) {
									foreach ( $args['localize'] as $index => $data ) {
										wp_localize_script( $name, $index, $data );
									}
									$localized = true;
								}
							}
						}
					}
				}
			}
		}

		/**
		 * Enqueue scripts.
		 */
		public static function enqueue_scripts() {
			$queue = self::_get_assets();

			if ( $queue ) {
				foreach ( $queue as $key => $assets ) {
					if ( $key == 'styles' ) {
						foreach ( $assets as $name => $args ) {
							if ( ! empty( $args['deps_src'] ) ) {
								foreach ( $args['deps_src'] as $deps_name => $deps_src ) {
									if ( ! wp_script_is( $deps_name, 'registered' ) ) {
										wp_register_style( $deps_name, $deps_src );
									}
								}
							}
							wp_enqueue_style( $name );
						}
					} else if ( $key == 'scripts' ) {
						foreach ( $assets as $name => $args ) {
							if ( ! empty( $args['deps_src'] ) ) {
								foreach ( $args['deps_src'] as $deps_name => $deps_src ) {
									if ( ! wp_script_is( $deps_name, 'registered' ) ) {
										wp_register_script( $deps_name, $deps_src );
									}
								}
							}
							wp_enqueue_script( $name );
						}
					}
				}
			}
		}

		/**
		 * Options to config number items in slider.
		 *
		 * @param array $default
		 * @param array $depends
		 *
		 * @return mixed
		 */
		protected function _number_items_options( $default = array(), $depends = array() ) {

			$options = apply_filters( 'evox-elements/element-default-number-items-slider', array(
				array(
					'type'             => 'number',
					'heading'          => esc_html__( 'Visible Items', 'evox-elements' ),
					'param_name'       => 'items_visible',
					'std'              => '4',
					'admin_label'      => true,
					'edit_field_class' => 'vc_col-xs-4',
				),

				array(
					'type'             => 'number',
					'heading'          => esc_html__( 'Tablet Items', 'evox-elements' ),
					'param_name'       => 'items_tablet',
					'std'              => '2',
					'admin_label'      => true,
					'edit_field_class' => 'vc_col-xs-4',
				),

				array(
					'type'             => 'number',
					'heading'          => esc_html__( 'Mobile Items', 'evox-elements' ),
					'param_name'       => 'items_mobile',
					'std'              => '1',
					'admin_label'      => true,
					'edit_field_class' => 'vc_col-xs-4',
				)
			) );

			// handle default value
			if ( $default ) {
				foreach ( $options as $key => $item ) {
					$name = $item['param_name'];
					if ( array_key_exists( $name, $default ) ) {
						$options[ $key ]['std'] = $default[ $name ];
					}
				}
			}

			// handle dependency
			if ( $depends ) {
				foreach ( $options as $key => $item ) {
					$options[ $key ]['dependency'] = $depends;
				}
			}

			return $options;
		}

		/**
		 * Get all Post type categories.
		 *
		 * @param       $category_name
		 *
		 * @return array
		 */
		protected function _post_type_categories( $category_name ) {

			global $wpdb;
			$categories = $wpdb->get_results( $wpdb->prepare(
				"
				  SELECT      t2.slug, t2.name
				  FROM        $wpdb->term_taxonomy AS t1
				  INNER JOIN $wpdb->terms AS t2 ON t1.term_id = t2.term_id
				  WHERE t1.taxonomy = %s
				  ",
				$category_name
			) );

			$options = array( esc_html__( 'All Category', 'evox-elements' ) => '' );
			foreach ( $categories as $category ) {

				$options[ html_entity_decode( $category->name ) ] = $category->slug;
			}

			return $options;
		}

		/**
		 * @return mixed
		 */
		protected function _setting_font_weights() {

			$font_weight = array(
				esc_html__( 'Select', 'evox-elements' ) => '',
				esc_html__( 'Normal', 'evox-elements' ) => 'normal',
				esc_html__( 'Bold', 'evox-elements' )   => 'bold',
				esc_html__( '100', 'evox-elements' )    => '100',
				esc_html__( '200', 'evox-elements' )    => '200',
				esc_html__( '300', 'evox-elements' )    => '300',
				esc_html__( '400', 'evox-elements' )    => '400',
				esc_html__( '500', 'evox-elements' )    => '500',
				esc_html__( '600', 'evox-elements' )    => '600',
				esc_html__( '700', 'evox-elements' )    => '700',
				esc_html__( '800', 'evox-elements' )    => '800',
				esc_html__( '900', 'evox-elements' )    => '900'
			);

			return apply_filters( 'evox-elements/settings-font-weight', $font_weight );
		}

		/**
		 * @return mixed
		 */
		protected function _setting_tags() {

			$tags = array(
				esc_html__( 'Select tag', 'evox-elements' ) => '',
				esc_html__( 'h1', 'evox-elements' )         => 'h1',
				esc_html__( 'h2', 'evox-elements' )         => 'h2',
				esc_html__( 'h3', 'evox-elements' )         => 'h3',
				esc_html__( 'h4', 'evox-elements' )         => 'h4',
				esc_html__( 'h5', 'evox-elements' )         => 'h5',
				esc_html__( 'h6', 'evox-elements' )         => 'h6'
			);

			return apply_filters( 'evox-elements/settings-tags', $tags );
		}

 		/**
		 * @return mixed
		 */
		protected function _setting_text_transform() {

			$text_transform = array(
				esc_html__( 'None', 'evox-elements' )       => 'none',
				esc_html__( 'Capitalize', 'evox-elements' ) => 'capitalize',
				esc_html__( 'Uppercase', 'evox-elements' )  => 'uppercase',
				esc_html__( 'Lowercase', 'evox-elements' )  => 'lowercase',
			);

			return apply_filters( 'evox-elements/settings-text-transform', $text_transform );
		}

		public function get_font_uikit() {
			$font_uikit = [
				''  => __( 'Choose an icon...', 'evox-elements' ),
				'home' => __( 'Home', 'evox-elements' ),
				'sign-in' => __( 'Sign-in', 'evox-elements' ),
				'sign-out' => __( 'Sign-out', 'evox-elements' ),
				'user' => __( 'User', 'evox-elements' ),
				'users' => __( 'Users', 'evox-elements' ),
				'lock' => __( 'Lock', 'evox-elements' ),
				'unlock' => __( 'Unlock', 'evox-elements' ),
				'settings' => __( 'Settings', 'evox-elements' ),
				'cog' => __( 'Cog', 'evox-elements' ),
				'nut' => __( 'Nut', 'evox-elements' ),
				'comment' => __( 'Comment', 'evox-elements' ),
				'commenting' => __( 'Commenting', 'evox-elements' ),
				'comments' => __( 'Comments', 'evox-elements' ),
				'hashtag' => __( 'Hashtag', 'evox-elements' ),
				'tag' => __( 'Tag', 'evox-elements' ),
				'cart' => __( 'Cart', 'evox-elements' ),
				'credit-card' => __( 'Credit-card', 'evox-elements' ),
				'mail' => __( 'Mail', 'evox-elements' ),
				'receiver' => __( 'Receiver', 'evox-elements' ),
				'search' => __( 'Search', 'evox-elements' ),
				'location' => __( 'Location', 'evox-elements' ),
				'bookmark' => __( 'Bookmark', 'evox-elements' ),
				'code' => __( 'Code', 'evox-elements' ),
				'paint-bucket' => __( 'Paint-bucket', 'evox-elements' ),
				'camera' => __( 'Camera', 'evox-elements' ),
				'bell' => __( 'Bell', 'evox-elements' ),
				'bolt' => __( 'Bolt', 'evox-elements' ),
				'star' => __( 'Star', 'evox-elements' ),
				'heart' => __( 'Heart', 'evox-elements' ),
				'happy' => __( 'Happy', 'evox-elements' ),
				'lifesaver' => __( 'Lifesaver', 'evox-elements' ),
				'rss' => __( 'Rss', 'evox-elements' ),
				'social' => __( 'Social', 'evox-elements' ),
				'git-branch' => __( 'Git-branch', 'evox-elements' ),
				'git-fork' => __( 'Git-fork', 'evox-elements' ),
				'world' => __( 'World', 'evox-elements' ),
				'calendar' => __( 'Calendar', 'evox-elements' ),
				'clock' => __( 'Clock', 'evox-elements' ),
				'history' => __( 'History', 'evox-elements' ),
				'future' => __( 'Future', 'evox-elements' ),
				'pencil' => __( 'Pencil', 'evox-elements' ),
				'trash' => __( 'Trash', 'evox-elements' ),
				'move' => __( 'Move', 'evox-elements' ),
				'link' => __( 'Link', 'evox-elements' ),
				'question' => __( 'Question', 'evox-elements' ),
				'info' => __( 'Info', 'evox-elements' ),
				'warning' => __( 'Warning', 'evox-elements' ),
				'image' => __( 'Image', 'evox-elements' ),
				'thumbnails' => __( 'Thumbnails', 'evox-elements' ),
				'table' => __( 'Table', 'evox-elements' ),
				'list' => __( 'List', 'evox-elements' ),
				'menu' => __( 'Menu', 'evox-elements' ),
				'grid' => __( 'Grid', 'evox-elements' ),
				'more' => __( 'More', 'evox-elements' ),
				'more-vertical' => __( 'More-vertical', 'evox-elements' ),
				'plus' => __( 'Plus', 'evox-elements' ),
				'plus-circle' => __( 'Plus-circle', 'evox-elements' ),
				'minus' => __( 'Minus', 'evox-elements' ),
				'minus-circle' => __( 'Minus-circle', 'evox-elements' ),
				'close' => __( 'Close', 'evox-elements' ),
				'check' => __( 'Check', 'evox-elements' ),
				'ban' => __( 'Ban', 'evox-elements' ),
				'refresh' => __( 'Refresh', 'evox-elements' ),
				'play' => __( 'Play', 'evox-elements' ),
				'play-circle' => __( 'Play-circle', 'evox-elements' ),
				'tv' => __( 'Tv', 'evox-elements' ),
				'desktop' => __( 'Desktop', 'evox-elements' ),
				'laptop' => __( 'Laptop', 'evox-elements' ),
				'tablet' => __( 'Tablet', 'evox-elements' ),
				'phone' => __( 'Phone', 'evox-elements' ),
				'tablet-landscape' => __( 'Tablet-landscape', 'evox-elements' ),
				'phone-landscape' => __( 'Phone-landscape', 'evox-elements' ),
				'file' => __( 'File', 'evox-elements' ),
				'copy' => __( 'Copy', 'evox-elements' ),
				'file-edit' => __( 'File-edit', 'evox-elements' ),
				'folder' => __( 'Folder', 'evox-elements' ),
				'album' => __( 'Album', 'evox-elements' ),
				'push' => __( 'Push', 'evox-elements' ),
				'pull' => __( 'Pull', 'evox-elements' ),
				'server' => __( 'Server', 'evox-elements' ),
				'database' => __( 'Database', 'evox-elements' ),
				'cloud-upload' => __( 'Cloud-upload', 'evox-elements' ),
				'cloud-download' => __( 'Cloud-download', 'evox-elements' ),
				'download' => __( 'Download', 'evox-elements' ),
				'upload' => __( 'Upload', 'evox-elements' ),
				'reply' => __( 'Reply', 'evox-elements' ),
				'forward' => __( 'Forward', 'evox-elements' ),
				'expand' => __( 'Expand', 'evox-elements' ),
				'shrink' => __( 'Shrink', 'evox-elements' ),
				'arrow-up' => __( 'Arrow-up', 'evox-elements' ),
				'arrow-down' => __( 'Arrow-down', 'evox-elements' ),
				'arrow-left' => __( 'Arrow-left', 'evox-elements' ),
				'arrow-right' => __( 'Arrow-right', 'evox-elements' ),
				'chevron-up' => __( 'Chevron-up', 'evox-elements' ),
				'chevron-down' => __( 'Chevron-down', 'evox-elements' ),
				'chevron-left' => __( 'Chevron-left', 'evox-elements' ),
				'chevron-right' => __( 'Chevron-right', 'evox-elements' ),
				'triangle-up' => __( 'Triangle-up', 'evox-elements' ),
				'triangle-down' => __( 'Triangle-down', 'evox-elements' ),
				'triangle-left' => __( 'Triangle-left', 'evox-elements' ),
				'triangle-right' => __( 'Triangle-right', 'evox-elements' ),
				'bold' => __( 'Bold', 'evox-elements' ),
				'italic' => __( 'Italic', 'evox-elements' ),
				'strikethrough' => __( 'Strikethrough', 'evox-elements' ),
				'video-camera' => __( 'Video-camera', 'evox-elements' ),
				'quote-right' => __( 'Quote-right', 'evox-elements' ),
				'500px' => __( '500px', 'evox-elements' ),
				'behance' => __( 'Behance', 'evox-elements' ),
				'dribbble' => __( 'Dribbble', 'evox-elements' ),
				'facebook' => __( 'Facebook', 'evox-elements' ),
				'flickr' => __( 'Flickr', 'evox-elements' ),
				'foursquare' => __( 'Foursquare', 'evox-elements' ),
				'github' => __( 'Github', 'evox-elements' ),
				'github-alt' => __( 'Github-alt', 'evox-elements' ),
				'gitter' => __( 'Gitter', 'evox-elements' ),
				'google' => __( 'Google', 'evox-elements' ),
				'google-plus' => __( 'Google-plus', 'evox-elements' ),
				'instagram' => __( 'Instagram', 'evox-elements' ),
				'joomla' => __( 'Joomla', 'evox-elements' ),
				'linkedin' => __( 'Linkedin', 'evox-elements' ),
				'pagekit' => __( 'Pagekit', 'evox-elements' ),
				'pinterest' => __( 'Pinterest', 'evox-elements' ),
				'soundcloud' => __( 'Soundcloud', 'evox-elements' ),
				'tripadvisor' => __( 'Tripadvisor', 'evox-elements' ),
				'tumblr' => __( 'Tumblr', 'evox-elements' ),
				'twitter' => __( 'Twitter', 'evox-elements' ),
				'uikit' => __( 'Uikit', 'evox-elements' ),
				'etsy' => __( 'Etsy', 'evox-elements' ),
				'vimeo' => __( 'Vimeo', 'evox-elements' ),
				'whatsapp' => __( 'Whatsapp', 'evox-elements' ),
				'wordpress' => __( 'Wordpress', 'evox-elements' ),
				'xing' => __( 'Xing', 'evox-elements' ),
				'yelp' => __( 'Yelp', 'evox-elements' ),
				'youtube' => __( 'Youtube', 'evox-elements' ),
				'print' => __( 'Print', 'evox-elements' ),
				'reddit' => __( 'Reddit', 'evox-elements' ),
				'file-text' => __( 'File Text', 'evox-elements' ),
				'file-pdf' => __( 'File Pdf', 'evox-elements' ),
				'chevron-double-left' => __( 'Chevron Double Left', 'evox-elements' ),
				'chevron-double-right' => __( 'Chevron Double Right', 'evox-elements' ),
			];
			return apply_filters( 'evox-elements/settings-font-uikit', $font_uikit );
		}

		public function get_general_options() {
			$options = array(
				array(
					'type'          => Controls_Manager::SELECT,
					'name'          => 'addon_margin_top',
					'label'         => esc_html__('Margin Top', 'evox-elements'),
					'description'   => esc_html__('Set the top margin.', 'evox-elements'),
					'options'       => array(
						'' => __('Keep existing', 'evox-elements'),
						'small' => __('Small', 'evox-elements'),
						'default' => __('Default', 'evox-elements'),
						'medium' => __('Medium', 'evox-elements'),
						'large' => __('Large', 'evox-elements'),
						'xlarge' => __('X-Large', 'evox-elements'),
						'remove' => __('None', 'evox-elements'),
					),
					'default'           => '',
					'start_section' => 'general',
					'section_name'      => esc_html__('General Settings', 'evox-elements')
				),
				array(
					'type'          => Controls_Manager::SELECT,
					'name'          => 'addon_margin_bottom',
					'label'         => esc_html__('Margin Bottom', 'evox-elements'),
					'description'   => esc_html__('Set the bottom margin.', 'evox-elements'),
					'options'       => array(
						'' => __('Keep existing', 'evox-elements'),
						'small' => __('Small', 'evox-elements'),
						'default' => __('Default', 'evox-elements'),
						'medium' => __('Medium', 'evox-elements'),
						'large' => __('Large', 'evox-elements'),
						'xlarge' => __('X-Large', 'evox-elements'),
						'remove' => __('None', 'evox-elements'),
					),
					'default'           => '',
				),
				array(
					'type'          => Controls_Manager::SELECT,
					'name'          => 'uk_container',
					'label'         => esc_html__('Container', 'evox-elements'),
					'description'   => esc_html__('Add the uk-container class to widget to give it a max-width and wrap the main content', 'evox-elements'),
					'options'       => array(
						'' => __('None', 'evox-elements'),
						'default' => __('Default', 'evox-elements'),
						'xsmall' => __('X-Small', 'evox-elements'),
						'small' => __('Small', 'evox-elements'),
						'large' => __('Large', 'evox-elements'),
						'xlarge' => __('X-Large', 'evox-elements'),
						'expand' => __('Expand', 'evox-elements'),
					),
					'default'           => '',
				),
				array(
					'type'          => Controls_Manager::SELECT,
					'name'          => 'addon_max_width',
					'label'         => esc_html__('Max Width', 'evox-elements'),
					'description'   => esc_html__('Set the maximum content width.', 'evox-elements'),
					'options'       => array(
						'' => __('None', 'evox-elements'),
						'small' => __('Small', 'evox-elements'),
						'medium' => __('Medium', 'evox-elements'),
						'large' => __('Large', 'evox-elements'),
						'xlarge' => __('X-Large', 'evox-elements'),
						'2xlarge' => __('2X-Large', 'evox-elements'),
					),
					'default'           => '',
				),
				array(
					'type'          => Controls_Manager::SELECT,
					'name'          => 'addon_max_width_breakpoint',
					'label'         => esc_html__('Max Width Breakpoint', 'evox-elements'),
					'description'   => esc_html__('Define the device width from which the element\'s max-width will apply.', 'evox-elements'),
					'options'       => array(
						'' => __('Always', 'evox-elements'),
						's' => __('Small (Phone Landscape)', 'evox-elements'),
						'm' => __('Medium (Tablet Landscape)', 'evox-elements'),
						'l' => __('Large (Desktop)', 'evox-elements'),
						'xl' => __('X-Large (Large Screens)', 'evox-elements'),
					),
					'default'           => '',
					'conditions' => [
						'terms' => [
							['name' => 'addon_max_width', 'operator' => '!==', 'value' => ''],
						],
					],
				),
				array(
					'type'          => Controls_Manager::SELECT,
					'name'          => 'block_align',
					'label'         => esc_html__('Block Alignment', 'evox-elements'),
					'description'   => esc_html__('Define the alignment in case the container exceeds the element\'s max-width.', 'evox-elements'),
					'options'       => array(
						''=>__('Left', 'evox-elements'),
						'center'=>__('Center', 'evox-elements'),
						'right'=>__('Right', 'evox-elements'),
					),
					'default'           => '',
					'conditions' => [
						'terms' => [
							['name' => 'addon_max_width', 'operator' => '!==', 'value' => ''],
						],
					],
				),
				array(
					'type'          => Controls_Manager::SELECT,
					'name'          => 'block_align_breakpoint',
					'label'         => esc_html__('Block Alignment Breakpoint', 'evox-elements'),
					'description'   => esc_html__('Define the device width from which the alignment will apply.', 'evox-elements'),
					'options'       => array(
						''=>__('Always', 'evox-elements'),
						's'=>__('Small (Phone Landscape)', 'evox-elements'),
						'm'=>__('Medium (Tablet Landscape)', 'evox-elements'),
						'l'=>__('Large (Desktop)', 'evox-elements'),
						'xl'=>__('X-Large (Large Screens)', 'evox-elements'),
					),
					'default'           => '',
					'conditions' => [
						'terms' => [
							['name' => 'addon_max_width', 'operator' => '!==', 'value' => ''],
						],
					],
				),
				array(
					'type'          => Controls_Manager::SELECT,
					'name'          => 'block_align_fallback',
					'label'         => esc_html__('Block Alignment Fallback', 'evox-elements'),
					'description'   => esc_html__('Define the alignment in case the container exceeds the element\'s max-width.', 'evox-elements'),
					'options'       => array(
						''=>__('Left', 'evox-elements'),
						'center'=>__('Center', 'evox-elements'),
						'right'=>__('Right', 'evox-elements'),
					),
					'default'           => '',
					'conditions' => [
						'relation' => 'and',
						'terms' => [
							['name' => 'addon_max_width', 'operator' => '!==', 'value' => ''],
							['name' => 'block_align_breakpoint', 'operator' => '!==', 'value' => ''],
						],
					],

				),
				array(
					'type'          => Controls_Manager::SELECT,
					'name'          => 'text_alignment',
					'label'         => esc_html__('Text Alignment', 'evox-elements'),
					'description'   => esc_html__('Center, left and right alignment may depend on a breakpoint and require a fallback.', 'evox-elements'),
					'options'       => array(
						'' => __('None', 'evox-elements'),
						'left' => __('Left', 'evox-elements'),
						'center' => __('Center', 'evox-elements'),
						'right' => __('Right', 'evox-elements'),
					),
					'default'           => '',

				),
				array(
					'type'          => Controls_Manager::SELECT,
					'name'          => 'text_alignment_breakpoint',
					'label'         => esc_html__('Text Alignment Breakpoint', 'evox-elements'),
					'description'   => esc_html__('Display the button alignment only on this device width and larger', 'evox-elements'),
					'options'       => array(
						'' => __('Always', 'evox-elements'),
						's' => __('Small (Phone Landscape)', 'evox-elements'),
						'm' => __('Medium (Tablet Landscape)', 'evox-elements'),
						'l' => __('Large (Desktop)', 'evox-elements'),
						'xl' => __('X-Large (Large Screens)', 'evox-elements'),
					),
					'default'           => '',
					'conditions' => [
						'terms' => [
							['name' => 'text_alignment', 'operator' => '!==', 'value' => ''],
						],
					],

				),
				array(
					'type'          => Controls_Manager::SELECT,
					'name'          => 'text_alignment_fallback',
					'label'         => esc_html__('Text Alignment Fallback', 'evox-elements'),
					'description'   => esc_html__('Define an alignment fallback for device widths below the breakpoint.', 'evox-elements'),
					'options'       => array(
						'' => __('None', 'evox-elements'),
						'left' => __('Left', 'evox-elements'),
						'center' => __('Center', 'evox-elements'),
						'right' => __('Right', 'evox-elements'),
					),
					'default'           => '',
					'conditions' => [
						'relation' => 'and',
						'terms' => [
							['name' => 'text_alignment', 'operator' => '!==', 'value' => ''],
							['name' => 'text_alignment_breakpoint', 'operator' => '!==', 'value' => ''],
						],
					],

				),
				array(
					'type'          => Controls_Manager::SELECT,
					'name'          => 'uk_animation',
					'label'         => esc_html__('Animation', 'evox-elements'),
					'description'   => esc_html__('A collection of smooth animations to use within your page.', 'evox-elements'),
					'options'       => array(
						'' => __('Inherit', 'evox-elements'),
						'fade' => __('Fade', 'evox-elements'),
						'scale-up' => __('Scale Up', 'evox-elements'),
						'scale-down' => __('Scale Down', 'evox-elements'),
						'slide-top-small' => __('Slide Top Small', 'evox-elements'),
						'slide-bottom-small' => __('Slide Bottom Small', 'evox-elements'),
						'slide-left-small' => __('Slide Left Small', 'evox-elements'),
						'slide-right-small' => __('Slide Right Small', 'evox-elements'),
						'slide-top-medium' => __('Slide Top Medium', 'evox-elements'),
						'slide-bottom-medium' => __('Slide Bottom Medium', 'evox-elements'),
						'slide-left-medium' => __('Slide Left Medium', 'evox-elements'),
						'slide-right-medium' => __('Slide Right Medium', 'evox-elements'),
						'slide-top' => __('Slide Top 100%', 'evox-elements'),
						'slide-bottom' => __('Slide Bottom 100%', 'evox-elements'),
						'slide-left' => __('Slide Left 100%', 'evox-elements'),
						'slide-right' => __('Slide Right 100%', 'evox-elements'),
						'parallax' => __('Parallax', 'evox-elements'),
					),
					'default'           => '',

				),
				array(
					'type'          => Controls_Manager::SWITCHER,
					'name'          => 'uk_animation_repeat',
					'label'         => esc_html__('Repeat Animation', 'evox-elements'),
					'description'   => esc_html__('Applies the animation class every time the element is in view', 'evox-elements'),
					'label_on' => __( 'Yes', 'evox-elements' ),
					'label_off' => __( 'No', 'evox-elements' ),
					'return_value' => '1',
					'default' => '0',
					'conditions' => [
						'relation' => 'and',
						'terms' => [
							['name' => 'uk_animation', 'operator' => '!==', 'value' => ''],
							['name' => 'uk_animation', 'operator' => '!==', 'value' => 'parallax'],
						],
					],

				),
				array(
					'type'          => Controls_Manager::SWITCHER,
					'name'          => 'uk_delay_element_animations',
					'label'         => esc_html__('Delay Element Animations', 'evox-elements'),
					'description'   => esc_html__('Delay element animations so that animations are slightly delayed and don\'t play all at the same time. Slide animations can come into effect with a fixed offset or at 100% of the element\’s own size.', 'evox-elements'),
					'label_on' => __( 'Yes', 'evox-elements' ),
					'label_off' => __( 'No', 'evox-elements' ),
					'return_value' => '1',
					'default' => '0',
					'conditions' => [
						'relation' => 'and',
						'terms' => [
							['name' => 'uk_animation', 'operator' => '!==', 'value' => ''],
							['name' => 'uk_animation', 'operator' => '!==', 'value' => 'parallax'],
						],
					],

				),
				array(
					'name'          => 'horizontal_start',
					'label' => __( 'Horizontal Start', 'evox-elements' ),
					'description'   => esc_html__('Animate the horizontal position (translateX) in pixels.', 'evox-elements'),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => -600,
							'max' => 600,
							'step' => 1,
						],
					],
					'separator'     => 'before',
					'conditions' => [
						'terms' => [
							['name' => 'uk_animation', 'operator' => '===', 'value' => 'parallax'],
						],
					],

				),
				array(
					'name'          => 'horizontal_end',
					'label' => __( 'Horizontal End', 'evox-elements' ),
					'description'   => esc_html__('Animate the horizontal position (translateX) in pixels.', 'evox-elements'),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => -600,
							'max' => 600,
							'step' => 1,
						],
					],
					'conditions' => [
						'terms' => [
							['name' => 'uk_animation', 'operator' => '===', 'value' => 'parallax'],
						],
					],

				),
				array(
					'name'          => 'vertical_start',
					'label' => __( 'Vertical Start', 'evox-elements' ),
					'description'   => esc_html__('Animate the vertical position (translateY) in pixels.', 'evox-elements'),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => -600,
							'max' => 600,
							'step' => 1,
						],
					],
					'conditions' => [
						'terms' => [
							['name' => 'uk_animation', 'operator' => '===', 'value' => 'parallax'],
						],
					],

				),
				array(
					'name'          => 'vertical_end',
					'label' => __( 'Vertical End', 'evox-elements' ),
					'description'   => esc_html__('Animate the vertical position (translateY) in pixels.', 'evox-elements'),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => -600,
							'max' => 600,
							'step' => 1,
						],
					],
					'conditions' => [
						'terms' => [
							['name' => 'uk_animation', 'operator' => '===', 'value' => 'parallax'],
						],
					],

				),
				array(
					'name'          => 'scale_start',
					'label' => __( 'Scale Start', 'evox-elements' ),
					'description'   => esc_html__('Animate the scaling. Min: 50, Max: 200 =>  100 means 100% scale, 200 means 200% scale, and 50 means 50% scale.', 'evox-elements'),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ '%'],
					'range' => [
						'px' => [
							'min' => 50,
							'max' => 200,
							'step' => 1,
						],
					],
					'conditions' => [
						'terms' => [
							['name' => 'uk_animation', 'operator' => '===', 'value' => 'parallax'],
						],
					],

				),
				array(
					'name'          => 'scale_end',
					'label' => __( 'Scale End', 'evox-elements' ),
					'description'   => esc_html__('Animate the scaling. Min: 50, Max: 200 =>  100 means 100% scale, 200 means 200% scale, and 50 means 50% scale.', 'evox-elements'),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ '%'],
					'range' => [
						'px' => [
							'min' => 50,
							'max' => 200,
							'step' => 1,
						],
					],
					'conditions' => [
						'terms' => [
							['name' => 'uk_animation', 'operator' => '===', 'value' => 'parallax'],
						],
					],

				),
				array(
					'name'          => 'rotate_start',
					'label' => __( 'Rotate Start', 'evox-elements' ),
					'description'   => esc_html__('Animate the rotation clockwise in degrees.', 'evox-elements'),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 360,
							'step' => 1,
						],
					],
					'conditions' => [
						'terms' => [
							['name' => 'uk_animation', 'operator' => '===', 'value' => 'parallax'],
						],
					],

				),
				array(
					'name'          => 'rotate_end',
					'label' => __( 'Rotate End', 'evox-elements' ),
					'description'   => esc_html__('Animate the rotation clockwise in degrees.', 'evox-elements'),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 360,
							'step' => 1,
						],
					],
					'conditions' => [
						'terms' => [
							['name' => 'uk_animation', 'operator' => '===', 'value' => 'parallax'],
						],
					],

				),
				array(
					'name'          => 'opacity_start',
					'label' => __( 'Opacity Start', 'evox-elements' ),
					'description'   => esc_html__('Animate the opacity. 100 means 100% opacity, and 0 means 0% opacity.', 'evox-elements'),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ '%'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'conditions' => [
						'terms' => [
							['name' => 'uk_animation', 'operator' => '===', 'value' => 'parallax'],
						],
					],

				),
				array(
					'name'          => 'opacity_end',
					'label' => __( 'Opacity End', 'evox-elements' ),
					'description'   => esc_html__('Animate the opacity. 100 means 100% opacity, and 0 means 0% opacity.', 'evox-elements'),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ '%'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'conditions' => [
						'terms' => [
							['name' => 'uk_animation', 'operator' => '===', 'value' => 'parallax'],
						],
					],

				),
				array(
					'name'          => 'easing',
					'label' => __( 'Easing', 'evox-elements' ),
					'description'   => esc_html__('Set the animation easing. A value below 100 is faster in the beginning and slower towards the end while a value above 100 behaves inversely.', 'evox-elements'),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => -200,
							'max' => 200,
							'step' => 1,
						],
					],
					'conditions' => [
						'terms' => [
							['name' => 'uk_animation', 'operator' => '===', 'value' => 'parallax'],
						],
					],

				),
				array(
					'name'          => 'uk-viewport',
					'label' => __( 'Viewport', 'evox-elements' ),
					'description'   => esc_html__('Set the animation end point relative to viewport height, e.g. 50 for 50% of the viewport', 'evox-elements'),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ '%'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'conditions' => [
						'terms' => [
							['name' => 'uk_animation', 'operator' => '===', 'value' => 'parallax'],
						],
					],

				),
				array(
					'type'          => Controls_Manager::SWITCHER,
					'name'          => 'parallax_target',
					'label'         => esc_html__('Target', 'evox-elements'),
					'description'   => esc_html__('Animate the element as long as the section is visible.', 'evox-elements'),
					'label_on' => __( 'Yes', 'evox-elements' ),
					'label_off' => __( 'No', 'evox-elements' ),
					'return_value' => '1',
					'default' => '0',
					'conditions' => [
						'terms' => [
							['name' => 'uk_animation', 'operator' => '===', 'value' => 'parallax'],
						],
					],

				),
				array(
					'type'          => Controls_Manager::SWITCHER,
					'name'          => 'parallax_zindex',
					'label'         => esc_html__('Z Index', 'evox-elements'),
					'description'   => esc_html__('Set a higher stacking order.', 'evox-elements'),
					'label_on' => __( 'Yes', 'evox-elements' ),
					'label_off' => __( 'No', 'evox-elements' ),
					'return_value' => '1',
					'default' => '0',
					'conditions' => [
						'terms' => [
							['name' => 'uk_animation', 'operator' => '===', 'value' => 'parallax'],
						],
					],

				),
				array(
					'type'          => Controls_Manager::SELECT,
					'name'          => 'uk_breakpoint',
					'label'         => esc_html__('Breakpoint', 'evox-elements'),
					'description'   => esc_html__('Display the parallax effect only on this device width and larger. It is useful to disable the parallax animation on small viewports.', 'evox-elements'),
					'options'       => array(
						'' => __('Always', 'evox-elements'),
						's' => __('Small (Phone Landscape)', 'evox-elements'),
						'm' => __('Medium (Tablet Landscape)', 'evox-elements'),
						'l' => __('Large (Desktop)', 'evox-elements'),
						'xl' => __('X-Large (Large Screens)', 'evox-elements'),
					),
					'default'           => '',
					'conditions' => [
						'terms' => [
							['name' => 'uk_animation', 'operator' => '===', 'value' => 'parallax'],
						],
					],

				),
				array(
					'type'          => Controls_Manager::SELECT,
					'name'          => 'uk_visibility',
					'label'         => esc_html__('Visibility', 'evox-elements'),
					'description'   => esc_html__('Display the element only on this device width and larger.', 'evox-elements'),
					'options'       => array(
						'' => __('Always', 'evox-elements'),
						'uk-visible@s' => __('Small (Phone Landscape)', 'evox-elements'),
						'uk-visible@m' => __('Medium (Tablet Landscape)', 'evox-elements'),
						'uk-visible@l' => __('Large (Desktop)', 'evox-elements'),
						'uk-visible@xl' => __('X-Large (Large Screens)', 'evox-elements'),
						'uk-hidden@s' => __('Hidden Small (Phone Landscape)', 'evox-elements'),
						'uk-hidden@m' => __('Hidden Medium (Tablet Landscape)', 'evox-elements'),
						'uk-hidden@l' => __('Hidden Large (Desktop)', 'evox-elements'),
						'uk-hidden@xl' => __('Hidden X-Large (Large Screens)', 'evox-elements'),
					),
					'default'           => '',

				),
			);
			return apply_filters( 'evox-elements/settings-general-options', $options );
		}
	}
}