<?php
/**
 * Luthemes  ( index.php )
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
	<section id="content" class="site-content">
		<div id="main" class="site-main">
			<div id="layout" class="<?php echo esc_attr( get_theme_mod( 'global_layout', 'right-sidebar' ) ); ?>">
				<main id="primary" class="content-area">
					<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								$engine->display( 'content/single'  );
							endwhile;
							comments_template();
							the_posts_pagination();
						else :
								$engine->display( 'content/404/none' );
						endif;
					?>
				</main>
				<?php Benlumia007\Backdrop\Theme\Menu\display( 'sidebar', [ 'primary' ] ); ?>
			</div>
		</div>
	</section>
<?php $engine->display( 'footer' ); ?>