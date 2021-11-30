<?php 

$luthemes = new Benlumia007\Alembic\Core\Framework();

$config = require_once( 'app/functions-config.php' );

$luthemes->instance( 'path', LUTHEMES_DIR );
$luthemes->instance( 'uri', $config['uri'] );
$luthemes->instance( 'uri/relative', parse_url( $luthemes->uri, PHP_URL_PATH ) );
$luthemes->instance( 'path/content', 'user/content' );
$luthemes->instance( 'cache/meta', [ 'date', 'category', 'slug' ] );
$luthemes->boot();

$luthemes->routes->get( 'blog/feed', Benlumia007\Alembic\Controllers\Feed::class, 'top' );
$luthemes->routes->get( 'blog/page/{number}', Benlumia007\Alembic\Controllers\Blog::class, 'top' );

Benlumia007\Alembic\ContentTypes::add( 'category', new Benlumia007\Alembic\Entry\Types\Category( $luthemes->routes ) );
Benlumia007\Alembic\ContentTypes::add( 'feature', new Benlumia007\Alembic\Entry\Types\Feature( $luthemes->routes ) );
Benlumia007\Alembic\ContentTypes::add( 'tag', new Benlumia007\Alembic\Entry\Types\Tag( $luthemes->routes ) );
Benlumia007\Alembic\ContentTypes::add( 'author', new Benlumia007\Alembic\Entry\Types\Author( $luthemes->routes ) );
Benlumia007\Alembic\ContentTypes::add( 'post', new Benlumia007\Alembic\Entry\Types\Post( $luthemes->routes ) );
Benlumia007\Alembic\ContentTypes::add( 'portfolio', new Benlumia007\Alembic\Entry\Types\Portfolio( $luthemes->routes ) );
Benlumia007\Alembic\ContentTypes::add( 'page', new Benlumia007\Alembic\Entry\Types\Page( $luthemes->routes ) );
Benlumia007\Alembic\ContentTypes::registerRoutes();
$luthemes->routes->get( '/blog', Benlumia007\Alembic\Controllers\Blog::class );
$luthemes->routes->get( '/', Benlumia007\Alembic\Controllers\Home::class );

if ( isset( $_GET['bust-cache'] ) ) {

	if ( 'all' === $_GET['bust-cache'] ) {

		$files = glob( $luthemes->resolve( 'path' ) . "/user/cache/content/*.json" );

		foreach ( $files as $filename ) {
			unlink( $filename );
		}
	} else {
		$path = $luthemes->resolve( 'path' ) . '/user/cache';

		$name = preg_replace( '/[^A-Za-z0-9\/_-]/i', '', $_GET['bust-cache'] );

		if ( file_exists( "{$path}/{$name}.json" ) ) {
			unlink( "{$path}/{$name}.json" );
		}
	}
}

// Check if ob_gzhandler already loaded
if ( ini_get( 'output_handler' ) !== 'ob_gzhandler' ) {
	if ( extension_loaded( 'zlib' ) ) {
		if ( ! ob_start( 'ob_gzhandler' ) ) {
			ob_start();
		}
	}
}

// Launch the current controller.
$current = $luthemes->routes->current();