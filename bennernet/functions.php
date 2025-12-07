<?php
/**
 * Bennernet Theme Functions
 *
 * @package Bennernet
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme Constants
 */
define( 'BENNERNET_VERSION', '1.0.0' );
define( 'BENNERNET_DIR', get_template_directory() );
define( 'BENNERNET_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function bennernet_setup() {
    // Make theme available for translation
    load_theme_textdomain( 'bennernet', BENNERNET_DIR . '/languages' );

    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 9999 );

    // Custom image sizes
    add_image_size( 'bennernet-featured', 1200, 600, true );
    add_image_size( 'bennernet-thumbnail', 400, 300, true );
    add_image_size( 'bennernet-slider', 1920, 800, true );

    // Register navigation menus
    register_nav_menus( array(
        'primary'   => esc_html__( 'Primary Menu', 'bennernet' ),
        'footer'    => esc_html__( 'Footer Menu', 'bennernet' ),
    ) );

    // Switch default core markup to output valid HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Enable support for Post Formats
    add_theme_support( 'post-formats', array(
        'audio',
        'gallery',
        'image',
        'quote',
        'video',
    ) );

    // Custom logo support
    add_theme_support( 'custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // Custom header support
    add_theme_support( 'custom-header', array(
        'default-image'      => '',
        'default-text-color' => '3d3d3d',
        'width'              => 1920,
        'height'             => 400,
        'flex-width'         => true,
        'flex-height'        => true,
    ) );

    // Custom background support
    add_theme_support( 'custom-background', array(
        'default-color' => 'faf9f7',
    ) );

    // Add support for responsive embedded content
    add_theme_support( 'responsive-embeds' );

    // Add support for full and wide align blocks
    add_theme_support( 'align-wide' );

    // Add support for editor styles
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor-style.css' );

    // Add support for Block Styles
    add_theme_support( 'wp-block-styles' );

    // Selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'bennernet_setup' );

/**
 * Set the content width
 */
function bennernet_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'bennernet_content_width', 800 );
}
add_action( 'after_setup_theme', 'bennernet_content_width', 0 );

/**
 * Register widget areas
 */
function bennernet_widgets_init() {
    // Main Sidebar
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'bennernet' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'bennernet' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // Footer Widget Areas
    for ( $i = 1; $i <= 4; $i++ ) {
        register_sidebar( array(
            'name'          => sprintf( esc_html__( 'Footer Widget %d', 'bennernet' ), $i ),
            'id'            => 'footer-' . $i,
            'description'   => sprintf( esc_html__( 'Footer widget area %d.', 'bennernet' ), $i ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
    }
}
add_action( 'widgets_init', 'bennernet_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function bennernet_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'bennernet-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Source+Sans+Pro:wght@300;400;600;700&display=swap',
        array(),
        null
    );

    // Font Awesome for social icons
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        array(),
        '6.4.0'
    );

    // Main stylesheet
    wp_enqueue_style(
        'bennernet-style',
        get_stylesheet_uri(),
        array(),
        BENNERNET_VERSION
    );

    // Print styles
    wp_enqueue_style(
        'bennernet-print',
        BENNERNET_URI . '/assets/css/print.css',
        array( 'bennernet-style' ),
        BENNERNET_VERSION,
        'print'
    );

    // Theme JavaScript
    wp_enqueue_script(
        'bennernet-script',
        BENNERNET_URI . '/assets/js/bennernet.js',
        array(),
        BENNERNET_VERSION,
        true
    );

    // Comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    // Pass data to JavaScript
    wp_localize_script( 'bennernet-script', 'bennernetData', array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'bennernet-nonce' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'bennernet_scripts' );

/**
 * Add preconnect for Google Fonts
 */
function bennernet_resource_hints( $urls, $relation_type ) {
    if ( 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
            'crossorigin',
        );
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }
    return $urls;
}
add_filter( 'wp_resource_hints', 'bennernet_resource_hints', 10, 2 );

/**
 * WooCommerce Support
 */
function bennernet_woocommerce_support() {
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 400,
        'single_image_width'    => 600,
        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 1,
            'max_rows'        => 6,
            'default_columns' => 3,
            'min_columns'     => 1,
            'max_columns'     => 4,
        ),
    ) );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'bennernet_woocommerce_support' );

/**
 * WooCommerce - Remove default wrapper
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

function bennernet_woocommerce_wrapper_before() {
    echo '<div class="container"><div class="site-content"><main id="main" class="content-area">';
}
add_action( 'woocommerce_before_main_content', 'bennernet_woocommerce_wrapper_before' );

function bennernet_woocommerce_wrapper_after() {
    echo '</main>';
    if ( is_active_sidebar( 'sidebar-1' ) ) {
        get_sidebar();
    }
    echo '</div></div>';
}
add_action( 'woocommerce_after_main_content', 'bennernet_woocommerce_wrapper_after' );

/**
 * Get body classes
 */
function bennernet_body_classes( $classes ) {
    // Add class for sidebar layout
    $layout = get_theme_mod( 'bennernet_layout', 'right-sidebar' );

    if ( 'full-width' === $layout || ! is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'full-width';
    } elseif ( 'left-sidebar' === $layout ) {
        $classes[] = 'has-sidebar has-sidebar-left';
    } else {
        $classes[] = 'has-sidebar';
    }

    // Singular check
    if ( is_singular() ) {
        $classes[] = 'singular';
    }

    // Add class for no featured image
    if ( is_singular() && ! has_post_thumbnail() ) {
        $classes[] = 'no-featured-image';
    }

    return $classes;
}
add_filter( 'body_class', 'bennernet_body_classes' );

/**
 * Excerpt length
 */
function bennernet_excerpt_length( $length ) {
    if ( is_admin() ) {
        return $length;
    }
    return get_theme_mod( 'bennernet_excerpt_length', 35 );
}
add_filter( 'excerpt_length', 'bennernet_excerpt_length' );

/**
 * Excerpt more
 */
function bennernet_excerpt_more( $more ) {
    if ( is_admin() ) {
        return $more;
    }
    return '&hellip;';
}
add_filter( 'excerpt_more', 'bennernet_excerpt_more' );

/**
 * Format post content for email sharing
 */
function bennernet_format_email_content( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    $post = get_post( $post_id );
    if ( ! $post ) {
        return '';
    }

    $title = get_the_title( $post );
    $excerpt = get_the_excerpt( $post );
    $content = wp_strip_all_tags( $post->post_content );
    $url = get_permalink( $post );

    // Build email body
    $email_body = '';
    $email_body .= str_repeat( '=', 50 ) . "\n";
    $email_body .= strtoupper( $title ) . "\n";
    $email_body .= str_repeat( '=', 50 ) . "\n\n";

    if ( $excerpt ) {
        $email_body .= $excerpt . "\n\n";
    }

    $email_body .= str_repeat( '-', 30 ) . "\n\n";

    // Clean up content - split into paragraphs
    $paragraphs = preg_split( '/\n\s*\n/', $content );
    foreach ( $paragraphs as $para ) {
        $para = trim( $para );
        if ( ! empty( $para ) ) {
            $email_body .= wordwrap( $para, 70 ) . "\n\n";
        }
    }

    $email_body .= str_repeat( '-', 30 ) . "\n\n";
    $email_body .= "Original: " . $url . "\n";
    $email_body .= "Shared from " . get_bloginfo( 'name' ) . "\n";

    return $email_body;
}

/**
 * Get email mailto link
 */
function bennernet_get_email_link( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    $title = get_the_title( $post_id );
    $body = bennernet_format_email_content( $post_id );

    return 'mailto:?subject=' . rawurlencode( $title ) . '&body=' . rawurlencode( $body );
}

/**
 * Get footer links from customizer
 */
function bennernet_get_footer_links() {
    $links = array();

    for ( $i = 1; $i <= 4; $i++ ) {
        $text = get_theme_mod( "bennernet_footer_link_{$i}_text", '' );
        $url = get_theme_mod( "bennernet_footer_link_{$i}_url", '' );

        if ( ! empty( $text ) && ! empty( $url ) ) {
            $links[] = array(
                'text' => $text,
                'url'  => $url,
            );
        }
    }

    return $links;
}

/**
 * Get social links from customizer
 */
function bennernet_get_social_links() {
    $networks = array(
        'facebook'  => array( 'icon' => 'fab fa-facebook-f', 'label' => 'Facebook' ),
        'twitter'   => array( 'icon' => 'fab fa-x-twitter', 'label' => 'X (Twitter)' ),
        'instagram' => array( 'icon' => 'fab fa-instagram', 'label' => 'Instagram' ),
        'linkedin'  => array( 'icon' => 'fab fa-linkedin-in', 'label' => 'LinkedIn' ),
        'youtube'   => array( 'icon' => 'fab fa-youtube', 'label' => 'YouTube' ),
        'pinterest' => array( 'icon' => 'fab fa-pinterest-p', 'label' => 'Pinterest' ),
    );

    $links = array();
    foreach ( $networks as $network => $data ) {
        $url = get_theme_mod( "bennernet_social_{$network}", '' );
        if ( ! empty( $url ) ) {
            $links[ $network ] = array(
                'url'   => $url,
                'icon'  => $data['icon'],
                'label' => $data['label'],
            );
        }
    }

    return $links;
}

/**
 * Output social icons
 */
function bennernet_social_icons() {
    $links = bennernet_get_social_links();

    if ( empty( $links ) ) {
        return;
    }

    echo '<div class="header-social">';
    foreach ( $links as $network => $data ) {
        printf(
            '<a href="%s" target="_blank" rel="noopener noreferrer" aria-label="%s"><i class="%s"></i></a>',
            esc_url( $data['url'] ),
            esc_attr( $data['label'] ),
            esc_attr( $data['icon'] )
        );
    }
    echo '</div>';
}

/**
 * Custom CSS output from customizer
 */
function bennernet_customizer_css() {
    $css = '';

    // Colors
    $primary = get_theme_mod( 'bennernet_primary_color', '#9eb89f' );
    $primary_dark = get_theme_mod( 'bennernet_primary_dark_color', '#7a9a7b' );
    $text = get_theme_mod( 'bennernet_text_color', '#3d3d3d' );
    $background = get_theme_mod( 'bennernet_background_color', '#faf9f7' );

    // Header colors
    $header_bg = get_theme_mod( 'bennernet_header_bg_color', '#ffffff' );
    $header_text = get_theme_mod( 'bennernet_header_text_color', '#3d3d3d' );

    $css .= ':root {';
    $css .= '--primary: ' . esc_attr( $primary ) . ';';
    $css .= '--primary-dark: ' . esc_attr( $primary_dark ) . ';';
    $css .= '--text: ' . esc_attr( $text ) . ';';
    $css .= '--background: ' . esc_attr( $background ) . ';';
    $css .= '}';

    // Header specific styles
    if ( $header_bg !== '#ffffff' ) {
        $css .= '.site-header { background-color: ' . esc_attr( $header_bg ) . '; }';
    }

    if ( $header_text !== '#3d3d3d' ) {
        $css .= '.site-title a, .site-description { color: ' . esc_attr( $header_text ) . '; }';
    }

    if ( ! empty( $css ) ) {
        wp_add_inline_style( 'bennernet-style', $css );
    }
}
add_action( 'wp_enqueue_scripts', 'bennernet_customizer_css', 20 );

/**
 * Include required files
 */
require_once BENNERNET_DIR . '/inc/customizer.php';
require_once BENNERNET_DIR . '/inc/template-functions.php';
require_once BENNERNET_DIR . '/inc/template-tags.php';
