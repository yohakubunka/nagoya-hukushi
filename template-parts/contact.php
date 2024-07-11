<?php $theme_options = get_option('theme_option_name'); ?>

<section id="contact">
    <div class="page-width">
        <div class="common-head">
            <h2 class="common-head__text">お問い合わせ</h2>
            <span class="common-head--read">CONTACT</span>
        </div>

        <div class="two-column">
            <?php
            $contact = SCF::get('contact-section', 20);
            $count = 1;
            foreach ($contact as $fields) : ?>
                <?php if ($count % 2 == 0) : ?>
                    <div class="two-column__right">
                        <?php $imgurl = wp_get_attachment_image_src($fields['contact-section-icon'], 'full'); ?>
                        <div class="contact-title">
                            <img src="<?= $imgurl[0] ?>" alt="">
                            <p class="title"><?= $fields['contact-section-title']; ?></p>
                        </div>
                        <p class="contact-sec-text"><?= nl2br($fields['contact-section-text']); ?></p>
                        <a class="green-button" href="tel:<?= $theme_options["op_3"] ?>"><?= $fields['contact-section-linktext']; ?></a>
                        <?php $count++; ?>
                    </div>
                <?php else : ?>
                    <div class="two-column__left">
                        <?php $imgurl = wp_get_attachment_image_src($fields['contact-section-icon'], 'full'); ?>
                        <div class="contact-title">
                            <img src="<?= $imgurl[0] ?>" alt="">
                            <p class="title"><?= $fields['contact-section-title']; ?></p>
                        </div>
                        <p class="contact-sec-text"><?= nl2br($fields['contact-section-text']); ?></p>
                        <a class="green-button" href="<?= home_url() ?>/contact"><?= $fields['contact-section-linktext']; ?></a>
                        <?php $count++; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>