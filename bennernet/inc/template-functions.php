<?php
/**
 * Template Functions
 *
 * @package Bennernet
 */

/**
 * Pagination
 */
function bennernet_pagination() {
    the_posts_pagination( array(
        'mid_size'  => 2,
        'prev_text' => '<span class="screen-reader-text">' . __( 'Previous', 'bennernet' ) . '</span>&laquo;',
        'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'bennernet' ) . '</span>&raquo;',
    ) );
}

/**
 * Check if post has video
 */
function bennernet_get_post_video( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    $content = get_post_field( 'post_content', $post_id );

    // Check for video shortcode
    $pattern = get_shortcode_regex( array( 'video' ) );
    if ( preg_match( "/$pattern/s", $content, $matches ) ) {
        return do_shortcode( $matches[0] );
    }

    // Check for embedded video (YouTube, Vimeo, etc.)
    $embeds = array(
        'youtube.com',
        'youtu.be',
        'vimeo.com',
        'dailymotion.com',
    );

    foreach ( $embeds as $domain ) {
        if ( preg_match( '/(https?:\/\/[^\s]+' . preg_quote( $domain, '/' ) . '[^\s]+)/i', $content, $matches ) ) {
            return wp_oembed_get( $matches[1] );
        }
    }

    return false;
}

/**
 * Check if post has audio
 */
function bennernet_get_post_audio( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    $content = get_post_field( 'post_content', $post_id );

    // Check for audio shortcode
    $pattern = get_shortcode_regex( array( 'audio' ) );
    if ( preg_match( "/$pattern/s", $content, $matches ) ) {
        return do_shortcode( $matches[0] );
    }

    // Check for SoundCloud embed
    if ( preg_match( '/(https?:\/\/[^\s]+soundcloud\.com[^\s]+)/i', $content, $matches ) ) {
        return wp_oembed_get( $matches[1] );
    }

    return false;
}

/**
 * Get post gallery images
 */
function bennernet_get_post_gallery_images( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    $gallery = get_post_gallery( $post_id, false );

    if ( ! $gallery ) {
        return false;
    }

    $ids = explode( ',', $gallery['ids'] );
    $images = array();

    foreach ( $ids as $id ) {
        $images[] = array(
            'url'   => wp_get_attachment_image_url( $id, 'bennernet-thumbnail' ),
            'full'  => wp_get_attachment_image_url( $id, 'full' ),
            'alt'   => get_post_meta( $id, '_wp_attachment_image_alt', true ),
            'title' => get_the_title( $id ),
        );
    }

    return $images;
}

/**
 * Get quote from post content
 */
function bennernet_get_post_quote( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    $content = get_post_field( 'post_content', $post_id );

    // Check for blockquote
    if ( preg_match( '/<blockquote[^>]*>(.*?)<\/blockquote>/s', $content, $matches ) ) {
        return $matches[1];
    }

    // Check for quote block
    if ( preg_match( '/<!-- wp:quote -->(.*?)<!-- \/wp:quote -->/s', $content, $matches ) ) {
        return strip_tags( $matches[1], '<cite>' );
    }

    return false;
}

/**
 * Truncate string
 */
function bennernet_truncate( $string, $length = 100, $append = '&hellip;' ) {
    $string = trim( $string );

    if ( strlen( $string ) > $length ) {
        $string = wordwrap( $string, $length );
        $string = explode( "\n", $string, 2 );
        $string = $string[0] . $append;
    }

    return $string;
}

/**
 * Get reading time
 */
function bennernet_reading_time( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    $content = get_post_field( 'post_content', $post_id );
    $word_count = str_word_count( strip_tags( $content ) );
    $reading_time = ceil( $word_count / 200 ); // 200 words per minute

    return sprintf(
        /* translators: %d: Number of minutes */
        _n( '%d min read', '%d min read', $reading_time, 'bennernet' ),
        $reading_time
    );
}

/**
 * Archive title filter
 */
function bennernet_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }

    return $title;
}
add_filter( 'get_the_archive_title', 'bennernet_archive_title' );
