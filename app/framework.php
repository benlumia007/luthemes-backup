<?php
/**
 * Luthemes ( app/framework.php )
 *
 * @package   Luthemes
 * @copyright Copyright (C) 2019-2021. Benjamin Lu
 * @license   GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://getbenonit.com )
 */

/**
 * Create a new framework instance
 *
 * This will create an instance of the framework allowing you to initialize the theme.
 */
$luthemes = new Benlumia007\Backdrop\Framework();

/**
 * Register default providers
 */
$luthemes->provider( Benlumia007\Backdrop\FontAwesome\Provider::class );
$luthemes->provider( Benlumia007\Backdrop\GoogleFonts\Provider::class );
$luthemes->provider( Benlumia007\Backdrop\Template\Hierarchy\Provider::class );
$luthemes->provider( Benlumia007\Backdrop\Template\Manager\Provider::class );
$luthemes->provider( Benlumia007\Backdrop\Template\View\Provider::class );

/**
 * Register Service Provider with the Framework
 */
$luthemes->provider( Luthemes\Customize\Home\Provider::class );
$luthemes->provider( Luthemes\Menu\Provider::class );
$luthemes->provider( Luthemes\Portfolio\Provider::class );
$luthemes->provider( Luthemes\Sidebar\Provider::class );
$luthemes->provider( Luthemes\Widget\Portfolio\Details\Provider::class );
$luthemes->provider( Luthemes\Widget\Portfolio\Features\Provider::class );


/**
 * Boot the Framework
 */
$luthemes->boot();