<div class="mainvisual">
  <div class="mainvisual__inner">
    <!-- 条件分岐 -->
    <?php if (  is_front_page() ||  is_home() ) : ?>
      <div class="mainvisual__inner--top pcmv">
        <div class="visualleft">
          <img src="<?= get_template_directory_uri() ?>/images/common/MV_left.png">
        </div>
        <div class="visualcenter">
        <img src="<?= get_template_directory_uri() ?>/images/common/MV_center.svg">
        </div>
        <div class="visualreght">
          <img src="<?= get_template_directory_uri() ?>/images/common/MV_right.png">
        </div>
      </div>
      <div class="mainvisual__inner--top spmv">
        <img src="<?= get_template_directory_uri() ?>/images/common/MV_sp.svg">
      </div>
      <div class="scroll">
        <p class="scroll__text">scroll</p>
        <span class="scroll__icon"></span>
      </div>
    <?php elseif ( is_page() ) : ?>
      <div class="mainvisual__inner--product">
        <h1 class="pagetitle">製品販売</h1>
        <h1 class="pagesubtitle">PRODUCT</h1>
        <div class="bread"><?php get_template_part('template-parts/breadcrumb'); ?></div>
      </div>
    <?php else:?>
      <div class="mainvisual__inner--product">
        <h1 class="pagetitle">製品販売</h1>
        <h1 class="pagesubtitle">PRODUCT</h1>
      </div>
    <?php endif;?> 
    <!-- end -->
  </div>
</div>