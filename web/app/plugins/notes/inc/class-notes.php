<?php
/**
 * Notes Class
 * 
 * @package Forge\Notes
 */

declare( strict_types=1 );

namespace Forge\Notes;

\defined( 'ABSPATH' ) || die;

class Notes {
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
        // Register Notes post type.
		\add_action( 'init', [ $this, 'register_note_post_type' ] );

        // Register Note Type taxonomy.
		\add_action( 'init', [ $this, 'register_note_type_taxonomy' ] );
    }

    /**
	 * Register the Notes post type.
	 *
	 * @return void.
	 */
	public function register_note_post_type(): void {
		$labels = [
			'name'                     => 'Notes',
			'singular_name'            => 'Note',
			'add_new'                  => 'Add New',
			'add_new_item'             => 'Add New Note',
			'edit_item'                => 'Edit Note',
			'new_item'                 => 'New Note',
			'view_item'                => 'View Note',
			'view_items'               => 'View Notes',
			'search_items'             => 'Search Notes',
			'not_found'                => 'No notes found.',
			'not_found_in_trash'       => 'No notes found in Trash.',
			'parent_item_colon'        => 'Parent Note:',
			'all_items'                => 'All Notes',
			'archives'                 => 'Note Archives',
			'attributes'               => 'Note Attributes',
			'insert_into_item'         => 'Insert into note',
			'uploaded_to_this_item'    => 'Uploaded to this note',
			'filter_items_list'        => 'Filter notes list',
			'items_list_navigation'    => 'Notes list navigation',
			'items_list'               => 'Notes list',
			'item_published'           => 'Note published.',
			'item_published_privately' => 'Note published privately.',
			'item_reverted_to_draft'   => 'Note reverted to draft.',
			'item_scheduled'           => 'Note scheduled.',
			'item_updated'             => 'Note updated.',
			'item_link'                => 'Note Link',
			'item_link_description'    => 'A link to an note.'
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
			'description'      => 'Notes to help with planning, session details, etc.',
			'public'           => true,
			'menu_icon'        => 'dashicons-media-text',
			'has_archive'      => true,
			'delete_with_user' => false,
			'supports'         => $supports,
			'show_in_rest'     => true,
		];

		\register_post_type( 'note', $args );
	}

    /**
     * Register Note Type taxonomy.
     * 
     * @return void
     */
    public function register_note_type_taxonomy() : void {
        $labels = [
            'name'               => 'Note Types',
            'singular_name'      => 'Note Type',
            'add_new'            => 'Add New Note Type',
            'add_new_item'       => 'Add New Note Type',
            'edit_item'          => 'Edit Note Type',
            'new_item'           => 'New Note Type',
            'view_item'          => 'View Note Type',
            'search_items'       => 'Search Note Types',
            'not_found'          => 'No Note Type found',
            'not_found_in_trash' => 'No Note Type found in Trash',
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'show_in_rest' => true,
            'show_ui' => true,
        ];

        \register_taxonomy( 'note_type', 'note', $args );
    }
}
