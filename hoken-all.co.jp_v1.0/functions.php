<?php

// アイコン フォント
// https://developer.wordpress.org/resource/dashicons/#controls-forward

function load_custom_functions() {
  $custom_funcsions_path = dirname(__FILE__);

  require_once("{$custom_funcsions_path}/functions/functions-admin.php");
  require_once("{$custom_funcsions_path}/functions/functions-option.php");

  // お知らせ
  require_once("{$custom_funcsions_path}/functions/functions-news.php");

  // お客さまの声
  require_once("{$custom_funcsions_path}/functions/functions-voice.php");

  // よくある質問
  require_once("{$custom_funcsions_path}/functions/functions-faq.php");
}
add_action('after_setup_theme', 'load_custom_functions');


// ブロックエディタの、カテゴリを追加
function add_block_categories( $categories, $custom_categories ) {
  foreach ( $custom_categories as $custom_category ) {
    $position = isset($custom_category['position']) ? $custom_category['position'] : null;
    $exists = false;
    foreach ( $categories as $key => $category ) {
      if ( $category['slug'] === $custom_category['slug'] ) {
        $categories[$key] = $custom_category;
        $exists = true;
        break;
      }
    }
    if ( ! $exists ) {
      if ($position !== null && $position >= 0 && $position < count($categories)) {
        array_splice($categories, $position, 0, array($custom_category));
      } else {
        $categories[] = $custom_category;
      }
    }
  }
  return $categories;
}

function add_custom_block_categories( $categories ) {
  $custom_categories = [
    [
      'slug' => '3df_section',
      'title' => 'オリジナルブロック',
      'icon' => '',
      'position' => 1,
    ],
    [
      'slug' => '3df_post',
      'title' => '投稿タイプ',
      'icon' => '',
      'position' => 2,
    ],
  ];
  return add_block_categories( $categories, $custom_categories );
}
add_filter( 'block_categories_all', 'add_custom_block_categories', 10, 2 );
// --------------------------------------------------------


// 参考サイト
// https://web-children.com/2022/08/24/indtroduction-of-supports-in-block-json/
function register_acf_blocks() {
  register_block_type( __DIR__ . '/_section/flow/01/' );
  register_block_type( __DIR__ . '/_section/feature/01/' );
  register_block_type( __DIR__ . '/_section/versatility/text-block-01/' );
  register_block_type( __DIR__ . '/_section/versatility/head-block-01/' );
  register_block_type( __DIR__ . '/_section/versatility/table-block-01/' );

  // register_block_type( __DIR__ . '/_section/news/' );
  // register_block_type( __DIR__ . '/_section/faq/' );

  register_block_type( __DIR__ . '/_section/blogcard/' );
}
add_action( 'init', 'register_acf_blocks' );
