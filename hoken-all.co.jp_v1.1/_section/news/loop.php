<div class="-item-news">
  <a class="-item-news__link" href="<?= the_permalink(); ?>">
    <div class="-item-news__info">
      <time class="-time" datetime="<?= the_date('Y-m-d'); ?>">
        <?= get_the_date('Y/m/d'); ?>
      </time>
      <div class="-category">
        <?php
          $current_post_id = get_the_ID();
          terms_category($current_post_id, 'news_category');
        ?>
      </div>
    </div>
    <div class="-item-news__title">
      <?= the_title(''); ?>
    </div>
  </a>
</div>