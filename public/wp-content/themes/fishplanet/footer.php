  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <p class="white font-weight-bold text-uppercase">О нас</p>
          <?php
          $menu = wp_nav_menu( array(
            'theme_location'  => 'footer_about',
            'container'       => 'nav',
            'container_class' => 'navigation',
            'menu_class'      => 'menu nav',
            'fallback_cb'     => 'wp_page_menu',
            'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
            'depth'           => 2,
            'echo' => 0
          ) );
          $menu = str_replace('class="menu-item', 'class="menu-item nav-item', $menu);
          $menu = str_replace('<a', '<a class="nav-link grey"', $menu);
          echo $menu;
          ?>
        </div>
        <div class="col-lg-3">
          <p class="white font-weight-bold text-uppercase">Сервис</p>
          <?php
          $menu = wp_nav_menu( array(
            'theme_location'  => 'footer_services',
            'container'       => 'nav',
            'container_class' => 'navigation',
            'menu_class'      => 'menu nav',
            'fallback_cb'     => 'wp_page_menu',
            'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
            'depth'           => 2,
            'echo' => 0
          ) );
          $menu = str_replace('class="menu-item', 'class="menu-item nav-item', $menu);
          $menu = str_replace('<a', '<a class="nav-link grey"', $menu);
          echo $menu;
          ?>
        </div>
        <div class="col-lg-3">
          <p class="white font-weight-bold text-uppercase">Мы в соц сетях</p>
          <ul class="social_media_icons">
            <li><a href="" class="social_icon"><img src="/img/instagram-logo.svg" alt=""></a></li>
            <li><a href="" class="social_icon"><img src="/img/facebook-logo.svg" alt=""></a></li>
            <li><a href="" class="social_icon"><img src="/img/vk-logo.svg" alt=""></a></li>
          </ul>
        </div>
        <div class="col-lg-3 text-right">
          <p class="white font-weight-bold text-uppercase">Информация</p>
          <p class="grey text-uppercase">ИП Тарасов Евгений Михайлович <br>
            ОГРН: 318784700054061
          </p>
          <p class="grey text-uppercase">
            195027, г. москва <br>
            ул. новый арбат, 21
          </p>
          <p>
            <a href="tel:<?=return_numbers_from_string(get_field('phone', 'option'))?>" class="header_phone_link"><?=get_field('phone', 'option')?></a> <br>
            <a href="mailto:mail@fishplanet.su" rel="nofollow" class="white">mail@fishplanet.su</a>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <p class="grey">&copy; 2013 - 2018 fishplanet.su</p>
        </div>
      </div>
    </div>
  </footer>

</main> <!-- #container -->

<!-- Modal Call-Back -->
<div class="modal fade" id="cbModal" tabindex="-1" role="dialog" aria-labelledby="cbModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-md modal-dialog-centered" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cbModalLabel">Перезвоним через 2 минуты</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/wp-content/themes/fishplanet/mail.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control form-input-name" placeholder="Введите имя" name="name">
          </div>
          <div class="form-group">
            <input type="phone" class="form-control form-input-phone" placeholder="Введите телефон" name="phone" required>
          </div>
        </div><!-- modal-body -->

        <div class="modal-footer">
          <input type="submit" id="btn-submit" class="btn btn-secondary" value="Отправить заявку">
        </div><!-- modal-footer -->

        <p class="desc small grey">Нажимая кнопку «Заказать звонок», Вы даете свое <a href="/privacy/" class="grey" target="_blank" title="Политика конфиденциальности">согласие на обработку персональных данных.</a></p>
      </form>

      <!-- result -->
      <div class="form-result red">
        <p>Спасибо за Вашу заявку!</p>
        <hr class="bg-red">
        <p>Мы перезвоним Вам в ближайшее время</p>
      </div>

    </div>

  </div>
</div>

<?php wp_footer(); ?>

</body>
</html>