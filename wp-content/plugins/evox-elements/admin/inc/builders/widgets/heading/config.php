<?php
/**
 * Evox_Elements Heading config class
 *
 * @version     1.0.0
 * @author      TemPlaza
 * @package     Evox_Elements/Classes
 * @category    Classes
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;

if ( ! class_exists( 'Evox_Elements_Config_Heading' ) ) {
	/**
	 * Class Evox_Elements_Config_Heading
	 */
	class Evox_Elements_Config_Heading extends Evox_Elements_Abstract_Config {

		/**
		 * Evox_Elements_Config_Heading constructor.
		 */
		public function __construct() {
			// info
			self::$base = 'heading';
			self::$name = esc_html__( 'Evox: Heading', 'evox-elements' );
			self::$desc = esc_html__( 'Add heading text.', 'evox-elements' );
			self::$icon = 'eicon-heading';
//			self::$icon = 'fas fa-heading';
			parent::__construct();

//			wp_register_style('templaza-el-heading', '');
		}

        public function get_styles() {
            return ['el-heading' => array(
                'src'   => 'style.css'
            )];
        }

		/**
		 * @return array
		 */
		public function get_options() {

			// options
			$options    =    array(
				array(
					'type'          => Controls_Manager::TEXTAREA,
                    'name'          => 'title',
					'label'         => esc_html__( 'Title', 'evox-elements' ),
					'default'       => __('Add Your Heading Text Here', 'evox-elements'),
					'description'   => esc_html__( 'Write the title for the heading.', 'evox-elements' ),
                    'dynamic'       => [
                        'active'    => true,
                    ],
                    /* vc */
					'admin_label'   => true,
				),
                array(
                    'type'          => Controls_Manager::URL,
                    'name'          => 'link',
                    'label'         => __( 'Link', 'evox-elements' ),
                    'dynamic'       => [
                        'active'    => true,
                    ],
                    'default'       => [
                        'url'       => '',
                    ],
                ),

                array(
                    'type'          => Controls_Manager::SELECT,
                    'name'          => 'header_size',
                    'label'         => esc_html__( 'Heading tag', 'evox-elements' ),
                    'options'       => array(
                        'h1'        => 'h1',
                        'h2'        => 'h2',
                        'h3'        => 'h3',
                        'h4'        => 'h4',
                        'h5'        => 'h5',
                        'h6'        => 'h6',
                        'div'       => 'div',
                        'span'      => 'span',
                        'p'         => 'p',
                    ),
                    'default'       => 'h3',
                    'description'   => esc_html__( 'Choose heading element.', 'evox-elements' ),
                    'condition'     => array(
                        'title!'    => ''
                    ),
                    /* vc */
                    'admin_label' => false,
                ),

                array(
                    'type'          => Controls_Manager::SELECT,
                    'name'          => 'title_heading_style',
                    'default'       => 'h3',
                    'label'         => esc_html__('Style', 'evox-elements'),
                    'description'   => esc_html__('Heading styles differ in font-size but may also come with a predefined color, size and font', 'evox-elements'),
                    'options'       => array(
                        ''                  => esc_html__('None', 'evox-elements'),
                        'heading-2xlarge'   => esc_html__('2XLarge', 'evox-elements'),
                        'heading-xlarge'    => esc_html__('XLarge', 'evox-elements'),
                        'heading-large'     => esc_html__('Large', 'evox-elements'),
                        'heading-medium'    => esc_html__('Medium', 'evox-elements'),
                        'heading-small'     => esc_html__('Small', 'evox-elements'),
                        'h1'                => esc_html__('H1', 'evox-elements'),
                        'h2'                => esc_html__('H2', 'evox-elements'),
                        'h3'                => esc_html__('H3', 'evox-elements'),
                        'h4'                => esc_html__('H4', 'evox-elements'),
                        'h5'                => esc_html__('H5', 'evox-elements'),
                        'h6'                => esc_html__('H6', 'evox-elements'),
                    ),
                    'condition'     => array(
                        'title!'    => ''
                    ),
                ),
                array(
                    'type'          =>  Controls_Manager::SELECT,
                    'name'          => 'title_heading_margin',
                    'label'         => esc_html__('Title Margin', 'evox-elements'),
                    'description'   => esc_html__('Set the vertical margin for title.', 'evox-elements'),
                    'options'       => array(
                        ''          => esc_html__('Default', 'evox-elements'),
                        'small'     => esc_html__('Small', 'evox-elements'),
                        'medium'    => esc_html__('Medium', 'evox-elements'),
                        'large'     => esc_html__('Large', 'evox-elements'),
                        'xlarge'    => esc_html__('X-Large', 'evox-elements'),
                        'remove'    => esc_html__('None', 'evox-elements'),
                    ),
                    'default'       => '',
                    'condition'     => array(
                        'title!'    => ''
                    ),
                ),

				// Highlight text
				array(
					'type'          => Controls_Manager::TEXTAREA,
                    'name'          => 'highlight_title',
					'label'         => esc_html__( 'Highlighted Title', 'evox-elements' ),
					'default'       => '',
					'description'   => esc_html__( 'Write the Highlighted title for the heading.', 'evox-elements' ),
                    'separator'     => 'before',
					/* vc */
					'admin_label'    => true,
				),
				array(
					'type'          => Controls_Manager::SELECT,
                    'name'          => 'heading_style',
                    'default'       => '',
					'label'         => esc_html__( 'Highlight Effect', 'evox-elements' ),
					'description'   => esc_html__( 'Create attractive headlines that help keep your visitors interested and engaged.', 'evox-elements' ),
					'options'       => array(
                        ''              => esc_html__('None', 'evox-elements'),
                        'circle'        => esc_html__('Circle', 'evox-elements'),
                        'curly-line'    => esc_html__('Curly Line', 'evox-elements'),
                        'double'        => esc_html__('Double', 'evox-elements'),
                        'double-line'   => esc_html__('Double Line', 'evox-elements'),
                        'zigzag'        => esc_html__('Zigzag', 'evox-elements'),
                        'diagonal'      => esc_html__('Diagonal', 'evox-elements'),
                        'underline'     => esc_html__('Underline', 'evox-elements'),
                        'delete'        => esc_html__('Delete', 'evox-elements'),
                        'strike'        => esc_html__('Strikethrough', 'evox-elements'),
                    ),
					'condition'     => array(
					    'highlight_title!'    => ''
                    ),
					/* vc */
					'admin_label'    => true,
				),
                array(
                    'type'      => Controls_Manager::SLIDER,
                    'name'      => 'shapes_width',
                    'label'     => esc_html__('Shapes Width', 'evox-elements'),
                    'default'   => array(
                        'size'  => 9,
                        'unit'  => 'px'
                    ),
                    'range'     => array(
                        'min'       => 0,
                        'max'       => 100,
                    ),
                    'condition' => array(
                        'highlight_title!'  => '',
                        'heading_style!'    => '',
                    ),
                    'selectors' => array(
                        '{{WRAPPER}} svg path' => 'stroke-width: {{SIZE}};'
                    )
                ),

				array(
					'type'          => Controls_Manager::TEXTAREA,
					'name'          => 'after_highlight_title',
					'label'         => esc_html__( 'After Highlighted Title', 'evox-elements' ),
					'default'       => '',
					'description'   => esc_html__( 'Write the text after Highlighted title for the heading.', 'evox-elements' ),
					'admin_label'    => true,
				),

				// Sub heading
				array(
					'type'          => Controls_Manager::TEXTAREA,
					'label'         => esc_html__( 'Sub heading', 'evox-elements' ),
					'name'          => 'sub_heading',
					'default'       => '',
					'description'   => esc_html__( 'Enter sub heading.', 'evox-elements' ),
                    'separator'     => 'before',
				),

				// Config
				array(
					'type'          => Controls_Manager::SWITCHER,
                    'name'          => 'clone_title',
                    'default'       => false,
					'label'         => esc_html__( 'Clone Title?', 'evox-elements' ),
					'description'   => esc_html__( 'Clone Title.', 'evox-elements' ),
                    'separator'     => 'before',
                    /*vc*/
                    'admin_label'   => false,
				),
				array(
					'type'          => Controls_Manager::SLIDER,
                    'name'          => 'clone_opacity',
                    'size_units'    => ['px'],
                    'range'         => [
                        'px' => [
                            'max' => 1,
                            'min' => 0.10,
                            'step' => 0.01,
                        ],
                    ],
                    'default'       => [
                        'size' => 0.05,
                    ],
					'label'         => esc_html__( 'Clone Title Opacity', 'evox-elements' ),
					'description'   => esc_html__( 'Clone Title Opacity.', 'evox-elements' ),
                    'condition'     => ['clone_title'  => 'yes'],
                    'selectors' => [
                        '{{WRAPPER}} .clone' => 'opacity: {{SIZE}};',
                    ],
                    /*vc*/
                    'admin_label'   => false,
				),
				//Show separator?
				array(
					'type'          => Controls_Manager::SWITCHER,
                    'name'            => 'line',
					'label'         => esc_html__( 'Show Separator?', 'evox-elements' ),
                    'default'       => 'yes',
					'description'   => esc_html__( 'Tick it to show the separator between title and description.', 'evox-elements' ),
                    /*vc*/
                    'admin_label'   => false,
				),

				//Alignment
				array(
                    'type'         => Controls_Manager::CHOOSE,
					'label'         => esc_html__( 'Text alignment', 'evox-elements' ),
					'name'          => 'text_align',
                    'responsive'    => true, /* this will be add in responsive layout */
                    'options'       => [
                        'left'      => [
                            'title' => __( 'Left', 'evox-elements' ),
                            'icon'  => 'eicon-text-align-left',
                        ],
                        'center'    => [
                            'title' => __( 'Center', 'evox-elements' ),
                            'icon'  => 'eicon-text-align-center',
                        ],
                        'right'     => [
                            'title' => __( 'Right', 'evox-elements' ),
                            'icon'  => 'eicon-text-align-right',
                        ],
                        'justify'   => [
                            'title' => __( 'Justified', 'evox-elements' ),
                            'icon'  => 'eicon-text-align-justify',
                        ],
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} .sc_heading' => 'text-align: {{VALUE}};',
                    ],
                    /*vc*/
                    'admin_label'   => false,
				),

                /* Style tab */
                // Typo
                array(
                    'type'          => Group_Control_Typography::get_type(),
                    'name'          => 'typography',
                    'scheme'        => Typography::TYPOGRAPHY_1,
                    'selector'      => '{{WRAPPER}} .heading-highlighted-wrapper',
                    'start_section' => 'style',
                    'section_tab'   => Controls_Manager::TAB_STYLE,
                    'section_name'  => esc_html__( self::$name, 'evox-elements' ),

                ),
                array(
                    'type'          => Group_Control_Typography::get_type(),
                    'name'          => 'sub_heading_typography',
                    'scheme'        => Typography::TYPOGRAPHY_1,
                    'label'         => esc_html__('Sub Heading Typography', 'evox-elements'),
                    'selector'      => '{{WRAPPER}} .sub-heading',
                    'section_name'  => esc_html__( self::$name, 'evox-elements' ),

                ),

                //Title color
                array(
                    'type'          => Controls_Manager::COLOR,
                    'name'          => 'textcolor',
                    'label'         => esc_html__( 'Heading color', 'evox-elements' ),
                    'default'       => '',
                    'description'   => esc_html__( 'Select the title color.', 'evox-elements' ),
                    'section_name'  => esc_html__( self::$name, 'evox-elements' ),
                    'selectors'     => [
                        '{{WRAPPER}} .title' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .clone' => 'color: {{VALUE}};',
                    ],
                    'separator'     => 'before',
                ),
                //Link color
                array(
                    'type'          => Controls_Manager::COLOR,
                    'name'          => 'link_hover_color',
                    'label'         => esc_html__( 'Heading Link Hover Color', 'evox-elements' ),
                    'default'       => '',
                    'description'   => esc_html__( 'Select the link hover color.', 'evox-elements' ),
                    'section_name'  => esc_html__( self::$name, 'evox-elements' ),
                    'selectors'     => [
                        '{{WRAPPER}} .title a:hover' => 'color: {{VALUE}};',
                    ],
                ),
                //Main color
                array(
                    'type'          => Controls_Manager::COLOR,
                    'name'          => 'highlight_title_color',
                    'label'         => esc_html__( 'Highlight title color ', 'evox-elements' ),
                    'default'       => '',
                    'description'   => esc_html__( 'Select the title color.', 'evox-elements' ),
                    'selectors'     => [
                        '{{WRAPPER}} .heading-highlighted-text' => 'color: {{VALUE}};',
                    ],
//                    'start_section' => 'style',
                    'section_tab'   => Controls_Manager::TAB_STYLE,
                    'section_name'  => esc_html__( self::$name, 'evox-elements' ),
                ),
                //Description color
                array(
                    'type'          => Controls_Manager::COLOR,
                    'label'         => esc_html__( 'Sub heading color ', 'evox-elements' ),
                    'name'          => 'sub_heading_color',
                    'default'       => '',
                    'description'   => esc_html__( 'Select the sub heading color.', 'evox-elements' ),
                    'selectors'     => [
                        '{{WRAPPER}} .sub-heading' => 'color: {{VALUE}};',
                    ],
                ),
                //Separator color
                array(
                    'type'          => Controls_Manager::COLOR,
                    'name'          => 'bg_line',
                    'label'         => esc_html__( 'Separator color', 'evox-elements' ),
                    'default'       => '',
                    'description'   => esc_html__( 'Choose the separator color.', 'evox-elements' ),
                    'selectors'     => [
                        '{{WRAPPER}} .line' => 'background-color: {{VALUE}};',
                    ],
                    /*vc*/
                    'admin_label'   => false,
                ),
                array(
                    'type'      => Controls_Manager::COLOR,
                    'name'      => 'shapes_color',
                    'label'     => esc_html__('Shapes Color', 'evox-elements'),
                    'selectors' => array(
                        '{{WRAPPER}} svg path' => 'stroke: {{VALUE}};'
                    ),
                    'separator'     => 'before',
                ),

			);
			return array_merge($options, $this->get_general_options());
		}

		public function get_template_name() {
			return 'base';
		}
	}
}