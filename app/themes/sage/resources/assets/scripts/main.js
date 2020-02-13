// import external dependencies
import 'jquery';
import '@fancyapps/fancybox/dist/jquery.fancybox.min.js';
import 'slick-carousel/slick/slick.min';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/aboutUs';
import dispositions from './routes/dispositions';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page
  aboutUs,
  // Dispositions page
  dispositions,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
