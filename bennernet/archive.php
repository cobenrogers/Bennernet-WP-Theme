<?php
/**
 * The template for displaying archive pages
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
                    <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="archive-description">', '</div>' );
                    ?>
                </header>

                <?php
                while ( have_posts() ) :
                    the_post();
                    get_template_part( 'template-parts/post/content', get_post_format() );
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
