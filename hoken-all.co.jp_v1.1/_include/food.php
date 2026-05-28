<script src="<?= get_theme_root_uri() ?>/global-assets/js/common.js"></script>
<script src="<?= assetsPath('js') ?>/common.js"></script>
<?php if ( is_front_page() || is_home() || is_page('index') ) : ?>
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <script>
    const swiper = new Swiper('.js-bannerSlider .swiper', {
      slidesPerView: 3,
      spaceBetween: 16,
      grabCursor: true,
      loop: true,
      pagination: false,
      // pagination: {
      //   el: '.js-bannerSlider .swiper-pagination',
      //   clickable: true,
      // },
      navigation: {
        nextEl: '.js-bannerSlider .swiper-button-next',
        prevEl: '.js-bannerSlider .swiper-button-prev',
      },
      breakpoints: {
        240: {
          slidesPerView: 1,
        },
        600: {
          slidesPerView: 2,
        },
        1025: {
          slidesPerView: 3,
          spaceBetween: 16,
        }
      },
    });
  </script>
<?php endif; ?>



