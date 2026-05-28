<?php // ACF LINK ?>
<?php function acfLink($className) { ?>
  <?php
    $link = get_sub_field('link');
    if( $link ):
      $link_url = $link['url'];
      $link_title = $link['title'];
      $link_target = $link['target'] ? $link['target'] : '_self';
  ?>
    <a class="<?= $className; ?>" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
      <span><?= esc_html( $link_title ); ?></span>
    </a>
  <?php endif; ?>
<?php } ?>


<?php // ACF LINK IMAGE ?>
<?php function acfLinkImage($className) { ?>
  <?php
    $link = get_sub_field('link');
    $image = get_sub_field('image');
    if( $link ):
      $link_url = $link['url'];
      $link_title = $link['title'];
      $link_target = $link['target'] ? $link['target'] : '_self';
  ?>
    <a class="<?= $className; ?>" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
      <img src="<?= $image['url'] ?>" alt="<?= esc_html( $link_title ); ?>" loading="lazy">
    </a>
  <?php endif; ?>
<?php } ?>


<?php // ACF BTN LINK ?>
<?php function acfLinkBtn() { ?>
  <?php
    $link = get_sub_field('link');
    $btnStyle = get_sub_field('style');
    if( $link ):
      $link_url = $link['url'];
      $link_title = $link['title'];
      $link_target = $link['target'] ? $link['target'] : '_self';
  ?>
  <a class="-btn
  <?php
    if ( $btnStyle == '0' ) {
      echo "-primary";
    } elseif ( $btnStyle == '1' ) {
      echo "-primary-line";
    } else {
      echo $btnStyle;
    }
  ?>" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
    <span><?= esc_html( $link_title ); ?></span>
  </a>
  <?php endif; ?>
<?php } ?>


<?php // CTA BTN ?>
<?php function ctaBtn() { ?>
  <div class="-btn-row">
    <a class="-btn -contact -blue" href="tel:0120-20-8000">
      <small>いますぐ！電話相談する</small>
      <span class="ff-e">0120-20-8000</span>
    </a>
    <a class="-btn -tel" href="<?= home_url(); ?>/form/">
      <small>お金のプロに直接相談</small>
      <span>無料相談を予約</span>
    </a>
  </div>
<?php } ?>


<?php // SNS ?>
<?php
  function sns($color, $className) {
    $sns = get_field('o_common_sns', 'option');
?>
  <div class="-sns <?= $className; ?>">
    <?php if( $sns['instagram'] ) : ?>
      <a class="instagram" href="<?= $sns['instagram'] ?>" target="_blank" rel="noopener noreferrer">
        <img src="<?= get_theme_root_uri(); ?>/global-assets/img/icon-sns/instagram<?= $color ?>.svg" alt="instagram" loading="lazy">
      </a>
    <?php endif; ?>
    <?php if( $sns['line'] ) : ?>
      <a class="line" href="<?= $sns['line'] ?>" target="_blank" rel="noopener noreferrer">
        <img src="<?= get_theme_root_uri(); ?>/global-assets/img/icon-sns/LINE<?= $color ?>.svg" alt="LINE" loading="lazy">
      </a>
    <?php endif; ?>
    <?php if( $sns['facebook'] ) : ?>
      <a class="facebook" href="<?= $sns['facebook'] ?>" target="_blank" rel="noopener noreferrer">
        <img src="<?= get_theme_root_uri(); ?>/global-assets/img/icon-sns/facebook<?= $color ?>.svg" alt="facebook" loading="lazy">
      </a>
    <?php endif; ?>
    <?php if( $sns['twitter'] ) : ?>
      <a class="twitter" href="<?= $sns['twitter'] ?>" target="_blank" rel="noopener noreferrer">
        <img src="<?= get_theme_root_uri(); ?>/global-assets/img/icon-sns/X<?= $color ?>.svg" alt="X" loading="lazy">
      </a>
    <?php endif; ?>
    <?php if( $sns['youtube'] ) : ?>
      <a class="youtube" href="<?= $sns['youtube'] ?>" target="_blank" rel="noopener noreferrer">
        <img src="<?= get_theme_root_uri(); ?>/global-assets/img/icon-sns/youtube<?= $color ?>.svg" alt="youtube" loading="lazy">
      </a>
    <?php endif; ?>
    <?php if( $sns['tiktok'] ) : ?>
      <a class="tiktok" href="<?= $sns['tiktok'] ?>" target="_blank" rel="noopener noreferrer">
        <img src="<?= get_theme_root_uri(); ?>/global-assets/img/icon-sns/tiktok<?= $color ?>.svg" alt="tiktok" loading="lazy">
      </a>
    <?php endif; ?>
  </div>
<?php } ?>


<?php // 下層ページ、タイトル ?>
<?php function lowerHead($slug, $subText) { ?>
  <?php
    $queried_object = get_queried_object();
    $post_type_query_var = '';
    if ( isset( $queried_object->taxonomy ) ) {
      $taxonomy = get_taxonomy( $queried_object->taxonomy );
      if ( $taxonomy && !empty( $taxonomy->object_type ) ) {
        $post_types = $taxonomy->object_type;
        $post_type_query_var = reset( $post_types );
      }
    } elseif ( is_post_type_archive() ) {
      $post_type_query_var = get_post_type();
    }
    $post_type_obj = get_post_type_object( $post_type_query_var );
    $post_type_name = $post_type_obj->labels->singular_name ?? $post_type_query_var;
  ?>
  <div class="-section-headLower <?= esc_attr( $slug ); ?>">
    <div class="-section-headLower-inner -section-inner">
      <h1 class="-head-title" data-text-en="<?php
      if ( is_page() ) :
        global $post;
        echo $slug = $post->post_name;
      elseif ( is_tax() || is_tag() ) :
        echo esc_attr( $post_type_query_var );
      elseif ( is_post_type_archive() ) :
        echo esc_attr( $post_type_query_var );
      else :
      endif;
      ?>">
        <span>
          <?php
            // ページタイトルの表示
            if ( is_page() ) :
              the_title();
            endif;

            // 投稿タイプ名のエスケープ処理と表示
            echo esc_html( $post_type_name );

            // タグまたはタクソノミーのタイトルの表示
            if ( is_tax() || is_tag() ) {
              echo '<small>' . single_term_title('', false) . '</small>';
            }

            // サブテキストがあれば表示
            if( $subText ) :
              echo "<small>$subText</small>";
            endif;

            // 月別アーカイブの場合の年月の表示
            if( is_month() ) {
              echo '<small>' . get_the_time("Y年m月") . '</small>';
            }
          ?>
        </span>
      </h1>
    </div>
  </div>
<?php } ?>


<?php // 詳細、カテゴリ表示 ?>
<?php
function get_taxonomy_terms($slug) {
  global $post;
  return get_the_terms($post->ID, $slug);
}
function echo_taxonomy_as_ul($slug) {
  $terms = get_taxonomy_terms($slug);
  if ($terms) {
    echo '<ul class="post-categories">';
    foreach ($terms as $term) {
      $term_link = get_term_link($term);
      echo '<li><a href="' . esc_url($term_link) . '">' . esc_html($term->name) . '</a></li>';
    }
    echo '</ul>';
  }
}
function echo_taxonomy_as_links($slug) {
  $terms = get_taxonomy_terms($slug);
  if ($terms) {
    foreach ($terms as $term) {
      $term_link = get_term_link($term);
      echo '<a href="' . esc_url($term_link) . '">' . esc_html($term->name) . '</a>';
    }
  }
}
function echo_taxonomy_as_text($slug) {
  $terms = get_taxonomy_terms($slug);
  if ($terms) {
    foreach ($terms as $term) {
      echo '<span class="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</span>';
    }
  }
}
function echo_taxonomy_slugs($slug) {
  $terms = get_taxonomy_terms($slug);
  if ($terms) {
    foreach ($terms as $term) {
      echo ' ' . esc_html($term->slug);
    }
  }
}
?>



<?php // アップデート ?>
<?php function updateBlack($slug) { ?>
  <div class="single-head__update <?= $slug; ?>">
    <time class="date-calendar" datetime="<?= get_the_date('Y-n-j'); ?>" itemprop="datePublished">
      <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_3279:5724)">
          <path d="M0.267857 4.78571H9.73214C9.87946 4.78571 10 4.90625 10 5.05357V9.19048C10 9.78199 9.52009 10.2619 8.92857 10.2619H1.07143C0.479911 10.2619 0 9.78199 0 9.19048V5.05357C0 4.90625 0.120536 4.78571 0.267857 4.78571ZM10 3.80357V3C10 2.40848 9.52009 1.92857 8.92857 1.92857H7.85714V0.767857C7.85714 0.620536 7.73661 0.5 7.58929 0.5H6.69643C6.54911 0.5 6.42857 0.620536 6.42857 0.767857V1.92857H3.57143V0.767857C3.57143 0.620536 3.45089 0.5 3.30357 0.5H2.41071C2.26339 0.5 2.14286 0.620536 2.14286 0.767857V1.92857H1.07143C0.479911 1.92857 0 2.40848 0 3V3.80357C0 3.95089 0.120536 4.07143 0.267857 4.07143H9.73214C9.87946 4.07143 10 3.95089 10 3.80357Z" fill="#85898C"/>
        </g>
        <defs>
          <clipPath id="clip0_3279:5724">
            <rect width="10" height="10" fill="white" transform="translate(0 0.5)"/>
          </clipPath>
        </defs>
      </svg>
      <?= get_the_date('Y.n.j'); ?>
      <?= upDate(); ?>
    </time>
    <?php if(get_the_time('U') !== get_the_modified_time('U')) : ?>
      <time class="date-update" datetime="<?= the_modified_date('Y-m-d'); ?>" itemprop="dateModified">
        <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g clip-path="url(#clip0_3279:5719)">
            <path d="M4.99111 0.656258C3.6968 0.658582 2.52162 1.16862 1.654 1.99776L0.956465 1.30022C0.661152 1.00491 0.15625 1.21405 0.15625 1.63167V4.25001C0.15625 4.50889 0.366113 4.71876 0.625 4.71876H3.24334C3.66096 4.71876 3.8701 4.21386 3.5748 3.91854L2.75938 3.10311C3.36219 2.53868 4.14221 2.22602 4.9709 2.21888C6.77555 2.20329 8.29674 3.66374 8.28113 5.52829C8.26633 7.29706 6.83234 8.78126 5 8.78126C4.19674 8.78126 3.43756 8.49458 2.83926 7.96962C2.74662 7.88835 2.60672 7.89329 2.51957 7.98042L1.74492 8.75507C1.64977 8.85022 1.65447 9.00536 1.75434 9.09555C2.61324 9.87136 3.75145 10.3438 5 10.3438C7.67512 10.3438 9.84373 8.17514 9.84375 5.50005C9.84377 2.828 7.66316 0.651473 4.99111 0.656258Z" fill="#85898C"/>
          </g>
          <defs>
            <clipPath id="clip0_3279:5719">
              <rect width="10" height="10" fill="white" transform="translate(0 0.5)"/>
            </clipPath>
          </defs>
        </svg>
        <?= the_modified_date('Y.n.j'); ?>
      </time>
    <?php endif; ?>
  </div>
<?php } ?>