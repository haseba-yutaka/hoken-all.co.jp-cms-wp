<?php
  wp_reset_postdata();
  $http = is_ssl() ? 'https://' : 'http://' . '://';
  $url = $http . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

  $page_id = get_page_by_path('index'); // トップのタイトル取得
  $page = get_post( $page_id );
  $siteTitle = $page->post_title;
?>

<div class=" <?= $args['className']; ?>">
  <a class="sns-btn__item -facebook" href="javascript:void(0);" onclick="window.open('https://www.facebook.com/share.php?u=<?= $url; ?>&t=<?= siteTitle(); ?>' , 'facebook_share', 'width=540, height=480, personalbar=0, toolbar=0, scrollbars=1, resizable=1'); return false;">
    <img src="<?= get_theme_root_uri(); ?>/global-assets/img/icon-sns/facebook.svg" alt="facebook" loading="lazy">
  </a>
  <a class="sns-btn__item -x" href="https://twitter.com/intent/tweet?url=<?= $url; ?>%0a&amp;text=<?php if ( is_single() ) : ?><?= siteTitle(); ?><?php else : ?><?= $siteTitle; ?><?php endif; ?>" onclick="window.open(encodeURI(decodeURI(this.href)), 'tweetwindow', 'width=540, height=480, left=50, top=50, personalbar=0, toolbar=0, scrollbars=1, sizable=1'); return false;" target="_blank" rel="nofollow">
    <img src="<?= get_theme_root_uri(); ?>/global-assets/img/icon-sns/X.svg" alt="X" loading="lazy">
  </a>
  <a class="sns-btn__item -line" href="javascript:void(0);" onclick="window.open('https://social-plugins.line.me/lineit/share?url=<?= $url; ?>','_blank', 'width=540, height=480, left=50, top=50, scrollbars=1, resizable=1',0); return false;">
  <img src="<?= get_theme_root_uri(); ?>/global-assets/img/icon-sns/LINE.svg" alt="LINE" loading="lazy">
  </a>
  <a class="sns-btn__item -hatena" href="//b.hatena.ne.jp/add?mode=confirm&amp;url=<?= $url; ?>&amp;title=<?= siteTitle(); ?>" target="_blank" data-hatena-bookmark-title="<?= $url; ?>">
    <img src="<?= get_theme_root_uri(); ?>/global-assets/img/icon-sns/hatena.svg" alt="hatena" loading="lazy">
  </a>
  <?php /*
  <a class="sns-btn__item -pocket" href="//getpocket.com/edit?url=<?= $url; ?>" target="_blank">
    <img src="<?= get_theme_root_uri(); ?>/global-assets/img/icon-sns/pocket.svg" alt="pocket" loading="lazy">
  </a>
  */ ?>
</div>