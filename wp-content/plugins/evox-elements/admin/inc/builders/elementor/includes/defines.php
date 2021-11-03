<?php

defined('ABSPATH') or exit();

if(!defined('Evox_Elements_ELEMENTOR_PATH')){
    define('Evox_Elements_ELEMENTOR_PATH', dirname( dirname(__FILE__)));
}
if(!defined('Evox_Elements_ELEMENTOR')){
    define('Evox_Elements_ELEMENTOR', basename(Evox_Elements_ELEMENTOR_PATH));
}
if(!defined('Evox_Elements_ELEMENTOR_WIDGETS_PATH')){
    define('Evox_Elements_ELEMENTOR_WIDGETS_PATH', Evox_Elements_ELEMENTOR_PATH.'/widgets');
}