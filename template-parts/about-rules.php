<section id="about-rules">
    <div class="page-width rules ">
        <div class="common-head">
            <h2 class="common-head__text">定款・学則</h2>
            <span class="common-head--read">RULES</span>
        </div>
        <div class="rules__text">
            <p class="pc"><?= nl2br(get_field('about-article')) ?></p>
            <p class="sp"><?= nl2br(get_field('about-article-sp')) ?></p>
        </div>
        <div class="rules__button">
            <a class="green-button" href="<?= get_field('about-articlepdf') ?>" target="_blank">定款</a>
            <a class="green-button" href="<?= get_field('about-rule') ?>" target="_blank">学則</a>
        </div>
    </div>
</section>