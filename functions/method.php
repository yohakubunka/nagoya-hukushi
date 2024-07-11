<?php
// ページスラッグ取得 ================================================
function get_page_slug()
{
  global $post;
  $slug = $post->post_name;
  if (is_home() || is_front_page()) {
    $slug = "index";
  }
  if (is_date()) {
    $slug = "date";
  }
  if (is_archive()) {
    $slug = "archive";
  }
  if (is_404()) {
    $slug = "404";
  }
  if (is_category()) {
    $slug = "category";
  }
  if (is_tax()) {
    $slug = "taxonomy";
  }
  if (is_tag()) {
    $slug = "tag";
  }
  if (is_single()) {
    $slug = "single";
  }
  if (is_admin()) {
    $slug = "admin";
  }

  return $slug;
}

// 和暦取得 ================================================
function get_wareki($year, $format = false, $gannen = false)
{
  $gengoList = [
    ['name' => '令和', 'name_short' => 'R', 'year' => 2019],  // 2019-05-01,
    ['name' => '平成', 'name_short' => 'H', 'year' => 1989],  // 1989-01-08,
    ['name' => '昭和', 'name_short' => 'S', 'year' => 1926], // 1926-12-25'
    ['name' => '大正', 'name_short' => 'T', 'year' => 1912], // 1912-07-30
    ['name' => '明治', 'name_short' => 'M', 'year' => 1868], // 1868-01-25
  ];

  $gengo = array();
  foreach ($gengoList as $g) {
    if ($g['year'] <= $year) {
      $gengo = $g;
      break;
    }
  }

  $year = ($year - $gengo['year']) + 1;
  if ($year == 1 && $gannen) {
    $year = '元';
  }

  $out = $gengo['name'] . $year . '年';
  if ($format) {
    $out = $gengo['name_short'] . $year . '年';
  }
  return $out;
}

// 使用しているテンプレートファイル名取得 =======================================================

function get_template_failename()
{
  global $template; // テンプレートファイルのパスを取得
  $temp_name = basename($template); // パスの最後の名前（ファイル名）を取得
  return $temp_name;
}

function get_option_value($op_num)
{
  $theme_options = get_option('theme_option_name'); // Array of All Options
  $out = $theme_options['op_' . $op_num];
  return $out;
}



function get_browser_name()
{
  // 判定するのに小文字にする
  $browser = strtolower($_SERVER['HTTP_USER_AGENT']);

  // ユーザーエージェントの情報を基に判定
  if (strstr($browser, 'edge')) {
    $browser_name = "edge";
  } elseif (strstr($browser, 'trident') || strstr($browser, 'msie')) {
    $browser_name = "ie";
  } elseif (strstr($browser, 'chrome')) {
    $browser_name = "chrome";
  } elseif (strstr($browser, 'firefox')) {
    $browser_name = "firefox";
  } elseif (strstr($browser, 'safari')) {
    $browser_name = "safari";
  } elseif (strstr($browser, 'opera')) {
    $browser_name = "opera";
  } else {
    $browser_name = "other";
  }

  return $browser_name;
}
?>

<?php
// 画像が決まってないsample =====================================================================
function dummy_img($width = "100", $height = "200", $bg = "27709b", $color = "ffffff")
{
  $url = "https://tools.arashichang.com/";
  $url = $url . $width . "x" . $height . "/" . $bg . "/" . $color;
  return $url;
}

?>

<?php
/**
 * ページネーション出力関数 =============================================================================================
 * $paged : 現在のページ
 * $pages : 全ページ数
 * $range : 左右に何ページ表示するか
 * $show_only : 1ページしかない時に表示するかどうか
 * $page_dots : 後ろに...を付けるか
 * $page_dots_before : 前に...を付けるか
 * $numbering : 数字を入れるか 
 * $all_numbers : 数字をすべて入れるか
 */
function pagination(
  $pages = false,
  $paged = false,
  $range = 1,
  $show_only = false,
  $page_dots = false,
  $page_dots_before = false,
  $numbering = true,
  $all_numbers = false
) {
  if ($pages) {
    $pages = (int) $pages;    //float型で渡ってくるので明示的に int型 へ
  } else {
    //global $pages;
  }
  if ($paged) {
    $paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように
  } else {
    //global $paged;
  }

  //表示テキスト
  //最初のページに戻るボタン　画像にも変更できます。
  $text_first   = "最初";
  //最後のページに進むボタン
  $text_last    = "最後";

  if ($show_only && $pages === 1) {
    // １ページのみで表示設定が true の時
    echo '<div class="pagination"><span class="current pager">1</span></div>';
    return;
  }

  if ($pages === 1) return;    // １ページのみで表示設定もない場合

  if (1 !== $pages) {
    //２ページ以上の時
    echo '<div class="pagination"><span class="page_num">Page ', $paged, ' of ', $pages, '</span>';
    // if ($paged > $range + 1) {
    //   // 「最初へ」 の表示
    //   echo '<a href="', get_pagenum_link(1), '" class="first">', $text_first, '</a>';
    // }
    if ($paged > 1) {
      // 「前へ」 の表示
      echo '<a href="', get_pagenum_link($paged - 1), '" class="prev">', get_template_part('/images/prev-arrow'), '</a>';
    }
    // 前に...の表示
    if ($page_dots_before == true && $paged != 1  && $paged >= $range + 1 && $paged != $range + 1) {
      echo  "<p class='pagenation_dots'>...</p>";
    }
    for ($i = 1; $i <= $pages; $i++) {

      if ($i <= $paged + 2 && $i >= $paged - 1 && $numbering && $all_numbers == false) {
        // $paged +- $range 以内であればページ番号を出力
        if ($paged === $i) {
          echo '<span class="current pager">', $i, '</span>';
        } else {
          echo '<a href="', get_pagenum_link($i), '" class="pager">', $i, '</a>';
        }
      }
      //ページ番号をすべて表示
      if ($numbering && $all_numbers) {
        $page_dots = false;
        if ($paged === $i) {
          echo '<span class="current pager">', $i, '</span>';
        } else {
          echo '<a href="', get_pagenum_link($i), '" class="pager">', $i, '</a>';
        }
      }
    }
    // 後ろに...の表示
    if ($page_dots && $pages - $paged >= $range + 1) {
      echo  "<p class='pagenation_dots'>...</p>";
    }
    if ($paged < $pages) {
      // 「次へ」 の表示
      echo '<a href="', get_pagenum_link($paged + 1), '" class="next">', get_template_part('/images/next-arrow'), '</a>';
    }

    // if ($paged + $range < $pages) {
    //   // 「最後へ」 の表示
    //   echo '<a href="', get_pagenum_link($pages), '" class="last">', $text_last, '</a>';
    // }
    echo '</div>';
  }
}
/**
 * ページネーション出力関数 =============================================================================================
 */

?>



<?php
function my_theme_customize_register($wp_customize)
{
  $wp_customize->add_section(
    'about_section',
    [
      'title'           => 'トップページ設定',
      'priority'        => 1,
      'description' => 'トップページの設定を編集します',
      //'active_callback' => 
    ]
  );
  $wp_customize->add_setting('main-visual'); //設定項目を追加
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mainvisual', array(
    'label' => 'メインビジュアル（PC）', //設定項目のタイトル
    'section' => 'about_section', //追加するセクションのID
    'settings' => 'main-visual', //追加する設定項目のID
    'description' => 'メインビジュアル（PC用）の画像を設定してください', //設定項目の説明
  )));

  $wp_customize->add_setting('main-visual-sp'); //設定項目を追加
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mainvisual-sp', array(
    'label' => 'メインビジュアル（SP）', //設定項目のタイトル
    'section' => 'about_section', //追加するセクションのID
    'settings' => 'main-visual-sp', //追加する設定項目のID
    'description' => 'メインビジュアル（SP用）の画像を設定してください', //設定項目の説明
  )));

  $wp_customize->add_setting('logo-header'); //設定項目を追加
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo-header', array(
    'label' => 'ロゴ（ヘッダー）', //設定項目のタイトル
    'section' => 'about_section', //追加するセクションのID
    'settings' => 'logo-header', //追加する設定項目のID
    'description' => 'ヘッダー用のロゴ画像を設定してください', //設定項目の説明
  )));

  $wp_customize->add_setting('logo-footer'); //設定項目を追加
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo-footer', array(
    'label' => 'ロゴ（フッター）', //設定項目のタイトル
    'section' => 'about_section', //追加するセクションのID
    'settings' => 'logo-footer', //追加する設定項目のID
    'description' => 'フッター用のロゴ画像を設定してください', //設定項目の説明
  )));

  $wp_customize->add_setting('copy-write');
  $wp_customize->add_control(
    "copy-write",
    [
      'settings'    => 'copy-write',
      'label'       => 'コピーライト',
      'section'     => 'about_section',
      'type'        => 'text'
    ]
  );
}
add_action('customize_register', 'my_theme_customize_register');

function my_theme_customize_under($wp_customize_under)
{
  $wp_customize_under->add_section(
    'under_section',
    [
      'title'           => '下層メインビジュアル',
      'priority'        => 2,
      'description' => '下層メインビジュアルの設定を編集します',
      //'active_callback' => 
    ]
  );
  $wp_customize_under->add_setting('under-visual-01'); //設定項目を追加
  $wp_customize_under->add_control(new WP_Customize_Image_Control($wp_customize_under, 'under-visual-01', array(
    'label' => 'メインビジュアル（新着情報）', //設定項目のタイトル
    'section' => 'under_section', //追加するセクションのID
    'settings' => 'under-visual-01', //追加する設定項目のID
    'description' => 'メインビジュアル（新着情報ページ）の画像を設定してください', //設定項目の説明
  )));

  $wp_customize_under->add_setting('under-visual-01-sp'); //設定項目を追加
  $wp_customize_under->add_control(new WP_Customize_Image_Control($wp_customize_under, 'under-visual-01-sp', array(
    'label' => 'メインビジュアル（新着情報SP）', //設定項目のタイトル
    'section' => 'under_section', //追加するセクションのID
    'settings' => 'under-visual-01-sp', //追加する設定項目のID
    'description' => 'メインビジュアル（新着情報ページSP）の画像を設定してください', //設定項目の説明
  )));

  $wp_customize_under->add_setting('under-visual-02'); //設定項目を追加
  $wp_customize_under->add_control(new WP_Customize_Image_Control($wp_customize_under, 'under-visual-02', array(
    'label' => 'メインビジュアル（組合について）', //設定項目のタイトル
    'section' => 'under_section', //追加するセクションのID
    'settings' => 'under-visual-02', //追加する設定項目のID
    'description' => 'メインビジュアル（組合について）の画像を設定してください', //設定項目の説明
  )));
  $wp_customize_under->add_setting('under-visual-02-sp'); //設定項目を追加
  $wp_customize_under->add_control(new WP_Customize_Image_Control($wp_customize_under, 'under-visual-02-sp', array(
    'label' => 'メインビジュアル（組合についてSP）', //設定項目のタイトル
    'section' => 'under_section', //追加するセクションのID
    'settings' => 'under-visual-02-sp', //追加する設定項目のID
    'description' => 'メインビジュアル（組合についてSP）の画像を設定してください', //設定項目の説明
  )));

  $wp_customize_under->add_setting('under-visual-03'); //設定項目を追加
  $wp_customize_under->add_control(new WP_Customize_Image_Control($wp_customize_under, 'under-visual-03', array(
    'label' => 'メインビジュアル（介護職員初任者研修）', //設定項目のタイトル
    'section' => 'under_section', //追加するセクションのID
    'settings' => 'under-visual-03', //追加する設定項目のID
    'description' => 'メインビジュアル（介護職員初任者研修）の画像を設定してください', //設定項目の説明
  )));
  $wp_customize_under->add_setting('under-visual-03-sp'); //設定項目を追加
  $wp_customize_under->add_control(new WP_Customize_Image_Control($wp_customize_under, 'under-visual-03-sp', array(
    'label' => 'メインビジュアル（介護職員初任者研修SP）', //設定項目のタイトル
    'section' => 'under_section', //追加するセクションのID
    'settings' => 'under-visual-03-sp', //追加する設定項目のID
    'description' => 'メインビジュアル（介護職員初任者研修SP）の画像を設定してください', //設定項目の説明
  )));

  $wp_customize_under->add_setting('under-visual-04'); //設定項目を追加
  $wp_customize_under->add_control(new WP_Customize_Image_Control($wp_customize_under, 'under-visual-04', array(
    'label' => 'メインビジュアル（お問い合わせ）', //設定項目のタイトル
    'section' => 'under_section', //追加するセクションのID
    'settings' => 'under-visual-04', //追加する設定項目のID
    'description' => 'メインビジュアル（お問い合わせ）の画像を設定してください', //設定項目の説明
  )));
  $wp_customize_under->add_setting('under-visual-04-sp'); //設定項目を追加
  $wp_customize_under->add_control(new WP_Customize_Image_Control($wp_customize_under, 'under-visual-04-sp', array(
    'label' => 'メインビジュアル（お問い合わせSP）', //設定項目のタイトル
    'section' => 'under_section', //追加するセクションのID
    'settings' => 'under-visual-04-sp', //追加する設定項目のID
    'description' => 'メインビジュアル（お問い合わせSP）の画像を設定してください', //設定項目の説明
  )));
}
add_action('customize_register', 'my_theme_customize_under');

?>