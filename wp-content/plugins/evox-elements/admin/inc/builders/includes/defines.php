<?php

defined('ABSPATH') or exit();

if(!defined('Evox_Elements_BUILDERS_PATH')){
    define('Evox_Elements_BUILDERS_PATH', dirname( dirname(__FILE__)));
}
if(!defined('Evox_Elements_BUILDERS_PLUGIN_PATH')){
    define('Evox_Elements_BUILDERS_PLUGIN_PATH', dirname(dirname( dirname(Evox_Elements_BUILDERS_PATH))));
}
if(!defined('Evox_Elements_BUILDERS_ADMIN_PATH')){
    define('Evox_Elements_BUILDERS_ADMIN_PATH', Evox_Elements_BUILDERS_PLUGIN_PATH.'/admin');
}
if(!defined('Evox_Elements_BUILDERS_PLUGIN_URI')){
    define('Evox_Elements_BUILDERS_PLUGIN_URI', plugin_dir_url(Evox_Elements_BUILDERS_ADMIN_PATH));
}
if(!defined('Evox_Elements_BUILDERS')){
    define('Evox_Elements_BUILDERS', basename(Evox_Elements_BUILDERS_PATH));
}
if(!defined('Evox_Elements_BUILDERS_WIDGETS_PATH')){
    define('Evox_Elements_BUILDERS_WIDGETS_PATH', Evox_Elements_BUILDERS_PATH.'/widgets');
}