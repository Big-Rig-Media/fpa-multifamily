export default {
  init() {
    // JavaScript to be fired on the home page
    if ($('.js-carousel-default').length) {
      $('.js-carousel-default').slick({
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
