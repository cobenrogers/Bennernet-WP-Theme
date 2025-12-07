<?php
/**
 * Template Name: Custom Home Page
 *
 * A custom homepage template with slider and featured posts.
 *
 * @package Bennernet
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        // Homepage Slider
        if ( get_theme_mod( 'bennernet_slider_enable', false ) ) :
            $slider_category = get_theme_mod( 'bennernet_slider_category', '' );
            $slider_count = get_theme_mod( 'bennernet_slider_count', 3 );

            $slider_args = array(
                'post_type'      => 'post',
                'posts_per_page' => $slider_count,
                'meta_key'       => '_thumbnail_id', // Only posts with featured images
            );

            if ( $slider_category ) {
                $slider_args['cat'] = $slider_category;
            }

            $slider_query = new WP_Query( $slider_args );

            if ( $slider_query->have_posts() ) :
        ?>
            <section class="homepage-slider" tabindex="0" aria-label="<?php esc_attr_e( 'Featured Posts Slider', 'bennernet' ); ?>">
                <div class="slider-wrapper">
                    <?php
                    $slide_index = 0;
                    while ( $slider_query->have_posts() ) :
                        $slider_query->the_post();
                    ?>
                        <div class="slider-item <?php echo ( $slide_index === 0 ) ? 'is-active' : ''; ?>">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'bennernet-slider' ); ?>
                            <?php endif; ?>
                            <div class="slider-caption">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                                    <?php esc_html_e( 'Read More', 'bennernet' ); ?>
                                </a>
                            </div>
                        </div>
                    <?php
                        $slide_index++;
                    endwhile;
                    ?>
                </div>

                <!-- Slider Controls -->
                <button class="slider-prev no-print" aria-label="<?php esc_attr_e( 'Previous slide', 'bennernet' ); ?>">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="slider-next no-print" aria-label="<?php esc_attr_e( 'Next slide', 'bennernet' ); ?>">
                    <i class="fas fa-chevron-right"></i>
                </button>

                <!-- Slider Dots -->
                <div class="slider-dots no-print">
                    <?php for ( $i = 0; $i < $slider_query->post_count; $i++ ) : ?>
                        <button class="slider-dot <?php echo ( $i === 0 ) ? 'is-active' : ''; ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Go to slide %d', 'bennernet' ), $i + 1 ) ); ?>"></button>
                    <?php endfor; ?>
                </div>
            </section>
        <?php
            endif;
            wp_reset_postdata();
        endif;
        ?>

        <!-- Main Content -->
        <div class="container">
            <div class="site-content">
                <div class="content-area">

                    <?php
                    // Page content (if any)
                    while ( have_posts() ) :
                        the_post();
                        if ( get_the_content() ) :
                    ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'homepage-intro' ); ?>>
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        </article>
                    <?php
                        endif;
                    endwhile;
                    ?>

                    <!-- Recent Posts Section -->
                    <section class="recent-posts-section">
                        <header class="section-header">
                            <h2 class="section-title"><?php esc_html_e( 'Recent Posts', 'bennernet' ); ?></h2>
                        </header>

                        <?php
                        $recent_args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => get_option( 'posts_per_page' ),
                            'paged'          => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
                        );

                        $recent_query = new WP_Query( $recent_args );

                        if ( $recent_query->have_posts() ) :
                            while ( $recent_query->have_posts() ) :
                                $recent_query->the_post();
                                get_template_part( 'template-parts/post/content', get_post_format() );
                            endwhile;

                            // Pagination
                            $big = 999999999;
                            echo '<div class="pagination">';
                            echo paginate_links( array(
                                'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                'format'  => '?paged=%#%',
                                'current' => max( 1, get_query_var( 'paged' ) ),
                                'total'   => $recent_query->max_num_pages,
                            ) );
                            echo '</div>';

                            wp_reset_postdata();
                        endif;
                        ?>
                    </section>

                </div>

                <?php get_sidebar(); ?>
            </div>
        </div>

    </main>
</div>

<?php
get_footer();
