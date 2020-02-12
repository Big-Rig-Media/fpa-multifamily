@if( is_page_template('views/template-landing.blade.php') )
  @include('partials.landing.hero')
@elseif( is_page_template('views/template-splash.blade.php') )
  @include('partials.splash.hero-splash')
@else
@endif
