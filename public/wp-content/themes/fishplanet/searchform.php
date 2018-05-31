<section class="search_wrapper">
  <h3 class="text-center text-uppercase">Поиск</h3>
  <div class="row">
    <div class="col-12">
      <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="searchform_wrapper">
          <img src="/img/serach-blue.svg" alt="Поиск" width="20">
          <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
          <!-- input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" / -->
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-lg-5">
      <h4 class="text-uppercase">Топ запросов</h4>
      <?php
      $menu = wp_nav_menu( array(
        'theme_location'  => 'search_top',
        'container'       => 'nav',
        'container_class' => 'navigation',
        'menu_class'      => 'menu nav flex-column search_menu',
        'fallback_cb'     => 'wp_page_menu',
        'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
        'depth'           => 2,
        'echo'            => 0
      ) );
      $menu = str_replace('class="menu-item', 'class="menu-item nav-item', $menu);
      $menu = str_replace('<a', '<a class="nav-link blue text-uppercase"', $menu);
      echo $menu;
      ?>
    </div>
    <div class="col-12 col-lg-4">
      <h4 class="text-uppercase">Наименования</h4>
      <?php
      $menu = wp_nav_menu( array(
        'theme_location'  => 'search_category',
        'container'       => 'nav',
        'container_class' => 'navigation',
        'menu_class'      => 'menu nav flex-column search_menu',
        'fallback_cb'     => 'wp_page_menu',
        'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
        'depth'           => 2,
        'echo'            => 0
      ) );
      $menu = str_replace('class="menu-item', 'class="menu-item nav-item', $menu);
      $menu = str_replace('<a', '<a class="nav-link blue text-uppercase"', $menu);
      echo $menu;
      ?>
    </div>
    <div class="col-12 col-lg-3 text-right">
      <h4 class="text-uppercase">Контакты</h4>
      <a href="tel:<?=return_numbers_from_string(get_field('phone', 'option'))?>" class="search_phone_link"><?=get_field('phone', 'option')?></a>
      <a href="mailto:<?=get_field('e-mail', 'option')?>" class="search_email_link"><?=get_field('e-mail', 'option')?></a>
    </div>
  </div>
</section>