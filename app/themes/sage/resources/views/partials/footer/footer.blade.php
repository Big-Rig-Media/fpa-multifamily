<footer class="bg-primary-3 brm-footer">
  <div class="brm-container">
    @if( !is_page_template(['views/template-landing.blade.php', 'views/template-splash.blade.php']) )
      @include('partials.footer.footer-global')
    @elseif( is_page_template('views/template-splash.blade.php') )
      @include('partials.footer.footer-splash')
    @else
      @include('partials.footer.footer-landing')
    @endif
  </div>
</footer>
