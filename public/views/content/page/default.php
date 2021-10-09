<?php
/**
 * Content Page
 *
 * @package   Luthemes
 * @author    Benjamin Lu ( benlumia007@gmail.com )
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/luthemes)
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
	<header class="entry-header">
		<?php Benlumia007\Backdrop\Theme\Entry\display_title(); ?>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages(
				array(
					'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'luthemes' ),
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'luthemes' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">,</span> ',
				)
			);
			?>
	</div>
</article>
