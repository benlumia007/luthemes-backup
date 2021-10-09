<?php
/**
 * Menu
 *
 * @package   Luthemes
 * @author    Benjamin Lu ( https://benjlu.com )
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/luthemes
 */

/**
 * Define namespace
 */
namespace Luthemes\Menu;
use Benlumia007\Backdrop\Theme\Menu\Component as MenuContract;

/**
 * Menu
 */
class Component extends MenuContract {
    public function menus() {
        return [
            'primary'   => esc_html__( 'Primary Sidebar', 'luthemes' ),
            'secondary' => esc_html__( 'Secondary Sidebar', 'luthemes' ),
            'social'    => esc_html__( 'Social Navigation', 'luthemes' )
        ];
    }

	public function enqueue() {
		wp_enqueue_script( 'luthemes-navigation', get_theme_file_uri( 'public/js/app.js' ), array('jquery'), '1.0.0', true );
		wp_localize_script( 'luthemes-navigation', 'luthemesScreenReaderText', [
            'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'luthemes' ) . '</span>',
			'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'luthemes' ) . '</span>',
        ] );
    }
}   