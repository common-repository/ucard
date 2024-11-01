<?php
/**
 * @package Ucard
 * @author RainaStudio
 * @version 1.0.0
 */

// load templates
require_once( ucard_loop . 'temp1.php' );

// remove genesis default loop
add_action('genesis_before_loop', 'ucard_remove_gdefauly_loop');
function ucard_remove_gdefauly_loop() {

    if( is_home() ){

        remove_action( 'genesis_loop', 'genesis_do_loop' );
        add_action( 'genesis_loop', 'ucard_loop1_temp' );
        
	}
	
	$ucard_cat = get_option( 'enable_for_cat', 'ucard_opitions_settings');
	$ucard_tag = get_option( 'enable_for_tag', 'ucard_opitions_settings');

	if( "cat" === $ucard_cat ){
		if( is_category() ){

			remove_action( 'genesis_loop', 'genesis_do_loop' );
			add_action( 'genesis_loop', 'ucard_loop1_temp' );
	
		}
	}
	if( "tag" === $ucard_tag ){
		if( is_tag() ){

			remove_action( 'genesis_loop', 'genesis_do_loop' );
			add_action( 'genesis_loop', 'ucard_loop1_temp' );
	
		}
	}

}

// add image size
add_image_size( 'ucard_tem1_entry_img', 501, 370, true );

// active entry footer
add_action( 'init', 'ucard_active_entry_footer' );
function ucard_active_entry_footer() {

	$ucard_rt = get_option( 'enable_reading_time', 'ucard_opitions_settings');
	$ucard_an = get_option( 'enable_author_name', 'ucard_opitions_settings');
	$ucard_aa = get_option( 'enable_author_avatar', 'ucard_opitions_settings');

	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
	if( "1" === $ucard_an || "1" === $ucard_rt || "1" === $ucard_aa ){
		add_action( 'genesis_entry_header', 'genesis_post_info', 9);
	}

	remove_action( 'genesis_before_entry', 'atmosphere_remove_entry_footer' );
			
	if ( is_page_template( 'page_blog.php' ) && function_exists('ucard_loop1_temp') ) {

		add_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
		add_action( 'genesis_entry_footer', 'genesis_post_meta' );
		add_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );

	}
	

}

// customize the post meta function
add_filter( 'genesis_post_meta', 'ucard_post_meta_filter' );
function ucard_post_meta_filter($post_meta) {
if ( !is_page() ) {
	$post_meta = '[post_categories before=""]';
	return $post_meta;
}}

// add Author Avatar to Post Info

add_filter( 'genesis_post_info', 'ucard_post_info_filter' );
function ucard_post_info_filter( $post_info ) {

	$ucard_rt = get_option( 'enable_reading_time', 'ucard_opitions_settings');
	$ucard_an = get_option( 'enable_author_name', 'ucard_opitions_settings');
	$ucard_aa = get_option( 'enable_author_avatar', 'ucard_opitions_settings');

    if ( is_home() ) {
        // get author details
        $entry_author = get_avatar( get_the_author_meta( 'email' ), 55 );
        $author_link = get_author_posts_url( get_the_author_meta( 'ID' ) );
        
		// build updated post_info
		if( "1" === $ucard_aa ){
			$post_info = sprintf( '<span class="author-avatar"><a href="%s">%s</a></span>', $author_link, $entry_author );
		}
		if( "1" === $ucard_an ){
			$post_info .= '<span class="postByBox"> by [post_author_posts_link]</span>';
		}
		if( "1" === $ucard_rt ) {
			$post_info .= '<span class="readTimeBox">[ucard_ert]</span>';
		}
        return $post_info;
    }

}

// est reading time
add_shortcode('ucard_ert', 'ucard_estimated_reading_time');
function ucard_estimated_reading_time() {
    
    global $post;
    
	// load the content
	$thecontent = $post->post_content;
	// count the number of words
	$words = str_word_count( strip_tags( $thecontent ) );
	// rounding off and deviding per 200 words per minute
	$m = floor( $words / 200 );
	// rounding off to get the seconds
	$s = floor( $words % 200 / ( 200 / 60 ) );
	// calculate the amount of time needed to read
	$estimate = $m . ' minute' . ( $m == 1 ? '' : 's' );
	// create output
	$output = '<i class="fa fa-clock-o"></i> ' . $estimate;
	// return the estimate
	return $output;

}


// Set Post Views :It counts everytime single posts is viewed
if ( !function_exists( 'ucard_post_views' ) ){
	function ucard_post_views( $postID ){
		$count_key = 'ucard_post_views';
		$count = get_post_meta($postID, $count_key, true);
		
		if( $count == '' ){
			$count = 0;
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );
		} else {
			$count++;
			update_post_meta( $postID, $count_key, $count );
		}
	}
}


// Get the number of views
if ( !function_exists( 'ucard_get_post_views' ) ){
	function ucard_get_post_views( $postID ){
		$count_key = 'ucard_post_views';
		$count = get_post_meta( $postID, $count_key, true );
		if( $count == '0' || $count == '' ){
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );
			$label = '';
			return;
	 	}else{
	 		$label = ( $count == '1' ) ? __( '', 'text-domain' ) : __( '', 'text-domain' );
	 	}
	 	return $count.$label;
	}
}


// Set the post view code in single page
add_action( 'genesis_before_loop', 'ucard_single_post_view' );
function ucard_single_post_view(){
	if( is_single() ){
		ucard_post_views( get_the_ID() );
	}
}


// Post View Shortcode
if ( !function_exists( 'ucard_post_view_shortcode' ) ){
	function ucard_post_view_shortcode( $atts, $content = null ){
		extract( shortcode_atts( array(), $atts, 'postview' ));
		return '<span class="ja_post_view" >'.ucard_get_post_views( get_the_ID() ).'</span>';
	}
	add_shortcode( 'postview', 'ucard_post_view_shortcode' );
}

// Remove read more
add_filter( 'get_the_content_more_link', 'ucard_read_more_link' );
function ucard_read_more_link() {
	return '';
}
