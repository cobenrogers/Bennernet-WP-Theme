<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Bennernet
 */

get_header();
?>

<div class="container">
    <div class="site-content full-width">
        <main id="main" class="content-area">

            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bennernet' ); ?></h1>
                </header>

                <div class="page-content">
                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'bennernet' ); ?></p>

                    <?php get_search_form(); ?>

                    <div class="widget widget_recent_posts">
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
                    </div>

                    <div class="widget widget_categories">
                        <h3 class="widget-title"><?php esc_html_e( 'Categories', 'bennernet' ); ?></h3>
                        <ul>
                            <?php
                            wp_list_categories( array(
                                'orderby'    => 'count',
                                'order'      => 'DESC',
                                'show_count' => 1,
                                'title_li'   => '',
                                'number'     => 10,
                            ) );
                            ?>
                        </ul>
                    </div>
                </div>
            </section>

        </main>
    </div>
</div>

<?php
get_footer();
