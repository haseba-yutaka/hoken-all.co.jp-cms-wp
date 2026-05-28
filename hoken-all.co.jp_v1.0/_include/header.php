<?php
  session_start();
  get_template_part('_include/function-molecule');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_template_part('_include/head'); ?>
<body <?php bodyAddClass(); ?>>
	
<header role="banner" class="js-header">
  <div class="-header-main">
    <div class="-header-main__logo">
      <a class="-logo" href="<?= home_url(); ?>/">
        <img class="-logo-main" src="<?= get_theme_root_uri(); ?>/global-assets/img/common/logo-main.svg" alt="<?= bloginfo('name'); ?>" loading="lazy">
        <img class="-logo-white" src="<?= get_theme_root_uri(); ?>/global-assets/img/common/logo-white.svg" alt="<?= bloginfo('name'); ?>" loading="lazy">
      </a>
    </div>
    <div class="-header-main__inner">
      <?php
        $args = [
          'classBody' => '-header-nav',
          'classPulldown' => '-pulldown-menu',
          'classItem' => '-header-nav__item',
          'classItemLink' => '-header-nav__item-link',
        ];
        get_template_part('_include/inc-menu', null, $args);
      ?>
    </div>
    <div class="-btn-burger">
      <div class="-inner">
        <div class="bar topBar"></div>
        <div class="bar btmBar"></div>
      </div>
    </div>
  </div>
</header>

<div class="-sp-header-body">
  <?php
    $args = [
      'classBody' => '-header-sp-nav',
      'classPulldown' => '-sp-item__body',
      'classItem' => '-sp-item',
      'classItemLink' => '-sp-item__head',
    ];
    get_template_part('_include/inc-menu', null, $args);
  ?>
</div>
<div class="header-height"></div>

<main role="main" class="js-main">