<?php
/**
 * @package Ucard
 * @author RainaStudio
 * @version 1.0.1
 */

// add ucard submenu
add_action('admin_menu', 'register_ucard_submenu');
    
function register_ucard_submenu() {

    global $custommenu, $customsubmenu;

    $customsubmenu = add_submenu_page( 'genesis', 'Ucard Settings', 'Ucard', 'manage_options', 'genesis-uicard', 'ucard_page' );
    
    // save sanitization data
    add_action( 'admin_init', 'sanitize_ucard_opitions_settings' );
}

function ucard_page() {
    // load options panel
    include( plugin_dir_path( __FILE__ ) . 'panel.php' );
}

// sanitize option data
function sanitize_ucard_opitions_settings() {

    $settingsArray = array(
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
    
    foreach ($settingsArray as $setting) {
        // register options
        register_setting( 'ucard_opitions_settings', $setting );
    }
      
}

// init loops
$ucard_on = get_option( 'enable_for_all', 'ucard_opitions_settings');
if( !empty($ucard_on) && "1"  === $ucard_on ) { 
    require_once( ucard_loop . 'index.php' );
}