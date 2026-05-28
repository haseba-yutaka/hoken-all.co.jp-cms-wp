<?php

/**
 * Template Name: お問合せ（分岐）
 */
?>

<?php get_template_part('_include/header'); ?>

<div class="-section-headLower">
  <div class="-section-headLower-inner -section-inner">
    <h1 class="-head-title" data-text-en="<?= $slug = $post->post_name; ?>">
      <span><?php the_title(); ?></span>
    </h1>
  </div>
</div>

<div class="-section-inner mt8 mb8">
  <div class="-single-content">
    <p class="type_ttl">どちらのお問合せですか？</p>
    <div class="-sectionBlock-cta__btn mt4">
      <a class="-btn-contact" href="https://company.hoken-all.co.jp/contact/life" target="_blank">
        <div class="-inner">
          <p class="-info-text type_link">
            <strong>相談中のお客様はこちら</strong>
          </p>
        </div>
        <div class="-label-btn">
          <span>ご予約中・相談中のお客様はこちら</span>
        </div>
      </a>
      <a class="-btn-contact" href="https://company.hoken-all.co.jp/contact/support" target="_blank">
        <div class="-inner">
          <p class="-info-text type_link">
            <strong>既契約のお客様はこちら</strong>
          </p>
        </div>
        <div class="-label-btn">
          <span>ご契約後のサポート窓口</span>
        </div>
      </a>
    </div>
  </div>
</div>

<?php
$args = [
  'className' => '',
];
get_template_part('_include/footer', null, $args);
?>