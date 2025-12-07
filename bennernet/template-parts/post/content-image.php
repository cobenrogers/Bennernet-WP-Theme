<?php
/**
 * Template part for displaying image format posts
 *
 * @package Bennernet
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'format-image' ); ?>>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail featured-image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'bennernet-featured' ); ?>
            </a>
        </div>
    <?php endif; ?>

    <header class="entry-header">
        <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

        <div class="entry-meta">
            <span class="post-format-indicator"><i class="fas fa-camera"></i> <?php esc_html_e( 'Image', 'bennernet' ); ?></span>
            <?php bennernet_posted_on(); ?>
            <?php bennernet_posted_by(); ?>
        </div>
    </header>

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>

    <footer class="entry-footer">
        <a href="<?php the_permalink(); ?>" class="read-more">
            <?php esc_html_e( 'View Image', 'bennernet' ); ?>
        </a>
    </footer>

</article>
