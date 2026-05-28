</main>

<?php
echo "<div class='" . $args['className'] . "'></div>";
if (get_field('o_cta1_footer_view', 'option') == 0) {
  if (
    !is_404() &&
    !is_page('form') &&
    !is_page('test-form') && // 一時的
    !is_page('form/complete') &&
    !is_post_type_archive('document') &&
    !is_singular('document')
  ) {
    get_template_part('_section/cta/01/block');
  }
}
?>

<?php if (!is_404()) { ?>
  <div class="breadcrumbs">
    <div class="breadcrumbs-inner">
      <?php if (!is_front_page() && !is_home()) : ?>
        <?php if (function_exists('bcn_display')) {
          bcn_display();
        } ?>
      <?php endif; ?>
    </div>
  </div>
<?php } ?>

<?php if (!is_singular('article')) : ?>
  <div class="-sp-header-body fixed-banner">
    <?php ctaBtn(); ?>
  </div>
<?php endif; ?>

<footer class="-footer" role="contentinfo">
  <div class="-footer-primary">
    <div class="-footer-primary__inner">
      <div class="-footer-logo">
        <a class="-logo" href="<?= home_url(); ?>/">
          <img src="<?= get_theme_root_uri(); ?>/global-assets/img/common/logo-white.svg" alt="<?= bloginfo('name'); ?>" loading="lazy">
        </a>
        <?php sns('@w', ''); ?>
      </div>
      <div class="-footer-body">
        <?php
        $company = get_field('o_common_company', 'option');
        $company_tel = get_field('o_common_company_tel', 'option');
        ?>
        <div class="-footer-body__head">
          <div class="-footer-body__info">
            <div class="-company">
              <p class="-footer-body__info-ttl">保険募集代理店</p>
              <?php if ($company['name']) : ?>
                <div class="-company-name"><?= $company['name'] ?></div>
              <?php endif; ?>
              <?php if ($company['address']) : ?>
                <div class="-company-address"><?= $company['address'] ?></div>
              <?php endif; ?>
            </div>
            <div class="-tel">
              <?php if ($company_tel['number']) : ?>
                <a class="-tel-number" href="tel:<?= $company_tel['number']; ?>"><?= $company_tel['number']; ?></a>
              <?php endif; ?>
              <?php if ($company_tel['reception_time']) : ?>
                <div class="-tel-receptionTime"><?= $company_tel['reception_time']; ?></div>
              <?php endif; ?>
            </div>
          </div>
          <div class="-footer-body__btn -btn-row -btn-col">
            <?php
            while (have_rows('o_footer_btn', 'option')) : the_row();
              acfLinkBtn();
            endwhile;
            ?>
            <?php
            // Contact branch page: link to the first page that uses the template, otherwise fallback.
            $contact_branch_url = '';
            $contact_branch_pages = get_pages([
              'meta_key' => '_wp_page_template',
              'meta_value' => 'page-contact-branch.php',
              'number' => 1,
              'post_status' => 'publish',
            ]);
            if ( ! empty( $contact_branch_pages ) ) {
              $contact_branch_url = get_permalink( $contact_branch_pages[0]->ID );
            }
            if ( ! $contact_branch_url ) {
              $contact_branch_url = home_url( '/contact/' );
            }
            ?>
            <a class="-btn -primary-line" href="<?= esc_url( $contact_branch_url ); ?>">
              <span>お問合せ</span>
            </a>
          </div>
        </div>
        <div class="-footer-menu__row">
          <?php while (have_rows('o_footer_menu', 'option')) : the_row(); ?>
            <div class="-footer-menu__item">
              <?php while (have_rows('menuGroup', 'option')) : the_row(); ?>
                <div class="-footer-menu__item-inner">
                  <h3><?= get_sub_field('menuHead'); ?></h3>
                  <?php if (get_sub_field('menuType') == 0) : ?>
                    <div class="-menu-group single">
                      <ul>
                        <?php
                        while (have_rows('menuSingleRepeat')) : the_row();
                          echo "<li>";
                          acfLink('');
                          echo "</li>";
                        endwhile;
                        ?>
                      </ul>
                    </div>
                  <?php endif; ?>
                  <?php if (get_sub_field('menuType') == 1) : ?>
                    <?php while (have_rows('menuMultipleRepeat')) : the_row(); ?>
                      <div class="-menu-group multiple">
                        <h4><?= get_sub_field('repeatHead'); ?></h4>
                        <ul>
                          <?php
                          while (have_rows('repeatMenu')) : the_row();
                            echo "<li>";
                            acfLink('');
                            echo "</li>";
                          endwhile;
                          ?>
                        </ul>
                      </div>
                    <?php endwhile; ?>
                  <?php endif; ?>
                </div>
              <?php endwhile; ?>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
    <div class="-footer-primary__under">
      <div class="-footer-logo sp-only"></div>
      <ul class="-footer-primary__business-list">
        <li class="-footer-primary__business-item">
          <p class="-footer-primary__business-name">労働者派遣事業</p>
          <p class="-footer-primay__business-number">厚生労働大臣許可番号：派13-309121</p>
        </li>
        <li class="-footer-primary__business-item">
          <p class="-footer-primary__business-name">有料職業紹介事業</p>
          <p class="-footer-primay__business-number">厚生労働大臣許可番号：13-ユ-303854</p>
        </li>
        <li class="-footer-primary__business-item">
          <p class="-footer-primary__business-name">金融商品仲介業</p>
          <p class="-footer-primay__business-number">登録番号：関東財務局長（金仲）第1051号</p>
        </li>
      </ul>
    </div>
  </div>
  <div class="-footer-short">
    <div class="-footer-short__inner">
      <p class="-copy"><?= get_field('o_footer_copyright', 'option'); ?></p>
      <ul class="-menu">
        <?php
        while (have_rows('o_footer_menu_sub', 'option')) : the_row();
          echo "<li>";
          acfLink('');
          echo "</li>";
        endwhile;
        ?>
      </ul>
    </div>
  </div>
</footer>

<?php
get_template_part('_include/food');
wp_footer();
?>

</body>

</html>
