<?php
  $ACF_field_bgColor = get_field( $args['customField_bgColor'] );
  $ACF_field_padding = get_field( $args['customField_padding'] );

  switch ($ACF_field_bgColor) {
    case 0:
      echo '';
      break;
    case 1:
      echo '-bg-white';
      break;
    case 2:
      echo '-bg';
      break;
  }
  if ( $ACF_field_padding == '0' ) {
    echo "";
  } elseif ( $ACF_field_padding == '1' ) {
    echo " -padding-small";
  } elseif ( $ACF_field_padding == '2' ) {
    echo " -padding-0";
  } else {
    echo " ".$ACF_field_padding;
  }
