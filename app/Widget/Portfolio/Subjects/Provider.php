<?php
/**
 * Luthemes ( app/framework.php )
 *
 * @package   Luthemes
 * @copyright Copyright (C) 2019-2021. Benjamin Lu
 * @license   GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://getbenonit.com )
 */

namespace Luthemes\Widget\Portfolio\Subjects;
use Luthemes\Widget\Portfolio\Subjects\Component;
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
		$this->app->singleton( 'subjects/widget', Component::class );

    }
    
    public function boot() {
        $this->app->resolve( 'subjects/widget' )->boot();
    }
}