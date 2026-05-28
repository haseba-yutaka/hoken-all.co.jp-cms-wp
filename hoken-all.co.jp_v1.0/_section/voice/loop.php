<div class="-item-voice" data-izimodal-open=".iziModal-<?= the_ID() ?>">
  <div class="-voice-head">
    <?php
      $avatar = get_field('voice_avatar_icon');
      if ($avatar >= 1 && $avatar <= 9) : ?>
        <img src="<?= assetsPath('img') ?>/voice/voice-img-<?= $avatar ?>.webp" alt="" loading="lazy">
    <?php endif; ?>
    <h3 class="-item-voice__title">
      <?= the_title_attribute(''); ?>
      <small class="-age"><?= get_field('voice_age'); ?></small>
    </h3>
  </div>
  <div class="-voice-body">
    <div class="-voice-body__content"><?= wp_trim_words( get_the_content(), 50, '…' ); ?></div>
  </div>
  <div class="-btn-row mt2">
    <div class="-btn w-full">
      <span>続きを読む</span>
    </div>
  </div>
</div>