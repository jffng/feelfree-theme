<?php

if ( ! function_exists( 'feelfree_support' ) ) :
	function feelfree_support()  {

		// Make theme available for translation.
		load_theme_textdomain( 'feelfree', get_template_directory() . '/languages' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Alignwide and alignfull classes in the block editor
		add_theme_support( 'align-wide' );

		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Adding support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Support a custom color palette.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => __( 'White', 'feelfree' ),
				'slug'  => 'white',
				'color' => '#fff',
			),
			array(
				'name'  => __( 'feelfree Blue', 'nwaneri' ),
				'slug'  => 'feelfree-blue',
				'color' => '#333366',
			),
			array(
				'name'  => __( 'Burning Red', 'feelfree' ),
				'slug'  => 'burning-red',
				'color' => '#EB4D55',
			),
			array(
				'name'  => __( 'Cream Orange', 'feelfree' ),
				'slug'  => 'cream-orange',
				'color' => '#FF9D76',
			)
		) );

    }

    add_action( 'after_setup_theme', 'feelfree_support' );
endif;

/**
 * Register and Enqueue Styles.
 */
if ( function_exists( 'register_block_style' ) ) {
	function feelfree_register_block_styles() {
		
		/**
		** Register stylesheet
		**/
		wp_register_style(
			'block-styles-stylesheet',
			get_template_directory_uri() . '/css/block-styles.css',
			array(),
			'1.1'
		);

		register_block_style(
			'core/latest-posts',
				array(
					'name'					=> 'latest-posts-stacked',
					'label'					=> 'Stacked',
					'style_handle'	=> 'block-styles-stylesheet',
				)
		);
	}

	add_action( 'init', 'feelfree_register_block_styles' );
}


/**
 * Enqueue scripts and styles.
 */
function feelfree_scripts() {
	wp_enqueue_style( 'feelfree-styles', get_template_directory_uri() . '/css/style.css' );
	/* wp_enqueue_script( 'feelfree-scripts', get_template_directory_uri() . '/assets/scripts/demo3.js', [], false, true); */
}
add_action( 'wp_enqueue_scripts', 'feelfree_scripts' );
