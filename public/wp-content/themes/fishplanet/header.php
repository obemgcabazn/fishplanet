<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" 
  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon">

  <title><?php echo get_post_meta($post->ID, 'title', true); ?></title>
  <meta name="keywords" content="<?php echo get_post_meta($post->ID, 'keywords', true); ?>">
  <meta name="description" content="<?php echo get_post_meta($post->ID, 'description', true); ?>">
  <?php wp_head(); ?>

</head>
<body>

  <!-- Pushy Menu -->
  <nav class="pushy pushy-right">
    <div class="pushy-content">
      <?php
      $menu = wp_nav_menu( array(
        'theme_location'  => 'aside_menu',
        'container'       => 'div',
        'container_class' => '',
        'container_id'    => 'navbarSupportedContent',
        'menu_class'      => 'menu nav',
        'fallback_cb'     => 'wp_page_menu',
        'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
        'depth'           => 2,
        'echo' => 0
      ) );
      $menu = str_replace('class="menu-item', 'class="menu-item nav-item', $menu);
      $menu = str_replace('<a', '<a class="nav-link"', $menu);
      echo $menu;
      ?>
    </div>
  </nav>

  <!-- Site Overlay -->
  <div class="site-overlay"></div>

  <main id="container">
    <header class="header">

      <div id="toggle-button" class="d-flex d-sm-none fixed-top">
        <!-- Menu Button -->
        <button class="menu-btn">&#9776; Меню</button>
      </div>

      <div class="header_top-menu_wrapper">
        <div class="container">

          <div class="row no-gutters">
            <div class="col-xl-2">
              <div class="header_wrapper">
                <a href="/" title="Магазин морепродуктов Fish Planet"><img src="/img/logo-white.svg" alt="Fish Planet Магазин морепродуктов" class="header_logo" height="34"></a>
              </div>
            </div>
            <div class="d-none d-sm-flex col-sm-6 align-items-center">

              <?php
              $menu = wp_nav_menu( array(
                'theme_location'  => 'top_menu',
                'container'       => 'nav',
                'container_class' => 'navigation w-100',
                'menu_class'      => 'menu nav nav-inline justify-content-between',
                'fallback_cb'     => 'wp_page_menu',
                'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s<li class="header_search_icon menu-item"><a data-fancybox data-src="#hidden-content-b" href="javascript:;">Поиск</a></li></ul>',
                'depth'           => 2,
                'echo' => 0
              ) );
              $menu = str_replace('class="menu-item', 'class="menu-item nav-item', $menu);
              $menu = str_replace('<a', '<a class="nav-link blue"', $menu);
              echo $menu;
              ?>
            </div>
            <div class="col-xl-2 header_contacts text-right">
              <p class="header_phone mb-0 ">
                <a href="tel:<?=return_numbers_from_string(get_field('phone', 'option'))?>" class="header_phone_link"><?=get_field('phone', 'option')?></a>
                <a href="#" class="text-uppercase btn-blue header_phone_btn-blue" rel="nofollow" data-toggle="modal" data-target="#cbModal">Заказать звонок</a>
              </p>

              <div class="header_messengers d-flex justify-content-between">
                <a href="" class="header_messengers_icon telegram">
                  <img src="/img/telegram.png" alt="" width="20" height="20">
                </a>
                <a href="https://api.whatsapp.com/send?phone=79660593355" class="header_messengers_icon whatsapp">
                  <img src="/img/whatsapp.png" alt="" width="20" height="20">
                </a>
                <a href="viber://chat?number=79660593355" class="header_messengers_icon viber">
                  <img src="/img/viber.png" alt="" width="20" height="20">
                </a>
              </div>
            </div>
            <div class="col-xl-2">
              <div class="header_cart text-right">
              <div class="row no-gutters">
                <div class="col-xl-3 align-items-center">
                    <a href="/cart/" class="header_cart_link" title="Корзина" rel="nofollow"><img src="/img/shopping-bag.svg" alt="" height="35"></a>
                </div>
                <div class="col-xl-9">
                  <a href="/cart/" class="header_cart_link" title="Корзина" rel="nofollow">
                    <div class="header_cart_count"><?php woo_cart_count(); ?></div>
                    <div class="header_cart_ammount"><?php echo WC()->cart->cart_contents_total; ?> ₽</div>
                  </a>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </header>

    <div style="display: none;" id="hidden-content-b">
      <p><?php get_search_form( true ); ?></p>
    </div>
