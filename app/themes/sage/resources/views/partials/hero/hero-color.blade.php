@if( get_field('hero_background_color') )
  @php
    $gradient = get_field('hero_background_color');
  @endphp
  <section class="{{ $gradient }} text-white text-center brm-hero brm-hero--basic">
    @include('partials.hero.hero-content')
  </section>
@endif
