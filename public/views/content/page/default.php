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
		</div>
</article>
