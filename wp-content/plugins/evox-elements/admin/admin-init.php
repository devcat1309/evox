<?php
require_once PLUGIN_SERVER_PATH.'/admin/inc/post-formats-ui.php';
require_once PLUGIN_SERVER_PATH.'/admin/posttype/portfolio.php';
require_once PLUGIN_SERVER_PATH.'/admin/posttype/gutenberg/gutenberg.php';

/*
* Required: widget recent post
*/
require PLUGIN_SERVER_PATH . '/admin/widgets/recent-post.php';
require PLUGIN_SERVER_PATH . '/admin/widgets/social.php';
require PLUGIN_SERVER_PATH . '/admin/widgets/button.php';

/*
* Required: Required: Templaza Elementor
*/
require PLUGIN_SERVER_PATH . '/admin/inc/builders/class-register-shortcode.php';