<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">
  <title><?php siteTitle(); ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/yakuhanjp@4.0.0/dist/css/yakuhanjp.min.css">
  <?php $googleFont = "https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Poppins:wght@400;600&display=swap"; ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" href="<?= $googleFont; ?>" as="style">
  <link href="<?= $googleFont; ?>" rel="stylesheet" media="print" onload="this.media='all'">
  <link rel="stylesheet" href="<?= get_theme_root_uri(); ?>/global-assets/css/root.css">
  <link rel="stylesheet" href="<?= get_theme_root_uri(); ?>/global-assets/css/reset.css">
  <link rel="stylesheet" href="<?= get_theme_root_uri(); ?>/global-assets/css/common.css">
  <link rel="stylesheet" href="<?= assetsPath('css') ?>/style.css?<?= mt_rand(1, 100); ?>">
  <?php if ( is_front_page() || is_home() || is_page('index') ) : ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
  <?php endif; ?>
  <?php if (is_page('test-form')) : ?>
    <link rel="stylesheet" href="<?= get_theme_root_uri(); ?>/global-assets/css/form-pc.css" media="screen and (min-width:768px)">
    <link rel="stylesheet" href="<?= get_theme_root_uri(); ?>/global-assets/css/form-sp.css" media="screen and (max-width:767px)">
    <link rel="stylesheet" href="<?= get_theme_root_uri(); ?>/global-assets/css/form-modal.css" />
  <?php endif; ?>
  <?php
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), '3.7.1');
    wp_head();
  ?>
<?php if ( is_front_page() || is_home() || is_page('index') ) : ?>
    <!-- モーダル追加 -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal-default-theme.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal.min.js"></script>
<?php endif; ?>    
</head>