<?php
/*
Plugin Name: Resource Filter
Description: Resource filter plugin.
Version: 1.0
Author: Jhanvi
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

if (!defined('RESOURCE_FILTER_FILE')) {
    define('RESOURCE_FILTER_FILE', __FILE__);
}   


require_once plugin_dir_path(__FILE__) . 'includes/resource-plugin-activator.php';
// require_once plugin_dir_path(__FILE__) . 'includes/resource-plugin-deactivator.php';


?>
