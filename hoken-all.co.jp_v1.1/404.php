<?php get_template_part('_include/header'); ?>

<div class="-section-headLower">
  <div class="-section-headLower-inner -section-inner">
    <h1 class="-head-title text-center" data-text-en="">
      <span style="display: block; width: 100%;">ご指定のページが<br class="display-block-sp">見つかりません</span>
    </h1>
  </div>
</div>

<div class="-section-inner pt10 pb10">
  <div class="font-size-x-default">
    <div class="t-center">
      <p>
        アクセスしようとしたページは削除、変更されたか、現在利用できない可能性があります。<br class="display-block-pc">
        ご不便をおかけいたしますが、URLを再度ご確認いただくか、<br class="display-block-pc">
        トップページから該当のページをお探しください。
      </p>
      <div class="-btn-row mt4">
        <a class="-btn -primary-line" href="<?= home_url(); ?>/">
          <span>トップに戻る</span>
        </a>
      </div>

    </div>
  </div>
  <div class="font-size-x-default mt10">
    <div class="t-center">
      <p class="mt10" style="font-weight:bold; font-size:1.2em;">
      コーポレートサイト（企業様向けサイト）のリニューアルのお知らせ
      </p>
      <p style="margin-top:10px;">
        ほけんのぜんぶのコーポレートサイトは、<br class="display-block-pc">
        リニューアルをいたしました。<br class="display-block-pc">
        コーポレートサイトは、下記のボタンをご確認ください。
      </p>
      <div class="-btn-row mt4">
        <a class="-btn -primary-line" href="https://company.hoken-all.co.jp/" target="_blank">
          <span>コーポレートサイト</span>
        </a>
      </div>
      
    </div>
  </div>
</div>

<?php
  $args = [
    'className' => '',
  ];
  get_template_part('_include/footer', null, $args);
?>