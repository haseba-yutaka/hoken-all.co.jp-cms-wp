<?php
  $className = isset($block['className']) ? $block['className'] : '';
  $text = get_field('o_cta1_text', 'option');
  $checklist = get_field('o_cta1_checklist', 'option');
  $bannerTel = get_field('o_cta1_banner_tel', 'option');
  $bannerContact = get_field('o_cta1_banner_contact', 'option');
?>
<section id="cta" class="<?= esc_attr($className); ?> -sectionBlock-cta">
  <div class="-sectionBlock-cta__inner">
    <header class="-sectionBlock-cta__header">
      <?php if( $text['label'] ) : ?>
        <div class="-label">
          <?= $text['label'] ?>
        </div>
      <?php endif; ?>
      <?php if( $text['title'] ) : ?>
        <h2 class="-title">
          <?= $text['title'] ?>
        </h2>
      <?php endif; ?>
      <?php if( $text['description'] ) : ?>
        <div class="-description">
          <?= $text['description'] ?>
        </div>
      <?php endif; ?>
    </header>
    <?php if( $checklist ) : ?>
      <ul class="-sectionBlock-cta__checklist">
        <?= $checklist ?>
      </ul>
    <?php endif; ?>
    <div class="-sectionBlock-cta__btn">
      <a class="-btn-tel" href="tel:<?= $bannerTel['tel'] ?>">
        <div class="-inner">
          <div class="-tel">
            <i>
              <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M8.28119 16.1822C11.1843 19.0849 14.72 21.325 17.6026 21.325C18.8986 21.325 20.0335 20.8729 20.9476 19.8683C21.4799 19.2756 21.8116 18.5826 21.8116 17.8999C21.8116 17.3976 21.6205 16.9154 21.1388 16.5739L18.0646 14.3839C17.5928 14.0624 17.201 13.9017 16.8393 13.9017C16.3773 13.9017 15.9753 14.1632 15.5133 14.6149L14.8002 15.3182C14.6994 15.4201 14.5622 15.4779 14.4188 15.4789C14.258 15.4789 14.117 15.4189 14.0069 15.3683C13.394 15.037 12.3295 14.1229 11.3348 13.1384C10.3503 12.154 9.43619 11.0894 9.11476 10.4667C9.04538 10.3439 9.00754 10.2058 9.00462 10.0647C9.00462 9.93445 9.04448 9.8033 9.15505 9.69316L9.8579 8.9603C10.3105 8.49787 10.5715 8.09587 10.5715 7.63387C10.5715 7.27259 10.4108 6.88087 10.0795 6.40859L7.91948 3.36488C7.56805 2.88273 7.07605 2.67188 6.53348 2.67188C5.87048 2.67188 5.17748 2.97316 4.59505 3.54616C3.62048 4.48045 3.18848 5.63502 3.18848 6.91045C3.18848 9.79345 5.38833 13.2893 8.28119 16.1822Z" fill="#15378E"/>
              </svg>
            </i>
            <div class="-tel-info">
              <b><?= $bannerTel['tel'] ?></b>
              <?php if( $bannerTel['info'] ) : ?>
                <span><?= $bannerTel['info'] ?></span>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="-label-btn"><?= $bannerTel['label'] ?></div>
      </a>
      <?php
        $link = $bannerContact['link'];
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
      ?>
      <a class="-btn-contact" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
        <img class="-image" src="<?= assetsPath('img') ?>/common/cta-contact-image.webp" alt="" loading="lazy">
        <div class="-inner">
          <?php if( $bannerContact['info'] ) : ?>
            <p class="-info-text">
              <?= $bannerContact['info'] ?>
            </p>
          <?php endif; ?>
        </div>
        <div class="-label-btn">
          <span><?= esc_html( $link_title ); ?></span>
        </div>
      </a>
    </div>
    <div class="-sectionBlock-cta__company" >
      <a class="-btn-contact" href="https://company.hoken-all.co.jp/" target="_blank">
        <div class="-inner">
            <p class="-info-text">
            ほけんのぜんぶ<br>
            企業様向けのサイトはこちら<br>

            </p>
        </div>
        <div class="-label-btn">
          <span>サイトを確認する</span>
        </div>
      </a>
    </div>
  </div>
</section>