<?php

//「Wordpress本体」の自動更新メール通知を停止する
add_filter('auto_core_update_send_email' , '__return_false');

// 「プラグイン」の自動更新メール通知を停止する
add_filter( 'auto_plugin_update_send_email', '__return_false' );

// 「テーマ」の自動更新メール通知を停止する
add_filter( 'auto_theme_update_send_email', '__return_false' );


// アップロードした画像のwidth height 削除
function remove_width_attribute($html)
{
    $html = preg_replace('/(width|height)="\d*"\s/', "", $html);
    return $html;
}
add_filter("post_thumbnail_html", "remove_width_attribute", 10);
add_filter("image_send_to_editor", "remove_width_attribute", 10);
// END


// ユーザープロフィールの項目のカスタマイズ
function my_user_meta($wb) {
    //項目の追加例
    $wb['X(twitter)'] = 'X(Twitter)';
    $wb['facebook'] = 'Facebook';
    $wb['instagram'] = 'Instagram';
    $wb['youtube'] = 'YouTube';
    $wb['note'] = 'Note';
    return $wb;
}
add_filter('user_contactmethods', 'my_user_meta', 10, 1);
// END


// サムネイルの有効化
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_image_size('thumb-large', 1082, 672, false);
    add_image_size('thumb-default', 740, 460, false);
    add_image_size('thumb-small', 340, 212, false);
};
// END


// pass
function assetsPath($pass) {
    return get_template_directory_uri() . "/assets/" . $pass;
}

function urlPath($url) {
    return home_url($url);
}
// END


function bodyAddClass() { ?>
    <?php if ( is_front_page() || is_home() || is_page('index') ) : ?>
        id="body-index"
    <?php else : ?>
        id="body-lower"
    <?php endif; ?>
    <?= body_class(); ?>
<?php }


// サイトタイトル
function siteTitle() {
    global $page, $paged;
    wp_title('|', true, 'right');
    // bloginfo('name');
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page()))
        echo " | $site_description";
    if ($paged >= 2 || $page >= 2)
        echo ' | ' . sprintf(__('Page %s', 'enigma'), max($paged, $page));
}
// END


// wp_list_categories
function filter_to_wp_list_categories($output, $args) {
    $output = preg_replace('/<\/a>\s*\((\d+)\)/', '<span>$1</span></a>', $output);
    return $output;
}
add_filter('wp_list_categories', 'filter_to_wp_list_categories', 10, 2);
// END


// 日本語のスラッグ名を自動変更
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( 'page' ) . '-' . $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4 );
// END


// ブロックエディタ 不要なボタン非表示
add_action( 'enqueue_block_editor_assets', 'my_plugin_deny_list_blocks' );
function my_plugin_deny_list_blocks() {
    wp_enqueue_script(
        'my-plugin-deny-list-blocks',
        // 不要な共有ボタン非表示
        get_template_directory_uri(). '/functions/admin/gutenberg.js',
        array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' )
    );
}

// パターン非表示
add_filter('should_load_remote_block_patterns', function () {
    return false;
});
// END



// いらないメタタグ削除
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);	//絵文字
remove_action('wp_print_styles', 'print_emoji_styles');		//絵文字
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
add_action('wp_enqueue_scripts', 'remove_block_library_style');

add_theme_support( 'disable-custom-gradients' ); // ブロックエディタ、グラデーション


function remove_block_library_style() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles');
}
// END


// 日付にUPDATA 日を表示
function upDate() {
    $days			= 7;
    $daysInt 		= ($days - 1) * 86400;
    $today 			= time();
    $entry 			= get_the_time('U');
    $dayago 		= $today - $entry;
    if ($dayago < $daysInt) {
        echo '
        <span class="new">NEW</span>';
    }
}
// END


// 投稿一覧 マーマリンク表示
function add_permalink_column($columns) {
    $columns['permalink'] = 'パーマリンク';
    return $columns;
}
function display_permalink_column($column_name, $post_id) {
    if ($column_name == 'permalink') {
        $permalink = get_permalink($post_id);
        if ($permalink) {
            echo "<a href='{$permalink}' target='_blank'>{$permalink}</a>";
        } else {
            echo __('None');
        }
    }
}
// 投稿にパーマリンクカラムを追加
add_filter('manage_posts_columns', 'add_permalink_column');
add_action('manage_posts_custom_column', 'display_permalink_column', 10, 2);
// ページにパーマリンクカラムを追加
add_filter('manage_pages_columns', 'add_permalink_column');
add_action('manage_pages_custom_column', 'display_permalink_column', 10, 2);
// END


// タグ: カテゴリ: 削除
add_filter( 'get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('',false);
    } elseif (is_tag()) {
        $title = single_tag_title('',false);
    } elseif (is_tax()) {
        $title = single_term_title('',false);
    } elseif (is_post_type_archive() ){
        $title = post_type_archive_title('',false);
    } elseif (is_date()) {
        $title = get_the_time('Y年n月');
    } elseif (is_search()) {
        $title = '検索結果：'.esc_html( get_search_query(false) );
    } elseif (is_404()) {
        $title = '「404」ページが見つかりません';
    } else {

    }
    return $title;
});
// END


// カテゴリ使いまわし
function terms_category($post_id, $taxonomy) {
    $terms = get_the_terms($post_id, $taxonomy);
    if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            if (!empty($term->name)) {
                echo "<span class=\"{$term->slug}\">{$term->name}</span>";
            }
        }
    }
}
// 使い方
// $current_post_id = get_the_ID();
// terms_category($current_post_id, 'document_category');
// END


// ブロックエディタで、<section> を使用した場合、
function wrap_all_tags_with_div( $content ) {
    $tags = array(
        // 'th',
        'section'
    );
    foreach ( $tags as $tag ) {
        $content = preg_replace(
            '/(<' . $tag . '.*?>)(.*?)(<\/' . $tag . '>)/si',
            '<div class="-no-style">$1$2$3</div>',
            $content
        );
    }
    return $content;
}
add_filter( 'the_content', 'wrap_all_tags_with_div', 10 );



// -------------------------------
// wordpress プラグイン
// -------------------------------

// ページャー
function wp_plugin_pager() { ?>
    <?php wp_pagenavi(); ?>
<?php }
// END


// CSS 読み込み無効
function dp_deregister_styles() {
    if ( !is_admin() ) {
        wp_deregister_style('monsterinsights-vue-frontend-style');
        wp_dequeue_style('monsterinsights-vue-frontend-style');

        // jetpack
        wp_deregister_style('mediaelement');
        wp_dequeue_style('mediaelement');

        wp_deregister_style('jetpack_css');
        wp_dequeue_style('jetpack_css');

        wp_deregister_style('jetpack_css-css');
        wp_dequeue_style('jetpack_css-css');

        // wp_deregister_style('dashicons');
        // wp_dequeue_style('dashicons');

        // wp_deregister_style('admin-bar');
        // wp_dequeue_style('admin-bar');

        wp_deregister_style('wpcom-notes-admin-bar');
        wp_dequeue_style('wpcom-notes-admin-bar');

        wp_deregister_style('noticons');
        wp_dequeue_style('noticons');

        wp_deregister_style('wpp-loading-animation-styles');
        wp_dequeue_style('wpp-loading-animation-styles');

        // wp_deregister_style('lwptoc-main');

        if ( !is_single() ) {
            wp_deregister_style('qroko-blocks-fronts');
        }
    }
}
add_action( 'wp_print_styles', 'dp_deregister_styles', 100 );
// END


// JS 読み込み無効
add_action( 'wp_print_scripts', 'deregister_scripts' );
function deregister_scripts() {
    if ( !is_admin() ) {
        // 詳細以外は、非表示
        if ( !is_single() ) {
            // wp_deregister_script('toc-front');
            wp_deregister_script('wpo_min-header');
            wp_deregister_script('wpp-js');
        }
    }
}


// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
    return false;
}

// Yoast SEOのタイトルとog:titleのカスタマイズ
add_filter('wpseo_title', 'custom_wpseo_titles', 10, 1);
add_filter('wpseo_opengraph_title', 'custom_wpseo_titles', 10, 1);

function custom_wpseo_titles($title) {
    if (is_date()) {
        $post_type = get_post_type();
        $post_type_name = get_post_type_object($post_type)->labels->singular_name;
        $year = get_query_var('year');
        $monthnum = get_query_var('monthnum');
        // 日本語の月名と「月」の重複を解消
        $month_name = date_i18n('n', mktime(0, 0, 0, $monthnum, 10)); // 「F」から「n」に変更
        $site_name = get_bloginfo('name');
        // タイトルの区切り文字を「｜」に統一
        $title = sprintf('%s（%s年%s月）｜%s', $post_type_name, $year, $month_name, $site_name);
    } else {
        // その他のページのタイトルの区切り文字を統一
        $title = preg_replace('/\s?\|\s?/u', '｜', $title);
    }
    return $title;
}

// Yoast SEOのog:urlのカスタマイズ
add_filter('wpseo_opengraph_url', 'custom_og_url', 10, 1);

function custom_og_url($url) {
    if (is_date()) {
        $post_type = get_post_type();
        if ($post_type && $post_type !== 'post') {
            $post_type_slug = get_post_type_object($post_type)->rewrite['slug'];
            $url = add_query_arg('post_type', $post_type_slug, $url);
        }
    }
    return $url;
}
