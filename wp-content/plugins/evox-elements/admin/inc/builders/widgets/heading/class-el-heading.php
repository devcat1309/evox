<?php
/**
 * Evox_Elements Elementor Heading widget
 *
 * @version     1.0.0
 * @author      ThimPress
 * @package     Evox_Elements/Classes
 * @category    Classes
 */

use Elementor\Utils;

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Evox_Elements_El_Heading' ) ) {
	/**
	 * Class Evox_Elements_El_Heading
	 */
	class Evox_Elements_El_Heading extends Evox_Elements_El_Widget {

		/**
		 * @var string
		 */
		protected $config_class = 'Evox_Elements_Config_Heading';

        public function convert_setting($settings){

            if(isset($settings['link']['custom_attributes']) && !empty($settings['link']['custom_attributes'])) {
                $attributes = Utils::parse_custom_attributes($settings['link']['custom_attributes']);

                $settings['link']['custom_class']  = isset($attributes['class'])?' '.$attributes['class']:'';

                unset($attributes['class']);

                $this -> set_render_attribute('link_attributes', $attributes);

                $settings['link']['custom_attributes'] = $this -> get_render_attribute_string('link_attributes');
            }

		    return $settings;
        }

    }
}