<?php

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
function my_custom_dashboard_widgets()
{
  global $wp_meta_boxes;
  wp_add_dashboard_widget('custom_help_widget', '管理画面から変更できる箇所', 'dashboard_text');
}


function add_admin_css(){
  echo '<link href="' . get_theme_root_uri() . '/global-assets/css/root.css" rel="stylesheet" type="text/css" />' ."\n";
  echo '<link href="' . assetsPath('css') . '/admin-editor.css" rel="stylesheet" type="text/css" />' ."\n";
}
add_action('admin_head', 'add_admin_css');


function dashboard_text()
{ ?>
  <style>
    #postbox-container-1 {
      width: 75% !important;
      min-height: 1000px !important;
    }
    #postbox-container-1 #normal-sortables {
      min-height: 100% !important;
    }
    #postbox-container-1 #normal-sortables .postbox {
      min-height: 100vh !important;
    }
  </style>

  <div class="block-editor-block-list__layout is-root-container ">
    <div class="-single-content">
      <?php
        $page_data = get_page_by_path('admin-0123'); $page = get_post($page_data);
          $content = $page -> post_content;
        echo $content;
      ?>
    </div>
  </div>
<?php }




