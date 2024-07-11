<div class="mainvisual" id="mainvisual">
    <div class="mainvisual__inner">
        <div class="mainvisual__inner--image pc-md">
            <?php $img_url = get_theme_mod('main-visual'); ?>
            <?php if (isset($img_url) && $img_url != "") : ?>
                <img alt="メインビジュアル" class="lazy pc" data-original="<?php echo $img_url ?>" src="<?php echo $img_url ?>" />
                <img alt="メインビジュアル" class="lazy sp" data-original="<?php echo get_theme_mod('main-visual-sp') ?>" src="<?php echo get_theme_mod('main-visual-sp') ?>" />
                <div class="header-green">
                    <span class="header-green__text">SCROLL</span>
                    <img src="<?= get_template_directory_uri() ?>/images/scroll-arrow.svg" alt="">
                </div>
            <?php endif ?>
        </div>
    </div>
</div>