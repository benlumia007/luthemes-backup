<?php
/**
 * Luthemes ( content-single.php )
 *
 * @package   Luthemes
 * @author    Benjamin Lu ( benlumia007@gmail.com )
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/luthemes
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<picture class="post-thumbnail">
			<?php the_post_thumbnail( 'luthemes-large-thumbnails' ); ?>
		</picture>
	<?php } ?>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<div class="entry-taxonomies">
		<?php Benlumia007\Backdrop\Theme\Entry\display_categories(); ?>
		<?php Benlumia007\Backdrop\Theme\Entry\display_tags(); ?>
	</div>
</article>
