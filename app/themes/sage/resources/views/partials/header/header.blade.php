@if( !is_page_template('views/template-splash.blade.php') )
  @if( !is_page_template('views/template-landing.blade.php') )
    @include('partials.header.header-basic')
  @else
    @include('partials.header.header-landing')
  @endif
@endif
