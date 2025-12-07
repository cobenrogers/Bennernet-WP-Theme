<?php
/**
 * The template for displaying search results
 *
 * @package Bennernet
 */

get_header();
?>

<div class="container">
    <div class="site-content">
        <main id="main" class="content-area">

            <?php if ( have_posts() ) : ?>

                <header class="page-header">
                    <h1 class="page-title">
                        <?php
                        /* translators: %s: Search query */
                        printf( esc_html__( 'Search Results for: %s', 'bennernet' ), '<span>' . get_search_query() . '</span>' );
                        ?>
                    </h1>
                </header>

                <?php
                while ( have_posts() ) :
                    the_post();
                    get_template_part( 'template-parts/post/content', 'search' );
                endwhile;

                bennernet_pagination();
                ?>

            <?php else : ?>

                <?php get_template_part( 'template-parts/post/content', 'none' ); ?>

            <?php endif; ?>

        </main>

        <?php get_sidebar(); ?>
    </div>
</div>

<?php
get_footer();
