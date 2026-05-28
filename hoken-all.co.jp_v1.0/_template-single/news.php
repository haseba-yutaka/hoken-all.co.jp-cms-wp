<div class="-section-headLower">
  <div class="-section-headLower-inner -section-inner">
    <?php
      echo_taxonomy_as_ul('news_category');
    ?>
    <h1 class="-head-title" data-text-en="">
      <span><?= the_title(); ?></span>
    </h1>
  </div>
</div>

<div class="-section-main pb0">
  <div class="-section-inner -middle">
    <div class="single-head_v1">
      <?php
        // echo_taxonomy_as_ul('news_category');
      ?>
      <?php /*
      <h1 class="single-head__title">
        <?= the_title(); ?>
      </h1>
      */ ?>
      <div class="single-head__meta mt0">
        <?php updateBlack(''); ?>
        <div class="single-head__sns">
          <span class="-title">記事を共有する</span>
          <?php
            $args = [
              'className' => '-sns',
            ];
            get_template_part('_include/inc-sns', null, $args);
          ?>
        </div>
      </div>
    </div>
    <?php if (has_post_thumbnail()) : ?>
      <div class="single-head__thumb">
        <img src="<?php the_post_thumbnail_url('thumb-large'); ?>" alt="<?= the_title_attribute(); ?>の画像" class="image" loading="lazy">
      </div>
    <?php endif; ?>
    <div class="single-content__body">
      <div class="-single-content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
  <?php
    global $post;
    $newsArray = array(
      'numberposts' => 3,
      'post_type' => 'news',
      'taxonomy' => 'news_category',
      'post__not_in' => array($post->ID)
    );
    $newsPosts = get_posts($newsArray);
  ?>
  <?php if($newsPosts) : ?>
    <div class="-section-inner -middle mt12">
      <div class="single-head_v1">
        <h2 class="single-head__title">
          <span>関連の<?= esc_html(get_post_type_object('news')->label); ?></span>
        </h2>
      </div>
      <div class="mt5">
        <?php
          foreach($newsPosts as $post) : setup_postdata($post);
            get_template_part('_section/news/loop');
          endforeach;
          wp_reset_postdata();
        ?>
      </div>
      <div class="-btn-row mt6">
        <a href="<?= get_post_type_archive_link('news') ?>" class="-btn -primary">
          <span><?= esc_html(get_post_type_object('news')->label); ?>一覧</span>
        </a>
      </div>
    </div>
  <?php endif; ?>
</div>