<?php
/**
 * Footer widgets template
 *
 * @package Bennernet
 */

// Check if any footer widgets are active
$has_footer_widgets = false;
for ( $i = 1; $i <= 4; $i++ ) {
    if ( is_active_sidebar( 'footer-' . $i ) ) {
        $has_footer_widgets = true;
        break;
    }
}

// Get number of footer columns from customizer
$footer_columns = get_theme_mod( 'bennernet_footer_columns', 4 );
?>

<div class="footer-widgets">
    <div class="container">
        <div class="footer-widgets-inner" style="grid-template-columns: repeat(<?php echo absint( $footer_columns ); ?>, 1fr);">
            <?php
            if ( $has_footer_widgets ) :
                // Show actual widgets
                for ( $i = 1; $i <= $footer_columns; $i++ ) :
                    if ( is_active_sidebar( 'footer-' . $i ) ) :
                        ?>
                        <div class="footer-widget-area footer-widget-<?php echo $i; ?>">
                            <?php dynamic_sidebar( 'footer-' . $i ); ?>
                        </div>
                        <?php
                    endif;
                endfor;
            else :
                // Show default footer content (like Ovation Blog)
                ?>

                <!-- Archives -->
                <?php if ( get_theme_mod( 'bennernet_footer_show_archives', true ) ) : ?>
                <div class="footer-widget-area">
                    <section class="widget widget_archive">
                        <h3 class="widget-title"><?php esc_html_e( 'Archives', 'bennernet' ); ?></h3>
                        <ul>
                            <?php
                            wp_get_archives( array(
                                'type'  => 'monthly',
                                'limit' => 5,
                            ) );
                            ?>
                        </ul>
                    </section>
                </div>
                <?php endif; ?>

                <!-- Categories -->
                <?php if ( get_theme_mod( 'bennernet_footer_show_categories', true ) ) : ?>
                <div class="footer-widget-area">
                    <section class="widget widget_categories">
                        <h3 class="widget-title"><?php esc_html_e( 'Categories', 'bennernet' ); ?></h3>
                        <ul>
                            <?php
                            wp_list_categories( array(
                                'orderby'    => 'count',
                                'order'      => 'DESC',
                                'show_count' => 0,
                                'title_li'   => '',
                                'number'     => 5,
                            ) );
                            ?>
                        </ul>
                    </section>
                </div>
                <?php endif; ?>

                <!-- Recent Posts -->
                <?php if ( get_theme_mod( 'bennernet_footer_show_recent', true ) ) : ?>
                <div class="footer-widget-area">
                    <section class="widget widget_recent_entries">
                        <h3 class="widget-title"><?php esc_html_e( 'Recent Posts', 'bennernet' ); ?></h3>
                        <ul>
                            <?php
                            $recent_posts = wp_get_recent_posts( array(
                                'numberposts' => 5,
                                'post_status' => 'publish',
                            ) );

                            foreach ( $recent_posts as $post ) :
                                ?>
                                <li>
                                    <a href="<?php echo esc_url( get_permalink( $post['ID'] ) ); ?>">
                                        <?php echo esc_html( $post['post_title'] ); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </section>
                </div>
                <?php endif; ?>

                <!-- Search -->
                <?php if ( get_theme_mod( 'bennernet_footer_show_search', true ) ) : ?>
                <div class="footer-widget-area">
                    <section class="widget widget_search">
                        <h3 class="widget-title"><?php esc_html_e( 'Search', 'bennernet' ); ?></h3>
                        <?php get_search_form(); ?>
                    </section>
                </div>
                <?php endif; ?>

            <?php endif; ?>
        </div>
    </div>
</div>
