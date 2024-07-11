<section id="banner">
    <div class="page-width">
        <div class="banner-section">
            <?php
            $banner = SCF::get('banner', 91);
            foreach ($banner as $fields) : ?>
                <?php $imgurl = wp_get_attachment_image_src($fields['banner-image'], 'full'); ?>
                <a target="_blank" class="banner-section__link" href="<?= $fields['banner-link']; ?>"><img src="<?= $imgurl[0] ?>" alt=""></a>
            <?php endforeach; ?>
        </div>
    </div>
</section>