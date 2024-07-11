<?php get_template_part('template-parts/contact') ?>
<?php get_template_part('template-parts/banner') ?>
<?php wp_footer(); ?>
<?php $theme_options = get_option('theme_option_name'); // Array of All Options 
?>

<section id="footer">
    <footer>
        <div class="page-width">
            <div class="footer-content">
                <div class="footer-content__left">
                    <a href="<?= home_url() ?>"><img class="footer-logo" src="<?php echo get_theme_mod('logo-footer'); ?>" alt="logo"></a>
                    <p class="footer-content__left--text text-top-margin">住所：<?= nl2br($theme_options['op_1']) ?></p>
                    <div class="number">
                        <p class="footer-content__left--text">TEL：<?= $theme_options['op_2'] ?> / &nbsp;</p>
                        <p class="footer-content__left--text">FAX：<?= $theme_options['op_3'] ?></p>
                    </div>

                </div>
                <div class="footer-content__right">
                    <div id="page-top" class="footer-content__right--pagetop">
                        <img src="<?= get_template_directory_uri() ?>/images/top-arrow.svg" alt="">
                        <a class="footer-content__right--button" href="##">PAGE TOP</a>
                    </div>

                </div>
            </div>
            <ul class="footer-nav">
                <li class="footer-nav__link"><a href="<?= home_url() ?>">ホーム</a></li>
                <li class="footer-nav__link"><a href="<?= home_url() ?>/news">新着情報</a></li>
                <li class="footer-nav__link"><a href="<?= home_url() ?>/about">組合について</a></li>
                <li class="footer-nav__link"><a href="<?= home_url() ?>/traning">事業内容</a></li>
                <li class="footer-nav__link contact"><a href="<?= home_url() ?>/contact">お問い合わせ</a></li>
            </ul>

        </div>

    </footer>
</section>
<div class="copy-write">
    <p class="copy-write__text"><?= get_theme_mod('copy-write'); ?></p>
</div>
</body>

</html>