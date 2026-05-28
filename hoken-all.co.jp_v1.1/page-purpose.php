<?php
/*
template Name: 目的から探す（/purpose/）
*/
?>

<?php get_template_part('_include/header'); ?>

<?php lowerHead('', ''); ?>

<style>
  .-purpose-container {
    border: none;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 80px 0;
    background: none;
  }
  .-purpose-tabs {
    display: none;
  }
  .-purpose-section {
    display: block;
  }
  .-purpose-section__header {
    display: none;
  }
</style>

<?php
  $args = [
    'className' => '',
  ];
  get_template_part('_include/inc-section@purpose', null, $args);
?>

<?php
  $args = [
    'className' => 'mt0',
  ];
  get_template_part('_include/footer', null, $args);
?>