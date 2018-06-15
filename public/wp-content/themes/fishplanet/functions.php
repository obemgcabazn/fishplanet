<?php
if (!is_admin()) show_admin_bar(false);

require get_template_directory() . '/includes/init.php';
require get_template_directory() . '/includes/woocommerce.php';
require get_template_directory() . '/includes/wc-cart.php';

// Подсчет количества товаров в корзине
function woo_cart_count() {
  global $woocommerce;
  $count = $woocommerce->cart->cart_contents_count;
  if($count == 1){ $word = "товар"; }
  elseif($count%10 == 2){ $word = "товара"; }
  elseif($count%10 == 3){ $word = "товара"; }
  elseif($count%10 == 4){ $word = "товара"; }
  else{ $word = "товаров"; }
  echo $count . " " . $word;
}

// Используется для телефона, чтобы оставить только цифры в номере
function return_numbers_from_string( $string ){
  $result = preg_replace("/[^+0-9]/", '', $string);
  echo $result;
}

// Выводит топ сейлы на главную
function top_sales(){

  global $woocommerce_loop;
  $params = array(
    'posts_per_page' => 4,
    'post_type' => 'product',
    'product_cat' => 'leaders',
    'order' => 'asc'
  );

  $products = new WP_Query($params);

  ob_start();
  if ($products->have_posts()) {

    echo '<div class="row">';

    while ($products->have_posts()) {
      $products->the_post();
      wc_get_template_part('content', 'top_sales');
    }

    echo '</div>';

  } else {
    echo '<p>' . _e('No Products') . '</p>';
  }
  woocommerce_reset_loop();
  wp_reset_postdata();

  return ob_get_clean();
}
add_shortcode('top_sales', 'top_sales');