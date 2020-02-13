export default {
  init() {
    // JavaScript to be fired on the about us page
    if ($('.js-carousel-offices').length) {
      $('.js-carousel-offices').slick({
        accessibility: true,
        adaptiveHeight: false,
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: false,
        centerMode: true,
        centerPadding: '15%',
        dots: false,
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
    // JavaScript to be fired on the about us page, after the init JS
  },
};
