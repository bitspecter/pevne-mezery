<?php
/*
Plugin Name: Pevné mezery
Description: Plugin pro automatické doplnění pevných mezer podle českých typografických pravidel. Podpora WooCommerce a ACF.
Version: 1.0
Requires PHP: 8.0
Author: BitSpecter
Author URI: https://bitspecter.com
Plugin URI: https://github.com/bitspecter/pevne-mezery
Text Domain: pevne-mezery
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

namespace BitSpecter\PevneMezery;

if (! defined('ABSPATH')) {
    exit; // Prevent direct access
}

// Ensure HOUR_IN_SECONDS is defined
if (! defined('HOUR_IN_SECONDS')) {
    define('HOUR_IN_SECONDS', 3600);
}

// Include necessary classes
require_once plugin_dir_path(__FILE__) . 'includes/class-fixed-spaces.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-content-handler.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-cache-handler.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-typography-rules.php';  
require_once plugin_dir_path(__FILE__) . 'includes/class-utils.php';    

require_once plugin_dir_path(__FILE__) . 'integrations/class-acf-support.php';
require_once plugin_dir_path(__FILE__) . 'integrations/class-woocommerce-support.php';

// Initialize the plugin
new PevneMezery();
