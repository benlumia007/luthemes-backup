<?php
/**
 * Boot the framework
 * 
 * This file is used to create a new framework and bind items to the container.
 * This is the where all the features will be added as part of the theme.
 *
 * @package   luthemes
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright Copyright (C) 2017-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/luthemes
 */

/**
 * Create a new framework instance
 *
 * This will create an instance of the framework allowing you to initialize the theme.
 */
$luthemes = new Benlumia007\Backdrop\Framework();

/**
 * Boot the Framework
 */
$luthemes->boot();