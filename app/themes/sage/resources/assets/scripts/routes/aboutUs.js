export default {
  init() {
    // JavaScript to be fired on the about us page
    if ($('.js-carousel-offices').length) {
      $('.js-carousel-offices').slick({
        accessibility: true,
        adaptiveHeight: false,
        autoplay: false,
        autoplaySpeed: 4000,
        arrows: true,
        centerMode: true,
        centerPadding: '15%',
        dots: false,
        fade: false,
        pauseOnFocus: false,
        pauseOnHover: true,
        prevArrow: '<button type="button" class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.842 69.374"><path fill="none" stroke="#a38242" stroke-width="2" d="M23 .538L1.187 34.687 23 68.836"/></svg></button>',
        nextArrow: '<button type="button" class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.842 69.374"><path fill="none" stroke="#a38242" stroke-width="2" d="M1.187.538L23 34.687 1.187 68.836"/></svg></button>',
        speed: 1000,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [
          {
            breakpoint: 1023,
            settings: {
              arrows: false,
              centerPadding: '5%',
              dots: false,
              slidesToShow: 2,
              slidesToScroll: 2,
            },
          },
          {
            breakpoint: 567,
            settings: {
              arrows: false,
              centerPadding: '5%',
              dots: false,
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      });
    }

    if ($('.js-carousel-employees').length) {
      $('.js-carousel-employees').slick({
        accessibility: true,
        adaptiveHeight: false,
        autoplay: false,
        autoplaySpeed: 4000,
        arrows: true,
        dots: false,
        fade: false,
        pauseOnFocus: false,
        pauseOnHover: true,
        prevArrow: '<button type="button" class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.842 69.374" height="40"><path fill="none" stroke="#a38242" stroke-width="2" d="M23 .538L1.187 34.687 23 68.836"/></svg></button>',
        nextArrow: '<button type="button" class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.842 69.374" height="40"><path fill="none" stroke="#a38242" stroke-width="2" d="M1.187.538L23 34.687 1.187 68.836"/></svg></button>',
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
      });
    }
  },
  finalize() {
    // JavaScript to be fired on the about us page, after the init JS
  },
};
