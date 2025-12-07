<?php
/**
 * WooCommerce Compatibility File
 *
 * @package Bennernet
 */

get_header();
?>

<div class="container">
    <div class="site-content">
        <main id="main" class="content-area">
            <?php woocommerce_content(); ?>
        </main>

        <?php
        if ( is_active_sidebar( 'sidebar-1' ) && ! is_product() ) {
            get_sidebar();
        }
        ?>
    </div>
</div>

<?php
get_footer();
