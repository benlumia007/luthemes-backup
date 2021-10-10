<?php
/**
 * Customize - Home
 *
 * @package   Luthemes
 * @author    Benjamin Lu ( https://benjlu.com )
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/luthemes
 */

/**
 * Define namespace
 */
namespace Luthemes\Customize\Home;
use Benlumia007\Backdrop\Customize\Component as HomeContract;
/**
 * Customize
 */
class Component extends HomeContract {
    /**
     * Register Panels
     */
    public function panels( $manager ) {
        $manager->add_panel( 'home_section', [
            'title' => esc_html__( 'Home Section', 'luthemes' ),
            'priority' => 5,
        ] );
    }

    /**
     * Register Sections
     */
    public function sections( $manager ) {
        $manager->add_section( 'custom_portfolio', [
            'title' => esc_html__( 'Custom Portfolio', 'luthemes' ),
            'panel' => 'home_section',
            'priority' => 5
        ] );

        $manager->add_section( 'custom_blog', [
            'title' => esc_html__( 'Custom Blog', 'luthemes' ),
            'panel' => 'home_section',
            'priority' => 5
        ] );
    }

    /**
     * Register Settings
     */
    public function settings( $manager ) {
        $manager->add_setting( 'custom_portfolio_display', [
            'sanitize_callback' => 'Benlumia007\Backdrop\Customize\Helpers\Sanitize::checkbox'
        ] );

        $manager->add_setting( 'custom_blog_display', [
            'sanitize_callback' => 'Benlumia007\Backdrop\Customize\Helpers\Sanitize::checkbox'
        ] );
    }

    /**
     * Register Controls
     */
    public function controls( $manager ) {
		$manager->add_control( 'custom_portfolio_display', [
            'label' => esc_html__( 'Enable Portfolio', 'luthemes' ),
			'type' => 'checkbox',
			'section' => 'custom_portfolio',
			'settings' => 'custom_portfolio_display',
        ] );

		$manager->add_control( 'custom_blog_display', [
            'label' => esc_html__( 'Enable Blog', 'luthemes' ),
			'type' => 'checkbox',
			'section' => 'custom_blog',
			'settings' => 'custom_blog_display',
        ] );
    }
}