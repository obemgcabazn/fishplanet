  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <p class="white font-weight-bold text-uppercase">О нас</p>
        </div>
        <div class="col-lg-3">
          
        </div>
        <div class="col-lg-3">
          
        </div>
        <div class="col-lg-3">
          
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