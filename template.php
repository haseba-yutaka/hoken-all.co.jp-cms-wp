<?php
  $siteUrl = 'https://hoken-all.co.jp';
  $siteUrl;
  $fileUrl = $siteUrl . '/cms/wp-content/themes/global-assets';
  $pageTitle = 'お問い合わせ';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">
  <title><?= $pageTitle ?>｜株式会社ほけんのぜんぶ</title>
  <meta name="description" content="株式会社ほけんの<?= $pageTitle ?>のページです。ほけんのぜんぶグループ（HZグループ）では保険代理店事業を軸に、人材派遣や人材紹介、マーケティング事業など、さまざまな事業を展開しています。" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/yakuhanjp@4.0.0/dist/css/yakuhanjp.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Poppins:wght@400;600&display=swap" as="style">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Poppins:wght@400;600&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
  <link rel="stylesheet" href="<?= $fileUrl  ?>/css/root.css">
  <link rel="stylesheet" href="<?= $fileUrl  ?>/css/reset.css">
  <link rel="stylesheet" href="<?= $fileUrl  ?>/css/common.css">
  <meta property="og:locale" content="ja_JP" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?= $pageTitle ?>｜株式会社ほけんのぜんぶ" />
  <meta property="og:description" content="株式会社ほけんの<?= $pageTitle ?>のページです。ほけんのぜんぶグループ（HZグループ）では保険代理店事業を軸に、人材派遣や人材紹介、マーケティング事業など、さまざまな事業を展開しています。" />
  <meta property="og:url" content="<?= $siteUrl ?>/contact/" />
  <meta property="og:site_name" content="株式会社ほけんのぜんぶ" />
  <meta name="twitter:card" content="summary_large_image" />
  <link rel='dns-prefetch' href='//ajax.googleapis.com' />
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js?ver=3.6.0" id="jquery-js"></script>
</head>
<body id="body-lower" class="">
  <header role="banner" class="js-header">
    <div class="-header-main">
      <div class="-header-main__logo">
        <a class="-logo" href="/">
          <img class="-logo-main" src="<?= $fileUrl  ?>/img/common/logo-main.svg" alt="株式会社ほけんのぜんぶ" loading="lazy">
          <img class="-logo-white" src="<?= $fileUrl  ?>/img/common/logo-white.svg" alt="株式会社ほけんのぜんぶ" loading="lazy">
        </a>
      </div>
      <div class="-header-main__inner">
        <div class="-header-nav">
          <div class="-header-nav__item ">
            <a class="-header-nav__item-link " href="/about/" target="_self">
              <span>
                <span>ほけんのぜんぶとは</span>
              </span>
            </a>
          </div>
          <div class="-header-nav__item ">
            <a class="-header-nav__item-link " href="/flow/" target="_self">
              <span>
                <span>お申込みの流れ</span>
              </span>
            </a>
          </div>
          <div class="-header-nav__item pulldown">
            <a class="-header-nav__item-link " href="/purpose/" target="_self">
              <span>
                <span>目的から探す</span>
              </span>
            </a>
            <div class="js-ac-head">
              <span>目的から探す</span>
            </div>
            <div class="-pulldown-menu js-ac-conts">
              <a class="-pulldown-menu__link " href="/purpose/save/"
                target="_self">
                <span>お金をためる</span>
              </a>
              <a class="-pulldown-menu__link " href="/purpose/use/"
                target="_self">
                <span>お金をつかう</span>
              </a>
              <a class="-pulldown-menu__link " href="/purpose/protect/"
                target="_self">
                <span>お金をまもる</span>
              </a>
            </div>
          </div>
          <div class="-header-nav__item ">
            <a class="-header-nav__item-link " href="/voice/" target="_self">
              <span>
                <span>お客様の声</span>
              </span>
            </a>
          </div>
          <div class="-header-nav__item ">
            <a class="-header-nav__item-link " href="/faq/" target="_self">
              <span>
                <span>よくあるご質問</span>
              </span>
            </a>
          </div>
          <div class="-header-nav__item ">
            <a class="-header-nav__item-link news" href="/news/"
              target="_self">
              <span>
                <span>お知らせ</span>
              </span>
            </a>
          </div>
        </div>
        <div class="-btn-row">
          <a class="-btn -contact" href="tel:0120-20-8000">
            <small>いますぐ！電話相談する</small>
            <span class="ff-e">0120-20-8000</span>
          </a>
          <a class="-btn -tel" href="/contact/">
            <small>お金のプロに直接相談</small>
            <span>無料相談を予約</span>
          </a>
        </div>
      </div>
      <div class="-btn-burger">
        <div class="-inner">
          <div class="bar topBar"></div>
          <div class="bar btmBar"></div>
        </div>
      </div>
    </div>
  </header>
  <div class="-sp-header-body">
    <div class="-header-sp-nav">
      <div class="-sp-item ">
        <a class="-sp-item__head " href="/about/" target="_self">
          <span>
            <span>ほけんのぜんぶとは</span>
          </span>
        </a>
      </div>
      <div class="-sp-item ">
        <a class="-sp-item__head " href="/flow/" target="_self">
          <span>
            <span>お申込みの流れ</span>
          </span>
        </a>
      </div>
      <div class="-sp-item pulldown">
        <a class="-sp-item__head " href="/purpose/" target="_self">
          <span>
            <span>目的から探す</span>
          </span>
        </a>
        <div class="js-ac-head">
          <span>目的から探す</span>
        </div>
        <div class="-sp-item__body js-ac-conts">
          <a class="-pulldown-menu__link " href="/purpose/save/" target="_self">
            <span>お金をためる</span>
          </a>
          <a class="-pulldown-menu__link " href="/purpose/use/" target="_self">
            <span>お金をつかう</span>
          </a>
          <a class="-pulldown-menu__link " href="/purpose/protect/"
            target="_self">
            <span>お金をまもる</span>
          </a>
        </div>
      </div>
      <div class="-sp-item ">
        <a class="-sp-item__head " href="/voice/" target="_self">
          <span>
            <span>お客様の声</span>
          </span>
        </a>
      </div>
      <div class="-sp-item ">
        <a class="-sp-item__head " href="/faq/" target="_self">
          <span>
            <span>よくあるご質問</span>
          </span>
        </a>
      </div>
      <div class="-sp-item ">
        <a class="-sp-item__head news" href="/news/" target="_self">
          <span>
            <span>お知らせ</span>
          </span>
        </a>
      </div>
    </div>
    <div class="-btn-row">
      <a class="-btn -contact" href="tel:0120-20-8000">
        <small>いますぐ！電話相談する</small>
        <span class="ff-e">0120-20-8000</span>
      </a>
      <a class="-btn -tel" href="/contact/">
        <small>お金のプロに直接相談</small>
        <span>無料相談を予約</span>
      </a>
    </div>
  </div>
  <div class="header-height"></div>


  <!-- メインコンテンツ -->
  <main role="main" class="js-main">
    <div class="-section-headLower ">
      <div class="-section-headLower-inner -section-inner">
        <h1 class="-head-title" data-text-en="contact">
          <span>お問い合わせ</span>
        </h1>
      </div>
    </div>
    <div class="-section-main">
      <div class="-section-inner">

        <div style="background: #eee; padding: 200px; 16px; text-align: center; font-size: 20px;">
        ここにコードがはいります。
        </div>

      </div>
    </div>
  </main>
  <!-- メインコンテンツ -->


  <div class="breadcrumbs">
    <div class="breadcrumbs-inner">
      <span property="itemListElement" typeof="ListItem">
        <a property="item" typeof="WebPage" href="/" class="home">
          <span property="name">株式会社ほけんのぜんぶ</span>
        </a>
        <meta property="position" content="1">
      </span>
      <i></i>
      <span property="itemListElement" typeof="ListItem">
        <span property="name" class="current-item">お問い合わせ</span>
        <meta property="url" content="/contact/">
        <meta property="position" content="2">
      </span>
    </div>
  </div>


  <footer class="-footer" role="contentinfo">
    <div class="-footer-primary">
      <div class="-footer-logo">
        <a class="-logo" href="/">
          <img src="<?= $fileUrl  ?>/img/common/logo-white.svg" alt="株式会社ほけんのぜんぶ" loading="lazy">
        </a>
        <!--
        <div class="-sns ">
          <a class="instagram" href="#" target="_blank" rel="noopener noreferrer">
            <img src="<?= $fileUrl  ?>/img/icon-sns/instagram@w.svg" alt="instagram" loading="lazy">
          </a>
          <a class="facebook" href="#" target="_blank" rel="noopener noreferrer">
            <img src="<?= $fileUrl  ?>/img/icon-sns/facebook@w.svg" alt="facebook" loading="lazy">
          </a>
          <a class="youtube" href="#" target="_blank" rel="noopener noreferrer">
            <img src="<?= $fileUrl  ?>/img/icon-sns/youtube@w.svg" alt="youtube" loading="lazy">
          </a>
        </div>
        -->
      </div>
      <div class="-footer-body">
        <div class="-footer-body__head">
          <div class="-footer-body__info">
            <div class="-company">
              <div class="-company-name">株式会社ほけんのぜんぶ</div>
              <div class="-company-address">〒171-0014<br />
                東京都豊島区池袋2-40-13</div>
            </div>
            <div class="-tel">
              <a class="-tel-number" href="tel:0120-20-8000">0120-20-8000</a>
              <div class="-tel-receptionTime">対応時間：10:00 〜19:00</div>
            </div>
          </div>
          <div class="-footer-body__btn -btn-row">
            <a class="-btn -primary-line" href="/contact/" target="_self">
              <span>無料相談ご予約</span>
            </a>
          </div>
        </div>
        <div class="-footer-menu__row">
          <div class="-footer-menu__item">
            <div class="-footer-menu__item-inner">
              <h3>ご案内</h3>
              <div class="-menu-group single">
                <ul>
                  <li>
                    <a class="" href="/about/" target="_self">
                      <span>ほけんのぜんぶとは</span>
                    </a>
                  </li>
                  <li>
                    <a class="" href="/voice/" target="_self">
                      <span>お客様の声</span>
                    </a>
                  </li>
                  <li>
                    <a class="" href="/flow/" target="_self">
                      <span>お申込みの流れ</span>
                    </a>
                  </li>
                  <li>
                    <a class="" href="/faq/" target="_self">
                      <span>よくあるご質問</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="-footer-menu__item">
            <div class="-footer-menu__item-inner">
              <h3>目的から探す</h3>
              <div class="-menu-group single">
                <ul>
                  <li>
                    <a class="" href="/purpose/save/" target="_self">
                      <span>お金をためる</span>
                    </a>
                  </li>
                  <li>
                    <a class="" href="/purpose/protect/"
                      target="_self">
                      <span>お金をまもる</span>
                    </a>
                  </li>
                  <li>
                    <a class="" href="/purpose/use/" target="_self">
                      <span>お金をつかう</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="-footer-menu__item">
            <div class="-footer-menu__item-inner">
              <h3>お知らせ</h3>
              <div class="-menu-group single">
                <ul>
                  <li>
                    <a class="" href="/news/" target="_self">
                      <span>お知らせ</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="-footer-menu__item">
            <div class="-footer-menu__item-inner">
              <h3>その他</h3>
              <div class="-menu-group single">
                <ul>
                  <li>
                    <a class="" href="https://hoken-all.co.jp/hoken/" target="_blank">
                      <span>ほけんのぜんぶマガジン</span>
                    </a>
                  </li>
                  <li>
                    <a class="" href="https://hoken-all.co.jp/media/" target="_blank">
                      <span>くらしのぜんぶ</span>
                    </a>
                  </li>
                  <li>
                    <a class="" href="https://hoken-all.net/" target="_blank">
                      <span>おかねとほけん</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="-footer-menu__item-inner">
              <h3>株式会社ほけんのぜんぶ</h3>
              <div class="-menu-group single">
                <ul>
                  <li>
                    <a class="" href="https://company.hoken-all.co.jp/" target="_blank">
                      <span>コーポレートサイト</span>
                    </a>
                  </li>
                  <li>
                    <a class="" href="https://www.yourfamily.jp/" target="_blank">
                      <span>採用特設サイト</span>
                    </a>
                  </li>
                  <li>
                    <a class="" href="https://zenb-holdings.co.jp/" target="_blank">
                      <span>株式会社ZENB HOLDINGS</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="-footer-short">
      <div class="-footer-short__inner">
        <p class="-copy">© ほけんのぜんぶ. All Rights Reserved.</p>
        <ul class="-menu">
          <li>
            <a class="" href="https://company.hoken-all.co.jp/policy/" target="_blank">
              <span>企業方針</span>
            </a>
          </li>
          <li>
            <a class="" href="https://company.hoken-all.co.jp/policy/privacy-rule/" target="_blank">
              <span>個人情報の取扱いについて</span>
            </a>
          </li>
          <li>
            <a class="" href="https://company.hoken-all.co.jp/policy/privacy/" target="_blank">
              <span>プライバシーポリシー</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </footer>
  <script src="<?= $fileUrl  ?>/js/common.js"></script>
</body>
</html>