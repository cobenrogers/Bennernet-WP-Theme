<?php
/**
 * Template part for displaying quote format posts
 *
 * @package Bennernet
 */

$quote = bennernet_get_post_quote();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'format-quote' ); ?>>

    <div class="entry-content">
        <?php if ( $quote ) : ?>
            <blockquote>
                <?php echo wp_kses_post( $quote ); ?>
            </blockquote>
        <?php else : ?>
            <blockquote>
                <?php the_excerpt(); ?>
            </blockquote>
        <?php endif; ?>
    </div>

    <header class="entry-header">
        <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

        <div class="entry-meta">
            <span class="post-format-indicator"><i class="fas fa-quote-left"></i> <?php esc_html_e( 'Quote', 'bennernet' ); ?></span>
            <?php bennernet_posted_on(); ?>
        </div>
    </header>

    <footer class="entry-footer">
        <a href="<?php the_permalink(); ?>" class="read-more">
            <?php esc_html_e( 'Read More', 'bennernet' ); ?>
        </a>
    </footer>

</article>
