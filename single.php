<?php get_header(); ?>
<?php get_template_part('template-parts/under-visual'); ?>

<div class="page-width">
  <?php get_template_part('template-parts/breadcrumb'); ?>
</div>


<section id="single" class="section single-news">
  <div class="page-width">
    <div class="single-area">

      <article class="single-content">
        <div class="single-content__date-cat">
          <p><?= get_the_time('Y.m.d') ?></p>
          <p class="category-back"><?php the_category(',') ?></p>
        </div>
        <div class="single-content__title">
          <p class="text-24"><?php the_title(); ?></p>
        </div>

        <!-- <div class="single-content__img">
          <?php
          $news_img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
          if ($news_img_url) :
          ?>
            <img src="<?php the_post_thumbnail_url() ?>" alt="">
          <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/default.png" alt="">
          <?php endif; ?>
        </div> -->

        <div class="single-content__text">
          <?= the_content(); ?>
        </div>

        <div class="single-content__page">
          <div>
            <?php previous_post_link('%link', '<img class="arrow-img-l" src="' . get_template_directory_uri() . '/images/green-arrow-l.svg" alt="次の記事">次の記事'); ?>
          </div>
          <a href="<?= home_url("/news") ?>" class="tolist"><?= get_template_part('/images/th-solid') ?></a>
          <div>
            <?php next_post_link('%link', '前の記事<img class="arrow-img-r" src="' . get_template_directory_uri() . '/images/green-arow-r.svg" alt="前の記事">'); ?>
          </div>

        </div>


      </article>
      <?php get_template_part('template-parts/sideber'); ?>
    </div>

  </div>
</section>


<?php get_footer(); ?>