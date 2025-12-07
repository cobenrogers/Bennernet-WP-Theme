<?php
/**
 * Template part for displaying no posts found
 *
 * @package Bennernet
 */
?>

<section class="no-results not-found">

    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'bennernet' ); ?></h1>
    </header>

    <div class="page-content">
        <?php
        if ( is_home() && current_user_can( 'publish_posts' ) ) :
            printf(
                '<p>' . wp_kses(
                    /* translators: %s: Admin new post URL */
                    __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'bennernet' ),
                    array(
                        'a' => array(
                            'href' => array(),
                        ),
                    )
                ) . '</p>',
                esc_url( admin_url( 'post-new.php' ) )
            );
        elseif ( is_search() ) :
            ?>
            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bennernet' ); ?></p>
            <?php
            get_search_form();
        else :
            ?>
            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bennernet' ); ?></p>
            <?php
            get_search_form();
        endif;
        ?>
    </div>

</section>
