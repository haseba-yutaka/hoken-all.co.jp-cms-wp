<?php
  session_start();
  get_template_part('_include/function-molecule');

// UTMパラメータのキーとセッション内の保存名
$utm_params = [
  'utm_source'   => 'url_utm_source',
  'utm_medium'   => 'url_utm_medium',
  'utm_term'     => 'utm_term',
  'utm_campaign' => 'url_utm_campaign',
  'utm_content'  => 'url_utm_content',
];

foreach ($utm_params as $getKey => $sessionKey) {
  if (isset($_GET[$getKey])) {
      $new_value = $_GET[$getKey];
      $current_value = $_SESSION['referer'][$sessionKey] ?? null;

      // 初回または値が変更されたときのみ更新
      if ($current_value === null || $current_value !== $new_value) {
          $_SESSION['referer'][$sessionKey] = sanitize_text_field($new_value);
      }
  }
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_template_part('_include/head'); ?>
<body <?php bodyAddClass(); ?>>


<?php /* if ( is_front_page() && current_user_can('administrator') ): //モーダル追加(管理者限定) */?>
<?php if ( is_front_page()): //モーダル追加 ?>
<style>

.bnr__promotion {
  display: none; /* 最初は非表示 */
	position: fixed;
	right: 50px;
	bottom: 40px;
	z-index: 10000;
}

.bnr__promotion-btn {
	cursor: pointer;
	position: absolute;
	top: -12px;
	right: -12px;
	z-index: 10;
	transition-duration: .3s;
}
.bnr__promotion-btn img{
  width: 32px;
  height: 32px;
}

.bnr__promotion-img {
	filter: drop-shadow(0 10px 20px rgba(0, 0, 0, .15));
	transition-duration: .3s;
}
.bnr__promotion-img img {
  width: 280px;
}

.bnr__promotion #close {
	display: none;
}

/* .bnr__promotion #close:checked~.bnr__promotion-btn,
.bnr__promotion #close:checked~.bnr__promotion-img {
	opacity: 0;
	visibility: hidden;
} */

.bnr__promotion__detail {
	background: #fff;
	padding: 20px;
	text-align: center;
}


.remodal.movie {
	max-width: 860px;
	padding: 0;
}

.remodal.movie .remodal-close {
    top: -45px;
    right: -5px;
    left: auto;
}

.remodal.movie .remodal-close:before {
	font-size: 48px;
}

.remodal.movie .remodal__area {
	width: 100%;
	height: 0;
	padding-top: 68.4%;
	position: relative;
}

.remodal.movie .remodal__area:hover {
  opacity: .85;
}


.remodal.movie .remodal__area img {
	width: 100%;
	height: 100%;
	position: absolute;
	top: 0;
	left: 0;
}

.remodal-is-locked .bnr__promotion{
  display: none;
}

@media screen and (max-width: 768px) {

  .bnr__promotion{
    right: 0;
    bottom:72px;
  }
  .bnr__promotion-img img {
    width: 100%;
  }
  .bnr__promotion-btn{
    display: none;
  }
  .remodal.movie {
    width: 90%;
    margin: 0 auto;
  }
  .remodal.movie .remodal__area {
	padding-top: 114%;
}
}

</style>

<?php /*
<div class="bnr__promotion">
    <input type="checkbox" name="close" id="close">
    <!-- <label for="close" class="bnr__promotion-btn"><img src="<?= get_template_directory_uri(); ?>/assets/img/top/icon_close.svg" alt="閉じる"></label> -->
    <a href="#promotion" class="bnr__promotion-img">
      <picture>
          <source media="(max-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/assets/img/top/bnr_promotion_tham-sp.jpg">
          <img src="<?= get_template_directory_uri(); ?>/assets/img/top/bnr_promotion_tham.jpg" alt="">
      </picture>
    </a>
    <div class="remodal movie" data-remodal-id="promotion">
        <button data-remodal-action="close" class="remodal-close"></button>
        <div class="remodal__area">
          <a href="https://hoken-all.co.jp/campaign/anniversary_20th/" target="_blank">
            <picture>
              <source media="(max-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/assets/img/top/bnr_promotion-sp.jpg">
              <img src="<?= get_template_directory_uri(); ?>/assets/img/top/bnr_promotion.jpg" alt="">
            </picture>
          </a>
        </div>
    </div>
</div>
*/?>



<script>
jQuery(function($){
  var $bnr = $('.bnr__promotion');
  var $footer = $('.-footer'); // フッター要素
  var SEEN_KEY = 'promotion_seen_v2'; // バージョンを上げれば全員に再度1回だけ表示

  // ---------- Cookieユーティリティ（セッションCookie） ----------
  function getCookie(name){
    var m = document.cookie.split('; ').find(r => r.startsWith(name + '='));
    return m ? decodeURIComponent(m.split('=')[1]) : undefined;
  }
  function setSessionCookie(name, val){
    var attrs = '; path=/; SameSite=Lax';
    if (location.protocol === 'https:') attrs += '; Secure';
    document.cookie = name + '=' + encodeURIComponent(val) + attrs; // expires/Max-Age なし=セッションCookie
  }

  // ---------- Remodal インスタンス ----------
  var modalInst = null;
  if ($('[data-remodal-id="promotion"]').length && $.fn.remodal) {
    modalInst = $('[data-remodal-id="promotion"]').remodal();
  }

  // ---------- 初回のみ自動オープン（セッション中は再表示なし） ----------
  if (modalInst && getCookie(SEEN_KEY) !== '1') {
    setTimeout(function(){
      try { modalInst.open(); } catch(e){}
    }, 200);
  }

  // モーダルを閉じたら「表示済み」を記録（×ボタン/オーバーレイなど問わず）
  $(document).on('closed', '.remodal', function (e) {
    if ($(e.target).is('[data-remodal-id="promotion"]')) {
      setSessionCookie(SEEN_KEY, '1');
    }
  });

  // ---------- 右下バナーの表示/非表示（フッターが見えたら消す） ----------
  $(window).on('scroll resize', function(){
    var scrollTop = $(this).scrollTop();
    var winHeight = $(this).height();
    var footerTop = $footer.length ? $footer.offset().top : Infinity;
    var footerVisible = (scrollTop + winHeight) > footerTop;

    if (scrollTop > 200 && !footerVisible) {
      $bnr.fadeIn();
    } else {
      $bnr.fadeOut();
    }
  }).trigger('scroll'); // 初期判定
});
</script>




<?php endif; ?>
	
<header role="banner" class="js-header">
  <div class="-header-main">
    <div class="-header-main__logo">
      <a class="-logo" href="<?= home_url(); ?>/">
        <img class="-logo-main" src="<?= get_theme_root_uri(); ?>/global-assets/img/common/logo-main.svg" alt="<?= bloginfo('name'); ?>" loading="lazy">
        <img class="-logo-white" src="<?= get_theme_root_uri(); ?>/global-assets/img/common/logo-white.svg" alt="<?= bloginfo('name'); ?>" loading="lazy">
      </a>
    </div>
    <div class="-header-main__inner">
      <?php
        $args = [
          'classBody' => '-header-nav',
          'classPulldown' => '-pulldown-menu',
          'classItem' => '-header-nav__item',
          'classItemLink' => '-header-nav__item-link',
        ];
        get_template_part('_include/inc-menu', null, $args);
      ?>
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
  <?php
    $args = [
      'classBody' => '-header-sp-nav',
      'classPulldown' => '-sp-item__body',
      'classItem' => '-sp-item',
      'classItemLink' => '-sp-item__head',
    ];
    get_template_part('_include/inc-menu', null, $args);
  ?>
</div>
<div class="header-height"></div>

<main role="main" class="js-main">