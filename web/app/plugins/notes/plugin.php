<?php
/**
 * Plugin name: Forge Notes
 * Description: Adds Notes custom post type to help with planning, recording session notes, etc.
 * Author:      Will Leeks
 * Text Domain: forge-notes
 * Version:     1.0.0
 * 
 * @package     Forge\Notes
 */

declare( strict_types=1 );

namespace Forge\Notes;

\defined( 'ABSPATH' ) || die;

\define( 'NOTES_VERSION', '1.0.0' );
\define( 'NOTES_DIR_PATH', __DIR__ . '/' );
\define( 'NOTES_URL', \plugins_url( '/', __FILE__ ) );

\add_action( 'plugins_loaded', function () {
	require_once NOTES_DIR_PATH . '/inc/class-notes.php';

	// Loading the modules of the plugin.
	$modules = [
		'notes' => ( new Notes() ),
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
