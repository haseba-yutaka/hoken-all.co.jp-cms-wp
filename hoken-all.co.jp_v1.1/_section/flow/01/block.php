<?php
  $className = isset($block['className']) ? $block['className'] : '';
?>
<section id="flow" class="
  <?= esc_attr($className); ?>
  -section-main
  -section-flow
  <?php
    $args = [
      'customField_bgColor' => 'b_flow_bg_color',
      'customField_padding' => 'b_flow_padding',
    ];
    get_template_part('_section/_sectionStyle', null, $args);
  ?>
  ">
  <div class="-section-inner -section-flow__inner">
    <?php
      $args = [
        'className' => '',
        'customField_Head' => 'b_flow_head',
      ];
      get_template_part('_section/_sectionHead', null, $args);
    ?>
    <div>
      <div class="-block-flow-list">
        <?php while (have_rows('b_flow_list')) : the_row(); ?>
          <div class="-block-flow-item">
            <div class="-flow-step__label">
              <small><?= get_sub_field('step_en'); ?></small>
              <span><?= get_sub_field('step_number'); ?></span>
            </div>
            <div class="-flow-step__body">
              <div class="-info-inner">
                <h3 class="-title"><?= get_sub_field('step_title'); ?></h3>
                <div class="-description">
                  <?= get_sub_field('step_description'); ?>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</section>
