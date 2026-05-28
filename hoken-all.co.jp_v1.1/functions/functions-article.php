<?php
/**
 * Functions - Article
 *
 * メディア記事の登録
 *
 * @package WordPress
 * @since   1.0.0
 */

/**
 * カスタム投稿タイプ
 */
function add_post_type_article() {
	register_post_type(
		'article',
		array(
			'label'               => 'メディア記事',
			'labels'              => array(
				'name'               => 'メディア記事',
				'singular_name'      => 'メディア記事',
				'add_new_item'       => 'メディア記事を追加',
				'new_item'           => 'メディア記事',
				'view_item'          => 'メディア記事を表示',
				'not_found'          => 'メディア記事は見つかりませんでした',
				'not_found_in_trash' => 'ゴミ箱にメディア記事はありません。',
				'search_items'       => 'メディア記事を検索',
			),
			'menu_icon'           => 'dashicons-edit-large',
			'description'         => 'メディア記事',
			'public'              => true,
			'show_ui'             => true,
			'show_in_rest'        => true,
			'query_var'           => true,
			'rewrite'             => array(
				'with_front'   => false,
				'hierarchical' => false,
			),
			'hierarchical'        => false,
			'exclude_from_search' => false,
			'supports'            => array(
				'title',
				'editor',
				'revisions',
				'author',
				'excerpt',
				'thumbnail',
			),
			'has_archive'         => true,
		)
	);

	/** カテゴリー */
	register_taxonomy(
		'article_category',
		'article',
		array(
			'hierarchical'   => true,
			'label'          => 'カテゴリー',
			'singular_label' => 'カテゴリー',
			'public'         => true,
			'show_ui'        => true,
			'show_in_rest'   => true,
			'rewrite'        => array(
				'slug'         => 'article',
				'hierarchical' => true,
			),
		)
	);
}
add_action( 'init', 'add_post_type_article' );

/**
 * カスタム投稿のパーマリンク設定
 */

add_filter( 'post_type_link', 'generate_custom_post_link', 1, 2 );

/**
 * パーマリンク変更
 *
 * @param string $link リンク.
 * @param array  $post 投稿内容.
 */
function generate_custom_post_link( $link, $post ) {
	if ( 'article' === $post->post_type ) {
		/** 投稿IDに書き換えたパーマリンク文字列を返す */
		return home_url( '/article-' . $post->ID . '/' );
	} else {
		return $link;
	}
}

/**
 * クエリールールの追加
 */
function add_custom_rewrite_rules_article() {
	add_rewrite_rule( 'article-([0-9]+)/?$', 'index.php?post_type=article&p=$matches[1]', 'top' );
	add_rewrite_rule( 'article/([^/]+)/?$', 'index.php?article_category=$matches[1]', 'top' );
	add_rewrite_rule( 'article/([^/]+)/page/([0-9]+)/?$', 'index.php?article_category=$matches[1]&paged=$matches[2]', 'top' );
}
add_action( 'init', 'add_custom_rewrite_rules_article' );

/**
 * CSS/JSの登録
 */
function add_article_files() {
	$my_theme = wp_get_theme();
	if ( is_singular( 'article' ) ) {
		wp_enqueue_style( 'article-style', get_stylesheet_directory_uri() . '/assets/article/style.css', array(), $my_theme->get( 'Version' ) );
		wp_enqueue_script( 'article-script', get_stylesheet_directory_uri() . '/assets/article/scripts/diver.min.js', array(), $my_theme->get( 'Version' ), true );
		wp_enqueue_script( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array( 'jquery' ), 1.9, true );
	}
}
add_action( 'wp_enqueue_scripts', 'add_article_files' );

/**
 * Classic Editorの設定
 */
add_filter(
	'use_block_editor_for_post',
	function( $use_block_editor, $post ) {
		if ( 'article' === $post->post_type ) {
			$use_block_editor = false;
		}
		return $use_block_editor;
	},
	10,
	2
);

/**
 * Classic Editorの設定
 */
function add_my_editor_style() {

	global $post;
	add_theme_support( 'editor-styles' );

	if ( $post && 'article' === $post->post_type ) {
			add_editor_style( 'assets/article/style-editor.css' );
			return;
	}
};
add_action( 'pre_get_posts', 'add_my_editor_style' );
