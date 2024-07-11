<?php
// デバッグモードの切り替え  本番用はfalseにすること
$theme_debug_mode = false;
// wordpress basic options --------------------------------------------------------------------------------
//@codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
function my_setup()
{
  add_theme_support('post-thumbnails'); /* アイキャッチ */
  add_theme_support('automatic-feed-links'); /* RSSフィード */
  add_theme_support('title-tag'); /* タイトルタグ自動生成 */
  add_theme_support('html5', array( /* HTML5のタグで出力 */
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ));
}
add_action('after_setup_theme', 'my_setup');


// add menu --------------------------------------------------------------------------------
//@codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
function my_menu_init()
{
  register_nav_menus(array(
    'global'  => 'グローバルメニュー',
    'utility' => 'ユーティリティメニュー',
    'drawer'  => 'ドロワーメニュー',
  ));
}
add_action('init', 'my_menu_init');

// hook method --------------------------------------------------------------------------------
require get_template_directory() . '/functions/method.php';
require get_template_directory() . '/functions/theme-option.php';

// read script style sheet --------------------------------------------------------------------------------
//headで読み込ませる
function my_script_init()
{
  global $theme_debug_mode;
  //wp_enqueue_style( 'style-name', get_template_directory_uri() . '/css/bootstrap.css', array(), '1.0.0', 'all' );
  // デバッグモードだった場合はCSSを読み込む
  if ($theme_debug_mode) {
    // wp_enqueue_style('framework_css', get_template_directory_uri() . '/css/framework/framework.css', array(), '1.0.0', 'all');
    wp_enqueue_style('common_css', get_template_directory_uri() . '/css/common.css', array(), '1.0.0', 'all');
  } else {
    // wp_enqueue_style('framework_css', get_template_directory_uri() . '/css/framework/framework.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('common_css', get_template_directory_uri() . '/css/common.min.css', array(), '1.0.0', 'all');
  }

  wp_enqueue_style('slick_css', get_template_directory_uri() . '/js/slick/slick.css', array(), '1.0.0', 'all');
  wp_enqueue_style('slick_theme_css', get_template_directory_uri() . '/js/slick/slick-theme.css', array(), '1.0.0', 'all');
  // fontawesome
  wp_enqueue_script('fontawesome_js', 'https://kit.fontawesome.com/39468e6aef.js', array());

  wp_enqueue_script('jquery_js', get_template_directory_uri() . '/js/jquery-3.4.1.min.js', array());

  wp_enqueue_script('slick_js', get_template_directory_uri() . '/js/slick/slick.js', array());
  wp_enqueue_script('slick_js', get_template_directory_uri() . '/js/slick/slick.min.js', array());
}
add_action('wp_enqueue_scripts', 'my_script_init');
//footerで読み込ませる
function my_load_widget_scripts()
{
  global $theme_debug_mode;


  // Bootstrap_script
  //wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.bundle.js', array());
  // common_script
  wp_enqueue_script('common_js', get_template_directory_uri() . '/js/common.js', array()); 
  // code-prettify
  wp_enqueue_script('code-ttify_js', 'https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js', array());
}
// wp_footerに処理を登録
add_action('wp_footer', 'my_load_widget_scripts');
//adminで読み込ませる
function my_admin_styles()
{
  wp_enqueue_style('my_admin_css', get_template_directory_uri() . '/css/_mixin.css', '', '1.4.0');
}
add_action('admin_print_styles', 'my_admin_styles');

//管理画面用css
function my_admin_style()
{
  wp_enqueue_style('my_admin_style', get_template_directory_uri() . '/css/admin/admin.min.css');
}
add_action('admin_enqueue_scripts', 'my_admin_style');

//ログイン画面用css
function custom_login()
{
  $files = '<link rel="stylesheet" href=" ' . get_template_directory_uri() . '/css/admin/login.min.css" />';
  echo $files;
}
add_action('login_enqueue_scripts', 'custom_login');


// meta title meta description  --------------------------------------------------------------------------------
require_once(dirname(__FILE__) . '/functions/seo.php');
require get_template_directory() . '/functions/seo_ogp.php';


// 投稿記事のpタグ,brタグが消えてしまう対処  --------------------------------------------------------------------------------
function my_tiny_mce_before_init($init_array)
{
  $init_array['valid_elements']          = '*[*]';
  $init_array['extended_valid_elements'] = '*[*]';
  return $init_array;
}
add_filter('tiny_mce_before_init', 'my_tiny_mce_before_init');

// メディアライブラリにSVG画像をアップロード可能にする --------------------------------------------------------------
add_filter('upload_mimes', 'set_mime_types');
function set_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

// ログイン画面のロゴ変更
function custom_login_logo()
{
  echo '<style type="text/css">h1 a { background: url(' . get_template_directory_uri() . '/images/login-logo.png) no-repeat center center !important; }</style>';
}
add_action('login_head', 'custom_login_logo');

//wp_headのtitleタグを削除 --------------------------------------------------------------------------------------
remove_action('wp_head', '_wp_render_title_tag', 1);

// 通常投稿に親子関係を付ける ---------------------------------------------------------------------------------
function registered_post_hierarchical($post_type, $post_type_object)
{
  if ($post_type == 'post') {
    $post_type_object->hierarchical = true;
    add_post_type_support('post', 'page-attributes');
  }
}
add_action('registered_post_type', 'registered_post_hierarchical', 10, 2);

// 固定ページをダッシュボードに表示 ---------------------------------------------------------------------------------
// function add_page_to_admin_menu()
// {
//   add_menu_page('トップページ設定', 'トップページ設定', 'manage_options', 'post.php?post=80&action=edit', '', 'dashicons-admin-generic', 4);
// }
// add_action('admin_menu', 'add_page_to_admin_menu');

// 固定ページのエディターを非表示 ---------------------------------------------------------------------------------
function disable_visual_editor_in_page()
{
  global $typenow;
  $post_id = $_GET['post'];
  if ($typenow == 'page') {
    if (in_array($post_id, array('80'), true)) {
      $hide_postdiv_css = '<style type="text/css">#postdiv, #postdivrich { display: none; }</style>';
      echo $hide_postdiv_css;
    }
  }
}
add_action('load-post.php', 'disable_visual_editor_in_page');
add_action('load-post-new.php', 'disable_visual_editor_in_page');

// メールアドレスの確認用入力と一致チェック機能をつける-----------------------------------------------------------------
add_filter('wpcf7_validate_email', 'wpcf7_validate_email_filter_extend', 11, 2);
add_filter('wpcf7_validate_email*', 'wpcf7_validate_email_filter_extend', 11, 2);
function wpcf7_validate_email_filter_extend($result, $tag)
{
  $type = $tag['type'];
  $name = $tag['name'];
  $_POST[$name] = trim(strtr((string) $_POST[$name], "n", " "));
  if ('email' == $type || 'email*' == $type) {
    if (preg_match('/(.*)_confirm$/', $name, $matches)) { //確認用メルアド入力フォーム名を ○○○_confirm としています。
      $target_name = $matches[1];
      if ($_POST[$name] != $_POST[$target_name]) {
        if (method_exists($result, 'invalidate')) {
          $result->invalidate($tag, "確認用のメールアドレスが一致していません");
        } else {
          $result['valid'] = false;
          $result['reason'][$name] = '確認用のメールアドレスが一致していません';
        }
      }
    }
  }
  return $result;
}

/* 【出力カスタマイズ】wp_get_archives の年表記を置き換える */
add_filter('gettext', 'my_gettext', 20, 3);
function my_gettext($translated_text, $original_text, $domain)
{
  if ($original_text == '%1$s %2$d') {
    $translated_text = '%2$s.%1$02d';
  }
  return $translated_text;
}

// アーカイブの記事数がaタグの外に存在してしまうのでaタグの中に格納するための処理
add_filter('get_archives_link', 'my_archives_link');
function my_archives_link($output)
{
  $output = preg_replace('/<\/a>\s*(&nbsp;)\((\d+)\)/', '（$2）</a>', $output);
  return $output;
}

//NEWS下層ページ、前の記事、次の記事にクラスを付与
function add_prev_post_link_class($output)
{
  return str_replace('<a href=', '<a class="prev-link" href=', $output); //前の記事リンク
}
add_filter('previous_post_link', 'add_prev_post_link_class');
function add_next_post_link_class($output)
{
  return str_replace('<a href=', '<a class="next-link" href=', $output); //次の記事リンク
}
add_filter('next_post_link', 'add_next_post_link_class');



/* 投稿アーカイブページの作成 */
function post_has_archive($args, $post_type)
{

  if ('post' == $post_type) {
    $args['rewrite'] = true;
    $args['has_archive'] = 'news'; //任意のスラッグ名
  }
  return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

/* the_archive_title 余計な文字を削除 */
add_filter('get_the_archive_title', function ($title) {
  if (is_category()) {
    $title = single_cat_title('', false);
  } elseif (is_tag()) {
    $title = single_tag_title('', false);
  } elseif (is_tax()) {
    $title = single_term_title('', false);
  } elseif (is_post_type_archive()) {
    $title = post_type_archive_title('', false);
  } elseif (is_date()) {
    $title = get_the_time('Y年n月');
  } elseif (is_search()) {
    $title = '検索結果：' . esc_html(get_search_query(false));
  } elseif (is_404()) {
    $title = '「404」ページが見つかりません';
  } else {
  }
  return $title;
});

/*　ダッシュボードの「投稿」→「新着情報」に変換　*/
function Change_menulabel() {
  global $menu;
  global $submenu;
  $name = '新着情報';
  $menu[5][0] = $name;
  $submenu['edit.php'][5][0] = $name.'一覧';
  $submenu['edit.php'][10][0] = $name;
  }
  function Change_objectlabel() {
  global $wp_post_types;
  $name = '新着情報';
  $labels = &$wp_post_types['post']->labels;
  $labels->name = $name;
  $labels->singular_name = $name;
  $labels->add_new = _x('追加', $name);
  $labels->add_new_item = $name.'の新規追加';
  $labels->edit_item = $name.'の編集';
  $labels->new_item = '新規'.$name;
  $labels->view_item = $name.'を表示';
  $labels->search_items = $name.'を検索';
  $labels->not_found = $name.'が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
  }
  add_action( 'init', 'Change_objectlabel' );
  add_action( 'admin_menu', 'Change_menulabel' );

  # アーカイブのディスクリプション入力用

function addArchiveDescriptionForm()
{

  $post_types = [
    'post' => '新着情報',
  ];

  foreach ($post_types as $key => $val) {
    add_settings_field($key . '_description', $val . 'のディスクリプション', 'exArchiveDescriptionForm', 'writing', 'default',  [$key]);
    register_setting('writing', $key . '_description');
  }
}
add_filter('admin_init', 'addArchiveDescriptionForm');

function exArchiveDescriptionForm($args)
{
  $key = $args[0] . '_description';
  $val = get_option($key);
?>
  <textarea name="<?= $key ?>" id="<?= $key ?>" rows="8" cols="80" class="regular-text"><?php echo esc_html($val); ?></textarea>
<?php

}
add_action( 'admin_menu', 'remove_menus', 999 );
function remove_menus(){
  global $current_user;
  if( $current_user -> ID == "2"){
    remove_menu_page( 'upload.php' ); //メディア
    remove_menu_page( 'edit.php?post_type=acf-field-group' ); //フィールドグループ
    remove_menu_page( 'edit-comments.php' ); //コメントメニュー
    remove_menu_page( 'plugins.php' ); //プラグインメニュー
    remove_menu_page( 'manual' ); //manual
    remove_menu_page( 'tools.php' ); //ツールメニュー
    remove_menu_page( 'users.php' ); //ユーザー
    remove_menu_page( 'ai1wm_export' ); //ALL-in-One
    remove_menu_page( 'options-general.php' ); //一般
    remove_menu_page( 'edit.php?post_type=smart-custom-fields' ); //フィールドグループ
    remove_menu_page( 'cptui_main_menu' ); //CPT
  }
}