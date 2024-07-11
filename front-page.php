<?php get_header(); ?>

<?php get_template_part('template-parts/mainvisual') ?>

<!-- 新着情報セクション=========================================================================================== -->
<section id="front-news">
    <div class="page-width">
        <div class="news">
            <div class="common-head">
                <h2 class="common-head__text">新着情報</h2>
                <span class="common-head--read">NEWS</span>
            </div>
            <?php if (have_posts()) : ?>
                <div class="front-news-area">
                    <?php
                    $args = array(
                        'posts_per_page' => 3 // 表示件数
                    );
                    $posts = get_posts($args);
                    foreach ($posts as $post) : // ループの開始
                        setup_postdata($post); // 記事データの取得
                    ?>
                        <a class="front-news-area__row" href="<?php the_permalink(); ?>">
                            <div class="data-category">
                                <p class="front-news-area__row--date"><?= get_the_date(); ?></p>
                                <p class="front-news-area__row--category"><?php
                                                                            $category = get_the_category();
                                                                            echo $category[0]->cat_name;
                                                                            ?></p>
                            </div>
                            <div class="title-icon">
                                <p class="front-news-area__row--title"><?= get_the_title(); ?></p>
                                <img class="link-icon" src="<?= get_template_directory_uri() ?>/images/link_btn.svg" alt="">
                            </div>

                        </a>
                    <?php
                    endforeach; // ループの終了
                    ?>
                    <a class="green-button" href="<?= home_url() ?>/news">お知らせ一覧</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- 新着情報セクション=========================================================================================== -->

<!--法人についてセクション=========================================================================================== -->
<section id="front-about">
    <div class="page-width">
        <div class="common-head">
            <h2 class="common-head__text">組合について</h2>
            <span class="common-head--read">ABOUT</span>
        </div>
        <div class="two-column">
            <img class="two-column__left" src="<?= get_field('top-section-image', 20); ?>" alt="ABOUT画像">
            <div class="two-column__right">
                <h3 class="orange-head"><?= get_field('top-section-title', 20) ?></h3>
                <p><?= get_field('top-section-text', 20) ?></p>
                <a class="green-button two-column--button" href="<?= home_url() ?>/about">法人について</a>
            </div>
        </div>

        <div class="three-column">
            <?php
            $top_about = SCF::get('top-about-section', 20);
            foreach ($top_about as $fields) : ?>
                <div class="three-column__item over">
                    <a href="<?= home_url() . "/" . $fields['top-about-link'] ?>">
                        <?php $imgurl = wp_get_attachment_image_src($fields['top-about-image'], 'full'); ?>
                        <img class="three-column__item--image over-image" src=" <?= $imgurl[0] ?>" alt="">
                        <p class="three-column__item--title over-title"><?= $fields['top-about-title']; ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!--法人についてセクション=========================================================================================== -->

<!--介護職員初任者研修セクション=========================================================================================== -->
<section id="traning">
    <div class="page-width">
        <div class="common-head">
            <h2 class="common-head__text">事業内容</h2>
            <span class="common-head--read">TRAINING</span>
        </div>
        <div class="two-column reverse">
            <div class="two-column__left">
                <h3 class="orange-head"><?= get_field('top-traning-sectitle', 20) ?></h3>
                <p><?= get_field('top-traning-sectext', 20); ?></p>
                <a class="green-button two-column--button" href="<?= home_url() ?>/traning">詳しくはこちら</a>
            </div>
            <img class="two-column__right" src="<?= get_field('top-traning-secimage', 20) ?>" alt="研修画像">
        </div>

        <div class="three-column">
            <?php
            $top_about = SCF::get('top-traning-section', 20);
            foreach ($top_about as $fields) : 
                $imgurl = isset($fields['top-traning-image']) ? wp_get_attachment_image_src($fields['top-traning-image'], 'full') : [''];
                $link = isset($fields['top-traning-link']) ? home_url() . "/" . $fields['top-traning-link'] : '#'; ?>
                <div class="three-column__item">
                    <a href="<?= $link; ?>">
                        <img class="three-column__item--image" src="<?= $imgurl[0] ?>" alt="">
                        <p class="three-column__item--title orange"><?= isset($fields['top-traning-title']) ? $fields['top-traning-title'] : ''; ?></p>
                        <p class="three-column__item--text"><?= isset($fields['top-traning-text']) ? $fields['top-traning-text'] : ''; ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</section>
<!--介護職員初任者研修セクション=========================================================================================== -->



<?php get_footer(); ?>