<div class="side-bar">
    <div class="category">
        <p class="ac-parent">カテゴリー<?= get_template_part('/images/under-arrow') ?></p>
        <?php
        // 親カテゴリーのものだけを一覧で取得
        $args = array(
            'parent' => 0,
            'orderby' => 'term_order',
            'order' => 'ASC'
        );
        $categories = get_categories($args);
        ?>

        <div class="ac-child">
            <?php foreach ($categories as $category) : ?>
                <p class="left-text-border"><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></p>
            <?php endforeach; ?>
        </div>

    </div>

    <div class="archive">
        <p class="ac-parent">アーカイブ<?= get_template_part('/images/under-arrow') ?></p>
        <ul class="monthly-list ac-child">
            <?php wp_get_archives('post_type=post&type=monthly&show_post_count=1'); ?>
        </ul>
    </div>
</div>

<script>
    $(function() {
        $('.ac-parent').on('click', function() {
            $(this).next().slideToggle();
            $(this).toggleClass("open");
        });
    });
</script>