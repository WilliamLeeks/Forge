<?php
/**
 * Characters Class
 * 
 * @package Forge\Characters
 */

declare( strict_types=1 );

namespace Forge\Characters;

\defined( 'ABSPATH' ) || die;

class Characters {
    /**
	 * Constructor.
	 *
	 * @return void
	 */
	public function __construct() {}

    /**
     * Initialise class.
     */
    public function init() : void {
        // Register Characters post type.
		\add_action( 'init', [ $this, 'register_character_post_type' ] );

        // Register Character Class taxonomy.
		\add_action( 'init', [ $this, 'register_character_class_taxonomy' ] );

		// Register Character Race taxonomy.
		\add_action( 'init', [ $this, 'register_character_race_taxonomy' ] );

		// Register Character Type taxonomy.
		\add_action( 'init', [ $this, 'register_character_type_taxonomy' ] );
    }

    /**
	 * Register the Characters post type.
	 *
	 * @return void.
	 */
	public function register_character_post_type(): void {
		$labels = [
			'name'                     => 'Characters',
			'singular_name'            => 'Character',
			'add_new'                  => 'Add New',
			'add_new_item'             => 'Add New Character',
			'edit_item'                => 'Edit Character',
			'new_item'                 => 'New Character',
			'view_item'                => 'View Character',
			'view_items'               => 'View Characters',
			'search_items'             => 'Search Characters',
			'not_found'                => 'No characters found.',
			'not_found_in_trash'       => 'No characters found in Trash.',
			'parent_item_colon'        => 'Parent Character:',
			'all_items'                => 'All Characters',
			'archives'                 => 'Character Archives',
			'attributes'               => 'Character Attributes',
			'insert_into_item'         => 'Insert into character',
			'uploaded_to_this_item'    => 'Uploaded to this character',
			'filter_items_list'        => 'Filter characters list',
			'items_list_navigation'    => 'Characters list navigation',
			'items_list'               => 'Characters list',
			'item_published'           => 'Character published.',
			'item_published_privately' => 'Character published privately.',
			'item_reverted_to_draft'   => 'Character reverted to draft.',
			'item_scheduled'           => 'Character scheduled.',
			'item_updated'             => 'Character updated.',
			'item_link'                => 'Character Link',
			'item_link_description'    => 'A link to an character.'
		];

		$supports = [
			'title',
			'editor',
			'revisions',
			'author',
			'page-attributes',
			'thumbnail',
		];

		$args = [
			'labels'           => $labels,
			'description'      => 'Characters who appear in the world.',
			'public'           => true,
			'menu_icon'        => 'dashicons-groups',
			'has_archive'      => true,
			'delete_with_user' => false,
			'supports'         => $supports,
			'show_in_rest'     => true,
		];

		\register_post_type( 'character', $args );
	}

    /**
     * Register Character Class taxonomy.
     * 
     * @return void
     */
    public function register_character_class_taxonomy() : void {
        $labels = [
            'name'               => 'Character Classes',
            'singular_name'      => 'Character Class',
            'add_new'            => 'Add New Character Class',
            'add_new_item'       => 'Add New Character Class',
            'edit_item'          => 'Edit Character Class',
            'new_item'           => 'New Character Class',
            'view_item'          => 'View Character Class',
            'search_items'       => 'Search Character Classes',
            'not_found'          => 'No Character Class found',
            'not_found_in_trash' => 'No Character Class found in Trash',
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'show_in_rest' => true,
            'show_ui' => true,
        ];

        \register_taxonomy( 'character_class', 'character', $args );
    }

	/**
     * Register Character Race taxonomy.
     * 
     * @return void
     */
    public function register_character_race_taxonomy() : void {
        $labels = [
            'name'               => 'Character Races',
            'singular_name'      => 'Character Race',
            'add_new'            => 'Add New Character Race',
            'add_new_item'       => 'Add New Character Race',
            'edit_item'          => 'Edit Character Race',
            'new_item'           => 'New Character Race',
            'view_item'          => 'View Character Race',
            'search_items'       => 'Search Character Races',
            'not_found'          => 'No Character Race found',
            'not_found_in_trash' => 'No Character Race found in Trash',
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'show_in_rest' => true,
            'show_ui' => true,
        ];

        \register_taxonomy( 'character_race', 'character', $args );
    }

	/**
     * Register Character Type taxonomy.
     * 
     * @return void
     */
    public function register_character_type_taxonomy() : void {
        $labels = [
            'name'               => 'Character Types',
            'singular_name'      => 'Character Type',
            'add_new'            => 'Add New Character Type',
            'add_new_item'       => 'Add New Character Type',
            'edit_item'          => 'Edit Character Type',
            'new_item'           => 'New Character Type',
            'view_item'          => 'View Character Type',
            'search_items'       => 'Search Character Types',
            'not_found'          => 'No Character Type found',
            'not_found_in_trash' => 'No Character Type found in Trash',
        ];

        $args = [
			'default'      => [
				'name' => 'NPC',
				'slug' => 'npc',
			],
            'labels'       => $labels,
            'public'       => true,
            'show_in_rest' => true,
            'show_ui'      => true,
        ];

        \register_taxonomy( 'character_type', 'character', $args );
    }
}
