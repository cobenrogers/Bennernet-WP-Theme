<?php
/**
 * Theme Customizer
 *
 * @package Bennernet
 */

/**
 * Add customizer settings
 */
function bennernet_customize_register( $wp_customize ) {

    // ============================
    // COLORS SECTION
    // ============================

    $wp_customize->add_section( 'bennernet_colors', array(
        'title'    => __( 'Theme Colors', 'bennernet' ),
        'priority' => 30,
    ) );

    // Primary Color
    $wp_customize->add_setting( 'bennernet_primary_color', array(
        'default'           => '#9eb89f',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bennernet_primary_color', array(
        'label'   => __( 'Primary Color', 'bennernet' ),
        'section' => 'bennernet_colors',
    ) ) );

    // Primary Dark Color
    $wp_customize->add_setting( 'bennernet_primary_dark_color', array(
        'default'           => '#7a9a7b',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bennernet_primary_dark_color', array(
        'label'   => __( 'Primary Dark Color', 'bennernet' ),
        'section' => 'bennernet_colors',
    ) ) );

    // Text Color
    $wp_customize->add_setting( 'bennernet_text_color', array(
        'default'           => '#3d3d3d',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bennernet_text_color', array(
        'label'   => __( 'Text Color', 'bennernet' ),
        'section' => 'bennernet_colors',
    ) ) );

    // Background Color
    $wp_customize->add_setting( 'bennernet_background_color', array(
        'default'           => '#faf9f7',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bennernet_background_color', array(
        'label'   => __( 'Background Color', 'bennernet' ),
        'section' => 'bennernet_colors',
    ) ) );

    // ============================
    // HEADER SECTION
    // ============================

    $wp_customize->add_section( 'bennernet_header', array(
        'title'    => __( 'Header Settings', 'bennernet' ),
        'priority' => 35,
    ) );

    // Header Background Color
    $wp_customize->add_setting( 'bennernet_header_bg_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bennernet_header_bg_color', array(
        'label'   => __( 'Header Background Color', 'bennernet' ),
        'section' => 'bennernet_header',
    ) ) );

    // Header Text Color
    $wp_customize->add_setting( 'bennernet_header_text_color', array(
        'default'           => '#3d3d3d',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bennernet_header_text_color', array(
        'label'   => __( 'Header Text Color', 'bennernet' ),
        'section' => 'bennernet_header',
    ) ) );

    // Show Social Icons in Header
    $wp_customize->add_setting( 'bennernet_show_social_header', array(
        'default'           => true,
        'sanitize_callback' => 'bennernet_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'bennernet_show_social_header', array(
        'label'   => __( 'Show Social Icons in Header', 'bennernet' ),
        'section' => 'bennernet_header',
        'type'    => 'checkbox',
    ) );

    // ============================
    // SOCIAL MEDIA SECTION
    // ============================

    $wp_customize->add_section( 'bennernet_social', array(
        'title'    => __( 'Social Media', 'bennernet' ),
        'priority' => 40,
    ) );

    $social_networks = array(
        'facebook'  => 'Facebook URL',
        'twitter'   => 'X (Twitter) URL',
        'instagram' => 'Instagram URL',
        'linkedin'  => 'LinkedIn URL',
        'youtube'   => 'YouTube URL',
        'pinterest' => 'Pinterest URL',
    );

    foreach ( $social_networks as $network => $label ) {
        $wp_customize->add_setting( "bennernet_social_{$network}", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );

        $wp_customize->add_control( "bennernet_social_{$network}", array(
            'label'   => $label,
            'section' => 'bennernet_social',
            'type'    => 'url',
        ) );
    }

    // ============================
    // LAYOUT SECTION
    // ============================

    $wp_customize->add_section( 'bennernet_layout', array(
        'title'    => __( 'Layout Settings', 'bennernet' ),
        'priority' => 45,
    ) );

    // Sidebar Position
    $wp_customize->add_setting( 'bennernet_layout', array(
        'default'           => 'right-sidebar',
        'sanitize_callback' => 'bennernet_sanitize_layout',
    ) );

    $wp_customize->add_control( 'bennernet_layout', array(
        'label'   => __( 'Sidebar Position', 'bennernet' ),
        'section' => 'bennernet_layout',
        'type'    => 'select',
        'choices' => array(
            'right-sidebar' => __( 'Right Sidebar', 'bennernet' ),
            'left-sidebar'  => __( 'Left Sidebar', 'bennernet' ),
            'full-width'    => __( 'Full Width (No Sidebar)', 'bennernet' ),
        ),
    ) );

    // Excerpt Length
    $wp_customize->add_setting( 'bennernet_excerpt_length', array(
        'default'           => 35,
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'bennernet_excerpt_length', array(
        'label'       => __( 'Excerpt Length (words)', 'bennernet' ),
        'section'     => 'bennernet_layout',
        'type'        => 'number',
        'input_attrs' => array(
            'min' => 10,
            'max' => 100,
        ),
    ) );

    // ============================
    // FOOTER SECTION
    // ============================

    $wp_customize->add_section( 'bennernet_footer', array(
        'title'    => __( 'Footer Settings', 'bennernet' ),
        'priority' => 50,
    ) );

    // Footer Columns
    $wp_customize->add_setting( 'bennernet_footer_columns', array(
        'default'           => 4,
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'bennernet_footer_columns', array(
        'label'   => __( 'Footer Widget Columns', 'bennernet' ),
        'section' => 'bennernet_footer',
        'type'    => 'select',
        'choices' => array(
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
        ),
    ) );

    // Footer Disclaimer
    $wp_customize->add_setting( 'bennernet_footer_disclaimer', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'bennernet_footer_disclaimer', array(
        'label'   => __( 'Footer Disclaimer Text', 'bennernet' ),
        'section' => 'bennernet_footer',
        'type'    => 'textarea',
    ) );

    // Default Footer Widgets
    $wp_customize->add_setting( 'bennernet_footer_show_archives', array(
        'default'           => true,
        'sanitize_callback' => 'bennernet_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'bennernet_footer_show_archives', array(
        'label'       => __( 'Show Archives (default)', 'bennernet' ),
        'description' => __( 'Shown when no widgets are assigned', 'bennernet' ),
        'section'     => 'bennernet_footer',
        'type'        => 'checkbox',
    ) );

    $wp_customize->add_setting( 'bennernet_footer_show_categories', array(
        'default'           => true,
        'sanitize_callback' => 'bennernet_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'bennernet_footer_show_categories', array(
        'label'   => __( 'Show Categories (default)', 'bennernet' ),
        'section' => 'bennernet_footer',
        'type'    => 'checkbox',
    ) );

    $wp_customize->add_setting( 'bennernet_footer_show_recent', array(
        'default'           => true,
        'sanitize_callback' => 'bennernet_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'bennernet_footer_show_recent', array(
        'label'   => __( 'Show Recent Posts (default)', 'bennernet' ),
        'section' => 'bennernet_footer',
        'type'    => 'checkbox',
    ) );

    $wp_customize->add_setting( 'bennernet_footer_show_search', array(
        'default'           => true,
        'sanitize_callback' => 'bennernet_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'bennernet_footer_show_search', array(
        'label'   => __( 'Show Search (default)', 'bennernet' ),
        'section' => 'bennernet_footer',
        'type'    => 'checkbox',
    ) );

    // Footer Links
    for ( $i = 1; $i <= 4; $i++ ) {
        $wp_customize->add_setting( "bennernet_footer_link_{$i}_text", array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( "bennernet_footer_link_{$i}_text", array(
            'label'   => sprintf( __( 'Footer Link %d Text', 'bennernet' ), $i ),
            'section' => 'bennernet_footer',
            'type'    => 'text',
        ) );

        $wp_customize->add_setting( "bennernet_footer_link_{$i}_url", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );

        $wp_customize->add_control( "bennernet_footer_link_{$i}_url", array(
            'label'   => sprintf( __( 'Footer Link %d URL', 'bennernet' ), $i ),
            'section' => 'bennernet_footer',
            'type'    => 'url',
        ) );
    }

    // ============================
    // HOMEPAGE SLIDER SECTION
    // ============================

    $wp_customize->add_section( 'bennernet_slider', array(
        'title'    => __( 'Homepage Slider', 'bennernet' ),
        'priority' => 55,
    ) );

    // Enable Slider
    $wp_customize->add_setting( 'bennernet_slider_enable', array(
        'default'           => false,
        'sanitize_callback' => 'bennernet_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'bennernet_slider_enable', array(
        'label'   => __( 'Enable Homepage Slider', 'bennernet' ),
        'section' => 'bennernet_slider',
        'type'    => 'checkbox',
    ) );

    // Slider Category
    $wp_customize->add_setting( 'bennernet_slider_category', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'bennernet_slider_category', array(
        'label'       => __( 'Slider Category', 'bennernet' ),
        'description' => __( 'Select a category to display in the slider', 'bennernet' ),
        'section'     => 'bennernet_slider',
        'type'        => 'select',
        'choices'     => bennernet_get_categories_choices(),
    ) );

    // Number of Slides
    $wp_customize->add_setting( 'bennernet_slider_count', array(
        'default'           => 3,
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'bennernet_slider_count', array(
        'label'       => __( 'Number of Slides', 'bennernet' ),
        'section'     => 'bennernet_slider',
        'type'        => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 10,
        ),
    ) );

}
add_action( 'customize_register', 'bennernet_customize_register' );

/**
 * Sanitize checkbox
 */
function bennernet_sanitize_checkbox( $checked ) {
    return ( isset( $checked ) && true == $checked ) ? true : false;
}

/**
 * Sanitize layout
 */
function bennernet_sanitize_layout( $input ) {
    $valid = array( 'right-sidebar', 'left-sidebar', 'full-width' );
    return in_array( $input, $valid, true ) ? $input : 'right-sidebar';
}

/**
 * Get categories for customizer dropdown
 */
function bennernet_get_categories_choices() {
    $choices = array( '' => __( '-- Select Category --', 'bennernet' ) );
    $categories = get_categories( array(
        'hide_empty' => false,
    ) );

    foreach ( $categories as $category ) {
        $choices[ $category->term_id ] = $category->name;
    }

    return $choices;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously
 */
function bennernet_customize_preview_js() {
    wp_enqueue_script(
        'bennernet-customizer',
        BENNERNET_URI . '/assets/js/customizer.js',
        array( 'customize-preview' ),
        BENNERNET_VERSION,
        true
    );
}
add_action( 'customize_preview_init', 'bennernet_customize_preview_js' );
