<?php
/**
 * Luthemes ( index.php )
 *
 * @package   Luthemes
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @author    Benjamin Lu ( https://luthemes.com )
 */
?>
<?php $engine = Benlumia007\Backdrop\App::resolve( 'view/engine' ); ?>
<?php $engine->display( 'header' ); ?>
	<section id="content" class="site-content">
		<div id="main" class="site-main">
			<div id="layout" class="no-sidebar">
				<main id="primary" class="content-area">
					<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								$engine->display( 'content', get_post_format()  );
							endwhile;
							the_posts_pagination();
						else :
								$engine->display( 'content/none' );
						endif;
					?>
				</main>
			</div>
		</div>
	</section>
<?php $engine->display( 'footer' ); ?>