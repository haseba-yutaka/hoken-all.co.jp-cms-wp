<?php

/*
  カスタム投稿タイプ
*/

function add_post_type_voice() {
  register_post_type('voice',
    array(
    'label'	=>	'お客さまの声',
    'labels'	=>	array(
      'name'	=>	'お客さまの声',
      'singular_name'	=>	'お客さまの声',
      'add_new_item'	=>	'投稿を追加',
      'new_item'	=>	'投稿',
      'view_item'	=>	'投稿を表示',
      'not_found'	=>	'投稿は見つかりませんでした',
      'not_found_in_trash'	=>	'ゴミ箱に投稿はありません。',
      'search_items'	=>	'投稿を検索',
    ),
    'menu_icon' => 'dashicons-edit-large',
    'description'	=>	'お客さまの声',
    'public'	=>	true,
    'show_ui'	=>	true,
    'show_in_rest'	=>	true,
    'query_var'	=>	true,
    'rewrite'	=>	array(
      'with_front'	=>	false,
      'hierarchical'	=>	false
    ),
    'hierarchical'	=>	false,
    'exclude_from_search'	=>	false,
    'supports'	=>	array(
      'title', //タイトルを有効化
      'editor', //本文を有効化
      'thumbnail', //アイキャッチを有効化
    ),
    'has_archive' => true,
    )
  );


  // カテゴリー
  // register_taxonomy(
  //   'voice_category',
  //   'voice',
  //   array(
  //     'hierarchical'	=>	true,
  //     'update_count_callback'	=>	'_update_post_term_count',
  //     'label'	=>	'カテゴリー',
  //     'singular_label'	=>	'カテゴリー',
  //     'public'	=>	true,
  //     'show_ui'	=>	true,
  //     'show_in_rest'	=>	true,
  //     'rewrite'	=>	array('slug'	=>	'voice'), //変更後のスラッグ
  //   )
  // );
  // --------------

  // // タグ
  // register_taxonomy(
  //   'voice_tag',
  //   'voice',
  //   array(
  //     'hierarchical'	=>	false,
  //     'update_count_callback'	=>	'_update_post_term_count',
  //     'label'	=>	'タグ',
  //     'singular_label'	=>	'タグ',
  //     'public'	=>	true,
  //     'show_ui'	=>	true,
  //     'show_in_rest'	=>	true,
  //     'rewrite'	=>	array('slug'	=>	'voice_tag'), //変更後のスラッグ
  //   )
  // );
  // // --------------


}
add_action('init', 'add_post_type_voice');


// function add_custom_rewrite_rules_voice_category() {
//   add_rewrite_rule('voice/([^0-9]+)/?$', 'index.php?voice_category=$matches[1]&taxonomy=voice_category', 'top');
//   add_rewrite_rule('voice/([^0-9]+)/page/([^/]+)/?$', 'index.php?voice_category=$matches[1]&taxonomy=voice_category&paged=$matches[2]', 'top');
// }
// add_action('init', 'add_custom_rewrite_rules_voice_category');


// function add_custom_rewrite_rules_voice_tag() {
//   add_rewrite_rule('voice_tag/([^0-9]+)/?$', 'index.php?voice_tag=$matches[1]&taxonomy=voice_tag', 'top');
//   add_rewrite_rule('voice_tag/([^0-9]+)/page/([^/]+)/?$', 'index.php?voice_tag=$matches[1]&taxonomy=voice_tag&paged=$matches[2]', 'top');
// }
// add_action('init', 'add_custom_rewrite_rules_voice_tag');


// // カテゴリー関連のカラムを追加する
// function add_custom_voice_columns($columns) {
//   if (get_post_type() === 'voice') {
//     $columns['voice_category'] = 'カテゴリー';
//   }
//   return $columns;
// }
// add_filter('manage_posts_columns', 'add_custom_voice_columns');

// // カラムにタームのリストを表示する
// function add_custom_voice_column_content($column_name, $post_id) {
//   switch ($column_name) {
//     case 'voice_category':
//       echo get_the_term_list($post_id, 'voice_category', '', ', ');
//       break;
//   }
// }
// add_action('manage_voice_posts_custom_column', 'add_custom_voice_column_content', 10, 2);
