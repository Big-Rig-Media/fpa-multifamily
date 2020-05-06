import { isExternal, isEmpty, observeBackgrounds, dropdownState } from '../util/helpers';
import * as Cookies from 'js-cookie';

export default {
  init() {
    // JavaScript to be fired on all pages
    const body = document.querySelector('body');
    const navToggle = document.querySelector('.js-toggle-nav');
    const anchors = document.querySelectorAll('a');
    const paragraphs = document.querySelectorAll('p');
    const dropdowns = document.querySelectorAll('.menu-item-has-children');
    const jsHero = document.querySelector('.js-hero');
    const jsBackgrounds = document.querySelectorAll('.js-background');
    const jsPopup = document.querySelector('.js-popup');
    const galleryThumbs = document.querySelectorAll('.gallery-icon');
    const tabs = document.querySelectorAll('.tabs');

    // Handle external urls
    anchors.forEach(anchor => {
      if (isExternal(anchor)) {
        // Define attributes to set
        const attributes = {
          target: '__blank',
          rel: 'noopener',
        };

        // Set attributes
        Object.keys(attributes).forEach(attribute => {
          anchor.setAttribute(attribute, attributes[attribute]);
        });
      }
    });

    // Handle empty p tags
    paragraphs.forEach(isEmpty);

    // Handle toggling mobile navigation
    if (window.matchMedia('(max-width: 1023px)').matches) {
      if (navToggle) {
        navToggle.addEventListener('click', () => {
          body.classList.toggle('nav-is-open');
        });
      }
    }

    // Handle dropdowns visibility state
    if (window.matchMedia('(max-width: 1199px)').matches) {
      dropdowns.forEach(dropdown => {
        dropdown.setAttribute('data-state', 'closed');

        dropdown.addEventListener('click', dropdownState);
      });
    }

    // Handle hero background
    if (jsHero) {
      const mobileHero = jsHero.dataset.mobile;
      const desktopHero = jsHero.dataset.desktop;

      if (mobileHero && desktopHero) {
        jsHero.classList.add('has-bg');

        if (window.matchMedia('(min-width: 1024px)').matches) {
          jsHero.style.backgroundImage = `url(${desktopHero})`;
        } else {
          jsHero.style.backgroundImage = `url(${mobileHero})`;
        }
      }
    }

    // Handle js backgrounds
    if (jsBackgrounds) {
      if ('IntersectionObserver' in window) {
        let observer = new IntersectionObserver(observeBackgrounds);

        jsBackgrounds.forEach(jsBackground => {
          observer.observe(jsBackground);
        });
      }
    }

    // Handle gallery lightbox
    if (galleryThumbs) {
      galleryThumbs.forEach(galleryThumb => {
        const galleryAnchor = galleryThumb.children[0];

        galleryAnchor.setAttribute('data-fancybox', 'gallery');
      });
    }

    // Handle js popup
    if (jsPopup && !Cookies.get('popup')) {
      setTimeout(() => {
        $.fancybox.open({
          autoFocus: false,
          src: jsPopup,
          type: 'inline',
        });

        Cookies.set('popup', 'true', { expires: 7 });
      }, 5000);
    }

    // Handle hero carousel
    if ($('.js-carousel-hero').length) {
      $('.js-carousel-hero').slick({
        accessibility: true,
        adaptiveHeight: false,
        autoplay: true,
        autoplaySpeed: 15000,
        arrows: false,
        fade: true,
        pauseOnFocus: false,
        pauseOnHover: false,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
      });
    }

    // Handle datepickers
    if ($('.gfield .datepicker').length) {
      $('.gfield .datepicker').each(function () {
        $(this).attr('autocomplete', 'off');
      });
    }

    // Enable fancybox
    $('[data-fancybox]').fancybox({
      autoFocus: false,
      smallBtn: false,
      toolbar: true,
    });

    // Handle data tabs
    if (tabs) {
      const activeCaptions = document.querySelectorAll('.active-tab-caption')

      // Set the active caption for each tab caption on page
      if (activeCaptions) {
        activeCaptions.forEach(activeCaption => {
          const activeTabs = activeCaption.parentNode.parentNode.querySelector('.is-active.js-tab-activate')

          activeCaption.innerHTML = activeTabs.innerHTML
        })
      }

      // Loop through each tab component and do some shit
      tabs.forEach(tab => {
        let activeCaption = tab.parentNode.querySelector('.active-tab-caption')
        let activeTabButton = tab.querySelector('.is-active.js-tab-activate')
        const tabButtons = tab.querySelectorAll('.js-tab-activate')
        const tabStats = tab.querySelectorAll('.tab')

        // Loop through all tab buttons and listen for a click event
        tabButtons.forEach(tabButton => {
          tabButton.addEventListener('click', (e) => {
            e.preventDefault()

            activeTabButton.classList.remove('is-active')

            // Set the new active button
            if (activeTabButton !== tabButton.classList.contains('is-active')) {
              activeTabButton = tabButton

              activeTabButton.classList.add('is-active')
            }

            // Set the active caption text based on the current clicked tab button
            if (activeCaption) {
              activeCaption.innerHTML = tabButton.innerHTML
            }

            // Set the active tab button id
            let activeTabButtonId = activeTabButton.dataset.tab

            // Determine what set of tab stats to display
            tabStats.forEach(tabStat => {
              const tabId = tabStat.getAttribute('id')

              if (tabId === activeTabButtonId) {
                tabStat.classList.remove('hidden')
                tabStat.classList.add('flex', 'is-active')

                return
              }

              tabStat.classList.add('hidden')
              tabStat.classList.remove('flex', 'is-active')
            })
          })
        })
      })
    }

    // Handle number increments
    if ($('.js-increment').length) {
      $('.js-increment').each(function () {
        var numberObject = $(this)
        var numberTop = numberObject.offset().top

        function incrementNumber(object) {
          object.prop('counter', 0).animate({
            counter: object.data('num'),
          }, {
            duration: 2000,
            easing: 'swing',
            step: function (now) {
              object.children('span').text(Math.ceil(now).toLocaleString())
            },
          })
        }

        $(window).scroll(function () {
          var scrollY = $(this).scrollTop()
          var windowBottom = (scrollY + $(this).innerHeight())

          if (windowBottom >= numberTop) {
            incrementNumber(numberObject)
          }
        })
      })
    }

    // Handle logos carousel
    if ($('.js-carousel-logos').length) {
      $('.js-carousel-logos').slick({
        accessibility: true,
        adaptiveHeight: false,
        autoplay: false,
        autoplaySpeed: 4000,
        arrows: true,
        centerMode: true,
        dots: false,
        fade: false,
        pauseOnFocus: false,
        pauseOnHover: true,
        prevArrow: '<button type="button" class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.842 69.374" height="40"><path fill="none" stroke="#ffffff" stroke-width="2" d="M23 .538L1.187 34.687 23 68.836"/></svg></button>',
        nextArrow: '<button type="button" class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.842 69.374" height="40"><path fill="none" stroke="#ffffff" stroke-width="2" d="M1.187.538L23 34.687 1.187 68.836"/></svg></button>',
        speed: 1000,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [
          {
            breakpoint: 1023,
            settings: {
              arrows: false,
              dots: false,
              slidesToShow: 2,
              slidesToScroll: 2,
            },
          },
          {
            breakpoint: 567,
            settings: {
              arrows: false,
              dots: false,
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      }).on('setPosition', function (event, slick) {
        slick.$slides.css('height', slick.$slideTrack.height() + 'px')
      });
    }

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
