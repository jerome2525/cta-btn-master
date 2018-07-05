<?php
/*
Plugin Name: CTA Button 
Description: To use CTA button to any part of the pages with a nice cool admin
Plugin URI: http://wp-needs.com
Author: Jerome Anyayahan
Author URI: http://wp-needs.com
Version: 1.0
License: GPL2
Text Domain: Text Domain
Domain Path: Domain Path
*/

require plugin_dir_path( __FILE__ ) . 'inc/cta-btn.php';

$genesis_camp = new Cta_Btn();