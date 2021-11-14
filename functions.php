<?php
/**
 * Main function file.
 *
 * @package   luthemes
 * @author    Benjamin Lu ( benlumia007@gmail.com )
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/luthemes
 */

/**
 * Run the composer autoloader.
 * 
 * Automatically loads the composer autoloader. Be sure to check if the
 * file exists. This also autoloads our theme's framework, Backdrop.
 */
if ( file_exists( get_theme_file_path( '/vendor/autoload.php' ) ) ) {
	require_once get_theme_file_path( '/vendor/autoload.php' );
}