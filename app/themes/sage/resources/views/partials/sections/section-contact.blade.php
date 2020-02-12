@if( is_page_template('views/template-splash.blade.php') )
  <section class="brm-section brm-section--split brm-section--meta">
    <div class="brm-section__content">
      <div class="brm-section__inner">
        @if( $location )
          {!! $location !!}
        @endif
      </div>
    </div>
    <div class="brm-section__map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13281.421741548917!2d-116.301674!3d33.6738596!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd184f6a3b2a4094d!2sBig+Rig+Media+LLC!5e0!3m2!1sen!2sus!4v1563474053754!5m2!1sen!2sus" width="100%" height="100%" frameborder="0" style="border:0" title="{{ get_bloginfo('name', 'display') }} Google Map" allowfullscreen></iframe>
    </div>
  </section>
@endif
