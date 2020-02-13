export default {
  init() {
    // JavaScript to be fired on the home page
    if ($('.js-carousel-acquisitions').length) {
      $('.js-carousel-acquisitions').slick({
        accessibility: true,
        adaptiveHeight: false,
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: false,
        centerMode: true,
        centerPadding: '15%',
        dots: true,
        fade: false,
        pauseOnFocus: false,
        pauseOnHover: true,
        speed: 1000,
        slidesToShow: 3,
        slidesToScroll: 3,
      });
    }

    if ($('.js-carousel-dispositions').length) {
      $('.js-carousel-dispositions').slick({
        accessibility: true,
        adaptiveHeight: false,
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: false,
        centerMode: true,
        centerPadding: '15%',
        dots: true,
        fade: false,
        pauseOnFocus: false,
        pauseOnHover: true,
        speed: 1000,
        slidesToShow: 3,
        slidesToScroll: 3,
      });
    }
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
