@if( is_page_template('views/template-landing.blade.php') )
  @include('partials.landing.hero')
@elseif( is_page_template('views/template-splash.blade.php') )
  @include('partials.splash.hero-splash')
@else
  @if( !is_page([16]) )
    <!-- Not Portfolio Page -->
    <div class="brm-container brm-container--small">
      {!! get_field('hero_content') !!}
    </div>
  @else
    <!-- Portfolio Page -->
    <div class="py-8 text-white text-center bg-primary-4">
      <div class="brm-container brm-container--small">
        {!! get_field('hero_content') !!}
      </div>
    </div>
    <div class="py-4 text-white">
      <div class="brm-container brm-container--small">
        @include('partials.sections.section-hero-stats')
      </div>
    </div>
  @endif
@endif
