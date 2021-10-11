<?php
/**
 * Luthemes ( app/framework.php )
 *
 * @package   Luthemes
 * @copyright Copyright (C) 2019-2021. Benjamin Lu
 * @license   GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://getbenonit.com )
 */

namespace Luthemes\Docs;
use Benlumia007\Backdrop\Contracts\Bootable;

class Component implements Bootable {

	public function docs() {
		$labels = [
			'name'               => esc_html__( 'Docs', 'luthemes' ),
			'singular_name'      => esc_html__( 'Doc', 'luthemes' ),
            'add_new'            => esc_html__( 'Add New Doc', 'luthemes' ),
            'add_new_item'       => esc_html__( 'Add New Doc Item', 'luthemes' ),
            'edit_item'          => esc_html__( 'Edit Doc Item', 'luthemes' ),
            'new_item'           => esc_html__( 'New Doc Item', 'luthemes' ),
            'view_item'          => esc_html__( 'View Doc Item', 'luthemes' ),
            'search_items'       => esc_html__( 'Search Doc Item', 'luthemes' ),
			'not_found'          => esc_html__( 'Not Found', 'luthemes' ),
			'not_found_in_trash' => esc_html__( 'Not Found in Trash', 'luthemes' ),
			'name_admin_bar'     => esc_html__( 'Doc', 'luthemes' ),
			'parent_item_colon'  => esc_html__( 'Parent Item: ', 'luthemes' ),
		];

		$args = [
			'labels'       => $labels,
			'public'       => true,
			'has_archive'  => true,
			'menu_icon'    => 'dashicons-category',
			'supports'     => [ 'title', 'editor', 'thumbnail', 'custom-fields' ],
			'show_ui'      => true,
			'rewrite'      => [
				'with_front' => false,
				'slug' => 'docs',
			],
			'show_in_rest' => true,
		];

		register_post_type( 'docs', $args );
	}

	/**
	 * Construct.
	 */
	public function boot() {
		add_action( 'init', [ $this, 'docs' ] );
	}
}