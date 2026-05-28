<?php get_template_part('_include/header'); ?>

<?php
  $width = get_field('p_commonWidthSwitch');
  $css = get_field('p_commonStyleSwitch');
  $cssInjs = get_field('p_commonStyle');
?>

<?php
  if( $cssInjs ) :
    echo $cssInjs;
  endif;
?>

<div class="-section-headLower">
  <div class="-section-headLower-inner -section-inner">
    <h1 class="-head-title" data-text-en="<?= $slug = $post->post_name; ?>">
      <span><?= the_title(); ?></span>
    </h1>
  </div>
</div>

<div class="<?php if( $width == 0 ) : ?>-section-inner <?php endif; ?> mt8">
  <div>
    <div class="<?php if( $css == 0 ) : ?>-single-content <?php endif; ?>">
      <?php the_content(); ?>
    </div>
  </div>
</div>

<?php
  $args = [
    'className' => '',
  ];
  get_template_part('_include/footer', null, $args);
?>