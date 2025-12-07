<?php

	require get_template_directory() . '/inc/dashboard/tgm/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function ovation_blog_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Ovation Elements', 'ovation-blog' ),
			'slug'             => 'ovation-elements',
			'required'         => false,
			'force_activation' => false,
		)
		
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'ovation_blog_register_recommended_plugins' );