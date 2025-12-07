<?php
/**
 * The footer template
 *
 * @package Bennernet
 */
?>

    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>

        <?php get_template_part( 'template-parts/footer/footer-disclaimer' ); ?>

        <div class="site-info">
            <div class="container">
                <?php
                /* translators: %s: Current year and site name */
                printf(
                    esc_html__( '&copy; %1$s %2$s', 'bennernet' ),
                    date_i18n( 'Y' ),
                    get_bloginfo( 'name' )
                );
                ?>
                <span class="sep"> | </span>
                <?php
                /* translators: %s: Theme name */
                printf(
                    esc_html__( 'Theme: %s', 'bennernet' ),
                    '<a href="https://bennernet.com">Bennernet</a>'
                );
                ?>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
