<div class="modal" id="modalbox">
	<div class="modal__window">
		<div class="modal__window--inner">
      <div class="detail">
        <h4>商品注文　確認画面</h4>
        <div class="detail__company">
          <p>会社名</p><span><span>
        </div>
        <div class="detail__name">
          <p>お名前</p><span><span>
        </div>
        <div class="detail__furigana">
          <p>フリガナ</p><span><span>
          </div>
        <div class="detail__address">
          <p>郵便番号</p><span><span>
          </div>
        <div class="detail__from">
          <p>ご住所</p><span><span>
        </div>
        <div class="detail__number">
          <p>お電話番号</p><span><span>
          </div>
        <div class="detail__fax">
          <p>FAX番号</p><span><span>
        </div>
        <div class="detail__mail">
          <p>メールアドレス</p><span><span>
        </div>
        <div class="detail__verification">
          <p>メールアドレス（確認）</p><span><span>
        </div>
        <div class="detail__time">
          <p>配達希望時間</p><span><span>
        </div>
        <div class="detail__order">
          <p>お支払い方法</p><span><span>
        </div>
        <div class="detail__text">
          <p>メッセージ</p><span><span>
        </div>
      </div>
      <div class="ordecheck">
        <div class="ordecheck__cost">
          <div class="ordecheck__cost--inner">
            <p>合計金額</p>
            <div class="money">
              <span class="money__total" id="total">0</span>
              <p>円</p>
            </div>
          </div>
        </div>
      </div>
      <div class="breakdown">
        <div class="breakdown__title accordiontitle"> 
          <h4>内訳</h4>
        </div>
        <div class="breakdown__inner accordioninner">
        <ul class="breakdown__inner--box">
          <?php
          $args = array(
            'post_type' => 'item_list',
            'order' => 'ASC',
            'posts_per_page' => -1,
          );
            $query = new WP_Query($args); 
          ?>
          <?php if ( $query->have_posts() ) : ?>
            <?php while ( $query->have_posts() ) : $query->the_post();?>
            <?php $i_box = SCF::get('item_box');foreach ($i_box as $i_value) : ?>
              <?php 
              $cost = $i_value['item_ price'];
              $price = preg_replace('/[^0-9]/', '', $cost);
              ?>
                <li class="inprice">
                  <p class="inprice__title"><?php the_title() ?></p>
                  <div class="inprice__item">
                    <span>商品番号 <?= $i_value['item_number']; ?></span>
                    <p>単価<?= $i_value['item_ price']; ?>円</p>
                  </div>
                  <div class="inprice__cost">
                    <p class="one_cost"><span></span>個</p>
                    <span class="fulcost" data-fulcost="0" id="intotal">0</span>円
                  </div>
                </li>
              <?php endforeach; ?>
            <?php endwhile;?>
          <?php wp_reset_postdata(); ?>
          <?php endif; ?>
          </ul>
        </div>
      </div>
			<div class="button">
				<input type="submit" value="送信する" class="button__switch button__submit" id="sendbtn">
				<button class="button__switch returnbtn">戻る</button>
			</div>
		</div>
	</div>
</div>

