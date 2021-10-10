<?php
/**
 * Luthemes ( app/framework.php )
 *
 * @package   Luthemes
 * @copyright Copyright (C) 2019-2021. Benjamin Lu
 * @license   GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://getbenonit.com )
 */

namespace Luthemes\Portfolio;
use Benlumia007\Backdrop\Contracts\Bootable;

class Component implements Bootable {

	public function create_portfolio_post_type() {
		$labels = [
			'name'               => esc_html__( 'Portfolios', 'luthemes' ),
			'singular_name'      => esc_html__( 'Portfolio', 'luthemes' ),
            'add_new'            => esc_html__( 'Add New Portfolio', 'luthemes' ),
            'add_new_item'       => esc_html__( 'Add New Portfolio Item', 'luthemes' ),
            'edit_item'          => esc_html__( 'Edit Portfolio Item', 'luthemes' ),
            'new_item'           => esc_html__( 'New Portfolio Item', 'luthemes' ),
            'view_item'          => esc_html__( 'View Portfolio Item', 'luthemes' ),
            'search_items'       => esc_html__( 'Search Portfolio Item', 'luthemes' ),
			'not_found'          => esc_html__( 'Not Found', 'luthemes' ),
			'not_found_in_trash' => esc_html__( 'Not Found in Trash', 'luthemes' ),
			'name_admin_bar'     => esc_html__( 'Portfolio', 'luthemes' ),
			'parent_item_colon'  => esc_html__( 'Parent Item: ', 'luthemes' ),
		];

		$args = [
			'labels'       => $labels,
			'public'       => true,
			'has_archive'  => true,
			'menu_icon'    => 'dashicons-category',
			'supports'     => [ 'title', 'editor', 'thumbnail', 'custom-fields' ],
			'taxonomies'   => [ 'portfolio_category' ],
			'show_ui'      => true,
			'rewrite'      => [
				'with_front' => false,
				'slug' => 'portflio',
			],
			'show_in_rest' => true,
		];

		register_post_type( 'portfolio', $args );
	}

	/**
	 * Custom Post Types ( Category )
	 *
	 * @param string $type Category.
	 */
	public function create_portfolio_post_type_category() {
		$labels = array(
			'name'                       => _x( 'Categories', 'Taxonomy General Name', 'luthemes' ),
			'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'luthemes' ),
			'menu_name'                  => __( 'Categories', 'luthemes' ),
			'all_items'                  => __( 'All Categories', 'luthemes' ),
			'parent_item'                => __( 'Parent Category', 'luthemes' ),
			'parent_item_colon'          => __( 'Parent Category:', 'luthemes' ),
			'new_item_name'              => __( 'New Category Name', 'luthemes' ),
			'add_new_item'               => __( 'Add New Category', 'luthemes' ),
			'edit_item'                  => __( 'Edit Categories', 'luthemes' ),
			'update_item'                => __( 'Update Categories', 'luthemes' ),
			'view_item'                  => __( 'View Categories', 'luthemes' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', 'luthemes' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'luthemes' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'luthemes' ),
			'popular_items'              => __( 'Popular Categories', 'luthemes' ),
			'search_items'               => __( 'Search Categories', 'luthemes' ),
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
		register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );
	}

	/**
	 * Construct.
	 */
	public function boot() {
		add_action( 'init', array( $this, 'create_portfolio_post_type' ) );
		add_action( 'init', array( $this, 'create_portfolio_post_type_category' ) );
	}
}