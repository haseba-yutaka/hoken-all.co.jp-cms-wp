<?php get_template_part('_include/header'); ?>

<?php
  if (have_posts()) :
    while (have_posts()) : the_post();

      // お知らせ
      if( is_singular('news') ) {
        get_template_part('_template-single/news');
      }

    endwhile;
  endif;
?>

<?php
  $args = [
    'className' => 'mt10',
  ];
  get_template_part('_include/footer', null, $args);
?>