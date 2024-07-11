<div class="under-visual" id="mainvisual">
    <div class="under-visual__inner">
        <?php if (is_archive() || is_single()) : ?>
            <div class="visual">
                <img class="pc" src="<?php echo get_theme_mod('under-visual-01'); ?>" alt="">
                <img class="sp" src="<?php echo get_theme_mod('under-visual-01-sp'); ?>" alt="">

            </div>
        <?php elseif (is_page('about')) : ?>
            <div class="visual">
                <div class="visual">
                    <img class="pc" src="<?php echo get_theme_mod('under-visual-02'); ?>" alt="">
                    <img class="sp" src="<?php echo get_theme_mod('under-visual-02-sp'); ?>" alt="">
                </div>
            </div>
        <?php elseif (is_page('traning')) : ?>
            <div class="visual">
                <div class="visual">
                    <img class="pc" src="<?php echo get_theme_mod('under-visual-03'); ?>" alt="">
                    <img class="sp" src="<?php echo get_theme_mod('under-visual-03-sp'); ?>" alt="">
                </div>
            </div>
        <?php elseif (is_page('contact')) : ?>
            <div class="visual">
                <div class="visual">
                    <img class="pc" src="<?php echo get_theme_mod('under-visual-04'); ?>" alt="">
                    <img class="sp" src="<?php echo get_theme_mod('under-visual-04-sp'); ?>" alt="">
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>