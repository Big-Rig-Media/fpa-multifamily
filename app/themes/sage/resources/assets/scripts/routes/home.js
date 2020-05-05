export default {
  init() {
    // JavaScript to be fired on the home page
    if ($('.js-carousel-default').length) {
      $('.js-carousel-default').slick({
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

    if (window.matchMedia('(max-width: 1023px)').matches) {
      if ($('.js-carousel-news').length) {
        $('.js-carousel-news').slick({
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
          responsive: [
            {
              breakpoint: 1023,
              settings: {
                centerPadding: '5%',
                dots: false,
                slidesToShow: 2,
                slidesToScroll: 2,
              },
            },
            {
              breakpoint: 567,
              settings: {
                centerPadding: '5%',
                dots: false,
                slidesToShow: 1,
                slidesToScroll: 1,
              },
            },
          ],
        });
      }
    }
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
