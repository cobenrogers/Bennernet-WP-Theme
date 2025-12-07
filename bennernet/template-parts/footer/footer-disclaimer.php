<?php
/**
 * Footer disclaimer template
 *
 * @package Bennernet
 */

$disclaimer = get_theme_mod( 'bennernet_footer_disclaimer', '' );
$footer_links = bennernet_get_footer_links();
?>

<?php if ( ! empty( $disclaimer ) ) : ?>
<div class="footer-disclaimer">
    <div class="container">
        <p><?php echo wp_kses_post( $disclaimer ); ?></p>
    </div>
</div>
<?php endif; ?>

<?php if ( ! empty( $footer_links ) ) : ?>
<div class="footer-links">
    <div class="container">
        <?php
        $link_count = count( $footer_links );
        $i = 0;
        foreach ( $footer_links as $link ) :
            $i++;
            ?>
            <a href="<?php echo esc_url( $link['url'] ); ?>">
                <?php echo esc_html( $link['text'] ); ?>
            </a>
            <?php if ( $i < $link_count ) : ?>
                <span class="footer-divider">|</span>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>
