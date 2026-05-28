<?php
/*
template Name: ほけんのぜんぶとは（/about/）
*/
?>

<?php get_template_part('_include/header'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.6.1/css/iziModal.min.css" integrity="sha512-3c5WiuZUnVWCQGwVBf8XFg/4BKx48Xthd9nXi62YK0xnf39Oc2FV43lIEIdK50W+tfnw2lcVThJKmEAOoQG84Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.6.1/js/iziModal.min.js" integrity="sha512-lR/2z/m/AunQdfBTSR8gp9bwkrjwMq1cP0BYRIZu8zd4ycLcpRYJopB+WsBGPDjlkJUwC6VHCmuAXwwPHlacww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="-section-headLower-imageHeader">
  <?php lowerHead('', ''); ?>
  <img class="-imageHeader" src="<?= assetsPath('img') ?>/visual/about.webp" alt="" loading="lazy">
</div>

<div class="-section-main -headLower-bottomText">
  <div class="-section-inner">
    <h2 class="-title">
      お金に関する不安は<b class="-maker">“ぜんぶ”</b><br>
      プロにお任せください
    </h2>
    <div class="-body">
    ほけんのぜんぶでは、みなさまの将来プランに<br>
    寄り添いどうすればいいかを“明確化”します。<br>
    お金のプロ（ファイナンシャルプランナー）が「保険・金融・住宅」に<br>
    関するご提案をまるっとお届けするサービスです。
    </div>
  </div>
</div>

<div class="p-about-section-aboutList">
  <div class="-section-inner">
    <header class="-headLower-subTitle">
      <small>＼難しいことぜんぶお金のプロに相談／</small>
      <h2 class="-title">
        <span>ほけんのぜんぶにできること</span>
      </h2>
    </header>
    <div class="p-about-section-aboutList-main">
      <ul class="-about-list">
        <li class="-about-item">
          <div class="-image">
            <img src="<?= assetsPath('img') ?>/about/about1.webp" alt="" loading="lazy">
          </div>
          <div class="-info">
            <h3 class="-info-title">
              <b class="-maker">本当に必要な保険</b>の仕分け<br>
              最適な保険がわかる
            </h3>
          </div>
        </li>
        <li class="-about-item">
          <div class="-image">
            <img src="<?= assetsPath('img') ?>/about/about2.webp" alt="" loading="lazy">
          </div>
          <div class="-info">
            <h3 class="-info-title">
              <b class="-maker">教育資金</b>の試算<br>
              <b class="-maker">最適な貯蓄プラン</b>がわかる
            </h3>
          </div>
        </li>
        <li class="-about-item">
          <div class="-image">
            <img src="<?= assetsPath('img') ?>/about/about3.webp" alt="" loading="lazy">
          </div>
          <div class="-info">
            <h3 class="-info-title">
              <b class="-maker">家計改善</b>の方法<br>
              ご家庭に合った貯金の<br>
              コツなどがわかる
            </h3>
          </div>
        </li>
        <li class="-about-item">
          <div class="-image">
            <img src="<?= assetsPath('img') ?>/about/about4.webp" alt="" loading="lazy">
          </div>
          <div class="-info">
            <h3 class="-info-title">
              <b class="-maker">住宅ローン</b>に関する<br>
              制度が学べる
            </h3>
          </div>
        </li>
        <li class="-about-item">
          <div class="-image">
            <img src="<?= assetsPath('img') ?>/about/about5.webp" alt="" loading="lazy">
          </div>
          <div class="-info">
            <h3 class="-info-title">
              <b class="-maker">老後に必要な資金</b>や<br>
              <b class="-maker">準備の仕方</b>まで「見える化」
            </h3>
          </div>
        </li>
        <li class="-about-item">
          <div class="-image">
            <img src="<?= assetsPath('img') ?>/about/about6.webp" alt="" loading="lazy">
          </div>
          <div class="-info">
            <h3 class="-info-title">
              理想の将来に向けた<br>
              <b class="-maker">ライフプランシート</b>に<br>
              沿って設計ができる
            </h3>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

<section class="-section-main -section-cta__small">
  <div class="-section-inner">
    <img class="-section-cta__small-image" src="<?= assetsPath('img') ?>/common/image-character.webp" alt="" loading="lazy">
    <div class="-section-cta__small-info">
      <h2>ほけんのぜんぶが<br class="display-block-sp">選ばれる理由</h2>
      <p>
      保険をはじめとして、<br class="display-block-sp">金融・住宅に関するお悩みまでを<br>
      お金のプロが素早く的確に<br class="display-block-sp">解決いたします。
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

<section class="-section-main -bg-brand">
  <div class="-section-inner">
    <header class="-headLower-subTitle">
      <small>＼ ほけんのぜんぶは安心してご利用いただけます ／</small>
      <h2 class="-title">
        <span>他社サービスを比較</span>
      </h2>
      <div class="-description">
        ほけんのぜんぶでは、お客さまに心から満足していただけるようサービスの質を徹底しております。
      </div>
    </header>
    <div class="p-about-section-aboutMain" style="max-width:860px; margin: 0 auto;">
      <div class="mt6">
        <img class="" src="<?= assetsPath('img') ?>/about/about-comparison.webp" alt="" loading="lazy">
      </div>
    </div>
  </div>
</section>

<section class="-section-main">
  <div class="-section-inner">
    <header class="-headLower-subTitle">
      <small>＼ お客さまから寄せられた声をご紹介します ／</small>
      <h2 class="-title">
        <span>ご利用された方の声</span>
      </h2>
    </header>
    <div class="p-about-section-voiceMain mt6">
      <div class="p-voice-list">
        <?php
          $loop_voice = new WP_Query(array(
            'post_type'       => 'voice',
            'order'           => 'DESC',
            'posts_per_page'  => 6,
          ));
        ?>
        <?php
          while ($loop_voice->have_posts()) : $loop_voice->the_post();
            get_template_part('_section/voice/loop');
          endwhile;
          wp_reset_query();
        ?>
      </div>
    </div>
  </div>
</section>

<?php
  while ($loop_voice->have_posts()) : $loop_voice->the_post();
    get_template_part('_section/voice/loop@modal');
  endwhile;
  wp_reset_query();
?>

<script>
$(function() {
  $(".iziModal").iziModal({
    group: "voice",
    loop: true,
    width: 640, //横幅
    overlayColor: 'rgba(0, 0, 0, .5)',
    transitionIn: 'fadeInUp',
    transitionOut: 'fadeOutDown'
  });
})
</script>

<?php
  $args = [
    'className' => '',
  ];
  get_template_part('_include/footer', null, $args);
?>