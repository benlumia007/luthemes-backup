<?php
/**
 * Initiator ( index.php )
 *
 * @package   Initiator
 * @copyright Copyright (C) 2019-2021. Benjamin Lu
 * @author    Benjamin Lu ( https://getbenonit.com )
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
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
								Benlumia007\Backdrop\Template\get_template_part( 'content/content', 'none' );
						endif;
					?>
				</main>
				<?php Benlumia007\Backdrop\View\display( 'sidebar', [ 'primary' ] ); ?>
			</div>
		</div>
	</section>
<?php $engine->display( 'footer' ); ?>