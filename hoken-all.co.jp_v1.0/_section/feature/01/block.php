<?php
  $layout = get_field('b_features_layout');
  $layoutClasses = ["text-image", "row3", "row4", "row5" ];
  $className = isset($block['className']) ? $block['className'] : '';
?>

<section id="feature" class="
  <?= esc_attr($className); ?>
  -section-main
  -section-feature
  <?php
    $args = [
      'customField_bgColor' => 'b_features_bg_color',
      'customField_padding' => 'b_features_padding',
    ];
    get_template_part('_section/_sectionStyle', null, $args);
  ?>
  ">
  <div class="-section-inner -section-features__inner">
    <?php
      $args = [
        'className' => '',
        'customField_Head' => 'b_features_head',
      ];
      get_template_part('_section/_sectionHead', null, $args);
    ?>
    <div>
      <div class="-block-features-list <?= $layoutClasses[$layout] ?? $layout ?>">
        <?php while (have_rows('b_features_list')) : the_row(); ?>
          <?php
            $image = get_sub_field('image');
            $imageLayout = get_sub_field('image_layout');
            $text = get_sub_field('info');
            $link = $text['info_button'];

            $imageLayoutClasses = ["image-full", "image-center", "image-icon"];
          ?>
          <div class="-block-features-item">
            <?php if ($image && isset($image['url'], $image['alt'])): ?>
              <figure class="-features-image <?= $imageLayoutClasses[$imageLayout] ?? '' ?>">
                <img src="<?= esc_url($image['url']) ?>" alt="<?= esc_attr($image['alt']) ?>" loading="lazy">
              </figure>
            <?php endif; ?>
            <div class="-features-body">
              <h3 class="-title">
                <?= $text['info_title']; ?>
              </h3>
              <div class="-info-inner">
                <div class="-description">
                  <?= $text['info_description']; ?>
                </div>
                <?php if( $link ): ?>
                  <div class="-btn-row">
                    <?php
                      $link_url = $link['url'];
                      $link_title = $link['title'];
                      $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="-btn -primary-line -full" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                      <span><?= esc_html( $link_title ); ?></span>
                    </a>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>

      <?php if( get_field('b_features_button')) : ?>
        <div class="-btn-row mt6">
          <?php while (have_rows('b_features_button')) : the_row(); ?>
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
    </div>
  </div>
</section>
