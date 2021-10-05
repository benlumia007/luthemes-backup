<?php

namespace Luthemes\Menu;
use Benlumia007\Backdrop\Theme\Menu\Component as MenuContract;

class Component extends MenuContract {
    public function menus() {
        return array(
            'primary'   => esc_html__( 'Primary Sidebar', 'luthemes' ),
            'secondary' => esc_html__( 'Secondary Sidebar', 'luthemes' ),
            'social'    => esc_html__( 'Social Navigation', 'luthemes' )
        );
    }

	public function enqueue() {
		wp_enqueue_script( 'luthemes-navigation', get_theme_file_uri( 'vendor/benlumia007/luthemes/assets/js/navigation.js' ), array('jquery'), '3.0.0', true );
		wp_localize_script( 'luthemes-navigation', 'luthemesScreenReaderText', array(
			'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'luthemes' ) . '</span>',
			'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'luthemes' ) . '</span>',
		) );
    }
}   