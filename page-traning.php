<?php get_header(); ?>

<?php get_template_part('template-parts/under-visual') ?>

<div class="page-width">
    <?php get_template_part('template-parts/breadcrumb'); ?>
</div>


<section id="traning-business">
    <div class="page-width">
        <div class="common-head">
            <h2 class="common-head__text">事業・制度<br class="xs">について</h2>
            <span class="common-head--read">BUSINESS</span>
        </div>
        <div class="two-column">
            <img class="two-column__left" src="<?= get_field('traning-business-image') ?>" alt="BUSINESS画像">
            <div class="two-column__right business-right">
                <h3 class="orange-head"><?= get_field('traning-business-title'); ?></h3>
                <p><?= get_field('traning-business-text'); ?></p>
            </div>
        </div>


        <div class="two-column">
            <?php $traning_business = SCF::get('business');
            foreach ($traning_business as $fields) : ?>
                <?php $imgurl = wp_get_attachment_image_src($fields['business-image'], 'full'); ?>
                <img class="two-column__left" src="<?= $imgurl[0] ?>" alt="">
                <div class="two-column__right business-right">
                    <h3 class="orange-head"><?= $fields['business-title']; ?></h3>
                    <p><?= $fields['business-text']; ?></p>
                </div>

            <?php endforeach; ?>
        </div>

        <div class="ac-area">
            <h2 class="ac-parent">技能実習受け入れまでの流れ<?= get_template_part('/images/ac-arrow') ?></h2>
            <div class="ac-child">
                <img src="<?= get_field('traning-business-flow'); ?>" alt="">
            </div>

            <h2 class="ac-parent">留意事項<?= get_template_part('/images/ac-arrow') ?></h2>
            <div class="ac-child">
                <p>comming soom</p>
            </div>
        </div>
    </div>
</section>

<section id="traning-teacher">
    <div class="page-width">

        <div class="common-head">
            <h2 class="common-head__text">講師情報</h2>
            <span class="common-head--read">TEACHER</span>
        </div>

        <div class="two-column">
            <?php
            $traning_teacher = SCF::get('teacher');
            foreach ($traning_teacher as $fields) : ?>
                <?php $imgurl = wp_get_attachment_image_src($fields['teacher-image'], 'full'); ?>
                <img class="two-column__left" src="<?= $imgurl[0] ?>" alt="">
                <div class="two-column__right">
                    <p class="orange"><?= $fields['teacher-rank']; ?></p>
                    <p class="teacher-name"><?= $fields['teacher-name']; ?></p>
                    <p class="green"><?= $fields['teacher-subtitle']; ?></p>
                    <p class="teacher-title"><?= $fields['teacher-title']; ?></p>
                    <p><?= $fields['teacher-text']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<section id="traning-curriculum">
    <div class="page-width">
        <div class="common-head">
            <h2 class="common-head__text">研修カリキュラム</h2>
            <span class="common-head--read">CURRICULUM</span>
        </div>
        <div class="three-column">
            <?php
            $traning_cyrruculum = SCF::get('curriculum');
            foreach ($traning_cyrruculum as $fields) : ?>
                <?php $imgurl = wp_get_attachment_image_src($fields['curriculum_icon'], 'full'); ?>
                <?php $fileurl = esc_url(wp_get_attachment_url($fields['curriculum_file'])); ?>
                <div class="three-column__item">
                    <img class="icon" src="<?= $imgurl[0] ?>" alt="">
                    <p class="curriculum-name"><?= $fields['curriculum_title']; ?></p>
                    <p class="curriculum-text"><?= nl2br($fields['curriculum_text']); ?></p>

                    <?php if ($fileurl) : ?>
                        <a class="green-button" href="<?= $fileurl; ?>" target="_blank">
                            <?= $fields['curriculum_linktext']; ?>
                        </a>
                    <?php else : ?>
                        <a class="green-button comming_soom" href="##">
                            <?= $fields['curriculum_linktext']; ?>
                        </a>
                    <?php endif; ?>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

</section>

<section id="traning-facility">
    <div class="page-width">
        <div class="common-head">
            <h2 class="common-head__text">実施施設</h2>
            <span class="common-head--read">FACILITY</span>
        </div>

        <div class="two-column">
            <?php
            $traning_facility = SCF::get('facility');
            $counter = 1;
            foreach ($traning_facility as $fields) : ?>
                <?php $imgurl = wp_get_attachment_image_src($fields['facility_image'], 'full'); ?>
                <?php if ($counter % 2 == 0) : ?>
                    <div class="two-column__right">
                        <img src="<?= $imgurl[0] ?>" alt="">
                        <p class="facility-name"><?= $fields['facility_name']; ?></p>
                        <p class="facility-addressnum"><?= nl2br($fields['facility_num']); ?></p>
                        <p class="facility-address"><?= $fields['facility_address']; ?></p>
                        <a class="green-button" href="<?= $fields['facility_link']; ?>" target="_blank">詳しくはこちら</a>
                    </div>
                <?php else : ?>
                    <div class="two-column__left">
                        <img src="<?= $imgurl[0] ?>" alt="">
                        <p class="facility-name"><?= $fields['facility_name']; ?></p>
                        <p class="facility-addressnum"><?= nl2br($fields['facility_num']); ?></p>
                        <p class="facility-address"><?= $fields['facility_address']; ?></p>
                        <a class="green-button" href="<?= $fields['facility_link']; ?>" target="_blank">詳しくはこちら</a>
                    </div>
                <?php endif; ?>
                <?php $counter++; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    $(function() {
        $('.ac-parent').on('click', function() {
            $(this).next().slideToggle();
            $(this).toggleClass("open");
        });
    });

    $(function() {
        $('.comming_soom').click(function() {
            alert("comming soom(準備中)");
        })
    });
</script>

<?php get_footer(); ?>