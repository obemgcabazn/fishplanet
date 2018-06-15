<?php 
if ( ! function_exists( 'woocommerce_breadcrumb' ) ) {

  /**
   * Output the WooCommerce Breadcrumb.
   *
   * @param array $args Arguments.
   */
  function woocommerce_breadcrumb( $args = array() ) {
    $args = wp_parse_args( $args, apply_filters( 'woocommerce_breadcrumb_defaults', array(
      'delimiter'   => '&nbsp;&rarr;&nbsp;',
      'wrap_before' => '<nav class="woocommerce-breadcrumb">',
      'wrap_after'  => '</nav>',
      'before'      => '',
      'after'       => '',
      'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
    ) ) );

    $breadcrumbs = new WC_Breadcrumb();

    if ( ! empty( $args['home'] ) ) {
      $breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
    }

    $args['breadcrumb'] = $breadcrumbs->generate();

    /**
     * WooCommerce Breadcrumb hook
     *
     * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
     */
    do_action( 'woocommerce_breadcrumb', $breadcrumbs, $args );

    wc_get_template( 'global/breadcrumb.php', $args );
  }
}

/**
 * Show the product title in the product loop. By default this is an H2.
 */
function woocommerce_template_loop_product_title() {
  echo '<h5 class="woocommerce-loop-product__title">' . get_the_title() . '</h5>';
}