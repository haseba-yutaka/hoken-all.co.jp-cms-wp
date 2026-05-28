<?php
  $ACF_field = get_field( $args['customField_button'] );
  if( $ACF_field ) : ?>
  <div class="<?= $args['className']; ?>">
    <?php while (have_rows( $args['customField_button'] )) : the_row(); ?>
      <?php
        $link = get_sub_field('link');
        $btnStyle = get_sub_field('style');
        if ($link) {
          $link_url = $link['url'];
          $link_title = $link['title'];
          $link_target = $link['target'] ?: '_self';
          $btnClasses = ["-primary", "-primary-line"];
      ?>
        <a class="-btn <?= $btnClasses[$btnStyle] ?? $btnStyle ?>" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>">
          <span><?= esc_html($link_title); ?></span>
        </a>
      <?php } ?>
    <?php endwhile; ?>
  </div>
<?php endif; ?>