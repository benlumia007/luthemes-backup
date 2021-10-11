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
			'taxonomies'   => [ 'layouts', 'features', 'subjects' ],
			'show_ui'      => true,
			'rewrite'      => [
				'with_front' => false,
				'slug' => 'portflio',
			],
			'show_in_rest' => true,
		];

		register_post_type( 'docs', $args );
	}

	/**
	 * Layouts
	 */
	public function layouts() {
		$labels = [
			'name'                       => _x( 'Layouts', 'Taxonomy General Name', 'luthemes' ),
			'singular_name'              => _x( 'Layout', 'Taxonomy Singular Name', 'luthemes' ),
			'menu_name'                  => __( 'Layouts', 'luthemes' ),
			'all_items'                  => __( 'All Layouts', 'luthemes' ),
			'parent_item'                => __( 'Parent Category', 'luthemes' ),
			'parent_item_colon'          => __( 'Parent Category:', 'luthemes' ),
			'new_item_name'              => __( 'New Category Name', 'luthemes' ),
			'add_new_item'               => __( 'Add New Category', 'luthemes' ),
			'edit_item'                  => __( 'Edit Features', 'luthemes' ),
			'update_item'                => __( 'Update Features', 'luthemes' ),
			'view_item'                  => __( 'View Features', 'luthemes' ),
			'separate_items_with_commas' => __( 'Separate Features with commas', 'luthemes' ),
			'add_or_remove_items'        => __( 'Add or remove Features', 'luthemes' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'luthemes' ),
			'popular_items'              => __( 'Popular Features', 'luthemes' ),
			'search_items'               => __( 'Search Features', 'luthemes' ),
			'not_found'                  => __( 'Not Found', 'luthemes' ),
		];

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => false,
			'show_tagcloud'     => false,
			'show_in_rest'      => true,
		);
		register_taxonomy( 'layouts', [ 'docs' ], $args );
	}

	/**
	 * Custom Post Types ( Feature )
	 *
	 * @param string $type Feature.
	 */
	public function features() {
		$labels = array(
			'name'                       => _x( 'Features', 'Taxonomy General Name', 'luthemes' ),
			'singular_name'              => _x( 'Feature', 'Taxonomy Singular Name', 'luthemes' ),
			'menu_name'                  => __( 'Features', 'luthemes' ),
			'all_items'                  => __( 'All Features', 'luthemes' ),
			'parent_item'                => __( 'Parent Category', 'luthemes' ),
			'parent_item_colon'          => __( 'Parent Category:', 'luthemes' ),
			'new_item_name'              => __( 'New Category Name', 'luthemes' ),
			'add_new_item'               => __( 'Add New Category', 'luthemes' ),
			'edit_item'                  => __( 'Edit Features', 'luthemes' ),
			'update_item'                => __( 'Update Features', 'luthemes' ),
			'view_item'                  => __( 'View Features', 'luthemes' ),
			'separate_items_with_commas' => __( 'Separate Features with commas', 'luthemes' ),
			'add_or_remove_items'        => __( 'Add or remove Features', 'luthemes' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'luthemes' ),
			'popular_items'              => __( 'Popular Features', 'luthemes' ),
			'search_items'               => __( 'Search Features', 'luthemes' ),
			'not_found'                  => __( 'Not Found', 'luthemes' ),
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => false,
			'show_tagcloud'     => false,
			'show_in_rest'      => true,
		);
		register_taxonomy( 'features', [ 'docs' ], $args );
	}

	/**
	 * Custom Post Types ( Feature )
	 *
	 * @param string $type Feature.
	 */
	public function subjects() {
		$labels = array(
			'name'                       => _x( 'Subjects', 'Taxonomy General Name', 'luthemes' ),
			'singular_name'              => _x( 'Subject', 'Taxonomy Singular Name', 'luthemes' ),
			'menu_name'                  => __( 'Subjects', 'luthemes' ),
			'all_items'                  => __( 'All Subjects', 'luthemes' ),
			'parent_item'                => __( 'Parent Category', 'luthemes' ),
			'parent_item_colon'          => __( 'Parent Category:', 'luthemes' ),
			'new_item_name'              => __( 'New Category Name', 'luthemes' ),
			'add_new_item'               => __( 'Add New Category', 'luthemes' ),
			'edit_item'                  => __( 'Edit Features', 'luthemes' ),
			'update_item'                => __( 'Update Features', 'luthemes' ),
			'view_item'                  => __( 'View Features', 'luthemes' ),
			'separate_items_with_commas' => __( 'Separate Features with commas', 'luthemes' ),
			'add_or_remove_items'        => __( 'Add or remove Features', 'luthemes' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'luthemes' ),
			'popular_items'              => __( 'Popular Features', 'luthemes' ),
			'search_items'               => __( 'Search Features', 'luthemes' ),
			'not_found'                  => __( 'Not Found', 'luthemes' ),
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => false,
			'show_tagcloud'     => false,
			'show_in_rest'      => true,
		);
		register_taxonomy( 'subjects', [ 'docs' ], $args );
	}

	/**
	 * Construct.
	 */
	public function boot() {
		add_action( 'init', [ $this, 'docs' ] );
		add_action( 'init', [ $this, 'layouts' ] );
		add_action( 'init', [ $this, 'features' ] );
		add_action( 'init', [ $this, 'subjects' ] );
	}
}