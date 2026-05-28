<?php
/*
template Name: お金をためる（/purpose/save/）
*/
?>

<?php get_template_part('_include/header'); ?>

<div class="-section-headLower-imageHeader">
  <?php lowerHead('', '正しいお金のため方'); ?>
  <img class="-imageHeader" src="<?= assetsPath('img') ?>/visual/purpose-save.webp" alt="" loading="lazy">
</div>

<div class="-section-main -headLower-bottomText">
  <div class="-section-inner">
    <h2 class="-title">
      <b class="-maker">老後に備えて、<br>
      いくらお金が必要なんだろう？</b>
    </h2>
    <div class="-body">
    「老後2,000万円問題」をご存知でしょうか？<br>
    2019年、金融庁によって「老後の30年で約2,000万円が不足する」という試算が示されました。<br>
    現在、撤回はされたものの老後にお金がかかる一定の指標にはなりそうですね。<br>
    では、お金が不足しないように、ゆとりある老後生活を送るためにはいくらあれば足りるのでしょうか？
    </div>
  </div>
</div>

<section>
  <div class="p-purpose-message-inner">
    <div class="-section-inner">
      <div class="-message-row">
        <div class="-message-item">
          <div class="-message-avatar">
            <img class="" src="<?= assetsPath('img') ?>/purpose/purpose-avatar_01.webp" alt="" loading="lazy">
          </div>
          <div class="-message-text">
            <b>不足しないようにするため</b><br>
            にはどうすればいいの？
          </div>
        </div>
        <div class="-message-item">
          <div class="-message-avatar">
            <img class="" src="<?= assetsPath('img') ?>/purpose/purpose-avatar_02.webp" alt="" loading="lazy">
          </div>
          <div class="-message-text">
            <b>ゆとりある老後生活をおくりたい</b><br>
            けれど何円あれば足りるの？
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="-section-main bg-light-gray-light">
  <div class="-section-inner">
    <header class="-section-about-header">
      <h2 class="-title">
        <span><b class="-maker">老後生活に必要なお金</b></span>
      </h2>
    </header>
    <div class="-section-about-body">
      <p>
        実は、夫婦2人がゆとりある老後生活に必要なお金は<br class="display-block-pc">
        およそ<b class="c-brand">1億円ほど</b>と言われていますが毎月補助される年金の平均額は、毎月22万円ほど。<br class="display-block-pc">
        ゆとりある老後生活資金を毎月36万円とするとその差額<b class="c-brand">14万円が毎月不足する</b>ことになります。
      </p>
    </div>
    <section class="-purpose-block">
      <div class="-purpose-block__header">
        <h3 class="-title">ゆとりある老後生活に必要な額は？</h3>
      </div>
      <div class="-purpose-block__body">
        <div class="-purpose-sectionBox mt4">
          <h4>夫婦ともに65歳以上の場合</h4>
          <div class="-box-row mt2">
            <div class="--box-image">
              <img src="<?= assetsPath('img') ?>/purpose/save/img-s1.webp" alt="" loading="lazy">
            </div>
            <div class="--box-text">
              <div class="-textStyle1">
                <b>36</b>万円×<b>12</b>ヶ月×<b>25</b>年 ＝<strong>10,800</strong>万円
              </div>
              <div class="mt2 font-size-small color-gray">
                ※ 出典 ： 厚生労働省「令和二年簡易生命表」公益財団法人生命保険文化センター「令和元年度生命保険に関する調査」
                総務省統計局「家計調査報告（家計収支編）2020年（令和2年）平均結果の概要」
              </div>
            </div>
          </div>
          <div class="mt3 text-center -textStyle1">
            ゆとりある老後生活に必要なお金はおよそ<br class="display-block-sp"><b>1億円ほどと</b>言われています。
          </div>
        </div>
      </div>
    </section>
    <section class="-purpose-block">
      <div class="-purpose-block__header">
        <h3 class="-title">では、年金でどれほど<br clas="display-block-sp">まかなえるのでしょうか？</h3>
      </div>
      <div class="-purpose-block__body">
        <div class="-purpose-section__body-inner p1 mt4">
          <img class="-image1" src="<?= assetsPath('img') ?>/top/purpose1-01.webp" alt="" loading="lazy">
          <span class="-text">この場合...</span>
          <img class="-image2" src="<?= assetsPath('img') ?>/top/purpose1-02.webp" alt="" loading="lazy">
        </div>
        <div class="mt6 text-center -textStyle1">
          <b>夫婦2人</b>生活の場合、毎月補助される年金の平均額は、毎月22万円ほど。<br>
          ゆとりある老後生活資金を毎月36万円とするとその<b>差額14万円が毎月不足、</b><br class="display-block-pc">
          生涯では<b>4,000万円</b>ほど不足することになります。
        </div>
        <div class="mt3 text-center -textStyle1">
          <b>36</b>万円×<b>12</b>ヶ月×<b>25</b>年 ＝<strong>10,800</strong>万円
        </div>
        <div class="mt3 text-center -textStyle1">
        実際に必要な主な出費として下の図のようなお金が必要になります。<br>
        そのため、<b>4,000万円も貯金できるわけがない</b>と思われる方も多いでしょう。
        </div>
      </div>
    </section>
    <section class="-purpose-block">
      <div class="-purpose-block__header">
        <h3 class="-title">実際に必要な主な出費は？</h3>
      </div>
      <div class="-purpose-block__body mt4">
        <div class="-purpose-section__body-inner p2">
          <ul>
            <li>
              <i><img src="<?= assetsPath('img') ?>/icon/icon-purpose-1.svg" alt="" loading="lazy"></i>
              <dl>
                <dt>結婚関連資金</dt>
                <dd><b>356.8</b>万円</dd>
              </dl>
            </li>
            <li>
              <i><img src="<?= assetsPath('img') ?>/icon/icon-purpose-2.svg" alt="" loading="lazy"></i>
              <dl>
                <dt>住宅購入費</dt>
                <dd><b>3,495</b>万円</dd>
              </dl>
            </li>
            <li>
              <i><img src="<?= assetsPath('img') ?>/icon/icon-purpose-3.svg" alt="" loading="lazy"></i>
              <dl>
                <dt>出産前後の費用</dt>
                <dd>平均<b>50</b>万円</dd>
              </dl>
            </li>
            <li>
              <i><img src="<?= assetsPath('img') ?>/icon/icon-purpose-4.svg" alt="" loading="lazy"></i>
              <dl>
                <dt>海外旅行費</dt>
                <dd><b>15-30</b>万円</dd>
              </dl>
            </li>
            <li>
              <i><img src="<?= assetsPath('img') ?>/icon/icon-purpose-5.svg" alt="" loading="lazy"></i>
              <dl>
                <dt>教育費</dt>
                <dd>約<b>948</b>万円</dd>
              </dl>
            </li>
          </ul>
          <dl class="-description">
            <dt>※ 出典：ゼクシィ結婚トレンド調査2021調べ</dt>
            <dd>公益社団法人国民健康保険中央会出産費用平成28年度文部科学省「平成30年度子供の学習費調査の結果について独立行政法人住宅金融支援機構「2020年度フラット35利用者調査」</dd>
          </dl>
        </div>
      </div>
    </section>
  </div>
</section>

<section class="-section-main">
  <div class="-section-inner">
    <header class="-section-about-header">
      <h2 class="-title">
        <span><b class="-maker">お金をためるためには</b></span>
      </h2>
    </header>
    <div class="-section-about-body">
      <p>
      そんな方におすすめなのが「金利を活用した運用」です。<br class="display-block-pc">
      貯金しているお金を運用に回すと長期的に見ると大きなリターンを期待できます。
      </p>
    </div>
    <section class="-purpose-block">
      <div class="-purpose-block__header">
        <h3 class="-title">運用した場合としない場合の差は？</h3>
      </div>
      <div class="-purpose-block__body">
        <div class="-purpose-imageRow mt6">
          <div class="-image">
            <img class="" src="<?= assetsPath('img') ?>/purpose/save/img-s2.webp" alt="" loading="lazy">
          </div>
          <div class="-info -textStyle1">
            これは30-65歳までの35年間、毎月28,000円「積立して運用した場合」と「そのまま貯金した場合」の差になります。<br>
            つまり、<b>金利が高い状況で運用する方</b>が貯金するよりもお得なんです！
          </div>
        </div>
      </div>
    </section>
    <section class="-purpose-block">
      <div class="-purpose-block__header">
        <h3 class="-title">
          60歳になるまでに1,000万のお金を貯めるには<br class="display-block-pc">
          毎月いくら必要でしょうか？<br>
          また、毎月何円貯金したらいいの？
        </h3>
      </div>
      <div class="-purpose-block__body">
        <div class="-purpose-imageRow mt6">
          <div class="-image">
            <img class="" src="<?= assetsPath('img') ?>/purpose/save/img-s3.png" alt="" loading="lazy">
          </div>
          <div class="-info -textStyle1">
            毎月この金額で<br>
            <strong>1,000</strong>万円貯めることができます
          </div>
        </div>
        <div class="mt4 text-center -textStyle1">
          老後のためにお金を貯めるためには<b>「資産運用」が重要</b>だということはわかって頂けたかと思います。
        </div>
      </div>
    </section>
  </div>
</section>

<section>
  <div class="p-purpose-message-inner">
    <div class="-section-inner">
      <div class="-message-row">
        <div class="-message-item">
          <div class="-message-avatar">
            <img class="" src="<?= assetsPath('img') ?>/purpose/purpose-avatar_01.webp" alt="" loading="lazy">
          </div>
          <div class="-message-text">
            でも実際に<br>
            <b>どうやって資産運用</b>するの？
          </div>
        </div>
        <div class="-message-item">
          <div class="-message-avatar">
            <img class="" src="<?= assetsPath('img') ?>/purpose/purpose-avatar_02.webp" alt="" loading="lazy">
          </div>
          <div class="-message-text">
            そもそも<b>資産運用って</b><br>
            <b>よくわからない...</b>
          </div>
        </div>
      </div>
      <div class="mt3 text-center -textStyle1">
        こんなお悩みを持つ方に向けて、<br>
        <b>プロのFP（ファイナンシャルプランナー）による無料相談</b>を実施しております。
      </div>
    </div>
  </div>
</section>


<?php
  $args = [
    'className' => 'mt8',
  ];
  get_template_part('_include/footer', null, $args);
?>