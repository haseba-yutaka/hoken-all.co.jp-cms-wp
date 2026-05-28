<div class="iziModal iziModal-<?= the_ID() ?>">
  <div class="iziModal-inner">
    <a class="-voice-close" data-izimodal-close>
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M7 7L17 17M7 17L17 7" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </a>
    <div class="-item-voice">
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
        <div class="-voice-body__content"><?= the_content(); ?></div>
      </div>
    </div>
  </div>
</div>