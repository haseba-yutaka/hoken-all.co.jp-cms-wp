<?php
  $pulldown = get_sub_field('menuPulldown');
?>
<div class="<?= $args['classBody']; ?>">
  <?php while (have_rows('o_header_menu', 'option')) : the_row(); ?>
    <div class="<?= $args['classItem']; ?> <?php if( get_sub_field('menuPulldown') ) : ?>pulldown<?php endif; ?>">
      <?php
        $link = get_sub_field('menu')['link'];
        $text = get_sub_field('menu')['text'];
        if( $link ):
          $link_url = $link['url'];
          $link_title = $link['title'];
          $link_target = $link['target'] ? $link['target'] : '_self';
      ?>
        <a class="<?= $args['classItemLink']; ?> <?= esc_html( $text ); ?>" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
          <span>
            <span><?= esc_html( $link_title ); ?></span>
          </span>
        </a>
        <?php if( get_sub_field('menuPulldown') ) : ?>
          <div class="js-ac-head">
            <span><?= esc_html( $link_title ); ?></span>
          </div>
        <?php endif; ?>
      <?php endif; ?>
      <?php if( get_sub_field('menuPulldown') ) : ?>
        <div class="<?= $args['classPulldown']; ?> js-ac-conts">
          <!-- <a class="-pulldown-menu__link top display-block-sp" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
            <span><?= esc_html( $link_title ); ?></span>
          </a> -->
          <?php while (have_rows('menuPulldown')) : the_row(); ?>
            <?php
              $pulldown_link = get_sub_field('link');
              if( $pulldown_link ):
                $pulldown_link_url = $pulldown_link['url'];
                $pulldown_link_title = $pulldown_link['title'];
                $pulldown_link_target = $pulldown_link['target'] ? $pulldown_link['target'] : '_self';
            ?>
              <a class="-pulldown-menu__link <?= get_sub_field('class', 'option'); ?>" href="<?= esc_url( $pulldown_link_url ); ?>" target="<?= esc_attr( $pulldown_link_target ); ?>">
                <span><?= esc_html( $pulldown_link_title ); ?></span>
              </a>
            <?php endif; ?>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endwhile; ?>
</div>
<?php ctaBtn(); ?>