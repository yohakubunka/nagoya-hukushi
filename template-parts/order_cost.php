<div class="order__box">
	<div class="order__box--inner item_acrylic">
		<h3 class="middletitle">アクリルシュー<br>（斜角探触子用）</h3>
		<?php
				$args = array(
					'post_type' => 'item_list',
					'taxonomy' => 'cat_item',
					'term' => 'acrylic',
					'order' => 'ASC',
					'posts_per_page' => -1,
			);
			$query = new WP_Query($args); 
			?>
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : $query->the_post();?>
				<div class="formbox">
				<h5 class="ordertitle"><?php the_title() ?></h5>
				<?php $i_box = SCF::get('item_box');foreach ($i_box as $i_value) : ?>
				<?php 
					$cost = $i_value['item_ price'];
					$price = preg_replace('/[^0-9]/', '', $cost);
				?>
					<div class="formbox__box">
						<ul>
							<li class="numbertitle">
								<p>商品番号 <span><?= $i_value['item_number']; ?></span></p>
							</li>
							<li class="buybox">
								<span>単価<?= $i_value['item_ price']; ?>円</span>
								<input min="0" type="number" value="" data-cost="<?= $price ?>" name="cost">
								<span>×<?= $i_value['cost_text']; ?>枚</span>
							</li>
							<li class="subtotal">
								<span class="subtotal__text">小計</span>
								<span class="subtotal__price" id="subtotal" data-total="0">0</span>
							</li>
						</ul>
					</div>
				<?php endforeach; ?>
				</div>
				<?php endwhile;?>
			<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		
	</div>

	<div class="order__box--inner item_wire">
		<h3 class="middletitle">溶接ワイヤ<br>（ソリッドワイヤ、フラックスワイヤ）</h3>
		<?php
			$args = array(
				'post_type' => 'item_list',
				'taxonomy' => 'cat_item',
				'term' => 'wire',
				'order' => 'ASC',
				'posts_per_page' => -1,
		);
		$query = new WP_Query($args); 
		?>
		<?php if ( $query->have_posts() ) : ?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<div class="formbox">
				<h5 class="ordertitle"><?php the_title() ?></h5>
				<?php $i_box = SCF::get('item_box');foreach ($i_box as $i_value) : ?>
					<?php 
					$cost = $i_value['item_ price'];
					$price = preg_replace('/[^0-9]/', '', $cost);
				?>
				<div class="formbox__box">
					<ul>
						<li class="numbertitle">
							<p>商品番号 <span><?= $i_value['item_number']; ?></span></p>
						</li>
						<li class="buybox">
							<span>単価<?= $i_value['item_ price']; ?>円</span>
							<input min="0" type="number" value="" data-cost="<?= $price ?>" name="cost">
							<span>×箱（<?= $i_value['cost_text']; ?>㎏）</span>
						</li>
						<li class="subtotal">
						<span class="subtotal__text">小計</span>
							<span class="subtotal__price" id="subtotal" data-total="0">0</span>
						</li>
					</ul>
				</div>
			<?php endforeach; ?>
			</div>
			<?php endwhile;?>
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</div>
	<div class="totalfee">
		<div class="totalfee__inner">
			<p>合計</p>
			<div class="totalfee__inner--box"><span id="fultotal" type="hidden" name="price">0</span>円</div>
		</div>
	</div>
</div>