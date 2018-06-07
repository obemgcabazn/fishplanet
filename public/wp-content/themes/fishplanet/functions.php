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


// Формы для заказа
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $f ) {
    unset($f['billing']['billing_company']);
    unset($f['billing']['billing_last_name']);
    unset($f['billing']['billing_country']);
    unset($f['billing']['billing_city']);
    // unset($f['billing']['billing_address_1']);
    unset($f['billing']['billing_address_2']);
    unset($f['billing']['billing_state']);
    unset($f['billing']['billing_postcode']);

    $f['billing']['billing_first_name']['label'] = 'Имя и фамилия';
    $f['billing']['billing_first_name']['placeholder'] = 'Введите ФИО';
    $f['billing']['billing_first_name']['class'][0] = '';
    $f['billing']['billing_first_name']['class'][1] = 'row col-lg-6';
    $f['billing']['billing_first_name']['label_class'][0] = 'col-12';
    $f['billing']['billing_first_name']['input_class'][0] = 'col-12';

    $f['billing']['billing_address_1']['class'][2] = 'row col-lg-6';
    $f['billing']['billing_address_1']['label_class'][0] = 'col-12';
    $f['billing']['billing_address_1']['input_class'][0] = 'col-12';
    $f['billing']['billing_address_1']['label'] = 'Адрес доставки';

    $f['billing']['billing_phone']['class'][2] = 'row col-lg-6';
    $f['billing']['billing_phone']['label_class'][0] = 'col-12';
    $f['billing']['billing_phone']['input_class'][0] = 'col-12';

    $f['billing']['billing_email']['class'][2] = 'row col-lg-6';
    $f['billing']['billing_email']['label_class'][0] = 'col-12';
    $f['billing']['billing_email']['input_class'][0] = 'col-12';

    $f['order']['order_comments']['label'] = 'Комментарий к доставке';
    $f['order']['order_comments']['class'][2] = 'row col-lg-12';
    $f['order']['order_comments']['label_class'][0] = 'col-12';
    $f['order']['order_comments']['input_class'][0] = 'col-12';
    $f['order']['order_comments']['reqired'] = false;
    $f['order']['order_comments']['clear'] = true;
    return $f;
    // print_r($f);
}