<?php
/**
 * Plugin name: Forge Characters
 * Description: Adds Characters custom post type.
 * Author:      Will Leeks
 * Text Domain: forge-characters
 * Version:     1.0.0
 * 
 * @package     Forge\Characters
 */

declare( strict_types=1 );

namespace Forge\Characters;

\defined( 'ABSPATH' ) || die;

\define( 'CHARACTERS_VERSION', '1.0.0' );
\define( 'CHARACTERS_DIR_PATH', __DIR__ . '/' );
\define( 'CHARACTERS_URL', \plugins_url( '/', __FILE__ ) );

\add_action( 'plugins_loaded', function () {
	require_once CHARACTERS_DIR_PATH . '/inc/class-characters.php';

	// Loading the modules of the plugin.
	$modules = [
		'characters' => ( new Characters() ),
	];

	/**
	 * Filters the core modules of the plugin.
	 *
	 * @param array $modules
	 */
	\array_map( function( object $module ) {
		$module->init();
	}, \apply_filters( 'forge/modules', $modules ) );
} );
