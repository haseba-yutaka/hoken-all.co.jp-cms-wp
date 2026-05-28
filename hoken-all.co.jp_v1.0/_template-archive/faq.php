<?php lowerHead('', ''); ?>

<div class="-section-main">
  <div class="-section-inner">
    <div>
      <?php
        $loop_faq = new WP_Query(array(
          'post_type'       => 'faq',
          'order'           => 'DESC',
          'posts_per_page'  => -1,
        ));
        while ($loop_faq->have_posts()) : $loop_faq->the_post();
          get_template_part('_section/faq/loop@archive');
        endwhile;
      ?>
    </div>
  </div>
</div>