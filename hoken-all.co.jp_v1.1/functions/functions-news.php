<?php

/*
  カスタム投稿タイプ
*/

function add_post_type_news() {
  register_post_type('news',
    array(
    'label'	=>	'ニュース',
    'labels'	=>	array(
      'name'	=>	'ニュース',
      'singular_name'	=>	'ニュース',
      'add_new_item'	=>	'投稿を追加',
      'new_item'	=>	'投稿',
      'view_item'	=>	'投稿を表示',
      'not_found'	=>	'投稿は見つかりませんでした',
      'not_found_in_trash'	=>	'ゴミ箱に投稿はありません。',
      'search_items'	=>	'投稿を検索',
    ),
    'menu_icon' => 'dashicons-edit-large',
    'description'	=>	'ニュース',
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
    'news_category',
    'news',
    array(
      'hierarchical'	=>	true,
      'update_count_callback'	=>	'_update_post_term_count',
      'label'	=>	'カテゴリー',
      'singular_label'	=>	'カテゴリー',
      'public'	=>	true,
      'show_ui'	=>	true,
      'show_in_rest'	=>	true,
      'rewrite'	=>	array('slug'	=>	'news'), //変更後のスラッグ
    )
  );
  // --------------

  // // タグ
  // register_taxonomy(
  //   'news_tag',
  //   'news',
  //   array(
  //     'hierarchical'	=>	false,
  //     'update_count_callback'	=>	'_update_post_term_count',
  //     'label'	=>	'タグ',
  //     'singular_label'	=>	'タグ',
  //     'public'	=>	true,
  //     'show_ui'	=>	true,
  //     'show_in_rest'	=>	true,
  //     'rewrite'	=>	array('slug'	=>	'news_tag'), //変更後のスラッグ
  //   )
  // );
  // // --------------


}
add_action('init', 'add_post_type_news');


function add_custom_rewrite_rules_news_category() {
  add_rewrite_rule('news/([^0-9]+)/?$', 'index.php?news_category=$matches[1]&taxonomy=news_category', 'top');
  add_rewrite_rule('news/([^0-9]+)/page/([^/]+)/?$', 'index.php?news_category=$matches[1]&taxonomy=news_category&paged=$matches[2]', 'top');
}
add_action('init', 'add_custom_rewrite_rules_news_category');

function add_custom_date_archive_rewrite_rules() {
  add_rewrite_rule(
      '^news/([0-9]{4})/([0-9]{1,2})/?$', // 正規表現で年と月をマッチ
      'index.php?post_type=news&year=$matches[1]&monthnum=$matches[2]', // クエリを指定
      'top'
  );
}
add_action('init', 'add_custom_date_archive_rewrite_rules');



// function add_custom_rewrite_rules_news_tag() {
//   add_rewrite_rule('news_tag/([^0-9]+)/?$', 'index.php?news_tag=$matches[1]&taxonomy=news_tag', 'top');
//   add_rewrite_rule('news_tag/([^0-9]+)/page/([^/]+)/?$', 'index.php?news_tag=$matches[1]&taxonomy=news_tag&paged=$matches[2]', 'top');
// }
// add_action('init', 'add_custom_rewrite_rules_news_tag');


// カテゴリー関連のカラムを追加する
function add_custom_news_columns($columns) {
  if (get_post_type() === 'news') {
    $columns['news_category'] = 'カテゴリー';
    // $columns['news_industry_category'] = '業種カテゴリー';
    // $columns['news_scale_category'] = '規模カテゴリー';
  }
  return $columns;
}
add_filter('manage_posts_columns', 'add_custom_news_columns');

// カラムにタームのリストを表示する
function add_custom_news_column_content($column_name, $post_id) {
  switch ($column_name) {
    case 'news_category':
      echo get_the_term_list($post_id, 'news_category', '', ', ');
      break;
    // case 'news_industry_category':
    //   echo get_the_term_list($post_id, 'news_industry_category', '', ', ');
    //   break;
    // case 'news_scale_category':
    //   echo get_the_term_list($post_id, 'news_scale_category', '', ', ');
    //   break;
  }
}
add_action('manage_news_posts_custom_column', 'add_custom_news_column_content', 10, 2);
