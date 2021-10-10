<?php
/**
 * Customize - Home
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
namespace Luthemes\Customize\Home;
use Luthemes\Customize\Home\Component;
use Benlumia007\Backdrop\Tools\ServiceProvider;

class Provider extends ServiceProvider {
	/**
	 * Binds the implementation of the attributes contract to the container.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return void
	 */
	public function register() {
		$this->app->singleton( 'customize/home', Component::class );
    }
    
    public function boot() {
        $this->app->resolve( 'customize/home' )->boot();
    }
}