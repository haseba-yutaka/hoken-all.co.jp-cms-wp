<?php
  $slug = get_field('b_versatility_tableBlock01_slug');
  $width = get_field('b_versatility_tableBlock01_width');
  $width_class = '';
  switch ($width) {
    case 100:
      $width_class = 'w-full';
      break;
    case 75:
      $width_class = 'w-75';
      break;
    case 50:
      $width_class = 'w-50';
      break;
  }
  $className = isset($block['className']) ? $block['className'] : '';
?>

<section id="<?= $slug; ?>" class="<?= esc_attr($className); ?> -section-versatility_tableBlock01__inner <?= $width_class; ?>">
  <div class="table-01">
    <?php while (have_rows("b_versatility_tableBlock01")) : the_row(); ?>
      <?php if ( get_sub_field('table_th') ) : ?>
        <div class="-tr">
          <div class="-th"><?= get_sub_field('table_th'); ?></div>
          <div class="-td"><?= get_sub_field('table_td'); ?></div>
        </div>
      <?php endif; ?>
    <?php endwhile; ?>
  </div>
</section>
