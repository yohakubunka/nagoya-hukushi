<?php get_header(); ?>
<?php $theme_options = get_option('theme_option_name'); ?>
<main id="products">
<section class="section" id="price">
		<div class="section__inner price">
			<div class="sectiontitle">
				<img class="sectiontitle__icon" src="<?= get_template_directory_uri() ?>/images/common/h2_title.svg">	
				<h2 class="lefttitle">商品価格<span>PRICE</span></h2>
			</div>
			<?php get_template_part('template-parts/products-slide'); ?>
			<div class="section__inner--box commission">
				<h3 class="middletitle">代引手数料のご案内</h3>
				<div class="commission__list">
					<!-- 代引手数料 -->
					<div class="commission__list--box">
							<?php 
							//連想配列をjson化する。
								$cod = array(
									'10,000円未満' => '400',
									'10,000~30,00円未満' => '500',
									'30,000~100,00円未満' => '700',
									'100,000~300,000円まで' => '1,100',
								);
								$cod_array = json_encode($cod);
							?>
							<div class="codlist">
								<dl>
									<dt>ご購入金額（1梱包につき）</dt>
									<dd>代引手数料</dd>
								</dl>
								<?php foreach ($cod as $key => $value) : ?>
									<dl>
										<dt><?= $key ?></dt>
										<dd><?= $value ?>円</dd>
									</dl>
								<?php endforeach; ?>
							</div>
					</div>
				</div>
				<div class="caution">
					<p class="caution__title">お取引上のご注記</p>
					<ul>
						<li>※梱包が複数個になった場合は、梱包ごとに代引手数料が発生いたします。</li>
						<li>※商品価格には消費税を含みます。<span>※代引き手数料無料企画を実施中</span></li>
						<li>※商品価格には運送費を含みますが、沖縄、北海道、離島は別途運賃を頂きます。</li>
						<li>※銀行振込ご指定の場合の手数料は購入者様がご負担ください。</li>
						<li>※詳細につきましては弊社ホームページ上のご利用案内をご覧ください。</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="section gray" id="order">
		<div class="section__inner order">
			<div class="sectiontitle">
				<img class="sectiontitle__icon" src="<?= get_template_directory_uri() ?>/images/common/h2_title.svg">	
				<h2 class="lefttitle">商品注文<span>ORDER</span></h2>
			</div>
			<?php get_template_part('template-parts/order_cost'); ?>
			<?php echo do_shortcode('[contact-form-7 id="72" title="商品注文" html_class="h-adr"]'); ?>
		</div>
	</section>
</main>
<?php get_template_part('template-parts/contact_check'); ?>
<?php get_footer(); ?>

<script>
</script>
