<?php
if (!is_admin()) show_admin_bar(false);

require_once 'includes/init.php';

if ( !is_admin() ) {
  add_action( 'wp_print_styles', 'my_style_method' );
}

function my_style_method () {
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . "/css/bootstrap-fishplanet.css", '', '', '' );
    wp_enqueue_style( 'style', get_template_directory_uri() . "/css/concat.css", '', '', '' );
    wp_enqueue_style( 'fancybox', get_template_directory_uri() . "/css/jquery.fancybox.min.css", '', '', '' );
}

add_action('wp_enqueue_scripts', 'my_scripts_method');
function my_scripts_method()
{
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', "https://yastatic.net/jquery/2.0.3/jquery.min.js", '', '', 'true');
    wp_enqueue_script('popper', "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js", '', '', 'true');
    wp_enqueue_script('bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js", '', '', 'true');
    wp_enqueue_script('pushy', get_template_directory_uri() . "/js/pushy.min.js", '', '', 'true');
    wp_enqueue_script('fancybox', get_template_directory_uri() . "/js/jquery.fancybox.min.js", '', '', 'true');
    wp_enqueue_script('script', get_template_directory_uri() . "/js/script.js", '', '', 'true');
} 

register_nav_menus(array(
    'top_menu' => __('Верхнее меню'),
    'aside_menu' => __('Мобильное меню'),
    'search_top' => __('Топ запросов в поиске'),
    'search_category' => __('Наименования')
)); 


if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

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

function return_numbers_from_string( $string ){
    $result = preg_replace("/[^+0-9]/", '', $string);
    echo $result;
}

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
