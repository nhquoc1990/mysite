<?php
/*
Plugin Name: Letter Avatars
Description: Letter Avatars enable you to use Letters from commenters names instead of generic avatars.
Version: 2.8
Author: Sibin Grasic
Author URI: http://sgi.io
Text Domain: letter-avatars
*/

/**
 * 
 * @package SGI\LTRAV
 */

/* Prevent Direct access */
if ( !defined( 'DB_NAME' ) ) {
	header( 'HTTP/1.0 403 Forbidden' );
	die;
}

/*Define plugin main file*/
if ( !defined('SGI_LTRAV_FILE') )
	define ( 'SGI_LTRAV_FILE', __FILE__ );

/* Define BaseName */
if ( !defined('SGI_LTRAV_BASENAME') )
	define ('SGI_LTRAV_BASENAME',plugin_basename(SGI_LTRAV_FILE));

/* Define internal path */
if ( !defined( 'SGI_LTRAV_PATH' ) )
	define( 'SGI_LTRAV_PATH', plugin_dir_path( SGI_LTRAV_FILE ) );

/* Define internal version for possible update changes */
define ('SGI_LTRAV_VERSION', '2.7');

/* Load Up the text domain */
function sgi_ltrav_load_textdomain()
{
	load_plugin_textdomain('letter-avatars', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action('wp_loaded','sgi_ltrav_load_textdomain');

/* Check if we're running compatible software */
if ( version_compare( PHP_VERSION, '5.3.3', '<' ) && version_compare(WP_VERSION, '4.0', '<') ) :
	if (is_admin()) :
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		deactivate_plugins( __FILE__ );
		wp_die(__('Letter Avatars plugin requires WordPress 4.0 and PHP 5.3 or greater. The plugin has now disabled itself','letter-avatars'));
	endif;
endif;

/* Let's load up our plugin */

function sgi_ltrav_backend_init()
{
	require_once (SGI_LTRAV_PATH.'lib/ltrav-backend.php');
	new SGI_LtrAv_Backend();
}

function sgi_ltrav_frontend_init()
{
	require_once (SGI_LTRAV_PATH.'lib/ltrav-frontend.php');
	new SGI_LtrAv_Frontend();
}


if (defined( 'DOING_AJAX' )) :

	add_action('init','sgi_ltrav_frontend_init',20);

elseif (is_admin()) :

	add_action('plugins_loaded','sgi_ltrav_backend_init');
	
else : 

	add_action('init','sgi_ltrav_frontend_init',20);	

endif;