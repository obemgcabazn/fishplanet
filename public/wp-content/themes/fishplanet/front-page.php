<?php
get_header(); ?>

<main class="front-page">
  <div class="first-screen">
    <div class="container">
      <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-3">
          <div class="front-page_logo_wrapper">
            <img src="/img/logo-color.svg" alt="Fish Planet" class="front-page-logo">
          </div>
        </div>
        <div class="col-xl-3"></div>
        <div class="col-xl-4">
          <div class="front-page_h_wrapper">
            <h1>Живые и замороженные морепродукты в Москве</h1>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row no-gutters">
    <div class="col-xl-3">
      <div class="front-page_category fresh">
        <a href="/fresh/" class="front-page_category_link d-flex align-items-end">
          <p class="front-page_category_link_desc text-uppercase">Свежие<br>морепродукты</p>
        </a>
      </div>
    </div>
    <div class="col-xl-3">
      <div class="front-page_category freezing">
        <a href="/freezing/" class="front-page_category_link d-flex align-items-end">
          <p class="front-page_category_link_desc text-uppercase">Заморозка</p>
        </a>
      </div>
    </div>
    <div class="col-xl-3">
      <div class="front-page_category smoked">
        <a href="/smoked/" class="front-page_category_link d-flex align-items-end">
          <p class="front-page_category_link_desc text-uppercase">Копчености</p>
        </a>
      </div>
    </div>
    <div class="col-xl-3">
      <div class="front-page_category caviar">
        <a href="/caviar/" class="front-page_category_link d-flex align-items-end">
          <p class="front-page_category_link_desc text-uppercase">Икра</p>
        </a>
      </div>
    </div>
  </div>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-xl-6">
          <h2 class="white fish-letter">О компании</h2>
          <p class="white desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <p class="white desc">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="top-sale">
    <div class="container">
      <div class="row">
        <div class="col">
          <hr>
        </div>
        <div class="col-xl-3">
          <h4 class="text-center top-sale_header text-uppercase">Лидеры продаж</h4>
        </div>
        <div class="col">
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <div class="top-sale_product_wrapper">
            <img src="/img/watermarks/top-sale-1.png" alt="" class="top-sale_product_img d-block">
            <div class="row no-gutters">
              <div class="col-10">
                <div class="top-sale_product_desc_wrapper">
                  <p class="top-sale_product_header">Гребешок приморский (живой)</p>
                  <span class="old-price"></span>
                  <span class="new-price"></span>
                  <p class="quantity"></p>
                </div>
              </div>
              <div class="col-2">
                <div class="cart_add-button"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="top-sale_product_wrapper">
            <img src="/img/watermarks/top-sale-1.png" alt="" class="top-sale_product_img d-block">
            <div class="row no-gutters">
              <div class="col-10">
                <div class="top-sale_product_desc_wrapper">
                  <p class="top-sale_product_header">Гребешок приморский</p>
                  <span class="old-price"></span>
                  <span class="new-price"></span>
                  <p class="quantity"></p>
                </div>
              </div>
              <div class="col-2">
                <div class="cart_add-button"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="top-sale_product_wrapper">
            <img src="/img/watermarks/top-sale-1.png" alt="" class="top-sale_product_img d-block">
            <div class="row no-gutters">
              <div class="col-10">
                <div class="top-sale_product_desc_wrapper">
                  <p class="top-sale_product_header">Гребешок приморский</p>
                  <span class="old-price"></span>
                  <span class="new-price"></span>
                  <p class="quantity"></p>
                </div>
              </div>
              <div class="col-2">
                <div class="cart_add-button"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="top-sale_product_wrapper">
            <img src="/img/watermarks/top-sale-1.png" alt="" class="top-sale_product_img d-block">
            <div class="row no-gutters">
              <div class="col-10">
                <div class="top-sale_product_desc_wrapper">
                  <p class="top-sale_product_header">Гребешок приморский</p>
                  <span class="old-price"></span>
                  <span class="new-price"></span>
                  <p class="quantity"></p>
                </div>
              </div>
              <div class="col-2">
                <div class="cart_add-button"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



    <?php
    if ( have_posts() ):
     while ( have_posts() ): the_post();

      the_content();

    endwhile;
  endif;

  ?>

</main>



<?php get_footer(); ?>