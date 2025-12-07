<?php
/**
 * Template part for displaying video format posts
 *
 * @package Bennernet
 */

$video = bennernet_get_post_video();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'format-video' ); ?>>

    <?php if ( $video ) : ?>
        <div class="post-video">
            <?php echo $video; ?>
        </div>
    <?php elseif ( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'bennernet-thumbnail' ); ?>
            </a>
        </div>
    <?php endif; ?>

    <header class="entry-header">
        <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

        <div class="entry-meta">
            <span class="post-format-indicator"><i class="fas fa-video"></i> <?php esc_html_e( 'Video', 'bennernet' ); ?></span>
            <?php bennernet_posted_on(); ?>
            <?php bennernet_posted_by(); ?>
        </div>
    </header>

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>

    <footer class="entry-footer">
        <a href="<?php the_permalink(); ?>" class="read-more">
            <?php esc_html_e( 'Watch Video', 'bennernet' ); ?>
        </a>
    </footer>

</article>
