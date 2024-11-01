<?php
/*
Plugin Name: Ucard
Plugin URI: https://wordpress.org/plugins/ucard
Description: Ucard lets you change the design of blog page and other archive pages if your website built on Genesis Framework.
Author: RainaStudio
Author URI: http://rainastudio.com/
Version: 1.0.1
Text Domain: ucard
License: GNU General Public License v2.0 (or later)
License URI: http://www.opensource.org/licenses/gpl-license.php
*/

if ( ! defined( 'ABSPATH' ) ){
	exit; // exit if accessed this file directly
}

// define constants
define( 'ucard_v', '1.0.0' );
define( 'ucard_inc', plugin_dir_path( __FILE__ ) . 'admin/');
define( 'ucard_loop', plugin_dir_path( __FILE__ ) . 'loops/');
define( 'ucard_css', plugins_url( '/assets/css/', __FILE__ ) );
define( 'ucard_js', plugins_url( '/assets/js/', __FILE__ ) );
define( 'ucard_img', plugins_url( '/assets/img/', __FILE__ ) );

// load the engine
require_once( plugin_dir_path( __FILE__ ) . 'ucard.php' );