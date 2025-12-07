<?php
/**
 * The main template file
 *
 * @package Bennernet
 */

get_header();
?>

<div class="container">
    <div class="site-content">
        <main id="main" class="content-area">

            <?php if ( have_posts() ) : ?>

                <?php if ( is_home() && ! is_front_page() ) : ?>
                    <header class="page-header">
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </header>
                <?php endif; ?>

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
