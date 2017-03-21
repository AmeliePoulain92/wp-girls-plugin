<?php
/**
 * Creating custom post type
**/
function girls_plugin_setup_post_type() {

	$labels = array(
		'name'                => _x( 'Девушки', 'Post Type General Name', 'twentythirteen' ),
		'singular_name'       => _x( 'Девушка', 'Post Type Singular Name', 'twentythirteen' ),
		'menu_name'           => __( 'Девушки', 'twentythirteen' ),
		'parent_item_colon'   => __( 'Родительская Девушка', 'twentythirteen' ),
		'all_items'           => __( 'Все Девушки', 'twentythirteen' ),
		'view_item'           => __( 'Посмотреть Девушку', 'twentythirteen' ),
		'add_new_item'        => __( 'Добавить Новую Девушку', 'twentythirteen' ),
		'add_new'             => __( 'Добавить Новую', 'twentythirteen' ),
		'edit_item'           => __( 'Изменить Девушку', 'twentythirteen' ),
		'update_item'         => __( 'Обновить Девушку', 'twentythirteen' ),
		'search_items'        => __( 'Искать Девушку', 'twentythirteen' ),
		'not_found'           => __( 'Не найдено', 'twentythirteen' ),
		'not_found_in_trash'  => __( 'Не найдено в корзине', 'twentythirteen' ),
	);
	
	$args = array(
		'label'               => __( 'girls', 'twentythirteen' ),
		'description'         => __( 'Наши девушки', 'twentythirteen' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ), 
		'taxonomies'          => array( 'сharacter' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_icon'           => 'dashicons-heart',
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	register_post_type( 'girls', $args );
}

add_action( 'init', 'girls_plugin_setup_post_type', 0 );

/**
 * Creating taxonomy
**/
function girls_plugin_setup_character_taxonomy() {

	$labels = array(
		'name'              => _x( 'Характер', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Характер', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Искать Характер', 'textdomain' ),
		'all_items'         => __( 'Все Характеры', 'textdomain' ),
		'parent_item'       => __( 'Родительский Характер', 'textdomain' ),
		'parent_item_colon' => __( 'Родительский Характер:', 'textdomain' ),
		'edit_item'         => __( 'Изменить Характер', 'textdomain' ),
		'update_item'       => __( 'Обновить Характер', 'textdomain' ),
		'add_new_item'      => __( 'Добавить Новый Характер', 'textdomain' ),
		'new_item_name'     => __( 'Новое Имя Характера', 'textdomain' ),
		'menu_name'         => __( 'Характер', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'character' ),
	);

	register_taxonomy( 'character', array( 'girls' ), $args );
}

add_action( 'init', 'girls_plugin_setup_character_taxonomy', 0 );