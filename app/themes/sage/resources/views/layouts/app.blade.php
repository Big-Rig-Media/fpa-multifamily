<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
    @if($tag_manager)
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-{!! $tag_manager !!}"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->
    @endif
    @php do_action('get_header') @endphp
    @include('partials.header.header')
    @include('partials.hero.hero')
    <main>
      @if(App\display_layout())
        <section class="brm-section brm-section--intro">
          <div class="brm-container">
            @yield('content')
          </div>
        </section>
      @else
        @yield('content')
      @endif
    </main>
    @include('partials.sections.section-contact')
    @php do_action('get_footer') @endphp
    @include('partials.footer.footer')
    @include('partials.modal.popup')
    @php wp_footer() @endphp
  </body>
</html>
