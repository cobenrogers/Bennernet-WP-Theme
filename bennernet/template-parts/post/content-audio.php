<?php
/**
 * Template part for displaying audio format posts
 *
 * @package Bennernet
 */

$audio = bennernet_get_post_audio();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'format-audio' ); ?>>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'bennernet-thumbnail' ); ?>
            </a>
        </div>
    <?php endif; ?>

    <?php if ( $audio ) : ?>
        <div class="post-audio">
            <?php echo $audio; ?>
        </div>
    <?php endif; ?>

    <header class="entry-header">
        <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

        <div class="entry-meta">
            <span class="post-format-indicator"><i class="fas fa-headphones"></i> <?php esc_html_e( 'Audio', 'bennernet' ); ?></span>
            <?php bennernet_posted_on(); ?>
            <?php bennernet_posted_by(); ?>
        </div>
    </header>

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>

    <footer class="entry-footer">
        <a href="<?php the_permalink(); ?>" class="read-more">
            <?php esc_html_e( 'Listen Now', 'bennernet' ); ?>
        </a>
    </footer>

</article>
