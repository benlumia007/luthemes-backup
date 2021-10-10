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
$portfolio_display = get_theme_mod( 'custom_portfolio_display' );
$blog_display      = get_theme_mod( 'custom_blog_display' );
$contact_display   = get_theme_mod( 'custom_contact_display' );
?>
<?php $engine = Benlumia007\Backdrop\App::resolve( 'view/engine' ); ?>
<?php $engine->display( 'header' ); ?>
    <?php if ( 0 != $portfolio_display && isset( $portfolio_display ) ) { ?>
        <?php $engine->display( 'sections/portfolio'); ?>
    <?php } ?>
<?php $engine->display( 'footer' ); ?>