<?php get_header(); ?>
<?php get_template_part('template-parts/under-visual') ?>

<div class="page-width">
    <?php get_template_part('template-parts/breadcrumb'); ?>
</div>

<section id="news">
    <div class="page-width">
        <div class="news-wrap">
            <div class="news-wrap__list">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : ?>
                        <?php the_post(); ?>
                        <article>
                            <a href="<?php the_permalink(); ?>">
                                <div class="data-category">
                                    <p class="data-category--date"><?php echo get_the_date(); ?></p>
                                    <p class="data-category--category"><?php
                                                                        $category = get_the_category();
                                                                        echo $category[0]->cat_name;
                                                                        ?></p>
                                </div>
                                <div class="title-icon">
                                    <p class="title-icon--title"><?= get_the_title(); ?></p>
                                    <img class="link-icon" src="<?= get_template_directory_uri() ?>/images/link_btn.svg" alt="">
                                </div>

                            </a>
                        </article>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php
                /* ページャーの表示     */
                global $wp_query;
                if (function_exists('pagination')) :
                    pagination($wp_query->max_num_pages, (get_query_var('paged')) ? get_query_var('paged') : 1);  //$wp_query ではなく $the_query ないことに注意！
                endif;
                ?>
            </div>
            <?php get_template_part('template-parts/sideber'); ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>