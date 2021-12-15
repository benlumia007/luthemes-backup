<?php 
/**
 * Luthemes ( app/framework.php )
 *
 * This file is used to create a new framework instance and adds specific features to the theme.
 *
 * @package   Luthemes
 * @author    Benjamin Lu ( benlumia007@gmail.com )
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/silver-quantum
 */

/**
 * Create a new framework instance.
 */
$luthemes = new Benlumia007\Alembic\Framework();

$config = require_once( 'app/functions-config.php' );

/**
 * Register default providers.
 */
$luthemes->provider( Benlumia007\Alembic\Cache\Provider::class );
$luthemes->provider( Benlumia007\Alembic\ContentTypes\Entry\Provider::class );
$luthemes->provider( Benlumia007\Alembic\Routing\Http\Provider::class );
$luthemes->provider( Benlumia007\Alembic\Routing\Routes\Provider::class );
$luthemes->provider( Benlumia007\Alembic\View\View\Provider::class );
$luthemes->provider( Benlumia007\Alembic\Theme\Yaml\Provider::class );

$luthemes->instance( 'path', LUTHEMES_DIR );
$luthemes->instance( 'uri', $config['uri'] );
$luthemes->instance( 'uri/relative', parse_url( $luthemes->uri, PHP_URL_PATH ) );
$luthemes->instance( 'path/content', 'user/content' );
$luthemes->instance( 'cache/meta', [ 'date', 'category', 'slug' ] );
$luthemes->boot();

$luthemes->routes->get( '/', Benlumia007\Alembic\ContentTypes\Controllers\Home::class );

// Launch the current controller.
$current = $luthemes->routes->current();