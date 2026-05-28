<?php

/*
  カスタム投稿タイプ
*/

function add_post_type_faq() {
  register_post_type('faq',
    array(
    'label'	=>	'よくある質問',
    'labels'	=>	array(
      'name'	=>	'よくある質問',
      'singular_name'	=>	'よくある質問',
      'add_new_item'	=>	'投稿を追加',
      'new_item'	=>	'投稿',
      'view_item'	=>	'投稿を表示',
      'not_found'	=>	'投稿は見つかりませんでした',
      'not_found_in_trash'	=>	'ゴミ箱に投稿はありません。',
      'search_items'	=>	'投稿を検索',
    ),
    'menu_icon' => 'dashicons-testimonial',
    'description'	=>	'よくある質問',
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
  register_taxonomy(
    'faq_category',
    'faq',
    array(
      'hierarchical'	=>	true,
      'update_count_callback'	=>	'_update_post_term_count',
      'label'	=>	'カテゴリー',
      'singular_label'	=>	'カテゴリー',
      'public'	=>	true,
      'show_ui'	=>	true,
      'show_in_rest'	=>	true,
      'rewrite'	=>	array('slug'	=>	'faq'), //変更後のスラッグ
    )
  );
  // --------------

  // // タグ
  // register_taxonomy(
  //   'faq_tag',
  //   'faq',
  //   array(
  //     'hierarchical'	=>	false,
  //     'update_count_callback'	=>	'_update_post_term_count',
  //     'label'	=>	'タグ',
  //     'singular_label'	=>	'タグ',
  //     'public'	=>	true,
  //     'show_ui'	=>	true,
  //     'show_in_rest'	=>	true,
  //     'rewrite'	=>	array('slug'	=>	'faq_tag'), //変更後のスラッグ
  //   )
  // );
  // // --------------


}
add_action('init', 'add_post_type_faq');


function add_custom_rewrite_rules_faq_category() {
  add_rewrite_rule('faq/([^0-9]+)/?$', 'index.php?faq_category=$matches[1]&taxonomy=faq_category', 'top');
  add_rewrite_rule('faq/([^0-9]+)/page/([^/]+)/?$', 'index.php?faq_category=$matches[1]&taxonomy=faq_category&paged=$matches[2]', 'top');
}
add_action('init', 'add_custom_rewrite_rules_faq_category');


// function add_custom_rewrite_rules_faq_tag() {
//   add_rewrite_rule('faq_tag/([^0-9]+)/?$', 'index.php?faq_tag=$matches[1]&taxonomy=faq_tag', 'top');
//   add_rewrite_rule('faq_tag/([^0-9]+)/page/([^/]+)/?$', 'index.php?faq_tag=$matches[1]&taxonomy=faq_tag&paged=$matches[2]', 'top');
// }
// add_action('init', 'add_custom_rewrite_rules_faq_tag');



// カテゴリーカラムを追加する
function add_custom_faq_column($column) {
  global $post_type;
  if ($post_type === 'faq') {
    $column['faq_category'] = 'カテゴリー';
  }
  return $column;
}
add_filter('manage_posts_columns', 'add_custom_faq_column');

// カテゴリー名を表示する
function add_custom_faq_column_id($column_name, $id) {
  if ($column_name === 'faq_category') {
    echo get_the_term_list($id, 'faq_category', '', ', ');
  }
}
add_action('manage_faq_posts_custom_column', 'add_custom_faq_column_id', 10, 2);
