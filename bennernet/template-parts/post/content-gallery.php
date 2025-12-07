<?php
/**
 * Template part for displaying gallery format posts
 *
 * @package Bennernet
 */

$gallery_images = bennernet_get_post_gallery_images();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'format-gallery' ); ?>>

    <?php if ( $gallery_images ) : ?>
        <div class="post-gallery">
            <div class="gallery">
                <?php foreach ( array_slice( $gallery_images, 0, 6 ) as $image ) : ?>
                    <a href="<?php echo esc_url( $image['full'] ); ?>" class="gallery-item">
                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                    </a>
                <?php endforeach; ?>
            </div>
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
            <span class="post-format-indicator"><i class="fas fa-images"></i> <?php esc_html_e( 'Gallery', 'bennernet' ); ?></span>
            <?php bennernet_posted_on(); ?>
            <?php bennernet_posted_by(); ?>
        </div>
    </header>

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>

    <footer class="entry-footer">
        <a href="<?php the_permalink(); ?>" class="read-more">
            <?php esc_html_e( 'View Gallery', 'bennernet' ); ?>
        </a>
    </footer>

</article>
