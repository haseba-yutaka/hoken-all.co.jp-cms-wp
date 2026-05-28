<?php
  $ACF_field = get_field( $args['customField_Head'] );
  $textHead = $ACF_field;

  if( $ACF_field ) : ?>
  <div class="-section-header__head <?= $args['className'] ?>">
    <?php if ( $textHead['title'] ) : ?>
      <h2 class="-head-title">
        <span><?= $textHead['title'] ?></span>
      </h2>
    <?php endif; ?>
    <?php if( $textHead['description'] ) : ?>
      <div class="-head-description">
        <?= $textHead['description'] ?>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>