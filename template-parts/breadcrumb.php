<?php

/**
 * schema.orgを使用したパンくずリスト
 * 
 * ■ 使用方法
 * - 通常
 * <?php get_template_part('template-parts/breadcrumb'); ?>
 * 
 * 
 * - 表示が特殊で変数を使用する場合
 * <?php get_template_part('template-parts/breadcrumb', null, $var); ?>
 * 
 * 変数を使用した場合引数で指定した値はbreadcrumb.php内で$argsに引き継がれます。
 * 
 * ■ 機能の更新
 * gitで管理されています。
 * 案件ごとの部分的な修正ではなくベース機能の修正の場合『feature/breadcrumb』から変更してください。
 * 
 */
?>

<?php

// ページ情報
$postId = $post->ID;
$parentPostArry = array_reverse(get_post_ancestors($post));
$postTypeObject = get_post_type_object(get_post_type());
$postTypeName = $postTypeObject->labels->name;
$taxonomySlug = get_query_var('taxonomy');
$termName = urldecode(get_query_var('term'));

// アロー設定
$arrow_option = ">";

function breadcrumb_arrow($arrow_option)
{
  echo '<span class="breadcrumb-arrow">' . $arrow_option . '</span>';
}
?>

<?php if (is_front_page() || is_home()) : ?>
<?php else : ?>
  <ol itemscope itemtype="https://schema.org/BreadcrumbList" class="breadcrumb">

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a href="<?php echo esc_url(home_url()); ?>" itemprop="item"><span itemprop="name">ホーム</span></a>
      <?php breadcrumb_arrow($arrow_option) ?>
      <meta itemprop="position" content="1" />
    </li>

    <?php
    // 固定ページ -----------------------------------------------------------------------------------
    if (is_page()) :
    ?>
      <?php if ($post->post_parent) : // 子ページがある場合
        $parent_id = $post->post_parent; // 親ページのIDを取得
      ?>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a href="<?= get_permalink($parent_id) ?>" itemprop="item">
            <span itemprop="name"><?= get_post($parent_id)->post_title ?></span>
          </a>
          <?php breadcrumb_arrow($arrow_option) ?>
          <meta itemprop="position" content="2" />
        </li>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name"><?= get_the_title() ?></span>
          <meta itemprop="position" content="3" />
        </li>
      <?php else : // 子ページがない場合 
      ?>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name"><?= get_the_title() ?></span>
          <meta itemprop="position" content="2" />
        </li>
      <?php endif; ?>
    <?php
    endif;
    // 固定ページend -------------------------------------------------------------------------------
    ?>


    <?php
    // アーカイブページ ------------------------------------------------------------------------------
    if (is_archive() && $postTypeName == '新着情報') :
    ?>
      <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="name"><a href="<?= home_url() ?>/news">新着情報</a></span>
        <meta itemprop="position" content="2" />
      </li>
    <?php
    endif;
    // アーカイブページend --------------------------------------------------------------------------
    ?>

    <?php
    // アーカイブページ ------------------------------------------------------------------------------
    if (is_archive() && $postTypeName == 'RECRUIT') :
    ?>
      <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="name"><a href="<?= home_url() ?>/recruit"><?php echo $postTypeName; ?></a></span>
        <meta itemprop="position" content="2" />
      </li>
    <?php
    endif;
    // アーカイブページend --------------------------------------------------------------------------
    ?>

    <?php
    // アーカイブページ ------------------------------------------------------------------------------
    if (is_category() && $postTypeName == '新着情報') :
    ?>
      <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <?php breadcrumb_arrow($arrow_option) ?>
        <span itemprop="name"><?php the_archive_title() ?></span>
        <meta itemprop="position" content="2" />
      </li>
    <?php
    endif;
    // アーカイブページend --------------------------------------------------------------------------
    ?>

    <?php
    // アーカイブページ 年別------------------------------------------------------------------------------
    if (is_month() && $postTypeName == '新着情報') :
    ?>
      <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <?php breadcrumb_arrow($arrow_option) ?>
        <?php $year_title = get_the_archive_title(); ?>
        <span itemprop="name"><?= $year_title ?></span>
        <meta itemprop="position" content="2" />
      </li>
    <?php
    endif;
    // アーカイブページ　年別end --------------------------------------------------------------------------
    ?>

    <?php
    // カスタム分類一覧 ------------------------------------------------------------------------------
    if (is_tax()) :
    ?>
      <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <?php breadcrumb_arrow($arrow_option) ?>
        <span itemprop="name"><?= $termName ?></span>
        <meta itemprop="position" content="2" />
      </li>
    <?php
    endif;
    // カスタム分類一覧end --------------------------------------------------------------------------
    ?>


    <?php
    // カスタム投稿シングルページ --------------------------------------------------------------------
    if (is_single() && $postTypeName == "新着情報") :
    ?>
      <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="name"><a href="<?= home_url() ?>/news">新着情報</a></span>
        <?php breadcrumb_arrow($arrow_option) ?>
        <meta itemprop="position" content="2" />
      </li>
      <li class="bread" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="name"><?= single_post_title('', false) ?></span>
        <meta itemprop="position" content="3" />
      </li>
    <?php
    endif;
    // カスタム投稿シングルページend ----------------------------------------------------------------
    ?>



    <?php
    // 検索結果ページ --------------------------------------------------------------------------------
    if (is_search()) :
    ?>
      <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="name">キーワード検索結果</span>
        <meta itemprop="position" content="2" />
      </li>
    <?php
    endif;
    // 検索結果ページend ----------------------------------------------------------------------------
    ?>

    <?php
    // 検索結果ページ --------------------------------------------------------------------------------
    if (is_404()) :
    ?>
      <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="name">ページが見つかりません</span>
        <meta itemprop="position" content="2" />
      </li>
    <?php
    endif;
    // 検索結果ページend ----------------------------------------------------------------------------
    ?>

    <?php
    // 引数指定があった場合 --------------------------------------------------------------------------
    if (isset($args)) :
    ?>

      <?php
      switch ($args):
        case '引数名':
      ?>
          <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name">表示テキスト</span>
            <meta itemprop="position" content="2" />
          </li>
          <?php break; ?>
      <?php endswitch; ?>

    <?php
    endif;
    // 引数指定があった場合end ----------------------------------------------------------------------
    ?>

  </ol>
<?php endif ?>