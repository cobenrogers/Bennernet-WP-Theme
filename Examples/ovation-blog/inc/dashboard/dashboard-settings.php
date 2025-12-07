<?php
/**
 * Settings for demo import
 *
 */

/**
 * Define constants
 **/
if ( ! defined( 'WHIZZIE_DIR' ) ) {
	define( 'WHIZZIE_DIR', dirname( __FILE__ ) );
}
require trailingslashit( WHIZZIE_DIR ) . 'dashboard-contents.php';
$ovation_blog_current_theme = wp_get_theme();
$ovation_blog_theme_title = $ovation_blog_current_theme->get( 'Name' );


/**
 * Make changes below
 **/

// Change the title and slug of your wizard page
$config['ovation_blog_page_slug'] 	= 'ovation-blog';
$config['ovation_blog_page_title']	= 'Begin Installation';

$config['steps'] = array(
	'plugins' => array(
		'id'			=> 'plugins',
		'title'			=> __( 'Install and Activate Recommended Plugins', 'ovation-blog' ),
		'icon'			=> 'admin-plugins',
		'button_text'	=> __( 'Install Recommended Plugins', 'ovation-blog' ),
		'can_skip'		=> true
	),
	'widgets' => array(
		'id'			=> 'widgets',
		'title'			=> __( 'Begin With Demo Import', 'ovation-blog' ),
		'icon'			=> 'welcome-widgets-menus',
		'button_text'	=> __( 'Begin With Demo Import', 'ovation-blog' ),
		'can_skip'		=> true
	),
	'done' => array(
		'id'			=> 'done',
		'title'			=> __( 'Customize Your Site', 'ovation-blog' ),
		'icon'			=> 'yes',
	)
);

/**
 * This kicks off the wizard
 **/
if( class_exists( 'Ovation_Blog_Whizzie' ) ) {
	$Ovation_Blog_Whizzie = new Ovation_Blog_Whizzie( $config );
}