<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.6.1/css/iziModal.min.css" integrity="sha512-3c5WiuZUnVWCQGwVBf8XFg/4BKx48Xthd9nXi62YK0xnf39Oc2FV43lIEIdK50W+tfnw2lcVThJKmEAOoQG84Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.6.1/js/iziModal.min.js" integrity="sha512-lR/2z/m/AunQdfBTSR8gp9bwkrjwMq1cP0BYRIZu8zd4ycLcpRYJopB+WsBGPDjlkJUwC6VHCmuAXwwPHlacww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php lowerHead('', ''); ?>

<?php
$loop_voice = new WP_Query(array(
  'post_type'       => 'voice',
  'order'           => 'DESC',
  'posts_per_page'  => -1,
));
?>

<div class="-section-main">
  <div class="-section-inner">
    <div>
      <div class="p-voice-list">
        <?php
          while ($loop_voice->have_posts()) : $loop_voice->the_post();
            get_template_part('_section/voice/loop');
          endwhile;
        ?>
      </div>
    </div>
  </div>
</div>

<?php
  while ($loop_voice->have_posts()) : $loop_voice->the_post();
    get_template_part('_section/voice/loop@modal');
  endwhile;
?>

<script>
$(function() {
  $(".iziModal").iziModal({
    group: "voice",
    loop: true,
    width: 640, //横幅
    overlayColor: 'rgba(0, 0, 0, .5)',
    transitionIn: 'fadeInUp',
    transitionOut: 'fadeOutDown'
  });
})
</script>