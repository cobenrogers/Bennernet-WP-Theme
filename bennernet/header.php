<?php
/**
 * The header template
 *
 * @package Bennernet
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#main">
        <?php esc_html_e( 'Skip to content', 'bennernet' ); ?>
    </a>

    <header id="masthead" class="site-header">
        <?php
        // Social icons in header
        if ( get_theme_mod( 'bennernet_show_social_header', true ) ) {
            bennernet_social_icons();
        }
        ?>

        <?php if ( has_header_image() ) : ?>
            <div class="header-image" style="background-image: url(<?php header_image(); ?>);">
                <div class="container">
                    <?php get_template_part( 'template-parts/header/site-branding' ); ?>
                </div>
            </div>
        <?php else : ?>
            <div class="container">
                <?php get_template_part( 'template-parts/header/site-branding' ); ?>
            </div>
        <?php endif; ?>

        <nav id="site-navigation" class="main-navigation">
            <div class="container">
                <div class="nav-wrapper">
                    <button class="menu-toggle no-print" aria-controls="primary-menu" aria-expanded="false">
                        <span class="screen-reader-text"><?php esc_html_e( 'Menu', 'bennernet' ); ?></span>
                        <span class="hamburger"></span>
                    </button>

                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'nav-menu',
                        'container'      => false,
                        'fallback_cb'    => false,
                    ) );
                    ?>

                    <?php if ( get_theme_mod( 'bennernet_show_header_search', true ) ) : ?>
                        <div class="header-search no-print">
                            <?php get_search_form(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>

    <div id="content" class="site-main">
