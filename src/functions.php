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
	.front-page h1, .tainacan-single-post article .tainacan-content h1 { color: {$colors['tainacan_link_color']}; }
CSS;
}
add_filter('tainacan-customize-css-class', 'add_class_customize');


/** Post type destaque home */
add_action('init', 'mai_destaque_post_type' );
add_action('add_meta_boxes', 'mai_add_custom_box');
add_action('save_post', 'mai_save_custom_box');

function mai_destaque_post_type() {
    $POST_TYPE_NAME_PLURAL = "Destaques";
    $POST_TYPE_NAME_SINGULAR = "Destaque";

    $post_type_labels = array(
        'edit_item' => 'Editar',
        'add_new' => 'Adicionar Novo',
        'search_items' => 'Pesquisar',
        'name' => $POST_TYPE_NAME_PLURAL,
        'menu_name' => $POST_TYPE_NAME_PLURAL,
        'singular_name' => $POST_TYPE_NAME_SINGULAR,
        'new_item' => 'Novo ' . $POST_TYPE_NAME_PLURAL,
        'view_item' => 'Visualizar ' . $POST_TYPE_NAME_PLURAL,
        'add_new_item' =>'Adicionar ' . $POST_TYPE_NAME_PLURAL,
        'parent_item_colon' => $POST_TYPE_NAME_PLURAL . ' acima:',
        'not_found' => 'Nenhum ' . $POST_TYPE_NAME_PLURAL . ' encontrado',
        'not_found_in_trash' => 'Nenhum ' . $POST_TYPE_NAME_PLURAL . ' encontrado na lixeira'
    );
    $post_type_args = array(
        'labels' => $post_type_labels,
        'public' => true,
        'show_ui' => true,
        'rewrite' => true,
        'query_var' => true,
        'can_export' => true,
        'has_archive' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'supports' => array(
            'title','editor','thumbnail','page-attributes'
        ),
    );

    register_post_type("destaque-home", $post_type_args);
}

function mai_add_custom_box() {
    add_meta_box('destaque_url',__('Informações'),
                'destaque_home_custom_box', "destaque-home", 'advanced', 'high');
}

function mai_save_custom_box($post_id) {
    global $post; 
    if ($post && $post->post_type != "destaque-home") {
        return $post_id;
    }
    save_destaque_home_custom_box($post_id);
}

function destaque_home_custom_box() {
    global $post;
    $nonce = wp_create_nonce(__FILE__);
    $destaqueurl = get_post_meta($post->ID, 'destaque-url', true);

    require_once dirname( __FILE__ ) . '/inc/destaque_home/metabox-destaque-home.php' ;
}

function save_destaque_home_custom_box($post_id) {
    if (empty($_POST)) {
        return $post_id;
    }
    // Verifica o nonce
    if (!wp_verify_nonce($_POST['destaque_custom_box'], __FILE__)) {
        return $post_id;
    }
    // Não pode editar o Destaque?
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    $fields = array('url');
    $data = $_POST['destaque'];
    foreach ($data AS $field => $value) {
        if (!in_array($field, $fields)) {
            continue;
        }
        update_post_meta($post_id, 'destaque-' . $field, $value);
    }
}


/** Front Page */

add_action( 'add_meta_boxes', 'informacoes_front_meta_boxes' );
function informacoes_front_meta_boxes() {
    global $post;
    if(!empty($post)) :
        $pageTitle = get_the_title($post->ID);
        if($pageTitle == 'Planeje sua Visita' ) :
            add_meta_box( 'informacaos', 'Informações', 'informacoes_front_display_callback', 'page' );
        endif;
    endif;
}

function informacoes_front_display_callback() {
    global $post;
    $nonce = wp_create_nonce(__FILE__);
    $telefone_front = get_post_meta($post->ID, 'informacoes-front-telefone', true);
    $endereco_front = get_post_meta($post->ID, 'informacoes-front-endereco', true);
    $cep_front = get_post_meta($post->ID, 'informacoes-front-cep', true);
    $facebook_front = get_post_meta($post->ID, 'informacoes-front-facebook', true);

    require_once dirname( __FILE__ ) . '/inc/infomacoes-front/metabox-infomacoes-front.php' ;
}

add_action('save_post', 'informacoes_front_save_custom_box',10,1);
function informacoes_front_save_custom_box($post_id) {
    global $post; 
    $pageTitle = get_the_title($post->ID);
    
    if ($post && $post->ID != $post_id) {
        return $post_id;
    }
    save_informacoes_front_custom_box($post_id);
}

function save_informacoes_front_custom_box($post_id) {
    if (empty($_POST)) {
        return $post_id;
    }

    // Verifica o nonce
    if (!wp_verify_nonce($_POST['informacoes_front_custom_box'], __FILE__)) {
        return $post_id;
    }
    // Não pode editar?
    if (!current_user_can('edit_page', $post_id)) {
        return $post_id;
    }
    $fields = array('telefone', 'endereco', 'cep', 'facebook');
    $data = $_POST['informacoes'];
    foreach ($data AS $field => $value) {
        if (!in_array($field, $fields)) {
            continue;
        }
        update_post_meta($post_id, 'informacoes-front-' . $field, $value);
    }
}

function get_images_to_front_grid() {
    $images = [
        '1' => [
            'name' => 'CAMS-001_2',
            'link' => get_permalink(12094)
        ],
        '2' => [
            'name' => 'CAMS-014_2',
            'link' => get_permalink(12174)
        ],
        '3' => [
            'name' => 'JC-18-209_3',
            'link' => get_permalink(16750)
        ],
        '4' => [
            'name' => 'JC-18-413_1',
            'link' => get_permalink(18368)
        ],
        '5' => [
            'name' => 'JC-18-960-Duplicado_2',
            'link' => get_permalink(18024)
        ],
        '6' => [
            'name' => 'PST-001_1',
            'link' => get_permalink(11998)
        ],
        '7' => [
            'name' => 'RMN-103_1',
            'link' => get_permalink(19652)
        ],
        '8' => [
            'name' => 'RPR-6_1',
            'link' => get_permalink(12046)
        ],
        '9' => [
            'name' => 'TMT-02_1',
            'link' => get_permalink(12080)
        ]
    ];

    return $images;
}