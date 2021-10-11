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
	<section id="content" class="site-content">
		<div id="main" class="site-main">
			<div id="layout" class="<?php echo esc_attr( get_theme_mod( 'global_layout', 'right-sidebar' ) ); ?>">
				<main id="primary" class="content-area">
					<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								$engine->display( 'content/portfolio'  );
							endwhile;
							comments_template();
							the_posts_pagination();
						else :
								$engine->display( 'content/404/none'  );
						endif;
					?>
				</main>
				<?php Benlumia007\Backdrop\Theme\Sidebar\display( 'sidebar', [ 'portfolio' ] ); ?>
			</div>
		</div>
	</section>
	<section id="related" class="site-related">
		<div class="entry-content">
                    <ul class="jetpack-portfolio-grid">
                        <?php $query = new WP_Query(array(
                            'post_type'         => 'portfolio', 
                            'posts_per_page'    => 3, 
                            'orderby'           => 'rand',
                            'post__not_in'      => array(get_queried_object_id())
                        )); 
                        ?>
                        <?php if ($query->have_posts()) { ?>
                            <?php while ($query->have_posts()) { ?>
                                <?php $query->the_post(); ?>
                                   <?php if ( has_post_thumbnail() ) { ?>
                                    <li>
										<?php the_post_thumbnail('luthemes-large-thumbnails'); ?>
										<div class="wp-caption">
                                        <div class="wp-caption-text">
                                            <h3 class="portfolio-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail_caption(); ?></a></h3>
                                            <span><?php echo wptexturize( wp_strip_all_tags( get_post( get_post_thumbnail_id() )->post_content ) ); ?></span>
                                        </div>
                                    </div>
                                    </li>
                                <?php } ?>
                            <?php } ?> 
                            <?php wp_reset_postdata(); ?>
                        <?php } ?>
                    </ul>
                </div>
	</section>
<?php $engine->display( 'footer' ); ?>