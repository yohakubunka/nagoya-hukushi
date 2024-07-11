<?php $theme_options = get_option('theme_option_name'); ?>
<section id="about-company">
    <div class="page-width">
        <div class="common-head">
            <h2 class="common-head__text">組合情報</h2>
            <span class="common-head--read">COMPANY</span>
        </div>
        <div class="company-table">
            <div class="company-table__row">
                <p class="company-table__row--title">名称</p>
                <p class="company-table__row--info"><?= $theme_options['op_0']; ?></p>
            </div>
            <div class="company-table__row">
                <p class="company-table__row--title">所在地</p>
                <p class="company-table__row--info sp"><?= nl2br($theme_options['op_1']); ?></p>
                <p class="company-table__row--info pc"><?= $theme_options['op_1']; ?></p>
            </div>
            <div class="company-table__row">
                <p class="company-table__row--title">TEL</p>
                <p class="company-table__row--info"><?= $theme_options['op_2']; ?></p>
            </div>
            <div class="company-table__row">
                <p class="company-table__row--title">FAX</p>
                <p class="company-table__row--info"><?= $theme_options['op_3']; ?></p>
            </div>
            <div class="company-table__row">
                <p class="company-table__row--title">設立</p>
                <p class="company-table__row--info"><?= $theme_options['op_4']; ?></p>
            </div>
            <div class="company-table__row">
                <p class="company-table__row--title">代表理事</p>
                <p class="company-table__row--info"><?= $theme_options['op_5']; ?></p>
            </div>
            <div class="company-table__row">
                <p class="company-table__row--title">連絡先</p>
                <p class="company-table__row--info"><?= $theme_options['op_6']; ?></p>
            </div>
            <div class="company-table__row">
                <p class="company-table__row--title">組合員資格</p>
                <p class="company-table__row--info"><?= nl2br($theme_options['op_7']); ?></p>
            </div>
            <div class="company-table__row">
                <p class="company-table__row--title">組合の事業</p>
                <p class="company-table__row--info pc"><?= nl2br($theme_options['op_8']); ?></p>
                <p class="company-table__row--info sp"><?= $theme_options['op_8']; ?></p>
            </div>
            <div class="company-table__row">
                <p class="company-table__row--title">組合等の地区</p>
                <p class="company-table__row--info"><?= $theme_options['op_9']; ?></p>
            </div>
            <div class="company-table__row">
                <p class="company-table__row--title">組合員数</p>
                <p class="company-table__row--info"><?= $theme_options['op_10']; ?></p>
            </div>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3259.7816836411653!2d136.90488131524592!3d35.211906580306426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600373fe634982a3%3A0x9cd940d48f849dc3!2z44CSNDYyLTAwNTMg5oSb55-l55yM5ZCN5Y-k5bGL5biC5YyX5Yy65YWJ6Z-z5a-655S66YeO5pa577yR77yZ77yR77yZ4oiS77yX77yT!5e0!3m2!1sja!2sjp!4v1637221584603!5m2!1sja!2sjp" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

            <h3 class="second-head">事業所紹介</h3>

            <div class="company-table__row">
                <?php
                $about_office = SCF::get('office');
                foreach ($about_office as $fields) : ?>
                    <p class="company-table__row--title"><?= $fields['office_name']; ?></p>
                    <p class="company-table__row--info sp"><?= nl2br($fields['office_address']); ?></p>
                    <p class="company-table__row--info pc"><?= $fields['office_address']; ?></p>
                <?php endforeach; ?>
            </div>

        </div>

    </div>
</section>