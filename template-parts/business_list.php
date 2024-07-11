
<div class="businesslist__slide">
  <div class="businesslist__slide--box">
    <?php $b_group = SCF::get('business_box',22);
    foreach ($b_group as $b_value) :
      $imgurl = wp_get_attachment_image_src($b_value['business_img'], 'full');?>
      <div class="slick">
        <div class="slick__img">
        <img src="<?= $imgurl[0] ?>" alt="">
        </div>
        <div class="slick__box">
          <h4 class="slick__box--title"><?= $b_value['business_title']; ?></h4>
          <p class="slick__box--text"><?= $b_value['business_text']; ?></p>
          <p class="slick__box--example"><?= $b_value['business_example']; ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>