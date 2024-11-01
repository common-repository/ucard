<?php
/**
 * @package Ucard
 * @author RainaStudio
 * @version 1.0.0
 */

// template 1 loop
function ucard_loop1_temp() {

    // get options
    $ucard_excerptln = get_option( 'enable_excerpt_l', 'ucard_opitions_settings');
    $ucard_like = get_option( 'enable_like_btn', 'ucard_opitions_settings');
    $ucard_date = get_option( 'enable_date', 'ucard_opitions_settings');
    $ucard_cm = get_option( 'enable_cat_meta', 'ucard_opitions_settings');
    $ucard_cc = get_option( 'enable_comment_c', 'ucard_opitions_settings');
    $ucard_pv = get_option( 'enable_post_view', 'ucard_opitions_settings');
        
    if ( have_posts() ) :
        printf( '<div %s>', genesis_attr( 'post-col' ) );

        do_action( 'genesis_before_while' );
        while ( have_posts() ) : the_post();

            do_action( 'genesis_before_entry' );

            printf( '<article %s>', genesis_attr( 'entry' ) );

                printf( '<div %s>', genesis_attr( 'thumbnail' ) );
                    if( "1" === $ucard_cm ) {
                        do_action( 'genesis_entry_footer' );
                    }
                    if( "1" === $ucard_like ) {
                        echo '<div class="like">
                        <a href="javascript:void(0);" class="like-button">
                            <i class="fa fa-heart-o not-liked bouncy"></i>
                            <i class="fa fa-heart is-liked bouncy"></i>
                            <span class="like-overlay"></span>
                          </a>
                        </div>';
                    }
                    echo ucard_temp1_post_image(); //Add in featured image

                echo '</div>';

                printf( '<div %s>', genesis_attr( 'entry-content' ) );
                
                do_action( 'genesis_entry_header' );

                do_action( 'genesis_before_entry_content' );

                //do_action( 'genesis_entry_content' ); //Remove standard excerpt
                printf( '<p %s>', genesis_attr( 'description' ) );
                    echo ucard_excerpt_max_charlength( $ucard_excerptln ); //change amount of characters to display
                echo '</p>';

                echo '<div class="post-meta">';
                if( "publish" === $ucard_date ) {
                    echo '<span class="timestamp">'. do_shortcode( '[post_date]' ).'</span>';
                } else {
                    echo '<span class="timestamp">'. do_shortcode( '[post_modified_date]' ).'</span>';
                }
                if( "1" === $ucard_cc ) {
                    echo '<span class="comments">
                            <i class="fa fa-comments"></i>
                            <a href="#">'. do_shortcode( '[post_comments] [post_edit]' ).'</a>
                        </span>';
                }
                if( "1" === $ucard_pv ){
                    echo '<span class="views">
                            <i class="fa fa-eye"></i> '. do_shortcode( '[postview]' ).'
                        </span>';
                }
                
                echo '</div></div>';

                do_action( 'genesis_after_entry_content' );

            echo '</article>';

            do_action( 'genesis_after_entry' );

        endwhile; //* end of one post
        echo '</div>';
        do_action( 'genesis_after_endwhile' );

    else : //* if no posts exist
        do_action( 'genesis_loop_else' );
    endif; //* end loop

}

// first template post image
function ucard_temp1_post_image() {

	$img = genesis_get_image( array(
		'format'  => 'html',
		'size'    => 'ucard_tem1_entry_img',
		'context' => 'archive',
		'attr'    => genesis_parse_attr( 'entry-image', array ( 'alt' => get_the_title() ) ),
	) );

	if ( ! empty( $img ) ) {
		printf( '<a class="%s" href="%s" aria-hidden="true">%s</a>', 'entry-image-link', get_permalink(), $img );
	} else {
        // placeholder image
    }

}

// wp excerpt
function ucard_excerpt_max_charlength($charlength) {
    
    $ucard_rm = get_option( 'enable_read_more', 'ucard_opitions_settings');

	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
        }
        if( "1" === $ucard_rm ){
            echo ' <a href="' . get_permalink() . '" class="more-link" title="Read More">Read More &#10230;</a>';
        }
	} else {
		echo $excerpt;
	}
}