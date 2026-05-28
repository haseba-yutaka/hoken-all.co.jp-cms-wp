<?php
  $layout = get_field('b_versatility_textBlock01_layout');
  $className = isset($block['className']) ? $block['className'] : '';
?>
<section id="<?= $textHead['en'] ?>" class="
  <?= esc_attr($className); ?>
  -section-main
  <?php
    $args = [
      'customField_bgColor' => 'b_versatility_textBlock01_bg_color',
      'customField_padding' => 'b_versatility_textBlock01_padding',
    ];
    get_template_part('_section/_sectionStyle', null, $args);
  ?>
  ">
  <div class="-section-inner -section-versatility_textBlock01__inner">
    <?php
      $args = [
        'className' => '',
        'customField_Head' => 'b_versatility_textBlock01_head',
      ];
      get_template_part('_section/_sectionHead', null, $args);
    ?>
    <?php if( get_field('b_versatility_textBlock01_button')) : ?>
      <div class="-section-main__body mt5">
        <div class="-btn-row">
          <?php while (have_rows('b_versatility_textBlock01_button')) : the_row(); ?>
            <?php
              $link = get_sub_field('link');
              $btnStyle = get_sub_field('style');
              if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="-btn
            <?php
              if ( $btnStyle == '0' ) {
                echo "-primary";
              } elseif ( $btnStyle == '1' ) {
                echo "-primary-line";
              } else {
                echo $btnStyle;
              }
            ?>" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
              <span><?= esc_html( $link_title ); ?></span>
            </a>
            <?php endif; ?>
          <?php endwhile; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
