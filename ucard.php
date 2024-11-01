<?php
/**
 * @package Ucard
 * @author RainaStudio
 * @version 1.0.1
 */

// load adminpanel
require_once( ucard_inc . 'office.php' );

// check to make sure Genesis Framework is active
register_activation_hook(__FILE__, 'ucard_require_genesis');
function ucard_require_genesis() {
		
  if( basename( get_template_directory() ) != 'genesis' ) {
    deactivate_plugins(plugin_basename(__FILE__));
    wp_die('Sorry, you can\'t use this plugin unless a <a href="http://my.studiopress.com/themes/" target="_blank" rel="nofollow">Genesis</a> theme is active. <a href="/wp-admin/plugins.php">Go Back</a>.');

  }

}

// load admin scripts
add_action( 'admin_enqueue_scripts', 'ucard_admin_scripts' );
function ucard_admin_scripts( $hook ) {
 
  global $custommenu, $customsubmenu;
  $allowed = array( $custommenu, $customsubmenu );

  if( !in_array( $hook, $allowed)  ){
      return;
  }

  wp_enqueue_style( 'ucard_admin_css', ucard_css . 'admin.css', array(), ucard_v );
  wp_enqueue_script( 'ucard_admin_js', ucard_js . 'admin.js', array('jquery'), ucard_v, true );
		
}

// load wp scripts & stylesheet
add_action( 'wp_enqueue_scripts', 'ucard_scripts' );
function ucard_scripts() {
  
    wp_enqueue_style( 'ucard_app_css', ucard_css . 'style.css', array(), ucard_v );
    wp_enqueue_script( 'ucard_app_js', ucard_js . 'app.js', array('jquery'), ucard_v, true );

}

// delete options
function ucard_plugin_reset() {

  if ( isset( $_GET['r_ucard'] ) ){

    $settingOptions = array(
        'enable_for_all',
        'enable_for_all_check',
        'enable_for_cat',
        'enable_for_tag',
        'enable_like_btn',
        'enable_reading_time',
        'enable_date',
        'enable_cat_meta',
        'enable_comment_c',
        'enable_author_name',
        'enable_read_more',
        'enable_post_view',
        'enable_excerpt_l',
        'enable_author_avatar'
    );

    // clear up our settings
    foreach ( $settingOptions as $settingName ) {
      delete_option( $settingName );
    }

    exit( wp_redirect( admin_url( 'admin.php?page=genesis-uicard' ) ) );

  }
}
add_action( 'admin_init', 'ucard_plugin_reset' );