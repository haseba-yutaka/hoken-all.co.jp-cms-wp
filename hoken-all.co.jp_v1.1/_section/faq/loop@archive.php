<div class="-item-faq">
  <div class="-item-faq__title js-ac-head">
    <span><?= the_title_attribute(''); ?></span>
    <i class="ph-bold ph-plus plus">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M13 6.5V11H17.5V13H13V17.5H11V13H6.5V11H11V6.5H13Z" fill="black"/>
      </svg>
    </i>
    <i class="ph-bold ph-minus minus">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M19 12.9961H5V10.9961H19V12.9961Z" fill="black"/>
      </svg>
    </i>
  </div>
  <div class="-item-faq__body js-ac-conts">
    <div class="-item-faq__bodyArchive">
      <div class="-archive-user">
        <img src="<?= assetsPath('img') ?>/faq/faq-user.webp" alt="" loading="lazy">
      </div>
      <div class="-archive-body">
        <?= the_content(''); ?>
      </div>
    </div>
  </div>
</div>