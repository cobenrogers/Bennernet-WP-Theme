<?php
/**
 * The template for displaying single posts
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

                    <!-- Action Bar with Print/Email -->
                    <div class="action-bar no-print">
                        <button class="btn btn-primary btn-print">
                            <i class="fas fa-print"></i> <?php esc_html_e( 'Print', 'bennernet' ); ?>
                        </button>
                        <a href="<?php echo esc_url( bennernet_get_email_link() ); ?>" class="btn btn-primary btn-email">
                            <i class="fas fa-envelope"></i> <?php esc_html_e( 'Email', 'bennernet' ); ?>
                        </a>
                    </div>

                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                        <div class="entry-meta">
                            <?php bennernet_posted_on(); ?>
                            <?php bennernet_posted_by(); ?>
                        </div>
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

                    <footer class="entry-footer">
                        <?php bennernet_entry_footer(); ?>
                    </footer>

                </article>

                <?php
                // Post navigation
                the_post_navigation( array(
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'bennernet' ) . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'bennernet' ) . '</span> <span class="nav-title">%title</span>',
                ) );

                // Comments
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
