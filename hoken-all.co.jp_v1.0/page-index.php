<?php
/*
template Name: トップ（/）
*/
?>

<?php get_template_part('_include/header'); ?>

<?php
  $fv_label_1 = get_field('p_top_fv_label_1');
  $fv_label_2 = get_field('p_top_fv_label_2');
  $fv_period = get_field('p_top_fv_period_text');
  $fv_image_character = get_field('p_top_fv_image_character_text');
?>

<section class="-section-topVisual">
  <div class="-section-inner">
    <div class="-section-topVisual-info">
      <h1 class="-section-topVisual-info__title">
        <img src="<?= assetsPath('img') ?>/top/fv-text.webp" alt="なくそう未来の不安。あなたのぜんぶに寄り添う" loading="lazy">
      </h1>
      <div class="-section-topVisual-info__box">
        <ul class="-section-topVisual-info__case">
          <?php if( $fv_label_1 ) : ?>
            <li><?= $fv_label_1 ?></li>
          <?php endif; ?>
          <?php if( $fv_label_2 ) : ?>
            <li><?= $fv_label_2 ?></li>
          <?php endif; ?>
        </ul>
      </div>
      <?php if( $fv_period ) : ?>
        <div class="-section-topVisual-info__data"><?= $fv_period ?></div>
      <?php endif; ?>
    </div>
    <div class="-section-topVisual-image">
      <img src="<?= assetsPath('img') ?>/common/image-character.webp" alt="<?= $fv_image_character ?>" loading="lazy">
      <?php if( $fv_image_character ) : ?>
        <span class="-text"><?= $fv_image_character ?></span>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="-section-bannerSlider">
  <div class="-section-inner js-bannerSlider">
    <div class="swiper">
      <div class="swiper-wrapper">
        <?php
          while (have_rows('o_banner', 'option')) : the_row();
            acfLinkImage('swiper-slide op');
          endwhile;
        ?>
      </div>
    </div>
    <div class="swiper-arrowBtn -prev swiper-button-prev"></div>
    <div class="swiper-arrowBtn -next swiper-button-next"></div>
    <div class="swiper-pagination"></div>
  </div>
</section>

<section class="-section-main -section-about">
  <div class="-section-inner">
    <header class="-section-about-header">
      <h2 class="-title">
        <strong>＼保険も、家計も／</strong>
        <span>お金のことは<b class="-maker">「ぜんぶ」</b><br>まるっと相談できるパートナー</span>
      </h2>
    </header>
    <div class="-section-about-body">
      <p>
      お客さまの悩みは百人百様。ほけんのぜんぶは、<br class="display-block-pc">
      お客さまのライフスタイルに合わせて最適なプランニング、<br class="display-block-pc">
      最適な保険選びをサポートいたします。
      </p>
    </div>
    <div class="-btn-row mt4">
      <a href="<?= home_url() ?>/about/" class="-btn -btn-arrow -large">
        <span>ほけんのぜんぶとは</span>
      </a>
    </div>
  </div>
</section>


<section class="-section-about1">
  <div class="-section-about1-header">
    <div class="-section-inner">
      <div class="-section-about1-headerInner">
        <div class="-image">
          <img src="<?= assetsPath('img') ?>/top/about1-image.webp" alt="" loading="lazy">
        </div>
        <h2 class="-title">
          将来設計は<br>難しくて当然...
        </h2>
      </div>
    </div>
  </div>
  <div class="-section-about1-body">
    <div class="-section-inner">
      <ul class="-section-about1-bodyInner">
        <li>
          <p>
            将来に対する<br>
            漠然とした不安がある
          </p>
          <figure>
            <img src="<?= assetsPath('img') ?>/top/about1-list-1.webp" alt="" loading="lazy">
          </figure>
        </li>
        <li>
          <p>
            保険やお金のことまで<br>
            まとめて相談したい！
          </p>
          <figure>
            <img src="<?= assetsPath('img') ?>/top/about1-list-2.webp" alt="" loading="lazy">
          </figure>
        </li>
        <li>
          <p>
            子供が産まれたから<br>
            将来について考えたい
          </p>
          <figure>
            <img src="<?= assetsPath('img') ?>/top/about1-list-3.webp" alt="" loading="lazy">
          </figure>
        </li>
        <li>
          <p>
            保険ってそもそも<br>
            どういうものなの？
          </p>
          <figure>
            <img src="<?= assetsPath('img') ?>/top/about1-list-4.webp" alt="" loading="lazy">
          </figure>
        </li>
      </ul>
    </div>
    <svg class="-arrow" width="160" height="64" viewBox="0 0 160 64" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M81.5941 63.4703C80.5887 64.1766 79.4113 64.1766 78.4059 63.4703L2.02796 9.81854C-1.41051 7.40318 -0.20857 1.1471e-06 3.62205 1.1471e-06L156.378 1.1471e-06C160.209 1.1471e-06 161.41 7.40318 157.972 9.81854L81.5941 63.4703Z" fill="white"/>
    </svg>
  </div>
  <div class="-section-main -section-cta__small">
    <div class="-section-inner">
      <img class="-section-cta__small-image" src="<?= assetsPath('img') ?>/common/image-character.webp" alt="" loading="lazy">
      <div class="-section-cta__small-info">
        <h2>私たちに「ぜんぶ」ご相談ください！</h2>
        <p>
          ライフプランにさまざまなお悩みは付きもの。<br>
          ほけんのぜんぶでは、お金のプロ（ファイナンシャルプランナー）があなたのお悩みに合わせて<br class="display-block-pc">
          保険や住宅、金融に至るまでどんなに小さなことでもご相談をお受けします。
        </p>
        <div class="-btn-row mt6">
          <a href="<?= home_url() ?>/form/" class="-btn -brand-orange -large">
            <span>無料相談を予約する</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="-section-main -section-about2" style="background: var(--color-light-gray-light)">
  <div class="-section-inner">
    <div class="-section-about2-header">
      <div class="-image">
        <img src="<?= assetsPath('img') ?>/top/about2-image.webp" alt="" loading="lazy">
      </div>
      <div class="-info">
        <h2>
          <span class="-maker">子育て世代</span>を中心に<br>
          多くの方に選ばれています
        </h2>
        <p>
          ほけんのぜんぶでは、あなたの現状や将来設計、ライフステージなどを国家資格である<strong>ファイナンシャル・プランナー(FP)資格を保有するお金のプロ</strong>が個別にお伺いし、一人ひとりにあった<strong>最適なご提案</strong>をさせていただきます。
        </p>
      </div>
    </div>
    <div class="-section-about2-body">
      <ul class="-section-about2-bodyList">
        <li>
          <figure>
            <img src="<?= assetsPath('img') ?>/top/about2-list-1.webp" alt="" loading="lazy">
          </figure>
          <p>
            本当に必要な保険の仕分け・最適な保険がわかる
          </p>
        </li>
        <li>
          <figure>
            <img src="<?= assetsPath('img') ?>/top/about2-list-2.webp" alt="" loading="lazy">
          </figure>
          <p>
            教育資金の試算・最適な貯蓄プランがわかる
          </p>
        </li>
        <li>
          <figure>
            <img src="<?= assetsPath('img') ?>/top/about2-list-3.webp" alt="" loading="lazy">
          </figure>
          <p>家計改善の方法ご家庭に合った貯金のコツなどがわかる</p>
        </li>
        <li>
          <figure>
            <img src="<?= assetsPath('img') ?>/top/about2-list-4.webp" alt="" loading="lazy">
          </figure>
          <p>住宅ローンに関する制度が学べる</p>
        </li>
        <li>
          <figure>
            <img src="<?= assetsPath('img') ?>/top/about2-list-5.webp" alt="" loading="lazy">
          </figure>
          <p>老後に必要な資金や準備の仕方まで「見える化」</p>
        </li>
        <li>
          <figure>
            <img src="<?= assetsPath('img') ?>/top/about2-list-6.webp" alt="" loading="lazy">
          </figure>
          <p>理想の将来に向けたライフプランシートに沿って設計ができる</p>
        </li>
      </ul>
      <div class="-section-about2-bodyMessage">
      将来必要なお金は、年齢や家族構成などライフステージによって変化します。<br>
      もちろん必要にかられるタイミングは人それぞれ。お金のプロであるファイナンシャルプランナーがあなたの人生に<br>
      必要なお金を丁寧に「見える化」します。
      </div>
    </div>
  </div>
</section>

<?php get_template_part('_section/cta/01/block'); ?>

<?php
  $args = [
    'className' => '',
  ];
  get_template_part('_include/inc-section@purpose', null, $args);
?>

<section class="-section-main -section-cta__small">
  <div class="-section-inner">
    <img class="-section-cta__small-image" src="<?= assetsPath('img') ?>/common/image-character.webp" alt="" loading="lazy">
    <div class="-section-cta__small-info">
      <h2>まずは不安を<br class="display-block-sp">なくすことから。</h2>
      <p>
        初めてご利用されるお客さまも、<br>
        お気軽にご相談ください。
      </p>
      <div class="-btn-row mt6">
        <a href="<?= home_url() ?>/form/" class="-btn -brand-orange -large">
          <span>無料相談を予約する</span>
        </a>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('_include/inc-section@1'); ?>

<section class="-section-main" style="background: var(--brand-light-3)">
  <div class="-section-inner -row">
    <header class="-common-head -row-head">
      <h2 class="-common-head__title" data-subTitle="FAQ">
        <span>よくある質問</span>
      </h2>
    </header>
    <div class="-faq -row-body">
      <div>
        <?php
          $loop_faq = new WP_Query(array(
            'post_type'			=> 'faq',
            'order'				=> 'DESC',
            'posts_per_page' => 4,
          ));
          while ($loop_faq->have_posts()) : $loop_faq->the_post();
            get_template_part('_section/faq/loop');
          endwhile;
        ?>
      </div>
      <div class="-btn-row mt6" style="justify-content: start;">
        <a href="<?= get_post_type_archive_link('faq') ?>" class="-btn -btn-arrow -large">
          <span><?= esc_html(get_post_type_object('faq')->label); ?>一覧を見る</span>
        </a>
      </div>
    </div>
  </div>
</section>

<section class="-section-main -bg-white">
  <div class="-section-inner -row">
    <header class="-common-head -row-head">
      <h2 class="-common-head__title" data-subTitle="NEWS">
        <span>お知らせ</span>
      </h2>
    </header>
    <div class="-news -row-body">
      <div>
        <?php
          $loop_news = new WP_Query(array(
            'post_type'			=> 'news',
            'order'				=> 'DESC',
            'posts_per_page' => 6,
          ));
          while ($loop_news->have_posts()) : $loop_news->the_post();
            get_template_part('_section/news/loop');
          endwhile;
        ?>
      </div>
      <div class="-btn-row mt6" style="justify-content: start;">
        <a href="<?= get_post_type_archive_link('news') ?>" class="-btn -btn-arrow -large">
          <span><?= esc_html(get_post_type_object('news')->label); ?>一覧を見る</span>
        </a>
      </div>
    </div>
  </div>
</section>

<?php
  $args = [
    'className' => '',
  ];
  get_template_part('_include/footer', null, $args);
?>