<?php
// Internet Explorer で開かれた場合はedgeへ開くように通知を出す
$edge_open = true;

if ($edge_open && $_COOKIE['view_ie'] != 'on') {
  if (get_browser_name() == "ie") { ?>
    <script>
      MoveCheck();

      function MoveCheck() {
        if (confirm("ご利用のウェブページはInternet Explorerでの表示を推奨していません。Microsoft Edgeで表示しますか？")) {
          var url = location.href;
          url = "microsoft-edge:" + url;
          window.location.href = url;
        } else {
          alert("Internet Explorerでの表示を続行します。");
        }
      }
    </script>
<?php
    // ページ推移先で通知が出続けないようにクッキーにInternet Explorerで閲覧したフラグを残す
    // クッキーの有効時間 : 1時間
    setcookie('view_ie', 'on', time() + 60 * 60);
  }
}
?>
<!DOCTYPE html>
<html class="fwHtml" <?php language_attributes(); ?>>

<head>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="description" content="<?php seo_description(); ?>">
  <meta name="google-site-verification" content="eAWvO3WAb8jXbjZwYow_DIStnC4zSGfGeEgoYx9RIWQ" />
  <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>

  <!-- lottie cdn -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.6.6/lottie.min.js" type="text/javascript"></script> -->

  <!-- ファビコン設定 48px -->
  <link rel="shortcut icon" href="<?= get_template_directory_uri() ?>/favicon/favicon.ico">
  <link rel="apple-touch-icon" href="<?= get_template_directory_uri() ?>/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" type="image/png" href="<?= get_template_directory_uri() ?>/android-touch-icon.png" sizes="192x192">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-PH4M0XN791"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-PH4M0XN791');
  </script>


  <script>
    (function(d) {
      var config = {
          kitId: 'qfe0qrf',
          scriptTimeout: 3000,
          async: true
        },
        h = d.documentElement,
        t = setTimeout(function() {
          h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
        }, config.scriptTimeout),
        tk = d.createElement("script"),
        f = false,
        s = d.getElementsByTagName("script")[0],
        a;
      h.className += " wf-loading";
      tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
      tk.async = true;
      tk.onload = tk.onreadystatechange = function() {
        a = this.readyState;
        if (f || a && a != "complete" && a != "loaded") return;
        f = true;
        clearTimeout(t);
        try {
          Typekit.load(config)
        } catch (e) {}
      };
      s.parentNode.insertBefore(tk, s)
    })(document);
  </script>



  <!-- AdobeFont読込 -->
  <script>
    (function(d) {
      var config = {
          kitId: 'evi8abl',
          scriptTimeout: 3000,
          async: true
        },
        h = d.documentElement,
        t = setTimeout(function() {
          h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
        }, config.scriptTimeout),
        tk = d.createElement("script"),
        f = false,
        s = d.getElementsByTagName("script")[0],
        a;
      h.className += " wf-loading";
      tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
      tk.async = true;
      tk.onload = tk.onreadystatechange = function() {
        a = this.readyState;
        if (f || a && a != "complete" && a != "loaded") return;
        f = true;
        clearTimeout(t);
        try {
          Typekit.load(config)
        } catch (e) {}
      };
      s.parentNode.insertBefore(tk, s)
    })(document);
  </script>
  <!-- AdobeFont読込 -->

</head>

<!-- get template directory uri for Javascript -->

<body class="body_<?php echo get_page_slug() ?> fwWrap">


  <!-- header -->
  <header class="header" id="head_wrap">
    <div class="inner">
      <div id="mobile-head">
        <h1 class="logo">
          <a href="<?= home_url() ?>" class="logo__box">
            <img src="<?php echo get_theme_mod('logo-header'); ?>" alt="logo">
          </a>
        </h1>
        <div id="nav-toggle">
          <div>
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
      </div>
      <nav id="global-nav">
        <ul>
          <li><a href="<?= home_url() ?>">ホーム</a><span class="sp"><?php get_template_part('images/green-arrow-r') ?></span></li>
          <li><a href="<?= home_url() ?>/news">新着情報</a><span class="sp"><?php get_template_part('images/green-arrow-r') ?></span></li>
          <li><a href="<?= home_url() ?>/about">組合について</a><span class="sp"><?php get_template_part('images/green-arrow-r') ?></span></li>
          <li><a href="<?= home_url() ?>/traning">事業内容</a><span class="sp"><?php get_template_part('images/green-arrow-r') ?></span></li>
          <li><a href="<?= home_url() ?>/contact">お問い合わせ</a><span class="sp"><?php get_template_part('images/green-arrow-r') ?></span></li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- /header -->