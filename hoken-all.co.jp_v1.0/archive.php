<?php get_template_part('_include/header'); ?>

<?php

  // お知らせ
  if( is_post_type_archive('news') ) {
    get_template_part('_template-archive/news');
  } elseif ( is_tax('news_category') ) {
    get_template_part('_template-archive/news');
  } elseif ( is_tax('news_tag') ) {
    get_template_part('_template-archive/news');
  }
  else {}

  // お客さまの声
  if( is_post_type_archive('voice') ) {
    get_template_part('_template-archive/voice');
  }

  // よくある質問
  if( is_post_type_archive('faq') ) {
    get_template_part('_template-archive/faq');
  }
?>

<?php
  $args = [
    'className' => '',
  ];
  get_template_part('_include/footer', null, $args);
?>