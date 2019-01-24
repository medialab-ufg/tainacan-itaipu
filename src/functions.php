<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles', 99 );
function my_theme_enqueue_styles() {
	wp_dequeue_style('tainacan_tainacanStyle'); // This remove the repeat parent style

    $parent_style = 'tainacan-interface'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'itaipustyle',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

    wp_enqueue_style( 'itaipu', get_stylesheet_directory_uri() . '/assets/css/itaipu.min.css');

    wp_enqueue_script('itaipujs', get_stylesheet_directory_uri() . '/assets/js/itaipu.min.js', array('jquery'), '', true);
}

/**
 * Adiciona classes extras à lista de elementos que mudam de cor de acordo com a preferência do usuário
 * 
 */
function add_class_customize($colors) {
	return <<<CSS
	.front-page h1 { color: {$colors['tainacan_link_color']}; }
CSS;
}
add_filter('tainacan-customize-css-class', 'add_class_customize');