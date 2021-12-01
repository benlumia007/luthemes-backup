<?php
/**
 * Luthemes ( index.php )
 *
 * @package   Luthemes
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Defines the root directory
 * 
 * Automatically defines LUTHEMES_DIR. 
 */
define( 'LUTHEMES_DIR', __DIR__ );

/**
 * Run the composer autoloader.
 * 
 * Automatically loads the composer autoloader.
 */
if ( file_exists( 'vendor/autoload.php' ) ) {
    require_once( 'vendor/autoload.php' );
}