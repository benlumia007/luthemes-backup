<?php
/**
 * Luthemes ( index.php )
 *
 * @package   Luthemes
 * @author    Benjamin Lu ( benlumia007@gmail.com )
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/luthemes
 */
?>
<?php $engine = Benlumia007\Backdrop\App::resolve( 'view/engine' ); ?>
<?php $engine->display( 'header' ); ?>

<?php $engine->display( 'footer' ); ?>