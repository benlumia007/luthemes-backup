<?php
/**
 * Section - Portfolio
 *
 * @package   Luthemes
 * @author    Benjamin Lu ( benlumia007@gmail.com )
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/luthemes
 */
?>
<section id="portfolio" class="site-portfolio">
    <div id="main" class="content-area">
        <header class="portfolio-header">
            <h1 class="portfolio-title"><?php esc_html_e( 'Portfolio', 'luthemes' ); ?></h1>
            <span class="portfolio-description"><?php esc_html_e( 'Some of my recent works', 'luthemes' ); ?></span>
        </header>

		<div class="entry-content">
			<div class="portfolio-grid">
				<?php $posts_per_page = get_theme_mod( 'custom_portfolio_items', 9 ); ?>
				<?php $query = new WP_Query( [ 'post_type'      => 'portfolio', 'posts_per_page' => $posts_per_page ] ); ?>
                <?php 
                    if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();

							if ( has_post_thumbnail() ) { ?>
                                <div class="portfolio-items">
                                    <?php the_post_thumbnail( 'camaraderie-large-thumbnails' ); ?>
                                    <div class="wp-caption">
                                        <div class="wp-caption-text">
                                            <h3 class="portfolio-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail_caption(); ?></a></h3>
                                            <span><?php echo wptexturize( wp_strip_all_tags( get_post( get_post_thumbnail_id() )->post_content ) ); ?></span>
                                        </div>
                                    </div>
                                </div>
                        <?php }
						}
					}
					wp_reset_postdata();
				?>
			</div>
    </div>
</section>