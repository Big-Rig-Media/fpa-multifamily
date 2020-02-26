@if( get_field('fpa_affliates_content') )
  <section class="brm-section brm-section--affliates js-background" data-mobile="/app/uploads/2020/02/affliates-background-960x600.jpg" data-desktop="/app/uploads/2020/02/affliates-background.jpg">
    <div class="text-black brm-container brm-container--small">
      <h2 class="text-center">FPA & Affliates</h2>
      {!! get_field('fpa_affliates_content') !!}
      @include('partials.sections.section-affliate-stats')
      <p class="mt-5 text-center">
        <a class="brm-btn brm-btn--primary" href="{{ get_permalink(16) }}">Portfolio</a>
      </p>
    </div>
  </section>
@endif
