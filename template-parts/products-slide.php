<div class="section__inner--box price__list">
  <div class="tabbtn">
    <?php
    $args = array(
      'numberposts' => -1,
      'post_type' => 'item_list',
      'taxonomy' => 'cat_item',
    );
    $posts = get_posts($args);
    ?>
    <?php if ( $posts ) : ?>
        <?php $terms = get_terms('cat_item'); ?>
        <?php foreach ($terms as $term) : ?>
          <div class="tabbtn__btn">
            <div class="tabbtn__btn--inner">
              <h4><?= $term->name; ?></h4>
            </div>
          </div>
        <?php endforeach; ?>
    <?php endif;wp_reset_postdata(); ?>
  </div>
  <div class="tabinner">
    <div class="tabinner__slide show">
      <div class="acrylicslide">
        <?php 
            $args = array(
              'post_type' => 'item_list',
              'taxonomy' => 'cat_item',
              'term' => 'acrylic',
              'posts_per_page' => -1,
              'order' => 'ASC',
          );
          $query = new WP_Query($args); 
          ?>
          <?php if ( $query->have_posts() ) : ?>
            <?php while ( $query->have_posts() ) : $query->the_post();?>
            <div class="acrylicslide__inner">
              <table>
                <thead>
                  <tr><th colspan="3"><?php the_title() ?></th></tr>
                </thead>
                <?php $i_box = SCF::get('item_box');foreach ($i_box as $i_value) : ?>
                <tbody>
                  <tr>
                    <td>商品番号<?= $i_value['item_number']; ?></td>
                  </tr>
                  <tr>
                    <td>
                      <span><?= $i_value['item_cost']; ?></span>
                      <p><?= $i_value['cost_text']; ?>枚</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span>価格(<?= $i_value['tax_price']; ?>)</span>
                      <p><?= $i_value['item_ price']; ?>円</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span>単価(<?= $i_value['item_unit']; ?>)</span>
                      <p><?= $i_value['unit_text']; ?>円</p>
                    </td>
                  </tr>
                </tbody>
                <?php endforeach; ?>
                <tfoot>
                <tr><th colspan="3"><p>運送費：価格に含む</p></th></tr>
                </tfoot>
              </table>
            </div>
            <?php endwhile;?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
      </div>
    </div>
    <div class="tabinner__slide">
      <div class="wireslide">
      <?php 
            $args = array(
              'post_type' => 'item_list',
              'taxonomy' => 'cat_item',
              'term' => 'wire',
              'posts_per_page' => -1,
              'order' => 'ASC',
          );
          $query = new WP_Query($args); 
          ?>
          <?php if ( $query->have_posts() ) : ?>
            <?php while ( $query->have_posts() ) : $query->the_post();?>
            <div class="wireslide__inner">
              <table>
                <thead>
                  <tr><th colspan="3"><?php the_title() ?></th></tr>
                </thead>
                <?php $i_box = SCF::get('item_box');foreach ($i_box as $i_value) : ?>
                <tbody>
                  <tr>
                    <td>商品番号<?= $i_value['item_number']; ?></td>
                  </tr>
                  <tr>
                    <td>
                      <span><?= $i_value['item_cost']; ?></span>
                      <p><?= $i_value['cost_text']; ?>枚</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span>価格(<?= $i_value['tax_price']; ?>)</span>
                      <p><?= $i_value['item_ price']; ?>円</p>
                    </td>
                  </tr>
                  <tr>
                  <td>
                      <span>単価(<?= $i_value['item_unit']; ?>)</span>
                      <p><?= $i_value['unit_text']; ?>円</p>
                    </td>
                  </tr>
                </tbody>
                <?php endforeach; ?>
                <tfoot>
                <tr><th colspan="3"><p>運送費：価格に含む</p></th></tr>
                </tfoot>
              </table>
            </div>
            <?php endwhile;?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
      </div>
    </div>
  </div>
</div>