<?php
/**
 * The template for displaying pages
 *
 * @package Bennernet
 */

get_header();
?>

<div class="container">
    <div class="site-content">
        <main id="main" class="content-area">

            <?php
            while ( have_posts() ) :
                the_post();
            ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail( 'bennernet-featured' ); ?>
                        </div>
                    <?php endif; ?>

                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </header>

                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bennernet' ),
                            'after'  => '</div>',
                        ) );
                        ?>
                    </div>

                    <?php if ( get_edit_post_link() ) : ?>
                        <footer class="entry-footer">
                            <?php
                            edit_post_link(
                                sprintf(
                                    wp_kses(
                                        /* translators: %s: Post title */
                                        __( 'Edit <span class="screen-reader-text">%s</span>', 'bennernet' ),
                                        array( 'span' => array( 'class' => array() ) )
                                    ),
                                    get_the_title()
                                ),
                                '<span class="edit-link">',
                                '</span>'
                            );
                            ?>
                        </footer>
                    <?php endif; ?>

                </article>

                <?php
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>

            <?php endwhile; ?>

        </main>

        <?php get_sidebar(); ?>
    </div>
</div>

<?php
get_footer();
