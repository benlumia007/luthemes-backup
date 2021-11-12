<?php
/**
 * Theme - scripts
 * 
 * This file enqueue scripts for css and js.
 *
 * @package   luthemes
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright (C) 2017-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/luthemes
 */

namespace Benlumia007\Luthemes;

/**
 * Enqueue Scripts and Styles
 *
 * @since  1.0.0
 * @access public
 * @return void
 *
 * @link   https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 * @link   https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 */
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'luthemes-screen', get_theme_file_uri( 'public/assets/css/screen.css' ), [ 'splendid-portfolio-screen' ], '1.0.0' );
} );