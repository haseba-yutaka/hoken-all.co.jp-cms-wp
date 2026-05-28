<?php
  $image = get_field('b_blogcard_image');
  $title = get_field('b_blogcard_title');
  $description = get_field('b_blogcard_description');
  $link = get_field('b_blogcard_link');
  $className = isset($block['className']) ? $block['className'] : '';
?>

<div class="<?= esc_attr($className); ?> -blogcard">
  <a class="-blogcard-link" href="<?= $link['link'] ?>" <?php if( $link['linkTab'] == 1 ) : ?>target='_blank'<?php endif;?>></a>
  <div class="-blogcard-columns">
    <div class="-blogcard-column__image-container">
      <div class="-blogcard-column__image-wrap">
        <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
      </div>
    </div>
    <div class="-blogcard-column__meta">
      <?php if( $title ) : ?>
        <div class="-blogcard-column__meta-title"><?= $title ?></div>
      <?php endif; ?>
      <?php if( $description ) : ?>
        <div class="-blogcard-column__meta-description"><?= $description ?></div>
      <?php endif; ?>
      <div class="-blogcard-column__meta-url"><?= $link['link'] ?></div>
    </div>
  </div>
</div>