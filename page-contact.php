<?php get_header(); ?>

<?php get_template_part('template-parts/under-visual') ?>
<div class="page-width">
    <?php get_template_part('template-parts/breadcrumb'); ?>
</div>
<?php $theme_options = get_option('theme_option_name'); ?>

<section id="contact-info">
    <div class="page-width">
        <div class="common-head">
            <h2 class="common-head__text">お問い合わせ</h2>
            <span class="common-head--read">CONTACT</span>
        </div>
        <p class="contact-text">お問い合わせ内容の確認後、担当者よりご連絡させていただきます。<br>
            受付時間9：00〜18：00はお電話(052-911-5515)でのお問い合わせも承っております。</p>
    </div>

</section>

<section id="contact-form">
    <div class="page-width">
        <div class="common-head">
            <h2 class="common-head__text">お問い合わせ<br class="xs">フォーム</h2>
            <span class="common-head--read">CONTACT FORM</span>
        </div>
        <div class="contact-attension">
            <p class="contact-attension__text"><?php get_template_part('images/maru') ?>「個人情報保護方針」をお読みになり、同意のうえご記入ください。</p>
            <p class="contact-attension__text"><?php get_template_part('images/maru') ?>ご返信までに2～3日かかることもございますので、お急ぎの方はお電話にてお問い合わせください。</p>
            <p class="contact-attension__text"><?php get_template_part('images/maru') ?>万一、こちらから返信がない場合は、大変お手数ですが再度ご連絡ください。</p>
        </div>


        <?= do_shortcode('[contact-form-7 id="5" title="コンタクトフォーム 1"]') ?>

    </div>

</section>

<?php get_footer(); ?>