@if( class_exists('ACF') )
  @if( get_field('hero_type') === 'image' )
    @include('partials.hero.hero-image')
  @elseif( get_field('hero_type') === 'carousel' )
    @include('partials.hero.hero-carousel')
  @elseif( get_field('hero_type') === 'video' )
    @include('partials.hero.hero-video')
  @elseif( get_field('hero_type') === 'color' )
    @include('partials.hero.hero-color')
  @endif
@endif
