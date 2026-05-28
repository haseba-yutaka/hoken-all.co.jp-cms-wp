<?php
/*
template Name: お申込みの流れ（/flow/）
*/
?>

<?php get_template_part('_include/header'); ?>

<style>
.-section-headLower-imageHeader .-imageHeader {
  
  @media screen and (max-width: 875px) {
    height: 420px;
  }

  @media screen and (max-width: 768px) {
    height: 300px;
  }
}
</style>

<div class="-section-headLower-imageHeader">
  <?php lowerHead('', ''); ?>
  <img class="-imageHeader" src="<?= assetsPath('img') ?>/visual/flow.webp" alt="" loading="lazy">
</div>

<div class="-section-main -headLower-bottomText">
  <div class="-section-inner">
    <h2 class="-title">
      お金のプロ(ファイナンシャルプランナー)が<br>
      <b class="-maker">あらゆるお金の不安を解消</b>します！
    </h2>
    <div class="-body">
      ほけんのぜんぶでは、専任のファイナンシャルプランナーに、<br>
      お金に関するあらゆるご相談を無料でできます。<br>
      ここでは簡単に相談サービスの流れをご紹介します。
    </div>
  </div>
</div>

<div class="p-flow-section-flowList">
  <div class="-section-inner">
    <header class="-headLower-subTitle">
      <small>＼ご相談時間は平均1〜2時間／</small>
      <h2 class="-title">
        <span>無料相談の流れ</span>
      </h2>
    </header>
    <div class="p-flow-section-flowList-main">
      <section class="p-flow-section-flowList-section">
        <div class="-label-number">
          <small>STEP</small>01
        </div>
        <div class="-flowList-inner">
          <div class="-inner">
            <h3 class="-title">
              相談予約
            </h3>
            <div class="-info">
              <p>
              お客さまのご自宅をはじめ、最寄りのカフェ、勤務先など、全国どこでもご指定の場所で無料相談を承ります（オンラインでも相談を承っております）。保険、教育、家計、住宅など暮らしに必要な<b class="-maker">あらゆるお金に関する相談が可能</b>です。
              </p>
            </div>
          </div>
          <img class="-image" src="<?= assetsPath('img') ?>/flow/flow1.webp" alt="" loading="lazy">
        </div>
      </section>
      <section class="p-flow-section-flowList-section">
        <div class="-label-number">
          <small>STEP</small>02
        </div>
        <div class="-flowList-inner">
          <div class="-inner">
            <h3 class="-title">
            ご面談・ヒアリング
            </h3>
            <div class="-info">
              <p>
                専任のファイナンシャルプランナーが、お客さま一人ひとりの状況を把握させていただき、最後まで責任をもって担当いたします。
                <b class="-maker">24時間365日ご予約を承っております</b>ので、ぜひお気軽にお問い合わせください。
              </p>
            </div>
          </div>
          <img class="-image" src="<?= assetsPath('img') ?>/flow/flow2.webp" alt="" loading="lazy">
        </div>
      </section>
      <section class="p-flow-section-flowList-section">
        <div class="-label-number">
          <small>STEP</small>03
        </div>
        <div class="-flowList-inner">
          <div class="-inner">
            <h3 class="-title">
            解決策のご提案
            </h3>
            <div class="-info">
              <p>
                お客さまからのヒアリングをもとに、お客さまの年齢ごとに必要な金額を算出し、理想を実現するための改善策を、FPならではの目線で適切にアドバイス。<br>
                <b class="-maker">40社以上の幅広い選択肢から、 ご家庭に合ったプランをご提案</b>します。また、必要に応じて、理想の将来に向けたライフプランシートもご提示します。
              </p>
              <div class="-btn-row mt2" style="justify-content: flex-start;">
                <a href="<?= home_url() ?>/voice/" class="-btn -primary-line">お客さまの声</a>
              </div>
            </div>
          </div>
          <img class="-image" src="<?= assetsPath('img') ?>/flow/flow3.webp" alt="" loading="lazy">
        </div>
        <div class="-info2">
          <h4>ライフプランシートとは？</h4>
          <p>
          ファイナンシャルプランナーが生活費、子供の進路方針、車の買い替え頻度、旅行回数の希望、など将来のビジョンを詳しくヒアリング！ご家庭で必要な金額を、お客さまのご年齢ごとに算出いたします。家計の見える化によって、将来設計が立てやすくなります！
          </p>
        </div>
      </section>
      <section class="p-flow-section-flowList-section">
        <div class="-label-number">
          <small>STEP</small>04
        </div>
        <div class="-flowList-inner">
          <div class="-inner">
            <h3 class="-title">
            申し込み手続き
            </h3>
            <div class="-info">
              <p>
              担当ファイナンシャルプランナーがお客さまの立場に立って、契約に至るまでしっかりサポートいたします。保険の切り替えや複数社のご契約など、面倒な各種お手続きもすべてお任せください。
              </p>
            </div>
          </div>
          <img class="-image" src="<?= assetsPath('img') ?>/flow/flow4.webp" alt="" loading="lazy">
        </div>
      </section>
      <section class="p-flow-section-flowList-section">
        <div class="-label-number">
          <small>STEP</small>05
        </div>
        <div class="-flowList-inner">
          <div class="-inner">
            <h3 class="-title">
            アフターフォロー
            </h3>
            <div class="-info">
              <p>
              お客さまのご契約状況を一元管理し、アフターフォローまで継続的にしっかりサポートいたします。
              ​​支払口座や住所等の変更手続き、ご契約内容の定期的な見直し等、いつでもお気軽にお問い合わせください。
              また、<b class="-maker">相談はいつでも何度でも無料</b>です。何かあれば遠慮なくご連絡ください。
              </p>
            </div>
          </div>
          <img class="-image" src="<?= assetsPath('img') ?>/flow/flow5.webp" alt="" loading="lazy">
        </div>
      </section>
    </div>
  </div>
</div>

<?php
  $args = [
    'className' => 'mt0',
  ];
  get_template_part('_include/footer', null, $args);
?>